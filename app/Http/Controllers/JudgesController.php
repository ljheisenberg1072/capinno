<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\Judge;
use Illuminate\Http\Request;

class JudgesController extends Controller
{

    public function index()
    {
        $judges = Judge::query()->where('on_show', true)
            ->orderBy('display_order')
            ->orderByDesc('created_at')
            ->paginate(36);

        return view('judges.index', ['judges' => $judges]);
    }

    public function show(Judge $judge)
    {
        //  判断评委是否前台显示，如果没有显示则抛出异常
        if (!$judge->on_show) {
            throw new InvalidRequestException('评委不存在');
        }
        //  点击浏览评委信息，浏览量+1
        $judge->increment('review_count');

        return view('judges.show', ['judge' => $judge]);
    }

}
