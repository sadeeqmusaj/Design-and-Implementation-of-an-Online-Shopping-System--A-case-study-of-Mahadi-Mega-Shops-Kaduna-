-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 01:32 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` int(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `password`, `type`) VALUES
(1, 'mahadi mukhtar', 'mukhtarmahadisahabi@gmail.com', 9, 'u');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `trackno` int(11) NOT NULL,
  `cardname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fulladdress` varchar(50) NOT NULL,
  `cardno` int(50) NOT NULL,
  `phoneno` int(50) NOT NULL,
  `password` int(50) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `productnumbe` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `trackno`, `cardname`, `name`, `fulladdress`, `cardno`, `phoneno`, `password`, `productname`, `productnumbe`) VALUES
(1, 0, 'visa', 'mahadi', 'no c20 xango road', 1234567890, 2147483647, 1996, 'shirt', 3);

-- --------------------------------------------------------

--
-- Table structure for table `clouths`
--

CREATE TABLE IF NOT EXISTS `clouths` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `productname` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `clouths`
--

INSERT INTO `clouths` (`id`, `productname`, `price`, `quantity`, `img`) VALUES
(3, 'PUMA SHART', '45,00', 90, 'SHIRT2.JPG'),
(5, 'GUCCI SHART', '70,000', 40, 'gcs1.jpg'),
(6, 'PUMA SHART', '7,000', 20, 'SHART4.JPG'),
(7, 'LV SHOE', '20,000', 32, 'LVS.JPG'),
(8, 'GUCCI BAG', '17,000', 30, 'GCB1.JPG'),
(9, 'JORDANS', '20,000', 10, 'GJ1.JPG'),
(10, 'samsung-galaxy-s8', '70,000', 30, 'samsung-galaxy-s8-.jpg'),
(11, 'Gucci ', '20,000', 30, 'gc1.jpg'),
(12, 'LV', '20,000', 30, 'LVBL2.jpg'),
(13, 'LV', '5,000', 30, 'LVW.JPG'),
(14, 'LG', '55,000', 30, 'lg-v30.png'),
(15, 'LG', '45,000', 30, 'lg-6kg.jpg'),
(16, 'LG', '45,000', 30, 'images34.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `firstname`, `lastname`, `email`, `comment`) VALUES
(1, 'mahadi', 'mukhtar', 'mukhtarmahadisahabi@gmail.com', 'i  luv my site'),
(2, 'mahadi', 'mukhtar', 'mukhtarmahadisahabi@gmail.com', 'i like it');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(50) NOT NULL,
  `tel` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` int(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_f`
--

CREATE TABLE IF NOT EXISTS `e_f` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `productname_s` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `e_f`
--

INSERT INTO `e_f` (`id`, `productname_s`, `price`, `quantity`, `img`) VALUES
(1, 'samsung-galaxy-s8', '70,000', 20, 'samsung-galaxy-s8-.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `type`) VALUES
(1, 'marshal hoxx', 'hozzler1@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'u'),
(2, 'habu', 'habu1@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'u');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
