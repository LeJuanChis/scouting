<?php

require 'config/database.php';
include 'functions.php';
include '../vendor/autoload.php';

use Model\Crud;

$db = conectarDB();

Crud::setDb($db);
