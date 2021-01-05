<ul class="nav">
    <a href="@if(array_key_exists($campaign->id, $registrations)){{ route('registrations.show', ['campaign' => $campaign->id, 'registration' => $registrations[$campaign->id]]) }}@else{{ route('registrations.create', ['campaign' => $campaign->id]) }}@endif" class="nav-link btn btn-dark mt-2" style="min-width: 120px;margin-left: 2px;">报名</a>
    @foreach($campaignStages as $campaignStage)
        @if($stageSubmissions[$campaignStage->id])
            <a href="{{ route('stage_submissions.show', ['campaign' => $campaign->id, 'campaign_stage' => $campaignStage->id, 'stage_submission' => $stageSubmissions[$campaignStage->id]]) }}" class="nav-link btn @if($campaignStage->id == $campaign_stage->id) btn-pink @else btn-dark @endif stage btn-show mt-2" data-stage_name="{{ $campaignStage->stage_name }}" data-submission_start_time="{{ $campaignStage->submission_start_time }}" data-submission_end_time="{{ $campaignStage->submission_end_time }}" style="min-width: 120px;margin-left: 2px;">{{ $campaignStage->stage_name }}</a>
        @else
            <a href="{{ route('stage_submissions.create', ['campaign' => $campaign->id, 'campaign_stage' => $campaignStage->id]) }}" class="nav-link btn @if($campaignStage->id == $campaign_stage->id) btn-pink @else btn-dark @endif stage btn-create mt-2" data-stage_name="{{ $campaignStage->stage_name }}" data-submission_start_time="{{ $campaignStage->submission_start_time }}" data-submission_end_time="{{ $campaignStage->submission_end_time }}" style="min-width: 120px;margin-left: 2px;">{{ $campaignStage->stage_name }}</a>
        @endif
    @endforeach
</ul>
