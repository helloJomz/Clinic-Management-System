<?php 

session_start();
include_once '../dbcon.inc.php';
include_once '../pdf/fpdf.php';


if(isset($_POST['searchMonthlyReport'])){

    $month = $_POST['month'];
    $type = $_POST['type'];
    $year = $_POST['year'];


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

    //////////////////////////////

    if($type == 'Queue'){
        $realType = 'queue_log';
    }
    elseif($type == 'Admin Activity'){
        $realType = 'settings_log';
    }else{
        $realType = 'request_log';
    }

    $sql = "SELECT * FROM $realType WHERE month(date) = $realMonth AND year(date) = $year ";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    $alert = '';

    if(mysqli_num_rows($result) > 0 ){

        $alert .= '<div class="alert alert-success fst-italic mt-3" role="alert">
                    Results found for this month '.$month.' and year of '.$year.', with a total of '.$count.' result(s).
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-secondary text-white me-2" id="cancel-monthly-report">Cancel</button>
                    
                    <form action="../includes/ajax/monthlyreport.ajax.php" method="POST" target="_blank" id="monthlyreport">
                        <button class="btn btn-danger text-white" type="submit" name="generate-monthly-report">Generate Report</button>
                    </form>
                    </div>
                 
                 ';
        
  

    }else{

        $alert .= '
            <button class="btn bg-success text-white" id="search-monthly-report"><i class="fas fa-search me-2"></i>Search Report</button>

            <div class="alert alert-danger fst-italic mt-3" role="alert">
                No results found for this month '.$month.' and year of '.$year.', please try again!
            </div>
        ';
    }

    $data = array(

        'alert' => $alert
    );

    echo json_encode($data);

}

