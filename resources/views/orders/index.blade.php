@extends('layout.main')
@section('content')




<div class="cart" >
         <div class="container">
             <div class="cart-top">
                <a href="/">HOME ::</a>
             </div> 
@forelse($orders as $order)
<center>

   <ul style="border:1px;background-color:#f7f7f7;;border-radius:5px;">
        <table class="table table-bordered" style="width:60%;background-color:white;">

                <tr><br>
        <h4>Bestelnummer #{{$order->id}}</h4>
        <h5>Totaal: €{{$order->total}} (Incl. BTW)</h5><br>
    
                    <th style="text-align:center;">Product naam</th>
                    <th style="text-align:center;">Aantal</th>
                    <th style="text-align:center;">Prijs</th>
                    <th style="text-align:center;">Status</th>


                    @foreach($order->orderItems as $item)
                        <tr>
                            <td style="text-align:center;">{{$item->naam}}</td>
                            <td style="text-align:center;">{{$item->pivot->qty}}</td>
                            <td style="text-align:center;">€{{$item->pivot->total}}</td>
                            <td style="text-align:center;">

                                @if($order->delivered == 0)
                                    In behandeling</td>
                                @endif
                                @if($order->delivered == 1)
                                    Verzonden</td>
                                @endif
                        </tr>



                    @endforeach


            </tr>
        </table><br>

    </center>

           @empty
                      <center> <br> <h3>Geen bestellingen </h3></center>
@endforelse

 </div> </div> 

@endsection
</div>