<?php
require_once '../models/Database.php';
require_once '../models/Magazine.php';

class MagazineController {
    private $db;
    private $magazineModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->magazineModel = new Magazine($this->db);
    }

    public function createMagazine() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $year = intval($_POST['year']);
            $issn = htmlspecialchars($_POST['issn']);
            $description = htmlspecialchars($_POST['description']);

            if ($this->magazineModel->create($name, $year, $issn, $description)) {
                header("Location: magazine_list.php");
                exit();
            } else {
                echo "Chyba při ukládání periodika.";
            }
        }
    }

    public function listMagazines() {
        $magazines = $this->magazineModel->getAll();
        include '../views/magazine_list.php';
    }

    public function editMagazine() {
        if (isset($_GET['edit'])) {
            $id = (int)$_GET['edit'];
            $magazine = $this->magazineModel->getById($id);
            if ($magazine) {
                include '../views/magazines_edit_delete.php';
            } else {
                header("Location: magazine_list.php");
                exit();
            }
        }
    }

    public function updateMagazine() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = (int)$_POST['id'];
            $name = htmlspecialchars($_POST['name']);
            $year = (int)$_POST['year'];
            $issn = htmlspecialchars($_POST['issn']);
            $description = htmlspecialchars($_POST['description'] ?? '');

            if ($this->magazineModel->update($id, $name, $year, $issn, $description)) {
                header("Location: magazine_list.php");
                exit();
            } else {
                echo "Chyba při aktualizaci periodika.";
            }
        }
    }

    public function deleteMagazine() {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            if ($this->magazineModel->delete($id)) {
                header("Location: magazine_list.php");
                exit();
            } else {
                echo "Chyba při mazání periodika.";
            }
        }
    }
}

// Volání metody při odeslání formuláře
$controller = new MagazineController();
$controller->createMagazine();