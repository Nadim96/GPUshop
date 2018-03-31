<!DOCTYPE html>
<html>
<head>
<title>
	@yield('title','GPUshop')
</title>
<link href="/css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bike-shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='/http://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--webfont-->
<!-- dropdown -->
<script src="/js/jquery.easydropdown.js"></script>
<link href="/css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<script src="/js/scripts.js" type="text/javascript"></script>
<!--js-->
<!---- start-smoth-scrolling---->
		<script type="text/javascript" src="/js/move-top.js"></script>
		<script type="text/javascript" src="/js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
		</script>
<!---- start-smoth-scrolling---->


</head>
<body>
	
<!--banner-->
<script src="/js/responsiveslides.min.js"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
  @if(ends_with(Route::currentRouteAction(), 'FrontController@index'))

			 <div class="banner-bg banner-bg1">

  @else
		<div class="banner-bg banner-sec">
  @endif
	  <div class="container">
			 <div class="header">
			       <div class="logo">
						 <a href="{{route('home')}}"><img style="width:40%;margin-left:-10%;" src="/images/logo3.png" alt=""/></a>
				   </div>	
				  <div class="top-nav">										 
						<label class="mobile_menu" for="mobile_menu">
						<span>Menu</span>
						</label>
						<input id="mobile_menu" type="checkbox">
					   <ul class="nav">
						 <li class=""><a href="{{url('bestellingen')}}">Mijn bestellingen</a> </li>
						  <a class="shop" href="{{route('cart.index')}}"><img src="/images/cart.png" alt=""/><tagname style="color:white;"> {{Cart::count()}}</p></a>
					  </ul>
				 </div>
				 <div class="clearfix"></div>
			 </div>
	  </div>	
</div>
  	@if(ends_with(Route::currentRouteAction(), 'FrontController@index'))
	 <div class="caption">
		 <div class="slider">
					   <div class="callbacks_container">
						  <a class="morebtn" href="{{route('gpus')}}" style="margin-top:10%;">Open Winkel</a>
					  </div>
				  </div>
	 </div>
	 
	@endif		 
</div>
<!--/banner-->
@yield('content')
<!---->

</body>
</html>

