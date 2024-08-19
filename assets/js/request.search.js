
$(document).ready(function(){


load_table();

function load_table(){
    
    $.ajax({
            type : 'POST',
            url  : '../includes/ajax/request.search.ajax.php',
            data : {load : 'Student'},
            dataType : 'json',
            success : function(data){
                $('#search-result').html(data.output);
                $('#mode').html(data.mode);
            }
    });

}


$('#search-bar').keyup(function(){
    
    var search = $(this).val();
    var mode   = $('#patientmode').val();
    var action = 'search';

    $.ajax({
        type : 'POST',
        url  : '../includes/ajax/request.search.ajax.php',
        data : {search : search, mode : mode, action : action},
        dataType : 'json',
        success : function(data){
            $('#search-result').html(data.output);
            $('#mode').html(data.mode);
        }

    });
    
});

$(document).on('change', '#patientmode', function(){
    
    var mode = $(this).val();
    var change = 'change';

    $.ajax({
        type : 'POST',
        url  : '../includes/ajax/request.search.ajax.php',
        data : {mode : mode, change : change},
        dataType : 'json',
        success : function(data){
            $('#search-result').html(data.output);
            $('#mode').html(data.mode);
        }
    });

});

$(document).on('click', '.viewprofile', function(){
    var patientid = $(this).attr("id");
    var patientmode = $('#identifier').val();

    $.ajax({
        type : 'POST',
        url  : '../includes/ajax/fetchpatientprofile.ajax.php',
        data : {patientid : patientid, patientmode : patientmode},
        success : function(data){
            $('#profile_body').html(data);
        }
    });

$(document).on('click', '.proceedBtn', function(){
    var reqid  = $(this).attr("id");
    var answer = confirm('Do you want to proceed on requesting with this patient?');
    var proceed = 'yes';
    var patientmode = $('#identifier').val();

    if(answer){
        
        $.ajax({
        type : 'POST',
        url  : '../includes/ajax/request.ajax.php',
        data : {proceed : proceed, reqid : reqid, patientmode : patientmode},
        success : function(data){
            window.location.href = 'request.php';
        }
        });

    }

});

});































});