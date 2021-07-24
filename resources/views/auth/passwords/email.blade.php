@extends('layouts.app')
@section('content')
        <div class="account-box-headline remembers-passwords">
            یاد آوری کلمه عبور
        </div>
        <div class="account-box-content">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}" class="form-account">
                @csrf
                <div class="form-account-title">
                    <label for="email-phone">پست الکترونیک </label>
                    <input id="email" type="email" class="number-email-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="پست الکترونیک خود را وارد نمایید">
                    <span class="mdi mdi-account-outline"></span>
                </div>
                <div class="parent-btn">
                    <button type="submit" class="dk-btn dk-btn-info">
                          ارسال لینک بازیابی
                        <i class="mdi mdi-lock"></i>
                    </button>
                </div>
            </form>
        </div>
@endsection
