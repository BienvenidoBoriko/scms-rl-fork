<header class="header py-3">
    <nav class="navbar navbar-expand-lg navbar-light pt-0 pb-0 justify-content-between">
        <div class="">
            <a class="navbar-brand p-0 mr-4" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <a href="#" class="button-left">
                <i class="iconX fa fa-fw fa-bars "></i>
                <i class="iconX fas fa-times"></i>
            </a>
        </div>
        <div class="flex-row-reverse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown  user-menu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="http://via.placeholder.com/160x160{{-- Auth::user()->profile_img --}}"
                            class="user-image" alt="User Image">
                        <span class="hidden-xs">bootstrap develop</span><i class="fa fa-circle text-success"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">{{-- Auth::user()->name --}}bootstrap develop</a>
                        <a class="dropdown-item" href="#">editar perfil</a>
                        <a class="dropdown-item" href="#">salir</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</header>
