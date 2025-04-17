<?php
    require_once '../models/Database.php';
    require_once '../models/Magazine.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = (int)$_POST['id'];
        $title = htmlspecialchars($_POST['name']);
        $year = intval($_POST['year']);
        $issn = htmlspecialchars($_POST['issn']);

        $db = (new Database())->getConnection();
        $magazineModel = new Magazine($db);

        $success = $magazineModel->update(
            $id,
            $title,
            $year,
            $issn,
        );

        if ($success) {
            header("Location: ../views/books/magazines_edit_delete.php");
            exit();
        } else {
            echo "Chyba při aktualizaci knihy.";
        }
    } else {
        echo "Neplatný požadavek.";
    }