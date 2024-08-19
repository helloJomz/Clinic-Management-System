<?php 
    require '../includes/dbcon.inc.php';
    require '../assets/shared/header.php';
    require '../assets/shared/navbar.php';
    require '../includes/class.autoloader.inc.php';
?>

<?php $title = "Create Admin";?>
<title><?php echo $title; ?></title>

<style>

    body{
        background-color: #e2ebfc;
        font-family: 'Nunito', sans-serif;
    }

    .main-card{
        width: 1000px;
        height: 740px;
    }
    
    .main-card img{
        width: 150px;
        height: 150px;
    }

    .file-upload{
        position: relative;
        top: 50px;
        left: 40px;
    }

    .minor-text{
        position: relative;
        bottom: 10px;
        left: 2px;
        font-size: 14px;
    }

    input[type="text"]{
        border-radius: 5px;
        padding: 5px 10px;
        border: 1px solid #b4aba0;
    }

    select{
        border-radius: 5px;
        padding: 5px 10px;
        width: 215px;
        border: 1px solid #b4aba0;
    }
    
    .bg-white{
        background-color: #fff;
    }

    input[type="password"]{
        border-radius: 5px;
        padding: 5px 10px;
        border: 1px solid #b4aba0;
    }

    .position-select{
        width: 220px;
    }

    @media screen and (max-width: 767px) {

        .position-select{
            width: 210px;
        }

    }

    @media screen and (max-width: 530px) {

        .position-select{
            width: 160px;
        }

        .main-card{
            width: 400px;
        }
    }

    @media screen and (max-width: 530px) {

        .main-card{
            width: 350px;
        }

    }

    @media screen and (max-width: 371px) {

        .main-card{
            width: 300px;
        }

        .position-select{
            width: 100px;
        }

    }

    @media screen and (max-width: 1099px) {

        .main-card{
            position: relative;
            right: 3%;
        }

    }

    @media screen and (max-width: 1099px) {
        .main-card{
            width: 800px;
            right: 0;
        }
    }

    @media screen and (max-width: 991px) {

        .main-card{
            width: 800px;
            right: 3%;
        }
        
    }

    @media screen and (max-width: 912px) {

        .main-card{
            width: 700px;
            right: 0;
        }

    }

    @media screen and (max-width: 768px) {

        .main-card{
            width: 600px;
            right: 0;
        }

    }

    @media screen and (max-width: 641px) {

        .main-card{
            width: 500px;
            right: 0;
        }

    }

    @media screen and (max-width: 527px) {
        
        .main-card{
            width: 400px;
            right: 0;
        }

    }

    @media screen and (max-width: 423px) {
        
        .main-card{
            width: 300px;
            right: 0;
        }

        .position-select{
            width: 110px;
        }

    }

    

</style>


<div class="container pb-5">

    <div class="main-card mx-auto bg-white shadow mt-4 rounded p-3 pb-4">
        
        <div class="border-bottom">
            <h5 class="p-0"><strong>Create Admin</strong></h5>
            <p class="p-0 minor-text text-muted">Fill all the fields</p>
        </div>
        <form action="../includes/admin.inc.php" method="POST" enctype="multipart/form-data">
            <div class="d-flex justify-content-center mt-3 mb-3 overflow-auto">
                <img src="../assets/default_img/create_icon/1.jpg" id="preview" alt="" class="rounded">
                <input type="file" name="image" id="" class="file-upload" onchange="loadfile(event)">
            </div>

            <div class="input-groups border-top">
    
                <div class="mt-4 d-flex justify-content-center pb-2">
                    <div class="me-5">
                        <small class="float-left">First Name</small>
                        <input type="text" name="firstname" id="firstname" class="form-control w-100" placeholder="First Name">
                    </div>
                    <div class="">
                        <small class="">Last Name</small>
                        <input type="text" name="lastname" id="lastname" class="form-control w-100" placeholder="Last Name">
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-center pb-2">
                    <div class="me-5">
                        <small class="float-left">Email</small>
                        <input type="text" name="email" id="email" class="form-control w-100" placeholder="First Name">
                    </div>
                    <div class="">
                        <small class="">Position</small>
                        <select name="position" class="form-control position-select">
                            <option>Admin</option>
                            <option>Doctor</option>
                            <option>Nurse</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-center pb-2">

                    <div class="me-5">
                        <small class="">Gender</small>
                        <select name="gender" class="form-control position-select">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>

                    <div class="">
                        <small class="float-left">Password</small>
                        <input type="password" name="pwd" id="email" class="form-control w-100" placeholder="Password">
                    </div>
                </div>

                   
                <div class="mt-4 d-flex justify-content-center ">

                    <div class="">
                        <small class="float-left">Password</small>
                        <input type="password" name="rptpwd" id="email" class="form-control w-100" placeholder="Repeat Password">
                    </div>

                </div>
        
            </div>


            <div class="d-flex justify-content-end mt-5 border-top p-2">
                <a href="admin.table.php" class="btn bg-secondary text-white me-2">Cancel</a>
                <button type="submit" name="createadmin" class="btn bg-success text-white">Submit</button>
            </div>

        </form>

    </div>

</div>

<script>
    function loadfile(event){
        var output=document.getElementById('preview');
        output.src=URL.createObjectURL(event.target.files[0]);
    }
</script>

<?php 
 
    if(isset($_SESSION['error'])){

        if($_SESSION['error'] == 'emptyfields'){
            ?>
        <script> swal("ERROR", "Please fill all the fields. ", "error"); </script>
            <?php
        unset($_SESSION['error']);
        }

        if($_SESSION['error'] == 'passwordnotmatch'){
            ?>
        <script> swal("ERROR", "Password does not match, please try again. ", "error"); </script>
            <?php
        unset($_SESSION['error']);
        }

        if($_SESSION['error'] == 'invalidemail'){
            ?>
        <script> swal("ERROR", "You entered an invalid email, please try again. ", "error"); </script>
            <?php
        unset($_SESSION['error']);
        }

        if($_SESSION['error'] == 'invalidchar'){
            ?>
        <script> swal("ERROR", "You entered an invalid characters, please try again. ", "error"); </script>
            <?php
        unset($_SESSION['error']);
        }
    }

?>

<?php 
     require '../assets/shared/footer.php';
?>