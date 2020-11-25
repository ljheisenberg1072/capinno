<?php

namespace App\Http\Controllers;

use App\Models\CampaignStage;
use App\Models\Campaign;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignStagesController extends Controller
{

    public function show(Campaign $campaign, CampaignStage $campaign_stage)
    {
        //  根据当前比赛节点获取对应大赛ID
        $campaignId = CampaignStage::query()->where('id', $campaign_stage->id)->pluck('campaign_id');
        //  根据大赛ID获取比赛第一个节点
        $firstStageId = CampaignStage::query()->where('campaign_id', $campaignId)->value('id');
        //  根据大赛ID获取比赛节点名称
        $campaignStages = CampaignStage::query()->where('campaign_id', $campaignId)->get(['id', 'stage_name']);
        //  根据当前用户ID查找报名ID和大赛ID
        $registrations = Registration::query()->where('user_id', Auth::user()->id)->pluck('id', 'campaign_id')->toArray();

        return view('campaign_stages.show', compact('campaign', 'campaign_stage', 'firstStageId', 'campaignStages', 'registrations'));
    }

}
