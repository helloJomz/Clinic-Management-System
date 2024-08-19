<?php

include_once '../dbcon.inc.php';

if(!isset($_POST['search'])){

$sql = "SELECT * FROM supplier";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){


while($row = mysqli_fetch_array($result)){
    ?>

    <tr>
        <td class="bold clickable " id="<?= $row['id']; ?>"><?= ucwords($row['supplier']); ?></td>
        <td class="clickable "      id="<?= $row['id']; ?>" ><?= ucwords($row['address']); ?></td>
        <td class="clickable "      id="<?= $row['id']; ?>" ><?= ucwords($row['phone']); ?></td>
        <td class="p-4 clickable "  id="<?= $row['id']; ?>" ><?= ucwords($row['landline']); ?></td>
        <td class="p-4 clickable "  id="<?= $row['id']; ?>" ><?= ucwords($row['email']); ?></td>
        <td  id="<?= $row['id']; ?>">
            <button type="button"   id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#suppConfigure" class="btn text-primary btnConfigureSupp"><i class="fas fa-edit"></i></button>
            <button type="button"   id="<?php echo $row['id']; ?>"    class="btn text-danger btnDeleteSupp"><i class="fas fa-trash-alt"></i></button>
        </td>
    <tr>

<?php
}
}else{
    ?>
    <tr>
        <td colspan="5" class="text-center" style="border: none;"><h6>No Supplier records found!</h6></td>
    </tr>
    <?php 
}
}
?>

<?php 

    if(isset($_POST['search'])){

        $search = $_POST['search'];

        $sql = "SELECT * FROM supplier WHERE supplier LIKE '%".$search."%' OR address LIKE '%".$search."%' 
        OR email LIKE '%".$search."%' OR phone LIKE '%".$search."%' OR landline LIKE '%".$search."%'";
        $resultSEarch = mysqli_query($conn, $sql);

        if(mysqli_num_rows($resultSEarch) > 0){


        while($row = mysqli_fetch_array($resultSEarch)){
            ?>

            <tr>
                <td class="bold clickable " id="<?= $row['id']; ?>"><?= ucwords($row['supplier']); ?></td>
                <td class="clickable "      id="<?= $row['id']; ?>" ><?= ucwords($row['address']); ?></td>
                <td class="clickable "      id="<?= $row['id']; ?>" ><?= ucwords($row['phone']); ?></td>
                <td class="p-4 clickable "  id="<?= $row['id']; ?>" ><?= ucwords($row['landline']); ?></td>
                <td class="p-4 clickable "  id="<?= $row['id']; ?>" ><?= ucwords($row['email']); ?></td>
                <td  id="<?= $row['id']; ?>">
                    <button type="button"   id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#suppConfigure" class="btn text-primary btnConfigureSupp"><i class="fas fa-edit"></i></button>
                    <button type="button"   id="<?php echo $row['id']; ?>"    class="btn text-danger btnDeleteSupp" style="z-index: 1;"><i class="fas fa-trash-alt"></i></button>
                </td>
            <tr>

        <?php
        }
        }else{
            ?>
            <tr>
                <td colspan="5" class="text-center" style="border: none;"><h6>No Supplier records found!</h6></td>
            </tr>
            <?php 
        }
        ?>
        <?php
    }
?>
