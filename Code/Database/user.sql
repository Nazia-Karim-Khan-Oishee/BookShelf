-- create table `users`(
--     `email` varchar(255) not null,
--     `password` varchar(255),
--     `role` varchar(255)
-- )engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
-- alter table `users` add primary key (`email`);
-- create table `deliveryMan`(
--     `email` varchar(255) not null,
--     `name` varchar(255) not null,
--     `contact_no` numeric(11) default null,
--     `area` varchar(255) not null,
--     `district` varchar(255) not null,
--     `division` varchar(255) not null,
--     constraint `deliveryMan_fk` foreign key (`email`) references `users` (`email`)
-- )engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
-- create table `admin`(
--     `email` varchar(255) not null,
--     `name` varchar(255) not null,
--     constraint `admin_fk` foreign key (`email`) references `users` (`email`)
-- )engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
-- create table `customer`(
--     `email` varchar(255) not null,
--     `fine_amount` numeric(4) not null,
--     `effective_date` datetime not null,
--     `status` tinyint(1) DEFAULT 0,
--     constraint `customer_fk` foreign key (`email`) references `users` (`email`)
-- )engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
-- create table `book`(
--     `ISBN` varchar(13) not null,
--     `name` varchar(255) not null,
--     `author` varchar(255) not null,
--     `edition` varchar(3) not null,
--     `publisher` varchar(255) not NULL
-- )engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
-- alter table `book` add primary key (`ISBN`);
-- create table `location`(
--     `location_id` numeric(10) NOT NULL,
--     `area` varchar(255) not null,
--     `district` varchar(255) not null,
--     `division` varchar(255) not null,
--     `delivery_point` varchar(255) not null,
--     `day_of_week` varchar(255) not NULL
-- )engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
-- alter table `location` add primary key (`location_id`);
-- create table `all_copies_of_book`(
--     `ISBN` varchar(13) not null,
--     `copy_id` varchar(10) not null,
--     constraint `all_copies_of_book_fk` foreign key (`ISBN`) references `book` (`ISBN`)
-- )engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
-- alter table `all_copies_of_book` add primary key (`ISBN`, `copy_id`);
-- create table `customer_book`(
--     `email` varchar(255) not null,
--     `ISBN` varchar(13) not null,
--     `copy_id` varchar(10) not null,
--     `return_date` datetime not null,
--     `issue_date` datetime not null,
--     constraint `fk_customer_book1` foreign key (`email`) references `users` (`email`),
--     constraint `fk_customer_book2` foreign key (`ISBN`, `copy_id`) references `all_copies_of_book`(`ISBN`, `copy_id`)
-- )engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
-- create table `book_location_retrieval`(
--     `retrieval_id` varchar(255) not null,
--     `email` varchar(255) not null,
--     `ISBN` varchar(13) not null,
--     `copy_id` varchar(10) not null,
--     `location_id` numeric(10) NOT NULL,
--     `retrieval_date` datetime not null,
--     constraint `fk_book_location_retrieval1` foreign key (`location_id`) references `location`(`location_id`),
--     constraint `fk_book_location_retrieval2` foreign key (`ISBN`, `copy_id`) references `customer_book`(`ISBN`, `copy_id`),
--     constraint `fk_book_location_retrieval3` foreign key (`email`) references `users` (`email`)
-- )engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
-- create table `book_location_delivery`(
--     `delivery_id` varchar(255) not null,
--     `email` varchar(255) not null,
--     `ISBN` varchar(13) not null,
--     `copy_id` varchar(10) not null,
--     `location_id` numeric(10) NOT NULL,
--     `delivery_date` datetime not null,
--     constraint `fk_book_location_delivery1` foreign key (`location_id`) references `location`(`location_id`),
--     constraint `fk_book_location_delivery2` foreign key (`ISBN`, `copy_id`) references `customer_book`(`ISBN`, `copy_id`),
--     constraint `fk_book_location_delivery3` foreign key (`email`) references `users` (`email`)
-- )engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
-- alter table `deliveryMan` add primary key (`email`);
-- alter table `admin` add primary key (`email`);
-- alter table `customer` add primary key (`email`);
-- alter table `customer_book` add primary key (`email`, `ISBN`, `copy_id`);
-- alter table `book_location_retrieval` add primary key (`retrieval_id`);
-- alter table `book_location_delivery` add primary key (`delivery_id`);


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

CREATE TABLE `all_copies_of_book` (
  `ISBN` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `copy_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `copy_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `customer` (`email`, `name`, `contact_no`, `fine_amount`, `effective_date`, `status`) VALUES
('naziakarim@iut-dhaka.edu', 'nazia', '', '0', '0000-00-00 00:00:00', 0),
('oishee1401@gmail.com', 'nazia', '', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_book`
--

CREATE TABLE `customer_book` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ISBN` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `deliveryman` (`email`, `name`, `contact_no`, `area`, `district`, `division`) VALUES
('nanana@gmail.com', 'nnn', NULL, '', '', '');

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

INSERT INTO `users` (`email`, `password`, `role`) VALUES
('nanana@gmail.com', '$2y$10$4Ufee5z2dIao2MokqxlF4Opo7eNINrvzBzkdqS6nS4KFe8Dqg8IOu', 'DeliveryMan'),
('naziakarim@iut-dhaka.edu', '$2y$10$d0WeuLsj1zCPwxexfBFWB.QMPVyzf9Ip6xVTOytBwfvXUNrlCq/3y', 'Reader'),
('oishee1401@gmail.com', '$2y$10$tAtg7DSoMELB.dstWgLJdO3GfCgjhkC9l2X3sApbium9mahWcqRte', 'Reader');

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
ALTER TABLE `all_copies_of_book`
  ADD PRIMARY KEY (`ISBN`,`copy_id`);

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
  ADD KEY `fk_book_location_delivery2` (`ISBN`,`copy_id`),
  ADD KEY `fk_book_location_delivery3` (`email`);

--
-- Indexes for table `book_location_retrieval`
--
ALTER TABLE `book_location_retrieval`
  ADD PRIMARY KEY (`retrieval_id`),
  ADD KEY `fk_book_location_retrieval1` (`location_id`),
  ADD KEY `fk_book_location_retrieval2` (`ISBN`,`copy_id`),
  ADD KEY `fk_book_location_retrieval3` (`email`);

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
  ADD KEY `fk_customer_book2` (`ISBN`,`copy_id`);

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
ALTER TABLE `all_copies_of_book`
  ADD CONSTRAINT `all_copies_of_book_fk` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `book_location_delivery`
--
ALTER TABLE `book_location_delivery`
  ADD CONSTRAINT `fk_book_location_delivery1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `fk_book_location_delivery2` FOREIGN KEY (`ISBN`,`copy_id`) REFERENCES `customer_book` (`ISBN`, `copy_id`),
  ADD CONSTRAINT `fk_book_location_delivery3` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `book_location_retrieval`
--
ALTER TABLE `book_location_retrieval`
  ADD CONSTRAINT `fk_book_location_retrieval1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `fk_book_location_retrieval2` FOREIGN KEY (`ISBN`,`copy_id`) REFERENCES `customer_book` (`ISBN`, `copy_id`),
  ADD CONSTRAINT `fk_book_location_retrieval3` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_fk` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_book`
--
ALTER TABLE `customer_book`
  ADD CONSTRAINT `fk_customer_book1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `fk_customer_book2` FOREIGN KEY (`ISBN`,`copy_id`) REFERENCES `all_copies_of_book` (`ISBN`, `copy_id`);

--
-- Constraints for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD CONSTRAINT `deliveryMan_fk` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
