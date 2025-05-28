<?php
require_once '../models/Database.php';
require_once '../models/Magazine.php';

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getConnection();
    $magazineModel = new Magazine($db);

    $id = (int)$_GET['id'];

    if ($magazineModel->delete($id)) {
        header("Location: magazine_list.php");
        exit();
    } else {
        echo "Chyba při mazání periodika.";
    }
} else {
    header("Location: magazine_list.php");
    exit();
}