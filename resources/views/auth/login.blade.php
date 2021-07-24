@extends('layouts.app')
@section('content')
    <div class="account-box-headline">
        <a href="{{ route('login') }}" class="login-ds active-account">ورود</a>
        <a href="{{ route('register') }}" class="register-ds">ثبت نام</a>
    </div>
    <div class="account-box-content">
    <form method="POST" action="{{ route('login') }}" class="form-account">
        @csrf
        <div class="form-account-title">
            <label for="email">ایمیل</label>
            <input id="email" type="email" class="number-email-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="ایمیل خود را وارد نمایید">
            <span class="mdi mdi-account-outline"></span>
        </div>
        <div class="form-account-title">
            <label for="password">رمز عبور</label>
            <input id="password" type="password" class="password-input" name="password" required autocomplete="current-password" placeholder="رمز عبور خود را وارد نمایید">
            <span class="mdi mdi-lock"></span>
        </div>
        <div class="form-auth-row">
            <label for="#" class="ui-checkbox">
                <input type="checkbox" value="1" name="remember" checked="" id="remember">
                <span class="ui-checkbox-check"></span>
            </label>
            <label for="remember" class="remember-me">مرا به خاطر داشته باش</label>
        </div>
        <div class="parent-btn lr-ds">
            <button class="dk-btn dk-btn-info" type="submit">
                ورود
                <i class="fa fa-sign-in sign-in"></i>
            </button>
        </div>
        <div class="forget-password">
            <a href="{{ route('password.request') }}" class="account-link-password">رمز خود را فراموش کرده ام</a>
        </div>
    </form>
    </div>
@endsection
