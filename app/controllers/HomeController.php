<?php

class HomeController extends BaseController {

    protected $layout = 'layouts.master';

    public function getIndex()
    {
        $this->layout->content = View::make('home');
    }

}
