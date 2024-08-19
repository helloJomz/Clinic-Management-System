<?php 

session_start();
include '../dbcon.inc.php';
include '../class.autoloader.inc.php';

$globalHelper = new GlobalHelper();

// if(isset($_POST['search'])){

//     $status = 'enabled';
//     $search = $_POST['search'];

//     $sql = "SELECT * FROM medicine WHERE medicine LIKE '%".$search."%' OR type LIKE '%".$search."%' LIMIT 6";
//     $result = mysqli_query($conn, $sql);

//     $output = '';
//     if(mysqli_num_rows($result) > 0){
//         while($row = mysqli_fetch_array($result)){
            
//             if($row['status'] == 'enabled'){
                
//                 $output .= '
//                 <li class="list-group-item shadow" id="'.$row['id'].'"><a href="#" class="p-1">'.$row['medicine']." / ".$row['type'].'<span class="badge bg-green text-white ms-2 p-1"><i class="fas fa-check-circle me-1 "></i>Active</span></a></li>
//                 ';
                
                
//             }else{
//                 $output .= '
//                 <li class="list-group-item shadow" id="'.$row['id'].'"><a href="#" class="p-1">'.$row['medicine']." / ".$row['type'].'<span class="badge bg-danger text-white ms-2"><i class="fas fa-ban me-1"></i>Disabled</span></a></li>
//             ';
//             }   
                
                
            
            
//         }
//     }else{
//         $output .= '
//          <li class="list-group-item shadow text-center"><a href="">No result found!</a></li>
//         ';
//     }
    

//     echo json_encode($output);
// }

if(isset($_POST['load_select'])){

    $sql = "SELECT * FROM medicine WHERE status = 'enabled' ";
    $result = mysqli_query($conn, $sql);
    
    $output = '';
    $first = 1;

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            $id = $row['id'];
            
            $sql2 = "SELECT * FROM stocks WHERE medicine_id = $id";
            $result2 = mysqli_query($conn, $sql2);

            if(mysqli_num_rows($result2) > 0){

                $row2 = mysqli_fetch_array($result2);

                if($first == 1){
                    $output .= '
                    <option selected>--- SELECT --- </option>
                ';
                    $first = 2;
                }

                $output .= '
                <option value="'.$row['id'].'" class="list-select-item">'.$row['medicine'].'</option>
                ';
            }
           
        }
    }else{
       
        $output .= 'empty';
    }
    
    echo json_encode($output);
}



if(isset($_POST['medid'])){


    $medid = $_POST['medid'];

    $sql = "SELECT * FROM stocks WHERE medicine_id = $medid AND quantity IS NOT NULL ";
    $result = mysqli_query($conn, $sql);

    $output = '';
    if(mysqli_num_rows($result) > 0 ){

        while($row = mysqli_fetch_array($result)){
            $expiration = $row['expiry_date'];
            $expirydays = $globalHelper-> getExpiration($expiration);
            $output .= '
            <tr>
                <td><input type="checkbox" class="select-box" id="'.$row['id'].'"></td>
                <td>'.$row['quantity'].'</td>
                <td>'.$row['supplier'].'</td>
                <td>'.$row['code'].'</td>
                <td>'.$expirydays.'</td>
            </tr>
            ';

            $medname = '
                <h5 class="text-center"><strong>'.$row['medicine_name'].'</strong></h5><button type="button" id="clear-all" class="btn text-danger clear-all"><i class="fas fa-times-circle"></i></button>
            ';

        }

    }else{

        $output .= '    
            <td colspan="6" class="text-center">No stocks found! Please search first.</td>
        ';
    }   

    $getSql = "SELECT * FROM medicine WHERE id=$medid ";
    $getResult = mysqli_query($conn, $getSql);
    
    while($getRow = mysqli_fetch_array($getResult)){

        $maxQuantity = '
                    '."(".$getRow['max_quantity'].")".'
        ';
    }

    $data = array(
        'output' => $output,
        'medname' => $medname,
        'maxquantity' => $maxQuantity
    );

    echo json_encode($data);
}

if(isset($_POST['submitBtn'])){

    if(isset($_POST['checkedValue'])){
        
        $selected = $_POST['checkedValue'];

        $ii = "SELECT * FROM stocks WHERE id=$selected";
        $oo = mysqli_query($conn, $ii);
        $pp = mysqli_fetch_array($oo);
        
        $med_id = $pp['medicine_id'];

        $medSql = "SELECT * FROM medicine WHERE id=$med_id";
        $medResult = mysqli_query($conn, $medSql);
        $medRow = mysqli_fetch_array($medResult);

        $max = $medRow['max_quantity'];

        $id            = $_SESSION['requestid'];
        $mode          = $_SESSION['patientmode'];
        
        $patientSql = "SELECT * FROM $mode WHERE id=$id";
        $patientResult = mysqli_query($conn, $patientSql);
        $patientRow = mysqli_fetch_array($patientResult);
    
    }else{
        $selected = 'empty';
    }
    
    $quantity = $_POST['quantity'];

    if($selected == 'empty' || empty($quantity)){
        echo 'emptyfields';
        exit;
    }

    if (!preg_match('/^[0-9]*$/', $quantity)){
        echo 'invalidquantity';
        exit;
    }

    if($quantity > $max){
        echo 'max';
        exit;
    }
    
    $sql = "SELECT * FROM stocks WHERE id=$selected ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $newQuantity = $row['quantity'] - $quantity;

    $query = "UPDATE stocks SET quantity = $newQuantity WHERE id=$selected ";
    mysqli_query($conn, $query);

    //REQUEST LOG
    $admin_name    = $_SESSION['adminfn']." ".$_SESSION['adminln'];
    $firstname     = $patientRow['firstname'];
    $lastname      = $patientRow['lastname'];
    $date          = date("Y-m-d H:i:s");
    $medicine_name = $medRow['medicine'];
 
    $globalHelper->requestLog($conn, $admin_name, $mode, $quantity, $medicine_name, $date, $id);
    
}


if(isset($_POST['proceed'])){

    if($_POST['proceed'] == 'yes'){

        $id = $_POST['reqid'];
        $mode = $_POST['patientmode'];

        $_SESSION['requestid'] = $id;
        $_SESSION['patientmode'] = $mode;
    }

}

if(isset($_POST['cancelForm'])){

    unset($_SESSION['requestid'], $_SESSION['patientmode']);
}



