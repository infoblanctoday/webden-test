<?php

// Show errors
error_reporting(E_ALL);
ini_set('desplay_errors', 1);

// Require db config and autoloaded classes
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../app/Form.php';
require __DIR__ . '/../app/DB.php';

$form = new Form;

if (!empty($_POST)) {
	$form->process($_POST);
}else{
	$form->display('index');
}