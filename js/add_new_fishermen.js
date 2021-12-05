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
                $("#fishermen_data").submit();
            }
        })
    }
});


var nic = /((^|, )([0-9]{9}[V|v]|[0-9]{12})+$)/;
var numbersReg = /^[0-9]{1,3}$/;
var tpReg = /^[0-9]*$/
var nameReg = /^[A-Za-z-\s]+$/;




window.setInterval(() => {
    if ($('#districtOffice').val() != "" && $('#districtOffice').val() != null) {
    	$('#districtOffice').removeClass("is-invalid");
        $('#districtOffice_span').html('<span></span>');
    }
    if ($('#registrationDate').val() != "" && $('#registrationDate').val() != null) {
        $('#registrationDate').removeClass("is-invalid");
        $('#registrationDate_span').html('<span></span>');
    }
    if ($('#nameWithInitials').val() != "" && $('#nameWithInitials').val() != null && ($('#nameWithInitials').val().match(nameReg))) {        
        $('#nameWithInitials').removeClass("is-invalid");
        $('#nameWithInitials_span').html('<span></span>');
    }
    if ($('#nameInFull').val() != "" && $('#nameInFull').val() != null && ($('#nameInFull').val().match(nameReg))) {
		$('#nameInFull').removeClass("is-invalid");
		$('#nameInFull_span').html('<span></span>');
	}
    if ($('#nic').val() != "" && $('#nic').val() != null && ($('#nic').val().match(nic))) {
        $('#nic').removeClass("is-invalid");
        $('#nic_span').html('<span></span>');
    }
    if ($('#contactNo').val() != "" && $('#contactNo').val() != null && ($('#contactNo').val().match(tpReg))) {
        $('#contactNo').removeClass("is-invalid");
        $('#contactNo_span').html('<span></span>');
    }
    if ($('#addressHouse').val() != "" && $('#addressHouse').val() != null) {
        $('#addressHouse').removeClass("is-invalid");
        $('#addressHouse_span').html('<span></span>');
    }
    if ($('#addressStreetName').val() != "" && $('#addressStreetName').val() != null) {
        $('#addressStreetName').removeClass("is-invalid");
        $('#addressStreetName_span').html('<span></span>');
    }
    if ($('#addressCity').val() != "" && $('#addressCity').val() != null && ($('#addressCity').val().match(nameReg))) {
        $('#addressCity').removeClass("is-invalid");
        $('#addressCity_span').html('<span></span>');
    }
    if ($('#occupation').val() != "" && $('#occupation').val() != null) {
        $('#occupation').removeClass("is-invalid");
        $('#occupation_span').html('<span></span>');
    }
    if ($('#natureOfOccupation').val() != "" && $('#natureOfOccupation').val() != null) {
        $('#natureOfOccupation').removeClass("is-invalid");
        $('#natureOfOccupation_span').html('<span></span>');
    }
    if ($('#medicalFile').val() != "" && $('#medicalFile').val() != null) {
        $('#medicalFile').removeClass("is-invalid");
        $('#medicalFile_span').html('<span></span>');
    }
    if ($('#cinecFile').val() != "" && $('#cinecFile').val() != null) {
        $('#cinecFile').removeClass("is-invalid");
        $('#cinecFile_span').html('<span></span>');
    }

  /*      //dependent 1

    if ($('#d1name').val() != "" && $('#d1name').val() != null) {
        $('#d1name').removeClass("is-invalid");
        $('#d1name_span').html('<span></span>');
    }
    if ($('#d1nic').val() != "" && $('#d1nic').val() != null && ($('#d1nic').val().match(nic))) {
        $('#d1nic').removeClass("is-invalid");
        $('#d1nic_span').html('<span></span>');
    }
    if ($('#d1relationship').val() != "" && $('#d1relationship').val() != null) {
        $('#d1relationship').removeClass("is-invalid");
        $('#d1relationship_span').html('<span></span>');
    }
    if ($('#d1tp').val() != "" && $('#d1tp').val() != null) {
        $('#d1tp').removeClass("is-invalid");
        $('#d1tp_span').html('<span></span>');
    }

        //dependent 2
	    
    if ($('#d2name').val() != "" && $('#d2name').val() != null) {
        $('#d2name').removeClass("is-invalid");
        $('#d2name_span').html('<span></span>');``
    }
    if ($('#d2nic').val() != "" && $('#d2nic').val() != null && ($('#d2nic').val().match(nic))) {
        $('#d2nic').removeClass("is-invalid");
        $('#d2nic_span').html('<span></span>');
    } 
    if ($('#d2relationship').val() != "" && $('#d2relationship').val() != null) {
        $('#d2relationship').removeClass("is-invalid");
        $('#d2relationship_span').html('<span></span>');
    }
    if ($('#d2tp').val() != "" && $('#d2tp').val() != null) {
        $('#d2tp').removeClass("is-invalid");
        $('#d2tp_span').html('<span></span>');
    }*/
    


}, 500);


