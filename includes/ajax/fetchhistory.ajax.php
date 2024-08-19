<?php

include '../dbcon.inc.php';


if(isset($_POST['autoDefault'])){
    
    if($_POST['autoDefault'] == 'settings_log'){

        $default = $_POST['autoDefault'];

        $sql = "SELECT * FROM settings_log ";
        $result = mysqli_query($conn, $sql);

        $output = '';
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                $output .= '
                    <tr>
                        <td class="w-50">'.wordwrap($row['activity'],  150, "<br>", true).'</td>
                        <td>'.$row['date'].'</td>
                        <td>'.$row['admin_name'].'</td>
                    </tr>
                ';
            }

        }else{
            $output .='
                <tr><td colspan="3" class="text-center p-5">No records found!</td></tr>
            ';
        }

        $searchField = '<span class="searchIcon"><i class="fas fa-search"></i></span>
                        <input type="text" class="search searchSettings w-75" id="settings_identifier" placeholder="Search here">';

        $data = array(

            'searchBox' => $searchField,
            'output' => $output
        );     

        echo json_encode($data);
    }

    if($_POST['autoDefault'] == 'medicine_log'){

        $default = $_POST['autoDefault'];

        $sql = "SELECT * FROM medicine_log ";
        $result = mysqli_query($conn, $sql);

        $output = '';
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                $output .= '
                    <tr>
                        <td class="w-50">'.wordwrap($row['activity'],  150, "<br>", true).'</td>
                        <td>'.$row['date'].'</td>
                        <td>'.$row['admin_name'].'</td>
                    </tr>
                ';
            }

        }else{
            $output .='
                <tr><td colspan="3" class="text-center p-5">No records found!</td></tr>
            ';
        }

        echo $output;
    }

    if($_POST['autoDefault'] == 'queue_log'){

        $default = $_POST['autoDefault'];

        $sql = "SELECT * FROM queue_log ";
        $result = mysqli_query($conn, $sql);

        $output = '';
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                $output .= '
                    <tr>
                        <td class="w-50">'.wordwrap($row['activity'],  150, "<br>", true).'</td>
                        <td>'.$row['date'].'</td>
                        <td>'.$row['admin_name'].'</td>
                    </tr>
                ';
            }

        }else{
            $output .='
                <tr><td colspan="3" class="text-center p-5">No records found!</td></tr>
            ';
        }

        echo $output;
    }
    
    
}


if(isset($_POST['searchSettings'])){

    
    $search = $_POST['searchSettingsVal'];

    $sql = "SELECT * FROM settings_log WHERE activity LIKE '%".$search."%' OR label LIKE '%".$search."%' 
            OR admin_name LIKE '%".$search."%' OR date LIKE '%".$search."%' ";
    $result = mysqli_query($conn, $sql);

    $output = '';
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            $output .= '
                <tr>
                    <td class="w-50">'.wordwrap($row['activity'],  150, "<br>", true).'</td>
                    <td>'.$row['date'].'</td>
                    <td>'.$row['admin_name'].'</td>
                </tr>
            ';
        }

    }else{
        $output .='
            <tr><td colspan="3" class="text-center p-5">No records found!</td></tr>
        ';
    }
    
    echo $output;
}

if(isset($_POST['searchMedicine'])){

    $search = $_POST['searchMedVal'];

        $sql = "SELECT * FROM medicine_log WHERE activity LIKE '%".$search."%' OR label LIKE '%".$search."%' 
                OR admin_name LIKE '%".$search."%' OR date LIKE '%".$search."%' ";
        $result = mysqli_query($conn, $sql);

        $output = '';
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                $output .= '
                    <tr>
                        <td class="w-50">'.wordwrap($row['activity'],  150, "<br>", true).'</td>
                        <td>'.$row['date'].'</td>
                        <td>'.$row['admin_name'].'</td>
                    </tr>
                ';
            }

        }else{
            $output .='
                <tr><td colspan="3" class="text-center p-5">No records found!</td></tr>
            ';
        }

        echo $output;
}

if(isset($_POST['searchQueue'])){

    $search = $_POST['searchQueueVal'];

        $sql = "SELECT * FROM queue_log WHERE activity LIKE '%".$search."%' OR label LIKE '%".$search."%' 
                OR admin_name LIKE '%".$search."%' OR date LIKE '%".$search."%' ";
        $result = mysqli_query($conn, $sql);

        $output = '';
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                $output .= '
                    <tr>
                        <td class="w-50">'.wordwrap($row['activity'],  150, "<br>", true).'</td>
                        <td>'.$row['date'].'</td>
                        <td>'.$row['admin_name'].'</td>
                    </tr>
                ';
            }

        }else{
            $output .='
                <tr><td colspan="3" class="text-center p-5">No records found!</td></tr>
            ';
        }

        echo $output;
}


