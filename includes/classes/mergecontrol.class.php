<?php

    class MergeControl{

        public function emailExists($conn, $mode, $email){

            $sql = "SELECT * FROM $mode WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
    
            $resultData = mysqli_stmt_get_result($stmt);
    
                if ($row = mysqli_fetch_assoc($resultData)){
                    return $row;
                } else {
                    $result = false;
                    return $result;
                } 
        }

        public function passwordExists($conn, $mode, $id, $newpwd){
            $sql    = "SELECT * FROM $mode WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $row    = mysqli_fetch_array($result);

            if(password_verify($newpwd, $row['password'])){
                $error = 'exist';
                return $error;
            }else{
                $error = 'notexist';
                return $error;
            }
        }

        public function get_merge_info($conn, $realmode, $department, $firstname, $lastname){
            $sql    = "SELECT * FROM $realmode WHERE department='$department' AND firstname='$firstname' AND lastname='$lastname' ";
            $result = mysqli_query($conn, $sql);
            $row    = mysqli_fetch_array($result);
            return $row;
        }


        public function create_merge($conn, $realmode, $firstname, $lastname, $middlename, $suffix, $email, $department, $phone, $landline, $address,
                                     $gender, $status, $hashedPwd, $imagePath, $birthday, $date){

            $sql = "INSERT INTO $realmode(firstname, lastname, middlename, suffix, email, department, phone, landline, address, 
                                        sex, status, password, image, birthday, datecreated) 
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssssssssss", $firstname, $lastname, $middlename, $suffix, $email, $department, $phone, $landline, $address,
                                                 $gender, $status, $hashedPwd, $imagePath, $birthday, $date);
            $stmt->execute();
        }

        public function insert_emergency_contact($conn, $finalmode, $mergeID, $emergency_relationship, $emergency_firstname, $emergency_lastname, $emergency_email,
        $emergency_phone, $emergency_address, $emergency_landline){
            
            $sql = "INSERT INTO emergency_contact(".$finalmode.", relationship, firstname, lastname, email, phone, address, landline) 
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isssssss", $mergeID, $emergency_relationship, $emergency_firstname, $emergency_lastname, $emergency_email,
                                          $emergency_phone, $emergency_address, $emergency_landline);
            $stmt->execute();
        }

        public function insert_allergy($conn, $finalmode, $mergeID, $allergy1, $allergy2, $allergy3, $others){
            $sql = "INSERT INTO allergy(".$finalmode.", food, drug, substance, others) 
                    VALUES(?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issss", $mergeID, $allergy1, $allergy2, $allergy3, $others);
            $stmt->execute();
        }

        public function insert_medicalhistory($conn, $finalmode, $mergeID, $reason, $reasondate, $existingcondition, $realMedications){
            $sql = "INSERT INTO medical_history(".$finalmode.", history_hospital, hospital_date, existing_condition, medications) 
                    VALUES(?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issss", $mergeID, $reason, $reasondate, $existingcondition, $realMedications);
            $stmt->execute();
        }

        public function insert_physicalexamination($conn, $finalmode, $mergeID, $weight, $height, $bp, $temp, $pulse, $hcthgb, $fbg, $uri, $chickenpox, $tetanus, $mmr, $tb){
            $sql = "INSERT INTO physical_examination(".$finalmode.", weight, height, bp, temp, pulse, hcthbg, fbg, uri, varicella, teta, mmr, tb) 
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iddssssssssss", $mergeID, $weight, $height, $bp, $temp, $pulse, $hcthgb, $fbg, $uri, $chickenpox, $tetanus, $mmr, $tb);
            $stmt->execute();
        }


    }