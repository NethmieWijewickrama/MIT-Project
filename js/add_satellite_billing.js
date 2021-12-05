var confirmed = false;


$("#btn_save_tans").on("click", function (e) {
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
                $("#satbill").submit();
            }
        })
    }
});

//&& $('#start_date').val() < date('Y-m-d')
//&& $('#end_date').val() > $('#start_date').val()

window.setInterval(() => {

    if ($('#start_date').val() != "" && $('#start_date').val() != null && $('#start_date').val() < date('Y-m-d')) {        
        $('#start_date').removeClass("is-invalid");
        $('#start_date_span').html('<span></span>');
    }

    if ($('#end_date').val() != "" && $('#end_date').val() != null && $('#end_date').val() > $('#start_date').val() ) {        
        $('#end_date').removeClass("is-invalid");
        $('#end_date_span').html('<span></span>');
    }

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

var currentdate = date('Y-m-d');
var sdate = date('#start_date');
var edate = date('#end_date');
var sdifdate = currentdate - sdate;



function validate() {

    var error;

    if ($('#start_date').val() == "" || $('#start_date').val() == null) {        
        $('#start_date').addClass("is-invalid");
        $('#start_date_span').html('<span>Enter Correct Date</span>');
        
        error = true;
    }else if($('#start_date').val() > date('Y-m-d')){
        $('#start_date').addClass("is-invalid");
        $('#start_date_span').html('<span>Date not valid</span>');
        error = true;

    }

    if ($('#end_date').val() == "" || $('#end_date').val() == null) {        
        $('#end_date').addClass("is-invalid");
        $('#end_date_span').html('<span>Enter Correct Date</span>');
        
        error = true;
    }else if($('#end_date').val() < $('#start_date')){
        $('#end_date').addClass("is-invalid");
        $('#end_date_span').html('<span>Date not valid</span>');
        error = true;

    }
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

$('#satbill').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});
