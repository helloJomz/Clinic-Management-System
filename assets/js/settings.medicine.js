$(document).ready(function(){

    $('#closeSupplierMed').click(function(){
        location.reload();
    });

    //FETCH SUPPLIER TABLE
    $.ajax({
        type: 'POST',
        url: '../includes/ajax/fetchsupplier.ajax.php',
        success: function(data){
            $('#supplier_body').html(data);
        }
    });
    

    //SEARCH SUPPLIER FIELD
    $('#suppSearch').keyup(function(){
        
        var search = $(this).val();

        $.ajax({
            type: 'POST',
            url: '../includes/ajax/fetchsupplier.ajax.php',
            data: {search: search},
            success: function(data){
                $('#supplier_body').html(data);
            }
        });
        
    });


    $('#addsuppbtn').click(function(){

        var compname        = $('#compname').val();
        var compemail       = $('#compemail').val();
        var compaddress     = $('#compaddress').val();
        var compcontact     = $('#compcontact').val();
        var complandline    = $('#complandline').val();
        var addsuppbtn      = $(this).val();

        var emptySupp       = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Please fill all the necessary fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        var invalidCompEmail = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Invalid Email, please try again.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        
        var invalidCompPhone    = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Contact Number must be a number.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

        var invalidCompLandline    = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Landline Number must be a number.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`;

        var overCompPhone       = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Contact Number must be 11 digits.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        
        var successAddComp       = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> You have successfully added a Supplier.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

                        
        $("input[type='text']").removeClass('errorClass');
        $("label").removeClass('errorLabel');

        var answer = confirm('Do you want to add this Supplier?');

        if(answer){
            
            $.ajax({
                type: 'POST',
                url: '../includes/ajax/settings.medicine.ajax.php',
                data: {
                    compname    : compname,
                    compemail   : compemail,
                    compaddress : compaddress,
                    compcontact : compcontact,
                    complandline : complandline,
                    addsuppbtn   : addsuppbtn
                },
                success: function(data){
                    
                    if(data == 'emptyfields'){
                        $('#supplieralert').append(emptySupp);
                        $('label[for="compname"]').addClass('errorLabel');
                        $('#compname').addClass('errorClass');
                        $('label[for="compemail"]').addClass('errorLabel');
                        $('#compemail').addClass('errorClass');
                        $('label[for="compaddress"]').addClass('errorLabel');
                        $('#compaddress').addClass('errorClass');
                        $('label[for="compcontact"]').addClass('errorLabel');
                        $('#compcontact').addClass('errorClass');
                        $('label[for="complandline"]').addClass('errorLabel');
                        $('#complandline').addClass('errorClass');
                    }
                    else if(data == 'invalidemail'){
                        $('#supplieralert').append(invalidCompEmail);
                        $('label[for="compemail"]').addClass('errorLabel');
                        $('#compemail').addClass('errorClass');
                    }
                    else if(data == 'invalidphone'){
                        $('#supplieralert').append(invalidCompPhone);
                        $('label[for="compcontact"]').addClass('errorLabel');
                        $('#compcontact').addClass('errorClass');
                    }
                    else if(data == 'invalidlandline'){
                        $('#supplieralert').append(invalidCompLandline);
                        $('label[for="complandline"]').addClass('errorLabel');
                        $('#complandline').addClass('errorClass');
                    }
                    else if(data == 'lessphone'){
                        $('#supplieralert').append(overCompPhone);
                        $('label[for="compcontact"]').addClass('errorLabel');
                        $('#compcontact').addClass('errorClass');

                    }
                    else if(data == 'overphone'){
                        $('#supplieralert').append(overCompPhone);
                        $('label[for="compcontact"]').addClass('errorLabel');
                        $('#compcontact').addClass('errorClass');

                    }
                    else{
                        $('#supplieralert').append(successAddComp);
                        $('#compname').val('');
                        $('#compemail').val('');
                        $('#compaddress').val('');
                        $('#compcontact').val('');
                        $('#complandline').val('');
                    }


                }
            });
        }
    });

    $(document).on('click', '.btnDeleteSupp', function(){

        var deleteidsupp = $(this).attr("id");
        var answer = confirm('Do you want to delete this supplier?');

        if(answer){
            $.ajax({

                type: 'POST',
                url: '../includes/ajax/settings.medicine.ajax.php',
                data: {
                    deleteidsupp : deleteidsupp
                },
                success: function(data){ 
                    alert('A supplier has been deleted.');                      
                    location.reload();
                }

            });
        }
        

    });


    $(document).on('click', '.btnConfigureSupp', function(){
        
        var configidsupp = $(this).attr("id");
        $('.updateconfigsubmit').attr("id", configidsupp);

            $.ajax({

                type: 'POST',
                url: '../includes/ajax/settings.medicine.ajax.php',
                data: {
                    configidsupp : configidsupp
                },
                dataType : 'json',
                success: function(data){ 
                    $('#configcompname').val(data.supplier);
                    $('#configcompemail').val(data.email);
                    $('#configcompaddress').val(data.address);
                    $('#configcompcontact').val(data.phone);
                    $('#configcomplandline').val(data.landline);
                }

            });
    });


    $(document).on('click', '.updateconfigsubmit', function(){
        var updateidsupp = $(this).attr('id');

        var configcompname        = $('#configcompname').val();
        var configcompemail       = $('#configcompemail').val();
        var configcompaddress     = $('#configcompaddress').val();
        var configcompcontact     = $('#configcompcontact').val();
        var configcomplandline    = $('#configcomplandline').val();
        var configupdatesuppbtn   = $(this).val();

        var emptySupp       = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Please fill all the necessary fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        var invalidCompEmail = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Invalid Email, please try again.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        
        var invalidCompPhone    = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Contact Number must be a number.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

        var invalidCompLandline    = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Landline Number must be a number.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`;

        var overCompPhone       = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Contact Number must be 11 digits.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        
        var successAddComp       = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> You have successfully updated a Supplier.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

                        
        $("input[type='text']").removeClass('errorClass');
        $("label").removeClass('errorLabel');

        var answer = confirm('Do you want to save the changes?');

        if(answer){

            $.ajax({
                type: 'POST',
                url: '../includes/ajax/settings.medicine.ajax.php',
                data: {
                    configcompname    : configcompname,
                    configcompemail   : configcompemail,
                    configcompaddress : configcompaddress,
                    configcompcontact : configcompcontact,
                    configcomplandline : configcomplandline,
                    configupdatesuppbtn : configupdatesuppbtn,
                    updateidsupp : updateidsupp
                },
                success: function(data){
                    if(data == 'emptyfields'){
                        $('#updatesuppalert').append(emptySupp);
                        $('label[for="configcompname"]').addClass('errorLabel');
                        $('#configcompname').addClass('errorClass');
                        $('label[for="configcompemail"]').addClass('errorLabel');
                        $('#configcompemail').addClass('errorClass');
                        $('label[for="configcompaddress"]').addClass('errorLabel');
                        $('#configcompaddress').addClass('errorClass');
                        $('label[for="configcompcontact"]').addClass('errorLabel');
                        $('#configcompcontact').addClass('errorClass');
                        $('label[for="configcomplandline"]').addClass('errorLabel');
                        $('#configcomplandline').addClass('errorClass');
                    }
                    else if(data == 'invalidemail'){
                        $('#updatesuppalert').append(invalidCompEmail);
                        $('label[for="compemail"]').addClass('errorLabel');
                        $('#configcompemail').addClass('errorClass');
                    }
                    else if(data == 'invalidphone'){
                        $('#updatesuppalert').append(invalidCompPhone);
                        $('label[for="configcompcontact"]').addClass('errorLabel');
                        $('#configcompcontact').addClass('errorClass');
                    }
                    else if(data == 'invalidlandline'){
                        $('#updatesuppalert').append(invalidCompLandline);
                        $('label[for="configcomplandline"]').addClass('errorLabel');
                        $('#configcomplandline').addClass('errorClass');
                    }
                    else if(data == 'lessphone'){
                        $('#updatesuppalert').append(overCompPhone);
                        $('label[for="configcompcontact"]').addClass('errorLabel');
                        $('#configcompcontact').addClass('errorClass');

                    }
                    else if(data == 'overphone'){
                        $('#updatesuppalert').append(overCompPhone);
                        $('label[for="configcompcontact"]').addClass('errorLabel');
                        $('#configcompcontact').addClass('errorClass');

                    }
                    else{
                        $('#updatesuppalert').append(successAddComp);
                    }
                }
            });

        }
    });

    $('#closeSuppConfig').click(function(){
        location.reload();
    });

    $.ajax({
        type: 'POST',
        url: '../includes/ajax/fetchdisablemed.ajax.php',
        success: function(data){
            $('#disabledmed_body').html(data);
        }
    });


    $('#disabledmedsearch').keyup(function(){

        var searchdisablemed = $(this).val();

        $.ajax({
            type: 'POST',
                url: '../includes/ajax/fetchdisablemed.ajax.php',
                data: {
                    searchdisablemed : searchdisablemed
                },
                success: function(data){ 
                    $('#disabledmed_body').html(data);
                }
        });

    });


    $(document).on('click', '.activateMedicine', function(){
        var activateid = $(this).attr("id");

        var answer = confirm('Do you want to activate this medicine?');

        if(answer){
            $.ajax({
                type: 'POST',
                url: '../includes/ajax/settings.medicine.ajax.php',
                data : {activateid : activateid},
                success: function(data){
                    location.reload();
                }
            });
        }
        

    });

    load_stocks();
    function load_stocks(loadstock = ''){

        $.ajax({
            type: 'POST',
            url: '../includes/ajax/fetchmedstocks.ajax.php',
            data : {loadstock : loadstock},
            success: function(data){
                $('#stocksmed_body').html(data);
            }
        });

    }

    $('#stockmedsearch').keyup(function(){
        var searchstock = $(this).val();

        $.ajax({
            type: 'POST',
            url: '../includes/ajax/fetchmedstocks.ajax.php',
            data : {searchstock : searchstock},
            success: function(data){
                $('#stocksmed_body').html(data);
            }
        });

    });

    $(document).on('click', '.deleteMedStock', function(){
        var deletestockid = $(this).attr("id");

        var answer = confirm('Do you want to delete this stock?');

        if(answer){
            $.ajax({
                type: 'POST',
                url: '../includes/ajax/settings.medicine.ajax.php',
                data : {deletestockid : deletestockid},
                success: function(data){
                    load_stocks();
                }
            });
        }
    });

    $(document).on('click', '.editSettingsMedStock', function(){
        var medsettingstockupdateid = $(this).attr("id");
        var showupdatevals = 'show';
                    
        $.ajax({
            type: 'POST',
            url: '../includes/ajax/settings.medicine.ajax.php',
            data : {medsettingstockupdateid : medsettingstockupdateid, showupdatevals : showupdatevals},
            dataType : 'json',
            success: function(data){
                $('#updatestockquantity').val(data.quantity);
                $('#updatestockbarcode').val(data.barcode);
                $('#updatestocksupplier').val(data.supplier);
                $('#hiddenidforupdate').val(data.id);
            }
        });
        
    });

    $(document).on('click', '.updatemedstocksubmit', function(){

        var finalmedstockid         = $('#hiddenidforupdate').val();
        var updatequantity          = $('#updatestockquantity').val();
        var updatebarcode           = $('#updatestockbarcode').val();
        var updatesupplier          = $('#updatestocksupplier').val();
        var finalStepUpdateStock    = 'yes';

        var successAddComp       = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> You have successfully updated a Stock.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>`;
        var emptySupp           = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Please fill all the necessary fields.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`;

        var invalidCompPhone    = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Quantity must be a number.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        
        

        $.ajax({
            type: 'POST',
            url: '../includes/ajax/settings.medicine.ajax.php',
            data : {updatequantity : updatequantity, updatebarcode : updatebarcode, 
                updatesupplier : updatesupplier, finalStepUpdateStock : finalStepUpdateStock,
                finalmedstockid : finalmedstockid},
            dataType : 'json',
            success: function(data){
                if(data == 'emptyfields'){
                    $('#updatestockalert').append(emptySupp);
                    $('#updatestockquantity').addClass('errorClass');
                    $('#updatestockbarcode').addClass('errorClass');
                    $('#updatestocksupplier').addClass('errorClass');

                    $('label[for="updatestockquantity"]').addClass('errorLabel');
                    $('label[for="updatestockbarcode"]').addClass('errorLabel');
                    $('label[for="updatestocksupplier"]').addClass('errorLabel');

                    $('input[type="text"]').removeClass('errorClass');
                    $('label').removeClass('errorLabel');
                    
                }
                else if(data == 'invalidquantity'){
                    $('#updatestockalert').append(invalidCompPhone);
                    $('#updatestockquantity').addClass('errorClass');
                    $('label[for="updatestockquantity"]').addClass('errorLabel');

                    $('input[type="text"]').removeClass('errorClass');
                    $('label').removeClass('errorLabel');
                }
                else{
                    $('#updatestockalert').append(successAddComp);

                    $('input[type="text"]').removeClass('errorClass');
                    $('label').removeClass('errorLabel');
                }
            
            }
        });

    });

    $('#closeUpdateStock').click(function(){
        location.reload();
    });

});