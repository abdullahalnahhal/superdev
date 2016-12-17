$(document).ready(function() {
	$('.chosen-select').chosen();
	$('.chosen-select-deselect').chosen({ allow_single_deselect: true });
	$('[data-toggle="popover"]').popover();
});
