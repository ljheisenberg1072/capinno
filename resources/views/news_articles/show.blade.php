@extends('layouts.app')
@section('title', $news_article->title)
@section('content')
    <section class="news_articles-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8" style="max-width: 700px;">
                    <div class="text-center mb-4">
                        <h4>{{ $news_article->title }}</h4>
                    </div>
                    <div class="mb-4">
                        <p class="time">
                            <i class="iconfont icon-shijian mr-2"></i><span class="text-muted">{{ $news_article->created_at->diffForHumans() }}</span>
                        </p>
                    </div>
                    <div>
                        {!! $news_article->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
