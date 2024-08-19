
$(document).ready(function(){


    // $('#search-bar').change(function(){
        
    //     var search = $("#search-bar").val();

    //     $(this).css({
    //         'box-shadow' : '0 0 5pt 2pt #D3D3D3',
    //         'outline-width' : '0px',
    //         'border-radius' : '16px 16px 0px 0px'
    //     });
        

    //       $.ajax({
    //             type : 'POST',
    //             url : '../includes/ajax/request.ajax.php',
    //             data : {search : search},
    //             dataType : 'json',
    //             success : function(data){
    //                if($('#search-bar').val() == ''){
    //                     $('.complete-search ul').removeClass("show-ul");
    //                     $("#search-bar").css({
    //                         'box-shadow' : '',
    //                         'outline-width' : '',
    //                         'border-radius' : ''
    //                     });
    //                }else{
    //                     $('.complete-search ul').addClass("show-ul");
    //                     $('#result-search').html(data);
    //                }
    //             }

    //       });
    // });

    load_select();

    function load_select(load_select = ''){

        $.ajax({
            type : 'POST',
            url : '../includes/ajax/request.ajax.php',
            data : {load_select : load_select},
            dataType : 'json',
            success : function(data){
                $('#select-items').html(data);
            }
        });

    }
    
    
    $(document).on('change', '#select-items', function(){
        var medid = $(this).val();

        $.ajax({
            type : 'POST',
            url : '../includes/ajax/request.ajax.php',
            data : {medid : medid},
            dataType : 'json',
            success : function(data){
                
                $('#stocks-result').html(data.output);
                $('.med-name').html(data.medname);
                $('#max-quantity').html(data.maxquantity);

                $('.complete-search ul').removeClass("show-ul");
                $('#search-bar').val(null);
                $("#search-bar").css({
                            'box-shadow' : '',
                            'outline-width' : '',
                            'border-radius' : ''
                        });
            }

        });

    });

    $(document).on('change', '.select-box', function(){

            $('.select-box').prop('checked', false);
            $(this).prop('checked', true);
    });

    $(document).on('click', '#request-submit', function(){
        
        var checkedValue = $('.select-box:checked').attr("id");
        var submitBtn = $(this).val();
        var quantity = $('#med-quantity').val();
        var tbody = `   <tr>
                            <td colspan="5" class="p-3">No stocks found! Please search first.</td>
                        </tr>`;
        var emptyfields = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Please fill all the necessary fields.
                        <button type="button" id="alertClose" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;

        var invalidType = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Quantity must be a number, please try again.
                        <button type="button" class="btn-close"  id="alertClose" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
        var invalidMax = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> You entered a quantity over the maximum quantity required for this medicine.
                        <button type="button" class="btn-close"  id="alertClose" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
        
        var alertSuccess = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> You have successfully requested a medicine.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;

        var answer = confirm('Do you want to request this medicine?');

        if(answer){
            $.ajax({
                type : 'POST',
                url : '../includes/ajax/request.ajax.php',
                data : {checkedValue : checkedValue,
                        submitBtn    : submitBtn,
                        quantity     : quantity
                },
                success : function(data){
                    
                    if(data == 'emptyfields'){
                      $('#erroralert').html(emptyfields);
                      $('.table').addClass('errorClass');
                      $('#med-quantity').addClass('errorClass');
    
                      $('label[for="med-quantity"]').addClass('errorLabel');
    
                    }
                    else if(data == 'invalidquantity'){
                        $('#erroralert').html(invalidType);
                        $('#med-quantity').addClass('errorClass');
                        $('label[for="med-quantity"]').addClass('errorLabel');
                    }
                    else if(data == 'max'){
                        $('#erroralert').html(invalidMax);
                        $('#med-quantity').addClass('errorClass');
                        $('label[for="med-quantity"]').addClass('errorLabel');
                    }
                    else{
                        $('#erroralert').html(alertSuccess);
                        $('.med-name').empty();
                        $('#stocks-result').empty();
                        $('#stocks-result').html(tbody);
                        $('#med-quantity').val(null);
    
                    }
                  
                }
            });
        }

        
    });


   $(document).on('click', '#alertClose', function(){
        $('.table').removeClass('errorClass');
        $('#med-quantity').removeClass('errorClass');
        $('label[for="med-quantity"]').removeClass('errorLabel');
   });

   $(document).on('click', '#clear-all', function(){
        var tbody = `   <tr>
                            <td colspan="5" class="p-3">No stocks found! Please search first.</td>
                        </tr>`;
        $('.med-name').empty();
        $('#stocks-result').empty();
        $('#stocks-result').html(tbody);
        $('#max-quantity').empty();
        load_select();

   });

   $(document).on('click', '.view-profile', function(){
        
        var patientid = $('#patientid').val();
        var patientmode = $('#patientmode').val();
        var viewConfirmProfile = 'yes';

            $.ajax({
                type : 'POST',
                url  : '../includes/ajax/viewconfirmprofile.ajax.php',
                data : {patientid : patientid, patientmode : patientmode, viewConfirmProfile : viewConfirmProfile},
                success : function(data){
                    $('#viewConfirmProfileBody').html(data);
                }
            });   
   });

   $(document).on('click', '.cancelForm', function(){

        var cancelForm = $(this).val();
        
        $.ajax({
            type : 'POST',
            url  : '../includes/ajax/request.ajax.php',
            data : {cancelForm : cancelForm},
            success : function(data){
                window.location.href = 'request.search.php';
            }
        });

   });



});


