-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 02:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_students`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_record`
--

CREATE TABLE `students_record` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_surname` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `student_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_record`
--

INSERT INTO `students_record` (`id`, `name_surname`, `company_name`, `email`, `phone`, `student_type`) VALUES
(1, 'Ivana Karanfilova', 'Ivana & Co', 'ivana@mail.com', '+8615975614134', 'Студенти од програмирање'),
(2, 'Jane Austin', 'Global Revolution', 'jane_austin@gmail.com', '85928549627', 'Студенти од маркетинг'),
(3, 'John Doe', 'Doe TLD', 'johndoe@yahoo.com', '1234987', 'Студенти од data science'),
(4, 'James Dean', 'Dean Entertainment', 'dean@dean.com', '66453427', 'Студенти од data science'),
(5, 'Jack Smith', 'Vertigo', 'jacksmith@vertigo.com', '85928549627', 'Студенти од дизајн'),
(6, 'Валерија Петрушевска', 'Brainster', 'valerija_petr@brainster.com', '+2341873-736', 'Студенти од програмирање'),
(7, 'Тања Ковачева', 'Т&D', 'tanja@yahoo.com', '', 'Студенти од дизајн'),
(8, 'Кирил Огненовски', 'СМ Дооел', 'kiril@hotmail.com', '6878', 'Студенти од маркетинг'),
(9, 'Elena Nestorova', 'Elle LTD', 'elena@elle.com', '075214376', 'Студенти од маркетинг'),
(10, 'Илија Стојковски', 'Грид ДОО', 'ilija@grid.mk', '', 'Студенти од програмирање'),
(11, 'Oliver Stanojkovski', 'Oli & Co', 'oliver_co@gmail.com', '', 'Студенти од дизајн');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students_record`
--
ALTER TABLE `students_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students_record`
--
ALTER TABLE `students_record`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
