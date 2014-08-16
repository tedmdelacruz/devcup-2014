@extends('layouts.app-base')
@section('content')
    <div class="app">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <i class="app-github-icon fa fa-github-alt fa-5x"></i>
                <form method="post" role="form" autocomplete="off">
                    <div class="form-group">
                        <input type="text" class="app-username-input form-control input-lg" name="username" placeholder="GitHub Username">
                    </div>
                </form>
            </div>
        </div>
        <div class="row hide" ng-controller="UserController">
            <div class="col-md-4 user-card">
                <div class="user-card-inner">
                </div>
            </div>
            <div class="col-md-4 user-card">
                <div class="user-card-inner">
                </div>
            </div>
            <div class="col-md-4 user-card">
                <div class="user-card-inner">
                </div>
            </div>
        </div>
    </div>
@stop