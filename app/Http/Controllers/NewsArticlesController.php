<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\NewsArticle;
use Illuminate\Http\Request;

class NewsArticlesController extends Controller
{
    public function index( NewsArticle $news_article, Request $request)
    {
        $news_articles = $news_article->withCategory($request->category)
            ->where('on_show', true)
            ->orderBy('display_order')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('news_articles.index', ['news_articles' => $news_articles]);
    }

    public function show(NewsArticle $news_article)
    {
        //  判断新闻动态是否发布，如果没有发布则抛出异常
        if (!$news_article->on_show) {
            throw new InvalidRequestException('新闻动态不存在');
        }
        //  点击阅读新闻动态，阅读量+1
        $news_article->increment('review_count');

        return view('news_articles.show', ['news_article' => $news_article]);
    }

}
