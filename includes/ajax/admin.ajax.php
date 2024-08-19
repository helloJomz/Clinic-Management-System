<?php 

include '../dbcon.inc.php';
include '../class.autoloader.inc.php';

session_start();
if(isset($_POST['load'])){

    $sql = "SELECT * FROM admin";
    $result = mysqli_query($conn, $sql);
    
    $output = '';
    if(mysqli_num_rows($result)){

        while($row = mysqli_fetch_array($result)){
            
            $output .= '
                <tr>
                    <td><img src="'.$row['image'].'" alt="adminimg" class="shadow-sm"></td>
                    <td><p class="moveText">'.ucwords($row['firstname'])." ".ucwords($row['lastname']).'</p></td>
                    <td><p class="moveText">'.$row['email'].'</p></td>
                    <td><p class="moveText">'.ucwords($row['position']).'</p></td>
                    <td>
                        <button type="button" class="btn text-danger deleteAdmin" id="'.$row['id'].'"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            ';
        }

    }else{

        $output .= '
            <tr><td colspan="4">No records found! Please add an account.</td></tr>
        ';
    }

    echo $output;
}


if(isset($_POST['deleteid'])){

    $deleteid = $_POST['deleteid'];
    
    $sql = "SELECT * FROM admin WHERE id=$deleteid";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $sql = "DELETE FROM admin WHERE id=$deleteid";
    mysqli_query($conn, $sql);

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      =  $row['position']." ".$row['firstname']." ".$row['lastname']." has been deleted from the system.";
    $label         = 'delete_admin';
    $date          = date("Y-m-d H:i:s");

    $globalHelper = new GlobalHelper();
    $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);
}

