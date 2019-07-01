<?php

namespace App\Http\Controllers;

use App\Models\Carousel;

class PagesController extends Controller
{
    public function root()
    {
        $carousels = Carousel::query()->where('is_show', 1)
            ->orderBy('order', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.root', ['carousels' => $carousels]);
    }
}
