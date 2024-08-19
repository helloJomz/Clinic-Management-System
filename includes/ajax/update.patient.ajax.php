<?php 

include_once '../class.autoloader.inc.php';
include_once '../dbcon.inc.php';
$studentControl = new StudentControl();
$globalHelper = new GlobalHelper();

session_start();

if(isset($_POST['btnChangeEmail'])){
    
    $id             = $_POST['id'];
    $newEmail       = $_POST['newEmail'];
    $rptNewEmail    = $_POST['rptNewEmail'];
    $email          = $newEmail;

    if(empty($newEmail) || empty($rptNewEmail)){
        echo 'emptyemail';
        exit;
    }

    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)){
        echo 'invalidemail';
        exit;
    }

    if($newEmail !== $rptNewEmail){
        echo 'emailnotmatch';
        exit;
    }

    if($studentControl->emailExists($conn, $email) !== false){
        echo 'emailexists';
        exit;
    }
    
    $sql    = "UPDATE student SET email='$newEmail' WHERE id=$id ";
    $output = mysqli_query($conn, $sql);

    $query          = "SELECT * FROM student WHERE id=$id";
    $result         = mysqli_query($conn, $query);
    $row            = mysqli_fetch_array($result);
    $finalEmail     = $row['email'];

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $studentnumber = $row['studentnumber'];

     // SETTINGS LOG
     $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
     $activity      =  "Email of ".$firstname." ".$lastname." with a student number ".$studentnumber." has been changed.";
     $label         = 'update_student';
     $date          = date("Y-m-d H:i:s");

     $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);

    echo $finalEmail;
}

//////////////////////STUDENT NUMBER/////////////////////////
if(isset($_POST['btnsn'])){
    
    $id             = $_POST['id'];
    $newsn          = $_POST['newsn'];
    $rptnewsn       = $_POST['rptnewsn'];
    $studentnumber  = $newsn;

    if(empty($newsn) || empty($rptnewsn)){
        echo 'emptysn';
        exit;
    }

    if (!preg_match("/^[0-9]+-[0-9]+-[a-zA-z]+-[0-9]+$/", $studentnumber)){
        echo 'invalidsn';
        exit;
    }

    if($newsn !== $rptnewsn){
        echo 'snnotmatch';
        exit;
    }

    if($studentControl->studentnumberExists($conn, $studentnumber) !== false){
        echo 'snexists';
        exit;
    }

    $sql    = "UPDATE student SET studentnumber='$newsn' WHERE id=$id ";
    $output = mysqli_query($conn, $sql);

    $query          = "SELECT * FROM student WHERE id=$id";
    $result         = mysqli_query($conn, $query);
    $row            = mysqli_fetch_array($result);
    $finalSN        = $row['studentnumber'];

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $studentnumber = $row['studentnumber'];

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      =  "Student Number of ".$firstname." ".$lastname." with a student number ".$studentnumber." has been changed.";
    $label         = 'update_student';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);

    echo $finalSN;

}

//////////////////////PASSWORD/////////////////////////

if(isset($_POST['btnpwd'])){
    
    $id         =   $_POST['id'];
    $newpwd     =   $_POST['newpwd'];
    $rptnewpwd  =   $_POST['rptnewpwd'];
    $hashedPwd  = password_hash($newpwd, PASSWORD_DEFAULT);

    if(empty($newpwd) || empty($rptnewpwd)){
        echo 'emptypwd';
        exit;
    }

    if($newpwd !== $rptnewpwd){
        echo 'pwdnotmatch';
        exit;
    }

    if($studentControl->passwordExists($conn, $id, $newpwd) == 'exist'){
        echo 'pwdexist';
        exit;
    }

    $sql    = "UPDATE student SET password='$hashedPwd' WHERE id=$id ";
    $output = mysqli_query($conn, $sql);

    $query          = "SELECT * FROM student WHERE id=$id";
    $result         = mysqli_query($conn, $query);
    $row            = mysqli_fetch_array($result);
    $finalPwd       = $row['password'];

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $studentnumber = $row['studentnumber'];

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      =  "Password of ".$firstname." ".$lastname." with a student number ".$studentnumber." has been changed.";
    $label         = 'update_student';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);
    
    echo $finalSN;
}

/////////////////////// PATIENT INFO ////////////////////////////

