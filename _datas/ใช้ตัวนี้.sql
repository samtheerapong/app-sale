-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2023 at 09:54 AM
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
-- Database: `nfc-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto_number`
--

CREATE TABLE `auto_number` (
  `group` varchar(32) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `optimistic_lock` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auto_number`
--

INSERT INTO `auto_number` (`group`, `number`, `optimistic_lock`, `update_time`) VALUES
('MRM-6611-????', 3, 1, 1699955204),
('RP-6611-????', 7, 1, 1699838479);

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
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL COMMENT 'รหัส',
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อแผนก',
  `detail` text COMMENT 'รายละเอียด',
  `department_head` int(11) DEFAULT NULL COMMENT 'หัวหน้าแผนก',
  `color` varchar(255) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `code`, `name`, `detail`, `department_head`, `color`) VALUES
(1, 'GR', 'ทั่วไป', NULL, 11, '#379237'),
(2, 'AC', 'แผนกบัญชี (Account )', NULL, 22, '#425F57'),
(3, 'HR', 'แผนกบุคคล (Human Resources)', NULL, 20, '#379237'),
(4, 'PD', 'ฝ่ายผลิต (Production)', NULL, 29, '#C21010'),
(5, 'PC', 'แผนกจัดซื้อ (Purchasing)', NULL, 27, '#FF8787'),
(6, 'EN', 'แผนกวิศวกรรม (Engineer)', NULL, 24, '#872341'),
(7, 'PN', 'ฝ่ายวางแผนและควบคุมการผลิต (Planning)', NULL, 15, '#ED5AB3'),
(8, 'QC', 'แผนกควบคุมคุณภาพ (Quality Control)', NULL, 4, '#EC8F5E'),
(9, 'QA', 'แผนกประกันคุณภาพ (Quality Assurance)', NULL, 4, '#F3B664'),
(10, 'RD', 'แผนกวิจัยและพัฒนาผลิตภัณฑ์ (R&D)', NULL, 26, '#2E97A7'),
(11, 'WH', 'แผนกคลังสินค้า (Ware House)', NULL, 15, '#B0578D'),
(12, 'IT', 'แผนกไอที (IT)', NULL, 12, '#186F65'),
(13, 'SA', 'ฝ่ายขาย (Sale)', NULL, 6, '#C70039'),
(14, 'SP', 'สนับสนุน (Support)', NULL, 9, '#219C90');

-- --------------------------------------------------------

--
-- Table structure for table `job_status`
--

CREATE TABLE `job_status` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_status`
--

INSERT INTO `job_status` (`id`, `code`, `name`, `detail`, `color`) VALUES
(1, 'Request', 'แจ้งงาน', 'แจ้งงานโดยผู้ใช้งาน', '#952323'),
(2, 'Approved-D', 'หัวหน้างานอนุมัติ', 'หัวหน้างานอนุมัติ', '#0000ff'),
(3, 'Engineering', 'รออนุมัติเข้าซ่อม', 'อยู่ในขั้นตอนขออนุมัติซ่อมของแผนกวิศวกรรม', '#9900ff'),
(4, 'Approved-E', 'ดำเนินการซ่อม', 'ผู้จัดการแผนกวิศวกรรมอนุมัติ', '#ff9900'),
(5, 'Success', 'ปิดงาน', 'งานซ่อมสำเร็จ ปิดงาน', '#274e13'),
(6, 'Postponed', 'เลื่อน', 'เลื่อนการซ่อมออกไป', '#ff00ff'),
(7, 'Canceled', 'ยกเลิก', 'ยกเลิกโดยผู้ใช้งาน', '#434343');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL COMMENT 'รหัส',
  `name` varchar(255) NOT NULL COMMENT 'ชื่อ',
  `detail` text COMMENT 'รายละเอียด',
  `color` varchar(255) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `code`, `name`, `detail`, `color`) VALUES
(1, 'B1', 'B1', NULL, NULL),
(2, 'B2', 'B2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m130524_201442_init', 1699339433),
('m140209_132017_init', 1699340426),
('m140403_174025_create_account_table', 1699339569),
('m140504_113157_update_tables', 1699339569),
('m140504_130429_create_token_table', 1699339570),
('m140506_102106_rbac_init', 1699339963),
('m140830_171933_fix_ip_field', 1699339570),
('m140830_172703_change_account_table_name', 1699339570),
('m141222_110026_update_ip_field', 1699339570),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1699339963),
('m180523_151638_rbac_updates_indexes_without_prefix', 1699339963),
('m190124_110200_add_verification_token_column_to_user_table', 1699339433),
('m200409_110543_rbac_update_mssql_trigger', 1699339963),
('m231107_015704_create_user_profile', 1699328910);

-- --------------------------------------------------------

--
-- Table structure for table `moromi`
--

