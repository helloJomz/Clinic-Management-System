<?php 

session_start();
include_once '../includes/dbcon.inc.php';


if(isset($_POST['searchReport'])){

    // $month = $_POST['month'];
    // $type = $_POST['type'];
    // $year = $_POST['year'];


    // if($month == 'January'){
    //     $realMonth = '01';
    // }
    // elseif($month == 'February'){
    //     $realMonth = '02';
    // }
    // elseif($month == 'March'){
    //     $realMonth = '03';
    // }
    // elseif($month == 'April'){
    //     $realMonth = '04';
    // }
    // elseif($month == 'May'){
    //     $realMonth = '05';
    // }
    // elseif($month == 'June'){
    //     $realMonth = '06';
    // }
    // elseif($month == 'July'){
    //     $realMonth = '07';
    // }
    // elseif($month == 'August'){
    //     $realMonth = '08';
    // }
    // elseif($month == 'September'){
    //     $realMonth = '09';
    // }
    // elseif($month == 'October'){
    //     $realMonth = '10';
    // }
    // elseif($month == 'November'){
    //     $realMonth = '11';
    // }
    // else{
    //     $realMonth = '12';
    // }

    // //////////////////////////////

    // if($type == 'Queue'){
    //     $realType = 'queue_log';
    // }
    // elseif($type == 'Admin Activity'){
    //     $realType = 'settings_log';
    // }else{
    //     $realType = 'request_log';
    // }

    // $sql = "SELECT * FROM $realType WHERE month(date) = $realMonth AND year(date) = $year ";
    // $result = mysqli_query($conn, $sql);
    // $count = mysqli_num_rows($result);

    // $alert = '';

    // if(mysqli_num_rows($result) > 0 ){

    //     $alert .= '<div class="alert alert-success fst-italic mt-3" role="alert">
    //                 Results found for this month '.$realMonth.' and year of '.$year.', with a total of '.$count.' result(s).
    //                 </div>

    //                 <div class="d-flex justify-content-center mt-3">
    //                 <button class="btn btn-secondary text-white me-2" id="cancel-report">Cancel</button>
                    
    //                 <form action="pdf.ajax.php" method="POST" target="_blank" id="dailyreport">
    //                     <button class="btn btn-danger text-white" type="submit" name="generate-report">Generate Report</button>
    //                 </form>
    //                 </div>
                 
    //              ';
        
  

    // }else{

    //     $alert .= '
    //         <button class="btn bg-success text-white" id="search-report"><i class="fas fa-search me-2"></i>Search Report</button>

    //         <div class="alert alert-danger fst-italic mt-3" role="alert">
    //             No results found for this month '.$realMonth.' and year of '.$year.', please try again!
    //         </div>
    //     ';
    // }

    // $data = array(

    //     'alert' => $alert
    // );

    echo json_encode('hi');

}









