$(document).ready(function(){

    setInterval(function(){
         load_notes();
    }, 1000);

     load_notes();

     function load_notes(loadnote = ''){
         
         $.ajax({    
             type : 'POST',
             url  : '../includes/patient_control/notes.ajax.php',
             data : {loadnote : loadnote},
             success : function(data){
                 $('#note-list').html(data);
             }

         });
     }


     $(document).on("click", ".note-item", function(){
         var selectid = $(this).attr("id");

         $.ajax({    
             type : 'POST',
             url  : '../includes/patient_control/notes.ajax.php',
             data : {selectid : selectid},
             dataType : 'json',
             success : function(data){
                 window.location.href="patient_noteview.php";
             }

         });

     });



    

 });