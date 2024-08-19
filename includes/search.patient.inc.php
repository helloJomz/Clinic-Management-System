<?php 

require '../includes/dbcon.inc.php';

$tmp        = $_POST['patient'];
$tmp1    = str_replace(" ", "", $tmp);
$patient = strtolower($tmp1);
$search     = $_POST['name'];


    if($patient == 'student'){

        $sql = "SELECT * FROM $patient WHERE CONCAT(firstname, ' ', lastname) LIKE '%".$search."%' OR studentnumber LIKE '%".$search."%' 
                OR email LIKE '%".$search."%' OR CONCAT(course, ' ', year, '-', section) LIKE '%".$search."%' ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                ?>
                    <tr>
                        <td><img src="<?= $row['image']; ?>" alt="" width="40" height="40" class="search-img rounded"></td>
                        <td><?= ucwords($row['firstname'])." ".ucwords($row['lastname'])." ".ucwords($row['suffix']);?><br><span class="address text-muted"><?= $row['address'];?></span></td>
                        <td><?= $row['studentnumber'];?><br><span class="address text-muted"><?= $row['phone'];?></span></td>
                        <td><span class="badge bg-secondary"><?= $row['course']." ".$row['year']."-".$row['section'];?></span><br><span class="address text-muted">Last login 3 days ago</span></td>
                        <td class="text-end">
                            <form action="<?php if(isset($row['studentnumber']) && isset($row['course'])){echo 'student.php';}
                                                if(isset($row['department'])){if($row['department'] == 'Computer Management' || $row['department'] == 'Engineering Technology'){echo 'faculty.php';}}
                                                if(isset($row['department'])){if($row['department'] !== 'Computer Management' || $row['department'] !== 'Engineering Technology'){echo 'itechpersonnel.php';}} ?>" method="POST">
                                <button type="submit" name="go" class="go-icon mt-2"><i class="fas fa-arrow-circle-right fs-3 go-icon"></i></button>
                                <input type="hidden" name="patientid" value="<?php if(isset($row['studentnumber']) && isset($row['course'])){echo $row['id'];}
                                                                                   if(isset($row['department'])){if($row['department'] == 'Computer Management' || $row['department'] == 'Engineering Technology'){echo $row['id'];}else{echo $row['id'];}}?>">
                            </form>
                        </td>
                    </tr>

                <?php

            }
        }else{
            ?>
                <?php echo '<p class="no-result-msg">No result found, please try again.</p>';?>
            <?php
            }
    }

    if($patient == 'faculty'){
        $sql = "SELECT * FROM $patient WHERE department LIKE '%".$search."%' OR CONCAT(firstname, ' ', lastname) LIKE '%".$search."%' 
                OR email LIKE '%".$search."%' ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                ?>
                    <tr>
                        <td><img src="<?= $row['image']; ?>" alt="" width="40" height="40" class="search-img rounded"></td>
                        <td><?= ucwords($row['firstname'])." ".ucwords($row['lastname'])." ".ucwords($row['suffix']);?><br><span class="address text-muted"><?= $row['address'];?></span></td>
                        <td><?= $row['email'];?><br><span class="address text-muted"><?= $row['phone'];?></span></td>
                        <td><span class="badge bg-secondary"><?= $row['department'];?></span><br><span class="address text-muted">Last login 3 days ago</span></td>
                        <td class="text-end">
                            <form action="<?php if(isset($row['studentnumber']) && isset($row['course'])){echo 'student.php';}
                                                if(isset($row['department'])){if($row['department'] == 'Computer Management' || $row['department'] == 'Engineering Technology'){echo 'faculty.php';}else{echo 'itechpersonnel.php';}} ?>" method="POST">
                                <button type="submit" name="go" class="go-icon mt-2"><i class="fas fa-arrow-circle-right fs-3 go-icon"></i></button>
                                <input type="hidden" name="patientid" value="<?php if(isset($row['studentnumber']) && isset($row['course'])){echo $row['id'];}
                                                                                   if(isset($row['department'])){if($row['department'] == 'Computer Management' || $row['department'] == 'Engineering Technology'){echo $row['id'];}else{echo $row['id'];}}?>">
                            </form>
                        </td>
                    </tr>

                <?php

            }
        }else{
            ?>
                <?php echo '<p class="no-result-msg">No result found, please try again.</p>';?>
            <?php
            }
    }

    if($patient == 'itechpersonnel'){
        $sql = "SELECT * FROM $patient WHERE department LIKE '%".$search."%' OR CONCAT(firstname, ' ', lastname) LIKE '%".$search."%' 
                OR email LIKE '%".$search."%' ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                ?>
                    <tr>
                        <td><img src="<?= $row['image']; ?>" alt="" width="40" height="40" class="search-img rounded"></td>
                        <td><?= ucwords($row['firstname'])." ".ucwords($row['lastname'])." ".ucwords($row['suffix']);?><br><span class="address text-muted"><?= $row['address'];?></span></td>
                        <td><?= $row['email'];?><br><span class="address text-muted"><?= $row['phone'];?></span></td>
                        <td><span class="badge bg-secondary"><?= $row['department'];?></span><br><span class="address text-muted">Last login 3 days ago</span></td>
                        <td class="text-end">
                            <form action="<?php if(isset($row['studentnumber']) && isset($row['course'])){echo 'student.php';}
                                                if(isset($row['department'])){if($row['department'] == 'Computer Management' || $row['department'] == 'Engineering Technology'){echo 'faculty.php';}else{echo 'itechpersonnel.php';}}?>" method="POST">
                                <button type="submit" name="go" class="go-icon mt-2"><i class="fas fa-arrow-circle-right fs-3 go-icon"></i></button>
                                <input type="hidden" name="patientid" value="<?php if(isset($row['studentnumber']) && isset($row['course'])){echo $row['id'];}
                                                                                   if(isset($row['department'])){if($row['department'] == 'Computer Management' || $row['department'] == 'Engineering Technology'){echo $row['id'];}else{echo $row['id'];}}?>">
                            </form>
                        </td>
                    </tr>

                <?php

            }
        }else{
            ?>
                <?php echo '<p class="no-result-msg">No result found, please try again.</p>';?>
            <?php
            }
    }



