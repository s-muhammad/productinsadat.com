@extends('layouts.app')
@section('content')
    <div class="account-box-headline remembers-passwords">
        تغییر رمز عبور
    </div>
    <div class="account-box-content">
        <form action="{{ route('password.update') }}" class="form-account" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-account-title">
                <div class="form-account-title">
                    <label for="password">ایمیل</label>
                    <input id="email" type="email" class="password-input " disabled name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    <span class="mdi mdi-mail"></span>
                </div>
            </div>
            <div class="form-account-title">
                <div class="form-account-title">
                    <label for="password">رمز عبور جدید</label>
                    <input type="password" class="password-input" name="password" required autocomplete="new-password" placeholder="رمز عبور خود را وارد نمایید">
                    <span class="mdi mdi-lock"></span>
                </div>
            </div>
            <div class="form-account-title">
                <div class="form-account-title">
                    <label for="password">تکرار رمز عبور جدید</label>
                    <input id="password-confirm" type="password" class="password-input" name="password_confirmation" required autocomplete="new-password" placeholder="رمز عبور خود را وارد نمایید">
                    <span class="mdi mdi-lock"></span>
                </div>
            </div>
            <div class="parent-btn">
                <button type="submit" class="dk-btn dk-btn-info">
                    تغییر رمز عبور
                    <i class="fa fa-refresh"></i>
                </button>
            </div>
        </form>
    </div>
@endsection
