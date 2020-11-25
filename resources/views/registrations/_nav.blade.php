<ul class="nav">
    <a href="@if(in_array($campaign->id, $registrations)){{ route('registrations.show', ['campaign' => $campaign->id, 'registration' => $registrations[$campaign->id]]) }}@else{{ route('registrations.create', ['campaign' => $campaign->id]) }}@endif" class="nav-link btn btn-primary" style="min-width: 120px;margin-left: 2px;">报名</a>
    @foreach($campaignStages as $campaignStage)
        <a href="@if($stageSubmissions[$campaignStage->id]){{ route('stage_submissions.show', ['campaign' => $campaign->id, 'campaign_stage' => $campaignStage->id, 'stage_submission' => $stageSubmissions[$campaignStage->id]]) }}@else{{ route('stage_submissions.create', ['campaign' => $campaign->id, 'campaign_stage' => $campaignStage->id]) }}@endif" class="nav-link btn btn-dark" style="min-width: 120px;margin-left: 2px;">{{ $campaignStage->stage_name }}</a>
    @endforeach
</ul>
