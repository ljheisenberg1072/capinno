<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top navbar-static-top">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="/images/capinno_logo.png" alt="" width="150px" height="25px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="{{ route('root') }}">首页</a></li>
                <li class="nav-item"><a class="nav-link" href="#">新闻动态</a></li>
                <li class="nav-item"><a class="nav-link" href="#">参赛指引</a></li>
                <li class="nav-item"><a class="nav-link" href="#">作品提交说明</a></li>
                <li class="nav-item"><a class="nav-link" href="#">大赛评委</a></li>
                <li class="nav-item"><a class="nav-link" href="#">关于我们</a></li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <!-- 登录注册开始 -->
                @guest
                <li class="nav-item mr-4" style="margin-top: 8px"><a class="btn btn-danger" href="{{ route('login') }}">报名参赛</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="iconfont icon-user1" style="font-size: 24px;"></i></a></li>
                @else
                <li class="nav-item mr-4" style="margin-top: 8px"><a class="btn btn-danger" href="@if($user_sign_id = getUserSignId()){{ route('user_signs.show', ['user_sign' => $user_sign_id]) }}@else{{ route('user_signs.create') }}@endif">报名参赛</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle name" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0.9rem 0.5rem;" title="{{ Auth::user()->name }}">
                        <img src="https://cdn.learnku.com/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="img-fluid rounded-circle" width="28" height="28">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="#" class="nav-item dropdown-item">个人中心</a>
                        <a href="#" class="nav-item dropdown-item">我的赛事</a>
                        <a href="#" class="nav-item dropdown-item">系统通知</a>
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
