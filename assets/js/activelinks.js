$(document).ready(function(){

    $('.dashboard').addClass('active');

    $('.dashboard').click(function(){
        
    });
    
    //GROUP 1
    $('#activeStudent').click(function(){
        $('.dashboard').removeClass('active');
        $('.dashboard').addClass('not-active');
    });
    
    $('#activeFaculty').click(function(){
        $('.dashboard').removeClass('active');
        $('.dashboard').addClass('not-active');
    });
    
    $('#activeItechPersonnel').click(function(){
        $('.dashboard').removeClass('active');
        $('.dashboard').addClass('not-active');
    });
    ////////////////////////////////////////////////
    
    //GROUP 2
    $('#activeRequest').click(function(){
    
    
    });
    
    $('#activeInventory').click(function(){
    
    
    });
    
    $('#activeSettings').click(function(){
    
    
    });
    ////////////////////////////////////////////////
    
    $('#queueActive').click(function(){
        $('.dashboard').removeClass('active');
        $('.dashboard').addClass('not-active');
    });

});

