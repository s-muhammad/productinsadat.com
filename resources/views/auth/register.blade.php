@extends('layouts.app')
@section('content')
    <div class="account-box-headline">
        <a href="{{ route('login') }}" class="login-ds">ورود</a>
        <a href="{{ route('register') }}" class="register-ds active-account">ثبت نام</a>
    </div>
    <div class="account-box-content">
    <form action="{{ route('register') }}" class="form-account" method="post">
        @csrf
        <div class="form-account-title">
            <label for="email-phone">نام و نام خانوادگی</label>
            <input type="text" class="number-email-input" name="name" placeholder=" نام و نام خانوادگی خود را وارد نمایید" value="{{ old('name') }}" required>
            <span class="mdi mdi-account-outline"></span>
        </div>
        <div class="form-account-title">
            <label for="email-phone">ایمیل</label>
            <input type="text" class="number-email-input" name="email" placeholder=" ایمیل خود را وارد نمایید" value="{{ old('email') }}" required>
            <span class="mdi mdi-mail"></span>
        </div>
        <div class="form-account-title">
            <label for="email-phone">شماره موبایل</label>
            <input type="text" class="number-email-input" name="phone_number" placeholder=" شماره موبایل خود را وارد نمایید" value="{{ old('phone_number') }}">
            <span class="mdi mdi-phone"></span>
        </div>
        <div class="form-account-title">
            <label for="password">کلمه عبور</label>
            <input type="password" class="password-input" placeholder="کلمه عبور خود را وارد نمایید" name="password" required>
            <span class="mdi mdi-lock"></span>
        </div>
        <div class="form-account-title">
            <label for="password">تکرار کلمه عبور</label>
            <input type="password" class="password-input" placeholder="کلمه عبور خود را دوباره وارد نمایید" name="password_confirmation" required>
            <span class="mdi mdi-lock"></span>
        </div>
        <div class="form-auth-row">
            <label for="#" class="ui-checkbox">
                <input type="checkbox" value="1" name="login" checked="" id="remember">
                <span class="ui-checkbox-check"></span>
            </label>
            <label for="remember" class="remember-me"><a href="#">حریم خصوصی</a> و <a href="#">شرایط قوانین</a>استفاده از سرویس های سایت  را مطالعه نموده و با کلیه موارد آن موافقم.</label>
        </div>
        <div class="parent-btn lr-ds">
            <button class="dk-btn dk-btn-info" type="submit">
                ثبت نام
                <i class="fa fa-sign-in sign-in"></i>
            </button>
        </div>
    </form>
    </div>
@endsection
