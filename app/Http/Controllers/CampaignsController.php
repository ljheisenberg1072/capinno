<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignsController extends Controller
{

    public function index()
    {
        $campaigns = Campaign::query()->paginate();
        //  根据当前用户ID查找报名ID和大赛ID
        $registrations = Registration::query()->where('user_id', Auth::user()->id)->pluck('id', 'campaign_id')->toArray();

        return view('campaigns.index', compact('campaigns', 'registrations'));
    }

}
