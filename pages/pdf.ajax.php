<?php 


include_once '../includes/dbcon.inc.php';
include_once '../includes/pdf/fpdf.php';

if(isset($_POST['generate-report'])){

    $month = $_POST['month'];
    $day   = $_POST['day'];
    $year  = $_POST['year'];
    $type  = $_POST['type'];
    $admin = $_POST['adminfn']." ".$_POST['adminln'];

    if($month == 'January'){
        $realMonth = '01';
    }
    elseif($month == 'February'){
        $realMonth = '02';
    }
    elseif($month == 'March'){
        $realMonth = '03';
    }
    elseif($month == 'April'){
        $realMonth = '04';
    }
    elseif($month == 'May'){
        $realMonth = '05';
    }
    elseif($month == 'June'){
        $realMonth = '06';
    }
    elseif($month == 'July'){
        $realMonth = '07';
    }
    elseif($month == 'August'){
        $realMonth = '08';
    }
    elseif($month == 'September'){
        $realMonth = '09';
    }
    elseif($month == 'October'){
        $realMonth = '10';
    }
    elseif($month == 'November'){
        $realMonth = '11';
    }
    else{
        $realMonth = '12';
    }

    ////////////////////////////////

    if($type == 'Queue'){
        $realType = 'queue_log';

        $realDate = $year."-".$realMonth."-".$day;

        $sql = "SELECT * FROM $realType WHERE date = '$realDate' ";
        $result = mysqli_query($conn, $sql);
    
    
        // STUDENT 
        $studentSql = "SELECT studentid FROM $realType WHERE date = '$realDate' AND studentid ORDER BY id";
        $resultStudent = mysqli_query($conn, $studentSql);
        $countStudent = mysqli_num_rows($resultStudent);
    
        // FACULTY 
        $facultySql = "SELECT facultyid FROM $realType WHERE date = '$realDate' AND facultyid ORDER BY id";
        $resultFaculty = mysqli_query($conn, $facultySql);
        $countFaculty = mysqli_num_rows($resultFaculty);
    
        // PERSONNEL 
        $personnelSql = "SELECT itechpersonnelid FROM $realType WHERE date = '$realDate' AND itechpersonnelid ORDER BY id";
        $resultPersonnel = mysqli_query($conn, $personnelSql);
        $countPersonnel = mysqli_num_rows($resultPersonnel);
    
        $pdf = new FPDF('P', 'mm', 'A4');
        
        $pdf->AliasNbPages('{pages}');
    
        $pdf->AddPage();
    
    
        $pdf->Image('../assets/default_img/PUPLogo.png', 15, 6, -300);
        $pdf->setFont('Arial', 'B', 12);
        $pdf->Cell(206, 5, 'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(206, 10, 'INSTITUTE OF TECHNOLOGY', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(206, 5, 'PUREZA, MANILA', 0, 1, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 12);
        $pdf->Cell(185, 5, 'REPORT FROM '.strtoupper($month).' '.$day.', '.$year.' ('.strtoupper($type).')', 0, 0, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', '', 11);
        $pdf->Cell(210, 5, 'Clinical Administering System records all transactions that is made in the clinic,', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(187, 5, 'including all the patient or clients that goes in and out of it. The Polytechnic University of the', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(187, 5, 'Philippines, Institute of Technology has recorded the following number of clients within '.ucwords($month), 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(45, 5, $day.', '.$year.'.', 0, 1, 'C');
    
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 11);
        $pdf->Cell(50, 7, '', 0, 0, 'C');
        $pdf->Cell(40, 7, 'Users', 1, 0, 'C');
        $pdf->Cell(45, 7, 'Total Number of Visits', 1, 1, 'C');
    
        $pdf->setFont('Arial', '', 11);
    
        $pdf->Cell(50, 7, '', 0, 0, 'C');
        $pdf->Cell(40, 7, 'Student', 1, 0, 'C');
        $pdf->Cell(45, 7, $countStudent, 1, 1, 'C');
    
        $pdf->Cell(50, 7, '', 0, 0, 'C');
        $pdf->Cell(40, 7, 'Faculty', 1, 0, 'C');
        $pdf->Cell(45, 7, $countFaculty, 1, 1, 'C');
    
        $pdf->Cell(50, 7, '', 0, 0, 'C');
        $pdf->Cell(40, 7, 'Personnel', 1, 0, 'C');
        $pdf->Cell(45, 7, $countPersonnel, 1, 1, 'C');
    
        $pdf->Cell(50, 7, '', 0, 0, 'C');
        $pdf->Cell(40, 7, 'Total', 1, 0, 'C');
        $pdf->Cell(45, 7, $countPersonnel + $countStudent + $countFaculty , 1, 1, 'C');
        
        $pdf->Ln();
        $pdf->setFont('Arial', '', 11);
        $pdf->SetX(100);
        $pdf->Cell(40, 5, 'The following records contains the information of every patient that transacts in', 0, 1, 'C');
        $pdf->SetX(55);
        $pdf->Cell(100, 5, 'the Clinic of the Polytechnic University of the Philippines, Institute of Technology within the', 0, 1, 'C');
        $pdf->Cell(70, 5, 'date: '.ucwords($month)." ".$day.", ".$year.".", 0, 0, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 11);
        $pdf->SetX(15);
        $pdf->Cell(20, 7, 'No.', 1, 0, 'C');
        $pdf->Cell(100, 7, 'Activity', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Type of Patient', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Date', 1, 1, 'C');
        
        $count = 0;
        while($data = mysqli_fetch_array($result)){
    
            $count++;
    
            if(!empty($data['studentid'])){$patient = 'Student';}else if(!empty($data['facultyid'])){$patient = 'Faculty';}else{ $patient = 'Personnel'; }
    
            $pdf->setFont('Arial', '', 10);
            $pdf->SetX(15);
            $pdf->Cell(20, 7, $count, 1, 0, 'C');
            $pdf->Cell(100, 7, $data['activity'], 1, 0, 'C');
            $pdf->Cell(30, 7, $patient, 1, 0, 'C');
            $pdf->Cell(30, 7, $data['date'], 1, 1, 'C');
    
        }
        
        $pdf->Ln();
    
        $pdf->setFont('Arial', '', 9);
        $pdf->setX(25);
        $pdf->Cell(20, 5, 'Generated By: '.$admin, 0, 1, 'C');
        $pdf->setX(17);
        $pdf->Cell(20, 5, 'Date: '.date('M d, Y'), 0, 1, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 11);
        $pdf->setX(145);
        $pdf->Cell(50, 7, $admin, 'B', 1, 'C');
    
        $pdf->setX(145);
        $pdf->setFont('Arial', '', 10);
        $pdf->Cell(50, 7, 'ADMIN', 0, 1, 'C');
    
        $pdf->setX(145);
        $pdf->setFont('Arial', 'I', 10);
        $pdf->Cell(50, 7, '(Signature over Printed Name)', 0, 0, 'C');
    
    
    
        $pdf->Output();

    }
    elseif($type == 'Request Medicine'){
        $realType = 'request_log';

        $realDate = $year."-".$realMonth."-".$day;

        $sql = "SELECT * FROM $realType WHERE date = '$realDate' ";
        $result = mysqli_query($conn, $sql);
    
    
        // STUDENT 
        $studentSql = "SELECT studentid FROM $realType WHERE date = '$realDate' AND studentid ORDER BY id";
        $resultStudent = mysqli_query($conn, $studentSql);
        $countStudent = mysqli_num_rows($resultStudent);
    
        // FACULTY 
        $facultySql = "SELECT facultyid FROM $realType WHERE date = '$realDate' AND facultyid ORDER BY id";
        $resultFaculty = mysqli_query($conn, $facultySql);
        $countFaculty = mysqli_num_rows($resultFaculty);
    
        // PERSONNEL 
        $personnelSql = "SELECT itechpersonnelid FROM $realType WHERE date = '$realDate' AND itechpersonnelid ORDER BY id";
        $resultPersonnel = mysqli_query($conn, $personnelSql);
        $countPersonnel = mysqli_num_rows($resultPersonnel);
    
        $pdf = new FPDF('P', 'mm', 'A4');
        
        $pdf->AliasNbPages('{pages}');
    
        $pdf->AddPage();
    
    
        $pdf->Image('../assets/default_img/PUPLogo.png', 15, 6, -300);
        $pdf->setFont('Arial', 'B', 12);
        $pdf->Cell(206, 5, 'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(206, 10, 'INSTITUTE OF TECHNOLOGY', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(206, 5, 'PUREZA, MANILA', 0, 1, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 12);
        $pdf->Cell(185, 5, 'REPORT FROM '.strtoupper($month).' '.$day.', '.$year.' ('.strtoupper($type).')', 0, 0, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', '', 11);
        $pdf->Cell(210, 5, 'Clinical Administering System records all transactions that is made in the clinic,', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(187, 5, 'including all the patient or clients that goes in and out of it. The Polytechnic University of the', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(187, 5, 'Philippines, Institute of Technology has recorded the following number of clients within '.ucwords($month), 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(45, 5, $day.', '.$year.'.', 0, 1, 'C');
    
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 11);
        $pdf->Cell(50, 7, '', 0, 0, 'C');
        $pdf->Cell(40, 7, 'Users', 1, 0, 'C');
        $pdf->Cell(50, 7, 'Total Number of Request', 1, 1, 'C');
    
        $pdf->setFont('Arial', '', 11);
    
        $pdf->Cell(50, 7, '', 0, 0, 'C');
        $pdf->Cell(40, 7, 'Student', 1, 0, 'C');
        $pdf->Cell(50, 7, $countStudent, 1, 1, 'C');
    
        $pdf->Cell(50, 7, '', 0, 0, 'C');
        $pdf->Cell(40, 7, 'Faculty', 1, 0, 'C');
        $pdf->Cell(50, 7, $countFaculty, 1, 1, 'C');
    
        $pdf->Cell(50, 7, '', 0, 0, 'C');
        $pdf->Cell(40, 7, 'Personnel', 1, 0, 'C');
        $pdf->Cell(50, 7, $countPersonnel, 1, 1, 'C');
    
        $pdf->Cell(50, 7, '', 0, 0, 'C');
        $pdf->Cell(40, 7, 'Total', 1, 0, 'C');
        $pdf->Cell(50, 7, $countPersonnel + $countStudent + $countFaculty , 1, 1, 'C');
        
        $pdf->Ln();
        $pdf->setFont('Arial', '', 11);
        $pdf->SetX(100);
        $pdf->Cell(40, 5, 'The following records contains the information of every patient that transacts in', 0, 1, 'C');
        $pdf->SetX(55);
        $pdf->Cell(100, 5, 'the Clinic of the Polytechnic University of the Philippines, Institute of Technology within the', 0, 1, 'C');
        $pdf->Cell(70, 5, 'date: '.ucwords($month)." ".$day.", ".$year.".", 0, 0, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 11);
        $pdf->SetX(20);
        $pdf->Cell(20, 7, 'No.', 1, 0, 'C');
        $pdf->Cell(60, 7, 'Name of Patient', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Medicine', 1, 0, 'C');
        $pdf->Cell(20, 7, 'Quantity', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Type of Patient', 1, 1, 'C');
        
        $count = 0;
        while($data = mysqli_fetch_array($result)){
    
            $count++;
    
            if(!empty($data['studentid'])){$patient = 'Student';}else if(!empty($data['facultyid'])){$patient = 'Faculty';}else{ $patient = 'Personnel'; }

            if(!empty($data['studentid'])){$name = $data['studentid']; $mode = 'student';}elseif(!empty($data['facultyid'])){$name = $data['facultyid']; $mode = 'faculty';}else{$name = $data['itechpersonnelid']; $mode = 'itechpersonnel';}

            $findNameSql = "SELECT * FROM $mode WHERE id = $name ";
            $findResult = mysqli_query($conn, $findNameSql);
            $rowFind = mysqli_fetch_array($findResult);
    
            $pdf->setFont('Arial', '', 9);
            $pdf->SetX(20);
            $pdf->Cell(20, 7, $count, 1, 0, 'C');
            $pdf->Cell(60, 7, $rowFind['firstname']." ".$rowFind['lastname'], 1, 0, 'C');
            $pdf->Cell(40, 7, $data['medicine_name'], 1, 0, 'C');
            $pdf->Cell(20, 7, $data['quantity'], 1, 0, 'C');
            $pdf->Cell(30, 7, $patient, 1, 1, 'C');
    
        }
        
        $pdf->Ln();
    
        $pdf->setFont('Arial', '', 9);
        $pdf->setX(30);
        $pdf->Cell(20, 5, 'Generated By: '.$admin, 0, 1, 'C');
        $pdf->setX(22);
        $pdf->Cell(20, 5, 'Date: '.date('M d, Y'), 0, 1, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 11);
        $pdf->setX(145);
        $pdf->Cell(50, 7, $admin, 'B', 1, 'C');
    
        $pdf->setX(145);
        $pdf->setFont('Arial', '', 10);
        $pdf->Cell(50, 7, 'ADMIN', 0, 1, 'C');
    
        $pdf->setX(145);
        $pdf->setFont('Arial', 'I', 10);
        $pdf->Cell(50, 7, '(Signature over Printed Name)', 0, 0, 'C');
    
    
    
        $pdf->Output();
    }
    else{
        $realType = 'settings_log';

        $realDate = $year."-".$realMonth."-".$day;

        $sql = "SELECT * FROM $realType WHERE date = '$realDate' ";
        $result = mysqli_query($conn, $sql);
    
    
        // STUDENT 
        $activitySql = "SELECT id FROM $realType WHERE date = '$realDate' ORDER BY id";
        $resultActivity = mysqli_query($conn, $activitySql);
        $countActivity = mysqli_num_rows($resultActivity);
    
        $pdf = new FPDF('P', 'mm', 'A4');
        
        $pdf->AliasNbPages('{pages}');
        
        $pdf->SetAutoPageBreak('auto', 50);

        $pdf->AddPage();


    
    
        $pdf->Image('../assets/default_img/PUPLogo.png', 15, 6, -300);
        $pdf->setFont('Arial', 'B', 12);
        $pdf->Cell(206, 5, 'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(206, 10, 'INSTITUTE OF TECHNOLOGY', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(206, 5, 'PUREZA, MANILA', 0, 1, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 12);
        $pdf->Cell(185, 5, 'REPORT FROM '.strtoupper($month).' '.$day.', '.$year.' ('.strtoupper($type).')', 0, 0, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', '', 11);
        $pdf->Cell(210, 5, 'Clinical Administering System records all transactions that is made in the clinic,', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(187, 5, 'including all the patient or clients that goes in and out of it. The Polytechnic University of the', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(187, 5, 'Philippines, Institute of Technology has recorded the following number of clients within '.ucwords($month), 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(45, 5, $day.', '.$year.'.', 0, 1, 'C');
    
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 11);
        $pdf->Cell(50, 7, '', 0, 0, 'C');
        $pdf->Cell(40, 7, 'Total of Activity', 1, 0, 'C');
        $pdf->Cell(45, 7, $countActivity, 1, 1, 'C');
    
        $pdf->Ln();
        $pdf->setFont('Arial', '', 11);
        $pdf->SetX(100);
        $pdf->Cell(40, 5, 'The following records contains the information of every patient that transacts in', 0, 1, 'C');
        $pdf->SetX(55);
        $pdf->Cell(100, 5, 'the Clinic of the Polytechnic University of the Philippines, Institute of Technology within the', 0, 1, 'C');
        $pdf->Cell(70, 5, 'date: '.ucwords($month)." ".$day.", ".$year.".", 0, 0, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 11);
        $pdf->SetX(20);
        $pdf->Cell(20, 7, 'No.', 1, 0, 'C');
        $pdf->Cell(150, 7, 'Activity', 1, 1, 'C');
   


        $count = 0;
        while($data = mysqli_fetch_array($result)){

            // $msg = wordwrap(, 65, "\n", false);
    
            $count++;
            $x = $pdf->GetX();
            $y = $pdf->GetY();  
            
            $pdf->setFont('Arial', '', 9);
            
            $pdf->setX(20);
            $pdf->MultiCell(20, 9, $count, 1, 'C');

            $pdf->SetXY($x + 30, $y);

            $pdf->MultiCell(150, 9, $data['activity'], 1);



        }
        
        $pdf->Ln();
    
        $pdf->setFont('Arial', '', 9);
        $pdf->setX(25);
        $pdf->Cell(20, 5, 'Generated By: '.$admin, 0, 1, 'C');
        $pdf->setX(17);
        $pdf->Cell(20, 5, 'Date: '.date('M d, Y'), 0, 1, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 11);
        $pdf->setX(145);
        $pdf->Cell(50, 7, $admin, 'B', 1, 'C');
    
        $pdf->setX(145);
        $pdf->setFont('Arial', '', 10);
        $pdf->Cell(50, 7, 'ADMIN', 0, 1, 'C');
    
        $pdf->setX(145);
        $pdf->setFont('Arial', 'I', 10);
        $pdf->Cell(50, 7, '(Signature over Printed Name)', 0, 0, 'C');
    
    
    
        $pdf->Output();
    }

   
}