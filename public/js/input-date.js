//  // Cuando cambia un input date me borra los espacios
$('[type=date]').change( function() {
  $(this).css('white-space','normal')
});

$('#date').val("");

document.getElementById('date').innerHtml = '';