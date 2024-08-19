<?php 

include_once '../includes/dbcon.inc.php';
require '../assets/shared/header.php';
require '../assets/shared/navbar.php';
require '../includes/class.autoloader.inc.php';

?>

<?php $title = "Settings: Queue";?>
<title><?php echo $title; ?></title>

<style>
    body{
        background-color: #e2ebfc;
        font-family: 'Nunito', sans-serif;
    }

    .bg-green{
        background-color: #32cd32;
    }

    .main-div{
        width: 700px;
        height: 400px;
        background-color: #fff;
    }

    input[type="text"]{
        border-radius: 5px;
        padding: 5px 10px;
        border: 1px solid #b4aba0;
    }


    input[type="text"]:focus{
        outline-color: #4e73df;
    }

    input[type="password"]{
        border-radius: 5px;
        padding: 5px 10px;
        border: 1px solid #b4aba0;
    }

    input[type="password"]:focus{
        outline-color: #4e73df;
    }

    @media screen and (max-width: 778px) {
        
        .main-div{
            width: 600px;
        }
    }

    @media screen and (max-width: 778px) {
        .main-div{
            position: relative;
            right: 6%;
        }
    }

    @media screen and (max-width: 666px) {

        .main-div{
            width: 500px;
            right: 0;
        }

    }

    @media screen and (max-width: 528px) {

        .main-div{
            width: 400px;
            height: 420px;
            right: 0;
        }
    }

    @media screen and (max-width: 421px) {

        .main-div{
            width: 350px;
        }
    }

    @media screen and (max-width: 421px) {
        .main-div{
            width: 300px;
        }
    }
</style>

<div class="container mt-5">
    <div class="main-div mx-auto shadow-sm">
        <div>
            <div id="errorAlert"></div>
            <h5 class="border-bottom p-3 text-center"><strong>Enable / Disable Queue</strong></h5>
            <div class="mt-5 text-center">
                <div id="errorAlert"></div>
                <h6>Please enter your email and password to  <span class="text-success">Enable</span>  / <span class="text-danger">Disable </span>Queue</h6>
                <h6><strong>Queue Status: <span class="badge statusLabel"></span></strong></h6>
            </div>       
            <div class="text-center ms-3">
                <div class="ps-5 pe-5 pt-3">
                    <div id="errorAlert"></div>
                    <div><h6>Email</h6></div>
                    <input type="text" class="mb-3" id="adminemail" class="adminemail" placeholder="Email">
                    <div><h6>Password</h6></div>
                    <input type="password" id="adminpwd" class="adminpwd" placeholder="Password">
                </div>

                <div>
                    <button type="button" id="btnAction" class="btn mt-4"></button>
                    <input type="hidden" id="hiddenvalue" >
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        setInterval(function(){
            check_status();
        }, 2000);

        check_status();
        function check_status(statusQueue = 'settings'){
            
            $.ajax({    
                type : 'POST',
                url : '../includes/ajax/fetchqueuetable.ajax.php',
                data : {statusQueue : statusQueue},
                dataType : 'json',
                success : function(data){

                    if(data.label == 'Disabled'){
                        $('.statusLabel').removeClass('bg-green');
                        $('#btnAction').removeClass('bg-danger');

                        $('.statusLabel').addClass('bg-danger');
                        $('.statusLabel').addClass('text-white');
                        $('.statusLabel').html(data.label);

                        $('#hiddenvalue').val('Disable');

                        $('#btnAction').addClass('bg-green');
                        $('#btnAction').addClass('text-white');
                        $('.statusLabel').addClass('text-white');
                        $('#btnAction').html(data.btnLabel);
                    }else{
                        $('.statusLabel').removeClass('bg-danger');
                        $('#btnAction').removeClass('bg-green');

                        $('.statusLabel').addClass('bg-green');
                        $('.statusLabel').addClass('text-white');
                        $('.statusLabel').html(data.label);

                        $('#hiddenvalue').val('Enable');

                        $('#btnAction').addClass('bg-danger');
                        $('#btnAction').addClass('text-white');
                        $('.statusLabel').addClass('text-white');
                        $('#btnAction').html(data.btnLabel);
                    }
                }
            });
        }

        $('#btnAction').click(function(){
            var mode = $('#hiddenvalue').val();
            var btnAction = $(this).val();
            var adminemail = $('#adminemail').val();
            var adminpwd = $('#adminpwd').val();

            var answer = confirm('Are you sure you want to save the changes?');
            
            if(answer){

                $.ajax({
                    type : 'POST',
                    url : '../includes/ajax/fetchqueuetable.ajax.php',
                    data : {adminemail : adminemail, adminpwd : adminpwd},
                    dataType : 'json',
                    success : function(data){

                        if(data == 'invalidqueue'){
                            swal("ERROR", "Invalid Credentials please try again. ", "error");
                            check_status();
                        }else if(data == 'emptycred'){
                            swal("ERROR", "Fill all the fields below, please try again. ", "error");
                            check_status();
                        }
                    }
                });
            }
        });

    });
</script>

<?php
require '../assets/shared/footer.php';
?>