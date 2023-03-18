SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Table structure for table `orders`
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `invoiceNumber` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderNote` varchar(255) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `orders`
INSERT INTO `orders` (`id`, `userId`, `productId`, `invoiceNumber`, `quantity`, `orderNote`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(59, 30, '63', 343098410, 2, 'Make sure you deliver fast', '2023-02-03 09:44:00', 'Cash On Delivery', NULL),
(60, 30, '72', 343098410, 1, 'Make sure you deliver fast', '2023--03 09:44:00', 'Cash On Delivery', NULL),
(61, 30, '79', 343098410, 3, 'Make sure you deliver fast', '2023-03-03 09:44:01', 'Cash On Delivery', NULL),
(65, 5, '64', 708811244, 3, 'Help and deliver fast', '2023-03-09 03:30:12', 'Cash On Delivery', NULL),
(66, 5, '71', 708811244, 2, 'Help and deliver fast', '2023-03-09 08:30:12', 'Cash On Delivery', NULL);
(67, 30, '63', 343098410, 2, 'Make sure you deliver fast', '2022-12-03 09:44:00', 'Cash On Delivery', NULL),
(68, 30, '72', 343098410, 1, 'Make sure you deliver fast', '2022-12-03 09:44:00', 'Cash On Delivery', NULL),
(69, 30, '79', 343098410, 3, 'Make sure you deliver fast', '2023-03-03 09:44:01', 'Cash On Delivery', NULL),
(70, 5, '64', 708811244, 3, 'Help and deliver fast', '2023-03-09 03:30:12', 'Cash On Delivery', NULL),

-- Table structure for table `permissions`
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) CHARACTER SET latin1 NOT NULL,
  `createuser` varchar(255) DEFAULT NULL,
  `deleteuser` varchar(255) DEFAULT NULL,
  `createbid` varchar(255) DEFAULT NULL,
  `updatebid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `permissions`
INSERT INTO `permissions` (`id`, `permission`, `createuser`, `deleteuser`, `createbid`, `updatebid`) VALUES
(1, 'Superuser', '1', '1', '1', '1'),
(2, 'Admin', '1', NULL, '1', '1'),
(3, 'User', NULL, NULL, '1', NULL);

-- Table structure for table `productreviews`
CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `productreviews`
INSERT INTO `productreviews` (`id`, `productId`, `rating`, `name`, `email`, `review`, `reviewDate`) VALUES
(8, 66, 5, 'Gloria Sofron', 'gloria@gmail.com', 'Your product is good', '2023-02-23 11:35:12'),
(12, 67, 4, 'Anton Vasile', 'vasile@gmail.com', 'This is the quality product that I was been looking for many years', '2023-02-23 12:11:38'),
(13, 38, 3, 'Nica Ion', 'ion@gmail.com', 'I like that portal', '2023-03-01 09:11:28'),
(14, 41, 2, 'Anton Vasile', 'vasile@gmail.com', 'I like your product', '2023-03-07 08:19:40'),
(19, 68, 1, 'Nica Ion', 'ion@gmail.com', 'This is product I was been looking', '2023-03-07 09:47:58');

