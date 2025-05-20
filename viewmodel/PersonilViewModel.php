<?php
require_once 'model/Personil.php';
require_once 'model/Satuan.php';
require_once 'model/Pangkat.php';

class PersonilViewModel {
    private $personil;
    private $satuan;
    private $pangkat;

    public function __construct() {
        $this->personil = new Personil();
        $this->satuan = new Satuan();
        $this->pangkat = new Pangkat();
    }

    public function getPersonilList() {
        return $this->personil->getAll();
    }

    public function getPersonilById($id) {
        return $this->personil->getById($id);
    }

    public function getSatuanList() {
        return $this->satuan->getAll();
    }

    public function getPangkatList() {
        return $this->pangkat->getAll();
    }

    public function addPersonil($nama, $nrp, $pangkat_id, $satuan_id, $tanggal_lahir) {
        return $this->personil->create($nama, $nrp, $pangkat_id, $satuan_id, $tanggal_lahir);
    }

    public function updatePersonil($id, $nama, $nrp, $pangkat_id, $satuan_id, $tanggal_lahir) {
        return $this->personil->update($id, $nama, $nrp, $pangkat_id, $satuan_id, $tanggal_lahir);
    }

    public function deletePersonil($id) {
        return $this->personil->delete($id);
    }
}
?>
