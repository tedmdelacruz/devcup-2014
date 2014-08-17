<?php

class HomeController extends BaseController {

    public function getIndex()
    {
        return View::make('hello');
    }

    public function getApp()
    {
        return View::make('app');
    }

}
