@extends('layouts.app')
@section('title', '重设密码')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="password-reset-wrapper">
                <div class="password-reset-container">
                    <p class="password-reset-type-item">{{ __('Reset Password') }}<span class="password-reset-type-line"></span></p>
                    <form method="POST" action="{{ route('password.update') }}" id="password-reset-form">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mt-5">
                            <div class="emailWrapper mb-5">
                                <p class="inputText">{{ __('E-Mail Address') }}</p>
                                <div class="inputBox @error('email') alert @enderror">
                                    <input type="text" id="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
                                    <p class="inputAlert hasTitle">@if($errors->has('email')) {{ $errors->first('email') }}@else{{ __('Please Type Correct') }}{{ __('E-Mail Address') }}@endif</p>
                                </div>
                            </div>
                            <div class="passwordWrapper mb-5">
                                <p class="inputText">{{ __('Password') }}</p>
                                <div class="inputBox @error('password') alert @enderror">
                                    <input type="password" id="password" name="password" required autocomplete="new-password">
                                    <p class="inputAlert hasTitle">@if($errors->has('password')) {{ $errors->first('password') }}@else{{ __('Please Type Correct') }}{{ __('Password') }}@endif</p>
                                </div>
                            </div>
                            <div class="passwordConfirmWrapper mb-4">
                                <p class="inputText">{{ __('Confirm Password') }}</p>
                                <div class="inputBox @error('password_confirmation') alert @enderror">
                                    <input type="password" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                                    <p class="inputAlert hasTitle">{{ __('Please Type Correct') }}{{ __('Password') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="password-reset-btn">{{ __('Reset Password') }}</div>
                    </form>
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
            if($('#password-confirm').val()) {
                $('#password-confirm').parent().prev().addClass('inputTextFocus');
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
            $('#password-confirm').focusin(function() {
                $(this).parent().prev().addClass('inputTextFocus');
                $(this).parent().removeClass('alert');
                if($('#email').val()) {
                    $('#email').parent().removeClass('alert');
                }
            });
            $('#password-confirm').focusout(function() {
                if(!$(this).val()) {
                    $(this).parent().prev().removeClass('inputTextFocus');
                    $(this).parent().addClass('alert');
                }
            });

            //  password reset button event
            $('.password-reset-btn').click(function() {
                if(!$('#email').val()) {
                    $('.emailWrapper .inputBox').addClass('alert');
                    return false;
                }
                if(!$('#password').val()) {
                    $('.passwordWrapper .inputBox').addClass('alert');
                    return false;
                }
                if(!$('#password-confirm').val()) {
                    $('.passwordConfirmWrapper .inputBox').addClass('alert');
                    return false;
                }
                $('#password-reset-form').submit();
            });
        });
    </script>
@stop
