<?php
require_once 'views/template/header.php';
?>

<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Penugasan untuk <?php echo isset($namaPersonil) ? $namaPersonil : ''; ?></h2>
        <a href="index.php?entity=penugasan&action=add&personil_id=<?php echo $personil_id; ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Penugasan
        </a>
    </div>

    <div class="mb-4">
        <a href="index.php?entity=personil" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Kembali ke Daftar Personil
        </a>
    </div>

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Nama Tugas</th>
                    <th class="py-3 px-4 text-left">Lokasi Tugas</th>
                    <th class="py-3 px-4 text-left">Tanggal Mulai</th>
                    <th class="py-3 px-4 text-left">Tanggal Selesai</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($penugasanList as $penugasan): 
                ?>
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-4"><?php echo $no++; ?></td>
                    <td class="py-3 px-4"><?php echo $penugasan['nama_tugas']; ?></td>
                    <td class="py-3 px-4"><?php echo $penugasan['lokasi_tugas']; ?></td>
                    <td class="py-3 px-4"><?php echo $penugasan['tanggal_mulai']; ?></td>
                    <td class="py-3 px-4"><?php echo $penugasan['tanggal_selesai'] ? $penugasan['tanggal_selesai'] : 'Masih Berlangsung'; ?></td>
                    <td class="py-3 px-4">
                        <a href="index.php?entity=penugasan&action=edit&id=<?php echo $penugasan['id']; ?>" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                        <a href="index.php?entity=penugasan&action=delete&id=<?php echo $penugasan['id']; ?>&personil_id=<?php echo $personil_id; ?>" class="text-red-500 hover:text-red-700" onclick="return confirm('Apakah Anda yakin ingin menghapus penugasan ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (count($penugasanList) == 0): ?>
                <tr class="border-b">
                    <td class="py-3 px-4 text-center" colspan="6">Tidak ada data penugasan</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>
