@extends('layout.main')

@section('title', 'Graphic cards')

@section('content')


@if (Session::has('success'))
        <div class="alert alert-success" style="text-align: center;">
            <ul>
                {!! Session::get('success') !!}
            </ul>
        </div>
@elseif (Session::has('fail'))
        <div class="alert alert-danger" style="text-align: center;">
            <ul>
                {!! Session::get('fail') !!}
            </ul>
        </div>
@endif

@foreach($categories as $category) 

<div class="bikes">		
	 <div class="mountain-sec">

		<h2>{{$category->naam}}</h2>

		@forelse($gpus as $gpu)

			@if($gpu->category_id == $category->id)

			 <a href="{{route('gpu', $gpu->id)}}"><div class="bike" style="width:20%">				 
				 <img style="min-height: 250px; max-height:250px" src="{{url('afbeeldingen', $gpu->afbeelding)}}" alt="" heigh/>
			     <div class="bike-cost">
						 <div class="bike-mdl">
							 <h4><center>{{$gpu->naam}}</center></h4>
						 </div>
						 <div class="bike-cart">	
						 	<div>
							 	</div>
							 	<br><h3 style="text-align:right; margin-right: 5px;">€{{$gpu->prijs}}</h3><br><br>

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
							<a href="{{route('gpu', $gpu->id)}}">Bekijk</a>
					 </div>
				 </div></a>
	
				@else
				

			@endif

		@empty

			<h3>Geen producten gevonden</h3>
	
@endforelse
			
	<div class="clearfix"></div>
	</div>
		 


@endforeach

	
	@endsection