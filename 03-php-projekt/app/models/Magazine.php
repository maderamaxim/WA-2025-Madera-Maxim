<?php

class Magazine {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($name, $year, $issn, $description) {
        
        // Dvojtečka označuje pojmenovaný parametr => Místo přímých hodnot se používají placeholdery.
        // PDO je pak nahradí skutečnými hodnotami při volání metody execute().
        // Chrání proti SQL injekci (bezpečnější než přímé vložení hodnot).
        $sql = "INSERT INTO magazines (name, year, issn, description) 
                VALUES (:name, :year, :issn, :description)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':name' => $name,
            ':year' => $year,
            ':issn' => $issn,
            ':description' => $description,
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM magazines ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM magazines WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $year, $issn) {
        $id = (int)$id;
        $sql = "UPDATE magazines 
                SET name = :name,
                    year = :year,
                    issn = :issn,
                WHERE id = :id";
    
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':year' => $year,
            ':issn' => $issn,
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM magazines WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}