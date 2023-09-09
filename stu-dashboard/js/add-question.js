
   //jquery
   $(document).on('click', '.addmoreq', function (ev) {
	var $clone = $(this).parent().parent().clone(true);
	var $newbuttons = "<button type='button' class='mb-xs mr-xs mb-3 btn btn-light addmoreq'>Add Question<i style='margin-left:10px;' class='fa fa-plus'></i></button><button type='button' class='mb-xs mr-xs ms-3 mb-3 btn btn-light removemoreq'>Remove Question<i style='margin-left:10px;' class='fa fa-remove'></i> </button>";
	$clone.find('.tn2-buttons').html($newbuttons).end().appendTo($('#question'));
});

$(document).on('click', '.removemoreq', function () {
	$(this).parent().parent().remove();
}); 

