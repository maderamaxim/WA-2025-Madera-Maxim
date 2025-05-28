<?php
require_once '../models/Database.php';
require_once '../models/Magazine.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    $db = $database->getConnection();
    $magazineModel = new Magazine($db);

    $name = htmlspecialchars($_POST['name']);
    $year = (int)$_POST['year'];
    $issn = htmlspecialchars($_POST['issn']);
    $description = htmlspecialchars($_POST['description'] ?? '');

    if ($magazineModel->create($name, $year, $issn, $description)) {
        header("Location: magazine_list.php");
        exit();
    } else {
        echo "Chyba při ukládání periodika.";
    }
} else {
    header("Location: magazine_list.php");
    exit();
} 