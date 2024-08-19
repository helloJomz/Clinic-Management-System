<?php 

require '../dbcon.inc.php';
require '../class.autoloader.inc.php';

if(isset($_POST['viewConfirmProfile'])){
    
    $viewid = $_POST['patientid'];
    $viewpatient = $_POST['patientmode'];

    // PATIENT ROW
    $sql = "SELECT * FROM $viewpatient WHERE id=$viewid";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    // PHYSICAL ROW
    $phyQuery = "SELECT * FROM physical_examination WHERE ".$viewpatient."id=$viewid ";
    $phyResult = mysqli_query($conn, $phyQuery);
    $physicalRow = mysqli_fetch_array($phyResult);

    // MEDICAL HISTORY ROW
    $medQuery = "SELECT * FROM medical_history WHERE ".$viewpatient."id=$viewid ";
    $medResult = mysqli_query($conn, $medQuery);
    $medRow = mysqli_fetch_array($medResult);

    // ALLERGY ROW
    $allQuery = "SELECT * FROM allergy WHERE ".$viewpatient."id=$viewid ";
    $allResult = mysqli_query($conn, $allQuery);
    $allergyRow = mysqli_fetch_array($allResult);

    //CLASSES
    $birthday       = $row['birthday'];
    $cm             = $physicalRow['height'];
    $weight         = $physicalRow['weight'];

    $globalHelper = new GlobalHelper();
    $meter          = $globalHelper->getMeter($cm);
    $realheight     = $globalHelper->getHeight($cm);
    $bmi            = $globalHelper->bmi($meter, $weight);
    $age            = $globalHelper->getAge($birthday);

    ?>
    <div class="container fetchprofile p-0">
        <div class="bg-blue text-center pt-3"> 
            <img src="<?php echo $row['image']; ?>" alt="" class="shadow">
        </div>
        <div class="bg-blue p-3 ps-5 pe-5">
            <div class="text-center border-bottom">
                 <h4 class="text-white"><strong>
                    <?php 
                    if(!empty($row['middlename'])){ $middleinitial = $row['middlename'][0]."."; }else{$middleinitial = '';}
                    echo ucwords($row['firstname'])." ".ucwords($middleinitial)." ".ucwords($row['lastname'])." ".$row['suffix']; 
                    ?></strong>
                </h4>
                <span class="badge bg-secondary fs-6 mb-3 shadow"><?php if(isset($row['studentnumber']) && !empty($row['studentnumber'])){echo $row['studentnumber'];}else{echo $row['department'];}?></span>
            </div>
        </div>

        <div class="bg-light info-card  p-3">
            <h6 class=""><strong>Patient Information</strong></h6>
            
            <div class="mt-3 d-flex ">
                <h6 class="me-4">Weight: <?php echo $weight." kg"." ".$bmi;?></h6>
                <h6>Height: <?php echo $realheight." ft";?></h6>
            </div>

            <div class="mt-3">
                <h6><strong>Allergy</strong></h6>
                <?php if(empty($allergyRow['food']) && empty($allergyRow['drug']) && empty($allergyRow['substance']) && empty($allergyRow['others'])){
                    ?>
                    <div class="alert alert-success" role="alert"><i class="fas fa-check me-2 font-green-only"></i>This patient has no known allergy.</div>
                    <?php
                }else{
                    ?>
                    <div class="bg-lightblue p-1 pe-3 ps-3  pb-1 rounded allergycard shadow-sm">
                        <h6 class="pt-1"><strong>Foods</strong></h6>
                        <h6 class="border-bottom pb-2"><?php if(empty($allergyRow['food'])){echo '<i class="fas fa-check me-2 font-green-only"></i> This patient has no known allergy with foods.';}else{echo '<i class="fas fa-exclamation-triangle text-warning me-2"></i>'.$allergyRow['food'];} ?></h6>

                        <h6 class="pt-1"><strong>Drugs</strong></h6>
                        <h6 class="border-bottom pb-2"><?php if(empty($allergyRow['drug'])){echo '<i class="fas fa-check me-2 font-green-only"></i> This patient has no known allergy with drugs.';}else{echo '<i class="fas fa-exclamation-triangle text-warning me-2"></i>'.$allergyRow['drug'];} ?></h6>

                        <h6 class="pt-1"><strong>Substances</strong></h6>
                        <h6 class="border-bottom pb-2"><?php if(empty($allergyRow['substance'])){echo '<i class="fas fa-check me-2 font-green-only"></i> This patient has no known allergy with substances.';}else{echo '<i class="fas fa-exclamation-triangle text-warning me-2"></i>'.$allergyRow['substance'];} ?></h6>

                        <h6 class="pt-1"><strong>Others</strong></h6>
                        <h6 class="border-bottom pb-2"><?php if(empty($allergyRow['others'])){echo '<i class="fas fa-check me-2 font-green-only"></i> This patient has no known other allergies.';}else{echo '<i class="fas fa-exclamation-triangle text-warning me-2"></i>'.$allergyRow['others'];} ?></h6>
                    </div>
                    <?php
                }
                ?>
            </div>
            
            <div class="mt-3">
                <h6><strong>Existing Conditions</strong></h6> 
                <h6><?php if(empty($medRow['existing_condition'])){echo '<div class="alert alert-success" role="alert"><i class="fas fa-check me-2 font-green-only"></i>This patient has no Existing Conditions.</div>';}else{echo '<i class="fas fa-exclamation-triangle text-warning me-2"></i>'.$medRow['existing_condition'];} ?></h6>
            </div>

            <div class="mt-3">
                <h6><strong>Medications</strong></h6> 
                <h6><?php if(empty($medRow['medications'])){echo '<div class="alert alert-success" role="alert"><i class="fas fa-check me-2 font-green-only "></i>This patient is not taking any Medications.</div>';}else{echo '<i class="fas fa-exclamation-triangle text-warning me-2"></i>'.$medRow['medications'];} ?></h6>
            </div>

        </div>

    </div>

    <?php
}

?>