<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code :: Ted Mathew dela Cruz</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootflat.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="span2">
                <form method="post">
                    <input type="text" name="username" placeholder="Username" class="form-control">
                    <input type="password" class="form-control">
                    <input type="submit" value="Login" class="btn btn-primary btn-large">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>
</body>
</html>