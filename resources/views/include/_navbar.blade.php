<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light white">

    <div class="container">

        <a class="navbar-brand" href="{{ url('/home') }}">
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

                    <a href="{{url('/login')}}">เข้าสู่ระบบ</a>
                @else
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="{{ url('message') }}">
                        <i class="far fa-envelope"></i>
                        <span class='badge badge-pill badge-danger unread-count'>30</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('my/profile') }}">ตั้งค่าข้อมูลส่วนตัว</a>
                        <a class="dropdown-item" href="{{ url('my/following') }}">กำลังติดตาม ({{ Auth::user()->following()->count() }})</a>
                        <a class="dropdown-item" href="{{ url('my/follower') }}">ผู้ติดตาม ({{ Auth::user()->followers()->count() }})</a>
                        @if(Auth::user()->is_admin == 1)
                            <hr>
                            <a class="dropdown-item" href="{{ url('zadmin/user') }}">จัดการสมาชิก</a>
                            <a class="dropdown-item" href="{{ url('zadmin/banner') }}">จัดการแบนเนอร์</a>
                        @endif
                        <hr>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        </div>

    </div>

</nav>
<!--/.Navbar-->