/*
 *	My jQuery
 */

$(document).ready(function() {
	$("#pageLoader table tr.child").hide();

	$.fn.toggle = function(a, b) {
		return this.each(function() {
		    var clicked = false;
		    $(this).click(function() {
		        if (clicked) {
		            clicked = false;
		            return b.apply(this, arguments);
		        }
		        clicked = true;
		        return a.apply(this, arguments);
		    });
		});
	};

	$("#pageLoader a").toggle(function() {
		id = $(this).attr('id');
		$("i#" + id).removeClass('fa-plus-square');
		$("i#" + id).addClass('fa-minus-square');
		$("#pageLoader table tr.child." + id).show();
	}, function() {
		id = $(this).attr('id');
		$("i#" + id).removeClass('fa-minus-square');
		$("i#" + id).addClass('fa-plus-square');
		$("#pageLoader table tr.child." + id).hide();
	});
	
});