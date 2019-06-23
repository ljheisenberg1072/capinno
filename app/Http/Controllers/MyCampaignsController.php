<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Campaign;
use App\Models\UserSign;

class MyCampaignsController extends Controller
{
    public function index()
    {
        $my_campaigns = UserSign::query()->where('user_id', Auth::user()->id)->get();
        $my_campaign_ids = UserSign::query()->where('user_id', Auth::user()->id)->pluck('campaign_id');
        $recommend_campaigns = Campaign::query()
            ->where('on_hold', true)
            ->whereNotIn('id', $my_campaign_ids)
            ->get();
        return view('my_campaigns.index', ['recommend_campaigns' => $recommend_campaigns, 'my_campaigns' => $my_campaigns]);
    }
}