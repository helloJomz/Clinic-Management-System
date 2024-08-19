<?php 

include_once '../includes/dbcon.inc.php';
require '../assets/shared/header.php';
require '../assets/shared/navbar.php';
require '../includes/class.autoloader.inc.php';

?>

<?php $title = "Medicine Request";?>
<title><?php echo $title; ?></title>

<style>
    <?php require '../assets/css/request.css'; ?>
</style>

<div class="container mt-3">

    <div class="container p-3 d-flex justify-content-center ">
        
        <div class="bg-white rounded shadow-sm p-3 main-wrapper">
        
            <div class="header border-bottom">
                <div class="title d-flex justify-content-between">
 
                    <h6><strong>Request Medicine</strong></h6>
                    <button type="button" class="btn view-profile p-0 float-end" data-bs-toggle="modal" data-bs-target="#viewConfirmProfile"><i class="fas fa-id-card mb-2"></i></button>

                </div>
            </div>
            <div id="erroralert"></div>
            <div class="mt-4">
            
        

                <div class="complete-search text-center">
                    <div class="mt-4 med-name d-flex justify-content-center w-100"></div>
                        <select class="w-50 form-control mx-auto rounded shadow-sm" id="select-items">
                        </select>
                </div>

                <div class="table-responsive mt-3 med-stocks-tbl">
                    <h6>Select a stock:</h6>
                    <table class="table table-bordered text-center stocks-tbl">
                        <thead class="bg-blue">
                            <tr>
                                <th>Select</th>
                                <th>Quantity</th>
                                <th>Supplier</th>
                                <th>Identifier</th>
                                <th>Expiration</th>
                            </tr>
                        </thead>
                        <tbody id="stocks-result">
                            <tr>
                                <td colspan="5" class="p-3">No stocks found! Please search first.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 pb-3 request-form text-center">
                    <div class="ms-5 me-5">
                        <div>
                            <label for="med-quantity"><strong>Quantity <span id="max-quantity" class="text-success"></span></strong></label>
                        </div>
                        <input type="text" class="med-text-qty" id="med-quantity" placeholder="Quantity">
                        
                    </div>
                </div>

                <div class="border-top mt-3">
                    <div class="btn-footer float-end pt-3">
                        <a href="" class="btn bg-secondary text-white me-2 cancelForm">Cancel</a>
                        <button type="button" class="btn bg-success text-white" id="request-submit">Submit</button>
                    </div>
                </div>

            </div>
        </div>

        <!--- STORE SESSIONS ---->
        <input type="hidden" id="patientid" value="<?php echo $_SESSION['requestid']; ?>">
        <input type="hidden" id="patientmode" value="<?php echo $_SESSION['patientmode']; ?>">
     

    </div>  

</div>

<!--------------- PATIENT PROFILE ------------------>
<div class="modal fade" id="viewConfirmProfile"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content bg-blue">
      <div class="modal-body p-0" id="viewConfirmProfileBody">
      </div>
    </div>
  </div>
</div>


<script src="../assets/js/request.js?<?php echo time();?>"></script>

<?php 
    require '../assets/shared/footer.php';
?>