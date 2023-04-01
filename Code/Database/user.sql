-- new databse


-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 08:08 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshelf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `all_copies_of_book`
--

CREATE TABLE `all_copies_of_books` (
  `copy_id` int(11) NOT NULL,
  `ISBN` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_location_delivery`
--

CREATE TABLE `book_location_delivery` (
  `delivery_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ISBN` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy_id` int(11) NOT NULL,
  `location_id` decimal(10,0) NOT NULL,
  `delivery_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_location_retrieval`
--

CREATE TABLE `book_location_retrieval` (
  `retrieval_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ISBN` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy_id` int(11) NOT NULL,
  `location_id` decimal(10,0) NOT NULL,
  `retrieval_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fine_amount` decimal(4,0) NOT NULL,
  `effective_date` datetime NOT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

--
-- Table structure for table `customer_book`
--

CREATE TABLE `customer_book` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ISBN` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy_id` int(11) NOT NULL,
  `return_date` datetime NOT NULL,
  `issue_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` decimal(11,0) DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveryman`
--
-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` decimal(10,0) NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_of_week` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `all_copies_of_book`
--
ALTER TABLE `all_copies_of_books`
  ADD PRIMARY KEY (`copy_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `book_location_delivery`
--
ALTER TABLE `book_location_delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `fk_book_location_delivery1` (`location_id`),
  ADD KEY `fk_book_location_delivery2` (`copy_id`),
  ADD KEY `fk_book_location_delivery3` (`email`),
  ADD KEY `fk_book_location_delivery4` (`ISBN`);

--
-- Indexes for table `book_location_retrieval`
--
ALTER TABLE `book_location_retrieval`
  ADD PRIMARY KEY (`retrieval_id`),
  ADD KEY `fk_book_location_retrieval1` (`location_id`),
  ADD KEY `fk_book_location_retrieval2` (`copy_id`),
  ADD KEY `fk_book_location_retrieval3` (`ISBN`),
  ADD KEY `fk_book_location_retrieval4` (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `customer_book`
--
ALTER TABLE `customer_book`
  ADD PRIMARY KEY (`email`,`ISBN`,`copy_id`),
  ADD KEY `fk_customer_book1` (`ISBN`),
  ADD KEY `fk_customer_book2` (`copy_id`);

--
-- Indexes for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_fk` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `all_copies_of_book`
--
-- ALTER TABLE `all_copies_of_book`
--   ADD CONSTRAINT `all_copies_of_book_fk` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `book_location_delivery`
--
ALTER TABLE `book_location_delivery`
  ADD CONSTRAINT `fk_book_location_delivery1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `fk_book_location_delivery2` FOREIGN KEY (`copy_id`) REFERENCES `customer_book` (`copy_id`),
  ADD CONSTRAINT `fk_book_location_delivery3` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `fk_book_location_delivery4` FOREIGN KEY (`ISBN`) REFERENCES `customer_book` (`ISBN`);

--
-- Constraints for table `book_location_retrieval`
--
ALTER TABLE `book_location_retrieval`
  ADD CONSTRAINT `fk_book_location_retrieval1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `fk_book_location_retrieval2` FOREIGN KEY (`copy_id`) REFERENCES `customer_book` (`copy_id`),
  ADD CONSTRAINT `fk_book_location_retrieval3` FOREIGN KEY (`ISBN`) REFERENCES `customer_book` (`ISBN`),
  ADD CONSTRAINT `fk_book_location_retrieval4` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_fk` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_book`
--
ALTER TABLE `all_copies_of_books`
  MODIFY `copy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
ALTER TABLE `customer_book`
  ADD CONSTRAINT `fk_customer_book1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `fk_customer_book2` FOREIGN KEY (`copy_id`) REFERENCES `all_copies_of_books` (`copy_id`),
  ADD CONSTRAINT `fk_customer_book3` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD CONSTRAINT `deliveryMan_fk` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
