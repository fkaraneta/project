-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 08:35 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fmjm`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_user`
--

CREATE TABLE `account_user` (
  `Custmerid` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_user`
--

INSERT INTO `account_user` (`Custmerid`, `type`, `Name`, `Lastname`, `contact`, `username`, `email`, `pwd`) VALUES
(1, '1', 'franz', 'araneta', '09384483448', 'faraneta', 'faraneta@gmail.com', 'admin'),
(2, '', 'Karendddd s    ', 'tapo', '094**********', 'ktapot', 'k****@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `image` text NOT NULL,
  `productname` varchar(50) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `prod_description` varchar(50) NOT NULL,
  `prod_price` double(12,2) NOT NULL,
  `prod_qty` double(12,2) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `image`, `productname`, `dname`, `code`, `prod_description`, `prod_price`, `prod_qty`, `category`) VALUES
(130, 'AsusGmaing.png', '  Asus', ' ASUS G56 1TB SSD 32GB RAM', ' DD22A', 'G56 1TB SSD 32GB RAM', 55000.00, 2.00, 'Gaming Laptop'),
(131, 'AsusROGG501.png', 'Asus ', 'Asus ROG501 1tb SSD 64GB RAM Nvidia 3550Ti 6GB', ' dDaasS4', '1tb SSD 64GB RAM Nvidia 3550Ti 6GB', 80000.00, 2.00, 'Gaming Laptop'),
(132, 'ASUSROGG551VW.png', 'Asus', 'Asus ROG G551 Nvidia 4550 Ti 6GB', 'DDDA33', ' G551 Nvidia 4550 Ti 6GB 128GB RAM', 100000.00, 2.00, 'Laptop & Desktop'),
(133, 'AsusTuf.png', 'Asus', 'Asus Tuf 1TB SSD Nvidia 4550 Ti 6G', ' DDDSS2', '1TB SSD Nvidia 4550 Ti 6G', 85000.00, 2.00, 'Laptop & Desktop'),
(134, 'AsusZephyrus.png', 'Asus ', 'Asus Zephyrus 2TB SSD 64GB RAM', 'FDDD4', '2TB SSD 64GB RAM Nvidia 5500Ti 6GB', 120000.00, 2.00, 'Laptop & Desktop'),
(135, 'MSIAlpha.png', 'MSI', 'MSI Alpha Omega 1TB HDD 256SSD 64GB RAM', 'DDD5', '1TB HDD 256SSD 64GB RAM', 45000.00, 2.00, 'Laptop & Desktop'),
(136, 'MSIFreak.png', 'MSI', 'MSI Freak Out 1TB SSD 64GB RAM Nvidia 1050Ti 6G', 'DDD3', '1TB SSD 64GB RAM Nvidia 1050Ti 6G', 85000.00, 0.00, 'Laptop & Desktop'),
(137, 'MSIGE63.png', 'MSI ', 'MSI GE63 1TB SSD Nvidia 4550Ti 8GB', 'GGAAA4', '1TB SSD Nvidia 4550Ti 8GB 8GB RAM', 74590.00, 2.00, 'Laptop & Desktop'),
(138, 'MSIGT.png', 'MSI', 'MSI GT630 AMD 256SSD 8GB RAM', ' DSADAS4', 'AMD 256SSD 8GB RAM', 65890.00, 2.00, 'Laptop & Desktop'),
(139, 'MSIHeroes.png', 'MSI', 'MSI Heroes pro 1TB SSD 64GB RAM', 'DDAA4', '1TB SSD 64GB RAM Nvidia 2550 Ti 4GB', 78999.00, 2.00, 'Laptop & Desktop'),
(150, 'lenovo-desktop-legion-y720-amd-tower-feature-2.webp', 'AMD', 'Lenovo Desktop legion y720 AMD ', ' DD22AA', 'Lenovo Desktop legion y720 AMD ', 55000.00, 2.00, 'Laptop & Desktop'),
(151, 'Alienware_Area_51_desktop_gaming_PC.png', 'AMD', 'Alienware Area 51 Desktop Gaming AMD', 'AAADD2 ', 'Alienware Area 51 Desktop Gaming AMD', 60000.00, 2.00, 'Laptop & Desktop'),
(152, 'asus-ga35-desktop-pc-render.png', 'Intel', 'Asus GA35 desktop pc Render', 'ASDSADAS', 'Asus GA35 desktop pc Render', 60000.00, 2.00, 'Laptop & Desktop'),
(153, 'Gaming-PCs-under-400.png', 'Intel', 'Asus ROG GAMING PC', 'ASDDDS2', 'Asus ROG GAMING PC', 80000.00, 1.00, 'Laptop & Desktop'),
(154, 'dcb79991bb7f722859680653ba1ed3e2.png', 'Storage', 'Seagate HDDD 1TB', 'DSDSD3', 'Seagate HDDD 1TB', 1000.00, 2.00, 'Components'),
(155, 'unnamed.png', 'Storage', 'Seagate Barracuda HDD 1TB', 'DSDSDSAA2', 'Seagate Barracuda HDD 1TB', 2500.00, 2.00, 'Components'),
(156, '1804121718210.png', 'RAM', 'G.SKILL Tridents RGB 8GB', 'ASDAA2', 'G.SKILL Tridents RGB 8GB', 1000.00, 2.00, 'Components'),
(158, '-CMW16GX4M2C3200C16-Gallery-Vengeance-RGB-Pro-01.png', 'RAM', 'Veangean Pro 64GB', 'SDDDA2', 'Veangean Pro 64GB', 4000.00, 2.00, 'Components'),
(159, 'fdac9e8d6201c520a159622e5341dc1c.png', 'RAM', 'Veangeance LP 64GB', 'DSDS2', 'Veangeance LP 64GB', 1500.00, 2.00, 'Components'),
(160, 'C101-BR-7_1024x1024@2x.png', 'Gaming Chairs', 'Redragon Gaming Chair Red', 'DSDSDSAA4', 'Redragon Gaming Chair Red', 5000.00, 1.00, 'Peripherals'),
(161, 'CA-9011152-NA-Void_Pro_Wireless_Carbon_01.png', 'Gaming Headset', 'Corsair Gaming Headset Wireless 5.0 Ghz', 'AAAAC2', 'Corsair Gaming Headset Wireless 5.0 Ghz', 1500.00, 1.00, 'Peripherals'),
(162, 'g332-hero.png', 'Gaming Headset', 'Corsair Headset Red/Black', 'HH3FF', 'Corsair Headset Red/Black', 2500.00, 2.00, 'Peripherals'),
(163, 'K552-3_450x450.png', 'Gaming Keyboard', 'Redragon Gaming Keyboard', 'VVD2', 'Redragon Gaming Keyboard', 1500.00, 1.00, 'Peripherals'),
(164, 'K568-3_1024x1024@2x.png', 'Gaming Keyboard', 'Corsair Gaming keyboard', 'SADSAD2', 'Corsair Gaming keyboard', 5000.00, 2.00, 'Peripherals'),
(165, 'o_500.png', 'Gaming Keyboard', 'ASUS Gaming Keyboard', 'ASDSDSA', 'ASUS Gaming Keyboard', 3500.00, 2.00, 'Peripherals'),
(166, 'unnamed.webp', 'Gaming Chairs', 'Asus Gaming Chairs', 'GGGG2', 'Asus Gaming Chairs', 4500.00, 4.00, 'Peripherals');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionID` int(11) NOT NULL,
  `Customername` varchar(255) NOT NULL,
  `img_product` text NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `QTY` double(12,2) NOT NULL,
  `Price` double(12,2) NOT NULL,
  `Delivery_Address` varchar(255) NOT NULL,
  `Date_Purchased` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionID`, `Customername`, `img_product`, `ProductName`, `Code`, `QTY`, `Price`, `Delivery_Address`, `Date_Purchased`) VALUES
(25, 'ktapot', 'AsusTuf.png', 'Asus Tuf 1TB SSD Nvidia 4550 Ti 6G', ' DDDSS2', 4.00, 370000.00, '', '2020-03-16'),
(26, 'ktapot', 'AsusGmaing.png', ' ASUS G56 1TB SSD 32GB RAM', ' DD22A', 6.00, 330000.00, '', '2020-03-16'),
(27, 'ktapot', 'AsusGmaing.png', ' ASUS G56 1TB SSD 32GB RAM', ' DD22A', 6.00, 330000.00, '', '2020-03-16'),
(28, 'ktapot', 'AsusGmaing.png', ' ASUS G56 1TB SSD 32GB RAM', ' DD22A', 6.00, 330000.00, '', '2020-03-16'),
(29, 'ktapot', 'AsusGmaing.png', ' ASUS G56 1TB SSD 32GB RAM', ' DD22A', 6.00, 330000.00, '', '2020-03-16'),
(30, 'ktapot', 'AsusGmaing.png', ' ASUS G56 1TB SSD 32GB RAM', ' DD22A', 6.00, 330000.00, '', '2020-03-16'),
(31, 'ktapot', 'AsusGmaing.png', ' ASUS G56 1TB SSD 32GB RAM', ' DD22A', 6.00, 330000.00, '', '2020-03-16'),
(32, 'ktapot', 'MSIAlpha.png', 'MSI Alpha Omega 1TB HDD 256SSD 64GB RAM', 'DDD5', 4.00, 250000.00, '', '2020-03-17'),
(33, 'ktapot', 'MSIAlpha.png', 'MSI Alpha Omega 1TB HDD 256SSD 64GB RAM', 'DDD5', 4.00, 250000.00, 'asdasdsa', '2020-03-17'),
(34, 'ktapot', 'AsusROGG501.png', 'Asus ROG501 1tb SSD 64GB RAM Nvidia 3550Ti 6GB', ' dDaasS4', 2.00, 160000.00, 'sadsad', '2020-03-17'),
(35, 'ktapot', 'AsusROGG501.png', 'Asus ROG501 1tb SSD 64GB RAM Nvidia 3550Ti 6GB', ' dDaasS4', 2.00, 160000.00, 'sadsad', '2020-03-17'),
(36, 'ktapot', 'AsusROGG501.png', 'Asus ROG501 1tb SSD 64GB RAM Nvidia 3550Ti 6GB', ' dDaasS4', 2.00, 160000.00, 'sdfdsf', '2020-03-17'),
(37, 'ktapot', 'AsusROGG501.png', 'Asus ROG501 1tb SSD 64GB RAM Nvidia 3550Ti 6GB', ' dDaasS4', 2.00, 160000.00, 'sdsad', '2020-03-17'),
(38, 'ktapot', 'AsusROGG501.png', 'Asus ROG501 1tb SSD 64GB RAM Nvidia 3550Ti 6GB', ' dDaasS4', 2.00, 160000.00, 'sdsad', '2020-03-17'),
(39, 'ktapot', 'AsusROGG501.png', 'Asus ROG501 1tb SSD 64GB RAM Nvidia 3550Ti 6GB', ' dDaasS4', 2.00, 160000.00, 'asdsad', '2020-03-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_user`
--
ALTER TABLE `account_user`
  ADD PRIMARY KEY (`Custmerid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_user`
--
ALTER TABLE `account_user`
  MODIFY `Custmerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
