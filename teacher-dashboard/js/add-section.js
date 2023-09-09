
   //jquery
$(document).on('click', '.addmore', function (ev) {
	var $clone = $(this).parent().parent().clone(true);
	var $newbuttons = "<button type='button' class='mb-xs mr-xs mb-3 btn btn-light addmore'>Add Section<i style='margin-left:10px;' class='fa fa-plus'></i></button><button type='button' class='mb-xs mr-xs ms-3 mb-3 btn btn-light removemore'>Remove Section<i style='margin-left:10px;' class='fa fa-remove'></i> </button>";
	$clone.find('.tn-buttons').html($newbuttons).end().appendTo($('#packagingappendhere'));
});

$(document).on('click', '.removemore', function () {
	$(this).parent().parent().remove();
}); 

