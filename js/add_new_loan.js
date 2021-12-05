$("#btn_update").on("click", function (e) {
    e.preventDefault();

    if (validate()) {
        Swal.fire({
            title: 'Are you sure?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
            if (result.value) {
                $("#group_data").submit();
            }
        })
    }
});


window.setInterval(() => {
    if ($('#group_id').val() != "" && $('#group_id').val() != null) {

        // $('#client_name').attr('style', "");
        $('#group_id').removeClass("parsley-error");
        $('#group_id_span').html('<span></span>');
    }
    if ($('#client_id').val() != "" && $('#client_id').val() != null ) {
        $('#client_id').removeClass("parsley-error");
        $('#client_id_span').html('<span></span>');
    }
    if ($('#loan_type_id').val() != "" && $('#loan_type_id').val() != null ) {
        $('#loan_type_id').removeClass("parsley-error");
        $('#loan_type_id_span').html('<span></span>');
    }
    if ($('#loan-date').val() != "" && $('#loan-date').val() != null ) {
        $('#loan-date').removeClass("parsley-error");
        $('#loan-date_span').html('<span></span>');
    }
    if ($('#client_level').val() != "" && $('#client_level').val() != null ) {
        $('#client_level').removeClass("parsley-error");
        $('#client_level_span').html('<span></span>');
    }

}, 500);


function validate() {
    var error;

    if ($('#group_id').val() == "" || $('#group_id').val() == null) {
        $('#group_id_span').html('<span style="color:red;">Select Client Group</span>');
        error = true;
    }
    if ($('#client_id').val() == "" || $('#client_id').val() == null) {
        $('#client_id_span').html('<span style="color:red;">Select Client</span>');
        error = true;
    }
    if ($('#loan_type_id').val() == "" || $('#loan_type_id').val() == null ) {
        $('#loan_type_id').addClass("parsley-error");
        $('#loan_type_id_span').html('<span style="color:red;">Select Loan Type</span>');
        error = true;
    }
    if ($('#loan-date').val() == "" || $('#loan-date').val() == null ) {
        $('#loan-date').addClass("parsley-error");
        $('#loan-date_span').html('<span style="color:red;">Select Loan Start Date</span>');
        error = true;
    }
    if ($('#client_level').val() == "" || $('#client_level').val() == null ) {
        $('#client_level').addClass("parsley-error");
        $('#client_level_span').html('<span style="color:red;">Select Client First</span>');
        error = true;
    }


    return !error;
}