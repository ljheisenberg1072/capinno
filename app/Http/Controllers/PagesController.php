<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Judge;
use App\Models\NewsArticle;

class PagesController extends Controller
{
    public function root()
    {
        //  获取首页录播图
        $carousels = Carousel::query()->where('is_show', true)
            ->orderBy('order', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        //  获取首页新闻动态
        $news_articles = NewsArticle::query()->where('on_show', true)
            ->orderBy('display_order')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        //  获取评委/导师
        $judges = Judge::query()->where('on_show', true)
            ->orderBy('display_order')
            ->orderByDesc('created_at')
            ->limit(36)
            ->get();

        return view('pages.root', ['carousels' => $carousels, 'news_articles' => $news_articles, 'judges' => $judges]);
    }
}
