<?php
$path = '../pages/addpatient.itechpersonnel.php';

if(empty($firstname) && empty($lastname) && empty($email) && empty($pwd) && empty($rptpwd) && empty($birthday) && empty($weight) && 
   empty($height) && empty($phone) && empty($address) && empty($emergency_firstname) && empty($emergency_lastname) && empty($emergency_address) && 
   empty($emergency_phone)){
        
        //DATA
        $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
        $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
        $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
        $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
        $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
        $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
        $_SESSION['year'] = $year; $_SESSION['section'] = $section;

        $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
        $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
        $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
        $_SESSION['emergency_landline'] = $emergency_landline;

        $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
        $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
        $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
        $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
        $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
        $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

        //ERROR
        $_SESSION['error'] = 'emptyfields';
        header("location: $path");
        exit();
}

if(empty($address)){

    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    //ERROR
    $_SESSION['error'] = 'emptyaddress';
    header("location: $path");
    exit();
}

if(empty($firstname)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'emptyfirstname';
    header("location: $path");
    exit();
}

if(empty($lastname)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'emptylastname';
    header("location: $path");
    exit();
}

if(empty($email)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 
    
    $_SESSION['error'] = 'emptyemail';
    header("location: $path");
    exit();
}

if(empty($pwd) || empty($rptpwd)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 
    
    $_SESSION['error'] = 'emptypwd';
    header("location: $path");
    exit();
}

if(empty($birthday)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'emptybday';
    header("location: $path");
    exit();
}

if(empty($weight)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'emptyweight';
    header("location: $path");
    exit();
}

if(empty($height)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'emptyheight';
    header("location: $path");
    exit();
}

if(empty($phone)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'emptypatientphone';
    header("location: $path");
    exit();
}

if(empty($emergency_firstname)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'emptyemergencyfirstname';
    header("location: $path");
    exit();
}

if(empty($emergency_lastname)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'emptyemergencylastname';
    header("location: $path");
    exit();
}

if(empty($emergency_address)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'emptyemergencyaddress';
    header("location: $path");
    exit();
}

if(empty($emergency_phone)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'emptyemergencyphone';
    header("location: $path");
    exit();
}

if($emergency_relationship == 'Relationship'){

    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'relationship';
    header("location: $path");
    exit();
}

if(!isset($emergency_relationship)){

    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'relationship';
    header("location: $path");
    exit();
}

if($gender == 'Gender'){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'gender';
    header("Location: $path");
    exit();
}

if(!isset($gender)){

    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'gender';
    header("location: $path");
    exit();
}

if($department == 'Department'){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'department';
    header("Location: $path");
    exit();
}


if($status == 'Status'){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'status';
    header("Location: $path");
    exit();
}

if(!isset($department)){

    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'department';
    header("location: $path");
    exit();
}

if ($pwd !== $rptpwd){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'passwordnotmatch';
    header("Location: $path");
    exit();   
}

if (strlen($phone) > 11 ){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'patientphonenumberexceedchar';
    header("Location: $path");
    exit();
}

if (strlen($emergency_phone) > 11 ){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'emergencyphonenumberexceedchar';
    header("Location: $path");
    exit();
}

if (strlen($phone) < 11 ){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'studentphonenumberlesschar';
    header("Location: $path");
    exit();
}

if (strlen($emergency_phone) < 11 ){
    session_start();
    $_SESSION['error'] = 'emergencyphonenumberlesschar';
    header("Location: $path");
    exit();
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'invalidemail';
    header("Location: $path");
    exit();
}

if(!empty($emergency_email)){
    if(!filter_var($emergency_email, FILTER_VALIDATE_EMAIL)){

    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'invalidemergencyemail';
    header("location: $path");
    exit();
    }
}

if($mergeControl->emailExists($conn, $mode, $email) !== false){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'emailalreadyexist';
    header("Location: $path");
    exit();
}

if (!preg_match("/^[a-zA-z ]*$/", $firstname) || !preg_match("/^[a-zA-z ]*$/", $lastname) 
    || !preg_match("/^[a-zA-z ]*$/", $middlename)){
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'invalidcharstudentname';
    header("Location: $path");
    exit();
}

if (!preg_match("/^[a-zA-z ]*$/", $emergency_firstname) || !preg_match("/^[a-zA-z ]*$/", $emergency_lastname)){

    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'invalidcharemergencyname';
    header("Location: $path");
    exit();
}

if (!preg_match('/^[0-9.]*$/', $weight)) {
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'invalidweight';
    header("Location: $path");
}

if (!preg_match('/^[0-9]*$/', $phone)) {
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'phonemustbenumber';
    header("Location: $path");
}

if (!preg_match('/^[0-9]*$/', $emergency_phone)) {
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'emergencyphonemustbenumber';
    header("Location: $path");
} 

if (!preg_match('/^[0-9.]*$/', $height)) {
    
    //DATA
    $_SESSION['email'] = $email; $_SESSION['pwd'] = $pwd; $_SESSION['rptpwd'] = $rptpwd; 
    $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
    $_SESSION['suffix'] = $suffix; $_SESSION['middlename'] = $middlename; 
    $_SESSION['studentnumber'] = $studentnumber; $_SESSION['birthday'] = $birthday;
    $_SESSION['gender'] = $gender; $_SESSION['status'] = $status; $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone; $_SESSION['landline'] = $landline; $_SESSION['course'] = $course;
    $_SESSION['year'] = $year; $_SESSION['section'] = $section;

    $_SESSION['relationship'] = $emergency_relationship; $_SESSION['emergency_firstname'] = $emergency_firstname;
    $_SESSION['emergency_lastname'] = $emergency_lastname; $_SESSION['emergency_email'] = $emergency_email;
    $_SESSION['emergency_phone'] = $emergency_phone; $_SESSION['emergency_address'] = $emergency_address;
    $_SESSION['emergency_landline'] = $emergency_landline;

    $_SESSION['allergy1'] = $allergy1; $_SESSION['allergy2'] = $allergy2; $_SESSION['allergy3'] = $allergy3;
    $_SESSION['reason'] = $reason; $_SESSION['reasondate'] = $reasondate; $_SESSION['medication'] = $realMedications;
    $_SESSION['existingcondition'] = $existingcondition; $_SESSION['bp'] = $bp; $_SESSION['tb'] = $tb; $_SESSION['hcthgb'] = $hcthgb;
    $_SESSION['temp'] = $temp; $_SESSION['fbg'] = $fbg; $_SESSION['pulse'] = $pulse; $_SESSION['uri'] = $uri;
    $_SESSION['chickenpox'] = $chickenpox; $_SESSION['tetanus'] = $tetanus; $_SESSION['mmr'] = $mmr; $_SESSION['others'] = $others;
    $_SESSION['weight'] = $weight; $_SESSION['height'] = $height; $_SESSION['department'] = $department; 

    $_SESSION['error'] = 'invalidheight';
    header("Location: $path");
} 