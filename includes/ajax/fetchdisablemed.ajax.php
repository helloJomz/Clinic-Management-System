<?php 

include '../dbcon.inc.php';

if(!isset($_POST['searchdisablemed'])){

$sql = "SELECT * FROM medicine WHERE status='disabled' ";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){


while($row = mysqli_fetch_array($result)){
    ?>

    <tr>
        <td class="bold clickable " id="<?= $row['id']; ?>"><?= ucwords($row['medicine']); ?></td>
        <td class="clickable "      id="<?= $row['id']; ?>" ><?= ucwords($row['type']); ?></td>
        <td class="clickable "      id="<?= $row['id']; ?>" ><?php if(empty($row['description'])){echo '---';}else{echo $row['description'];} ?></td>
        <td  id="<?= $row['id']; ?>">
            <button type="button"   id="<?php echo $row['id']; ?>"    class="btn text-primary activateMedicine "><i class="fas fa-check-circle font-green"></i></button>
        </td>
    <tr>

<?php
}
}else{
    ?>
    <tr>
        <td colspan="5" class="text-center" style="border: none;"><h6>No Medicine Found!</h6></td>
    </tr>
    <?php 
}
}
?>

<?php 

    if(isset($_POST['searchdisablemed'])){

        $search = $_POST['searchdisablemed'];

        $sql = "SELECT * FROM medicine WHERE status='disabled' AND medicine LIKE '%".$search."%' OR type LIKE '%".$search."%' 
        OR description LIKE '%".$search."%' ";
        $resultSEarch = mysqli_query($conn, $sql);

        if(mysqli_num_rows($resultSEarch) > 0){


        while($row = mysqli_fetch_array($resultSEarch)){
            ?>

            <?php if($row['status'] == 'disabled') : ?>
            <tr>
                <td class="bold clickable " id="<?= $row['id']; ?>"><?= ucwords($row['medicine']); ?></td>
                <td class="clickable "      id="<?= $row['id']; ?>" ><?= ucwords($row['type']); ?></td>
                <td class="clickable "      id="<?= $row['id']; ?>" ><?php if(empty($row['description'])){echo '---';}else{echo $row['description'];} ?></td>
                <td  id="<?= $row['id']; ?>">
                    <button type="button"   id="<?php echo $row['id']; ?>"    class="btn text-primary activateMedicine"><i class="fas fa-check-circle font-green fa-2"></i></button>
                </td>
            <tr>

            <?php endif; ?>

        <?php
        }
        }else{
            ?>
            <tr>
                <td colspan="5" class="text-center" style="border: none;"><h6>No Medicine Found!</h6></td>
            </tr>
            <?php 
        }
        ?>
        <?php
    }
?>