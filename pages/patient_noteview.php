<?php
require '../assets/shared/patient_sidebar.php';
require '../includes/dbcon.inc.php';

if(!isset($_SESSION['verify_login_patient'])){

    header('location: patient.login.php');

}else{

    if($_SESSION['verify_login_patient'] !== true){

        header('location: patient.login.php');

    }
}
?>

<?php $title = "View Notes";?>
<title><?php echo $title; ?></title>


<?php 

$noteid = $_SESSION['selectednote'];

$sql = "SELECT * FROM notes WHERE id=$noteid ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

?>

<style>
body{
    background-color: #e2ebfc;
    font-family: 'Nunito', sans-serif;
}

.main-card{
    background-color: #fff;
    height: 400px;
}

.note-body{
    background-color: #e6e6e6;
    height: 290px;
}

</style>

<div class="container pt-4">
    <div>
        <a href="patient_notes.php" class="btn bg-primary text-white mb-2 float-left">BACK</a>
    </div>
    <div class="main-card shadow-sm rounded p-3">
        <div class="border-bottom">
            <?php if($row['label'] == 'Diagnosis'){$icon = '<i class="fas fa-notes-medical me-2 text-danger shadow-sm"></i>';}else{$icon = '<i class="fas fa-sticky-note me-2 small-font text-warning shadow-sm"></i>';}?>
            <h4><strong><?= $icon.$row['subject']?></strong></h4>
        </div>

        <div class="note-body rounded shadow-sm mt-2 p-3">
            <p><?= $row['dateadded']?></p>

            <p><?= $row['content']?></p>
        </div>

        <div class="mt-2 text-end">
            <p class="fst-italic">Added By: Admin <span><?= $row['admin_name']?></span></p>
        </div>
    </div>

    
</div>










<?php 
    // unset($_SESSION['selectednote']);
?>