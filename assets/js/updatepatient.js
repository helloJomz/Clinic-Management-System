    
    $(document).ready(function(){
        
        
        $("#editPatientClose1, #editPatientClose2").click(function(){
            
            $("small").removeClass("errorLabel");
            $("input[type=text]").removeClass("errorClass");
            location.reload();
        });

        $("#changeemail").click(function(){

            $("input[type='text']").removeClass('errorClass');
            $("small").removeClass('errorLabel');

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
                    url: '../includes/ajax/update.patient.ajax.php',
                    data: {
                        id              : tmpId,
                        newEmail        : tmpNewEmail,
                        rptNewEmail     : tmpRepeatNewEmail,
                        btnChangeEmail  : tmpButton
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

        ///////////////////////////STUDENT NUMBER//////////////////////////////////////////////
        
        $("#edit-btn-sn").click(function(){

            $("input[type='text']").removeClass('errorClass');
            $("small").removeClass('errorLabel');
            
            
            var id                     = $("#edit-hiddenid-sn").val();
            var newsn                  = $("#edit-new-sn").val();
            var rptnewsn               = $("#edit-rpt-sn").val();
            var btnsn                  = $("#edit-btn-sn").val();

            var errorEmpty             = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          <strong>Error!</strong> Fill all the Student Number fields.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var invalidsn              = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          <strong>Error!</strong> Invalid Student Number, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var snNotMatch              = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          <strong>Error!</strong> Student Number does not match, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var snExists                = `<div class="alert alert-danger alert-dismissible fade show errorAlerts" role="alert" >
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          <strong>Error!</strong> Student Number already exist in the system, please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            var snSuccess               = `<div class="alert alert-success alert-dismissible fade show errorAlerts" role="alert" >
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                          <strong>Success!</strong> Student Number has been changed successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;                              
            
            var answer = confirm ("Do you want to save the changes?");
            if(answer){
                $.ajax({
                    type: 'POST',
                    url: '../includes/ajax/update.patient.ajax.php',
                    data: {
                        id              : id,
                        newsn           : newsn,
                        rptnewsn        : rptnewsn,
                        btnsn           : btnsn
                    },
                    success: function(response){
                        
                        $("#edit-new-sn, #edit-rpt-sn").removeClass("errorClass");
                        $("#l-sn1, #l-sn2").removeClass("errorLabel");
    
                        if(response == 'emptysn'){
                            $("#erroralert").append(errorEmpty);
                            $("#edit-new-sn, #edit-rpt-sn").addClass("errorClass");
                            $("#l-sn1, #l-sn2").addClass("errorLabel");
                        }
    
                        else if(response == 'invalidsn'){
                            $("#erroralert").append(invalidsn);
                            $("#edit-new-sn, #edit-rpt-sn").addClass("errorClass");
                            $("#l-sn1, #l-sn2").addClass("errorLabel");
                        }
    
                        else if(response == 'snnotmatch'){
                            $("#erroralert").append(snNotMatch);
                            $("#edit-new-sn, #edit-rpt-sn").addClass("errorClass");
                            $("#l-sn1, #l-sn2").addClass("errorLabel");
                        }
    
                        else if(response == 'snexists'){
                            $("#erroralert").append(snExists);
                            $("#edit-new-sn, #edit-rpt-sn").addClass("errorClass");
                            $("#l-sn1, #l-sn2").addClass("errorLabel");
                            
                        }
    
                        else {
                            $("#erroralert").append(snSuccess);
                            $("#edit-sn").val(response);
                            $("#edit-sn1").text(response);
                            $("#edit-new-sn, #edit-rpt-sn").removeClass("errorClass");
                            $("#l-sn1, #l-sn2").removeClass("errorLabel");
                            $("#edit-new-sn, #edit-rpt-sn").val("");
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
                    url  : '../includes/ajax/update.patient.ajax.php',
                    data : {
                            id        : id,
                            newpwd    : newpwd,
                            rptnewpwd : rptnewpwd,
                            btnpwd    : btnpwd
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
            var course          = $('#editcourse').val();
            var year            = $('#edityear').val();
            var section         = $('#editsection').val();
            var btnEditPatient  = $('#edit-btn-patient').val();

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
                    url  : '../includes/ajax/update.patient.ajax.php',
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
                        course : course,
                        year : year,
                        section : section,
                        btnEditPatient : btnEditPatient
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
                                    $('#editcourse').val(data.course);
                                    $('#edityear').val(data.year);
                                    $('#editsection').val(data.section);
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
                    url  : '../includes/ajax/update.patient.ajax.php',
                    data : {
                        id                  : id,
                        fn                  : fn,
                        ln                  : ln,
                        address             : address,
                        phone               : phone,
                        email               : email,
                        relationship        : relationship,
                        landline            : landline,
                        btnEditEmergency    : btnEditEmergency
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
                var id          = $("#editpatientid").val();
                var food        = "";
                var drug        = "";
                var substance   = "";
                var otherAllergy      = $("#others").val();
                var allergyBtn  = $("#edit-btn-allergy").val();

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
                    url  : '../includes/ajax/update.patient.ajax.php',
                    data : {
                                id              : id,
                                food            : food,
                                drug            : drug,
                                substance       : substance,
                                otherAllergy    : otherAllergy,
                                allergyBtn      : allergyBtn
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

        
 
        

    }); // END OF DOCUMENT

