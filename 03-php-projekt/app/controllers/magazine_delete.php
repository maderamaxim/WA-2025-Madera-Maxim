<?php
    require_once '../models/Database.php';
    require_once '../models/Magazine.php';

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        $db = (new Database())->getConnection();
        $magazineModel = new Magazine($db);

        if ($magazineModel->delete($id)) {
            header("Location: ../views/books/magazines_edit_delete.php");
            exit();
        } else {
            echo "Chyba při mazání knihy.";
        }
    } else {
        echo "Neplatný požadavek.";
    }