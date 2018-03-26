<?php use App\Product;?>
<script>

$(document).ready(function(){
@foreach($cartItems as $cartItem)
	$('#upCart{{$cartItem->id}}').on('change keyup', function(){

		var newqty = $('#upCart{{$cartItem->id}}').val();
		var rowId = $('#rowId{{$cartItem->id}}').val();
		var proId = $('#proId{{$cartItem->id}}').val();


		$.ajax({
			type: 'get',
			dataType: 'html',
			url: "{{url('cart/update/$cartItem->id')}}",
			data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
			success: function(response){
				console.log(response);
				$('#updateDiv').html(response);
			} 
		});
	});	
@endforeach
});

</script>


<!--/banner-->

	<div class="cart">
		 <div class="container">
			 <div class="cart-top">
				<a href="index.html">home</a>
			 </div>	
			 <div class="col-md-9 cart-items">
				 <h2>Mijn winkelmandje ({{Cart::count()}}) <a href="{{url('cart/destroy', 1)}}" style="color:#337ab7;display:inline-block;float:right;">Winkelmand Legen</a></h2>  

				{{--loop--}}
				@foreach($cartItems as $cartItem)


					<script>$(document).ready(function(c) {
						$('#close{{$cartItem->id}}').on('click', function(c){
							$('#cart-header{{$cartItem->id}}').fadeOut('slow', function(c){
								$('#cart-header{{$cartItem->id}}').remove();
							});
							});	  
						});
				   </script>
				 <div class="cart-header" id="cart-header{{$cartItem->id}}">
					  <a href="{{url('cart/update', $cartItem->rowId . '/removeItem' )}}" class="close1">  </a> 
					 <div class="cart-sec">
							<div class="cart-item cyc">
								 {{!$afbeeldingenCart = Product::find($cartItem->id)}}
								 <img src="{{url('afbeeldingen', $afbeeldingenCart->afbeelding)}}"/>
							</div>
						   <div class="cart-item-info">
								 <h3>{{$cartItem->name}}<span></span></h3>
								 <h4><span>€ </span>{{$cartItem->price(2,',')}}</h4>


								 <p class="qty">Qty </p>
								 <input type="hidden" id="rowId{{$cartItem->id}}" value="{{$cartItem->rowId}}">
								 <input type="hidden" id="proId{{$cartItem->id}}" value="{{$cartItem->id}}">

								 <input min="1" type="number" id="upCart{{$cartItem->id}}" name="quantity" value="{{$cartItem->qty}}" class="form-control input-small">
									
								 <h2 style="display:inline-block;float:right;margin-top:20px;">Totaal: €{{$cartItem->subtotal(2,',')}}</p>



						   </div>
						   <div class="clearfix"></div>
							<div class="delivery">
								 <p>GPUshop</p>
								 <span>Levertijd 2-3 werkdagen</span>
								 <div class="clearfix"></div>
					        </div>						
					  </div>
				 </div>
		
			@endforeach


		</div>

			 <div class="col-md-3 cart-total">
				 <div class="price-details">
					 <h3>Bestelling</h3>
					 <span>Artikelen</span>
					 <span class="total">€{{Cart::subtotal(2,',')}}</span>
					 <span>Korting</span>
					 <span class="total">---</span>
					 <span>BTW</span>
					 <span class="total">€{{Cart::tax()}}</span>
					 <div class="clearfix"></div>				 
				 </div>	
				 <h4 class="last-price">Totaal</h4>
				 <span class="total final">€{{Cart::total()}}</span>
				 <div class="clearfix"></div>
				 <a class="order" href="#">Plaats bestelling</a>
				</div>
		 </div>
</div>