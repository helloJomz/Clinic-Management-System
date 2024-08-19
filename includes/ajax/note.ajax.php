<?php

session_start();
include '../dbcon.inc.php';

if(isset($_POST['addnote'])){

    $mode       = $_POST['mode'];
    $subject    = $_POST['subject'];
    $content    = $_POST['content'];
    $label      = $_POST['label'];
    $admin      = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $patientid  = $_POST['patientid'];
    $date       = date("Y-m-d H:i:s");

    $finalmode  = $mode."id";

    if(empty($subject) || empty($content)){
        echo 'emptyfields';
        exit;
    }

    if($label == '--- TYPE ---'){
        echo 'invalidlabel';
        exit;
    }

    $sql = "INSERT INTO notes(subject, content, label, admin_name, dateadded, $finalmode) 
            VALUES('$subject', '$content', '$label', '$admin', '$date', $patientid)";
    mysqli_query($conn, $sql);

    echo 'notesuccess';
}


if(isset($_POST['loadnote'])){

    $mode       = $_POST['notemode'];
    $patientid  = $_POST['noteid'];

    $finalmode  = $mode."id";

    $sql = "SELECT * FROM notes WHERE $finalmode=$patientid ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    
    $output = '';

    if(mysqli_num_rows($result) > 0 ){

        while($row = mysqli_fetch_array($result)){

            if(strlen($row['subject']) >= 10){$tmpsubj = substr_replace($row['subject'], "<span class='text-primary'>...</span>", 12);}else{$tmpsubj = $row['subject'];} 

            if($row['label'] == 'Note'){$icon = '<i class="fas fa-sticky-note me-2 small-font text-warning shadow-sm"></i>'; }else{$icon = '<i class="fas fa-notes-medical me-2 text-danger shadow-sm"></i>';}

            $lower = strtolower($tmpsubj);
            $subj  = ucwords($lower);

            $output .= '
                <div class="d-flex justify-content-between fs-6 note-button w-100" id="'.$row['id'].'">
                    <p><strong>'.$icon.$subj.'</strong></p>
                    <p class="small-font"><strong>'.$row['dateadded'].'</strong></p>
                </div>
            ';
        }

    }else{
        $output .= '
            <div class="text-center mt-4">
                <h5>No notes found!</h5>
            </div>
        ';
    }


    echo json_encode($output);
}

if(isset($_POST['selectnote'])){

    $noteid = $_POST['noteselectedid'];
    
    $sql = "SELECT * FROM notes WHERE id=$noteid ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    echo json_encode($row);

}

if(isset($_POST['deletenoteid'])){

    $deleteid = $_POST['deletenoteid'];

    $sql = "DELETE FROM notes WHERE id = $deleteid ";
    mysqli_query($conn, $sql);

    echo json_encode('notedeleted');
}