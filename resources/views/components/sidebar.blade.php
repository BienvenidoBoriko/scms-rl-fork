<aside>
    <div class="sidebar left ">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ auth()->user()->profile_img }}" class="rounded-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="list-sidebar bg-defoult">
            <li>
                <a href="#">
                    <i class="fa fa-diamond"></i> <span class="nav-label"> Visitar Sitio </span>
                </a>
            </li>
            <li>
                <a href="#"> <i class="fa fa-th-large"></i> <span class="nav-label">Tablero</span></a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Entradas</span>
                </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Autores</span></a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#settings" class="collapsed active">
                    <i class="fa fa-table"></i> <span class="nav-label">Ajustes</span>
                    <span class="fa fa-chevron-left pull-right"></span>
                </a>
                <ul class="sub-menu collapse" id="settings">
                    <li><a href=""> Pagina</a></li>
                    <li><a href=""> Etiquetas</a></li>
                    <li><a href=""> Categorias</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
