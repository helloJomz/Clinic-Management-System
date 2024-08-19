

function loadfile(event){
var output=document.getElementById('editimg');
output.src=URL.createObjectURL(event.target.files[0]);
}

$(document).ready(function(){

   $("#changepicture").click(function(){
        
        var fd = new FormData();
        var files = $('#image-change')[0].files;
        var id = $("#hiddenid").val();
        var gender = $("#hiddengender").val();
        
        // Check file selected or not
       
           fd.append('file',files[0]);
           fd.append('patientid',id);
           fd.append('hiddengender',gender);

           $.ajax({
              url: '../includes/editpatient.inc.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                    $("#editimg").attr("src",response); 
                    $("#mainimg").attr("src",response); 
                 }else{
                    alert('file not uploaded');
                 }
              },
           });
        
    });

});


