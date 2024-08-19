<?php 
    require '../assets/shared/header.php';
    require '../assets/shared/navbar.php';
    require '../includes/class.autoloader.inc.php';
?>

<style>
    <?php require '../assets/css/addpatient.css'; ?>
</style>

<?php
    $globalHelper   = new GlobalHelper();
    $realimage      = $globalHelper->generateCreateIcon();
?>

<div class="container mt-5 bg-white pb-3 pt-4 mb-3 main-container shadow-sm">
    <div class="row border-bottom ps-4 pt-2 pb-2 pe-4 bg-white ">
        <div class="">
            <h4>Create Patient <i class="fas fa-chevron-right font-blue ms-1"></i> Student</h4>
            <p class="text-muted minor-text p-0">All informations below are important, please fill all the fields.</p>
        </div>
    </div>
    
    <form action="../includes/addpatient.inc.php" method="POST" id="formsubmit" enctype="multipart/form-data" >
    <div class="row bg-white ps-4 pt-2 pb-2 pe-4">
        <div class="container">
            <div class="row border-bottom">
                <div class="mt-2">
                    <h6 class="bold">Upload Avatar</h6>
                    <p class="text-muted minor-text p-0">Give your patient an image.</p>
                </div>
                <div class="col">
                    <div class="image-container mt-2 mb-4">
                        <img src="<?= $realimage ?>" id="preview" width="150px" height="150px" class="rounded me-4">
                        <input type="file" id="image" name="image" onchange="loadfile(event)" >
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="row bg-white ps-4 pt-2 pb-2 pe-4 ">
        <div class="container-fluid">

            <div class="row mb-3 border-bottom">
                <div class=" mt-2">
                    <h6 class="bold">Account Information</h6>
                    <p class="text-muted minor-text p-0">This information will be used for the patient's account.</p>
                </div>
                <div class="col-sm-3">
                    <small class="text-muted">Email</small><br>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>">
                </div>
                <div class="col-sm-3">
                    <small class="text-muted">Password</small><br>
                    <input type="password" name="pwd" class="form-control" placeholder="Password" value="<?php if(isset($_SESSION['pwd'])){echo $_SESSION['pwd'];}?>">
                </div>
                <div class="col-sm-3 mb-4">
                    <small class="text-muted">Repeat Password</small><br>
                    <input type="password" name="rptpwd" class="form-control"  placeholder="Repeat Password" value="<?php if(isset($_SESSION['rptpwd'])){echo $_SESSION['rptpwd'];}?>">
                </div>
            </div>
            
            <div class="row">
                <div class="mb-2 mt-2">
                    <h6 class="bold">Patient Information</h6>
                </div>
                <div class="col-sm-3">
                    <small class="text-muted">First Name</small><br>
                    <input type="text" name="firstname" class="form-control" placeholder="First name" value="<?php if(isset($_SESSION['firstname'])){echo $_SESSION['firstname'];}?>">
                </div>
                <div class="col-sm-3">
                    <small class="text-muted">Last Name</small><br>
                    <input type="text" name="lastname" id="" class="form-control" placeholder="Last name" value="<?php if(isset($_SESSION['lastname'])){echo $_SESSION['lastname'];}?>">
                </div>
                <div class="col-sm-3">
                <small class="text-muted">Middle Name</small><br>
                    <input type="text" name="middlename" id="" class="form-control" placeholder="Middle name" value="<?php if(isset($_SESSION['middlename'])){echo $_SESSION['middlename'];}?>">
                </div>
                <div class="col-sm-3">
                    <small class="text-muted">Suffix</small><br>
                    <input type="text" name="suffix" id="" class="form-control" placeholder="Suffix (Optional)" value="<?php if(isset($_SESSION['suffix'])){echo $_SESSION['suffix'];}?>">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-3">
                    <small class="text-muted">Student Number</small><br>
                    <input type="text" name="studentnumber" class="form-control" placeholder="Student Number" value="<?php if(isset($_SESSION['studentnumber'])){echo $_SESSION['studentnumber'];}?>">
                </div>
                
                <div class="col-sm-3">
                    <small class="text-muted">Birthday</small><br>
                    <input type="date" name="birthday" class="form-control" value="<?php if(isset($_SESSION['birthday'])){echo $_SESSION['birthday'];}?>">
                </div>

                <div class="col-sm-3">
                    <small class="text-muted">Gender</small><br>
                    <select name="gender" class="form-control" >
                        <option selected>Gender</option>
                        <option <?php if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){echo 'selected';}?>>Male</option>
                        <option <?php if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){echo 'selected';}?>>Female</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <small class="text-muted">Status</small><br>
                    <select name="status" class="form-control">
                        <option selected>Status</option>
                        <option <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'Single'){echo 'selected';}?>>Single</option>
                        <option <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'Married'){echo 'selected';}?>>Married</option>
                        <option <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'Widow'){echo 'selected';}?>>Widow</option>
                        <option <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'Divorced'){echo 'selected';}?>>Divorced</option>
                    </select>
                </div>
            </div>

            <div class="row mt-4 ">
                <div class="col-sm-3">
                    <small class="text-muted">Address</small><br>
                    <input type="text" class="form-control" name="address" placeholder="Address" value="<?php if(isset($_SESSION['address'])){echo $_SESSION['address'];}?>">
                </div>
                <div class="col-sm-3">
                    <small class="text-muted">Phone Number</small><br>
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="<?php if(isset($_SESSION['phone'])){echo $_SESSION['phone'];}?>">
                </div>
                <div class="col-sm-3 ">
                <small class="text-muted">Landline</small><br>
                    <input type="text" class="form-control" name="landline" placeholder="Landline (Optional)">
                </div>

                <div class="col-sm-3 ">
                    <small class="text-muted">Course</small><br>
                    <select name="course" class="form-control">
                        <option selected>Course</option>
                        <option <?php if(isset($_SESSION['course']) && $_SESSION['course'] == 'DCET'){echo 'selected';}?>>DCET</option>
                        <option <?php if(isset($_SESSION['course']) && $_SESSION['course'] == 'DEET'){echo 'selected';}?>>DEET</option>
                        <option <?php if(isset($_SESSION['course']) && $_SESSION['course'] == 'DECET'){echo 'selected';}?>>DECET</option>
                        <option <?php if(isset($_SESSION['course']) && $_SESSION['course'] == 'DICT'){echo 'selected';}?>>DICT</option>
                        <option <?php if(isset($_SESSION['course']) && $_SESSION['course'] == 'DOMT'){echo 'selected';}?>>DOMT</option>
                        <option <?php if(isset($_SESSION['course']) && $_SESSION['course'] == 'DMET'){echo 'selected';}?>>DMET</option>
                        <option <?php if(isset($_SESSION['course']) && $_SESSION['course'] == 'DRET'){echo 'selected';}?>>DRET</option>
                        <option <?php if(isset($_SESSION['course']) && $_SESSION['course'] == 'DCVET'){echo 'selected';}?>>DCVET</option>
                    </select>
                </div>
            </div>

            <div class="row mt-4 border-bottom">
                <div class="col-sm-3">
                    <small class="text-muted">Year</small><br>
                    <select name="year" class="form-control">
                        <option selected>Year</option>
                        <option <?php if(isset($_SESSION['year']) && $_SESSION['year'] == '1'){echo 'selected';}?>>1</option>
                        <option <?php if(isset($_SESSION['year']) && $_SESSION['year'] == '2'){echo 'selected';}?>>2</option>
                        <option <?php if(isset($_SESSION['year']) && $_SESSION['year'] == '3'){echo 'selected';}?>>3</option>
                    </select>
                </div>
                <div class="col-sm-3 mb-4">
                    <small class="text-muted">Section</small><br>
                    <select name="section" class="form-control">
                        <option selected>Section</option>
                        <option <?php if(isset($_SESSION['section']) && $_SESSION['section'] == '1'){echo 'selected';}?>>1</option>
                        <option <?php if(isset($_SESSION['section']) && $_SESSION['section'] == '2'){echo 'selected';}?>>2</option>
                        <option <?php if(isset($_SESSION['section']) && $_SESSION['section'] == '3'){echo 'selected';}?>>3</option>
                        <option <?php if(isset($_SESSION['section']) && $_SESSION['section'] == '4'){echo 'selected';}?>>4</option>
                        <option <?php if(isset($_SESSION['section']) && $_SESSION['section'] == '5'){echo 'selected';}?>>5</option>
                        <option <?php if(isset($_SESSION['section']) && $_SESSION['section'] == '6'){echo 'selected';}?>>6</option>
                        <option <?php if(isset($_SESSION['section']) && $_SESSION['section'] == '7'){echo 'selected';}?>>7</option>
                        <option <?php if(isset($_SESSION['section']) && $_SESSION['section'] == '8'){echo 'selected';}?>>8</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="mb-2 mt-4">
                    <h6 class="bold">Guardian Information</h6>
                </div>
                <div class="col-sm-3">
                    <small class="text-muted">Relationship</small><br>
                    <Select name="emergency_relationship" class="form-control">
                        <option selected>Relationship</option>
                        <option <?php if(isset($_SESSION['relationship']) && $_SESSION['relationship'] == 'Mother'){echo 'selected';}?> >Mother</option>
                        <option <?php if(isset($_SESSION['relationship']) && $_SESSION['relationship'] == 'Father'){echo 'selected';}?>>Father</option>
                        <option <?php if(isset($_SESSION['relationship']) && $_SESSION['relationship'] == 'Husband'){echo 'selected';}?>>Husband</option>
                        <option <?php if(isset($_SESSION['relationship']) && $_SESSION['relationship'] == 'Aunt'){echo 'selected';}?>>Aunt</option>
                        <option <?php if(isset($_SESSION['relationship']) && $_SESSION['relationship'] == 'Uncle'){echo 'selected';}?>>Uncle</option>
                        <option <?php if(isset($_SESSION['relationship']) && $_SESSION['relationship'] == 'Brother'){echo 'selected';}?>>Brother</option>
                        <option <?php if(isset($_SESSION['relationship']) && $_SESSION['relationship'] == 'Sister'){echo 'selected';}?>>Sister</option>
                    </Select>
                </div>
                <div class="col-sm-3">
                    <small class="text-muted">First Name</small><br>
                    <input type="text" class="form-control" name="emergency_firstname" placeholder="First name" value="<?php if(isset($_SESSION['emergency_firstname'])){echo $_SESSION['emergency_firstname'];}?>">
                </div>
                <div class="col-sm-3">
                    <small class="text-muted">Last Name</small><br>
                    <input type="text" class="form-control" name="emergency_lastname" id="" placeholder="Last name" value="<?php if(isset($_SESSION['emergency_lastname'])){echo $_SESSION['emergency_lastname'];}?>">
                </div>
                <div class="col-sm-3">
                <small class="text-muted">Email</small><br>
                    <input type="text" class="form-control" name="emergency_email" id="" placeholder="Email (Optional)" value="<?php if(isset($_SESSION['emergency_email'])){echo $_SESSION['emergency_email'];}?>">
                </div>
            
            </div>

            <div class="row mt-4 border-bottom">
                <div class="col-sm-3">
                    <small class="text-muted">Phone Number</small><br>
                    <input type="text" class="form-control" name="emergency_phone" id="" placeholder="Phone Number" value="<?php if(isset($_SESSION['emergency_phone'])){echo $_SESSION['emergency_phone'];}?>">
                </div>
                <div class="col-sm-3">
                    <small class="text-muted">Landline</small><br>
                    <input type="text"  class="form-control" name="emergency_landline" placeholder="Landline (Optional)" value="<?php if(isset($_SESSION['emergency_landline'])){echo $_SESSION['emergency_landline'];}?>">
                </div>
                <div class="col-sm-3 mb-4">
                    <small class="text-muted">Address</small><br>
                    <input type="text"  class="form-control" name="emergency_address" id="" placeholder="Address" value="<?php if(isset($_SESSION['emergency_address'])){echo $_SESSION['emergency_address'];}?>">
                </div>
                
            </div>

           <div class="mt-4">
                <div class="buttonContainer d-flex w-100 overflow-auto magic-bg">
                    <button  form="" class="shadow-sm w-100" onClick="showPanel(0, '#f2f2f2')">Allergy</button>
                    <button  form="" class="shadow-sm w-100" onClick="showPanel(1, '#f2f2f2')">Medical History</button>
                    <button  form="" class="shadow-sm w-100" onClick="showPanel(2, '#f2f2f2')">Physical Examination</button>
                    <button  form="" class="shadow-sm w-100" onClick="showPanel(3, '#f2f2f2')">Medications</button>
                    <button  form="" class="shadow-sm w-100" onClick="showPanel(4, '#f2f2f2')">Files</button>
                </div>
           </div>

           <div class="tabPanel shadow-sm p-4">
           <div class="row ">

                <div class="mb-2">
                    <h6 class="semi-bold">Foods </h6>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Nuts" id="allergy1" <?php if(isset($_SESSION['allergy1'])){$pos = strpos($_SESSION['allergy1'], "Nuts"); if($pos !== false){echo 'checked';}}?> >
                        <label class="form-check-label" for="allergy1">
                            Nuts
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Seafood" id="allergy2" <?php if(isset($_SESSION['allergy1'])){$pos = strpos($_SESSION['allergy1'], "Seafood"); if($pos !== false){echo 'checked';}}?> >
                        <label class="form-check-label" for="allergy2">
                            Seafood
                        </label>
                    </div>
                </div>
                <div class="col ">
                    <div class="form-check">
                        <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Milk Products" id="allergy3" <?php if(isset($_SESSION['allergy1'])){$pos = strpos($_SESSION['allergy1'], "Milk Products"); if($pos !== false){echo 'checked';}}?> >
                        <label class="form-check-label" for="allergy3">
                            Milk Products
                        </label>
                    </div>
                </div>

                <div class="col ">
                    <div class="form-check">
                        <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Eggs" id="allergy4" <?php if(isset($_SESSION['allergy1'])){$pos = strpos($_SESSION['allergy1'], "Eggs"); if($pos !== false){echo 'checked';}}?> >
                        <label class="form-check-label" for="allergy4">
                            Eggs
                        </label>
                    </div>
                </div>
                </div>

                <div class="row mt-2">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Chicken" id="allergy5" <?php if(isset($_SESSION['allergy1'])){$pos = strpos($_SESSION['allergy1'], "Chicken"); if($pos !== false){echo 'checked';}}?> >
                        <label class="form-check-label" for="allergy5">
                            Chicken
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Wheat" id="allergy6" <?php if(isset($_SESSION['allergy1'])){$pos = strpos($_SESSION['allergy1'], "Wheat"); if($pos !== false){echo 'checked';}}?> >
                        <label class="form-check-label" for="allergy6">
                            Wheat
                        </label>
                    </div>
                </div>
                <div class="col ">
                    <div class="form-check">
                        <input class="form-check-input" name="foodallergy[]" type="checkbox" value="Soy" id="allergy7" <?php if(isset($_SESSION['allergy1'])){$pos = strpos($_SESSION['allergy1'], "Soy"); if($pos !== false){echo 'checked';}}?> >
                        <label class="form-check-label" for="allergy7">
                            Soy
                        </label>
                    </div>
                </div>
                </div>

                <div class="row mt-4">
                <div class="mb-2">
                    <h6 class="semi-bold">Drugs </h6>
                </div>

                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" name="drugallergy[]" type="checkbox" value="Chemotherapy drugs" id="drug1" <?php if(isset($_SESSION['allergy2'])){$pos = strpos($_SESSION['allergy2'], "Chemotherapy drugs"); if($pos !== false){echo 'checked';}}?> >
                        <label class="form-check-label" for="drug1">
                            Chemotherapy drugs
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" name="drugallergy[]" type="checkbox" value="Antibiotics containing sulfonamides" id="drug2" <?php if(isset($_SESSION['allergy2'])){$pos = strpos($_SESSION['allergy2'], "Antibiotics containing sulfonamides"); if($pos !== false){echo 'checked';}}?>>
                        <label class="form-check-label" for="drug2">
                            Antibiotics containing sulfonamides
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" name="drugallergy[]" type="checkbox" value="Anticonvulsants" id="drug3" <?php if(isset($_SESSION['allergy2'])){$pos = strpos($_SESSION['allergy2'], "Anticonvulsants"); if($pos !== false){echo 'checked';}}?>>
                        <label class="form-check-label" for="drug3">
                            Anticonvulsants
                        </label>
                    </div>
                </div>


                </div>

                <div class="row mt-2">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" name="drugallergy[]" type="checkbox" value="Nonsteroidal anti-inflammatory drugs (NSAIDs)" id="drug5" <?php if(isset($_SESSION['allergy2'])){$pos = strpos($_SESSION['allergy2'], "Nonsteroidal anti-inflammatory drugs (NSAIDs)"); if($pos !== false){echo 'checked';}}?>>
                        <label class="form-check-label" for="drug5">
                            Nonsteroidal anti-inflammatory drugs (NSAIDs)
                        </label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" name="drugallergy[]" type="checkbox" value="Penicillin and related antibiotics" id="drug4" <?php if(isset($_SESSION['allergy2'])){$pos = strpos($_SESSION['allergy2'], "Penicillin and related antibiotics"); if($pos !== false){echo 'checked';}}?>>
                        <label class="form-check-label" for="drug4">
                            Penicillin and related antibiotics
                        </label>
                    </div>
                </div>
                </div>

                <div class="row mt-4">
                <div class="mb-2">
                    <h6 class="semi-bold">Other Substances </h6>
                </div>

                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" name="substanceallergy[]" type="checkbox" value="Animal Dander" id="os1" <?php if(isset($_SESSION['allergy3'])){$pos = strpos($_SESSION['allergy3'], "Animal Dander"); if($pos !== false){echo 'checked';}}?> >
                        <label class="form-check-label" for="os1">
                            Animal Dander
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" name="substanceallergy[]" type="checkbox" value="Insect venom (sting)" id="os2" <?php if(isset($_SESSION['allergy3'])){$pos = strpos($_SESSION['allergy3'], "Insect venom (sting)"); if($pos !== false){echo 'checked';}}?>>
                        <label class="form-check-label" for="os2">
                            Insect venom (sting)
                        </label>
                    </div>
                </div>
                <div class="col-sm-3 ">
                    <div class="form-check">
                        <input class="form-check-input" name="substanceallergy[]" type="checkbox" value="Molds" id="os3" <?php if(isset($_SESSION['allergy3'])){$pos = strpos($_SESSION['allergy3'], "Molds"); if($pos !== false){echo 'checked';}}?>>
                        <label class="form-check-label" for="os3">
                            Molds
                        </label>
                    </div>
                </div>

                <div class="col-sm-3 ">
                    <div class="form-check">
                        <input class="form-check-input" name="substanceallergy[]" type="checkbox" value="Pollen" id="os4" <?php if(isset($_SESSION['allergy3'])){$pos = strpos($_SESSION['allergy3'], "Pollen"); if($pos !== false){echo 'checked';}}?>>
                        <label class="form-check-label" for="os4">
                            Pollen
                        </label>
                    </div>
                </div>
                </div>

                <div class="row mt-2">
                <div class="col-3">
                    <div class="form-check ">
                        <input class="form-check-input" name="substanceallergy[]" type="checkbox" value="Dust" id="os5" <?php if(isset($_SESSION['allergy3'])){$pos = strpos($_SESSION['allergy3'], "Dust"); if($pos !== false){echo 'checked';}}?>>
                        <label class="form-check-label" for="os5">
                            Dust
                        </label>
                    </div>
                </div>
                </div>

                <div class="row mt-4">
                <div class="col">
                    <div class="form-floating">
                    <textarea name="others" class="form-control" placeholder="Leave a comment here" id="lo-1" style="height: 100px"></textarea>
                    <label for="lo-1">Others? Please specify here</label>
                    </div>
                </div>
                </div>

             

                
            </div>

            </div> <!-- END OF FIRST TAB PANEL -->

            <div class="tabPanel shadow-sm p-4">
                <div class="container">
                    <div class="mb-4">
                        <span>Have you been recently hospitalized?</span>
                        <div class="mt-3">
                            <label for="reason" class="me-2">Reason</label>
                            <input type="text" name="reason" id="reason" class="me-4" value="<?php if(isset($_SESSION['reason'])){echo $_SESSION['reason'];} ?>">
                            <label for="reasondate" class="me-2" >Date</label>
                            <input type="date" name="reasondate" id="reasondate" value="<?php if(isset($_SESSION['reasondate'])){echo $_SESSION['reasondate'];} ?>">
                        </div>
                    </div>
                    <div>
                        <h6>Check all that applies.</h6>
                    </div>

                
                <div class="table-responsive condition-tbl-scroll shadow-sm">
                    <table class="table">
                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Anemia" name="existingcondition[]" type="checkbox" value="Anemia" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Anemia"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Anemia">Anemia</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Appendectomy" name="existingcondition[]" type="checkbox" value="Appendectomy" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Appendectomy"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Appendectomy">Appendectomy</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Arthritis" name="existingcondition[]" type="checkbox" value="Arthritis" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Arthritis"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Arthritis">Arthritis</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Asthma" name="existingcondition[]" type="checkbox" value="Asthma" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Asthma"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Asthma">Asthma</label>
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Bronchitis" name="existingcondition[]" type="checkbox" value="Bronchitis" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Bronchitis"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Bronchitis">Bronchitis</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Cancer" name="existingcondition[]" type="checkbox" value="Cancer" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Cancer"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Cancer">Cancer</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Chills" name="existingcondition[]" type="checkbox" value="Chills" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Chills"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Chills">Chills</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Chronic Cold" name="existingcondition[]" type="checkbox" value="Chronic Cold" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Chronic Cold"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Chronic Cold">Chronic Cold</label>
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Chronic Cough" name="existingcondition[]" type="checkbox" value="Chronic Cough" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Chronic Cough"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Chronic Cough">Chronic Cough</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Chronic Swelling" name="existingcondition[]" type="checkbox" value="Chronic Swelling" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Chronic Swelling"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Chronic Swelling">Chronic Swelling</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Constipation" name="existingcondition[]" type="checkbox" value="Constipation" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Constipation"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Constipation">Constipation</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Depression" name="existingcondition[]" type="checkbox" value="Depression" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Depression"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Depression">Depression</label>
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Diabetes" name="existingcondition[]" type="checkbox" value="Diabetes" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Diabetes"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Diabetes">Diabetes</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Diarrhea" name="existingcondition[]" type="checkbox" value="Diarrhea" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Diarrhea"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Diarrhea">Diarrhea</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Dizziness" name="existingcondition[]" type="checkbox" value="Dizziness" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Dizziness"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Dizziness">Dizziness</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Ear Infection" name="existingcondition[]" type="checkbox" value="Ear Infection" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Ear Infection"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Ear Infection">Ear Infection</label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Eczema" name="existingcondition[]" type="checkbox" value="Eczema" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Eczema"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Eczema">Eczema</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Epilepsy" name="existingcondition[]" type="checkbox" value="Epilepsy" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Epilepsy"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Epilepsy">Epilepsy</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Excessive Fatigue" name="existingcondition[]" type="checkbox" value="Excessive Fatigue" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Excessive Fatigue"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Excessive Fatigue">Excessive Fatigue</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Fainting" name="existingcondition[]" type="checkbox" value="Fainting" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Fainting"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Fainting">Fainting</label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Head Injury" name="existingcondition[]" type="checkbox" value="Head Injury" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Head Injury"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Head Injury">Head Injury</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Heart Burn" name="existingcondition[]" type="checkbox" value="Heart Burn" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Heart Burn"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Heart Burn">Heart Burn</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Heart Disease" name="existingcondition[]" type="checkbox" value="Heart Disease" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Heart Disease"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Heart Disease">Heart Disease</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Hemorrhoid" name="existingcondition[]" type="checkbox" value="Hemorrhoid" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Hemorrhoid"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Hemorrhoid">Hemorrhoid</label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="High or Low Blood Pressure" name="existingcondition[]" type="checkbox" value="High or Low Blood Pressure" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "High or Low Blood Pressure"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="High or Low Blood Pressure">High or Low BP</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Insomnia" name="existingcondition[]" type="checkbox" value="Insomnia" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Insomnia"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Insomnia">Insomnia</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Kidney Stone" name="existingcondition[]" type="checkbox" value="Kidney Stone" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Kidney Stone"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Kidney Stone">Kidney Stone</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Malaria" name="existingcondition[]" type="checkbox" value="Malaria" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Malaria"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Malaria">Malaria</label>
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Meningitis" name="existingcondition[]" type="checkbox" value="Meningitis" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Meningitis"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Meningitis">Meningitis</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Insomnia" name="existingcondition[]" type="checkbox" value="Insomnia" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Insomnia"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Insomnia">Insomnia</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Nausea" name="existingcondition[]" type="checkbox" value="Nausea" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Nausea"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Nausea">Nausea</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Pneumonia" name="existingcondition[]" type="checkbox" value="Pneumonia" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Pneumonia"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Pneumonia">Pneumonia</label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Seizure" name="existingcondition[]" type="checkbox" value="Seizure" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Seizure"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Seizure">Seizure</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Shortness of Breath" name="existingcondition[]" type="checkbox" value="Shortness of Breath" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Shortness of Breath"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Shortness of Breath">Shortness of Breath</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Sinusitis" name="existingcondition[]" type="checkbox" value="Sinusitis" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Sinusitis"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Sinusitis">Sinusitis</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Thyroid" name="existingcondition[]" type="checkbox" value="Thyroid" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Thyroid"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Thyroid">Thyroid</label>
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <input class="form-check-input shadow-sm" id="Tremors" name="existingcondition[]" type="checkbox" value="Tremors" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Tremors"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Tremors">Tremors</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="Ulcer" name="existingcondition[]" type="checkbox" value="Ulcer" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Ulcer"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="Ulcer">Ulcer</label>
                            </td>

                            <td> 
                                <input class="form-check-input shadow-sm" id="U.T.I" name="existingcondition[]" type="checkbox" value="Urinary Tract Infection" 
                                <?php if(isset($_SESSION['existingcondition'])){$pos = strpos($_SESSION['existingcondition'], "Urinary Tract Infection"); 
                                if($pos !== false){echo 'checked';}} ?>>
                                <label class="form-check-label" for="U.T.I">U.T.I</label>
                            </td>
                        </tr>

                    </table>

                </div>
                    </div>
                </div>
            </div> <!-- END OF SECOND TAB PANEL -->

            <div class="tabPanel shadow-sm p-4">
                <div class="container mt-2 ">

                        <div class="mb-4 d-flex justify-content-center">
                            <div class="row me-5">
                                <div class="col-sm-5">
                                    <small >Weight (kg)</small><br>
                                    <input type="text" class="w-100" name="weight" placeholder="Weight (kg)"  value="<?php if(isset($_SESSION['weight'])){echo $_SESSION['weight'];}?>">
                                </div>
                                <div class="col-sm-5">
                                    <small >Height (cm)</small><br>
                                    <input type="text" class="w-100" name="height" placeholder="Height (cm)" value="<?php if(isset($_SESSION['height'])){echo $_SESSION['height'];}?>">
                                </div>
                            </div>
                        </div>
                    <div class="table-responsive">
                    <table class="table table-bordered bg-white shadow-sm">
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
                            <td class="text-center"><input type="radio" name="bp" value="normal" <?php if(isset($_SESSION['bp']) && $_SESSION['bp'] == 'normal'){echo 'checked';}?>></td>
                            <td class="text-center"><input type="radio" name="bp" value="abnormal" <?php if(isset($_SESSION['bp']) && $_SESSION['bp'] == 'abnormal'){echo 'checked';}?>></td>
                            <td>Hct_____<br>Hgb_____</td>
                            <td class="text-center"><input type="radio" name="hcthgb" value="normal" <?php if(isset($_SESSION['hcthgb']) && $_SESSION['hcthgb'] == 'normal'){echo 'checked';}?>></td>
                            <td class="text-center"><input type="radio" name="hcthgb" value="abnormal" <?php if(isset($_SESSION['hcthgb']) && $_SESSION['hcthgb'] == 'abnormal'){echo 'checked';}?>></td>

                        </tr>

                        <tr>
                            <td>Temperature</td>
                            <td class="text-center"><input type="radio" name="temp" value="normal" <?php if(isset($_SESSION['temp']) && $_SESSION['temp'] == 'normal'){echo 'checked';}?>></td>
                            <td class="text-center"><input type="radio" name="temp" value="abnormal" <?php if(isset($_SESSION['temp']) && $_SESSION['temp'] == 'abnormal'){echo 'checked';}?>></td>
                            <td>Fasting Blood Glucose</td>
                            <td class="text-center"><input type="radio" name="fbg" value="normal" <?php if(isset($_SESSION['fbg']) && $_SESSION['fbg'] == 'normal'){echo 'checked';}?>></td>
                            <td class="text-center"><input type="radio" name="fbg" value="abnormal" <?php if(isset($_SESSION['fbg']) && $_SESSION['fbg'] == 'abnormal'){echo 'checked';}?>></td>
                        </tr>

                        <tr>
                            <td>Pulse</td>
                            <td class="text-center"><input type="radio" name="pulse" value="normal" <?php if(isset($_SESSION['pulse']) && $_SESSION['pulse'] == 'normal'){echo 'checked';}?>></td>
                            <td class="text-center"><input type="radio" name="pulse" value="abnormal" <?php if(isset($_SESSION['pulse']) && $_SESSION['pulse'] == 'abnormal'){echo 'checked';}?>></td>
                            <td>Urinalysis</td>
                            <td class="text-center"><input type="radio" name="uri" value="normal" <?php if(isset($_SESSION['uri']) && $_SESSION['uri'] == 'normal'){echo 'checked';}?>></td>
                            <td class="text-center"><input type="radio" name="uri" value="abnormal" <?php if(isset($_SESSION['uri']) && $_SESSION['uri'] == 'abnormal'){echo 'checked';}?>></td>
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
                            <td class="text-center"><input type="radio" name="chickenpox" value="normal" <?php if(isset($_SESSION['chickenpox']) && $_SESSION['chickenpox'] == 'normal'){echo 'checked';}?>></td>
                            <td class="text-center"><input type="radio" name="chickenpox" value="abnormal" <?php if(isset($_SESSION['chickenpox']) && $_SESSION['chickenpox'] == 'abnormal'){echo 'checked';}?>></td>
                        </tr>

                        <tr>
                            <td colspan="3"></td>
                            <td>Tetanus (Td/Tap)</td>
                            <td class="text-center"><input type="radio" name="tetanus" value="normal" <?php if(isset($_SESSION['tetanus']) && $_SESSION['tetanus'] == 'normal'){echo 'checked';}?>></td>
                            <td class="text-center"><input type="radio" name="tetanus" value="abnormal" <?php if(isset($_SESSION['tetanus']) && $_SESSION['tetanus'] == 'abnormal'){echo 'checked';}?>></td>
                        </tr>

                        <tr>
                            <td colspan="3"></td>
                            <td>MMR</td>
                            <td class="text-center"><input type="radio" name="mmr" value="normal" <?php if(isset($_SESSION['mmr']) && $_SESSION['mmr'] == 'normal'){echo 'checked';}?>></td>
                            <td class="text-center"><input type="radio" name="mmr" value="abnormal" <?php if(isset($_SESSION['mmr']) && $_SESSION['mmr'] == 'abnormal'){echo 'checked';}?>></td>
                        </tr>

                        <tr>
                            <td colspan="3"></td>
                            <td>Tuberculin Test TB( PPD)Chest X Ray (only if TB test is positive)</td>
                            <td class="text-center"><input type="radio" name="tb" value="normal" <?php if(isset($_SESSION['tb']) && $_SESSION['tb'] == 'normal'){echo 'checked';}?>></td>
                            <td class="text-center"><input type="radio" name="tb" value="abnormal" <?php if(isset($_SESSION['tb']) && $_SESSION['tb'] == 'abnormal'){echo 'checked';}?>></td>
                        </tr>
                    </table>
                    </div>
                </div>
            </div> <!-- END OF THIRD TAB PANEL -->

            <div class="tabPanel shadow-sm p-4 default-panel">
                    <div class="text-center mx-auto">
                        <span>Are you taking any Medications? Maintenance Medicines?</span>
                        <div class="table-responsive w-100 mx-auto">
                            <table class="table mt-3 bg-white w-100" id="medicationtbl">
                                <tr>
                                    <th>Medicine Name</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="medication[]" ></td>
                                    <td><button form="" name="add_more" class="add_more" id="add_more"><i class="fas fa-plus-circle"></i></button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
            </div><!-- END OF FOURTH TAB PANEL -->

            <div class="tabPanel shadow-sm p-4 default-panel">
                <div class="">
                    <div class="table-responsive">
                        <table id="file-table" class="table table-bordered bg-white">
                            <tr>
                                <th>File Upload</th>
                                <th>File Name</th>
                                <th>Description</th>
                                <th>Add or Remove</th>
                            </tr>

                            <tr>
                                <td><input type="file" name="file[]"></td>
                                <td><input type="text" name="file_name[]"></td>
                                <td><input type="text" name="file_description[]"></td>
                                <td><button form="" name="add_more" class="add_more text-center" id="add_file"><i class="fas fa-plus-circle"></i></button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="mt-4 text-end">
                <a href="search.php?search=Student" class="btn btn-secondary me-2">Cancel</a>
                <button class="btn create" name="createstudent" type="submit">Create</button>
                </form>
            </div>

        </div>


    </div>

