<?php

class BaseController extends Controller {

	public function __construct()
	{
		$this->theme = Theme::uses(Config::get('videoengine.theme'));
		$this->theme->asset()->usePath()->add('core', 'css/style.min.css');
		$this->theme->asset()->usePath()->add('custom', 'css/custom.css');

        $this->theme->asset()->container('alertify-css')->add('alertify-core', 'assets/css/alertify.min.css');
        $this->theme->asset()->container('alertify-css')->add('alertify-theme', 'assets/css/themes/bootstrap.min.css');
        
        $this->theme->asset()->container('alertify-js')->add('alertify-js', 'assets/js/alertify.min.js');
        
		$this->theme->asset()->container('footer')->usePath()->add('main', 'js/main.min.js');
		$this->theme->bind('config', Config::get('videoengine'));
		$this->config = Config::get('videoengine');
		$this->theme->bind('page_title', $this->config['SEO']['home']['hero_unit']);
		$this->theme->bind('active', 'unknown');
		$this->theme->bind('logged_in', Auth::check());
        $this->theme->bind('register_on', $this->config['register_on']);
        $this->theme->bind('user', Confide::user());

		$terms = Term::random(3);

		$this->theme->bind('terms', $terms);
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}