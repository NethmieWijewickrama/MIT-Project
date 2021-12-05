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
                $("#vessel_data").submit();
            }
        })
    }
});


var numReg = /^[0-9]*$/;
var measureReg = /^[0-9]+[.,]?[0-9]*/;


window.setInterval(() => {
    if ($('#districtOffice').val() != "" && $('#districtOffice').val() != null) {
    	$('#districtOffice').removeClass("is-invalid");
        $('#districtOffice_span').html('<span></span>');
    }
    if ($('#vesselName').val() != "" && $('#vesselName').val() != null) {
    	$('#vesselName').removeClass("is-invalid");
        $('#vesselName_span').html('<span></span>');
    }
    if ($('#length').val() != "" && $('#length').val() != null && $('#length').val().match(measureReg)) {
        $('#length').removeClass("is-invalid");
        $('#length_span').html('<span></span>');
    }
    if ($('#height').val() != "" && $('#height').val() != null && $('#height').val().match(measureReg)) {
        $('#height').removeClass("is-invalid");
        $('#height_span').html('<span></span>');
    }
    if ($('#material').val() != "" && $('#material').val() != null) {
        $('#material').removeClass("is-invalid");
        $('#material_span').html('<span></span>');
    }
    if ($('#year').val() != "" && $('#year').val() != null && $('#year').val().match(numReg)) {
        $('#year').removeClass("is-invalid");
        $('#year_span').html('<span></span>');
    }
    if ($('#serialNo').val() != "" && $('#serialNo').val() != null) {
        $('#serialNo').removeClass("is-invalid");
        $('#serialNo_span').html('<span></span>');
    }
    if ($('#registrationDate').val() != "" && $('#registrationDate').val() != null) {
        $('#registrationDate').removeClass("is-invalid");
        $('#registrationDate_span').html('<span></span>');
    }
    if ($('#ownerID').val() != "" && $('#ownerID').val() != null) {
        $('#ownerID').removeClass("is-invalid");
        $('#ownerID_span').html('<span></span>');
    }
    if ($('#transponderID').val() != "" && $('#transponderID').val() != null) {
        $('#transponderID').removeClass("is-invalid");
        $('#transponderID_span').html('<span></span>');
    }
    if ($('#yardID').val() != "" && $('#yardID').val() != null) {
        $('#yardID').removeClass("is-invalid");
        $('#yardID_span').html('<span></span>');
    }
    if ($('#engineCategory').val() != "" && $('#engineCategory').val() != null) {
        $('#engineCategory').removeClass("is-invalid");
        $('#engineCategory_span').html('<span></span>');
    }


}, 500);


function validate() {
    
    var error;
    var lengthVal = $('#length').val();
    var heightVal = $('#height').val();
    var yearVal = $('#year').val();

    if ($('#districtOffice').val() == "" || $('#districtOffice').val() == null) {
        $('#districtOffice').addClass("is-invalid");
        $('#districtOffice_span').html('<span>Select Fisheries District Office</span>');
        error = true;
    }

    if ($('#vesselName').val() == "" || $('#vesselName').val() == null) {

        $('#vesselName').addClass("is-invalid");
        $('#vesselName_span').html('<span style="color:red;">Vessel Name is required</span>');
        error = true;
    }  
  
    if ($('#length').val() == "" || $('#length').val() == null) {
        $('#length').addClass("is-invalid");
        $('#length_span').html('<span style="color:red;">Length is required</span>');
        error = true;
    }else if(!lengthVal.match(measureReg)){
		$('#length').addClass("is-invalid");
		$('#length_span').html('<span>Length should be expressed in feet</span>');
		error = true;
	}

    if ($('#height').val() == "" || $('#height').val() == null) {
        $('#height').addClass("is-invalid");
        $('#height_span').html('<span style="color:red;">Height is required</span>');
        error = true;
    }else if(!heightVal.match(measureReg)){
		$('#height').addClass("is-invalid");
		$('#height_span').html('<span>Height should be expressed in feet</span>');
		error = true;
	}    

    if ($('#material').val() == "" || $('#material').val() == null) {
        $('#material').addClass("is-invalid");
        $('#material_span').html('<span>Select the Material</span>');
        error = true;
    }
    if ($('#year').val() == "" || $('#year').val() == null) {
        $('#year').addClass("is-invalid");
        $('#year_span').html('<span style="color:red;">Year of construction is required</span>');
        error = true;
    }else if(!yearVal.match(numReg)){
		$('#year').addClass("is-invalid");
		$('#year_span').html('<span>Year should contain only digits</span>');
		error = true;
	}   

    if ($('#serialNo').val() == "" || $('#serialNo').val() == null) {
        $('#serialNo').addClass("is-invalid");
        $('#serialNo_span').html('<span style="color:red;">Serial No is required</span>');
        error = true;
    }

    if ($('#engineCategory').val() == "" || $('#engineCategory').val() == null) {
        $('#engineCategory').addClass("is-invalid");
        $('#engineCategory_span').html('<span style="color:red;">Select the Engine Category</span>');
        error = true;
    }

    if ($('#ownerID').val() == "" || $('#ownerID').val() == null) {
        $('#ownerID').addClass("is-invalid");
        $('#ownerID_span').html('<span style="color:red;">Select the Vessel Owner</span>');
        error = true;
    }

    if ($('#transponderID').val() == "" || $('#transponderID').val() == null) {
        $('#transponderID').addClass("is-invalid");
        $('#transponderID_span').html('<span style="color:red;">Select VMS No</span>');
        error = true;
    }

    if ($('#yardID').val() == "" || $('#yardID').val() == null) {
        $('#yardID').addClass("is-invalid");
        $('#yardID_span').html('<span style="color:red;">Select Vessel Yard</span>');
        error = true;
    }

    if ($('#registrationDate').val() == "" || $('#registrationDate').val() == null) {
        $('#registrationDate').addClass("is-invalid");
        $('#registrationDate_span').html('<span style="color:red;">Date is required</span>');
        error = true;
    }  
    
    return !error;
}


$('#vessel_data').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});
