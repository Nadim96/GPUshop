{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{route('admin.index')}}"><i class="glyphicon glyphicon-home"></i>
                    Dashboard</a></li>

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Categorie
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('category.index')}}">Categorieën beheren</a></li>
                   
                </ul>
            </li>

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Product
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="/admin/product">Producten</a></li>
                    <li><a href="/admin/product/create">Producten toevoegen</a></li>
                   
                </ul>
            </li>

              <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Bestellingen
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{url('admin/orders/pending')}}">Bestellingen in behandeling</a></li>
                    <li><a href="{{url('admin/orders/delivered')}}">Bestellingen afgerond</a></li>
                    <li><a href="{{url('admin/orders')}}">Alle Bestellingen</a></li>
                </ul>
            </li>

             <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Klanten
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{url('admin/klanten')}}">Klantgegevens inzien</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->