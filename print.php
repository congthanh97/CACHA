<?php
    require 'db.php';
    //grab URL
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
    //parse string for id
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    
    //assign visitID
    $visitID = $query['id'];

    
    $sql = "SELECT * FROM tbl_patient INNER JOIN tbl_visit ON tbl_patient.PatientID = tbl_visit.PatientID WHERE tbl_visit.VisitID = $visitID";

  try{
      $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
      $row = mysqli_fetch_assoc($result);
      
      // $patientID = $row['PatientID'];
      $visitDate = $row['VisitDate'];
      $visitTime = $row['VisitTime'];
      $visitedDispensary = $row['VisitedDispensary'];
      $triageTesting = $row['TriageTesting'];
      $triageMedical = $row['TriageMedical'];
      $triageGYN = $row['TriageGYN'];
      $triageOPHT = $row['TriageOPHT'];
      $triageDENT = $row['TriageDENT'];
      $triageVenDis = $row['TriageVenDis'];
      $weight = $row['Weight'];
      $temperature = $row['Temperature'];
      $bloodPressure = $row['Systolic'] . "/" . $row['Diastolic'];
      $glucose = $row['Glucose'];
      $heartRate = $row['HeartRate'];
      $lastPeriod = $row['LastPeriod'];
      $pregnant = $row['Pregnant'];
      $breastfeed = $row['Breastfeed'];
      $numOfPreg = $row['Gravida'];
      $numLiveBirth = $row['Para'];
      $numAbortions = $row['Abortus'];
      $numLivingChildren = $row['NumLivingChildren'];
      $vTest = $row['VTest'];
      $malariaTest = $row['MalariaTest'];
      $syphilisTest = $row['SyphilisTest'];
      $typhTest = $row['TyphTest'];
      $urineLeucTest = $row['UrineLeucTest'];
      $urineRBCTest = $row['UrineRBCTest'];
      $urineGlucoseTest = $row['UrineGlucoseTest'];
      $urineNitritesTest = $row['UrineNitritesTest'];
      $pregnancyTest = $row['PregnancyTest'];
      $chiefComplaint = $row['ChiefComplaint'];
      $assessment = $row['Assessment'];
      $lastHIVTest = $row['LastHIVTest'];
      $lastPZQTx = $row['LastPZQTx'];
      $lastWormTx = $row['LastWormTx'];
      $lastVitA = $row['LastVitA'];
      $prevMeds = $row['PrevMeds'];
      $dx_Healthy = $row['DX_Healthy'];
      $dx_NoTreatment = $row['DX_NoTreatment'];
      $dx_MSK = $row['DX_MSK'];
      $dx_Worms = $row['DX_Worms'];
      $dx_Asthma = $row['DX_Asthma'];
      $dx_Bronchitis = $row['DX_Bronchitis'];
      $dx_Pneumonia = $row['DX_Pneumonia'];
      $dx_Cough = $row['DX_Cough'];
      $dx_Malaria = $row['DX_Malaria'];
      $dx_Schisto = $row['DX_Schisto'];
      $dx_Typhoid = $row['DX_Typhoid'];
      $dx_Gerd = $row['DX_Gerd'];
      $dx_PUD = $row['DX_PUD'];
      $dx_Diarrhea = $row['DX_Diarrhea'];
      //$dx_DiarrheaBloody = $row['DX_DiarrheaBloody'];
      $dx_Hypertension = $row['DX_Hypertension'];
      $dx_Diabetes = $row['DX_Diabetes'];
      $dx_Constipation = $row['DX_Constipation'];
      $dx_PID = $row['DX_PID'];
      $dx_STI = $row['DX_STI'];
      $dx_Syphilis = $row['DX_Syphilis'];
      $dx_Topical = $row['DX_Topical'];
      $dx_TopicalDescrip = $row['DX_TopicalDesc'];
      $dx_Other = $row['DX_Other'];
      $dx_OtherDescrip = $row['DX_OtherDesc'];
      $regANC = $row['RegANC'];
      $lastIPTpx = $row['LastIPTpx'];
      $clinicalAnemia = $row['ClinicalAnemia'];
      $sulfadar = $row['Sulfadar'];
      $rx_Paracetamol = $row['Rx_Paracetamol'];
      $rx_BenzPen = $row['Rx_BenzPen'];
      $rx_Ceftriaxone = $row['Rx_Ceftriaxone'];
      $rx_Kit_PCM = $row['Rx_Kit_PCM'];
      $rx_Kit_Pregnancy = $row['Rx_Kit_Pregnancy'];
      $rx_ALU = $row['Rx_ALU'];
      $rx_PUD = $row['Rx_PUD'];
      $rx_PZQ_Tabs = $row['Rx_PZQ_Tabs'];
      $rx_PZQ_Dose = $row['Rx_PZQ_Dose'];
      $rx_Eye = $row['Rx_Eye'];
      $rx_Other = $row['Rx_Other'];
      $sp_PatInit = $row['SP_PTInitials'];
      $sp_PatGender = $row['SP_PTSex'];
      $sp_PatPreg = $row['SP_PTPreg'];
      $sp_PatNumMonths = $row['SP_PTMonths'];
      $sp_PatBF = $row['SP_PTBF'];
      $sp_PatMTZ = $row['SP_PTMTZ'];
      $sp_PatDoxy = $row['SP_PTDoxy'];
      $sp_PatAmox = $row['SP_PTAmox'];
      $sp_Par1Init = $row['SP_PT1Initials'];
      $sp_Par1Gender = $row['SP_PT1Sex'];
      $sp_Par1Preg = $row['SP_PT1Preg'];
      $sp_Par1NumMonths = $row['SP_PT1Months'];
      $sp_Par1BF = $row['SP_PT1BF'];
      $sp_Par1MTZ = $row['SP_PT1MTZ'];
      $sp_Par1Doxy = $row['SP_PT1Doxy'];
      $sp_Par1Amox = $row['SP_PT1Amox'];
      $sp_Par2Init = $row['SP_PT2Initials'];
      $sp_Par2Gender = $row['SP_PT2Sex'];
      $sp_Par2Preg = $row['SP_PT2Preg'];
      $sp_Par2NumMonths = $row['SP_PT2Months'];
      $sp_Par2BF = $row['SP_PT2BF'];
      $sp_Par2MTZ = $row['SP_PT2MTZ'];
      $sp_Par2Doxy = $row['SP_PT2Doxy'];
      $sp_Par2Amox = $row['SP_PT2Amox'];
      $sp_Par3Init = $row['SP_PT3Initials'];
      $sp_Par3Gender = $row['SP_PT3Sex'];
      $sp_Par3Preg = $row['SP_PT3Preg'];
      $sp_Par3NumMonths = $row['SP_PT3Months'];
      $sp_Par3BF = $row['SP_PT3BF'];
      $sp_Par3MTZ = $row['SP_PT3MTZ'];
      $sp_Par3Doxy = $row['SP_PT3Doxy'];
      $sp_Par3Amox = $row['SP_PT3Amox'];
      $followUp = $row['FollowUp'];
      $returnTo = $row['ReturnTo'];
      $education = $row['Education'];
      //$practitioners = $row['DR_Register'] . ", " . $row['DR_Clinic'] . ", " . $row['DR_Test'] . ", " . $row['DR_Eye'] . ", " . $row['DR_Dental'] . ", " . $row['DR_Rx'];
      // Use these instead:
      $practitionerClinic = $row['DR_Clinic'];
      $practitionerClinic2 = $row['DR_Clinic2'];
      $practitionerClinic3 = $row['DR_Clinic3'];
      $practitionerTest = $row['DR_Test'];
      $practitionerEye = $row['DR_Eye'];
      $practitionerDental = $row['DR_Dental'];
      $practitionerRx = $row['DR_Rx'];


      $referralTB = $row['RefTB'];
      $referralHospital = $row['RefHospital'];
      $referralSurgery = $row['RefSurgery'];
      $rxNum = $row['RXNum'];
      $firstName = $row['FirstName'];
      $lastName = $row['LastName'];
      $village = $row['Village'];
      $birthYear = $row['BirthYear'];
      $sex = $row['Sex'];
      $eyeVal1 = $row['Eye_Val1'];
      $eyeVal2 = $row['Eye_Val2'];
      $eyeVal3 = $row['Eye_Val3'];
      $pregWeeks = $row['Pregnant_Weeks'];

      $age = date("Y") - $birthYear - 1;

      $returnMission = "no";
      if($returnTo == "mission"){
        $returnMission = "yes";
        $returnDispensary = "";
      } else {
        $returnDispensary = $returnTo;
        $returnMission = "";
      }
      
      $eyes =$row['DX_Eye'];
      $dx_Vit = $row['DX_Vit'];
      
      
      // $practitioners = trim($practitioners);
      // $practitioners = trim($practitioners, ",");
      // $practitioners = trim($practitioners, " ,");

      if(($urineGlucoseTest == "Positive") || ($urineLeucTest == "Positive") || ($urineNitritesTest == "Positive") || ($urineRBCTest == "Positive")){
        $urineTest = "Positive";
      } elseif (($urineGlucoseTest == "Pending") || ($urineLeucTest == "Pending") || ($urineNitritesTest == "Pending") || ($urineRBCTest == "Pending")){
        $urineTest = "Pending";
      } elseif (($urineGlucoseTest == "Negative") || ($urineLeucTest == "Negative") || ($urineNitritesTest == "Negative") || ($urineRBCTest == "Negative")){
        $urineTest = "Negative";
      } elseif (($urineGlucoseTest == "No") || ($urineLeucTest == "No") || ($urineNitritesTest == "No") || ($urineRBCTest == "No")){
        $urineTest = "No";
      } else {
        $urineTest = "--";
      }

      $alu = $row['Rx_ALU'];
      $alu1 = "no";
      $alu2 = "no";
      $alu3 = "no";
      $alu4 = "no";

      if($alu != 0){
        switch($alu){
          case 1:
            $alu1 = "yes";
            break;
          case 2:
            $alu2 = "yes";
            break;
          case 3:
            $alu3 = "yes";
            break;
          case 4:
            $alu4 = "yes";
            break;
        }
        $alu = "yes";

      } else {
        $alu = "no";
  
      }

      $dx_DiarrheaType = $row['DX_DiarrheaBloody'];

      if($dx_DiarrheaType != null){
        switch($dx_DiarrheaType){
          case "yes":
            $dx_DiarrheaType = "(Bloody)";
            break;
          case "no":
            $dx_DiarrheaType = "(Watery)";
            break;
          case "na":
            $dx_DiarrheaType = "";
            break;
        }
      } 

      if($rx_PZQ_Dose == 0){
        $rx_PZQ_Dose = "no";
      } else {
        $rx_PZQ_Dose = "yes";
      }


    } catch(Error $e){
        echo false;
    } finally {
       // mysqli_stmt_close($connect);
        mysqli_close($connect);
    }

    function dropCheckbox($test, $text){
      if(($test != "no") && ($test != null) && ($test != "No")  && ($test != "--")){
        echo "<i class='fa fa-check-square-o fa-lg' style='color:#000000' aria-hidden='true'></i> <span style='padding-right:10px;font-size:10px'>$text</span>";                  
      } else {
        echo "<i class='fa fa-square-o fa-lg' style='color:#000000' aria-hidden='true'></i> <span style='padding-right:10px;font-size:10px'>$text</span>";
      }
    }

    function dropContent($text) {
      if ($text == "") {
        $text = "--";
      }
      echo "<span style='color:#000000;padding-right:10px'>$text</span>";
    }

    function severity($test, $text){
      $severity = "";
      if($test === "0"){
        $text = "";
        $Severity = "";
      } elseif($test === "1"){
        $severity = " +";
      } elseif($test === "2") {
        $severity = " ++";
      }elseif($test === "3"){
        $severity = " +++";
      }

      echo $text . $severity;
    }
    
    function practitioner($test, $text){
      $practitioner = "";
      if($test == null){
        $text = "";
        $practitioner = "";
      } elseif($test == "1"){
        $practitioner = " Karin Eulre";
      } elseif($test == "2") {
        $practitioner = " Chris Nolan";
      }elseif($test == "3"){
        $practitioner = " Mark Hardy";
      }elseif($test == "4"){
        $practitioner = " Christa Wilton";
      }elseif($test == "5"){
        $practitioner = " Jessica Fong";
      }elseif($test == "6"){
        $practitioner = " Deanna Rumsey";
      }elseif($test == "7"){
        $practitioner = " Wade Mitchell";
      }elseif($test == "8"){
        $practitioner = " Tara Andrusiak";
      }elseif($test == "9"){
        $practitioner = " Judy Kyte";
      }elseif($test == "10"){
        $practitioner = " Nancy Laframboise";
      }elseif($test == "11"){
        $practitioner = " Warren Meek";
      }elseif($test == "12"){
        $practitioner = " Dave Glass";
      }elseif($test == "13"){
        $practitioner = " Erin MacKenzie";
      }elseif($test == "14"){
        $practitioner= " Kelly Crotty";
      }elseif($test == "16"){
        $practitioner= " Marianne Sumerman";
      }elseif($test == "17"){
        $practitioner= " Nyanda  Kombe";
      }elseif($test == "18"){
        $practitioner= " Rosalina Rutagarang";
      }elseif($test == "19"){
        $practitioner= " LAB NDH";
      }elseif($test == "20"){
        $practitioner= " Matoka DDS NDH";
      }elseif($test == "21"){
        $practitioner= " Veronique M.";
      }


      echo $text . $practitioner;
    }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified CSS -->
    <!-- Bootstrap core CSS -->
    <link href="bin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/reportStyles.css">
    <title>CACHA : Patient Report</title>
  </head>
  <body>

    <div id="container" class="small">

      <div class="row">

        <div class="col-7">
          <h4>Canada-Africa Community Health Alliance</h4>
          <div>Alliance de Sante Communitaire Canada-Afrique</div>
          Triage: <!--<?php //dropContent("Sample Text"); ?> Not sure anything is supposed to be here -->


          Testing: <?php dropContent($triageTesting); ?>
          <div>
            Triage:
            MED: <?php dropContent($triageMedical); ?>
            GYN: <?php dropContent($triageGYN); ?>
            OPT: <?php dropContent($triageOPHT); ?>
            DENT: <?php dropContent($triageDENT); ?>
            V: <?php dropContent($triageVenDis); ?>
          </div>
        </div>

        <div class="col-5" style="background:#EAFFDE">
          CHART#: <?php dropContent($visitID); ?><br>
          DISPENSARY: <?php dropContent($visitedDispensary); ?><br>
          TIME: <?php dropContent($visitTime); ?><br>
          DATE: <?php dropContent($visitDate); ?><br>
        </div>

      </div>

      <div class="row">

        <div class ="col-6" style="background:#FEDEDE">
          Name: <?php dropContent($firstName . " " . $lastName); ?><br>
          Village: <?php dropContent($village); ?><br>
          <div>
            G: <?php dropContent( $numOfPreg); ?>
            P: <?php dropContent( $numLiveBirth); ?>
            A: <?php dropContent( $numAbortions); ?>
          </div>
          <div>
            #Living Children: <?php dropContent( $numLivingChildren); ?>
            LNMP: <?php dropContent( $lastPeriod); ?>
          </div>
        </div>

        <div class ="col-6" style="background:#E6A9A9">
          <div>
            <?php if ($sex == "male") : ?>
              <?php dropCheckbox("yes", "M"); ?>
              <?php dropCheckbox("no", "F"); ?>
            <?php else : ?>
              <?php dropCheckbox("no", "M"); ?>
              <?php dropCheckbox("yes", "F"); ?>
            <?php endif ?>          
            AGE: <?php dropContent( $age); ?>
            WEIGHT: <?php dropContent( $weight); ?>KG
          </div>
          <div>
            TEMP: <?php dropContent($temperature); ?>
            BP: <?php dropContent($bloodPressure); ?>
          </div>
          <div>
            GLUCOSE: <?php dropContent($glucose); ?>
            HR: <?php dropContent($heartRate); ?>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-4" style="background:#F4BB38">
          <span style="font-weight:bold">Chief Complaint:</span><br>
          <?php dropContent($chiefComplaint); ?>
        </div>

        <div class="col-8" style="background:#FFF5DC">

          <div class="row">
            <div class="col-12">
                <?php dropCheckbox($pregnant, "Pregnant");  ?>
                <?php dropCheckbox($breastfeed, "Breastfeeding"); ?>
            </div>
          </div>

          <div class="row" style="padding-top:10px">
            <div class="col-2">
              <?php dropCheckbox($vTest, "V"); ?><br>
              <?php dropContent( $vTest); ?>
            </div>

            <div class="col-2">
              <?php dropCheckbox($malariaTest, "MALARIA"); ?><br>
              <?php dropContent( $malariaTest); ?>
            </div>

            <div class="col-2">
              <?php dropCheckbox($syphilisTest, "SYPHILIS"); ?><br>
              <?php dropContent( $syphilisTest); ?>
            </div>

            <div class="col-2">
              <?php dropCheckbox($typhTest, "TYPH"); ?><br>
              <?php dropContent( $typhTest); ?>
            </div>

            <div class="col-2">
              <?php dropCheckbox($pregnancyTest, "PREGNANCY"); ?><br>
              <?php dropContent( $pregnancyTest); ?>
            </div>

            <div class="col-2">
              <?php dropCheckbox($urineTest, "URINE"); ?><br>
              <?php dropContent( $urineTest); ?>
            </div>
          </div>

          <div class="row" style="padding-top:10px">
            <div class="col-12">
              LEUC: <?php dropContent( $urineLeucTest); ?>
              RBC: <?php dropContent( $urineRBCTest); ?>
              GLUCLOSE: <?php dropContent( $urineGlucoseTest); ?>
              NITRITES: <?php dropContent( $urineNitritesTest); ?>
            </div>
          </div>

        </div>

      </div>

      
      <div class="row">

        <div class="col-5" style="background:#EAFFDE">
          <span style="font-weight:bold">ASSESSMENT:</span><br>
          <?php dropContent($assessment); ?>
        </div>

        <div class="col-4" style="background:#EAFFDE">
          LAST HIV TEST? <?php dropContent( $lastHIVTest); ?>3 months<br>
          LAST PZQ TX? <?php dropContent( $lastPZQTx); ?>6 months<br>
          LAST WORM TX? <?php dropContent( $lastWormTx); ?>6 months<br>
          LAST VIT A? <?php dropContent( $lastVitA); ?>6 months<br>
          PREV MEDS? <?php dropContent( $prevMeds); ?>
        </div>
        <div class="col-3" style="background:#EAFFDE">

              <!-- THIS IS GREASY INDEED!!!! -->
              <table>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        <p style="font-size:5em">V</p>
                    </td>
                    <td>
                        <table>
                            <tr><td>&nbsp;</td></tr>
                            <tr><td>val 1</td></tr>
                            <tr>
                                <td>
                                <?php dropContent($eyeVal1); ?>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                              <td style="text-align: center; width: 300px;">
                                val 3
                                <br>
                                <?php dropContent($eyeVal3); ?>
                              </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr><td>val 2</td></tr>
                            <tr>
                                <td>
                                <?php dropContent($eyeVal2); ?>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                        </table>
                    </td>
                    <td>
                      Eye:<?php dropContent($rx_Eye); ?>
                    </td>

                </tr>
            </table>
            <!-- THIS IS GREASY INDEED!!!! -->
          </div>
      </div>
      

      <div class="row">

        <div class="col-7" style="background:#FEDEDE">
          <div style="border-bottom:1px solid; margin-bottom:5px;font-weight:bold">
            DX: (DON'T FORGET +, ++, or +++) AND NTR (No Treatment)
          </div>
          <div class="row">
            <div class="col-3">
              <?php dropCheckbox($dx_Healthy, "HEALTHY"); ?>
            </div>
            <div class="col-3">
              <?php dropCheckbox($dx_NoTreatment, "NTR"); ?>
            </div>
            <div class="col-3">
              <?php severity($dx_MSK, "MSK"); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <?php severity($dx_Worms, "WORMS"); ?>
            </div>
            <div class="col-3">
              <?php severity($dx_Asthma, "ASTHMA"); ?>
            </div>
          </div>
          <div class="row">
             <div class="col-3">
              <?php severity($dx_Bronchitis, "BRONCHITUS"); ?>
            </div>
            <div class="col-3">
              <?php severity($dx_Pneumonia, "PNEUMONIA"); ?>
            </div>
            <div class="col-3">              
              <?php severity($dx_Cough, "COUGH"); ?>
            </div>
            <div class="col-3">
              <?php severity($dx_Malaria, "MALARIA"); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <?php severity($dx_Schisto, "SCHISTO"); ?>
            </div>
            <div class="col-3">
              <?php severity($dx_Typhoid, "TYPHOD"); ?>
            </div>
            <div class="col-3">
              <?php severity($dx_Gerd, "GERD"); ?>
            </div>
            <div class="col-3">
              <?php severity($dx_PUD, "PUD"); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <?php severity($dx_Constipation, "CONSTIPATION"); ?>
            </div>
            <div class="col-3">
              <?php severity($dx_Diarrhea, "DIARRHEA"); ?>
              <?php echo $dx_DiarrheaType; ?>
              
            </div>
            <div class="col-3">
              <?php severity($dx_Hypertension, "HYPERTENSION"); ?>
            </div>
            <div class="col-3">
              <?php severity($dx_Diabetes, "DIABETES"); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <?php severity($dx_PID, "PID"); ?>
            </div>
            <div class="col-3">              
              <?php severity($dx_STI, "STI"); ?>
            </div>
            <div class="col-3">
              <?php severity($dx_Syphilis, "SYPHILIS"); ?>
            </div>
            <div class="col-3">
              <?php severity($eyes, "EYES"); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <?php severity($dx_Vit, "VITAMINS"); ?>
            </div>
            <div class="col-3">
              <?php severity($dx_Topical, "TOPICAL"); ?> <?php dropContent($dx_TopicalDescrip); ?>
            </div>
            <div class="col-3">
              <?php severity($dx_Other, "OTHER"); ?> <?php dropContent($dx_OtherDescrip); ?>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              PREGNANT: <?php dropContent($pregWeeks) ?> WEEKS
            </div>
            <div class="col-8">
              REGULAR ANC: 
              <?php if ($regANC == "yes") : ?>
                <?php dropCheckbox("yes","YES"); ?>
                <?php dropCheckbox("no","NO"); ?>
              <?php elseif ($regANC == "no") : ?>
                <?php dropCheckbox("no","YES"); ?>
                <?php dropCheckbox("yes","NO"); ?>
              <?php else : ?>
                <?php echo "--"; ?>
              <?php endif ?>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              PREVIOUS IPTp: 
              <?php dropContent($lastIPTpx) ?>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              LAST  IPTp:  
              <?php dropContent($lastIPTpx) ?>
               -1 MONTH AGO
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              CLINICAL ANEMIA: 
              <?php if ($clinicalAnemia == "yes") : ?>
                <?php dropCheckbox("yes","YES"); ?>
                <?php dropCheckbox("no","NO"); ?>
              <?php elseif ($clinicalAnemia == "no") : ?>
                <?php dropCheckbox("no","YES"); ?>
                <?php dropCheckbox("yes","NO"); ?>
              <?php else : ?>
                <?php echo "--"; ?>
              <?php endif ?>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              SULFAAR SP500/25: TABS 
              <?php if ($sulfadar == "3") : ?>
                <?php dropCheckbox("yes","3"); ?>
                <?php dropCheckbox("no","6"); ?>
                <?php dropCheckbox("no","9"); ?>
              <?php elseif($sulfadar == "6") : ?>
                <?php dropCheckbox("no","3"); ?>
                <?php dropCheckbox("yes","6"); ?>
                <?php dropCheckbox("no","9"); ?>
              <?php elseif($sulfadar == "9") : ?>
                <?php dropCheckbox("no","3"); ?>
                <?php dropCheckbox("no","6"); ?>
                <?php dropCheckbox("yes","9"); ?>
              <?php else : ?>
                <?php dropCheckbox("no","3"); ?>
                <?php dropCheckbox("no","6"); ?>
                <?php dropCheckbox("no","9"); ?>
              <?php endif ?>
            </div>
          </div>
        </div>

        <div class="col-5" style="background:#D0F8B9">
          <div class="row">
            <div class="col-4" style="font-weight:bold">ADMIN:</div>
            <div class="col-4"><?php dropCheckbox($rx_Paracetamol, "PARACETAMOL"); ?></div>
            <div class="col-4"><?php dropCheckbox($rx_BenzPen, "BENZ-PEN-G 2.4 MIU"); ?></div>
          </div>
          <div class="row" style="border-bottom:1px solid">
            <div class="col-8 ml-auto"><?php dropCheckbox($rx_Ceftriaxone, "CEFTRIAXONE 250MG"); ?></div>
          </div>
          <div>
            <div class="row">
            <div class="col-2">KIT:</div>
            <div class="col-5"><?php dropCheckbox($rx_Kit_PCM, "(PCM-ALB/MEB)"); ?></div>
            <div class="col-5"><?php dropCheckbox($rx_Kit_Pregnancy, "PREGNANCY KIT(VITS+FE)"); ?></div>
            </div>
            <div class="row">
            <div class="col-4"><?php dropCheckbox($alu, "ALU 3/7"); ?></div>
            <div class="col-2"><?php dropCheckbox($alu1, "1x2"); ?></div>
            <div class="col-2"><?php dropCheckbox($alu2, "2x2"); ?></div>
            <div class="col-2"><?php dropCheckbox($alu3, "3x2"); ?></div>
            <div class="col-2"><?php dropCheckbox($alu4, "4x2"); ?></div>
            </div>
            <div class="row">
            <div class="col-12"><?php dropCheckbox($rx_PUD, "PUD: 7/7 AMOX250 3X2 + OMEP20 1X2+ MTZ200MG 3X2"); ?></div>
            </div>
            <div class="row">
            <div class="col-4">
              <?php if ($rx_PZQ_Tabs > 0) : ?>
                <?php dropCheckbox("yes","PZQ600mg"); ?>
              <?php else : ?>
                <?php dropCheckbox("no","PZQ600mg"); ?>
              <?php endif ?>
            </div>
            <div class="col-8">#TABS STAT: <?php dropContent($rx_PZQ_Tabs); ?></div>
            </div>
          </div>
          <div>
            Other RX:<?php dropContent($rx_Other); ?>
          </div>


        </div>
      </div>

      <div class="row">

        <div class="col-6" style="background:#AAD6FD">
          <div style="padding-bottom:5px;">
            <span style="font-weight:bold">FOLLOW-UP:</span><br>
            <?php dropContent( $followUp); ?>
          </div>
          <div>
            RETURN DURING MISSION: <?php dropCheckbox($returnMission, "YES"); ?>
            OR TO DISPENSARY> <?php dropContent( $returnDispensary); ?> DAYS
          </div>
        </div>
        <div class="col-6">

          <table style="width:100%">
            <!-- unsure about populating the rest -->
            <tr>
              <th colspan="4">STI or PID</th>
              <th colspan="2">#</th>
              <th>200MG</th>
              <th>100MG</th>
              <th>250MG</th>
            </tr>
            <tr>
              <th></th>
              <th>INITIALS</th>
              <th>SEX</th>
              <th>PREG</th>
              <th>MTH</th>
              <th>B.F.</th>
              <th>MTZ</th>
              <th>DOXY</th>
              <th>AMOX</th>
            </tr>
            <tr>
              <td>PT</td>
              <td><?php dropContent( $sp_PatInit); ?></td>
              <td><?php dropContent( $sp_PatGender); ?></td>
              <td><?php dropContent( $sp_PatPreg); ?></td>
              <td><?php dropContent( $sp_PatNumMonths); ?></td>
              <td><?php dropContent( $sp_PatBF); ?></td>
              <td><?php dropContent( $sp_PatMTZ); ?></td>
              <td><?php dropContent( $sp_PatDoxy); ?></td>
              <td><?php dropContent( $sp_PatAmox); ?></td>
            </tr>
            <tr>
              <td>P1</td>
              <td><?php dropContent( $sp_Par1Init); ?></td>
              <td><?php dropContent( $sp_Par1Gender); ?></td>
              <td><?php dropContent( $sp_Par1Preg); ?></td>
              <td><?php dropContent( $sp_Par1NumMonths); ?></td>
              <td><?php dropContent( $sp_Par1BF); ?></td>
              <td><?php dropContent( $sp_Par1MTZ); ?></td>
              <td><?php dropContent( $sp_Par1Doxy); ?></td>
              <td><?php dropContent( $sp_Par1Amox); ?></td>
            </tr>
            <tr>
              <td>P2</td>
              <td><?php dropContent( $sp_Par2Init); ?></td>
              <td><?php dropContent( $sp_Par2Gender); ?></td>
              <td><?php dropContent( $sp_Par2Preg); ?></td>
              <td><?php dropContent( $sp_Par2NumMonths); ?></td>
              <td><?php dropContent( $sp_Par2BF); ?></td>
              <td><?php dropContent( $sp_Par2MTZ); ?></td>
              <td><?php dropContent( $sp_Par2Doxy); ?></td>
              <td><?php dropContent( $sp_Par2Amox); ?></td>
            </tr>
            <tr>
              <td>P3</td>
              <td><?php dropContent( $sp_Par3Init); ?></td>
              <td><?php dropContent( $sp_Par3Gender); ?></td>
              <td><?php dropContent( $sp_Par3Preg); ?></td>
              <td><?php dropContent( $sp_Par3NumMonths); ?></td>
              <td><?php dropContent( $sp_Par3BF); ?></td>
              <td><?php dropContent( $sp_Par3MTZ); ?></td>
              <td><?php dropContent( $sp_Par3Doxy); ?></td>
              <td><?php dropContent( $sp_Par3Amox); ?></td>
            </tr>
          </table>

        </div>
      </div>

      <div class="row">
        <div class="col-12" style="background:#FFD4AB">
          <span style="font-weight:bold">EDUCATION:</span><br>
          <?php dropContent($education); ?>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <span style="font-weight:bold">PRACTITIONERS:</span><br>
          <?php practitioner($practitionerClinic, "Clinc: ") ?>
          <?php practitioner($practitionerClinic2, "Clinc2: ") ?>
          <?php practitioner($practitionerClinic3, "Clinc3: ") ?>
          <?php practitioner($practitionerTest, "Test: ") ?>
          <?php practitioner($practitionerEye, "Eye: ") ?>
          <?php practitioner($practitionerDental, "Dental: ") ?>
          <?php practitioner($practitionerRx, "Rx: ") ?>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <span style="font-weight:bold">REFERRAL:</span>
            <?php if ($referralTB == "yes") : ?>
            <?php dropCheckbox("yes","TB"); ?>
            <?php else : ?>
              <?php dropCheckbox("no","TB"); ?>
            <?php endif ?>
            <?php if ($referralHospital == "yes") : ?>
            <?php dropCheckbox("yes","Hospital"); ?>
            <?php else : ?>
              <?php dropCheckbox("no","Hospital"); ?>
            <?php endif ?>
            <?php if ($referralSurgery == "yes") : ?>
            <?php dropCheckbox("yes","Surgey"); ?>
            <?php else : ?>
              <?php dropCheckbox("no","Surgery"); ?>
            <?php endif ?>
          <span style="font-weight:bold">RX #:</span> <?php dropContent($rxNum); ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="bin/jquery-3.2.1.min.js"></script>
    <script src="bin/bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="bin/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bin/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
