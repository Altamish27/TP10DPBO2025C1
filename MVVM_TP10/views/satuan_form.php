<?php
require_once 'views/template/header.php';
?>

<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6"><?php echo isset($satuan) ? 'Edit Satuan' : 'Tambah Satuan'; ?></h2>
    
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="index.php?entity=satuan&action=<?php echo isset($satuan) ? 'update&id=' . $satuan['id'] : 'save'; ?>" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_satuan">
                    Nama Satuan:
                </label>
                <input type="text" name="nama_satuan" id="nama_satuan" 
                       value="<?php echo isset($satuan) ? $satuan['nama_satuan'] : ''; ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="lokasi">
                    Lokasi:
                </label>
                <input type="text" name="lokasi" id="lokasi" 
                       value="<?php echo isset($satuan) ? $satuan['lokasi'] : ''; ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
                <a href="index.php?entity=satuan" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>
