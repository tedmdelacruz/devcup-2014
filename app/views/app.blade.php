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
                <div class="app-header">
                    <i class="app-github-icon fa fa-github-alt fa-2x"></i>
                    <h1>
                        {{$appName}}
                    </h1>
                    <em class="small">Find out what happened back in time during your commits</em>
                </div>
                <ul class="info-list" ng-model="infos" ng-repeat="info in infos" ng-if="infos.length > 0">
                    <li class="info alert"><% info %></li>
                </ul>
                <ul class="error-list" ng-model="errors" ng-repeat="error in errors" ng-if="errors.length > 0">
                    <li class="error alert alert-danger"><% error %></li>
                </ul>
                <form method="get" action="" role="form" autocomplete="off" ng-submit="getUser()">
                    <div class="form-group">
                        <input type="text" ng-model="query" class="app-username-input form-control input-lg" name="username" placeholder="GitHub Username">
                    </div>
                </form>
            </div>
        </div>
        <div class="row" ng-if="queryResult">
            <div class="col-md-12 card user-card" ng-model="user">
                <div class="user-card-inner card-inner clearfix">
                    <div class="user-card-header">
                        <img class="user-card-avatar" src="<% user.avatar_url %>" alt="<% user.login %>">
                        <strong class="user-card-username"><% user.login %></strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" ng-if="repos.length > 0">
            <div class="col-md-4 card repo-card" ng-repeat="repo in repos" ng-model="repos" ng-click="fetchCommits(repo)">
                <div class="repo-card-inner card-inner clearfix">
                    <div class="repo-card-header">
                        <div class="repo-card-name">
                            <strong><% repo.name %></strong>
                        </div>
                        <p class="small"><% repo.description %></p>
                    </div>
                    <div class="repo-card-desc small">
                        <p><% repo.owner.description %></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" ng-if="commits.length > 0" ng-model="commits">
            <div class="col-md-12 card commit-card" ng-repeat="commit in commits">
                <div class="commit-card-inner card-inner clearfix">
                    <strong><% commit.message %></strong> <em><% commit.date %></em>
                    <ul class="commit-card-commit">
                        <li ng-repeat="entry in commit.results" ng-bind-html="commit.results"><% entry %></li>
                    </ul>
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