</div>

</form>

<?php 
    require_once '../includes/alerts/alert.addpatient.php';
?>

<?php 
    unset($_SESSION['email'], $_SESSION['pwd'], $_SESSION['rptpwd'], $_SESSION['firstname'], $_SESSION['lastname'], $_SESSION['middlename'],
          $_SESSION['suffix'], $_SESSION['studentnumber'], $_SESSION['birthday'], $_SESSION['gender'], $_SESSION['status'], $_SESSION['address'],
          $_SESSION['phone'], $_SESSION['landline'], $_SESSION['course'], $_SESSION['year'], $_SESSION['section'], $_SESSION['relationship'],
          $_SESSION['emergency_firstname'], $_SESSION['emergency_lastname'], $_SESSION['emergency_email'], $_SESSION['emergency_phone'], 
          $_SESSION['emergency_landline'], $_SESSION['emergency_address'], $_SESSION['allergy1'], $_SESSION['allergy2'], $_SESSION['allergy3'],
          $_SESSION['others'], $_SESSION['existingcondition'], $_SESSION['reason'], $_SESSION['reasondate'], $_SESSION['bp'], $_SESSION['tb'],
          $_SESSION['hcthgb'], $_SESSION['temp'], $_SESSION['fbg'], $_SESSION['pulse'], $_SESSION['uri'], $_SESSION['chickenpox'], $_SESSION['tetanus'], 
          $_SESSION['mmr'], $_SESSION['weight'], $_SESSION['height'], $_SESSION['medication'], $_SESSION['department'], $_SESSION['error']);
