@extends('layouts.app')
@section('title', $judge->name)
@section('content')
    <section class="judges-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center">
                    <div class="card box-shadow">
                        <div class="avatar">
                            <img class="card-img-top" src="{{ $judge->avatar_url }}" alt="{{ $judge->name }}">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <h4>{{ $judge->name }}</h4>
                            </div>
                            <div class="card-text">
                                <p>{{ $judge->company }}</p>
                                <p>{{ $judge->title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h4>个人简介</h4>
                            </div>
                            <div class="card-text min-height mt-5">
                                <p>{!! $judge->introduction !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
