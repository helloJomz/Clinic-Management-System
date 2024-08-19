<div class="accordion shadow-sm" id="accordionExample">

<!---- FOR MODE--->
<input type="hidden" id="patientmode" value="<?php echo $fileMode?>">

    <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne" >
              <button class="accordion-button collapsed" type="button"  data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Account Informations
              </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body ">
                  <!-- START OF #1 ACCORDION BODY -->
                  <form action="" method="POST">
                      <div class="row ">
                          <div class=" mt-2 mb-2">
                              <h6 class="semi-bold">Change Email</h6>
                          </div>
                          <div class="col">
                              <small class="text-muted" >Current Email</small><br>
                              <input class="readonly" class="form-control" type="text" name="email" id="editemail" placeholder="Email" value="<?= $patientRow['email']; ?>" readonly>
                              <input type="hidden" id="changeemailid" value="<?= $id; ?>">
                          </div>
                          <div class="col">
                              <small class="text-muted" id="l-email1">New Email</small><br>
                              <input type="text" class="form-control" name="newemail" id="newemail" placeholder="New Email" >
                          </div>
                          <div class="col">
                              <small class="text-muted" id="l-email2">Confirm Email</small><br>
                              <input type="text" class="form-control" name="rptnewemail" id="rptnewemail"  placeholder="Repeat New Email">
                          </div>
                          
                      </div>

                      <div class="row mb-3 border-bottom">
                          <div class="col mb-5 btnSaveEmail">
                              <button type="button" id="changeemail" class="btn" style="background-color: #0cbb06 ; color: white; font-size: 12px; padding: 10px 20px;">SAVE</button>
                          </div>
                      </div>
  
                      <div class="row mb-3">
                          <div class=" mt-2 mb-2">
                              <h6 class="semi-bold">Change Password</h6>
                          </div>
                          <div class="col">
                              <small class="text-muted" >Old Password</small><br>
                              <input class="readonly" class="form-control" type="password"  id="edit-pwd" placeholder="Student Number" value="<?= $patientRow['password']; ?>" readonly>
                          </div>
                          <div class="col">
                              <small class="text-muted" id="l-pwd1">New Password</small><br>
                              <input type="text" class="form-control" id="edit-new-pwd" placeholder="New Password" >
                              <input type="hidden" id="edit-hiddenid-pwd" value="<?= $id; ?>">
                          </div>
                          <div class="col">
                              <small class="text-muted" id="l-pwd2">Confirm Password</small><br>
                              <input type="text" class="form-control" id="edit-rpt-pwd"  placeholder="Repeat New Password">
                          </div>
                      </div>

                      <div class="row">
                        <div class="col mb-5 btnSaveEmail">
                              <button type="button" id="edit-btn-pwd" class="btn" style="background-color: #0cbb06 ; color: white; font-size: 12px; padding: 10px 20px;">SAVE</button>
                        </div>
                      </div>
                  </form>
              </div>
          </div>
    </div> <!-- END OF #1 ACCORDION-->
    
    <div class="accordion-item ">
          <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Patient Informations
              </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                  <div class="row">
                      <input type="hidden" id="editpatientid" value="<?= $id; ?>">
                      <div class=" mt-2 mb-2">
                          <h6 class="semi-bold">Change Patient Informations</h6>
                      </div>
                      <div class="col">
                          <small class="text-muted" id="lp-1">First Name</small><br>
                          <input  type="text"  class="form-control" id="editfn" placeholder="First Name" value="<?= $patientRow['firstname']; ?>" >
                      </div>
                      <div class="col">
                          <small class="text-muted" id="lp-2">Middle Name</small><br>
                          <input  type="text"  class="form-control" id="editmn" placeholder="Middle Name" value="<?= $patientRow['middlename']; ?>" >
                      </div>
                      <div class="col">
                          <small class="text-muted" id="lp-3">Last Name</small><br>
                          <input  type="text"  class="form-control" id="editln" placeholder="Last Name" value="<?= $patientRow['lastname']; ?>" >
                      </div>
                      <div class="col">
                          <small class="text-muted" >Suffix</small><br>
                          <input  type="text"  class="form-control" id="editsf" placeholder="Suffix" value="<?= $patientRow['suffix']; ?>" >
                      </div>
                  </div>
  
                  <div class="row mt-4 ">
                      <div class="col">
                          <small class="text-muted" >Birthday</small><br>
                          <input  type="date" class="form-control" id="editbday" placeholder="First Name" value="<?= $patientRow['birthday']; ?>" >
                      </div>
                      <div class="col">
                          <small class="text-muted" >Gender</small><br>
                          <select id="editgender" class="form-control">
                              <option <?php if(isset($patientRow['sex']) && $patientRow['sex'] == 'Male'){echo 'selected';}?>>Male</option>
                              <option <?php if(isset($patientRow['sex']) && $patientRow['sex'] == 'Female'){echo 'selected';}?>>Female</option>
                          </select>
                      </div>
                      <div class="col">
                          <small class="text-muted" >Status</small><br>
                          <select id="editstatus" class="form-control">
                              <option <?php if(isset($patientRow['status']) && $patientRow['status'] == 'Single'){echo 'selected';}?>>Single</option>
                              <option <?php if(isset($patientRow['status']) && $patientRow['status'] == 'Married'){echo 'selected';}?>>Married</option>
                              <option <?php if(isset($patientRow['status']) && $patientRow['status'] == 'Widow'){echo 'selected';}?>>Widow</option>
                              <option <?php if(isset($patientRow['status']) && $patientRow['status'] == 'Divorced'){echo 'selected';}?>>Divorced</option>
                          </select>
                      </div>
                      <div class="col">
                          <small class="text-muted" >Status</small><br>
                          <select id="editdepartment" class="form-control">
                              <option <?php if(isset($patientRow['department']) && $patientRow['department'] == 'Computer Management'){echo 'selected';}?>>Computer Management</option>
                              <option <?php if(isset($patientRow['department']) && $patientRow['department'] == 'Engineering Technology'){echo 'selected';}?>>Engineering Technology</option>
                          </select>
                      </div>
                      
                  </div>
  
                  <div class="row mt-4 ">
                      <div class="col">
                          <small class="text-muted" id="lp-4">Address</small><br>
                          <input  type="text"  class="form-control" id="editaddress" placeholder="Address" value="<?= $patientRow['address']; ?>" >
                      </div>
                      <div class="col">
                          <small class="text-muted" id="lp-5">Phone</small><br>
                          <input  type="text"  class="form-control" id="editphone" placeholder="First Name" value="<?= $patientRow['phone']; ?>" >
                      </div>
                      <div class="col ">
                          <small class="text-muted" id="lp-6">Landline</small><br>
                          <input  type="text"  class="form-control" id="editlandline" placeholder="Middle Name" value="<?= $patientRow['landline']; ?>" >
                      </div>
                     
                  </div>

                  <div class="row mt-1">
                    <div class="col mb-5 btnSaveEmail">
                          <button type="button" id="edit-btn-patient" class="btn" style="background-color: #0cbb06 ; color: white; font-size: 12px; padding: 10px 20px;">SAVE</button>
                      </div>
                  </div>
                  
              </div>
          </div>
    </div> <!-- END OF #2 ACCORDION-->
  
    <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Emergency Contact Informations
              </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
              <div class="row">
                    <div class=" mt-2 mb-2">
                        <h6 class="semi-bold">Change Emergency Contact Informations</h6>
                    </div>
                    <div class="col">
                        <small class="text-muted">Relationship</small><br>
                        <Select id="editemergencyrelationship" class="form-control">
                            <option <?php if(isset($emergencyRow['relationship']) && $emergencyRow['relationship'] == 'Mother'){echo 'selected';}?> >Mother</option>
                            <option <?php if(isset($emergencyRow['relationship']) && $emergencyRow['relationship'] == 'Father'){echo 'selected';}?>>Father</option>
                            <option <?php if(isset($emergencyRow['relationship']) && $emergencyRow['relationship'] == 'Husband'){echo 'selected';}?>>Husband</option>
                            <option <?php if(isset($emergencyRow['relationship']) && $emergencyRow['relationship'] == 'Aunt'){echo 'selected';}?>>Aunt</option>
                            <option <?php if(isset($emergencyRow['relationship']) && $emergencyRow['relationship'] == 'Uncle'){echo 'selected';}?>>Uncle</option>
                            <option <?php if(isset($emergencyRow['relationship']) && $emergencyRow['relationship'] == 'Brother'){echo 'selected';}?>>Brother</option>
                            <option <?php if(isset($emergencyRow['relationship']) && $emergencyRow['relationship'] == 'Sister'){echo 'selected';}?>>Sister</option>
                        </Select>
                    </div>
                    <div class="col">
                        <small class="text-muted" id="le-1">First Name</small><br>
                        <input  type="text" class="form-control" id="editemergencyfn" placeholder="First Name" value="<?= $emergencyRow['firstname']; ?>" >
                    </div>
                    <div class="col">
                        <small class="text-muted" id="le-2">Last Name</small><br>
                        <input  type="text" class="form-control" id="editemergencyln" placeholder="Last Name" value="<?= $emergencyRow['lastname']; ?>" >
                    </div>
                    
                </div>

                <div class="row mt-4">

                    <div class="col">
                        <small class="text-muted" id="le-3">Email</small><br>
                        <input  type="text" class="form-control" id="editemergencyemail" placeholder="Email" value="<?= $emergencyRow['email']; ?>" >
                    </div>

                    <div class="col">
                        <small class="text-muted" id="le-4">Address</small><br>
                        <input  type="text" class="form-control" id="editemergencyaddress" placeholder="Address" value="<?= $emergencyRow['address']; ?>" >
                    </div>
                    <div class="col">
                        <small class="text-muted" id="le-5">Phone</small><br>
                        <input  type="text" class="form-control" id="editemergencyphone" placeholder="Phone" value="<?= $emergencyRow['phone']; ?>" >
                    </div>
                   
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <small class="text-muted" id="le-6">Landline</small><br>
                        <input  type="text" class="form-control" id="editemergencylandline" placeholder="Landline" value="<?= $emergencyRow['landline']; ?>" >
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col mb-5 btnSaveEmail">
                        <button type="button" id="edit-btn-emergency" class="btn" style="background-color: #0cbb06 ; color: white; font-size: 12px; padding: 10px 20px;">SAVE</button>
                    </div>
                </div>
  
              </div>
          </div>
    </div> <!-- END OF #3 ACCORDION-->
  
    <div class="accordion-item">
          <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                  Allergy
              </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                  <div class="row ">
  
                  <div class="mb-2">
                      <h6 class="text-muted">Foods </h6>
                  </div>
                  <div class="col-3">
                      <div class="form-check">
                          <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Nuts" id="allergy1" <?php if(isset($allergyRow['food'])){$pos = strpos($allergyRow['food'], "Nuts"); if($pos !== false){echo 'checked';}}?> >
                          <label class="form-check-label" for="allergy1">
                              Nuts
                          </label>
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="form-check">
                          <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Seafood" id="allergy2" <?php if(isset($allergyRow['food'])){$pos = strpos($allergyRow['food'], "Seafood"); if($pos !== false){echo 'checked';}}?> >
                          <label class="form-check-label" for="allergy2">
                              Seafood
                          </label>
                      </div>
                  </div>
                  <div class="col-3 ">
                      <div class="form-check">
                          <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Milk Products" id="allergy3" <?php if(isset($allergyRow['food'])){$pos = strpos($allergyRow['food'], "Milk Products"); if($pos !== false){echo 'checked';}}?> >
                          <label class="form-check-label" for="allergy3">
                               Milk Products
                          </label>
                      </div>
                  </div>
  
                  <div class="col-3 ">
                      <div class="form-check">
                          <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Eggs" id="allergy4" <?php if(isset($allergyRow['food'])){$pos = strpos($allergyRow['food'], "Eggs"); if($pos !== false){echo 'checked';}}?> >
                          <label class="form-check-label" for="allergy4">
                               Eggs
                          </label>
                      </div>
                  </div>
              </div>
  
              <div class="row mt-2">
                  <div class="col-3">
                      <div class="form-check">
                          <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Chicken" id="allergy5" <?php if(isset($allergyRow['food'])){$pos = strpos($allergyRow['food'], "Chicken"); if($pos !== false){echo 'checked';}}?> >
                          <label class="form-check-label" for="allergy5">
                              Chicken
                          </label>
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="form-check">
                          <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Wheat" id="allergy6" <?php if(isset($allergyRow['food'])){$pos = strpos($allergyRow['food'], "Wheat"); if($pos !== false){echo 'checked';}}?> >
                          <label class="form-check-label" for="allergy6">
                              Wheat
                          </label>
                      </div>
                  </div>
                  <div class="col-3 ">
                      <div class="form-check">
                          <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Soy" id="allergy7" <?php if(isset($allergyRow['food'])){$pos = strpos($allergyRow['food'], "Soy"); if($pos !== false){echo 'checked';}}?> >
                          <label class="form-check-label" for="allergy7">
                               Soy
                          </label>
                      </div>
                  </div>
              </div>
  
              <div class="row mt-4">
                  <div class="mb-2">
                      <h6 class="text-muted">Drugs </h6>
                  </div>
  
                  <div class="col-3">
                      <div class="form-check">
                          <input class="form-check-input" name="drugallergy[]" type="checkbox" value="Chemotherapy drugs" id="drug1" <?php if(isset($allergyRow['drug'])){$pos = strpos($allergyRow['drug'], "Chemotherapy drugs"); if($pos !== false){echo 'checked';}}?> >
                          <label class="form-check-label" for="drug1">
                              Chemotherapy drugs
                          </label>
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="form-check">
                          <input class="form-check-input" name="drugallergy[]" type="checkbox" value="Antibiotics containing sulfonamides" id="drug2" <?php if(isset($allergyRow['drug'])){$pos = strpos($allergyRow['drug'], "Antibiotics containing sulfonamides"); if($pos !== false){echo 'checked';}}?>>
                          <label class="form-check-label" for="drug2">
                              Antibiotics containing sulfonamides
                          </label>
                      </div>
                  </div>
                  <div class="col-3 ">
                      <div class="form-check">
                          <input class="form-check-input" name="drugallergy[]" type="checkbox" value="Anticonvulsants" id="drug3" <?php if(isset($allergyRow['drug'])){$pos = strpos($allergyRow['drug'], "Anticonvulsants"); if($pos !== false){echo 'checked';}}?>>
                          <label class="form-check-label" for="drug3">
                              Anticonvulsants
                          </label>
                      </div>
                  </div>
  
                  <div class="col-3 ">
                      <div class="form-check">
                          <input class="form-check-input" name="drugallergy[]" type="checkbox" value="Penicillin and related antibiotics" id="drug4" <?php if(isset($allergyRow['drug'])){$pos = strpos($allergyRow['drug'], "Penicillin and related antibiotics"); if($pos !== false){echo 'checked';}}?>>
                          <label class="form-check-label" for="drug4">
                              Penicillin and related antibiotics
                          </label>
                      </div>
                  </div>
              </div>
  
              <div class="row mt-2">
                  <div class="col-3">
                      <div class="form-check">
                          <input class="form-check-input" name="drugallergy[]" type="checkbox" value="Nonsteroidal anti-inflammatory drugs (NSAIDs)" id="drug5" <?php if(isset($allergyRow['drug'])){$pos = strpos($allergyRow['drug'], "Nonsteroidal anti-inflammatory drugs (NSAIDs)"); if($pos !== false){echo 'checked';}}?>>
                          <label class="form-check-label" for="drug5">
                              Nonsteroidal anti-inflammatory drugs (NSAIDs)
                          </label>
                      </div>
                  </div>
              </div>
  
              <div class="row mt-4">
                  <div class="mb-2">
                      <h6 class="text-muted">Other Substances </h6>
                  </div>
  
                  <div class="col-3">
                      <div class="form-check">
                          <input class="form-check-input" name="substanceallergy[]" type="checkbox" value="Animal Dander" id="os1" <?php if(isset($allergyRow['substance'])){$pos = strpos($allergyRow['substance'], "Animal Dander"); if($pos !== false){echo 'checked';}}?> >
                          <label class="form-check-label" for="os1">
                              Animal Dander
                          </label>
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="form-check">
                          <input class="form-check-input" name="substanceallergy[]" type="checkbox" value="Insect venom (sting)" id="os2" <?php if(isset($allergyRow['substance'])){$pos = strpos($allergyRow['substance'], "Insect venom (sting)"); if($pos !== false){echo 'checked';}}?>>
                          <label class="form-check-label" for="os2">
                              Insect venom (sting)
                          </label>
                      </div>
                  </div>
                  <div class="col-3 ">
                      <div class="form-check">
                          <input class="form-check-input" name="substanceallergy[]" type="checkbox" value="Molds" id="os3" <?php if(isset($allergyRow['substance'])){$pos = strpos($allergyRow['substance'], "Molds"); if($pos !== false){echo 'checked';}}?>>
                          <label class="form-check-label" for="os3">
                              Molds
                          </label>
                      </div>
                  </div>
  
                  <div class="col-3 ">
                      <div class="form-check">
                          <input class="form-check-input" name="substanceallergy[]" type="checkbox" value="Pollen" id="os4" <?php if(isset($allergyRow['substance'])){$pos = strpos($allergyRow['substance'], "Pollen"); if($pos !== false){echo 'checked';}}?>>
                          <label class="form-check-label" for="os4">
                              Pollen
                          </label>
                      </div>
                  </div>
              </div>
  
              <div class="row mt-2">
                  <div class="col-3">
                      <div class="form-check ">
                          <input class="form-check-input" name="substanceallergy[]" type="checkbox" value="Dust" id="os5" <?php if(isset($allergyRow['substance'])){$pos = strpos($allergyRow['substance'], "Dust"); if($pos !== false){echo 'checked';}}?>>
                          <label class="form-check-label" for="os5">
                              Dust
                          </label>
                      </div>
                  </div>
              </div>
  
              <div class="row mt-4">
                  <div class="col-3">
                      <small class="text-muted" id="lo-1">Others? Please specify here:</small><br>
                      <textarea name="others" cols="50" rows="5" style="z-index: 5;" id="others"><?php if(isset($allergyRow['others'])){echo $allergyRow['others']; }?></textarea>
                  </div>
                  <div class="col-3 allergyBtn">
                      <button type="button" id="edit-btn-allergy" class="btn " style="background-color: #0cbb06 ; color: white; font-size: 12px; padding: 10px 20px;">SAVE</button>
                  </div>
                      
              </div>
          
          </div>
    </div><!-- END OF #4 ACCORDION-->
  
