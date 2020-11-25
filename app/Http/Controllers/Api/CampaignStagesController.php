<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CampaignStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignStagesController extends Controller
{
    public function stage(Request $request)
    {
        $campaignId = $request->get('q');
        return CampaignStage::query()->where('campaign_id', $campaignId)->get(['id', DB::raw('stage_name as text')]);
    }
}
