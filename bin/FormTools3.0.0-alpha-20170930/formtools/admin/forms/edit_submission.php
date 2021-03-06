<?php

require_once("../../global/library.php");

use FormTools\Core;
use FormTools\FieldTypes;
use FormTools\FieldValidation;
use FormTools\Forms;
use FormTools\General;
use FormTools\Pages;
use FormTools\Sessions;
use FormTools\Settings;
use FormTools\Submissions;
use FormTools\Themes;
use FormTools\Views;
use FormTools\ViewFields;
use FormTools\ViewTabs;

Core::init();
Core::$user->checkAuth("admin");

$request = array_merge($_GET, $_POST);
$form_id = General::loadField("form_id", "curr_form_id");
$view_id = Views::getCurrentView($request, $form_id);
$root_url = Core::getRootUrl();

if (empty($view_id) || !Views::checkViewExists($view_id, true)) {
    General::redirect("edit/?page=views&form_id=$form_id&message=no_views");
}

$submission_id = isset($request["submission_id"]) ? $request["submission_id"] : "";
if (empty($submission_id)) {
    General::redirect("submissions.php");
}

Sessions::set("last_submission_id", $submission_id);
Sessions::set("last_submission_id_{$form_id}", $submission_id);
Sessions::set("last_link_page_{$form_id}",  "edit");

// get a list of all editable fields in the View. This is used for security purposes for the update function and to
// determine whether the page contains any editable fields
$editable_field_ids = ViewFields::getEditableViewFields($view_id);

// update the submission
$failed_validation = false;
$success = true;
$message = "";
if (isset($_POST) && !empty($_POST)) {
    Sessions::set("new_search", "yes");
	$request["view_id"] = $view_id;
	$request["editable_field_ids"] = $editable_field_ids;
	list($success, $message) = Submissions::updateSubmission($form_id, $submission_id, $request);

	// if there was any problem updating this submission, make a special note of it: we'll use that info to merge the
    // current POST request info with the original field values to ensure the page contains the latest data (i.e. for
    // cases where they fail server-side validation)
	if (!$success) {
		$failed_validation = true;
	}
}

$form_info = Forms::getForm($form_id);
$view_info = Views::getView($view_id);

// this is crumby
$has_tabs = false;
foreach ($view_info["tabs"] as $tab_info) {
	if (!empty($tab_info["tab_label"])) {
		$has_tabs = true;
		break;
	}
}
$tab_number = $has_tabs ? General::loadField("tab", "view_{$view_id}_current_tab", 1) : "";
$grouped_fields = ViewFields::getGroupedViewFields($view_id, $tab_number, $form_id, $submission_id);

if ($failed_validation) {
	$grouped_fields = FieldValidation::mergeFormSubmission($grouped_fields, $_POST);
}

$page_field_ids      = array();
$page_field_type_ids = array();
$page_has_required_fields = false;
foreach ($grouped_fields as $group) {
	foreach ($group["fields"] as $field_info) {
		$page_field_ids[] = $field_info["field_id"];
		if (!in_array($field_info["field_type_id"], $page_field_type_ids)) {
            $page_field_type_ids[] = $field_info["field_type_id"];
        }
		if ($field_info["is_required"]) {
            $page_has_required_fields = true;
        }
	}
}
$page_field_types = FieldTypes::get(true, $page_field_type_ids);

// construct the tab list
$view_tabs = ViewTabs::getViewTabs($view_id, true);
$tabs      = array();
$same_page = General::getCleanPhpSelf();
while (list($key, $value) = each($view_tabs)) {
	$tabs[$key] = array(
		"tab_label" => $value["tab_label"],
		"tab_link"  => "{$same_page}?tab=$key&form_id=$form_id&submission_id={$submission_id}"
	);
}

// get a list of editable fields on this tab
$editable_tab_fields = array_intersect($page_field_ids, $editable_field_ids);

// if we're just coming here from the search results page, get a fresh list of every submission ID in this
// search result set. This is used to build the internal "<< previous   next >>" nav on this details page.
// They need to exactly correspond to the ordering of the search results or they don't make sense
$search = Sessions::exists("current_search") ? Sessions::get("current_search") : array();
if (Sessions::exists("new_search") && Sessions::get("new_search") == "yes") {
	$searchable_columns = ViewFields::getViewSearchableFields("", $view_info["fields"]);

	// extract the original search settings and get the list of IDs
	$submission_ids = Submissions::getSearchSubmissionIds($form_id, $view_id, $search["order"], $search["search_fields"], $searchable_columns);
	Sessions::set("form_{$form_id}_view_{$view_id}_submissions", $submission_ids);
    Sessions::set("new_search", "no");
}

list($prev_link_html, $search_results_link_html, $next_link_html) = Submissions::getPrevNextLinks($form_id, $view_id, $submission_id, "submissions.php");

// construct the page label
$submission_placeholders = General::getSubmissionPlaceholders($form_id, $submission_id);
$edit_submission_page_label = General::evalSmartyString($form_info["edit_submission_page_label"], $submission_placeholders);

$validation_js = FieldValidation::generateSubmissionJsValidation($grouped_fields);


// get all the shared resources
$settings = Settings::get("", "core");
$shared_resources_list = $settings["edit_submission_onload_resources"];
$shared_resources_array = explode("|", $shared_resources_list);
$shared_resources = "";
foreach ($shared_resources_array as $resource) {
	$shared_resources .= General::evalSmartyString($resource, array("g_root_url" => $root_url)) . "\n";
}

// compile the header information
$page_vars = array(
    "page" => "admin_edit_submission",
    "page_url" => Pages::getPageUrl("admin_edit_submission"),
    "g_success" => $success,
    "g_message" => $message,
    "head_title" => $edit_submission_page_label,
    "form_info" => $form_info,
    "form_id" => $form_id,
    "view_id" => $view_id,
    "submission_id" => $submission_id,
    "tabs" => $tabs,
    "settings" => $settings,
    "tab_number" => $tab_number,
    "grouped_fields" => $grouped_fields,
    "field_types" => $page_field_types,
    "previous_link_html" => $prev_link_html,
    "page_has_required_fields" => $page_has_required_fields,
    "search_results_link_html" => $search_results_link_html,
    "next_link_html" => $next_link_html,
    "tab_has_editable_fields" => count($editable_tab_fields) > 0,
    "view_info" => $view_info,
    "edit_submission_page_label" => $edit_submission_page_label,
    "page_field_ids" => $page_field_ids,
    "page_field_ids_str" => implode(",", $page_field_ids),
    "js_messages" => array(
        "confirm_delete_submission", "notify_no_email_template_selected", "confirm_delete_submission_file",
        "phrase_please_confirm", "word_no", "word_yes", "word_close", "phrase_validation_error"
    )
);
$page_vars["head_string"] =<<< EOF
    <script src="$root_url/global/scripts/manage_submissions.js"></script>
    <script src="$root_url/global/scripts/field_types.php"></script>
    <link rel="stylesheet" href="$root_url/global/css/field_types.php" type="text/css" />
$shared_resources
EOF;
$page_vars["head_js"] =<<< END
$validation_js
END;

Themes::displayPage("admin/forms/edit_submission.tpl", $page_vars);
