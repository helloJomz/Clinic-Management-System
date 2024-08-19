<?php 

class GlobalHelper{

    public function generateCreateIcon(){
        $filePath = '../assets/default_img/create_icon/';
        $filename = array('1.jpg', '2.jpg', '3.jpg');
        shuffle($filename);
        $realPath = $filePath.$filename[0];
        return $realPath;
    }

    public function getHeight($cm){
    
        $inches = ceil($cm/2.54);
        $feet = floor(($inches/12));
        $measurement = $feet." ' ".($inches%12).'"';
        return $measurement;
    }
    
    public function getAge($birthday){
        
        $age = floor((time() - strtotime($birthday)) / 31556926);
        return $age;
    }

    public function getMeter($cm){
        $meter = $cm * 0.01;
        return $meter;
    }

    public function bmi($meter, $weight){
        
        $bmi = $weight/($meter*$meter);
        
        if ($bmi <= 18.5) {
            return $output = "<span class='badge bg-danger'><i class='fas fa-exclamation-triangle me-2'></i>Underweight</span>";
    
            } else if ($bmi > 18.5 AND $bmi<=24.9 ) {
            return $output = "<span class='badge bg-success'><i class='fas fa-heartbeat me-2'></i>Healthy</span>";
    
            } else if ($bmi > 24.9 AND $bmi<=29.9) {
            return $output = "<span class='badge bg-warning text-dark'><i class='fas fa-exclamation-triangle me-2'></i>Overweight</span>";
    
            } else if ($bmi > 30.0) {
            return $output = "<span class='badge bg-danger '><i class='fas fa-exclamation-triangle me-2'></i>Obese</span>";
        }
    }

    public function getPatient($conn, $id){
        
        $pageName = basename($_SERVER['PHP_SELF'], '.php');
        
        $sql        = "SELECT * FROM $pageName WHERE id = $id ";
        $result     = mysqli_query($conn, $sql);
        $row        = mysqli_fetch_array($result);
        return $row;
    }

    public function getEmergencyContact($conn, $id){
        
        $pageName = basename($_SERVER['PHP_SELF'], '.php');
        
        $sql        = "SELECT * FROM emergency_contact WHERE ".$pageName."id =".$id;
        $result     = mysqli_query($conn, $sql);
        $row        = mysqli_fetch_array($result);
        return $row;
    }

    public function getPhysicalExamination($conn, $id){
        
        $pageName = basename($_SERVER['PHP_SELF'], '.php');
        
        $sql        = "SELECT * FROM physical_examination WHERE ".$pageName."id =".$id;
        $result     = mysqli_query($conn, $sql);
        $row        = mysqli_fetch_array($result);
        return $row;
    }

    public function getAllergy($conn, $id){
        
        $pageName = basename($_SERVER['PHP_SELF'], '.php');
        
        $sql        = "SELECT * FROM allergy WHERE ".$pageName."id =".$id;
        $result     = mysqli_query($conn, $sql);
        $row        = mysqli_fetch_array($result);
        return $row;
    }

    public function getMedicalHistory($conn, $id){
        
        $pageName = basename($_SERVER['PHP_SELF'], '.php');
        
        $sql        = "SELECT * FROM medical_history WHERE ".$pageName."id =".$id;
        $result     = mysqli_query($conn, $sql);
        $row        = mysqli_fetch_array($result);
        return $row;
    }

