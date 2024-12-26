-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 08:39 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_No` int(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_No`, `Username`, `Password`) VALUES
(1, 'elghene', '621bc2e93a370e7fd72e0868b64d7736'),
(2, 'daniel', 'aa47f8215c6f30a0dcdb2a36a9f4168e'),
(3, 'johnmark', '3012a09d4c0a84891b36ba11915cd0b7'),
(4, 'glenn', '3c784bff199ef62ecc2f3a988f395c62'),
(5, 'renz', '490bbb8e8a1d6129b5b9b1423b0bb1ea');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `title` varchar(50) NOT NULL,
  `content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`title`, `content`) VALUES
('Blog 1', 'Cineflix is one of the best sites to watch movies online. Yes, your dream has finally come true. You can now watch thousands of movies online in HD quality with complete safety.'),
('Blog 2', 'With Cineflix, your streaming will not only be exciting, but it will also be safe and seamless. New titles are added to the site on a daily basis, so you''ll never run out of things to watch. If you''re'),
('Blog 3', 'Watching movies on Cineflix is extremely easy. All you need to do is login, search for the title of your choice, hit the play button, and you are all set. What stops you from watching your favorite mo'),
('Blog 4', 'Your support motivates us to thrive, so please share Cineflix with your friends and family. Thanks! Have you ever imagined a free website with all premium content and features?'),
('Blog 5', 'If so, Cineflix will prove to you that nothing is impossible. With the site, you can watch thousands of titles in high resolution safely and seamlessly at no cost.');

-- --------------------------------------------------------

--
-- Table structure for table `book_db`
--

CREATE TABLE `book_db` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` int(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `movie` varchar(20) NOT NULL,
  `packages` varchar(30) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_db`
--

INSERT INTO `book_db` (`id`, `name`, `email`, `phonenumber`, `address`, `movie`, `packages`, `quantity`) VALUES
(1, 'Angelika Camus', 'camus.angelika@clsu2.edu.ph', 323, 'bical', 'venom', 'combo 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `concern`
--

CREATE TABLE `concern` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `theme` varchar(20) NOT NULL,
  `movie_pic` varchar(50) NOT NULL,
  `movie_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `movie_name`, `theme`, `movie_pic`, `movie_price`) VALUES
(2, 'Venom', 'Thriller', '20220521130023venom.jpg', '255.00'),
(3, 'Interstellar', 'Science Fiction', '20220521130116interstaller.jpg', '180.00'),
(4, 'Red Notice', 'Action/Comedy', '20220521130139red-notice.jpg', '250.00'),
(5, 'John Wick: Chapter 3 - Parabellum', 'action', '20220528172934download.jpg', '350.00'),
(7, 'Fast and Furious 9', 'Action/Adventure', '20220530001411f9.jpg', '450.00');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) NOT NULL,
  `package_pic` text NOT NULL,
  `package_name` varchar(20) NOT NULL,
  `package_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_pic`, `package_name`, `package_price`) VALUES
(2, '20220521130247combo 2.png', 'Combo 2', '500.00'),
(3, '20220521130301combo 3.jpg', 'Combo 3', '425.00'),
(4, '20220530001033combo 2.png', 'Combo 4', '250.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `email_verification` varchar(220) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_No`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `book_db`
--
ALTER TABLE `book_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concern`
--
ALTER TABLE `concern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `book_db`
--
ALTER TABLE `book_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `concern`
--
ALTER TABLE `concern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
