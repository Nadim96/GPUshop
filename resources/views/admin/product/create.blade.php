@extends('admin.layout.admin')

@section('content')

    <h3>Product toevoegen</h3>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            
            {!! Form::open(['route' => 'product.store', 'method' => 'POST', 'files' => true, 'data-parsley-validate'=>'']) !!}

            <div class="form-group">
                {{ Form::label('naam', 'Naam') }}
                {{ Form::text('naam', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
            </div>

            <div class="form-group">
                {{ Form::label('beschrijving', 'Beschrijving') }}
                {{ Form::text('beschrijving', null, array('class' => 'form-control', 'required' => 'required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('prijs', 'Prijs') }}
                {{ Form::text('prijs', null, array('class' => 'form-control', 'required' => 'required', 'placeholder' => '199.99')) }}
            </div>
            <div class="form-group">
                {{ Form::label('category_id', 'Categorieën') }}
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control','placeholder'=>'Selecteer categorie', 'required' => 'required']) }}
            </div>

            <div class="form-group">
                {{ Form::label('afbeelding', 'Afbeelding') }}
                {{ Form::file('afbeelding',array('class' => 'form-control', 'required' => 'required')) }}
            </div>

             {{ Form::submit('Aanmaken', array('class' => 'btn btn-default')) }}
            {!! Form::close() !!}

        </div>
    </div>



@endsection