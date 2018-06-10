$ = jQuery;

$(document).ready(function(){

//Set Main Google Map's height
$('#main-map').css({'height':$(window).height()});

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


	if(! $('#article-container-'+articleId).is(':visible') ){
		$('.article-container').fadeOut();
		$('#article-container-'+articleId).fadeIn();
	}	
});


$('#article-categories li').click(function(){
	$('#article-categories li').css({'background':'#FFF'});
	$(this).css({'background':'#F4F4F4'});
	var category = $(this).attr('id');
	console.log(category);

	if(category != "all")
	{
		$( "#article-titles a h2" ).each(function( index ) {
			console.log(category);
			if($(this).attr('class') == category){
				$(this).fadeIn(500);
			}
			else{
				$(this).fadeOut(0);
			}
		});
	}
	else
	{
		$('#article-titles a h2').fadeIn(500);
	}
	
});


});