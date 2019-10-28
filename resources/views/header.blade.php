<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('page.index')}}">MoonLightTeam<span>.</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route('page.index')}}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{route('page.about')}}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{route('page.cooking')}}" class="nav-link">Cooking recipe</a></li>
                <li class="nav-item"><a href="{{route('page.contact')}}" class="nav-link">Contact</a></li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item"><a href="{{route('page.myPost',Auth::user()->id)}}" class="nav-link">MyPost</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('page.myProfile',Auth::user()->id)}}">Profile</a>
                            <a class="dropdown-item" href="{{route('page.editPassword',Auth::user()->id)}}">Change password</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

{{--            <ul class="navbar-nav ml-auto">--}}
{{--                @if (Route::has('login'))--}}
{{--                    @auth--}}
{{--                        --}}{{--                            <a href="{{ url('/home') }}">Home</a>--}}
{{--                      --}}
{{--                            <li class="nav-item"><a href="{{route('user.logout')}}" class="nav-link"> {{ Auth::user()->name }}Logout</a></li>--}}
{{--                    @else--}}
{{--                        <li class="nav-item active"><a href="{{route('page.index')}}" class="nav-link">Home</a></li>--}}
{{--                        <li class="nav-item"><a href="{{route('page.about')}}" class="nav-link">About</a></li>--}}
{{--                        <li class="nav-item"><a href="{{route('page.cooking')}}" class="nav-link">Cooking recipe</a></li>--}}
{{--                        <li class="nav-item"><a href="{{route('page.contact')}}" class="nav-link">Contact</a></li>--}}
{{--                        --}}{{--                            <a href="{{ route('login') }}">Login</a>--}}
{{--                        <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>--}}


{{--                        @if (Route::has('register'))--}}
{{--                            --}}{{--                                <a href="{{ route('register') }}">Register</a>--}}
{{--                            <li class="nav-item"><a href="{{route('register')}}" class="nav-link">Register</a></li>--}}

{{--                        @endif--}}
{{--                    @endauth--}}
{{--                @endif--}}
{{--            </ul>--}}

        </div>
    </div>
</nav>
