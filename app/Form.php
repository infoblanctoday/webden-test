<?php

/**
 * 
 */

class Form
{
	protected $path = __DIR__ . '/../views/';

	public function userDetails()
	{
		return 0;
	}

	public function display($view)
	{
		require $this->path . $view . '.php';
	}
}