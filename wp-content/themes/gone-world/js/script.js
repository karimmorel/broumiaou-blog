$ = jQuery;

$(document).ready(function(){

//Set Main Google Map's height
if($(window).width() > 700)
{
	$('#main-map').css({'height':$(window).height()});
}
else
{
	$('#main-map').css({'height':$(window).height()/1.6});
}

// Show first article in thumbnail container
$('.article-container').first().fadeIn();

//Set Article's thumbnail container's height (if display = computer)
// var thumbnailContainerHeight = $(window).height()*.9;
// $('.thumbnail-container').css({'height':thumbnailContainerHeight});


$('#article-categories li').click(function(){
	$('#article-categories li').css({'background':'#FFF'});
	$(this).css({'background':'#F4F4F4'});
	var category = $(this).attr('id');

	if(category != "all")
	{
		$( "#article-titles a h2" ).each(function( index ) {
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