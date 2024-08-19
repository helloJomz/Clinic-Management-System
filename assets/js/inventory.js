$(document).ready(function(){

    load_table();

    function load_table(){
        $.ajax({
            type: 'POST',
            url: '../includes/ajax/fetchinventory.ajax.php',
            success: function(data){
                $("#med_body").html(data);
            }
        });
    }

    $("#closeModalMed").click(function(){
        location.reload();
    });

    $('#medSearch').keyup(function(){
        var search = $(this).val();

        $.ajax({
            type: 'POST',
            url: '../includes/ajax/inventory.ajax.php',
            data: {
                search : search
            },
            success: function(data){
                $("#med_body").html(data);
            }
        });
    });

    $('#addmedsubmit').click(function(){

        var medname = $("#medname").val();
        var medtype = $("#medtype").val();
        var meddesc = $("#meddesc").val();
        var medbox =  $('#medbox').val();
        var addmedbtn = $(this).val();

        var emptyFields = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Please fill all the necessary fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        var invalidType = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Please choose a type of medicine.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        var successAlert = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> You have succesfully added a medicine.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        var invalidBox   = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Per Box Pcs must be a number, please try again.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

        var answer = confirm ("Do you want to add this Medicine?");

        if(answer){

            $.ajax({
                type: 'POST',
                url: '../includes/ajax/inventory.ajax.php',
                data: {
                    medname: medname,
                    medtype: medtype,
                    meddesc: meddesc,
                    addmedbtn: addmedbtn,
                    medbox  : medbox
                },
                dataType : 'json',
                success: function(data){

                    if(data == 'emptyfields'){
                        $('#medalert').append(emptyFields);
                        $('#medname').addClass('errorClass');
                        $("#medtype").addClass('errorClass');
                        $("#medbox").addClass('errorClass');
                        $('label[for="medtype"]').addClass('errorLabel');
                        $('label[for="medname"]').addClass('errorLabel');
                        $('label[for="medbox"]').addClass('errorLabel');
                    }
                    else if (data == 'invalidtype'){
                        $('#medalert').append(invalidType);
                        $('label[for="medtype"]').addClass('errorLabel');
                        $("#medtype").addClass('errorClass');
                        $("#medtype").addClass('errorLabel');
                    }
                    else if (data == 'invalidbox'){
                        $('#medalert').append(invalidBox);
                        $('label[for="medbox"]').addClass('errorLabel');
                        $("#medbox").addClass('errorClass');
                    }
                    else{
                        $('#medalert').append(successAlert);
                        $("#medname").val('');
                        $("#medtype").val('--TYPE--');
                        $("#meddesc").val('');
                    }

                }
            });
        }
    });

    $('#closeConfigMed').click(function(){
        location.reload();
    });

    ////////////////////ACTIONS///////////////////////////

    $(document).on("click", ".btnDisable", function(){
        
        var btndisable   = $(this).val();
        var disableID    = $(this).attr("id");

        var answer = confirm ("Do you want to disable this medicine?");
        if(answer){
            $.ajax({
                type: 'POST',
                url: '../includes/ajax/inventory.ajax.php',
                data: {
                    btndisable : btndisable,
                    disableID  : disableID
                },
                dataType : 'json',
                success: function(data){
                    location.reload();
                }
            });
        }
    });

    //////////////////// SHOWS DATA TO CONFIGURE AND SET VALUE TO SUBMIT /////////////////////
    $(document).on("click", ".btnConfigure", function(){
        
        var showConfigureVals    = $(this).attr("id");
        
        $.ajax({
            type: 'POST',
            url: '../includes/ajax/inventory.ajax.php',
            data: {
                showConfigureVals : showConfigureVals
            },
            dataType : 'json',
            success: function(data){
                $('#editmedname').val(data.medicine);
                $('#editmedtype').val(data.type);
                $('#editmeddesc').val(data.description);
                $('#editmedmax').val(data.max_quantity);
                $('#editmedbox').val(data.per_box);
            }
        });

        $('.configsubmit').attr("id", showConfigureVals);

    });

    /////////////////// UPDATE CONFIG ///////////////////////
    $('.configsubmit').click(function(){
            
        var configID    = $(this).attr("id");
        var configbtn   = $(this).val();

        var editmedname = $('#editmedname').val();
        var editmedtype = $('#editmedtype').val();
        var editmeddesc = $('#editmeddesc').val();
        var editmedmax  = $('#editmedmax').val();
        var editmedbox  = $('#editmedbox').val();

        var emptyConfig   = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Please fill all the necessary fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        var invalidMedMax = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Quantity must be a number, please try again.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        var configSuccess = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> You have successfully updated this Medicine.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        var invalidBox   = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Per Box Pcs must be a number, please try again.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;        

        $("input").removeClass('errorClass');
        $("label").removeClass('errorLabel');

        var answer = confirm ("Do you want to save all the changes?");
        if(answer){
            $.ajax({
                type: 'POST',
                url: '../includes/ajax/inventory.ajax.php',
                data: {
                    configID : configID,
                    configbtn : configbtn,
                    editmedname : editmedname,
                    editmedtype : editmedtype,
                    editmeddesc : editmeddesc,
                    editmedmax : editmedmax,
                    editmedbox : editmedbox
                },
                dataType : 'json',
                success: function(data){
    
                    if(data == 'emptyfields'){
                        $('#configalert').append(emptyConfig);
                        $('#editmedname').addClass('errorClass');
                        $('label[for="editmedname"]').addClass('errorLabel');
                        $('#editmedmax').addClass('errorClass');
                        $('label[for="editmedmax"]').addClass('errorLabel');
    
    
                    }
                    else if (data == 'numbermedmax'){
                        $('#configalert').append(invalidMedMax);
                        $('#editmedmax').addClass('errorClass');
                        $('label[for="editmedmax"]').addClass('errorLabel');
    
                    }
                    else if(data == 'invalidbox'){
                        $('#configalert').append(invalidBox);
                        $('#editmedbox').addClass('errorClass');
                        $('label[for="editmedbox"]').addClass('errorLabel');
                    }
                    else{
                        $('#configalert').append(configSuccess);
                        $('#editmedname').val(data.medicine);
                        $('#editmedtype').val(data.type);
                        $('#editmeddesc').val(data.description);
                        $('#editmedmax').val(data.max_quantity);
    
                        $("input").removeClass('errorClass');
                        $("label").removeClass('errorLabel');
                    }
    
                }
            });
        } 
    });

    ///////////// SHOWS DATA FOR RESTOCK AND SET VALUE TO SUBMIT //////////////////////

    $(document).on("click", '.btnRestock', function(){
        var showRestockVals = $(this).attr("id");
        
        $.ajax({
                type: 'POST',
                url: '../includes/ajax/inventory.ajax.php',
                data: {
                    showRestockVals : showRestockVals
                },
                dataType : 'json',
                success: function(data){
                    $('#restockname').text(data.medicine);
                    $('#restocktype').text(data.type);
                }
        });

        $('.restocksubmit').attr("id", showRestockVals);
    });

    $(document).on("click", '.restocksubmit', function(){
        var restocksubmitID = $(this).attr("id");
        var restockbtn      = $(this).val();
        var restockquantity = $('#restockquantity').val();
        var supplier        = $('#restocksupp').val();
        var restockpdate    = $('#restockpdate').val();
        var restockedate    = $('#restockedate').val();
        var restockbarcode  = $('#restockbarcode').val();
        var restockgencode  = $('#restockuniqcode').val();
        
        var emptyRestock   = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Please fill all the necessary fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        var invalidQuantity = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Quantity must be a number, please try again.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
        var configSuccess = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> You have successfully added a stock to this medicine.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

        $("input").removeClass('errorClass');
        $("label").removeClass('errorLabel');

        $.ajax({
            type: 'POST',
            url: '../includes/ajax/inventory.ajax.php',
            data: {
                restocksubmitID : restocksubmitID,
                restockquantity : restockquantity,
                supplier        : supplier,
                restockpdate    : restockpdate,
                restockedate    : restockedate,
                restockbtn      : restockbtn,
                restockbarcode  : restockbarcode,
                restockgencode  : restockgencode
            },
            dataType : 'json',
            success: function(data){
               if(data == 'emptyfields'){
                   $('#restockalert').append(emptyRestock);
                   $('#restockquantity').addClass('errorClass');
                   $('#restockpdate').addClass('errorClass');
                   $('#restockedate').addClass('errorClass');
                   $('#restockbarcode').addClass('errorClass');

                   $('label[for="restockquantity"]').addClass('errorLabel');
                   $('label[for="restockpdate"]').addClass('errorLabel');
                   $('label[for="restockedate"]').addClass('errorLabel');
                   $('label[for="restockbarcode"]').addClass('errorLabel');
               }
               else if(data == 'invalidquantity'){
                    $('#restockalert').append(invalidQuantity);
                    $('label[for="restockquantity"]').addClass('errorLabel');
                    $('#restockquantity').addClass('errorClass');
               }
               else{
                    $('#restockalert').append(configSuccess);
                    $("input").removeClass('errorClass');
                    $("label").removeClass('errorLabel');
                    $('#restockquantity').val('');
                    $('#restockpdate').val('');
                    $('#restockedate').val('');
               }

            }
        });

    });
    

    /////////////// TABLE CELLS ////////////////////
    $(document).on("click", ".clickable", function(){
        var medid = $(this).attr("id");

        $('#medProfile').modal('show');

        $.ajax({
            type: 'POST',
            url: '../includes/ajax/inventory.ajax.php',
            data: {medid : medid},
            success: function(data){
                $('#profile_body').html(data);
            }
        });

    });


    
  
    
});