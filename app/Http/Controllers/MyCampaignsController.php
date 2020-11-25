<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;
use App\Models\Registration;

class MyCampaignsController extends Controller
{
    public function index()
    {
        $my_campaigns = Registration::query()->where('user_id', Auth::user()->id)->get();
        $my_campaign_ids = Registration::query()->where('user_id', Auth::user()->id)->pluck('campaign_id');
        $recommend_campaigns = Campaign::query()
            ->where('on_hold', true)
            ->whereNotIn('id', $my_campaign_ids)
            ->get();
        return view('my_campaigns.index', ['recommend_campaigns' => $recommend_campaigns, 'my_campaigns' => $my_campaigns]);
    }
}
