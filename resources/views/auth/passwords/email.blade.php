@extends('layouts.app')
@section('title', '重设密码')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="password-request-wrapper">
                <div class="password-request-container">
                    <p class="password-request-type-item">{{ __('Reset Password') }}<span class="password-request-type-line"></span></p>
                    @if (session('status'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" id="password-request-form">
                        @csrf

                        <div class="mt-5">
                            <div class="emailWrapper mb-5">
                                <p class="inputText">{{ __('E-Mail Address') }}</p>
                                <div class="inputBox @error('email') alert @enderror">
                                    <input type="text" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <p class="inputAlert hasTitle">@if($errors->has('email')) {{ $errors->first('email') }}@else{{ __('Please Type Correct') }}{{ __('E-Mail Address') }}@endif</p>
                                </div>
                            </div>
                        </div>
                        <div class="password-request-btn">{{ __('Send Password Reset Link') }}</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptsAfterJs')
    <script>
        $(document).ready(function() {

            //  password reset
            if($('#email').val()) {
                $('#email').parent().prev().addClass('inputTextFocus');
            }
            $('#email').focusin(function() {
                $(this).parent().prev().addClass('inputTextFocus');
                $(this).parent().removeClass('alert');
            });
            $('#email').focusout(function() {
                if(!$(this).val()) {
                    $(this).parent().prev().removeClass('inputTextFocus');
                    $(this).parent().addClass('alert');
                }
            });

            //  login button event
            $('.password-request-btn').click(function() {
                if(!$('#email').val()) {
                    $('.emailWrapper .inputBox').addClass('alert');
                    return false;
                }
                $('#password-request-form').submit();
            });
        });
    </script>
@stop
