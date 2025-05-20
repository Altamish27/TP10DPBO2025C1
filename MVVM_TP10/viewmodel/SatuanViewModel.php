<?php
require_once 'model/Satuan.php';

class SatuanViewModel {
    private $satuan;

    public function __construct() {
        $this->satuan = new Satuan();
    }

    public function getSatuanList() {
        return $this->satuan->getAll();
    }

    public function getSatuanById($id) {
        return $this->satuan->getById($id);
    }

    public function addSatuan($nama_satuan, $lokasi) {
        return $this->satuan->create($nama_satuan, $lokasi);
    }

    public function updateSatuan($id, $nama_satuan, $lokasi) {
        return $this->satuan->update($id, $nama_satuan, $lokasi);
    }

    public function deleteSatuan($id) {
        return $this->satuan->delete($id);
    }
}
?>
