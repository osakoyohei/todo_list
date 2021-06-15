@extends('layouts.layout')
@section('title', 'ログインフォーム')
@section('content')
@push('css')
    <!-- form.css -->
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">

    <!-- reCAPTCHA v2 -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script> 
@endpush
<main class="form-signin">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">ログインフォーム</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <x-alert type="success" :session="session('success')"/>
        <x-alert type="danger" :session="session('danger')"/>
        
        <div class="form-floating">
            <label for="floatingInput">メールアドレス</label>
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="メールアドレス">
        </div>
        <br>
        <div class="form-floating">
            <label for="floatingPassword">パスワード</label>
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="パスワード">
        </div>
        <br>
        <div class="form-floating">
            <div class="g-recaptcha" data-sitekey="6Lc0bzEbAAAAALLO2Aoz2zW5i94i6INywigbzDMJ"></div>
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">ログイン </button>
    </form>
</main>
@endsection