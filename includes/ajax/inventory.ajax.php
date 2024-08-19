<?php 
session_start();
include_once '../dbcon.inc.php';
include_once '../class.autoloader.inc.php';


//search

if(isset($_POST['search'])){

    $search = $_POST['search'];

    $sql = "SELECT * FROM medicine WHERE medicine LIKE '%".$search."%' OR type LIKE '%".$search."%' 
            OR description LIKE '%".$search."%' ";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

    
    while($row = mysqli_fetch_array($result)){
        ?>
            <tr>
                <td class="bold clickable" id="<?php echo $row['id'];?>"><?= ucwords($row['medicine']); ?></td>
                <td class="clickable"  id="<?php echo $row['id'];?>"><?= ucwords($row['type']); ?></td>
                <td class="clickable"  id="<?php echo $row['id'];?>"><?php if(!empty($row['description'])){if(strlen($row['description']) >= 50){echo substr_replace($row['description'], "...", 50);}else{echo $row['description'];}}else{echo '---';}?></td>
                <td>
                    <button type="button" id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#medRestock"   class="btn text-success btnRestock"><i class="fas fa-plus-square "></i></button>
                    <button type="button" id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#medConfigure" class="btn text-primary btnConfigure"><i class="fas fa-edit"></i></button>
                    <button type="button" id="<?php echo $row['id']; ?>"    class="btn text-danger btnDisable"><i class="fas fa-ban"></i></button>
                </td>
            <tr>
        <?php
    }
    }else{
        ?>
        <tr>
            <td colspan="4" class="text-center" style="border: none;"><h6>No medicine records found!</h6></td>
        </tr>
        <?php
    }
}

if(isset($_POST['addmedbtn'])){
    
    $medname = $_POST['medname']; $medtype = $_POST['medtype']; $meddesc = $_POST['meddesc'];
    $status  = 'enabled';         $max     = 5;
    $box = $_POST['medbox'];
    
    if(empty($medname) || empty($medtype) || empty($box)){
        echo json_encode('emptyfields');
        exit;
    }

    if($medtype == '--TYPE--'){
        echo json_encode('invalidtype');
        exit;
    }

    if(!preg_match('/^[0-9]*$/', $box)){
        echo json_encode('invalidbox');
        exit;
    }

    $sql    = "INSERT INTO medicine(medicine, type, max_quantity, status, description, per_box) VALUES(?, ?, ?, ?, ?, ?) ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissi", $medname, $medtype, $max, $status, $meddesc, $box);
    $stmt->execute();

    $query          = "SELECT * FROM medicine WHERE medicine='$medname' AND type='$medtype' ";
    $result         = mysqli_query($conn, $query);
    $row            = mysqli_fetch_array($result);

    echo json_encode($row);

}

//////////////////////// ACTIONS//////////////////////////////////

if(isset($_POST['btndisable'])){
    
    $id = $_POST['disableID'];  $status = 'disabled';

    $sql    = "UPDATE medicine SET status=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();

    echo json_encode($_SESSION['success'] = 'disabled');
}

if(isset($_POST['showConfigureVals'])){
    
    $id = $_POST['showConfigureVals'];

    $sql    = "SELECT * FROM medicine WHERE id=$id ";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_array($result);

    echo json_encode($row);
}

if(isset($_POST['configbtn'])){

    $configid    = $_POST['configID'];
    $editmedname = $_POST['editmedname'];
    $editmedtype = $_POST['editmedtype'];
    $editmeddesc = $_POST['editmeddesc'];
    $editmedmax  = $_POST['editmedmax'];
    $box         = $_POST['editmedbox'];

    if(empty($editmedname) || empty($editmedmax)){
        echo json_encode('emptyfields');
        exit;
    }

    if(!preg_match('/^[0-9]*$/', $editmedmax)){
        echo json_encode('numbermedmax');
        exit;
    }

    if(!preg_match('/^[0-9]*$/', $box)){
        echo json_encode('invalidbox');
        exit;
    }

    $sql    = "UPDATE medicine SET medicine=?, type=?, description=?, max_quantity=?, per_box=? WHERE id=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiii", $editmedname, $editmedtype, $editmeddesc, $editmedmax, $box, $configid);
    $stmt->execute();

    $query          = "SELECT * FROM medicine WHERE id=$configid ";
    $result         = mysqli_query($conn, $query);
    $row            = mysqli_fetch_array($result);

    echo json_encode($row);
    
}

