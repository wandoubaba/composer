<?php
namespace www\controller;

use core\View;
use Gregwar\Captcha\CaptchaBuilder;

class Index
{
	protected $view;

	public function __construct()
	{
		$this->view = new View;
	}
	public function show() {

		return $this->view->make('index')->with('version','1.0');
	}

	public function post() {
		echo "post";
	}

	public function code() {
		header('Content-type: image/jpeg');
		$builder = new CaptchaBuilder;
		$_SESSION['phrase'] = $builder->getPhrase();
		$builder->build(200,50);
		$builder->output();
	}
}