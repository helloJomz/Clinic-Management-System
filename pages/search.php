
<?php 
    require '../includes/dbcon.inc.php';
    require '../assets/shared/header.php';
    require '../assets/shared/navbar.php';
    require '../includes/class.autoloader.inc.php';
?>

<style>
    <?php require '../assets/css/search.css'; ?>
</style>

<?php

    unset($_SESSION['fileid'], $_SESSION['filemode']);

    if(isset($_POST['search-dropdown'])){
        $tmp        = $_POST['search-dropdown'];
        $tmp1       = strtolower($tmp);
        $patient    = str_replace(" ", "", $tmp1);
        $sql        = "SELECT * from $patient LIMIT 20";
        $result     = mysqli_query($conn, $sql);
    }else{
        
        if(!isset($_POST['navword'])){$tmp = 'student';}else{$tmp   = $_POST['navword'];}
        $tmp1    = str_replace(" ", "", $tmp);
        $patient = strtolower($tmp1);
        $sql        = "SELECT * from $patient LIMIT 20";
        $result     = mysqli_query($conn, $sql);
    }


?>


<form action="" method="POST">
    <div class="container mt-4">
        <div class="search-wrapper ">
        <select id="search-patient" name="search-dropdown" class="search-dropdown ">
            <option <?php if(isset($patient) && $patient == 'student'){echo 'selected';}?>>Student</option>
            <option <?php if(isset($patient) && $patient == 'faculty'){echo 'selected';}?>>Faculty</option>
            <option <?php if(isset($patient) && $patient == 'itechpersonnel'){echo 'selected';}?>>Itech Personnel</option>
        </select>
        <input type="text" id="search-field" name="search-field" class="search-box shadow-sm" placeholder="Search here">
        <button class="search-button" type="submit" name="search" style="pointer-events: none; cursor: not-allowed;"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>

<div class="container mt-3">
    <div class="card w-100 search-card shadow-sm">
        <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-4 pt-1 semi-bold ms-2" id="title-header"><?php if($patient !== 'itechpersonnel'){echo ucwords($patient);}else{
                        $array = str_split($patient);
                        $newstr = ucwords($array[0].$array[1].$array[2].$array[3].$array[4])." ".ucwords($array[5].$array[6].$array[7].$array[8].$array[9].$array[10].$array[11].$array[12].$array[13]);
                        echo $newstr;
                    } ?></h6>
                    <button class="add-patient" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addpatient-modal"><i class="fas fa-plus-circle"></i> Add Patient</button>
                </div>
            <div class="table-responsive p-2 pb-3 main-table">
                <table class="table">
                    <tbody id="output">
                    <?php if(mysqli_num_rows($result) > 0) {?>
                    <?php while($row = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td class="px-2"><img src="<?= $row['image'];?>" alt="" width="40" height="40" class="search-img rounded"></td>
                            <td>
                                <?= ucwords($row['firstname'])." ".ucwords($row['lastname'])." ".ucwords($row['suffix']);?><br>
                                <span class="address text-muted"><?= $row['address'];?></span>
                            </td>
                            <td>
                                <?php if(isset($row['studentnumber'])){echo $row['studentnumber'];}else{echo $row['email'];}?><br>
                                <span class="address text-muted"><?= $row['phone'];?></span>
                            </td>
                            <td>
                                <span class="badge bg-secondary"><?php if(isset($row['course'])){echo $row['course']." ".$row['year']."-".$row['section'];}else{echo $row['department'];}?></span><br>
                                <span class="address text-muted">Last login 3 days ago</span>
                            </td>
                            <td class="text-end">
                                <form action="<?php 
                                                 if(isset($row['studentnumber']) && isset($row['course'])){echo 'student.php';}
                                                 if(isset($row['department'])){if($row['department'] == 'Computer Management' || $row['department'] == 'Engineering Technology'){echo 'faculty.php';}else{echo 'itechpersonnel.php';}}                                            
                                              ?>" method="POST">
                                <button type="submit" name="go" class="go-icon mt-2"><i class="fas fa-arrow-circle-right fs-3 go-icon"></i></button>
                                <input type="hidden" name="patientid" value="<?php if(isset($row['studentnumber']) && isset($row['course'])){echo $row['id'];}
                                                                                   if(isset($row['department'])){if($row['department'] == 'Computer Management' || $row['department'] == 'Engineering Technology'){echo $row['id'];}else{echo $row['id'];}}?>">
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    <?php }else{?>
                        <?php echo '<p class="no-result-msg">No result found, please try again.</p>'; }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->

<div class="modal fade" id="addpatient-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content w-100">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose to add</h5><br><br>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="btn-container d-flex justify-content-center">
                        <form action="addpatient.php" method="POST">
                            <button class="me-3 p-4 modal-btn1 shadow-sm">Student<br><i class="fas fa-user fs-3 mt-2"></i></button>
                        </form>

                        <form action="addpatient.faculty.php" method="POST">
                            <button class="me-3 p-4 modal-btn2 shadow-sm">Faculty<br> <i class="fas fa-chalkboard-teacher fs-3 mt-1"></i></button>
                            <input type="hidden" name="mode" value="faculty">
                        </form>

                        <form action="addpatient.itechpersonnel.php" method="POST">
                            <button class="p-4 modal-btn3 shadow-sm">Personnel<br><i class="fas fa-user-tie fs-3 mt-1"></i></button>
                            <input type="hidden" name="mode" value="itechpersonnel">
                        </form>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>







<?php 
if(isset($_SESSION['success'])) :
    if($_SESSION['success'] == "addpatient") :
?>
    <script> swal("SUCCESS", "Creation of Patient's Account. ", "success"); </script>
<?php
    endif;
endif;
unset($_SESSION['success']);
?>

<script>
        $(document).ready(function(){

                $("#search-patient").change(function(){
                    $.ajax({
                        type: 'POST',
                        url: '../includes/ajax.title.php',
                        data:{
                            patient: $('#search-patient').val()
                        },
                        success: function(data){
                            $("#title-header").html(data);
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '../includes/search.patient.inc.php',
                        data:{
                            name: $('#search-field').val(),
                            patient: $('#search-patient').val()
                        },
                        success: function(data){
                            $("#output").html(data);
                        }
                    });
                });

                $("#search-field").keyup(function(){
                    $.ajax({
                        type: 'POST',
                        url: '../includes/search.patient.inc.php',
                        data:{
                            name: $('#search-field').val(),
                            patient: $('#search-patient').val()
                        },
                        success: function(data){
                            $("#output").html(data);
                        }
                    });
                });
                

        });
</script>

<?php 
    require '../assets/shared/footer.php';
?>