-- Table structure for table `subcategory`
CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `tags` longtext DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `subcategory`
INSERT INTO `subcategory` (`id`, `categoryId`, `subcategory`, `description`, `tags`, `creationDate`, `updationDate`) VALUES
-- (2, 4, 'Led Television', NULL, NULL, '2017-01-26 16:24:52', '26-01-2017 11:03:40 PM'),
-- (3, 4, 'Television', NULL, NULL, '2017-01-26 16:29:09', ''),
-- (4, 4, 'Mobiles', NULL, NULL, '2017-01-30 16:55:48', ''),
-- (5, 4, 'Mobile Accessories', NULL, NULL, '2017-02-04 04:12:40', ''),
-- (6, 4, 'Laptops', NULL, NULL, '2017-02-04 04:13:00', ''),
-- (7, 4, 'Computers', NULL, NULL, '2017-02-04 04:13:27', ''),
-- (8, 3, 'Comics', NULL, NULL, '2017-02-04 04:13:54', ''),
-- (9, 5, 'Beds', NULL, NULL, '2017-02-04 04:36:45', ''),
-- (10, 5, 'Sofas', NULL, NULL, '2017-02-04 04:37:02', ''),
-- (11, 5, 'Dining Tables', NULL, NULL, '2017-02-04 04:37:51', ''),
(12, 59, 'Antihypertensives', NULL, NULL, '2017-03-10 20:12:59', ''),
(14, 71, 'Emollients and protectors', NULL, NULL, '2022-08-28 20:27:28', NULL),
(15, 60, 'Foot Care', NULL, NULL, '2022-09-08 10:01:47', NULL),
(16, 60, 'Hair Care', NULL, NULL, '2022-09-08 10:02:38', NULL),
(17, 60, 'Skin Care', NULL, NULL, '2022-09-08 10:04:35', NULL),
(18, 72, 'Antigout', NULL, NULL,, '2022-09-08 10:05:09', NULL),
(19, 72, 'Anti-inflammatory and anti-rheumatic preparations', NULL, NULL, '2022-09-08 10:12:45', NULL),
(20, 60, 'Hand Care', NULL, NULL, '2022-09-08 10:58:04', NULL),
(21, 60, 'Body Care', NULL, NULL, '2022-09-08 11:11:35', NULL),
(22, 61, 'Obstructive diseases of the respiratory tract', NULL, NULL,, '2022-09-08 11:15:50', NULL),
(23, 73, 'Atianemic', NULL, NULL, '2022-09-08 11:22:46', NULL),
(24, 57, 'Systemic anabolics', NULL, NULL, '2022-09-08 11:47:37', NULL),
(25, 57, 'Antiemetics', NULL, NULL, '2022-09-08 12:01:44', NULL),
(26, 17, 'Personal Hygiene', NULL, NULL, '2022-09-08 14:12:26', NULL),
(27, 16, 'Antiprotozoals', 'Treatment and prevention of infections caused by microorganisms', 'parasites', '2022-09-08 14:17:49', NULL),
(28, 74, 'Systemic corticosteroids', NULL, NULL, '2022-09-08 14:23:30', NULL),
(29, 75, 'Minerals', NULL, NULL, '2022-09-08 14:28:46', NULL),
(30, 57, 'Tonics', NULL, NULL, '2022-09-21 07:30:09', NULL),
(31, 14, 'Immunosuppressants', NULL, NULL, '2022-09-19 15:30:59', NULL),
(32, 16, 'Anthelmintic', 'Treatment and prevention of infections caused by intestinal parasites or helminths', 'anthelmintic, antiparasitic, deworming, parasites', '2022-09-19 15:35:22', NULL),
(33, 57, 'Substitutes', NULL, NULL, '2022-09-19 15:40:20', NULL),
(35, 73, 'Antihemorrhagic', NULL, NULL, '2022-10-09 08:38:13', NULL),
(38, 57, 'Dietary products', NULL, NULL, '2022-09-19 15:35:22', NULL),
(39, 57, 'Gastrointestinal functional disorders', NULL, NULL, '2022-09-19 15:40:20', NULL),
(40, 57, 'Acid related disorders', NULL, NULL, '2022-09-19 15:35:22', NULL),
(41, 57, 'Biliary and hepatic therapy', NULL, NULL, '2022-09-19 15:40:20', NULL),
(43, 57, 'Anti-inflammatory', NULL, NULL,, '2022-09-19 15:40:20', NULL),
(45, 57, 'Antidiabetic', NULL, NULL, '2022-09-19 15:40:20', NULL),
(46, 57, 'Other products', NULL, NULL, '2022-10-09 08:38:13', NULL),
(47, 59, 'Diuretics', NULL, NULL, '2022-09-19 15:40:20', NULL),
(48, 59, 'Vasoprotectors', NULL, NULL, '2022-09-19 15:35:22', NULL),
(49, 59, 'Beta blockers', NULL, NULL, '2022-09-19 15:40:20', NULL),
(50, 75, 'Amino acids', NULL, NULL, '2022-09-19 15:40:20', NULL),
(51, 14, 'Immunostimulants', NULL, NULL, '2022-09-19 15:40:20', NULL),
(52, 14, 'Endocrine therapy', NULL, NULL, '2022-10-09 08:38:13', NULL);

