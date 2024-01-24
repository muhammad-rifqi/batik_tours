-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 06:52 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_batiktours`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id_blog`, `title`, `description`, `photo`, `date`) VALUES
(5, 'Portal-Like Puzzle Game, The Entropy Centre, Gets November Release Date', 'The Entropy Centre, an upcoming Portal-like sci-fi puzzle game coming from new studio Stubby Games, will be released this November. \r\n\r\nMore specifically, it will hit PlayStation 5, Xbox Series X/S, PlayStation 4, Xbox One, and PC on November 3. This news comes after a showing during the June Future Games Showcase, with The Entropy Centre\'s trailer garnering more than two million views in just 48 hours, according to a press release about today\'s news. To celebrate this November release date, Stubby Games has released a new trailer. ', 'http://localhost/batiktours-fix/assets/upload/blog/1664611272.jpg', '2022-10-01 10:01:12'),
(6, 'Portal-Like Puzzle Game, The Entropy Centre, Gets November Release Date', 'The Entropy Centre, an upcoming Portal-like sci-fi puzzle game coming from new studio Stubby Games, will be released this November. \r\n\r\nMore specifically, it will hit PlayStation 5, Xbox Series X/S, PlayStation 4, Xbox One, and PC on November 3. This news comes after a showing during the June Future Games Showcase, with The Entropy Centre\'s trailer garnering more than two million views in just 48 hours, according to a press release about today\'s news. To celebrate this November release date, Stubby Games has released a new trailer. ', 'http://localhost/batiktours-fix/assets/upload/blog/1664611272.jpg', '2022-10-01 10:01:12'),
(7, 'Portal-Like Puzzle Game, The Entropy Centre, Gets November Release Date', 'The Entropy Centre, an upcoming Portal-like sci-fi puzzle game coming from new studio Stubby Games, will be released this November. \r\n\r\nMore specifically, it will hit PlayStation 5, Xbox Series X/S, PlayStation 4, Xbox One, and PC on November 3. This news comes after a showing during the June Future Games Showcase, with The Entropy Centre\'s trailer garnering more than two million views in just 48 hours, according to a press release about today\'s news. To celebrate this November release date, Stubby Games has released a new trailer. ', 'http://localhost/batiktours-fix/assets/upload/blog/1664611272.jpg', '2022-10-01 10:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_package` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `person` int(11) NOT NULL,
  `coupon` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `destination` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id_cities` int(11) NOT NULL,
  `id_province` int(11) NOT NULL,
  `cities_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id_cities`, `id_province`, `cities_name`) VALUES
(1, 2, 'Jakarta Selatan'),
(2, 2, 'Jakarta Barat'),
(4, 1, 'Kabupaten Aceh Barat'),
(5, 1, 'Kabupaten Aceh Daya'),
(6, 2, 'Jawa Utara');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `id_package` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `name`, `email`, `description`, `date`, `id_package`) VALUES
(6, 'rifqi', 'muhammad45rifki@gmail.com', 'Saya ambil paket mobil dengan sopir 6 hari, Mobil Bagus, bersih, sopir pak Komang, ramah, rapi dan sopan, saya dan anak-anak senang dengan layanan tim Batiktours, recommended buat teman-teman', '2022-10-03 15:43:41', 25);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id_country` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id_country`, `name`) VALUES
(1, 'Indonesia'),
(2, 'Malaysia'),
(3, 'Amerika');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `cities` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `approve` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstname`, `lastname`, `email`, `phone`, `country`, `province`, `cities`, `address`, `postal_code`, `token`, `approve`) VALUES
(14, 'Rifqi', 'Muhammad', 'muhammad45rifki@gmail.com', '085280136585', 1, 2, 1, 'ciputat, tangerang selatan', '15412', 'rpbnn95pp32lm17kb8i0fim4hl18f166', 'N'),
(15, 'Rifqi', 'Muhammad', 'muhammad45rifki@gmail.com', '085280136585', 1, 2, 6, 'ciputat, tangerang selatan', '15412', '8m975q1s9t8hlerr72cccgj4r3cvrlnv', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_package` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `person` int(11) NOT NULL,
  `coupon` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `destination` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_package`, `package_name`, `price`, `person`, `coupon`, `token`, `id_cust`, `foto`, `date`, `destination`) VALUES
