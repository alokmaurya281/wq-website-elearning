
   //jquery
   $(document).on('click', '.addmorel', function (ev) {
	var $clone = $(this).parent().parent().clone(true);
	var $newbuttons = "<button type='button' class='mb-xs mr-xs mb-3 btn btn-light addmorel'>Add Lecture<i style='margin-left:10px;' class='fa fa-plus'></i></button><button type='button' class='mb-xs mr-xs ms-3 mb-3 btn btn-light removemorel'>Remove Lecture<i style='margin-left:10px;' class='fa fa-remove'></i> </button>";
	$clone.find('.tn1-buttons').html($newbuttons).end().appendTo($('#lecture'));
});

$(document).on('click', '.removemorel', function () {
	$(this).parent().parent().remove();
}); 

