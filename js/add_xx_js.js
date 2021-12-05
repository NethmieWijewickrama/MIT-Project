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
                $("#xx_data").submit();
            }
        })
    }
});

var nameReg = /^[A-Za-z-\s]+$/;


window.setInterval(() => {

    if ($('#xxtype').val() != "" && $('#xxtype').val() != null) {        
        $('#xxtype').removeClass("is-invalid");
        $('#xxtype_span').html('<span></span>');
    }

    if ($('#xxname').val() != "" && $('#xxname').val() != null && $('#xxname').val().match(nameReg) ) {        
        $('#xxname').removeClass("is-invalid");
        $('#xxname_span').html('<span></span>');
    }

   
}, 500);



function validate() {
    
    var error;

	
	var xxname = $('#xxname').val();
	

    if ($('#xxtype').val() == "" || $('#xxtype').val() == null) {
        $('#xxtype').addClass("is-invalid");
        $('#xxtype_span').html('<span>Select Fisheries District Office</span>');
        error = true;
    }

    if ($('#xxname').val() == "" || $('#xxname').val() == null) {        
        $('#xxname').addClass("is-invalid");
        $('#xxname_span').html('<span>Owner Name is required</span>');        
        error = true;
    }else if(!xxname.match(nameReg)){
		$('#xxname').addClass("is-invalid");
		$('#xxname_span').html('<span>Owner Name should contain only letters</span>');
		error = true;
	}

    
}


$('#xx_data').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});