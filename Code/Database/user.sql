



-- -- phpMyAdmin SQL Dump
-- -- version 5.2.0
-- -- https://www.phpmyadmin.net/
-- --
-- -- Host: 127.0.0.1
-- -- Generation Time: May 16, 2023 at 08:16 PM
-- -- Server version: 10.4.25-MariaDB
-- -- PHP Version: 7.4.30

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;

-- --
-- -- Database: `bookshelf`
-- --

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `admin`
-- --

-- CREATE TABLE `admin` (
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `all_copies_of_books`
-- --

-- CREATE TABLE `all_copies_of_books` (
--   `copy_id` int(11) NOT NULL,
--   `ISBN` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `borrowed` tinyint(1) DEFAULT 0
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --
-- -- Dumping data for table `all_copies_of_books`
-- --

-- INSERT INTO `all_copies_of_books` (`copy_id`, `ISBN`, `borrowed`) VALUES
-- (17, '1100122', 1),
-- (18, '1100122', 1),
-- (19, '1100122', 0),
-- (20, '1100122', 0),
-- (21, '1100122', 0),
-- (22, '1100122', 0),
-- (23, '1100122', 0),
-- (24, '1100122', 0),
-- (25, '1100122', 0),
-- (26, '1100122', 0),
-- (27, '1100122', 0);

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `book`
-- --

-- CREATE TABLE `book` (
--   `ISBN` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `edition` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `book`
-- --

-- INSERT INTO `book` (`ISBN`, `name`, `author`, `edition`, `publisher`, `image`) VALUES
-- ('1100122', 'feluda', 'George R.R. Martin', '3', 'HBO', 'php.png');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `book_location_delivery`
-- --

-- CREATE TABLE `book_location_delivery` (
--   `delivery_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `ISBN` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `copy_id` int(11) NOT NULL,
--   `location_id` decimal(10,0) NOT NULL,
--   `delivery_date` datetime NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `book_location_delivery`
-- --

-- INSERT INTO `book_location_delivery` (`delivery_id`, `email`, `ISBN`, `copy_id`, `location_id`, `delivery_date`) VALUES
-- ('64635d02a2889', 'oishee@gmail.com', '1100122', 17, '29', '2023-05-19 00:00:00'),
-- ('6463676982ce4', 'dummmy@gmail.com', '1100122', 18, '29', '2023-05-19 00:00:00');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `book_location_retrieval`
-- --

-- CREATE TABLE `book_location_retrieval` (
--   `retrieval_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `ISBN` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `copy_id` int(11) NOT NULL,
--   `location_id` decimal(10,0) NOT NULL,
--   `retrieval_date` datetime NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `book_location_retrieval`
-- --

-- INSERT INTO `book_location_retrieval` (`retrieval_id`, `email`, `ISBN`, `copy_id`, `location_id`, `retrieval_date`) VALUES
-- ('64635d02a2889', 'oishee@gmail.com', '1100122', 17, '29', '2023-05-23 00:00:00'),
-- ('6463676982ce4', 'dummmy@gmail.com', '1100122', 18, '29', '2023-05-30 00:00:00');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `customer`
-- --

-- CREATE TABLE `customer` (
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `contact_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `fine_amount` decimal(4,0) NOT NULL,
--   `effective_date` datetime NOT NULL,
--   `status` tinyint(1) DEFAULT 0,
--   `picture` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `customer`
-- --

-- INSERT INTO `customer` (`email`, `name`, `contact_no`, `fine_amount`, `effective_date`, `status`, `picture`) VALUES
-- ('dummmy@gmail.com', 'dummy', '09126378291', '0', '0000-00-00 00:00:00', 0, 'php.png'),
-- ('oishee@gmail.com', 'nazia', '01321178965', '0', '0000-00-00 00:00:00', 0, 'hooman.jpg');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `customer_book`
-- --

-- CREATE TABLE `customer_book` (
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `ISBN` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `copy_id` int(11) NOT NULL,
--   `return_date` datetime NOT NULL,
--   `issue_date` datetime NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `customer_book`
-- --

-- INSERT INTO `customer_book` (`email`, `ISBN`, `copy_id`, `return_date`, `issue_date`) VALUES
-- ('dummmy@gmail.com', '1100122', 18, '2023-05-30 00:00:00', '2023-05-19 00:00:00'),
-- ('oishee@gmail.com', '1100122', 17, '2023-05-23 00:00:00', '2023-05-19 00:00:00');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `deliveryman`
-- --

-- CREATE TABLE `deliveryman` (
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `contact_no` decimal(11,0) DEFAULT NULL,
--   `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `location_id` decimal(10,10) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `deliveryman`
-- --

-- INSERT INTO `deliveryman` (`email`, `name`, `contact_no`, `area`, `district`, `division`, `location_id`) VALUES
-- ('nazia@gmail.com', 'nazia', '1234567891', '', '', '', NULL);

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `location`
-- --

-- CREATE TABLE `location` (
--   `location_id` decimal(10,0) NOT NULL,
--   `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `delivery_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `day_of_week` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `location`
-- --

-- INSERT INTO `location` (`location_id`, `area`, `district`, `division`, `delivery_point`, `day_of_week`) VALUES
-- ('1', 'Sadar Road', 'Barisal', 'Barisal', 'Barisal Sadar Post Office', 'Monday'),
-- ('2', 'Natullabad', 'Barisal', 'Barisal', 'Natullabad Post Office', 'Tuesday'),
-- ('3', 'Durgasagor', 'Barisal', 'Barisal', 'Durgasagor Post Office', 'Wednesday'),
-- ('4', 'Chandpasha', 'Barisal', 'Barisal', 'Chandpasha Post Office', 'Thursday'),
-- ('5', 'Dakbangla', 'Barisal', 'Barisal', 'Dakbangla Post Office', 'Friday'),
-- ('6', 'Bhola Sadar', 'Bhola', 'Barisal', 'Bhola Sadar Post Office', 'Monday'),
-- ('7', 'Lalmohan', 'Bhola', 'Barisal', 'Lalmohan Post Office', 'Tuesday'),
-- ('8', 'Charfashion', 'Bhola', 'Barisal', 'Charfashion Post Office', 'Wednesday'),
-- ('9', 'Manpura', 'Bhola', 'Barisal', 'Manpura Post Office', 'Thursday'),
-- ('10', 'Tazumuddin', 'Bhola', 'Barisal', 'Tazumuddin Post Office', 'Friday'),
-- ('11', 'Barguna Sadar', 'Barguna', 'Barisal', 'Barguna Sadar Post Office', 'Monday'),
-- ('12', 'Amtali', 'Barguna', 'Barisal', 'Amtali Post Office', 'Tuesday'),
-- ('13', 'Patharghata', 'Barguna', 'Barisal', 'Patharghata Post Office', 'Wednesday'),
-- ('14', 'Betagi', 'Barguna', 'Barisal', 'Betagi Post Office', 'Thursday'),
-- ('15', 'Bamna', 'Barguna', 'Barisal', 'Bamna Post Office', 'Friday'),
-- ('16', 'Jhalokati Sadar', 'Jhalokati', 'Barisal', 'Jhalokati Sadar Post Office', 'Monday'),
-- ('17', 'Kathalia', 'Jhalokati', 'Barisal', 'Kathalia Post Office', 'Tuesday'),
-- ('18', 'Nalchhiti', 'Jhalokati', 'Barisal', 'Nalchhiti Post Office', 'Wednesday'),
-- ('19', 'Rajapur', 'Jhalokati', 'Barisal', 'Rajapur Post Office', 'Thursday'),
-- ('20', 'Bauphal', 'Patuakhali', 'Barisal', 'Bauphal Post Office', 'Friday'),
-- ('21', 'Dashmina', 'Patuakhali', 'Barisal', 'Dashmina Post Office', 'Monday'),
-- ('22', 'Galachipa', 'Patuakhali', 'Barisal', 'Galachipa Post Office', 'Tuesday'),
-- ('23', 'Kalapara', 'Patuakhali', 'Barisal', 'Kalapara Post Office', 'Wednesday'),
-- ('24', 'Mirzaganj', 'Patuakhali', 'Barisal', 'Mirzaganj Post Office', 'Thursday'),
-- ('25', 'Gulshan-1', 'Dhaka', 'Dhaka', 'Gulshan Post Office', 'Monday'),
-- ('26', 'Banani', 'Dhaka', 'Dhaka', 'Banani Post Office', 'Tuesday'),
-- ('27', 'Uttara', 'Dhaka', 'Dhaka', 'Uttara Post Office', 'Wednesday'),
-- ('28', 'Mirpur-10', 'Dhaka', 'Dhaka', 'Mirpur Post Office', 'Thursday'),
-- ('29', 'Mohammadpur', 'Dhaka', 'Dhaka', 'Mohammadpur Post Office', 'Friday'),
-- ('30', 'Narayanganj Sadar', 'Narayanganj', 'Dhaka', 'Narayanganj Sadar Post Office', 'Monday'),
-- ('31', 'Araihazar', 'Narayanganj', 'Dhaka', 'Araihazar Post Office', 'Tuesday'),
-- ('32', 'Sonargaon', 'Narayanganj', 'Dhaka', 'Sonargaon Post Office', 'Wednesday'),
-- ('33', 'Rupganj', 'Narayanganj', 'Dhaka', 'Rupganj Post Office', 'Thursday'),
-- ('34', 'Siddhirganj', 'Narayanganj', 'Dhaka', 'Siddhirganj Post Office', 'Friday'),
-- ('35', 'Savar', 'Dhaka', 'Dhaka', 'Savar Post Office', 'Monday'),
-- ('36', 'Dhamrai', 'Dhaka', 'Dhaka', 'Dhamrai Post Office', 'Tuesday'),
-- ('37', 'Tongi', 'Gazipur', 'Dhaka', 'Tongi Post Office', 'Wednesday'),
-- ('38', 'Kaliganj', 'Gazipur', 'Dhaka', 'Kaliganj Post Office', 'Thursday'),
-- ('39', 'Mymensingh Sadar', 'Mymensingh', 'Dhaka', 'Mymensingh Sadar Post Office', 'Friday'),
-- ('40', 'Gafargaon', 'Mymensingh', 'Dhaka', 'Gafargaon Post Office', 'Monday'),
-- ('41', 'Trishal', 'Mymensingh', 'Dhaka', 'Trishal Post Office', 'Tuesday'),
-- ('42', 'Ishwarganj', 'Mymensingh', 'Dhaka', 'Ishwarganj Post Office', 'Wednesday'),
-- ('43', 'Phulpur', 'Mymensingh', 'Dhaka', 'Phulpur Post Office', 'Thursday'),
-- ('44', 'Netrokona Sadar', 'Netrokona', 'Dhaka', 'Netrokona Sadar Post Office', 'Friday'),
-- ('45', 'Atpara', 'Netrokona', 'Dhaka', 'Atpara Post Office', 'Monday'),
-- ('46', 'Khaliajuri', 'Netrokona', 'Dhaka', 'Khaliajuri Post Office', 'Tuesday'),
-- ('47', 'Madan', 'Netrokona', 'Dhaka', 'Madan Post Office', 'Wednesday'),
-- ('48', 'Durgapur', 'Netrokona', 'Dhaka', 'Durgapur Post Office', 'Thursday'),
-- ('49', 'Kalmakanda', 'Netrokona', 'Dhaka', 'Kalmakanda Post Office', 'Friday'),
-- ('50', 'Sherpur Sadar', 'Sherpur', 'Mymensingh', 'Sherpur Sadar Post Office', 'Monday'),
-- ('51', 'Mymensingh Sadar', 'Mymensingh', 'Mymensingh', 'Mymensingh Sadar Post Office', 'Monday'),
-- ('52', 'Bhaluka', 'Mymensingh', 'Mymensingh', 'Bhaluka Post Office', 'Tuesday'),
-- ('53', 'Fulbaria', 'Mymensingh', 'Mymensingh', 'Fulbaria Post Office', 'Wednesday'),
-- ('54', 'Trishal', 'Mymensingh', 'Mymensingh', 'Trishal Post Office', 'Thursday'),
-- ('55', 'Muktagachha', 'Mymensingh', 'Mymensingh', 'Muktagachha Post Office', 'Friday'),
-- ('56', 'Jamalpur Sadar', 'Jamalpur', 'Mymensingh', 'Jamalpur Sadar Post Office', 'Monday'),
-- ('57', 'Malandah', 'Jamalpur', 'Mymensingh', 'Malandah Post Office', 'Tuesday'),
-- ('58', 'Sarishabari', 'Jamalpur', 'Mymensingh', 'Sarishabari Post Office', 'Wednesday'),
-- ('59', 'Ishurdi', 'Pabna', 'Rajshahi', 'Ishurdi Post Office', 'Thursday'),
-- ('60', 'Shahjadpur', 'Sirajganj', 'Rajshahi', 'Shahjadpur Post Office', 'Friday'),
-- ('61', 'Rajshahi Sadar', 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar Post Office', 'Monday'),
-- ('62', 'Bagha', 'Rajshahi', 'Rajshahi', 'Bagha Post Office', 'Tuesday'),
-- ('63', 'Paba', 'Rajshahi', 'Rajshahi', 'Paba Post Office', 'Wednesday'),
-- ('64', 'Godagari', 'Rajshahi', 'Rajshahi', 'Godagari Post Office', 'Thursday'),
-- ('65', 'Tanore', 'Rajshahi', 'Rajshahi', 'Tanore Post Office', 'Friday'),
-- ('66', 'Chapainawabganj Sadar', 'Chapainawabganj', 'Rajshahi', 'Chapainawabganj Sadar Post Office', 'Monday'),
-- ('67', 'Nachole', 'Chapainawabganj', 'Rajshahi', 'Nachole Post Office', 'Tuesday'),
-- ('68', 'Shibganj', 'Chapainawabganj', 'Rajshahi', 'Shibganj Post Office', 'Wednesday'),
-- ('69', 'Puthia', 'Rajshahi', 'Rajshahi', 'Puthia Post Office', 'Thursday'),
-- ('70', 'Bagmara', 'Rajshahi', 'Rajshahi', 'Bagmara Post Office', 'Friday'),
-- ('71', 'Joypurhat Sadar', 'Joypurhat', 'Rajshahi', 'Joypurhat Sadar Post Office', 'Monday'),
-- ('72', 'Panchbibi', 'Joypurhat', 'Rajshahi', 'Panchbibi Post Office', 'Tuesday'),
-- ('73', 'Kalai', 'Joypurhat', 'Rajshahi', 'Kalai Post Office', 'Wednesday'),
-- ('74', 'Khetlal', 'Joypurhat', 'Rajshahi', 'Khetlal Post Office', 'Thursday'),
-- ('75', 'Akkelpur', 'Joypurhat', 'Rajshahi', 'Akkelpur Post Office', 'Friday'),
-- ('76', 'Naogaon Sadar', 'Naogaon', 'Rajshahi', 'Naogaon Sadar Post Office', 'Monday'),
-- ('77', 'Sapahar', 'Naogaon', 'Rajshahi', 'Sapahar Post Office', 'Tuesday'),
-- ('78', 'Manda', 'Naogaon', 'Rajshahi', 'Manda Post Office', 'Wednesday'),
-- ('79', 'Mohadevpur', 'Naogaon', 'Rajshahi', 'Mohadevpur Post Office', 'Thursday'),
-- ('80', 'Patnitala', 'Naogaon', 'Rajshahi', 'Patnitala Post Office', 'Friday'),
-- ('81', 'Natore Sadar', 'Natore', 'Rajshahi', 'Natore Sadar Post Office', 'Monday'),
-- ('82', 'Singra', 'Natore', 'Rajshahi', 'Singra Post Office', 'Tuesday'),
-- ('83', 'Baraigram', 'Natore', 'Rajshahi', 'Baraigram Post Office', 'Wednesday'),
-- ('84', 'Sylhet Sadar', 'Sylhet', 'Sylhet', 'Sylhet Sadar Post Office', 'Monday'),
-- ('85', 'Amberkhana', 'Sylhet', 'Sylhet', 'Amberkhana Post Office', 'Tuesday'),
-- ('86', 'Shibgonj', 'Sylhet', 'Sylhet', 'Shibgonj Post Office', 'Wednesday'),
-- ('87', 'Zindabazar', 'Sylhet', 'Sylhet', 'Zindabazar Post Office', 'Thursday'),
-- ('88', 'South Surma', 'Sylhet', 'Sylhet', 'South Surma Post Office', 'Friday'),
-- ('89', 'Habiganj Sadar', 'Habiganj', 'Sylhet', 'Habiganj Sadar Post Office', 'Monday'),
-- ('90', 'Baniachang', 'Habiganj', 'Sylhet', 'Baniachang Post Office', 'Tuesday'),
-- ('91', 'Lakhai', 'Habiganj', 'Sylhet', 'Lakhai Post Office', 'Wednesday'),
-- ('92', 'Madhabpur', 'Habiganj', 'Sylhet', 'Madhabpur Post Office', 'Thursday'),
-- ('93', 'Nabiganj', 'Habiganj', 'Sylhet', 'Nabiganj Post Office', 'Friday'),
-- ('94', 'Moulvibazar Sadar', 'Moulvibazar', 'Sylhet', 'Moulvibazar Sadar Post Office', 'Monday'),
-- ('95', 'Kulaura', 'Moulvibazar', 'Sylhet', 'Kulaura Post Office', 'Tuesday'),
-- ('96', 'Barlekha', 'Moulvibazar', 'Sylhet', 'Barlekha Post Office', 'Wednesday'),
-- ('97', 'Sreemangal', 'Moulvibazar', 'Sylhet', 'Sreemangal Post Office', 'Thursday'),
-- ('98', 'Juri', 'Moulvibazar', 'Sylhet', 'Juri Post Office', 'Friday'),
-- ('99', 'Sunamganj Sadar', 'Sunamganj', 'Sylhet', 'Sunamganj Sadar Post Office', 'Monday'),
-- ('100', 'Chhatak', 'Sunamganj', 'Sylhet', 'Chhatak Post Office', 'Tuesday'),
-- ('101', 'South Sunamganj', 'Sunamganj', 'Sylhet', 'South Sunamganj Post Office', 'Wednesday'),
-- ('102', 'Dhirai Chandpur', 'Sunamganj', 'Sylhet', 'Dhirai Chandpur Post Office', 'Thursday'),
-- ('103', 'Tahirpur', 'Sunamganj', 'Sylhet', 'Tahirpur Post Office', 'Friday'),
-- ('104', 'Chittagong GPO', 'Chittagong', 'Chittagong', 'Chittagong GPO', 'Monday'),
-- ('105', 'Al- Amin Baria Madrasa', 'Chittagong', 'Chittagong', 'Al- Amin Baria Madrasa Post Office', 'Tuesday'),
-- ('106', 'Sholashahar', 'Chittagong', 'Chittagong', 'Sholashahar Post Office', 'Wednesday'),
-- ('107', 'Anderkilla', 'Chittagong', 'Chittagong', 'Anderkilla Post Office', 'Thursday'),
-- ('108', 'Jubilee Road', 'Chittagong', 'Chittagong', 'Jubilee Road Post Office', 'Friday'),
-- ('109', 'Cox\'s Bazar', 'Cox\'s Bazar', 'Chittagong', 'Cox\'s Bazar Post Office', 'Monday'),
-- ('110', 'Teknaf', 'Cox\'s Bazar', 'Chittagong', 'Teknaf Post Office', 'Tuesday'),
-- ('111', 'Ramu', 'Cox\'s Bazar', 'Chittagong', 'Ramu Post Office', 'Wednesday'),
-- ('112', 'Ukhiya', 'Cox\'s Bazar', 'Chittagong', 'Ukhiya Post Office', 'Thursday'),
-- ('113', 'Chandnaish', 'Chittagong', 'Chittagong', 'Chandnaish Post Office', 'Friday'),
-- ('114', 'Fatickchari', 'Chittagong', 'Chittagong', 'Fatickchari Post Office', 'Monday'),
-- ('115', 'Sitakund', 'Chittagong', 'Chittagong', 'Sitakund Post Office', 'Tuesday'),
-- ('116', 'Boalkhali', 'Chittagong', 'Chittagong', 'Boalkhali Post Office', 'Wednesday'),
-- ('117', 'Mirsharai', 'Chittagong', 'Chittagong', 'Mirsharai Post Office', 'Thursday'),
-- ('118', 'Hathazari', 'Chittagong', 'Chittagong', 'Hathazari Post Office', 'Friday'),
-- ('119', 'Chhagalnaiya', 'Feni', 'Chittagong', 'Chhagalnaiya Post Office', 'Monday'),
-- ('120', 'Feni Sadar', 'Feni', 'Chittagong', 'Feni Sadar Post Office', 'Tuesday'),
-- ('121', 'Dagonbhuiyan', 'Feni', 'Chittagong', 'Dagonbhuiyan Post Office', 'Wednesday'),
-- ('122', 'Sonagazi', 'Feni', 'Chittagong', 'Sonagazi Post Office', 'Thursday'),
-- ('123', 'Parshuram', 'Feni', 'Chittagong', 'Parshuram Post Office', 'Friday'),
-- ('124', 'Brahmanbaria Sadar', 'Brahmanbaria', 'Chittagong', 'Brahmanbaria Sadar Post Office', 'Monday'),
-- ('125', 'Kasba', 'Brahmanbaria', 'Chittagong', 'Kasba Post Office', 'Tuesday'),
-- ('126', 'Chittagong Airport', 'Chittagong', 'Chittagong', 'Chittagong Airport Post Office', 'Wednesday'),
-- ('127', 'Chittagong Cantonment', 'Chittagong', 'Chittagong', 'Chittagong Cantonment Post Office', 'Monday'),
-- ('128', 'Khulshi', 'Chittagong', 'Chittagong', 'Khulshi Post Office', 'Tuesday'),
-- ('129', 'Pahartali', 'Chittagong', 'Chittagong', 'Pahartali Post Office', 'Wednesday'),
-- ('130', 'Patenga', 'Chittagong', 'Chittagong', 'Patenga Post Office', 'Thursday'),
-- ('131', 'Shah Amanat International Airport', 'Chittagong', 'Chittagong', 'Shah Amanat International Airport Post Office', 'Friday'),
-- ('132', 'Chittagong University', 'Chittagong', 'Chittagong', 'Chittagong University Post Office', 'Monday'),
-- ('133', 'Feni Road', 'Noakhali', 'Chittagong', 'Feni Road Post Office', 'Tuesday'),
-- ('134', 'Bhulta', 'Narayanganj', 'Chittagong', 'Bhulta Post Office', 'Wednesday'),
-- ('135', 'Sitakunda Marine Drive', 'Chittagong', 'Chittagong', 'Sitakunda Marine Drive Post Office', 'Thursday'),
-- ('151', 'Rangpur GPO', 'Rangpur', 'Rangpur', 'Rangpur GPO', 'Monday'),
-- ('152', 'Pirgachha', 'Rangpur', 'Rangpur', 'Pirgachha Post Office', 'Tuesday'),
-- ('153', 'Mithapukur', 'Rangpur', 'Rangpur', 'Mithapukur Post Office', 'Wednesday'),
-- ('154', 'Kawnia', 'Rangpur', 'Rangpur', 'Kawnia Post Office', 'Thursday'),
-- ('155', 'Gangachara', 'Rangpur', 'Rangpur', 'Gangachara Post Office', 'Friday'),
-- ('156', 'Thakurgaon', 'Thakurgaon', 'Rangpur', 'Thakurgaon Post Office', 'Monday'),
-- ('157', 'Pirganj', 'Rangpur', 'Rangpur', 'Pirganj Post Office', 'Tuesday'),
-- ('158', 'Badarganj', 'Rangpur', 'Rangpur', 'Badarganj Post Office', 'Wednesday'),
-- ('159', 'Kaunia', 'Rangpur', 'Rangpur', 'Kaunia Post Office', 'Thursday'),
-- ('160', 'Rangpur Cantonment', 'Rangpur', 'Rangpur', 'Rangpur Cantonment Post Office', 'Friday'),
-- ('161', 'Khulna GPO', 'Khulna', 'Khulna', 'Khulna GPO', 'Monday'),
-- ('162', 'Chalna Bazar', 'Khulna', 'Khulna', 'Chalna Bazar Post Office', 'Tuesday'),
-- ('163', 'Jahanabad Cantonment', 'Khulna', 'Khulna', 'Jahanabad Cantonment Post Office', 'Wednesday'),
-- ('164', 'Paikgachha', 'Khulna', 'Khulna', 'Paikgachha Post Office', 'Thursday'),
-- ('165', 'Terokhada', 'Khulna', 'Khulna', 'Terokhada Post Office', 'Friday'),
-- ('166', 'Jessore Sadar', 'Jessore', 'Khulna', 'Jessore Sadar Post Office', 'Monday'),
-- ('167', 'Manirampur', 'Jessore', 'Khulna', 'Manirampur Post Office', 'Tuesday'),
-- ('168', 'Jhikargachha', 'Jessore', 'Khulna', 'Jhikargachha Post Office', 'Wednesday'),
-- ('169', 'Sharsha', 'Jessore', 'Khulna', 'Sharsha Post Office', 'Thursday'),
-- ('170', 'Abhaynagar', 'Jessore', 'Khulna', 'Abhaynagar Post Office', 'Friday');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `users`
-- --

-- CREATE TABLE `users` (
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `users`
-- --

-- INSERT INTO `users` (`email`, `password`, `role`) VALUES
-- ('dummmy@gmail.com', '$2y$10$a2m2aIll0aHe6x3djD.4ROrNsJwQU02wAUlwc.eF8VhhtE7FygSRO', 'Reader'),
-- ('nazia@gmail.com', '$2y$10$WomKs7..bD3ZEm4vuoqwS.rclb6pMjkjrmSFYuBYEynLxWf/w/6sy', 'DeliveryMan'),
-- ('oishee@gmail.com', '$2y$10$jUbg.BuDsAihQNo9knf29O6WWD3A7uWswpmp.9oCq6U.w/JJ4/.N.', 'Reader');

-- --
-- -- Indexes for dumped tables
-- --

-- --
-- -- Indexes for table `admin`
-- --
-- ALTER TABLE `admin`
--   ADD PRIMARY KEY (`email`);

-- --
-- -- Indexes for table `all_copies_of_books`
-- --
-- ALTER TABLE `all_copies_of_books`
--   ADD PRIMARY KEY (`copy_id`);

-- --
-- -- Indexes for table `book`
-- --
-- ALTER TABLE `book`
--   ADD PRIMARY KEY (`ISBN`);

-- --
-- -- Indexes for table `book_location_delivery`
-- --
-- ALTER TABLE `book_location_delivery`
--   ADD PRIMARY KEY (`delivery_id`),
--   ADD KEY `fk_book_location_delivery1` (`location_id`),
--   ADD KEY `fk_book_location_delivery2` (`copy_id`),
--   ADD KEY `fk_book_location_delivery3` (`email`),
--   ADD KEY `fk_book_location_delivery4` (`ISBN`);

-- --
-- -- Indexes for table `book_location_retrieval`
-- --
-- ALTER TABLE `book_location_retrieval`
--   ADD PRIMARY KEY (`retrieval_id`),
--   ADD KEY `fk_book_location_retrieval1` (`location_id`),
--   ADD KEY `fk_book_location_retrieval2` (`copy_id`),
--   ADD KEY `fk_book_location_retrieval3` (`ISBN`),
--   ADD KEY `fk_book_location_retrieval4` (`email`);

-- --
-- -- Indexes for table `customer`
-- --
-- ALTER TABLE `customer`
--   ADD PRIMARY KEY (`email`);

-- --
-- -- Indexes for table `customer_book`
-- --
-- ALTER TABLE `customer_book`
--   ADD PRIMARY KEY (`email`,`ISBN`,`copy_id`),
--   ADD KEY `fk_customer_book1` (`ISBN`),
--   ADD KEY `fk_customer_book2` (`copy_id`);

-- --
-- -- Indexes for table `deliveryman`
-- --
-- ALTER TABLE `deliveryman`
--   ADD PRIMARY KEY (`email`),
--   ADD UNIQUE KEY `email` (`email`),
--   ADD KEY `location_id` (`location_id`);

-- --
-- -- Indexes for table `location`
-- --
-- ALTER TABLE `location`
--   ADD PRIMARY KEY (`location_id`);

-- --
-- -- Indexes for table `users`
-- --
-- ALTER TABLE `users`
--   ADD PRIMARY KEY (`email`),
--   ADD UNIQUE KEY `email` (`email`);

-- --
-- -- AUTO_INCREMENT for dumped tables
-- --

-- --
-- -- AUTO_INCREMENT for table `all_copies_of_books`
-- --
-- ALTER TABLE `all_copies_of_books`
--   MODIFY `copy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

-- --
-- -- Constraints for dumped tables
-- --

-- --
-- -- Constraints for table `admin`
-- --
-- ALTER TABLE `admin`
--   ADD CONSTRAINT `admin_fk` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

-- --
-- -- Constraints for table `book_location_delivery`
-- --
-- ALTER TABLE `book_location_delivery`
--   ADD CONSTRAINT `fk_book_location_delivery1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`),
--   ADD CONSTRAINT `fk_book_location_delivery2` FOREIGN KEY (`copy_id`) REFERENCES `customer_book` (`copy_id`),
--   ADD CONSTRAINT `fk_book_location_delivery3` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
--   ADD CONSTRAINT `fk_book_location_delivery4` FOREIGN KEY (`ISBN`) REFERENCES `customer_book` (`ISBN`);

-- --
-- -- Constraints for table `book_location_retrieval`
-- --
-- ALTER TABLE `book_location_retrieval`
--   ADD CONSTRAINT `fk_book_location_retrieval1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`),
--   ADD CONSTRAINT `fk_book_location_retrieval2` FOREIGN KEY (`copy_id`) REFERENCES `customer_book` (`copy_id`),
--   ADD CONSTRAINT `fk_book_location_retrieval3` FOREIGN KEY (`ISBN`) REFERENCES `customer_book` (`ISBN`),
--   ADD CONSTRAINT `fk_book_location_retrieval4` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

-- --
-- -- Constraints for table `customer`
-- --
-- ALTER TABLE `customer`
--   ADD CONSTRAINT `customer_fk` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

-- --
-- -- Constraints for table `customer_book`
-- --
-- ALTER TABLE `customer_book`
--   ADD CONSTRAINT `fk_customer_book1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
--   ADD CONSTRAINT `fk_customer_book2` FOREIGN KEY (`copy_id`) REFERENCES `all_copies_of_books` (`copy_id`),
--   ADD CONSTRAINT `fk_customer_book3` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);

-- --
-- -- Constraints for table `deliveryman`
-- --
-- ALTER TABLE `deliveryman`
--   ADD CONSTRAINT `deliveryMan_fk` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
--   ADD CONSTRAINT `deliveryman_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;
-- COMMIT;

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 08:22 AM
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
-- Table structure for table `all_copies_of_books`
--

CREATE TABLE `all_copies_of_books` (
  `copy_id` int(11) NOT NULL,
  `ISBN` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrowed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_copies_of_books`
--

INSERT INTO `all_copies_of_books` (`copy_id`, `ISBN`, `borrowed`) VALUES
(17, '1100122', 1),
(18, '1100122', 1),
(19, '1100122', 0),
(20, '1100122', 0),
(21, '1100122', 0),
(22, '1100122', 0),
(23, '1100122', 0),
(24, '1100122', 0),
(25, '1100122', 0),
(26, '1100122', 0),
(27, '1100122', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `name`, `author`, `edition`, `publisher`, `image`) VALUES
('1100122', 'feluda', 'George R.R. Martin', '3', 'HBO', 'php.png');

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

--
-- Dumping data for table `book_location_delivery`
--

INSERT INTO `book_location_delivery` (`delivery_id`, `email`, `ISBN`, `copy_id`, `location_id`, `delivery_date`) VALUES
('64635d02a2889', 'oishee@gmail.com', '1100122', 17, '29', '2023-05-19 00:00:00'),
('6463676982ce4', 'dummmy@gmail.com', '1100122', 18, '29', '2023-05-19 00:00:00');

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

--
-- Dumping data for table `book_location_retrieval`
--

INSERT INTO `book_location_retrieval` (`retrieval_id`, `email`, `ISBN`, `copy_id`, `location_id`, `retrieval_date`) VALUES
('64635d02a2889', 'oishee@gmail.com', '1100122', 17, '29', '2023-05-23 00:00:00'),
('6463676982ce4', 'dummmy@gmail.com', '1100122', 18, '29', '2023-05-30 00:00:00');

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
  `status` tinyint(1) DEFAULT 0,
  `picture` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email`, `name`, `contact_no`, `fine_amount`, `effective_date`, `status`, `picture`) VALUES
('dummmy@gmail.com', 'dummy', '09126378291', '0', '0000-00-00 00:00:00', 0, 'php.png'),
('oishee@gmail.com', 'nazia', '01321178965', '0', '0000-00-00 00:00:00', 0, 'hooman.jpg');

-- --------------------------------------------------------

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

--
-- Dumping data for table `customer_book`
--

INSERT INTO `customer_book` (`email`, `ISBN`, `copy_id`, `return_date`, `issue_date`) VALUES
('dummmy@gmail.com', '1100122', 18, '2023-05-30 00:00:00', '2023-05-19 00:00:00'),
('oishee@gmail.com', '1100122', 17, '2023-05-23 00:00:00', '2023-05-19 00:00:00');

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
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` decimal(10,0) DEFAULT NULL,
  `picture` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveryman`
--

INSERT INTO `deliveryman` (`email`, `name`, `contact_no`, `area`, `district`, `division`, `location_id`, `picture`) VALUES
('nazia@gmail.com', 'nazia', '1234567891', '', '', '', NULL, 'delivery.jpg');

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

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `area`, `district`, `division`, `delivery_point`, `day_of_week`) VALUES
('1', 'Sadar Road', 'Barisal', 'Barisal', 'Barisal Sadar Post Office', 'Monday'),
('2', 'Natullabad', 'Barisal', 'Barisal', 'Natullabad Post Office', 'Tuesday'),
('3', 'Durgasagor', 'Barisal', 'Barisal', 'Durgasagor Post Office', 'Wednesday'),
('4', 'Chandpasha', 'Barisal', 'Barisal', 'Chandpasha Post Office', 'Thursday'),
('5', 'Dakbangla', 'Barisal', 'Barisal', 'Dakbangla Post Office', 'Friday'),
('6', 'Bhola Sadar', 'Bhola', 'Barisal', 'Bhola Sadar Post Office', 'Monday'),
('7', 'Lalmohan', 'Bhola', 'Barisal', 'Lalmohan Post Office', 'Tuesday'),
('8', 'Charfashion', 'Bhola', 'Barisal', 'Charfashion Post Office', 'Wednesday'),
('9', 'Manpura', 'Bhola', 'Barisal', 'Manpura Post Office', 'Thursday'),
('10', 'Tazumuddin', 'Bhola', 'Barisal', 'Tazumuddin Post Office', 'Friday'),
('11', 'Barguna Sadar', 'Barguna', 'Barisal', 'Barguna Sadar Post Office', 'Monday'),
('12', 'Amtali', 'Barguna', 'Barisal', 'Amtali Post Office', 'Tuesday'),
('13', 'Patharghata', 'Barguna', 'Barisal', 'Patharghata Post Office', 'Wednesday'),
('14', 'Betagi', 'Barguna', 'Barisal', 'Betagi Post Office', 'Thursday'),
('15', 'Bamna', 'Barguna', 'Barisal', 'Bamna Post Office', 'Friday'),
('16', 'Jhalokati Sadar', 'Jhalokati', 'Barisal', 'Jhalokati Sadar Post Office', 'Monday'),
('17', 'Kathalia', 'Jhalokati', 'Barisal', 'Kathalia Post Office', 'Tuesday'),
('18', 'Nalchhiti', 'Jhalokati', 'Barisal', 'Nalchhiti Post Office', 'Wednesday'),
('19', 'Rajapur', 'Jhalokati', 'Barisal', 'Rajapur Post Office', 'Thursday'),
('20', 'Bauphal', 'Patuakhali', 'Barisal', 'Bauphal Post Office', 'Friday'),
('21', 'Dashmina', 'Patuakhali', 'Barisal', 'Dashmina Post Office', 'Monday'),
('22', 'Galachipa', 'Patuakhali', 'Barisal', 'Galachipa Post Office', 'Tuesday'),
('23', 'Kalapara', 'Patuakhali', 'Barisal', 'Kalapara Post Office', 'Wednesday'),
('24', 'Mirzaganj', 'Patuakhali', 'Barisal', 'Mirzaganj Post Office', 'Thursday'),
('25', 'Gulshan-1', 'Dhaka', 'Dhaka', 'Gulshan Post Office', 'Monday'),
('26', 'Banani', 'Dhaka', 'Dhaka', 'Banani Post Office', 'Tuesday'),
('27', 'Uttara', 'Dhaka', 'Dhaka', 'Uttara Post Office', 'Wednesday'),
('28', 'Mirpur-10', 'Dhaka', 'Dhaka', 'Mirpur Post Office', 'Thursday'),
('29', 'Mohammadpur', 'Dhaka', 'Dhaka', 'Mohammadpur Post Office', 'Friday'),
('30', 'Narayanganj Sadar', 'Narayanganj', 'Dhaka', 'Narayanganj Sadar Post Office', 'Monday'),
('31', 'Araihazar', 'Narayanganj', 'Dhaka', 'Araihazar Post Office', 'Tuesday'),
('32', 'Sonargaon', 'Narayanganj', 'Dhaka', 'Sonargaon Post Office', 'Wednesday'),
('33', 'Rupganj', 'Narayanganj', 'Dhaka', 'Rupganj Post Office', 'Thursday'),
('34', 'Siddhirganj', 'Narayanganj', 'Dhaka', 'Siddhirganj Post Office', 'Friday'),
('35', 'Savar', 'Dhaka', 'Dhaka', 'Savar Post Office', 'Monday'),
('36', 'Dhamrai', 'Dhaka', 'Dhaka', 'Dhamrai Post Office', 'Tuesday'),
('37', 'Tongi', 'Gazipur', 'Dhaka', 'Tongi Post Office', 'Wednesday'),
('38', 'Kaliganj', 'Gazipur', 'Dhaka', 'Kaliganj Post Office', 'Thursday'),
('39', 'Mymensingh Sadar', 'Mymensingh', 'Dhaka', 'Mymensingh Sadar Post Office', 'Friday'),
('40', 'Gafargaon', 'Mymensingh', 'Dhaka', 'Gafargaon Post Office', 'Monday'),
('41', 'Trishal', 'Mymensingh', 'Dhaka', 'Trishal Post Office', 'Tuesday'),
('42', 'Ishwarganj', 'Mymensingh', 'Dhaka', 'Ishwarganj Post Office', 'Wednesday'),
('43', 'Phulpur', 'Mymensingh', 'Dhaka', 'Phulpur Post Office', 'Thursday'),
('44', 'Netrokona Sadar', 'Netrokona', 'Dhaka', 'Netrokona Sadar Post Office', 'Friday'),
('45', 'Atpara', 'Netrokona', 'Dhaka', 'Atpara Post Office', 'Monday'),
('46', 'Khaliajuri', 'Netrokona', 'Dhaka', 'Khaliajuri Post Office', 'Tuesday'),
('47', 'Madan', 'Netrokona', 'Dhaka', 'Madan Post Office', 'Wednesday'),
('48', 'Durgapur', 'Netrokona', 'Dhaka', 'Durgapur Post Office', 'Thursday'),
('49', 'Kalmakanda', 'Netrokona', 'Dhaka', 'Kalmakanda Post Office', 'Friday'),
('50', 'Sherpur Sadar', 'Sherpur', 'Mymensingh', 'Sherpur Sadar Post Office', 'Monday'),
('51', 'Mymensingh Sadar', 'Mymensingh', 'Mymensingh', 'Mymensingh Sadar Post Office', 'Monday'),
('52', 'Bhaluka', 'Mymensingh', 'Mymensingh', 'Bhaluka Post Office', 'Tuesday'),
('53', 'Fulbaria', 'Mymensingh', 'Mymensingh', 'Fulbaria Post Office', 'Wednesday'),
('54', 'Trishal', 'Mymensingh', 'Mymensingh', 'Trishal Post Office', 'Thursday'),
('55', 'Muktagachha', 'Mymensingh', 'Mymensingh', 'Muktagachha Post Office', 'Friday'),
('56', 'Jamalpur Sadar', 'Jamalpur', 'Mymensingh', 'Jamalpur Sadar Post Office', 'Monday'),
('57', 'Malandah', 'Jamalpur', 'Mymensingh', 'Malandah Post Office', 'Tuesday'),
('58', 'Sarishabari', 'Jamalpur', 'Mymensingh', 'Sarishabari Post Office', 'Wednesday'),
('59', 'Ishurdi', 'Pabna', 'Rajshahi', 'Ishurdi Post Office', 'Thursday'),
('60', 'Shahjadpur', 'Sirajganj', 'Rajshahi', 'Shahjadpur Post Office', 'Friday'),
('61', 'Rajshahi Sadar', 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar Post Office', 'Monday'),
('62', 'Bagha', 'Rajshahi', 'Rajshahi', 'Bagha Post Office', 'Tuesday'),
('63', 'Paba', 'Rajshahi', 'Rajshahi', 'Paba Post Office', 'Wednesday'),
('64', 'Godagari', 'Rajshahi', 'Rajshahi', 'Godagari Post Office', 'Thursday'),
('65', 'Tanore', 'Rajshahi', 'Rajshahi', 'Tanore Post Office', 'Friday'),
('66', 'Chapainawabganj Sadar', 'Chapainawabganj', 'Rajshahi', 'Chapainawabganj Sadar Post Office', 'Monday'),
('67', 'Nachole', 'Chapainawabganj', 'Rajshahi', 'Nachole Post Office', 'Tuesday'),
('68', 'Shibganj', 'Chapainawabganj', 'Rajshahi', 'Shibganj Post Office', 'Wednesday'),
('69', 'Puthia', 'Rajshahi', 'Rajshahi', 'Puthia Post Office', 'Thursday'),
('70', 'Bagmara', 'Rajshahi', 'Rajshahi', 'Bagmara Post Office', 'Friday'),
('71', 'Joypurhat Sadar', 'Joypurhat', 'Rajshahi', 'Joypurhat Sadar Post Office', 'Monday'),
('72', 'Panchbibi', 'Joypurhat', 'Rajshahi', 'Panchbibi Post Office', 'Tuesday'),
('73', 'Kalai', 'Joypurhat', 'Rajshahi', 'Kalai Post Office', 'Wednesday'),
('74', 'Khetlal', 'Joypurhat', 'Rajshahi', 'Khetlal Post Office', 'Thursday'),
('75', 'Akkelpur', 'Joypurhat', 'Rajshahi', 'Akkelpur Post Office', 'Friday'),
('76', 'Naogaon Sadar', 'Naogaon', 'Rajshahi', 'Naogaon Sadar Post Office', 'Monday'),
('77', 'Sapahar', 'Naogaon', 'Rajshahi', 'Sapahar Post Office', 'Tuesday'),
('78', 'Manda', 'Naogaon', 'Rajshahi', 'Manda Post Office', 'Wednesday'),
('79', 'Mohadevpur', 'Naogaon', 'Rajshahi', 'Mohadevpur Post Office', 'Thursday'),
('80', 'Patnitala', 'Naogaon', 'Rajshahi', 'Patnitala Post Office', 'Friday'),
('81', 'Natore Sadar', 'Natore', 'Rajshahi', 'Natore Sadar Post Office', 'Monday'),
('82', 'Singra', 'Natore', 'Rajshahi', 'Singra Post Office', 'Tuesday'),
('83', 'Baraigram', 'Natore', 'Rajshahi', 'Baraigram Post Office', 'Wednesday'),
('84', 'Sylhet Sadar', 'Sylhet', 'Sylhet', 'Sylhet Sadar Post Office', 'Monday'),
('85', 'Amberkhana', 'Sylhet', 'Sylhet', 'Amberkhana Post Office', 'Tuesday'),
('86', 'Shibgonj', 'Sylhet', 'Sylhet', 'Shibgonj Post Office', 'Wednesday'),
('87', 'Zindabazar', 'Sylhet', 'Sylhet', 'Zindabazar Post Office', 'Thursday'),
('88', 'South Surma', 'Sylhet', 'Sylhet', 'South Surma Post Office', 'Friday'),
('89', 'Habiganj Sadar', 'Habiganj', 'Sylhet', 'Habiganj Sadar Post Office', 'Monday'),
('90', 'Baniachang', 'Habiganj', 'Sylhet', 'Baniachang Post Office', 'Tuesday'),
('91', 'Lakhai', 'Habiganj', 'Sylhet', 'Lakhai Post Office', 'Wednesday'),
('92', 'Madhabpur', 'Habiganj', 'Sylhet', 'Madhabpur Post Office', 'Thursday'),
('93', 'Nabiganj', 'Habiganj', 'Sylhet', 'Nabiganj Post Office', 'Friday'),
('94', 'Moulvibazar Sadar', 'Moulvibazar', 'Sylhet', 'Moulvibazar Sadar Post Office', 'Monday'),
('95', 'Kulaura', 'Moulvibazar', 'Sylhet', 'Kulaura Post Office', 'Tuesday'),
('96', 'Barlekha', 'Moulvibazar', 'Sylhet', 'Barlekha Post Office', 'Wednesday'),
('97', 'Sreemangal', 'Moulvibazar', 'Sylhet', 'Sreemangal Post Office', 'Thursday'),
('98', 'Juri', 'Moulvibazar', 'Sylhet', 'Juri Post Office', 'Friday'),
('99', 'Sunamganj Sadar', 'Sunamganj', 'Sylhet', 'Sunamganj Sadar Post Office', 'Monday'),
('100', 'Chhatak', 'Sunamganj', 'Sylhet', 'Chhatak Post Office', 'Tuesday'),
('101', 'South Sunamganj', 'Sunamganj', 'Sylhet', 'South Sunamganj Post Office', 'Wednesday'),
('102', 'Dhirai Chandpur', 'Sunamganj', 'Sylhet', 'Dhirai Chandpur Post Office', 'Thursday'),
('103', 'Tahirpur', 'Sunamganj', 'Sylhet', 'Tahirpur Post Office', 'Friday'),
('104', 'Chittagong GPO', 'Chittagong', 'Chittagong', 'Chittagong GPO', 'Monday'),
('105', 'Al- Amin Baria Madrasa', 'Chittagong', 'Chittagong', 'Al- Amin Baria Madrasa Post Office', 'Tuesday'),
('106', 'Sholashahar', 'Chittagong', 'Chittagong', 'Sholashahar Post Office', 'Wednesday'),
('107', 'Anderkilla', 'Chittagong', 'Chittagong', 'Anderkilla Post Office', 'Thursday'),
('108', 'Jubilee Road', 'Chittagong', 'Chittagong', 'Jubilee Road Post Office', 'Friday'),
('109', 'Cox\'s Bazar', 'Cox\'s Bazar', 'Chittagong', 'Cox\'s Bazar Post Office', 'Monday'),
('110', 'Teknaf', 'Cox\'s Bazar', 'Chittagong', 'Teknaf Post Office', 'Tuesday'),
('111', 'Ramu', 'Cox\'s Bazar', 'Chittagong', 'Ramu Post Office', 'Wednesday'),
('112', 'Ukhiya', 'Cox\'s Bazar', 'Chittagong', 'Ukhiya Post Office', 'Thursday'),
('113', 'Chandnaish', 'Chittagong', 'Chittagong', 'Chandnaish Post Office', 'Friday'),
('114', 'Fatickchari', 'Chittagong', 'Chittagong', 'Fatickchari Post Office', 'Monday'),
('115', 'Sitakund', 'Chittagong', 'Chittagong', 'Sitakund Post Office', 'Tuesday'),
('116', 'Boalkhali', 'Chittagong', 'Chittagong', 'Boalkhali Post Office', 'Wednesday'),
('117', 'Mirsharai', 'Chittagong', 'Chittagong', 'Mirsharai Post Office', 'Thursday'),
('118', 'Hathazari', 'Chittagong', 'Chittagong', 'Hathazari Post Office', 'Friday'),
('119', 'Chhagalnaiya', 'Feni', 'Chittagong', 'Chhagalnaiya Post Office', 'Monday'),
('120', 'Feni Sadar', 'Feni', 'Chittagong', 'Feni Sadar Post Office', 'Tuesday'),
('121', 'Dagonbhuiyan', 'Feni', 'Chittagong', 'Dagonbhuiyan Post Office', 'Wednesday'),
('122', 'Sonagazi', 'Feni', 'Chittagong', 'Sonagazi Post Office', 'Thursday'),
('123', 'Parshuram', 'Feni', 'Chittagong', 'Parshuram Post Office', 'Friday'),
('124', 'Brahmanbaria Sadar', 'Brahmanbaria', 'Chittagong', 'Brahmanbaria Sadar Post Office', 'Monday'),
('125', 'Kasba', 'Brahmanbaria', 'Chittagong', 'Kasba Post Office', 'Tuesday'),
('126', 'Chittagong Airport', 'Chittagong', 'Chittagong', 'Chittagong Airport Post Office', 'Wednesday'),
('127', 'Chittagong Cantonment', 'Chittagong', 'Chittagong', 'Chittagong Cantonment Post Office', 'Monday'),
('128', 'Khulshi', 'Chittagong', 'Chittagong', 'Khulshi Post Office', 'Tuesday'),
('129', 'Pahartali', 'Chittagong', 'Chittagong', 'Pahartali Post Office', 'Wednesday'),
('130', 'Patenga', 'Chittagong', 'Chittagong', 'Patenga Post Office', 'Thursday'),
('131', 'Shah Amanat International Airport', 'Chittagong', 'Chittagong', 'Shah Amanat International Airport Post Office', 'Friday'),
('132', 'Chittagong University', 'Chittagong', 'Chittagong', 'Chittagong University Post Office', 'Monday'),
('133', 'Feni Road', 'Noakhali', 'Chittagong', 'Feni Road Post Office', 'Tuesday'),
('134', 'Bhulta', 'Narayanganj', 'Chittagong', 'Bhulta Post Office', 'Wednesday'),
('135', 'Sitakunda Marine Drive', 'Chittagong', 'Chittagong', 'Sitakunda Marine Drive Post Office', 'Thursday'),
('151', 'Rangpur GPO', 'Rangpur', 'Rangpur', 'Rangpur GPO', 'Monday'),
('152', 'Pirgachha', 'Rangpur', 'Rangpur', 'Pirgachha Post Office', 'Tuesday'),
('153', 'Mithapukur', 'Rangpur', 'Rangpur', 'Mithapukur Post Office', 'Wednesday'),
('154', 'Kawnia', 'Rangpur', 'Rangpur', 'Kawnia Post Office', 'Thursday'),
('155', 'Gangachara', 'Rangpur', 'Rangpur', 'Gangachara Post Office', 'Friday'),
('156', 'Thakurgaon', 'Thakurgaon', 'Rangpur', 'Thakurgaon Post Office', 'Monday'),
('157', 'Pirganj', 'Rangpur', 'Rangpur', 'Pirganj Post Office', 'Tuesday'),
('158', 'Badarganj', 'Rangpur', 'Rangpur', 'Badarganj Post Office', 'Wednesday'),
('159', 'Kaunia', 'Rangpur', 'Rangpur', 'Kaunia Post Office', 'Thursday'),
('160', 'Rangpur Cantonment', 'Rangpur', 'Rangpur', 'Rangpur Cantonment Post Office', 'Friday'),
('161', 'Khulna GPO', 'Khulna', 'Khulna', 'Khulna GPO', 'Monday'),
('162', 'Chalna Bazar', 'Khulna', 'Khulna', 'Chalna Bazar Post Office', 'Tuesday'),
('163', 'Jahanabad Cantonment', 'Khulna', 'Khulna', 'Jahanabad Cantonment Post Office', 'Wednesday'),
('164', 'Paikgachha', 'Khulna', 'Khulna', 'Paikgachha Post Office', 'Thursday'),
('165', 'Terokhada', 'Khulna', 'Khulna', 'Terokhada Post Office', 'Friday'),
('166', 'Jessore Sadar', 'Jessore', 'Khulna', 'Jessore Sadar Post Office', 'Monday'),
('167', 'Manirampur', 'Jessore', 'Khulna', 'Manirampur Post Office', 'Tuesday'),
('168', 'Jhikargachha', 'Jessore', 'Khulna', 'Jhikargachha Post Office', 'Wednesday'),
('169', 'Sharsha', 'Jessore', 'Khulna', 'Sharsha Post Office', 'Thursday'),
('170', 'Abhaynagar', 'Jessore', 'Khulna', 'Abhaynagar Post Office', 'Friday');

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
('dummmy@gmail.com', '$2y$10$a2m2aIll0aHe6x3djD.4ROrNsJwQU02wAUlwc.eF8VhhtE7FygSRO', 'Reader'),
('nazia@gmail.com', '$2y$10$WomKs7..bD3ZEm4vuoqwS.rclb6pMjkjrmSFYuBYEynLxWf/w/6sy', 'DeliveryMan'),
('oishee@gmail.com', '$2y$10$jUbg.BuDsAihQNo9knf29O6WWD3A7uWswpmp.9oCq6U.w/JJ4/.N.', 'Reader');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `all_copies_of_books`
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
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `location_id` (`location_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_copies_of_books`
--
ALTER TABLE `all_copies_of_books`
  MODIFY `copy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_fk` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

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
ALTER TABLE `customer_book`
  ADD CONSTRAINT `fk_customer_book1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `fk_customer_book2` FOREIGN KEY (`copy_id`) REFERENCES `all_copies_of_books` (`copy_id`),
  ADD CONSTRAINT `fk_customer_book3` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD CONSTRAINT `deliveryMan_fk` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deliveryman_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
