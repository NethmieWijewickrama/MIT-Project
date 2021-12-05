var confirmed = false;


$("#btn_submit").on("click", function (e) {
    e.preventDefault();
    if (validate()) {
        Swal.fire({
            title: 'Are you sure?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Submit it!'
        }).then((result) => {
            if (result.value) {
                $("#satMaster_data").submit();
            }
        })
    }
});


window.setInterval(() => {

    if ($('#dataType').val() != "" && $('#dataType').val() != null) {        
        $('#dataType').removeClass("is-invalid");
        $('#dataType_span').html('<span></span>');
    }

    if ($('#description').val() != "" && $('#description').val() != null) {        
        $('#description').removeClass("is-invalid");
        $('#description_span').html('<span></span>');
    }

    if ($('#currency').val() != "" && $('#currency').val() != null) {        
        $('#currency').removeClass("is-invalid");
        $('#currency_span').html('<span></span>');
    }

    if ($('#unitPrice').val() != "" && $('#unitPrice').val() != null) {        
        $('#unitPrice').removeClass("is-invalid");
        $('#unitPrice_span').html('<span></span>');
    }
  

}, 500);


function validate() {

    var error;

    if ($('#dataType').val() == "" || $('#dataType').val() == null) {        
        $('#dataType').addClass("is-invalid");
        $('#dataType_span').html('<span>Data Type is required</span>');
        
        error = true;
    }

    if ($('#description').val() == "" || $('#description').val() == null) {        
        $('#description').addClass("is-invalid");
        $('#description_span').html('<span>Description of the Data Type is required</span>');
        
        error = true;
    }

    if ($('#currency').val() == "" || $('#currency').val() == null) {        
        $('#currency').addClass("is-invalid");
        $('#currency_span').html('<span>Select Currency</span>');
        
        error = true;
    }

    if ($('#unitPrice').val() == "" || $('#unitPrice').val() == null) {        
        $('#unitPrice').addClass("is-invalid");
        $('#unitPrice_span').html('<span>Unit Price is required</span>');
        
        error = true;
    }
    
    return !error;

}

$('#satMaster_data').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});
