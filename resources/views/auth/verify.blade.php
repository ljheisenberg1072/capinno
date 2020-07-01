@extends('layouts.app')
@section('title', '验证邮箱')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="verification-notice-wrapper">
                <div class="verification-notice-container">
                    <p class="verification-notice-type-item">{{ __('Verify Your Email Address') }}<span class="verification-notice-type-line"></span></p>
                    @if (session('resent'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <div class="mt-5 text-center">
                        <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                        <p>{{ __('If you did not receive the email please check your spam email or login web email check if it is be quarantined') }}</p>
                    </div>
                    <form id="verification-resend" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="verification-notice-btn">{{ __('click here to request another') }}</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptsAfterJs')
    <script>
        $(document).ready(function() {

            //  verification notice button event
            $('.verification-notice-btn').click(function() {
                $('#verification-resend').submit();
            });
        });
    </script>
@stop
