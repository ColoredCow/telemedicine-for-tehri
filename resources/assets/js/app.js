
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


$('#call_doctor').click(function () {
	$('#new_patient_section').hide();

	$('#call_doctor_section').show();
});

$('#call_ambulance').click(function () {
	$('#new_patient_section').hide();

	$('#call_ambulance_section').show();
});


$('.request_medication').click(function () {
	$('#call_doctor_section').hide();
	$('#prescription_section').show();
});

$('#search_pharmacy').click(function () {
	$('#prescription_section').hide();
	$('#pharmacies_section').show();
});

$('.show_success').click(function () {
	console.log('asd');
	$('#pharmacies_section').hide();
	$('#new_patient_section').show();
	$("#success_alert").show().delay(5000).fadeOut();
});
