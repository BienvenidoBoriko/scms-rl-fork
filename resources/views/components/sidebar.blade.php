<aside class="vh-100 sidebar left ">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{-- Auth::user()->profile_img --}}" class="rounded-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{-- Auth::user()->name --}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="list-sidebar bg-defoult">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-blog"></i> <span class="nav-label"> Visitar Sitio </span>
                </a>
            </li>
            <li class="nav-item active">
                <a href="{{ url('/home') }} " class="nav-link"> <i class="fa fa-th-large"></i> <span class="nav-label">Tablero</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-file"></i> <span class="nav-label">Entradas</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-user-tie"></i><span class="nav-label">Autores</span></a>
            </li>
            <li class="nav-item">
                <a href="#" data-toggle="collapse" data-target="#settings" class="collapsed">
                    <i class="fas fa-cog"></i> <span class="nav-label">Ajustes</span>
                    <span class="fa fa-chevron-left pull-right"></span>
                </a>
                <ul class="sub-menu collapse" id="settings">
                    <li><a href=""> Pagina</a></li>
                    <li><a href=""> Etiquetas</a></li>
                    <li><a href=""> Categorias</a></li>
                </ul>
            </li>
        </ul>

</aside>