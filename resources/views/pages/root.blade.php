@extends('layouts.app')
@section('title', '首页')

@section('content')
<div class="container-fluid no-gutters px-0" style="overflow-x: hidden;">
    <div class="row">
        <div class="col-lg-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($carousels as $key => $carousel)
                        <li data-target="#carouselExampleCaptions" data-slide-to="{{ $key }}" @if($key == 0) class="active" @endif></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($carousels as $key => $carousel)
                        <div class="carousel-item @if($key == 0) active @endif">
                            @if($carousel->link)
                                <a href="{{ $carousel->link_url }}" target="_blank">
                                    <img class="d-block" src="{{ $carousel->carousel_image }}" alt="@if($carousel->title){{ $carousel->title }}@endif" style="max-width: 100%;">
                                </a>
                            @else
                                <img class="d-block" src="{{ $carousel->carousel_image }}" alt="@if($carousel->title){{ $carousel->title }}@endif" style="max-width: 100%;">
                            @endif
                            @if($carousel->title)
                                <div class="carousel-caption d-none d-md-block">
                                    <p>{{ $carousel->title }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<section class="campaign-schedule" style="display: none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="schedule-header text-center">
                    <h2>参赛流程</h2>
                </div>
                <div class="schedule-body row text-center justify-content-center mt-5">
                    <div class="col-lg-3 col-6 schedule-item">
                        <div class="top">
                            <div class="img">
                                <span><i class="iconfont icon-duoren" style="font-size: 40px;"></i></span>
                            </div>
                        </div>
                        <div class="schedule-name">初赛</div>
                        <p class="schedule-time">01月03日~02月14日</p>
                        <p class="schedule-event">设计创意提案提交 评审</p>
                    </div>
                    <div class="col-lg-3 col-6 schedule-item">
                        <div class="top">
                            <div class="img">
                                <span><i class="iconfont icon-taotaisai01" style="font-size: 40px;"></i></span>
                            </div>
                        </div>
                        <div class="schedule-name">决赛</div>
                        <p class="schedule-time">02月21日~04月04日</p>
                        <p class="schedule-event">产品商业计划书提交 评审</p>
                    </div>
                    <div class="col-lg-3 col-6 schedule-item">
                        <div class="top">
                            <div class="img">
                                <span><i class="iconfont icon-bisai" style="font-size: 40px;"></i></span>
                            </div>
                        </div>
                        <div class="schedule-name">决赛路演</div>
                        <p class="schedule-time">04月18日</p>
                        <p class="schedule-event">样品提交 + 决赛现场答辩</p>
                    </div>
                    <div class="col-lg-3 col-6 schedule-item">
                        <div class="top">
                            <div class="img">
                                <span><i class="iconfont icon-bisai1" style="font-size: 40px;"></i></span>
                            </div>
                        </div>
                        <div class="schedule-name">商业路演</div>
                        <p class="schedule-time">04月25日~05月30日</p>
                        <p class="schedule-event">FBIC2021 现场路演</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="campaign-schedule">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="schedule-header text-center">
                    <h2>挑战赛流程</h2>
                </div>
                <div class="schedule-body row text-center justify-content-center mt-5">
                    <img src="/images/time-axis.jpg" alt="" width="1200" style="max-width: 100%;border-radius: 2rem;box-shadow: 5px 5px 10px #bdb5b5;" data-aos="flip-right">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="campaign-category">
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-snack-tab" data-toggle="pill" href="#pills-snack" role="tab" aria-controls="pills-snack" aria-selected="true">零食</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-beverage-tab" data-toggle="pill" href="#pills-beverage" role="tab" aria-controls="pills-beverage" aria-selected="false">饮料</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-dairy-tab" data-toggle="pill" href="#pills-dairy" role="tab" aria-controls="pills-dairy" aria-selected="false">乳及乳制品</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-candy-tab" data-toggle="pill" href="#pills-candy" role="tab" aria-controls="pills-candy" aria-selected="false">糖果&巧克力</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-bakery-tab" data-toggle="pill" href="#pills-bakery" role="tab" aria-controls="pills-bakery" aria-selected="false">烘焙</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-functional-tab" data-toggle="pill" href="#pills-functional" role="tab" aria-controls="pills-functional" aria-selected="false">功能性食品</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-service-tab" data-toggle="pill" href="#pills-service" role="tab" aria-controls="pills-service" aria-selected="false">餐饮&餐饮+</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-taste-tab" data-toggle="pill" href="#pills-taste" role="tab" aria-controls="pills-taste" aria-selected="false">中国味道</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-experience-tab" data-toggle="pill" href="#pills-experience" role="tab" aria-controls="pills-experience" aria-selected="false">食物体验</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-snack" role="tabpanel" aria-labelledby="pills-snack-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 text-center">
                                <img data-aos="zoom-in" src="/images/category/snack-2021.jpg" alt="零食">
                            </div>
                            <div class="col-lg-6 mt-5">
                                <p>零食:</p>
                                <p>二级品类参考:</p>
                                <p>营养棒（能量/代餐/蛋白棒或球等）、谷物类零食、薯类零食、豆类零食、果蔬类零食、肉类零食、其他零食等</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-beverage" role="tabpanel" aria-labelledby="pills-beverage-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 text-center">
                                <img data-aos="zoom-in" src="/images/category/beverage-2021.jpg" alt="饮料">
                            </div>
                            <div class="col-lg-6 mt-5">
                                <p>饮料:</p>
                                <p>二级品类参考:</p>
                                <p>茶及茶饮料、咖啡及咖啡饮料、植物蛋白饮料、含酒精饮料、果蔬饮料、能量与功能饮料、调味水、气泡水与草本饮料、固体与代餐饮料等</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-dairy" role="tabpanel" aria-labelledby="pills-dairy-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 text-center">
                                <img data-aos="zoom-in" src="/images/category/dairy-2021.jpg" alt="乳及乳制品">
                            </div>
                            <div class="col-lg-6 mt-5">
                                <p>乳及乳制品:</p>
                                <p>二级品类参考:</p>
                                <p>酸奶与酸奶饮品、牛奶和乳饮料、奶酪及奶酪制品、乳脂类产品、乳基零食、乳基甜点与冰淇淋等</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-candy" role="tabpanel" aria-labelledby="pills-candy-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 text-center">
                                <img data-aos="zoom-in" src="/images/category/candy-chocolate-2021.jpg" alt="糖果&巧克力">
                            </div>
                            <div class="col-lg-6 mt-5">
                                <p>糖果&巧克力:</p>
                                <p>二级品类参考:</p>
                                <p>巧克力及巧克力制品、胶基糖果类、压片糖果类、硬质糖果类、果冻和布丁、其他糖果类等</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-bakery" role="tabpanel" aria-labelledby="pills-bakery-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 text-center">
                                <img data-aos="zoom-in" src="/images/category/bakery-2021.jpg" alt="烘焙">
                            </div>
                            <div class="col-lg-6 mt-5">
                                <p>烘焙:</p>
                                <p>二级品类参考:</p>
                                <p>饼干、蛋糕、糕点、点心、面包和面包制品、烘焙原料和混合拌料等</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-functional" role="tabpanel" aria-labelledby="pills-functional-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 text-center">
                                <img data-aos="zoom-in" src="/images/category/functional-2021.jpg" alt="功能性食品">
                            </div>
                            <div class="col-lg-6 mt-5">
                                <p>功能性食品:</p>
                                <p>二级品类参考:</p>
                                <p>婴幼儿配方食品、膳食补充剂、特殊人群膳食、特殊功能宣称食品、运动营养食品等</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-service" role="tabpanel" aria-labelledby="pills-service-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 text-center">
                                <img data-aos="zoom-in" src="/images/category/food-service-2021.jpg" alt="餐饮&餐饮+">
                            </div>
                            <div class="col-lg-6 mt-5">
                                <p>餐饮&餐饮+:</p>
                                <p>二级品类参考:</p>
                                <p>汤、酱、调味品、沙拉与净菜、鱼肉蛋制品、方便食品、早餐谷物、 其他餐饮原料等</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-taste" role="tabpanel" aria-labelledby="pills-taste-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 text-center">
                                <img data-aos="zoom-in" src="/images/category/chinese-taste-2021.jpg" alt="中国味道">
                            </div>
                            <div class="col-lg-6 mt-5">
                                <p>中国味道:</p>
                                <p>二级品类参考:</p>
                                <p>地方特色食材深加工、中式糕点、伴手礼场景等</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 text-center">
                                <img data-aos="zoom-in" src="/images/category/food-experience-2021.jpg" alt="食物体验">
                            </div>
                            <div class="col-lg-6 mt-5">
                                <p>食物体验:</p>
                                <p>二级品类参考:</p>
                                <p>食“器”：食物器皿或工具，如何促进美食体验？</p>
                                <p>食“用”：美食新用途，除了吃还能做游戏、做启蒙...？</p>
                                <p>食“景”：美食服务体系，创造或改善服务场景？</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="campaign-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="news-header text-center">
                    <h2>赛事新闻</h2>
                </div>
                <div class="mb-5 show-more">
                    <a href="{{ route('news_articles.index') }}" class="float-right">更多动态<i class="iconfont icon-gengduo ml-1"></i></a>
                </div>
                <div class="row">
                    @foreach($news_articles as $news_article)
                        <div class="col-lg-3 col-sm-6 col-6 mb-4">
                            <div class="news-body">
                                <a class="hover-scale" href="{{ route('news_articles.show', ['news_article' => $news_article->id]) }}"><img data-aos="zoom-in" src="{{ $news_article->cover_url }}" alt=""></a>
                                <div class="news-content">
                                    <a href="{{ route('news_articles.show', ['news_article' => $news_article->id]) }}" title="{{ $news_article->title }}"><p class="news-text">{{ $news_article->title }}</p></a>
                                    <p class="text-right mr-3"><i class="iconfont icon-shijian mr-2"></i>{{ $news_article->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section class="campaign-judge">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="judge-header text-center mb-100">
                    <h2>创新委员会</h2>
                </div>
                <div class="row text-center">
                    @foreach ($judges as $judge)
                    <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mb-4">
                        <div class="judge-body">
                            <div class="avatar">
                                <a href="{{ route('judges.show', ['judge' => $judge->id]) }}" target="_blank"><img data-aos="zoom-in" src="{{ $judge->avatar_url }}" alt="{{ $judge->name }}"></a>
                            </div>
                            <div class="judge-content mt-3">
                                <h4>{{ $judge->name }}</h4>
                                <p class="judge-company">{{ $judge->company }}</p>
                                <p class="judge-title">{{ $judge->title }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row justify-content-center mt-5">
                    <a href="{{ route('judges.index') }}" target="_blank" class="btn btn-danger btn-lg">更多评委/导师</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="campaign-partner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cooperator-header text-center">
                    <h2>大赛伙伴</h2>
                </div>
                <div class="row mt-5 justify-content-center">
                    <div class="cooperator-title row col-lg-3 text-center">
                        <div class="col-lg-12 mt-4">
                            <h4>主办方</h4>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/1-1-1.png" alt="" width="150" height="55">
                        </div>
                    </div>
                    <div class="cooperator-title row col-lg-9 text-center">
                        <div class="col-lg-12 mt-4">
                            <h4>联合主办方</h4>
                        </div>
                        <div class="col-lg-4 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/2-1.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-4 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/2-2.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-4 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/2-3.png" alt="" width="150" height="55">
                        </div>
                    </div>
                </div>
                <div class="row mt-5 justify-content-center">
                    <div class="cooperator-title row col-lg-6 text-center">
                        <div class="col-lg-12 mt-4">
                            <h4>区域合作伙伴</h4>
                        </div>
                        <div class="col-lg-6 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/3-1.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-6 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/3-2.png" alt="" width="150" height="55">
                        </div>
                    </div>
                    <div class="cooperator-title row col-lg-6 text-center">
                        <div class="col-lg-12 mt-4">
                            <h4>孵化合作伙伴</h4>
                        </div>
                        <div class="col-lg-6 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/2-3.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-6 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/4-2.png" alt="" width="150" height="55">
                        </div>
                    </div>
                </div>
                <div class="row mt-5 justify-content-center">
                    <div class="cooperator-title row col-lg-12 text-center">
                        <div class="col-lg-12 mt-4">
                            <h4>企业合作伙伴</h4>
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/5-1.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/5-2.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/5-3.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/5-4.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/5-5.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/5-6.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/5-7.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/5-8.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/5-9.png" alt="" width="150" height="55">
                        </div>
                    </div>
                </div>
                <div class="row mt-5 justify-content-center">
                    <div class="cooperator-title row col-lg-12 text-center">
                        <div class="col-lg-12 mt-4">
                            <h4>内容合作伙伴</h4>
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/6-1.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/6-2.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/6-3.png" alt="" width="150" height="55">
                        </div>
                    </div>
                </div>
                <div class="row mt-5 justify-content-center">
                    <div class="cooperator-title row col-lg-12 text-center">
                        <div class="col-lg-12 mt-4">
                            <h4>支持合作伙伴</h4>
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/7-1.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/7-2.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/7-3.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/7-4.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/7-5.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/7-6.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/7-7.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/7-8.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/7-9.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/7-10.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/7-11.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/7-12.png" alt="" width="150" height="55">
                        </div>
                        <div class="col-lg-2 col-6 mt-4">
                            <img data-aos="zoom-in" src="/images/partner/7-13.png" alt="" width="150" height="55">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="campaign-school">
    <div class="container">
        <div class="row text-center">
            <div class="school-header mb-5 col-lg-12">
                <h2>参赛院校</h2>
            </div>
            <div class="col-lg-2 col-6 px-0 mt-4">
                <p>江南大学</p>
            </div>
            <div class="col-lg-2 col-6 px-0 mt-4">
                <p>中国农业大学</p>
            </div>
            <div class="col-lg-2 col-6 px-0 mt-4">
                <p>华南理工大学</p>
            </div>
            <div class="col-lg-2 col-6 px-0 mt-4">
                <p>西北农林科技大学</p>
            </div>
            <div class="col-lg-2 col-6 px-0 mt-4">
                <p>加尼福尼亚大学戴维斯分校</p>
            </div>
            <div class="col-lg-2 col-6 px-0 mt-4">
                <p>康奈尔大学</p>
            </div>
            <div class="col-lg-2 col-6 px-0 mt-4">
                <p>普渡大学</p>
            </div>
            <div class="col-lg-2 col-6 px-0 mt-4">
                <p>佛罗里达大学</p>
            </div>
            <div class="col-lg-2 col-6 px-0 mt-4">
                <p>南昌大学</p>
            </div>
            <div class="col-lg-2 col-6 px-0 mt-4">
                <p>华中农业大学</p>
            </div>
            <div class="col-lg-2 col-6 px-0 mt-4">
                <p>浙江工商大学</p>
            </div>
            <div class="col-lg-2 col-6 px-0 mt-4">
                <p>丹佛大学</p>
            </div>
            <div class="col-lg-2 col-6 px-0 mt-4">
                <p>京都大学</p>
            </div>
        </div>
    </div>
</section>
@stop

@section('scriptsAfterJs')
    <script>
        $(document).ready(function () {
            //  轮播图参数设置
            $('.carousel').carousel({
               interval: 3000,
            });
        });
    </script>
@stop