?>

<script> 
    $(document).ready(function(){
        var i = 1;
        var max = 4;
        
        var html = '<tr><td><input type="file" name="file[]"></td><td><input type="text" name="file_name[]"></td><td><input type="text" name="file_description[]"></td><td><button name="add_more" class="minus text-center" id="minus_file"><i class="fas fa-minus-circle"></i></button></td></tr>';
        $('#add_file').click(function(){
            if(i <= max){
                $("#file-table").append(html);
                i++;
            }
        });

        $('#file-table').on('click','#minus_file', function(){
            $(this).closest('tr').remove();
            i--;
        });

    });
</script>

<script> 
    $(document).ready(function(){
        var i = 1;
        var max = 4;
        
        var html = '<tr><td><input type="text" name="medication[]"></td><td><button name="add_more" class="minus" id="minus"><i class="fas fa-minus-circle"></i></button></td></tr>';
        $('#add_more').click(function(){
            if(i <= max){
                $("#medicationtbl").append(html);
                i++;
            }
        });

        $('#medicationtbl').on('click','#minus', function(){
            $(this).closest('tr').remove();
            i--;
        });

    });
</script>


<script>
    function loadfile(event){
        var output=document.getElementById('preview');
        output.src=URL.createObjectURL(event.target.files[0]);
    }
</script>

<script>
    var tabButtons=document.querySelectorAll(".buttonContainer button");
    var tabPanel=document.querySelectorAll(".tabPanel");
    var next=document.querySelector(".tabPanel .wrapper a")

    function showPanel(panelIndex, colorCode){
    
    tabButtons.forEach(function(node){
        node.style.backgroundColor="";
        node.style.color="";
    });

    tabButtons[panelIndex].style.backgroundColor="#f2f2f2";
    tabButtons[panelIndex].style.color="black";

    tabPanel.forEach(function(node){
        node.style.display="none";
    });

    tabPanel[panelIndex].style.display="block";
    tabPanel[panelIndex].style.backgroundColor=colorCode;
}

showPanel(0, '#f2f2f2');
</script>

<?php 
    require '../assets/shared/footer.php';
?>

