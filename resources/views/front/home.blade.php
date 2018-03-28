@extends('layout.main')

@section('content')




<!--bikes-->
<div class="bikes">	
		 <center><h3>Best Verkocht</h3><br><i class="fa fa-arrow-down" style="font-size:24px"></i></center>
		 <div class="bikes-grids">			 
			 <ul id="flexiselDemo1">

				 		@forelse($gpus->take(6) as $gpu)
				 <li>
					 <img style="min-height: 325px; max-height:325px"src="{{url('afbeeldingen', $gpu->afbeelding)}}" alt=""/>
					 <div class="bike-info">
						 <div class="model">
							 <h4>{{$gpu->naam}}<span>€{{$gpu->prijs}}</span></h4>							 
						 </div>
						 <div class="model-info">
							 <a href="{{route('cart.edit',$gpu->id)}}">IN WINKELMAND</a>
						 </div>			

						 <div class="clearfix"></div>

					 </div>
					 <div class="viw">
						<a href="{{route('gpu', $gpu->id)}}">Bekijk</a>
					 </div>

					 @empty

					 <h3>Geen producten</h3>


				 </li>
				 @endforelse
		    </ul>
			<script type="text/javascript">
			 $(window).load(function() {			
			  $("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover:true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
			});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>			 
	</div>
</div>

	@endsection