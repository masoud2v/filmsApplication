<header id="header" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('home') }}" class="logo">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <div id="toolbar" class="mb-3">
                <a href="{{ route('films.create') }}" class="btn btn-primary">Create New Film</a>
            </div>
            <div class="col-auto">
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="list-inline-item headerlinks">
                        <ul class="list-inline">
                            <a class="headerlinks" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="list-inline-item ">
                                <a class="headerlinks" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        </ul>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                </ul>
            </div>

        </div>
    </div>
</header>