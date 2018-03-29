<?php use App\Order;?>

@extends('admin.layout.admin')

@section('content')


    <h3>Producten</h3>

@if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
             {!! Session::get('success') !!}
         </ul>
    </div>
@endif

 <ul>




        <table class="table table-bordered">

                <tr>

    
                    <th style="text-align:center;">Afbeelding</th>
                    <th style="text-align:center;">Naam</th>
                    <th style="text-align:center;">Beschrijving</th>
                    <th style="text-align:center;">Prijs</th>

        @forelse($products as $product)

                        <tr>
							<td><img style="width: 200px;height: 150px;" src="{{@url('afbeeldingen', $product->afbeelding)}}" alt=""/></td>
							<td style="width:25%"><h5>{{$product->naam}}</h5></td>
							<td style="width:25%"><h5>{{$product->beschrijving}}</h5></td>
							<td style="width:25%"><h5>€{{$product->prijs}}</h5></td>
                        </tr>

                               @empty
        <h3>Geen bestellingen</h3>
            
        @endforelse
            </tr>

        </table>

     
    </ul>



@endsection