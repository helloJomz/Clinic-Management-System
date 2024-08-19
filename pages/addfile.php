<?php 
    ob_start();
    require '../includes/dbcon.inc.php';
    require '../assets/shared/header.php';
    require '../assets/shared/navbar.php';
    require '../includes/class.autoloader.inc.php';
?>

<style>
    body{
        background-color: #e2ebfc;
    }

    input[type="file"]{
        border: none;
        padding: 0;
    }

    input[type="text"]{
    position: relative;
    right: 60px;
    border-radius: 5px;
    padding: 5px 10px;
    border: 1px solid #b4aba0;
    }

    input[type="text"]:focus{
    outline-color: #4e73df;
    }
    
    .add_more{
       position: relative;
       left: 30px;
       color: #42ba96;
    }

    .remove_more{
       position: relative;
       left: 30px;
       color: red;
    }
    
    .fileBody td{
        padding: 20px 20px;
    }

</style>

<?php 

if(isset($_POST['fileid'])){
    $fileid = $_POST['fileid'];
    $_SESSION['fileid'] = $fileid;
}

if(isset($_POST['submit'])){

    $id =  $_SESSION['fileid'];
    $sql = "SELECT * FROM student WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $studentnumber = $row['studentnumber'];  $date            = date("Y-m-d H:i:s");
    $studentID = $id;
    
 
    //FOR FILES
    $file     = $_FILES['file'];                    $filename = $file['name'];                       $filetmpname = $file['tmp_name']; 
    $filesize = $file['size'];                      $fileerror = $file['error'];                     $filetype = $file['type'];  
    $fileDesc = $_POST['file_description'];         $newFileName = $_POST['file_name'];

    $testFile = $filename;
    $FinalTestFile = array_filter($testFile);

    if(!empty($FinalTestFile)){
        foreach($fileDesc as $key => $value){
                
            $fileext = explode('.', $filename[$key]);    $_firstNameFile = current($fileext);  
                        $fileactualext = strtolower(end($fileext));

            $filenewname = $newFileName[$key].$studentnumber.mt_rand(10,99).".".$fileactualext;
            $filePath = "../assets/uploads/patient_files/".$filenewname;

            $sql = "INSERT INTO files(studentid, filepath, description, dateadded)
                    VALUES($studentID, '$filePath', '$value', '$date')";
            mysqli_query($conn, $sql);

            move_uploaded_file($filetmpname[$key], $filePath);
        }
    }
    
    $globalHelper = new GlobalHelper();

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];

    // SETTINGS LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $activity      =  "A file has been added to student ".$firstname." ".$lastname." with a student number of ".$studentnumber;
    $label         = 'add_file';
    $date          = date("Y-m-d H:i:s");

    $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);

    header("location: student.php");
}

?>

<form action="" method="POST" enctype="multipart/form-data">
<div class="container mt-5">
    <div class="card w-100 search-card shadow-sm p-4 rounded">
        <h5><i class="far fa-file-alt me-2"></i>Add Files</h5>
        <div class="table-responsive p-2 pb-3 main-table">
            <table class="table" id="file-table">
                <thead>
                    <tr>
                        <th>Files</th>
                        <th>File Name</th>
                        <th>Description</th>
                        <th>Add or Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <tr  class="fileBody">
                        <td><input type="file" name="file[]"></td>
                        <td><input type="text" name="file_name[]"></td>
                        <td><input type="text" name="file_description[]"></td>
                        <td><button form="" name="add_more" class="add_more btn" id="add_file"><i class="fas fa-plus-circle fa-lg"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer text-end">
            <a href="student.php" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </div>
    </div>
</div>
</form>


<script> 
    $(document).ready(function(){
        var i = 1;
        var max = 4;
        
        var html = '<tr class="fileBody"><td><input type="file" name="file[]"></td><td><input type="text" name="file_name[]"></td><td><input type="text" name="file_description[]"></td><td><button name="add_more" class="btn remove_more" id="minus_file"><i class="fas fa-minus-circle fa-lg"></i></button></td></tr>';
        $('#add_file').click(function(){
            if(i <= max){
                $("#file-table").append(html);
                i++;
            }
        });

        $('#file-table').on('click','#minus_file', function(){
            $(this).closest('tr').remove();
            i--;
        });

    });
</script>

<?php 
    require '../assets/shared/footer.php';
?>