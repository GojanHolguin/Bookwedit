$(document).ready(function(){
	
	$('#boton-menu').click(function(){

		if($('#boton-menu').attr('class') == 'fa fa-bars'){
			$('#boton-menu').removeClass('fa fa-bars').addClass('fas fa-times');
			$('.navegacion .menu').css({'left':'0px'});
			$('.navegacion').css({'width':'100%', 'background':'rgba(0,0,0,.3)'});
		} else{
			$('#boton-menu').removeClass('fas fa-times').addClass('fa fa-bars');
			$('.navegacion .menu').css({'left':'-300px'});
			$('.navegacion .submenu').css({'left':'-300px'});
			$('.navegacion').css({'width':'0%', 'background':'rgba(0,0,0,.0)'});
		}

	});

	$('.navegacion .menu > .item-submenu a').click(function(){
		var positionMenu = $(this).parent().attr('menu');

		$('.item-submenu[menu='+positionMenu+'] .submenu').css({'left':'0'});
	});

	$('.navegacion .menu li.go-back').click(function(){
		$(this).parent().css({'left':'-300px'})
	});

});