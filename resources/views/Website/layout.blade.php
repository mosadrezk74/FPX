
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="..."/>
    <meta name="author" content="..."/>
    <meta name="keyword" content="..."/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        Footy Prospects X
    </title>
    <link rel="stylesheet" href="{{ asset('Website/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Website/assets/css/bootstrap.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('Website/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Website/assets/css/animate.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300&display=swap" rel="stylesheet">
</head>
<body>

@yield('content')











<script src="{{asset('Website/assets/js/main.js')}}"></script>
<script src="{{asset('Website/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Website/assets/js/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>
<!--
<script>
  function toggleNavbar(){
    var navbar = document.getElementById("navbar");
    navbar.style.display = (navbar.style.display === "none") ? "block": "none";
  }
</script>-->

</body>
</html>
