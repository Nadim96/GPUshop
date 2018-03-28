@extends('layout.main')

@section('content')

<div class="product">
	 <div class="container">
		 <div class="ctnt-bar cntnt">
			 <div class="content-bar">
				 <div class="single-page">
					 <div class="product-head">
						<a href="{{route('home')}}">Home</a> <span>::</span>	
						</div>
					 <!--Include the Etalage files-->
						<link rel="stylesheet" href="/css/etalage.css">
						<script src="/js/jquery.etalage.min.js"></script>
				<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 400,
					thumb_image_height: 400,
					source_image_width: 800,
					source_image_height: 1000,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>

		@if(isset($singleProduct))

		@foreach($singleProduct as $product)



						<!--//details-product-slider-->
					 <div class="details-left-slider">
						 <div class="grid images_3_of_2">
						  <ul id="etalage">
							<li>
									<img class="etalage_thumb_image" src="{{url('afbeeldingen', $product->afbeelding)}}" alt="" heigh/>
									<img class="etalage_source_image" src="{{url('afbeeldingen', $product->afbeelding)}}" alt="" heigh/>

							</li>
							
						</ul>
						</div>
					 </div>



					 <div class="details-left-info">
							<h2>{{$product->naam}}</h2>
								<p style="color:black;"><label>€</label>{{$product->prijs}}</p>
							<div class="btn_form">
								<a href="{{route('cart.edit',$product->id)}}">IN WINKELMAND</a>
							</div>
							<div class="bike-type">
							@foreach($categorie as $cat)
							<p>Categorie  :: <a href="#" style="color:#337ab7;pointer-events: none; cursor: default">{{$cat->naam}}</a></p>
							@endforeach
							</div>
							<h5>Beschrijving  ::</h5>
							<p class="desc">{{$product->beschrijving}}</p>
					 </div>
					 <div class="clearfix"></div>				 	
				  </div>
			  </div>
		  </div>


		@endforeach



		

		  <div class="single-bottom2">
			  <h6>Gerelateerde producten</h6>
			 <div class="product">
			 	@forelse($relatedProducts->take(6) as $relatedProduct)
					 <div class="product-desc">
						  <div class="product-img product-img2">
							 <img src="{{url('afbeeldingen', $relatedProduct->afbeelding)}}" class="img-responsive " alt=""/>
						 </div>
						 <div class="prod1-desc">
								<h5><a class="product_link" href="/bicycles.html">{{$relatedProduct->naam}}</a></h5>
								<p class="product_descr"> {{$relatedProduct->beschrijving}} </p>									
						 </div>
						 <div class="clearfix"></div>
					 </div>
					 <div class="product_price">
							<span class="price-access">€ {{$relatedProduct->prijs}}</span>	<br><br>							
							<a class="btn btn-default" href="{{route('gpu', $relatedProduct->id)}}"><span>Bekijk</span></a>
					 </div>


						<div class="clearfix"></div>
						 @empty

					 <h3>Geen producten</h3>
			  @endforelse
			 </div>


					
			

@endif

				 <div class="clearfix"></div>

			  </div>
		 </div>	
	 </div>
</div>
	@endsection