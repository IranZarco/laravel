<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script> scr="{{asset('js/jquery-3.7.1.js')}}"</script>
    <script> scr="{{asset('js/bootstrap.js')}}"</script>
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>