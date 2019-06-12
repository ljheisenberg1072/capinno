<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top navbar-static-top">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="capinno_logo.png" alt="" width="150px" height="25px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="{{ route('root') }}">首页</a></li>
                <li class="nav-item"><a class="nav-link" href="#">新闻动态</a></li>
                <li class="nav-item"><a class="nav-link" href="#">参赛流程</a></li>
                <li class="nav-item"><a class="nav-link" href="#">大赛评委</a></li>
                <li class="nav-item"><a class="nav-link" href="#">关于我们</a></li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <!-- 登录注册开始 -->
                @guest
                <li class="nav-item"><a href="#" class="nav-link">报名参赛</a></li>
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">登录</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">注册</a></li>
                @else
                <a href="#" class="nav-item btn btn-primary mr-3">报名参赛</a>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="{{ Auth::user()->name }}">
                        <img src="https://iocaffcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="img-responsive img-circle" width="30px" height="30px">
                        <span>{{ Auth::user()->name  }}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="#" class="nav-item dropdown-item" id="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出登录</a>
                        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>