/* Avgrund jQuery plugin
 * Get plugin, see demo and read documentation here - 
 * http://labs.voronianski.com/jquery.avgrund.js/
 * https://github.com/voronianski/jquery.avgrund.js/
 *
 * (c)2012, MIT Licensed, http://pixelhunter.me
*/

$(document).ready(function() {
  


$('#show').avgrund({
  height: 200,
  holderClass: 'custom',
  showClose: true,
  showCloseText: 'Close',
  enableStackAnimation: true,
  template: '<p>So implement your design and place content here! If you want to close modal, please hit "Esc", somewhere on the screen or use special button. Enjoy!</p>' +
  		'<div>' +
			'<a href="http://github.com/voronianski/jquery.avgrund.js" target="_blank" class="github">Avgrund on Github</a>' +
			'<a href="http://twitter.com/voronianski" target="_blank" class="twitter">Twitter</a>' +
			'<a href="http://dribbble.com/voronianski" target="_blank" class="dribble">Dribbble</a>' +				
			'</div>'
});

});