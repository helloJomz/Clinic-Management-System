<?php 
    require '../includes/dbcon.inc.php';
    require '../assets/shared/header.php';
    require '../assets/shared/navbar.php';
    require '../includes/class.autoloader.inc.php';
?>

<?php $title = "Search Patient";?>
<title><?php echo $title; ?></title>

<style>
    <?php require '../assets/css/request.search.css'; ?>
</style>

<div class="container mt-4 main-wrapper pb-4">

    <div class="text-center search-container">

        <input type="text" class="search-bar shadow" id="search-bar" placeholder="Search here to start requesting a Medicines">
        <select class="patientmode" id="patientmode">
            <option>Student</option>
            <option>Faculty</option>
            <option>Itech Personnel</option>
        </select>
        <span class="search-icon"><i class="fas fa-search"></i></span>
    </div>

        <div class="main-card mt-4 shadow">
            
            <div class="p-3">
                <div class="border-bottom h-card pb-2 d-flex justify-content-between">
                <h6><strong>Request Medicine</strong></h6>
                <h6><strong id="mode"></strong></h6>
                </div>
            </div>
            <div class="table-responsive ">
                <table class="table">
                    <tbody id="search-result">
                    </tbody>
                </table>
            </div>
            
        </div>
</div>


<!--------------- PATIENT PROFILE ------------------>
<div class="modal fade" id="patientProfile"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content bg-blue">
      <div class="modal-body p-0" id="profile_body">
      </div>
    </div>
  </div>
</div>

<script src="../assets/js/request.search.js?<?php echo time();?>"></script>

<?php 
    require '../assets/shared/footer.php';
?>