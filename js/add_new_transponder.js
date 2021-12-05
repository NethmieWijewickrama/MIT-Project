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
                $("#tranponder_data").submit();
            }
        })
    }
});


window.setInterval(() => {

    if ($('#ISN').val() != "" && $('#ISN').val() != null) {        
        $('#ISN').removeClass("is-invalid");
        $('#ISN_span').html('<span></span>');
    }

    if ($('#antennaNo').val() != "" && $('#antennaNo').val() != null) {        
        $('#antennaNo').removeClass("is-invalid");
        $('#antennaNo_span').html('<span></span>');
    }

    if ($('#IMN').val() != "" && $('#IMN').val() != null) {        
        $('#IMN').removeClass("is-invalid");
        $('#IMN_span').html('<span></span>');
    }

    if ($('#VMS').val() != "" && $('#VMS').val() != null) {        
        $('#VMS').removeClass("is-invalid");
        $('#VMS_span').html('<span></span>');
    }

    if ($('#registrationDate').val() != "" && $('#registrationDate').val() != null) {        
        $('#registrationDate').removeClass("is-invalid");
        $('#registrationDate_span').html('<span></span>');
    }

}, 500);


function validate() {

    var error;

    if ($('#ISN').val() == "" || $('#ISN').val() == null) {        
        $('#ISN').addClass("is-invalid");
        $('#ISN_span').html('<span>ISN-No is required</span>');
        
        error = true;
    }

    if ($('#antennaNo').val() == "" || $('#antennaNo').val() == null) {        
        $('#antennaNo').addClass("is-invalid");
        $('#antennaNo_span').html('<span>Antenna No is required</span>');
        
        error = true;
    }

    if ($('#IMN').val() == "" || $('#IMN').val() == null) {        
        $('#IMN').addClass("is-invalid");
        $('#IMN_span').html('<span>IMN is required</span>');
        
        error = true;
    }

    if ($('#VMS').val() == "" || $('#VMS').val() == null) {        
        $('#VMS').addClass("is-invalid");
        $('#VMS_span').html('<span>VMS No is required</span>');
        
        error = true;
    }

    if ($('#registrationDate').val() == "" || $('#registrationDate').val() == null) {        
        $('#registrationDate').addClass("is-invalid");
        $('#registrationDate_span').html('<span>ISN-No (4TTxxxxxxxxx) is required</span>');
        
        error = true;
    }
    return !error;

}

$('#tranponder_data').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});
