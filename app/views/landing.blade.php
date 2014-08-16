@extends('layouts.app-base')
@section('content')
    <div class="row">
        <div class="landing col-md-6 col-md-offset-3">
            <i class="landing-github-icon fa fa-github-alt fa-5x"></i>
            <form method="post" role="form">
                <div class="form-group">
                    <input type="text" class="form-control input-lg" name="username" placeholder="GitHub Username">
                </div>
            </form>
            {{ 1 + 1 }}
        </div>
    </div>
@stop