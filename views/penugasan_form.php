<?php
require_once 'views/template/header.php';
?>

<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6"><?php echo isset($penugasan) ? 'Edit Penugasan' : 'Tambah Penugasan'; ?></h2>
    
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="index.php?entity=penugasan&action=<?php echo isset($penugasan) ? 'update&id=' . $penugasan['id'] : 'save'; ?><?php echo isset($_GET['personil_id']) ? '&personil_id=' . $_GET['personil_id'] : ''; ?>" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="personil_id">
                    Personil:
                </label>
                <select name="personil_id" id="personil_id" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        <?php echo isset($_GET['personil_id']) ? 'disabled' : ''; ?>
                        required>
                    <option value="">Pilih Personil</option>
                    <?php foreach ($personilList as $personil): ?>
                    <option value="<?php echo $personil['id']; ?>" 
                            <?php 
                            if ((isset($penugasan) && $penugasan['personil_id'] == $personil['id']) || 
                               (isset($_GET['personil_id']) && $_GET['personil_id'] == $personil['id'])) {
                                echo 'selected';
                            } 
                            ?>>
                        <?php echo $personil['nama']; ?> - <?php echo $personil['nama_pangkat']; ?> (NRP: <?php echo $personil['nrp']; ?>)
                    </option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($_GET['personil_id'])): ?>
                <input type="hidden" name="personil_id" value="<?php echo $_GET['personil_id']; ?>">
                <?php endif; ?>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_tugas">
                    Nama Tugas:
                </label>
                <input type="text" name="nama_tugas" id="nama_tugas" 
                       value="<?php echo isset($penugasan) ? $penugasan['nama_tugas'] : ''; ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="lokasi_tugas">
                    Lokasi Tugas:
                </label>
                <input type="text" name="lokasi_tugas" id="lokasi_tugas" 
                       value="<?php echo isset($penugasan) ? $penugasan['lokasi_tugas'] : ''; ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal_mulai">
                    Tanggal Mulai:
                </label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" 
                       value="<?php echo isset($penugasan) ? $penugasan['tanggal_mulai'] : ''; ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal_selesai">
                    Tanggal Selesai (Kosongkan jika masih berlangsung):
                </label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai" 
                       value="<?php echo isset($penugasan) ? $penugasan['tanggal_selesai'] : ''; ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
                <a href="<?php echo isset($_GET['personil_id']) ? 'index.php?entity=penugasan&action=list_by_personil&personil_id='.$_GET['personil_id'] : 'index.php?entity=penugasan'; ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>