    public function getExpiration($expiration){
        $expiry_date= strtotime($expiration);
        $current_date=time();
        $seconds_to_expire=$expiry_date-$current_date;
        $days_to_expire=floor($seconds_to_expire/86400);

        if($days_to_expire<=0)
        {
            $msg = '<span class="badge bg-danger text-white">Expired</span>';
            return $msg;
        }
        
        else if($days_to_expire==1)
        {
            $msg = '<span class="badge bg-danger text-white">'.$days_to_expire." days left".'</span>';
            return $msg;
        }
        else if($days_to_expire==2)
        {
            $msg = '<span class="badge bg-danger text-white">'.$days_to_expire." days left".'</span>';
            return $msg;
        }
        else if($days_to_expire==3)
        {
            $msg = '<span class="badge bg-danger text-white">'.$days_to_expire." days left".'</span>';
            return $msg;
        }
        else if($days_to_expire==4)
        {
            $msg = '<span class="badge bg-danger text-white">'.$days_to_expire." days left".'</span>';
            return $msg;
        }
        else if($days_to_expire==5)
        {
            $msg = '<span class="badge bg-danger text-white">'.$days_to_expire." days left".'</span>';
            return $msg;
        }
        else if($days_to_expire==6)
        {
            $msg = '<span class="badge bg-warning text-white">'.$days_to_expire." days left".'</span>';
            return $msg;
        }
        else if($days_to_expire==7)
        {
            $msg = '<span class="badge bg-warning text-white">'.$days_to_expire." days left".'</span>';
            return $msg;
        }
        else if($days_to_expire==8)
        {
            $msg = '<span class="badge bg-warning text-white">'.$days_to_expire." days left".'</span>';
            return $msg;
        }
        else if($days_to_expire==9)
        {
            $msg = '<span class="badge bg-warning text-white">'.$days_to_expire." days left".'</span>';
            return $msg;
        }
        else if($days_to_expire==10)
        {
            $msg = '<span class="badge bg-warning text-white">'.$days_to_expire." days left".'</span>';
            return $msg;
        }
        else
        {
            $msg = '<span class="badge bg-green text-white">'.$days_to_expire." days left".'</span>';
            return $msg;
        }
    }

    public function getMedicineBox($pcs, $box){
        $ans1 = $pcs / $box;
        $ans2 = $pcs % $box;
        $num = explode(".", $ans1);

        $first = current($num);

        $msg = $first." Box and ".$ans2." pcs";
        return $msg;
    }

    public function settingsLog($conn, $admin_name, $activity, $date, $label){

        $sql = "INSERT INTO settings_log(admin_name, activity, date, label) 
        VALUES(?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $admin_name, $activity, $date, $label);
        $stmt->execute();

    }

    public function medicineLog($conn, $admin_name, $activity, $date, $label){

        $sql = "INSERT INTO medicine_log(admin_name, activity, date, label) 
        VALUES(?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $admin_name, $activity, $date, $label);
        $stmt->execute();

    }
    
    public function queueLog($conn, $admin_name, $activity, $date, $label, $identifierMode, $patientActId){

        $finalMode = $identifierMode.'id';

        $sql = "INSERT INTO queue_log(admin_name, activity, date, label, $finalMode) 
        VALUES(?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $admin_name, $activity, $date, $label, $patientActId);
        $stmt->execute();

    }

    public function requestLog($conn, $admin_name, $mode, $quantity, $medicine_name, $date, $id){
        
        $finalmode = $mode.'id';

        $sql = "INSERT INTO request_log(admin_name, $finalmode, date, medicine_name, quantity) 
        VALUES(?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sissi", $admin_name, $id, $date, $medicine_name, $quantity);
        $stmt->execute();

    }

    public function generate_code(){
        $letters = 'abcdefghijklmnopqrstuvwxyz';
        $shuffled = str_shuffle($letters);
        if (strlen($shuffled) > 5){
            $abc = substr($shuffled, 0, -21);
        }
        $milliseconds = round(microtime(true) * 1000);
        $uniqid = str_shuffle($abc.$milliseconds.uniqid());
        $genCode = str_replace(" ", "", $uniqid);
    
        $finalcode = substr_replace($genCode, "", 20);
    
        return $finalcode;
    }

    function count_courses($conn, $course){

        $sql = "SELECT id FROM student WHERE course = '$course' ORDER BY id ";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        return $count;
    }

    function count_faculty($conn, $faculty){

        $sql = "SELECT id FROM faculty WHERE department = '$faculty' ORDER BY id ";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        return $count;
    }

    function count_personnel($conn, $itechpersonnel){

        $sql = "SELECT id FROM itechpersonnel WHERE department = '$itechpersonnel' ORDER BY id ";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        return $count;
    }

    function change_title($temp, $title){
        $temp = str_replace('%TITLE%', $title, $temp);
        return $temp;
    }
  
    
}