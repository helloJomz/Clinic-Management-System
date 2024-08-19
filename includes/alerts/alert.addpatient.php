<?php

if(isset($_SESSION['error'])){
  
    if($_SESSION['error'] == "emptyfields"){
        ?>
        <script> swal("ERROR", "Please Fill-up all the Necessary Fields.", "error"); </script>
        
        <?php
    }
    
    if($_SESSION['error'] == "emptyfirstname"){
        ?>
        <script> swal("ERROR", "Please put Patient's First Name.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emptylastname"){
        ?>
        <script> swal("ERROR", "Please put Patient's Last Name.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emptymiddlename"){
        ?>
        <script> swal("ERROR", "Please put Patient's Middle Name.", "error"); </script>
        
        <?php
    }


    if($_SESSION['error'] == "emptyemail"){
        ?>
        <script> swal("ERROR", "Please put Patient's Email.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emptypwd"){
        ?>
        <script> swal("ERROR", "Please fill up all Password Fields.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emptybday"){
        ?>
        <script> swal("ERROR", "Please put Patient's Birthday.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emptyweight"){
        ?>
        <script> swal("ERROR", "Please fill up the Patient's Weight Field.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emptyheight"){
        ?>
        <script> swal("ERROR", "Please fill up the Patient's Height Field.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emptyaddress"){
        ?>
        <script> swal("ERROR", "Please put Patient's Address", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "phonemustbenumber"){
        ?>
        <script> swal("ERROR", "Patient's Phone number must be a number.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emptypatientphone"){
        ?>
        <script> swal("ERROR", "Please put your the Contact Number.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emptyemergencyfirstname"){
        ?>
        <script> swal("ERROR", "Please put Patient's Emergency Contact's First Name.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emergencyphonemustbenumber"){
        ?>
        <script> swal("ERROR", "Emergency Contact's Phone number must be a number.", "error"); </script>
        
        <?php
    }
    

    if($_SESSION['error'] == "emptyemergencylastname"){
        ?>
        <script> swal("ERROR", "Please put Patient's Emergency Contact's Last Name.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emptyemergencyaddress"){
        ?>
        <script> swal("ERROR", "Please put Patient's Emergency Contact's Address.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emptyemergencyphone"){
        ?>
        <script> swal("ERROR", "Please put Patient's Emergency Contact's Contact Number.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "relationship"){
        ?>
        <script> swal("ERROR", "Please put Patient's relationship to Emergency Contact Person.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "course"){
        ?>
        <script> swal("ERROR", "Please put Patient's Course.", "error"); </script>
        
        <?php
    }
    
    if($_SESSION['error'] == "year"){
        ?>
        <script> swal("ERROR", "Please put Patient's Academic Year.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "section"){
        ?>
        <script> swal("ERROR", "Please put Patient's Section.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "gender"){
        ?>
        <script> swal("ERROR", "Please put Patient's Sex.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "passwordnotmatch"){
        ?>
        <script> swal("ERROR", "Password does not match, please try again.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "studentphonenumberexceedchar"){
        ?>
        <script> swal("ERROR", "Patient's phone number exceed the required digits.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "guardianphonenumberexceedchar"){
        ?>
        <script> swal("ERROR", "Emergency Contact's phone number exceed the required digits.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "studentphonenumberlesschar"){
        ?>
        <script> swal("ERROR", "Student's phone number is less than the required digits.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emergencyphonenumberlesschar"){
        ?>
        <script> swal("ERROR", "Emergency Contact's phone number is less than the required digits.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "invalidemail"){
        ?>
        <script> swal("ERROR", "Email is invalid, please try again.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "invalidemergencyemail"){
        ?>
        <script> swal("ERROR", "Email is invalid, please try again.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "studentnumberalreadyexist"){
        ?>
        <script> swal("ERROR", "Student number is already registered in the system.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "emailalreadyexist"){
        ?>
        <script> swal("ERROR", "Email is already registered in the system.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "invalidcharstudentname"){
        ?>
        <script> swal("ERROR", "You input an invalid characters to Patient, please try again.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "invalidcharemergencyname"){
        ?>
        <script> swal("ERROR", "You input an invalid characters to Emergency Contact Person, please try again.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "invalidstudentnumber"){
        ?>
        <script> swal("ERROR", "You input an invalid student number, please try again.", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "invalidweight"){
        ?>
        <script> swal("ERROR", "Please input numbers (can be decimal) only in weight. ", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "invalidheight"){
        ?>
        <script> swal("ERROR", "Please input numbers (can be decimal) only in height. ", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "department"){
        ?>
        <script> swal("ERROR", "Please put a Department. ", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "gender"){
        ?>
        <script> swal("ERROR", "Please put a Gender. ", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "relationship"){
        ?>
        <script> swal("ERROR", "Please put a Relation to Contact's Emergency Person. ", "error"); </script>
        
        <?php
    }

    if($_SESSION['error'] == "status"){
        ?>
        <script> swal("ERROR", "Please put a Status. ", "error"); </script>
        
        <?php
    }

}

?>