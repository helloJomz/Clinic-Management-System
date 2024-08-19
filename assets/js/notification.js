$(document).ready(function(){
        
        function callEveryHour(){
            setInterval(load_stocks(), 1000 * 60 * 60);
        }

        var nextDate = new Date();
        if (nextDate.getMinutes() === 0) { // You can check for seconds here too
            callEveryHour()
        } else {
            nextDate.setHours(nextDate.getHours() + 1);
            nextDate.setMinutes(0);
            nextDate.setSeconds(0);// I wouldn't do milliseconds too ;)

            var difference = nextDate - new Date();
            setTimeout(callEveryHour, difference);
        }

        //INTERVAL
        setInterval(function(){
            load_expired();
        }, 2000);

        // FOR EXPIRED
        function load_expired(expiredNotif = ''){
            
            $.ajax({
                type: 'POST',
                url: '../includes/ajax/notification.ajax.php',
                data: {expiredNotif : expiredNotif},
                dataType: 'json',
                success: function(data){
                    load_unseen();
                }
            });
        }

        // FOR STOCKS
        function load_stocks(noStocks = ''){

            $.ajax({    
                type: 'POST',
                url: '../includes/ajax/notification.ajax.php',
                data: {noStocks : noStocks},
                dataType: 'json',
                success: function(data){
                    load_unseen();
                }
            });
        }
        
        // setInterval(function(){
        //     load_stocks();
        // }, 10800);

        //LOAD NOTIF AND COUNT
        load_unseen();

       //INTERVAL
        setInterval(function(){
            load_unseen();
        }, 2000);

        function load_unseen(view = ''){
        var tempid = $('.notif-li').attr('id');

            $.ajax({
                type: 'POST',
                url: '../includes/ajax/notification.ajax.php',
                data: {view:view, tempid: tempid},
                dataType: 'json',
                success: function(data){
                    $('.notifbody').html(data.notification);

                    if(data.unseen_notification > 0){
                        $('.notifcount').html(data.unseen_notification);
                        $('.bellNotif').addClass('text-danger');
                    }
                    
                }

            });
        }

        //REMOVES COUNT NOTIF EVERY CLICK
        $(document).on("click", ".notif-btn", function(){
            var notifid    = $(this).attr("id");

            $('#notification-read').modal('show');

            $('.notif__delete').attr("id", notifid);
        
            $.ajax({
                type: 'POST',
                url: '../includes/ajax/notification.ajax.php',
                data: {notifid:notifid},
                dataType: 'json',
                success: function(data){

                    $('#notif__title').html(data.subject);
                    $('#notif__date').html(data.date);
                    $('#notif__content').html(data.content);
                    
                    if(data.unseen_notification == 0 ){
                        $('.notifcount').html('');
                        $('.bellNotif').removeClass('text-danger');
                    }
                }
            });
        });

        //INTERVAL
        setInterval(function(){
            emptystocks();
        }, 2000);
      
        function emptystocks(emptyNotif = ''){

            $.ajax({
                type: 'POST',
                url: '../includes/ajax/notification.ajax.php',
                data: {emptyNotif : emptyNotif},
                dataType: 'json',
                success: function(data){
                    load_unseen();
                }
            });
        }

        //DELETE NOTIF FROM PREVIEW

        $('.notif__delete').click(function(){
            var notifdeleteid = $(this).attr("id");

            var answer = confirm('Do you really want to delete this Notification? ');

            if(answer){
                $('#notification-read').modal('hide');

                $.ajax({
                    type: 'POST',
                    url: '../includes/ajax/notification.ajax.php',
                    data: {notifdeleteid : notifdeleteid},
                    dataType: 'json',
                    success: function(data){
                        load_unseen();
                       
                    }
                });
            }
           

        });
        
        

        

    

    });