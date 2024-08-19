
<?php 
    require '../assets/shared/patient_sidebar.php';
    require '../includes/dbcon.inc.php';
    require '../includes/class.autoloader.inc.php';

    if(!isset($_SESSION['verify_login_patient'])){

        header('location: patient.login.php');

    }else{

        if($_SESSION['verify_login_patient'] !== true){

            header('location: patient.login.php');

        }
    }

 
?>

<?php $title = $_SESSION['patientfirstname']." ".$_SESSION['patientlastname'];?>
<title><?php echo $title; ?></title>

<?php 


    $globalHelper = new GlobalHelper();

    if(isset($_SESSION['patientviewid'])){
        $id = $_SESSION['patientviewid'];
    }

    if(isset($_SESSION['patientviewmode'])){
        $tmp1 = $_SESSION['patientviewmode'];
        $mode = str_replace(" ", "", $tmp1);
    }

    $sql            = "SELECT * FROM $mode WHERE id=$id";
    $result         = mysqli_query($conn, $sql);
    $patientRow     = mysqli_fetch_array($result);

    $sql1           = "SELECT * FROM emergency_contact WHERE ".$mode."id=$id";
    $result1        = mysqli_query($conn, $sql1);
    $emergencyRow   = mysqli_fetch_array($result1);

    $sql2           = "SELECT * FROM physical_examination WHERE ".$mode."id=$id";
    $result2        = mysqli_query($conn, $sql2);
    $physicalRow    = mysqli_fetch_array($result2);

    $sql3           = "SELECT * FROM allergy WHERE ".$mode."id=$id ";
    $result3        = mysqli_query($conn, $sql3);
    $allergyRow     = mysqli_fetch_array($result3);
    
    $sql4           = "SELECT * FROM medical_history WHERE ".$mode."id=$id ";
    $result4        = mysqli_query($conn, $sql4);
    $historyRow     = mysqli_fetch_array($result4);


    $birthday       = $patientRow['birthday'];
    $cm             = $physicalRow['height'];
    $weight         = $physicalRow['weight'];

    $meter          = $globalHelper->getMeter($cm);
    $realheight     = $globalHelper->getHeight($cm);
    $bmi            = $globalHelper->bmi($meter, $weight);
    $age            = $globalHelper->getAge($birthday);

    if(!empty($patientRow['middlename'])){$tmpMiddleInitial  = $patientRow['middlename'][0]; 
    $middleInitial = $tmpMiddleInitial.".";}else{$middleInitial = null;}

?>
<style>
    body{
        background-color: #e2ebfc;
        font-family: 'Nunito', sans-serif;
    }

    .container{
        margin-top: 70px;
    }

    .main-div{
        background-color: #fff;
    }

    .card1{
        background-color: #fff;
    }

    .card3{
        background-color: #fff;
    }

    .patientimg{
        width: 100px;
        height: 100px;
    }

    .font-green-only{
        color: #32cd32;
    }
</style>

<div class="container pb-5">

    <div class="card1 mt-2 mb-3 rounded shadow p-2">
        <div class="d-flex justify-content-center">
            <img src="<?php echo $patientRow['image']; ?>" alt="" class="patientimg">
        </div>
        <div class="text-center">
            <h6 class="p-0 mt-2"><strong><?php echo $patientRow['firstname']." ".$middleInitial." ".$patientRow['lastname']." ".$patientRow['suffix'];?></strong></h6>
        </div>
        <div class="text-center">
            <span class="badge bg-primary text-white mt-2"><?php if(isset($patientRow['studentnumber'])){echo $patientRow['studentnumber'];}else{echo $patientRow['department'];} ?></span>
            <?php if(isset($patientRow['course'])){echo '<span class="badge bg-secondary text-white mt-2">'.$patientRow['course']." ".$patientRow['year']."-".$patientRow['section'].'</span>';}else{echo null;}?>
        </div>
    </div>

    <div class="main-div shadow rounded p-2">
        <div class="main-header-div border-bottom">
            <h5>Student Information</h5>
        </div>
        <div>
        <div class="ms-2 mt-2">
               <div class="row">
                    <div class="col">
                        <span class="color-gray"><strong>Gender</strong></span><br><span ><?= $patientRow['sex']; ?></span>
                    </div>
                    <div class="col">
                        <span class="color-gray"><strong>Birthday</strong></span><br><span ><?= $patientRow['birthday']?></span>
                    </div>
                    <div class="col">
                        <span class="color-gray"><strong>Age</strong></span><br><span ><?= $age ?></span>
                    </div>
               </div>
            </div>

            <div class="ms-2  mt-4">
               <div class="row">
                    <div class="col">
                        <span class="color-gray"><strong>Status</strong></span><br><span ><?= $patientRow['status']?></span>
                    </div>
                    <div class="col">
                        <span class="color-gray"><strong>Weight</strong></span><br><span class="me-2"><?php echo $physicalRow['weight']." kg"; ?></span><?= $bmi ?>
                    </div>
                    <div class="col">
                        <span class="color-gray"><strong>Height</strong></span><br><span ><?php echo $realheight." ft"; ?></span>
                    </div>
               </div>
            </div>

            <div class="ms-2  mt-4">
               <div class="row">
                    <div class="col">
                        <span class="color-gray" ><strong>Email</strong></span><br><span id="editemail1"><?= $patientRow['email']?></span>
                    </div>
                    <div class="col">
                        <span class="color-gray"><strong>Address</strong></span><br><span ><?= $patientRow['address']?></span>
                    </div>
               </div>
            </div>

            <div class="ms-2  mt-4">
               <div class="row">
                    <div class="col">
                        <span class="color-gray"><strong>Phone</strong></span><br><span ><?= $patientRow['phone']?></span>
                    </div>
                    <div class="col">
                        <span class="color-gray"><strong>Landline</strong></span><br><span ><?php if(empty($patientRow['landline'])){echo '---';}else{echo $patientRow['landline'];}?></span>
                    </div>
               </div>
            </div>
        </div>
    </div>

    <div class="shadow rounded mt-2 card3 p-2">
        <div class="border-bottom">
            <h5>Medical Information</h5>
        </div>

        <div class="mt-2">
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
        
</div>













</body>
</html>