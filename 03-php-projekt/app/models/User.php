<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($username, $email, $name, $surname, $password_hash) {
        
        // Chrání proti SQL injekci (bezpečnější než přímé vložení hodnot).
        $sql = "INSERT INTO users (username, email, name, surname, password_hash) 
                VALUES (:username, :email, :name, :surname, :password_hash)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':name' => $name,
            ':surname' => $surname,
            ':password_hash' => $password_hash]);
    }

    public function getAll() {
        $sql = "SELECT * FROM users ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $username, $email, $name, $surname, $password_hash) {
        $sql = "UPDATE users 
                SET username = :username,
                    email = :email,
                    name = :name,
                    surname = :surname,
                    password_hash = :password_hash,
                WHERE id = :id";
    
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':username' => $username,
            ':email' => $email,
            ':name' => $name,
            ':surname' => $surname,
            ':password_hash' => $password_hash,
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

}