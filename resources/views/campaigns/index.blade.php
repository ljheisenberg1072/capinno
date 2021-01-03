@extends('layouts.app')
@section('title', '所有大赛')

@section('content')
<section class="common-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h2>所有大赛</h2>
            </div>
        </div>
    </div>
</section>
<section class="campaign-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @foreach($campaigns as $campaign)
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-lg-6" style="display: table-cell;vertical-align: middle;">
                            <img src="{{ $campaign->cover_url }}" class="card-img" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                <h5 class="card-title">{{ $campaign->campaign_name }}</h5>
                                <p class="card-text">{{ $campaign->introduction }}</p>
                                <p class="card-text"><small class="text-muted">{{ $campaign->created_at->diffForHumans() }}</small></p>
                                <p class="float-right"><a class="btn btn-primary btn-sm" href="@if(in_array($campaign->id, $registrations)){{ route('registrations.show', ['campaign' => $campaign->id, 'registration' => $registrations[$campaign->id]]) }}@else{{ route('registrations.create', ['campaign' => $campaign->id]) }}@endif">我要参赛</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
