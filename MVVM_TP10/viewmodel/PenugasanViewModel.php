<?php
require_once 'model/Penugasan.php';
require_once 'model/Personil.php';

class PenugasanViewModel {
    private $penugasan;
    private $personil;

    public function __construct() {
        $this->penugasan = new Penugasan();
        $this->personil = new Personil();
    }

    public function getPenugasanList() {
        return $this->penugasan->getAll();
    }

    public function getPenugasanById($id) {
        return $this->penugasan->getById($id);
    }
    
    public function getPenugasanByPersonilId($personil_id) {
        return $this->penugasan->getByPersonilId($personil_id);
    }

    public function getPersonilList() {
        return $this->personil->getAll();
    }

    public function addPenugasan($personil_id, $nama_tugas, $lokasi_tugas, $tanggal_mulai, $tanggal_selesai = null) {
        return $this->penugasan->create($personil_id, $nama_tugas, $lokasi_tugas, $tanggal_mulai, $tanggal_selesai);
    }

    public function updatePenugasan($id, $personil_id, $nama_tugas, $lokasi_tugas, $tanggal_mulai, $tanggal_selesai = null) {
        return $this->penugasan->update($id, $personil_id, $nama_tugas, $lokasi_tugas, $tanggal_mulai, $tanggal_selesai);
    }

    public function deletePenugasan($id) {
        return $this->penugasan->delete($id);
    }
}
?>
