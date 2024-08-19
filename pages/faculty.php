<?php 
    require '../includes/dbcon.inc.php';
    require '../assets/shared/header.php';
    require '../assets/shared/navbar.php';
    require '../includes/class.autoloader.inc.php';
?>

<style>
    <?php include '../assets/css/profile.css'; ?>
</style>

<?php $title = "Faculty's Profile";?>
<title><?php echo $title; ?></title>

<?php 
    $globalHelper   = new GlobalHelper();

    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }elseif(isset($_POST['patientid'])){
        $id = $_POST['patientid'];
    }else{
        $id = $_SESSION['fileid'];
    }

    $fileMode = 'faculty';

    $patientRow     = $globalHelper->getPatient($conn, $id);
    $emergencyRow   = $globalHelper->getEmergencyContact($conn, $id);
    $physicalRow    = $globalHelper->getPhysicalExamination($conn, $id);
    $allergyRow     = $globalHelper->getAllergy($conn, $id);
    $historyRow     = $globalHelper->getMedicalHistory($conn, $id);

    $birthday       = $patientRow['birthday'];
    $cm             = $physicalRow['height'];
    $weight         = $physicalRow['weight'];

    $meter          = $globalHelper->getMeter($cm);
    $realheight     = $globalHelper->getHeight($cm);
    $bmi            = $globalHelper->bmi($meter, $weight);
    $age            = $globalHelper->getAge($birthday);

    if(!empty($patientRow['middlename'])){$tmpMiddleInitial  = $patientRow['middlename'][0]; 
    $middleInitial = $tmpMiddleInitial.".";}else{$middleInitial = null;}

    $countRequestSql = "SELECT id FROM request_log WHERE facultyid=$id ";
    $countRequestResult = mysqli_query($conn, $countRequestSql);
    $countRequestRow = mysqli_num_rows($countRequestResult);

    $countQueueSql = "SELECT id FROM queue_log WHERE facultyid=$id ";
    $countQueueResult = mysqli_query($conn, $countQueueSql);
    $countQueueRow = mysqli_num_rows($countQueueResult);

?>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<div class="container mt-4 ps-5 pe-5">
    <div class="d-flex">
        <div class="mt-2 me-3">
            <span class="title-card-color semi-bold me-2"> Patient </span> 
            <span class="semi-bold me-2"> / </span> 
            <span class="semi-bold me-2"> Faculty </span>
            <span class="badge bg-secondary course-badge"><?php echo ucwords($patientRow['department']);?></span>
        </div>

        
        <div class="ms-1">
            <button class="shadow-sm bg-white color-gray rounded p-2 edit-patient fs-6" data-bs-toggle="modal" data-bs-target="#edit-patient" >
                <i class="far fa-edit me-1"></i>Edit Patient
            </button>
        </div>
        
    </div>

</div>

