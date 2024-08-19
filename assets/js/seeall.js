
$(document).ready(function(){

  

    load_list();

    function load_list(loadlist = ''){

        $.ajax({
            type: 'POST',
            url : '../includes/ajax/seeall.ajax.php',
            data : {loadlist : loadlist},
            dataType : 'json',
            success: function(data){
                $('#notif-count').html(data.count);
                $('#notif-list').html(data.list);

                $('#notif-title').html(data.title);
                $('#notif-date').html(data.dateadded);
                $('#notif-body').html(data.content);

                $('.notif-delete').attr("id", data.deleteid);
            }
        });
    }

    $(document).on("click", '.list-select', function(){

        listId = $(this).attr("id");
        select = 'select';

        $.ajax({
            type: 'POST',
            url : '../includes/ajax/seeall.ajax.php',
            data : {listId : listId, select : select},
            dataType : 'json',
            success: function(data){
                $('#notif-title').html(data.title);
                $('#notif-date').html(data.date);
                $('#notif-body').html(data.content);

                $('.notif-delete').attr("id", data.deleteid);
                
                if($('.list-select').attr("id") !== data.deleteid){
                    $(this).removeClass('selected-bg');
                }
                
            }
        });
    });


    //DELETE
    $(document).on("click", '.notif-delete', function(){

        var deleteAction = $(this).attr("id");

        var answer = confirm('Do you want to delete this notification? ');

        if(answer){
            $.ajax({
                type: 'POST',
                url : '../includes/ajax/seeall.ajax.php',
                data : {deleteAction : deleteAction},
                dataType : 'json',
                success: function(data){
                    $('#notif-count').html(data.count);
                    $('#notif-list').html(data.list);
    
                    $('#notif-title').html(data.title);
                    $('#notif-date').html(data.dateadded);
                    $('#notif-body').html(data.content);
    
                    $('.notif-delete').attr("id", data.deleteid);
                }
            });
        }

        
    });

  

    //LIST CHECKER
    function emptyChecker(listChecker = ''){

        $.ajax({
            type: 'POST',
            url : '../includes/ajax/seeall.ajax.php',
            data : {listChecker : listChecker},
            dataType : 'json',
            success: function(data){
                $('#notif-list').html(data.list);
                $('#notif-list').addClass('bg-danger rounded text-white');
                $('#notif-body').empty();
                $('#notif-count').empty();
                $('#notif-title').empty();
                $('#notif-date').empty();
                $('.notif-delete').remove();
            }
        });

    }

    //SEARCH
    $('#search-field').keyup(function(){

        var searchField = $(this).val();

        if($(this).val() == 0){
            load_list();
        }else{

            $.ajax({
                type: 'POST',
                url : '../includes/ajax/seeall.ajax.php',
                data : {searchField : searchField},
                dataType : 'json',
                success: function(data){
                    $('#notif-count').html(data.count);
                    $('#notif-list').html(data.list);
                    $('#notif-title').html(data.title);
                    $('#notif-date').html(data.dateadded);
                    $('#notif-body').html(data.content);
    
                    $('.notif-delete').attr("id", data.deleteid);
                }
            });
        }

    });


   
    

});