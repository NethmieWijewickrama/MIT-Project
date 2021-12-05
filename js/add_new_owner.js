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
                $("#owner_data").submit();
            }
        })
    }
});



var nic = /((^|, )([0-9]{9}[V|v]|[0-9]{12})+$)/;
var numbersReg = /^[0-9]{1,3}$/;
//var tpReg = /^[0-9]{10}$/;
//var tpReg = /^[0-9]+$/;
var tpReg = /^[0-9]*$/
var nameReg = /^[A-Za-z-\s]+$/;



window.setInterval(() => {

    if ($('#districtOffice').val() != "" && $('#districtOffice').val() != null) {        
        $('#districtOffice').removeClass("is-invalid");
        $('#districtOffice_span').html('<span></span>');
    }

    if ($('#ownerName').val() != "" && $('#ownerName').val() != null && $('#ownerName').val().match(nameReg) ) {        
        $('#ownerName').removeClass("is-invalid");
        $('#ownerName_span').html('<span></span>');
    }

    if ($('#nic').val() != "" && $('#nic').val() != null && ($('#nic').val().match(nic))) {
        $('#nic').removeClass("is-invalid");
        $('#nic_span').html('<span></span>');
    }
    if ($('#addressHouse').val() != "" && $('#addressHouse').val() != null) {
        $('#addressHouse').removeClass("is-invalid");
        $('#addressHouse_span').html('<span></span>');
    }
    if ($('#addressStreetName').val() != "" && $('#addressStreetName').val() != null) {
        $('#addressStreetName').removeClass("is-invalid");
        $('#addressStreetName_span').html('<span></span>');
    }
    if ($('#addressCity').val() != "" && $('#addressCity').val() != null && $('#addressCity').val().match(nameReg)) {
        $('#addressCity').removeClass("is-invalid");
        $('#addressCity_span').html('<span></span>');
    }
    if ($('#contactNo').val() != "" && $('#contactNo').val() != null && $('#contactNo').val().match(tpReg)) {
        $('#contactNo').removeClass("is-invalid");
        $('#contactNo_span').html('<span></span>');
    }
    if ($('#registrationDate').val() != "" && $('#registrationDate').val() != null) {
        $('#registrationDate').removeClass("is-invalid");
        $('#registrationDate_span').html('<span></span>');
    }


}, 500);


function validate() {
    
    var error;

	var nicValue = $('#nic').val();
	var ownername = $('#ownerName').val();
	var addresscity = $('#addressCity').val();
	var addressstreetname = $('#addressStreetName').val();
    var contactno = $('#contactNo').val();

    if ($('#districtOffice').val() == "" || $('#districtOffice').val() == null) {
        $('#districtOffice').addClass("is-invalid");
        $('#districtOffice_span').html('<span>Select Fisheries District Office</span>');
        error = true;
    }

    if ($('#ownerName').val() == "" || $('#ownerName').val() == null) {        
        $('#ownerName').addClass("is-invalid");
        $('#ownerName_span').html('<span>Owner Name is required</span>');        
        error = true;
    }else if(!ownername.match(nameReg)){
		$('#ownerName').addClass("is-invalid");
		$('#ownerName_span').html('<span>Owner Name should contain only letters</span>');
		error = true;
	}

    if ($('#nic').val() == "" || $('#nic').val() == null) {
        $('#nic').addClass("is-invalid");
        $('#nic_span').html('<span>NIC is required</span>');
        error = true;
    }else if(!nicValue.match(nic)){
		$('#nic').addClass("is-invalid");
		$('#nic_span').html('<span>NIC format should be 123456789V / 123456789123</span>');
		error = true;
	}

    if ($('#addressHouse').val() == "" || $('#addressHouse').val() == null) {
        $('#addressHouse').addClass("is-invalid");
        $('#addressHouse_span').html('<span>Address (House No) is required</span>');
        error = true;
    }

    if ($('#addressStreetName').val() == "" || $('#addressStreetName').val() == null) {
        $('#addressStreetName').addClass("is-invalid");
        $('#addressStreetName_span').html('<span>Address (Street Name) is required</span>');
        error = true;
    }

    if ($('#addressCity').val() == "" || $('#addressCity').val() == null) {
        $('#addressCity').addClass("is-invalid");
        $('#addressCity_span').html('<span>Address (City) is required</span>');
        error = true;
    }else if(!addresscity.match(nameReg)){
		$('#addressCity').addClass("is-invalid");
		$('#addressCity_span').html('<span>Address (City) should contain only letters</span>');
		error = true;
	}
    
    if ($('#registrationDate').val() == "" || $('#registrationDate').val() == null) {
        $('#registrationDate').addClass("is-invalid");
        $('#registrationDate_span').html('<span>Date is required</span>');
        error = true;
    }

    if ($('#contactNo').val() == "" || $('#contactNo').val() == null) {
        $('#contactNo').addClass("is-invalid");
        $('#contactNo_span').html('<span>Contact Number is required</span>');
        error = true;
    }else if(!contactno.match(tpReg)){
		$('#contactNo').addClass("is-invalid");
		$('#contactNo_span').html('<span>Contact Number format should be 0711234567</span>');
		error = true;
	}
    return !error;
}


$('#owner_data').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});