<div class="container mt-2 ps-5 pe-5">
    <div class="row">
        <div class="col-md-3 mb-2 bg-white shadow-sm me-3 p-3 rounded">
            <div class="d-flex justify-content-center pt-2">
                <button type="button" class="btn btn-primary bg-none" data-bs-toggle="modal" data-bs-target="#img-preview">
                    <img class="img-fluid rounded img-patient" src="<?= $patientRow['image'];?>" alt="patient-picture" id="mainimg">
                </button>
            </div>
            <div class="d-flex justify-content-center text-center pt-2">
                <h6 class="semi-bold remove-margin-bottom"><?php echo ucwords($patientRow['firstname'])." ".ucwords($middleInitial)." ".ucwords($patientRow['lastname']." ".$patientRow['suffix']);?></h6>
            </div>
            <div class="d-flex justify-content-center text-center">
                <p class="p-0 small-text color-gray" id="edit-sn1"><?= $patientRow['email'];?></p>
            </div>
            
            <div class="d-flex justify-content-center text-center">
                <p class="p-0 fs-6 semi-bold border-bottom ">Activities</p>
            </div>

            <div class="text-center moveCountVisit">
                <div class="col p-0 w-0">
                    <button type="button" id="requestModalFaculty" class="btn bg-none title-card-color adjust-modal-a-left" data-bs-toggle="modal" data-bs-target="#visit-modal">
                        <h4><?= $countRequestRow + $countQueueRow; ?></h4>
                    </button>
                </div>
            </div>

            <div class="text-center moveVisit">
                <div class="ps-3 w-0 color-gray adjust-modal-a-left">Visits</div>
            </div>

            <!-- <div class="mt-3 text-center">
                <button class="btn btn-primary py-1 rounded">Send Message</button>
            </div> -->

        </div>

        <div class="col-md-5 mb-2 bg-white shadow-sm me-3 rounded ">
            <div class="container d-flex justify-content-between p-2 ">
                <p class="semi-bold border-bottom">Student Informations</p>
            </div>

            <div class="ms-2">
               <div class="row">
                    <div class="col">
                        <span class="color-gray">Gender</span><br><span ><?= $patientRow['sex']; ?></span>
                    </div>
                    <div class="col">
                        <span class="color-gray">Birthday</span><br><span ><?= $patientRow['birthday']?></span>
                    </div>
                    <div class="col">
                        <span class="color-gray">Age</span><br><span ><?= $age ?></span>
                    </div>
               </div>
            </div>

            <div class="ms-2  mt-4">
               <div class="row">
                    <div class="col">
                        <span class="color-gray">Status</span><br><span ><?= $patientRow['status']?></span>
                    </div>
                    <div class="col">
                        <span class="color-gray">Weight</span><br><span class="me-2"><?php echo $physicalRow['weight']." kg"; ?></span><?= $bmi ?>
                    </div>
                    <div class="col">
                        <span class="color-gray">Height</span><br><span ><?php echo $realheight." ft"; ?></span>
                    </div>
               </div>
            </div>

            <div class="ms-2  mt-4">
               <div class="row">
                    <div class="col">
                        <span class="color-gray" >Email</span><br><span id="editemail1"><?= $patientRow['email']?></span>
                    </div>
                    <div class="col">
                        <span class="color-gray">Address</span><br><span ><?= $patientRow['address']?></span>
                    </div>
               </div>
            </div>

            <div class="ms-2  mt-4">
               <div class="row">
                    <div class="col">
                        <span class="color-gray">Phone</span><br><span ><?= $patientRow['phone']?></span>
                    </div>
                    <div class="col">
                        <span class="color-gray">Landline</span><br><span ><?php if(empty($patientRow['landline'])){echo '---';}else{echo $patientRow['landline'];}?></span>
                    </div>
               </div>
            </div>

        </div>

        <div class="col-md-3 mb-2 bg-white shadow-sm rounded ">
            <div class="container d-flex justify-content-between p-2 ">
                <p class="semi-bold border-bottom">Guardian Informations</p>
                <p><span class="badge btn-secondary"><?php echo $emergencyRow['relationship']; ?></span> </p>
            </div>

            <div class="ms-2">
               <div class="row">
                    <div class="col">
                        <span class="color-gray">Firstname</span><br><span ><?= $emergencyRow['firstname']; ?></span>
                    </div>
                    <div class="col">
                        <span class="color-gray">Lastname</span><br><span ><?= $emergencyRow['lastname']; ?></span>
                    </div>
               </div>
            </div>

            <div class="ms-2 mt-4">
               <div class="row">
                    <div class="col">
                        <span class="color-gray">Email</span><br><span ><?php if(empty($emergencyRow['email'])){echo '---';}else{echo $emergencyRow['email'];}?></span>
                    </div>
               </div>
            </div>

            <div class="ms-2  mt-4">
               <div class="row">
                    <div class="col">
                        <span class="color-gray">Address</span><br><span ><?= $emergencyRow['address']; ?></span>
                    </div>
               </div>
            </div>

            <div class="ms-2  mt-4">
               <div class="row">
                    <div class="col">
                        <span class="color-gray">Phone</span><br><span ><?= $emergencyRow['phone']; ?></span>
                    </div>
                    <div class="col">
                        <span class="color-gray">Landline</span><br><span ><?php if(empty($emergencyRow['landline'])){echo '---';}else{echo $emergencyRow['landline'];}?></span>
                    </div>
               </div>
            </div>

        </div>
    </div>
