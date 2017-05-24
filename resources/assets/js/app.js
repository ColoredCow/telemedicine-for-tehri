/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#back_patients').click(function() {
	$('#new_patient_section').show();
	$('#call_doctor_section').hide();
});

$('#back_doctors').click(function() {
	$('#call_doctor_section').show();
	$('#prescription_section').hide();
});

$('#back_prescription').click(function() {
	$('#prescription_section').show();
	$('#pharmacies_section').hide();
});

$('#call_doctor').click(function() {
	$('#new_patient_section').hide();
	newPatient();
	filterDoctors($('#specialisation').val());
	$('#call_doctor_section').show();
});

$('#call_ambulance').click(function() {
	$('#new_patient_section').hide();

	$('#call_ambulance_section').show();
});


$('.request_medication').click(function() {
	$('#call_doctor_section').hide();
	selectDoctor($(this).attr('data-id'));
	$('#prescription_section').show();
});

$('#search_pharmacy').click(function() {
	if($('#prescription').val() == ''){
		return;
	}
	$('#prescription_section').hide();
	$('#submit_prescription').val($('#prescription').val());
	$('#pharmacies_section').show();
});

$('.select_pharmacy').click(function() {
	$('#pharmacies_section').hide();
	
	selectPharmacy($(this).attr('data-id'));
	newPrescription();
});


function newPatient() {

	var data = $('form[name="new_patient"]').serializeArray();

	$.ajax({
		url: '/patient',
		data: $.param(data),
		cache: false,
		processData: false,
		dataType: 'JSON',
		type: 'POST',
		success: function success(e) {
			$('#submit_patient_id').val(e);
		}
	});

}

$('#search_doctor').click(function(){

	if($('#doctor_phone').val() == '') {
		return;
	}

	$.ajax({
		url: '/prescription/getbydoctor/' + $('#doctor_phone').val(),
		cache: false,
		processData: false,
		dataType: 'JSON',
		type: 'GET',
		success: function success(e) {

			$('#doctor_name').html(e.name);
			$('#prescription_history_list').html('');
			if(e.prescriptions.length > 0)
			{
				$('#prescription_history').show();

				var listing = '';
				
				for (var i = e.prescriptions.length - 1; i >= 0; i--) {
					var d = new Date(e.prescriptions[i].date);
					var date = d.getDate() + '/' + (d.getMonth() + 1) + '/' + d.getFullYear();
					listing += '<div class="row" style="border-top:1px solid #eee;padding:0.5em 0; margin:0"><div class="col-xs-3">' + e.prescriptions[i].patient + '</div><div class="col-xs-6">' + e.prescriptions[i].prescription + '</div><div class="col-xs-3">' + date + '</div></div>';
				}
				
				$('#prescription_history_list').html(listing);

			} else {
				$('#prescription_history').hide();
			}



		}
	});

});

function newPrescription() {

	var data = $('#prescription_submit').serializeArray();

	$.ajax({
		url: '/prescription',
		data: $.param(data),
		cache: false,
		processData: false,
		dataType: 'JSON',
		type: 'POST',
		success: function success(e) {
			console.log(e);
			if(e == true){
				$("#success_alert").show().delay(5000).fadeOut();
			} else {
				$("#error_alert").show().delay(5000).fadeOut();
			}
			
			$('#new_patient_section').show();
		}
	});

}

$('#phone').change(function() {

	if ($(this).val() == '') {
		$('#area').val('');
		$('#name').val('');
		$('#lat').val('');
		$('#long').val('');
		$('#see_history_action').hide();
		return;
	}



	$.ajax({
		url: '/patient/getbynumber/' + $(this).val(),
		type: 'GET',
		success: function success(e) {
			e = JSON.parse(e);
			if (e == null) {
				$('#area').val('');
				$('#name').val('');
				$('#lat').val('');
				$('#long').val('');
				$('#patient_history_list').html('');
				$('#see_history_action').hide();
			} else {
				$('#area').val(e.area);
				$('#name').val(e.name);
				$('#lat').val(e.lat);
				$('#long').val(e.long);
				updateHistory(e.id);
				$('#see_history_action').show();
			}
		}
	});

});

function updateHistory(id) {


	$.ajax({
		url: '/prescription/' + id,
		type: 'GET',
		success: function success(e) {

			prescriptionHistory = e;
			$('#patient_history_list').html('');

			var listing = '';
			
			for (var i = prescriptionHistory.length - 1; i >= 0; i--) {
				var d = new Date(prescriptionHistory[i].date);
				var date = d.getDate() + '/' + (d.getMonth() + 1) + '/' + d.getFullYear();
				listing += '<div class="row" style="border-top:1px solid #eee;padding:0.5em 0; margin:0"><div class="col-xs-3">' + prescriptionHistory[i].doctor + '</div><div class="col-xs-6">' + prescriptionHistory[i].prescription + '</div><div class="col-xs-3">' + date + '</div></div>';
			}
			
			$('#patient_history_list').html(listing);
			
		}
	});

}

$('.add-medicine').click(function() {

	$('#prescription').val($('#prescription').val() + '\n' + $(this).attr('data-type') + ' : ' + $(this).attr('data-name'));

});

function filterDoctors(specialisation) {

	if (specialisation == '') {
		$('.doctor_item').show();
		return;
	}

	$('.doctor_item').hide();

	$('.doctor_item[data-specialisation="' + specialisation + '"]').show();

}


function selectDoctor(id) {
	$('#submit_doctor_id').val(id);
}

function selectPharmacy(id) {
	$('#submit_pharmacy_id').val(id);
}