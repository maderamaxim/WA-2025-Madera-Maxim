<?php
require_once '../models/Database.php';
require_once '../models/Magazine.php';

$database = new Database();
$db = $database->getConnection();
$magazineModel = new Magazine($db);
$magazines = $magazineModel->getAll();

include '../views/magazine_list.php';