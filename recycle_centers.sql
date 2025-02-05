-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2025 at 04:43 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recycleplus`
--

--
-- Dumping data for table `recycle_centers`
--

INSERT INTO `recycle_centers` (`id`, `name`, `address`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, '1RECYCLING CENTRE (1RC) @ 1 Utama', 'City Centre, B2 Highstreet, 1, Lebuh Bandar Utama, Bandar Utama, 47800 Petaling Jaya, Selangor', 3.1505542, 101.6128415, '2024-12-14 05:57:34', '2024-12-14 05:57:04'),
(2, 'A Five Stars Metals Sdn Bhd.', '38181, Jalan Masyhur 25/50, Taman Sri Muda, 40400 Shah Alam, Selangor', 3.0353277, 101.5373518, '2024-12-14 05:57:33', '2024-12-14 05:57:10'),
(3, 'Advance Recycle SDN. BHD.', 'Jalan Industri 3, 42450 Shah Alam, Selangor', 3.0112025, 101.5146990, '2024-12-14 05:57:33', '2024-12-14 05:57:12'),
(4, 'BALA METAL', 'u6, Jalan batu tiga Sungai buloh, seksyen, Desa Subang Permai, 40150 Shah Alam, Selangor', 3.1483210, 101.5226743, '2024-12-14 05:57:32', '2024-12-14 05:57:12'),
(5, 'DEVAZ RECYCLE MANAGEMENT', 'NO 27, Jalan Temenggung, Kampung Jawa, 41000 Klang, Selangor', 3.0070812, 101.4758074, '2024-12-14 05:57:32', '2024-12-14 05:57:13'),
(6, 'ERTH: Electronic Recycling Through Heroes (E-waste)', 'Jalan Teknokrat 6 Ground Floor, G-3A, Kanvas Retail @ Prima 15, Cyberjaya, 63000 Cyberjaya, Selangor', 2.9132535, 101.6526793, '2024-12-14 05:57:31', '2024-12-14 05:57:13'),
(7, 'GSR METALS & SCRAP SERVICES', 'No 11 Jalan Sungai Rasau, 26, Jalan Batu Tiga Lama, Kampung Padang Jawa, 41300 Klang, Selangor', 3.0587583, 101.4785845, '2024-12-14 05:57:31', '2024-12-14 05:57:13'),
(8, 'HPRA Recycle Center', 'Jln Hijau Pelangi U9/44, Cahaya SPK, 40170 Shah Alam, Selangor', 3.1399855, 101.5032341, '2024-12-14 05:57:31', '2024-12-14 05:57:14'),
(9, 'IPC Recycling & Buy-Back Centre', 'IPC Shopping Centre, Ladies parking, Level P1, 2, Jalan PJU 7/2, Mutiara Damansara, 47800 Petaling Jaya, Selangor', 3.1557110, 101.6081533, '2024-12-14 05:57:30', '2024-12-14 05:57:15'),
(10, 'Klang Recycle - Paper, Plastic, Aluminium & Metal', '15, Jln Meru, Kampung Batu Belah, 41050 Klang, Selangor', 3.0773815, 101.4453249, '2024-12-14 05:57:30', '2024-12-14 05:57:14'),
(11, 'Klang Recycle Center - FS', 'No.35, Jalan Korporat 6, Jalan Korporat 6/KU9, Kawasan Perindustrian Meru, 42200 Klang, Selangor', 3.1472867, 101.4060056, '2024-12-14 05:57:29', '2024-12-14 05:57:15'),
(12, 'KLANG SNS TRADING SDN BHD', 'LOT 2487, Jalan Haji Sirat, Kampung Batu Belah, 41050 Klang, Selangor', 3.0777466, 101.4240664, '2024-12-14 05:57:28', '2024-12-14 05:58:02'),
(13, 'KPR TRADING', '5010, Persiaran Kuala Langat, Taman Alam Megah, 40400 Shah Alam, Selangor', 3.0037425, 101.5586582, '2024-12-14 05:57:28', '2024-12-14 05:57:15'),
(14, 'LEONG RECYCLE & TRADING SDN BHD', 'Lot 5082, 5, Jln Meru, Kawasan 18, 41050 Klang, Selangor', 3.1106373, 101.4395122, '2024-12-14 05:57:27', '2024-12-14 05:57:16'),
(15, 'MyRecycle', 'Off, Jalan Pekan Subang, &, Jalan Monterez Golf Club, U 9, 40150 Shah Alam, Selangor', 3.1374114, 101.5219997, '2024-12-14 05:57:26', '2024-12-14 05:57:16'),
(16, 'NU Recycle Sdn Bhd', 'Lot PT 33638, Batu, 7, Jalan Bukit Kemuning, Seksyen 32, 40460 Shah Alam, Selangor', 3.0097373, 101.5143320, '2024-12-14 05:57:27', '2024-12-14 05:58:02'),
(17, 'Paka Recycle Sdn. Bhd.', 'No. 7, Batu 6, Jalan Bukit Kemuning, Seksyen 34, 40460 Shah Alam, Selangor', 3.0079357, 101.5077511, '2024-12-14 05:57:25', '2024-12-14 05:58:03'),
(18, 'PJ Eco Recycling Plaza', 'Jalan ss8/39, Sungai Way Free Trade Industrial Zone, 47300 Petaling Jaya, Selangor', 3.0886070, 101.6115541, '2024-12-14 05:57:24', '2024-12-14 05:58:03'),
(19, 'Pusat Kitar Semula Komuniti Bukit Jelutong (Community Recycle Centre)', 'Jalan Pelapik B U8/B, Bukit Jelutong, 40150 Shah Alam, Selangor', 3.1145163, 101.5225570, '2024-12-14 05:57:24', '2024-12-14 05:58:04'),
(20, 'Pusat Kitar Semula MBSA Seksyen U2', 'Jalan Saujana Indah 2, Taman Perindustrian Saujana Indah, 40150 Shah Alam, Selangor', 3.1069529, 101.5574322, '2024-12-14 05:57:23', '2024-12-14 05:58:04'),
(21, 'Pusat Kitar Semula MBSA Seksyen U5 Shah Alam', 'Jalan U5/169 Seksyen U5, Bandar Pinggiran Subang, 40150, Selangor', 3.1601045, 101.5475120, '2024-12-14 05:57:22', '2024-12-14 05:58:06'),
(22, 'Pusat Kitar Semula Pintar Seksyen U13 (MBSA)', 'Jalan Setia Indah U13/10 Seksyen U13, Setia Alam, 40170, Selangor', 3.0998267, 101.4555125, '2024-12-14 05:57:23', '2024-12-14 05:58:05'),
(23, 'Pusat Kitar Semula Seksyen 6', 'Seksyen 6, 40000 Shah Alam, Selangor', 3.0824681, 101.5066698, '2024-12-14 05:57:22', '2024-12-14 05:58:06'),
(24, 'Pusat Kitar Semula Seksyen U20', '13, Jalan BRP 1/5, Bukit Rahman Putra, 47000 Sungai Buloh, Selangor', 3.2103918, 101.5590391, '2024-12-14 05:57:22', '2024-12-14 05:58:06'),
(25, 'RBTHA METAL ENTERPRISE', '1, Jalan Saujana Indah 6, TAMAN INDUSTRI SAUJANA INDAH SEKSYEN U2, 40150 Shah Alam, Selangor', 3.1063175, 101.5569411, '2024-12-14 05:57:21', '2024-12-14 05:58:07'),
(26, 'Recycle Center Saujana Damansara', 'Taman Bayu Damansara, 47830 Petaling Jaya, Selangor', 3.1996293, 101.5840966, '2024-12-14 05:57:21', '2024-12-14 05:58:07'),
(27, 'Scrap Computer Trading Sdn Bhd', '17, Jalan Sepadu 25/123A, Taman Sri Muda, 40400 Shah Alam, Selangor', 3.0283713, 101.5448558, '2024-12-14 05:57:20', '2024-12-14 05:58:07'),
(28, 'Sg Besi recycle Industries Sdn Bhd', 'B5, 41300 Klang, Selangor', 3.0474308, 101.4703617, '2024-12-14 05:57:19', '2024-12-14 05:58:08'),
(29, 'SHRI HARI METAL SDN BHD known as AYYAN PAPER & PLASTIC RECYCLING', 'lot 5190, jalan bunga bakawali, Puchong Batu 14, 47100 Puchong, Selangor', 3.0037989, 101.6180179, '2024-12-14 05:57:20', '2024-12-14 05:58:08'),
(30, 'Tzu Chi (慈济) Recycling Centre Klang', 'Taman Meru, 41400 Klang, Selangor', 3.1379803, 101.5211001, '2024-12-14 05:57:19', '2024-12-14 05:58:09'),
(31, 'USJ 1 Recycling Centre', 'Taman Subang Mewah, 47500 Subang Jaya, Selangor', 3.1379803, 101.5211001, '2024-12-14 05:57:18', '2024-12-14 05:58:09'),
(32, 'Waste Eco Park MBSJ', '64733, Jalan TS 6/10, Taman Industri Subang, 47510 Subang Jaya, Selangor', 3.1379803, 101.5211001, '2024-12-14 05:57:18', '2024-12-14 05:58:09'),
(33, 'YHC Paper Trading Sdn Bhd', 'No. 3, Jalan 33/4A, Elite Industrial Estate, Seksyen 33, 40400, Shah Alam, Selangor, 40400', 3.1379803, 101.5211001, '2024-12-14 05:57:18', '2024-12-14 05:58:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
