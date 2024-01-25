-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 04:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kuliner`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesan`
--

CREATE TABLE `detail_pemesan` (
  `id_detail_pemesan` int(11) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pemesan`
--

INSERT INTO `detail_pemesan` (`id_detail_pemesan`, `id_pemesan`, `username`, `id_produk`, `jumlah_produk`) VALUES
(54, 31, 'vhieselfi', 34, 1),
(55, 32, 'vhieselfi', 30, 1),
(56, 33, 'vhieselfi', 41, 1),
(57, 34, 'vhieselfi', 30, 1),
(58, 35, 'vhieselfi', 38, 2),
(59, 36, 'vhieselfi', 37, 2),
(60, 36, 'vhieselfi', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE `pemesan` (
  `id_pemesan` int(11) NOT NULL,
  `tanggal_pemesan` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`id_pemesan`, `tanggal_pemesan`, `total_harga`, `total_bayar`) VALUES
(31, '2024-01-11', 150000, 150000),
(32, '2024-01-11', 45000, 45000),
(33, '2024-01-11', 8000, 10000),
(34, '2024-01-12', 45000, 50000),
(35, '2024-01-21', 16000, 16000),
(36, '2024-01-21', 345000, 345000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(64) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `jenis_produk` varchar(64) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `gambar` varchar(64) NOT NULL,
  `best` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `jenis_produk`, `stok`, `harga`, `gambar`, `best`) VALUES
(28, 'Roti Cinnamon', 'Roti cinnamon kami adalah pilihan sempurna untuk Anda yang menyukai kombinasi cita rasa manis dan rempah-rempah yang menggoda. Dibuat dengan teliti menggunakan bahan-bahan berkualitas tinggi, roti ini tidak hanya memanjakan lidah Anda tetapi juga memberikan pengalaman kuliner yang memuaskan.', 'Roti', 20, 13000, 'b-cinamon.png', 1),
(29, 'Roti Croissant', 'Roti Croissant adalah kelezatan kuliner yang terkenal dengan lapisan-lapisan tipis yang rapuh dan rasa yang lembut. Dibuat dengan menggunakan adonan berlapis-lapis yang kaya mentega, roti ini menghasilkan struktur yang unik dan kelezatan yang tak tertandingi.', 'Roti', 24, 30000, 'b-kroisan.png', 0),
(30, 'Pizza Tuna Keju', 'Dengan paduan bahan berkualitas tinggi, Pizza Tuna Keju menjadi pilihan yang sempurna untuk para pecinta pizza yang menginginkan variasi rasa yang berbeda. Kelezatan tuna yang terasa segar dan keju yang meleleh akan membuat setiap gigitan menjadi pengalaman kuliner yang tak terlupakan.', 'Roti', 10, 45000, 'b-pizza.png', 1),
(31, 'Sandwich Daging Asap', 'Sandwich Daging Asap adalah hidangan lezat yang menggabungkan cita rasa gurih dan nikmat dari daging asap dengan kelezatan roti yang lembut. Daging asap yang digunakan umumnya telah diproses dengan metode asap untuk memberikan aroma dan rasa khas yang menggugah selera. Kelembutan daging yang dihasilkan dari proses ini membuat sandwich ini menjadi pilihan yang memuaskan untuk para pecinta daging', 'Roti', 21, 25000, 'b-sandwitch.png', 0),
(32, 'Roti Sosis Sapi', 'Roti Sosis Sapi adalah varian roti yang diisi dengan sosis sapi berkualitas tinggi. Roti ini memiliki tekstur yang lembut dan empuk, sementara sosis sapi di dalamnya memberikan rasa gurih dan kaya akan protein. Dengan kombinasi yang sempurna antara roti dan sosis, produk ini menjadi pilihan yang lezat dan bergizi sebagai sarapan atau camilan.', 'Roti', 54, 10000, 'b-sausage.png', 1),
(33, 'Kue Keju', 'Kue Keju adalah sajian istimewa yang memadukan kelezatan keju dengan kelembutan adonan kue yang lembut. Dibuat dengan teliti menggunakan bahan-bahan berkualitas tinggi, kue ini menawarkan pengalaman rasa yang memanjakan lidah.', 'Kue', 12, 150000, 'c-cheese.png', 0),
(34, 'Kue Coklat', 'Nikmati kelezatan penuh coklat dalam setiap gigitan dengan Kue Coklat Premium kami. Dibuat dengan teliti menggunakan bahan-bahan berkualitas tinggi, kue ini adalah pilihan sempurna untuk memuaskan keinginan coklat Anda.', 'Kue', 12, 150000, 'c-coklat.png', 1),
(35, 'Kue Mocca', 'Kue Mocca biasanya memiliki lapisan krim mocca yang dibuat dari campuran kopi berkualitas tinggi dan cokelat yang memberikan rasa kaya dan mendalam. Beberapa varian Kue Mocca juga mungkin mencakup tambahan bahan seperti kacang, almond, atau hiasan kopi bubuk untuk memberikan dimensi tambahan pada rasanya.', 'Kue', 12, 150000, 'c-mocca.png', 0),
(36, 'Kue Oreo', 'Kue Oreo Crunchy Delight adalah sajian lezat yang menggabungkan kelezatan kue dengan keunikan rasa dari biskuit Oreo. Dibuat dengan teliti dan menggunakan bahan-bahan berkualitas tinggi, kue ini menjadi pilihan sempurna bagi pecinta Oreo dan pencinta kue.', 'Kue', 12, 150000, 'c-oreo.png', 0),
(37, 'Kue Strawberry', 'Kue Strawberry adalah sebuah hidangan lezat yang terbuat dari bahan-bahan berkualitas tinggi, dengan rasa segar dan manis dari buah strawberry yang menjadi bahan utama. Kue ini memiliki tekstur lembut dan empuk, memberikan pengalaman menggigit yang memuaskan.', 'Kue', 12, 150000, 'c-strawberry.png', 0),
(38, 'Donat Almond', 'Bagian luar donat dilapisi dengan lapisan lembut gula glazur, memberikan sentuhan manis yang pas dan meningkatkan kesan istimewa. Sedangkan bagian atasnya dihiasi dengan irisan almond yang renyah, menambahkan tekstur dan cita rasa yang unik pada setiap suapan.', 'Donat', 42, 8000, 'd-almon.png', 1),
(39, 'Donat Coklat', 'Donat ini memiliki tekstur yang lembut di dalam, dengan lapisan luar yang renyah dan menggoda berkat coklat yang meleleh di mulut. Kelezatan coklat memberikan sentuhan manis dan penuh cita rasa, membangkitkan selera makan siapa pun yang mencicipinya.', 'Donat', 56, 8000, 'd-coklat.png', 0),
(40, 'Donat Kacang', 'Donat kacang adalah varian donat yang kaya akan cita rasa dan tekstur lezat berkat tambahan kacang dalam komposisinya. Donat ini memiliki lapisan luar yang renyah dan garing, sementara bagian dalamnya lembut dan berongga, menciptakan pengalaman menggigit yang memuaskan. Kacang yang ditambahkan memberikan dimensi baru pada rasa, menambahkan kelezatan dan kekayaan cita rasa yang membuat donat ini menjadi pilihan favorit bagi pecinta makanan manis.', 'Donat', 50, 8000, 'd-nut.png', 0),
(41, 'Donat Strawberry', 'Setiap gigitan Donat Strawberry membawa sensasi kenikmatan yang unik, karena rasa manis buah strawberry yang segar dan gula glazur yang menyatu dengan lembut di lidah. Donat ini merupakan pilihan sempurna untuk memuaskan keinginan untuk sesuatu yang manis dan lezat, baik sebagai camilan di tengah hari atau sebagai hidangan penutup yang memikat.', 'Donat', 42, 8000, 'd-strawberry.png', 1),
(43, 'Donat Kentang', '', 'Donat', 12, 8000, '658c3f3328097.png', 0),
(50, 'jelly', '', 'Donat', 15, 20000, '65ad3b82eea13.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `jenis_kelamin` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `no_tlp` char(12) NOT NULL,
  `role` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `no_tlp`, `role`) VALUES
(13, 'admin', '$2y$10$W.TrrhrvpRKI74UfNdPHS.1fwhiYMuLKHd1oArSn/CNfvHLsk2zXq', 'Selfi', 'Perempuan', '2003-05-26', 'getassrabi', '08977979474', 'admin'),
(16, 'vhieselfi', '$2y$10$0mJlIKtW20wD2za7WqcIaOtuRxvqbNYUzhbZrxyac7kHDjJDOzlFW', 'selfi', '', '0000-00-00', '', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pemesan`
--
ALTER TABLE `detail_pemesan`
  ADD PRIMARY KEY (`id_detail_pemesan`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`id_pemesan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pemesan`
--
ALTER TABLE `detail_pemesan`
  MODIFY `id_detail_pemesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `id_pemesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
