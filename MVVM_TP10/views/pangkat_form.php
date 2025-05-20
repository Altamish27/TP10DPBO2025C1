<?php
require_once 'views/template/header.php';
?>

<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6"><?php echo isset($pangkat) ? 'Edit Pangkat' : 'Tambah Pangkat'; ?></h2>
    
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="index.php?entity=pangkat&action=<?php echo isset($pangkat) ? 'update&id=' . $pangkat['id'] : 'save'; ?>" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_pangkat">
                    Nama Pangkat:
                </label>
                <input type="text" name="nama_pangkat" id="nama_pangkat" 
                       value="<?php echo isset($pangkat) ? $pangkat['nama_pangkat'] : ''; ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tingkat">
                    Tingkat:
                </label>
                <select name="tingkat" id="tingkat" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                    <option value="">Pilih Tingkat</option>
                    <option value="Perwira Tinggi" <?php echo isset($pangkat) && $pangkat['tingkat'] == 'Perwira Tinggi' ? 'selected' : ''; ?>>Perwira Tinggi</option>
                    <option value="Perwira Menengah" <?php echo isset($pangkat) && $pangkat['tingkat'] == 'Perwira Menengah' ? 'selected' : ''; ?>>Perwira Menengah</option>
                    <option value="Perwira Pertama" <?php echo isset($pangkat) && $pangkat['tingkat'] == 'Perwira Pertama' ? 'selected' : ''; ?>>Perwira Pertama</option>
                    <option value="Bintara Tinggi" <?php echo isset($pangkat) && $pangkat['tingkat'] == 'Bintara Tinggi' ? 'selected' : ''; ?>>Bintara Tinggi</option>
                    <option value="Bintara" <?php echo isset($pangkat) && $pangkat['tingkat'] == 'Bintara' ? 'selected' : ''; ?>>Bintara</option>
                    <option value="Tamtama" <?php echo isset($pangkat) && $pangkat['tingkat'] == 'Tamtama' ? 'selected' : ''; ?>>Tamtama</option>
                </select>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="korp">
                    Korp:
                </label>
                <input type="text" name="korp" id="korp" 
                       value="<?php echo isset($pangkat) ? $pangkat['korp'] : ''; ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
                <a href="index.php?entity=pangkat" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>
