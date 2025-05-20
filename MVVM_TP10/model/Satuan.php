<?php
require_once 'config/Database.php';

class Satuan {
    private $conn;
    private $table = 'satuan';

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

    public function create($nama_satuan, $lokasi) {
        $query = "INSERT INTO " . $this->table . " (nama_satuan, lokasi) VALUES (:nama_satuan, :lokasi)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_satuan', $nama_satuan);
        $stmt->bindParam(':lokasi', $lokasi);
        return $stmt->execute();
    }

    public function update($id, $nama_satuan, $lokasi) {
        $query = "UPDATE " . $this->table . " SET nama_satuan = :nama_satuan, lokasi = :lokasi WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_satuan', $nama_satuan);
        $stmt->bindParam(':lokasi', $lokasi);
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
