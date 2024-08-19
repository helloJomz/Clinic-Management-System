<?php 

include '../dbcon.inc.php';

if(isset($_POST['requestModalStudent'])){
    $id = $_POST['hiddenstudentid'];

    $sql = "SELECT * FROM request_log WHERE studentid=$id ORDER BY date DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);

    $output = '';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $output .= '
            <tr>
                <td>'.$row['medicine_name'].'</td>
                <td>'.$row['quantity'].'</td>
                <td>'.$row['admin_name'].'</td>
                <td>'.$row['date'].'</td>
            </tr>
            ';
        }

    }else{
        $output .= '
        <tr>
            <td colspan="4" class="text-center p-3">This patient has no record of requests.</td>
        </tr>
        ';
    }

    $sql = "SELECT * FROM queue_log WHERE studentid=$id ORDER BY date DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);

    $outcome = '';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $outcome .= '
            <tr>
                <td>'.$row['activity'].'</td>
                <td>'.$row['admin_name'].'</td>
                <td>'.$row['date'].'</td>
            </tr>
            ';
        }

    }else{
        $outcome .= '
        <tr>
            <td colspan="4" class="text-center p-3">This patient has no record of queue.</td>
        </tr>
        ';
    }

    $data = array(
        'request' => $output,
        'queue' => $outcome
    );

    echo json_encode($data);
}

if(isset($_POST['requestModalFaculty'])){
    $id = $_POST['hiddenfacultytid'];

    $sql = "SELECT * FROM request_log WHERE facultyid=$id ORDER BY date DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);

    $output = '';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $output .= '
            <tr>
                <td>'.$row['medicine_name'].'</td>
                <td>'.$row['quantity'].'</td>
                <td>'.$row['admin_name'].'</td>
                <td>'.$row['date'].'</td>
            </tr>
            ';
        }

    }else{
        $output .= '
        <tr>
            <td colspan="4" class="text-center p-3">This patient has no record of requests.</td>
        </tr>
        ';
    }

    
    $sql = "SELECT * FROM queue_log WHERE facultyid=$id ORDER BY date DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);

    $outcome = '';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $outcome .= '
            <tr>
                <td>'.$row['activity'].'</td>
                <td>'.$row['admin_name'].'</td>
                <td>'.$row['date'].'</td>
            </tr>
            ';
        }

    }else{
        $outcome .= '
        <tr>
            <td colspan="4" class="text-center p-3">This patient has no record of queue.</td>
        </tr>
        ';
    }

    $data = array(
        'request' => $output,
        'queue' => $outcome
    );

    echo json_encode($data);
}

if(isset($_POST['requestModalItechpersonnel'])){
    $id = $_POST['hiddenitechpersonnelid'];

    $sql = "SELECT * FROM request_log WHERE itechpersonnelid=$id ORDER BY date DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);

    $output = '';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $output .= '
            <tr>
                <td>'.$row['medicine_name'].'</td>
                <td>'.$row['quantity'].'</td>
                <td>'.$row['admin_name'].'</td>
                <td>'.$row['date'].'</td>
            </tr>
            ';
        }

    }else{
        $output .= '
        <tr>
            <td colspan="4" class="text-center p-3">This patient has no record of requests.</td>
        </tr>
        ';
    }

    
    $sql = "SELECT * FROM queue_log WHERE itechpersonnelid=$id ORDER BY date DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);

    $outcome = '';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $outcome .= '
            <tr>
                <td>'.$row['activity'].'</td>
                <td>'.$row['admin_name'].'</td>
                <td>'.$row['date'].'</td>
            </tr>
            ';
        }

    }else{
        $outcome .= '
        <tr>
            <td colspan="4" class="text-center p-3">This patient has no record of queue.</td>
        </tr>
        ';
    }

    $data = array(
        'request' => $output,
        'queue' => $outcome
    );

    echo json_encode($data);
}

