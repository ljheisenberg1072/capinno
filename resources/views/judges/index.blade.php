@extends('layouts.app')
@section('title', '大赛评委')
@section('content')
<section class="common-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h2>创新委员会</h2>
            </div>
        </div>
    </div>
</section>
<section class="judges-area">
    <div class="container">
        <div class="row text-center">
            @foreach ($judges as $judge)
                <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mb-5">
                    <div class="avatar mb-3">
                        <a href="{{ route('judges.show', ['judge' => $judge->id]) }}" target="_blank"><img src="{{ $judge->avatar_url }}" alt="{{ $judge->name }}"></a>
                    </div>
                    <h4>{{ $judge->name }}</h4>
                    <p>{{ $judge->company }}</p>
                    <p>{{ $judge->title }}</p>
                </div>
            @endforeach
        </div>
        <div class="float-right">{{ $judges->render() }}</div>
    </div>
</section>
@stop
