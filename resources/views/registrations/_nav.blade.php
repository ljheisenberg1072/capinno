<ul class="nav">
    @if(array_key_exists($campaign->id, $registrations))
        <a href="{{ route('registrations.show', ['campaign' => $campaign->id, 'registration' => $registrations[$campaign->id]]) }}" class="nav-link btn btn-pink" style="min-width: 120px;margin-left: 2px;">报名</a>
        @foreach($campaignStages as $campaignStage)
            @if($stageSubmissions[$campaignStage->id])
                <a href="{{ route('stage_submissions.show', ['campaign' => $campaign->id, 'campaign_stage' => $campaignStage->id, 'stage_submission' => $stageSubmissions[$campaignStage->id]]) }}" class="nav-link btn btn-dark stage btn-show" data-stage_name="{{ $campaignStage->stage_name }}" data-submission_start_time="{{ $campaignStage->submission_start_time }}" data-submission_end_time="{{ $campaignStage->submission_end_time }}" style="min-width: 120px;margin-left: 2px;">{{ $campaignStage->stage_name }}</a>
            @else
                <a href="{{ route('stage_submissions.create', ['campaign' => $campaign->id, 'campaign_stage' => $campaignStage->id]) }}" class="nav-link btn btn-dark stage btn-create" data-stage_name="{{ $campaignStage->stage_name }}" data-submission_start_time="{{ $campaignStage->submission_start_time }}" data-submission_end_time="{{ $campaignStage->submission_end_time }}" style="min-width: 120px;margin-left: 2px;">{{ $campaignStage->stage_name }}</a>
            @endif
        @endforeach
    @else
        <a href="{{ route('registrations.create', ['campaign' => $campaign->id]) }}" class="nav-link btn btn-pink no-registered" style="min-width: 120px;margin-left: 2px;">报名</a>
        @foreach($campaignStages as $campaignStage)
            @if($stageSubmissions[$campaignStage->id])
                <a href="{{ route('stage_submissions.show', ['campaign' => $campaign->id, 'campaign_stage' => $campaignStage->id, 'stage_submission' => $stageSubmissions[$campaignStage->id]]) }}" class="nav-link btn btn-dark stage btn-show" data-stage_name="{{ $campaignStage->stage_name }}" data-submission_start_time="{{ $campaignStage->submission_start_time }}" data-submission_end_time="{{ $campaignStage->submission_end_time }}" style="min-width: 120px;margin-left: 2px;">{{ $campaignStage->stage_name }}</a>
            @else
                <a href="{{ route('stage_submissions.create', ['campaign' => $campaign->id, 'campaign_stage' => $campaignStage->id]) }}" class="nav-link btn btn-dark stage btn-create" data-stage_name="{{ $campaignStage->stage_name }}" data-submission_start_time="{{ $campaignStage->submission_start_time }}" data-submission_end_time="{{ $campaignStage->submission_end_time }}" style="min-width: 120px;margin-left: 2px;">{{ $campaignStage->stage_name }}</a>
            @endif
        @endforeach
    @endif
</ul>
