$(document).ready(function(){

    
    $("#edit-btn-condition").click(function(){
        var id                = $("#editpatientid").val();
        var btnCondition      = $("#edit-btn-condition").val();
        var existingcondition = "";

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
                url         : '../includes/ajax/update.patient.ajax.php',
                data        : {
                                    id                : id,
                                    existingcondition : existingcondition,
                                    btnCondition      : btnCondition
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
                url         : '../includes/ajax/update.patient.ajax.php',
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
                                btnPhysical     : btnPhysical
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
            url         : '../includes/ajax/fetchfile.ajax.php',
            type        : 'POST',
            data        : { 
                         id : $("#editpatientid").val()
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
        var answer = confirm ("Are you sure you want to delete from the database?");
        if(answer){
            
            $.ajax({
                type : 'POST',
                url  : '../includes/ajax/update.patient.ajax.php',
                data : {
                    id              : id,
                    deleteFileID    : deleteFileID,
                    deleteFileBtn   : deleteFileBtn
                },
                success: function(data){
                    window.location.reload();
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
        
        var answer = confirm ("Are you sure you want to save the changes?");

        if(answer){
            $.ajax({
                type : 'POST',
                url  : '../includes/ajax/update.patient.ajax.php',
                data : {
                            id         : id,
                            medication : medication,
                            btnMedication : btnMedication
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


    $(document).on('click', '#requestModalStudent', function(){
       
        $.ajax({
            type : 'POST',
            url  : '../includes/ajax/profile.activities.ajax.php',
            data : {hiddenstudentid : $('#hiddenstudentid').val(), requestModalStudent : $(this).val()},
            dataType : 'json',
            success : function(data){
                $('#request-body').html(data.request);
                $('#queue-body').html(data.queue);
            }
        });

    });

    

});