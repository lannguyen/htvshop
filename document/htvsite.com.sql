-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2012 at 06:56 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `htvsite.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_product`
--

CREATE TABLE IF NOT EXISTS `tbl_group_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` tinytext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_group_product`
--

INSERT INTO `tbl_group_product` (`id`, `name`, `description`) VALUES
(1, 'MÃ¡y tÃ­nh xÃ¡ch tay', 'ÄÃ¢y lÃ  nhÃ³m sáº£n pháº©m MÃ¡y tÃ­nh xÃ¡ch tay'),
(2, 'Äiá»‡n thoáº¡i di Ä‘á»™ng', 'ÄÃ¢y lÃ  nhÃ³m sáº£n pháº©m Äiá»‡n thoáº¡i di Ä‘á»™ng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_user`
--

CREATE TABLE IF NOT EXISTS `tbl_group_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `sumary` tinytext,
  `detail` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_group_user`
--

INSERT INTO `tbl_group_user` (`id`, `name`, `sumary`, `detail`) VALUES
(1, 'Super Administrator', '?ây là nhóm có qu?n qu?n tr? t?i cao - Ng?n g?n', '?ây là nhóm có qu?n qu?n tr? t?i cao - Chi ti?t'),
(2, 'Administrator', '?ây là nhóm có qu?n qu?n tr? c?p cao - Ng?n g?n', '?ây là nhóm có qu?n qu?n tr? c?p cao - Chi tiêt'),
(3, 'Member', '?ây là nhóm thành viên - ng?n g?n', '?ây là nhóm thành viên - chi ti?t');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(150) NOT NULL,
  `tel` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `add` varchar(250) NOT NULL,
  `cart` tinytext NOT NULL,
  `pay_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `fullname`, `tel`, `email`, `add`, `cart`, `pay_date`) VALUES
(1, 'Pháº¡m HÃ¹ng Tháº¯ng', '0982858506', 'hungthangitv@gmail.com', '18 LÃ½ ThÆ°á»ng Kiá»‡t, HÃ  Ná»™i', '0,1,2,5,6', '2010-10-10 10:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `price` double DEFAULT NULL,
  `id_group` int(11) NOT NULL,
  `photo` text,
  `sumary` tinytext,
  `detail` longtext,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `name_2` (`name`),
  UNIQUE KEY `name_3` (`name`),
  UNIQUE KEY `name_4` (`name`),
  UNIQUE KEY `name_5` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `price`, `id_group`, `photo`, `sumary`, `detail`, `post_date`) VALUES
(1, 'Lenovo Y450 123', 14000000, 1, 'http://htvsite.com/uploads/demo/sanpham/lenovoy450.jpg', 'MÃ¡y tÃ­nh xÃ¡ch tay Lenovo Y450 - Ná»™i dung mÃ´ táº£', '<p>\r\n	M&aacute;y t&iacute;nh x&aacute;ch tay Lenovo Y450 - Chi tiáº¿t</p>\r\n', '2011-08-02 20:45:21'),
(2, 'IPHONE 3Gs 16GB', 10000000, 1, 'http://htvsite.com/uploads/demo/sanpham/iphone3gs.jpg', 'MÃ´ táº£ mÃ¡y Iphone 3GS 16GB', 'Chi tiáº¿t vá» mÃ¡y Iphone 3GS 16GB', '2011-08-02 20:50:07'),
(5, 'Sony Vaio VPC-EG1AFX', 16000000, 1, 'http://htvsite.com/uploads/demo/sanpham/SonyVaioVPC-EG1AFX.jpg', 'MÃ´ táº£ mÃ¡y Sony Vaio VPC-EG1AFX', 'Chi tiáº¿t mÃ¡y Sony Vaio VPC-EG1AFX', '2011-11-05 14:28:33'),
(6, 'HP Probook 4530s', 15000000, 1, 'http://htvsite.com/uploads/demo/sanpham/hpprobook4530s.jpg', 'MÃ´ táº£ HP Probook 4530s', 'Chi tiáº¿t HP Probook 4530s', '2011-11-05 14:29:36'),
(7, 'HTC HD7', 14000000, 2, 'http://htvsite.com/uploads/demo/sanpham/htchd7.jpg', 'MÃ´ táº£ vá» mÃ¡y HTC HD7', 'Chi tiáº¿t vá» mÃ¡y HTC HD7', '2011-11-05 14:32:00'),
(8, 'Macbook Air 2011', 24000000, 1, 'http://htvsite.com/uploads/demo/sanpham/macbookair2011.jpg', 'MÃ´ táº£ mÃ¡y Macbook Air 2011', 'Chi tiáº¿t mÃ¡y Macbook Air 2011', '2011-11-05 14:32:56'),
(10, 'Samsung NP-R439-DA02VN', 9200000, 1, 'http://p.vatgia.vn/ir/pictures_fullsize/0/cmdrMTI3OTUyNzE4MC5qcGc-/samsung-np-r439-da02vn-intel-core-i3-350m-2-26ghz-2gb-ram-320gb-hdd-vga-intel-hd-graphics-14-inch-pc-dos.jpg', 'HÃ£ng sáº£n xuáº¥t: Samsung\r\nÄá»™ lá»›n mÃ n hÃ¬nh: 14 inch\r\nDung lÆ°á»£ng HDD: 320GB\r\nLoáº¡i CPU: Intel Core i3-350M\r\nTá»‘c Ä‘á»™ mÃ¡y: 2.26GHz (3MB L3 cache)', '<p>\r\n	&nbsp;</p>\r\n<ul class="product_teaser" style="font-family: Arial, Tahoma; margin: 0px; list-style: none; padding-right: 0px; padding-left: 0px; line-height: 18px; text-align: justify; ">\r\n	<li class="normal" style="line-height: normal; background-image: url(http://static.vatgia.com/css/multi_css_v2/standard/icon_bullet_2.gif); margin: 3px 0px; padding-left: 10px; text-align: justify; background-position: 0px 5px; background-repeat: no-repeat no-repeat; ">\r\n		<span style="color: rgb(102, 102, 102); ">H&atilde;ng sáº£n xuáº¥t:</span>&nbsp;<b style="font-weight: normal; ">Samsung</b></li>\r\n	<li class="normal" style="line-height: normal; background-image: url(http://static.vatgia.com/css/multi_css_v2/standard/icon_bullet_2.gif); margin: 3px 0px; padding-left: 10px; text-align: justify; background-position: 0px 5px; background-repeat: no-repeat no-repeat; ">\r\n		<span style="color: rgb(102, 102, 102); ">Äá»™ lá»›n m&agrave;n h&igrave;nh:</span>&nbsp;<b style="font-weight: normal; ">14 inch</b></li>\r\n	<li class="normal" style="line-height: normal; background-image: url(http://static.vatgia.com/css/multi_css_v2/standard/icon_bullet_2.gif); margin: 3px 0px; padding-left: 10px; text-align: justify; background-position: 0px 5px; background-repeat: no-repeat no-repeat; ">\r\n		<span style="color: rgb(102, 102, 102); ">Dung lÆ°á»£ng HDD:</span>&nbsp;<b style="font-weight: normal; ">320GB</b></li>\r\n	<li class="normal" style="line-height: normal; background-image: url(http://static.vatgia.com/css/multi_css_v2/standard/icon_bullet_2.gif); margin: 3px 0px; padding-left: 10px; text-align: justify; background-position: 0px 5px; background-repeat: no-repeat no-repeat; ">\r\n		<span style="color: rgb(102, 102, 102); ">Loáº¡i CPU:</span>&nbsp;<b style="font-weight: normal; ">Intel Core i3-350M</b></li>\r\n	<li class="normal end" style="line-height: normal; background-image: url(http://static.vatgia.com/css/multi_css_v2/standard/icon_bullet_2.gif); margin: 3px 0px 0px; padding-left: 10px; text-align: justify; background-position: 0px 5px; background-repeat: no-repeat no-repeat; ">\r\n		<span style="color: rgb(102, 102, 102); ">Tá»‘c Ä‘á»™ m&aacute;y:</span>&nbsp;<b style="font-weight: normal; ">2.26GHz (3MB L3 cache)</b></li>\r\n</ul>\r\n', '2012-05-30 17:10:53'),
(11, '2 Ão sÆ¡ mi ngáº¯n tay Italy', 399000, 1, 'http://imgcr.vatgia.vn/pictures/phagia/medium/medium_iqk1336385071.jpg', 'Ão sÆ¡ mi ngáº¯n tay cao cáº¥p Ä‘Æ°á»£c may tá»« cháº¥t liá»‡u váº£i cao cáº¥p cotton 100%, phÃ¹ há»£p cho nhá»¯ng ngÃ y hÃ¨ náº¯ng nÃ³ng, giáº£m giÃ¡ 80% nay chá»‰ cÃ²n 199.000Ä‘/1 chiáº¿c - GiÃ¡ thá»‹ trÆ°á»ng 1.000.000Ä‘, cÃ³ ráº¥t nhiá»u máº«u mÃ£ ', '<p>\r\n	&nbsp;</p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	&nbsp;&Aacute;o sÆ¡ mi Ä‘Æ°á»£c may tá»« cháº¥t liá»‡u váº£i cao cáº¥p nháº­p kháº©u tá»« &Yacute; cá»§a c&aacute;c thÆ°Æ¡ng hiá»‡u lá»›n, cotton 100%. Ä&acirc;y l&agrave; deal Ä‘áº·c biá»‡t duy nháº¥t chá»‰ c&oacute; á»Ÿ Cucre.vn, do ch&uacute;ng t&ocirc;i Ä‘&agrave;m ph&aacute;n vá»›i Táº­p Ä‘o&agrave;n c&ocirc;ng ty may táº¡i Th&agrave;nh phá»‘ Há»“ Ch&iacute; Minh mua to&agrave;n bá»™ sá»‘ h&agrave;ng cá»¡ nhá» tá»« 37-41 d&agrave;nh cho ngÆ°á»i Viá»‡t.</p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	- Thiáº¿t káº¿ má»›i, Ä‘Æ°á»ng may cáº©n tháº­n v&agrave; phá»‘i m&agrave;u tinh táº¿.</p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	- Cotton 100%, máº­t Ä‘á»™ dá»‡t hai máº·t ráº¥t cao gi&uacute;p váº£i má»‹n v&agrave; m&aacute;t, c&oacute; sá»£i chá»‘ng nh&agrave;u lu&ocirc;n táº¡o cho chiáº¿c &aacute;o Form d&aacute;ng chuáº©n.</p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	- Kháº£ nÄƒng tháº¥m h&uacute;t má»“ h&ocirc;i tá»‘t, gi&uacute;p ngÆ°á»i máº·c lu&ocirc;n cáº£m tháº¥y thoáº£i m&aacute;i ká»ƒ cáº£ khi tham gia c&aacute;c hoáº¡t Ä‘á»™ng ngo&agrave;i trá»i.</p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	- Äa dáº¡ng vá» kiá»ƒu d&aacute;ng, m&agrave;u sáº¯c Ä‘á»ƒ báº¡n thá»a sá»©c lá»±a chá»n.</p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	- Kiá»ƒu cá»• Ch&acirc;u &Acirc;u mang phong c&aacute;ch chuy&ecirc;n nghiá»‡p, Ä‘Æ°á»£c thiáº¿t káº¿ Ä‘á»©ng, tinh táº¿, Ä‘Æ°á»ng cáº¯t kh&eacute;o l&eacute;o, káº¿t há»£p vá»›i c&agrave; váº¡t Ä‘á»ƒ táº¡o th&agrave;nh bá»™ Ä‘&ocirc;i ho&agrave;n háº£o.</p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	- C&oacute; c&aacute;c size: 37, 38, 39, 40, 41, v&agrave; 42,43 (sá»‘ lÆ°á»£ng &iacute;t)</p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	- M&atilde; sáº£n pháº©m:&nbsp;</p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	<b style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; ">+ HP6 - &Aacute;o sÆ¡ mi ngáº¯n tay c&aacute;c loáº¡i.</b></p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	<span id="internal-source-marker_0.30340527719818056" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; ">- Cá»±c ká»³ ph&ugrave; há»£p Ä‘á»ƒ l&agrave;m qu&agrave; táº·ng &yacute; nghÄ©a d&agrave;nh cho Ch&agrave;ng cá»§a báº¡n.</span></p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	&nbsp;</p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	<span id="internal-source-marker_0.30340527719818056" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; "><b style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; ">LÆ°u &yacute;:</b></span></p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	&nbsp;</p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	<span id="internal-source-marker_0.30340527719818056" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; ">- Nháº­n voucher táº­n nh&agrave; v&agrave; mang Ä‘á»•i voucher láº¥y sáº£n pháº©m táº¡i Sá»‘ 8 Tr&agrave;ng Tiá»n, Ho&agrave;n Kiáº¿m, H&agrave; Ná»™i.</span></p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	- Sá»‘ Ä‘iá»‡n thoáº¡i tÆ° váº¥n v&agrave; tráº£ lá»i kh&aacute;ch h&agrave;ng: Anh CÆ°á»ng - &nbsp;0904.586.108</p>\r\n<p dir="ltr" style="border: 0px none; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, sans-serif; line-height: 23px; background-color: rgb(216, 244, 255); ">\r\n	- Thá»i gian nháº­n &aacute;o: s&aacute;ng tá»« 8h30-11h30, chiá»u tá»« 13h-18h&nbsp;</p>\r\n', '2012-05-31 20:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_group_user` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `id_group_user`, `email`) VALUES
(1, 'hungthangitv', '123', 1, 'hungthangitv@gmail.com'),
(2, 'hungthangitvn', '321', 3, 'hungthangitvn@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
