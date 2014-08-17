<!DOCTYPE html>
<html lang="en" ng-app="app" class="app-wrapper">
<head>
    <meta charset="UTF-8">
    <title>{{$appName}} :: Ted Mathew dela Cruz</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <div class="container app" ng-controller="AppController">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>
                    <i class="app-github-icon fa fa-github-alt fa-2x"></i>
                </h1>
                <form method="get" action="" role="form" autocomplete="off" ng-submit="getUser()">
                    <div class="form-group">
                        <input type="text" ng-model="query" class="app-username-input form-control input-lg" name="username" placeholder="GitHub Username">
                    </div>
                </form>
            </div>
        </div>
        <div class="row" ng-if="queryResult">
            <div class="col-md-12 user-card" ng-model="user">
                <div class="user-card-inner clearfix">
                    <div class="user-card-header">
                        <img class="user-card-avatar" src="<% user.avatar_url %>" alt="<% user.login %>">
                        <strong class="user-card-username"><a href="<% user.url %>"><% user.login %></a></strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="row hide">
            <div class="col-md-4 repo-card">
                <div class="repo-card-inner clearfix">
                    <div class="repo-card-header">
                        <strong class="repo-card-name"><a href="#">Repository Name</a></strong>
                        <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo a, eveniet tempora veritatis hic nostrum cum et beatae nesciunt, laboriosam quidem, deserunt, corrupti deleniti magnam mollitia ad doloribus! Facere, ab.</p>
                        <div class="row-fluid">
                            <div class="repo-user-details">
                                <a href="#" class="btn btn-info btn-lg repo-card-analyze-btn">Analyze</a>
                            </div>
                        </div>
                    </div>
                    <div class="repo-card-desc small">
                        <p><% repo.owner.description %></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" ng-if="repos.length > 0">
            <div class="col-md-4 repo-card" ng-repeat="repo in repos" ng-model="repos">
                <div class="repo-card-inner clearfix">
                    <div class="repo-card-header">
                        <div>
                            <strong class="repo-card-name"><% repo.name %></strong>
                        </div>
                        <p class="small"><% repo.description %></p>
                        <div>
                            <a href="{{route('data.analyze')}}/<% repo.name %>" class="btn btn-info btn-lg repo-card-analyze-btn">Analyze</a>
                        </div>
                    </div>
                    <div class="repo-card-desc small">
                        <p><% repo.owner.description %></p>
                    </div>
                </div>
            </div>
        </div>
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
