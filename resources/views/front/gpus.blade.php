@extends('layout.main')

@section('title', 'Graphic cards')

@section('content')

<div class="bikes">		 
	 <div class="mountain-sec">
		 <h2>Exteme Gaming</h2>


		@forelse($gpus as $gpu)

		 <a href="{{route('gpu')}}"><div class="bike">				 
			 <img style="min-height: 325px; max-height:325px"src="{{url('afbeeldingen', $gpu->afbeelding)}}" alt="" heigh/>
		     <div class="bike-cost">
					 <div class="bike-mdl">
						 <h4><center>{{$gpu->naam}}</center></h4>
					 </div>
					 <div class="bike-cart">	
					 	<div>
						 	<br><h3 style="text-align:right; margin-right: 5px;">€{{$gpu->prijs}}</h3> Excl. btw<br><br>
						 	</div>
						 <a class="buy" href="{{route('cart.edit',$gpu->id)}}">In winkelmand</a>
					 </div><br>
					 <div class="bike-mdl" style="border-top:1px solid black">
					 	@if(strlen($gpu->beschrijving) > 96)
					 		<?php $pos = strpos($gpu->beschrijving, ' ', '96'); ?>
					 		{{substr($gpu->beschrijving,0,$pos) . '...'}}
							
					 	@else
							<div style="margin-left:5px;">{{$gpu->beschrijving}}</div>

						@endif
					 </div>

					 <div class="clearfix"></div>
				 </div>
				 <div class="fast-viw">
						<a href="{{route('gpu')}}">Bekijk</a>
				 </div>
			 </div></a>
			
			
			@empty

			<h3>Geen producten gevonden</h3>
		
	
		@endforelse
			
	<div class="clearfix"></div>
	</div>
		 







	  <div class="singlespeed-sec">
		   <h2>Fanatic Gaming</h2>
			 <a href="single.html"><div class="bike">				 
				 <img src="images/s1.jpg" alt=""/>
				 <div class="bike-cost">
					 <div class="bike-mdl">
						 <h4>NAME<span>Model:M4585</span></h4>
					 </div>
					 <div class="bike-cart">						 
						 <a class="buy" href="single.html">BUY NOW</a>
					 </div>
					 <div class="clearfix"></div>
				 </div>
				 <div class="fast-viw">
						<a href="single.html">Quick View</a>
				 </div>
			 </div></a>
			 <a href="single.html"><div class="bike">				 
				 <img src="images/s2.jpg" alt=""/>
				 <div class="bike-cost">
					 <div class="bike-mdl">
						 <h4>NAME<span>Model:M4585</span></h4>
					 </div>
					 <div class="bike-cart">						 
						 <a class="buy" href="single.html">BUY NOW</a>
					 </div>
					 <div class="clearfix"></div>
				 </div>
				 <div class="fast-viw">
						<a href="single.html">Quick View</a>
				 </div>
			 </div></a>
			 <a href="single.html"><div class="bike none2">				 
				 <img src="images/s3.jpg" alt=""/>
				 <div class="bike-cost">
					 <div class="bike-mdl">
						 <h4>NAME<span>Model:M4585</span></h4>
					 </div>
					 <div class="bike-cart">						 
						 <a class="buy" href="single.html">BUY NOW</a>
					 </div>
					 <div class="clearfix"></div>
				 </div>
				 <div class="fast-viw">
						<a href="single.html">Quick View</a>
				 </div>
			 </div></a>
			 <a href="single.html"><div class="bike none1">				 
				 <img src="images/s4.jpg" alt=""/>
				 <div class="bike-cost">
					 <div class="bike-mdl">
						 <h4>NAME<span>Model:M4585</span></h4>
					 </div>
					 <div class="bike-cart">						 
						 <a class="buy" href="single.html">BUY NOW</a>
					 </div>
					 <div class="clearfix"></div>
				 </div>
				 <div class="fast-viw">
						<a href="single.html">Quick View</a>
				 </div>
			 </div></a>
			 <div class="clearfix"></div>
		 </div>
		 
		 <div class="road-sec">





		   <h2>Casual Gaming</h2>
			 <a href="single.html"><div class="bike">				 
				 <img src="images/r1.jpg" alt=""/>
				 <div class="bike-cost">
					 <div class="bike-mdl">
						 <h4>NAME<span>Model:M4585</span></h4>
					 </div>
					 <div class="bike-cart">						 
						 <a class="buy" href="single.html">BUY NOW</a>
					 </div>
					 <div class="clearfix"></div>
				 </div>
				 <div class="fast-viw">
						<a href="single.html">Quick View</a>
				 </div>
			 </div></a>
			 <a href="single.html"><div class="bike">				 
				 <img src="images/r3.jpg" alt=""/>
				 <div class="bike-cost">
					 <div class="bike-mdl">
						 <h4>NAME<span>Model:M4585</span></h4>
					 </div>
					 <div class="bike-cart">						 
						 <a class="buy" href="single.html">BUY NOW</a>
					 </div>
					 <div class="clearfix"></div>
				 </div>
				 <div class="fast-viw">
						<a href="single.html">Quick View</a>
				 </div>
			 </div></a>
			 <a href="single.html"><div class="bike none2">				 
				 <img src="images/r2.jpg" alt=""/>
				 <div class="bike-cost">
					 <div class="bike-mdl">
						 <h4>NAME<span>Model:M4585</span></h4>
					 </div>
					 <div class="bike-cart">						 
						 <a class="buy" href="single.html">BUY NOW</a>
					 </div>
					 <div class="clearfix"></div>
				 </div>
				 <div class="fast-viw">
						<a href="single.html">Quick View</a>
				 </div>
			 </div></a>
			 <a href="single.html"><div class="bike none1">				 
				 <img src="images/r4.jpg" alt=""/>
				 <div class="bike-cost">
					 <div class="bike-mdl">
						 <h4>NAME<span>Model:M4585</span></h4>
					 </div>
					 <div class="bike-cart">						 
						 <a class="buy" href="single.html">BUY NOW</a>
					 </div>
					 <div class="clearfix"></div>
				 </div>
				 <div class="fast-viw">
						<a href="single.html">Quick View</a>
				 </div>
			 </div></a>
			 <div class="clearfix"></div>
		 </div>
		 
	 </div>
</div>
	
	@endsection