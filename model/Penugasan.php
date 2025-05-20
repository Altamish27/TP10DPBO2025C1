<?php
require_once 'config/Database.php';

class Penugasan {
    private $conn;
    private $table = 'penugasan';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT p.*, pr.nama as nama_personil, pr.nrp, pk.nama_pangkat
                 FROM " . $this->table . " p
                 JOIN personil pr ON p.personil_id = pr.id
                 JOIN pangkat pk ON pr.pangkat_id = pk.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT p.*, pr.nama as nama_personil, pr.nrp, pk.nama_pangkat
                 FROM " . $this->table . " p
                 JOIN personil pr ON p.personil_id = pr.id
                 JOIN pangkat pk ON pr.pangkat_id = pk.id
                 WHERE p.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByPersonilId($personil_id) {
        $query = "SELECT p.*, pr.nama as nama_personil 
                 FROM " . $this->table . " p
                 JOIN personil pr ON p.personil_id = pr.id
                 WHERE p.personil_id = :personil_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':personil_id', $personil_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($personil_id, $nama_tugas, $lokasi_tugas, $tanggal_mulai, $tanggal_selesai = null) {
        $query = "INSERT INTO " . $this->table . " (personil_id, nama_tugas, lokasi_tugas, tanggal_mulai, tanggal_selesai) 
                 VALUES (:personil_id, :nama_tugas, :lokasi_tugas, :tanggal_mulai, :tanggal_selesai)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':personil_id', $personil_id);
        $stmt->bindParam(':nama_tugas', $nama_tugas);
        $stmt->bindParam(':lokasi_tugas', $lokasi_tugas);
        $stmt->bindParam(':tanggal_mulai', $tanggal_mulai);
        $stmt->bindParam(':tanggal_selesai', $tanggal_selesai);
        return $stmt->execute();
    }

    public function update($id, $personil_id, $nama_tugas, $lokasi_tugas, $tanggal_mulai, $tanggal_selesai = null) {
        $query = "UPDATE " . $this->table . " 
                 SET personil_id = :personil_id, nama_tugas = :nama_tugas, lokasi_tugas = :lokasi_tugas, 
                 tanggal_mulai = :tanggal_mulai, tanggal_selesai = :tanggal_selesai 
                 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':personil_id', $personil_id);
        $stmt->bindParam(':nama_tugas', $nama_tugas);
        $stmt->bindParam(':lokasi_tugas', $lokasi_tugas);
        $stmt->bindParam(':tanggal_mulai', $tanggal_mulai);
        $stmt->bindParam(':tanggal_selesai', $tanggal_selesai);
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
