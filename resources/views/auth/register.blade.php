@extends('layouts.app')
@section('title', '邮箱注册')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="register-wrapper">
                <div class="register-container">
                    <p class="register-type-item">{{ __('E-Mail Address Register') }}<span class="register-type-line"></span></p>
                    <form method="POST" action="{{ route('register') }}" id="register-form">
                        @csrf

                        <div class="text-center mt-5">
                            <div class="emailWrapper mb-5">
                                <p class="inputText">{{ __('E-Mail Address') }}</p>
                                <div class="inputBox @error('email') alert @enderror">
                                    <input type="text" id="email" name="email" value="{{ old('email') }}" required autocomplete="off">
                                    <p class="inputAlert hasTitle">@if($errors->has('email')) {{ $errors->first('email') }}@else{{ __('Please Type Correct') }}{{ __('E-Mail Address') }}@endif</p>
                                </div>
                            </div>
                            <div class="captchaWrapper mb-5">
                                <p class="inputText">{{ __('Captcha') }}</p>
                                <div class="inputBox @error('captcha') alert @enderror">
                                    <input type="text" id="captcha" name="captcha" required autocomplete="off">
                                    <div style="position: absolute;top: 0;right: 0;cursor: pointer;"><img class="captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="{{ __('Click Image To Accept New Captcha') }}"></div>
                                    <p class="inputAlert hasTitle">@if($errors->has('captcha')) {{ $errors->first('captcha') }}@else{{ __('Please Type Correct') }}{{ __('Captcha') }}@endif</p>
                                </div>
                            </div>
                            <div class="passwordWrapper mb-4">
                                <p class="inputText">{{ __('Set Password') }}</p>
                                <div class="inputBox @error('password') alert @enderror">
                                    <input type="password" maxlength="18" id="password" name="password" required autocomplete="new-password">
                                    <i class="iconfont icon-eye eye"></i>
                                    <p class="inputAlert hasTitle">@if($errors->has('password')) {{ $errors->first('password') }}@else{{ __('Please Type At Least Eight Number Password') }}@endif</p>
                                </div>
                            </div>
                            <div class="register-operate">
                                <label class="form-check-label">{{__('Register Present You Have Read And Agree')}}</label><a href="#">{{__('CAPINNO Agreement')}}</a>
                            </div>
                        </div>
                        <div class="register-btn">{{ __('Register') }}</div>
                    </form>
                    <p class="register-tips">{{ __('Existing Account?') }}<a href="{{ route('login') }}">{{ __('Immediately Login') }}</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptsAfterJs')
    <script>
        $(document).ready(function() {

            //  email register
            if($('#email').val()) {
                $('#email').parent().prev().addClass('inputTextFocus');
            }
            if($('#captcha').val()) {
                $('#captcha').parent().siblings('.inputText').addClass('inputTextFocus');
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
            $('#captcha').focusin(function() {
                $(this).parent().siblings('.inputText').addClass('inputTextFocus');
                $(this).parent().removeClass('alert');
            });
            $('#captcha').focusout(function() {
                if(!$(this).val()) {
                    $(this).parent().siblings('.inputText').removeClass('inputTextFocus');
                    $(this).parent().addClass('alert');
                }
            });
            $('#password').focusin(function() {
                $(this).parent().prev().addClass('inputTextFocus');
                $(this).parent().removeClass('alert');
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

            //  register button event
            const email_regex = /\w[-\w.]*@([A-Za-z0-9][-\w]*\.)+[A-Za-z]+/;
            $('.register-btn').click(function() {
                if(!$('#email').val()) {
                    $('#email').parent().addClass('alert');
                    return false;
                }
                if(!email_regex.test($('#email').val())) {
                    $('#email').parent().addClass('alert');
                    return false;
                }
                if(!$('#captcha').val()) {
                    $('#captcha').parent().addClass('alert');
                    return false;
                }
                if(!$('#password').val()) {
                    $('#password').parent().addClass('alert');
                    return false;
                }
                if($('#password').val().length < 8) {
                    $('#password').parent().prev().addClass('inputTextFocus');
                    $('#password').parent().addClass('alert');
                    return false;
                }
                $('#register-form').submit();
            });
        });
    </script>
@stop
