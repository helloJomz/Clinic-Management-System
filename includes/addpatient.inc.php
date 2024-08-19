<?php 
session_start();
require 'dbcon.inc.php';
require 'class.autoloader.inc.php';

// CLASSES DECLARATIONS
$studentControl = new StudentControl();
$globalHelper = new GlobalHelper();

if(isset($_POST['createstudent'])){

        $date            = date("Y-m-d H:i:s");
    
        // Account Informations
        $email      = $_POST['email'];                  $pwd = $_POST['pwd'];            $rptpwd = $_POST['rptpwd'];            
        $hashedPwd  = password_hash($pwd, PASSWORD_DEFAULT);
    
        // Student Informations
        $firstname       = $_POST['firstname'];       $lastname        = $_POST['lastname'];        $suffix       = $_POST['suffix'];
        $middlename      = $_POST['middlename'];      
        
        $studentnumber   = $_POST['studentnumber'];   $birthday        = $_POST['birthday'];        $gender       = $_POST['gender'];
        $status          = $_POST['status'];
    
        $address         = $_POST['address'];         $phone           = $_POST['phone'];           $landline     = $_POST['landline'];
        $course          = $_POST['course'];
    
        $year            = $_POST['year'];            $section         = $_POST['section'];       
                     
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
        require 'variables/var.addpatient.php';
    
        //ERROR HANDLERS
        require 'errors/error.student.addpatient.php';
    
        // IMAGE UPLOADER
        require 'student.image.inc.php';
    
        $studentControl->create_student($conn, $email, $hashedPwd, $middlename, $firstname, $lastname, $suffix, $studentnumber, $birthday, $gender, $status, 
                                        $address, $phone, $landline, $course, $year, $section, $imagePath, $date);
        
        $studentData = $studentControl->get_student_by_studentnumber_email($conn, $email, $studentnumber);   
        $studentID   = $studentData['id'];
    
        //FOR FILES
        $file     = $_FILES['file'];                    $filename = $file['name'];                       $filetmpname = $file['tmp_name']; 
        $filesize = $file['size'];                      $fileerror = $file['error'];                     $filetype = $file['type'];  
        $fileDesc = $_POST['file_description'];         $newFileName = $_POST['file_name'];

        $testFile = $filename;
        $FinalTestFile = array_filter($testFile);
    
        if(!empty($FinalTestFile)){
            foreach($fileDesc as $key => $value){
                    
                $fileext = explode('.', $filename[$key]);    $_firstNameFile = current($fileext);  
                            $fileactualext = strtolower(end($fileext));
    
                $filenewname = $newFileName[$key].$studentnumber.mt_rand(10,99).".".$fileactualext;
                $filePath = "../assets/uploads/patient_files/".$filenewname;

                $sql = "INSERT INTO files(studentid, filepath, description, dateadded)
                        VALUES($studentID, '$filePath', '$value', '$date')";
                mysqli_query($conn, $sql);
    
                move_uploaded_file($filetmpname[$key], $filePath);
            }
        }
    
        $studentControl->insert_emergency_contact($conn, $studentID, $emergency_relationship, $emergency_firstname, $emergency_lastname, $emergency_email,
                                                  $emergency_phone, $emergency_address, $emergency_landline);
        $studentControl->insert_allergy($conn, $studentID, $allergy1, $allergy2, $allergy3, $others);
        $studentControl->insert_medicalhistory($conn, $studentID, $reason, $reasondate, $existingcondition, $realMedications);
        $studentControl->insert_physicalexamination($conn, $studentID, $weight, $height, $bp, $temp, $pulse, 
                                                    $hcthgb, $fbg, $uri, $chickenpox, $tetanus, $mmr, $tb);

        // SETTINGS LOG
        $admin_name = $_SESSION['adminfn']." ".$_SESSION['adminln'];
        $activity = 'Student'." ".$firstname." ".$lastname." with student number ".$studentnumber." has been added to the system.";
        $label = 'add_student';

        $globalHelper->settingsLog($conn, $admin_name, $activity, $date, $label);

        $_SESSION['success'] = 'addpatient';
        header("location: ../pages/search.php?search=Student");
}
