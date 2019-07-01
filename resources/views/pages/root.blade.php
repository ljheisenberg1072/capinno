@extends('layouts.app')
@section('title', '首页')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($carousels as $key => $carousel)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" @if($key == 0) class="active" @endif></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($carousels as $key => $carousel)
                    <div class="carousel-item @if($key == 0) active @endif">
                        <a href="{{ $carousel->link }}"><img class="d-block w-100" src="{{ $carousel->carousel_image }}" alt="{{ $carousel->title }}"></a>
                        <div class="carousel-caption d-none d-md-block">
                            <p>{{ $carousel->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="schedule-header text-center">
            <h1>参赛流程</h1>
        </div>
        <div class="schedule-body">
            <div class="row text-center">
                <div class="col-2 schedule-item offset-1">
                    <div class="top">
                        <div class="img">
                            <span><i class="fa fa-paper-plane fa-4x"></i></span>
                        </div>
                    </div>
                    <div class="schedule-name">初赛</div>
                    <p class="schedule-time">9月16日~10月13日</p>
                    <p class="schedule-event">设计创意提案提交 评审</p>
                </div>
                <div class="col-2 schedule-item">
                    <div class="top">
                        <div class="img">
                            <span><i class="fa fa-cube fa-4x"></i></span>
                        </div>
                    </div>
                    <div class="schedule-name">复赛</div>
                    <p class="schedule-time">10月28日~11月29日</p>
                    <p class="schedule-event">产品商业计划书提交 评审</p>
                </div>
                <div class="col-2 schedule-item">
                    <div class="top">
                        <div class="img">
                            <span><i class="fa fa-cubes fa-4x"></i></span>
                        </div>
                    </div>
                    <div class="schedule-name">决赛答辩</div>
                    <p class="schedule-time">2020年1月</p>
                    <p class="schedule-event">样品提交 + 决赛现场答辩</p>
                </div>
                <div class="col-2 schedule-item">
                    <div class="top">
                        <div class="img">
                            <span><i class="fa fa-trophy fa-4x"></i></span>
                        </div>
                    </div>
                    <div class="schedule-name">创业面试</div>
                    <p class="schedule-time">2020年1月</p>
                    <p class="schedule-event">创业营选拔</p>
                </div>
                <div class="col-2 schedule-item">
                    <div class="top">
                        <div class="img">
                            <span><i class="fa fa-users fa-4x"></i></span>
                        </div>
                    </div>
                    <div class="schedule-name">商业路演 & 总决赛</div>
                    <p class="schedule-time">2020年4月</p>
                    <p class="schedule-event">FBIC 现场路演</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="news-header text-center">
            <h1>赛事新闻</h1>
        </div>
        <div class="row offset-lg-11 mb-5 show-more">
            <a href="#"><h5>更多动态<i class="fa fa-chevron-circle-right ml-1"></i></h5></a>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-shadow">
                    <a href="#"><img src="news.png" class="card-img-top" alt="" width="350px" height="200px"></a>
                    <div class="card-body">
                        <p class="card-text news-text">[重磅上线 | 体验创新系列课正式发布，教你如何系统学习用户体验！]</p>
                    </div>
                    <p class="text-right mr-3"><i class="fa fa-calendar mr-2"></i>3天前</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-shadow">
                    <a href="#"><img src="news.png" class="card-img-top" alt="" width="350px" height="200px"></a>
                    <div class="card-body">
                        <p class="card-text news-text">[重磅上线 | 体验创新系列课正式发布，教你如何系统学习用户体验！]</p>
                    </div>
                    <p class="text-right mr-3"><i class="fa fa-calendar mr-2"></i>一周前</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-shadow">
                    <a href="#"><img src="news.png" class="card-img-top" alt="" width="350px" height="200px"></a>
                    <div class="card-body">
                        <p class="card-text news-text">[重磅上线 | 体验创新系列课正式发布，教你如何系统学习用户体验！]</p>
                    </div>
                    <p class="text-right mr-3"><i class="fa fa-calendar mr-2"></i>一个月前</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="display: none;">
    <div class="col-lg-8 offset-lg-2">
        <div class="category-header text-center">
            <h1>大赛类目</h1>
        </div>
        <div class="media">
            <img src="banner.png" alt="" width="300px" height="300px">
            <div class="media-body ml-5">
                <h3 class="mt-0"><i class="fa fa-angle-double-right mr-2"></i>品类赛</h3>
                <ul>
                    <li>零食</li>
                    <li>饮料</li>
                    <li>乳及乳制品</li>
                    <li>功能性食品</li>
                    <li>烘焙</li>
                    <li>糖果&巧克力</li>
                    <li>餐饮餐饮+</li>
                </ul>
                <h3 class="mt-0"><i class="fa fa-angle-double-right mr-2"></i>主题赛</h3>
                <ul>
                    <li>中国味道</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="judge-header text-center">
            <h1>大赛评委</h1>
        </div>
        <div class="row offset-lg-11 mb-5 show-more">
            <a href="#"><h5>更多评委<i class="fa fa-chevron-circle-right ml-1"></i></h5></a>
        </div>
        <div class="row text-center">
            <div class="col-lg-3">
                <div class="card card-shadow">
                    <a href="#"><img src="judge.jpg" class="card-img-top" alt="" width="250px" height="280px"></a>
                    <div class="card-body">
                        <h5 class="card-title">吴卓浩</h5>
                        <p class="card-text judge-title">创新工厂 人工智能工程院副总裁</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-shadow">
                    <a href="#"><img src="judge.jpg" class="card-img-top" alt="" width="250px" height="280px"></a>
                    <div class="card-body">
                        <h5 class="card-title">吴卓浩</h5>
                        <p class="card-text judge-title">创新工厂 人工智能工程院副总裁</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-shadow">
                    <a href="#"><img src="judge.jpg" class="card-img-top" alt="" width="250px" height="280px"></a>
                    <div class="card-body">
                        <h5 class="card-title">吴卓浩</h5>
                        <p class="card-text judge-title">创新工厂 人工智能工程院副总裁</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-shadow">
                    <a href="#"><img src="judge.jpg" class="card-img-top" alt="" width="250px" height="280px"></a>
                    <div class="card-body">
                        <h5 class="card-title">吴卓浩</h5>
                        <p class="card-text judge-title">创新工厂 人工智能工程院副总裁</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="cooperator-header text-center">
            <h1>大赛伙伴</h1>
        </div>
        <div class="row">
            <div class="cooperator-title col-lg-3">
                <h3>主办方</h3>
            </div>
            <div class="cooperator-title col-lg-9">
                <h3>联合主办方</h3>
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
        </div>
        <div class="row mt-5">
            <div class="cooperator-title col-lg-12">
                <h3>区域合作伙伴</h3>
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
        </div>
        <div class="row mt-5">
            <div class="cooperator-title col-lg-12">
                <h3>商业合作伙伴</h3>
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
        </div>
        <div class="row mt-5">
            <div class="cooperator-title col-lg-12">
                <h3>新零售合作伙伴</h3>
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
        </div>
        <div class="row mt-5">
            <div class="cooperator-title col-lg-6">
                <h3>投资合作机构</h3>
            </div>
            <div class="cooperator-title col-lg-6">
                <h3>媒体合作机构</h3>
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
            <div class="col-lg-3 mt-4">
                <img src="capinno_logo.png" alt="" width="150px" height="25px">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="school-header col-lg-12 text-center">
        <h1>参赛院校</h1>
    </div>
    <div class="row col-lg-12">
        <div class="col-lg-3 mt-4">
            <div class="card">
                <img src="school.png" class="card-img-top" alt="" width="150px" height="100px">
            </div>
        </div>
        <div class="col-lg-3 mt-4">
            <div class="card">
                <img src="school.png" class="card-img-top" alt="" width="150px" height="100px">
            </div>
        </div>
        <div class="col-lg-3 mt-4">
            <div class="card">
                <img src="school.png" class="card-img-top" alt="" width="150px" height="100px">
            </div>
        </div>
        <div class="col-lg-3 mt-4">
            <div class="card">
                <img src="school.png" class="card-img-top" alt="" width="150px" height="100px">
            </div>
        </div>
        <div class="col-lg-3 mt-4">
            <div class="card">
                <img src="school.png" class="card-img-top" alt="" width="150px" height="100px">
            </div>
        </div>
        <div class="col-lg-3 mt-4">
            <div class="card">
                <img src="school.png" class="card-img-top" alt="" width="150px" height="100px">
            </div>
        </div>
        <div class="col-lg-3 mt-4">
            <div class="card">
                <img src="school.png" class="card-img-top" alt="" width="150px" height="100px">
            </div>
        </div>
        <div class="col-lg-3 mt-4">
            <div class="card">
                <img src="school.png" class="card-img-top" alt="" width="150px" height="100px">
            </div>
        </div>
    </div>
</div>
@stop

@section('scriptsAfterJs')
    <script>
        $(document).ready(function () {
            //  轮播图参数设置
           $('.carousel').carousel({
               interval: 3000,
           })
        });
    </script>
@stop