</div>

<div class="container pb-5 ps-5 pe-5">
    <div class="row">
        <div class="col-md-5 mb-2 bg-white shadow-sm rounded me-3 card4">  
            <div class="container d-flex justify-content-between p-2 ">
                <p class="semi-bold border-bottom ">Medical Informations</p> 
            </div>

            <div class="ms-2 medicalhistory">
                <p>
                    <div>
                    <button class="btn collapse-btn w-100 text-start shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#allergy" aria-expanded="false" aria-controls="collapseExample">
                        Allergy 
                    </button>
                    </div>
                </p>

                <div class="collapse" id="allergy">
                    <div class="card card-body">
                        <div class="row">
                            <h6 class="semi-bold">Food Allergy</h6>
                            <span><?php if(!empty($allergyRow['food'])){echo $allergyRow['food'];}else{echo 'This patient has no allergy to food.';}?></span>
                        </div>
                        <div class="row mt-4">
                            <h6 class="semi-bold">Drug Allergy</h6>
                            <span><?php if(!empty($allergyRow['drug'])){echo $allergyRow['drug'];}else{echo 'This patient has no allergy to drug.';}?></span>
                        </div>
                        <div class="row mt-4">
                            <h6 class="semi-bold">Other Substance Allergy</h6>
                            <span><?php if(!empty($allergyRow['substance'])){echo $allergyRow['substance'];}else{echo 'This patient has no allergy to drug.';}?></span>
                        </div>
                        <div class="row mt-4">
                            <h6 class="semi-bold">Other Allergy</h6>
                            <span><?php if(!empty($allergyRow['others'])){echo $allergyRow['others'];}else{echo 'This patient has no other allergy.';}?></span>
                        </div>
                    </div>
                </div>

                <p>
                    <div>
                    <button class="btn collapse-btn w-100 text-start shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#disease" aria-expanded="false" aria-controls="collapseExample">
                        Existing Conditions
                    </button>
                    </div>
                </p>

                <div class="collapse" id="disease">
                    <div class="card card-body">
                        <div class="row">
                            <span class="text-muted"><?php if(!empty($historyRow['history_hospital']) && !empty($historyRow['hospital_date'])){echo 'This patient has been recently hospitalized for '.$historyRow['history_hospital'].' dated, '.$historyRow['hospital_date'].'.';}else{ echo 'This patient has not been recently hospitalized.';}?></span>
                        </div>
                        <div class="row mt-4">
                            <h6 class="semi-bold">Existing Conditions</h6>
                            <span><?php if(!empty($historyRow['existing_condition'])){echo $historyRow['existing_condition'];}else{'This patient has no existing conditions.';}?></span>
                        </div>
                    </div>
                </div>

                <p>
                    <div>
                    <button class="btn collapse-btn w-100 text-start shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#physical" aria-expanded="false" aria-controls="collapseExample">
                        Physical Examination
                    </button>
                    </div>
                </p>

                <div class="collapse" id="physical">
                    <div class="card card-body">
                        
                        <?php 
                            $query = "SELECT * FROM `physical_examination` WHERE studentid=$id";
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){
                                foreach($result->fetch_all(MYSQLI_ASSOC) as $row) {
                                    foreach($row as $key  => $value) {
                                        if($value == 'abnormal'){
                                            echo ucwords($key)." is ".$value.'<br>';
                                        }
                                         
                                    }
                                }
                            }
                       ?>
                    </div>
                </div>

                <p>
                    <div>
                    <button class="btn collapse-btn w-100 text-start shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#maintenance" aria-expanded="false" aria-controls="collapseExample">
                        Medications
                    </button>
                    </div>
                </p>

                <div class="collapse" id="maintenance">
                    <div class="card card-body">
                        <span><?php if(!empty($historyRow['medications'])){echo $historyRow['medications'];}else{ echo 'This patient has no record of Medications or Maintenance Medicines.';}?></span>
                    </div>
                </div>


            </div>
        </div>

        <div class="col-md-3 mb-2 bg-white shadow-sm rounded me-3 card5">
            <div class="container d-flex justify-content-between p-2 ">
                <p class="semi-bold border-bottom ">Notes</p>
            </div>

            <div class="note-body rounded">
                <div class="container">
                    <div class="note-list">
                        <div class="mt-2" id="span-note-list">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn-primary btn mt-2 float-end py-1 rounded" style="z-index: 2000;" type="button" id="addnote" data-bs-toggle="collapse" data-bs-target="#addnotebtn" aria-expanded="false" aria-controls="collapseExample">Add Note</button>
        </div>

        <div class="col-md-3 mb-2 bg-white shadow-sm rounded card6">
            <div class="container d-flex justify-content-between p-2 ">
                <p class="semi-bold border-bottom ">Files</p> 
                <button id="file-modal-data" class="bg-none" data-bs-toggle="modal" data-bs-target="#file-modal">
                    <p class="title-card-color" style="font-size: 16px;">
                    See all</p> 
                </button>
            </div>

            <div class="row d-flex justify-content-center">
                <?php 
                    $sql = "SELECT * FROM files WHERE facultyid = $id "; 
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0 ) {
                    while($fileRow = mysqli_fetch_array($result)) :
                    $fileName = str_replace("../assets/uploads/patient_files/", "",$fileRow['filepath']);
                    $department = $patientRow['department'];
                    $finalFileName = str_replace("$department", "", $fileName);
                ?>
                <div>
                <a href="<?= $fileRow['filepath']; ?>" class="file-list-button  d-flex justify-content-column mb-2 shadow-sm" onclick="window.open(this.href,'targetWindow',
                                   `toolbar=no,
                                    location=no,
                                    status=no,
                                    menubar=no,
                                    scrollbars=yes,
                                    resizable=yes,
                                    width=SomeSize,
                                    height=SomeSize`);
                return false;"><i class="far fa-file-alt me-2"></i><?= $finalFileName ?></a>
                </div>
                <?php endwhile; ?>
                <?php }else{echo '<img src="../assets/default_img/icons/notfound.png" class="notfoundicon">';} ?>
            </div>
        </div>
    
    <!--- FACULTY ID-->
    <input type="hidden" id="hiddenfacultyid" value="<?php echo $id; ?>">
    <input type="hidden" id="hiddennoteid" value="<?php echo $id; ?>">

    </div>
