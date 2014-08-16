@extends('layouts.app-base')
@section('content')
    <div class="row">
        <div class="app col-md-6 col-md-offset-3">
            <i class="app-github-icon fa fa-github-alt fa-5x"></i>
            <form method="post" role="form" autocomplete="off">
                <div class="form-group">
                    <input type="text" class="app-username-input form-control input-lg" name="username" placeholder="GitHub Username">
                </div>
            </form>
            <div ng-controller="UserController">
                <ul class="list-group" ng-repeat='user in users'>
                    <li class="list-group-item">
                        <strong><% user.username%></strong>
                        <small><% user.description%></small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop