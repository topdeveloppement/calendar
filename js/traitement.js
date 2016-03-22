jQuery(document).ready(function() {
	function nextYear(){
		$.ajax({
			url: 'index.php',
			type: 'POST',
			data: {
				'next': $('#title_year').text()
			},
		})	
	}
	function lastYear(){
		
	}
	$('#next_year').click(function(event) {
		nextYear();
		});
	$('#last_year').click(function(event) {
		lastYear();
		});
});