</div>


<!--- MODAL FOR EDIT PATIENT -->
<div class="modal fade" id="edit-patient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div id="erroralert"></div>
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit me-2"></i>EDIT PATIENT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="editPatientClose1"></button>
      </div>
      <div class="modal-body">
            <div class="container only-modal-edit">
                <?php include 'modal/modal.editfaculty.php'; ?>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="editPatientClose2">Close</button>
      </div>
    </div>
  </div>
</div>

<!--- MODAL FOR FILE -->
<div class="modal fade" id="file-modal" tabindex="-1" aria-labelledby="okay" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="okay"><i class="far fa-file-alt me-2"></i>FILES</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive" id="fileDataRow">
        
        </div>
      </div>
    </div>
  </div>
</div>

<!--- MODAL FOR ADD NOTES -->
<div class="modal fade" id="addnotemodal" tabindex="-1" aria-labelledby="okay" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
            <div class="border-bottom">
                        <h4><i class="fas fa-sticky-note me-2 text-warning"></i>Add Note</h4>
            </div>
            <div class="mt-4 content-note">
                <div class="container">
                    <div id="notealert"></div>
                    <div >
                        <div class="d-flex">
                            <input type="text" id="subject_note" placeholder="Enter Subject" class="me-2">
                            <select id="label_note" >
                                <option>--- TYPE ---</option>
                                <option>Note</option>
                                <option>Diagnosis</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="content_note" style="height: 100px"></textarea>
                        <label for="content_note">Content Message</label>
                        </div>
                    </div>

                    <div class="text-end mt-2">
                        <label for="submitnote">Admin</label>
                        <input type="text" id="note_admin" value="<?php echo $_SESSION['adminfn']." ".$_SESSION['adminln'];?>" class="p-2" readonly>
                    </div>

                    <div class="text-end mt-3">
                    
                            <button type="button" class="btn bg-success text-white" id="submitnote">Add Note</button>
                            <input type="hidden" id="note_mode" value="faculty">
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>

