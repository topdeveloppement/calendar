jQuery(document).ready(function() {
var months = new Array(
			'janvier',
			'fevrier',
			'mars',
			'avril',
			'mai',
			'juin',
			'juillet',
			'aout',
			'septembre',
			'octobre',
			'novembre',
			'decembre'
			);
var days = new Array(
			'lundi',
			'mardi',
			'mercredi',
			'jeudi',
			'vendredi',
			'samedi',
			'dimanche'
			);
var currentDate = new Date();
var currentMonth = currentDate.getMonth();
var currentDay = currentDate.getDay();
var currentYear = currentDate.getFullYear();
for (var i = 0; i < months.length; i++) {
	if (months[i] != months[currentMonth]) {
		$('.'+months[i]).css('display','none');
		$('#'+months[i]).css('border-bottom','solid 4px #043D5D');
		$('#'+months[i]+' .up').css('visibility','hidden');
		$('#'+months[i]+' .down').css('visibility','visible');
	}
	if(months[i] == months[11]){$('#'+months[i]).css('border-bottom','none');}
}
});