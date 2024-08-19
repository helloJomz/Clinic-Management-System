<?php

session_start();
require '../dbcon.inc.php';
require '../class.autoloader.inc.php';

$globalHelper = new GlobalHelper();

if(isset($_POST['load'])){

    if($_POST['load'] == 'queue'){

        $sql = "SELECT * FROM queue_list WHERE status=0";
        $result = mysqli_query($conn, $sql);

        $queue = '';
        $output = '';
        $countRow = mysqli_num_rows($result) - 1;
        $first = true;
        
        if(mysqli_num_rows($result) > 0){
            
            
            while($row = mysqli_fetch_array($result)){
                
                if($first == true){

                    $mode = ucwords($row['patient_mode']);

                    $output .= '
                        <div class="text-center current_id" id="'.$row['id'].'">
                        <img src="'.$row['image'].'" alt="" class="rounded ">
                        </div>
                        <div class="text-center mt-2">
                            <h4><strong>'.$row['queue_no'].'</strong></h4>
                            <h5>'.ucwords($row['patient_name']).'</h5>
                        </div>
                    ';

                    $first = false;
                   
                }else{

                    $queue .= '
                        <tr>
                            <td>'.$row['queue_no'].'</td>
                            <td class="text-left"><img src="'.$row['image'].'" alt="" class="me-2">'.ucwords($row['patient_name']).'</td>
                            <td>'.$row['transaction'].'</td>
                        </tr>
                    ';
                }
               
            }

        }else{

            $queue .= '
            <tr>
                <td colspan="4" class="text-center">No queue found!</td>
            </tr>
            ';
        }

        $data = array(
            
            'queue' => $queue,
            'highlight' => $output,
            'count' => $countRow,
            'mode' => $mode
            
        );

        echo json_encode($data);

    }
}


if(isset($_POST['nextid'])){

    $nextid = $_POST['nextid'];
    $sql = "UPDATE queue_list SET status=1 WHERE id=$nextid ";
    mysqli_query($conn, $sql);



}


if(isset($_POST['checkEmpty'])){

    if($_POST['checkEmpty'] == 'queue'){
        
        $sql = "SELECT * FROM queue_list WHERE status=0 ";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        $output = '';
        if($rowCount == 0){
            
            $empty = 'empty';

            $output .= '
                <tr>
                    <td colspan="4" class="text-center p-4">No queue found!</td>
                </tr>
            ';
        }
       
        $data = array(
            'empty' => $empty,
            'output' => $output,
            'count' => $rowCount
        );

        echo json_encode($data);
    }
}

