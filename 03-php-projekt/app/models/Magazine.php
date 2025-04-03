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
}