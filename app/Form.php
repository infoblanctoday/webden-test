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
		if ($method == 'string') {
			if (is_string($str)) {
				if (!empty($str)) {
					$str = trim($str);
					$str = htmlspecialchars($str);
					if (!preg_match('/[^A-Za-z]/', $str)){
						if (strlen($str) >= 2 && strlen($str) < 25) {
							return true;
						}
					}
					return false;
				}
				return false;
			}
			return false;
		}
		return false;
	}

}