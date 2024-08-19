<?php 
    require '../includes/dbcon.inc.php';
    require '../assets/shared/header.php';
    require '../assets/shared/navbar.php';
    require '../includes/class.autoloader.inc.php';
?>

<style>
    <?php require '../assets/css/inventory.css'; ?>
</style>

<?php 
  $globalHelper = new GlobalHelper();
?>

<div class="container mt-4 pb-2">
    
    <div  class="text-end mb-2">
        <a href="settings.medicine.php" class="rounded white btn me-1 shadow-sm"><i class="fas fa-cog"></i></a>
        <!-- <button class="rounded white btn me-1 shadow-sm"><i class="fas fa-print"></i></button> -->
        <button class="rounded white btn modalss" 
                type="button" data-bs-toggle="modal" 
                data-bs-target="#addmedicine"><i class="fas fa-plus-circle me-2 font-green"></i>Add Medicine</button>
    </div>

    <div class="card shadow-sm ">
        <div class="ms-4 pt-4 d-flex justify-content-between header">
            <h5 class="bold">Medicine Inventory</h5>
            <input type="text" class="me-3 search w-50" name="" id="medSearch" placeholder="Search Medicine">
        </div>
        <div class="card-body ms-2">
                
           <div class="table-responsive med_tbl " style="overflow-x: hidden;">
                <table class="table mt-1">
                    <thead class="shadow">
                        <tr>
                            <th>Medicine Name</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th class="thActions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="med_body">
                    </tbody>
                </table>
           </div>
        </div>
        <!-- FOOTER --->
        <div>
        
        </div>
        <!--------------->
    </div>
  
</div>

<!--------------- MEDICINE PROFILE ------------------>
<div class="modal fade" id="medProfile"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content profile-bg">
      <div class="modal-body p-0" id="profile_body">
      </div>
    </div>
  </div>
</div>


<!----------MODAL FOR ADD MEDICINE------------->
<div class="modal fade" id="addmedicine" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-plus-circle me-2 font-green"></i>Add Medicine</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalMed"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div id="medalert"></div>
            <div class="row mt-2">
                <div class="col-sm-6 mb-4">
                    <label for="medname">Medicine Name</label>
                    <input type="text" name="" class="form-control w-100" id="medname" placeholder="Medicine Name">
                </div>
                <div class="col-sm-6 mb-4">
                    <label for="medtype">Type</label>
                    <select name="" id="medtype" class="form-control w-100">
                        <option>--TYPE--</option>
                        <option>Tablet</option>
                        <option>Capsule</option>
                        <option>Syrup</option>
                        <option>Insulin</option>
                        <option>Cream</option>
                        <option>Balm</option>
                        <option>Drops</option>
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-6 mb-4">
                    <label for="medbox">Per Box Pcs</label>
                    <input type="text" name="" id="medbox" placeholder="Per Box Pcs" class="form-control w-100">
                </div>
                <div class="col-sm-6 mb-4">
                    <label for="meddesc">Description</label>
                    <textarea name="" id="meddesc" cols="25" rows="5" class="form-control w-100"></textarea>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="addmedsubmit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </div>
</div>
<!------------------------------------>


<!----------MODAL FOR CONFIGURATIONS------------->
<div class="modal fade" id="medConfigure" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-edit me-2 text-primary"></i>Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeConfigMed"></button>
      </div>
      <div class="modal-body">
        <div class="container ">
            <div id="configalert" class="configalert w-100"></div>
            <div class="row mt-2">
                <div class="col-sm-6 mb-4">
                    <label for="editmedname">Medicine Name</label>
                    <input type="text" name="" class="form-control w-100" id="editmedname" placeholder="Medicine Name" >
                </div>
                <div class="col-sm-6 mb-4">
                    <label for="editmedtype">Type</label>
                    <select name="" id="editmedtype" class="form-control w-100">
                        <option>Tablet</option>
                        <option>Capsule</option>
                        <option>Syrup</option>
                        <option>Insulin</option>
                        <option>Cream</option>
                        <option>Balm</option>
                        <option>Drops</option>
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-6 mb-4">
                    <label for="editmedbox">Box Per Pcs</label>
                    <input type="text" name="" class="form-control w-100" id="editmedbox" placeholder="Maximum Quantity">
                </div>
                <div class="col-sm-6 mb-4">
                    <label for="editmedmax">Maximum Quantity</label>
                    <input type="text" name="" class="form-control w-100" id="editmedmax" placeholder="Maximum Quantity">
                </div>
            </div>

            <div class="row mt-1">
              <div class="col-sm-6">
                  <label for="editmeddesc">Description</label>
                  <textarea name="" id="editmeddesc" cols="66" rows="5" class="form-control"></textarea>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="" class="btn btn-success configsubmit">Submit</button>
      </div>
    </div>
  </div>
</div>
<!------------------------------------>

<!----------MODAL FOR RESTOCK------------->
<div class="modal fade" id="medRestock" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-plus-square me-2 text-success"></i>Restock</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeConfigMed"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div id="restockalert w-100"></div>
            <div class="row mt-2">
                <div class="text-center">
                  <h3 class="text-center" id="restockname"></h3>
                  <small class="fs-6" id="restocktype"></small>
                </div> 
            </div>

            <div class="row mt-5 ms-2">
                <div class="col-sm-6">
                    <label for="restockquantity">Quantity</label>
                    <input type="text" class="form-control w-100" id="restockquantity" placeholder="Quantity">
                </div>
                <div class="col-sm-6">
                  <label for="restocksupp">Supplier</label>
                    <select id="restocksupp" class="form-control w-100">
                      <?php 
                          $sql    = "SELECT * FROM supplier"; 
                          $resultSupp = mysqli_query($conn, $sql);
                          while($suppRow = mysqli_fetch_array($resultSupp)) :
                      ?>
                          <option><?= $suppRow['supplier'];?></option>
                      <?php endwhile;?>
                    </select>
                </div>
            </div>

            <div class="row mt-3 ms-2 mb-4">
                <div class="col-sm-6">
                    <label for="restockbarcode">Barcode</label>
                    <input type="text" class="form-control w-100" id="restockbarcode" placeholder="Barcode">
                </div>
                <div class="col-sm-6">
                  <?php $genCode = $globalHelper->generate_code();?>
                  <label for="restockuniqcode">Generated Code</label>
                  <input type="text" id="restockuniqcode" class="form-control w-100" value="<?= $genCode; ?>" class="gray" readonly>
                </div>
            </div>

            <div class="row mt-3 ms-2 mb-4">
                <div class="col-sm-6">
                    <label for="restockpdate">Purchase Date</label>
                    <input type="date" class="form-control w-100" id="restockpdate">
                </div>
                <div class="col-sm-6">
                  <label for="restockedate">Expiry Date</label>
                  <input type="date" class="form-control w-100" id="restockedate">
                </div>
            </div>

            

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success restocksubmit">Submit</button>
      </div>
    </div>
  </div>
</div>
<!------------------------------------>




<?php 
    if(isset($_SESSION['success'])){
        if($_SESSION['success'] == 'disabled'){
            ?>
            <script> swal("SUCCESS", "You have successfully disabled a medicine. ", "success"); </script>
            <?php
        }

        unset($_SESSION['success']);
    }
?>



<script src="../assets/js/inventory.js?<?php echo time();?>"></script>

<?php 
     require '../assets/shared/footer.php';
?>