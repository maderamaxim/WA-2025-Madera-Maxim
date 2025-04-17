<?php
require_once '../models/Database.php';
require_once '../models/User.php';

class UserController {
    private $db;
    private $userModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->userModel = new User($this->db);
    }

    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $name = htmlspecialchars($_POST['name']);
            $surname = htmlspecialchars($_POST['surname']);
            $password_hash = htmlspecialchars($_POST['password_hash']);


            // Uložení knihy do DB - dočasné řešení, než budeme mít výpis knih
            if ($this->userModel->create($username, $email, $name, $surname, $password_hash)) {
                header("Location: ../view/auth/login.php");
                exit();
            } else {
                echo "Chyba při ukládání uživatele.";
            }
        }
    }

    public function listUsers() {
        $users = $this->userModel->getAll();
        include '../views/books/book_list.php';
    }
}

// Volání metody při odeslání formuláře
$controller = new UserController();
$controller->createUser();