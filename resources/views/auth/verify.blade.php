@extends('layouts.app')
@section('content')
    <div class="account-box-headline welcome-headline">
        <span class="account-headline-title">به فروشگاه پوشاک سادات خوش آمدید</span>
    </div>
    <div class="account-box-content">
<form action="{{ route('verification.resend') }}" class="form-account" method="POST">
    @csrf
    <div class="user-account-welcome">
        <span class="mdi mdi-account-circle-outline"></span>
    </div>
    <div class="made-account">
        <h2>حساب کاربری شما ساخته شد</h2>
        <p>لینک تایید ایمیل برای شما ارسال شد</p>
        @if (session('resent'))
            <p>ایمیل فعال سازی دوباره ارسال شد</p>
        @endif
    </div>
    <div class="parent-btn lr-ds w-ds">
        <button class="dk-btn dk-btn-info" type="submit">
              ارسال دوباره ایمیل
            <i class="mdi mdi-account-outline"></i>
        </button>
    </div>
</form>
    </div>
@endsection
