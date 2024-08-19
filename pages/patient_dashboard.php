
<?php 

    require '../assets/shared/patient_sidebar.php';

    if(!isset($_SESSION['verify_login_patient'])){

        header('location: patient.login.php');

    }else{

        if($_SESSION['verify_login_patient'] !== true){

            header('location: patient.login.php');

        }
    }

?>

<?php $title = "Dashboard";?>
<title><?php echo $title; ?></title>

<style>
    body{
        background-color: #e2ebfc;
        font-family: 'Nunito', sans-serif;
    }

    .queue-text{
        text-align: center;
        border-bottom: 1px solid #d3d3d3;
    }

    .main-card{
        height: 250px;
        background-color: #fff;
    }

    .container{
        margin-top: 100px;
    }

    .text-center{
        text-align: center;
    }

    .header-queue{
        
    }

    .bg-green{
        background-color: #32cd32;
    }
</style>

    <div class="container ">
        <div class="main-card shadow">
            <div class="header-queue">
                <h1 class="queue-text p-2">Queue</h1>
            </div>
            <h2 class="text-center mt-4">Current Patient:</h2>
            <h2 class="text-center" id="current_no_patient"></h2>
            <div class="text-center mt-4" id=""></div>
            <div class="queue-footer text-center mt-4 p-2" id="statusQueue">
            </div>
        </div>
    </div>


<?php 
    if(isset($_SESSION['alert'])){

        if($_SESSION['alert'] == 'queue_exist'){

            ?>
                <script> swal("ERROR", "Please Fill-up all the Necessary Fields.", "error"); </script>
            <?php

            unset($_SESSION['alert']);
        }
    }
?>


<script>
    $(document).ready(function(){

        setInterval(function(){
            check_if_exists();
        }, 2000);

        check_if_exists();
        function check_if_exists(exist = ''){
            $.ajax({
                url : '../includes/patient_control/queue.ajax.php',
                type : 'POST',
                data : {exist : exist},
                success : function(data){
                    $('#statusQueue').html(data);
                    check_queue();
                }
            });
        }

        setInterval(function(){
            check_queue();
        }, 2000);

        check_queue();
        function check_queue(load = ''){
            $.ajax({
                url : '../includes/patient_control/queue.ajax.php',
                type : 'POST',
                data : {load : load},
                dataType : 'json',
                success : function(data){
                    $('#current_no_patient').html(data);
                }
            });
        }

        

        $(document).on('click', '.joinqueuebtn', function(){

            window.location.href="patient_joinqueue.php";
        });
        
        
    });
</script>



</body>
</html>