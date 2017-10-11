(function () {
    "use strict";

    // retrieve data
    var dropdownScript = "dropdownScript.php";
    var dataScript = "dataScript.php";
    var uploadScript = "uploadScript.php";

    // XMLHttpRequest object
    var xmlhttp = null;

    // page variables
    var divDisplay = null;

    //var lblFeedback = null;

    var drpPatient = null;
    var drpVisit = null;

    var lblName = null;
    var lblAge = null;
    var lblVillage = null;
    var lblCase = null;
    
    var btnChart = null;

    var chkDisTest = null;
    var chkDisMED1 = null;
    var chkDisMED2 = null;
    var chkDisGYN = null;
    var chkDisOPHT = null;
    var chkDisDENT = null;
    var chkDisTriageV = null;
    
    var drpLastV = null;
    var drpLastPZQ = null;
    var drpLastWorm = null;
    var drpLastVitA = null;

    var chkParac = null;
    var chkBenz = null;
    var chkCeft = null;

    var chkHealthy = null;
    var chkNTR = null;

    var drpMSK = null;
    var drpWorms = null;
    var drpAsthma = null;
    var drpBron = null;
    var drpPneu = null;
    var drpCough = null;
    var drpMal = null;
    var drpSchisto = null;
    var drpTyphoid = null;
    var drpGERD = null;
    var drpPUD = null;
    var drpHyper = null;
    var drpDiabetes = null;
    var drpCon = null;
    var drpDiarrhea = null;
    var drpPID = null;
    var drpSTI = null;
    var drpSyph = null;
    var drpEye = null;
    var drpVit = null;
    var txtTopical = null;
    var txtOther = null;
    var txtAssess = null;

    var txtWeeks = null;
    var rdoANCYes = null;
    var rdoANCNo = null;
    var rdoAnemiaYes = null;
    var rdoAnemiaNo = null;
    var drpIPTp = null;
    var drpSulfadar = null;

    var txtFollow = null;
    var txtEdu = null;

    var chkTB = null;
    var chkSurgery = null;
    var chkHospital = null;

    var chkTest = null;
    var chkMED1 = null;
    var chkMED2 = null;
    var chkGYN = null;
    var chkOPHT = null;
    var chkDENT = null;
    var chkTriageV = null;

    var btnSubmit = null;

    // construct Spinner object (spin.js) and add to loadingOverlay <div>
    var spinner = new Spinner({ color: '#FFFFFF', lines: 12 }).spin(document.getElementById("loadingOverlay"));

    // inital loading event
    window.addEventListener("load", onInit);

    // ------------------------------------------------------------ start

    function onInit() {
        console.log(">> initializing");

        // loading
        loading();

        // get references
        divDisplay = document.getElementById("divDisplay");

        //lblFeedback = document.getElementById("lblFeedback");
        
        drpPatient = document.getElementById("drpPatient");
        drpVisit = document.getElementById("drpVisit");

        lblName = document.getElementById("lblName");
        lblAge = document.getElementById("lblAge");
        lblVillage = document.getElementById("lblVillage");
        lblCase = document.getElementById("lblCase");
        
        btnChart = document.getElementById("btnChart");
        
        chkDisTest = document.getElementById("chkDisTest");
        chkDisMED1 = document.getElementById("chkDisMED1");
        chkDisMED2 = document.getElementById("chkDisMED2");
        chkDisGYN = document.getElementById("chkDisGYN");
        chkDisOPHT = document.getElementById("chkDisOPHT");
        chkDisDENT = document.getElementById("chkDisDENT");
        chkDisTriageV = document.getElementById("chkDisTriageV");

        drpLastV = document.getElementById("drpLastV");
        drpLastPZQ = document.getElementById("drpLastPZQ");
        drpLastWorm = document.getElementById("drpLastWorm");
        drpLastVitA = document.getElementById("drpLastVitA");

        chkParac = document.getElementById("chkParac");
        chkBenz = document.getElementById("chkBenz");
        chkCeft = document.getElementById("chkCeft");
        
        chkHealthy = document.getElementById("chkHealthy");
        chkNTR = document.getElementById("chkNTR");
    
        drpMSK = document.getElementById("drpMSK");
        drpWorms = document.getElementById("drpWorms");
        drpAsthma = document.getElementById("drpAsthma");
        drpBron = document.getElementById("drpBron");
        drpPneu = document.getElementById("drpPneu");
        drpCough = document.getElementById("drpCough");
        drpMal = document.getElementById("drpMal");
        drpSchisto = document.getElementById("drpSchisto");
        drpTyphoid = document.getElementById("drpTyphoid");
        drpGERD = document.getElementById("drpGERD");
        drpPUD = document.getElementById("drpPUD");
        drpHyper = document.getElementById("drpHyper");
        drpDiabetes = document.getElementById("drpDiabetes");
        drpCon = document.getElementById("drpCon");
        drpDiarrhea = document.getElementById("drpDiarrhea");
        drpPID = document.getElementById("drpPID");
        drpSTI = document.getElementById("drpSTI");
        drpSyph = document.getElementById("drpSyph");
        drpEye = document.getElementById("drpEye");
        drpVit = document.getElementById("drpVit");
        txtTopical = document.getElementById("txtTopical");
        txtOther = document.getElementById("txtOther");
        txtAssess = document.getElementById("txtAssess");
    
        txtWeeks = document.getElementById("txtWeeks");
        rdoANCYes = document.getElementById("rdoANCYes");
        rdoANCNo = document.getElementById("rdoANCNo");
        rdoAnemiaYes = document.getElementById("rdoAnemiaYes");
        rdoAnemiaNo = document.getElementById("rdoAnemiaNo");
        drpIPTp = document.getElementById("drpIPTp");
        drpSulfadar = document.getElementById("drpSulfadar");

        txtFollow = document.getElementById("txtFollow");
        txtEdu = document.getElementById("txtEdu");

        chkTB = document.getElementById("chkTB");
        chkSurgery = document.getElementById("chkSurgery");
        chkHospital = document.getElementById("chkHospital");
    
        chkTest = document.getElementById("chkTest");
        chkMED1 = document.getElementById("chkMED1");
        chkMED2 = document.getElementById("chkMED2");
        chkGYN = document.getElementById("chkGYN");
        chkOPHT = document.getElementById("chkOPHT");
        chkDENT = document.getElementById("chkDENT");
        chkTriageV = document.getElementById("chkTriageV");
    
        btnSubmit = document.getElementById("btnSubmit");

        // clear all
        clearAll();

        // event listener for changing patients
        drpPatient.addEventListener("change", getPatientStats);

        // event listener for visit information
        drpVisit.addEventListener("change", getThisVisit);

        // event listener for the button
        //btnSubmit.addEventListener("click", onSubmit);

        /*
        // feedback from uploading?
        if (lblFeedback.innerHTML !== "") {
            // get the feedback
            feedback(lblFeedback.innerHTML);
        }
        */
        
        // populate dropdowns
        getPatients();
        // dropdowns are done one at a time

        // screen will only be populated if an existing visit is selected

    }

    // ------------------------------------------------------------ private methods

    /*
    function feedback(words) {
        // feedback
        lblFeedback.innerHTML = "<h5>" + words + "</h5>";
        // display for a short time
        $('#lblFeedback').css('display', 'block');
        $('#lblFeedback').delay(4000).fadeOut(1000);
    } */

    function loading() {
        // disable screen by placing the loading overlay on top
        document.getElementById("divDisplay").style.display = "none";
        //document.getElementById("divFooter").style.display = "none";
        document.getElementById("loadingOverlay").style.display = "block";
    }

    function notLoading() {
        // enable screen by removing the loading overlay
        document.getElementById("divDisplay").style.display = "";
        //document.getElementById("divFooter").style.display = "";
        document.getElementById("loadingOverlay").style.display = "none";
        // can not use the shortcut because it doesn't work - no idea why
    }

    function sendJson(json, script, response) {
        // turn object into a string
        var sendString = JSON.stringify(json);
        
        // send string to the server handler
        xmlhttp = new XMLHttpRequest();

        // which response do we want?
        if (response === "patients") {
            xmlhttp.addEventListener("readystatechange", patientsResponse);
        } else if (response === "visits") {
            xmlhttp.addEventListener("readystatechange", visitsResponse);
        } else if (response === "stats") {
            xmlhttp.addEventListener("readystatechange", statsResponse);
        } else if (response === "clinic") {
            xmlhttp.addEventListener("readystatechange", clinicResponse);
        } else if (response === "submit") {
            xmlhttp.addEventListener("readystatechange", submitResponse);
        }

        xmlhttp.open("POST", script, true);
        // tell the server what you're doing
        xmlhttp.setRequestHeader("Content-type", "application/json");
        // send it
        xmlhttp.send(sendString);
    }
    
    function clearAll() {
        lblCase.innerHTML = "Case #";
        
        // tests
        drpLastV.selectedIndex = 0;
        drpLastPZQ.selectedIndex = 0;
        drpLastWorm.selectedIndex = 0;
        drpLastVitA.selectedIndex = 0;

        // drug administration
        chkParac.checked = false;
        chkBenz.checked = false;
        chkCeft.checked = false;

        // diagnosis
        chkHealthy.checked = false;
        chkNTR.checked = false;

        drpMSK.selectedIndex = 0;
        drpWorms.selectedIndex = 0;
        drpAsthma.selectedIndex = 0;
        drpBron.selectedIndex = 0;
        drpPneu.selectedIndex = 0;
        drpCough.selectedIndex = 0;
        drpMal.selectedIndex = 0;
        drpSchisto.selectedIndex = 0;
        drpTyphoid.selectedIndex = 0;
        drpGERD.selectedIndex = 0;
        drpPUD.selectedIndex = 0;
        drpHyper.selectedIndex = 0;
        drpDiabetes.selectedIndex = 0;
        drpCon.selectedIndex = 0;
        drpDiarrhea.selectedIndex = 0;
        drpPID.selectedIndex = 0;
        drpSTI.selectedIndex = 0;
        drpSyph.selectedIndex = 0;
        drpEye.selectedIndex = 0;
        drpVit.selectedIndex = 0;
        txtTopical.value = "";
        txtOther.value = "";
        txtAssess.innerHTML = "";

        // pregnancy
        txtWeeks.value = "";
        rdoANCYes.checked = false;
        rdoANCNo.checked = false;
        rdoAnemiaYes.checked = false;
        rdoAnemiaNo.checked = false;
        drpIPTP.selectedIndex = 0;
        drpSulfadar.selectedIndex = 0;

        // other
        txtFollow.innerHTML = "";
        txtEdu.innerHTML = "";

        // referral
        chkTB.checked = false;
        chkSurgery.checked = false;
        chkHospital.checked = false;

        // stations
        chkTest.checked = false;
        chkMED1.checked = false;
        chkMED2.checked = false;
        chkGYN.checked = false;
        chkOPHT.checked = false;
        chkDENT.checked = false;
        chkTriageV.checked = false;
    }
    
    // ------------------------------------------------------------ event handlers

    // ---------------------------------------------------------------- data requests

    function getPatients() {
        // construct the JSON object to send to the handler
        var sendJSON = {
            "menu": "patients"
        };

        // send the json off
        sendJson(sendJSON, dropdownScript, "patients");
    }
    
    function getPatientStats() {
        // loading
        loading();
        
        // clear the board
        clearAll();

        // construct the JSON object to send to the handler
        var sendJSON = {
            "request": "stats",
            "id": drpPatient[drpPatient.selectedIndex].value
        };

        // send the json off
        sendJson(sendJSON, dataScript, "stats");
    }

    function getVisits() {

        // construct the JSON object to send to the handler
        var sendJSON = {
            "menu": "visits",
            "id": drpPatient[drpPatient.selectedIndex].value
        };

        // send the json off
        sendJson(sendJSON, dropdownScript, "visits");
    }

    function getThisVisit() {
        // clear the board
        clearAll();

        // construct the JSON object to send to the handler
        var sendJSON = {
            "request": "clinic",
            "id": drpVisit[drpVisit.selectedIndex].value
        };

        // send the json off
        sendJson(sendJSON, dataScript, "clinic");
    }

    // ---------------------------------------------------------------- data transfers

    function onSubmit(e) {

        // loading
        loading();
        
        // checkboxes
        var preg = "no";
        var breast = "no";
        if (chkPreg.checked) {
            preg = "yes";
        }
        if (chkBreast.checked) {
            breast = "yes";
        }

        // stations
        var test = "no";
        var med1 = "no";
        var med2 = "no";
        var gyn = "no";
        var opht = "no";
        var dent = "no";
        var triagev = "no";
        if (chkTest.checked) {
            test = "yes";
        }
        if (chkMED1.checked) {
            med1 = "yes";
        }
        if (chkMED2.checked) {
            med2 = "yes";
        }
        if (chkGYN.checked) {
            gyn = "yes";
        }
        if (chkOPHT.checked) {
            opht = "yes";
        }
        if (chkDENT.checked) {
            dent = "yes";
        }
        if (chkTriageV.checked) {
            triagev = "yes";
        }
        // construct json object to send to the handler script
        var sendJSON = {
            "upload": "clinic",
            "patientid": drpPatient[drpPatient.selectedIndex].value,
            "dispensary": drpDispensary[drpDispensary.selectedIndex].value,
            "weight": txtWeight.value.replace(/[^0-9\.-]+/g,""),
            "temp": txtTemp.value.replace(/[^0-9\.-]+/g,""),
            "BPTop": txtBPTop.value,
            "BPBottom": txtBPBottom.value,
            "heart": txtHR.value,
            "glucose": txtGlucose.value,
            "pregnant": preg,
            "breast": breast,
            "living": txtLive.value,
            "grav": txtGrav.value,
            "para": txtPara.value,
            "abortus": txtAbort.value,
            "period": txtLNMP.value,
            "complaint": txtComplaint.value,
            "test": test,
            "med1": med1,
            "med2": med2,
            "gyn": gyn,
            "opht": opht,
            "dent": dent,
            "triagev": triagev
        };
        
        console.log(sendJSON);
        
        // send the json off
        sendJson(sendJSON, uploadScript, "submit");
    }
    
    // ---------------------------------------------------------------- data response

    function patientsResponse(e) {
        if ((xmlhttp.readyState === 4) && (xmlhttp.status === 200)) {
            // remove event listener
            xmlhttp.removeEventListener("readystatechange", patientsResponse);

            // get the json data received
            var response = JSON.parse(xmlhttp.responseText);

            // clear the dropdown
            drpPatient.innerHTML = "";

            // how many entries are in the JSON?
            var entryCount = response.entries.length;

            // do we have entries to display?
            if (entryCount > 0) {

                // populate the dropdown menu
                for (var i = 0; i < entryCount; i++) {

                    // build the option element and add properties
                    var option = new Option();
                    option.id = i;
                    option.text = response.entries[i].name;
                    option.value = response.entries[i].id;

                    // add element to dropdown
                    drpPatient.append(option);
                }

                // set sponsor data for first entry
                drpPatient.selectedIndex = 0;

                // load stats (then visits)
                getPatientStats();

            } else {
                // no data to display

                // build an empty option element and add properties
                var option = new Option();
                option.id = 0;
                option.text = "No Patients";
                option.value = 0;

                // add element to dropdown
                drpPatient.append(option);

                // set sponsor data for first entry
                drpPatient.selectedIndex = 0;

                // not loading 
                notLoading();

                /*
                // failure or no entries?
                if (response.success) {
                    // feedback
                    feedback("No entries in the database");
                } else {
                    feedback(response.reason);
                }
                */
            }
            
        }
    }

    function visitsResponse(e) {
        if ((xmlhttp.readyState === 4) && (xmlhttp.status === 200)) {
            // remove event listener
            xmlhttp.removeEventListener("readystatechange", visitsResponse);

            // get the json data received
            var response = JSON.parse(xmlhttp.responseText);

            // clear the dropdown
            drpVisit.innerHTML = "";

            // how many entries are in the JSON?
            var entryCount = response.entries.length;

            // do we have entries to display?
            if (entryCount > 0) {

                // populate the dropdown menu
                for (var i = 0; i < entryCount; i++) {

                    // build the option element and add properties
                    var option = new Option();
                    option.id = i;
                    var temp = i + 1
                    option.text = "Visit #" + temp;
                    option.value = response.entries[i];

                    // add element to dropdown
                    drpVisit.append(option);
                }

            } else {
                // no data to display
            }

            // set sponsor data for first entry
            drpVisit.selectedIndex = 0;

            // load the first visit selected
            //getThisVisit();
            notLoading();

            /*
            // failure or no entries?
            if (response.success) {
                // feedback
                //feedback("No entries in the database");
            } else {
                //feedback(response.reason);
            }
            */

        }
    }

    function statsResponse(e) {
        if ((xmlhttp.readyState === 4) && (xmlhttp.status === 200)) {
            // remove event listener
            xmlhttp.removeEventListener("readystatechange", statsResponse);

            // get the json data received
            var response = JSON.parse(xmlhttp.responseText);
            
            if (response.success) {
                // populate the data
                // dispensary
                lblName.innerHTML = "Full Name: " + response.entries[0].name;
                lblAge.innerHTML = "Age: " + response.entries[0].age;
                lblVillage.innerHTML = "Village: " + response.entries[0].village;

            } else {

                // bad feedback
                //feedback(response.reason);
            }
            
            // move onto visits
            getVisits();
            
        }
    }

    function clinicResponse() {
        if ((xmlhttp.readyState === 4) && (xmlhttp.status === 200)) {
            // remove event listener
            xmlhttp.removeEventListener("readystatechange", clinicResponse);

            // get the json data received
            var response = JSON.parse(xmlhttp.responseText);
            
            if (response.success) {
                // populate the data

                console.log(response);

                lblCase.innerHTML = "Case #" + drpVisit[drpVisit.selectedIndex].value;

                // run through the dispensary list until we find a match
                for (var n=0;n < drpDispensary.length;n++) {
                    if (drpDispensary[n].value === response.entries[0].dispensary) {
                        drpDispensary.selectedIndex = n;
                        break;
                    }
                    
                }

                txtWeight.value = response.entries[0].weight;
                txtTemp.value = response.entries[0].temp;
                txtBPTop.value = response.entries[0].BPTop;
                txtBPBottom.value = response.entries[0].BPBottom;
                txtHR.value = response.entries[0].heart;
                txtGlucose.value = response.entries[0].glucose;

                // checkboxes
                if (response.entries[0].pregnant === "yes") {chkPreg.checked = true} else {chkPreg.checked = false}
                if (response.entries[0].breast === "yes") {chkBreast.checked = true} else {chkBreast.checked = false}

                txtLive.value = response.entries[0].living;
                txtGrav.value = response.entries[0].grav;
                txtPara.value = response.entries[0].para;
                txtAbort.value = response.entries[0].abortus;
                txtLNMP.value = response.entries[0].period;

                txtComplaint.innerHTML = response.entries[0].complaint;

                // stations
                if (response.entries[0].test === "yes") {chkTest.checked = true} else {chkTest.checked = false}
                if (response.entries[0].med1 === "yes") {chkMED1.checked = true} else {chkMED1.checked = false}
                if (response.entries[0].med2 === "yes") {chkMED2.checked = true} else {chkMED2.checked = false}
                if (response.entries[0].gyn === "yes") {chkGYN.checked = true} else {chkGYN.checked = false}
                if (response.entries[0].opht === "yes") {chkOPHT.checked = true} else {chkOPHT.checked = false}
                if (response.entries[0].dent === "yes") {chkDENT.checked = true} else {chkDENT.checked = false}
                if (response.entries[0].stationv === "yes") {chkTriageV.checked = true} else {chkTriageV.checked = false}

            } else {


                // bad feedback
                //feedback(response.reason);
            }
            
            // not loading
            notLoading();
            
        }
    }

    function submitResponse() {
        if ((xmlhttp.readyState === 4) && (xmlhttp.status === 200)) {
            // remove event listener
            xmlhttp.removeEventListener("readystatechange", statsResponse);

            // get the json data received
            var response = JSON.parse(xmlhttp.responseText);
            
            if (response.success) {
                // update the dropdown
                getVisits();

                // place the visit on the current visit
                drpVisit.selectedIndex[drpVisit.length];

            } else {

                // bad feedback
                //feedback(response.reason);
            }
            
            // not loading
            notLoading();
            
        }
    }

})();