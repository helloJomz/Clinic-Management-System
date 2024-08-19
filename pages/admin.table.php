<?php 
    require '../includes/dbcon.inc.php';
    require '../assets/shared/header.php';
    require '../assets/shared/navbar.php';
    require '../includes/class.autoloader.inc.php';
?>

<?php $title = "Admin Account Manager";?>
<title><?php echo $title; ?></title>

<style>

    body{
        background-color: #e2ebfc;
        font-family: 'Nunito', sans-serif;
    }

    .main-div{
        height: 500px;
    }

    .font-green{
        color: #32cd32;
    }

    .table td img{
        width: 35px;
        height: 35px;
        border-radius: 50%;
    }

    .moveText{
        position: relative;
        top: 7px;
    }

    @media (max-width:447px) and (min-width:320px) {
        
        .sub-header-div{
            margin-top: 20px;
        }
    }

</style>

<div class="container">

    <div class="main-div w-100 mt-4 bg-light shadow rounded p-4 ">

        <div class="header-div">
            <h5><strong>Admin Account</strong></h5> 
        </div>

        <div class="sub-header-div text-end">
            <a class="btn font-green" href="create.admin.php"><i class="fas fa-plus-circle me-2"></i>Add new account</a>
        </div>
        
        <div class="table-responsive mt-3">
            <table class="table">
                <tbody id="admin-body">
                </tbody>
            </table>
        </div>

    </div>
    
</div>


<script src="../assets/js/admin.js?<?php echo time();?>"></script>

<?php 
    if(isset($_SESSION['alert'])){

        if($_SESSION['alert'] == 'createsuccess'){
            ?>
        <script> swal("SUCCESS", "Creation of an admin account. ", "success"); </script>
            <?php
        unset($_SESSION['alert']);
        }
    }

?>

<?php 
    require '../assets/shared/footer.php';
?>