if(isset($_POST['generate-monthly-report'])){

    $month = $_POST['monthly_month'];
    $type = $_POST['monthly_type'];
    $year = $_POST['monthly_year'];
    $admin = $_POST['adminfnz']." ".$_POST['adminlnz'];


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

    //////////////////////////////

    if($type == 'Queue'){
        $realType = 'queue_log';
    }
    elseif($type == 'Admin Activity'){
        $realType = 'settings_log';
    }else{
        $realType = 'request_log';
    }


    if($type == 'Queue'){
        $realType = 'queue_log';

        $sql = "SELECT * FROM $realType WHERE month(date) = $realMonth AND year(date) = $year ";
        $result = mysqli_query($conn, $sql);

        // STUDENT 
        $studentSql = "SELECT studentid FROM $realType WHERE month(date) = $realMonth AND year(date) = $year AND studentid ORDER BY id";
        $resultStudent = mysqli_query($conn, $studentSql);
        $countStudent = mysqli_num_rows($resultStudent);
    
        // FACULTY 
        $facultySql = "SELECT facultyid FROM $realType WHERE month(date) = $realMonth AND year(date) = $year AND facultyid ORDER BY id";
        $resultFaculty = mysqli_query($conn, $facultySql);
        $countFaculty = mysqli_num_rows($resultFaculty);
    
        // PERSONNEL 
        $personnelSql = "SELECT itechpersonnelid FROM $realType WHERE month(date) = $realMonth AND year(date) = $year AND itechpersonnelid ORDER BY id";
        $resultPersonnel = mysqli_query($conn, $personnelSql);
        $countPersonnel = mysqli_num_rows($resultPersonnel);
    
        $pdf = new FPDF('P', 'mm', 'A4');
        
        $pdf->AliasNbPages('{pages}');
    
        $pdf->AddPage();
    
    
        $pdf->Image('../../assets/default_img/PUPLogo.png', 15, 6, -300);
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
        $pdf->Cell(185, 5, 'REPORT FROM '.strtoupper($month).', '.$year.' ('.strtoupper($type).')', 0, 0, 'C');
    
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
        $pdf->Cell(45, 5, $year.'.', 0, 1, 'C');
    
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
        $pdf->Cell(70, 5, 'date: '.ucwords($month).", ".$year.".", 0, 0, 'C');
    
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

        $sql = "SELECT * FROM $realType WHERE month(date) = $realMonth AND year(date) = $year ";
        $result = mysqli_query($conn, $sql);
    
    
        // STUDENT 
        $studentSql = "SELECT studentid FROM $realType WHERE month(date) = $realMonth AND year(date) = $year AND studentid ORDER BY id";
        $resultStudent = mysqli_query($conn, $studentSql);
        $countStudent = mysqli_num_rows($resultStudent);
    
        // FACULTY 
        $facultySql = "SELECT facultyid FROM $realType WHERE month(date) = $realMonth AND year(date) = $year AND facultyid ORDER BY id";
        $resultFaculty = mysqli_query($conn, $facultySql);
        $countFaculty = mysqli_num_rows($resultFaculty);
    
        // PERSONNEL 
        $personnelSql = "SELECT itechpersonnelid FROM $realType WHERE month(date) = $realMonth AND year(date) = $year AND itechpersonnelid ORDER BY id";
        $resultPersonnel = mysqli_query($conn, $personnelSql);
        $countPersonnel = mysqli_num_rows($resultPersonnel);
    
        $pdf = new FPDF('P', 'mm', 'A4');
        
        $pdf->AliasNbPages('{pages}');
    
        $pdf->AddPage();
    
    
        $pdf->Image('../../assets/default_img/PUPLogo.png', 15, 6, -300);
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
        $pdf->Cell(185, 5, 'REPORT FROM '.strtoupper($month).', '.$year.' ('.strtoupper($type).')', 0, 0, 'C');
    
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
        $pdf->Cell(45, 5, $year.'.', 0, 1, 'C');
    
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
        $pdf->Cell(70, 5, 'date: '.ucwords($month).", ".$year.".", 0, 0, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 11);
        $pdf->SetX(5);
        $pdf->Cell(20, 7, 'No.', 1, 0, 'C');
        $pdf->Cell(60, 7, 'Name of Patient', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Medicine', 1, 0, 'C');
        $pdf->Cell(20, 7, 'Quantity', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Type of Patient', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Date', 1, 1, 'C');
        
        $count = 0;
        while($data = mysqli_fetch_array($result)){
    
            $count++;
    
            if(!empty($data['studentid'])){$patient = 'Student';}else if(!empty($data['facultyid'])){$patient = 'Faculty';}else{ $patient = 'Personnel'; }

            if(!empty($data['studentid'])){$name = $data['studentid']; $mode = 'student';}elseif(!empty($data['facultyid'])){$name = $data['facultyid']; $mode = 'faculty';}else{$name = $data['itechpersonnelid']; $mode = 'itechpersonnel';}

            $findNameSql = "SELECT * FROM $mode WHERE id = $name ";
            $findResult = mysqli_query($conn, $findNameSql);
            $rowFind = mysqli_fetch_array($findResult);
    
            $pdf->setFont('Arial', '', 9);
            $pdf->SetX(5);
            $pdf->Cell(20, 7, $count, 1, 0, 'C');
            $pdf->Cell(60, 7, $rowFind['firstname']." ".$rowFind['lastname'], 1, 0, 'C');
            $pdf->Cell(40, 7, $data['medicine_name'], 1, 0, 'C');
            $pdf->Cell(20, 7, $data['quantity'], 1, 0, 'C');
            $pdf->Cell(30, 7, $patient, 1, 0, 'C');
            $pdf->Cell(30, 7, $data['date'], 1, 1, 'C');
    
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

        $sql = "SELECT * FROM $realType WHERE month(date) = $realMonth AND year(date) = $year ";
        $result = mysqli_query($conn, $sql);
    
    
        // STUDENT 
        $activitySql = "SELECT id FROM $realType WHERE month(date) = $realMonth AND year(date) = $year ORDER BY id";
        $resultActivity = mysqli_query($conn, $activitySql);
        $countActivity = mysqli_num_rows($resultActivity);
    
        $pdf = new FPDF('P', 'mm', 'A4');
        
        $pdf->AliasNbPages('{pages}');
        
        $pdf->SetAutoPageBreak('auto', 20);

        $pdf->AddPage();


    
    
        $pdf->Image('../../assets/default_img/PUPLogo.png', 15, 6, -300);
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
        $pdf->Cell(185, 5, 'REPORT FROM '.strtoupper($month).', '.$year.' ('.strtoupper($type).')', 0, 0, 'C');
    
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
        $pdf->Cell(45, 5, $year.'.', 0, 1, 'C');
    
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
        $pdf->Cell(70, 5, 'date: '.ucwords($month).", ".$year.".", 0, 0, 'C');
    
        $pdf->Ln();
        $pdf->Ln();
    
        $pdf->setFont('Arial', 'B', 11);
        $pdf->SetX(10);
        $pdf->Cell(10, 9, 'No.', 1, 0, 'C');
        $pdf->Cell(160, 9, 'Activity', 1, 0, 'C');
        $pdf->Cell(20, 9, 'Date', 1, 1, 'C');


        $count = 0;
        while($data = mysqli_fetch_array($result)){

            // $msg = wordwrap(, 65, "\n", false);
    
            $count++;
            $pdf->setFont('Arial', '', 9);
            $pdf->SetX(10);
            $pdf->cell(10, 9, $count, 1, 0, 'C');
            $pdf->cell(160, 9, $data['activity'], 1, 0);
            $pdf->cell(20, 9, $data['date'], 1, 1, 'C');

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









