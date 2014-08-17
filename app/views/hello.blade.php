<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code :: Ted Mathew dela Cruz</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="hello col-md-8 col-md-offset-2">
                <h1>Hello</h1>
                <hr>
                <p class="lead"><a href="{{route('home.app')}}">{{$appName}}</a> is the hackathon entry of Ted Mathew dela Cruz for the WebGeek 2014 DevCup</p>
                <p class="small"><strong>Powered by:</strong></p>
                <div>
                    <ul class="hello-tools-used list-group small">
                        <li class="list-group-item">PHP 5.5 + Laravel 4.2</li>
                        <li class="list-group-item">MySQL</li>
                        <li class="list-group-item">Sass + Bootstrap 3.2 + Bootflat</li>
                        <li class="list-group-item">GruntJS</li>
                        <li class="list-group-item">Wolfram Alpha API</li> <li class="list-group-item">GitHub API</li>
                    </ul>
                </div>
                <div class="small">
                    <em>I have no idea what I'm doing</em><br>
                    <a href="https://github.com/tedmdelacruz/devcup-2014-boilerplate">GitHub</a><br>
                </div>
            </div>
        </div>
    </div>
    @if ($env === 'local')
        <script src="//localhost:35729/livereload.js"></script>
    @endif
    <script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>
</body>
</html>
