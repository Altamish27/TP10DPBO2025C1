<?php
require_once 'views/template/header.php';
?>

<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Personil TNI</h2>
        <a href="index.php?entity=personil&action=add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Personil
        </a>
    </div>

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Nama</th>
                    <th class="py-3 px-4 text-left">NRP</th>
                    <th class="py-3 px-4 text-left">Pangkat</th>
                    <th class="py-3 px-4 text-left">Satuan</th>
                    <th class="py-3 px-4 text-left">Tanggal Lahir</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($personilList as $personil): 
                ?>
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-4"><?php echo $no++; ?></td>
                    <td class="py-3 px-4"><?php echo $personil['nama']; ?></td>
                    <td class="py-3 px-4"><?php echo $personil['nrp']; ?></td>
                    <td class="py-3 px-4"><?php echo $personil['nama_pangkat']; ?></td>
                    <td class="py-3 px-4"><?php echo $personil['nama_satuan']; ?></td>
                    <td class="py-3 px-4"><?php echo $personil['tanggal_lahir']; ?></td>
                    <td class="py-3 px-4">
                        <a href="index.php?entity=personil&action=edit&id=<?php echo $personil['id']; ?>" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                        <a href="index.php?entity=personil&action=delete&id=<?php echo $personil['id']; ?>" class="text-red-500 hover:text-red-700 mr-2" onclick="return confirm('Apakah Anda yakin ingin menghapus personil ini?')">Hapus</a>
                        <a href="index.php?entity=penugasan&action=list_by_personil&personil_id=<?php echo $personil['id']; ?>" class="text-green-500 hover:text-green-700">Lihat Tugas</a>
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
