    
    $(document).ready(function(){
        
        
        $("#editPatientClose1, #editPatientClose2").click(function(){
            
            $("small").removeClass("errorLabel");
            $("input[type=text]").removeClass("errorClass");
            location.reload();
        });

        $("#changeemail").click(function(){

            $("input[type='text']").removeClass('errorClass');
            $("small").removeClass('errorLabel');

            var mode                   = $("#patientmode").val();
            var tmpId                  = $("#changeemailid").val();
            var tmpNewEmail            = $("#newemail").val();
            var tmpRepeatNewEmail      = $("#rptnewemail").val();
            var tmpButton              = $("#changeemail").val();

            var errorEmpty             = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          <strong>Error!</strong> Fill all the email fields.<button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var invalidEmail           = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          <strong>Error!</strong> Invalid Email, please try again.<button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var emailNotMatch          = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          <strong>Error!</strong> Email does not match, please try again.<button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var emailExists            = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          <strong>Error!</strong> Email already exist in the system, please try again.<button type="button"  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var emailSuccess           = `<div class="alert alert-success alert-dismissible fade show errorAlerts" role="alert" >
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                          <strong>Success!</strong> Email has been changed successfully.<button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button></div>`;                              
            
            var answer = confirm ("Do you want to save the changes?");
            if(answer){
                $.ajax({
                    type: 'POST',
                    url: '../includes/ajax/update.patientmerge.ajax.php',
                    data: {
                        id              : tmpId,
                        newEmail        : tmpNewEmail,
                        rptNewEmail     : tmpRepeatNewEmail,
                        btnChangeEmail  : tmpButton,
                        mode            : mode
                    },
                    success: function(response){
                        
                        if(response == 'emptyemail'){
                            $("#erroralert").append(errorEmpty);
                            $("#newemail, #rptnewemail").addClass("errorClass");
                            $("#l-email1, #l-email2").addClass("errorLabel");
                        }
    
                        else if(response == 'invalidemail'){
                            $("#erroralert").append(invalidEmail);
                            $("#newemail, #rptnewemail").addClass("errorClass");
                            $("#l-email1, #l-email2").addClass("errorLabel");
                        }
    
                        else if(response == 'emailnotmatch'){
                            $("#erroralert").append(emailNotMatch);
                            $("#newemail, #rptnewemail").addClass("errorClass");
                            $("#l-email1, #l-email2").addClass("errorLabel");
                        }
    
                        else if(response == 'emailexists'){
                            $("#erroralert").append(emailExists);
                            $("#newemail, #rptnewemail").addClass("errorClass");
                            $("#l-email1, #l-email2").addClass("errorLabel");
                            
                        }
    
                        else {
                            $("#erroralert").append(emailSuccess);
                            $("#editemail").val(response);
                            $("#editemail1").text(response);
                            $("#newemail, #rptnewemail").removeClass("errorClass");
                            $("#l-email1, #l-email2").removeClass("errorLabel");
                            $("#newemail, #rptnewemail").val("");
                        }
                        
                        
                    }
                });
            }
            
        });

        ////////////////////////PASSWORD///////////////////////////////////

        $("#edit-btn-pwd").click(function(){

            $("input[type='text']").removeClass('errorClass');
            $("small").removeClass('errorLabel');

            var id          = $("#edit-hiddenid-pwd").val();
            var newpwd      = $("#edit-new-pwd").val();
            var rptnewpwd   = $("#edit-rpt-pwd").val();
            var btnpwd      = $("#edit-btn-pwd").val();
            var mode        = $("#patientmode").val();

            var errorEmpty             = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                         <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                         <strong>Error!</strong> Fill all the Password Fields.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var pwdNotMatch            = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          <strong>Error!</strong> Password fields does not match, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var pwdExists              = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          <strong>Error!</strong> You entered a password which is the same to the Old Password, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;                              
            var pwdSuccess             = `<div class="alert alert-success alert-dismissible fade show errorAlerts" role="alert" >
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                          <strong>Success!</strong> Password has been changed successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;   
            
            var answer = confirm ("Do you want to save the changes?");
            if(answer){
                $.ajax({
                    type : 'POST',
                    url  : '../includes/ajax/update.patientmerge.ajax.php',
                    data : {
                            id        : id,
                            newpwd    : newpwd,
                            rptnewpwd : rptnewpwd,
                            btnpwd    : btnpwd,
                            mode      : mode
                    },
                    success : function(response){
                        
                        if(response == 'emptypwd'){
                            $("#erroralert").append(errorEmpty);
                            $("#edit-new-pwd, #edit-rpt-pwd").addClass("errorClass");
                            $("#l-pwd1, #l-pwd2").addClass("errorLabel");
                        }
                        else if(response == 'pwdnotmatch'){
                            $("#erroralert").append(pwdNotMatch);
                            $("#edit-new-pwd, #edit-rpt-pwd").addClass("errorClass");
                            $("#l-pwd1, #l-pwd2").addClass("errorLabel");
                        }
                        else if(response == 'pwdexist'){
                            $("#erroralert").append(pwdExists);
                            $("#edit-new-pwd, #edit-rpt-pwd").addClass("errorClass");
                            $("#l-pwd1, #l-pwd2").addClass("errorLabel");
                        }
    
                        else {
                            $("#erroralert").append(pwdSuccess);
                            $("#edit-pwd").val(response);
                            $("#edit-new-pwd, #edit-rpt-pwd").removeClass("errorClass");
                            $("#l-pwd1, #l-pwd2").removeClass("errorLabel");
                            $("#edit-new-pwd, #edit-rpt-pwd").val("");
                        }
                    }
                });
            }
           
        });

        /////////////////////////PATIENT INFORMATION/////////////////////////////////////////////

        $('#edit-btn-patient').click(function(){

            $("input[type='text']").removeClass('errorClass');
            $("small").removeClass('errorLabel');

            var id              = $('#editpatientid').val();
            var fn              = $('#editfn').val();
            var ln              = $('#editln').val();
            var mn              = $('#editmn').val();
            var sf              = $('#editsf').val();
            var bday            = $('#editbday').val();
            var gender          = $('#editgender').val();
            var status          = $('#editstatus').val();
            var address         = $('#editaddress').val();
            var phone           = $('#editphone').val();
            var landline        = $('#editlandline').val();
            var btnEditPatient  = $('#edit-btn-patient').val();
            var department      = $('#editdepartment').val();
            var mode            = $("#patientmode").val();

            var emptyError          =     `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                       <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                       <strong>Error!</strong> Please check for empty fields (other than Middle Name, Landline and Suffix).<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var invalidFn           =     `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                       <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                       <strong>Error!</strong> Invalid First Name, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var invalidMn           =     `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                       <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                       <strong>Error!</strong> Invalid Middle Name, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var invalidLn           =  `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <strong>Error!</strong> Invalid Last Name, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var invalidPhone         = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <strong>Error!</strong> Phone Number must be a number, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var invalidLandline      = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <strong>Error!</strong> Landline Number must be a number, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var phoneError           = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <strong>Error!</strong> Phone Number must be 11 digits.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var successAlert         = `<div class="alert alert-success alert-dismissible fade show errorAlerts" role="alert" >
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                            <strong>Success!</strong> Patient information has been changed successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            
            var answer = confirm ("Do you want to save the changes?");
            if(answer){
                $.ajax({
                    type : 'POST',
                    url  : '../includes/ajax/update.patientmerge.ajax.php',
                    data : {
                        id : id,
                        fn : fn,
                        ln : ln,
                        mn : mn,
                        sf : sf,
                        bday : bday,
                        gender : gender,
                        status : status,
                        address : address,
                        phone : phone,
                        landline : landline,
                        btnEditPatient : btnEditPatient,
                        mode           : mode,
                        department     : department
                    },
                    dataType : 'json',
                    success: function(data){
    
                        if(data == 'emptyfields'){
                            $("#erroralert").append(emptyError);
                            $("#editfn, #editln, #editaddress, #editphone").addClass('errorClass');
                            $("#lp-1, #lp-3, #lp-4, #lp-5").addClass('errorLabel');
                        }
                        else if (data == 'invalidfn'){
                            $("#erroralert").append(invalidFn);
                            $("#editfn").addClass('errorClass');
                            $("#lp-1").addClass('errorLabel');
                        }
                        else if (data == 'invalidmn'){
                            $("#erroralert").append(invalidMn);
                            $("#editmn").addClass('errorClass');
                            $("#lp-2").addClass('errorLabel');
                        }
                        else if (data == 'invalidln'){
                            $("#erroralert").append(invalidLn);
                            $("#editln").addClass('errorClass');
                            $("#lp-3").addClass('errorLabel');
                        }
                        else if (data == 'invalidphone'){
                            $("#erroralert").append(invalidPhone);
                            $("#editphone").addClass('errorClass');
                            $("#lp-5").addClass('errorLabel');
                        }
                        else if (data == 'invalidlandline'){
                            $("#erroralert").append(invalidLandline);
                            $("#editlandline").addClass('errorClass');
                            $("#lp-6").addClass('errorLabel');
                        }
                        else if (data == 'lessphone'){
                            $("#erroralert").append(phoneError);
                            $("#editphone").addClass('errorClass');
                            $("#lp-5").addClass('errorLabel');
                        }
                        else if (data == 'overphone'){
                            $("#erroralert").append(phoneError);
                            $("#editphone").addClass('errorClass');
                            $("#lp-5").addClass('errorLabel');
                        }
                        else{
                                    $("#erroralert").append(successAlert);
                                    $('#editfn').val(data.firstname);
                                    $('#editln').val(data.lastname);
                                    $('#editmn').val(data.middlename);
                                    $('#editsf').val(data.suffix);
                                    $('#editbday').val(data.birthday);
                                    $('#editgender').val(data.sex);
                                    $('#editstatus').val(data.status);
                                    $('#editaddress').val(data.address);
                                    $('#editphone').val(data.phone);
                                    $('#editlandline').val(data.landline);
                                    $('#editdepartment').val(data.department);
                                    $("input[type='text']").removeClass('errorClass');
                                    $("small").removeClass('errorLabel');
              
                        }
    
                    }
                   
                    
                });
            }

            
        });

        /////////////////////// EMERGENCY INFO ////////////////////////////////////

        $("#edit-btn-emergency").click(function(){

            $("input[type='text']").removeClass('errorClass');
            $("small").removeClass('errorLabel');

            var id                  = $("#editpatientid").val();
            var fn                  = $("#editemergencyfn").val();
            var ln                  = $("#editemergencyln").val();
            var email               = $("#editemergencyemail").val();
            var address             = $("#editemergencyaddress").val();
            var phone               = $("#editemergencyphone").val();
            var landline            = $("#editemergencylandline").val();
            var relationship        = $("#editemergencyrelationship").val();
            var btnEditEmergency    = $("#edit-btn-emergency").val();
            var mode                = $("#patientmode").val();

            var emptyError          =     `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                           <strong>Error!</strong> Please check for empty fields (other than Middle Name and Landline).<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var invalidFn           =     `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                           <strong>Error!</strong> Invalid First Name, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var invalidLn           =      `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                           <strong>Error!</strong> Invalid Last Name, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var invalidPhone         =     `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                           <strong>Error!</strong> Phone Number must be a number, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var invalidLandline      =     `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                           <strong>Error!</strong> Landline Number must be a number, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var phoneError           =      `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            <strong>Error!</strong> Phone Number must be 11 digits.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var invalidEmail           =    `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            <strong>Error!</strong> Invalid Email, please try again.<button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var successAlert         =      `<div class="alert alert-success alert-dismissible fade show errorAlerts" role="alert" >
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                            <strong>Success!</strong> Emergency Contact information has been changed successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;

            var answer = confirm ("Do you want to save the changes?");
            if(answer){
                $.ajax({
                    type : 'POST',
                    url  : '../includes/ajax/update.patientmerge.ajax.php',
                    data : {
                        id                  : id,
                        fn                  : fn,
                        ln                  : ln,
                        address             : address,
                        phone               : phone,
                        email               : email,
                        relationship        : relationship,
                        landline            : landline,
                        btnEditEmergency    : btnEditEmergency,
                        mode                : mode
                },
                dataType : 'json',
                success: function(data){
                    if(data == 'emptyfields'){
                        $("#erroralert").append(emptyError);
                        $("#editemergencyfn, #editemergencyln, #editemergencyaddress, #editemergencyphone").addClass('errorClass');
                        $("#le-1, #le-2, #le-4, #le-5").addClass('errorLabel');
                    }
                    else if (data == 'invalidfn'){
                        $("#erroralert").append(invalidFn);
                        $("#editemergencyfn").addClass('errorClass');
                        $("#le-1").addClass('errorLabel');
                    }
                    else if (data == 'invalidln'){
                        $("#erroralert").append(invalidLn);
                        $("#editemergencyln").addClass('errorClass');
                        $("#le-2").addClass('errorLabel');
                    }
                    else if (data == 'invalidphone'){
                        $("#erroralert").append(invalidPhone);
                        $("#editemergencyphone").addClass('errorClass');
                        $("#le-5").addClass('errorLabel');
                    }
                    else if (data == 'invalidlandline'){
                        $("#erroralert").append(invalidLandline);
                        $("#editemergencylandline").addClass('errorClass');
                        $("#le-6").addClass('errorLabel');
                    }
                    else if (data == 'lessphone'){
                        $("#erroralert").append(phoneError);
                        $("#editemergencyphone").addClass('errorClass');
                        $("#le-5").addClass('errorLabel');
                    }
                    else if (data == 'overphone'){
                        $("#erroralert").append(phoneError);
                        $("#editemergencyphone").addClass('errorClass');
                        $("#le-5").addClass('errorLabel');
                    }
                    else if(data == 'invalidemail'){
                        $("#erroralert").append(invalidEmail);
                        $("#editemergencyemail").addClass('errorClass');
                        $("#le-3").addClass('errorLabel');
                    }
                    else{
                        $("#erroralert").append(successAlert);
                        $("#editemergencyfn").val(data.firstname);
                        $("#editemergencyln").val(data.lastname);
                        $("#editemergencyemail").val(data.email);
                        $("#editemergencyaddress").val(data.address);
                        $("#editemergencyphone").val(data.phone);
                        $("#editemergencylandline").val(data.landline);
                        $("#editemergencyrelationship").val(data.relationship);
                        $("input[type='text']").removeClass('errorClass');
                        $("small").removeClass('errorLabel');
                    }
                    
                }
               });
            }
           
        });

        /////////////////////// ALLERGY ///////////////////////////


        $("#edit-btn-allergy").click(function(){
                var id                = $("#editpatientid").val();
                var food              = "";
                var drug              = "";
                var substance         = "";
                var otherAllergy      = $("#others").val();
                var allergyBtn        = $("#edit-btn-allergy").val();
                var mode              = $("#patientmode").val();

                $('input[name="foodallergy[]"]').each(function () {
                    var ischecked = $(this).is(":checked");
                    if (ischecked) {
                        food += $(this).val() + ", ";
                    }
                });

                $('input[name="drugallergy[]"]').each(function () {
                    var ischecked = $(this).is(":checked");
                    if (ischecked) {
                        drug += $(this).val() + ", ";
                    }
                });

                $('input[name="substanceallergy[]"]').each(function () {
                    var checksubstance = $(this).is(":checked");
                    if (checksubstance) {
                        substance += $(this).val() + ", ";
                    }
                });

                var successAlert = `<div class="alert alert-success alert-dismissible fade show errorAlerts" role="alert" >
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <strong>Success!</strong> Allergy has been changed successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
                var invalidOthers    =  `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                    <strong>Error!</strong> Invalid Characters, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;

                var answer = confirm ("Do you want to save the changes?");
                if(answer){
                    $.ajax({

                    type : 'POST',
                    url  : '../includes/ajax/update.patientmerge.ajax.php',
                    data : {
                                id              : id,
                                food            : food,
                                drug            : drug,
                                substance       : substance,
                                otherAllergy    : otherAllergy,
                                allergyBtn      : allergyBtn,
                                mode            : mode
                    },
                    dataType : 'json',
                    success : function(data){
    
    
                            if(data == "invalidothers"){
                                $("#erroralert").append(invalidOthers);
                                $("#others").addClass('errorClass');
                                $("#lo-1").addClass('errorLabel');
                            }else{
                                $("#erroralert").append(successAlert);
                                $("#others").val(data.others);
                                $("#others").removeClass('errorClass');
                                $("small").removeClass('errorLabel');
                            }
                    }
                });
            }
            

        });

        
        $("#edit-btn-condition").click(function(){

            var id                     = $("#editpatientid").val();
            var btnCondition           = $("#edit-btn-condition").val();
            var existingcondition      = "";
            var mode                   = $("#patientmode").val();
    
            var successAlert = `<div class="alert alert-success alert-dismissible fade show errorAlerts" role="alert" >
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <strong>Success!</strong> Existing Condition has been changed successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            
    
            $('input[name="existingcondition[]"]').each(function () {
                var ischecked = $(this).is(":checked");
                if (ischecked) {
                    existingcondition += $(this).val() + ", ";
                }
            });
            
            var answer = confirm ("Do you want to save the changes?");
            if(answer){
                $.ajax({
                    type        : 'POST',
                    url         : '../includes/ajax/update.patientmerge.ajax.php',
                    data        : {
                                        id                : id,
                                        existingcondition : existingcondition,
                                        btnCondition      : btnCondition,
                                        mode              : mode
                    },
                    dataType    : 'json',
                    success     : function(data){
                        
                        $("#erroralert").append(successAlert);
                    },
                    
                });
            }
            
    
        });

        $("#btnPhysical").click(function(){
        
            var id                   = $("#editpatientid").val();
            var bp                   = $('input[name="bp"]:checked').val();
            var hct                  = $('input[name="hcthgb"]:checked').val();
            var temp                 = $('input[name="temp"]:checked').val();
            var fbg                  = $('input[name="fbg"]:checked').val();
            var pulse                = $('input[name="pulse"]:checked').val();
            var chickenpox           = $('input[name="chickenpox"]:checked').val();
            var tetanus              = $('input[name="tetanus"]:checked').val();
            var mmr                  = $('input[name="mmr"]:checked').val();
            var tb                   = $('input[name="tb"]:checked').val();
            var uri                  = $('input[name="uri"]:checked').val();
            var physicalHeight       = $('#physicalHeight').val();
            var physicalWeight       = $('#physicalWeight').val();
            var btnPhysical          = $('#btnPhysical').val();
            var mode                 = $("#patientmode").val();
    
            var successAlert = `<div class="alert alert-success alert-dismissible fade show errorAlerts" role="alert" >
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <strong>Success!</strong> Physical Examination has been changed successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var mustBeNumber =  `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <strong>Error!</strong> Please check the Weight and Height, it must be a number, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var empty        =  `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <strong>Error!</strong> Weight and Height should not be empty, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var answer = confirm ("Do you want to save the changes?");
            if(answer){
                $.ajax({
                    type        : 'POST',
                    url         : '../includes/ajax/update.patientmerge.ajax.php',
                    data        : {
                                    id              : id,
                                    bp              : bp,
                                    hct             : hct,
                                    temp            : temp,
                                    fbg             : fbg,
                                    pulse           : pulse,
                                    chickenpox      : chickenpox,
                                    tetanus         : tetanus,
                                    mmr             : mmr,
                                    tb              : tb,
                                    uri             : uri,
                                    physicalHeight  : physicalHeight,
                                    physicalWeight  : physicalWeight,
                                    btnPhysical     : btnPhysical,
                                    mode            : mode
                    },
                    dataType    : 'json',
                    success     : function(data){
                        
                        if(data == 'invalidweightheight'){
                            $('#erroralert').append(mustBeNumber);
                            $('#l-w1').addClass('errorLabel');
                            $('#l-h1').addClass('errorLabel');
                            $('#physicalHeight').addClass('errorClass');
                            $('#physicalWeight').addClass('errorClass');
                        }
                        else if(data == 'emptyweightheight'){
                            $('#erroralert').append(empty);
                            $('#l-w1').addClass('errorLabel');
                            $('#l-h1').addClass('errorLabel');
                            $('#physicalHeight').addClass('errorClass');
                            $('#physicalWeight').addClass('errorClass');
                        }
                        else{
                            $('#erroralert').append(successAlert);
                            $("input[type='text']").removeClass('errorClass');
                            $("small").removeClass('errorLabel');
                        }
                        
                    }
                });
            }
            
        });
    
        //////////////////////// FILEEEEEEEEES /////////////////////////////
    
        load_data();
    
        function load_data(){
            $.ajax({
                url         : '../includes/ajax/fetchfilemerge.ajax.php',
                type        : 'POST',
                data        : { 
                             id     : $("#editpatientid").val(),
                             mode   : $("#patientmode").val()
                },
                success     : function(data){
                    $('#fileDataRow').append(data);
                }
                
            });
        }
    
        $(document).on("click", ".deleteFile", function(){
            var id              = $("#editpatientid").val();
            var deleteFileID    = $(this).attr("id");
            var deleteFileBtn   = $(this).val();
            var mode            = $("#patientmode").val();

            var answer = confirm ("Are you sure you want to delete from the database?");
            if(answer){
                
                $.ajax({
                    type : 'POST',
                    url  : '../includes/ajax/update.patientmerge.ajax.php',
                    data : {
                        id              : id,
                        deleteFileID    : deleteFileID,
                        deleteFileBtn   : deleteFileBtn,
                        mode            : mode
                    },
                    success: function(data){
                    }
                });
            }
    
        });
    
        $("#edit-btn-medication").click(function(){
            
            var id              = $("#editpatientid").val();
            var medication      = $("#text-medication").val();
            var btnMedication   = $(this).val();
            var successAlert    = `<div class="alert alert-success alert-dismissible fade show errorAlerts" role="alert" >
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <strong>Success!</strong> Medications has been changed successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var mode            = $("#patientmode").val();

            var answer = confirm ("Are you sure you want to save the changes?");
    
            if(answer){
                $.ajax({
                    type : 'POST',
                    url  : '../includes/ajax/update.patientmerge.ajax.php',
                    data : {
                                id         : id,
                                medication : medication,
                                btnMedication : btnMedication,
                                mode          : mode
                    },
                    dataType    : 'json',
                    success     : function(data){
                            
                            $('#erroralert').append(successAlert);
                            $('#currentMed').text(data.medications);
                            $("#text-medication").val(data.medications);
                            $("input[type='text']").removeClass('errorClass');
                            $("small").removeClass('errorLabel');
                        
        
                    }
                });
            }
        });

        $(document).on('click', '#requestModalFaculty', function(){
       
            $.ajax({
                type : 'POST',
                url  : '../includes/ajax/profile.activities.ajax.php',
                data : {hiddenfacultytid : $('#hiddenfacultyid').val(), requestModalFaculty : $(this).val()},
                dataType : 'json',
                success : function(data){
                    $('#request-body').html(data.request);
                    $('#queue-body').html(data.queue);
                }
            });
    
        });

        $(document).on('click', '#requestModalItechpersonnel', function(){

       
            $.ajax({
                type : 'POST',
                url  : '../includes/ajax/profile.activities.ajax.php',
                data : {hiddenitechpersonnelid : $('#hiddenitechpersonnelid').val(), requestModalItechpersonnel : $(this).val()},
                dataType : 'json',
                success : function(data){
                    $('#request-body').html(data.request);
                    $('#queue-body').html(data.queue);
                }
            });
    
        });
        

    }); // END OF DOCUMENT

