-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 04:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuhin`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(12) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT current_timestamp(),
  `details` varchar(255) DEFAULT NULL,
  `user_id` int(12) DEFAULT NULL,
  `category_id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `rating`, `publish_date`, `details`, `user_id`, `category_id`) VALUES
(6, 'Julian Gardner', 'Fatima Atkinson', '4.1', '2005-10-07', 'Containers are the most basic layout element in Bootstrap and are required when using our default grid system.                                ', 9, 3),
(11, 'Mara Leonard', 'Kaden Fitzgerald', '1.3', '2009-02-14', 'Accusamus ipsum ut                 ', 9, 3),
(13, 'Graham Cortez', 'Emerson Klein', '5', '2014-10-25', 'Perspiciatis doloru', 9, 1),
(14, 'Ginger Hendrix', 'Todd Witt', '3', '1979-02-22', 'Eveniet eligendi al', 9, 2),
(15, 'Karen Duffy', 'Blake Morse', '2', '1988-04-24', 'Dolor a laudantium ', 9, 1),
(16, 'Tanisha Clements', 'Vance Brooks', '4', '2013-06-12', 'Enim praesentium iur', 9, 3),
(17, 'Oscar Ward', 'Tobias Pope', '3', '0000-00-00', 'Non impedit eum eos                ', 1, 2),
(18, 'Brent Church', 'Olga Cantrell', '1', '1977-04-27', 'Ut sed Nam laboriosa', 9, 3),
(19, 'Indira Hodges', 'Nomlanga Sosa', '5', '2017-07-07', 'Occaecat natus eaque', 9, 1),
(21, 'Lydia Fitzpatrick', 'Lila Taylor', '5', '2011-07-20', 'Obcaecati est est s', 9, 3),
(22, 'Jin Ellis', 'Slade Branch', '5', '1995-12-03', 'Blanditiis dolor lab', 1, 2),
(23, 'Scott Reese', 'Ryan Maddox', '1.6', '2002-11-25', 'Quisquam enim ut qua', 1, 2),
(24, 'Maxwell Webb', 'Talon Griffin', '3.2', '2009-08-25', 'Adipisicing consecte', 1, 2),
(32, 'OOP', 'Programmer', '3.5', '2009-02-14', 'simple Details', 9, 3),
(33, 'Julian Gardner', 'Fatima Atkinson', '4.1', '2005-10-07', 'Containers are the most basic layout element in Bootstrap and are required when using our default grid system.                                ', 9, 3),
(34, 'Mara Leonard', 'Kaden Fitzgerald', '1.3', '2009-02-14', 'Accusamus ipsum ut                 ', 9, 3),
(35, 'Graham Cortez', 'Emerson Klein', '5', '2014-10-25', 'Perspiciatis doloru', 9, 1),
(36, 'Ginger Hendrix', 'Todd Witt', '3', '1979-02-22', 'Eveniet eligendi al', 9, 2),
(37, 'Karen Duffy', 'Blake Morse', '2', '1988-04-24', 'Dolor a laudantium ', 9, 1),
(38, 'Tanisha Clements', 'Vance Brooks', '4', '2013-06-12', 'Enim praesentium iur', 9, 3),
(39, 'Oscar Ward', 'Tobias Pope', '3', '0000-00-00', 'Non impedit eum eos                ', 1, 2),
(40, 'Brent Church', 'Olga Cantrell', '1', '1977-04-27', 'Ut sed Nam laboriosa', 9, 3),
(41, 'Indira Hodges', 'Nomlanga Sosa', '5', '2017-07-07', 'Occaecat natus eaque', 9, 1),
(42, 'Lydia Fitzpatrick', 'Lila Taylor', '5', '2011-07-20', 'Obcaecati est est s', 9, 3),
(43, 'Jin Ellis', 'Slade Branch', '5', '1995-12-03', 'Blanditiis dolor lab', 1, 2),
(44, 'Scott Reese', 'Ryan Maddox', '1.6', '2002-11-25', 'Quisquam enim ut qua', 1, 2),
(45, 'Maxwell Webb', 'Talon Griffin', '3.2', '2009-08-25', 'Adipisicing consecte', 1, 2),
(46, 'OOP', 'Programmer', '3.5', '2009-02-14', 'simple Details', 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `id` int(12) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1 means active 2 means inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`id`, `name`, `status`) VALUES
(1, 'Action and Adventure', 1),
(2, 'Classics', 1),
(3, 'Detective and Mystery', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`) VALUES
(1, 'jahid_dik', 'Murphy Berger', 'jahidik@mailinator.com', '$2y$10$zAxM57XGo60UVwKcMJ3w6ulXjU8puCcRfT0r8LTyyoVY5QpaJJa/C'),
(2, 'xekih', 'Olga Hoffman', 'tugutam@mailinator.com', '$2y$10$n7NRKfbIWdmzbGEGKiDH7.Y025Vg5c4dKyogKsyA/mLp6cPdu4VCC'),
(3, 'keneret', 'Michelle Merrill', 'fomojeqol@mailinator.com', '$2y$10$0mgpuai18SFIP2BgxTm/IO/IJXDxL1CbFAA/n4yu06T62.MtefVM6'),
(4, 'faxah', 'Lars Sykes', 'qasife@mailinator.com', '$2y$10$qdo6G9TPhcOGzoMSjSpkQerJHU9XT//.THtxO4k/ExeNrhtDBAzYO'),
(5, 'kunomihasi', 'Minerva Mckinney', 'lizojyk@mailinator.com', '$2y$10$JOv7PfIhS.CteWBzsvI4DO9GkPsqkkc2ttu5g/mpgJiHO2XT8UsK6'),
(6, 'quzyj', 'Britanney Bennett', 'kenimivupo@mailinator.com', '$2y$10$x5W30l4A11dy.9rwdBNqKubgWoK.p243fZoqqmWB8bLJKjnio6ZCS'),
(7, 'abir', 'abir', 'abir@mail.com', '$2y$10$VPHJRqqzp9iIqIuJsJZM6eU5IhtnzJcY2Zww3UfUfDKWQG/JRJ5yy'),
(8, 'hozanujow', 'Myles Sheppard', 'novo@mailinator.com', '$2y$10$JxLY9ui9FD00S59VBQQj7eOy0VEWQ05ljn8FjUrYwDCPKfH1zlASS'),
(9, 'Plato', 'Plato Carter', 'poweletupe@mailinator.com', '$2y$10$ndRL.WV5LpSqtkqUB1HAP.npkaqL7aXbngEyCoFtW0/mWZHrJUgtm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
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
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
