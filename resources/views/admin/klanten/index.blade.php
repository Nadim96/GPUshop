<?php use App\User;?>
<?php use App\Address;?>
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

        @forelse($gebruikers as $gebruiker)

        <?php $achternaam = Address::where('user_id', $gebruiker->id)->pluck('achternaam')->last(); ?>

        <table class="table table-bordered">

                <tr>

    
                    <th style="text-align:center;">Naam</th>
                    <th style="text-align:center;">Email</th>


                        <tr>
                            <td style="width:20%;">{{$gebruiker->name . " " . $achternaam}}</td>
                            <td style="width:40%">{{$gebruiker->email}}</td>
                            @if($gebruiker->admin == 0)
                            <td style="width:19%;border-color:white;">
                            <form action="{{route('delete.user', $gebruiker->id)}}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen? \nDit kan niet ongedaan worden gemaakt');">
                                {{csrf_field()}}
                                <input type="hidden" value="0" name="delivered">
                                <input type="submit" class="btn btn-default" value="Verwijder gebruiker" style="margin-top:-5%"></submit>
                            </form>
                            </td>
                            @else
                                 <td style="width:19%;border-color:white;">
                            <form action="#" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" value="0" name="delivered">
                                <input type="submit" class="btn btn-default" value="Admin Account" style="margin-top:-5%" disabled></submit>
                            </form>
                            </td>
                            @endif
                        </tr>
            </tr>

        </table>

        @empty
        <h3>Geen bestellingen</h3>
            
        @endforelse

    </ul>



@endsection