if(isset($_POST['searchPatient'])){

    $tmp        = $_POST['select'];
    $tmp1       = str_replace(" ", "", $tmp);
    $mode       = strtolower($tmp1);
    $search     = $_POST['searchPatient'];

    if($mode == 'student'){

        $sql = "SELECT * FROM student WHERE CONCAT(firstname, ' ', lastname) LIKE '%".$search."%' OR studentnumber LIKE '%".$search."%' 
        OR email LIKE '%".$search."%' OR CONCAT(course, ' ', year, '-', section) LIKE '%".$search."%'";
        $result = mysqli_query($conn, $sql);

        $output = '';
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
                
                $output .= '
                <tr>
                    <td><img src="'.$row['image'].'" alt="studenticon" class="shadow-sm"></td>
                    <td><h6 class="p-0 name">'.ucwords($row['firstname'])." ".ucwords($row['lastname']).'<br><small class="text-muted">'.$row['studentnumber'].'</small></h6></td>
                    <td><span class="badge bg-primary text-white section">'.$row['course']." ".$row['year']."-".$row['section'].'</span></td>
                    <td class="text-end"><button class="btn font-green selectprofile" id="'.$row['id'].'" "><i class="fas fa-arrow-circle-right"></i></button>
                <input type="hidden" id="identifier" value="student"></td>
                </tr>
                ';
            }

        }else{
            $output .= '
                <tr>
                    <td colspan="4" class="p-3 text-center">No results found!</td>
                </tr>
            ';
        }

        echo json_encode($output);
    }

    if($mode === 'faculty'){
        $sql = "SELECT * FROM faculty WHERE department LIKE '%".$search."%' OR CONCAT(firstname, ' ', lastname) LIKE '%".$search."%' 
                OR email LIKE '%".$search."%' ";
        $result = mysqli_query($conn, $sql);

        $outcome = '';
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                $outcome .= '
                <tr>
                    <td><img src="'.$row['image'].'" alt="studenticon" class="shadow-sm text-center"></td>
                    <td><h6 class="p-0 name">'.ucwords($row['firstname'])." ".ucwords($row['lastname']).'<br><small class="text-muted">'.$row['email'].'</small></h6></td>
                    <td><span class="badge bg-primary text-white section">'.$row['department'].'</span></td>
                    <td class="text-end"><button class="btn font-green selectprofile" id="'.$row['id'].'"><i class="fas fa-arrow-circle-right"></i></button>
                    <input type="hidden" id="identifier" value="faculty"></td>
                </tr>
            ';

            }

        }else{

            $outcome .= '
                <tr>
                    <td colspan="4" class="p-3 text-center">No results found!</td>
                </tr>
            ';

            }
        
        echo json_encode($outcome);
    }

    if($mode === 'itechpersonnel'){
        $sql = "SELECT * FROM itechpersonnel WHERE department LIKE '%".$search."%' OR CONCAT(firstname, ' ', lastname) LIKE '%".$search."%' 
        OR email LIKE '%".$search."%' ";
        $result = mysqli_query($conn, $sql);

        $outcome = '';
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                $outcome .= '
                <tr>
                    <td><img src="'.$row['image'].'" alt="studenticon" class="shadow-sm"></td>
                    <td><h6 class="p-0 name">'.ucwords($row['firstname'])." ".ucwords($row['lastname']).'<br><small class="text-muted">'.$row['email'].'</small></h6></td>
                    <td><span class="badge bg-primary text-white section">'.$row['department'].'</span></td>
                    <td class="text-end"><button class="btn font-green selectprofile" id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#patientProfile"><i class="fas fa-arrow-circle-right"></i></button>
                    <input type="hidden" id="identifier" value="itechpersonnel"></td>
                </tr>
            ';

            }

        }else{

            $outcome .= '
            <tr>
                <td colspan="4" class="p-3 text-center">No results found!</td>
            </tr>
        ';

            }

        echo json_encode($outcome);
    }
}


if(isset($_POST['selectpatient'])){

    if($_POST['selectpatient'] == 'selected'){

        $selectid = $_POST['patientid'];
        $mode = $_POST['mode'];

        $sql = "SELECT * FROM $mode WHERE id=$selectid";
        $result = mysqli_query($conn, $sql);

        $output = '';
        while($row = mysqli_fetch_array($result)){ 
        
          if($mode == 'student'){
            $output .= '
            <tr>
              <td><img src="'.$row['image'].'" alt="studenticon" class="shadow-sm patientimg"></td>
              <td><h6 class="p-0 name">'.ucwords($row['firstname'])." ".ucwords($row['lastname']).'<br><small class="text-muted">'.$row['email'].'</small></h6></td>
              <td><span class="badge bg-primary text-white section">'.$row['studentnumber'].'</span></td>
              <input type="hidden" id="'.$row['id'].'" class="finalIDSubmit" "></td>
              <input type="hidden" value="'.$row['firstname']." ".$row['lastname'].'" class="finalFullName" "></td>
            </tr>
            <tr>
                <td colspan="3" class="text-center removeBorder pt-4 pb-4">
                    <select id="transaction" class="me-2">
                        <option>Enrollment </option>
                        <option>Medical Clearance</option>
                        <option>Check-up</option>
                        <option>On the Job Training</option>
                    </select>
                    <button type="button" class="btn bg-green text-white addtoqueue"><i class="fas fa-plus-circle me-2"></i>Add to queue</button>
                    <input type="hidden" id="finalIdentifier" value="'.$mode.'">

                </td>
            </tr>
            ';
          }else{
            $output .= '
            <tr>
              <td><img src="'.$row['image'].'" alt="studenticon" class="shadow-sm patientimg"></td>
              <td><h6 class="p-0 name">'.ucwords($row['firstname'])." ".ucwords($row['lastname']).'<br><small class="text-muted">'.$row['email'].'</small></h6></td>
              <td><span class="badge bg-primary text-white section">'.$row['department'].'</span></td>
              <input type="hidden" id="'.$row['id'].'" class="finalIDSubmit" "></td>
              <input type="hidden" value="'.$row['firstname']." ".$row['lastname'].'" class="finalFullName" "></td>
            </tr>
            <tr>
                <td colspan="3" class="text-center removeBorder p-4">
                    <select id="transaction">
                        <option>Enrollment </option>
                        <option>Medical Clearance</option>
                        <option>Check-up</option>
                        <option>On the Job Training</option>
                    </select>
                    <button type="button" class="btn bg-green text-white addtoqueue"><i class="fas fa-plus-circle me-2"></i>Add to queue</button>
                    <input type="hidden" id="finalIdentifier" value="'.$row['department'].'">
                </td>
            </tr>
            ';
          }
         

        }

       echo json_encode($output);
    }
}


