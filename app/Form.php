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
		$database = new DB();
		$database->query('SELECT * FROM forms');
		$table = $database->resultset();

		require $this->path . $view . '.php';
	}

	public function process($post)
	{
		if (isset($_GET['action'])) {
			$action = $_GET['action'];
			return $this->$action($_POST);
		}
		return false;
	}

	public function submit($data)
	{
		$database = new DB();
		$database->query('INSERT INTO forms (name, surname) VALUES (:name, :surname)');
		
		if ($this->validate($data["name"], 'string') && $this->validate($data["surname"], 'string')) {
			$database->bind(':name', $data["name"]);
			$database->bind(':surname', $data["surname"]);
			$database->execute();

			$r = 'success';
		}else{
			$r = 'error';
		}

		echo json_encode($r);
	}

	protected function validate($str, $method)
	{
		return true;
	}

}