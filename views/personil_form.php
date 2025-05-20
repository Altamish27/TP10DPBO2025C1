<?php
require_once 'views/template/header.php';
?>

<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6"><?php echo isset($personil) ? 'Edit Personil' : 'Tambah Personil'; ?></h2>
    
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="index.php?entity=personil&action=<?php echo isset($personil) ? 'update&id=' . $personil['id'] : 'save'; ?>" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                    Nama:
                </label>
                <input type="text" name="nama" id="nama" 
                       value="<?php echo isset($personil) ? $personil['nama'] : ''; ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nrp">
                    NRP:
                </label>
                <input type="text" name="nrp" id="nrp" 
                       value="<?php echo isset($personil) ? $personil['nrp'] : ''; ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pangkat_id">
                    Pangkat:
                </label>
                <select name="pangkat_id" id="pangkat_id" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                    <option value="">Pilih Pangkat</option>
                    <?php foreach ($pangkatList as $pangkat): ?>
                    <option value="<?php echo $pangkat['id']; ?>" 
                            <?php echo isset($personil) && $personil['pangkat_id'] == $pangkat['id'] ? 'selected' : ''; ?>>
                        <?php echo $pangkat['nama_pangkat']; ?> - <?php echo $pangkat['korp']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="satuan_id">
                    Satuan:
                </label>
                <select name="satuan_id" id="satuan_id" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                    <option value="">Pilih Satuan</option>
                    <?php foreach ($satuanList as $satuan): ?>
                    <option value="<?php echo $satuan['id']; ?>" 
                            <?php echo isset($personil) && $personil['satuan_id'] == $satuan['id'] ? 'selected' : ''; ?>>
                        <?php echo $satuan['nama_satuan']; ?> - <?php echo $satuan['lokasi']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal_lahir">
                    Tanggal Lahir:
                </label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" 
                       value="<?php echo isset($personil) ? $personil['tanggal_lahir'] : ''; ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
                <a href="index.php?entity=personil" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>
