@extends('layouts.app')

@section('title', '错误')

@section('content')
    <div class="container" style="padding: 120px 0;">
        <div class="card">
            <div class="card-header">错误</div>
            <div class="card-body text-center">
                <h1 class="my-5">{{ $msg }}</h1>
                <a href="{{ route('root') }}" class="btn btn-primary">返回首页</a>
            </div>
        </div>
    </div>
@endsection
