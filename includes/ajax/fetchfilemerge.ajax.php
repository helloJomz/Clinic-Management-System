<?php
include_once '../dbcon.inc.php';

$id     = $_POST['id'];
$mode   = $_POST['mode'];


$query = "SELECT * FROM $mode WHERE id=$id ";
$result1 = mysqli_query($conn, $query);
$patientRow = mysqli_fetch_array($result1);

$sql = "SELECT * FROM files WHERE ".$mode."id=$id ";
$result = mysqli_query($conn, $sql);
?>
<table class="table shadow-sm">
  <thead class="bg-light">
    <tr>
        <th>File</th>
        <th>Description</th>
        <th>Date Added</th>
        <th>Actions</th>
    </tr>     
  </thead>
<?php
if(mysqli_num_rows($result) > 0 ){
    while($fileRow = mysqli_fetch_array($result)){
        $fileName = str_replace("../assets/uploads/patient_files/", "",$fileRow['filepath']);
        $department = $patientRow['department'];
        $finalFileName = str_replace("$department", "", $fileName);
        ?>

    <tr>
        <td class="p-3">
            <a href="<?= $fileRow['filepath']; ?>" class="remove-decoration" onclick="window.open(this.href,'targetWindow',
                                   `toolbar=no,
                                    location=no,
                                    status=no,
                                    menubar=no,
                                    scrollbars=yes,
                                    resizable=yes,
                                    width=SomeSize,
                                    height=SomeSize`);
                        return false;"><i class="far fa-file-alt me-2"></i><?= $finalFileName ?></a>
        </td>
        <td class="p-3"><?= $fileRow['description']; ?></td>
        <td class="p-3"><?= $fileRow['dateadded']; ?></td>
        <td class="p-3">
        <button type="button" form="" class="btn text-danger deleteFile" onclick="confirmDelete();" id="<?php echo $fileRow['filepath']; ?>" ><i class="fas fa-trash-alt"></i></button>
        </td>
    </tr>
 
        <?php
    }
    ?>
    <tr>
        <td colspan="4 text-center">
            <form action="addfilemerge.php" method="POST" class="text-center mb-2">
                <button type="submit" name="addfile" class="btn btn-primary">Add More</button>
                <input type="hidden" name="fileid" value="<?= $id; ?>">
                <input type="hidden" name="filemode" value="<?php echo $mode?>">
            </form>
        </td>
    </tr>
    <?php
}else{
    ?>
    <tr>
        
		    <td colspan="4" class="text-center" >No files found! 
            <form action="addfilemerge.php" method="POST">
                <button type="submit" name="addfile" class="btn text-primary p-0">Add here</button>
                <input type="hidden" name="fileid" value="<?= $id; ?>">
                <input type="hidden" name="filemode" value="<?php echo $mode?>">
            </form>
            </td>
        
    </tr>

    <?php
}

?>
</table>