-- Table structure for table `tbladmin`
CREATE TABLE `tbladmin` (
  `id` int(10) NOT NULL,
  `staffId` int(10) DEFAULT NULL,
  `adminName` varchar(120) DEFAULT NULL,
  `userName` varchar(120) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `mobileNumber` bigint(10) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `activationCode` varchar(255) NOT NULL DEFAULT 'g2o9@h3$n%&h09',
  `photo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'avatar15.jpg',
  `password` varchar(120) DEFAULT NULL,
  `adminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `tbladmin`
INSERT INTO `tbladmin` (`id`, `staffid`, `adminName`, `userName`, `firstName`, `lastName`, `mobileNumber`, `email`, `birthday`, `status`, `activationCode`, `photo`, `password`, `adminRegdate`) VALUES
(2, 1002, 'Admin', 'admin', 'Alina', 'Negura', 079745890, 'negura@gmail.com', NULL, 1, 'f6c2a1ba62f83fe43303523d42e60f4d', 'userF1.png', '81dc9bdb52d04dc20036dbd8313ed055', '2023-03-21 10:18:39'),
(29, 1008, 'User', 'gloria', 'Sofron', 'Gloria', 070546590, 'gloria@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userF2.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '2023-01-25 11:29:20'),
(32, NULL, NULL, 'nica', 'Nica', 'Ion', NULL, 'n@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userB3.jpg', NULL, '2023-01-23 11:33:08'),
(37, NULL, NULL, 'ion', 'Nica', 'Ada',08475465, 'i@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userF4.jpg', NULL, '2023-03-23 11:33:08'),
(39, NULL, NULL, 'gabi', 'Gabriel', 'Marius', 097654789, 'g@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userB5.jpg', NULL, '2023-02-20 11:33:08'),
(45, NULL, NULL, 'ana', 'Ana', 'Marius', 097654789, 'ana@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userF6.jpg', NULL, '2023-03-11 11:33:08'),
(50, NULL, NULL, 'marius', 'Marius', 'Adrian', 097654789, 'marius@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userB7.jpg', NULL, '2023-03-21 11:33:08'),
(53, NULL, NULL, 'adrian', 'Adrian', 'Mihai', 097654789, 'adrian@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userF8.jpg', NULL, '2023-03-29 11:33:08'),
(58, NULL, NULL, 'mihai', 'Mihai', 'Ion', 097654789, 'mihai@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userB9.jpg', NULL, '2023-04-02 11:33:08'),
(63, NULL, NULL, 'maria', 'Maria', 'Adriana', 097654789, 'maria@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userF10.jpg', NULL, '2023-04-04 11:33:08'),
(68, NULL, NULL, 'adriana', 'Adriana', 'Vlad', 097654789, 'adriana@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userB2.jpg', NULL, '2023-04-10 11:33:08'),
(73, NULL, NULL, 'vlad', 'Vlad', 'Ioana', 097654789, 'vlad@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userF3.jpg', NULL, '2023-04-14 11:33:08'),
(78, NULL, NULL, 'ioana', 'Ioana', 'Costin', 097654789, 'ioana@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userB4.jpg', NULL, '2023-04-17 11:33:08'),
(83, NULL, NULL, 'costin', 'Costin', 'Razvan', 097654789, 'costin@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userB4.jpg', NULL, '2023-04-21 11:33:08'),
(88, NULL, NULL, 'razvan', 'Razvan', 'Alexandru', 097654789, 'razvan@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userB3.jpg', NULL, '2023-04-25 11:33:08'),
(93, NULL, NULL, 'alexandru', 'Alexandru', 'Andrei', 097654789, 'alexandru@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userF6.jpg', NULL, '2023-04-28 11:33:08'),
(98, NULL, NULL, 'andrei', 'Andrei', 'Diana', 097654789, 'andrei@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userB7.jpg', NULL, '2023-05-02 11:33:08'),
(105, NULL, NULL, 'diana', 'Diana', 'Elena', 097654789, 'diana@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userF8.jpg', NULL, '2023-05-06 11:33:08'),
(110, NULL, NULL, 'elena', 'Elena', 'Rares', 097654789, 'elena@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userB9.jpg', NULL, '2023-05-10 11:33:08'),
(115, NULL, NULL, 'rares', 'Rares', 'Alice', 097654789, 'rares@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userF2.jpg', NULL, '2023-05-12 11:33:08'),
(120, NULL, NULL, 'alice', 'Alice', 'Gabriela', 097654789, 'alice@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userF9.jpg', NULL, '2023-05-15 11:33:08'),
(125, NULL, NULL, 'gabriela', 'Gabriela', 'Irina', 097654789, 'gabriela@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userF8.jpg', NULL, '2023-05-19 11:33:08'),
(130, NULL, NULL, 'irina', 'Irina', 'Stefan', 097654789, 'irina@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userF7.jpg', NULL, '2023-05-22 11:33:08'),
(135, NULL, NULL, 'stefan', 'Stefan', 'Alin', 097654789, 'stefan@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userB5.jpg', NULL, '2023-05-25 11:33:08'),
(140, NULL, NULL, 'alin', 'Alin', 'Darius', 097654789, 'alin@gmail.com', NULL, 1, 'g2o9@h3$n%&h09', 'userB4.jpg', NULL, '2023-05-27 11:33:08');
-- Table structure for table `tblbrand`
CREATE TABLE `tblbrand` (
  `id` int(10) NOT NULL,
  `brandName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `brandImage` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `tblbrand`
INSERT INTO `tblbrand` (`id`, `brandName`, `brandImage`, `postingDate`) VALUES
(2, 'Hofical', 'hofical.jpg', '2022-02-24 11:26:21'),
(3, 'Dankepharm', 'dankepharm.png', '2022-02-24 11:26:34'),
(4, 'Biofar', 'biofarm.png', '2022-02-24 11:26:52'),
(5, 'Labormed', 'labormed.png', '2022-02-24 11:27:19'),
(6, 'Equate', 'equate.png', '2022-02-24 11:29:06'),
(7, 'Catena', 'catena.jpg', '2022-03-22 11:49:57'),
(13, 'Bioderma', 'bioderma.png', '2022-09-21 07:32:15'),
(22, 'Farmex', 'farmex.png', '2022-10-09 08:38:44'),
(23, 'Nivea', 'nivea.png', '2022-03-22 11:49:57'),
(24, 'Loreal', 'loreal.png', '2022-09-21 07:32:15'),
(26, 'Pantene', 'pantene.jpeg', '2022-03-22 11:49:57'),
(27, 'Novartis', 'novartis.jpeg', '2022-10-09 08:38:44'),
(28, 'Bayer', 'bayer.png', '2022-03-22 11:49:57'),
(29, 'Merck', 'merck.jpeg', '2022-09-21 07:32:15'),
(30, 'Pfizer', 'pfizer.png', '2022-10-09 08:38:44'),
(31, 'AstraZeneca', 'astrazeneca.png', '2022-03-22 11:49:57'),
(32, 'Sanofi', 'sanofi.jpg', '2022-10-09 08:38:44'),
(33, 'Sandoz', 'sandoz.png', '2022-03-22 11:49:57'),
(34, 'Aurobindo', 'aurobindo.png', '2022-09-21 07:32:15'),
(35, 'Lupin', 'lupin.jpeg', '2022-10-09 08:38:44'),
(36, 'Dr. Reddy', 'drReddy.jpg', '2022-03-22 11:49:57'),
(37, 'Hexal', 'hexal.png', '2022-03-22 11:49:57'),
(38, 'Optifast', 'optifast.jpeg', '2022-10-09 08:38:44'),
(39, 'Nutren', 'nutren.jpeg', '2022-03-22 11:49:57'),
(40, 'Fortimel', 'fortimel.jpeg', '2022-09-21 07:32:15'),
(41, 'Fresubin', 'fresubin.jpeg', '2022-10-09 08:38:44'),
(43, 'Nutricia', 'nutricia.png', '2022-03-22 11:49:57'),
(44, 'Abbot', 'abbott.png', '2022-09-21 07:32:15'),
(45, 'Nestle', 'nestle.png', '2022-10-09 08:38:44'),
(42, 'Ensure', 'ensure.png', '2022-03-22 11:49:57'),
(46, 'Teva', 'teva.png', '2022-09-21 07:32:15'),
(47, 'Gilead', 'gilead.png', '2022-10-09 08:38:44'),
(48, 'GlaxoSmithKline', 'glaxoSmith.jpeg', '2022-03-22 11:49:57'),
(49, 'Gastrolon', 'gastrolon.jpeg', '2022-09-21 07:32:15'),
(50, 'Novo Nordisk', 'novoNordisk.png', '2022-10-09 08:38:44'),
(51, 'Dove', 'dove.png', '2022-03-22 11:49:57');

-- Table structure for table `tblcategory`
CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(200) DEFAULT NULL,
  `categoryDescription` varchar(250) DEFAULT NULL,
  `tags` longtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `tblcategory`
INSERT INTO `tblcategory` (`id`, `categoryName`, `categoryDescription`, `tags`, `postingDate`) VALUES
(14, 'Immunomodulatory','Modify the response of the immune system by increasing or decreasing the production of serum antibodies','antibodies, immune response','2023-02-09 10:56:57'),
(16, 'Antiparasitic','Treatment of parasitic diseases caused by helminths, amoebas, ectoparasites, parasitic fungi and protozoa','antiparasitic, parasites', '2023-02-10 09:13:05'),
(17, 'Hygiene', NULL, NULL, '2023-02-10 09:14:21'),
(57, 'Digestion, metabolisms', NULL, NULL, '2023-02-24 12:34:38'),
(59, 'Cardiovascular', NULL, NULL, '2023-02-11 11:55:37'),
(60, 'Cosmetics','Substances/preparations that come into contact with the external parts of the human body and have the main purpose of caring for them',  NULL, '2023-02-11 11:56:07'),
(61, 'Respiratory system','Medicines for the treatment of respiratory conditions and disorders', NULL, '2023-03-11 11:56:46'),
(71, 'Dermatological','Topical forms of medication that are applied directly to the skin or affected areas', '', '2023-01-28 20:06:20'),
(72, 'Musculoskeletal','Treatment of conditions affecting the muscles, bones, joints and soft tissues of the body', '', '2023-01-08 10:33:25'),
(73, 'Hematopoietic','It stimulates the production of blood cells in the bone marrow', 'blood cells, bone marrow', '2023-01-08 11:21:34'),
(74, 'Hormone','Substances secreted by endocrine glands or other tissues, which stimulate and coordinate the activity of certain organs or the whole organism', 'hormone, endocrine gland', '2023-01-08 14:22:07'),
(75, 'Vitamins','Organic chemicals needed in small amounts for the body to be healthy', 'vitamin, nutritious', '2023-01-08 14:28:03');

-- Table structure for table `tblcompany`
CREATE TABLE `tblcompany` (
  `id` int(11) NOT NULL,
  `regNo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyEmail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyPhone` int(10) NOT NULL,
  `companyAddress` varchar(255) CHARACTER SET latin1 NOT NULL,
  `companyLogo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'avatar15.jpg',
  `status` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `tblcompany`
INSERT INTO `tblcompany` (`id`, `regNo`, `companyName`, `companyEmail`, `country`, `companyPhone`, `companyAddress`, `companylogo`, `status`, `creationDate`) VALUES
(4, '010100980', 'MED ACCES', 'astafi.valentina@isa.utm.md', 'Moldova', 060067021, 'Nicolae Iorga 21A', 'logo2.png', '1', '2021-02-02 12:17:15');

-- Table structure for table `tblcontacts`
CREATE TABLE `tblcontacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `contactNo` int(10) DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `message` longtext CHARACTER SET latin1 DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `tblcontacts`
INSERT INTO `tblcontacts` (`id`, `name`, `email`, `contactNo`, `subject`, `message`, `postingDate`) VALUES
(2, '', 'mara@gmail.com', 2147483647, 'Product delivery', 'Product delivery', '2023-03-28 12:24:47'),
(3, '', 'antond@gmail.com', 770546590, 'Quotation', 'Quotation', '2023-02-14 06:09:52'),
(4, '', 'meganl@gmail.com', 770546590, 'Quotation', 'Quotation', '2023-02-14 07:18:26'),
(5, '', 'sara@gmail.com', 770546590, 'Quotation', 'Quotation', '2023-03-14 07:46:56'),
(6, '', 'vasileg@gmail.com', 2147483647, 'LPO', 'LPO', '2023-02-14 10:09:31');

-- Table structure for table `tblitems`

CREATE TABLE `tblitems` (
  `id` int(11) NOT NULL,
  `item` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `tblitems`
INSERT INTO `tblitems` (`id`, `item`, `description`, `creationDate`) VALUES
(1, 'brooms', 'sweeping brooms', '2021-04-30 01:15:55'),
(2, 'soap', 'washing soap', '2021-04-30 01:23:21'),
(3, 'Poultry feeds', 'Food for birds', '2021-07-10 13:56:09'),
(4, 'Poultry medicine', 'used to treat birds', '2021-07-10 14:44:34');

-- Table structure for table `tblproducts`
CREATE TABLE `tblproducts` (
`id` int(11) NOT NULL,
`categoryName` int(11) DEFAULT NULL,
`subcategory` varchar(255) DEFAULT NULL,
`brandName` int(11) DEFAULT NULL,
`productName` varchar(150) DEFAULT NULL,
`pharmaForm` varchar(100)DEFAULT NULL,
`dose`varchar(100) NOT NULL,
`volume`varchar(100) DEFAULT NULL,
`division`varchar(100) NOT NULL,
`codeATC`varchar(100) NOT NULL,
`registrationNumber`varchar(100) NOT NULL,
`dateManufacture` timestamp DEFAULT NULL ,
`expirationDate`DATETIME DEFAULT NULL ,
`groupTag` varchar(255) DEFAULT NULL,
`quantity` int(10) DEFAULT NULL,
`status` varchar(255) DEFAULT NULL,
`producteur` varchar(100) DEFAULT NULL,
`importateur` varchar(100) DEFAULT NULL,
`productImage` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'vender-upload-thumb-preview.jpg',
`productImage2` varchar(255) DEFAULT NULL,
`productImage3` varchar(255) DEFAULT NULL,
`productImage4` varchar(255) DEFAULT NULL,
`productPrice` decimal(10,0) DEFAULT NULL,
`priceBefore` decimal(10,0) NOT NULL,
`productDiscount` int(10) DEFAULT NULL,
`productDescription` longtext DEFAULT NULL,
`productDetails` longtext DEFAULT NULL,
`productStatus` varchar(255) DEFAULT NULL,
`postingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
`updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `tblproducts`
INSERT INTO `tblproducts` (`id`, `categoryName`, `subcategory`, `brandName` , `productName` , `pharmaForm`, `dose`, `volume`, `division`, `codeATC`, `registrationNumber`, `dateManufacture`, `expirationDate`, `groupTag`, `quantity`,`status`, `producteur` ,`importateur`, `productImage` , `productImage2`, `productImage3`,`productImage4`, `productPrice`,`priceBefore` , `productDiscount` , `productDescription` , `productDetails`, `productStatus`, `postingDate`, `updationDate`) VALUES
(57,14,51, 3, 'Interferon Alpha', 'Injection', '2 million IU', '1 vial', '3', 'L03AB02', 'R09876', '2021-01-01', '2025-01-01 00:00:00','', 10, 'active', 'ABC Pharma', 'DEF Pharma', '', '', '', '', 150.00, 150.00, 0, 'This is a product description', 'This is a product details', 'active', '2020-11-12 00:00:00', NULL),
-- Table structure for table `tblsubscribe`
CREATE TABLE `tblsubscribe` (
  `id` int(10) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `subscribed_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `tblsubscribe`
INSERT INTO `tblsubscribe` (`id`, `email`, `subscribed_date`) VALUES
(2, 'antond@gmail.com', '2023-03-01 12:46:06'),
(15, 'linda@gmail.com', '2023-02-23 09:57:58'),
(16, 'sara@gmail.com', '2023-01-23 10:00:01'),
(17, 'john@gmail.com', '2023-02-23 10:00:32'),
(18, 'vasileP@yahoo.com', '2023-03-23 10:01:50'),
(19, 'sorin123@gmail.com', '2023-02-23 10:02:12'),
(20, 'astfn@gmail.com', '2023-02-23 10:03:13');

-- Table structure for table `users`
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactNo` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext DEFAULT NULL,
  `shippingCountry` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingZipcode` int(11) DEFAULT NULL,
  `shippingContact` int(10) DEFAULT NULL,
  `billingAddress` varchar(255) DEFAULT NULL,
  `billingCountry` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingZipcode` int(11) DEFAULT NULL,
  `billingContact` int(11) DEFAULT NULL,
  `activationcode` varchar(255) NOT NULL DEFAULT 'g2o9@h3$n%&h09',
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `users`
INSERT INTO `users` (`id`, `name`, `email`, `contactNo`, `password`, `shippingAddress`, `shippingCountry`, `shippingCity`, `shippingZipcode`, `shippingContact`, `billingAddress`, `billingCountry`, `billingCity`, `billingState`, `billingZipcode`, `billingContact`, `activationcode`, `regDate`, `updationDate`) VALUES
(5, ' Nicole Petrov', 'nicole@gmail.com', 770546590, '81dc9bdb52d04dc20036dbd8313ed055', 'Moldovava', NULL, 'Chisinau', 256, NULL, 'Main street Road', NULL, 'Chisinau', NULL, 256, 770546590, '98ab04547bf7fbb0b4805342453923e5', '2022-02-18 09:00:57', ''),
(30, 'Sara Ambros', 'sara@gmail.com', 770546590, '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, NULL, 'Chisinau', 'Moldova', 'Bloc4', 'Ciocana', 790, NULL, 'g2o9@h3$n%&h09', '2022-10-03 09:40:34', NULL);

-- Table structure for table `userlog`
CREATE TABLE userlog (
 id int(100) NOT NULL,
 userEmail varchar(255),
 logout varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `wishlist`
CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `wishlist`

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(27, 30, 75, '2022-10-03 11:16:36');

-- Indexes for dumped tables

-- Indexes for table `orders`
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `permissions`
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `productreviews`
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `subcategory`
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `tbladmin`
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `tblbrand`
ALTER TABLE `tblbrand`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `tblcategory`
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `tblcompany`
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `tblcontacts`
ALTER TABLE `tblcontacts`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `tblitems`
ALTER TABLE `tblitems`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `tblproducts`
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `tblsubscribe`
ALTER TABLE `tblsubscribe`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `users`
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `userlog`
 ALTER TABLE `userlog`
 ADD PRIMARY KEY (`id`);

-- Indexes for table `wishlist`
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for dumped tables

-- AUTO_INCREMENT for table `orders`
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

-- AUTO_INCREMENT for table `permissions`
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- AUTO_INCREMENT for table `productreviews`
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

-- AUTO_INCREMENT for table `subcategory`
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

-- AUTO_INCREMENT for table `tbladmin`
ALTER TABLE `tbladmin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

-- AUTO_INCREMENT for table `tblbrand`
ALTER TABLE `tblbrand`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

-- AUTO_INCREMENT for table `tblcategory`
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

-- AUTO_INCREMENT for table `tblcompany`
ALTER TABLE `tblcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

-- AUTO_INCREMENT for table `tblcontacts`
ALTER TABLE `tblcontacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

-- AUTO_INCREMENT for table `tblitems`
ALTER TABLE `tblitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- AUTO_INCREMENT for table `tblproducts`
ALTER TABLE `tblproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

-- AUTO_INCREMENT for table `tblsubscribe`
ALTER TABLE `tblsubscribe`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

-- AUTO_INCREMENT for table `users`
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

-- AUTO_INCREMENT for table `wishlist`
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

