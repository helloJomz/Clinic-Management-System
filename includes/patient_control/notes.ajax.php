<?php

session_start();
require '../dbcon.inc.php';

if(isset($_POST['loadnote'])){

    $patientid = $_SESSION['patientviewid'];

    $tmp1 = $_SESSION['patientviewmode'];
    $tmp2 = str_replace(" ", "", $tmp1);
    $patientmode = strtolower($tmp2);
    $finalmode = $patientmode."id";

    $sql = "SELECT * FROM notes WHERE $finalmode = $patientid ";
    $result = mysqli_query($conn, $sql);

    $output = '';
    if(mysqli_num_rows($result) > 0 ){

        while($row = mysqli_fetch_array($result)){

            if(strlen($row['subject']) >= 20){$tmpsubj = substr_replace($row['subject'], "<span class='text-primary'>...</span>", 20);}else{$tmpsubj = $row['subject'];} 

            if($row['label'] == 'Note'){$icon = '<i class="fas fa-sticky-note me-2 small-font text-warning shadow-sm"></i>'; }else{$icon = '<i class="fas fa-notes-medical me-2 text-danger shadow-sm"></i>';}

            $lower = strtolower($tmpsubj);
            $subj  = ucwords($lower);

            $output .= '
                <div class="d-flex justify-content-between note-item p-2 ps-3 pe-3 mb-3 shadow-sm" id="'.$row['id'].'" >
                    <span>'.$icon.$subj.'</span>
                    <span>'.$row['dateadded'].'</span>
                </div>
            ';
        }

    }else{
        $output .= '
            <div class="text-center">
                <h5>No notes found!</h5>
            </div>
        ';
    }

    echo $output;
}


if(isset($_POST['selectid'])){

    $_SESSION['selectednote'] = $_POST['selectid'];

    echo json_encode('redirect');
}