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
	$('#pending_prescriptions_section').hide();
	newPatient();
	filterDoctors($('#specialisation').val(), $('#area').val());
	$('#call_doctor_section').show();
});

$('#call_ambulance').click(function() {
	$('#new_patient_section').hide();
	$('#pending_prescriptions_section').hide();

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

$(document).ready(function(){
	searchPrescriptions();
});

$('.ajax_action').click(function(){

	$.ajax({
		url: $(this).attr('data-url'),
		cache: false,
		processData: false,
		type: 'GET',
		success: function() {
			location.reload();
		}
	});

})


function searchPrescriptions() {



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

					if(e.prescriptions[i].date == null){
						var date = '';
					} else {
						var d = new Date(e.prescriptions[i].date);
						var date = d.getDate() + '/' + (d.getMonth() + 1) + '/' + d.getFullYear();
					}
					
					listing += '<div class="row" style="border-top:1px solid #eee;padding:0.5em 0; margin:0"><div class="col-xs-3">' + (e.prescriptions[i].patient == null ?'0 Prescriptions': e.prescriptions[i].patient) + '</div><div class="col-xs-6">' + (e.prescriptions[i].prescription == null ? '' : e.prescriptions[i].prescription) + '</div><div class="col-xs-3">' + date + '</div></div>';
				}
				
				$('#prescription_history_list').html(listing);

			} else {
				$('#prescription_history').hide();
			}



		}
	});

}

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

function filterDoctors(specialisation, area) {

	$('.doctor_item').hide();

	if (specialisation == '' && area == '') {
		$('.doctor_item').show();
		return;
	} else if(specialisation != '' && area != '') {
		$('.doctor_item[data-specialisation="' + specialisation + '"][data-area="' + area + '"]').show();
	} else if (area == ''){
		$('.doctor_item[data-specialisation="' + specialisation + '"]').show();
	} else {
		$('.doctor_item[data-area="' + area + '"]').show();
	}

}

$('#show_all_doctors').click(function () {
	$('.doctor_item').show();
});


function selectDoctor(id) {
	$('#submit_doctor_id').val(id);
}

function selectPharmacy(id) {
	$('#submit_pharmacy_id').val(id);
}

$('.select_new_pharmacy').click(function(){
	$('#update_prescription_id').val($(this).attr('data-id'));
});

$('.edit_prescription').click(function(){
	$('#update_prescription_id').val($(this).attr('data-id'));
});


$('.update_pharmacy').click(function(){

	$.ajax({
		url: '/prescriptions/updatepharmacy?pharmacy_id=' + $(this).attr('data-id') + '&prescription_id=' + $('#update_prescription_id').val(),
		type: 'GET',
		success: function success(e) {
			location.reload();
		}
	});

});

$('#update_prescription_action').click(function(){

	$.ajax({
		url: '/prescriptions/editprescription?prescription=' + $('#update_prescription').val() + '&prescription_id=' + $('#update_prescription_id').val(),
		type: 'GET',
		success: function success(e) {
			location.reload();
		}
	});

});