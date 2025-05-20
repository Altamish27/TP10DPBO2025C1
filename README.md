# Sistem Informasi Personil TNI TP 10

## Saya Hasbi Haqqul Fikri dengan NIM 2309245 mengerjakan soal TP 4 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

Aplikasi ini merupakan sistem informasi manajemen personil TNI dengan struktur MVVM (Model-View-ViewModel).

## Struktur Tabel Database

Aplikasi ini menggunakan 4 tabel dengan relasi:

1. **Tabel Satuan (Unit)**
   - id (PK)
   - nama_satuan
   - lokasi

2. **Tabel Pangkat (Rank)**
   - id (PK)
   - nama_pangkat
   - tingkat
   - korp

3. **Tabel Personil (Personnel)**
   - id (PK)
   - nama
   - nrp
   - pangkat_id (FK)
   - satuan_id (FK)
   - tanggal_lahir

4. **Tabel Penugasan (Assignment)**
   - id (PK)
   - personil_id (FK)
   - nama_tugas
   - lokasi_tugas
   - tanggal_mulai
   - tanggal_selesai

## Relasi Antar Tabel

- Tabel Personil memiliki relasi Many-to-One dengan Tabel Satuan (FK: satuan_id)
- Tabel Personil memiliki relasi Many-to-One dengan Tabel Pangkat (FK: pangkat_id)
- Tabel Penugasan memiliki relasi Many-to-One dengan Tabel Personil (FK: personil_id)

## Fitur Aplikasi

1. Manajemen Data Personil TNI (CRUD)
2. Manajemen Data Satuan TNI (CRUD)
3. Manajemen Data Pangkat TNI (CRUD)
4. Manajemen Data Penugasan TNI (CRUD)
5. Melihat Penugasan Berdasarkan Personil

## Cara Menjalankan Aplikasi

1. Import database dari file `/database/tni_staff.sql` ke MySQL
2. Pastikan konfigurasi database di `/config/Database.php` sesuai dengan setup lokal
3. Buka aplikasi melalui browser dengan URL: `http://localhost/DPBO/DPBO_MVVM/`

## Struktur Aplikasi (MVVM)

### Model
- Satuan.php - Model untuk data satuan TNI
- Pangkat.php - Model untuk data pangkat TNI
- Personil.php - Model untuk data personil TNI
- Penugasan.php - Model untuk data penugasan TNI

### ViewModel
- SatuanViewModel.php - ViewModel untuk mengelola data Satuan
- PangkatViewModel.php - ViewModel untuk mengelola data Pangkat
- PersonilViewModel.php - ViewModel untuk mengelola data Personil
- PenugasanViewModel.php - ViewModel untuk mengelola data Penugasan

### View
- satuan_list.php & satuan_form.php - View untuk menampilkan dan mengedit data Satuan
- pangkat_list.php & pangkat_form.php - View untuk menampilkan dan mengedit data Pangkat
- personil_list.php & personil_form.php - View untuk menampilkan dan mengedit data Personil
- penugasan_list.php, penugasan_form.php, penugasan_by_personil.php - View untuk menampilkan dan mengedit data Penugasan

## Alur Aplikasi

### Alur Umum
1. User mengakses aplikasi melalui `index.php`
2. `index.php` bertindak sebagai controller yang menerima parameter `entity` dan `action` dari URL
3. Berdasarkan parameter tersebut, sistem akan memuat ViewModel yang sesuai
4. ViewModel berkomunikasi dengan Model untuk mengakses data
5. Data dari Model diolah di ViewModel lalu diteruskan ke View
6. View menampilkan data ke User dengan memanfaatkan data binding

### Alur CRUD
1. **Create (Tambah Data)**:
   - User mengklik tombol "Tambah" pada halaman list
   - Sistem menampilkan form kosong melalui `[entity]_form.php`
   - User mengisi form dan submit
   - ViewModel menerima data form dan memproses melalui Model
   - Sistem redirect ke halaman list

2. **Read (Baca Data)**:
   - User mengakses halaman list (`[entity]_list.php`)
   - ViewModel mengambil data dari database melalui Model
   - Data ditampilkan dalam tabel dengan data binding

3. **Update (Edit Data)**:
   - User mengklik tombol "Edit" pada baris data yang dipilih
   - Sistem mengambil ID data dan menampilkan form yang sudah terisi data yang ada
   - User mengubah data dan submit
   - ViewModel memproses update melalui Model
   - Sistem redirect ke halaman list

4. **Delete (Hapus Data)**:
   - User mengklik tombol "Hapus" pada baris data yang dipilih
   - Sistem menampilkan konfirmasi
   - Jika dikonfirmasi, ViewModel menghapus data melalui Model
   - Halaman list dimuat ulang

### Contoh Alur Spesifik: Penugasan Personil
1. User melihat daftar personil
2. User mengklik "Lihat Tugas" pada salah satu personil
3. Sistem menampilkan daftar penugasan khusus untuk personil tersebut
4. User dapat menambah, mengedit, atau menghapus penugasan untuk personil tersebut

## Keamanan

Semua query database menggunakan PDO (PHP Data Objects) dengan prepared statements untuk mencegah SQL injection.




https://github.com/user-attachments/assets/ee9aa339-0362-4f0b-a8fa-72c352b7746e





