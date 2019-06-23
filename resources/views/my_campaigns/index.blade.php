@extends('layouts.app')
@section('title', '我的赛事')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>
                    <span><i class="fa fa-angle-double-right mr-3"></i></span>推荐赛事
                </h5>
            </div>
            <div class="card-body">
                @foreach ($recommend_campaigns as $recommend_campaign)
                    <div class="col-md-8">
                        {{ $recommend_campaign->title }}<span></span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>
                    <span><i class="fa fa-angle-double-right mr-3"></i></span>已参赛赛事
                </h5>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>
@endsection