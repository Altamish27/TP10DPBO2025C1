<?php
require_once 'config/Database.php';

class Pangkat {
    private $conn;
    private $table = 'pangkat';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama_pangkat, $tingkat, $korp) {
        $query = "INSERT INTO " . $this->table . " (nama_pangkat, tingkat, korp) VALUES (:nama_pangkat, :tingkat, :korp)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_pangkat', $nama_pangkat);
        $stmt->bindParam(':tingkat', $tingkat);
        $stmt->bindParam(':korp', $korp);
        return $stmt->execute();
    }

    public function update($id, $nama_pangkat, $tingkat, $korp) {
        $query = "UPDATE " . $this->table . " SET nama_pangkat = :nama_pangkat, tingkat = :tingkat, korp = :korp WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_pangkat', $nama_pangkat);
        $stmt->bindParam(':tingkat', $tingkat);
        $stmt->bindParam(':korp', $korp);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
