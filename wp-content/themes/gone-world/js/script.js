$ = jQuery;

$(document).ready(function(){

// Show first article in thumbnail container
$('.article-container').fadeOut();
$('.article-container').first().fadeIn();

//Set Article's thumbnail container's height (if display = computer)
var thumbnailContainerHeight = $(window).height();
$('#thumbnail-container').css({'height':thumbnailContainerHeight});

$('.button-article').click(function(){
	var buttonId = $(this).attr('id');
	var supprStr = "button-article-";
	var articleId = buttonId.slice(supprStr.length,buttonId.length);

	var visibleDiv = $('.article-container').is(':visible');
	console.log(visibleDiv);


	if(! $('#article-container-'+articleId).is(':visible') ){
		$('.article-container').fadeOut();
		$('#article-container-'+articleId).fadeIn();
	}	
});

});