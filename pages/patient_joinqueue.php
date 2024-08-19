
<?php 
    require '../assets/shared/patient_sidebar.php';
?>

<style>

    body{
        background-color: #e2ebfc;
        font-family: 'Nunito', sans-serif;
    }

    .main-card{
        height: 250px;
        background-color: #fff;
    }

    select{
        padding: 10px;
    }

    .bg-green{
        background-color: #32cd32;
    }
</style>

<div class="container pt-4">
    <div class="main-card rounded shadow">
        <div class="border-bottom p-2 text-center">
            <h1>Join Queue</h1>
        </div>
        <form action="../includes/patient_control/queue.ajax.php" method="POST">
        <div class="pt-4 pb-3 text-center">
            <select name="transaction" id="transaction">
                <option>Enrollment </option>
                <option>Medical Clearance</option>
                <option>Check-up</option>
                <option>On the Job Training</option>
            </select>
        </div>
        <div class="text-center">
                <form action="../includes/patient_control/queue.ajax.php" method="POST">
                    <button name="joinqueuebtn" class="btn bg-green text-white" id="joinqueuebtn"><strong>Join Queue</strong></button>
                </form>
            </form>
        </div>
    </div>
</div>


<!-- <script>
    $(document).ready(function(){

        $('#joinqueuebtn').click(function(){
            var joinbtn = $(this).val();
            var transaction = $('#transaction').val();
            
            $.ajax({
                url : 'includes/queue.ajax.php',
                type : 'POST',
                data : {joinbtn : joinbtn, transaction : transaction},
                dataType : 'json',
                success : function(data){
                    $.mobile.changePage( data, { transition: "slideup", changeHash: false });
                }
            });
        });
    });
</script> -->


</body>
</html>