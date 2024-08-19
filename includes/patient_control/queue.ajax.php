<?php

session_start();

require '../dbcon.inc.php';
require '../class.autoloader.inc.php';

$globalHelper = new GlobalHelper();

$id = $_SESSION['patientviewid'];
$tmp1 = $_SESSION['patientviewmode'];
$tmp2 = str_replace(" ", "", $tmp1);
$mode = strtolower($tmp2);


if($mode == 'itechpersonnel'){
    $sql = "SELECT * FROM $mode WHERE id=$id ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $finalMode = $row['department'];
}else{
    $finalMode = $mode;
}


if(isset($_POST['exist'])){

    $output = '';
    $query = "SHOW TABLES LIKE 'queue_list' ";
    $queryResult = mysqli_query($conn, $query);

    if(mysqli_num_rows($queryResult) == 0){

        $output .= '<button class="btn bg-danger text-white" ><strong>QUEUE IS DISABLED</strong></button>';

    }else{
        $sql = "SELECT * FROM queue_list WHERE patient_id=$id AND patient_mode='$finalMode' AND status=0";
        $result = mysqli_query($conn, $sql);

        
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                $output .= '
                    <div class="bg-green text-white rounded"><strong>You are already in queue, your number is: <h2>'.$row['queue_no'].'</h2></strong></div>
                ';
            }
            
        }else{

            $output .= '
                <button class="btn bg-primary text-white joinqueuebtn" ><strong>Join Queue</strong></button>
            ';
        }
    }
    

    echo $output;

}


if(isset($_POST['joinqueuebtn'])){

    $sql = "SELECT * FROM $mode WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    
    $image      = $row['image'];
    $fullname   = $row['firstname']." ".$row['lastname'];
    $patientid  = $row['id'];
    $identifier = $mode;
    $transaction = $_POST['transaction'];   


    $data = "patient_mode='$identifier' ";
    $data .= ", patient_id='$patientid' ";
    
    $queue_no = 1001;
    
    $chk = "SELECT * FROM queue_list";
    $resultChk = mysqli_query($conn, $chk);
    $rowChk = mysqli_num_rows($resultChk);

    if($rowChk > 0){
        $queue_no += $rowChk;
    }

    $data .= ", queue_no = '$queue_no' ";
    $data .= ", transaction = '$transaction' ";
    $data .= ", image = '$image' ";
    $data .= ", patient_name = '$fullname' ";
    
    $checkExist = "SELECT * FROM queue_list WHERE patient_name = $fullname AND patient_id = $patientid AND transaction = $transaction";
    $existResult = mysqli_query($conn, $checkExist);

    if(mysqli_num_rows($existResult) > 0){

        echo $_SESSION['alert'] = 'queue_exist';
        header("location: ../../pages/patient_dashboard.php");
        exit();

    }else{

    $saveSql = "INSERT INTO queue_list SET ".$data;
    mysqli_query($conn, $saveSql);

    // NOTIFICATION

    $title = $fullname." has joined the queue";
    $content = ucwords($identifier)." ".$fullname." has joined the queue, with the transaction of ".$transaction.", and queue number of: ".$queue_no;
    $timestamp = date("Y-m-d H:i:s");

    // SEND NOTIFICATION
    $notifSql = "INSERT INTO notification(subject, content, status, unseen, dateadded) 
                VALUES('$title', '$content', 0, 'unseen-bg', '$timestamp') ";
    mysqli_query($conn, $notifSql);

    

    // INSERT ACTIVITY LOG
    if($identifier == 'student'){
        $patientActId = $patientid;
        $identifierMode = 'student';
    } 
    elseif($identifier == 'Computer Management' || $identifier == 'Engineering Technology' ){
        $patientActId = $patientid;
        $identifierMode = 'faculty';
    }
    else{
        $patientActId = $patientid;
        $identifierMode = 'itechpersonnel';
    }
    
    $admin_name    = 'Admin';
    $activity      = $fullname." has queued for ".$transaction;
    $label         = 'add_queue';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->queueLog($conn, $admin_name, $activity, $date, $label, $identifierMode, $patientActId);

    header('location: ../../pages/patient_dashboard.php');

    }

}

if(isset($_POST['load'])){

    $sql = "SELECT * FROM queue_list WHERE status=0";
    $result = mysqli_query($conn, $sql);
    
    $outcome = '';
    $first = true;
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            if($first == true){
                
                $outcome = ucwords($row['queue_no']);

                $first = false;
            }else{
                $first = false;
            }
        }

    }else{

        $outcome = '
            <span class="badge bg-danger text-white">Empty</span>
        ';
    }

    echo json_encode($outcome);
}

