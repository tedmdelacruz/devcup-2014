<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code :: Ted Mathew dela Cruz</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    @if ($env === 'local')
        <script src="//localhost:35729/livereload.js"></script>
    @endif
    <script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>
</body>
</html>