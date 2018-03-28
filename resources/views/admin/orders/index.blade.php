@extends('admin.layout.admin')
@section('content')



 @if (Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            {!! Session::get('success') !!}
                        </ul>
                    </div>
                @endif

    <ul>

    	@foreach($orders as $order)


    	@if(isset($delivered))
    		@if($order->delivered == 1)
		    	<form action="{{route('toggle.deliver', $order->id)}}" method="POST" class="pull-right">
		    		{{csrf_field()}}
		    		<input type="hidden" value="0" name="delivered">
					<input type="submit" class="btn btn-default" value="Bezorging ongedaan maken"></submit>
		    	</form>
		    @endif
	    	@elseif($order->delivered == 0)
				<form action="{{route('toggle.deliver', $order->id)}}" method="POST" class="pull-right">
		    		{{csrf_field()}}
		    		<input type="hidden" value="1" name="delivered">
					<input type="submit" class="btn btn-default" value="Markeer als bezorgd"></submit>
		    	</form>
  		@endif



    	

    	<table class="table table-bordered">

    			<tr>

		<h4>Bestelling gedaan door {{$order->user->name}}</h4>
		<h5>Totaal: €{{$order->total}} (Incl. BTW)</h5>
    
    				<th style="text-align:center;">Product naam</th>
    				<th style="text-align:center;">Aantal</th>
    				<th style="text-align:center;">Prijs</th>


					@foreach($order->orderItems as $item)
    					<tr>
    						<td>{{$item->naam}}</td>
    						<td>{{$item->pivot->qty}}</td>
    						<td>€{{$item->pivot->total}}</td>
    					</tr>
    				@endforeach
    		</tr>
    	</table>
    		
    	@endforeach
    </ul>

@endsection
