$(document).ready(function(){

    setInterval(function(){
        load_queue();
    }, 2000);

    load_queue();
    function load_queue(load = 'queue'){
    
        $.ajax({
            type : 'POST',
            url : '../includes/ajax/fetchqueuetable.ajax.php',
            data : {load : load},
            dataType : 'json',
            success : function(data){
                $('#current_patient_display').html(data.highlight);
                $('#queue-body').html(data.queue);
                $('#countQueue').html(data.count);
                $('#patient_mode').html(data.mode);
            }
        });
        
    }

    setInterval(function(){
        check_empty();
    }, 2000);


    check_empty();
    function check_empty(checkEmpty = 'queue'){

        $.ajax({
            type : 'POST',
            url : '../includes/ajax/fetchqueuetable.ajax.php',
            data : {checkEmpty : checkEmpty},
            dataType : 'json',
            success : function(data){
                
                if(data.empty == 'empty'){
                    $('#current_patient_display').empty();
                    $('#patient_mode').empty();
                    $('#queue-body').html(data.output);
                    $('#countQueue').html(data.count);
                    
                }
            }
        });
    }

    $('#nextqueue').click(function(){
        var nextid = $('.current_id').attr("id");

        var answer = confirm('Are you sure you want to next this patient?');

        if(answer){

            $.ajax({
                type : 'POST',
                url : '../includes/ajax/fetchqueuetable.ajax.php',
                data : {nextid : nextid},
                dataType : 'json',
                success : function(data){
                }
            })
        }
    });

    //CHECK STATUS OF QUEUE --BADGE

    setInterval(function(){
        check_status();
    }, 2000);

    check_status();
    function check_status(badgeStatus = 'queue'){

        $.ajax({
            type : 'POST',
            url : '../includes/ajax/fetchqueuetable.ajax.php',
            data : {badgeStatus : badgeStatus},
            dataType : 'json',
            success : function(data){
                $('#badgeStatus').html(data);
            }
        })
    }

    //SEARCHES
    $('#search-patient').keyup(function(){
        var searchPatient = $(this).val();
        var select = $("#select-patient").val();

        if($(this).val() !== ''){
            $.ajax({
                type : 'POST',
                url : '../includes/ajax/fetchqueuetable.ajax.php',
                data : {searchPatient : searchPatient, select : select},
                dataType : 'json',
                success : function(data){
                    $('#search-body').html(data);
                }
    
            });
        }else{
            $('#search-body').empty();
        }
       
    });

    //SELECT PATIENT
    $(document).on('click', '.selectprofile', function(){

        var patientid = $(this).attr('id');
        var mode = $('#identifier').val();
        var selectpatient = 'selected';

        $.ajax({
            type : 'POST',
            url : '../includes/ajax/fetchqueuetable.ajax.php',
            data : {patientid : patientid, selectpatient : selectpatient, mode : mode},
            dataType : 'json',
            success : function(data){
                $('#search-body').html(data);
            }
        });


    });

    //ADMIN ADD TO QUEUE
    $(document).on('click', '.addtoqueue', function(){

        var image = $('.patientimg').attr("src");
        var fullname = $('.finalFullName').val();
        var patientid = $('.finalIDSubmit').attr("id");
        var identifier = $('#finalIdentifier').val();
        var transaction = $('#transaction').val();
        var addtoqueue = 'add';
        
        $('.queue-alert').empty();

        var addSuccess = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> You have successfully added a patient to queue.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

        var errorAlert = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> This patient is already in queue.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

        var answer = confirm('Do you want to add this patient to queue?');

        if(answer){
            $.ajax({
                type : 'POST',
                url : '../includes/ajax/fetchqueuetable.ajax.php',
                data : {image : image, fullname : fullname, 
                        patientid : patientid, identifier : identifier,
                        addtoqueue : addtoqueue, transaction : transaction},
                dataType : 'json',
                success : function(data){

                    if(data == 'queue_exist'){
                        $('.queue-alert').html(errorAlert);
                    }
                    
                    else if(data == 'queue_success'){
                        $('.queue-alert').html(addSuccess);
                        load_queue();
                    }
                    
                }
            });
        }

    });


    

});