// MEDICINE PROFILE
if(isset($_POST['medid'])){
    
    $medid = $_POST['medid'];
    $sql = "SELECT * FROM medicine WHERE id=$medid ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    // FOR PCS
    $querymed   = "SELECT sum(quantity) as totalquantity FROM stocks WHERE medicine_id=$medid ORDER BY purchase_date";
    $resultmed  = mysqli_query($conn, $querymed);
    $pcsRow     = mysqli_fetch_array($resultmed);
    ?>
    <div class="p-2 text-end">
    <small class="shadow-sm me-1" data-toggle="tooltip" data-placement="top" title="Number of Medicine can be given."><span class="badge bg-light p-1 mb-1 text-dark"><i class="fas fa-file-prescription me-2 "></i><?= $row['max_quantity'];?></span></small>
    <small class="shadow-sm"><span class="badge bg-green p-1 mb-1 "><i class="fas fa-check-circle me-1"></i>Active</span></small>
    </div>
    <img src="" alt="">
    <div class="profile-bg pt-2 pb-5 text-center">
        <h2 class="p-0 text-white"><?= $row['medicine']; ?></h2>
        <h5 class="p-0 text-white"><?= $row['type'];?></h5>
        <?php if(!empty($pcsRow['totalquantity'])){echo '<span class="badge bg-warning text-dark fs-6 ">'.$pcsRow['totalquantity']." "."pcs".'</span>';}else{echo '<span class="badge bg-secondary fs-6 ">Empty</span>';}?>
    </div>
        <?php 
            $sql = "SELECT * FROM stocks WHERE medicine_id=$medid ";
            $stockResult = mysqli_query($conn, $sql);
        ?>
    <div class="p-0 shadow profile-card">
        <div class="container p-3">
            <div>
            <h6><strong>Description</strong></h6>
            <p><?php if(!empty($row['description'])){echo $row['description'];}else{echo 'No description can be displayed.';}?></p>
            </div>

            <div class="d-flex justify-content-between">
                <h6><strong>Stocks</strong></h6>
                <a href="settings.medicine.php" class="text-decoration-none">See all</a>
            </div>
            
            <div class="table-responsive bg-gray rounded p-3">
                <table class="table">
                    <thead class="thead-profile border-bottom">
                        <tr>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>Expiry Date</th>
                            <th>Identifier</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(mysqli_num_rows($stockResult) > 0 ){?>
                        <?php   while($stockRow = mysqli_fetch_array($stockResult)) {?>
                        <?php $expiration = $stockRow['expiry_date']; $globalHelper = new GlobalHelper(); $expirationMsg = $globalHelper->getExpiration($expiration);?>
                            <tr>
                                <td><?= $stockRow['quantity']?></td>
                                <td><?= $stockRow['supplier']?></td>
                                <td><?= $stockRow['expiry_date']?></td>
                                <td><?= wordwrap($stockRow['code'], 12,"<br>", true); ?></td>
                                <td><?= $expirationMsg; ?></td>
                            </tr>
                        <?php   }?>
                        <?php }else{
                            ?>
                            <tr>
                                <td colspan="3" class="text-center nostocks pt-4"><h5 class="p-0">No stocks found!</h5></td>
                            </tr>
                            <?php
                        } ?>
                    </tbody>
                </table>
                <div class="p-0">
                <?php if(!empty($pcsRow['totalquantity'])){ $pcs = $pcsRow['totalquantity']; $box = $row['per_box']; $perBox = $globalHelper->getMedicineBox($pcs, $box); echo '<p class="p-0 font-blue"><strong>'.$perBox.'</strong></p>';}?>
                </div>
            </div>
        </div>
    </div>
    <?php

}

if(isset($_POST['showRestockVals'])){

    $restockid = $_POST['showRestockVals'];

    $sql    = "SELECT * FROM medicine WHERE id=$restockid ";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_array($result);

    echo json_encode($row);
}

if(isset($_POST['restockbtn'])){

    $restocksubmitID = $_POST['restocksubmitID'];
    $restockquantity = $_POST['restockquantity'];
    $supplier        = $_POST['supplier'];
    $restockpdate    = $_POST['restockpdate'];
    $restockedate    = $_POST['restockedate'];
    $restockbarcode  = $_POST['restockbarcode'];
    $restockgencode  = $_POST['restockgencode'];

    if(empty($restockquantity) || empty($restockpdate) ||
    empty($restockedate) || empty($restockbarcode)){

        echo json_encode('emptyfields');
        exit;
    }

    if (!preg_match('/^[0-9]*$/', $restockquantity)){
        echo json_encode('invalidquantity');
        exit;
    }

    $query = "SELECT * FROM medicine WHERE id=$restocksubmitID";
    $queryResult = mysqli_query($conn, $query);
    $qRow   = mysqli_fetch_array($queryResult);

    $medName = $qRow['medicine'];

    $sql = "INSERT INTO stocks(medicine_id, quantity, supplier, purchase_date, expiry_date, medicine_name, barcode, code) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissssss", $restocksubmitID, $restockquantity, $supplier, $restockpdate, $restockedate, $medName, $restockbarcode, $restockgencode);
    $stmt->execute();

    echo json_encode('restocksuccess');

}   

