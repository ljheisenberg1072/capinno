<!doctype html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CAPINNO') - CAPINNO</title>
    <meta name="description" content="CAPINNO携手全球食品、设计、商科等高校联合食品行业巨头企业、知名原辅料公司、优质技术服务公司、渠道平台和媒体等发起了‘CAPINNO全球食品饮料挑战赛’">
    <meta name="keywords" content="CAPINNO,capinno,全球食品饮料挑战赛,食品饮料,挑战赛">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <!-- Style -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="/iconfont/iconfont.css">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
</head>
<body>
    <div id="app" class="{{ route_class() }}-page">
        @include('layouts._header')
        <main>
            @yield('content')
        </main>
        @include('layouts._footer')
    </div>
    <!-- JavaScripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    @yield('scriptsAfterJs')
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>
</body>
</html>
