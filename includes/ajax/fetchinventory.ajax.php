<?php

include_once '../dbcon.inc.php';

$sql = "SELECT * FROM medicine WHERE status='enabled'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){


while($row = mysqli_fetch_array($result)){
    ?>

    <tr>
        <td class="bold clickable " id="<?= $row['id']; ?>"><?= ucwords($row['medicine']); ?></td>
        <td class="clickable " id="<?= $row['id']; ?>" ><?= ucwords($row['type']); ?></td>
        <td class="clickable " id="<?= $row['id']; ?>" ><?php if(!empty($row['description'])){if(strlen($row['description']) >= 50){echo substr_replace($row['description'], "...", 50);}else{echo $row['description'];}}else{echo '---';}?></td>
        <td  id="<?= $row['id']; ?>">
            <button type="button" id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#medRestock"  class="btn text-success btnRestock"><i class="fas fa-plus-square "></i></button>
            <button type="button" id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#medConfigure" class="btn text-primary btnConfigure"><i class="fas fa-edit"></i></button>
            <button type="button" id="<?php echo $row['id']; ?>"    class="btn text-danger btnDisable"><i class="fas fa-ban"></i></button>
        </td>
    <tr>

    
<?php
}
}else{
    ?>
    <tr>
        <td colspan="5" class="text-center" style="border: none;"><h6>No medicine records found!</h6></td>
    </tr>
    <?php 
}
?>

