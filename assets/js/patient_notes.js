$(document).ready(function(){


    setInterval(function(){
        load_notes();
    }, 1000);
    
    load_notes();
    
    function load_notes(loadnote = ''){

        var notemode = $('#note_mode').val();
        var noteid = $('#hiddennoteid').val();
        
        $.ajax({    
            type : 'POST',
            url  : '../includes/ajax/note.ajax.php',
            data : {loadnote : loadnote, notemode : notemode, noteid : noteid},
            dataType : 'json',
            success : function(data){
                $('#span-note-list').html(data);
            }
    
        });
    }

    $(document).on('click', '.note-button', function(){
        
        
        $('#selectnote-modal').modal('show');

        var noteselectedid = $(this).attr('id');
        var selectnote = '';
        

        $.ajax({
            type : 'POST',
            url  : '../includes/ajax/note.ajax.php',
            data : {noteselectedid : noteselectedid, selectnote : selectnote},
            dataType : 'json',
            success : function(data){
                $('#selectnote-subject').html(data.subject);
                $('#selectnote-date').html(data.dateadded);
                $('#selectnote-content').html(data.content);
                $('#selectnote-admin').html(data.admin_name);
                $('.patternid').attr('id', data.id);
            }
        });

    });

    $(document).on('click', '#addnote', function(){
        $('#addnotemodal').modal('show');
    });

    $('#submitnote').click(function(){

        var addnote = '';
        var patientid = $('#hiddennoteid').val();
        var mode = $('#note_mode').val();
        var subject = $('#subject_note').val();
        var label    = $('#label_note').val();
        var content = $('#content_note').val();
        var admin = $('#note_admin').val();

        var success = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> You have successfully added a Note to this patient.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;

        var answer = confirm ("Do you want to add this Note?");

        if(answer){
                $.ajax({
                type : 'POST',
                url  : '../includes/ajax/note.ajax.php',
                data : {subject : subject, label : label, content : content, admin : admin, addnote : addnote, mode : mode, patientid : patientid},
                success : function(data){
                    
                    if(data == 'emptyfields'){
                        $('#subject_note').addClass('errorClass');
                        $('#content_note').addClass('errorClass');
                    }
                    else if(data == '--- TYPE ---'){
                        $('#label_note').addClass('errorClass');
                    }
                    else{
                        $('#subject_note').removeClass('errorClass');
                        $('#content_note').removeClass('errorClass');
                        $('#label_note').removeClass('errorClass');
                        $('#notealert').html(success);
                    }
                }
                });
        }
    });

    $(document).on('click', '.selectnote-delete', function(){
        var deletenoteid = $('.patternid').attr('id');

        var answer = confirm ("Do you want to delete this Note?");

        if(answer){
            $.ajax({
                type : 'POST',
                url  : '../includes/ajax/note.ajax.php',
                data : {deletenoteid : deletenoteid},
                dataType : 'json',
                success : function(data){
                    
                    if(data == 'notedeleted'){
                        alert('A note has been deleted successfully!');
                        location.reload();
                    }
                }
            });
        }


    });

       

});