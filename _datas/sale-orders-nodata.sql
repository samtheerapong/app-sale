-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2023 at 09:59 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sale-orders`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อลูกค้า',
  `customer_address` text COMMENT 'ที่อยู่ลูกค้า',
  `customer_phone` varchar(255) DEFAULT NULL COMMENT 'เบอร์โทรลูกค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_address`, `customer_phone`) VALUES
(1, 'NFC', '59/3 Soi Sukhumvit 39, Sukhumvit Road, Klongton Nua, Wattana, Bangkok 10110 Thailand', ' 02 2620030 – 3'),
(2, 'QP', 'บริษัท คิวพี (ประเทศไทย) จำกัด เลขที่ 1023 เอ็มเอส สยาม ทาวเวอร์ (ชั้น 23) ถนนพระราม 3, ช่องนนทรี, ยานนาวา, กรุงเทพฯ 10120', '02 294 5115 แฟกซ์: 02 294 5424'),
(3, 'Singha Kameda', 'SINGHA KAMEDA (THAILAND) CO., LTD. 99/5 MOO.7 BANGNA-TRAD KM.19, BANGCHALONG,BANGPLEE, SAMUTPRAKARN 10540', '(662) 740-7700-8   Fax: (662) 312-6686'),
(4, 'Namchow', 'Namchow (Thailand) Ltd. 75/27-29 18th-19th Floor, Ocean Tower 2, Soi Sukhumvit 19,\n\nSukhumvit Road, North Klongtoey, Wattana, Bangkok 10110', '(662) 033-7800, 259-7871-9 Fax : (662) 259-7870 , 259-1864 '),
(5, 'CPF Thailand', '1,1/1 ซอยเย็นจิต 2 แยก 1 อาคารทรัพย์สมุทร 2 ชั้น 4 ถนนเย็นจิต แขวงทุ่งวัดดอน เขตสาทร กรุงเทพฯ 10120', 'โทรศัพท์ 0-2780-8779, 09-7190-5848 โทรสาร 0-2780-8787'),
(6, 'BFood', 'หมู่ที่ 5 39 ตำบล ช่องสาริกา อำเภอพัฒนานิคม ลพบุรี 15220', '082 028 8254'),
(7, 'Thai Nichi', 'เลขที่ 77 ม. 13 ต. มะเขือแจ้ อ. เมือง จ. ลำพูน ประเทศไทย 51000', '+66 53 581 222'),
(8, 'CPRAM', NULL, NULL),
(9, 'Sky Food', NULL, NULL),
(10, 'Sinvaree', NULL, NULL),
(11, 'Thai Nikken', NULL, NULL),
(12, 'Thai Nippon', NULL, NULL),
(13, 'Sahafarm', NULL, NULL),
(14, 'Golden Line', NULL, NULL),
(15, 'Sahafarm Inter', NULL, NULL),
(16, 'CPF Food & Baverage', NULL, NULL),
(17, 'Multitech', NULL, NULL),
(18, 'KRS', NULL, NULL),
(19, 'Vanguard', NULL, NULL),
(20, 'Kanom Sakol', NULL, NULL),
(21, 'R&B Food Supply', NULL, NULL),
(22, 'Winchance Food', NULL, NULL),
(23, 'Mekkala', NULL, NULL),
(24, 'Thai Food Father', NULL, NULL),
(25, 'Pure Food', NULL, NULL),
(26, 'Monty & Totco', NULL, NULL),
(27, 'Nine Star', NULL, NULL),
(28, 'Zen Kitchen Food', NULL, NULL),
(29, 'Bio Asia', NULL, NULL),
(30, 'Thanawat', NULL, NULL),
(31, 'Thai Union Food', NULL, NULL),
(32, 'Spice Garden', NULL, NULL),
(33, 'Food Image', NULL, NULL),
(34, 'DSmith Food', NULL, NULL),
(35, 'Lactasoy', NULL, NULL),
(36, 'Robbie Market', NULL, NULL),
(37, 'salada', NULL, NULL),
(38, 'Spring Kitchen', NULL, NULL),
(39, 'NR Instant', NULL, NULL),
(40, 'Panus Poltry Group', NULL, NULL),
(41, 'Sammitr lndustry', NULL, NULL),
(42, 'Capital Trading', NULL, NULL),
(43, 'Tops Organic', NULL, NULL),
(44, 'NST Foods Industry', NULL, NULL),
(45, 'Asian Food Network', NULL, NULL),
(46, 'Surapon Nichirei', NULL, NULL),
(47, 'Surapon Food', NULL, NULL),
(48, 'Betagro', NULL, NULL),
(49, 'Lampang Food', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `po_no` varchar(255) DEFAULT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `customer_id` int(11) DEFAULT NULL COMMENT 'ชื่อลูกค้า',
  `deadline_date` date DEFAULT NULL COMMENT 'กำหนดส่ง',
  `deadline_new` date DEFAULT NULL COMMENT 'กำหนดส่งใหม่',
  `gross_amount` varchar(255) DEFAULT NULL COMMENT 'ยอดรวมก่อนหัก',
  `vat_charge_rate` varchar(255) DEFAULT NULL COMMENT 'เรทภาษี(%)',
  `vat_charge` varchar(255) DEFAULT NULL COMMENT 'จำนวนภาษีที่หัก',
  `discount` varchar(45) DEFAULT NULL COMMENT 'ส่วนลด',
  `net_amount` varchar(45) DEFAULT NULL COMMENT 'จำนวนเงินรวมสุทธิ',
  `payment_term` int(11) DEFAULT NULL COMMENT 'เงื่อนไขการชำระเงิน',
  `paid_status` int(11) DEFAULT NULL COMMENT 'สถานะการชำระเงิน',
  `users_id` int(11) DEFAULT NULL COMMENT 'พนักงานขาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_item`
--

CREATE TABLE `orders_item` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) DEFAULT NULL COMMENT 'ออเดอร์',
  `products_id` int(11) DEFAULT NULL COMMENT 'สินค้า',
  `qty` varchar(255) DEFAULT NULL COMMENT 'จำนวน',
  `price` varchar(255) DEFAULT NULL COMMENT 'ราคา',
  `unit` varchar(255) DEFAULT NULL COMMENT 'หน่วย',
  `amount` varchar(255) DEFAULT NULL COMMENT 'ราคารวม',
  `status_id` int(11) DEFAULT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paid_status`
--

CREATE TABLE `paid_status` (
  `id` int(11) NOT NULL,
  `paid_status` varchar(200) DEFAULT NULL COMMENT 'การชำระเงิน',
  `color` varchar(45) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paid_status`
--

INSERT INTO `paid_status` (`id`, `paid_status`, `color`) VALUES
(1, 'ค้างชำระ', '#ED7D31'),
(2, 'ชำระแล้ว', '#005B41');

-- --------------------------------------------------------

--
-- Table structure for table `payment_term`
--

