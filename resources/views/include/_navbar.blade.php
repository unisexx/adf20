<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light white">

    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" height="30" alt="mdb logo">
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/"
                        target="_blank">jQuery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/angular/"
                        target="_blank">Angular</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/react/"
                        target="_blank">React</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/vue/" target="_blank">Vue</a>
                </li> --}}
            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                @guest
                    {{-- <li class="nav-item">
                        <a class="nav-link waves-effect" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif --}}

                    <a href="{{url('/redirect')}}" class="btn btn-sm btn-fb"><i class="fab fa-facebook-f pr-1"></i> เข้าสู่ระบบ</a>
                @else
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="{{ url('my/profile') }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <a class="dropdown-item" href="{{ url('my/profile') }}">ข้อมูลส่วนตัว</a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

</nav>
<!--/.Navbar-->