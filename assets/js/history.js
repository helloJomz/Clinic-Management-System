
    $(document).ready(function(){

        load_settings();
        function load_settings(autoDefault = 'settings_log'){

            $.ajax({
                type : 'POST',
                url  : '../includes/ajax/fetchhistory.ajax.php',
                data : {autoDefault : autoDefault},
                dataType : 'json',
                success : function(data){
                    $('#history-body').html(data.output);
                    $('#search-div').html(data.searchBox);
                }
            });
        }
        
        
        function load_medicine(autoDefault = 'medicine_log'){

            $.ajax({
                type : 'POST',
                url  : '../includes/ajax/fetchhistory.ajax.php',
                data : {autoDefault : autoDefault},
                success : function(data){
                    $('#history-body').html(data);
                }
            });
        }

        function load_queue(autoDefault = 'queue_log'){

            $.ajax({
                type : 'POST',
                url  : '../includes/ajax/fetchhistory.ajax.php',
                data : {autoDefault : autoDefault},
                success : function(data){
                    $('#history-body').html(data);
                }
            });
        }

        $('#btnSettings').click(function(){

            $('.nav1 .div1').addClass('history-active');
            $('.nav3 .div3').removeClass('history-active');
            $('.nav2 .div2').removeClass('history-active');

            $('#settings_identifier').removeClass('searchQueue');
            $('#settings_identifier').removeClass('searchMedicine');
            $('#settings_identifier').addClass('searchSettings');
            
            load_settings();

        });

        $('#btnMedicine').click(function(){

            $('.nav1 .div1').removeClass('history-active');
            $('.nav3 .div3').removeClass('history-active');
            $('.nav2 .div2').addClass('history-active');

            $('#settings_identifier').removeClass('searchQueue');
            $('#settings_identifier').removeClass('searchSettings');
            $('#settings_identifier').addClass('searchMedicine');
            
            load_medicine();
        });

        $('#btnQueue').click(function(){

            $('.nav1 .div1').removeClass('history-active');
            $('.nav3 .div3').addClass('history-active');
            $('.nav2 .div2').removeClass('history-active');

            $('#settings_identifier').removeClass('searchSettings');
            $('#settings_identifier').removeClass('searchMedicine');
            $('#settings_identifier').addClass('searchQueue');

            load_queue();
        });


        $(document).on('keyup', '.searchSettings', function(){
            
            var searchSettingsVal = $(this).val();
            var searchSettings = $(this).attr("id");

            $.ajax({
                type : 'POST',
                url  : '../includes/ajax/fetchhistory.ajax.php',
                data : {searchSettingsVal : searchSettingsVal, searchSettings : searchSettings},
                success : function(data){
                    $('#history-body').html(data);
                }
            });

        });

        $(document).on('keyup', '.searchMedicine', function(){
            
            var searchMedVal = $(this).val();
            var searchMedicine = $(this).attr("id");

            $.ajax({
                type : 'POST',
                url  : '../includes/ajax/fetchhistory.ajax.php',
                data : {searchMedVal : searchMedVal, searchMedicine : searchMedicine},
                success : function(data){
                    $('#history-body').html(data);
                }
            });

        });

        $(document).on('keyup', '.searchQueue', function(){
            
            var searchQueueVal = $(this).val();
            var searchQueue = $(this).attr("id");

            $.ajax({
                type : 'POST',
                url  : '../includes/ajax/fetchhistory.ajax.php',
                data : {searchQueueVal : searchQueueVal, searchQueue : searchQueue},
                success : function(data){
                    $('#history-body').html(data);
                }
            });

        });

       

    });
