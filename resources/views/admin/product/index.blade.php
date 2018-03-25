@extends('admin.layout.admin')

@section('content')

    <h3>Product toevoegen</h3>

    
        @forelse($products as $product)
                  
        <div>
            
            <img style="min-height:300px; max-height:325px; "src="{{@url('afbeeldingen', $product->afbeelding)}}" alt=""/>
            <h4>Naam <span>{{$product->naam}}</span></h4>
        </div>

             @empty

             <h3>Geen producten</h3>

        @endforelse



@endsection