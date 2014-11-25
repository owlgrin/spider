$(function() {
	var count = 0;

	$( 'input[name=\'defaule_text\']' ).click(function() {
		if(count%2 == 0)
		{
			$('#message').val('');
		}
		else {
			$('#message').val('Hola Sarpal Ji!');
		}
		count++;
	});
});
