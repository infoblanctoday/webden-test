<?php

// Show errors
error_reporting(E_ALL);
ini_set('desplay_errors', 1);

// Require db config and autoloaded classes
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../app/Form.php';

$form = new Form;

$form->display('index');

// var_dump($router);