<?php

namespace App\Http\Controllers;

use App\Handlers\FileUploadHandler;
use App\Models\Campaign;
use App\Models\CampaignCategory;
use App\Models\Registration;
use App\Models\StageSubmission;
use Illuminate\Http\Request;
use App\Http\Requests\StageSubmissionRequest;
use App\Models\CampaignStage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StageSubmissionsController extends Controller
{

    public function create(Campaign $campaign, CampaignStage $campaign_stage, StageSubmission $stage_submission)
    {
        //  根据当前比赛节点获取对应大赛ID
        $campaignId = CampaignStage::query()->where('id', $campaign_stage->id)->pluck('campaign_id');
        //  根据大赛ID获取比赛类目
        $campaignCategories = CampaignCategory::query()->where('campaign_id', $campaignId)->orderBy('display_order')->get(['id', 'category_name']);
        //  根据大赛ID获取比赛第一个节点
        $firstStageId = CampaignStage::query()->where('campaign_id', $campaignId)->value('id');
        //  根据大赛ID获取比赛节点名称
        $campaignStages = CampaignStage::query()->where('campaign_id', $campaignId)->get(['id', 'stage_name']);
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

        return view('stage_submissions.create', compact('campaign', 'campaign_stage', 'stage_submission', 'stageSubmissions', 'firstStageId', 'campaignStages', 'campaignCategories',  'registrations'));
    }

    public function uploadFile(Request $request, FileUploadHandler $uploader)
    {
        $file = $request->file('file');
        $value = $request->input('submission_value');
        $result = $uploader->save($file, 'submission', Auth::user()->id);
        $data = [];
        if($result) {
            $data['submission_files'] = [$value => $result['path']];
        }
        return $data;
    }

    public function store(Campaign $campaign, CampaignStage $campaign_stage, StageSubmission $stage_submission, StageSubmissionRequest $request)
    {
        if($request->input('works_name')) {
            $data['works_name'] = $request->input('works_name');
        }
        if($request->input('works_description')) {
            $data['works_description'] = $request->input('works_description');
        }
        if($request->input('works_category')) {
            $data['works_category'] = $request->input('works_category');
        }
        $data['submission_files'] = $request->input('submission_files');
        $data['campaign_stage_id'] = $campaign_stage->id;
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $stage_submission->id = DB::table('stage_submissions')->insertGetId($data);
        return redirect()->route('stage_submissions.show', compact('campaign', 'campaign_stage', 'stage_submission'));
    }

    public function show(Campaign $campaign, CampaignStage $campaign_stage, StageSubmission $stage_submission)
    {
        //  根据当前比赛节点获取对应大赛ID
        $campaignId = CampaignStage::query()->where('id', $campaign_stage->id)->pluck('campaign_id');
        //  根据大赛ID获取比赛类目
        $campaignCategories = CampaignCategory::query()->where('campaign_id', $campaignId)->orderBy('display_order')->get(['id', 'category_name']);
        //  根据大赛ID获取比赛第一个节点
        $firstStageId = CampaignStage::query()->where('campaign_id', $campaignId)->value('id');
        //  根据大赛ID获取比赛节点名称
        $campaignStages = CampaignStage::query()->where('campaign_id', $campaignId)->get(['id', 'stage_name']);
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

        return view('stage_submissions.show', compact('campaign', 'campaign_stage', 'stage_submission', 'stageSubmissions', 'firstStageId', 'campaignStages', 'campaignCategories', 'registrations'));
    }

    public function edit(Campaign $campaign, CampaignStage $campaign_stage, StageSubmission $stage_submission)
    {
        //  根据当前比赛节点获取对应大赛ID
        $campaignId = CampaignStage::query()->where('id', $campaign_stage->id)->pluck('campaign_id');
        //  根据大赛ID获取比赛类目
        $campaignCategories = CampaignCategory::query()->where('campaign_id', $campaignId)->orderBy('display_order')->get(['id', 'category_name']);
        //  根据大赛ID获取比赛第一个节点
        $firstStageId = CampaignStage::query()->where('campaign_id', $campaignId)->value('id');
        //  根据大赛ID获取比赛节点名称
        $campaignStages = CampaignStage::query()->where('campaign_id', $campaignId)->get(['id', 'stage_name']);
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

        return view('stage_submissions.edit', compact('campaign', 'campaign_stage', 'stage_submission', 'stageSubmissions', 'firstStageId', 'campaignStages', 'campaignCategories', 'registrations'));
    }

    public function update(Campaign $campaign, CampaignStage $campaign_stage, StageSubmission $stage_submission, StageSubmissionRequest $request)
    {
        if($request->input('works_name')) {
            $data['works_name'] = $request->input('works_name');
        }
        if($request->input('works_description')) {
            $data['works_description'] = $request->input('works_description');
        }
        if($request->input('works_category')) {
            $data['works_category'] = $request->input('works_category');
        }
        if($request->input('submission_files')) {
            $data['submission_files'] = $request->input('submission_files');
        }
        $data['campaign_stage_id'] = $campaign_stage->id;
        $data['user_id'] = Auth::user()->id;
        $data['updated_at'] = date('y-m-d H:i:s');
        DB::table('stage_submissions')->where('id', $stage_submission->id)->update($data);
        return redirect()->route('stage_submissions.show', compact('campaign', 'campaign_stage', 'stage_submission'));
    }

}
