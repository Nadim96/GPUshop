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

    @forelse($orders as $order)

    @if(!isset($order->user->name))
            <form action="{{route('delete.order', $order->id)}}" method="POST" class="pull-right" onsubmit="return confirm('Dit verwijdert deze bestelling, weet je het zeker? \nDit kan niet ongedaan worden gemaakt');">
                {{csrf_field()}}
                <input type="hidden" value="1" name="delivered">
                <input type="submit" class="btn btn-default" value="Verwijder bestelling"></submit>
            </form>


                @else

            		@if($order->delivered == 1)
        		    	<form action="{{route('toggle.deliver', $order->id)}}" method="POST" class="pull-right">
        		    		{{csrf_field()}}
        		    		<input type="hidden" value="0" name="delivered">
        					<input type="submit" class="btn btn-default" value="Bezorging ongedaan maken"></submit>
        		    	</form>
        	    	@elseif($order->delivered == 0)
        				<form action="{{route('toggle.deliver', $order->id)}}" method="POST" class="pull-right">
        		    		{{csrf_field()}}
        		    		<input type="hidden" value="1" name="delivered">
        					<input type="submit" class="btn btn-default" value="Markeer als bezorgd"></submit>
        		    	</form>
        
            @endif

        @endif


    	<table class="table table-bordered">

    			<tr>

        @if(isset($order->user->name))
		<center><h4>Bestelling gedaan door {{$order->user->name}}</h4></center>
        @else
        <center><h4>Gebruiker niet gevonden, deze is mogelijk verwijderd</h4></center>

        @endif
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

        @empty
        <h3>Geen bestellingen</h3>
    		
    	@endforelse
    </ul>

@endsection
