<?php 
    require '../includes/dbcon.inc.php';
    require '../assets/shared/header.php';
    require '../assets/shared/navbar.php';
    require '../includes/class.autoloader.inc.php';
?>

<style>
    <?php require '../assets/css/inventory.css'; ?>
</style>

<?php $title = "Settings: Medicine";?>
<title><?php echo $title; ?></title>

<?php 

    $sql = "SELECT * FROM supplier";
    $result = mysqli_query($conn, $sql);
?>

<!----SUPPLIER TABLE------>
<div class="container mt-4">
    <div  class="text-end mb-2">
        <button class="rounded white btn modalss" 
                type="button" data-bs-toggle="modal" 
                data-bs-target="#addSupplier"><i class="fas fa-user-plus me-2"></i>Add Supplier</button>
    </div>

    <div class="card shadow-sm w-100">
        <div class="ms-4 pt-4 d-flex justify-content-between header">
            <h5 class="bold">Supplier</h5>
            <input type="text" class="me-3 search w-50" name="" id="suppSearch" placeholder="Search Supplier">
        </div>
        <div class="card-body ms-2">
                
           <div class="table-responsive med_tbl w-100" style="overflow-x: hidden;">
                <table class="table mt-1 w-100">
                    <thead class="shadow">
                        <tr>
                            <th>Company Name</th>
                            <th>Address</th>
                            <th>Contact Number</th>
                            <th>Landline</th>
                            <th>Email</th>
                            <th class="thActions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="supplier_body">
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

<!----DISABLED MEDICINE TABLE------>
<div class="container mt-4">

    <div class="card shadow-sm ">
        <div class="ms-4 pt-4 d-flex justify-content-between header">
            <h5 class="bold">Disabled Medicines</h5>
            <input type="text" class="me-3 search w-50" name="" id="disabledmedsearch" placeholder="Search Medicines">
        </div>
        <div class="card-body ms-2 w-100">
                
           <div class="table-responsive med_tbl w-100" style="overflow-x: hidden;">
                <table class="table mt-1 w-100">
                    <thead class="shadow">
                        <tr>
                            <th>Medicine Name</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th class="thActions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="disabledmed_body">
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

<!----STOCKS MEDICINE TABLE------>
<div class="container mt-4 pb-4">
    <div class="card shadow-sm ">
        <div class="ms-4 pt-4 d-flex justify-content-between header">
            <h5 class="bold">Medicine Stocks</h5>
            <input type="text" class="me-3 search w-50" name="" id="stockmedsearch" placeholder="Search Medicines">
        </div>
        <div class="card-body ms-2 w-100">
                
           <div class="table-responsive med_tbl w-100" style="overflow-x: hidden;">
                <table class="table mt-1 w-100">
                    <thead class="shadow">
                        <tr>
                            <th>Medicine Name</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>Puchase Date</th>
                            <th>Expiry Date</th>
                            <th>Barcode</th>
                            <th>Identifier</th>
                            <th class="thActions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="stocksmed_body">
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





<!---------- MODAL FOR ADD SUPPLIER ------------->
<div class="modal fade" id="addSupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-user-plus me-2"></i>Add Supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeSupplierMed"></button>
      </div>
      <div class="modal-body">
        <div class="container ">
            <div id="supplieralert"></div>
            <div class="row mt-2">
                <div class="col-sm-4 mt-2">
                    <label for="compname">Company Name</label>
                    <input type="text" class="form-control" id="compname" class="w-100">
                </label>
                </div>
                <div class="col-sm-4 mt-2">
                    <label for="compemail">Email</label>
                    <input type="text" class="form-control" id="compemail" class="w-100">
                </div>
                <div class="col-sm-4 mt-2">
                    <label for="compaddress">Address</label>
                    <input type="text" class="form-control" id="compaddress" class="address w-100">
                </div>

                <div class="col-sm-4 mt-2">
                    <label for="compcontact">Contact Number</label>
                    <input type="text" class="form-control" id="compcontact" class="w-100">
                </div>
                <div class="col-sm-4 mt-2">
                    <label for="complandline">Landline</label>
                    <input type="text" class="form-control" id="complandline" class="w-100">
                </div>
            </div>

            <div class="row mt-4 mb-4">
                
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="addsuppbtn" class="btn btn-success configsubmit">Submit</button>
      </div>
    </div>
  </div>
</div>
<!------------------------------------>

<!----------MODAL FOR CONFIGURE SUPPLIER------------->
<div class="modal fade" id="suppConfigure" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered  ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-edit"></i>Edit Supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeSuppConfig"></button>
      </div>
      <div class="modal-body">
        <div class="container addmedcard">
            <div id="updatesuppalert"></div>
            <div class="row mt-2">
                <div class="col-sm-3 mt-2">
                    <label for="configcompname" >Company Name</label>
                    <select class="form-control w-100" id="configcompname">
                        <?php while($row = mysqli_fetch_array($result)){
                            ?>
                                <option><?= $row['supplier']?></option>
                            <?php
                        } ?>
                    </select>
                </label>
                </div>
                <div class="col-sm-3 mt-2">
                    <label for="configcompemail">Email</label>
                    <input type="text" class="form-control" id="configcompemail" class="w-100">
                </div>

                <div class="col-sm-3 mt-2">
                    <label for="configcompaddress">Address</label>
                    <input type="text" class="form-control" id="configcompaddress" class="address w-100">
                </div>

                <div class="col-sm-3 mt-2">
                    <label for="configcompcontact">Contact Number</label>
                    <input type="text" class="form-control" id="configcompcontact" class="w-100">
                </div>

                <div class="col-sm-3 mt-2">
                    <label for="configcomplandline">Landline</label>
                    <input type="text" class="form-control" id="configcomplandline" class="w-100">
                </div>
            </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="" class="btn btn-success updateconfigsubmit">Submit</button>
      </div>
    </div>
  </div>
</div>
<!------------------------------------>

<!----------MODAL FOR UPDATE STOCKS------------->
<div class="modal fade" id="updateStocksModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-edit me-2"></i>Edit Stocks</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeUpdateStock"></button>
      </div>
      <div class="modal-body">
        <div class="container addmedcard">
            <div id="updatestockalert"></div>
            <div>
                <h4 class="text-center" id="updatestockmedname"><strong></strong></h4>
                <h5 class="text-center" id="updatestockidentifier"></h5>
            </div>

            <div class="mt-2">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="updatestockquantity">Quantity</label>
                        <input type="text" id="updatestockquantity" class="w-100">
                    </div>
                    <div class="col-sm-6">
                        <label for="updatestockbarcode">Barcode</label>
                        <input type="text" id="updatestockbarcode" class="w-100">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="updatestocksupplier">Supplier</label>
                        <input type="text" id="updatestocksupplier" readonly style="background-color: #f2f2f2;" class="w-100">
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="" class="btn btn-success updatemedstocksubmit">Submit</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="hiddenidforupdate">
<!------------------------------------>

<?php 
    if(isset($_SESSION['alert'])){
        if($_SESSION['alert'] == 'medicine_activated'){
            ?>
            <script> swal("SUCCESS", "You have successfully activated a Medicine. ", "success"); </script>
            <?php
            unset($_SESSION['alert']);
        }
    }
?>

<script src="../assets/js/settings.medicine.js?<?php echo time();?>"></script>

<?php 
    require '../assets/shared/footer.php';
?>