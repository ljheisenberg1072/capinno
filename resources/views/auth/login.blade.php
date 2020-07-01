@extends('layouts.app')
@section('title', '密码登录')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="login-wrapper">
            <div class="login-container">
                <p class="login-type-item">{{ __('Password Login') }}<span class="login-type-line"></span></p>
                <form method="POST" action="{{ route('login') }}" id="login-form">
                    @csrf

                    <div class="mt-5">
                        <div class="emailWrapper mb-5">
                            <p class="inputText">{{ __('E-Mail Address') }}</p>
                            <div class="inputBox @error('email') alert @enderror">
                                <input type="text" id="email" name="email" value="{{ old('email') }}" required autocomplete="off">
                                <p class="inputAlert hasTitle">@if($errors->has('email')) {{ $errors->first('email') }}@else{{ __('Please Type Correct') }}{{ __('E-Mail Address') }}@endif</p>
                            </div>
                        </div>
                        <div class="passwordWrapper mb-4">
                            <p class="inputText">{{ __('Password') }}</p>
                            <div class="inputBox @error('password') alert @enderror">
                                <input type="password" id="password" name="password" required autocomplete="new-password">
                                <i class="iconfont icon-eye eye"></i>
                                <p class="inputAlert hasTitle">@if($errors->has('password')) {{ $errors->first('password') }}@else{{ __('Please Type Correct') }}{{ __('Password') }}@endif</p>
                            </div>
                        </div>
                        <div class="form-check password-operate">
                            <input class="form-check-input mt-0" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>
                    </div>
                    <div class="login-btn">{{ __('Login') }}</div>
                </form>
                <p class="tips">{{ __('Not Account Yet?') }}<a href="{{ route('register') }}">{{ __('Immediately Register') }}</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scriptsAfterJs')
    <script>
        $(document).ready(function() {

            //  password login
            if($('#email').val()) {
                $('#email').parent().prev().addClass('inputTextFocus');
            }
            if($('#password').val()) {
                $('#password').parent().prev().addClass('inputTextFocus');
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
            $('#password').focusin(function() {
                $(this).parent().prev().addClass('inputTextFocus');
                $(this).parent().removeClass('alert');
                if($('#email').val()) {
                    $('#email').parent().removeClass('alert');
                }
            });
            $('#password').focusout(function() {
                if(!$(this).val()) {
                    $(this).parent().prev().removeClass('inputTextFocus');
                    $(this).parent().addClass('alert');
                }
            });

            //  password show and hidden
            $('.eye').click(function() {
                if($(this).hasClass('icon-eye')) {
                    $(this).removeClass('icon-eye');
                    $(this).addClass('icon-eye1');
                    $('#password').attr({'type': 'text'});
                }else {
                    $(this).removeClass('icon-eye1');
                    $(this).addClass('icon-eye');
                    $('#password').attr({'type': 'password'});
                }
            });

            // remember password
            $('#remember').click(function() {
                if($(this).prop('checked')) {
                    $(this).next().css({'color': '#666'});
                }else {
                    $(this).next().css({'color': '#999'});
                }
            });

            //  login button event
            $('.login-btn').click(function() {
                if(!$('#email').val()) {
                    $('.emailWrapper .inputBox').addClass('alert');
                    return false;
                }
                if(!$('#password').val()) {
                    $('.passwordWrapper .inputBox').addClass('alert');
                    return false;
                }
                $('#login-form').submit();
            });
        });
    </script>
@stop
