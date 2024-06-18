-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk project_blog
CREATE DATABASE IF NOT EXISTS `project_blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `project_blog`;

-- membuang struktur untuk table project_blog.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel project_blog.admin: ~1 rows (lebih kurang)
INSERT INTO `admin` (`id_admin`, `first_name`, `last_name`, `username`, `password`) VALUES
	(1, 'Aulia', 'Syamsul', 'admin', '$2y$10$1auwBW0jb/QHp3GV5YwVd.F6nhyQPzCVF8Pvr53cdR6FhavhxMPk2');

-- membuang struktur untuk table project_blog.artikel
CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `kategori` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `cover_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'default.jpg',
  PRIMARY KEY (`id_artikel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel project_blog.artikel: ~1 rows (lebih kurang)
INSERT INTO `artikel` (`id_artikel`, `user_id`, `judul`, `isi`, `kategori`, `tanggal`, `cover_url`) VALUES
	(1, NULL, 'Pengusaha Sukses', '<div><h3>Menemukan Rumah Impian: Lebih dari Sekadar Tempat Tinggal</h3><div>Memiliki rumah impian adalah salah satu cita-cita banyak orang. Rumah impian bukan hanya sekadar tempat berlindung dari hujan dan panas, tetapi juga menjadi ruang pribadi yang mencerminkan kepribadian dan gaya hidup pemiliknya. Rumah impian seringkali diidentikkan dengan kenyamanan, keindahan, dan fungsionalitas yang tinggi. Desain arsitektur yang elegan, interior yang ditata dengan baik, serta lingkungan yang mendukung kualitas hidup adalah beberapa faktor yang biasanya menjadi pertimbangan utama dalam mewujudkan rumah impian.</div><div>Setiap individu atau keluarga memiliki definisi yang berbeda tentang rumah impian mereka. Bagi sebagian orang, rumah impian mungkin berupa sebuah villa di tepi pantai dengan pemandangan laut yang menakjubkan dan suara deburan ombak yang menenangkan. Bagi yang lain, mungkin rumah impian adalah sebuah hunian di pusat kota yang modern dengan akses mudah ke berbagai fasilitas umum, seperti pusat perbelanjaan, sekolah, dan tempat kerja. Ada juga yang mendambakan rumah dengan kebun yang luas di pinggiran kota, di mana mereka bisa menikmati ketenangan dan udara segar jauh dari hiruk-pikuk kehidupan perkotaan.</div><div>Tidak hanya soal lokasi dan desain, rumah impian juga mencakup aspek-aspek fungsional yang mendukung gaya hidup pemiliknya. Rumah dengan ruang kerja yang nyaman bagi mereka yang sering bekerja dari rumah, dapur yang dilengkapi peralatan modern bagi yang gemar memasak, atau ruang keluarga yang luas dan hangat untuk berkumpul bersama keluarga adalah beberapa contoh fitur yang diidamkan. Selain itu, keberlanjutan dan ramah lingkungan juga semakin menjadi perhatian dalam mewujudkan rumah impian, dengan banyak orang yang mulai mengadopsi teknologi hijau seperti panel surya dan sistem pengelolaan air yang efisien. Dengan kombinasi yang tepat antara estetika, kenyamanan, dan fungsi, rumah impian menjadi tempat di mana seseorang dapat merasa benar-benar "pulang".</div></div>', NULL, NULL, 'COVER-66647a9be52667.73049476.jpg');

-- membuang struktur untuk table project_blog.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel project_blog.kategori: ~2 rows (lebih kurang)
INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
	(15, 'informatika'),
	(16, 'Teknologi');

-- membuang struktur untuk table project_blog.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel project_blog.users: ~2 rows (lebih kurang)
INSERT INTO `users` (`id_user`, `fname`, `username`, `password`) VALUES
	(1, 'AuliaSyamsul', 'uul', '123'),
	(4, 'AuliaSyamsul', 'uulaja', '$2y$10$NplypywFCqC6JmgoMmISveAhP5omBTY86BDjhqwjf7lDGvNYbr4da');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
