$(document).ready(function(){

    $(document).on('click', '#search-report', function(){
        
        var searchReport = '';

        var month = $('#month').val();
        var year = $('#year').val();
        var day = $('#day').val();
        var type = $('#type').val();

        $('#alert-container').empty();

        var alert = ``;

        $.ajax({
            type : 'POST',
            url  : '../includes/ajax/generatereport.ajax.php',
            data : {searchReport : searchReport, month : month, year : year, day : day, type : type},
            dataType : 'json',
            success : function(data){
                $('#alert-container').html(data.alert);
                
               
            }
        });

    });

    $(document).on('click', '#cancel-report', function(){

        $('#alert-container').empty();

        var spanAgain = `
            <button class="btn bg-success text-white" id="search-report"><i class="fas fa-search me-2"></i>Search Report</button>

            <div class="alert alert-primary fst-italic mt-3" role="alert">
                Please choose the correct date and click the Search button to start Generating your Report.
            </div>
        `;

        $('#alert-container').html(spanAgain);
    });

    // $(document).on('click', '#generate-report', function(){

    //     var month = $('#month').val();
    //     var year = $('#year').val();
    //     var day = $('#day').val();
    //     var type = $('#type').val();
    //     // var admin = $('#sessionadmin').val();
    //     var dailyReport = '';
        
    //     $.ajax({
    //         type : 'POST',
    //         url  : '../includes/ajax/pdf.ajax.php',
    //         data : {dailyReport : dailyReport, month : month, year : year, day : day, type : type},
    //         success : function(data){
    //         }
    //     });

    // });

    //////////////////////////////

    $(document).on('click', '#search-monthly-report', function(){

        var searchMonthlyReport = '';

        var month = $('#monthly_month').val();
        var year = $('#monthly_year').val();
        var type = $('#monthly_type').val();

        $('#alert-monthly-container').empty();

        var alert = ``;

        $.ajax({
            type : 'POST',
            url  : '../includes/ajax/monthlyreport.ajax.php',
            data : {searchMonthlyReport : searchMonthlyReport, month : month, year : year, type : type},
            dataType : 'json',
            success : function(data){
                $('#alert-monthly-container').html(data.alert);
    
            }
        });


    });

    $(document).on('click', '#cancel-monthly-report', function(){

        $('#alert-monthly-container').empty();

        var spanAgain = `
            <button class="btn bg-success text-white" id="search-monthly-report"><i class="fas fa-search me-2"></i>Search Report</button>

            <div class="alert alert-primary fst-italic mt-3" role="alert">
                Please choose the correct date and click the Search button to start Generating your Report.
            </div>
        `;

        $('#alert-monthly-container').html(spanAgain);
    });

    
    
});