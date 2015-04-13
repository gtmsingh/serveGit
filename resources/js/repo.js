$(document).ready(function(){
	var remainLength = $(window).height() - $("#header").outerHeight(true);
  $('#side-panel').css("max-height", remainLength);
  $('#main-panel').css("max-height", remainLength);
});