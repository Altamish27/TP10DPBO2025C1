<?php
require_once 'config/Database.php';

class Personil {
    private $conn;
    private $table = 'personil';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT p.*, s.nama_satuan, pk.nama_pangkat 
                 FROM " . $this->table . " p 
                 JOIN satuan s ON p.satuan_id = s.id 
                 JOIN pangkat pk ON p.pangkat_id = pk.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT p.*, s.nama_satuan, pk.nama_pangkat 
                 FROM " . $this->table . " p 
                 JOIN satuan s ON p.satuan_id = s.id 
                 JOIN pangkat pk ON p.pangkat_id = pk.id 
                 WHERE p.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama, $nrp, $pangkat_id, $satuan_id, $tanggal_lahir) {
        $query = "INSERT INTO " . $this->table . " (nama, nrp, pangkat_id, satuan_id, tanggal_lahir) 
                 VALUES (:nama, :nrp, :pangkat_id, :satuan_id, :tanggal_lahir)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':nrp', $nrp);
        $stmt->bindParam(':pangkat_id', $pangkat_id);
        $stmt->bindParam(':satuan_id', $satuan_id);
        $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
        return $stmt->execute();
    }

    public function update($id, $nama, $nrp, $pangkat_id, $satuan_id, $tanggal_lahir) {
        $query = "UPDATE " . $this->table . " 
                 SET nama = :nama, nrp = :nrp, pangkat_id = :pangkat_id, satuan_id = :satuan_id, tanggal_lahir = :tanggal_lahir 
                 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':nrp', $nrp);
        $stmt->bindParam(':pangkat_id', $pangkat_id);
        $stmt->bindParam(':satuan_id', $satuan_id);
        $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
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