function validate() {
    
    var error;
    var nicValue = $('#nic').val();
	var nameinitialVal = $('#nameWithInitials').val();
    var namefullVal = $('#nameInFull').val();
	var addresscity = $('#addressCity').val();
	//var addressstreetname = $('#addressStreetName').val();
    var contactnoVal = $('#contactNo').val();


    if ($('#districtOffice').val() == "" || $('#districtOffice').val() == null) {
        $('#districtOffice').addClass("is-invalid");
        $('#districtOffice_span').html('<span>Select Fisheries District Office</span>');
        error = true;
    }

    if ($('#registrationDate').val() == "" || $('#registrationDate').val() == null) {
        $('#registrationDate').addClass("is-invalid");
        $('#registrationDate_span').html('<span>Date required</span>');
        error = true;
    }

    if ($('#nameWithInitials').val() == "" || $('#nameWithInitials').val() == null) {
        $('#nameWithInitials').addClass("is-invalid");
        $('#nameWithInitials_span').html('<span>Name with Initials required</span>');
        error = true;
    }else if(!nameinitialVal.match(nameReg)){
		$('#nameWithInitials').addClass("is-invalid");
		$('#nameWithInitials_span').html('<span>Name with Initials (H M Perera)</span>');
		error = true;
	}

    if ($('#nameInFull').val() == "" || $('#nameInFull').val() == null) {
        $('#nameInFull').addClass("is-invalid");
        $('#nameInFull_span').html('<span style="color:red;">Full Name required</span>');
        error = true;
    }else if(!namefullVal.match(nameReg)){
		$('#nameInFull').addClass("is-invalid");
		$('#nameInFull_span').html('<span>Full Name should contain only letters</span>');
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

    if ($('#contactNo').val() == "" || $('#contactNo').val() == null) {
        $('#contactNo').addClass("is-invalid");
        $('#contactNo_span').html('<span>Contact Number is required</span>');
        error = true;
    }else if(!contactnoVal.match(tpReg)){
		$('#contactNo').addClass("is-invalid");
		$('#contactNo_span').html('<span>Contact Number format should be 0711234567</span>');
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

    if ($('#occupation').val() == "" || $('#occupation').val() == null) {
        $('#occupation').addClass("is-invalid");
        $('#occupation_span').html('<span>Select the Occupation</span>');
        error = true;
    }
    if ($('#natureOfOccupation').val() == "" || $('#natureOfOccupation').val() == null) {
        $('#natureOfOccupation').addClass("is-invalid");
        $('#natureOfOccupation_span').html('<span>Select the Nature of Occupation</span>');
        error = true;
    }

    if ($('#medicalFile').val() == "" || $('#medicalFile').val() == null) {
        $('#medicalFile').addClass("is-invalid");
        $('#medicalFile_span').html('<span>File is required</span>');
        error = true;
    }

    if ($('#cinecFile').val() == "" || $('#cinecFile').val() == null) {
        $('#cinecFile').addClass("is-invalid");
        $('#cinecFile_span').html('<span>File is required</span>');
        error = true;
    }

/*
            //dependent 1

    if ($('#d1name').val() == "" || $('#d1name').val() == null) {
        $('#d1name').addClass("is-invalid");
        $('#d1name_span').html('<span style="color:red;">Name is required</span>');
        error = true;
    }
    if ($('#d1nic').val() == "" || $('#d1nic').val() == null || (!nicValue.match(nic))) {
        $('#d1nic').addClass("is-invalid");
        $('#d1nic_span').html('<span style="color:red;">NIC is required</span>');
        error = true;
    }
    if ($('#d1relationship').val() == "" || $('#d1relationship').val() == null) {
        $('#d1relationship').addClass("is-invalid");
        $('#d1relationship_span').html('<span style="color:red;">Relationship is required</span>');
        error = true;
    }
    if ($('#d1tp').val() == "" || $('#d1tp').val() == null) {
        $('#d1tp').addClass("is-invalid");
        $('#d1tp_span').html('<span style="color:red;">Contact is required</span>');
        error = true;
    }
            //dependent 2

    if ($('#d2name').val() == "" || $('#d2name').val() == null) {
        $('#d2name').addClass("is-invalid");
        $('#d2name_span').html('<span style="color:red;">Name is required</span>');
        error = true;
    }
    if ($('#d2nic').val() == "" || $('#d2nic').val() == null || (!nicValue.match(nic))) {
        $('#d2nic').addClass("is-invalid");
        $('#d2nic_span').html('<span style="color:red;">NIC is required</span>');
        error = true;
    }
    if ($('#d2relationship').val() == "" || $('#d2relationship').val() == null) {
        $('#d2relationship').addClass("is-invalid");
        $('#d2relationship_span').html('<span style="color:red;">Relationship is required</span>');
        error = true;
    }
    if ($('#d2tp').val() == "" || $('#d2tp').val() == null) {
        $('#d2tp').addClass("is-invalid");
        $('#d2tp_span').html('<span style="color:red;">Contact is required</span>');
        error = true;
    } */    
    return !error;
}


$('#fishermen_data').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});
