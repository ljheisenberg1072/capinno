@extends('layouts.app')
@section('title', '新闻动态')
@section('content')
    <section class="news_articles-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class( ! if_query('category', 'activity')) }}" href="{{ Request::url() }}?category=default">赛事报道</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(if_query('category', 'activity')) }}" href="{{ Request::url() }}?category=activity">线下活动</a>
                        </li>
                    </ul>
                    @foreach ($news_articles as $news_article)
                        <div class="card mb-4">
                            <div class="row no-gutters">
                                <div class="col-lg-4">
                                    <div class="image"><a href="{{ route('news_articles.show', ['news_article' => $news_article->id]) }}" target="_blank"><img src="{{ $news_article->cover_url }}" alt=""></a></div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <a href="{{ route('news_articles.show', ['news_article' => $news_article->id]) }}" class="title" target="_blank">{{ $news_article->title }}</a>
                                        <p class="excerpt">{{ $news_article->excerpt }}</p>
                                        <p class="time">
                                            <i class="iconfont icon-shijian mr-2"></i><small class="text-muted">{{ $news_article->created_at->diffForHumans() }}</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="float-right">{{ $news_articles->appends(Request::except('page'))->render() }}</div>
                </div>
            </div>
        </div>
    </section>
@stop
