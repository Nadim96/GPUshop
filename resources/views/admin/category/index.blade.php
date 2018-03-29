@extends('admin.layout.admin')

@section('content')

@if (Session::has('success'))
        <div class="alert alert-success">
            <ul>
                {!! Session::get('success') !!}
            </ul>
        </div>
@elseif (Session::has('fail'))
        <div class="alert alert-danger">
            <ul>
                {!! Session::get('fail') !!}
            </ul>
        </div>
@endif


<div class="navbar">
        <a class="navbar-brand" href="/admin/category">Alle Producten</a>
        <ul class="nav navbar-nav">
            @if(!empty($categorieen))
            @forelse($categorieen as $category)
                <li class="active">
                    <a href="{{route('category.show',$category->id)}}">{{$category->naam}}</a>
                    <form action="{{route('category.destroy',$category->id)}}"  method="POST">
                        {{csrf_field()}}&ensp;
                        {{method_field('DELETE')}}
                        <input class="btn btn-sm btn-danger" style="width: 100px;"type="submit" value="Verwijder">&ensp;
                     </form>

                </li>
            @empty
                <li>Geen categorieën gevonden</li>
            @endforelse
                @endif

        </ul>
         <a class="btn btn-primary pull-right navbar-right" data-toggle="modal" href="#category">Voeg categorie toe</a>
    <div class="modal fade" id="category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Voeg toe</h4>
                </div>
                {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('naam', 'Naam') }}
                        {{ Form::text('naam', null, array('class' => 'form-control', 'required' => 'required')) }}
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Sluit</button>
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>


    {{--Alle producten--}}

   @if(isset($allProducts))

      <h3>Alle producten</h3>


    <table class="table table-hover">
        <thead>
            <tr>
                <th>Alle producten</th>
            </tr>
        </thead>
        <tbody>
@forelse($allProducts as $allProduct)
    <tr><td>{{$allProduct->naam}}</td></tr>
        @empty
        <tr><td>Geen resultaten</td></tr>
        @endforelse

        </tbody>
    </table>
    @endif


    {{--categorie geselecteerd--}}

    @if(isset($products))

      @if(isset($categoriesNaam))
        @foreach($categoriesNaam as $categorieNaam)
            <h3>Filter <div style="color:#337ab7;display: inline-block;">{{$categorieNaam->naam}}</div></h3>
        @endforeach

    @endif

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Producten</th>
            </tr>
        </thead>
        <tbody>
@forelse($products as $product)
    <tr><td>{{$product->naam}}</td></tr>
        @empty
        <tr><td>Geen resultaten</td></tr>
        @endforelse

        </tbody>
    </table>
    @endif



@endsection