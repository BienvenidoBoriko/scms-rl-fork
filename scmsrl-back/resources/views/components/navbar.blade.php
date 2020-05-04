<header class="header py-3 navbar-margin">
    <nav class="navbar navbar-expand-lg navbar-light pt-0 pb-0 justify-content-between">

            <a href="#" class="button-left">
                <i class="iconX fa fa-fw fa-bars "></i>
                <i class="iconX fas fa-times"></i>
            </a>
            <a class="navbar-brand p-0 mr-4" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>


        <div class="flex-row-reverse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown  user-menu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset(Auth::user()->profile_img) }}"
                            class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span><i class="fa fa-circle text-success"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('author.edit',Auth::user()->id)}}">editar perfil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            salir
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                    </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</header>
