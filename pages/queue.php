<?php 

include_once '../includes/dbcon.inc.php';
require '../assets/shared/header.php';
require '../assets/shared/navbar.php';
require '../includes/class.autoloader.inc.php';

?>

<?php $title = "Queue";?>
<title><?php echo $title; ?></title>

<style>
   <?php require '../assets/css/queue.css'; ?>
   
</style>


<div class="container">
    <div class="d-flex mt-4 ulti-wrapper pb-4">
        
  
            <div class="wrapper_current_patient me-4">
                <div class="current_patient rounded shadow-sm">
                    <div class="text-center p-1">
                        <span class="badge bg-primary" id="patient_mode"></span>
                    </div>

                    <div class="p-2" id="current_patient_display">
                    </div>

                    <div class="btn-menu w-100 text-center bg-green ">
                        <button class="btn text-white" type="button" id="nextqueue"><i class="fas fa-arrow-circle-right me-2"></i>Next</button>
                    </div>

                </div>

            </div>

        

        <div class="wrapper_list_patient">
            <div class="list_patient rounded shadow-sm p-3">
                <div class="list_patient_header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="mt-2"><h6><strong>Total in queue: <span class="badge bg-danger text-white" id="countQueue"></span></strong></h6></div>
                            <div><h6><strong>Queue status: <span id="badgeStatus"></span></strong></h6></div>
                        </div>
                    
                    <div><button type="button" class="btn font-green add-to-queue-btn" data-bs-toggle="modal" data-bs-target="#addqueue" ><i class="fas fa-plus-circle me-2"></i>Add in queue</button></div>
                    </div>
                </div>
                <div class="table-responsive mt-3 queue-overflow">
                    <table class="table table-bordered queue-table">
                        <thead class="bg-blue text-white ">
                            <tr>
                                <th>Queue no.</th>
                                <th>Patient's Name</th>
                                <th>Transaction</th>
                            </tr>
                        </thead>
                        <tbody id="queue-body" class="queue-body">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>

<div class="modal fade" id="addqueue" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="content-add">
        <div class="queue-alert"></div>
            <div class="content-search pt-5 text-center mx-auto"> 
                <h4 class="text-center mb-4">Search a Patient</h4>
                <select id="select-patient" class="select-patient mb-3 shadow-sm text-center rounded">
                    <option>Student</option>
                    <option>Faculty</option>
                    <option>Itech Personnel</option>
                </select>
                <input type="text" class="search-patient w-100 " id="search-patient" >
            </div>

            <div class="table-responsive mt-4">
                <table class="table table-bordered">
                    <tbody id="search-body">
                    </tbody>
                </table>
            </div>

        </div>
      </div>
    </div>
  </div>
</div>



<script src="../assets/js/queue.js?<?php echo time(); ?>"></script>

<?php
    require '../assets/shared/footer.php';
?>