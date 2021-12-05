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
    if ($('#client').val() != "" && $('#client').val() != null && $('#client').val().length == 3) {

        // $('#client_name').attr('style', "");
        $('#client').removeClass("parsley-error");
        $('#client_span').html('<span></span>');
    }
    if ($('#group_name').val() != "" && $('#group_name').val() != null ) {
        $('#group_name').removeClass("parsley-error");
        $('#group_name_span').html('<span></span>');
    }

    // validate();


}, 500);


function validate() {
    // alert("came");
    var error;
// var len=0;
//     var len = $('#client').val();
//     alert(len);


    // if ($('#client_name').val() == "" || $('#client_name').val() == null) {
    //
    //     // $('#client_name').attr('style', "border-radius: 5px; border:#FF0000 1px solid;");
    //     $( '#client_name' ).addClass( "parsley-error" );
    //     $('#client_name_span').html('<span style="color:red;">Client Name is required</span>');
    //     error = true;
    // }
    if ($('#client').val() == "" || $('#client').val() == null || $('#client').val().length != 3) {

        // $('#client').addClass("parsley-error");

        // $('#client').siblings(".select2-container").css('border', '1px solid #FF3B30');

        $('#client_span').html('<span style="color:red;">Select Three Clients</span>');
        error = true;
    }
    if ($('#group_name').val() == "" || $('#group_name').val() == null ) {

        $('#group_name').addClass("parsley-error");
        $('#group_name_span').html('<span style="color:red;">Group Name is Required</span>');
        error = true;
    }
    // if ($('#client').val().length < 3) {
    //
    //     $('#client').addClass("parsley-error");
    //     $('#client_span').html('<span style="color:red;">Client Name is required</span>');
    //     error = true;
    // }


    // $('#client').change(function (event) {
    //
    //     if ($('#client').val().length >= 3) {

    return !error;
}