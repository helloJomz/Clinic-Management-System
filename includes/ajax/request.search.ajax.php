<?php 

include '../dbcon.inc.php';

if(isset($_POST['load'])){
    
    
    $mode = $_POST['load'];

    $sql = "SELECT * FROM student ORDER BY rand()";
    $result = mysqli_query($conn, $sql);
    
    $output = '';
    while($row = mysqli_fetch_array($result)){

        $output .= '
                <tr>
                    <td><img src="'.$row['image'].'" alt="studenticon" class="shadow-sm"></td>
                    <td><h6 class="p-0 name">'.ucwords($row['firstname'])." ".ucwords($row['lastname']).'<br><small class="text-muted">'.$row['studentnumber'].'</small></h6></td>
                    <td><span class="badge bg-primary text-white section">'.$row['course']." ".$row['year']."-".$row['section'].'</span></td>
                    <td class="text-end"><button class="btn font-green viewprofile" id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#patientProfile"><i class="fas fa-arrow-circle-right"></i></button>
                        <input type="hidden" id="identifier" value="student">
                    </td>
                </tr>
        ';
    }
    

    $data = array(
        'output' => $output,
        'mode' => $mode
    );

    echo json_encode($data);
}

if(isset($_POST['action'])){

   $action = $_POST['action'];

   if($action == 'search'){

    $tmp     = $_POST['mode'];
    $tmp1    = str_replace(" ", "", $tmp);
    $mode    = strtolower($tmp1);

    $search = $_POST['search'];


    if($mode == 'student'){

        $sql1 = "SELECT * FROM student WHERE CONCAT(firstname, ' ', lastname) LIKE '%".$search."%' OR studentnumber LIKE '%".$search."%' 
                 OR email LIKE '%".$search."%' OR CONCAT(course, ' ', year, '-', section) LIKE '%".$search."%' ";

        $result1 = mysqli_query($conn, $sql1);


        $outcome = '';
        if(mysqli_num_rows($result1)){
            
            while($row = mysqli_fetch_array($result1)){
            
                $outcome .= '
                    <tr>
                        <td><img src="'.$row['image'].'" alt="studenticon" class="shadow-sm"></td>
                        <td><h6 class="p-0 name">'.ucwords($row['firstname'])." ".ucwords($row['lastname']).'<br><small class="text-muted">'.$row['studentnumber'].'</small></h6></td>
                        <td><span class="badge bg-primary text-white section">'.$row['course']." ".$row['year']."-".$row['section'].'</span></td>
                        <td class="text-end"><button class="btn font-green viewprofile" id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#patientProfile"><i class="fas fa-arrow-circle-right"></i></button>
                        <input type="hidden" id="identifier" value="student"></td>
                    </tr>
                ';
        
            }

        }else{

            $outcome .= '
                <tr>
                    <td colspan="4">No results found!</td>
                </tr>
            ';
        }
    }
    
    elseif($mode == 'faculty'){
        $sql = "SELECT * FROM faculty WHERE department LIKE '%".$search."%' OR CONCAT(firstname, ' ', lastname) LIKE '%".$search."%' 
                OR email LIKE '%".$search."%' ";
        $result = mysqli_query($conn, $sql);

        $outcome = '';
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                $outcome .= '
                <tr>
                    <td><img src="'.$row['image'].'" alt="studenticon" class="shadow-sm"></td>
                    <td><h6 class="p-0 name">'.ucwords($row['firstname'])." ".ucwords($row['lastname']).'<br><small class="text-muted">'.$row['email'].'</small></h6></td>
                    <td><span class="badge bg-primary text-white section">'.$row['department'].'</span></td>
                    <td class="text-end"><button class="btn font-green viewprofile" id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#patientProfile"><i class="fas fa-arrow-circle-right"></i></button>
                    <input type="hidden" id="identifier" value="faculty"></td>
                </tr>
            ';

            }

        }else{

            $outcome .= '
            <tr>
                <td colspan="4">No results found!</td>
            </tr>
            ';

            }
    }

    elseif($mode == 'itechpersonnel'){
        $sql = "SELECT * FROM itechpersonnel WHERE department LIKE '%".$search."%' OR CONCAT(firstname, ' ', lastname) LIKE '%".$search."%' 
                OR email LIKE '%".$search."%' ";
        $result = mysqli_query($conn, $sql);

        $outcome = '';
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                $outcome .= '
                <tr>
                    <td><img src="'.$row['image'].'" alt="studenticon" class="shadow-sm"></td>
                    <td><h6 class="p-0 name">'.ucwords($row['firstname'])." ".ucwords($row['lastname']).'<br><small class="text-muted">'.$row['email'].'</small></h6></td>
                    <td><span class="badge bg-primary text-white section">'.$row['department'].'</span></td>
                    <td class="text-end"><button class="btn font-green viewprofile" id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#patientProfile"><i class="fas fa-arrow-circle-right"></i></button>
                    <input type="hidden" id="identifier" value="itechpersonnel"></td>
                </tr>
            ';

            }

        }else{

            $outcome .= '
            <tr>
                <td colspan="4">No results found!</td>
            </tr>
            ';

            }
    }


    $try = array(
        'output' => $outcome,
        'mode' => $tmp
    );

    echo json_encode($try);

   }
}


