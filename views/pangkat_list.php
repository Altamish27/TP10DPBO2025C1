<?php
require_once 'views/template/header.php';
?>

<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Pangkat TNI</h2>
        <a href="index.php?entity=pangkat&action=add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Pangkat
        </a>
    </div>

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Nama Pangkat</th>
                    <th class="py-3 px-4 text-left">Tingkat</th>
                    <th class="py-3 px-4 text-left">Korp</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($pangkatList as $pangkat): 
                ?>
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-4"><?php echo $no++; ?></td>
                    <td class="py-3 px-4"><?php echo $pangkat['nama_pangkat']; ?></td>
                    <td class="py-3 px-4"><?php echo $pangkat['tingkat']; ?></td>
                    <td class="py-3 px-4"><?php echo $pangkat['korp']; ?></td>
                    <td class="py-3 px-4">
                        <a href="index.php?entity=pangkat&action=edit&id=<?php echo $pangkat['id']; ?>" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                        <a href="index.php?entity=pangkat&action=delete&id=<?php echo $pangkat['id']; ?>" class="text-red-500 hover:text-red-700" onclick="return confirm('Apakah Anda yakin ingin menghapus pangkat ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>
