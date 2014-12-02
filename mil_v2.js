var $foodGroup = 1;	

$(document).ready(function(){

/*-----------------Navigation-----------------*/
	
	var $right = 0;
	var $fruits = 2800;
	var $veggies = 840;
	
	function fruitarrows(){
		if ($right== 0) {
			$('.arrows-prev').addClass('hidden');
			$('.arrows-next').removeClass('hidden');
		}	
		else if ($right>$fruits) {
			$('.arrows-prev').removeClass('hidden');
			$('.arrows-next').addClass('hidden');
		}
		else {
			$('.arrows-prev').removeClass('hidden');
			$('.arrows-next').removeClass('hidden');
		};
		
	}
	
	function veggiearrows(){
		console.log($right);
		if ($right== 0) {
			$('.arrows-prev').addClass('hidden');
			$('.arrows-next').removeClass('hidden');
		}	
		else if ($right>$veggies) {
			$('.arrows-prev').removeClass('hidden');
			$('.arrows-next').addClass('hidden');
		}
		else {
			$('.arrows-prev').removeClass('hidden');
			$('.arrows-next').removeClass('hidden');
		};
		
	}
	
	
  $('<div class="arrows"><span class="arrows-prev hidden">Previous</span><span class="arrows-next">Next</span></div>').insertBefore(".wrapper");

  $(".arrows-next").click(function(){
	  $('.slider').animate({right:'+=1120px'});
	  $right+=1120;
	  if ($foodGroup==1) {
	  	fruitarrows();
	  } else {
	  	veggiearrows();
	  };
  });
  
  $(".arrows-prev").click(function(){
	  $('.slider').animate({right:'-=1120px'});
	  $right-=1120;
	  if ($foodGroup==1) {
	  	fruitarrows();
	  } else {
	  	veggiearrows();
	  };
  });

/*-----------------Category Slider-----------------*/

	$('.category').on('click',function(){
	  $('.category').removeClass('selected');
	  $(this).addClass('selected');
	  
	  if ($('.fruits').hasClass('selected')) {
	  	$foodGroup = 1;
	  	($('.fruit').removeClass('hidden'));
		  ($('.veggie').addClass('hidden'));
	  } else {
	  	$foodGroup = 2;
	  	($('.veggie').removeClass('hidden'));
		  ($('.fruit').addClass('hidden'));
	  }
	});
	

/*-----------------Dropdown-----------------*/
	
	
	});