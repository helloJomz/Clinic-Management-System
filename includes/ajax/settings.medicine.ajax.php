<?php 

session_start();
include_once '../dbcon.inc.php';
include_once '../class.autoloader.inc.php';

$globalHelper = new GlobalHelper();



if(isset($_POST['addsuppbtn'])){

    $compname       =   $_POST['compname'];
    $compemail      =   $_POST['compemail'];
    $compaddress    =   $_POST['compaddress'];
    $compcontact    =   $_POST['compcontact'];
    $complandline   =   $_POST['complandline'];

    if(empty($compname) || empty($compemail) || empty($compaddress) || empty($compcontact) || empty($complandline)){
        echo 'emptyfields';
        exit;
    }

    if (!filter_var($compemail, FILTER_VALIDATE_EMAIL)){
        echo 'invalidemail';
        exit;
    }

    if (!preg_match('/^[0-9]*$/', $compcontact)){
        echo 'invalidphone';
        exit;
    }
    if (!preg_match('/^[0-9]*$/', $complandline)){
        echo 'invalidlandline';
        exit;
    }

    if (strlen($compcontact) < 11 ){
        echo 'lessphone';
        exit;
    }
    if (strlen($compcontact) > 11 ){
        echo 'overphone';
        exit;
    }

    $sql = "INSERT INTO supplier(supplier, address, phone, landline, email) VALUES(?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $compname, $compaddress, $compcontact, $complandline, $compemail);
    $stmt->execute();

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      = "Supplier ".$compname." has been added from the system.";
    $label         = 'add_supp';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->medicineLog($conn, $admin_name, $activity, $date, $label);

    echo 'addsuppsuccess';
}

if(isset($_POST['deleteidsupp'])){

    $deleteidsupp = $_POST['deleteidsupp'];

    $sql = "SELECT * FROM supplier WHERE id=$deleteidsupp";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    
    $sql = "DELETE from supplier WHERE id=$deleteidsupp";
    mysqli_query($conn, $sql);

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      = "Supplier ".$row['supplier']." has been deleted from the system.";
    $label         = 'delete_supp';
    $date          = date("Y-m-d H:i:s");

   
    $globalHelper->medicineLog($conn, $admin_name, $activity, $date, $label);

}

if(isset($_POST['configidsupp'])){

    $configidsupp = $_POST['configidsupp'];

    $sql = "SELECT * FROM supplier WHERE id=$configidsupp";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    echo json_encode($row);
}

if(isset($_POST['configupdatesuppbtn'])){
    
    $updateidsupp         =   $_POST['updateidsupp'];
    $configcompname       =   $_POST['configcompname'];
    $configcompemail      =   $_POST['configcompemail'];
    $configcompaddress    =   $_POST['configcompaddress'];
    $configcompcontact    =   $_POST['configcompcontact'];
    $configcomplandline   =   $_POST['configcomplandline'];

    if(empty($configcompname) || empty($configcompemail) || empty($configcompaddress) || empty($configcompcontact) || empty($configcomplandline)){
        echo 'emptyfields';
        exit;
    }

    if (!filter_var($configcompemail, FILTER_VALIDATE_EMAIL)){
        echo 'invalidemail';
        exit;
    }

    if (!preg_match('/^[0-9]*$/', $configcompcontact)){
        echo 'invalidphone';
        exit;
    }
    if (!preg_match('/^[0-9]*$/', $configcomplandline)){
        echo 'invalidlandline';
        exit;
    }

    if (strlen($configcompcontact) < 11 ){
        echo 'lessphone';
        exit;
    }
    if (strlen($configcompcontact) > 11 ){
        echo 'overphone';
        exit;
    }

    $sql = "UPDATE supplier SET supplier=?, address=?, phone=?, landline=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $configcompname, $configcompaddress, $configcompcontact, $configcomplandline, $configcompemail, $updateidsupp);
    $stmt->execute();

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      = "Supplier ".$row['supplier']." has been updated.";
    $label         = 'delete_supp';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->medicineLog($conn, $admin_name, $activity, $date, $label);

    echo 'addsuppsuccess';
}

if(isset($_POST['activateid'])){

    $activateid = $_POST['activateid'];

    $sql = "SELECT * FROM medicine WHERE id=$activateid";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $sql = "UPDATE medicine SET status='enabled' WHERE id=$activateid ";
    mysqli_query($conn, $sql);

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      = $row['medicine']." has been activated";
    $label         = 'activate_medicine';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->medicineLog($conn, $admin_name, $activity, $date, $label);

    $_SESSION['alert'] = 'medicine_activated';
}

if(isset($_POST['deletestockid'])){

    $deleteid = $_POST['deletestockid'];

    $activitySql = "SELECT * FROM stocks WHERE id=$deleteid";
    $activityResult = mysqli_query($conn, $activitySql);
    $row = mysqli_fetch_array($activityResult);

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      = " Stocks of ".$row['medicine_name']." has been deleted";
    $label         = 'delete_stocks';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->medicineLog($conn, $admin_name, $activity, $date, $label);

    $deleteSql = "DELETE FROM stocks WHERE id=$deleteid ";
    mysqli_query($conn, $deleteSql);

}

if(isset($_POST['medsettingstockupdateid'])){

        $medstockid = $_POST['medsettingstockupdateid'];

        $sql = "SELECT * FROM stocks WHERE id=$medstockid ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        
        echo json_encode($row);
    
}

if(isset($_POST['finalStepUpdateStock'])){

    if($_POST['finalStepUpdateStock'] == 'yes'){

        $updatequantity      = $_POST['updatequantity'];
        $updatebarcode       = $_POST['updatebarcode'];
        $updatesupplier      = $_POST['updatesupplier'];
        $finalmedstockid     = $_POST['finalmedstockid'];

       

        if(empty($updatequantity) || empty($updatebarcode) || empty($updatesupplier) ){
            echo json_encode('emptyfields');
            exit;
        }

        if (!preg_match('/^[0-9]*$/', $updatequantity)){
            echo json_encode('invalidquantity');
            exit;
        }

        $activitySql = "SELECT * FROM stocks WHERE id=$finalmedstockid";
        $activityResult = mysqli_query($conn, $activitySql);
        $row = mysqli_fetch_array($activityResult);

        // SETTINGS LOG
        $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
        $activity      = " Stocks of ".$row['medicine_name']." has been updated";
        $label         = 'update_stocks';
        $date          = date("Y-m-d H:i:s");

        $globalHelper->medicineLog($conn, $admin_name, $activity, $date, $label);
        

        $sql = "UPDATE stocks SET quantity=?, barcode=?, supplier=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $updatequantity, $updatebarcode, $updatesupplier, $finalmedstockid);
        $stmt->execute();

      
        echo json_encode('success');
    }
}