if(isset($_POST['addtoqueue'])){

    if($_POST['addtoqueue'] == 'add'){

        $image      = $_POST['image'];
        $fullname   = $_POST['fullname'];
        $patientid  = $_POST['patientid'];
        $identifier = $_POST['identifier'];
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
        
        $checkExist = "SELECT * FROM queue_list WHERE patient_id = $patientid AND status = 0";
        $existResult = mysqli_query($conn, $checkExist);

        if(mysqli_num_rows($existResult) > 0){

            echo json_encode('queue_exist');
            exit;

        }else{
            $saveSql = "INSERT INTO queue_list SET ".$data;
            mysqli_query($conn, $saveSql);
            
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

            // SETTINGS LOG
            $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
            $activity      = $fullname." has queued for ".$transaction;
            $label         = 'add_queue';
            $date          = date("Y-m-d H:i:s");

            $globalHelper->queueLog($conn, $admin_name, $activity, $date, $label, $identifierMode, $patientActId);

            echo json_encode('queue_success');
        
        }

    }
}

if(isset($_POST['badgeStatus'])){

    if($_POST['badgeStatus'] == 'queue'){

        $query = "SHOW TABLES LIKE 'queue_list' ";
        $queryResult = mysqli_query($conn, $query);
        
        $badge = '';
        if(mysqli_num_rows($queryResult) == 0){
            $badge .= '<span class="badge bg-danger text-white">Disabled</span>';
        }else{
            $badge .= '<span class="badge bg-green text-white">Active</span>';
        }

        echo json_encode($badge);
    }
}


// CHECK FOR STATUS IN QUEUE SETTINGS.QUEUE.PHP

if(isset($_POST['statusQueue'])){

    if($_POST['statusQueue'] == 'settings'){

        $sql = "SHOW TABLES LIKE 'queue_list' ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0){

            $label = 'Disabled';
            $btnLabel = '<i class="fas fa-check-circle me-2"></i>Enable';

        }else{
            $label = 'Active';
            $btnLabel = '<i class="fas fa-ban me-2"></i></i>Disable';
        }

        $data = array(
            'label' => $label,
            'btnLabel' => $btnLabel
        );

        echo json_encode($data);
    }

}

if(isset($_POST['adminpwd'])){

    if(isset($_POST['adminemail'])){

        $email = $_POST['adminemail'];
        $pwd = $_POST['adminpwd'];
        
        $sql = "SELECT * FROM admin WHERE email='$email' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $checker = password_verify($pwd, $row['password']);

        if($row['email'] == $email){

            if($checker == true){

                $query = "SHOW TABLES LIKE 'queue_list' ";
                $queryResult = mysqli_query($conn, $query);

                if(mysqli_num_rows($queryResult) == 0){
                    $lastSql = "CREATE TABLE queue_list(
                                id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
                                patient_name varchar(256) NOT NULL,
                                patient_id int(11) NOT NULL,
                                patient_mode varchar(50) NOT NULL,
                                queue_no varchar(50) NOT NULL,
                                transaction varchar(256) NOT NULL,
                                image varchar(256) NOT NULL,
                                status tinyint DEFAULT 0,
                                created_timestamp datetime DEFAULT current_timestamp,
                                date_created date DEFAULT current_timestamp
                                )";
                    mysqli_query($conn, $lastSql);
                }else{
                    $lastSql = "DROP TABLE queue_list";
                    mysqli_query($conn, $lastSql);
                }
                
                
            }
        }

    }

}




