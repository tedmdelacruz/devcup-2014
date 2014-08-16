<?php

class HomeController extends BaseController {

    public function getIndex()
    {
        return View::make('hello');
    }

    public function getLanding()
    {
        return View::make('landing');
    }

}