<!--- MODAL FOR SELECTED NOTES -->
<div class="modal fade" id="selectnote-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div>
    
            <div class="border-bottom mb-3 d-flex justify-content-between">
             <h4><strong>Notes</strong></h4>
             <span class="selectnote-delete"><i class="fas fa-trash-alt text-danger mt-2"></i></span>
            </div>

            <div id="selectnotealert"></div>
            
            <div>
                <h5><strong id="selectnote-subject"></strong></h5>   
            </div>

            <div class="rounded shadow-sm p-2 selectnote-body">
                <p id="selectnote-date"></p> 

                <p id="selectnote-content"></p>
            </div>

            <div class="text-end mt-2">
                <p class="fst-italic">Added by: <span id="selectnote-admin"></span></p>
            </div>

        </div>
      </div>
    </div>
  </div>
</div>


<!--- MODAL FOR VISIT -->
<div class="modal fade" id="visit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        
          <div class="modal-header">
          <h4 class="modal-title semi-bold">Records</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

         <h5 class="pt-2"><strong>Request</strong></h5>

          <div class="table-responsive requesttbl">
              <table class="table table-bordered shadow-sm">
                <thead class="bg-blue shadow text-white">
                    <tr>
                            <th>Medicine Name</th>
                            <th>Quantity</th>
                            <th>Administered By</th>
                            <th>Date</th>
                    </tr>
                </thead>
                <tbody id="request-body">
                </tbody>
              </table>
          </div>
            
          <div class="mt-3">
            <h5><strong>Queue</strong></h5>
            <div class="table-responsive queuetbl">
                <table class="table table-bordered">
                    <thead class="bg-blue shadow text-white">
                        <tr>
                                <th>Activity</th>
                                <th>Assist By</th>
                                <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="queue-body">
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--- MODAL FOR IMAGE -->
<div class="modal fade" id="img-preview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo ucwords($patientRow['firstname'])." ".ucwords($middleInitial)." ".ucwords($patientRow['lastname']);?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
      <img src="<?= $patientRow['image'];?>" class="img-fluid rounded" width="400" height="400" id="editimg">
      </div>
      <div class="modal-footer">
            <div class="d-flex justify-content-between">
                <form>
                    <input type="file" id="image-change" onchange="loadfile(event)" class="uploadimage">
                    <input type="hidden" id="hiddenid" value="<?= $id; ?>" >
                    <input type="hidden" id="hiddengender" value="<?= $patientRow['sex']; ?>" >
                    <button type="button" id="changepicture" class="btn btn-success">Upload</button>
                </form>
            </div>
      </div>
    </div>
  </div>
</div>


<script src="../assets/js/patient_notes.js?<?php echo time();?>"></script>
<script src="../assets/js/updatepatientmerge.js?<?php echo time();?>"></script>
<script src="../assets/js/changepicture.js"></script>

<?php 
    require '../assets/shared/footer.php';
?>