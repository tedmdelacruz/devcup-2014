@extends('layouts.app-base')
@section('content')
    <div class="row">
        <div class="app col-md-6 col-md-offset-3">
            <i class="app-github-icon fa fa-github-alt fa-5x"></i>
            <form method="post" role="form">
                <div class="form-group">
                    <input type="text" class="app-username-input form-control input-lg" name="username" placeholder="GitHub Username">
                </div>
            </form>
        </div>
    </div>
@stop