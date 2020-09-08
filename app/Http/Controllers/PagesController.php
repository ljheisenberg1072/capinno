<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\NewsArticle;

class PagesController extends Controller
{
    public function root()
    {
        //  获取首页录播图
        $carousels = Carousel::query()->where('is_show', 1)
            ->orderBy('order', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        //  获取首页新闻动态
        $news_articles = NewsArticle::query()->where('on_show', 1)
            ->orderByDesc('display_order')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        return view('pages.root', ['carousels' => $carousels, 'news_articles' => $news_articles]);
    }
}
