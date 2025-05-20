<?php
require_once 'model/Pangkat.php';

class PangkatViewModel {
    private $pangkat;

    public function __construct() {
        $this->pangkat = new Pangkat();
    }

    public function getPangkatList() {
        return $this->pangkat->getAll();
    }

    public function getPangkatById($id) {
        return $this->pangkat->getById($id);
    }

    public function addPangkat($nama_pangkat, $tingkat, $korp) {
        return $this->pangkat->create($nama_pangkat, $tingkat, $korp);
    }

    public function updatePangkat($id, $nama_pangkat, $tingkat, $korp) {
        return $this->pangkat->update($id, $nama_pangkat, $tingkat, $korp);
    }

    public function deletePangkat($id) {
        return $this->pangkat->delete($id);
    }
}
?>
