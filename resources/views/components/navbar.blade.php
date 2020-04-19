<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light pt-0 pb-0 ">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand p-0 mr-5" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <div class="float-left"> <a href="#" class="button-left"><span class="fa fa-fw fa-bars "></span></a> </div>
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown  user-menu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="http://via.placeholder.com/160x160{{-- Auth::user()->profile_img --}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">bootstrap develop</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">{{--Auth::user()->name--}}bootstrap develop</a>
                        <a class="dropdown-item" href="#">editar perfil</a>
                        <a class="dropdown-item" href="#">salir</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</header>
