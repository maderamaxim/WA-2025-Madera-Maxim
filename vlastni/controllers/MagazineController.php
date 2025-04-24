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
                header("Location: ../controllers/magazine_list.php");
                exit();
            } else {
                echo "Chyba při ukládání knihy.";
            }
        }
    }

    public function listMagazines() {
        $magazines = $this->magazineModel->getAll();
        include '../views/magazine_list.php';
    }
}

// Volání metody při odeslání formuláře
$controller = new MagazineController();
$controller->createMagazine();