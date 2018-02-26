$ = jQuery;

$(document).ready(function(){
//Set Article's thumbnail container's height (if display = computer)
var thumbnailContainerHeight = $(window).height();
$('#thumbnail-container').css({'height':thumbnailContainerHeight});

$('.button-article').click(function(){
	var buttonId = $(this).attr('id');
	var supprStr = "button-article-";

	var articleId = buttonId.slice(supprStr.length,buttonId.length);
	$('.article-container').fadeOut();
	$('#article-container-'+articleId).fadeIn();
	
});

});