CREATE TABLE `payment_term` (
  `id` int(11) NOT NULL,
  `payment_term` varchar(255) DEFAULT NULL COMMENT 'ประเภทการชำระ',
  `color` varchar(45) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_term`
--

INSERT INTO `payment_term` (`id`, `payment_term`, `color`) VALUES
(1, 'เงินสด', '#4477CE'),
(2, 'credit 15 days', '#BA704F'),
(3, 'credit 30 days', '#6C3428');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(255) DEFAULT NULL COMMENT 'รหัสสินค้า',
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อสินค้า',
  `unit` varchar(255) DEFAULT NULL COMMENT 'หน่วยนับ',
  `image` text COMMENT 'รูปภาพ',
  `description` text COMMENT 'รายละเอียด',
  `active` int(11) DEFAULT NULL COMMENT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `unit`, `image`, `description`, `active`) VALUES
(1, 'FBCO-05001', 'กาแฟข้าวบาร์เลย์ (500 g)', 'ถุง', '', '', 1),
(2, 'FCD2-A0181', 'ซีอิ๊วดำโจฮินสูตร2 18 C', 'ปี๊บ', '', '', 1),
(3, 'FCDA-10001', 'Johin Premium Dark Soy Sauce 1 Liter', 'ขวด', '', '', 1),
(4, 'FCDA-A0181', 'Johin Dark Soy Sauce Formula 2 For CP 18 C', 'ปี๊บ', '', '', 1),
(5, 'FCDA-A0182', 'Johin Premium Dark Soy Sauce For M&S51 (18 C)', 'ปี๊บ', '', '', 1),
(6, 'FCDA-A0184', 'Johin Standard Dark Soy Sauce 18 Liter', 'ปี๊บ', '', '', 1),
(7, 'FCDA-A0187', 'Johin Seasoning Dark soy sauce 18 C', 'ปี๊บ', '', '', 1),
(8, 'FCDA-A0188', 'Johin dark soy sauce (Gluten Free) 18 C', 'ปี๊บ', '', '', 1),
(9, 'FCDO-02001', 'Organic Dark soy sauce 200ml (12 bottles) - Asian Organic', 'ขวด', '', '', 1),
(10, 'FCDO-02002', 'PB Farm Organic Dark Soy sauce 200 ml (6 bottles)', 'ขวด', '', '', 1),
(11, 'FCDO-02003', 'Organic Dark soy sauce 200ml (6 bottles) - PB Farm(New)', 'ขวด', '', '', 1),
(12, 'FCDO-06003', 'Organic Dark Soy Sauce 600ml -Asian Organic Brand', 'ขวด', '', '', 1),
(13, 'FCDO-A0181', 'Johin Organic dark soy sauce 18 L', 'ปี๊บ', '', '', 1),
(14, 'FCKE-02001', 'Organic Fair Trade Ketjap manis 200 ml x 6 - Autour du riz L\'Asie brand', 'ขวด', '', '', 1),
(15, 'FCKE-02002', 'Organic Ketjap manis 200 ml x 6 - NoAd brand', 'ขวด', '', '', 1),
(16, 'FCKE-06001', 'Organic Fair Trade Ketjap manis 600 ml x 6 - Autour du riz L\'Asie brand', 'ขวด', '', '', 1),
(17, 'FCKE-A2001', 'Organic Fairatrade Ketjap manis 200L Autour La Du Riz Brand', 'ลิตร', '', '', 1),
(18, 'FCL1-03001', 'ซีอิ้วขาวสูตร 1 300 CC', 'ขวด', '', '', 1),
(19, 'FCL1-07001', 'ซีอิ้วขาวสูตร 1 700 CC', 'ขวด', '', '', 1),
(20, 'FCL1-A0052', 'ซีอิ้วขาว สูตร 1 ขนาด 5 ลิตร x 2', 'ขวด', '', '', 1),
(21, 'FCL1-A0101', 'ซีอิ้วขาวสูตร 1 (10Liter)', 'ขวด', '', '', 1),
(22, 'FCL1-A0102', 'Johin Chinese Soy Sauce 10 Liter (ขาวสูตร 1)', 'ขวด', '', '', 1),
(23, 'FCL2-06301', 'ซีอิ๊วขาวสูตร 2 630 CC', 'ขวด', '', '', 1),
(24, 'FCL2-K0001', 'Johin Extra Chinese Soy Sauce 1,000 Liters (RL-LQ-003-1)', 'ลิตร', '', '', 1),
(25, 'FCLC-A0101', 'Johin Chinese Soy Sauce For CP Group 10 Liter', 'ขวด', '', '', 1),
(26, 'FCLC-A0103', 'Johin Chinese Soy Sauce 10 Liter', 'ขวด', '', '', 1),
(27, 'FCLC-A0104', 'Johin chinese soy sauce (gluten free) 10Lx2B', 'ขวด', '', '', 1),
(28, 'FCLC-A0105', 'Johin Chinese Soy Sauce NO 1.2 10 Liter', 'ขวด', '', '', 1),
(29, 'FCLC-A0182', 'Johin Chinese Soy Sauce For CP Group18 C', 'ปี๊บ', '', '', 1),
(30, 'FCLC-A0183', 'Johin Chinese Soy Sauce 18 C', 'ปี๊บ', '', '', 1),
(31, 'FCLC-A0185', 'Johin Chinese soy sauce (sugar)', 'ปี๊บ', '', '', 1),
(32, 'FCOR-02001', 'Organic Chinese Soy Sauce 200 ml (12 Bottles)', 'ขวด', '', '', 1),
(33, 'FCOR-02002', 'Organic Chinese soy sauce 200 ml (6 bottles) - PB Farm', 'ขวด', '', '', 1),
(34, 'FCOR-02003', 'Organic Chinese soy sauce 200 ml (6 bottles) - Welt partner Brand (Grace Bio)', 'ขวด', '', '', 1),
(35, 'FCOR-02004', 'Organic Chinese soy sauce 200ml ( 12 bottles)-Asian organic', 'ขวด', '', '', 1),
(36, 'FCOR-02005', 'Organic Chinese soy sauce 200 ml (12 bottles) - Fair D Brand (Grace Bio)', 'ขวด', '', '', 1),
(37, 'FCOR-02006', 'Organic Chinese soy sauce 200 ml (6 bottles) - PB Farm (New)', 'ขวด', '', '', 1),
(38, 'FCOR-02007', 'Organic Chinese soy sauce 200ml ( 6 bottles)-Asian organic', 'ขวด', '', '', 1),
(39, 'FCOR-03001', 'Organic soy sauce 300ml (12bottles)-One organic', 'ขวด', '', '', 1),
(40, 'FCOR-06002', 'Organic Chinese soy sauce 600ml ( 12 bottles)-Asian organic', 'ขวด', '', '', 1),
(41, 'FCOR-07001', 'Organic Chinese Soy Sauce 700 ml (12 Bottles)', 'ขวด', '', '', 1),
(42, 'FCOR-A0051', 'Organic Chinese soy sauce 5 L x 2 bottles - PB Farm', 'ขวด', '', '', 1),
(43, 'FCSW-02001', 'Sweet soy sauce (gluten free) 200 ml (6 bottle)- PB Farm (New)', 'ขวด', '', '', 1),
(44, 'FDSP-02001', 'Organic Spring Roll sauce 200ml (6 bottles) -L\'Asie Brand', 'ขวด', '', '', 1),
(45, 'FDSP-02002', 'Organic Spring roll sauce 200mlx6 NoAd Brand', 'ขวด', '', '', 1),
(46, 'FDSW-02001', 'Organic Sweet Chili sauce 200ml(6 bottles)-L\'Asie Brand', 'ขวด', '', '', 1),
(47, 'FFHO-03001', 'Fairtrade Hoisin Sauce 300 ml', 'ขวด', '', '', 1),
(48, 'FFHO-10001', 'Fairtrade Hoisin Sauce 1 Liter', 'ขวด', '', '', 1),
(49, 'FFLE-03001', 'Fairtrade Less salt Tamari Soy Sauce 300 ml', 'ขวด', '', '', 1),
(50, 'FFMI-02001', 'Organic Fair Trade Pasteurized Genmai miso (200g Jar x6) La Du Riz Brand', 'ขวด', '', '', 1),
(51, 'FFMI-02002', 'Organic Fair Trade Pasteurized Genmai miso with kombu (200g Jar x6) La Du riz Brand', 'ขวด', '', '', 1),
(52, 'FFMI-02003', 'Organic Fair Trade Pasteurized Shiro Miso (200g Jar x6) La Du Riz Brand', 'ขวด', '', '', 1),
(53, 'FFMI-02501', 'Organic Fairtrade Miso 250 g x 6 boxes -La Du Riz brand', 'กระปุก', '', '', 1),
(54, 'FFMI-02502', 'Organic Fairtrade unpasteurized Miso 250 g Jar x 6 - La Du Riz Brand', 'ขวด', '', '', 1),
(55, 'FFMI-15001', 'Organic Fairtrade Miso 1.5 kg.x 2 boxes -La Du riz Brand', 'กระปุก', '', '', 1),
(56, 'FFOR-02001', 'Fairtrade Organic Soy Sauce 200 ml (12 Bottles) Chopstick brand', 'ขวด', '', '', 1),
(57, 'FFOR-02002', 'Fairtrade Organic Soy Sauce 200 ml (6 Bottle) Fair trade original Brand', 'ขวด', '', '', 1),
(58, 'FFOR-02003', 'Fairtrade Organic Soy Sauce 200 ml(6 bottles) Fair Trade original (German)', 'ขวด', '', '', 1),
(59, 'FFOR-02004', 'Organic Fairtrade Shoyu 200 ml (6 bottles) Autour Du riz L\'Asie Brand', 'ขวด', '', '', 1),
(60, 'FFOR-02005', 'Organic Fairtrade Tamari soy sauce 200 ml (6 bottles) Autour Du riz L\'Asie Brand', 'ขวด', '', '', 1),
(61, 'FFOR-02006', 'Organic Fairtrade Shoyu Less salt 200ml (6 bottles) Autour La Du Riz', 'ขวด', '', '', 1),
(62, 'FFOR-03001', 'Fairtrade Organic Tamari (regular salt) 300 ml', 'ขวด', '', '', 1),
(63, 'FFOR-06001', 'Fairtrade Organic Tamari Soy Sauce 600 ml', 'ขวด', '', '', 1),
(64, 'FFOR-06002', 'Organic Fairtarde Tamari soy sauce 600 ml ( 6 bottles)Autour Du riz L\'Asie Brand', 'ขวด', '', '', 1),
(65, 'FFOR-06003', 'Organic Fairtarde Shoyu 600 ml ( 6 bottles) Autour Du riz L\'Asie Brand', 'ขวด', '', '', 1),
(66, 'FFOR-06004', 'Organic Fairtrade Shoyu Less salt 600ml (6 bottles) Autour La Du Riz', 'ขวด', '', '', 1),
(67, 'FFOR-10001', 'Saitaku Organic soy sauce 1000 ml (6 bottles)', 'ขวด', '', '', 1),
(68, 'FFOR-A0181', 'Organic Fairtarde Shoyu 18 Liters Autour Du riz L\'Asie Brand', 'ปี๊บ', '', '', 1),
(69, 'FFOR-A2001', 'Fairtrade Tamari Organic Soy Sauce 200 L', 'ลิตร', '', '', 1),
(70, 'FFOR-A2002', 'Fairtrade organic Tamari No.1 soy sauce 200 L', 'ลิตร', '', '', 1),
(71, 'FFOR-A2003', 'Organic FairTrade Shoyu 200 L -Autour Du Riz L\'Asie Brand', 'ถัง', '', '', 1),
(72, 'FFOR-A2004', 'Organic Fairtrade Shoyu Less salt soy sauce 200L -Autour Du Riz Brand', 'ลิตร', '', '', 1),
(73, 'FFOR-K0001', 'Organic FairTrade Tamari soy sauce 1000 L', 'ลิตร', '', '', 1),
(74, 'FFOR-K0002', 'Organic Fairtrade Shoyu Soy sauce 1000 L -Autour Du Riz Brand', 'ลิตร', '', '', 1),
(75, 'FFOR-K0003', 'Organic Fairtrade Tamari Soy sauce No.1 1000L - Autur La Du Riz Brand', 'ลิตร', '', '', 1),
(76, 'FFSW-02001', 'Fairtrade Sweet Soy Sauce 200 ml (12 Bottles)', 'ขวด', '', '', 1),
(77, 'FFTA-10001', 'Fairtrade Tamari Soy Sauce 1 L (12 Bottle)', 'ขวด', '', '', 1),
(78, 'FFTE-03001', 'Fairtrade Teriyaki Sauce 300 ml', 'ขวด', '', '', 1),
(79, 'FFVI-02001', 'Fairtrade Organic Rice Vinegar 200 ml (6 Bottles)', 'ขวด', '', '', 1),
(80, 'FJEX-00051', 'Johin Extra 5 g (T)(600 pcs)', 'ซอง', '', '', 1),
(81, 'FJEX-00052', 'Johin Extra 5 g (T)(1,000 pcs)', 'ซอง', '', '', 1),
(82, 'FJEX-00053', 'Extra 5 g (WASABI-O) (1,000 pcs)', 'ซอง', '', '', 1),
(83, 'FJEX-02001', 'Johin Extra Soy Sauce 200 ml', 'ขวด', '', '', 1),
(84, 'FJEX-02002', 'Johin Extra Soy Sauce 200 ml (Monty Lio-chang)', 'ขวด', '', '', 1),
(85, 'FJEX-10001', 'JOHIN EXTRA 1 L', 'ขวด', '', '', 1),
(86, 'FJEX-10002', 'Japanese Extra soy sauce (Wasabi - O) 1L x 12', 'ขวด', '', '', 1),
(87, 'FJEX-10003', 'Johin Extra Soy Sauce 1L X 12 (Monty Lio-chang)', 'ขวด', '', '', 1),
(88, 'FJEX-A0051', 'JOHIN EXTRA 5 L', 'ขวด', '', '', 1),
(89, 'FJEX-A0053', 'Johin Extra Soy Sauce 5 Liter (5Lx4B)', 'ขวด', '', '', 1),
(90, 'FJEX-A0101', 'Johin Extra Soy Sauce 10 Liters', 'ขวด', '', '', 1),
(91, 'FJEX-A0102', 'Johin Extra Soy Sauce 10 Liters (For Thai nikken Foods)', 'ขวด', '', '', 1),
(92, 'FJEX-A0181', 'JOHIN EXTRA 18 L', 'ปี๊บ', '', '', 1),
(93, 'FJEX-A0182', 'Johin Extra Soy Sauce (Fair Trade) 18 L', 'ปี๊บ', '', '', 1),
(94, 'FJEX-A0203', 'Shizen Japanese soy sauce 200 ml x 12', 'ขวด', '', '', 1),
(95, 'FJEX-A2001', 'Johin Extra Soy Sauce No.1 200 Liters', 'ลิตร', '', '', 1),
(96, 'FJEX-A2002', 'Johin Extra Soy Sauce 200 Liters', 'ถัง', '', '', 1),
(97, 'FJEX-A2003', 'Johin Extra soy sauce (gluten free) 200 Liters', 'ถัง', '', '', 1),
(98, 'FJEX-K0001', 'JOHIN EXTRA 1,000 L', 'ลิตร', '', '', 1),
(99, 'FJEX-K0002', 'JOHIN EXTRA 1,000 L (For Thai Nikken Foods)', 'ลิตร', '', '', 1),
(100, 'FJGL-02001', 'Johin Gluten free Soy Sauce 200 ml (12 Bottle)', 'ขวด', '', '', 1),
(101, 'FJGL-02002', 'Gluten free Soy Sauce 200 ml (12 Bottles) - PB Farm Eastland', 'ขวด', '', '', 1),
(102, 'FJGL-02003', 'Gluten free Soy Sauce 200 ml (12 Bottles) - PB Farm( Apple\'s Island)', 'ขวด', '', '', 1),
(103, 'FJGL-02004', 'Gluten free Soy Sauce 200 ml (12 Bottles) - PB Farm(กวางเฮียหยู)', 'ขวด', '', '', 1),
(104, 'FJGL-02006', 'Gluten Free soy sauce 200 ml ( 6 bottles) - PB Farm (New)', 'ขวด', '', '', 1),
(105, 'FJGL-06001', 'Gluten free Soy Sauce 600 ml (12 Bottles) - PB Farm( Apple\'s Island)', 'ขวด', '', '', 1),
(106, 'FJGL-10002', 'Johin Gluten Free soy sauce No.1 1L x 12bottles', 'ขวด', '', '', 1),
(107, 'FJGL-A0053', 'Gluten Free Soy Sauce 5 Liter (5Lx4B) - PB Farm( Apple\'s Island)', 'ขวด', '', '', 1),
(108, 'FJGL-A0101', 'Johin Gluten Free Soy Sauce 10 Liter', 'ขวด', '', '', 1),
(109, 'FJGL-A0102', 'Johin Gluten Free Soy Sauce 10 Liter + Iodine', 'ขวด', '', '', 1),
(110, 'FJGL-A0181', 'Johin Gluten Free Soy Sauce 18 C', 'ปี๊บ', '', '', 1),
(111, 'FJGL-A0183', 'Johin Gluten Free soy sauce No.1 18 C', 'ปี๊บ', '', '', 1),
(112, 'FJGL-A2001', 'Johin Gluten Free Soy Sauce 200 Liters', 'ลิตร', '', '', 1),
(113, 'FJGL-K0001', 'Johin Gluten Free Soy Sauce 1,000 Liters (Multipol)', 'ลิตร', '', '', 1),
(114, 'FJGL-K0002', 'Johin gluten free soy sauce 1,000 Liters (Thai Nikken)', 'ลิตร', '', '', 1),
(115, 'FJLE-02002', 'Less Sodium Soy Sauce 200 ml (12 Bottles) - PB Farm', 'ขวด', '', '', 1),
(116, 'FJLE-02004', 'Johin Less Salt Soy Sauce NO.1 200 ml (Lio-Chang)', 'ขวด', '', '', 1),
(117, 'FJLE-02005', 'Less salt soy sauce 200 ml (6 bottles) - PB Farm', 'ขวด', '', '', 1),
(118, 'FJLE-02006', 'Less salt soy sauce 200 ml - gluten free (6 bottles) - PB Farm (New)', 'ขวด', '', '', 1),
(119, 'FJLE-10001', 'Johin Less Salt Soy Sauce 1 Liter', 'ขวด', '', '', 1),
(120, 'FJLE-A0101', 'Johin Less Salt Soy Sauce 10 Liter', 'ขวด', '', '', 1),
(121, 'FJLE-A0102', 'Johin Less Salt Soy Sauce 10 Liters + Iodine', 'ขวด', '', '', 1),
(122, 'FJLE-A0103', 'Johin Less Salt Soy Sauce (Gluten free) 10 L', 'ขวด', '', '', 1),
(123, 'FJLE-A0181', 'Johin Less Salt Soy Sauce 18 C', 'ปี๊บ', '', '', 1),
(124, 'FJLE-A0184', 'Johin Less salt soy sauce No.1 18 C', 'ปี๊บ', '', '', 1),
(125, 'FJLI-03001', 'Johin Light Color Soy Sauce 300 ml.', 'ขวด', '', '', 1),
(126, 'FJLI-07001', 'JOHIN LIGHT COLOR SOY SAUCE 700 ml', 'ขวด', '', '', 1),
(127, 'FJLI-10001', 'JOHIN LIGHT COLOR SOY SAUCE (NJ5-1P)', 'ขวด', '', '', 1),
(128, 'FJLI-A0101', 'Johin Light Color Soy Sauce 10 Liter', 'ขวด', '', '', 1),
(129, 'FJLI-A0102', 'Johin Light Color Soy Sauce + Iodine 10 Liter', 'ขวด', '', '', 1),
(130, 'FJLI-A0181', 'JOHIN LIGHT COLOR SOY SAUCE 18 L', 'ปี๊บ', '', '', 1),
(131, 'FJLI-A2001', 'Johin Light color soy sauce for KPT 200L drum', 'กิโลกรัม', '', '', 1),
(132, 'FJLI-K0001', 'JOHIN LIGHT COLOR SOY SAUCE 1,000 L', 'ลิตร', '', '', 1),
(133, 'FJLI-K0002', 'Johin Light Color Soy Sauce 1,000 L For Kiewpei', 'ลิตร', '', '', 1),
(134, 'FJOR-02001', 'Organic Soy Sauce 200 ml (12 Bottles) Lemon Farm Brand', 'ขวด', '', '', 1),
(135, 'FJOR-02002', 'Organic Soy Sauce 200 ml (12 Bottles) - PB Farm', 'ขวด', '', '', 1),
(136, 'FJOR-02003', 'Organic Soy Sauce 200 ml (6 Bottles) - Spiral', 'ขวด', '', '', 1),
(137, 'FJOR-02004', 'Organic Japanese Soy Sauce 200 ml (12 bottles)', 'ขวด', '', '', 1),
(138, 'FJOR-02005', 'Organic Soy Sauce 200 ml (12 Bottles) PB Farm- Eastland', 'ขวด', '', '', 1),
(139, 'FJOR-02006', 'Organic Soy Sauce 200 ml (12 Bottles) - Philipines', 'ขวด', '', '', 1),
(140, 'FJOR-02007', 'Organic Soy sauce 200 ml x 12 -Asian organic Brand', 'ขวด', '', '', 1),
(141, 'FJOR-02008', 'Organic soy sauce 200ml ( 6 bottles) - Organi', 'ขวด', '', '', 1),
(142, 'FJOR-02009', 'Organic Tamari soy sauce 200ml (12 bottles) - BIO TIGER KHAN', 'ขวด', '', '', 1),
(143, 'FJOR-02011', 'Organic Tamari soy sauce 200ml (12bottle) -PB Farm', 'ขวด', '', '', 1),
(144, 'FJOR-02012', 'Organic Reduced salt soy sauce 200ml x 12 ARTICLE CONTAINS 4.2% v/v ALCOHOL- Mei Yang', 'ขวด', '', '', 1),
(145, 'FJOR-02013', 'Organic Less salt Soy sauce 200 ml (6 bottles)-PB Farm', 'ขวด', '', '', 1),
(146, 'FJOR-02014', 'Organic soy sauce 200 ml (6 bottles)- PB Farm', 'ขวด', '', '', 1),
(147, 'FJOR-02015', 'Organic Tamari soy sauce 200 ml (6 bottles)-PB Farm', 'ขวด', '', '', 1),
(148, 'FJOR-02016', 'Organic soy sauce with low sodium 200 ml (12 bottles)-Asian Organic Brand', 'ขวด', '', '', 1),
(149, 'FJOR-02017', 'Organic Soy Sauce 200 ml (6 Bottles) - PB Farm (English version)', 'ขวด', '', '', 1),
(150, 'FJOR-02018', 'Organic Tamari soy sauce 200ml (6bottle) -PB Farm (English Version)', 'ขวด', '', '', 1),
(151, 'FJOR-02019', 'Organic Tamari soy sauce 200ml(6bottles) -PB Farm (New)', 'ขวด', '', '', 1),
(152, 'FJOR-02020', 'Organic soy sauce 200ml(6bottles) -PB Farm (New)', 'ขวด', '', '', 1),
(153, 'FJOR-02021', 'Organic Less salt soy sauce 200ml(6bottles) -PB Farm (New)', 'ขวด', '', '', 1),
(154, 'FJOR-02022', 'Organic Less salt Soy sauce 200 ml x 6 -Asian organic Brand', 'ขวด', '', '', 1),
(155, 'FJOR-02023', 'Organic Less salt soy sauce 200ml(6bottles)-PB Farm (English version)', 'ขวด', '', '', 1),
(156, 'FJOR-02024', 'Organic Tamari Soy Sauce 200 ml (6 Bottles) - PB Farm (English version with Hebrew)', 'ขวด', '', '', 1),
(157, 'FJOR-02025', 'Organic Reduced salt soy sauce with alcohol 1.0%v/v 200mlx 12 - Mei Yang Brand', 'ขวด', '', '', 1),
(158, 'FJOR-03002', 'Organic soy sauce -Light Taste 300ml (12bottles)-One organic', 'ขวด', '', '', 1),
(159, 'FJOR-06001', 'Organic Soy Sauce 600 ml (12 Bottles) - Philipines', 'ขวด', '', '', 1),
(160, 'FJOR-06002', 'Organic Soy sauce 600 ml x 12 -Asian organic Brand', 'ขวด', '', '', 1),
(161, 'FJOR-06003', 'Organic soy sauce with low Sodium 600ml ( 12 bottles)-Asian organic', 'ขวด', '', '', 1),
(162, 'FJOR-07001', 'Organic Japanese Soy Sauce 700 ml (12 Bottles)', 'ขวด', '', '', 1),
(163, 'FJOR-10003', 'Organic Reduced salt soy sauce 1000 ml x 6 ARTICLE CONTAINS 4.2% v/v ALCOHOL-Saitaku', 'ขวด', '', '', 1),
(164, 'FJOR-10004', 'Organic Reduced salt soy sauce with alcohol 1.0%v/v 1000mlx 6 - SAITAKU BRAND', 'ขวด', '', '', 1),
(165, 'FJOR-A0051', 'Johin Organic Soy Sauce 5L (5L x 4 B)', 'ขวด', '', '', 1),
(166, 'FJOR-A0052', 'Johin organic soy sauce (5L x2)', 'ขวด', '', '', 1),
(167, 'FJOR-A0053', 'PB FARM ORGANIC SOY SUACE 5 L X 4', 'ขวด', '', '', 1),
(168, 'FJOR-A0054', 'Organic Tamari soy sauce 5 L x 2 bottles - PB Farm', 'ขวด', '', '', 1),
(169, 'FJOR-A0101', 'Organic Shoyu Soy Sauce 10 L.', 'ขวด', '', '', 1),
(170, 'FJOR-A0102', 'Organic Soy Sauce 10 L', 'ขวด', '', '', 1),
(171, 'FJOR-A0103', 'PB FARM ORGANIC SOY SUACE 10 L', 'ขวด', '', '', 1),
(172, 'FJOR-A0104', 'PB FARM ORGANIC SOY SUACE + Iodine10 L', 'ขวด', '', '', 1),
(173, 'FJOR-A0105', 'Johin Organic Tamari Gluten Free Soy Sauce 10 L', 'ขวด', '', '', 1),
(174, 'FJOR-A2001', 'Johin Organic Soy sauce 200 Liters', 'ลิตร', '', '', 1),
(175, 'FJPA-A0101', 'Johin Pasteurized soy sauce 10L (2bottles/carton)', 'ขวด', '', '', 1),
(176, 'FJPA-K0001', 'JOHIN PASTEURIZED SOY SAUCE 1,000 Liter', 'ลิตร', '', '', 1),
(177, 'FJPA-K0002', 'JOHIN PASTEURIZED SOY SAUCE + IODINE 1,000 Liter', 'ลิตร', '', '', 1),
(178, 'FJPR-A0051', 'JOHIN PREMIUM SOY SAUCE(SOS9) 5Lx2Bottles', 'ขวด', '', '', 1),
(179, 'FJPR-A0053', 'Johin Premium (J1-5P) T', 'ขวด', '', '', 1),
(180, 'FJRE-A0101', 'Johin Regular Soy Sauce 10 L', 'ขวด', '', '', 1),
(181, 'FJRE-A0103', 'Johin Regular Soy Sauce + Iodine 10 Liters', 'ขวด', '', '', 1),
(182, 'FJRH-A0101', 'Johin Rich Soy Sauce 10 Liter', 'ขวด', '', '', 1),
(183, 'FJRH-A0181', 'JOHIN RICH SOY SAUCE 18 C', 'ปี๊บ', '', '', 1),
(184, 'FJRH-K0001', 'Johin Rich Soy Sauce 1,000 Liter', 'ลิตร', '', '', 1),
(185, 'FJRI-A0181', 'Johin Rice Soy Sauce 18 Liter', 'ปี๊บ', '', '', 1),
(186, 'FJRO-A0051', 'Roasted Japanese Soy sauce 5 Liter (5L x 4B)', 'ขวด', '', '', 1),
(187, 'FJRO-A0101', 'Johin Roasted Japanese Soy Sauce 10 Liters', 'ขวด', '', '', 1),
(188, 'FJSP-A0052', 'JOHIN SPECIAL SOY SAUCE(NJ2 F -5P)', 'ขวด', '', '', 1),
(189, 'FJSP-A0101', 'Johin Special Soy Sauce 10 Liter', 'ขวด', '', '', 1),
(190, 'FJSP-A0102', 'Johin Special Soy Sauce No.2 10 Liter', 'ขวด', '', '', 1),
(191, 'FJSP-K0001', 'JOHIN SPECIAL SOY SAUCE (NJ2-1KL)', 'ลิตร', '', '', 1),
(192, 'FJST-A0101', 'Johin Standard Soy Sauce 10 Liter', 'ขวด', '', '', 1),
(193, 'FJST-A0102', 'JOHIN STANDARD SOY SAUCE No.2 10 Liter', 'ขวด', '', '', 1),
(194, 'FJST-A0103', 'JOHIN STANDARD SOY SAUCE No.2 + Iodine 10 Liter (AFSSBT)', 'ขวด', '', '', 1),
(195, 'FJST-A0104', 'Johin Standard Soy Sauce + Iodine 10 Liters', 'ขวด', '', '', 1),
(196, 'FJST-A0185', 'Johin Standard Soy Sauce (Fairtrade) 18 L', 'ปี๊บ', '', '', 1),
(197, 'FJST-K0001', 'Johin Standard soy sauce 1,000 L', 'ลิตร', '', '', 1),
(198, 'FJTA-A0101', 'Johin Tamari soy sauce 10Lx 2', 'ขวด', '', '', 1),
(199, 'FJTA-A0185', 'Johin Tamari Soy Sauce (Gluten free) For Thai Nichi (RL-LQ-015-1)', 'ปี๊บ', '', '', 1),
(200, 'FJTA-A0186', 'JohinTamari Gluten Free Soy Sauce No.1 For Thai Nichi (RL-LQ-017-1)', 'ปี๊บ', '', '', 1),
(201, 'FJTA-K0001', 'Johin Tamari Soy Sauce (Gluten free) For Thai Nichi 1000 L', 'ลิตร', '', '', 1),
(202, 'FMMI-05001', 'Johin Miso 0.5 Kg', 'ถุง', '', '', 1),
(203, 'FMMI-07002', 'Johin เต้าเจี้ยว 700 ml (12 Bottles)', 'ขวด', '', '', 1),
(204, 'FMMI-10001', 'Johin Miso 1 Kg', 'ถุง', '', '', 1),
(205, 'FMMI-10002', 'Johin Dark Miso 1 kg', 'ถุง', '', '', 1),
(206, 'FMMI-10003', 'Johin Pasteurization Miso- 1 kg - Plastic bag', 'ถุง', '', '', 1),
(207, 'FMOR-05001', 'Organic Miso 0.5 kg', 'ถุง', '', '', 1),
(208, 'FMOR-10001', 'Johin Organic Miso 1 Kg.', 'ถุง', '', '', 1),
(209, 'FMSS-07002', 'M1-700CC (J) MALT SAUCE SEASONING', 'ขวด', '', '', 1),
(210, 'FOBY-K0001', 'น้ำมันถั่วเหลืองดิบ', 'กิโลกรัม', '', '', 1),
(211, 'FSAM-A0101', 'Johin Amakuchi Sauce 10 Liter', 'ขวด', '', '', 1),
(212, 'FSBL-A0181', 'Johin Black Bean Marinade Sauce 18 L', 'ปี๊บ', '', '', 1),
(213, 'FSBV-02001', 'Organic Black Vinegar Sauce 200 ml (12 bottles)', 'ขวด', '', '', 1),
(214, 'FSBV-06001', 'Organic Black Rice Vinegar sauce 600ml x 12- Asian organic Brand', 'ขวด', '', '', 1),
(215, 'FSEE-A0051', 'Johin Eel Sauce 5 Liter (5L x 2B)', 'ขวด', '', '', 1),
(216, 'FSFS-02002', 'Fish Sauce Flavored Organic Soy Sauce PB Farm Brand 200ml(6 Bottles)', 'ขวด', '', '', 1),
(217, 'FSFS-02003', 'ซีอิ๊วรสน้ำปลา (200mlx6)', 'ขวด', '', '', 1),
(218, 'FSHO-02001', 'Premium Hoisin sauce 200ml (6 bottles) -PB Farm (New)', 'ขวด', '', '', 1),
(219, 'FSHO-03001', 'Hoi Sin Sauce 300g (12 bottles)', 'ขวด', '', '', 1),
(220, 'FSHO-A0181', 'Hoi Sin Sauce 18 C', 'ปี๊บ', '', '', 1),
(221, 'FSHO-A0187', 'Premium Hoi Sin Sauce 18L', 'ปี๊บ', '', '', 1),
(222, 'FSHO-A0188', 'Premium Hoi Sin Sauce NO.1 18L', 'ปี๊บ', '', '', 1),
(223, 'FSJV-02001', 'Organic Japanese Vinaigrette sauce 200ml(6bottle)-La Du Riz Companige', 'ขวด', '', '', 1),
(224, 'FSME-10001', 'Johin Men-Tsuyu 1 Liter', 'ขวด', '', '', 1),
(225, 'FSMR-02002', 'Organic Vegan Mushroom Sauce PB Farm -Agtrade 200mlx12', 'ขวด', '', '', 1),
(226, 'FSPO-A0181', 'Johin Ponzu Shoyu 18 C No.1', 'ปี๊บ', '', '', 1),
(227, 'FSPT-02001', 'Organic Pad Thai Sauce 200ml (6 bottles) -La Autour Du Riz Brand', 'ขวด', '', '', 1),
(228, 'FSSC-A0101', 'ซอสสาหร่ายปรุงรส Curve 10 Liter', 'ขวด', '', '', 1),
(229, 'FSSC-A0181', 'ซอสสาหร่ายปรุงรส Curue 18 C', 'ปี๊บ', '', '', 1),
(230, 'FSSC-A0182', 'ซอสสาหร่ายปรุงรส Curve No MSG 18 C', 'ปี๊บ', '', '', 1),
(231, 'FSSD-A0051', 'Johin Shoyu Dressing Sauce 5 Liter (5L x 2B)', 'ขวด', '', '', 1),
(232, 'FSSE-00051', 'Johin Seasonning Sauce 0.005 Kg', 'ซอง', '', '', 1),
(233, 'FSSE-00081', 'Johin Seasoning sauce 0.008 Kg', 'ซอง', '', '', 1),
(234, 'FSSU-00051', 'Johin Sushi Soy Sauce 0.005 kg', 'ซอง', '', '', 1),
(235, 'FSSU-02001', 'Johin Sushi Soy Sauce 200 ml', 'ขวด', '', '', 1),
(236, 'FSSU-A0052', 'Johin Sushi Soy Sauce 5 L (T)', 'ขวด', '', '', 1),
(237, 'FSSU-A0101', 'Johin Sushi Soy Sauce (No.1 ) 10 Liter', 'ขวด', '', '', 1),
(238, 'FSSU-A0181', 'Johin Sushi Soy Sauce No.1 18 C', 'ปี๊บ', '', '', 1),
(239, 'FSSW-02001', 'Organic Sweet and Sour Sauce 200ml(6 Bottles) - La Du Riz Companige', 'ขวด', '', '', 1),
(240, 'FSTA-03001', 'Johin Tamari Soy Sauce (M) 300 ml', 'ขวด', '', '', 1),
(241, 'FSTA-07001', 'Johin Tamari Soy Sauce (M) 700 ml', 'ขวด', '', '', 1),
(242, 'FSTA-10001', 'Johin Tamari Soy Sauce 1 Liter', 'ขวด', '', '', 1),
(243, 'FSTA-A0051', 'Johin Tamari Soy Sauce (M) 5 Liters', 'ขวด', '', '', 1),
(244, 'FSTA-A0052', 'Johin Tamari No.1 Soy Sauce 5 Liter (5L x 4 B)', 'ขวด', '', '', 1),
(245, 'FSTA-A0103', 'Johin Tamari Soy Sauce 10 Liter ( KAMEDA-STC )', 'ขวด', '', '', 1),
(246, 'FSTA-A0104', 'Johin Tamari Soy Sauce (No SSA) 10 Liter', 'ขวด', '', '', 1),
(247, 'FSTA-A0105', 'Johin Tamari Thai Nichi 10 L x 2', 'ขวด', '', '', 1),
(248, 'FSTA-A0181', 'JOHIN TAMARI Thai - Nichi 18 C (RM-LF-004)', 'ปี๊บ', '', '', 1),
(249, 'FSTA-A0184', 'JOHIN GLUTEN FREE TAMARI SOY SUACE FOR Thai - Nichi 18 C (RM-LF-005-9)', 'ปี๊บ', '', '', 1),
(250, 'FSTA-K0001', 'Johin tamari soy sauce for Thai Nichi 1000L', 'ลิตร', '', '', 1),
(251, 'FSTA-K0002', 'Johin Tamari Soy Sauce No.1 for Thai nichi 1000L(RL-LQ-018-1)', 'ลิตร', '', '', 1),
(252, 'FSTD-02001', 'Organic Tandoori Marinade Sauce 200ml(6 Bottles) - La Du Riz Companige', 'ขวด', '', '', 1),
(253, 'FSTE-02003', 'Organic Teriyaki sauce 200ml (12 bottles) - BIO TIGER KHAN', 'ขวด', '', '', 1),
(254, 'FSTE-02004', 'Organic Teriyaki sauce 200ml(12 bottles)- PB Farm', 'ขวด', '', '', 1),
(255, 'FSTE-02005', 'Organic Fairtrade marinade Teriyaki sauce 200 ml (6 bottles) L\'Asie Brand', 'ขวด', '', '', 1),
(256, 'FSTE-02006', 'Organic Teriyaki sauce 200ml (12 bottles)-Asian Organic', 'ขวด', '', '', 1),
(257, 'FSTE-02007', 'Organic Teriyaki sauce 200ml(6 bottles)- PB Farm', 'ขวด', '', '', 1),
(258, 'FSTE-02008', 'Organic Teriyaki sauce 200 ml(6 bottles)-PB Farm ( English Version)', 'ขวด', '', '', 1),
(259, 'FSTE-02009', 'Organic Teriyaki sauce 200 ml(6 bottles)-PB Farm ( New)', 'ขวด', '', '', 1),
(260, 'FSTE-02010', 'Organic Teriyaki sauce 200ml (6 bottles)-PB Farm (English version with Hebrew)', 'ขวด', '', '', 1),
(261, 'FSTE-06001', 'Organic Teriyaki sauce 600ml -Asian organic Brand', 'ขวด', '', '', 1),
(262, 'FSTE-10001', 'Johin Organic Teriyaki sauce 1000 ml x 6 - Johin Brand', 'ขวด', '', '', 1),
(263, 'FSTE-A0051', 'TERITAKI MARINADE 5P(T)', 'ขวด', '', '', 1),
(264, 'FSTE-A0102', 'Johin Gluten Free Teriyaki Sauce 10 L', 'ขวด', '', '', 1),
(265, 'FSTE-A0181', 'Johin Premium Terriyaki Soy Sauce 18 C', 'ปี๊บ', '', '', 1),
(266, 'FSTO-A0182', 'Johin Tonkatsu Sauce No.2 18L', 'ปี๊บ', '', '', 1),
(267, 'FSTV-02001', 'Organic Thai Vinaigrette sauce 200ml(6bottle)-La Du Riz Companige', 'ขวด', '', '', 1),
(268, 'FSVF-02001', 'Vegan Fish Sauce 200ml x12 Mei Yang Brand', 'ขวด', '', '', 1),
(269, 'FSVF-10001', 'Vegan Fish Sauce 1000ml x6 Mei Yang Brand', 'ขวด', '', '', 1),
(270, 'FSYA-A0181', 'Johin Yakiniku Apple Sauce 18 C', 'ปี๊บ', '', '', 1),
(271, 'FVOR-02001', 'Organic Rice Vinegar 200 CC', 'ขวด', '', '', 1),
(272, 'FVOR-02003', 'Organic Rice Vinegar 200 ml (12 Bottles) - PB Farm', 'ขวด', '', '', 1),
(273, 'FVOR-02004', 'Organic Rice Vinegar 200 ml (12 Bottles) - Philipines', 'ขวด', '', '', 1),
(274, 'FVOR-02005', 'Organic Rice Vinegar 200 ml (12 Bottles) - PB Farm( Apple\'s Island)', 'ขวด', '', '', 1),
(275, 'FVOR-02006', 'Organic rice vinegar 200 ml x 12 -Asian organic Brand', 'ขวด', '', '', 1),
(276, 'FVOR-02007', 'Organic rice vinegar 200ml (12 bottles) - BIO TIGER KHAN', 'ขวด', '', '', 1),
(277, 'FVOR-02008', 'Organic Black Vinegar Sauce 200 ml (12 bottles)-Asian organic', 'ขวด', '', '', 1),
(278, 'FVOR-02009', 'Organic Rice vinegar 200 ml (6 bottles) - PB Farm', 'ขวด', '', '', 1),
(279, 'FVOR-02010', 'Organic Jasmine Hom Mali Rice vinegar 200 ml (12 bottles) - Fair D Brand (Grace Bio)', 'ขวด', '', '', 1),
(280, 'FVOR-02011', 'Organic Rice Vinegar 200 ml (6Bottles) - PB Farm ( English Version)', 'ขวด', '', '', 1),
(281, 'FVOR-02012', 'Organic Rice Vinegar 200 ml (6 bottles) - PB Farm (New)', 'ขวด', '', '', 1),
(282, 'FVOR-02013', 'Organic Black Rice Vinegar Sauce 200 ml (6 bottles) - PB Farm (New)', 'ขวด', '', '', 1),
(283, 'FVOR-02014', 'Organic rice vinegar 200 ml x 6 -Asian organic Brand', 'ขวด', '', '', 1),
(284, 'FVOR-02015', 'Organic Rice vinegar 5.0 % 200ml (6 bottles) - RECENES BIO BRAND', 'ขวด', '', '', 1),
(285, 'FVOR-02016', 'Organic rice vinegar 200ml (6 bottles)-PB Farm (English version with Hebrew)', 'ขวด', '', '', 1),
(286, 'FVOR-03001', 'Organic Fairtrade Rice Vinegar 5% 310ml(6 bottles)-L\' Aise Brand', 'ขวด', '', '', 1),
(287, 'FVOR-06001', 'Organic Rice Vinegar 600 ml (12 Bottles) - Philipines', 'ขวด', '', '', 1),
(288, 'FVOR-06002', 'Organic Rice Vinegar 600 ml (12 Bottles) - PB Farm( Apple\'s Island)', 'ขวด', '', '', 1),
(289, 'FVOR-06003', 'Organic rice vinegar 600 ml x 12 -Asian organic Brand', 'ขวด', '', '', 1),
(290, 'FVOR-06005', 'Organic Fairtrade rice vinegar 5% 600ml x 6- La Du rize brand', 'ขวด', '', '', 1),
(291, 'FVOR-07002', 'Organic Rice Vinegar (Clear style) 700 CC', 'ขวด', '', '', 1),
(292, 'FVOR-10001', 'Organic Rice Vinegar 1 Liter', 'ขวด', '', '', 1),
(293, 'FVOR-A0051', 'Organic Rice Vinegar 5 L x 2 Bottle', 'ขวด', '', '', 1),
(294, 'FVOR-A0052', 'Organic Rice Vinegar 5L (5L x 4B)', 'ขวด', '', '', 1),
(295, 'FVOR-A0053', 'Organic Rice Vinegar 5L (5L x 2B) PB Farm', 'ขวด', '', '', 1),
(296, 'FVOR-A0101', 'Organic Rice Vinegar 10 L', 'ขวด', '', '', 1),
(297, 'FVOR-A0102', 'Organic Fair Trade Rice Vinegar 10 L', 'ขวด', '', '', 1),
(298, 'FVOR-A0103', 'Raw Organic Fair Trade Rice Vinegar 10 L', 'ขวด', '', '', 1),
(299, 'FVOR-A2001', 'Organic Rice Vinegar 200 Liters', 'ลิตร', '', '', 1),
(300, 'FVOR-K0001', 'Organic Fairtrade Rice vinegar 5% 1,000 L -Autour La Du Riz Brand', 'ลิตร', '', '', 1),
(301, 'FVRI-02001', 'Shizen Jasmine rice vinegar 200 ml x12', 'ขวด', '', '', 1),
(302, 'FVSV-02002', 'Organic Sushi vinegar 200ml x 6 - La Autour Du Riz brand', 'ขวด', '', '', 1),
(303, 'FVSV-02001', 'Organic Sushi vinegar 200ml x 6 - NOAD brand', 'ขวด', '', '', 1),
(304, 'FCLC-A0186', 'Johin Light Soy Sauce 18C (CHOLIMEX)', 'ขวด', '', '', 1),
(305, 'FVOR-A2002', 'Organic Fair Trade Rice Vinegar 5% -200L La Compagnie du riz', 'ถัง', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `raw_sauce`
--

CREATE TABLE `raw_sauce` (
  `id` int(11) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `reccord_date` date DEFAULT NULL,
  `tank_id` int(11) DEFAULT NULL,
  `simple_id` int(11) DEFAULT NULL,
  `ph` decimal(10,2) DEFAULT NULL,
  `nacl_t1` decimal(10,2) DEFAULT NULL,
  `nacl_t2` decimal(10,2) DEFAULT NULL,
  `nacl_t_avr` decimal(10,2) DEFAULT NULL,
  `nacl_p1` decimal(10,2) DEFAULT NULL,
  `nacl_p2` decimal(10,2) DEFAULT NULL,
  `nacl_p_avr` decimal(10,2) DEFAULT NULL,
  `tn_t1` decimal(10,2) DEFAULT NULL,
  `th_t2` decimal(10,2) DEFAULT NULL,
  `tn_t_avr` decimal(10,2) DEFAULT NULL,
  `tn_p1` decimal(10,2) DEFAULT NULL,
  `tn_p2` decimal(10,2) DEFAULT NULL,
  `th_p_avr` decimal(10,2) DEFAULT NULL,
  `cal` int(11) DEFAULT NULL,
  `alc_t` decimal(10,2) DEFAULT NULL,
  `alc_p` decimal(10,2) DEFAULT NULL,
  `ppm` decimal(10,2) DEFAULT NULL,
  `brix` decimal(10,2) DEFAULT NULL,
  `remask` text,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `simple`
--

CREATE TABLE `simple` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `simple`
--

INSERT INTO `simple` (`id`, `code`, `name`, `description`, `color`) VALUES
(1, 'KO', NULL, NULL, '#4F4A45'),
(2, 'LS', NULL, NULL, NULL),
(3, 'TA-R', NULL, NULL, NULL),
(4, 'LS-OR-FT', NULL, NULL, NULL),
(5, 'TA-OR', NULL, NULL, NULL),
(6, 'TA-OR-FT', NULL, NULL, NULL),
(7, 'TA', NULL, NULL, NULL),
(8, 'TAMARI', NULL, NULL, NULL),
(9, 'LS-R', NULL, NULL, NULL),
(10, 'LEES', 'ตะกอน', NULL, '#45474B');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'สถานะ',
  `color` varchar(45) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `color`) VALUES
(1, 'รอส่ง', '#279EFF'),
(2, 'เลื่อนส่ง', '#ED7D31'),
(3, 'ส่งแล้ว', '#005B41'),
(4, 'ยกเลิก', '#C51605');

-- --------------------------------------------------------

--
-- Table structure for table `tank`
--

CREATE TABLE `tank` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tank`
--

INSERT INTO `tank` (`id`, `code`, `name`, `description`, `color`) VALUES
(1, 'S01', NULL, NULL, '#0C356A'),
(2, 'S02', NULL, NULL, '#0174BE'),
(3, 'S03', NULL, NULL, '#FFC436'),
(4, 'S04', NULL, NULL, '#86A789'),
(5, 'S05', NULL, NULL, '#B2C8BA'),
(6, 'S06', NULL, NULL, '#3D30A2'),
(7, 'S07', NULL, NULL, '#B15EFF'),
(8, 'S08', NULL, NULL, '#F4BF96'),
(9, 'S09', NULL, NULL, '#CE5A67'),
(10, 'S10', NULL, NULL, '#6C5F5B');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL COMMENT 'USERNAME',
  `password_hash` varchar(255) DEFAULT NULL COMMENT 'PASSWORD',
  `email` varchar(255) DEFAULT NULL COMMENT 'EMAIL',
  `english_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อ-สกุล (อังกฤษ)',
  `thai_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อ-สกุล (ไทย)',
  `phone` varchar(45) DEFAULT NULL COMMENT 'เบอร์ติดต่อ',
  `active` int(11) DEFAULT NULL COMMENT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `email`, `english_name`, `thai_name`, `phone`, `active`) VALUES
