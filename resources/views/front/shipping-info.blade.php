@extends('layout.main')


@section('content')

	<br><h3><center>Gegevens</center></h3><br>


	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="content-box-large" style="1px solid black; background-color:#f4f4f4;">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            {!! Session::get('success') !!}
                        </ul>
                    </div>
                @endif

                @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <ul>
                        {!!$error!!}
                    </ul>
                 </div>
                @endforeach

            {!! Form::open(['route' => 'address.store', 'method' => 'POST', 'files' => true, 'data-parsley-validate'=>'']) !!}

			
			<div class="form-group">
                {{ Form::hidden('user_id',  Auth::user()->id, array('class' => 'form-control','required'=>'', 'readonly' => 'true')) }}
            </div>

			<div class="form-group" style="display:inline-block;width:49%;">
                {{ Form::label('voornaam', 'Voornaam') }}
                {{ Form::text('voornaam',  Auth::user()->name, array('class' => 'form-control','required'=>'', 'readonly' => 'true')) }}
            </div>

            <div class="form-group" style="display:inline-block;width:50%;">
                {{ Form::label('achternaam', 'Achternaam') }}
                {{ Form::text('achternaam', null, array('class' => 'form-control','required'=>'')) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Auth::user()->email, array('class' => 'form-control','required'=>'', 'readonly' => 'true')) }}
            </div>

            <div class="form-group" style="display:inline-block;width:79%;">
                {{ Form::label('straat', 'Straat') }}
                {{ Form::text('straat', null, array('class' => 'form-control','required'=>'')) }}
            </div>


            <div class="form-group" style="display:inline-block;width:20%;">
                {{ Form::label('huisnummer', 'Huisnummer') }}
                {{ Form::text('huisnummer', null, array('class' => 'form-control','required'=>'', 'placeholder'=>'1')) }}
            </div>

            <div class="form-group">
                {{ Form::label('postcode', 'Postcode') }}
                {{ Form::text('postcode', null, array('class' => 'form-control','required'=>'', 'placeholder'=>'1234AB')) }}
            </div>

            <div class="form-group">
                {{ Form::label('plaats', 'Plaats') }}
                {{ Form::text('plaats', null, array('class' => 'form-control','required'=>'')) }}
            </div>

             <div class="form-group">
                {{ Form::label('telefoonnummer', 'Telefoonnummer') }}
                {{ Form::text('telefoonnummer', null, array('class' => 'form-control','required'=>'', 'placeholder'=>'0123456789')) }}
            </div>

         

             {{ Form::submit('Bestellen', array('class' => 'btn btn-default')) }}
            {!! Form::close() !!}

        </div>
    </div>
 </div>

@endsection