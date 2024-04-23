<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="..."/>
    <meta name="author" content="..."/>
    <meta name="keyword" content="..."/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('Website/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Website/css/sign.css')}}">
</head>
<body>

<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">

    <div class="signup">

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label for="chk" aria-hidden="true">Sign up</label>

            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" >
            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username">
            <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password">
            <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password">
            <button type="submit">Sign up</button>
        </form>
    </div>

    <div class="login">
        <form method="POST" action="{{ route('login.user') }}">
            @csrf
            <label for="email"  aria-hidden="true">Login</label>
            <input type="email" name="email" placeholder="Email"  :value="old('email')" required autofocus>
            <input type="password" name="password" required autocomplete="current-password">
            <button type="submit">Login</button>
        </form>
    </div>
</div>

<!-- Ensure correct path to the Bootstrap JavaScript file -->
<script src="{{asset('Website/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