if(isset($_POST['change'])){

    $change = $_POST['change'];

    if($change == 'change'){

        $tmp     = $_POST['mode'];
        $tmp1    = str_replace(" ", "", $tmp);
        $mode    = strtolower($tmp1);

        if($mode == 'student'){
            $sql2 = "SELECT * FROM student LIMIT 5";
            $result2 = mysqli_query($conn, $sql2);

            $oResult = '';
            if(mysqli_num_rows($result2)){
                
                while($row = mysqli_fetch_array($result2)){
                
                    $oResult .= '
                        <tr>
                            <td><img src="'.$row['image'].'" alt="studenticon" class="shadow-sm"></td>
                            <td><h6 class="p-0 name">'.ucwords($row['firstname'])." ".ucwords($row['lastname']).'<br><small class="text-muted">'.$row['studentnumber'].'</small></h6></td>
                            <td><span class="badge bg-primary text-white section">'.$row['course']." ".$row['year']."-".$row['section'].'</span></td>
                            <td class="text-end"><button class="btn font-green viewprofile" id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#patientProfile"><i class="fas fa-arrow-circle-right"></i></button>
                            <input type="hidden" id="identifier" value="student"></td>
                        </tr>
                    ';
            
                }

            }else{

                $oResult .= '
                    <tr>
                        <td colspan="4">No results found!</td>
                    </tr>
                ';
            }
        }

        elseif($mode == 'faculty'){
            $sql2 = "SELECT * FROM faculty LIMIT 5";
            $result2 = mysqli_query($conn, $sql2);

            $oResult = '';
            if(mysqli_num_rows($result2) > 0){

                while($row = mysqli_fetch_array($result2)){

                    $oResult .= '
                    <tr>
                        <td><img src="'.$row['image'].'" alt="studenticon" class="shadow-sm"></td>
                        <td><h6 class="p-0 name">'.ucwords($row['firstname'])." ".ucwords($row['lastname']).'<br><small class="text-muted">'.$row['email'].'</small></h6></td>
                        <td><span class="badge bg-primary text-white section">'.$row['department'].'</span></td>
                        <td class="text-end"><button class="btn font-green viewprofile" id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#patientProfile"><i class="fas fa-arrow-circle-right"></i></button>
                        <input type="hidden" id="identifier" value="faculty"></td>
                    </tr>
                ';

                }

            }else{

                $oResult .= '
                <tr>
                    <td colspan="4">No results found!</td>
                </tr>
                ';

            }
        }

        elseif($mode == 'itechpersonnel'){
            $sql2 = "SELECT * FROM itechpersonnel LIMIT 5";
            $result2 = mysqli_query($conn, $sql2);

            $oResult = '';
            if(mysqli_num_rows($result2) > 0){

                while($row = mysqli_fetch_array($result2)){

                    $oResult .= '
                    <tr>
                        <td><img src="'.$row['image'].'" alt="studenticon" class="shadow-sm"></td>
                        <td><h6 class="p-0 name">'.ucwords($row['firstname'])." ".ucwords($row['lastname']).'<br><small class="text-muted">'.$row['email'].'</small></h6></td>
                        <td><span class="badge bg-primary text-white section">'.$row['department'].'</span></td>
                        <td class="text-end"><button class="btn font-green viewprofile" id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#patientProfile"><i class="fas fa-arrow-circle-right"></i></button>
                        <input type="hidden" id="identifier" value="itechpersonnel"></td>
                    </tr>
                ';

                }

            }else{

                $oResult .= '
                <tr>
                    <td colspan="4">No results found!</td>
                </tr>
                ';

            }
        }

        $hehe = array(
            'output' => $oResult,
            'mode' => $tmp
        );
    
        echo json_encode($hehe);
        
    }
}