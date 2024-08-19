<?php

    class StudentControl{
        
        public function get_student_by_studentnumber_email($conn, $email, $studentnumber){
            $sql    = "SELECT * FROM student WHERE studentnumber='$studentnumber' AND email='$email' ";
            $result = mysqli_query($conn, $sql);
            $row    = mysqli_fetch_array($result);
            return $row;
        }

        public function studentnumberExists($conn, $studentnumber){

            $sql = "SELECT * FROM student WHERE studentnumber = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $studentnumber);
            $stmt->execute();
    
            $resultData = mysqli_stmt_get_result($stmt);
    
                if ($row = mysqli_fetch_assoc($resultData)){
                    return $row;
                } else {
                    $result = false;
                    return $result;
                } 
        }

        public function emailExists($conn, $email){

            $sql = "SELECT * FROM student WHERE email = ?";
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

        public function passwordExists($conn, $id, $newpwd){
            $sql    = "SELECT * FROM student WHERE id = $id";
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

        public function create_student($conn, $email, $hashedPwd, $middlename, $firstname, $lastname, $suffix, $studentnumber, $birthday, $gender, $status, 
        $address, $phone, $landline, $course, $year, $section, $imagePath, $date){
            
            $sql = "INSERT INTO student(email, password, firstname, middlename, lastname, suffix, studentnumber, birthday, sex, status,
                                        address, phone, landline, course, year, section, image, datecreated) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssssssssiiss", $email, $hashedPwd, $firstname, $middlename, $lastname, $suffix, $studentnumber, $birthday, $gender, $status, 
                                                 $address, $phone, $landline, $course, $year, $section, $imagePath, $date);
            $stmt->execute();
        }
        
        public function insert_emergency_contact($conn, $studentID, $emergency_relationship, $emergency_firstname, $emergency_lastname, $emergency_email,
        $emergency_phone, $emergency_address, $emergency_landline){
            
            $sql = "INSERT INTO emergency_contact(studentid, relationship, firstname, lastname, email, phone, address, landline) 
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isssssss", $studentID, $emergency_relationship, $emergency_firstname, $emergency_lastname, $emergency_email,
                                          $emergency_phone, $emergency_address, $emergency_landline);
            $stmt->execute();
        }

        public function insert_allergy($conn, $studentID, $allergy1, $allergy2, $allergy3, $others){
            $sql = "INSERT INTO allergy(studentid, food, drug, substance, others) 
                    VALUES(?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issss", $studentID, $allergy1, $allergy2, $allergy3, $others);
            $stmt->execute();
        }

        public function insert_medicalhistory($conn, $studentID, $reason, $reasondate, $existingcondition, $realMedications){
            $sql = "INSERT INTO medical_history(studentid, history_hospital, hospital_date, existing_condition, medications) 
                    VALUES(?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issss", $studentID, $reason, $reasondate, $existingcondition, $realMedications);
            $stmt->execute();
        }

        public function insert_physicalexamination($conn, $studentID, $weight, $height, $bp, $temp, $pulse, $hcthgb, $fbg, $uri, $chickenpox, $tetanus, $mmr, $tb){
            $sql = "INSERT INTO physical_examination(studentid, weight, height, bp, temp, pulse, hcthbg, fbg, uri, varicella, teta, mmr, tb) 
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iddssssssssss", $studentID, $weight, $height, $bp, $temp, $pulse, $hcthgb, $fbg, $uri, $chickenpox, $tetanus, $mmr, $tb);
            $stmt->execute();
        }


    }