(43, 29, 'Paket Liburan ke Bali 3 Hari 2 Malam', 2000000, 2, '', 'rpbnn95pp32lm17kb8i0fim4hl18f166', 14, 'http://localhost/batiktours-fix/assets/upload/package/thumbnail/1664626019_thumb.jpeg', '2022-10-01', 'Jakarta Selatan'),
(44, 28, 'Paket Wisata Liburan Tour ke Pulau-seribu 2022', 2000000, 2, '', '8m975q1s9t8hlerr72cccgj4r3cvrlnv', 15, 'http://localhost/batiktours-fix/assets/upload/package/thumbnail/1664625896_thumb.jpg', '2022-10-01', 'Jakarta Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id_package` int(11) NOT NULL,
  `package_category_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `sub_package_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `promo` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `itinerary` text NOT NULL,
  `reviews` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `cities` varchar(255) NOT NULL,
  `pax` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `night` int(11) NOT NULL,
  `family` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `package_status` int(3) NOT NULL,
  `post_by` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id_package`, `package_category_id`, `package_name`, `sub_package_name`, `slug`, `price`, `promo`, `discount`, `star`, `photo`, `description`, `itinerary`, `reviews`, `location`, `country`, `province`, `cities`, `pax`, `day`, `night`, `family`, `date`, `post_status`, `package_status`, `post_by`, `origin`, `thumbnail`) VALUES
(25, 1, 'Paket Wisata Lombok 2022 Murah Termasuk Tiket Pesawat', 'Paket Wisata Lombok 2022 Murah Termasuk Tiket Pesawat', 'paket-wisata-lombok-2022-murah-termasuk-tiket-pesawat', 2000000, 100000, 50000, 1, 'http://localhost/batiktours-fix/assets/upload/package/thumbnail/1664623354_thumb.jpg', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', '36.73290899619352, 138.4620398510396', 1, 2, '1', 20, 5, 5, 'Adult', '2022-10-01', 'Publish', 1, 'muhammad45rifki@gmail.com', '1664633872.', '1664633872_thumb.'),
(28, 1, 'Paket Wisata Liburan Tour ke Pulau-seribu 2022', 'Paket Wisata Liburan Tour ke Pulau-seribu 2022', 'paket-wisata-liburan-tour-ke-pulau-seribu-2022', 2000000, 300000, 50000, 1, 'http://localhost/batiktours-fix/assets/upload/package/thumbnail/1664625896_thumb.jpg', 'Paket Wisata Liburan Tour ke Pulau-seribu 2022', 'Paket Wisata Liburan Tour ke Pulau-seribu 2022', 'Paket Wisata Liburan Tour ke Pulau-seribu 2022', '-6.5971469,106.8060388', 1, 2, '1', 4, 3, 1, 'Adult', '2022-10-06', 'Publish', 1, 'muhammad45rifki@gmail.com', '1665023685.', '1665023685_thumb.'),
(29, 1, 'Paket Liburan ke Bali 3 Hari 2 Malam', 'Paket Liburan ke Bali 3 Hari 2 Malam', 'paket-liburan-ke-bali-3-hari-2-malam', 2000000, 200000, 50000, 1, 'http://localhost/batiktours-fix/assets/upload/package/thumbnail/1664626019_thumb.jpeg', 'Paket Liburan ke Bali 3 Hari 2 Malam', 'Paket Liburan ke Bali 3 Hari 2 Malam', 'Paket Liburan ke Bali 3 Hari 2 Malam', '-6.5971469,106.8060388', 1, 1, '4', 20, 1, 3, 'Adult', '2022-10-06', 'Publish', 1, 'muhammad45rifki@gmail.com', '1665023661.', '1665023661_thumb.'),
(30, 2, 'Favorite Switzerland Jungfraujoch & Bernina Panoramic Train', 'Favorite Switzerland Jungfraujoch & Bernina Panoramic Train', 'favorite-switzerland-jungfraujoch-&-bernina-panoramic-train', 3000000, 4000000, 500000, 1, 'http://localhost/batiktours-fix/assets/upload/package/thumbnail/1664979665_thumb.jpg', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', '35.16431338340318, 129.04845030008863', 1, 1, '5', 20, 2, 3, 'Adult', '2022-10-06', 'Publish', 1, 'muhammad45rifki@gmail.com', '1665023625.', '1665023625_thumb.'),
(31, 2, 'Favorite Switzerland Jungfraujoch & Bernina Panoramic Train', 'Favorite Switzerland Jungfraujoch & Bernina Panoramic Train', 'favorite-switzerland-jungfraujoch-&-bernina-panoramic-train', 3000000, 4000000, 500000, 2, 'http://localhost/batiktours-fix/assets/upload/package/thumbnail/1664979665_thumb.jpg', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', '36.73290899619352, 138.4620398510396', 1, 2, '2', 20, 2, 3, 'Adult', '2022-10-06', 'Publish', 1, 'muhammad45rifki@gmail.com', '1665023568.', '1665023568_thumb.'),
(32, 2, 'Favorite Japan, Snow Monkey Park & Water Illumination', 'Favorite Japan, Snow Monkey Park & Water Illumination', 'favorite-japan,-snow-monkey-park-&-water-illumination', 30000000, 400000000, 200000, 1, 'http://localhost/batiktours-fix/assets/upload/package/thumbnail/1664981382_thumb.jpg', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', '36.73282300688235,138.46215786494852', 1, 1, '4', 50, 8, 9, 'Adult', '2022-10-06', 'Publish', 1, 'muhammad45rifki@gmail.com', '1665023514.', '1665023514_thumb.'),
(33, 2, 'Favorite Japan, Snow Monkey Park & Water Illumination', 'Favorite Japan, Snow Monkey Park & Water Illumination', 'favorite-japan,-snow-monkey-park-&-water-illumination', 30000000, 400000000, 200000, 1, 'http://localhost/batiktours-fix/assets/upload/package/thumbnail/1664981382_thumb.jpg', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', 'paket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan\r\n\r\npaket wisata lombok 2022 tersedia untuk 4 hari 3 malam, 3 hari 2 malam sudah termasuk hotel penginapan mulai dari bintang 3 dan juga transportasi serta makan siang/malam. Dipandu oleh tour guide pengalaman untuk menemani anda tour lombok yang menyenangkan', '36.73282300688235,138.46215786494852', 1, 2, '2', 50, 8, 9, 'Adult', '2022-10-06', 'Publish', 1, 'muhammad45rifki@gmail.com', '1665023441.', '1665023441_thumb.');

-- --------------------------------------------------------

--
-- Table structure for table `package_category`
--

CREATE TABLE `package_category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_category`
--

INSERT INTO `package_category` (`id_category`, `name`) VALUES
(1, 'Domestik'),
(2, 'International');

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery`
--

CREATE TABLE `photo_gallery` (
  `id_photo` int(11) NOT NULL,
  `id_package` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_publish` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo_gallery`
--

INSERT INTO `photo_gallery` (`id_photo`, `id_package`, `photo`, `origin`, `thumbnail`, `date_publish`) VALUES
(14, 25, 'http://localhost/batiktours-fix/assets/upload/photo_package/thumbnail/1664623376_thumb.jpg', '1664623376.jpg', '1664623376_thumb.jpg', '2022-10-01 13:22:56'),
(16, 28, 'http://localhost/batiktours-fix/assets/upload/photo_package/thumbnail/1664625940_thumb.jpg', '1664625940.jpg', '1664625940_thumb.jpg', '2022-10-01 14:05:40'),
(17, 28, 'http://localhost/batiktours-fix/assets/upload/photo_package/thumbnail/1664625946_thumb.jpg', '1664625946.jpg', '1664625946_thumb.jpg', '2022-10-01 14:05:46'),
(18, 29, 'http://localhost/batiktours-fix/assets/upload/photo_package/thumbnail/1664626048_thumb.jpg', '1664626049.jpg', '1664626049_thumb.jpg', '2022-10-01 14:07:29'),
(19, 29, 'http://localhost/batiktours-fix/assets/upload/photo_package/thumbnail/1664626055_thumb.jpg', '1664626055.jpg', '1664626055_thumb.jpg', '2022-10-01 14:07:35'),
(20, 25, 'http://localhost/batiktours-fix/assets/upload/photo_package/thumbnail/1664633454_thumb.jpg', '1664633454.jpg', '1664633454_thumb.jpg', '2022-10-01 16:10:54'),
(22, 25, 'http://localhost/batiktours-fix/assets/upload/photo_package/thumbnail/1664633494_thumb.jpeg', '1664633494.jpeg', '1664633494_thumb.jpeg', '2022-10-01 16:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id_province` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id_province`, `id_country`, `name`) VALUES
(1, 1, 'Aceh'),
(2, 1, 'Jakarta'),
(3, 2, 'Ipoh'),
(4, 2, 'Kuala Lumpur');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id_subscriber` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id_subscriber`, `email`) VALUES
(3, 'muhammad45rifki@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id_testimonial` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id_testimonial`, `name`, `description`, `foto`) VALUES
(4, 'Retno Wulan Sari', 'Excellent!! Thanks a lot travel BatikTours membuat pengalaman ke belitung yg tidak terlupakan.. Pelayanan dan rutenya yg membuat kami tidak mau beranjak dari belitung.. Tour guide yg handal yg tau spot2 foto yg luar biasa, hasil foto yg luaar biasaaa???? Recommended bgt travel BatikTours.. Next time semoga bisa kembali lagi ke belitung..', 'http://localhost/batiktours-fix/assets/upload/testimonial/1664608455.jpg'),
(5, 'Imelda Afriani Shenaga', 'Gk cuma lombok yg exotic,,,  ni travel punya service yg oks bangget,,,, guide nd drivernya?? gk perlu tanya salutt bangett baik, ramah, sabar, gokil… gk sia2 jauh2 ke lombok pake tur travel ini…. Baru x ini ikut tur travel sampe terharu dan kangen saat pisahaan,,saat tur berakhir…thx so much,,, ingat lombok ingat BatikTours ', 'http://localhost/batiktours-fix/assets/upload/testimonial/1664608571.jpg'),
(6, 'Evariana', 'Saya ambil paket mobil dengan sopir 6 hari, Mobil Bagus, bersih, sopir pak komang, ramah, rapi dan sopan, saya dan anak-anak senang dengan layanan tim BatikTours!, recommended buat teman-teman!', 'http://localhost/batiktours-fix/assets/upload/testimonial/1664608673.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` int(11) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `access_level` enum('admin','pengguna') NOT NULL DEFAULT 'pengguna',
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `email`, `password`, `phone`, `city`, `address`, `photo`, `birthdate`, `access_level`, `token`) VALUES
(1, 'Rifqi', 'Muhammad', 'muhammad45rifki@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '085280136585', 2, 'Ciputat', 'http://localhost/batiktours-fix/assets/upload/user/1664559756.jpg', '1988-02-27', 'admin', ''),
(6, 'Rifqi', 'Muhammad', 'muhammad45rifqi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '085280136585', 2, 'ciputat, tangerang selatan', 'http://localhost/batiktours-fix/assets/upload/user/1664591587.jpeg', '1935-08-12', 'pengguna', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id_cities`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id_package`);

--
-- Indexes for table `package_category`
--
ALTER TABLE `package_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id_province`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id_subscriber`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id_testimonial`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id_cities` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id_package` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `package_category`
--
ALTER TABLE `package_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id_province` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id_subscriber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id_testimonial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