CREATE TABLE `moromi` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `batch_no` varchar(45) DEFAULT NULL,
  `shikomi_date` date DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `tank_source` int(11) DEFAULT NULL,
  `tank_destination` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moromi`
--

INSERT INTO `moromi` (`id`, `code`, `batch_no`, `shikomi_date`, `transfer_date`, `tank_source`, `tank_destination`, `type_id`, `status_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'MRM-6611-0001', '2463', '2022-03-13', '2022-04-26', 2, 9, 5, 2, '2023-11-14', '2023-11-14', 1, 1),
(2, 'MRM-6611-0002', '2492', '2022-06-29', '2022-07-05', 3, 18, 5, 2, '2023-11-14', '2023-11-14', 1, 1),
(3, 'MRM-6611-0003', '2510', '2022-08-25', '2022-09-07', 4, 24, 3, 2, '2023-11-14', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `moromi_list`
--

CREATE TABLE `moromi_list` (
  `id` int(11) NOT NULL,
  `moromi_id` int(11) NOT NULL,
  `record_date` date DEFAULT NULL,
  `memo_list` int(11) DEFAULT NULL,
  `ph` decimal(10,2) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `nacl` decimal(10,2) DEFAULT NULL,
  `tn` decimal(10,2) DEFAULT NULL,
  `alcohol` decimal(10,2) DEFAULT NULL,
  `turbidity` decimal(10,2) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moromi_list`
--

INSERT INTO `moromi_list` (`id`, `moromi_id`, `record_date`, `memo_list`, `ph`, `color`, `nacl`, `tn`, `alcohol`, `turbidity`, `note`) VALUES
(1, 1, '2022-03-21', 5, '4.42', 45, '16.44', NULL, NULL, NULL, ''),
(2, 1, '2022-04-02', 2, '4.32', NULL, NULL, NULL, NULL, NULL, ''),
(3, 1, '2022-04-12', 7, '4.37', 45, '15.86', '1.17', '0.05', NULL, ''),
(4, 1, '2022-05-14', 8, '4.37', 41, '15.80', '1.32', '0.38', NULL, ''),
(5, 1, '2022-05-13', 9, '4.39', 45, '15.66', '1.40', '0.75', NULL, ''),
(6, 1, '2022-07-17', 10, '4.64', 37, '16.46', '1.76', '1.07', NULL, ''),
(7, 1, '2022-08-13', 11, '4.36', 39, '15.79', '1.50', '0.87', NULL, ''),
(8, 1, '2022-09-13', 12, '4.39', 37, '15.53', '1.47', '0.87', NULL, ''),
(9, 1, '2022-10-13', 13, '4.35', 33, NULL, NULL, NULL, NULL, ''),
(10, 1, '2022-10-20', 3, '4.34', 29, '15.81', '1.55', '0.82', NULL, ''),
(11, 1, '2022-10-20', 4, NULL, NULL, '6.73', '0.64', NULL, NULL, ''),
(12, 1, '2022-11-14', 14, '4.36', 33, NULL, NULL, NULL, NULL, ''),
(13, 1, '2022-12-13', 15, '4.39', 29, NULL, NULL, NULL, NULL, ''),
(14, 1, '2023-01-13', 16, '4.37', 27, NULL, NULL, NULL, NULL, ''),
(15, 1, '2023-02-13', 17, '4.43', 27, NULL, NULL, NULL, '422.00', ''),
(16, 1, '2023-02-27', 3, '4.40', 27, '15.83', '1.64', '0.91', NULL, ''),
(17, 1, '2023-02-27', 4, NULL, NULL, '5.99', '0.56', NULL, NULL, ''),
(18, 1, '2023-03-13', 18, '4.45', 27, NULL, NULL, NULL, '654.00', ''),
(21, 2, '2022-06-29', 5, '5.34', 45, '16.87', NULL, NULL, NULL, ''),
(22, 2, '2022-07-02', 2, '5.18', NULL, NULL, NULL, NULL, NULL, ''),
(23, 2, '2022-07-23', 7, '4.50', 41, '15.86', '1.86', '0.60', NULL, ''),
(24, 2, '2022-08-23', 8, '4.51', 41, '16.29', '1.94', '0.76', NULL, ''),
(25, 2, '2022-09-23', 9, '4.47', 37, '16.34', '1.97', '0.70', NULL, ''),
(26, 2, '2022-10-22', 10, '4.39', 37, '16.52', '1.94', '0.95', NULL, ''),
(27, 2, '2022-11-17', 19, NULL, NULL, NULL, NULL, NULL, NULL, 'T17 = 19,880 lit'),
(28, 2, '2022-11-24', 11, '4.44', 29, '16.47', '2.01', '0.99', NULL, ''),
(29, 2, '2022-12-23', 12, '4.42', 33, '16.34', '2.01', '1.15', NULL, ''),
(30, 2, '2023-01-23', 13, '4.51', 33, NULL, NULL, NULL, '179.00', ''),
(31, 2, '2023-02-23', 14, '4.39', 29, NULL, NULL, NULL, NULL, ''),
(32, 2, '2023-02-25', 3, '5.37', 49, '16.34', '2.02', '2.00', NULL, 'ไม่ได้ลง rtTPC'),
(33, 2, '2023-02-25', 4, NULL, NULL, '6.09', '0.77', NULL, NULL, ''),
(34, 2, '2023-03-23', 15, '4.48', 29, NULL, NULL, NULL, '934.00', ''),
(35, 3, '2023-08-27', 2, '5.09', NULL, NULL, NULL, NULL, NULL, ''),
(36, 3, '2023-09-10', 5, '4.86', 53, '17.26', NULL, NULL, NULL, ''),
(37, 3, '2023-09-05', 19, NULL, NULL, NULL, NULL, NULL, NULL, 'ปั๊ม Moromi Tank  A (B.2511)');

-- --------------------------------------------------------

--
-- Table structure for table `moromi_list_memo`
--

CREATE TABLE `moromi_list_memo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `detail` text,
  `color` varchar(45) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moromi_list_memo`
--

INSERT INTO `moromi_list_memo` (`id`, `name`, `detail`, `color`, `active`) VALUES
(1, 'ก่อนเติม S-yeast', '', '#F875AA', 1),
(2, 'หลังเติม S-yeast', '', '#872341', 1),
(3, 'ก่อนคั้น กรอง', '', '#ED7D31', 1),
(4, 'ก่อนคั้น ปั่น', '', '#4F4A45', 1),
(5, '7 วัน', '', '#72d572', 1),
(6, '10 วัน', '', '#72d572', 1),
(7, '1 เดือน', '', '#259b24', 1),
(8, '2 เดือน', '', '#0a8f08', 1),
(9, '3 เดือน', NULL, '#0a7e07', 1),
(10, '4 เดือน', NULL, '#056f00', 1),
(11, '5 เดือน', NULL, '#0d5302', 1),
(12, '6 เดือน', NULL, '#009688', 1),
(13, '7 เดือน', NULL, '#00897b', 1),
(14, '8 เดือน', NULL, '#00796b', 1),
(15, '9 เดือน', NULL, '#00695c', 1),
(16, '10 เดือน', NULL, '#004d40', 1),
(17, '11 เดือน', NULL, '#0277bd', 1),
(18, '12 เดือน', NULL, '#01579b', 1),
(19, 'ปั๊มจากถังอื่นมาใส่', '', '#FE0000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `moromi_status`
--

CREATE TABLE `moromi_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `detail` text,
  `color` varchar(45) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moromi_status`
--

INSERT INTO `moromi_status` (`id`, `name`, `detail`, `color`, `active`) VALUES
(1, 'ดำเนินการ', 'ดำเนินการ', '#FE0000', 1),
(2, 'เสร็จสิ้น', 'เสร็จสิ้น', '#005B41', 1);

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
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `po_no` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `po_no`, `description`) VALUES
(1, 55, '55'),
(2, 222, '2222');

-- --------------------------------------------------------

--
-- Table structure for table `po_item`
--

CREATE TABLE `po_item` (
  `id` int(11) NOT NULL,
  `po_item_no` varchar(10) NOT NULL,
  `quantity` double NOT NULL,
  `po_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `po_item`
--

INSERT INTO `po_item` (`id`, `po_item_no`, `quantity`, `po_id`) VALUES
(1, 'qqq', 1, 1),
(2, '2', 2, 2),
(3, '22', 22, 2),
(4, '222', 222, 2);

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`id`, `code`, `name`, `detail`, `color`) VALUES
(1, 'Low', 'ต่ำ', 'Low', '#1AACAC'),
(2, 'MID', 'กลาง', 'medium', '#005B41'),
(3, 'HIGHT', 'สำคัญมาก', NULL, '#FE0000');

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
  `batch` varchar(255) DEFAULT NULL,
  `reccord_date` date DEFAULT NULL,
  `tank_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
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
  `tn_p_avr` decimal(10,2) DEFAULT NULL,
  `col` int(11) DEFAULT NULL,
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

--
-- Dumping data for table `raw_sauce`
--

INSERT INTO `raw_sauce` (`id`, `batch`, `reccord_date`, `tank_id`, `type_id`, `ph`, `nacl_t1`, `nacl_t2`, `nacl_t_avr`, `nacl_p1`, `nacl_p2`, `nacl_p_avr`, `tn_t1`, `th_t2`, `tn_t_avr`, `tn_p1`, `tn_p2`, `tn_p_avr`, `col`, `alc_t`, `alc_p`, `ppm`, `brix`, `remask`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, NULL, '2023-01-03', 9, 1, '4.64', '8.30', '8.35', '8.33', '16.85', '16.95', '16.90', '7.40', '7.40', '7.40', '1.66', '1.66', '1.66', 33, '16.85', '0.73', NULL, NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(2, NULL, '2023-01-04', 10, 1, '4.59', '8.20', '8.20', '8.20', '16.95', '16.95', '16.95', '7.35', '7.35', '7.35', '1.67', '1.67', '1.67', 33, '17.30', '0.63', NULL, NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(3, NULL, '2023-01-04', 7, 1, '4.59', '8.20', '8.25', '8.23', '16.65', '16.75', '16.70', '7.50', '7.35', '7.43', '1.65', '1.67', '1.66', 33, '16.65', '0.78', NULL, NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(4, NULL, '2023-01-05', 6, 1, '4.58', '8.45', '8.50', '8.48', '17.15', '17.26', '17.21', '7.40', '7.55', '7.48', '1.66', '1.64', '1.65', 37, '16.65', '0.78', NULL, NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(5, NULL, '2023-01-06', 10, 1, '4.36', '8.15', '8.15', '8.15', '16.54', '16.54', '16.54', '9.75', '9.85', '9.80', '1.33', '1.31', '1.32', 33, '16.85', '0.80', NULL, NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(6, NULL, '2023-01-07', 7, 1, '4.56', '8.40', '8.50', '8.45', '17.05', '17.26', '17.16', '7.40', '7.40', '7.40', '1.67', '1.67', '1.67', 37, '15.45', '1.12', NULL, NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(7, NULL, '2023-01-09', 8, 1, '4.62', '8.35', '8.35', '8.35', '16.95', '16.95', '16.95', '7.20', '7.35', '7.28', '1.68', '1.66', '1.67', 37, '15.20', '1.17', NULL, NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(8, NULL, '2023-01-11', 6, 1, '4.57', '8.45', '8.50', '8.48', '17.15', '17.26', '17.21', '7.15', '7.20', '7.18', '1.70', '1.68', '1.69', 37, '15.05', '1.21', NULL, NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(9, NULL, '2023-01-16', 8, 1, '4.57', '8.40', '8.40', '8.40', '17.05', '17.05', '17.05', '7.40', '7.55', '7.48', '1.68', '1.65', '1.67', 37, '15.50', '1.10', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(10, NULL, '2023-01-17', 7, 1, '4.96', '8.70', '8.70', '8.70', '17.66', '17.66', '17.66', '7.50', '7.35', '7.43', '1.66', '1.68', '1.67', 37, '14.20', '1.40', '668.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(11, NULL, '2023-01-18', 6, 1, '4.98', '8.85', '8.85', '8.85', '17.97', '17.97', '17.97', '7.20', '7.35', '7.28', '1.70', '1.68', '1.69', 37, '13.85', '1.48', '651.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(12, NULL, '2023-01-19', 8, 1, '4.63', '8.75', '8.75', '8.75', '17.76', '17.76', '17.76', '7.60', '7.70', '7.65', '1.64', '1.62', '1.63', 37, '16.20', '0.95', '578.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(13, NULL, '2023-01-20', 7, 1, '4.57', '8.75', '8.70', '8.73', '17.76', '17.86', '17.81', '7.40', '7.55', '7.48', '1.66', '1.64', '1.65', 39, '16.30', '0.93', '718.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(14, NULL, '2023-01-21', 6, 1, '4.57', '8.30', '8.25', '8.28', '16.85', '16.75', '16.80', '6.70', '6.65', '6.68', '1.76', '1.77', '1.77', 37, '14.85', '1.25', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(15, NULL, '2023-01-26', 7, 1, '4.59', '8.30', '8.20', '8.25', '16.85', '16.65', '16.75', '6.50', '6.50', '6.50', '1.79', '1.79', '1.79', 35, '14.60', '1.31', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(16, NULL, '2023-10-28', 6, 1, '4.89', '8.15', '8.20', '8.18', '16.54', '16.65', '16.60', '6.90', '6.90', '6.90', '1.73', '1.73', '1.73', 33, '14.20', '1.40', '780.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(17, NULL, '2023-10-28', 8, 1, '4.90', '8.45', '8.45', '8.45', '17.15', '17.15', '17.15', '6.85', '6.85', '6.85', '1.73', '1.73', '1.73', 33, '13.75', '1.50', '667.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(18, NULL, '2023-01-30', 8, 1, '4.95', '8.60', '8.65', '8.63', '17.46', '17.56', '17.51', '6.90', '6.75', '6.83', '1.73', '1.76', '1.75', 33, '14.05', '1.43', '663.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(19, NULL, '2023-01-31', 7, 1, '4.87', '8.45', '8.50', '8.48', '17.15', '17.26', '17.21', '6.90', '6.75', '6.83', '1.74', '1.76', '1.75', 33, '14.45', '1.34', '856.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(20, NULL, '2023-02-02', 6, 1, '5.10', '8.65', '8.60', '8.63', '17.56', '17.46', '17.51', '6.85', '6.85', '6.85', '1.75', '1.75', '1.75', 35, '14.20', '1.32', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(21, NULL, '2023-02-03', 10, 1, '4.26', '8.20', '8.15', '8.18', '16.65', '16.54', '16.60', '9.80', '9.90', '9.85', '1.31', '1.30', '1.31', 37, '17.50', '0.56', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(22, NULL, '2023-02-04', 8, 1, '5.08', '8.55', '8.55', '8.55', '17.36', '17.36', '17.36', '6.80', '6.95', '6.88', '1.75', '1.73', '1.74', 33, '13.45', '1.50', '419.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(23, NULL, '2023-02-06', 7, 1, '5.10', '8.50', '8.60', '8.55', '17.26', '17.46', '17.36', '6.65', '6.70', '6.68', '1.78', '1.78', '1.78', 37, '12.90', '1.62', '579.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(24, NULL, '2023-02-07', 6, 1, '5.07', '8.50', '8.50', '8.50', '17.26', '17.26', '17.26', '6.95', '6.80', '6.88', '1.74', '1.76', '1.75', 35, '13.70', '1.44', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(25, NULL, '2023-02-08', 10, 1, '5.07', '8.60', '8.60', '8.60', '17.46', '17.46', '17.46', '6.70', '6.70', '6.70', '1.78', '1.78', '1.78', 33, '13.90', '1.39', '965.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(26, NULL, '2023-02-09', 8, 1, '5.13', '8.55', '8.60', '8.58', '17.36', '17.46', '17.41', '6.95', '7.10', '7.03', '1.74', '1.72', '1.73', 37, '13.50', '1.48', '509.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(27, NULL, '2023-02-10', 7, 1, '5.12', '8.45', '8.55', '8.50', '17.15', '17.36', '17.26', '6.95', '6.95', '6.95', '1.74', '1.74', '1.74', 37, '13.45', '1.50', '572.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(28, NULL, '2023-02-11', 6, 1, '5.16', '8.60', '8.50', '8.55', '17.46', '17.26', '17.36', '6.95', '7.05', '7.00', '1.74', '1.72', '1.73', 35, '5.70', '3.28', '637.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(29, NULL, '2023-02-11', 9, 1, '5.15', '8.60', '8.60', '8.60', '17.46', '17.46', '17.46', '7.05', '7.05', '7.05', '1.72', '1.72', '1.72', 37, '13.10', '1.58', '888.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(30, NULL, '2023-02-13', 8, 1, '5.13', '8.40', '8.40', '8.40', '17.05', '17.05', '17.05', '7.05', '7.05', '7.05', '1.72', '1.72', '1.72', 33, '11.40', '1.97', '886.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(31, NULL, '2023-02-13', 9, 1, '5.09', '8.45', '8.50', '8.48', '17.15', '17.26', '17.21', '7.10', '7.10', '7.10', '1.71', '1.71', '1.71', 37, '13.70', '1.44', '959.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(32, NULL, '2023-02-15', 6, 1, '5.05', '8.50', '8.55', '8.53', '17.26', '17.36', '17.31', '7.25', '7.25', '7.25', '1.70', '1.70', '1.70', 37, '14.10', '1.35', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(33, NULL, '2023-02-17', 6, 1, '5.01', '8.55', '8.50', '8.53', '17.36', '17.26', '17.31', '7.55', '7.55', '7.55', '1.65', '1.65', '1.65', 37, '14.25', '1.31', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(34, NULL, '2023-02-18', 9, 1, '5.08', '8.55', '8.55', '8.55', '17.36', '17.36', '17.36', '7.25', '7.30', '7.28', '1.70', '1.69', '1.70', 37, '12.50', '1.72', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(35, NULL, '2023-02-18', 10, 1, '5.03', '8.45', '8.50', '8.48', '17.15', '17.26', '17.21', '7.10', '6.95', '7.03', '1.72', '1.74', '1.73', 37, '12.60', '1.69', '856.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(36, NULL, '2023-02-20', 8, 1, '4.77', '8.40', '8.50', '8.45', '17.05', '17.26', '17.16', '7.05', '7.05', '7.05', '1.72', '1.72', '1.72', 37, '15.25', '1.08', '750.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(37, NULL, '2023-02-22', 10, 1, '4.77', '8.35', '8.35', '8.35', '16.95', '16.95', '16.95', '7.15', '7.25', '7.20', '1.71', '1.70', '1.71', 37, '15.10', '1.12', '394.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(38, NULL, '2023-02-23', 8, 1, '4.67', '8.30', '8.35', '8.33', '16.85', '16.95', '16.90', '8.60', '8.75', '8.68', '1.50', '1.48', '1.49', 41, '14.95', '1.15', '358.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(39, NULL, '2023-03-02', 9, 1, '4.68', '8.45', '8.40', '8.43', '17.10', '17.00', '17.05', '8.50', '8.50', '8.50', '1.50', '1.50', '1.50', 41, '15.00', '1.14', '427.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(40, NULL, '2023-03-03', 10, 1, '4.76', '8.45', '8.50', '8.48', '17.10', '17.20', '17.15', '8.15', '8.20', '8.18', '1.56', '1.55', '1.56', 37, '14.10', '1.35', '1.54', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(41, NULL, '2023-03-04', 9, 1, '4.71', '8.30', '8.35', '8.33', '16.90', '16.80', '16.85', '8.80', '8.65', '8.73', '1.46', '1.48', '1.47', 41, '11.95', '1.84', '489.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(42, NULL, '2023-03-08', 10, 1, '4.80', '8.40', '8.45', '8.43', '17.00', '17.10', '17.05', '7.60', '7.60', '7.60', '1.64', '1.64', '1.64', 37, '13.35', '1.52', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(43, NULL, '2023-03-09', 6, 1, '4.85', '8.50', '8.50', '8.50', '17.20', '17.20', '17.20', '7.35', '7.35', '7.35', '1.68', '1.68', '1.68', 37, '14.40', '1.28', '924.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(44, NULL, '2023-03-09', 10, 1, '4.72', '8.25', '8.30', '8.28', '16.70', '16.80', '16.75', '7.70', '7.70', '7.70', '1.62', '1.62', '1.62', 37, '11.06', '2.04', '932.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(45, NULL, '2023-03-11', 8, 1, '4.58', '8.20', '8.30', '8.25', '16.60', '16.80', '16.70', '8.15', '8.00', '8.08', '1.57', '1.59', '1.58', 37, '13.95', '1.38', '699.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(46, NULL, '2023-03-14', 8, 1, '4.62', '8.20', '8.25', '8.23', '16.60', '16.70', '16.65', '8.10', '8.10', '8.10', '1.57', '1.57', '1.57', 37, '13.95', '1.38', '514.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(47, NULL, '2023-03-16', 8, 1, '4.70', '8.35', '8.35', '8.35', '16.90', '16.90', '16.90', '8.65', '8.65', '8.65', '1.50', '1.50', '1.50', 37, '13.30', '1.55', '557.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(48, NULL, '2023-03-17', 6, 1, '4.73', '8.35', '8.30', '8.33', '16.90', '16.80', '16.85', '7.70', '7.85', '7.78', '1.64', '1.62', '1.63', 37, '13.25', '1.56', '519.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(49, NULL, '2023-03-17', 8, 1, '4.71', '8.40', '8.40', '8.40', '17.00', '17.00', '17.00', '7.60', '7.60', '7.60', '1.65', '1.65', '1.65', 37, '13.45', '1.51', '627.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(50, NULL, '2023-03-18', 9, 1, '4.66', '8.30', '8.35', '8.33', '16.80', '16.90', '16.85', '8.25', '8.25', '8.25', '1.56', '1.56', '1.56', 37, '13.40', '1.52', '502.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(51, NULL, '2023-03-20', 7, 1, '4.74', '8.40', '8.45', '8.43', '17.00', '17.10', '17.05', '7.60', '7.60', '7.60', '1.65', '1.65', '1.65', 37, '13.45', '1.52', '550.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(52, NULL, '2023-03-22', 7, 1, '4.77', '8.45', '8.45', '8.45', '17.10', '17.10', '17.10', '7.45', '7.45', '7.45', '1.65', '1.65', '1.65', 37, '12.50', '1.73', '692.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(53, NULL, '2023-03-27', 6, 1, '4.67', '8.45', '8.40', '8.43', '17.10', '17.00', '17.05', '7.65', '7.80', '7.73', '1.62', '1.60', '1.61', 37, '15.75', '1.45', '572.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(54, NULL, '2023-04-04', 8, 1, '4.67', '8.45', '8.50', '8.48', '17.10', '17.20', '17.15', '7.90', '7.90', '7.90', '1.60', '1.60', '1.60', 37, '13.10', '1.59', '874.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(55, NULL, '2023-04-17', 10, 1, '4.52', '7.95', '8.00', '7.98', '16.09', '16.19', '16.14', '7.55', '7.55', '7.55', '1.63', '1.63', '1.63', 27, '11.45', '1.97', '673.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(56, NULL, '2023-04-19', 7, 1, '4.63', '8.40', '8.45', '8.43', '17.00', '17.10', '17.05', '7.65', '7.80', '7.73', '1.60', '1.58', '1.59', 37, '13.65', '1.46', '540.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(57, NULL, '2023-04-22', 10, 1, '4.52', '7.95', '7.95', '7.95', '16.09', '16.09', '16.09', '7.20', '7.35', '7.28', '1.66', '1.64', '1.65', 29, '15.10', '1.15', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(58, NULL, '2023-04-25', 6, 1, '4.56', '8.50', '8.50', '8.50', '17.20', '17.31', '17.26', '8.30', '8.30', '8.30', '1.51', '1.51', '1.51', 37, '13.60', '1.48', '863.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(59, NULL, '2023-04-26', 8, 1, '4.58', '8.60', '8.55', '8.58', '17.41', '17.31', '17.36', '8.30', '8.30', '8.30', '1.51', '1.51', '1.51', 37, '13.70', '1.46', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(60, NULL, '2023-04-27', 7, 1, '4.65', '8.60', '8.65', '8.63', '17.41', '17.51', '17.46', '8.55', '8.55', '8.55', '1.49', '1.49', '1.49', 37, '14.00', '1.39', '907.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(61, NULL, '2023-04-28', 6, 1, '4.52', '8.55', '8.50', '8.53', '17.31', '17.20', '17.26', '9.00', '8.85', '8.93', '1.42', '1.44', '1.43', 41, '14.50', '1.27', '885.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(62, NULL, '2023-05-03', 7, 1, '4.58', '8.25', '8.30', '8.28', '16.70', '16.80', '16.75', '8.25', '8.25', '8.25', '1.52', '1.52', '1.52', 37, '13.55', '1.48', '726.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(63, NULL, '2023-05-04', 6, 1, '4.61', '8.45', '8.45', '8.45', '17.10', '17.10', '17.10', '8.35', '8.35', '8.35', '1.51', '1.51', '1.51', 37, '14.40', '1.28', '1008.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(64, NULL, '2023-05-08', 7, 1, '4.72', '7.65', '7.70', '7.68', '15.48', '15.58', '15.53', '6.95', '7.10', '7.03', '1.71', '1.69', '1.70', 33, '14.95', '1.15', NULL, NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(65, NULL, '2023-05-13', 6, 1, '4.73', '8.40', '8.45', '8.43', '17.00', '17.10', '17.05', '7.10', '7.25', '7.18', '1.69', '1.67', '1.68', 37, '14.00', '1.37', '228.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(66, NULL, '2023-05-15', 7, 1, '4.76', '8.50', '8.40', '8.45', '17.20', '17.00', '17.10', '7.10', '7.10', '7.10', '1.69', '1.69', '1.69', 37, '13.00', '1.60', '185.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(67, NULL, '2023-05-18', 10, 1, '4.76', '8.25', '8.25', '8.25', '16.70', '16.70', '16.70', '7.10', '7.10', '7.10', '1.67', '1.67', '1.67', 33, '13.15', '1.34', '226.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(68, NULL, '2023-05-19', 7, 1, '4.75', '8.50', '8.50', '8.50', '17.20', '17.20', '17.20', '7.25', '7.10', '7.18', '1.65', '1.67', '1.66', 37, '11.45', '1.96', '225.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(69, NULL, '2023-05-19', 8, 1, '4.75', '8.10', '8.05', '8.08', '16.39', '16.29', '16.34', '6.65', '6.65', '6.65', '1.74', '1.74', '1.74', 33, '16005.00', '0.90', '16.10', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(70, NULL, '2023-05-20', 7, 1, '4.78', '8.65', '8.65', '8.65', '17.47', '17.47', '17.47', '7.60', '7.75', '7.68', '1.60', '1.58', '1.59', 37, '13.85', '1.41', '14.90', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(71, NULL, '2023-05-22', 8, 1, '4.77', '8.65', '8.65', '8.65', '17.47', '17.47', '17.47', '7.75', '7.75', '7.75', '1.59', '1.59', '1.59', 37, '14.15', '1.34', '169.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(72, NULL, '2023-05-23', 7, 1, '4.80', '8.75', '8.75', '8.75', '16.78', '16.78', '16.78', '7.65', '7.80', '7.73', '1.62', '1.60', '1.61', 37, '13.55', '1.48', '286.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(73, NULL, '2023-05-24', 7, 1, '4.82', '8.60', '8.60', '8.60', '17.37', '17.37', '17.37', '5.55', '5.55', '5.55', '1.91', '1.91', '1.91', 37, '12.90', '1.23', '346.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(74, NULL, '2023-05-24', 8, 1, '4.82', '8.50', '8.50', '8.50', '17.17', '17.17', '17.17', '7.40', '7.40', '7.40', '1.64', '1.64', '1.64', 37, '10.30', '2.22', '387.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(75, NULL, '2023-05-25', 10, 1, '4.83', '8.60', '8.60', '8.60', '17.37', '17.37', '17.37', '7.20', '7.35', '7.28', '1.69', '1.66', '1.68', 35, '12.85', '1.64', '474.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(76, NULL, '2023-05-26', 8, 1, '4.83', '8.20', '8.20', '8.20', '16.56', '16.56', '16.56', '7.40', '7.25', '7.33', '1.66', '1.68', '1.67', 33, '13.90', '1.39', '542.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(77, NULL, '2023-05-26', 10, 1, '4.80', '8.65', '8.65', '8.65', '17.47', '17.47', '17.47', '7.40', '7.35', '7.38', '1.66', '1.66', '1.66', 37, '12.75', '1.66', '586.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(78, NULL, '2023-05-31', 10, 1, '4.52', '8.05', '8.05', '8.05', '16.26', '16.26', '16.26', '7.45', '7.45', '7.45', '1.65', '1.65', '1.65', 23, '14.60', '1.23', '908.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(79, NULL, '2023-06-06', 8, 1, '5.21', '8.60', '8.60', '8.60', '17.37', '17.37', '17.37', '6.45', '6.60', '6.53', '1.79', '1.77', '1.78', 29, '13.45', '1.50', '396.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(80, NULL, '2023-06-07', 9, 1, '4.92', '8.65', '8.65', '8.65', '17.47', '17.47', '17.47', '7.60', '7.50', '7.55', '1.64', '1.62', '1.63', 33, '13.60', '1.46', '468.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(81, NULL, '2023-06-07', 9, 1, '5.15', '8.55', '8.60', '8.58', '17.27', '17.37', '17.32', '6.30', '6.30', '6.30', '1.81', '1.81', '1.81', 29, '11.60', '1.93', '235.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(82, NULL, '2023-06-08', 8, 1, '5.18', '8.60', '8.60', '8.60', '17.37', '17.37', '17.37', '6.40', '6.55', '6.48', '1.80', '1.78', '1.79', 29, '12.35', '1.75', '258.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(83, NULL, '2023-06-09', 9, 1, '5.40', '8.55', '8.60', '8.58', '17.27', '17.37', '17.32', '6.60', '6.60', '6.60', '1.77', '1.77', '1.77', 29, '11.00', '2.06', '406.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(84, NULL, '2023-06-10', 6, 1, '5.24', '8.10', '8.10', '8.10', '16.36', '16.36', '16.36', '6.55', '6.55', '6.55', '1.78', '1.78', '1.78', 29, '13.65', '1.45', '371.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(85, NULL, '2023-06-11', 10, 1, '4.57', '8.10', '8.15', '8.13', '16.36', '16.46', '16.41', '7.35', '7.20', '7.28', '1.66', '1.69', '1.68', 19, '16.85', '0.71', '846.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(86, NULL, '2023-06-12', 8, 1, '5.11', '8.65', '8.65', '8.65', '17.47', '17.47', '17.47', '6.65', '6.50', '6.58', '1.77', '1.79', '1.78', 29, '11.95', '1.84', '425.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(87, NULL, '2023-06-13', 8, 1, '5.10', '8.65', '8.70', '8.68', '17.47', '17.57', '17.52', '6.50', '6.65', '6.58', '1.79', '1.77', '1.78', 29, '12.30', '1.76', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(88, NULL, '2023-06-13', 9, 1, '5.34', '8.70', '8.70', '8.70', '17.57', '17.57', '17.57', '6.50', '6.60', '6.55', '1.79', '1.78', '1.79', 33, '13.30', '1.53', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(89, NULL, '2023-06-14', 6, 1, '5.20', '8.50', '8.50', '8.50', '17.17', '17.17', '17.17', '6.65', '6.65', '6.65', '1.77', '1.77', '1.77', 33, '13.35', '1.52', '430.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(90, NULL, '2023-06-15', 9, 1, '5.32', '8.55', '8.60', '8.58', '17.27', '17.37', '17.32', '6.60', '6.60', '6.60', '1.77', '1.77', '1.77', 29, '13.00', '1.60', '510.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(91, NULL, '2023-06-16', 6, 1, '5.20', '8.25', '8.30', '8.28', '16.67', '16.77', '16.72', '6.55', '6.45', '6.50', '1.77', '1.80', '1.79', 29, '13.25', '1.54', '446.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(92, NULL, '2023-06-16', 9, 1, '5.08', '8.65', '8.60', '8.63', '17.47', '17.37', '17.42', '6.60', '6.45', '6.53', '1.37', '1.80', '1.59', 33, '12.00', '1.83', '492.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(93, NULL, '2023-06-17', 9, 1, '4.92', '8.85', '8.85', '8.85', '17.97', '17.97', '17.97', '7.75', '7.90', '7.83', '1.61', '1.58', '1.60', 33, '12.65', '1.68', '418.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(94, NULL, '2023-06-19', 6, 1, '5.14', '8.55', '8.55', '8.55', '17.36', '17.36', '17.36', '7.30', '7.15', '7.23', '1.66', '1.69', '1.68', 29, '13.65', '1.45', '385.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(95, NULL, '2023-06-19', 9, 1, '4.97', '8.95', '8.90', '8.93', '18.17', '18.07', '18.12', '7.75', '7.90', '7.83', '1.60', '1.58', '1.59', 33, '12.90', '1.63', '341.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(96, NULL, '2023-06-20', 9, 1, '4.95', '8.85', '8.85', '8.85', '17.97', '17.97', '17.97', '8.00', '8.05', '8.03', '1.56', '1.55', '1.56', 33, '12.80', '1.65', '308.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(97, NULL, '2023-06-21', 6, 1, '5.04', '8.85', '8.80', '8.83', '17.97', '17.86', '17.92', '8.00', '8.05', '8.03', '1.56', '1.55', '1.56', 33, '12.75', '1.66', '312.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(98, NULL, '2023-06-21', 7, 1, '4.98', '8.95', '9.00', '8.98', '18.17', '18.27', '18.22', '8.15', '8.15', '8.15', '1.54', '1.54', '1.54', 33, '13.00', '1.60', '313.00', '34.80', NULL, '2023-10-30', NULL, NULL, NULL),
(99, NULL, '2023-06-22', 7, 1, '4.97', '8.90', '8.95', '8.93', '18.07', '18.17', '18.12', '8.05', '8.05', '8.05', '1.55', '1.55', '1.55', 37, '12.00', '1.83', '283.00', '34.90', NULL, '2023-10-30', NULL, NULL, NULL),
(100, NULL, '2023-06-22', 9, 1, '4.96', '9.00', '8.90', '8.95', '18.27', '18.07', '18.17', '8.10', '8.10', '8.10', '1.54', '1.54', '1.54', 37, '12.00', '1.83', '310.00', '35.00', NULL, '2023-10-30', NULL, NULL, NULL),
(101, NULL, '2023-06-23', 6, 1, '4.81', '9.00', '8.95', '8.98', '18.27', '18.17', '18.22', '7.65', '7.50', '7.58', '1.62', '1.64', '1.63', 29, '13.90', '1.39', '262.00', '35.90', NULL, '2023-10-30', NULL, NULL, NULL),
(102, NULL, '2023-06-24', 8, 1, '4.66', '8.65', '8.70', '8.68', '17.56', '17.66', '17.61', '8.30', '8.15', '8.23', '1.52', '1.54', '1.53', 29, '15.55', '1.01', '286.00', '35.90', NULL, '2023-10-30', NULL, NULL, NULL),
(103, NULL, '2023-06-28', 7, 1, '4.93', '8.85', '8.90', '8.88', '17.97', '18.07', '18.02', '7.80', '7.75', '7.78', '1.59', '1.60', '1.60', 33, '13.35', '1.52', '281.00', '34.80', NULL, '2023-10-30', NULL, NULL, NULL),
(104, NULL, '2023-06-29', 8, 1, '4.90', '8.95', '8.90', '8.93', '18.17', '18.07', '18.12', '7.85', '8.00', '7.93', '1.57', '1.59', '1.58', 33, '13.65', '1.45', '252.00', '35.10', NULL, '2023-10-30', NULL, NULL, NULL),
(105, NULL, '2023-06-30', 7, 1, '4.64', '8.15', '8.15', '8.15', '17.15', '17.15', '17.15', '7.00', '6.85', '6.93', '1.70', '1.73', '1.72', 27, '13.35', '1.56', '345.00', '36.30', NULL, '2023-10-30', NULL, NULL, NULL),
(106, NULL, '2023-07-01', 9, 1, '4.83', '8.90', '8.80', '8.85', '18.07', '17.86', '17.97', '7.30', '7.45', '7.38', '7.30', '7.45', '7.38', 29, '14.20', '1.36', '324.00', '35.30', NULL, '2023-10-30', NULL, NULL, NULL),
(107, NULL, '2023-07-04', 9, 1, '4.84', '8.85', '8.80', '8.83', '17.97', '17.86', '17.92', '7.45', '7.55', '7.50', '1.64', '1.62', '1.63', 29, '14.30', '1.34', '330.00', '35.30', NULL, '2023-10-30', NULL, NULL, NULL),
(108, NULL, '2023-07-06', 7, 1, '4.94', '8.85', '8.90', '8.88', '17.97', '18.07', '18.02', '7.95', '7.95', '7.95', '1.55', '1.55', '1.55', 33, '12.30', '1.80', '311.00', '35.10', NULL, '2023-10-30', NULL, NULL, NULL),
(109, NULL, '2023-07-10', 10, 1, '4.65', '8.25', '8.30', '8.28', '16.75', '16.85', '16.80', '7.95', '7.95', '7.95', '1.56', '1.56', '1.56', 23, '14.20', '1.36', NULL, '34.10', NULL, '2023-10-30', NULL, NULL, NULL),
(110, NULL, '2023-07-15', 9, 1, '4.80', '8.00', '8.00', '8.00', '16.24', '16.24', '16.24', '6.90', '6.90', '6.90', '1.71', '1.71', '1.71', 29, '14.75', '1.24', '232.00', '34.30', NULL, '2023-10-30', NULL, NULL, NULL),
(111, NULL, '2023-07-17', 7, 1, '5.00', '8.65', '8.75', '8.70', '17.56', '17.76', '17.66', '7.30', '7.30', '7.30', '1.65', '1.65', '1.65', 29, '12.80', '1.68', '233.00', '34.50', NULL, '2023-10-30', NULL, NULL, NULL),
(112, NULL, '2023-07-18', 10, 1, '4.75', '8.40', '8.40', '8.40', '17.05', '17.05', '17.05', '7.45', '7.45', '7.45', '1.65', '1.65', '1.65', 23, '14.80', '1.23', '548.00', '34.60', NULL, '2023-10-30', NULL, NULL, NULL),
(113, NULL, '2023-07-19', 8, 1, '5.06', '8.95', '8.95', '8.95', '18.17', '18.17', '18.17', '7.70', '7.70', '7.70', '1.61', '1.61', '1.61', 29, '11.75', '1.92', '212.00', '34.80', NULL, '2023-10-30', NULL, NULL, NULL),
(114, NULL, '2023-07-20', 6, 1, '4.93', '8.70', '8.80', '8.75', '17.66', '17.86', '17.76', '7.90', '7.90', '7.90', '1.58', '1.58', '1.58', 29, '13.80', '1.45', NULL, '35.20', NULL, '2023-10-30', NULL, NULL, NULL),
(115, NULL, '2023-07-21', 7, 1, '4.80', '8.90', '9.00', '8.95', '18.07', '18.27', '18.17', '8.35', '8.50', '8.43', '1.51', '1.49', '1.50', 33, '13.50', '1.52', '224.00', '35.00', NULL, '2023-10-30', NULL, NULL, NULL),
(116, NULL, '2023-07-22', 6, 1, '4.83', '9.05', '9.05', '9.05', '18.37', '18.27', '18.32', '8.30', '8.30', '8.30', '1.52', '1.52', '1.52', 33, '14.20', '1.36', '230.00', '35.00', NULL, '2023-10-30', NULL, NULL, NULL),
(117, NULL, '2023-07-24', 10, 1, '4.68', '8.05', '8.05', '8.05', '16.34', '16.34', '16.34', '7.30', '7.15', '7.23', '1.67', '1.69', '1.68', 15, '11.25', '2.04', '1100.00', '34.80', NULL, '2023-10-30', NULL, NULL, NULL),
(118, NULL, '2023-07-25', 9, 1, '4.93', '9.05', '9.10', '9.08', '18.37', '18.47', '18.42', '7.60', '7.45', '7.53', '1.63', '1.65', '1.64', 29, '13.65', '1.49', '329.00', '34.00', NULL, '2023-10-30', NULL, NULL, NULL),
(119, NULL, '2023-07-26', 8, 1, '4.96', '9.05', '9.05', '9.05', '18.37', '18.37', '18.37', '7.60', '7.75', '7.68', '1.63', '1.62', '1.63', 27, '13.70', '1.48', '1100.00', '35.40', NULL, '2023-10-30', NULL, NULL, NULL),
(120, NULL, '2023-07-31', 9, 1, '4.86', '8.95', '9.00', '8.98', '18.17', '18.27', '18.22', '8.25', '8.10', '8.18', '1.53', '1.55', '1.54', 29, '13.25', '1.58', '344.00', '35.00', NULL, '2023-10-30', NULL, NULL, NULL),
(121, NULL, '2023-08-07', 10, 1, '4.95', '8.60', '8.65', '8.63', '17.46', '17.56', '17.51', '7.00', '7.00', '7.00', '1.71', '1.71', '1.71', 23, '13.80', '1.45', '527.00', '35.10', NULL, '2023-10-30', NULL, NULL, NULL),
(122, NULL, '2023-08-02', 6, 1, '4.98', '9.05', '9.05', '9.05', '18.37', '18.37', '18.37', '7.40', '7.40', '7.40', '1.65', '1.65', '1.65', 25, '13.40', '1.52', '342.00', '35.40', NULL, '2023-10-30', NULL, NULL, NULL),
(123, NULL, '2023-08-04', 10, 1, '4.80', '8.30', '8.35', '8.33', '16.85', '16.95', '16.90', '7.50', '7.40', '7.45', '1.64', '1.65', '1.65', 23, '13.90', '1.41', '615.00', '34.10', NULL, '2023-10-30', NULL, NULL, NULL),
(124, NULL, '2023-08-05', 8, 1, '4.86', '8.25', '8.30', '8.28', '16.75', '16.85', '16.80', '7.00', '6.85', '6.93', '1.71', '1.75', '1.73', 23, '13.65', '1.46', '18.70', '35.20', NULL, '2023-10-30', NULL, NULL, NULL),
(125, NULL, '2023-08-10', 6, 1, '4.84', '8.70', '8.70', '8.70', '17.66', '17.66', '17.66', '7.70', '7.60', '7.65', '1.61', '1.63', '1.62', 27, '13.25', '1.56', '1100.00', '35.30', NULL, '2023-10-30', NULL, NULL, NULL),
(126, NULL, '2023-08-11', 10, 1, '4.82', '8.65', '8.70', '8.68', '17.60', '17.66', '17.63', '7.65', '7.65', '7.65', '1.62', '1.62', '1.62', 25, '13.85', '1.42', '435.00', '34.60', NULL, '2023-10-30', NULL, NULL, NULL),
(127, NULL, '2023-08-14', 7, 1, '4.95', '8.65', '8.70', '8.68', '17.56', '17.66', '17.61', '6.95', '7.10', '7.03', '1.72', '1.70', '1.71', 23, '13.65', '1.46', '12.50', '36.00', NULL, '2023-10-30', NULL, NULL, NULL),
(128, NULL, '2023-08-16', 7, 1, '4.95', '8.75', '8.80', '8.78', '17.76', '17.86', '17.81', '6.80', '6.95', '6.88', '1.74', '1.72', '1.73', 23, '13.55', '1.49', '12.50', '36.20', NULL, '2023-10-30', NULL, NULL, NULL),
(129, NULL, '2023-08-17', 7, 1, '4.97', '8.75', '8.80', '8.78', '17.76', '17.86', '17.81', '6.45', '6.60', '6.53', '1.79', '1.77', '1.78', 23, '12.90', '1.64', '10.97', '35.60', NULL, '2023-10-30', NULL, NULL, NULL),
(130, NULL, '2023-08-18', 9, 1, '4.81', '8.95', '9.00', '8.98', '18.17', '18.27', '18.22', '7.95', '8.10', '8.03', '1.57', '1.55', '1.56', 27, '12.70', '1.68', '14.70', '35.00', NULL, '2023-10-30', NULL, NULL, NULL),
(131, NULL, '2023-08-19', 9, 1, '4.96', '8.90', '8.90', '8.90', '18.07', '18.07', '18.07', '7.00', '6.85', '6.93', '1.70', '1.73', '1.72', 23, '12.55', '1.72', '13.60', '35.40', NULL, '2023-10-30', NULL, NULL, NULL),
(132, NULL, '2023-08-21', 7, 1, '4.92', '8.95', '9.00', '8.98', '18.17', '18.27', '18.22', '7.90', '8.05', '7.98', '1.58', '1.56', '1.57', 27, '14.00', '1.38', '15.20', '35.10', NULL, '2023-10-30', NULL, NULL, NULL),
(133, NULL, '2023-08-25', 9, 1, '4.95', '9.00', '8.95', '8.98', '18.27', '18.17', '18.22', '7.95', '7.95', '7.95', '1.57', '1.57', '1.57', 27, '14.05', '1.37', '13.70', '35.00', NULL, '2023-10-30', NULL, NULL, NULL),
(134, NULL, '2023-05-28', 7, 1, '4.93', '9.00', '9.05', '9.03', '18.27', '18.37', '18.32', '7.60', '7.65', '7.63', '1.63', '1.61', '1.62', 23, '13.80', '1.43', '16.80', '37.00', NULL, '2023-10-30', NULL, NULL, NULL),
(135, NULL, '2023-08-31', 6, 1, '4.78', '8.20', '8.25', '8.23', '16.65', '16.75', '16.70', '6.80', '6.65', '6.73', '1.74', '1.76', '1.75', 23, '14.70', '1.22', '35.50', '16.80', NULL, '2023-10-30', NULL, NULL, NULL),
(136, NULL, '2023-09-01', 7, 1, '4.94', '8.35', '8.35', '8.35', '16.95', '16.95', '16.95', '6.55', '6.70', '6.63', '1.78', '1.76', '1.77', 33, '16.45', '0.82', '285.00', '36.00', NULL, '2023-10-30', NULL, NULL, NULL),
(137, NULL, '2023-09-02', 7, 1, '4.95', '8.80', '8.75', '8.78', '17.86', '17.76', '17.81', '6.85', '6.85', '6.85', '1.72', '1.72', '1.72', 27, '14.40', '1.29', '256.00', '35.80', NULL, '2023-10-30', NULL, NULL, NULL),
(138, NULL, '2023-09-04', 7, 1, '4.93', '8.80', '8.75', '8.78', '17.86', '17.76', '17.81', '6.85', '6.85', '6.85', '1.72', '1.72', '1.72', 23, '13.80', '1.43', '13.90', '36.00', NULL, '2023-10-30', NULL, NULL, NULL),
(139, NULL, '2023-09-09', 6, 1, '4.80', '8.30', '8.35', '8.33', '16.85', '16.95', '16.90', '6.75', '6.75', '6.75', '1.73', '1.73', '1.73', 23, '14.65', '1.24', '10.01', '35.40', NULL, '2023-10-30', NULL, NULL, NULL),
(140, NULL, '2023-09-11', 6, 1, '4.79', '8.30', '8.30', '8.30', '16.85', '16.85', '16.85', '6.45', '6.55', '6.50', '1.78', '1.76', '1.77', 23, '14.20', '1.25', '10.54', '35.60', NULL, '2023-10-30', NULL, NULL, NULL),
(141, NULL, '2023-09-11', 7, 1, '4.78', '8.30', '8.25', '8.28', '16.85', '18.74', '17.80', '6.85', '8.70', '7.78', '1.72', '1.74', '1.73', 29, '16.65', '0.78', '169.00', '35.70', NULL, '2023-10-30', NULL, NULL, NULL),
(142, NULL, '2023-09-13', 10, 1, '4.78', '8.40', '8.45', '8.43', '17.05', '17.15', '17.10', '7.20', '7.20', '7.20', '1.65', '1.65', '1.65', 23, '14.15', '1.35', '339.00', '34.80', NULL, '2023-10-30', NULL, NULL, NULL),
(143, NULL, '2023-09-14', 6, 1, '4.59', '8.10', '8.15', '8.13', '16.44', '16.54', '16.49', '6.75', '6.90', '6.83', '1.72', '1.70', '37.00', 37, '18.35', '0.39', NULL, '36.40', NULL, '2023-10-30', NULL, NULL, NULL),
(144, NULL, '2023-09-15', 8, 1, '4.81', '7.90', '7.95', '7.93', '16.04', '16.14', '16.09', '6.35', '6.35', '6.35', '1.78', '1.78', '1.78', 33, '10.55', '2.18', '440.00', '35.10', NULL, '2023-10-30', NULL, NULL, NULL),
(145, NULL, '2023-09-16', 7, 1, '4.70', '8.40', '8.50', '8.45', '17.05', '17.26', '17.16', '6.50', '6.50', '6.50', '1.78', '1.78', '1.78', 27, '16.05', '0.92', '220.00', '36.20', NULL, '2023-10-30', NULL, NULL, NULL),
(146, NULL, '2023-09-20', 7, 1, '4.75', '8.70', '8.70', '8.70', '17.66', '17.66', '17.66', '6.40', '6.40', '6.40', '1.79', '1.79', '1.79', 23, '15.10', '1.14', '202.00', '36.80', NULL, '2023-10-30', NULL, NULL, NULL),
(147, NULL, '2023-09-21', 6, 1, '4.80', '8.65', '8.75', '8.70', '17.56', '17.76', '17.66', '6.30', '6.45', '6.38', '1.80', '1.78', '1.79', 23, '14.90', '1.18', '14.60', '36.40', NULL, '2023-10-30', NULL, NULL, NULL),
(148, NULL, '2023-09-23', 10, 1, '4.59', '8.05', '8.10', '8.08', '16.34', '16.44', '16.39', '7.20', '7.10', '7.15', '1.67', '1.69', '1.68', 23, '14.90', '1.18', '15.60', '36.20', NULL, '2023-10-30', NULL, NULL, NULL),
(149, NULL, '2023-09-23', 7, 1, '4.74', '8.20', '8.20', '8.20', '16.65', '16.65', '16.65', '6.55', '6.40', '6.48', '1.79', '1.77', '1.78', 23, '14.65', '1.24', '274.00', '35.50', NULL, '2023-10-30', NULL, NULL, NULL),
(150, NULL, '2023-09-25', 6, 1, '4.88', '8.75', '8.80', '8.78', '17.76', '17.86', '17.81', '6.90', '6.75', '6.83', '1.72', '1.74', '1.73', 19, '14.00', '1.39', '16.80', '35.80', NULL, '2023-10-30', NULL, NULL, NULL),
(151, NULL, '2023-09-26', 7, 1, '4.86', '8.90', '8.80', '8.85', '18.07', '17.86', '17.97', '6.80', '6.95', '6.88', '1.73', '1.71', '1.72', 23, '14.30', '1.32', '18.60', '35.70', NULL, '2023-10-30', NULL, NULL, NULL),
(152, NULL, '2023-09-27', 6, 1, '4.64', '8.35', '8.35', '8.35', '16.95', '16.95', '16.95', '7.90', '7.90', '7.90', '1.57', '1.57', '1.57', 33, '17.10', '0.68', '131.00', '36.00', NULL, '2023-10-30', NULL, NULL, NULL),
(153, NULL, '2023-09-28', 6, 1, '4.68', '8.90', '8.95', '8.93', '18.07', '18.17', '18.12', '8.95', '8.95', '8.95', '1.42', '1.42', '1.42', 37, '14.65', '1.24', '101.80', '34.20', NULL, '2023-10-30', NULL, NULL, NULL),
(154, NULL, '2023-09-29', 10, 1, '4.78', '8.45', '8.50', '8.48', '17.15', '17.26', '17.21', '7.80', '7.65', '7.73', '1.59', '1.61', '1.60', 19, '12.60', '1.71', '438.00', '34.40', NULL, '2023-10-30', NULL, NULL, NULL),
(155, NULL, '2023-09-30', 6, 1, '4.80', '8.95', '9.00', '8.98', '18.17', '18.27', '18.22', '7.65', '7.65', '7.65', '1.61', '1.61', '1.61', 23, '16.10', '0.91', '290.00', '35.80', NULL, '2023-10-30', NULL, NULL, NULL),
(156, NULL, '2023-10-02', 7, 1, '4.86', '9.05', '9.10', '9.08', '18.37', '18.47', '18.42', '7.10', '7.10', '7.10', '1.71', '1.71', '1.71', 23, '13.20', '1.57', NULL, '36.00', NULL, '2023-10-30', NULL, NULL, NULL),
(157, NULL, '2023-10-04', 6, 1, '4.70', '9.10', '9.10', '9.10', '18.47', '18.47', '18.47', '9.00', '9.05', '9.03', '1.43', '1.42', '1.43', 37, '14.25', '1.33', '118.00', '34.30', NULL, '2023-10-30', NULL, NULL, NULL),
(158, NULL, '2023-10-05', 7, 1, '4.86', '8.90', '8.95', '8.93', '18.07', '18.17', '18.12', '6.70', '6.85', '6.78', '1.76', '1.74', '1.75', 23, '14.05', '1.38', '17.30', '35.50', NULL, '2023-10-30', NULL, NULL, NULL),
(159, NULL, '2023-10-06', 6, 1, '4.81', '9.10', '9.10', '9.10', '18.47', '18.47', '18.47', '7.80', '7.95', '7.88', '1.60', '1.58', '1.59', 27, '14.10', '1.36', '19.30', '35.40', NULL, '2023-10-30', NULL, NULL, NULL),
(160, NULL, '2023-10-07', 10, 1, '4.74', '8.30', '8.40', '8.35', '16.85', '17.05', '16.95', '7.45', '7.45', '7.45', '1.65', '1.65', '1.65', 19, '14.50', '1.27', NULL, '34.60', NULL, '2023-10-30', NULL, NULL, NULL),
(161, NULL, '2023-10-09', 7, 1, '4.83', '8.80', '8.90', '8.85', '17.86', '18.07', '17.97', '7.30', '7.30', '7.30', '1.67', '1.67', '1.67', 19, '14.25', '1.33', NULL, '35.40', NULL, '2023-10-30', NULL, NULL, NULL),
(162, NULL, '2023-10-10', 7, 1, '4.86', '8.90', '9.00', '8.95', '18.07', '18.27', '18.17', '7.15', '7.15', '7.15', '1.70', '1.70', '1.70', 19, '14.65', '1.24', NULL, '35.40', NULL, '2023-10-30', NULL, NULL, NULL),
(163, NULL, '2023-10-11', 7, 1, '4.88', '8.90', '9.00', '8.95', '18.07', '18.27', '18.17', '7.10', '7.10', '7.10', '1.69', '1.69', '1.69', 19, '14.70', '1.23', NULL, '36.20', NULL, '2023-10-30', NULL, NULL, NULL),
(164, NULL, '2023-10-12', 7, 1, '4.90', '9.05', '9.10', '9.08', '18.37', '18.47', '18.42', '6.90', '6.90', '6.90', '1.72', '1.72', '1.72', 19, '14.55', '1.26', NULL, '36.00', NULL, '2023-10-30', NULL, NULL, NULL),
(165, NULL, '2023-10-14', 7, 1, '4.90', '9.05', '9.05', '9.05', '18.37', '18.37', '18.37', '6.85', '6.85', '6.85', '1.72', '1.72', '1.72', 21, '14.65', '1.24', NULL, '36.40', NULL, '2023-10-30', NULL, NULL, NULL),
(166, NULL, '2023-10-16', 10, 1, '4.77', '8.40', '8.30', '8.35', '17.05', '16.85', '16.95', '7.20', '7.10', '7.15', '1.67', '1.69', '1.68', 21, '15.10', '1.14', NULL, '35.30', NULL, '2023-10-30', NULL, NULL, NULL),
(167, NULL, '2023-10-17', 7, 1, '4.53', '8.45', '8.50', '8.48', '17.05', '17.26', '17.16', '7.80', '7.95', '7.88', '1.60', '1.58', '1.59', 23, '16.05', '0.92', NULL, '35.00', NULL, '2023-10-30', NULL, NULL, NULL),
(168, NULL, '2023-10-18', 7, 1, '4.68', '8.60', '8.60', '8.60', '17.46', '17.46', '17.46', '6.90', '7.05', '6.98', '1.73', '1.70', '1.72', 23, '15.30', '1.09', NULL, '36.00', NULL, '2023-10-30', NULL, NULL, NULL),
(169, NULL, '2023-10-18', 10, 1, '4.72', '8.40', '8.40', '8.40', '17.05', '17.05', '17.05', '7.20', '7.20', '7.20', '1.68', '1.68', '1.68', 23, '14.80', '1.20', NULL, '35.30', NULL, '2023-10-30', NULL, NULL, NULL),
(170, NULL, '2023-10-19', 7, 1, '4.69', '8.90', '8.95', '8.93', '18.07', '18.17', '18.12', '9.10', '9.25', '9.18', '1.40', '1.38', '1.39', 37, '13.80', '1.43', NULL, '34.00', NULL, '2023-10-30', NULL, NULL, NULL),
(171, NULL, '2023-10-20', 7, 1, '4.69', '9.00', '9.05', '9.03', '18.27', '18.37', '18.32', '9.15', '9.00', '9.08', '1.40', '1.42', '1.41', 37, '14.65', '1.24', NULL, '34.30', NULL, '2023-10-30', NULL, NULL, NULL),
(172, '123', '2023-10-21', 7, 1, '4.65', '8.80', '8.85', '8.83', '17.86', '17.97', '17.92', '8.10', '7.95', '8.03', '1.55', '1.57', '1.56', 27, '14.55', '1.19', NULL, '35.60', '', '2023-10-30', '2023-11-02', NULL, NULL),
(173, NULL, '2023-01-23', 8, 2, '4.93', '4.80', '4.85', '4.83', '9.74', '9.85', '9.80', '4.65', '4.70', '4.68', '2.07', '2.06', '2.07', 23, '18.65', '0.40', '317.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(174, NULL, '2023-06-05', 6, 2, '4.94', '5.10', '5.10', '5.10', '10.30', '10.30', '10.30', '4.60', '4.75', '4.68', '2.07', '2.04', '2.06', 27, '18.10', '0.43', '562.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(175, NULL, '2023-07-03', 7, 2, '4.69', '4.30', '4.30', '4.30', '8.73', '8.73', '8.73', '5.70', '5.70', '5.70', '1.89', '1.89', '1.89', 29, '19.15', '0.23', NULL, '32.70', NULL, '2023-10-30', NULL, NULL, NULL),
(176, NULL, '2023-08-03', 8, 2, '4.22', '4.95', '5.00', '4.98', '10.05', '10.15', '10.10', '8.20', '8.05', '8.13', '1.54', '1.56', '1.55', 41, '19.15', '0.20', '491.00', '29.10', NULL, '2023-10-30', NULL, NULL, NULL),
(177, NULL, '2023-09-06', 6, 2, '4.25', '4.45', '4.45', '4.45', '9.03', '9.03', '9.03', '5.35', '5.35', '5.35', '1.92', '1.93', '1.93', 27, '19.50', '0.12', '17.40', '32.10', NULL, '2023-10-30', NULL, NULL, NULL),
(178, NULL, '2023-01-13', 7, 3, '4.45', '7.75', '7.75', '7.75', '15.73', '15.73', '15.73', '8.45', '8.45', '8.45', '1.51', '1.51', '1.51', 41, '16.35', '0.91', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(179, NULL, '2023-01-13', 9, 3, '4.44', '7.75', '7.80', '7.78', '15.73', '15.83', '15.78', '8.00', '8.00', '8.00', '1.57', '1.57', '1.57', 37, '16.25', '0.93', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(180, NULL, '2023-01-14', 9, 3, '4.44', '7.70', '7.80', '7.75', '15.63', '15.83', '15.73', '8.10', '8.10', '8.10', '1.57', '1.57', '1.57', 41, '16.25', '0.94', '962.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(181, NULL, '2023-03-04', 10, 3, '4.38', '7.90', '7.95', '7.93', '15.99', '16.09', '16.04', '10.35', '10.40', '10.38', '1.24', '1.23', '1.24', 41, '16.95', '0.69', '523.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(182, NULL, '2023-03-07', 10, 3, '4.41', '8.00', '8.00', '8.00', '16.19', '16.19', '16.19', '9.65', '9.65', '9.65', '1.34', '1.34', '1.34', 41, '17.55', '0.55', '559.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(183, NULL, '2023-03-15', 8, 3, '4.47', '8.05', '8.00', '8.03', '16.29', '16.19', '16.24', '8.65', '8.65', '8.65', '1.50', '1.50', '1.50', 41, '14.85', '1.19', '510.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(184, NULL, '2023-04-11', 7, 3, '4.39', '7.75', '7.75', '7.75', '15.89', '15.89', '15.89', '8.80', '8.80', '8.80', '1.44', '1.44', '1.44', 33, '15.65', '1.01', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(185, NULL, '2023-04-21', 6, 3, '4.52', '7.95', '7.95', '7.95', '16.09', '16.09', '16.09', '5.30', '5.45', '5.38', '1.94', '1.92', '1.93', 33, '13.55', '1.49', '601.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(186, NULL, '2023-05-09', 8, 3, '4.35', '8.00', '7.95', '7.98', '16.19', '16.09', '16.14', '8.45', '8.60', '8.53', '1.49', '1.47', '1.48', 39, '14.50', '1.16', '1003.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(187, NULL, '2023-05-10', 6, 3, '4.42', '8.00', '7.95', '7.98', '16.19', '16.09', '16.14', '8.45', '8.60', '8.53', '1.49', '1.47', '1.48', 37, '14.05', '1.36', NULL, NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(188, NULL, '2023-05-11', 7, 3, '4.33', '7.85', '7.90', '7.88', '15.89', '15.99', '15.94', '9.30', '9.30', '9.30', '1.37', '1.37', '1.37', 41, '16.05', '0.90', '411.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(189, NULL, '2023-05-12', 8, 3, '4.35', '7.90', '7.90', '7.90', '15.99', '15.99', '15.99', '8.90', '8.90', '8.90', '1.48', '1.48', '1.48', 37, '14.75', '1.20', '568.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(190, NULL, '2023-05-27', 6, 3, '4.34', '7.90', '8.00', '7.95', '15.96', '16.16', '16.06', '9.30', '9.45', '9.38', '1.37', '1.36', '1.37', 41, '16.35', '0.83', '366.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(191, NULL, '2023-05-30', 6, 3, '4.40', '7.85', '7.90', '7.88', '15.86', '15.96', '15.91', '9.25', '9.25', '9.25', '1.39', '1.39', '1.39', 37, '16.20', '0.86', '392.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(192, NULL, '2023-06-01', 8, 3, '4.46', '7.90', '7.95', '7.93', '15.96', '16.06', '16.01', '8.55', '8.55', '8.55', '1.49', '1.49', '1.49', 37, '14.40', '1.28', '589.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(193, NULL, '2023-06-02', 7, 3, '4.73', '7.85', '7.85', '7.85', '15.86', '15.86', '15.86', '7.15', '7.00', '7.08', '1.69', '1.72', '1.71', 33, '12.75', '1.66', '872.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(194, NULL, '2023-07-10', 8, 3, '4.83', '7.85', '7.85', '7.85', '15.94', '15.94', '15.94', '6.70', '6.55', '6.63', '1.74', '1.76', '1.75', 29, '13.05', '1.61', NULL, '35.40', NULL, '2023-10-30', NULL, NULL, NULL),
(195, NULL, '2023-07-11', 8, 3, '4.81', '7.70', '7.75', '7.73', '15.63', '15.73', '15.68', '6.70', '6.55', '6.63', '1.74', '1.76', '1.75', 29, '13.20', '1.59', '797.00', '35.40', NULL, '2023-10-30', NULL, NULL, NULL),
(196, NULL, '2023-07-13', 8, 3, '4.77', '7.50', '7.50', '7.50', '15.23', '15.23', '15.23', '6.20', '6.20', '6.20', '1.81', '1.81', '1.81', 29, '12.60', '1.73', '804.00', '35.10', NULL, '2023-10-30', NULL, NULL, NULL),
(197, NULL, '2023-07-14', 7, 3, '4.80', '7.80', '7.75', '7.78', '15.83', '15.73', '15.78', '6.20', '6.20', '6.20', '1.81', '1.81', '1.81', 29, '13.15', '1.60', '846.00', '35.60', NULL, '2023-10-30', NULL, NULL, NULL),
(198, NULL, '2023-08-06', 8, 3, '4.78', '7.25', '7.25', '7.25', '14.72', '14.72', '14.72', '6.10', '5.95', '6.03', '1.84', '1.87', '1.86', 29, '13.80', '1.43', '1084.00', '35.20', NULL, '2023-10-30', NULL, NULL, NULL),
(199, NULL, '2023-08-08', 8, 3, '4.72', '7.50', '7.50', '7.50', '15.23', '15.23', '15.23', '6.20', '6.20', '6.20', '1.83', '1.83', '1.83', 29, '12.60', '1.70', '968.00', '35.30', NULL, '2023-10-30', NULL, NULL, NULL),
(200, NULL, '2023-08-09', 8, 3, '4.69', '7.65', '7.60', '7.63', '15.53', '15.43', '15.48', '6.30', '6.30', '6.30', '1.82', '1.82', '1.82', 27, '15.05', '1.14', '1084.00', '35.30', NULL, '2023-10-30', NULL, NULL, NULL),
(201, NULL, '2023-08-25', 8, 3, '4.70', '7.80', '7.80', '7.80', '15.83', '15.83', '15.83', '6.45', '6.45', '6.45', '1.79', '1.79', '1.79', 29, '11.85', '1.88', '384.00', '34.80', NULL, '2023-10-30', NULL, NULL, NULL),
(202, NULL, '2023-09-06', 8, 3, '4.96', '7.85', '7.85', '7.85', '15.94', '15.94', '15.94', '6.30', '6.45', '6.38', '1.81', '1.78', '1.80', 29, '12.20', '1.80', '496.00', '35.30', NULL, '2023-10-30', NULL, NULL, NULL),
(203, NULL, '2023-09-18', 9, 3, '4.88', '8.05', '8.10', '8.08', '16.34', '16.44', '16.39', '6.40', '6.30', '6.35', '1.79', '1.80', '1.80', 29, '11.25', '2.02', '424.00', '35.40', NULL, '2023-10-30', NULL, NULL, NULL),
(204, NULL, '2023-09-18', 8, 3, '4.81', '8.00', '8.00', '8.00', '16.24', '16.24', '16.24', '6.45', '6.50', '6.48', '1.78', '1.78', '1.78', 23, '11.70', '1.92', '471.00', '35.60', NULL, '2023-10-30', NULL, NULL, NULL),
(205, NULL, '2023-04-18', 7, 4, '4.36', '5.45', '5.45', '5.45', '11.03', '11.03', '11.03', '9.25', '9.40', '9.33', '1.38', '1.36', '1.37', 37, '17.55', '0.57', '879.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(206, NULL, '2023-05-05', 11, 4, '5.09', '5.15', '5.10', '5.13', '10.42', '10.31', '10.37', '5.05', '5.05', '5.05', '1.99', '1.99', '1.99', 27, '19.05', '0.21', NULL, NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(207, NULL, '2023-05-06', 8, 4, '5.02', '5.00', '4.95', '4.98', '10.12', '10.02', '10.07', '5.40', '5.40', '5.40', '1.94', '1.94', '1.94', 29, '18.25', '0.39', '605.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(208, NULL, '2023-05-17', 6, 4, '4.92', '5.00', '5.00', '5.00', '10.12', '10.12', '10.12', '5.80', '5.95', '5.88', '1.86', '1.84', '1.85', 29, '17.80', '0.50', '460.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(209, NULL, '2023-07-12', 7, 4, '4.48', '4.90', '4.80', '4.85', '9.95', '9.74', '9.85', '6.10', '6.10', '6.10', '1.83', '1.83', '1.83', 33, '18.35', '0.42', '353.00', '33.60', NULL, '2023-10-30', NULL, NULL, NULL),
(210, NULL, '2023-08-28', 7, 4, '4.25', '4.85', '4.85', '4.85', '9.85', '9.85', '9.85', '7.70', '7.65', '7.68', '1.61', '1.62', '1.62', 33, '18.90', '0.26', '372.00', '31.80', NULL, '2023-10-30', NULL, NULL, NULL),
(211, NULL, '2023-09-21', 9, 4, '4.12', '4.10', '4.15', '4.13', '8.32', '8.42', '8.37', '6.35', '6.35', '6.35', '1.80', '1.80', '1.80', 29, '19.00', '0.24', '317.00', '31.50', NULL, '2023-10-30', NULL, NULL, NULL),
(212, NULL, '2023-10-16', 6, 4, '4.14', '4.20', '4.20', '4.20', '8.53', '8.53', '8.53', '11.10', '11.10', '11.10', '1.11', '1.11', '1.11', 45, '19.30', '0.17', NULL, '25.50', NULL, '2023-10-30', NULL, NULL, NULL),
(213, NULL, '2023-03-01', 9, 5, '4.37', '7.70', '7.75', '7.73', '15.58', '15.69', '15.64', '7.40', '7.25', '7.33', '1.67', '1.70', '1.69', 27, '16.00', '0.91', '457.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(214, NULL, '2023-04-10', 6, 5, '4.41', '7.65', '7.65', '7.65', '15.48', '15.48', '15.48', '7.35', '7.25', '7.30', '1.68', '1.69', '1.69', 23, '15.90', '0.95', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(215, NULL, '2023-01-10', 9, 6, '4.52', '7.95', '7.90', '7.93', '16.14', '16.04', '16.09', '7.45', '7.45', '7.45', '1.65', '1.65', '1.65', 33, '16.60', '0.86', NULL, NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(216, NULL, '2023-01-27', 8, 6, '4.57', '7.90', '7.85', '7.88', '16.04', '15.94', '15.99', '9.30', '9.45', '9.38', '1.38', '1.36', '1.37', 41, '11.85', '1.93', '546.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(217, NULL, '2023-02-21', 10, 6, '4.54', '7.95', '7.90', '7.93', '16.14', '16.04', '16.09', '8.45', '8.45', '8.45', '1.52', '1.52', '1.52', 41, '12.30', '1.76', '382.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(218, NULL, '2023-02-28', 10, 6, '4.43', '7.90', '7.90', '7.90', '15.99', '15.99', '15.99', '5.20', '5.20', '5.20', '2.00', '2.00', '2.00', 29, '15.05', '1.13', '377.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(219, NULL, '2023-04-20', 6, 6, '4.39', '7.65', '7.65', '7.65', '15.48', '15.48', '15.48', '5.30', '5.45', '5.38', '1.94', '1.92', '1.93', 27, '16.15', '0.89', '319.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(220, NULL, '2023-04-24', 9, 6, '4.53', '7.65', '7.65', '7.65', '15.48', '15.48', '15.48', '8.35', '8.35', '8.35', '1.51', '1.51', '1.51', 27, '12.90', '1.64', '1064.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(221, NULL, '2023-04-24', 9, 6, '4.58', '7.65', '7.65', '7.65', '15.48', '15.38', '15.43', '8.25', '8.40', '8.33', '1.52', '1.50', '1.51', 23, '12.10', '1.82', '1100.00', NULL, NULL, '2023-10-30', NULL, NULL, NULL),
(222, NULL, '2023-07-05', 8, 6, '5.05', '8.40', '8.50', '8.45', '17.05', '17.26', '17.16', '7.90', '8.05', '7.98', '1.57', '1.54', '1.56', 37, '11.15', '2.06', '207.00', '34.40', NULL, '2023-10-30', NULL, NULL, NULL),
(223, NULL, '2023-07-07', 8, 6, '5.06', '8.55', '8.55', '8.55', '17.36', '17.36', '17.36', '7.80', '7.95', '7.88', '1.58', '1.56', '1.57', 37, '12.30', '2.13', '199.00', '34.20', NULL, '2023-10-30', NULL, NULL, NULL),
(224, NULL, '2023-07-08', 8, 6, '5.06', '8.55', '8.55', '8.55', '17.36', '17.36', '17.36', '8.10', '8.10', '8.10', '1.54', '1.54', '1.54', 37, '11.80', '1.91', '231.00', '34.50', NULL, '2023-10-30', NULL, NULL, NULL),
(225, NULL, '2023-07-27', 7, 6, '4.98', '8.35', '8.35', '8.35', '16.95', '16.95', '16.95', '7.25', '7.40', '7.33', '1.68', '1.65', '1.67', 33, '11.55', '1.97', '229.00', '34.50', NULL, '2023-10-30', NULL, NULL, NULL),
(226, NULL, '2023-07-29', 7, 6, '4.97', '8.50', '8.40', '8.45', '17.26', '17.05', '17.16', '7.50', '7.55', '7.53', '1.64', '1.63', '1.64', 33, '11.80', '1.91', '211.00', '34.50', NULL, '2023-10-30', NULL, NULL, NULL),
(227, NULL, '2023-08-09', 7, 6, '4.91', '8.25', '8.25', '8.25', '16.75', '16.75', '16.75', '7.15', '7.15', '7.15', '1.69', '1.69', '1.69', 33, '11.40', '1.98', '232.00', '35.00', NULL, '2023-10-30', NULL, NULL, NULL),
(229, NULL, '2023-04-05', 6, 7, '4.81', '7.95', '7.95', '7.95', '16.09', '16.09', '16.09', '5.20', '5.20', '5.20', '1.99', '1.99', '1.99', 23, '11.30', '2.00', '832.00', '0.00', '', '2023-10-30', NULL, NULL, NULL),
(230, NULL, '2023-04-07', 6, 7, '4.72', '7.90', '8.00', '7.95', '15.99', '16.19', '16.09', '4.75', '4.90', '4.83', '2.06', '2.03', '2.05', 23, '14.50', '1.27', '706.00', '0.00', '', '2023-10-30', '0000-00-00', 0, 0),
(231, NULL, '2023-04-29', 8, 7, '4.55', '7.80', '7.75', '7.78', '15.79', '15.69', '15.74', '5.00', '5.15', '5.08', '2.01', '1.99', '2.00', 11, '14.75', '1.19', '911.00', '0.00', '', '2023-10-30', '0000-00-00', 0, 0),
(232, NULL, '2023-05-02', 8, 7, '4.59', '7.70', '7.75', '7.73', '15.58', '15.69', '15.64', '4.90', '4.90', '4.90', '2.01', '2.01', '2.01', 27, '15.25', '1.08', '759.00', '0.00', '', '2023-10-30', '0000-00-00', 0, 0),
(233, NULL, '2023-06-26', 6, 7, '4.58', '7.85', '7.85', '7.85', '15.94', '15.94', '15.94', '5.20', '5.05', '5.13', '1.97', '1.99', '1.98', 23, '15.25', '1.08', '1012.00', '37.60', '', '2023-10-30', '0000-00-00', 0, 0);
INSERT INTO `raw_sauce` (`id`, `batch`, `reccord_date`, `tank_id`, `type_id`, `ph`, `nacl_t1`, `nacl_t2`, `nacl_t_avr`, `nacl_p1`, `nacl_p2`, `nacl_p_avr`, `tn_t1`, `th_t2`, `tn_t_avr`, `tn_p1`, `tn_p2`, `tn_p_avr`, `col`, `alc_t`, `alc_p`, `ppm`, `brix`, `remask`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(234, NULL, '2023-06-27', 6, 7, '4.55', '7.70', '7.70', '7.70', '15.63', '15.63', '15.63', '4.50', '4.50', '4.50', '2.06', '2.06', '2.06', 23, '15.00', '1.14', '1089.00', '38.40', '', '2023-10-30', '0000-00-00', 0, 0),
(235, NULL, '2023-01-25', 10, 7, '4.48', '7.60', '7.70', '7.65', '15.43', '15.63', '15.53', '5.25', '5.25', '5.25', '1.98', '1.98', '1.98', 23, '17.65', '0.62', '1100.00', '0.00', '', '2023-10-30', '0000-00-00', 0, 0),
(236, NULL, '2023-03-03', 7, 7, '5.02', '8.45', '8.50', '8.48', '17.10', '17.20', '17.15', '6.30', '6.45', '6.38', '1.83', '1.81', '1.82', 31, '13.10', '1.58', '481.00', '0.00', '', '2023-10-30', '0000-00-00', 0, 0),
(237, NULL, '2023-05-16', 7, 7, '4.61', '7.70', '7.75', '7.73', '15.58', '15.69', '15.64', '5.60', '5.45', '5.53', '1.89', '1.91', '1.90', 29, '13.75', '1.43', '438.00', '0.00', '', '2023-10-30', '0000-00-00', 0, 0),
(238, NULL, '2023-07-08', 6, 7, '4.62', '6.45', '6.45', '6.45', '13.09', '13.09', '13.09', '5.15', '5.15', '5.15', '1.97', '1.97', '1.97', 27, '16.40', '0.86', '1100.00', '35.40', '', '2023-10-30', '0000-00-00', 0, 0),
(239, NULL, '2023-01-25', 10, 8, '4.48', '7.60', '7.70', '7.65', '15.43', '15.63', '15.53', '5.25', '5.25', '5.25', '1.98', '1.98', '1.98', 23, '17.65', '0.62', '1100.00', '0.00', NULL, '2023-10-30', NULL, NULL, NULL),
(240, NULL, '2023-03-03', 7, 8, '5.02', '8.45', '8.50', '8.48', '17.10', '17.20', '17.15', '6.30', '6.45', '6.38', '1.83', '1.81', '1.82', 31, '13.10', '1.58', '481.00', '0.00', NULL, '2023-10-30', NULL, NULL, NULL),
(241, NULL, '2023-05-16', 7, 8, '4.61', '7.70', '7.75', '7.73', '15.58', '15.69', '15.64', '5.60', '5.45', '5.53', '1.89', '1.91', '1.90', 29, '13.75', '1.43', '438.00', '0.00', NULL, '2023-10-30', NULL, NULL, NULL),
(242, NULL, '2023-07-08', 6, 8, '4.62', '6.45', '6.45', '6.45', '13.09', '13.09', '13.09', '5.15', '5.15', '5.15', '1.97', '1.97', '1.97', 27, '16.40', '0.86', '1100.00', '35.40', NULL, '2023-10-30', NULL, NULL, NULL),
(243, NULL, '2023-01-14', 12, 10, '4.49', '8.20', '8.25', '8.23', '16.65', '16.75', '16.70', '7.15', '7.20', '7.18', '1.71', '1.70', '1.71', 27, '15.70', '1.06', '707.00', '0.00', NULL, '2023-10-30', NULL, NULL, NULL),
(244, NULL, '2022-12-22', 6, 7, '4.41', '7.85', '7.85', '7.85', '15.94', '15.94', '15.94', '7.15', '7.10', '7.13', '1.70', '1.71', '1.71', 27, '17.90', '0.49', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(245, NULL, '2022-11-19', 6, 3, '4.35', '6.70', '6.70', '6.70', '13.60', '13.30', '13.45', '10.30', '10.30', '10.30', '1.25', '1.25', '1.25', 41, '18.90', '0.25', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(246, NULL, '2022-11-30', 7, 3, '4.60', '7.90', '7.90', '7.90', '16.04', '16.04', '16.04', '7.80', '7.80', '7.80', '1.60', '1.60', '1.60', 37, '14.80', '1.20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(247, NULL, '2022-12-17', 7, 3, '4.31', '7.75', '7.75', '7.75', '15.73', '15.73', '15.73', '10.45', '10.30', '10.38', '1.20', '1.22', '1.21', 41, '18.00', '0.47', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(248, NULL, '2022-12-06', 6, 2, '4.53', '4.70', '4.70', '4.70', '9.54', '9.54', '9.54', '5.40', '5.35', '5.38', '1.93', '1.93', '1.93', 33, '19.95', '0.02', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(249, NULL, '2022-12-26', 7, 2, '4.72', '4.70', '4.70', '4.70', '9.54', '9.54', '9.54', '3.40', '3.40', '3.40', '2.26', '2.26', '2.26', 23, '19.75', '0.07', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(250, NULL, '2022-12-20', 8, 1, '4.48', '8.15', '8.15', '8.15', '16.54', '16.54', '16.54', '6.85', '6.85', '6.85', '1.73', '1.73', '1.73', 29, '16.00', '0.93', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(251, NULL, '2022-12-21', 8, 1, '4.45', '8.25', '8.30', '8.28', '16.75', '16.85', '16.80', '7.80', '7.80', '7.80', '1.59', '1.59', '1.59', 33, '16.15', '0.89', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(252, NULL, '2022-12-23', 9, 1, '4.37', '8.00', '8.00', '8.00', '16.24', '16.24', '16.24', '10.45', '10.45', '10.45', '1.21', '1.21', '1.21', 39, '18.10', '0.45', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(253, NULL, '2022-12-24', 8, 1, '4.54', '8.25', '8.25', '8.25', '16.75', '16.75', '16.75', '7.90', '7.85', '7.88', '1.58', '1.60', '1.59', 37, '16.15', '0.89', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(254, NULL, '2022-12-27', 6, 1, '4.62', '7.70', '7.75', '7.73', '15.63', '15.73', '15.68', '6.80', '6.85', '6.83', '1.73', '1.74', '1.74', 33, '18.35', '0.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(255, NULL, '2022-12-27', 8, 1, '4.56', '8.25', '8.25', '8.25', '16.75', '16.75', '16.75', '7.30', '7.40', '7.35', '1.67', '1.65', '1.66', 33, '16.65', '0.78', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_repair`
--

CREATE TABLE `request_repair` (
  `id` int(11) NOT NULL,
  `repair_code` varchar(45) DEFAULT NULL COMMENT 'เลขที่เอกสาร',
  `created_at` date DEFAULT NULL COMMENT 'สร้างเมื่อ',
  `updated_at` date DEFAULT NULL COMMENT 'ปรับปรุงเมื่อ',
  `created_by` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  `updated_by` int(11) DEFAULT NULL COMMENT 'ปรับปรุงโดย',
  `priority` int(11) DEFAULT NULL COMMENT 'ความสำคัญ',
  `urgency` int(11) DEFAULT NULL COMMENT 'ความเร่งด่วน',
  `created_date` date DEFAULT NULL COMMENT 'วันที่แจ้ง',
  `request_department` int(11) DEFAULT NULL COMMENT 'แผนก',
  `request_title` varchar(255) DEFAULT NULL COMMENT 'หัวเรื่อง',
  `request_detail` text COMMENT 'รายละเอียด',
  `request_date` date DEFAULT NULL COMMENT 'วันที่ต้องการ',
  `broken_date` date DEFAULT NULL COMMENT 'วันที่เสีย',
  `locations_id` int(11) DEFAULT NULL COMMENT 'สถานที่',
  `remask` text COMMENT 'หมายเหตุ',
  `docs` text COMMENT 'รูปภาพ',
  `approver` int(11) DEFAULT NULL COMMENT 'ผู้อนุมัติ',
  `approve_date` date DEFAULT NULL COMMENT 'วันที่อนุมัติ',
  `approve_comment` text COMMENT 'ความคิดเห็นผู้อนุมัติ',
  `job_status_id` int(11) DEFAULT NULL COMMENT 'สถานะงาน',
  `ref` varchar(255) DEFAULT NULL COMMENT 'อ้างอิง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_repair`
--

INSERT INTO `request_repair` (`id`, `repair_code`, `created_at`, `updated_at`, `created_by`, `updated_by`, `priority`, `urgency`, `created_date`, `request_department`, `request_title`, `request_detail`, `request_date`, `broken_date`, `locations_id`, `remask`, `docs`, `approver`, `approve_date`, `approve_comment`, `job_status_id`, `ref`) VALUES
(1, 'RP-6611-0001', '2023-11-04', '2023-11-13', 1, 1, 2, 2, '2023-11-04', 1, 'Lorem ipsum is placeholder text commonly', '', '2023-11-04', '2023-11-02', 1, '', NULL, 24, '2023-11-10', 'yes', 2, 'WWLUmMFqBYC7s8pdZLPa6-'),
(2, 'RP-6611-0002', '2023-11-07', '2023-11-07', 1, 12, 2, 2, '2023-11-07', 1, 'Lorem ipsum is placeholder text commonly', 'Lorem ipsum is placeholder text commonly', '2023-12-01', '2023-12-01', 1, '', NULL, NULL, NULL, NULL, 2, 'PCAY74OIPhHxQ-6gqjWb4Y'),
(3, 'RP-6611-0004', '2023-11-07', NULL, 12, 12, 2, 2, '2023-11-08', 1, 'ติดตั้งกล้องวงจรปิดห้องครัว', '', '2023-11-07', '2023-11-07', 2, '', NULL, NULL, NULL, NULL, 3, '2CdaLc76FV7tIzE7WVIvcc'),
(4, 'RP-6611-0005', '2023-11-07', NULL, 12, 12, 2, 2, '2023-11-10', 1, 'dsdfsdfsd', '', '2023-11-18', '2023-11-14', 1, '', NULL, NULL, NULL, NULL, 4, 'NAh1qzg8MNMwnpcnKi8qyi'),
(5, 'RP-6611-0006', '2023-11-07', '2023-11-13', 24, 1, 2, 3, '2023-11-08', 1, 'wwwwwwwwww', 'wwwwww', '2023-11-10', '2023-10-30', 2, '', NULL, NULL, NULL, NULL, 5, 'plaUYpkILdG9jXGATDttKg'),
(6, 'RP-6611-0007', '2023-11-13', '2023-11-13', 1, 1, 2, 2, '2023-11-13', 2, 'dddddddddddddd', '', '2023-11-15', '2023-11-15', 2, '', NULL, NULL, NULL, NULL, 1, '0XQ-Pta85BTHeBwuMjJ3q2');

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
(1, 'S01', 'ถังที่ 1', '', '#0C356A'),
(2, 'S02', 'ถังที่ 2', '', '#0174BE'),
(3, 'S03', 'ถังที่ 3', '', '#FFC436'),
(4, 'S04', 'ถังที่ 4', '', '#D2B48C'),
(5, 'S05', 'ถังที่ 5', '', '#0000ff'),
(6, 'S06', 'ถังที่ 6', '', '#3D30A2'),
(7, 'S07', 'ถังที่ 7', '', '#274e13'),
(8, 'S08', 'ถังที่ 8', '', '#ff00ff'),
(9, 'S09', 'ถังที่ 9', '', '#CE5A67'),
(10, 'S10', 'ถังที่ 10', '', '#FFA500'),
(11, 'Con', 'ถัง Con', '', '#800080'),
(12, 'N/A', 'ไม่ระบุ', '', ' #FF0000');

-- --------------------------------------------------------

--
-- Table structure for table `tank_destination`
--

CREATE TABLE `tank_destination` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `detail` text,
  `color` varchar(45) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tank_destination`
--

INSERT INTO `tank_destination` (`id`, `name`, `detail`, `color`, `active`) VALUES
(1, 'T1', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(2, 'T2', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(3, 'T3', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(4, 'T4', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(5, 'T5', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(6, 'T6', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(7, 'T7', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(8, 'T8', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(9, 'T9', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(10, 'T10', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(11, 'T11', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(12, 'T12', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(13, 'T13', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(14, 'T14', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(15, 'T15', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(16, 'T16', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(17, 'T17', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(18, 'T18', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(19, 'T19', 'ถัง 50,000 ลิตร', '#2B3499', 1),
(20, 'T20', 'ถัง 100,000 ลิตร', '#2B3499', 1),
(21, 'T21', 'ถัง 100,000 ลิตร', '#FF6C22', 1),
(22, 'T22', 'ถัง 100,000 ลิตร', '#FF6C22', 1),
(23, 'T23', 'ถัง 100,000 ลิตร', '#FF6C22', 1),
(24, 'T24', 'ถัง 100,000 ลิตร', '#FF6C22', 1),
(25, 'T25', 'ถัง 100,000 ลิตร', '#FF6C22', 1),
(26, 'T26', 'ถัง 100,000 ลิตร', '#FF6C22', 1),
(27, 'T27', 'ถัง 100,000 ลิตร', '#FF6C22', 1),
(28, 'T28', 'ถัง 100,000 ลิตร', '#FF6C22', 1),
(29, 'T29', 'ถัง 100,000 ลิตร', '#FF6C22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tank_source`
--

CREATE TABLE `tank_source` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `detail` text,
  `color` varchar(45) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tank_source`
--

INSERT INTO `tank_source` (`id`, `name`, `detail`, `color`, `active`) VALUES
(1, 'A', 'ถัง 50,000 ลิตร\r\n', '#e65100', 1),
(2, 'B', 'ถัง 50,000 ลิตร\r\n', '#8D7B68', 1),
(3, 'C', 'ถัง 50,000 ลิตร\r\n', '#A75D5D', 1),
(4, 'D', 'ถัง 50,000 ลิตร\r\n', '#394867', 1),
(5, 'E', 'ถัง 50,000 ลิตร\r\n', '#212A3E', 1),
(6, 'Stainless 1', 'ถังสแตนเลส', '#0277bd', 1),
(7, 'Stainless 2', 'ถังสแตนเลส', '#00838f', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `code`, `name`, `description`, `color`) VALUES
(1, 'KO', 'Koikuchi', 'Soy + Wheat + Seed mold + Brine(Salt + water)', '#0000ff'),
(2, 'LS', 'Less salt', 'Soy + Wheat + Seed mold', '#6fa8dc'),
(3, 'TA-R', 'Tamari Rice', 'Soy + Rice + Seed mold', '#9900ff'),
(4, 'LS-OR-FT', 'Less Salt Rice Organic Fairtrade', 'OR FT-Soy + OR FT-Rice + Seed mold', '#6aa84f'),
(5, 'TA-OR', 'Tamari Rice Organic', 'Tamari Rice Organic (OR-Soy + OR-Rice + Seed mold)', '#45818e'),
(6, 'TA-OR-FT', 'Tamari Rice Organic Fairtrade', 'Tamari Rice Organic Fairtrade (OR FT-Soy + OR FT-Rice + Seed mold)', '#274e13'),
(7, 'TA', 'Tamari', 'Soy + Wheat + Seed mold) เหมือน KO แต่เข้มข้นกว่า', '#4F4A45'),
(8, 'LS-OR', ' Less salt Organic', 'OR-Soy + OR-Rice + Seed mold', '#940B92'),
(9, 'LS-R', 'Less Salt Rice', 'Soy + Rice + Seed mold', '#FF8080'),
(10, 'LEES', 'ตะกอน', 'ตะกอน', '#45474B');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` int(11) NOT NULL,
  `ref` varchar(50) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์',
  `real_filename` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์จริง',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT NULL COMMENT 'ประเภท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`upload_id`, `ref`, `file_name`, `real_filename`, `create_date`, `type`) VALUES
(10, 'PCAY74OIPhHxQ-6gqjWb4Y', 'IMG_7473.jpg', '6187b8653810db1105dd7fb146fbc2c4.jpg', '2023-11-07 05:54:15', NULL),
(11, 'B86add2jPa4kC0ZalD_iCv', 'IMG_20231024_221003.jpg', 'd27f1a396f08499d1ed21aaa3e0652e6.jpg', '2023-11-07 13:42:26', NULL),
(12, '2CdaLc76FV7tIzE7WVIvcc', 'logo-pbpartner.png', 'c0e41f6e327ad69377c76267ac9b5cfc.png', '2023-11-07 13:58:50', NULL),
(13, 'NAh1qzg8MNMwnpcnKi8qyi', 'image004-2.png', '896ded1f2989ae3b408d43ea3a97ae81.png', '2023-11-07 14:02:10', NULL),
(15, 'plaUYpkILdG9jXGATDttKg', 'IMG_7552 - Copy.jpg', '3f24989c23ef887b0154c435610d5555.jpg', '2023-11-13 01:09:04', NULL),
(16, 'WWLUmMFqBYC7s8pdZLPa6-', 'NFC PLANT_3 - Copy.jpg', '5fafc75a68415ca27ae44d4e90ff70d0.jpg', '2023-11-13 01:09:55', NULL),
(17, 'WWLUmMFqBYC7s8pdZLPa6-', '293182_0.jpg', '0888b7bab2b4b15a661978d77a68f435.jpg', '2023-11-13 01:11:11', NULL),
(18, 'WWLUmMFqBYC7s8pdZLPa6-', 'pexels-photo-18587872.jpeg', '3e310132afbb48df96a470003663d388.jpeg', '2023-11-13 01:13:01', NULL),
(19, 'WWLUmMFqBYC7s8pdZLPa6-', 'NFC PLANT_3.jpg', 'fcf87d8176bc7e4fd099304b613f2b52.jpg', '2023-11-13 01:20:22', NULL),
(20, '0XQ-Pta85BTHeBwuMjJ3q2', 'NFC PLANT_3.jpg', '913e71370ca8a750633e8c24c7fc7590.jpg', '2023-11-13 01:21:19', NULL),
(21, '0XQ-Pta85BTHeBwuMjJ3q2', 'NFC PLANT_3 - Copy.jpg', 'f83e5ead49f6457b02c39b9eee3b01ec.jpg', '2023-11-13 01:22:15', NULL),
(22, '0XQ-Pta85BTHeBwuMjJ3q2', 'IMG_7530.jpg', '72cd5d53ad38594b5824842dab5e46c1.jpg', '2023-11-13 01:22:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `urgency`
--

CREATE TABLE `urgency` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `urgency`
--

INSERT INTO `urgency` (`id`, `code`, `name`, `detail`, `color`) VALUES
(1, 'minor', 'น้อย', NULL, '#1AACAC'),
(2, 'normal', 'ปกติ', NULL, '#005B41'),
(3, 'major', 'ด่วน', NULL, '#FE0000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thai_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ-สกุล',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `rule_id` int(11) DEFAULT '1',
  `department_id` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `thai_name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `role_id`, `rule_id`, `department_id`) VALUES
(1, 'admin', 'ผู้ดูแลระบบ', '2tzscTHLNpS0rJlIJx_Uz1qZnvi6yS_q', '$2y$13$YjwG6MXUIcpOyoMmzX9fDuXo854gmWBxG8SuzInWi4MSr9jZ.91Di', NULL, 'admin@admin.com', 10, 1689666356, 1699670204, 'SA3gozOob2BBbQR0Ue5t4mJQpoyb0gcp_1689666356', 2, 8, 1),
(2, 'demo', 'ทดสอบระบบ', 'lJsMEFiO-XjqJrVhH2aDcjXyrP0oC0vy', '$2y$13$bbMdrjq8fjTTMuEs43DPIuOVIhx1.AzYZQ6WUnJFLqggjRrqxaCme', NULL, 'demo1@demo.com', 10, 1689756005, 1699692001, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 2, 1),
(3, 'onanong', 'อรอนงค์ ชมภู', '2bj5VmZ1PEwJDerqRsj3fhE8i2zvsVZq', '$2y$13$08zXpjOdJu83tT84JNqebe3SMFVctXSfynLDfss3sFMiveC7tPEUS', NULL, 'chumphu2538@gmail.com', 10, 1689759317, 1699671283, '9NqfkSJcx8KkIodMLNCeH9HLqhOUmcxw_1689759317', 6, 8, 9),
(4, 'phitchai', 'พิชญ์ชัย พิชญ์ชานุวัฒน์', 'yJwBMulOJv3IDmDkCXrdYZ-VMEw_zwLZ', '$2y$13$wGZx2YliuaqG5mjrTzY4AupjPJBT15DBgnkqqj8MiCcwCT6z1PJl.', NULL, 'qc.northernfoodcomplex@gmail.com', 10, 1689759339, 1699671304, '4Zgy1uVGJvXg2nZOAHcFCSj0NK0Ll3Ze_1689759339', 5, 8, 8),
(5, 'prakaiwan', 'ประกายวรรณ เทพมณี', 'y2RYhV3E1NG68CUaa8svzBknRdbCTO79', '$2y$13$Skm6AuVq/Qi/E2r6BouzBOn.3GR8aJT5.iaHIpr2KCDsJLUPKU8B2', NULL, 'prakaiwan4213@gmail.com', 10, 1689759362, 1699671330, '2qNZk71gb01_K-bdCiscD38z36G9exZH_1689759362', 3, 7, 8),
(6, 'sale', 'ฝ่ายขาย', 'EHSvx6uElywR8fG2XRQ_xKE4sups-8cO', '$2y$13$0UZFJxx7tUAPdy972cvXEejPhldI17L0Ld7C3KnSKUk7KTLYVUP0y', NULL, 'sale@nfc.com', 10, 1689759388, 1699671371, '9ZnxmSRzPpvLgxD0MPSamdokpcp_eMul_1689759388', 10, 5, 13),
(7, 'planning', 'ฝ่ายวางแผน', 'JWT4BgIkYF4TIN62mLaKv5iL0uLMn7C9', '$2y$13$g08zQ7xjXISzs99kS2yApuOCRcV6QpMOfdzNAwYY8fP9N96pEuAye', NULL, 'planning@localhost.com', 9, 1689759413, 1698802241, '7xCjBXE9xNLx1gWqKX2LaVex2ah0IWt4_1689759413', 1, 1, 1),
(8, 'production', 'ฝ่ายผลิต', 'FjE8vrSWJ1uVTanpvQJDnpq_OiUySrzg', '$2y$13$Oa3U4rEqDwN8W0ytkDHCjuPw8CW4d44l9tEWbi3N3myBogr4mmzBy', NULL, 'production@localhost.com', 9, 1689759430, 1698802250, 'qNJ-e9RkWlfqvHqmvmSsItU1rlpb_D3j_1689759430', 1, 1, 1),
(9, 'watsara', 'วรรษรา หลวงเป็ง', 'XEPSPmb7Bt0oI_tklPUc5Uh4Jq4HM4Ig', '$2y$13$5iA/KWda5k7mbunRRwdNUOXn62jWJ/Ipoc.CzW3XYr69iVHThV1yC', NULL, 'watsara.nfc@gmail.com', 10, 1690430330, 1699671531, 't1iesBNA9TNHWotQHvGzbLCVhrK6LF9O_1690430330', 4, 7, 14),
(10, 'somsak', 'สมศักดิ์ ชาญเกียรติก้อง', '3tiUcswenYgRTZTfuvfv_Tv4V7BXwAcn', '$2y$13$RaVMZpvieW5IfdwpInG4JejNTn8rb7rTCluwPUDO6R8kAJBj1l7D.', NULL, 'somsak@northernfoodcomplex.com', 10, 1691631165, 1699671579, 'Pj5G3y6R8VeykAb0cyXVIHChtnlpquo9_1691631165', 3, 8, 1),
(11, 'peeranai', 'พีรนัย โสทรทวีพงศ์', 'G3b3XCgv3uFzzly7jDX0cJXzNm45qoUV', '$2y$13$5gM/232mFQdlLwbqiQOdE.n2zbN3cLuDGdhIsTK0USk.ASVILRPZy', NULL, 'peeranai@northernfoodcomplex.com', 10, 1691631423, 1699671596, 'HmjAFfcWByo3VbwpZDD9qeBA-shqds8q_1691631423', 3, 8, 1),
(12, 'theerapong', 'ธีรพงศ์ ขันตา', 'tWXwJZ5JEXbWCN0M-0zpCouAUJcL5BwZ', '$2y$13$WG5mTZIZ4ZcL3BoA/vA/7urFzlU2xQ2g4NU29gJegyCCcIte0TCP.', NULL, 'theerapong.khan@gmail.com', 10, 1691639318, 1699684736, NULL, 2, 8, 12),
(14, 'yosaporn', 'ยศพร พยัคฆญาติ', 'GOI-0AQj0nAYGBIpppuSe-O3IK4OSs2h', '$2y$13$gnj.Vuf7hYLvMcPCesdU4eXqC4GAZR0iwhYbvBcVxlPNnTvB9mmji', NULL, 'ypayakayat@yahoo.com', 10, 1692180393, 1699671626, NULL, 3, 8, 4),
(15, 'sawika', 'สาวิกา พินิจ', 'GOI-0AQj0nAYGBIpppuSe-O3IK4OSs2h', '$2y$13$ggQkc27TiQ2iQSAW6jcr3OpNGzVRjsE5/etsA7BeM5MubC/RwnhP.', NULL, 'sawika_pinit@yahoo.co.th', 10, 1692180393, 1699671650, NULL, 3, 8, 7),
(16, 'premmika', 'เปรมมิกา พินิจ', 'GOI-0AQj0nAYGBIpppuSe-O3IK4OSs2h', '$2y$13$JNF9k6WursfrumEFcQkYCO1aM6Ikced40Zwsa0wIaOtrGDTBM/Y0y', NULL, 'pinit@yahoo.co.th', 10, 1692180393, 1699671711, NULL, 4, 7, 5),
(17, 'charinee', 'ชาริณี จันต๊ะนาเขต', 'wLQMbhfIHnG07ZHdPZA2IGb5JfIWjm37', '$2y$13$jbb8tfUMLQNpU40y65.1yei8N.iKlbQ5JZg7HA6fFABmc7wvDqyjy', NULL, 'charinee@localhost.com', 10, 1698800364, 1699671733, NULL, 1, 1, 9),
(18, 'benjarat', 'เบญจรัตน์ คงชำนาญ', '-WVnwHhiOWQdUJ3KYypIVVJ1WgFO_NUv', '$2y$13$q4n53.fViyRFwgVoxnWiw.PwWLsY4uuWLRetp8iTIypiYFqcXCJ/W', NULL, 'khongchanan1996@gmail.com', 10, 1698800565, 1699671747, NULL, 1, 1, 9),
(19, 'natthawat', 'ณัฐวัฒน์ วรรณราช', 'Kb6gw6VW_6c9O_CAnGJPnhsX85rF9zyx', '$2y$13$El.F4z5hUULPGAorAABTSObuecQ88VldJxIPZkIT8pRY79tZHuRG2', NULL, 'coi.northernfoodcomplex@gmail.com', 10, 1698800639, 1699671767, NULL, 1, 1, 8),
(20, 'thaksin', 'ทักษิณ อินทรศิลา', 'TZGAEflaZm143CsHlFjJZMMYZdKQeMVE', '$2y$13$BwKpULbKpy7h4gpHinfdJelEu3LEtHGC.mEKhvZWmD1HJlThpFuuq', NULL, 'notethaksin@hotmail.com', 10, 1698800733, 1699671798, NULL, 7, 8, 3),
(21, 'chadaporn', 'ชฎาภรณ์ แก้วคำ', '7HasNWHP_M5-W_fBPDKb1M_0sXyd2Dsc', '$2y$13$O66yoesXcMWn1fNB3AUmiubpNRcH9q/VDv5ARGQT3aMjLU8fIr.7a', NULL, 'kaewkhamchadaporn@gmail.com', 10, 1698801098, 1699671819, NULL, 4, 7, 3),
(22, 'araya', 'อารยา เทพโพธา', 'iOtjB0XK4SiRHsuOwg_vudd0epMz0wHW', '$2y$13$FwNHx5QgPEdvr3fO9TksmOQXoc/YN/fKpbMXvy5ehf/8WBdiMGVnS', NULL, 'araya.thep@gmail.com', 10, 1698801169, 1699671866, NULL, 3, 8, 2),
(23, 'suphot', 'สุพจน์ ช่างฆ้อง', 'vGAi-pbCSZLcDRzbxOZ5w9sPllCdSFQq', '$2y$13$dvgxE11A.6VlEWx2ZF6ODeijXkZI01I2cTcsF30DFG0n5MYoPKioa', NULL, 'changkhong.8777@gmail.com', 10, 1698801231, 1699671892, NULL, 4, 7, 6),
(24, 'suriya', 'สุริยา สมเพชร', 'BACKO9VW3y79pLaoZvOiQtX3OWZzuDQI', '$2y$13$BtJJseMYMycRgZMLsg1Rd.h7cJzilYsTpnyiUdlgxWDK8SwPfXt8S', NULL, 'suriyasompatch@gmail.com', 10, 1698801309, 1699671908, NULL, 3, 8, 6),
(25, 'yotsapon', 'ยศพนธ์ โพธิ', 'wmyXWYgzYvewSqTMmgf9CFDD_ryIM5nl', '$2y$13$SbsFYkqKBTQ3990SGOBnsOOl4Ad7LmnnIZMvz7Now6e/onXWuY70K', NULL, 'yotsapon@localhost.com', 10, 1698801387, 1699673576, NULL, 12, 1, 6),
(26, 'sutahatai', 'ศุทธหทัย ชุูกำลัง', 'LFeQidH3yohyJ3Qc1MOKuZJm27IAZFH0', '$2y$13$kNAosJDYUybr2UHmB02W.edEc8AoY8XJqWs7/FcpbF./0wtnPwZVO', NULL, 'rd.northernfoodcomplex@gmail.com', 10, 1698801460, 1699671954, NULL, 4, 7, 10),
(27, 'phannipha', 'พรรณ์นิภา พิพัฒน์ธัชพร', 'I4QgffOFLAp2wWgH0d5rBIWF-CCeG_4k', '$2y$13$1WGGnfxnKfgORW2jhudi4e9Nbh0ZhZOgrpXjaWnjba82XZQFwHyhK', NULL, 'pipat.pannipa@gmail.com', 10, 1698801550, 1699671992, NULL, 3, 8, 5),
(28, 'jiraporn', 'จิราภรณ์ กาบแก้ว', 'w0GFJQICSa2Ad9453hYPNUMf6Svm1WdX', '$2y$13$hiVIDOSOelsK3/XPYDH0KOFvgUFHLK9uDkZ814owQSIRvnBw.idFi', NULL, 'planning@northernfoodcomplex.com', 10, 1698801621, 1699672249, NULL, 4, 7, 7),
(29, 'taweekiat', 'ทวีเกียรติ คำเทพ', 'tjJu-rUAKYmyXN6v5wZxaESahe2EYKwx', '$2y$13$829fqk8R5kYhEHoVcozHP.RXSixc9NkkSWQU5X.Vo12E.AUstI9S2', NULL, 'd.taweekiat@gmail.com', 10, 1698801681, 1699672095, NULL, 3, 8, 4),
(30, 'kunrathon', 'กุลธร ดอนมูล', 'qD0mmuOHZ6ZNXs81dppLg3VBB1fQTrcn', '$2y$13$ox0loKGJwrz6bVgn8/MHne1/E8G5AMoTkiqSaVoNpyxGA5cUitIbG', NULL, 'pd03.nfc@gmail.com', 10, 1698801766, 1699684673, NULL, 12, 1, 4),
(31, 'manop', 'มานพ ศรีจุมปา', 'skTB0VTY-7RcVfokMQRjtZjsic0xFo5e', '$2y$13$vCwFZ69vuJKmxzb0wLq73eJjuHFCMJwpOPBUBqf6ERVJqYlIsJTKW', NULL, 'manop.s@local.com', 10, 1699672763, 1699673252, NULL, 11, 1, 6),
(32, 'natthaphon', 'ณัฐพล ขันเขียว', 'agve9wCBQNQsnst59xpLAFBW6Cq7IRLd', '$2y$13$PpNjwUwiwA5ir249i7QGEe6u6BL9TviklOe7LO8e/66M5Km.w0EAO', NULL, 'natthaphon.k@local.com', 10, 1699672822, 1699672822, NULL, 4, 7, 6),
(33, 'komsan', 'คมสันต์ สมบูณ์ชัย', 'qm1hqRc6dLA5L6_UtbmUl1TLAd_D7x9S', '$2y$13$1H7H7WlSc6pm.GV90f9gWuyOf.jZGYpQvTwNQCyAcTkKje71VKrfS', NULL, 'komsan.s@local.com', 10, 1699672864, 1699673236, NULL, 11, 2, 6),
(34, 'sarawut', 'สราวุฒิ โฆษิตเกียรติคุณ', '5_HL5jD2jOAGgRMlzrCGje_mnMVAwrM2', '$2y$13$G3VfQ0sSZItb7c7D0wp9Qu7/C8up3ac.M/QAvQwL7D8G0l90aY0PK', NULL, 'sarawut.k@local.com', 10, 1699673427, 1699673427, NULL, 11, 2, 6),
(35, 'sutap', 'สุเทพ ปวงรังษี', '4ZC6I_pSHZUeKxy0bTWJVJ5OoBU3tyaG', '$2y$13$Qg.BsbzBO79f4LAgQA2q5.Lq2PCB3BXoG2Omy9HRIkGGWczrTqtN2', NULL, 'sutap.p@local.com', 10, 1699673470, 1699673470, NULL, 11, 1, 6),
(36, 'jadsakorn', 'เจษกร คำวรรณ์', 'UpcQnJlQ5ym-tl4ln6RR9lncaVqNEDeE', '$2y$13$elUuASkqoaFpcj4XH8OCE.evOp0652TKPRpayG5e2V2ObS0Wh38eq', NULL, 'jadsakorn.k@local.com', 10, 1699673508, 1699673508, NULL, 11, 1, 6),
(37, 'narongsak', 'ณรงค์ศักดิ์ แซ่จ๋าว', 'KEFY3yiKK0Vu6cL8ZbBVnhvA_e-GmDOH', '$2y$13$2qsIhzxqZNVwdzllVCDeaefAQNRseU3hsproLCerh0WpogDJ0zD2a', NULL, 'narongsak.s@local.com', 10, 1699673668, 1699673668, NULL, 11, 1, 6),
(38, 'panuwat', 'ภานุวัฒน์ ยางรัมย์', 'KlXe_M-3gpwuMycTgSa3b2cHG4sszYbu', '$2y$13$jJOfZ6JxXLACSauDohJCWOaMMbeqT0vcx.P9u2OyViCMkNCAd6MVm', NULL, 'panuwat.y@local.com', 10, 1699673713, 1699673713, NULL, 11, 1, 6),
(39, 'ratsamee', 'รัศมี ศศิยศพงศ์', 'ZwwiwqfFPKF3Qyw0RCufsRwieogeqkKA', '$2y$13$yL81Y4Cw45VCKTU5EZqZr.jWIoZGT2RrCOxshvfPljAvK9Jk6mDvO', NULL, 'ratsamee.s@local.com', 10, 1699684280, 1699684280, NULL, 1, 1, 11),
(40, 'kanprapha', 'กาญจน์ประภา ไพยราช', 'WDv33rQp0vRaL5mKrkznfJ268027UF5a', '$2y$13$/OeA8PeP.Vj6U3oZ5PKxpOk5fbtGD0xu.U4tioVEVnMPUovRK4Z0e', NULL, 'kanprapha.p@local.com', 10, 1699684322, 1699684322, NULL, 1, 1, 11),
(41, 'chanika', 'ชนิกา เรือนมูล', 'sA-NLySBUOSDB8XSWsh1AqoCQrKjroAX', '$2y$13$mWHXF4/l1LV3Ion3DIe2MuZy9OVQf4.x09BOqCRCrDr9oN.IZ5EDK', NULL, 'chanika.r@local.com', 10, 1699684367, 1699684367, NULL, 1, 1, 9),
(42, 'tanyarat', 'ธัญญารัตน์ นิ่มวงษ์', 'BAPZkF-0tqu3qK6uVtDff5FZwWHby_lY', '$2y$13$sdHoyCV5cbYP3XU4ZXaX2u0Cvq7spJmxMG35PQCMcoltC0fYJji5y', NULL, 'tanyarat.n@local.com', 10, 1699684417, 1699684417, NULL, 1, 1, 5),
(43, 'kannika', 'กรรณิกา คำภีระ', 'ggE1RcJqk0OyaVS9mj-zB8J37fqtvbq7', '$2y$13$f0HOv./6JmeM.J7dKEWfuOSzqrqk7DlURbJM.MFxoMwvDarAFfKe6', NULL, 'kannika.k@local.com', 10, 1699684493, 1699684493, NULL, 1, 1, 2),
(44, 'sasicha', 'ศศิชา นัตสิทธิ์', 'haaNM8Y3gwJCsL2RvvpP7RioUNVkLCoy', '$2y$13$hAzgJSVrKlqP.TRpOn8q2OuSjkJoz/uSjGqDBPqceY62vOmfOIi..', NULL, 'sasicha.n@local.com', 10, 1699684519, 1699684519, NULL, 1, 1, 2),
(45, 'pranee', 'ปราณี แดงโคตร', 'fxatETyZYQcw4G9WLuk2DeD6tigRLSpx', '$2y$13$FO383fbroT26IGpfszXMeOHS34ynJIZCCBRmMbq8snhFHVwzgyii2', NULL, 'pranee.d@local.com', 10, 1699684567, 1699687879, NULL, 12, 1, 3),
(46, 'kullanisnaree', 'กุลนิษฐ์นรี เจริญจิตรวี', 'xbVfqgX0yJppq1rvKaczeuystm7HWTRr', '$2y$13$QttBiyiA3CPqVPqThJSWgOQU9GFrCAULddMh6hiRtWTNzcUdChlZS', NULL, 'kullanisnaree.c@local.com', 10, 1699684607, 1699684607, NULL, 1, 1, 4),
(47, 'nisarat', 'นิศารัตน์ คำขัด', '6qWMOvel4G-Fd9yAcmJFuP60dIxGDvYo', '$2y$13$bfM4SCN1ldNnHouY9WtR2eRQz4cnX1vX3P0VXrYcezwOx6fPFogsi', NULL, 'nisarat.k@localhost.com', 10, 1699684659, 1699684659, NULL, 4, 1, 4),
(48, 'boonsong', 'บุญส่ง เสียงใหญ่', 'wOK4AATzCwJIwVr0fAC3KpJwsvS6Xjno', '$2y$13$L76aWdu8ddo4x7xXmmmEQOay743a2qNZfqmOe4eml.3TspUNKEEwS', NULL, 'boonsong.s@local.com', 10, 1699684807, 1699684807, NULL, 1, 1, 3),
(49, 'somchat', 'สมชาติ พิจุมปู', 'uPey51SyvEKmcVMhoGVpYk7u4jkOL3dt', '$2y$13$O2o89NXut12mRzgQVbPYnOmttqxE78L6eP4ci422BscHgtXocSUYa', NULL, 'somchat.p@local.com', 10, 1699684842, 1699684842, NULL, 1, 1, 3),
(50, 'mana', 'มานะ คำเป็ง', 'QUNckltEY9HOcWtsAjD-FV5SIS1F9EQP', '$2y$13$3VSDYcZCsnRrzoPEJuTtXuRFOSfNdJLLebESf2/JejBMKy5Q5MD/y', NULL, 'mana.l@local.com', 10, 1699684865, 1699684865, NULL, 1, 1, 3),
(51, 'songkarn', 'สงกรานต์ พรมจักร์', 'nVXtegNye3Vc7vG4fs9plrF2C4Me6cMe', '$2y$13$l2QiQ70Ibkm6865I/pn2f.vtT8fQcT9zuUv.6H.Pk.INLFa0ayB0q', NULL, 'songkarn.p@local.com', 10, 1699684934, 1699684934, NULL, 1, 1, 4),
(52, 'sanong', 'สนอง เสียงใหญ่', 'dibJ2WhwtBhspSNDG8YrdNlq2PV0gn14', '$2y$13$fPhHkslEMoi9RvuvOQUk7OTWOUoqQJxi2CkLpsql0eZfZKxm1ucVq', NULL, 'sanong.s@local,com', 10, 1699684958, 1699684958, NULL, 1, 1, 4),
(53, 'kampon', 'กัมพล สิงห์แก้ว', '8AQqEtzYHPxTol0oCpW3cs2aM80rWTZa', '$2y$13$vq4PPEUZovhoFoKhxYSCWuIGTSlDvHNFBvN4AQ7xUWuwqKr00eUoC', NULL, 'kampon.s@local.com', 10, 1699684984, 1699684984, NULL, 1, 1, 4),
(54, 'boonyung', 'บุญยัง ม้าแก้ว', 'OdkiGuMQ2nulHBhvROue3jLuXSH7SpU6', '$2y$13$cNvIo43kIRYlwWkvJmhgUexDtkwgxTYYMPgNtPrF5R6Ne68YBdMLq', NULL, 'boonyung.m@local.com', 10, 1699685010, 1699685010, NULL, 1, 1, 4),
(55, 'natthapon', 'ณัฐพล ศิริชุมภู', 'vhwHqw2oDqrjq856haquL9Y-skl8AIOx', '$2y$13$YNqhMpa0Zz3VqzN9pt7UYOVCAXa.jW74YrEMOJwIjbNjK6uiaXQdW', NULL, 'natthapon.s@gmail.com', 10, 1699685055, 1699685055, NULL, 1, 1, 4),
(56, 'yuthapichai', 'ยุทธพิชัย ศิริจักร', 'J0BsQX2qs7dH40tEJZeFO22Hads2k6Xi', '$2y$13$YI3aV3k0ZN6dSbCtauyB/unpxn7dIbQMbMIpQLOY5o2S1UxIK6B5m', NULL, 'yuthapichai.s@local.com', 10, 1699685104, 1699685104, NULL, 1, 1, 4),
(57, 'praphawith', 'ประภวิษณุ์ ต๊ะตา', 'EfqNnCEzWwGBPxvlt-zzUoaD1NR4LOSV', '$2y$13$un.za5avahG7uaJAhsHykentDrEVt.D9b4lL.NTcuR619gWDF/t2W', NULL, 'praphawith.t@local.com', 10, 1699685148, 1699685148, NULL, 1, 1, 4),
(58, 'yotsakorn', 'ยศกร ศิริชุมภู', 'y90we65IJjIjTVLSVGC8tJqLwiINpwz4', '$2y$13$wSt1TWJoRVJMSANte94wfe1ChnFV7XHcUv.JJYwJ1gl9YVc2yhwdW', NULL, 'yotsakorn.s@local.com', 10, 1699685190, 1699685190, NULL, 1, 1, 4),
(59, 'jarun', 'จรัญ ดอนเลย', 'kjq19KvF5ziBaRz5qrqjx5dugcZFM50s', '$2y$13$N.0IagO8xjKThH2pN5UWPOB/kZvMMjis2zrBIeNGS7yrcw.egvZV.', NULL, 'jarun.d@local.com', 10, 1699685220, 1699685220, NULL, 1, 1, 4),
(60, 'ongart', 'องอาจ ชุมภูโร', 's9emD5sGgatRTvmjx2lAIesnIoaP9Tly', '$2y$13$xZ.4uRfIA4g10TR8Iuf9H.P3WrvGZAteswlhRh31LSLXI/Kpy8yIe', NULL, 'ongart.c@local.com', 10, 1699685260, 1699685260, NULL, 1, 1, 4),
(61, 'jiraroch', 'จิรโรจน์ ทองเทพ', '0ZOIowngY_I8QO_bvI_A0EoCFdVbUFdN', '$2y$13$brw.ksMKMEnHwWNZh/sna./76FHO8svzLYMlqhQDhEba.1l63FGbW', NULL, 'jiraroch.t@local.com', 10, 1699685289, 1699685289, NULL, 1, 1, 4),
(62, 'sawitee', 'สาวิตรี วันโน', 'KS3_21E3ptIJdbtxolF-XEre2bwgtHKN', '$2y$13$SFKRwJybq12JFjEkt1BqBOWnMZJ3KqV6v8i7lNQq/zbnx.OC2tGhe', NULL, 'sawitee.w@local.com', 10, 1699685316, 1699685316, NULL, 1, 1, 4),
(63, 'kittipong', 'กิตติพงษ์ วงค์ไชยา', 'CDVMYioQrVVFqCragdOVk5wOaW87_zpp', '$2y$13$oS6rOFLq1bUqOAx8c5xWT.ndtPNoFfSddTzhPP646.ONoPE9EcvyG', NULL, 'kittipong.w@local.com', 10, 1699685357, 1699685357, NULL, 1, 1, 4),
(64, 'sirichai', 'ศิริชัย จันทร์ถา', 'yTzdJjTHHRVsSCCLcENHXYg10H2A9xwG', '$2y$13$cjjMyGOCm1kMnZu1EitByegatBv5GtL7uHRTiPi88451RPcVGoG7K', NULL, 'sirichai.j@local.com', 10, 1699685389, 1699685389, NULL, 1, 1, 4),
(65, 'kamon', 'กมล ไชยชมภู', 'JHUCq2z9HhVADGLuA_i7dAiJDhsa1wR2', '$2y$13$SKOaeWe9fPaQCM1Tjgr9HOKfDwptVlIGJKVKk3Q8cq4ioOy9tryKe', NULL, 'kamon.c@local.com', 10, 1699685412, 1699685412, NULL, 1, 1, 4),
(66, 'donlawan', 'ดลวรรษ อัมพวานนท์', 'zHSjvSE6aExt-MrCVYpYk5jyxjNjayYc', '$2y$13$EUpf8KVLaRCPUveXN19ns.nvfiyJHuGjnFpJvAhHdBUgT3q4iyVxa', NULL, 'donlawan.u@local.com', 10, 1699685446, 1699685446, NULL, 1, 1, 4),
(67, 'phadungkiat', 'ผดุงเกียรติ์ คำนึงเชิดชูชัย', 'toj21i1GkAPuGCM5nuyq_mTXEdfrBqV7', '$2y$13$PW6RkVM1Zki0KMLw/9HP/O1OPwBhrbOvLGwUqkp7EDV2lGgBbjmtC', NULL, 'phadungkiat.k@local.com', 10, 1699685477, 1699685477, NULL, 1, 1, 4),
(68, 'poramak', 'ปรเมฆ แซ่พากู่', '93zBcw6pjBHq22BwYc8dIIp8XSUebKq8', '$2y$13$cJAPYebK/8wqZub5qlb41e7llO5jgPdz.AkkBKm67z1qulq3Ik4X.', NULL, 'poramak.s@local.com', 10, 1699685522, 1699685522, NULL, 1, 1, 4),
(69, 'wuthipong', 'วุฒิพงศ์ เผือกขวัญนาค', 'HOwpkCP0spLPMQMprCXC4jKP6y_l4iaf', '$2y$13$dYG9Lc8QjAdVltJ2oJZQ3u5i307Dkc4HwtS8fJCl5tENblg7Xu.Mm', NULL, 'wuthipong.p@local.com', 10, 1699685559, 1699685559, NULL, 1, 1, 4),
(70, 'wasana', 'วาสนา วรรณโล', 'RXZ1AQ7Ap15oCBjGUDocd0qebNA-8vHP', '$2y$13$zP0EZbQQgNqbQ/yUkJ.z9et6ZXdaG/vvwj.yo3Qv63kAYQGXgxJYa', NULL, 'wasana.w@local.com', 10, 1699685583, 1699685583, NULL, 1, 1, 4),
(71, 'theera', 'ธีระ รชตะภัทรพงศา', 'RHJJhDLtiGJvTEfzrfL9ysApUOBAiWzG', '$2y$13$Zun/MKceA2I79/Os8jAt1urJ8Xq.mMEVf8EWq7QMUbxUi1keyD.ca', NULL, 'theera.r@local.com', 10, 1699685621, 1699685621, NULL, 1, 1, 4),
(72, 'santi', 'สันติ วงค์แสง', 'TRyJy7AqIjL5mXMAw-x2smyyqDp7GoJ-', '$2y$13$BWOQByqWgczjf8nIjGy2I.lCPAOPK/.FTRwgj7nS0KRiV3m0LknKq', NULL, 'santi.w@local.com', 10, 1699685644, 1699685644, NULL, 1, 1, 1),
(73, 'jadsadakorn', 'เจษฎากรณ์ วรรณโล', 'uoDFZV_MMJmjdz8eRv8R7TVMuNfkHtnt', '$2y$13$9/lMYQpYeP1c7GajJNNJMuyTRIhtut7sc3th1oTvI8W7vQ9ZF6YoS', NULL, 'jadsadakorn.w@local.com', 10, 1699685685, 1699685685, NULL, 1, 1, 4),
(74, 'bordin', 'บดินทร์ เชมือ', 'qP3gksAxn_bPXbBpyjUuka4WD_fa5YNi', '$2y$13$pKHCCeY./ENt/IDzGMaBhO.p764xSG2q/vwyOXAWH3NSQAQr07QV2', NULL, 'bordin.s@local.com', 10, 1699685711, 1699685711, NULL, 1, 1, 4),
(75, 'noppakun', 'นพคุณ กาบแก้ว', 'qcdUNFTxqGp0AG67Zdg7lIg_jDS5Teqq', '$2y$13$sACEjv94sx9FHZScmm5Yr.iYRzhpyKUVOzPnfZ.vdnyUw16igqseu', NULL, 'noppakun.k@local.com', 10, 1699685754, 1699685754, NULL, 1, 1, 4),
(76, 'nakarin', 'นครินท์ กึกกอง', 'DElk_jB4tJaW0_HkCY0HvobhDL-12O9_', '$2y$13$z7FSHlygIhjwRdIXseZ1H.uEyozXHEn1LpsLgt0v2jLsCfLPnjGsK', NULL, 'nakarin.k@local.com', 10, 1699685786, 1699685786, NULL, 1, 1, 4),
(77, 'kittisak', 'กิตติศักดิ์ จักใจ', 'lWRQ3vlEwLUrDaI65ycC0zL7P4Au455Z', '$2y$13$dkdsYMnEaAH719nyPRhSnu2s7PLfPLSXaQkJQN52cAULrx3G9/G1i', NULL, 'kittisak.j@local.com', 10, 1699685825, 1699685825, NULL, 1, 1, 4),
(78, 'veerayuth', 'วีรยุทธ จุมปูโล', 'A9vrsSIADPEAysCtiS9w_c9kYcOLvcSh', '$2y$13$l5xusTRhTthuK5dJD9t4V.jHxUXCOLWz6rXjXLZJYhHusPxukS0h.', NULL, 'veerayuth.j@local.com', 10, 1699685858, 1699685858, NULL, 1, 1, 4),
(79, 'somkid', 'สมคิด คำยานะ', '1kM4Ch6D5qrI1XbvSY0Y4GQqT8YLG07N', '$2y$13$gfBtlapjTHkVMdwgOwI7LOlStgaYc75sr0DvHvneD.l9xRCeCRMH.', NULL, 'somkid.k@local.com', 10, 1699686011, 1699686011, NULL, 1, 1, 4),
(80, 'pensri', 'เพ็ญศรี ช่างฆ้อง', 'ptkx46QYcn2bwwfen63qGKPGQAKcxYyl', '$2y$13$WTdA7QWaNWextKEdS6TvHOzlhqcOgIuHDN7PCsTz4AMdDMvJhfEA2', NULL, 'pensri.c@local.com', 10, 1699686063, 1699686063, NULL, 1, 1, 4),
(81, 'wanpen', 'วันเพ็ญ บรรดิ', 'nkgFRZiOfCcB3jyqyDFbsCk1YSvC3xs6', '$2y$13$7KLRrgkEGCKMHCSLYe2vK.tFWhcGonLSvN2P/dZKSB59KTTOrnbfK', NULL, 'wanpen.b@local.com', 10, 1699686102, 1699686102, NULL, 1, 1, 4),
(82, 'wipada', 'วิภาดา ไชยชมภู', 'jFF_jEUzhVDt6FALP3vYcbkXKW3hOana', '$2y$13$T/BXTqVf1rPQaS960SVW2.HRj5CFo1w3XAn9hA1YHavMrC8Wk.olS', NULL, 'wipada.c@local.com', 10, 1699686130, 1699686130, NULL, 1, 1, 4),
(83, 'kanya', 'กัญญา เลิศชมภู', '_wJa7uhYYv5HUhjmF093L8QWTjk4J6WW', '$2y$13$oVkpuXWP/S5AK4Kb6GeFDOU6LQDeHYdIPzmaNr/OWlDM4jWbiAgE2', NULL, 'kanya.l@local.com', 10, 1699686155, 1699686155, NULL, 1, 1, 4),
(84, 'wimwipa', 'วิมพ์วิภา รักรุ่ง', 'A9oVWCPsXV2k_I2Teax3vJwJukNrhWhn', '$2y$13$..DFYKujzWCKUwhPGdf3w.iQ0adj/o3c4Wj3OIJpKEqXRrycPsYxW', NULL, 'wimwipa.r@local.com', 10, 1699686260, 1699686260, NULL, 1, 1, 4),
(85, 'jeerapong', 'จีระพงศ์ สุเดชมารค', 'CpQnZXgr14sFpReg0h1WFzxn_iR160-G', '$2y$13$5eFDM.iq4oHSVUkraF7uXuorFb9HBVic3J9CMSLTMd9aj9hnvCGOu', NULL, 'jeerapong.s@local.com', 10, 1699686292, 1699686292, NULL, 1, 1, 4),
(86, 'chalurmchai', 'เฉลิมชัย สีเขียว', 'Z5xBDmTuAQ6NSNR5Rc90Mr2JEBfNLIB8', '$2y$13$/V/6tlptlPBx5yqQpyIOw.DqiINnWx.v0Xkj4AzTO0aJCMaZpefj.', NULL, 'chalurmchai.s@local.com', 10, 1699686323, 1699686323, NULL, 1, 1, 4),
(87, 'atthapon', 'อรรถพล เครือวงค์', '5a6cwqT361_OtnjtaXCA926gY6S3PnT-', '$2y$13$JkGjtU1Z0jiwrKbLLCIqAuoug1fzWyUpq7Rs5PL5iJc63Dee.Sinq', NULL, 'atthapon.k@local.com', 10, 1699686352, 1699686352, NULL, 1, 1, 4),
(88, 'wannapa', 'วรรณภา เหมืองหม้อ', 'wSZTo5ls2FGCH65lbBTfs_SMBo0sUxtz', '$2y$13$B0TE7FrSIbsIbDW/3kXh0.p3Aov713CwHXNp9dg33fdlk3xBnpqX6', NULL, 'wannapa.m@local.com', 10, 1699686377, 1699686377, NULL, 1, 1, 4),
(89, 'jiranan', 'จีระนันท์ จรรยา', 'HZEEzX3LYWtH8HCWTvJeHOdDMo5aPb7B', '$2y$13$G1IgvDM7BRiPLu7p.Xd0ku4T9aa/TimQuCYAPb0exygjTo/XjLstK', NULL, 'jiranan.j@local.com', 10, 1699686398, 1699686398, NULL, 1, 1, 4),
(90, 'penpayom', 'เพ็ญพยอม เครือวงศ์', '3uzpB3yEv8rKMi7ecIS5t1UBWF4F0soW', '$2y$13$zt.1Ofkjq6Qw.uTsaoMcge2RPUjRAzZvS.7mZHsmqc0Q04OjQB9RC', NULL, 'penpayom.k@local.com', 10, 1699686425, 1699686425, NULL, 1, 1, 4),
(91, 'narongsakpd', 'ณรงค์ศักดิ์ แซ่วื้อ', 'yC5anyf5l7nwHsY4lxnIeaPnN_Bvvd4d', '$2y$13$LPNkgA.HTshd/aTe8lS2guF7HA2vJh1G9NZr3zRZvENYlBxJWKcJO', NULL, 'narongsakpd.s@local.com', 10, 1699686470, 1699686470, NULL, 1, 1, 4),
(92, 'sumalee', 'สุมาลี วิจิตรพวงชมพู', 'j1_KpWX9gqdB3ldEgtVIIkQkjIznMC8V', '$2y$13$840bif1HLJKKch1IC..mbuH50r6DHiJGydX.wEukVJJ/SIRMe4T3u', NULL, 'sumalee.w@local.com', 10, 1699686524, 1699686524, NULL, 1, 1, 4),
(93, 'suwimol', 'สุวิมล ยาวิละ', '2LyaKKzkX4xaUm1xZ0rqmuibyWZlRnHn', '$2y$13$eKu1nqzO1nkL8cIF/AtPYeMe9rq/aNXgt7rHzBieQ5ZuLO7V.TAHq', NULL, 'suwimol.y@local.com', 10, 1699686562, 1699686562, NULL, 1, 1, 4),
(94, 'nongkarn', 'นงคราญ ไชยแก้ว', 'KhOevm-RxzkkGPAocZyRVuJdbY-70MKT', '$2y$13$PxWoDDOMM9P5/ucztStVeOS3cowmFtDSxuK.wbcIyDE22dfQvCNyu', NULL, 'nongkarn.c@local.com', 10, 1699686641, 1699686641, NULL, 1, 1, 4),
(95, 'kannikar', 'กรรณิการ์ เตชะเนตร', 'bqw8B9ndHTZxr1MAsLD5wdGI-0yhJErv', '$2y$13$Zkdw2L.Y/lvebyP673Sg1uwPrtltSRdpE63quJ6o13GwP3bBXBsfa', NULL, 'kannikar.t@local.com', 10, 1699686677, 1699686677, NULL, 1, 1, 4),
(96, 'natee', 'นที เตปินตา', 'dcymGMXXb80Tc03ceEdmt_ZGNJWlfnXS', '$2y$13$YHA.tuBV/YPgCk5oBLswE.UVbnQn33coR.CHVJtCSmECRmdVVtWza', NULL, 'natee.t@local.com', 10, 1699686696, 1699686696, NULL, 1, 1, 4),
(97, 'suwanan', 'สุวนันท์ จันทสิงห์', 'XPBYDyy02GTlB4m0k8LDNMfBTGPIFv-i', '$2y$13$E53XnYVTF8Cobpmn0qKUfOKeJoqDFBTSqLODsQwa176v1kLqJRWdS', NULL, 'suwanan.j@local.com', 10, 1699686726, 1699686726, NULL, 1, 1, 4),
(98, 'chokchai', 'โชคชัย จันทวงษ์', 'DlZeOkai8z130tasyHrC3Bs-5a1_nGmd', '$2y$13$Sszde9rGeOZtD5gCWPVnXe3ZIZNVeXMrpP3aoeR7OLww/EALPm4y2', NULL, 'chokchai.j@local.com', 10, 1699686752, 1699686752, NULL, 1, 1, 4),
(99, 'kunpan', 'ขุนแผน เสียงใหญ่', 'jJGHCmgOHR95eAwawoMWlQJOz4bO3KLE', '$2y$13$pLS2tzIiEE4rglEwiIn5WePN3C5aq5h2VeZit9TW0kyH7GjwggsXi', NULL, 'kunpan.s@local.com', 10, 1699686776, 1699686776, NULL, 1, 1, 4),
(100, 'napatporn', 'นภัสภรณ์ เลิศชมภู', 'deO2wA63dHuD6scgZmzr7msR8WDYZUxP', '$2y$13$UqHp.mN9XTMdzV5cx.rZN.o43egD/Bt7ff9IueEKjrCQB6dkV2iEy', NULL, 'napatporn.l@local.com', 10, 1699686803, 1699686803, NULL, 1, 1, 4),
(101, 'siwalee', 'สิวลี สุขบำรุง', 'R8hcVq2taOXl7OSL-B9iTaeChP5LTY0a', '$2y$13$vduvjvfX0Q5Q2Sppidux0.8H9EFdoKKeabD0k5zFfvqH4tk0CxRzu', NULL, 'siwalee.s@local.com', 10, 1699686823, 1699686823, NULL, 1, 1, 4),
(102, 'siripatsorn', 'ศิริภัสสร ขัติยะ', 'JyUw3KmvzoBPdgMMLFw1V69HDgPQTheA', '$2y$13$gpuZ562aKqGM.tyNs98FnOQv6pwQY2JP8Po8rocdyUq6yJIEmkMB.', NULL, 'siripatsorn.k@local.com', 10, 1699686849, 1699686849, NULL, 1, 1, 4),
(103, 'nampech', 'น้ำเพชร ลำใยผล', 'xsiB1HBq8bgGcykGL5DRm9MDf5udiNcv', '$2y$13$KiceLJ/TiCPz7thu3mZrBeHjblBX1oVlQpf/GOZeWKHNmhDxpGbkK', NULL, 'nampech.l@local.com', 10, 1699686879, 1699686879, NULL, 1, 1, 4),
(104, 'pasan', 'ประสาน ชัยตาล', 'ks3oAEZ61yBd9ofdreMLsgm7H3s-Ue5S', '$2y$13$cjppQMdrbloKy9I2QcQACOkcE34KA5.xNH5k8NV4XTbNi36jvpSL6', NULL, 'pasan.c@local.com', 10, 1699686903, 1699686903, NULL, 1, 1, 4),
(105, 'buaban', 'บัวบาน มณีจิต', 'iLoGKGtyGwhjflUNxu5Yzn9bQzAtxM2r', '$2y$13$NqFH0q9LmQrlVEwmoA4xB.Dxvudt1IITNb/jUQNNg.beuGR6ZXNYK', NULL, 'buaban.m@local.com', 10, 1699686933, 1699686933, NULL, 1, 1, 4),
(106, 'kitkajon', 'กิจขจร โค้งคูณหาร', 'T2KkDB5BYNsqMlf16Fs5VSP1S6oZVaVJ', '$2y$13$Mtw9M917a6Bcbj8AjumNxe6MsFoQAvdUstMNNrCeKyYEcNM79DDdC', NULL, 'kitkajon.k@local.com', 10, 1699686968, 1699686968, NULL, 1, 1, 4),
(109, 'penpayome', 'เพ็ญโพยม พรมเสพสัก', 'TxcFyFdiCoRMY21t76RvO_kowDefONvi', '$2y$13$W0GFY5I/JSuD8oOoFFWzIOJpmhvKaHAYoCWYRaRYuWzuJr24ay1um', NULL, 'penpayome.p@local.com', 10, 1699687069, 1699687069, NULL, 1, 1, 4),
(110, 'sukniran', 'สุขนิรันดร์ ผันผ่อน', 'Qg2SLiqjv5RazhRo1_CcI8WDdRpQ40Km', '$2y$13$xnbU1dKHpLMt4FzZxBsFGua2A.H0PU5WpbFl42rIDvAm3Du0l2sau', NULL, 'sukniran.p@local.com', 10, 1699687151, 1699687151, NULL, 1, 1, 4),
(111, 'pun', 'พัน ไชยวงค์', 'ZfaslU-Ma3eEKWS_Q5gQLX6CAAHORaM8', '$2y$13$1VtBMEIT.5txNULGzZkIve/MfRXGku0l6G6wV5g69GK9j/CLmQtsi', NULL, 'pun.c@local.com', 10, 1699687183, 1699687183, NULL, 1, 1, 10),
(112, 'patcharin', 'พัชรืน บรรดิ', 'nl69zW3du9EER0QEKdMd74UctPGKEgR8', '$2y$13$A7kASztfhEhC.yCWqTgmQeyr7tTnSVO901B1DBqyVzqYB8D1TO6Nm', NULL, 'patcharin.b@local.com', 10, 1699687237, 1699687237, NULL, 1, 1, 9),
(113, 'ratchanee', 'รัชณี ชุมภูโร', 'sKSXmQlcO8ChY1z2TytbmzFXDCrOXB_Q', '$2y$13$eoiMmfqe3MI.82NgjiBn1uzZ8F1wChHtSNuHnEGv6dnclSU.Zomhq', NULL, 'ratchanee.c@local.com', 10, 1699687263, 1699687263, NULL, 1, 1, 9),
(114, 'benjawan', 'เบญจวรรณ สุขใส', 'gmYRQ6MLSFVv46y2S9XxzrrxZ7AflF47', '$2y$13$3Voa06gcsfHLqRVE/oh/RuFzYffMeQ2u3fA/.csdOBzD1IUyPm6ZS', NULL, 'benjawan.s@local.com', 10, 1699687298, 1699687298, NULL, 1, 1, 9),
(115, 'sakda', 'ศักดา วงศ์สุข', 'wc83Q1oGp86pCnKZMuPbEpEJRMqAxWpZ', '$2y$13$OoyaY7BOWbkAwEIazB1V6O1QzgYOZt5rsfNWIwjcHeixiYYJOWQKi', NULL, 'sakda.w@local.com', 10, 1699687321, 1699687321, NULL, 1, 1, 9),
(116, 'mathurot', 'มธุรส อินเทพ', 'CdTvIVdx8PT-VRxGmLo98k5GMx1kNVGp', '$2y$13$cc/Fm/T3UBHBV9x/8LnyjOM6pkJIpoix2C.ie9teSb902PDB0QeMe', NULL, 'mathurot.i@local.com', 10, 1699687354, 1699687354, NULL, 1, 1, 9),
(117, 'soythip', 'สร้อยทิพย์ กาลศรี', 'ZM-XCtMM0GvQn_Aesgn9LLy26XNv3R5z', '$2y$13$TBBNc0ekmdn/D.Me1oYjh.OnrW35Wfojc7Ljmy8aY98z2kKmUQM16', NULL, 'soythip.k@local.com', 10, 1699687381, 1699687381, NULL, 1, 1, 9),
(118, 'namfon', 'น้ำฝน วงค์เทพ', 't7wIRKM1mmFxEKvohFc9YvKuA5wFi_Xp', '$2y$13$Kwiuhk6.8AmcRNITe9cM7uxVjC/QiO1p70I1RxhTWz4wcHTc1RRvS', NULL, 'namfon.w@local.com', 10, 1699687401, 1699687401, NULL, 1, 1, 9),
(119, 'samrouy', 'สำรวย กันธิยะ', 'BDZdfPbOI2klNUy7vbk14UOKuzY8_eeX', '$2y$13$X241C.OGHEftZWSX0blsdOTqktm4WreTlLaQFOKVwRaJjdu.2UNou', NULL, 'samrouy.k@local.com', 10, 1699687457, 1699687457, NULL, 1, 1, 11),
(120, 'natthapan', 'ณัฐพันธ์ ขุมนาค', 'nHfZMx0P8UNY0KK2SauLlUsqNpz4wkPq', '$2y$13$w/CridVo2BD4MU4weplCe.L52h5d7VboM61XXqXGNNeOISK/cJk4.', NULL, 'natthapan.k@local.com', 10, 1699687482, 1699687482, NULL, 1, 1, 11),
(121, 'chonlatee', 'ชลธี ลือเลิศ', 'EOXd5DKbM2Jcs6aK9sD62YxeP7VboVhg', '$2y$13$DuO5fXzy/9xaD9VOoJXU2OcqxdQngl30FQjoqrcN6mLNGY/XjzXGO', NULL, 'chonlatee.l@local.com', 10, 1699687514, 1699687514, NULL, 1, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `code`, `name`, `color`, `active`) VALUES
(1, 'user', 'ผู้ใช้งาน', '#001B79', 1),
(2, 'administrator', 'ผู้ดูแลระบบ', '#379237', 1),
(3, 'manager', 'ผู้จัดการ', '#279EFF', 1),
(4, 'head', 'หัวหน้า', '#1A5D1A', 1),
(5, 'qmr', 'ตัวแทนฝ่ายบริหารด้านคุณภาพ', '#7C73C0', 1),
(6, 'dcc', 'ผู้ควบคุมเอกสาร', '#FF6D60', 1),
(7, 'smr', 'Safety Management Representative', '#3F497F', 1),
(8, 'lmr', 'Labour Management Relations', '#AA8B56', 1),
(9, 'auditor', 'ผู้ตรวจสอบ', '#DF2E38', 1),
(10, 'sale', 'ขาย', '#3C6255', 1),
(11, 'technician', 'ช่างเทคนิค', '#12486B', 1),
(12, 'administrative', 'ธุรการ', '#E55604', 1),
(13, 'recorder', 'ผู้บันทึก', '#451952', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_rules`
--

CREATE TABLE `user_rules` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_rules`
--

INSERT INTO `user_rules` (`id`, `code`, `name`, `color`, `active`) VALUES
(1, 'index', 'หน้าหลัก', '#1A5D1A', 1),
(2, 'view', 'ดู', '#0079FF', 1),
(3, 'create', 'สร้าง', '#F94A29', 1),
(4, 'update', 'แก้ไข', '#B70404', 1),
(5, 'delete', 'ลบ', '#070A52', 1),
(6, 'profile', 'โปรไฟล์', '#539165', 1),
(7, 'download', 'ดาวน์โหลด', '#4C4B16', 1),
(8, 'All', '[\'index\', \'view\', \'create\', \'update\', \'delete\', \'profile\',\'download\']', '#379237', 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_order`
--

CREATE TABLE `work_order` (
  `id` int(11) NOT NULL,
  `work_ordercol` varchar(45) DEFAULT NULL,
  `work_code` varchar(255) DEFAULT NULL,
  `request_repair_id` int(11) DEFAULT NULL,
  `work_approver` int(11) DEFAULT NULL,
  `work_approver_comment` text,
  `work_approv_date` date DEFAULT NULL,
  `work_date` date DEFAULT NULL,
  `machine` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto_number`
--
ALTER TABLE `auto_number`
  ADD PRIMARY KEY (`group`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_status`
--
ALTER TABLE `job_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `moromi`
--
ALTER TABLE `moromi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moromi_list`
--
ALTER TABLE `moromi_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moromi_list_memo`
--
ALTER TABLE `moromi_list_memo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moromi_status`
--
ALTER TABLE `moromi_status`
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
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_item`
--
ALTER TABLE `po_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`);

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
-- Indexes for table `request_repair`
--
ALTER TABLE `request_repair`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_enrequest_job_status1_idx` (`job_status_id`),
  ADD KEY `fk_enrequest_locations1_idx` (`locations_id`);

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
-- Indexes for table `tank_destination`
--
ALTER TABLE `tank_destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tank_source`
--
ALTER TABLE `tank_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `urgency`
--
ALTER TABLE `urgency`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_rules`
--
ALTER TABLE `user_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_order`
--
ALTER TABLE `work_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_work_order_request_repair1_idx` (`request_repair_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `job_status`
--
ALTER TABLE `job_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `moromi`
--
ALTER TABLE `moromi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `moromi_list`
--
ALTER TABLE `moromi_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `moromi_list_memo`
--
ALTER TABLE `moromi_list_memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `moromi_status`
--
ALTER TABLE `moromi_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `po_item`
--
ALTER TABLE `po_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `request_repair`
--
ALTER TABLE `request_repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tank`
--
ALTER TABLE `tank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tank_destination`
--
ALTER TABLE `tank_destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tank_source`
--
ALTER TABLE `tank_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `urgency`
--
ALTER TABLE `urgency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_rules`
--
ALTER TABLE `user_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `work_order`
--
ALTER TABLE `work_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
