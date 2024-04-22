-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 03:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `genre` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `book_image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `genre`, `price`, `book_image`) VALUES
(28, 'Chronicles of Narnia', 'C.S. Lewis', 'A classic fantasy series for all ages.', 'Fantasy', 25000, 0x68747470733a2f2f6d2e6d656469612d616d617a6f6e2e636f6d2f696d616765732f4d2f4d5635425a575a6b4d7a68684d546374597a426b4d7930305a5449784c574669593249744e544579596d517a4d4751345a6d5534586b4579586b467163476465515856794e5441334d5455324d6a45402e5f56315f2e6a7067),
(30, 'To Kill a Mockingbird', 'Harper Lee', 'A powerful story of racial injustice and moral growth.', 'Fiction', 21000, NULL),
(33, 'Hunger Games', 'Suzanne Collins', 'A thrilling dystopian adventure.', 'Action', 24000, NULL),
(36, 'Catcher in the Rye', 'J.D. Salinger', 'A story about teenage angst and alienation in post-war America.', 'Fiction', 16000, NULL),
(37, 'Lord of the rings', 'J.R.R. Tolkien', 'An epic fantasy trilogy about the quest to destroy the One Ring.', 'Fantasy', 25000, NULL),
(50, 'Percy Jackson and the greek gods', 'Rick Riordan', 'A thriling adventure with the greek gods ', 'Fantasy', 25000, NULL),
(69, 'the alchemist', 'Paulo Coelho', 'The book explores themes of destiny, personal legend, and the importance of listening to the heart.', 'Fantasy', 25000, NULL),
(70, '1984', 'George Orwell', 'The novel explores themes of surveillance, government control, freedom of thought, and the power of language.', 'Action', 30000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `satisfaction` varchar(255) DEFAULT NULL,
  `unsatisfaction` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `NAME`, `email`, `satisfaction`, `unsatisfaction`, `comment`) VALUES
(2, 'Tirzah Atwiine ', 'tirzahatwiine5@gmail.com', '10', 'NONE', 'Loved this app! Thank you.'),
(9, 'Nalubega Grace', 'ngrace@gmail.com', '7', 'none', 'great app!'),
(10, 'tee', 'tee256@gmail.com', '8', 'no', 'wow'),
(11, 'Tirzah Atwiine ', 'tirzahatwiine5@gmail.com', '10', 'none', 'very great app');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `Email`, `Address`) VALUES
(1, 'tirzah', '1234', 'tirzahatwiine5@gmail.com', 'Entebbe'),
(2, 'librarian', 'bookstore', 'librarian@kbs.com', 'Kampala'),
(5, 'patience', 'K12re*', 'patiencea@gmail.com', 'Kireka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
