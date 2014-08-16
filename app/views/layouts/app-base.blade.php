<!DOCTYPE html>
<html lang="en" ng-app="app" class="app-wrapper">
<head>
    <meta charset="UTF-8">
    <title>{{$appName}} :: Ted Mathew dela Cruz</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    @if ($env === 'production')
        <script type="text/javascript" src="{{asset('js/scripts.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/app.min.js')}}"></script>
    @else
        <script src="//localhost:35729/livereload.js"></script>
        <script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    @endif
</body>
</html>