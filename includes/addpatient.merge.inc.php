<?php 
session_start();
require 'dbcon.inc.php';
require 'class.autoloader.inc.php';

// CLASSES DECLARATIONS
$mergeControl   = new MergeControl();
$globalHelper   = new GlobalHelper();

$realmode = $_POST['realmode'];

if(isset($_POST['create'.$realmode])){
        
        $mode            = $realmode;
        $date            = date("Y-m-d H:i:s");
    
        // Account Informations
        $email      = $_POST['email'];                  $pwd = $_POST['pwd'];            $rptpwd = $_POST['rptpwd'];            
        $hashedPwd  = password_hash($pwd, PASSWORD_DEFAULT);
    
        // Faculty and Itech Personnel Informations
        $firstname       = $_POST['firstname'];       $lastname        = $_POST['lastname'];        $suffix       = $_POST['suffix'];
        $middlename      = $_POST['middlename'];      
        
        $birthday        = $_POST['birthday'];        $gender       = $_POST['gender'];             $status          = $_POST['status'];
    
        $address         = $_POST['address'];         $phone           = $_POST['phone'];           $landline     = $_POST['landline'];
        $department      = $_POST['department'];
             
        // Emergency Contact Information
        $emergency_relationship = $_POST['emergency_relationship'];        $emergency_firstname    = $_POST['emergency_firstname'];     
        $emergency_lastname     = $_POST['emergency_lastname'];            $emergency_email        = $_POST['emergency_email'];
        $emergency_phone        = $_POST['emergency_phone'];               $emergency_address      = $_POST['emergency_address'];
        $emergency_landline     = $_POST['emergency_landline']; 

        // Allergies
        $others    = $_POST['others'];
    
        // Physical Examination
        $weight = $_POST['weight'];      $height = $_POST['height'];
        
        // VARIABLES
        require 'variables/var.faculty.addpatient.php';
        
        //ERROR HANDLERS
        require 'errors/error.'.$realmode.'.addpatient.php';
    
        // IMAGE UPLOADER
        require 'merge.image.inc.php';

        
    
        $mergeControl->create_merge($conn, $realmode, $firstname, $lastname, $middlename, $suffix, $email, $department, $phone, $landline, $address,
                                    $gender, $status, $hashedPwd, $imagePath, $birthday, $date);
        
        $mergeData = $mergeControl->get_merge_info($conn, $realmode, $department, $firstname, $lastname);   
        $mergeID   = $mergeData['id'];

        //FOR FILES
        $file     = $_FILES['file'];                    $filename = $file['name'];                       $filetmpname = $file['tmp_name']; 
        $filesize = $file['size'];                      $fileerror = $file['error'];                     $filetype = $file['type'];  
        $fileDesc = $_POST['file_description'];         $newFileName = $_POST['file_name'];

        $finalmode = $realmode.'id';

        $testArray = $filename;
        $EmptyTestArray = array_filter($testArray);

        if(!empty($EmptyTestArray)){
            foreach($fileDesc as $key => $value){
                    
                $fileext = explode('.', $filename[$key]);    $_firstNameFile = current($fileext);  
                            $fileactualext = strtolower(end($fileext));

                $filenewname = $newFileName[$key].$department.".".$fileactualext;
                $filePath = "../assets/uploads/patient_files/".$filenewname;

                $sql = "INSERT INTO files($finalmode, filepath, description, dateadded)
                        VALUES($mergeID, '".$filePath."', '".$value."', '$date')";
                mysqli_query($conn, $sql);

                move_uploaded_file($filetmpname[$key], $filePath);
            }
        }
    
        $mergeControl->insert_emergency_contact($conn, $finalmode, $mergeID, $emergency_relationship, $emergency_firstname, $emergency_lastname, $emergency_email,
                                                $emergency_phone, $emergency_address, $emergency_landline);
        
        $mergeControl->insert_allergy($conn, $finalmode, $mergeID, $allergy1, $allergy2, $allergy3, $others);
        $mergeControl->insert_medicalhistory($conn, $finalmode, $mergeID, $reason, $reasondate, $existingcondition, $realMedications);
        $mergeControl->insert_physicalexamination($conn, $finalmode, $mergeID, $weight, $height, $bp, $temp, $pulse, $hcthgb, $fbg, $uri, $chickenpox, $tetanus, $mmr, $tb);
    
        // SETTINGS LOG
        $admin_name = $_SESSION['adminfn']." ".$_SESSION['adminln'];
        $activity =  ucwords($mode)." ".$firstname." ".$lastname." with a department of ".$department." has been added to the system.";
        $label = 'add_'.$mode;

        $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);

        $_SESSION['success'] = 'addpatient';
        header("location: ../pages/search.php?".ucwords($realmode));
}