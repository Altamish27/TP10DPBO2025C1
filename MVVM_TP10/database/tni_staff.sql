CREATE DATABASE IF NOT EXISTS tni_staff;
USE tni_staff;

CREATE TABLE IF NOT EXISTS `satuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE IF NOT EXISTS `pangkat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pangkat` varchar(50) NOT NULL,
  `tingkat` varchar(50) NOT NULL,
  `korp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `personil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nrp` varchar(50) NOT NULL,
  `pangkat_id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`pangkat_id`) REFERENCES `pangkat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE IF NOT EXISTS `penugasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personil_id` int(11) NOT NULL,
  `nama_tugas` varchar(100) NOT NULL,
  `lokasi_tugas` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`personil_id`) REFERENCES `personil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO `satuan` (`nama_satuan`, `lokasi`) VALUES
('Kodam Jaya', 'Jakarta'),
('Yonif 315', 'Bogor'),
('Brigif 2', 'Bandung'),
('Kopassus', 'Cijantung');

INSERT INTO `pangkat` (`nama_pangkat`, `tingkat`, `korp`) VALUES
('Letnan Dua', 'Perwira Pertama', 'Infanteri'),
('Letnan Satu', 'Perwira Pertama', 'Infanteri'),
('Kapten', 'Perwira Pertama', 'Infanteri'),
('Mayor', 'Perwira Menengah', 'Artileri');


INSERT INTO `personil` (`nama`, `nrp`, `pangkat_id`, `satuan_id`, `tanggal_lahir`) VALUES
('Prabowo', '21730111', 3, 1, '1985-06-15'),
('Luhut', '21730222', 2, 2, '1990-03-21'),
('Hercules', '21730333', 1, 3, '1992-11-05'),
('Deni Kurniawan', '21730444', 4, 4, '1982-09-10');


INSERT INTO `penugasan` (`personil_id`, `nama_tugas`, `lokasi_tugas`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 'Operasi Tinombala', 'Poso', '2022-01-15', '2022-07-15'),
(2, 'Pengamanan Perbatasan', 'Papua', '2022-03-10', '2022-09-10'),
(3, 'Latihan Bersama', 'Natuna', '2022-05-22', NULL),
(4, 'Operasi Bencana Alam', 'Aceh', '2022-06-01', '2022-07-01');
