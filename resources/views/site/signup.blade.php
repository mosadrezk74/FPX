<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta name="description" content="..."/>
    <meta name="author" content="..."/>
    <meta name="keyword" content="..."/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css.map')}}">
    <link rel="stylesheet" href="{{asset('site/css/signup.css')}}">
  </head>
  <body>



  <div class="main">
      <input type="checkbox" id="chk" aria-hidden="true">

      <div class="signup" >
          <form method="post" action="{{route('register')}}" >
              @csrf
              <label for="chk" aria-hidden="true">Sign up</label>
              <input  id="name "    type="text" name="name" :value="old('name')" autofocus autocomplete="name"  placeholder="Username" required>
              <input  id="email"    type="email" name="email" :value="old('email')" required autocomplete="username"  placeholder="Email">
              <input  id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password">
              <input  id="password_confirmation"  type="password" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm Password">

              <button type="submit">Sign up</button>
          </form>
      </div>

      <div class="login">
          <form method="POST" action="{{ route('login.user') }}">
              @csrf
              <label for="chk" aria-hidden="true">Login</label>
              <input type="email" name="email" placeholder="Email" style="color: black" class="text-dark" :value="old('email')" required autofocus>
              <input type="password" name="password" placeholder="Password" style="color: black" required autocomplete="current-password">
              <button type="submit">Login</button>
          </form>
      </div>

  </div>


 <script src="{{asset('site/js/bootstrap.js')}}"></script>
 <script src="{{asset('site/js/main.js')}}"></script>
  </body>
</html>


