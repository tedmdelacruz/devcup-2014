<?php

class BaseController extends Controller {

    public $env;
    public $appName;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{

        $this->env = App::environment();
        View::share('env', $this->env);

        $this->appName = Config::get('app.name');
        View::share('appName', $this->appName);

		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
