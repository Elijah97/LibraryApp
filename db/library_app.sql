-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2017 at 04:14 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(20) NOT NULL,
  `ISBN` varchar(200) NOT NULL,
  `qr_book` varchar(32) NOT NULL,
  `traffic` int(11) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `ISBN`, `qr_book`, `traffic`, `status`) VALUES
(1, 'Weep Not, Child', 'RW_DG_GC_014A', 'F2BE182CFC9C2896E4A07505A3D92C58', 10, 'Returned'),
(2, 'Contagious', 'RW_DG_IBT_057', 'FA2D057230A3B7F7E6A414AA94D933BA', 7, 'Returned'),
(3, 'Known and strange th', 'RW_GR_037', 'E08AB9EBC823884EBD14CC19C288672C', 12, 'Returned'),
(4, 'Development as freed', 'RW_DG_GC_020', '583A2E62A07BC077DF9158428A21002B', 8, 'Returned'),
(5, 'Women without Men', 'RW_GR_035', '10A56CE783017FF1FD1635A0C1953CDA', 3, 'Returned'),
(6, 'Criminal Law A', 'RW_DG_GC_026A', '7A7FA2BA42C1306A8A6E2BC1DC50E8D3', 1, 'Returned'),
(7, 'Criminal Law B', 'RW_DG_GC_026B', '3BEDD43A73AF3850E9682900022B7A83', 1, 'Returned'),
(8, 'Tort Law A', 'RW_GR_030A', 'C56B15B37C9DF14867AE1F9EEE832F65', 2, 'Returned'),
(9, 'Tort Law B', 'RW_GR_030B', '61193C0E8EDCDC0DDA0784B99AEF762D', 1, 'Returned'),
(10, 'Land Law', 'RW_DG_IBT_061B', '463741405F2E871DC31A73F992C0A361', 0, 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `book_mgt`
--

CREATE TABLE IF NOT EXISTS `book_mgt` (
  `id` int(11) NOT NULL,
  `qr_book` varchar(40) NOT NULL,
  `qr_student` varchar(40) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `names` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `qr_student` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `names`, `email`, `qr_student`) VALUES
(1, 'Moses RUBIBI ', 'mrubibi17@soon.alustudent.com\r\n', 'b5aab8568bf5d77435762d61748d643d'),
(2, 'Sheillah MUNSABE ', 'smunsabe17@soon.alustudent.com\r\n', 'e813c9a443995d5103b6ea783c65472c'),
(3, 'Cedric	NSENGIYUMVA', 'cnsengiyumva17@soon.alustudent.com\r\n', 'a8f396827a6981936997a0e1543ec209'),
(4, 'Julia	ABAYISENGA', 'jabayisenga17@soon.alustudent.com\r\n', '8a24d7efc99008f1acf73762f3e47338'),
(5, 'Lydie	UMUHIRE', 'lumuhire17@soon.alustudent.com\r\n', 'e75e426b6619ed6409954160acd41ca1'),
(6, 'Sonia	KANAKABAKWIYE', 'ksonia17@soon.alustudent.com\r\n', 'd0331743002ed2d302974f506cb59dd5'),
(7, 'Gisele	UMULIZA', 'ugisele17@soon.alustudent.com\r\n', '384dde0cdf37b77aa9070075c768c2d2'),
(8, 'Olivier	NSHIMIYIMANA', 'nolivier17@soon.alustudent.com\r\n', 'd301af744b2e57a630a6d4336c01794e'),
(9, 'Aline	KAGINA', 'akagina17@soon.alustudent.com\r\n', '83615dfeac7c10f19036471528c051e3'),
(10, 'Linca MATUTINA', 'lmatutina17@soon.alustudent.com\r\n', '4404d5c69839a3ab41aca025c1a035d1'),
(11, 'Merci GASAGIRE ', 'mgasagire17@soon.alustudent.com\r\n', '72c894efa5754bed5b4bf96bb71cd8f1'),
(12, 'Vanessa IRAKOZE', 'virakoze17@soon.alustudent.com\r\n', '443eeb0cb6c986bfd147edfc28a61833'),
(13, 'Happy MUTETERI', 'hmuteteri17@soon.alustudent.com\r\n', 'cad277ebf168a8caef0aa73c4d4c5be1'),
(14, 'Pamela	KYOMUGISHA', 'pkyomugisha17@soon.alustudent.com\r\n', '86f80befda18c41ab9860c1073ef96dd'),
(15, 'Pax MFURA', 'pmfura17@soon.alustudent.com\r\n', 'da3f133805454f8ba2c5a30bd8ff9d02'),
(16, 'Kevin KAYISIRE', 'kkayisire17@soon.alustudent.com\r\n', 'a5cd461898787b1ca1ccd616ac4f2da5'),
(17, 'Elie KAGABO', 'ekagabo17@soon.alustudent.com\r\n', '22e4219afb4768097c0b3e44de3ca71c'),
(18, 'Crepin  KAYISIRE', 'ckayisire17@soon.alustudent.com', '22e4219afb4768097c0b3e44d33c171c');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `joined` date NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `salt`, `joined`, `group_id`) VALUES
(1, 'Elie Gashagaza', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', '2017-08-23', 1),
(2, 'Kevin Kayisire', 'librarian', 'e10adc3949ba59abbe56e057f20f883e', '', '2017-08-23', 2),
(3, 'Pax Mfura', 'pax123', 'e10adc3949ba59abbe56e057f20f883e', '', '2017-08-25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_mgt`
--
ALTER TABLE `book_mgt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `book_mgt`
--
ALTER TABLE `book_mgt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