if(isset($_POST['btnEditPatient'])){
    
    $id = $_POST['id'];     $bday       = $_POST['bday'];           $landline   = $_POST['landline'];
    $fn = $_POST['fn'];     $gender     = $_POST['gender'];         $course     = $_POST['course'];
    $mn = $_POST['mn'];     $status     = $_POST['status'];         $year       = $_POST['year'];
    $ln = $_POST['ln'];     $address    = $_POST['address'];        $section    =$_POST['section'];
    $sf = $_POST['sf'];     $phone      = $_POST['phone'];
    
    if(empty($fn) || empty($ln) || empty($address) || empty($phone)){
        echo json_encode('emptyfields');
        exit;
    }
    if(!preg_match("/^[a-zA-z ]*$/", $mn)){
        echo json_encode('invalidmn');
        exit;
    }
    if(!preg_match("/^[a-zA-z ]*$/", $fn)){
        echo json_encode('invalidfn');
        exit;
    }
    if(!preg_match("/^[a-zA-z ]*$/", $ln)){
        echo json_encode('invalidln');
        exit;
    }
    if (!preg_match('/^[0-9]*$/', $phone)){
        echo json_encode('invalidphone');
        exit;
    }
    if (!preg_match('/^[0-9]*$/', $landline)){
        echo json_encode('invalidlandline');
        exit;
    }
    if (strlen($phone) < 11 ){
        echo json_encode('lessphone');
        exit;
    }
    if (strlen($phone) > 11 ){
        echo json_encode('overphone');
        exit;
    }

    $sql = "UPDATE student SET firstname='$fn', middlename='$mn', lastname='$ln', suffix='$sf', birthday='$bday', 
            sex='$gender', status='$status', address='$address', phone='$phone', landline='$landline', course='$course',
            year='$year', section='$section' WHERE id=$id ";
    mysqli_query($conn, $sql);

    $query          = "SELECT * FROM student WHERE id=$id";
    $result         = mysqli_query($conn, $query);
    $row            = mysqli_fetch_array($result);

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $studentnumber = $row['studentnumber'];

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      =  "Personal Information of ".$firstname." ".$lastname." with a student number ".$studentnumber." has been changed.";
    $label         = 'update_student';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);
    
    echo json_encode($row);
}

////////////////// EMERGENCY INFO ////////////////////////////

if(isset($_POST['btnEditEmergency'])){
    
    $id             = $_POST['id'];
    $fn             = $_POST['fn'];
    $ln             = $_POST['ln'];
    $address        = $_POST['address'];
    $phone          = $_POST['phone'];
    $email          = $_POST['email'];
    $relationship   = $_POST['relationship'];
    $landline       = $_POST['landline'];


    if(empty($fn) || empty($ln) || empty($address) || empty($phone)){
        echo json_encode('emptyfields');
        exit;
    }
    if(!preg_match("/^[a-zA-z ]*$/", $fn)){
        echo json_encode('invalidfn');
        exit;
    }
    if(!preg_match("/^[a-zA-z ]*$/", $ln)){
        echo json_encode('invalidln');
        exit;
    }

    if(!empty($email)){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo json_encode('invalidemail');
            exit;
        }
    }

    if (!preg_match('/^[0-9]*$/', $phone)){
        echo json_encode('invalidphone');
        exit;
    }
    if (!preg_match('/^[0-9]*$/', $landline)){
        echo json_encode('invalidlandline');
        exit;
    }
    if (strlen($phone) < 11 ){
        echo json_encode('lessphone');
        exit;
    }
    if (strlen($phone) > 11 ){
        echo json_encode('overphone');
        exit;
    }

    $sql = "UPDATE emergency_contact SET firstname='$fn', lastname='$ln', address='$address', 
            phone='$phone', landline='$landline', relationship='$relationship', email='$email' WHERE studentid=$id ";
    mysqli_query($conn, $sql);

    $query          = "SELECT * FROM emergency_contact WHERE studentid=$id";
    $result         = mysqli_query($conn, $query);
    $row            = mysqli_fetch_array($result);

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $studentnumber = $row['studentnumber'];

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      =  "Emergency Contact of ".$firstname." ".$lastname." with a student number ".$studentnumber." has been changed.";
    $label         = 'update_student';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);
    
    echo json_encode($row);
}