(1, 'tawatchai', 'tawatchai', 'tawatchai@email.com', 'Tawatchai', 'ธวัชชัย', NULL, 1),
(2, 'suphat', 'suphat', 'suphat@email.com', 'Suphat', 'สุุพัฒน์', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_users1_idx` (`users_id`),
  ADD KEY `fk_orders_payment_term1_idx` (`payment_term`),
  ADD KEY `fk_orders_customers1_idx` (`customer_id`),
  ADD KEY `fk_orders_paid_status1_idx` (`paid_status`);

--
-- Indexes for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_has_products_products1_idx` (`products_id`),
  ADD KEY `fk_orders_has_products_orders1_idx` (`orders_id`),
  ADD KEY `fk_orders_item_status1_idx` (`status_id`);

--
-- Indexes for table `paid_status`
--
ALTER TABLE `paid_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_term`
--
ALTER TABLE `payment_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_sauce`
--
ALTER TABLE `raw_sauce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simple`
--
ALTER TABLE `simple`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tank`
--
ALTER TABLE `tank`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paid_status`
--
ALTER TABLE `paid_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_term`
--
ALTER TABLE `payment_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `raw_sauce`
--
ALTER TABLE `raw_sauce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simple`
--
ALTER TABLE `simple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tank`
--
ALTER TABLE `tank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_customers1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_paid_status1` FOREIGN KEY (`paid_status`) REFERENCES `paid_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_payment_term1` FOREIGN KEY (`payment_term`) REFERENCES `payment_term` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD CONSTRAINT `fk_orders_has_products_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_has_products_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_item_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
