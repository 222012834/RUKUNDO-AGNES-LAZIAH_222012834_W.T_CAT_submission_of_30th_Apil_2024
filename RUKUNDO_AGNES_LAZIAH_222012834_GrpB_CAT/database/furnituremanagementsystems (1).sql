-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2024 at 01:15 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `furnituremanagementsystems`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE IF NOT EXISTS `customer_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `quantity` int(20) NOT NULL,
  `amounts` int(20) NOT NULL,
  `Dateorder` varchar(200) NOT NULL,
  `phone` varchar(222) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=235 ;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_name`, `product_name`, `quantity`, `amounts`, `Dateorder`, `phone`) VALUES
(1, 'rukundoi', 'computer', 40000, 5000000, '2023/09/5', '0783234567'),
(2, 'dar', 'chair', 234, 2000000, '2024/2/17', '07822345678'),
(5, 'laziah', 'chairs', 246, 200000, '2024/2/14', '0789753421'),
(8, 'nana', 'chairs', 9000, 100000, '2024/2/19', '079435621'),
(32, 'rer', 'chair', 345, 2456700, '2024/2/19', '0789654321'),
(43, 'nana', 'chair', 45, 600000, '2024/02/15', '07834564556'),
(45, 'era', 'bed', 1000, 200000000, '2024/03/8', '0789753426'),
(234, 'shadia ', 'chair', 222, 20000, '2024/2/19', '078245672');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(100) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `salary` int(22) NOT NULL,
  `position` varchar(220) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `phone`, `salary`, `position`) VALUES
(1, 'lazi', '0789753891', 1000000, 'manager'),
(3, 'daer', '0789654321', 22200, 'cleaner'),
(13, 'gagd', '0784356721', 2300000, 'admin'),
(21, 'fatu', '0784356274', 2000000, 'store keeper'),
(23, 'bit', '0784536789', 3000000, 'manager'),
(27, 'fatu', '0784356274', 2000000, 'store keeper'),
(34, 'gad', '0786954543', 20000000, 'cleaner'),
(35, 'das', '0786954536', 200000, 'manager'),
(38, 'das', '786954536', 200000, 'cleaner'),
(46, 'lala', '798456390', 2000000, 'stockkeeper'),
(47, 'faaaas', '798456321', 23456, 'manager'),
(48, 'sd', '0798456321', 100, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `Transaction_name` varchar(100) NOT NULL,
  `Amount` int(12) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `Transaction_name`, `Amount`, `Date`) VALUES
(3, 'cash', 27, '2024-02-14'),
(10, 'momo', 30000, '2024-03-12'),
(21, 'momo', 1000000, '2024-02-10'),
(23, 'momo pay', 30000, '2024-02-19'),
(32, 'momo pay', 2000000000, '2024-02-19'),
(34, 'momo', 34, '2024-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productid` int(10) NOT NULL AUTO_INCREMENT,
  `productname` varchar(255) NOT NULL,
  `quantity` int(12) NOT NULL,
  `Unitprice` int(15) NOT NULL,
  `totalprice` int(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `quantity`, `Unitprice`, `totalprice`, `description`) VALUES
(1, 'bed', 1200, 3000, 64000, 'laziah'),
(4, 'wood', 111111000, 100000, 11100000, 'good'),
(13, 'chairs', 2345, 450000, 50000, 'dan'),
(14, 'plywood', 64, 450000, 567000000, 'weren'),
(15, 'timber', 64, 450000, 50000, 'tim'),
(16, 'areb', 70000, 78, 22222, 'plywood');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(15) NOT NULL,
  `quantity_in` int(12) NOT NULL,
  `quantity_out` int(11) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stock_id`, `product_id`, `quantity_in`, `quantity_out`) VALUES
(2, 3, 3, 3),
(3, 4, 96666, 555555),
(4, 3, 4, 6),
(6, 7, 70000, 900),
(7, 22, 444444, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `sup_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `quantity` int(20) NOT NULL,
  `product_id` int(15) NOT NULL,
  `stock_id` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sup_id`, `name`, `telephone`, `quantity`, `product_id`, `stock_id`) VALUES
(1, 'lucky', '078324563', 324, 12, 4),
(2, 'fat', '0789756891', 34, 2, 2),
(32, 'fsa', '0786543213', 30000, 43, 34),
(65, 'rar', '0789534213', 400, 44, 673);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(225) NOT NULL,
  `Gender` varchar(220) NOT NULL,
  `Date` date NOT NULL,
  `password` varchar(122) NOT NULL,
  `Activation_code` varchar(222) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `phone`, `email`, `Gender`, `Date`, `password`, `Activation_code`) VALUES
(1, 'lazia', '0798456321', '', '', '2024-04-03', '', ''),
(2, 'lazia', '0798456321', '', '', '2024-04-03', '', ''),
(3, 'lazia', '0798456321', 'milembelazia@gmail.com', 'female', '2024-04-09', '', ''),
(4, 'lazia', '0798456321', 'ves123@gmail.com', 'female', '2024-05-02', '', ''),
(5, 'lazia anna', '0798456321', 'ves123@gmail.com', 'female', '2024-04-25', '', ''),
(6, 'rukundo', '0798456321', 'ves123@gmail.com', 'female', '2024-04-25', '', ''),
(7, 'wewe', '0798456321', 'v@gmail.com', '', '0000-00-00', '', ''),
(8, 'betry', '0788654321', 'bb@gmail.com', '', '0000-00-00', '123', ''),
(9, 'wewe', '0798456321', 'isimbi@gmail.com', 'female', '2024-04-29', '456', '77'),
(10, 'wewe', '0798456390', 'ves123@gmail.com', 'male', '2024-05-08', '234', '77');