if(isset($_POST['allergyBtn'])){
    
    $id                   = $_POST['id'];
    $food                 = $_POST['food'];
    $drug                 = $_POST['drug'];
    $substance            = $_POST['substance'];
    $otherAllergy         = $_POST['otherAllergy'];

    if(!preg_match("/^[a-zA-z ]*$/", $otherAllergy)){
        echo json_encode('invalidothers');
        exit;
    }

    $sql = "UPDATE allergy SET food=?, drug=?, substance=?, others=? WHERE studentid=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $food, $drug, $substance, $otherAllergy, $id);
    $stmt->execute();

    $query = "SELECT * FROM allergy WHERE studentid=?";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $query)){
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result); 
    }

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $studentnumber = $row['studentnumber'];

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      =  "Allergies of ".$firstname." ".$lastname." with a student number ".$studentnumber." has been changed.";
    $label         = 'update_student';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);

    echo json_encode($row);

}

if(isset($_POST['btnCondition'])){
    
    $id                = $_POST['id'];
    $existingcondition = $_POST['existingcondition'];

    $sql = "UPDATE medical_history SET existing_condition=? WHERE studentid=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $existingcondition, $id);
    $stmt->execute();

    $query = "SELECT * FROM medical_history WHERE studentid=?";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $query)){
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result); 
    }

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $studentnumber = $row['studentnumber'];

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      =  "Existing Conditions of ".$firstname." ".$lastname." with a student number ".$studentnumber." has been changed.";
    $label         = 'update_student';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);


    echo json_encode($row);
}

if(isset($_POST['btnPhysical'])){
    
    $id                 = $_POST['id'];
    $bp                 = $_POST['bp'];                    
    $temp               = $_POST['temp'];
    $pulse              = $_POST['pulse'];
    $chickenpox         = $_POST['chickenpox'];
    $tetanus            = $_POST['tetanus'];
    $mmr                = $_POST['mmr'];
    $tb                 = $_POST['tb'];
    $hct                = $_POST['hct'];
    $physicalWeight     = $_POST['physicalWeight'];
    $physicalHeight     = $_POST['physicalHeight'];
    $fbg                = $_POST['fbg'];
    $uri                = $_POST['uri'];

    if (!preg_match('/^[0-9.]*$/', $physicalWeight) || !preg_match('/^[0-9.]*$/', $physicalHeight)) {
        echo json_encode('invalidweightheight');
        exit();
    }

    if(empty($physicalHeight) || empty($physicalWeight)){
        echo json_encode('emptyweightheight');
        exit();
    }

    $sql = "UPDATE physical_examination SET weight=?, height=?, bp=?, temp=?, pulse=?, hcthbg=?, fbg=?, uri=?, varicella=?, teta=?, mmr=?, tb=? WHERE studentid=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ddssssssssssi", $physicalWeight, $physicalHeight, $bp, $temp, $pulse, $hct, $fbg, $uri, $chickenpox, $tetanus, $mmr, $tb, $id);
    $stmt->execute();

    $query = "SELECT * FROM physical_examination WHERE studentid=?";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $query)){
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result); 
    }

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $studentnumber = $row['studentnumber'];

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      =  "Physical Examination of ".$firstname." ".$lastname." with a student number ".$studentnumber." has been changed.";
    $label         = 'update_student';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);

    echo json_encode($row);

}


if(isset($_POST['deleteFileBtn'])){
    
    $filePath = $_POST['deleteFileID'];
    $id       = $_POST['id'];

    $finalPath = '../'.$filePath;

    if (file_exists($finalPath)){
        if(unlink($finalPath)){
            $sql = "DELETE FROM files WHERE filepath='$filePath' AND studentid=$id";
            mysqli_query($conn, $sql);
            echo 'success';
        }
    }else{
        echo 'failed';
    }

    $query = "SELECT * FROM student WHERE id=$id ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $studentnumber = $row['studentnumber'];

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      =  "File of ".$firstname." ".$lastname." with a student number ".$studentnumber." has been deleted.";
    $label         = 'delete_file';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);
    
}

if(isset($_POST['btnMedication'])){
     
     $id                 =   $_POST['id'];
     $medication         =   $_POST['medication'];

     $sql = "UPDATE medical_history SET medications=? WHERE studentid=? ";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("si", $medication, $id);
     $stmt->execute();
     
     $query = "SELECT * FROM medical_history WHERE studentid=?";
     $stmt = mysqli_stmt_init($conn);
     if(mysqli_stmt_prepare($stmt, $query)){
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result); 
     }

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $studentnumber = $row['studentnumber'];

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      =  "Medications of ".$firstname." ".$lastname." with a student number ".$studentnumber." has been deleted.";
    $label         = 'update_student';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);
    echo json_encode($row);
}

