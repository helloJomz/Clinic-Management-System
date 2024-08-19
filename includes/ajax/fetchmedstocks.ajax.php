
<?php

include '../dbcon.inc.php';

if(isset($_POST['searchstock'])){

    $search = $_POST['searchstock'];

    $sql = "SELECT * FROM stocks WHERE medicine_name LIKE '%".$search."%' OR barcode LIKE '%".$search."%' OR code LIKE '%".$search."%' ";
    $stockMedSearch = mysqli_query($conn, $sql);

    $output = '';
    if(mysqli_num_rows($stockMedSearch) > 0 ){

        while($row = mysqli_fetch_array($stockMedSearch)){

            $output .= '
            <tr>
                <td><strong>'.$row['medicine_name'].'</strong></td>
                <td>'.$row['quantity'].'</td>
                <td>'.$row['supplier'].'</td>
                <td>'.$row['purchase_date'].'</td>
                <td>'.$row['expiry_date'].'</td>
                <td>'.$row['barcode'].'</td>
                <td>'.$row['code'].'</td>
                <td>
                    <button type="button"   id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#updateStocksModal" class="btn text-primary editMedStock"><i class="fas fa-edit"></i></button>
                    <button id="'.$row['id'].'" class="btn deleteMedStock"><i class="fas fa-trash-alt text-danger"></i></button>
                </td>
            </tr>
            ';
        }

    }else{
        $output .= '
        <tr>
            <td colspan"8" class="text-center">No stocks found, please try again!</td>
        </tr>
        ';
    }

    echo $output;

}


if(!isset($_POST['searchstock'])){

    $sql = "SELECT * FROM stocks";
    $stockMedSearch = mysqli_query($conn, $sql);

    $output = '';
    if(mysqli_num_rows($stockMedSearch) > 0 ){

        while($row = mysqli_fetch_array($stockMedSearch)){

            $output .= '
            <tr>
                <td><strong>'.$row['medicine_name'].'</strong></td>
                <td>'.$row['quantity'].'</td>
                <td>'.$row['supplier'].'</td>
                <td>'.$row['purchase_date'].'</td>
                <td>'.$row['expiry_date'].'</td>
                <td>'.$row['barcode'].'</td>
                <td>'.$row['code'].'</td>
                <td>
                    <button type="button"   id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#updateStocksModal" class="btn text-primary editSettingsMedStock"><i class="fas fa-edit"></i></button>
                    <button id="'.$row['id'].'" class="btn deleteMedStock"><i class="fas fa-trash-alt text-danger"></i></button>
                </td>
            </tr>
            ';
        }

    }else{
        $output .= '
        <tr>
            <td colspan"8" class="text-center">No stocks found, please try again!</td>
        </tr>
        ';
    }

    echo $output;

}

