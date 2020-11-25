<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CampaignStage;
use App\Models\Registration;
use App\Models\StageSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrationRequest;
use App\Exceptions\InvalidRequestException;

class RegistrationsController extends Controller
{
    public function index(Request $request)
    {
        $registrations = Campaign::query()->paginate();

        return view('registrations.index', ['registrations' => $registrations]);
    }

    public function create(Campaign $campaign, Registration $registration)
    {
        //  判断用户是否已经报名当前大赛
        if(Registration::query()->where('campaign_id', $campaign->id)->where('user_id', Auth::user()->id)->exists()) {
            throw new InvalidRequestException('你已报名该大赛，请勿重复报名！');
        }
        //  获取当前大赛所有比赛阶段节点
        $campaignStages = CampaignStage::query()->where('campaign_id', $campaign->id)->get();
        //  根据当前用户ID查找报名ID和大赛ID
        $registrations = Registration::query()->where('user_id', Auth::user()->id)->pluck('id', 'campaign_id')->toArray();
        foreach($campaignStages as $k => $campaignStage) {
            //  根据当前用户ID和当前大赛的阶段查找提交文件ID
            $builder = StageSubmission::query()->where('user_id', Auth::user()->id);
            $isExist = $builder->where('campaign_stage_id', $campaignStage->id)->exists();
            if($isExist) {
                $stageSubmissions[$campaignStage->id] = $builder->where('campaign_stage_id', $campaignStage->id)->value('id');
            }else {
                $stageSubmissions[$campaignStage->id] = false;
            }
        }

        return view('registrations.create_and_edit', compact('campaign', 'registration', 'stageSubmissions', 'campaignStages', 'registrations'));
    }

    public function store(Campaign $campaign, Registration $registration, RegistrationRequest $request)
    {
        $registration->fill($request->all());
        $registration->user_id = Auth::id();
        $registration->campaign_id = $request->campaign_id;
        $registration->save();

        return redirect()->route('registrations.show', compact('campaign', 'registration'));
    }

    public function show(Campaign $campaign, Registration $registration)
    {
        $this->authorize('own', $registration);

        //  获取当前大赛所有比赛阶段节点
        $campaignStages = CampaignStage::query()->where('campaign_id', $campaign->id)->get();
        //  根据当前用户ID查找报名ID和大赛ID
        $registrations = Registration::query()->where('user_id', Auth::user()->id)->pluck('id', 'campaign_id')->toArray();
        foreach($campaignStages as $k => $campaignStage) {
            //  根据当前用户ID和当前大赛的阶段查找提交文件ID
            $builder = StageSubmission::query()->where('user_id', Auth::user()->id);
            $isExist = $builder->where('campaign_stage_id', $campaignStage->id)->exists();
            if($isExist) {
                $stageSubmissions[$campaignStage->id] = $builder->where('campaign_stage_id', $campaignStage->id)->value('id');
            }else {
                $stageSubmissions[$campaignStage->id] = false;
            }
        }

        return view('registrations.show', compact('campaign', 'registration', 'stageSubmissions', 'campaignStages', 'registrations'));
    }
    public function edit(Campaign $campaign, Registration $registration)
    {
        $this->authorize('own', $registration);

        //  获取当前大赛所有比赛阶段节点
        $campaignStages = CampaignStage::query()->where('campaign_id', $campaign->id)->get();
        //  根据当前用户ID查找报名ID和大赛ID
        $registrations = Registration::query()->where('user_id', Auth::user()->id)->pluck('id', 'campaign_id')->toArray();
        foreach($campaignStages as $k => $campaignStage) {
            //  根据当前用户ID和当前大赛的阶段查找提交文件ID
            $builder = StageSubmission::query()->where('user_id', Auth::user()->id);
            $isExist = $builder->where('campaign_stage_id', $campaignStage->id)->exists();
            if($isExist) {
                $stageSubmissions[$campaignStage->id] = $builder->where('campaign_stage_id', $campaignStage->id)->value('id');
            }else {
                $stageSubmissions[$campaignStage->id] = false;
            }
        }

        return view('registrations.create_and_edit', compact('campaign', 'registration', 'stageSubmissions', 'campaignStages', 'registrations'));
    }

    public function update(Campaign $campaign, Registration $registration, RegistrationRequest $request)
    {
        $this->authorize('own', $registration);

        $registration->update($request->only([
            'leader_name',
            'leader_phone',
            'identity',
            'school_province',
            'school_city',
            'school',
            'province',
            'city',
            'address',
            'leader_email',
            'working_company',
            'team_name',
            'other_members',
            'guide_teachers',
        ]));

        return redirect()->route('registrations.show', compact('campaign', 'registration'));
    }

}
