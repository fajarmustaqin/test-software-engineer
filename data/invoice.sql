-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table invoice.d_invoice: ~8 rows (approximately)
INSERT INTO `d_invoice` (`id_invoice`, `kode_item`, `jumlah_barang`, `total`, `created_at`) VALUES
	('INV00000002', 2, 2, 12000000, '2023-01-20 10:27:42'),
	('INV00000003', 4, 3, 15000, '2023-01-20 10:28:26'),
	('INV00000002', 2, 3, 18000000, '2023-01-20 10:45:27'),
	('INV00000005', 5, 2, 300000, '2023-01-20 14:52:53'),
	('INV00000001', 1, 5, 230000000, '2023-01-20 14:55:32'),
	('INV00000006', 4, 10, 50000, '2023-01-20 14:58:05'),
	('INV00000006', 1, 1, 46000000, '2023-01-20 14:58:38'),
	('INV00000006', 2, 4, 24000000, '2023-01-20 14:59:16');

-- Dumping data for table invoice.h_invoice: ~5 rows (approximately)
INSERT INTO `h_invoice` (`n_invoice`, `nama_pengirim`, `alamat_pengirim`, `nama_penerima`, `alamat_penerima`, `keterangan`, `tanggal`, `tempo`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
	('INV00000001', 'anton', 'malang', 'wisnu', 'yogyakarta', 'software development', '2023-01-20', '2023-01-20', '1', NULL, '2023-01-20 07:11:18', NULL, '2023-01-20 14:49:18'),
	('INV00000002', 'fajar mustaqin', 'waskita karya, merangin jambi', 'fistara', 'sidoarjo, surabaya', 'product desain', '2023-01-20', '2023-01-20', '1', NULL, '2023-01-20 07:11:19', NULL, '2023-01-20 10:26:43'),
	('INV00000003', 'andi', 'semarang', 'reza', 'indramayu', 'desain grafis', '2023-01-20', '2023-01-20', '1', NULL, '2023-01-20 07:11:28', NULL, '2023-01-20 14:49:52'),
	('INV00000005', 'monica', 'serpong', 'ana ', 'bogor', 'baju katun', '2023-01-20', '2023-01-20', '1', NULL, '2023-01-20 08:23:32', NULL, '2023-01-20 14:52:23'),
	('INV00000006', 'wilda', 'sukabumi', 'fajar', 'tangerang selatan', 'product development', '2023-01-20', '2023-01-20', '1', NULL, '2023-01-20 08:24:07', NULL, '2023-01-20 14:51:37');

-- Dumping data for table invoice.ref_item: ~5 rows (approximately)
INSERT INTO `ref_item` (`id`, `tipe_item`, `deskripsi`, `harga`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
	(1, 'services', 'Development', 46000000, '1', NULL, '2023-01-18 13:33:15', NULL, '2023-01-19 09:41:59'),
	(2, 'services', 'Design', 6000000, '1', NULL, '2023-01-19 09:41:43', NULL, '2023-01-19 09:42:19'),
	(3, 'Hardware', 'Computer', 16000000, '1', NULL, '2023-01-19 09:42:56', NULL, NULL),
	(4, 'snack', 'ciki-ciki', 5000, '1', NULL, '2023-01-19 09:43:44', NULL, NULL),
	(5, 'cloth', 'baju katun', 150000, '1', NULL, '2023-01-20 14:54:13', NULL, '2023-01-20 14:54:20');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
