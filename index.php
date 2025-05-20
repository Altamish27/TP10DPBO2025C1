<?php
require_once 'viewmodel/PersonilViewModel.php';
require_once 'viewmodel/SatuanViewModel.php';
require_once 'viewmodel/PangkatViewModel.php';
require_once 'viewmodel/PenugasanViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'personil';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'personil') {
    $viewModel = new PersonilViewModel();
    if ($action == 'list') {
        $personilList = $viewModel->getPersonilList();
        require_once 'views/personil_list.php';
    } elseif ($action == 'add') {
        $satuanList = $viewModel->getSatuanList();
        $pangkatList = $viewModel->getPangkatList();
        require_once 'views/personil_form.php';
    } elseif ($action == 'edit') {
        $personil = $viewModel->getPersonilById($_GET['id']);
        $satuanList = $viewModel->getSatuanList();
        $pangkatList = $viewModel->getPangkatList();
        require_once 'views/personil_form.php';
    } elseif ($action == 'save') {
        $viewModel->addPersonil($_POST['nama'], $_POST['nrp'], $_POST['pangkat_id'], $_POST['satuan_id'], $_POST['tanggal_lahir']);
        header('Location: index.php?entity=personil');
    } elseif ($action == 'update') {
        $viewModel->updatePersonil($_GET['id'], $_POST['nama'], $_POST['nrp'], $_POST['pangkat_id'], $_POST['satuan_id'], $_POST['tanggal_lahir']);
        header('Location: index.php?entity=personil');
    } elseif ($action == 'delete') {
        $viewModel->deletePersonil($_GET['id']);
        header('Location: index.php?entity=personil');
    }
} elseif ($entity == 'satuan') {
    $viewModel = new SatuanViewModel();
    if ($action == 'list') {
        $satuanList = $viewModel->getSatuanList();
        require_once 'views/satuan_list.php';
    } elseif ($action == 'add') {
        require_once 'views/satuan_form.php';
    } elseif ($action == 'edit') {
        $satuan = $viewModel->getSatuanById($_GET['id']);
        require_once 'views/satuan_form.php';
    } elseif ($action == 'save') {
        $viewModel->addSatuan($_POST['nama_satuan'], $_POST['lokasi']);
        header('Location: index.php?entity=satuan');
    } elseif ($action == 'update') {
        $viewModel->updateSatuan($_GET['id'], $_POST['nama_satuan'], $_POST['lokasi']);
        header('Location: index.php?entity=satuan');    } elseif ($action == 'delete') {
        $viewModel->deleteSatuan($_GET['id']);
        header('Location: index.php?entity=satuan');
    }
} elseif ($entity == 'pangkat') {
    $viewModel = new PangkatViewModel();
    if ($action == 'list') {
        $pangkatList = $viewModel->getPangkatList();
        require_once 'views/pangkat_list.php';
    } elseif ($action == 'add') {
        require_once 'views/pangkat_form.php';
    } elseif ($action == 'edit') {
        $pangkat = $viewModel->getPangkatById($_GET['id']);
        require_once 'views/pangkat_form.php';
    } elseif ($action == 'save') {
        $viewModel->addPangkat($_POST['nama_pangkat'], $_POST['tingkat'], $_POST['korp']);
        header('Location: index.php?entity=pangkat');
    } elseif ($action == 'update') {
        $viewModel->updatePangkat($_GET['id'], $_POST['nama_pangkat'], $_POST['tingkat'], $_POST['korp']);
        header('Location: index.php?entity=pangkat');
    } elseif ($action == 'delete') {
        $viewModel->deletePangkat($_GET['id']);
        header('Location: index.php?entity=pangkat');
    }
} elseif ($entity == 'penugasan') {
    $viewModel = new PenugasanViewModel();
    if ($action == 'list') {
        $penugasanList = $viewModel->getPenugasanList();
        require_once 'views/penugasan_list.php';
    } elseif ($action == 'list_by_personil') {
        $personil_id = $_GET['personil_id'];
        $penugasanList = $viewModel->getPenugasanByPersonilId($personil_id);
        $personilList = $viewModel->getPersonilList();
        foreach ($personilList as $p) {
            if ($p['id'] == $personil_id) {
                $namaPersonil = $p['nama'];
                break;
            }
        }
        require_once 'views/penugasan_by_personil.php';
    } elseif ($action == 'add') {
        $personilList = $viewModel->getPersonilList();
        require_once 'views/penugasan_form.php';
    } elseif ($action == 'edit') {
        $penugasan = $viewModel->getPenugasanById($_GET['id']);
        $personilList = $viewModel->getPersonilList();
        require_once 'views/penugasan_form.php';
    } elseif ($action == 'save') {
        $tanggal_selesai = !empty($_POST['tanggal_selesai']) ? $_POST['tanggal_selesai'] : null;
        $viewModel->addPenugasan($_POST['personil_id'], $_POST['nama_tugas'], $_POST['lokasi_tugas'], $_POST['tanggal_mulai'], $tanggal_selesai);
        if (isset($_GET['personil_id'])) {
            header('Location: index.php?entity=penugasan&action=list_by_personil&personil_id=' . $_GET['personil_id']);
        } else {
            header('Location: index.php?entity=penugasan');
        }
    } elseif ($action == 'update') {
        $tanggal_selesai = !empty($_POST['tanggal_selesai']) ? $_POST['tanggal_selesai'] : null;
        $viewModel->updatePenugasan($_GET['id'], $_POST['personil_id'], $_POST['nama_tugas'], $_POST['lokasi_tugas'], $_POST['tanggal_mulai'], $tanggal_selesai);
        if (isset($_GET['personil_id'])) {
            header('Location: index.php?entity=penugasan&action=list_by_personil&personil_id=' . $_GET['personil_id']);
        } else {
            header('Location: index.php?entity=penugasan');
        }
    } elseif ($action == 'delete') {
        $viewModel->deletePenugasan($_GET['id']);
        if (isset($_GET['personil_id'])) {
            header('Location: index.php?entity=penugasan&action=list_by_personil&personil_id=' . $_GET['personil_id']);
        } else {
            header('Location: index.php?entity=penugasan');
        }    }
}
?>