</div>
  
  <div class="accordion shadow-sm" id="medicalAccordion">
      <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              Existing Condition
          </button>
          </h2>
          <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#medicalAccordion">
            <div class="accordion-body existingConditionTbl">
            <div class="mt-2 mb-2">
                    <h6 class="semi-bold">Existing Condition</h6>
                </div>

                <div class="table-responsive condition-tbl-scroll shadow-sm">
                    <table class="table">
                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Anemia" name="existingcondition[]" type="checkbox" value="Anemia" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Anemia"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Anemia">Anemia</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Appendectomy" name="existingcondition[]" type="checkbox" value="Appendectomy" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Appendectomy"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Appendectomy">Appendectomy</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Arthritis" name="existingcondition[]" type="checkbox" value="Arthritis" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Arthritis"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Arthritis">Arthritis</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Asthma" name="existingcondition[]" type="checkbox" value="Asthma" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Asthma"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Asthma">Asthma</label>
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Bronchitis" name="existingcondition[]" type="checkbox" value="Bronchitis" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Bronchitis"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Bronchitis">Bronchitis</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Cancer" name="existingcondition[]" type="checkbox" value="Cancer" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Cancer"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Cancer">Cancer</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Chills" name="existingcondition[]" type="checkbox" value="Chills" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Chills"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Chills">Chills</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Chronic Cold" name="existingcondition[]" type="checkbox" value="Chronic Cold" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Chronic Cold"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Chronic Cold">Chronic Cold</label>
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Chronic Cough" name="existingcondition[]" type="checkbox" value="Chronic Cough" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Chronic Cough"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Chronic Cough">Chronic Cough</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Chronic Swelling" name="existingcondition[]" type="checkbox" value="Chronic Swelling" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Chronic Swelling"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Chronic Swelling">Chronic Swelling</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Constipation" name="existingcondition[]" type="checkbox" value="Constipation" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Constipation"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Constipation">Constipation</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Depression" name="existingcondition[]" type="checkbox" value="Depression" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Depression"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Depression">Depression</label>
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Diabetes" name="existingcondition[]" type="checkbox" value="Diabetes" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Diabetes"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Diabetes">Diabetes</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Diarrhea" name="existingcondition[]" type="checkbox" value="Diarrhea" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Diarrhea"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Diarrhea">Diarrhea</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Dizziness" name="existingcondition[]" type="checkbox" value="Dizziness" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Dizziness"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Dizziness">Dizziness</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Ear Infection" name="existingcondition[]" type="checkbox" value="Ear Infection" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Ear Infection"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Ear Infection">Ear Infection</label>
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Eczema" name="existingcondition[]" type="checkbox" value="Eczema" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Eczema"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Eczema">Eczema</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Epilepsy" name="existingcondition[]" type="checkbox" value="Epilepsy" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Epilepsy"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Epilepsy">Epilepsy</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Excessive Fatigue" name="existingcondition[]" type="checkbox" value="Excessive Fatigue" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Excessive Fatigue"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Excessive Fatigue">Excessive Fatigue</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Fainting" name="existingcondition[]" type="checkbox" value="Fainting" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Fainting"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Fainting">Fainting</label>
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Head Injury" name="existingcondition[]" type="checkbox" value="Head Injury" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Head Injury"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Head Injury">Head Injury</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Heart Burn" name="existingcondition[]" type="checkbox" value="Heart Burn" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Heart Burn"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Heart Burn">Heart Burn</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Heart Disease" name="existingcondition[]" type="checkbox" value="Heart Disease" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Heart Disease"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Heart Disease">Heart Disease</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Hemorrhoid" name="existingcondition[]" type="checkbox" value="Hemorrhoid" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Hemorrhoid"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Hemorrhoid">Hemorrhoid</label>
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="High or Low Blood Pressure" name="existingcondition[]" type="checkbox" value="High or Low Blood Pressure" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "High or Low Blood Pressure"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="High or Low Blood Pressure">High or Low BP</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Insomnia" name="existingcondition[]" type="checkbox" value="Insomnia" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Insomnia"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Insomnia">Insomnia</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Kidney Stone" name="existingcondition[]" type="checkbox" value="Kidney Stone" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Kidney Stone"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Kidney Stone">Kidney Stone</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Malaria" name="existingcondition[]" type="checkbox" value="Malaria" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Malaria"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Malaria">Malaria</label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Meningitis" name="existingcondition[]" type="checkbox" value="Meningitis" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Meningitis"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Meningitis">Meningitis</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Insomnia" name="existingcondition[]" type="checkbox" value="Insomnia" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Insomnia"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Insomnia">Insomnia</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Nausea" name="existingcondition[]" type="checkbox" value="Nausea" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Nausea"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Nausea">Nausea</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Pneumonia" name="existingcondition[]" type="checkbox" value="Pneumonia" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Pneumonia"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Pneumonia">Pneumonia</label>
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Seizure" name="existingcondition[]" type="checkbox" value="Seizure" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Seizure"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Seizure">Seizure</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Shortness of Breath" name="existingcondition[]" type="checkbox" value="Shortness of Breath" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Shortness of Breath"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Shortness of Breath">Shortness of Breath</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Sinusitis" name="existingcondition[]" type="checkbox" value="Sinusitis" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Sinusitis"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Sinusitis">Sinusitis</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Thyroid" name="existingcondition[]" type="checkbox" value="Thyroid" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Thyroid"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Thyroid">Thyroid</label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Tremors" name="existingcondition[]" type="checkbox" value="Tremors" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Tremors"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Tremors">Tremors</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Ulcer" name="existingcondition[]" type="checkbox" value="Ulcer" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Ulcer"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Ulcer">Ulcer</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="U.T.I" name="existingcondition[]" type="checkbox" value="Urinary Tract Infection" 
                                <?php if(isset($historyRow['existing_condition'])){$pos = strpos($historyRow['existing_condition'], "Urinary Tract Infection"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="U.T.I">U.T.I</label>
                            </td>
                        </tr>
                        
                    </table>

                </div>

                <div class="text-center mt-2">
                    <button type="button" id="edit-btn-condition" class="btn " style="background-color: #0cbb06 ; color: white; font-size: 12px; padding: 10px 20px; width: 100px; z-index: 1;">SAVE</button>
                </div>
                     
            </div>
          </div>
        </div>
    </div><!-- END OF #5 ACCORDION-->
      
      <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseTwo">
                  Medications
              </button>
          </h2>
          <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                    <div class="row">
                        <small class="text-muted">Current Medications:</small>
                        <p id="currentMed"><?= $historyRow['medications']; ?></p>
                   </div>
                   <div class="row">
                        <div class="form-floating">
                            <textarea name="others" class="form-control" placeholder="Text Medication" id="text-medication" style="height: 100px"><?= $historyRow['medications'];?></textarea>
                            <label for="text-medication" class="ms-1">Edit Current Medication:</label>
                        </div>
                   </div>
                   <div class="row mt-2">
                        <div class="col">
                            <button type="button" id="edit-btn-medication" class="btn " style="background-color: #0cbb06 ; color: white; font-size: 12px; padding: 10px 20px;">SAVE</button>
                        </div>
                   </div>
              </div>
          </div>
      </div><!-- END OF #6 ACCORDION-->
  
      <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                  Physical Examination
              </button>
          </h2>
          <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body mb-4">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <div class="me-5">
                            <small id="l-w1">Weight (kg)</small><br>
                            <input type="text" class="form-control" name="weight" id="physicalWeight" placeholder="Weight (kg)"  value="<?php if(isset($physicalRow['weight'])){echo $physicalRow['weight'];}?>">
                            </div>
                        </div>

                        <div class="col">
                            <div>
                            <small id="l-h1">Height (cm)</small><br>
                            <input class="form-control" type="text" id="physicalHeight" name="height" placeholder="Height (cm)" value="<?php if(isset($physicalRow['height'])){echo $physicalRow['height'];}?>">
                        </div>
                    </div>
                
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered shadow-sm">
                            <tr>
                                <th colspan="3" >Vital Signs</th>
                                <th colspan="3" >Laboratory Results and Immunizations Report</th>
                            </tr>

                            <tr>
                                <td></td>
                                <td class="text-center">Normal</td>
                                <td class="text-center">Abnormal</td>
                                <td></td>
                                <td class="text-center">Normal</td>
                                <td class="text-center">Abnormal</td>
                            </tr>
    
                            <tr>
                                <td>Blood Pressure</td>
                                <td class="text-center"><input type="radio" name="bp" value="normal" <?php if(isset($physicalRow['bp']) && $physicalRow['bp'] == 'normal'){echo 'checked';}?>></td>
                                <td class="text-center"><input type="radio" name="bp" value="abnormal" <?php if(isset($physicalRow['bp']) && $physicalRow['bp'] == 'abnormal'){echo 'checked';}?>></td>
                                <td>Hct_____<br>Hgb_____</td>
                                <td class="text-center"><input type="radio" name="hcthgb" value="normal" <?php if(isset($physicalRow['hcthbg']) && $physicalRow['hcthbg'] == 'normal'){echo 'checked';}?>></td>
                                <td class="text-center"><input type="radio" name="hcthgb" value="abnormal" <?php if(isset($physicalRow['hcthbg']) && $physicalRow['hcthbg'] == 'abnormal'){echo 'checked';}?>></td>

                            </tr>

                            <tr>
                                <td>Temperature</td>
                                <td class="text-center"><input type="radio" name="temp" value="normal" <?php if(isset($physicalRow['temp']) && $physicalRow['temp'] == 'normal'){echo 'checked';}?>></td>
                                <td class="text-center"><input type="radio" name="temp" value="abnormal" <?php if(isset($physicalRow['temp']) && $physicalRow['temp'] == 'abnormal'){echo 'checked';}?>></td>
                                <td>Fasting Blood Glucose</td>
                                <td class="text-center"><input type="radio" name="fbg" value="normal" <?php if(isset($physicalRow['fbg']) && $physicalRow['fbg'] == 'normal'){echo 'checked';}?>></td>
                                <td class="text-center"><input type="radio" name="fbg" value="abnormal" <?php if(isset($physicalRow['fbg']) && $physicalRow['fbg'] == 'abnormal'){echo 'checked';}?>></td>
                            </tr>

                            <tr>
                                <td>Pulse</td>
                                <td class="text-center"><input type="radio" name="pulse" value="normal" <?php if(isset($physicalRow['pulse']) && $physicalRow['pulse'] == 'normal'){echo 'checked';}?>></td>
                                <td class="text-center"><input type="radio" name="pulse" value="abnormal" <?php if(isset($physicalRow['pulse']) && $physicalRow['pulse'] == 'abnormal'){echo 'checked';}?>></td>
                                <td>Urinalysis</td>
                                <td class="text-center"><input type="radio" name="uri" value="normal" <?php if(isset($physicalRow['uri']) && $physicalRow['uri'] == 'normal'){echo 'checked';}?>></td>
                                <td class="text-center"><input type="radio" name="uri" value="abnormal" <?php if(isset($physicalRow['uri']) && $physicalRow['uri'] == 'abnormal'){echo 'checked';}?>></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2" class="text-center"></td>
                                <td><b>Required Vaccination</b></td>
                                <td colspan="2"></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2" class="text-center"></td>
                                <td>Varicella (Chickenpox)</td>
                                <td class="text-center"><input type="radio" name="chickenpox" value="normal" <?php if(isset($physicalRow['varicella']) && $physicalRow['varicella'] == 'normal'){echo 'checked';}?>></td>
                                <td class="text-center"><input type="radio" name="chickenpox" value="abnormal" <?php if(isset($physicalRow['varicella']) && $physicalRow['varicella'] == 'abnormal'){echo 'checked';}?>></td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                                <td>Tetanus (Td/Tap)</td>
                                <td class="text-center"><input type="radio" name="tetanus" value="normal" <?php if(isset($physicalRow['teta']) && $physicalRow['teta'] == 'normal'){echo 'checked';}?>></td>
                                <td class="text-center"><input type="radio" name="tetanus" value="abnormal" <?php if(isset($physicalRow['teta']) && $physicalRow['teta'] == 'abnormal'){echo 'checked';}?>></td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                                <td>MMR</td>
                                <td class="text-center"><input type="radio" name="mmr" value="normal" <?php if(isset($physicalRow['mmr']) && $physicalRow['mmr'] == 'normal'){echo 'checked';}?>></td>
                                <td class="text-center"><input type="radio" name="mmr" value="abnormal" <?php if(isset($physicalRow['mmr']) && $physicalRow['mmr'] == 'abnormal'){echo 'checked';}?>></td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                                <td>Tuberculin Test TB( PPD)Chest X Ray (only if TB test is positive)</td>
                                <td class="text-center"><input type="radio" name="tb" value="normal" <?php if(isset($physicalRow['tb']) && $physicalRow['tb'] == 'normal'){echo 'checked';}?>></td>
                                <td class="text-center"><input type="radio" name="tb" value="abnormal" <?php if(isset($physicalRow['tb']) && $physicalRow['tb'] == 'abnormal'){echo 'checked';}?>></td>
                            </tr>
                        </table>
                        </div>

                        <div class="text-center">
                            <button type="button" id="btnPhysical" class="btn" style="background-color: #0cbb06 ; color: white; font-size: 12px; padding: 10px 20px;">SAVE</button>
                        </div>
                    </div>
              </div>
          </div>
      </div><!-- END OF #7 ACCORDION-->
  
  </div>
  
  