
$(document).ready(function(){

    load_admin();
    
    function load_admin(load = ''){

        $.ajax({
            type : 'POST',
            url  : '../includes/ajax/admin.ajax.php',
            data : {load : load},
            success : function(data){
                $('#admin-body').html(data);
            }
        });

    }

    $(document).on('click', '.deleteAdmin', function(){

        var deleteid = $(this).attr("id");

        var answer = confirm('Do you really want to delete this admin?');

        if(answer){
            $.ajax({
                type : 'POST',
                url  : '../includes/ajax/admin.ajax.php',
                data : {deleteid : deleteid},
                success : function(data){
                    load_admin();
                }
            });
        }
        
    });

});