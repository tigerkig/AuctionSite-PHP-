DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `login_page_logo` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `full_name`, `image`, `login_page_logo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin.png', 'logo_login_form.png');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_about`
--

DROP TABLE IF EXISTS `ambit_about`;
CREATE TABLE `ambit_about` (
`id` int(11) NOT NULL,
  `about` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_about`
--

INSERT INTO `ambit_about` (`id`, `about`, `image`, `date`) VALUES
(6, '<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. </p> 								<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p> 								<p> Nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. </p> ', '1482997863about.jpg', date_add(NOW(),INTERVAL -1 DAY));

-- --------------------------------------------------------

--
-- Table structure for table `ambit_add2cart`
--

DROP TABLE IF EXISTS `ambit_add2cart`;
CREATE TABLE `ambit_add2cart` (
`aad_cart_id` int(11) NOT NULL,
  `aad_cart_ac_id` int(11) NOT NULL,
  `aad_cart_apa_id` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `shipping_cost` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ambit_add2wish`
--

DROP TABLE IF EXISTS `ambit_add2wish`;
CREATE TABLE `ambit_add2wish` (
`aaw_id` int(11) NOT NULL,
  `aaw_apa_id` int(11) NOT NULL,
  `aaw_ac_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_add2wish`
--

INSERT INTO `ambit_add2wish` (`aaw_id`, `aaw_apa_id`, `aaw_ac_id`, `status`) VALUES
(2, 10, 1, 0),
(14, 9, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_add_banner`
--

DROP TABLE IF EXISTS `ambit_add_banner`;
CREATE TABLE `ambit_add_banner` (
`aab_id` int(11) NOT NULL,
  `aab_banner` varchar(255) NOT NULL,
  `aab_link` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_add_banner`
--

INSERT INTO `ambit_add_banner` (`aab_id`, `aab_banner`, `aab_link`, `status`) VALUES
(1, 'banner1.jpg', 'product.php?id=12', 1),
(3, 'banner2.jpg', '#', 1),
(4, 'banner3.jpg', '#', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_add_slider`
--

DROP TABLE IF EXISTS `ambit_add_slider`;
CREATE TABLE `ambit_add_slider` (
`aas_id` int(11) NOT NULL,
  `aas_slider` varchar(255) NOT NULL,
  `aas_link` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_add_slider`
--

INSERT INTO `ambit_add_slider` (`aas_id`, `aas_slider`, `aas_link`, `status`) VALUES
(2, 'slider-1.png', 'product.php?id=9', 1),
(3, 'slider-2.png', 'product.php?id=9', 1),
(4, 'slider-3.png', '#', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_advertisement`
--

DROP TABLE IF EXISTS `ambit_advertisement`;
CREATE TABLE `ambit_advertisement` (
`aab_id` int(11) NOT NULL,
  `aab_banner` varchar(255) NOT NULL,
  `aab_link` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_advertisement`
--

INSERT INTO `ambit_advertisement` (`aab_id`, `aab_banner`, `aab_link`, `status`) VALUES
(2, 'banner2-1.png', '#', 1),
(3, 'banner2-4.png', 'product.php?id=14', 1),
(4, 'banner2-6.png', 'product.php?id=10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_brand`
--

DROP TABLE IF EXISTS `ambit_brand`;
CREATE TABLE `ambit_brand` (
`ab_id` int(11) NOT NULL,
  `ab_name` varchar(255) NOT NULL,
  `top_search_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_brand`
--

INSERT INTO `ambit_brand` (`ab_id`, `ab_name`, `top_search_status`) VALUES
(1, 'Samsung', 1),
(2, 'Nokia', 1),
(3, 'Sony', 1),
(4, 'HTC', 0),
(5, 'Lenovo', 1),
(6, 'Oppo', 0),
(7, 'Vodafone', 0),
(8, 'Spice', 1),
(9, 'LG', 1),
(10, 'LifePlus', 0),
(11, 'Tiitan', 0),
(12, 'Microsoft', 0),
(13, 'ASUS', 1),
(14, 'Core', 0),
(15, 'Jumper', 0),
(16, 'Binai', 0),
(17, 'Intel', 1),
(18, 'DELL', 1),
(19, 'Apple', 1),
(20, 'Lenevo', 0),
(21, 'CTL', 0),
(22, 'BBC', 0),
(23, 'JIL', 0),
(24, 'HP', 0),
(25, 'OptiPlex', 0),
(26, 'Logitech', 0),
(27, 'Nuklz', 0),
(28, 'BigBlu', 0),
(29, 'StarTech', 0),
(30, 'Anker', 0),
(31, 'IHMC', 0),
(32, 'Verbatim', 0),
(33, 'amazon', 0),
(34, 'VicTsing', 0),
(35, 'Universal', 0),
(36, 'VGA', 0),
(37, 'Adnet', 0),
(38, 'Transcend', 0),
(39, 'iBall', 0),
(40, 'SanDisk', 0),
(41, 'MECO', 0),
(42, 'Trion', 0),
(43, 'DEVANTI', 0),
(44, 'BPL', 0),
(45, 'TCL', 0),
(46, 'Xiaomi', 0),
(47, 'impex', 0),
(48, 'Ibell', 0),
(49, 'Videocon', 0),
(50, 'Hyundai', 0),
(51, 'Panasonic', 0),
(52, 'Maxmo', 0),
(53, 'Samy', 0),
(54, 'Sanyo', 0),
(55, 'OVLENG', 0),
(56, 'Mpow', 0),
(57, 'Audeze', 0),
(58, 'MROW', 0),
(59, 'Truvison', 0),
(60, 'Shinco', 0),
(61, 'NASCO', 0),
(62, 'Intex', 0),
(63, 'Oscar', 0),
(64, 'murphy', 0),
(65, 'Pioneer', 0),
(66, 'Zebronics', 0),
(67, 'JBL', 0),
(68, 'Tecsun', 0),
(69, 'Saregama', 0),
(70, 'Philips', 0),
(71, 'toshiba', 0),
(72, 'TOA', 0),
(73, 'Shure', 0),
(74, 'Canon', 0),
(75, 'Nikon', 0),
(76, 'Fujifilm', 0),
(77, 'JVC', 0),
(78, 'Camcorder', 0),
(79, 'Voltas', 1),
(80, 'Carrier', 0),
(81, 'Daikin', 0),
(82, 'Whirlpool', 0),
(83, 'Hitachi', 0),
(84, 'V Cook', 0),
(85, 'Symphony', 1),
(86, 'Bajaj', 0),
(87, 'Godrej', 0),
(88, 'Haier', 0),
(89, 'Preethi', 0),
(90, 'Unimix', 0),
(91, 'Wonderchef', 0),
(92, 'kenstar', 0),
(93, 'Koryo', 0),
(94, 'Black & Decker', 0),
(95, 'Prestige', 0),
(96, 'Glen', 0),
(97, 'Kutchina', 0),
(98, 'Bosch', 0),
(99, 'KENT', 0),
(100, 'Sencor', 0),
(101, 'Morphy', 0),
(102, 'Sinbo', 0),
(103, 'HCL', 0),
(104, 'Havells', 0),
(105, 'HUL', 0),
(106, 'Eveready', 0),
(107, 'Kenwood', 0),
(108, 'Borosil', 0),
(109, 'Usha', 0),
(110, 'Singer', 0),
(111, 'Orient', 0),
(112, 'Luminous', 0),
(113, 'IFB', 0),
(114, 'ABS', 0),
(115, 'KALPTREE', 0),
(116, 'Signature', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_buy_package`
--

DROP TABLE IF EXISTS `ambit_buy_package`;
CREATE TABLE `ambit_buy_package` (
`id` int(11) NOT NULL,
  `abp_p_id` int(11) NOT NULL,
  `abp_u_id` int(11) NOT NULL,
  `abp_price` int(11) NOT NULL,
  `abp_buy_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `paid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `expire` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_buy_package`
--

INSERT INTO `ambit_buy_package` (`id`, `abp_p_id`, `abp_u_id`, `abp_price`, `abp_buy_date`, `paid`, `status`, `expire`) VALUES
(5, 2, 2, 1200, '2017-01-24 14:33:58', '1200', 'Pass', date_add(NOW(),INTERVAL -10 DAY));

-- --------------------------------------------------------

--
-- Table structure for table `ambit_buy_product`
--

DROP TABLE IF EXISTS `ambit_buy_product`;
CREATE TABLE `ambit_buy_product` (
`id` int(11) NOT NULL COMMENT 'ORDER ID',
  `abp_ac_id` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `coupon` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `confirm_agree` int(11) NOT NULL,
  `product_details` text NOT NULL,
  `currency` int(11) NOT NULL,
  `total_price` float(12,2) NOT NULL,
  `paid_amnt` float(12,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` int(11) NOT NULL COMMENT '0=>fail, 1=>COD, 2=>pass'
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_buy_product`
--

INSERT INTO `ambit_buy_product` (`id`, `abp_ac_id`, `payment_method`, `coupon`, `comments`, `confirm_agree`, `product_details`, `currency`, `total_price`, `paid_amnt`, `date`, `payment_status`) VALUES
(12, 1, 1, 'rfdg', 'ewfweghdrtghrt ygrtg', 1, '9:1:10900 || 12:2:94000', 1, 176800.00, 0.00, date_add(NOW(),INTERVAL -1 DAY), 0),
(19, 1, 3, '', 'Very good', 1, ' 29:1:550 || 9:2:21800', 1, 22350.00, 0.00, date_add(NOW(),INTERVAL -1 DAY), 1),
(21, 1, 3, 'wrtybd', 'hiiiiiiii', 1, '14:1:34000', 1, 33764.00, 0.00, date_add(NOW(),INTERVAL -1 DAY), 1),
(22, 1, 3, 'wrtybd', '', 1, '14:2:291720 || 14:1:1397339', 1, 341334.88, 0.00, date_add(NOW(),INTERVAL -1 DAY), 1),
(23, 1, 3, 'wrtybd', 'hhhhhhhh', 1, '9:1:46761', 2, 45748.56, 0.00, date_add(NOW(),INTERVAL -1 DAY), 1),
(24, 1, 3, '', 'jjjjj', 1, '9:1:10900', 1, 10900.00, 0.00, date_add(NOW(),INTERVAL -1 DAY), 1),
(25, 1, 3, '', '', 1, '10:3:105000', 1, 105000.00, 0.00, date_add(NOW(),INTERVAL -1 DAY), 1),
(26, 1, 3, 'wrtybd', 'xdfd', 1, '14:1:34000 || 14:4:170000', 1, 203764.00, 0.00, date_add(NOW(),INTERVAL -1 DAY), 1),
(27, 1, 3, '', '', 1, '10:1:35000', 1, 35000.00, 0.00, date_add(NOW(),INTERVAL -1 DAY), 1),
(28, 1, 1, '', '', 1, '10:1:35000', 1, 35000.00, 0.00, date_add(NOW(),INTERVAL -1 DAY), 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_buy_product_auction`
--

DROP TABLE IF EXISTS `ambit_buy_product_auction`;
CREATE TABLE `ambit_buy_product_auction` (
`abpa_id` int(11) NOT NULL,
  `abp_ac_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `paid_ammount` decimal(12,2) NOT NULL,
  `custom` text NOT NULL,
  `comments` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_buy_product_auction`
--

INSERT INTO `ambit_buy_product_auction` (`abpa_id`, `abp_ac_id`, `bid_id`, `currency`, `payment_method`, `amount`, `paid_ammount`, `custom`, `comments`, `date`, `status`) VALUES
(4, 1, 3, 1, 1, '10900.00', '0.00', '9||1||10900.00||3', 'hii', date_add(NOW(),INTERVAL -1 DAY), 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_city`
--

DROP TABLE IF EXISTS `ambit_city`;
CREATE TABLE `ambit_city` (
`ct_id` int(11) NOT NULL,
  `ct_cn_id` int(11) NOT NULL,
  `ct_name` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_city`
--

INSERT INTO `ambit_city` (`ct_id`, `ct_cn_id`, `ct_name`) VALUES
(1, 1, 'Mumbai'),
(2, 1, 'Pune'),
(3, 1, 'Bangalore'),
(4, 1, 'Mangalore'),
(5, 1, 'Kolkata'),
(6, 1, 'Digha'),
(7, 1, 'Kharagpur');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_country`
--

DROP TABLE IF EXISTS `ambit_country`;
CREATE TABLE `ambit_country` (
`cn_id` int(11) NOT NULL,
  `cn_name` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_country`
--

INSERT INTO `ambit_country` (`cn_id`, `cn_name`) VALUES
(1, 'India'),
(2, 'Australia'),
(3, 'South Africa'),
(4, 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_coupon`
--

DROP TABLE IF EXISTS `ambit_coupon`;
CREATE TABLE `ambit_coupon` (
`aco_id` int(11) NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_coupon`
--

INSERT INTO `ambit_coupon` (`aco_id`, `coupon_name`, `type`, `currency`, `discount`, `status`) VALUES
(1, 'wrtybd', 1, 1, 236, 1),
(4, 'sidd', 1, 2, 600, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_currency`
--

DROP TABLE IF EXISTS `ambit_currency`;
CREATE TABLE `ambit_currency` (
`acu_id` int(11) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `symbol` text NOT NULL,
  `unit_price` decimal(12,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_currency`
--

INSERT INTO `ambit_currency` (`acu_id`, `currency`, `symbol`, `unit_price`, `status`) VALUES
(1, 'INR', 'INR', '1.00', 1),
(3, 'EURO', 'EU', '0.012', 1),
(4, 'USD', 'US$', '0.013', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_customer`
--

DROP TABLE IF EXISTS `ambit_customer`;
CREATE TABLE `ambit_customer` (
`ac_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `post_code` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `terms_agree` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_customer`
--

INSERT INTO `ambit_customer` (`ac_id`, `name`, `email`, `address`, `landmark`, `country`, `city`, `phone`, `post_code`, `password`, `status`, `terms_agree`) VALUES
(1, 'John Doe', 'userdemo@yourmail.com', 'Kolkata, Sonarpur', 'Friends Club', 1, 5, 9874315138, 700150, '8db565fc4a30b682cb31ab78fa4c4008', 1, 1),
(2, 'Sidd Das', 's@gmail.com', 'Kolkata, Sonarpur', 'Friends Club', 1, 5, 9874315138, 700150, 'c4ca4238a0b923820dcc509a6f75849b', 1, 1),
(3, 'Satya Das', 'satya@gmail.com', 'kolkata', 'Maity Builders', 1, 2, 7602632739, 700150, 'c4ca4238a0b923820dcc509a6f75849b', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_faq`
--

DROP TABLE IF EXISTS `ambit_faq`;
CREATE TABLE `ambit_faq` (
`id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_faq`
--

INSERT INTO `ambit_faq` (`id`, `question`, `answer`, `date`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit', '  Fusce eu dui. Integer vel nibh sit amet turpis vulputate aliquet. Phasellus id nisi vitae odio pretium aliquam. Pellentesque a leo. Donec consequat lectus sed felis. Quisque vestibulum massa. Nulla ornare. Nulla libero. Donec et mi eu massa ultrices scelerisque.  Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu dictum justo urna et mi. Integer dictum est vitae sem. Vestibulum justo. Nulla mauris ipsum, convallis ut, vestibulum eu, tincidunt vel, nisi.', date_add(NOW(),INTERVAL -1 DAY)),
(8, 'Donec eros tellus scelerisque nec rhoncus eget laoreet sit amet', '  Fusce eu dui. Integer vel nibh sit amet turpis vulputate aliquet. Phasellus id nisi vitae odio pretium aliquam. Pellentesque a leo. Donec consequat lectus sed felis. Quisque vestibulum massa. Nulla ornare. Nulla libero. Donec et mi eu massa ultrices scelerisque.  Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu dictum justo urna et mi. Integer dictum est vitae sem. Vestibulum justo. Nulla mauris ipsum, convallis ut, vestibulum eu, tincidunt vel, nisi.', date_add(NOW(),INTERVAL -1 DAY)),
(9, 'If I buy Premium Package , will I get a discount?', 'No, there are no discounts on Premium Purchase', date_add(NOW(),INTERVAL -1 DAY)),
(10, 'Curabitur molestie euismod erat. Proin eros odio?', '\r\n\r\nFusce eu dui. Integer vel nibh sit amet turpis vulputate aliquet. Phasellus id nisi vitae odio pretium aliquam. Pellentesque a leo. Donec consequat lectus sed felis. Quisque vestibulum massa. Nulla ornare. Nulla libero. Donec et mi eu massa ultrices scelerisque.\r\n\r\nNullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu dictum justo urna et mi. Integer dictum est vitae sem. Vestibulum justo. Nulla mauris ipsum, convallis ut, vestibulum eu, tincidunt vel, nisi.\r\n', date_add(NOW(),INTERVAL -1 DAY)),
(11, 'In scelerisque sem at dolor. Maecenas mattis', 'Fusce eu dui. Integer vel nibh sit amet turpis vulputate aliquet. Phasellus id nisi vitae odio pretium aliquam. Pellentesque a leo. Donec consequat lectus sed felis. Quisque vestibulum massa. Nulla ornare. Nulla libero. Donec et mi eu massa ultrices scelerisque. Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu dictum justo urna et mi. Integer dictum est vitae sem. Vestibulum justo. Nulla mauris ipsum, convallis ut, vestibulum eu, tincidunt vel, nisi.', date_add(NOW(),INTERVAL -1 DAY)),
(12, 'SmartAddons membership fee is one-time fee, or I have to pay extra?', 'Fusce eu dui. Integer vel nibh sit amet turpis vulputate aliquet. Phasellus id nisi vitae odio pretium aliquam. Pellentesque a leo. Donec consequat lectus sed felis. Quisque vestibulum massa. Nulla ornare. Nulla libero. Donec et mi eu massa ultrices scelerisque. Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu dictum justo urna et mi. Integer dictum est vitae sem. Vestibulum justo. Nulla mauris ipsum, convallis ut, vestibulum eu, tincidunt vel, nisi.', date_add(NOW(),INTERVAL -1 DAY));

-- --------------------------------------------------------

--
-- Table structure for table `ambit_features`
--

DROP TABLE IF EXISTS `ambit_features`;
CREATE TABLE `ambit_features` (
`id` int(11) NOT NULL,
  `features` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_features`
--

INSERT INTO `ambit_features` (`id`, `features`) VALUES
(1, '<div class="banner-policy">\r\n										<div class="policy policy1"><a href="#"> <span class="ico-policy">Â </span> 90 day <br> money back </a></div>\r\n										<div class="policy policy2"><a href="#"> <span class="ico-policy">Â </span> In-store exchange </a></div>\r\n										<div class="policy policy3"><a href="#"> <span class="ico-policy">Â </span> lowest price guarantee </a></div>\r\n										<div class="policy policy4"><a href="#"> <span class="ico-policy">Â </span> shopping guarantee </a></div>\r\n									</div>');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_membership`
--

DROP TABLE IF EXISTS `ambit_membership`;
CREATE TABLE `ambit_membership` (
`p_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `currency` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=>active',
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_membership`
--

INSERT INTO `ambit_membership` (`p_id`, `name`, `currency`, `price`, `status`, `image`) VALUES
(1, 'Free', 1, 0, 1, 'free.png'),
(2, 'Standard', 1, 1200, 1, 'standard.png'),
(3, 'Premium', 1, 87000, 1, 'premium.png');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_package_description`
--

DROP TABLE IF EXISTS `ambit_package_description`;
CREATE TABLE `ambit_package_description` (
`id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL COMMENT 'foreign key=>ambit_membership(p_id)',
  `no_of_product` int(11) NOT NULL,
  `no_of_featured` int(11) NOT NULL,
  `no_of_image` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_package_description`
--

INSERT INTO `ambit_package_description` (`id`, `package_id`, `no_of_product`, `no_of_featured`, `no_of_image`) VALUES
(1, 1, -1, 8, 3),
(2, 2, -1, -1, -1),
(3, 3, -1, -1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_payment_method`
--

DROP TABLE IF EXISTS `ambit_payment_method`;
CREATE TABLE `ambit_payment_method` (
`apm_id` int(11) NOT NULL,
  `apm_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_payment_method`
--

INSERT INTO `ambit_payment_method` (`apm_id`, `apm_name`, `status`) VALUES
(1, 'PayPal', 1),
(3, 'Cash On Delivery', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_product_add`
--

DROP TABLE IF EXISTS `ambit_product_add`;
CREATE TABLE `ambit_product_add` (
`apa_id` int(11) NOT NULL,
  `apa_vr_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `sub_cat` int(11) NOT NULL,
  `sub_sub_cat` int(11) NOT NULL,
  `features` text NOT NULL,
  `description` text NOT NULL,
  `weight` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `posting_type` int(11) NOT NULL,
  `reserve_price` decimal(12,2) NOT NULL,
  `listing_duration` date NOT NULL,
  `currency` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `selling_price` decimal(12,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `popularity` bigint(20) NOT NULL DEFAULT '0',
  `keep_in` int(11) NOT NULL COMMENT '0=>Simple, 1=>Feature',
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_product_add`
--

INSERT INTO `ambit_product_add` (`apa_id`, `apa_vr_id`, `name`, `category`, `sub_cat`, `sub_sub_cat`, `features`, `description`, `weight`, `color`, `size`, `brand`, `posting_type`, `reserve_price`, `listing_duration`, `currency`, `price`, `selling_price`, `stock`, `video`, `status`, `popularity`, `keep_in`, `posting_date`) VALUES
(1, 2, 'Samsung Galaxy J8', 1, 2, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '14000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '14000 || 0 || 2800 || 100', '14000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(2, 2, 'Samsung Galaxy A7', 1, 2, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '16000.00', date_add(NOW(),INTERVAL 3 DAY), 1, '16000 || 0 || 3200 || 100', '16000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(3, 2, 'Samsung Galaxy J2', 1, 2, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '24000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '24000 || 0 || 4800 || 100', '24000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(4, 2, 'Samsung Galaxy A51', 1, 2, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '17000.00', date_add(NOW(),INTERVAL 4 DAY), 1, '17000 || 0 || 3400 || 100', '17000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(5, 2, 'Samsung Galaxy A71', 1, 2, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '15000.00', date_add(NOW(),INTERVAL 5 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(6, 2, 'Samsung Galaxy A21', 1, 2, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(7, 2, 'Samsung Galaxy M11', 1, 2, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '24000.00', date_add(NOW(),INTERVAL 1 DAY), 1, '24000 || 0 || 4800 || 100', '24000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(8, 2, 'Samsung Galaxy A31', 1, 2, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(9, 2, 'Samsung Galaxy M21', 1, 2, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '16000.00', date_add(NOW(),INTERVAL 3 DAY), 1, '16000 || 0 || 3200 || 100', '16000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(10, 2, 'Samsung Galaxy A41', 1, 2, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '37000.00', date_add(NOW(),INTERVAL 6 DAY), 1, '37000 || 0 || 7400 || 100', '37000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(11, 2, 'Nokia 8.3 5G', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 0, '5000.00', date_add(NOW(),INTERVAL 4 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(12, 2, 'Nokia 7.2', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 1, '15000.00', date_add(NOW(),INTERVAL 3 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(13, 2, 'Nokia 7.1', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 1, '25000.00', date_add(NOW(),INTERVAL 7 DAY), 1, '25000 || 0 || 5000 || 100', '25000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(14, 2, 'Nokia 8', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 1, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(15, 2, 'Nokia 2.1', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 1, '16000.00', date_add(NOW(),INTERVAL 1 DAY), 1, '16000 || 0 || 3200 || 100', '16000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(16, 2, 'Nokia 2.3', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 1, '22000.00', date_add(NOW(),INTERVAL 12 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(17, 2, 'Nokia 4.2', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 0, '14000.00', date_add(NOW(),INTERVAL 7 DAY), 1, '14000 || 0 || 2800 || 100', '14000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(18, 2, 'Nokia 5.1', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 1, '17000.00', date_add(NOW(),INTERVAL 8 DAY), 1, '17000 || 0 || 3400 || 100', '17000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(19, 2, 'Nokia 6.1', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 0, '15000.00', date_add(NOW(),INTERVAL 9 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(20, 2, 'Nokia 1 Plus', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 0, '16000.00', date_add(NOW(),INTERVAL 12 DAY), 1, '16000 || 0 || 3200 || 100', '16000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(21, 2, 'Nokia 8110 4G', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 1, '14000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '14000 || 0 || 2800 || 100', '14000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(22, 2, 'Nokia 2720 Flip', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 1, '18000.00', date_add(NOW(),INTERVAL 4 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(23, 2, 'Nokia 5310', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 0, '15000.00', date_add(NOW(),INTERVAL 5 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(24, 2, 'Nokia 800 Tough', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 1, '14000.00', date_add(NOW(),INTERVAL 8 DAY), 1, '14000 || 0 || 2800 || 100', '14000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(25, 2, 'Apple iPhone X 64GB', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 1, '52000.00', date_add(NOW(),INTERVAL 11 DAY), 1, '52000 || 0 || 10400 || 100', '52000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(26, 2, 'iPhone 11 Pro Max', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 0, '45000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '45000 || 0 || 9000 || 100', '45000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(27, 2, 'Apple iPhone XR Black', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 1, '40000.00', date_add(NOW(),INTERVAL 45 DAY), 1, '40000 || 0 || 8000 || 100', '40000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(28, 2, 'Apple iPhone 6', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 1, '50000.00', date_add(NOW(),INTERVAL 7 DAY), 1, '50000 || 0 || 10000 || 100', '50000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(29, 2, 'iPhone 11', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 0, '32000.00', date_add(NOW(),INTERVAL 3 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(30, 2, 'iPhone 8', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '2', 0, '36000.00', date_add(NOW(),INTERVAL 1 DAY), 1, '36000 || 0 || 7200 || 100', '36000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(31, 2, 'Sony Xperia 10 Plus', 1, 6, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '38000.00', date_add(NOW(),INTERVAL 9 DAY), 1, '38000 || 0 || 7600 || 100', '38000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(32, 2, 'Sony Xperia M2', 1, 6, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '55000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '55000 || 0 || 11000 || 100', '55000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(33, 2, 'Sony Xperia 10', 1, 6, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '65000.00', date_add(NOW(),INTERVAL 3 DAY), 1, '65000 || 0 || 13000 || 100', '65000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(34, 2, 'Sony Xperia Z3', 1, 6, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '75000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '75000 || 0 || 15000 || 100', '75000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(35, 2, 'Sony Xperia XZ3', 1, 6, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '60000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '60000 || 0 || 12000 || 100', '60000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(36, 2, 'HTC U19e', 1, 7, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '4', 0, '19000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '19000 || 0 || 3800 || 100', '19000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(37, 2, 'HTC U12 Plus', 1, 7, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '4', 1, '15000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(38, 2, 'HTC Desire 828 dual sim', 1, 7, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '4', 0, '9000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '9000 || 0 || 1800 || 100', '9000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(39, 2, 'Lenovo Z6 Pro', 1, 3, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 0, '17000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '17000 || 0 || 3400 || 100', '17000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(40, 2, 'Lenovo Z5', 1, 3, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 1, '9000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '9000 || 0 || 1800 || 100', '9000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(41, 2, 'Lenovo Z5s', 1, 3, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 1, '10000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '10000 || 0 || 2000 || 100', '10000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(42, 2, 'Lenovo K6', 1, 3, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 1, '14000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '14000 || 0 || 2800 || 100', '14000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(43, 2, 'Lenovo S850', 1, 3, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 0, '17000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '17000 || 0 || 3400 || 100', '17000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(44, 2, 'Oppo A7n', 1, 5, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '6', 0, '27000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '27000 || 0 || 5400 || 100', '27000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(45, 2, 'Vodafone Smart N10', 1, 1, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '7', 1, '12000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '12000 || 0 || 2400 || 100', '12000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(46, 2, 'Spice XLIFE Victor5', 1, 7, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '8', 0, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(47, 2, 'Spice Smart Flo Pace 3', 1, 5, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '8', 1, '6000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6000 || 0 || 1200 || 100', '6000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(48, 2, 'LG G8', 1, 4, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '7000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7000 || 0 || 1400 || 100', '7000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(49, 2, 'LG Solo LTE', 1, 4, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 0, '6000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6000 || 0 || 1200 || 100', '6000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(50, 2, 'LG G3 Moon Violet', 1, 4, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 0, '5500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5500 || 0 || 1100 || 100', '5500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(51, 2, 'Samsung Galaxy Tab S6 10.5', 2, 9, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '60000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '60000 || 0 || 12000 || 100', '60000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(52, 2, 'Samsung Galaxy Tab S4', 2, 9, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '40000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '40000 || 0 || 8000 || 100', '40000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(53, 2, 'The Galaxy Tab Active Pro', 2, 9, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '35000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '35000 || 0 || 7000 || 100', '35000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(54, 2, 'Lenovo Tab M10', 2, 10, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 0, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(55, 2, 'Lenovo tab 4 10 inch', 2, 10, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 1, '19000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '19000 || 0 || 3800 || 100', '19000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(56, 2, 'LifePLUS 4G Calling Tablet', 2, 10, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '10', 1, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(57, 2, 'LifePlus Big Screen 4G Calling Tablet', 2, 9, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '10', 1, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(58, 2, 'Tiitan 3G Calling Tablet', 2, 11, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '11', 0, '8000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '8000 || 0 || 1600 || 100', '8000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(59, 2, 'Microsoft Surface Pro 7', 2, 11, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '12', 1, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(60, 2, 'ASUS ZenPad Z301M-A2-GR', 2, 11, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '13', 1, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(61, 2, 'MTK8752 Octa Core', 2, 12, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '14', 1, '12000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '12000 || 0 || 2400 || 100', '12000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(62, 2, 'Tablet PC Octa Core 4GB', 2, 10, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '14', 1, '13000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '13000 || 0 || 2600 || 100', '13000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(63, 2, 'Jumper EZpad', 2, 11, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '15', 0, '11000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '11000 || 0 || 2200 || 100', '11000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(64, 2, 'Jumper Ezpad 6', 2, 9, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '15', 0, '13000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '13000 || 0 || 2600 || 100', '13000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(65, 2, 'Binai K11', 2, 9, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '16', 1, '15000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(66, 2, 'Intel Inside TM75A', 2, 11, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '17', 0, '25000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '25000 || 0 || 5000 || 100', '25000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(67, 2, 'Customize 8 Inch Window8 Intel', 2, 11, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '17', 1, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(68, 2, 'Intel Educational Tablet Pc', 2, 11, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '17', 0, '28000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '28000 || 0 || 5600 || 100', '28000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(69, 2, 'PIPO W2Pro 32GB Intel', 2, 11, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '17', 0, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(70, 2, 'DELL Venue 8 20.3 cm', 2, 12, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(71, 2, 'Apple iPad 10.2', 3, 13, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 0, '65000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '65000 || 0 || 13000 || 100', '65000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(72, 2, 'Apple iPad Space Grey', 3, 14, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '35000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '35000 || 0 || 7000 || 100', '35000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(73, 2, 'iPad Pro', 3, 15, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(74, 2, 'iPad Pro 12.9inch', 3, 14, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 0, '46000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '46000 || 0 || 9200 || 100', '46000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(75, 2, 'Keyboard Logitech SLIM FOLIO PRO', 3, 14, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '55000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '55000 || 0 || 11000 || 100', '55000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(76, 2, 'Apple 10.5', 3, 15, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 0, '45000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '45000 || 0 || 9000 || 100', '45000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(77, 2, 'Apple Ipad 5 9 7 Inch', 3, 15, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 0, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(78, 2, 'Tablet APPLE iPad Air 2 9.7', 3, 14, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '28000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '28000 || 0 || 5600 || 100', '28000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(79, 2, 'Apple iPad Pro 12.9', 3, 13, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 0, '65000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '65000 || 0 || 13000 || 100', '65000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(80, 2, 'iPad 9.7 Air 2', 3, 14, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 0, '68000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '68000 || 0 || 13600 || 100', '68000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(81, 2, 'iPad Mini', 3, 13, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '46000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '46000 || 0 || 9200 || 100', '46000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(82, 2, 'iPad Pro leak exposes', 3, 13, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 0, '42000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '42000 || 0 || 8400 || 100', '42000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(83, 2, 'iPad Pro 128GB', 3, 13, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '52000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '52000 || 0 || 10400 || 100', '52000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(84, 2, 'apple_ipadmini', 3, 15, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '35000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '35000 || 0 || 7000 || 100', '35000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(85, 2, 'Apple A14', 3, 15, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 0, '40000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '40000 || 0 || 8000 || 100', '40000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(86, 2, 'LaunchPort Sleeve', 3, 15, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 0, '25000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '25000 || 0 || 5000 || 100', '25000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(87, 2, 'Apple iPad 2 16GB', 3, 15, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '44000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '44000 || 0 || 8800 || 100', '44000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(88, 2, 'Apple ipad mini 4 7. 9', 3, 15, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '38000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '38000 || 0 || 7600 || 100', '38000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(89, 2, 'Apple iPad with WiFi', 3, 13, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 0, '60000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '60000 || 0 || 12000 || 100', '60000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(90, 2, 'KD 20000 mAh Power Bank', 4, 17, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '800.00', date_add(NOW(),INTERVAL 2 DAY), 1, '800 || 0 || 160 || 100', '800.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(91, 2, 'Ultra-Compact Portable Power Bank', 4, 24, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '500 || 0 || 100 || 100', '500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(92, 2, 'WST Original Mini Power Bank', 4, 19, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '900.00', date_add(NOW(),INTERVAL 2 DAY), 1, '900 || 0 || 180 || 100', '900.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(93, 2, 'Rapid Charge Compact', 4, 23, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '750.00', date_add(NOW(),INTERVAL 2 DAY), 1, '750 || 0 || 150 || 100', '750.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),

(94, 2, 'iPhone Battery Packs & Power Banks', 4, 16, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(95, 2, 'power banks for iPhone 6s', 4, 17, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '5500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5500 || 0 || 1100 || 100', '5500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(96, 2, 'Oppo F9 Pro Cat Covers', 4, 23, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '750.00', date_add(NOW(),INTERVAL 2 DAY), 1, '750 || 0 || 150 || 100', '750.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(97, 2, 'Htc Phone Cases Covers', 4, 17, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '800.00', date_add(NOW(),INTERVAL 2 DAY), 1, '800 || 0 || 160 || 100', '800.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(98, 2, 'Richlime Mobile Back Cover', 4, 21, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '200.00', date_add(NOW(),INTERVAL 2 DAY), 1, '200 || 0 || 40 || 100', '200.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(99, 2, 'Samsung Galaxy A20 Case', 4, 21, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '500 || 0 || 100 || 100', '500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(100, 2, 'ROYAL bluetooth', 4, 20, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(101, 2, 'Wireless Bluetooth Earpiece V4.1', 4, 19, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '800.00', date_add(NOW(),INTERVAL 2 DAY), 1, '800 || 0 || 160 || 100', '800.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(102, 2, 'Warcraft Wireless Headset', 4, 16, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '500 || 0 || 100 || 100', '500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(103, 2, 'htc headset', 4, 19, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '400.00', date_add(NOW(),INTERVAL 2 DAY), 1, '400 || 0 || 80 || 100', '400.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(104, 2, 'Wired Handsfree Earphone', 4, 16, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '200.00', date_add(NOW(),INTERVAL 2 DAY), 1, '200 || 0 || 40 || 100', '200.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(105, 2, 'Wireless Bluetooth Headset', 4, 20, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '300.00', date_add(NOW(),INTERVAL 2 DAY), 1, '300 || 0 || 60 || 100', '300.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(106, 2, 'Portable 2600mAh Mobile Power Bank', 4, 22, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '1500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '1500 || 0 || 300 || 100', '1500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(107, 2, 'Belkin Car Cup Mount', 4, 18, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '600.00', date_add(NOW(),INTERVAL 2 DAY), 1, '600 || 0 || 120 || 100', '600.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(108, 2, 'PhoneHolder', 4, 19, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '250.00', date_add(NOW(),INTERVAL 2 DAY), 1, '250 || 0 || 50 || 100', '250.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(109, 2, 'Samsung Galaxy A10 Phone Charger', 4, 22, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '900.00', date_add(NOW(),INTERVAL 2 DAY), 1, '900 || 0 || 180 || 100', '900.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY));
INSERT INTO `ambit_product_add` (`apa_id`, `apa_vr_id`, `name`, `category`, `sub_cat`, `sub_sub_cat`, `features`, `description`, `weight`, `color`, `size`, `brand`, `posting_type`, `reserve_price`, `listing_duration`, `currency`, `price`, `selling_price`, `stock`, `video`, `status`, `popularity`, `keep_in`, `posting_date`) VALUES
(110, 2, 'Mobile Keeper', 4, 18, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '200.00', date_add(NOW(),INTERVAL 2 DAY), 1, '200 || 0 || 40 || 100', '200.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(111, 2, 'Metal Tablet Stand', 4, 23, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '500 || 0 || 100 || 100', '500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(112, 2, 'Anti-fingerprint Tablet Back Case', 4, 20, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '350.00', date_add(NOW(),INTERVAL 2 DAY), 1, '350 || 0 || 70 || 100', '350.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(113, 2, '7-8 inch Tablet Accessories', 4, 18, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '500 || 0 || 100 || 100', '500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(114, 2, 'Portable Foldable Tablet Holder', 4, 24, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '350.00', date_add(NOW(),INTERVAL 2 DAY), 1, '350 || 0 || 70 || 100', '350.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(115, 2, 'Tablet Stand For iPad', 4, 23, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '2000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2000 || 0 || 400 || 100', '2000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(116, 2, 'Tablet Cooling Bracket', 4, 18, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '250.00', date_add(NOW(),INTERVAL 2 DAY), 1, '250 || 0 || 50 || 100', '250.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(117, 2, 'POS-X iSAPPOS Stand Tablets', 4, 21, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '400.00', date_add(NOW(),INTERVAL 2 DAY), 1, '400 || 0 || 80 || 100', '400.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(118, 2, 'Anti-Theft Security Kiosk & POS Stand', 4, 19, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '800.00', date_add(NOW(),INTERVAL 2 DAY), 1, '800 || 0 || 160 || 100', '800.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(119, 2, 'Smonet Destop Anti-Theft Pos', 4, 17, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '700.00', date_add(NOW(),INTERVAL 2 DAY), 1, '700 || 0 || 140 || 100', '700.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(120, 2, 'Adjustable Car Tablet Stand Holder', 4, 19, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '200.00', date_add(NOW(),INTERVAL 2 DAY), 1, '200 || 0 || 40 || 100', '200.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(121, 2, 'Luxury Crocodile Grain Leather Case', 4, 18, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '800.00', date_add(NOW(),INTERVAL 2 DAY), 1, '800 || 0 || 160 || 100', '800.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(122, 2, 'Ugreen Phone Holder Stand', 4, 24, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '200.00', date_add(NOW(),INTERVAL 2 DAY), 1, '200 || 0 || 40 || 100', '200.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(123, 2, 'Entif Stand Case Cover', 4, 22, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '150.00', date_add(NOW(),INTERVAL 2 DAY), 1, '150 || 0 || 30 || 100', '150.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(124, 2, 'Apple iPad Air 2 - Flip Stand', 4, 18, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '550.00', date_add(NOW(),INTERVAL 2 DAY), 1, '550 || 0 || 110 || 100', '550.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(125, 2, 'VersaCover for iPad mini', 4, 19, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '450.00', date_add(NOW(),INTERVAL 2 DAY), 1, '450 || 0 || 90 || 100', '450.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(126, 2, 'Suction Cup Mount', 4, 16, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '300.00', date_add(NOW(),INTERVAL 2 DAY), 1, '300 || 0 || 60 || 100', '300.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(127, 2, 'Yeldou Tablet Stand', 4, 22, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '300.00', date_add(NOW(),INTERVAL 2 DAY), 1, '300 || 0 || 60 || 100', '300.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(128, 2, 'PU Leather Case Folding Stand Cover', 4, 16, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '450.00', date_add(NOW(),INTERVAL 2 DAY), 1, '450 || 0 || 90 || 100', '450.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(129, 2, 'Multi-Angle Portable Stand', 4, 19, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '500 || 0 || 100 || 100', '500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(130, 2, 'Dteck MediaPad T5 Case', 4, 23, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '300.00', date_add(NOW(),INTERVAL 2 DAY), 1, '300 || 0 || 60 || 100', '300.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(131, 2, 'Microsoft Surface Pro 3', 4, 20, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '400.00', date_add(NOW(),INTERVAL 2 DAY), 1, '400 || 0 || 80 || 100', '400.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(132, 2, 'Surface Pro Charger', 4, 17, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '600.00', date_add(NOW(),INTERVAL 2 DAY), 1, '600 || 0 || 120 || 100', '600.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(133, 2, 'CHARGER FOR ARCHOS 97 CARBON TABLET', 4, 16, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '500 || 0 || 100 || 100', '500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(134, 2, 'Ksj 3 USB Port Plug', 4, 16, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(135, 2, 'Samsung Desktop Computer', 5, 25, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(136, 2, 'Samsung 690', 5, 25, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(137, 2, 'Apple iMac 21.5', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(138, 2, 'Assembled-Desktop-Intel-Core', 5, 28, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '17', 1, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(139, 2, 'Computer LED Monitor', 5, 28, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '17', 0, '25000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '25000 || 0 || 5000 || 100', '25000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(140, 2, 'Assembled Desktop', 5, 28, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '17', 1, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(141, 2, 'Frontech 4050A Cabinet', 5, 28, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '17', 1, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(142, 2, 'Lenovo Desktop Computer', 5, 27, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '20', 1, '21000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '21000 || 0 || 4200 || 100', '21000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(143, 2, 'Lenovo M720', 5, 27, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '20', 1, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(144, 2, 'Lenovo M720 SFF', 5, 25, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '20', 1, '23000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '23000 || 0 || 4600 || 100', '23000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(145, 2, 'Lenovo ThinkCentre M720', 5, 27, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '20', 1, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(146, 2, 'Lenevo Desktop Computer', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '20', 0, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(147, 2, 'CTL IP2153', 5, 28, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '21', 1, '15000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(148, 2, 'Dell Optiplex 960', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(149, 2, 'The Dell Optiplex Desktop Tower Computer', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '42000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '42000 || 0 || 8400 || 100', '42000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(150, 2, 'Dell OptiPlex 3010', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '40000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '40000 || 0 || 8000 || 100', '40000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(151, 2, 'Dell-780-1TB-Windows', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(152, 2, 'Dell -Precision T390Workstation', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(153, 2, 'Dell 24 Monitor', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '34000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '34000 || 0 || 6800 || 100', '34000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(154, 2, 'Dell Optiplex Desktop Computer PC', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(155, 2, 'Dell 24 Full HD', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(156, 2, 'Dell SE2419H', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '31000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '31000 || 0 || 6200 || 100', '31000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(157, 2, 'Dell S2240L', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(158, 2, 'Dell SE2216H', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '33000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '33000 || 0 || 6600 || 100', '33000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(159, 2, 'Dell S2216H', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '35000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '35000 || 0 || 7000 || 100', '35000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(160, 2, 'LED PC CPU Computer Desktop', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(161, 2, 'Assemble New Pc', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(162, 2, 'New i5 Assembled Desktop', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(163, 2, 'High-Quality-CPU-Win-7', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '21000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '21000 || 0 || 4200 || 100', '21000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(164, 2, 'BBC3078 Black Desktop', 5, 27, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '22', 0, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(165, 2, 'BBC pmk1 Full Tower Gaming Cabinet', 5, 26, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '22', 0, '17000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '17000 || 0 || 3400 || 100', '17000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(166, 2, 'BBC-0653BB', 5, 25, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '22', 0, '16000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '16000 || 0 || 3200 || 100', '16000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(167, 2, 'bbc Assembled Desktop core2duo', 5, 28, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '22', 1, '15000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(168, 2, 'Frontech Polo JIL-4059A', 5, 27, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '23', 1, '14000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '14000 || 0 || 2800 || 100', '14000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(169, 2, 'Frontech Anchor JIL-4130A', 5, 25, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '23', 1, '15000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(170, 2, 'Frontech Dawn JIL-4132AS', 5, 25, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '23', 0, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(171, 2, 'Core i5 8GB Ram', 5, 25, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '24', 1, '23000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '23000 || 0 || 4600 || 100', '23000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(172, 2, 'OptiPlex Desktop Computers', 5, 28, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '25', 1, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(173, 2, 'OptiPlex 7060 ultimate Tower', 5, 25, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '25', 0, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(174, 2, 'HP EliteDesk G1', 5, 25, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '24', 1, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(175, 2, 'HP Core i5 Windows', 5, 25, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '24', 1, '21000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '21000 || 0 || 4200 || 100', '21000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(176, 2, 'HP 280 G4 MT', 5, 25, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '24', 0, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(177, 2, 'Megaport Gaming PC', 5, 25, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '24', 0, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(178, 2, 'Samsung Notebook 9 Pen Laptop', 6, 29, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '25000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '25000 || 0 || 5000 || 100', '25000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(179, 2, 'Samsung Notebook 9 Pro', 6, 31, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(180, 2, 'Samsung Notebook 7 Force Laptop', 6, 29, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(181, 2, 'samsung-galaxy-chromebook', 6, 29, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '40000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '40000 || 0 || 8000 || 100', '40000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(182, 2, 'Samsung ChromeBook XE50', 6, 29, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '23000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '23000 || 0 || 4600 || 100', '23000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(183, 2, 'IdeaPad S145', 6, 29, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 0, '75000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '75000 || 0 || 15000 || 100', '75000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(184, 2, 'IdeaPad S340', 6, 29, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 0, '80000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '80000 || 0 || 16000 || 100', '80000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(185, 2, 'MacBook Pro Model-A1990', 6, 29, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '85000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '85000 || 0 || 17000 || 100', '85000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(186, 2, 'Apple MacBook Pro', 6, 29, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '75000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '75000 || 0 || 15000 || 100', '75000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(187, 2, 'Apple MACBOOK PRO 15', 6, 29, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '77000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '77000 || 0 || 15400 || 100', '77000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(188, 2, 'PC Apple MacBook', 6, 29, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 1, '88000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '88000 || 0 || 17600 || 100', '88000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(189, 2, 'Purple Apple Macbook', 6, 29, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '19', 0, '71000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '71000 || 0 || 14200 || 100', '71000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(190, 2, 'Lenovo Ideapad S145', 6, 32, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 0, '40000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '40000 || 0 || 8000 || 100', '40000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(191, 2, 'Lenovo IdeaPad L340', 6, 32, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 0, '45000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '45000 || 0 || 9000 || 100', '45000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(192, 2, 'Lenovo Ideapad S340', 6, 32, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 1, '50000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '50000 || 0 || 10000 || 100', '50000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(193, 2, 'Lenovo ThinkPad X390', 6, 32, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 1, '25000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '25000 || 0 || 5000 || 100', '25000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(194, 2, 'Lenovo 320', 6, 32, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 0, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(195, 2, 'Lenovo 15.6', 6, 32, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 1, '28000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '28000 || 0 || 5600 || 100', '28000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(196, 2, 'Lenovo Ideapad C340', 6, 32, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 0, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(197, 2, 'Lenovo Yoga 2 11.6', 6, 32, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 0, '21000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '21000 || 0 || 4200 || 100', '21000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(198, 2, 'Lenovo IdeaPad Duet', 6, 32, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 0, '23000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '23000 || 0 || 4600 || 100', '23000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(199, 2, 'Lenovo IdeaPad 500s', 6, 32, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 0, '33000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '33000 || 0 || 6600 || 100', '33000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(200, 2, 'Lenovo 14', 6, 32, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 1, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(201, 2, 'Lenovo Y700', 6, 32, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '5', 0, '28000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '28000 || 0 || 5600 || 100', '28000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(202, 2, 'Dell Inspiron 15.6', 6, 31, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '25000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '25000 || 0 || 5000 || 100', '25000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(203, 2, 'Dell Inspiron 15 3583', 6, 31, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 1, '40000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '40000 || 0 || 8000 || 100', '40000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(204, 2, 'Dell Latitude 7480', 6, 31, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '45000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '45000 || 0 || 9000 || 100', '45000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(205, 2, 'Dell Inspiron 15.6 pink', 6, 31, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '18', 0, '33000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '33000 || 0 || 6600 || 100', '33000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(206, 2, 'HP Pavilion', 6, 30, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '24', 1, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(207, 2, 'HP Stream 11 Violet', 6, 30, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '24', 0, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(208, 2, 'PRO X KEYBOARD', 7, 33, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '26', 0, '2000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2000 || 0 || 400 || 100', '2000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(209, 2, 'Nuklz N Large Print Computer Keyboard', 7, 36, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '27', 0, '1500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '1500 || 0 || 300 || 100', '1500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(210, 2, 'BigBlu Kinderboard Large Key Keyboard', 7, 34, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '28', 1, '1800.00', date_add(NOW(),INTERVAL 2 DAY), 1, '1800 || 0 || 360 || 100', '1800.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(211, 2, 'HP K2500 Wireless Keyboard', 7, 38, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '24', 1, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(212, 2, 'StarTech USB', 7, 38, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '29', 1, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(213, 2, 'Stainless Steel Micro USB Cables', 7, 34, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '29', 0, '200.00', date_add(NOW(),INTERVAL 2 DAY), 1, '200 || 0 || 40 || 100', '200.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(214, 2, '3-Foot USB 3.0 Micro B Cable', 7, 35, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '29', 0, '300.00', date_add(NOW(),INTERVAL 2 DAY), 1, '300 || 0 || 60 || 100', '300.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(215, 2, 'Transparent wires', 7, 35, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '29', 0, '400.00', date_add(NOW(),INTERVAL 2 DAY), 1, '400 || 0 || 80 || 100', '400.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(216, 2, '30cm USB Cable', 7, 35, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '30', 0, '250.00', date_add(NOW(),INTERVAL 2 DAY), 1, '250 || 0 || 50 || 100', '250.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(217, 2, 'USB Cable', 7, 39, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '30', 0, '300.00', date_add(NOW(),INTERVAL 2 DAY), 1, '300 || 0 || 60 || 100', '300.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY));
INSERT INTO `ambit_product_add` (`apa_id`, `apa_vr_id`, `name`, `category`, `sub_cat`, `sub_sub_cat`, `features`, `description`, `weight`, `color`, `size`, `brand`, `posting_type`, `reserve_price`, `listing_duration`, `currency`, `price`, `selling_price`, `stock`, `video`, `status`, `popularity`, `keep_in`, `posting_date`) VALUES
(218, 2, 'IHMC Public Cmaps', 7, 38, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '31', 1, '400.00', date_add(NOW(),INTERVAL 2 DAY), 1, '400 || 0 || 80 || 100', '400.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(219, 2, 'Mouse peripheral', 7, 37, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '30', 0, '200.00', date_add(NOW(),INTERVAL 2 DAY), 1, '200 || 0 || 40 || 100', '200.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(220, 2, 'Verbatim Wireless Mouse', 7, 36, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '32', 0, '400.00', date_add(NOW(),INTERVAL 2 DAY), 1, '400 || 0 || 80 || 100', '400.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(221, 2, 'amazonbasics mouse', 7, 37, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '33', 0, '300.00', date_add(NOW(),INTERVAL 2 DAY), 1, '300 || 0 || 60 || 100', '300.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(222, 2, 'VicTsing 2.4G Wireless Mouse', 7, 36, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '34', 1, '450.00', date_add(NOW(),INTERVAL 2 DAY), 1, '450 || 0 || 90 || 100', '450.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(223, 2, 'Logitech G7 Laser Cordless Mouse', 7, 38, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '26', 1, '500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '500 || 0 || 100 || 100', '500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(224, 2, 'Logitech M187 Wireless Mouse', 7, 39, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '26', 0, '350.00', date_add(NOW(),INTERVAL 2 DAY), 1, '350 || 0 || 70 || 100', '350.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(225, 2, 'VicTsing Bluetooth Wireless Mouse', 7, 39, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '34', 0, '600.00', date_add(NOW(),INTERVAL 2 DAY), 1, '600 || 0 || 120 || 100', '600.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(226, 2, 'Universal Silicone Laptop Keyboard Cover', 7, 37, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '35', 1, '200.00', date_add(NOW(),INTERVAL 2 DAY), 1, '200 || 0 || 40 || 100', '200.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(227, 2, 'Universal Keyboard Cover', 7, 39, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '35', 1, '150.00', date_add(NOW(),INTERVAL 2 DAY), 1, '150 || 0 || 30 || 100', '150.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(228, 2, 'Ranz 3 In 1 Laptop Protection', 7, 38, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '35', 1, '180.00', date_add(NOW(),INTERVAL 2 DAY), 1, '180 || 0 || 36 || 100', '180.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(229, 2, 'VGA Cable', 7, 34, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '36', 0, '300.00', date_add(NOW(),INTERVAL 2 DAY), 1, '300 || 0 || 60 || 100', '300.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(230, 2, 'VGA Cable SVGA', 7, 37, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '36', 0, '350.00', date_add(NOW(),INTERVAL 2 DAY), 1, '350 || 0 || 70 || 100', '350.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(231, 2, 'Scm 3 Pin Laptop Power Cable Cord', 7, 35, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '37', 0, '500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '500 || 0 || 100 || 100', '500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(232, 2, 'Power Cable For Laptop Adapter', 7, 36, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '37', 1, '500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '500 || 0 || 100 || 100', '500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(233, 2, '18W Power Delivery USB C Charger', 7, 35, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '37', 1, '400.00', date_add(NOW(),INTERVAL 2 DAY), 1, '400 || 0 || 80 || 100', '400.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(234, 2, 'Anker 33W PowerPort', 7, 39, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '30', 1, '350.00', date_add(NOW(),INTERVAL 2 DAY), 1, '350 || 0 || 70 || 100', '350.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(235, 2, 'USB C Wall Charger', 7, 33, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '37', 0, '500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '500 || 0 || 100 || 100', '500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(236, 2, 'Transcend StoreJet 25M3', 7, 33, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '38', 0, '400.00', date_add(NOW(),INTERVAL 2 DAY), 1, '400 || 0 || 80 || 100', '400.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(237, 2, 'Transcend External Hard Drive', 7, 35, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '38', 1, '8000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '8000 || 0 || 1600 || 100', '8000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(238, 2, 'External Hard Disk', 7, 36, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '10000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '10000 || 0 || 2000 || 100', '10000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(239, 2, 'iBall Decor Computer Speakers', 7, 33, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '39', 1, '300.00', date_add(NOW(),INTERVAL 2 DAY), 1, '300 || 0 || 60 || 100', '300.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(240, 2, 'Logitech Z-130 - speakers', 7, 34, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '26', 0, '400.00', date_add(NOW(),INTERVAL 2 DAY), 1, '400 || 0 || 80 || 100', '400.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(241, 2, 'Loudspeaker High fidelity', 7, 34, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '26', 1, '500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '500 || 0 || 100 || 100', '500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(242, 2, 'SanDisk Cruzer Pen Drive', 7, 34, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '40', 1, '700.00', date_add(NOW(),INTERVAL 2 DAY), 1, '700 || 0 || 140 || 100', '700.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(243, 2, '32 Gb Pendrive', 7, 36, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '40', 0, '650.00', date_add(NOW(),INTERVAL 2 DAY), 1, '650 || 0 || 130 || 100', '650.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(244, 2, 'MECO USB Pen Drive', 7, 39, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '41', 0, '750.00', date_add(NOW(),INTERVAL 2 DAY), 1, '750 || 0 || 150 || 100', '750.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(245, 2, 'Sony Microvault Tiny 16GB Pen Drive', 7, 34, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '900.00', date_add(NOW(),INTERVAL 2 DAY), 1, '900 || 0 || 180 || 100', '900.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(246, 2, 'Sony Pen Drive', 7, 38, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '1000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '1000 || 0 || 200 || 100', '1000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(247, 2, '8GB Sony USB 2.0 Pen Drive', 7, 37, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '800.00', date_add(NOW(),INTERVAL 2 DAY), 1, '800 || 0 || 160 || 100', '800.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(298, 2, 'Trion 19 INCH', 8, 45, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '42', 0, '10000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '10000 || 0 || 2000 || 100', '10000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(299, 2, 'NEW DEVANTI 32', 8, 44, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '43', 1, '12000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '12000 || 0 || 2400 || 100', '12000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(300, 2, 'BPL Vivid Television', 8, 43, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '44', 0, '11000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '11000 || 0 || 2200 || 100', '11000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(301, 2, 'TCL 81.28 cm', 8, 45, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '45', 1, '10000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '10000 || 0 || 2000 || 100', '10000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(302, 2, 'Xiaomi Mi TV', 8, 41, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '46', 1, '10000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '10000 || 0 || 2000 || 100', '10000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(303, 2, 'impex-led-tv', 8, 43, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '47', 1, '9000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '9000 || 0 || 1800 || 100', '9000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(304, 2, 'LED Ibell LE40D1', 8, 41, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '48', 0, '12000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '12000 || 0 || 2400 || 100', '12000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(305, 2, 'Ibell Led Tv 40', 8, 40, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '48', 1, '12000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '12000 || 0 || 2400 || 100', '12000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(306, 2, 'LG 43LM5500PTA', 8, 40, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '15000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(307, 2, 'LG TV', 8, 40, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(308, 2, 'LG UHD TV', 8, 40, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '16000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '16000 || 0 || 3200 || 100', '16000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(309, 2, 'LG 24LH454A', 8, 40, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '15000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(310, 2, 'LG Flat TV', 8, 40, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '14000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '14000 || 0 || 2800 || 100', '14000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(311, 2, 'LG 21SB8RGE', 8, 40, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '13000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '13000 || 0 || 2600 || 100', '13000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(312, 2, 'LG 65 Inch LED Ultra HD', 8, 40, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '16000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '16000 || 0 || 3200 || 100', '16000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(313, 2, 'LG 42LF7700 HD TV', 8, 40, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '15000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(314, 2, 'Sony Bravia 80 Cm', 8, 43, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(315, 2, 'Sony Bravia LED TV KLV-32R202G', 8, 43, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '25000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '25000 || 0 || 5000 || 100', '25000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(316, 2, 'Sony R20f Led Tv', 8, 43, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '28000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '28000 || 0 || 5600 || 100', '28000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(317, 2, 'Sony R30f Led Tv', 8, 43, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '27000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '27000 || 0 || 5400 || 100', '27000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(318, 2, 'Sony 55A8F', 8, 43, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(319, 2, 'Sony 55-inch', 8, 43, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '19000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '19000 || 0 || 3800 || 100', '19000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(320, 2, 'Sony Bravia 138.8 Cm', 8, 43, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(321, 2, 'SONY LED TV 40 Inch Full HD', 8, 43, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(322, 2, 'Sony Bravia Kdl-40R350E', 8, 43, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(323, 2, 'Videocon CRT TV', 8, 44, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '49', 0, '9000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '9000 || 0 || 1800 || 100', '9000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(324, 2, 'Hyundai TV Led', 8, 43, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '50', 0, '12000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '12000 || 0 || 2400 || 100', '12000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(325, 2, 'Panasonic TH-50PX75U 50', 8, 41, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 1, '14000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '14000 || 0 || 2800 || 100', '14000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(326, 2, 'Panasonic TH-L32U20D LCD TV', 8, 41, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 1, '13000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '13000 || 0 || 2600 || 100', '13000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(327, 2, 'E400 Panasonic Led Tv', 8, 41, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 0, '12000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '12000 || 0 || 2400 || 100', '12000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(328, 2, 'Panasonic 55 Inch LED', 8, 41, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 0, '11000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '11000 || 0 || 2200 || 100', '11000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(329, 2, 'Panasonic 32 Inch LCD', 8, 41, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 1, '10000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '10000 || 0 || 2000 || 100', '10000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(330, 2, 'Panasonic 50 VIERA', 8, 41, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 0, '14000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '14000 || 0 || 2800 || 100', '14000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(331, 2, 'Panasonic TH32F403N', 8, 41, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 0, '15000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(332, 2, 'Panasonic VIERA', 8, 41, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 0, '13000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '13000 || 0 || 2600 || 100', '13000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(333, 2, '52 Inch Panasonic', 8, 41, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 0, '12000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '12000 || 0 || 2400 || 100', '12000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(334, 2, 'Maxmo 40 Inch', 8, 41, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '52', 1, '8000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '8000 || 0 || 1600 || 100', '8000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(335, 2, 'Samsung PS43F4500', 8, 42, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(336, 2, 'Samsung PS-50C450', 8, 42, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '28000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '28000 || 0 || 5600 || 100', '28000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(337, 2, 'SAMSUNG 43', 8, 42, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '29000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '29000 || 0 || 5800 || 100', '29000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(338, 2, 'Samsung 75 Inch LED Ultra', 8, 42, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '28000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '28000 || 0 || 5600 || 100', '28000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(339, 2, 'Samsung QLED 8K TV', 8, 42, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '29000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '29000 || 0 || 5800 || 100', '29000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(340, 2, 'Samsung UN65RU7300FXZA', 8, 42, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(341, 2, 'Samsung 50KU7000', 8, 42, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(342, 2, 'SAMSUNG Smart LED', 8, 42, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '31000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '31000 || 0 || 6200 || 100', '31000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(343, 2, 'Samsung UN32N5300FXZC', 8, 42, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(344, 2, 'Samy SM32', 8, 42, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '53', 0, '7000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7000 || 0 || 1400 || 100', '7000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(345, 2, 'Sanyo 123 cm', 8, 40, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '54', 0, '8800.00', date_add(NOW(),INTERVAL 2 DAY), 1, '8800 || 0 || 1760 || 100', '8800.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(346, 2, 'TCL S525 43', 8, 45, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '45', 1, '9800.00', date_add(NOW(),INTERVAL 2 DAY), 1, '9800 || 0 || 1960 || 100', '9800.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(347, 2, 'L43P8US TCL', 8, 45, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '45', 1, '8800.00', date_add(NOW(),INTERVAL 2 DAY), 1, '8800 || 0 || 1760 || 100', '8800.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(348, 2, 'smart pink headphone', 9, 46, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '900.00', date_add(NOW(),INTERVAL 2 DAY), 1, '900 || 0 || 180 || 100', '900.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(349, 2, 'Samsung ED75E', 9, 46, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '300.00', date_add(NOW(),INTERVAL 2 DAY), 1, '300 || 0 || 60 || 100', '300.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(350, 2, 'Samsung ue32eh4000 remote', 9, 46, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '400.00', date_add(NOW(),INTERVAL 2 DAY), 1, '400 || 0 || 80 || 100', '400.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(351, 2, 'SAMSUNG BN59-01181B REMOTE', 9, 47, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '450.00', date_add(NOW(),INTERVAL 2 DAY), 1, '450 || 0 || 90 || 100', '450.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(352, 2, 'Samsung BN59-01247A', 9, 48, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '300.00', date_add(NOW(),INTERVAL 2 DAY), 1, '300 || 0 || 60 || 100', '300.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(353, 2, 'SAMSUNG BN60-01181B REMOTE', 9, 48, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '350.00', date_add(NOW(),INTERVAL 2 DAY), 1, '350 || 0 || 70 || 100', '350.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(354, 2, 'PowerLocus Bluetooth Over-Ear Headphones', 9, 46, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '600.00', date_add(NOW(),INTERVAL 2 DAY), 1, '600 || 0 || 120 || 100', '600.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(355, 2, 'LatestTrend Headphone', 9, 48, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '200.00', date_add(NOW(),INTERVAL 2 DAY), 1, '200 || 0 || 40 || 100', '200.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(356, 2, 'URC7935 Universal Remote', 9, 48, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '35', 1, '300.00', date_add(NOW(),INTERVAL 2 DAY), 1, '300 || 0 || 60 || 100', '300.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(357, 2, 'Universal Remote URC1210', 9, 48, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '35', 0, '350.00', date_add(NOW(),INTERVAL 2 DAY), 1, '350 || 0 || 70 || 100', '350.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(358, 2, 'OVLENG V8 1 Bass Bluetooth Headset', 9, 47, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '55', 1, '1000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '1000 || 0 || 200 || 100', '1000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(359, 2, 'Mpow H7 Pro Bluetooth Headphones', 9, 46, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '56', 1, '950.00', date_add(NOW(),INTERVAL 2 DAY), 1, '950 || 0 || 190 || 100', '950.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(360, 2, 'Audeze LCD Earpads', 9, 48, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '57', 1, '500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '500 || 0 || 100 || 100', '500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(361, 2, 'MROW MDRXB950B1LCE', 9, 48, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '58', 0, '800.00', date_add(NOW(),INTERVAL 2 DAY), 1, '800 || 0 || 160 || 100', '800.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(362, 2, 'Truvison TV-6045bt', 10, 52, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '59', 0, '28000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '28000 || 0 || 5600 || 100', '28000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(363, 2, 'Truvison SE - 6055', 10, 51, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '59', 1, '25000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '25000 || 0 || 5000 || 100', '25000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(364, 2, 'LG LHD-427 5.1 Channel DVD', 10, 50, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 0, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(365, 2, 'LG DH3140S HOME THEATER', 10, 49, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 0, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(366, 2, 'LG HT904TA 5.1 Home Theatre', 10, 52, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(367, 2, 'Shinco V11 5.1 home theater audio suite', 10, 49, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '60', 1, '28000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '28000 || 0 || 5600 || 100', '28000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(368, 2, 'NASCO 210 WATTS LONG SPEAKERS', 10, 52, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '61', 0, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(369, 2, 'Sony DAV-DX375 5.1 Channel DVD', 10, 53, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '28000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '28000 || 0 || 5600 || 100', '28000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(370, 2, 'Sony DAV-HDX267W', 10, 50, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '25000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '25000 || 0 || 5000 || 100', '25000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(371, 2, 'Sony DAV-TZ145 5.1 DVD Home Theatre', 10, 50, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '24000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '24000 || 0 || 4800 || 100', '24000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(372, 2, 'Sony SA-D40 4.1 Home Theatre System', 10, 51, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '26000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '26000 || 0 || 5200 || 100', '26000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(373, 2, 'Intex 301 N FMU OS 4.1 Speaker System', 10, 52, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '62', 1, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(374, 2, 'Oscar 4141BT With Digital Display', 10, 49, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '63', 1, '38000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '38000 || 0 || 7600 || 100', '38000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(375, 2, 'murphy Digital Bluetooth Home Theater', 10, 50, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '64', 0, '25000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '25000 || 0 || 5000 || 100', '25000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY));
INSERT INTO `ambit_product_add` (`apa_id`, `apa_vr_id`, `name`, `category`, `sub_cat`, `sub_sub_cat`, `features`, `description`, `weight`, `color`, `size`, `brand`, `posting_type`, `reserve_price`, `listing_duration`, `currency`, `price`, `selling_price`, `stock`, `video`, `status`, `popularity`, `keep_in`, `posting_date`) VALUES
(376, 2, 'Pioneer HTP-074 Home Theater', 10, 53, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '65', 0, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(377, 2, 'Channel Home Theater Speaker', 10, 51, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '65', 0, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(378, 2, 'MARVELLOUS MULTIMEDIA SPEAKER SYSTEM', 10, 53, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '65', 0, '23000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '23000 || 0 || 4600 || 100', '23000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(379, 2, 'Zebronics ZEB-SW2490', 10, 50, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '66', 0, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(380, 2, 'JBL Tuner', 10, 50, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '67', 1, '2500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2500 || 0 || 500 || 100', '2500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(381, 2, 'JBL Boombox Portable Speaker', 10, 52, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '67', 0, '2800.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2800 || 0 || 560 || 100', '2800.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(382, 2, 'Tecsun DR-920C FM', 10, 53, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '68', 1, '2500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2500 || 0 || 500 || 100', '2500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(383, 2, 'Saregama Carvaan', 10, 53, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '69', 0, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(384, 2, 'Carvaan violet', 10, 53, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '69', 1, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(385, 2, 'New Carvaan 2.0', 10, 52, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '69', 1, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(386, 2, 'Philips IN-RL205 N FM Radio', 10, 52, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 0, '2500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2500 || 0 || 500 || 100', '2500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(387, 2, 'Philips AZ380', 10, 50, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 1, '2000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2000 || 0 || 400 || 100', '2000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(388, 2, 'PHILIPS HT SPT6660', 10, 49, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 1, '3000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '3000 || 0 || 600 || 100', '3000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(389, 2, 'Portable Radio', 10, 50, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 0, '2000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2000 || 0 || 400 || 100', '2000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(390, 2, 'toshiba', 10, 50, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '71', 1, '2800.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2800 || 0 || 560 || 100', '2800.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(391, 2, 'TOA DM-1200 Microphone', 10, 53, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '72', 0, '4000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '4000 || 0 || 800 || 100', '4000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(392, 2, 'modern Microphone', 10, 49, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '73', 1, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(393, 2, 'Glorik Retro Studio Microphone', 10, 50, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '73', 0, '7000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7000 || 0 || 1400 || 100', '7000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(394, 2, 'Portable Microphone Headset', 10, 49, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '73', 0, '6000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6000 || 0 || 1200 || 100', '6000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(395, 2, 'Canon EOS', 11, 55, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '74', 1, '26000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '26000 || 0 || 5200 || 100', '26000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(396, 2, 'Canon Europe', 11, 55, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '74', 1, '36000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '36000 || 0 || 7200 || 100', '36000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(397, 2, 'Canon PowerShot G16', 11, 55, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '74', 0, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(398, 2, 'Canon Eos 60d', 11, 55, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '74', 1, '6000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6000 || 0 || 1200 || 100', '6000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(399, 2, 'Nikon Coolpix', 11, 54, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '75', 0, '6000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6000 || 0 || 1200 || 100', '6000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(400, 2, 'Nikon Coolpix S3600', 11, 54, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '75', 0, '7000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7000 || 0 || 1400 || 100', '7000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(401, 2, 'Nikon COOLPIX A900', 11, 54, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '75', 0, '8000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '8000 || 0 || 1600 || 100', '8000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(402, 2, 'Nikon Coolpix W150 Blue', 11, 54, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '75', 1, '5500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5500 || 0 || 1100 || 100', '5500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(403, 2, 'Nikon COOLPIX P1000', 11, 54, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '75', 0, '6500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6500 || 0 || 1300 || 100', '6500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(404, 2, 'Nikon Coolpix W150 Orange', 11, 54, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '75', 0, '7500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7500 || 0 || 1500 || 100', '7500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(405, 2, 'Nikon-Coolpix-W150', 11, 54, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '75', 0, '6500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6500 || 0 || 1300 || 100', '6500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(406, 2, 'Nikon Coolpix W150 pink', 11, 54, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '75', 1, '8500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '8500 || 0 || 1700 || 100', '8500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(407, 2, 'Nikon COOLPIX yellow', 11, 54, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '75', 1, '7500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7500 || 0 || 1500 || 100', '7500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(408, 2, 'Sony Alpha a6600', 11, 56, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(409, 2, 'Sony Cyber Shot', 11, 56, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '26000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '26000 || 0 || 5200 || 100', '26000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(410, 2, 'Fujifilm Instax', 11, 54, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '76', 1, '8000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '8000 || 0 || 1600 || 100', '8000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(411, 2, 'Fujifilm X-A5', 11, 55, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '76', 0, '9000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '9000 || 0 || 1800 || 100', '9000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(412, 2, 'Philips Still Camera', 11, 55, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 0, '10000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '10000 || 0 || 2000 || 100', '10000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(413, 2, 'Philips Camera', 11, 56, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 1, '12000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '12000 || 0 || 2400 || 100', '12000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(414, 2, 'Philips Retro Digicam', 11, 55, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 0, '9000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '9000 || 0 || 1800 || 100', '9000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(415, 2, 'Sony HDR-TD', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '69000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '69000 || 0 || 13800 || 100', '69000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(416, 2, 'Sony Handycam', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '65000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '65000 || 0 || 13000 || 100', '65000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(417, 2, 'Sony 32GB HDR-PJ540', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '55000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '55000 || 0 || 11000 || 100', '55000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(418, 2, 'Sony FDR-AX700', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '50000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '50000 || 0 || 10000 || 100', '50000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(419, 2, 'Sony NTSC 8mm Video camera', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '40000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '40000 || 0 || 8000 || 100', '40000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(420, 2, 'Sony CCDTRV67', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '52000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '52000 || 0 || 10400 || 100', '52000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(421, 2, 'Sony DCR-HC90', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '45000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '45000 || 0 || 9000 || 100', '45000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(422, 2, 'SONY SONY DCR-HC90', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '50000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '50000 || 0 || 10000 || 100', '50000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(423, 2, 'Sony hd 1920 video camera', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '40000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '40000 || 0 || 8000 || 100', '40000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(424, 2, 'Sony HXR-NX70E', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 0, '42000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '42000 || 0 || 8400 || 100', '42000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(425, 2, 'Sony HXR-MC50P', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '36000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '36000 || 0 || 7200 || 100', '36000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(426, 2, 'Sony_HDR-FX1E', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '3', 1, '55000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '55000 || 0 || 11000 || 100', '55000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(427, 2, 'JVC GR-SXM38US', 12, 57, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '77', 1, '29000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '29000 || 0 || 5800 || 100', '29000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(428, 2, 'JVC GR-SXM740U', 12, 57, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '77', 1, '36000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '36000 || 0 || 7200 || 100', '36000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(429, 2, 'Canon Video Camera', 12, 57, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '74', 1, '40000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '40000 || 0 || 8000 || 100', '40000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(430, 2, 'Panasonic HC-PV100GW', 12, 57, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 1, '28000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '28000 || 0 || 5600 || 100', '28000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(431, 2, 'Panasonic HC-V180', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 1, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(432, 2, 'Panasonic PV100', 12, 57, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 1, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(433, 2, 'HC-W580EB', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 0, '31000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '31000 || 0 || 6200 || 100', '31000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(434, 2, 'Camcorder HDV', 12, 57, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '78', 0, '25000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '25000 || 0 || 5000 || 100', '25000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(435, 2, 'Camcorder', 12, 58, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '78', 0, '24000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '24000 || 0 || 4800 || 100', '24000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(436, 2, 'Voltas Split AC 183 ZZY', 13, 59, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '79', 1, '33000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '33000 || 0 || 6600 || 100', '33000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(437, 2, 'Voltas Split AC 183', 13, 59, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '79', 1, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(438, 2, 'Voltas 1.5ton 3 Star Split Ac', 13, 59, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '79', 0, '38000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '38000 || 0 || 7600 || 100', '38000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(439, 2, 'Voltas 1.5 Ton 5 Star', 13, 59, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '79', 1, '37000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '37000 || 0 || 7400 || 100', '37000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(440, 2, 'Voltas AC 1.5Ton WAC 183', 13, 59, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '79', 1, '35000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '35000 || 0 || 7000 || 100', '35000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(441, 2, 'Voltas 1 Ton 5 Star', 13, 59, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '79', 1, '44000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '44000 || 0 || 8800 || 100', '44000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(442, 2, 'Carrier 2 Ton Estrella', 13, 63, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '80', 0, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(443, 2, 'Samsung 1.5 Ton', 13, 60, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '34000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '34000 || 0 || 6800 || 100', '34000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(444, 2, 'Samsung 1 Ton 3 Star', 13, 60, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '35000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '35000 || 0 || 7000 || 100', '35000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(445, 2, 'Samsung 1.5 Ton Split Ac', 13, 60, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '38000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '38000 || 0 || 7600 || 100', '38000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(446, 2, 'Samsung AR18JC3ESLWNNA', 13, 60, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '37000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '37000 || 0 || 7400 || 100', '37000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(447, 2, 'Samsung AR12JC5ESLZNNA 1 Ton', 13, 60, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '36000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '36000 || 0 || 7200 || 100', '36000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(448, 2, 'Samsung Window Ac', 13, 60, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '19000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '19000 || 0 || 3800 || 100', '19000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(449, 2, 'Samsung 1.5 Ton AR18HC2UXNB', 13, 60, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '33000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '33000 || 0 || 6600 || 100', '33000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(450, 2, 'Daikin Split Air Conditioner', 13, 61, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '81', 1, '40000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '40000 || 0 || 8000 || 100', '40000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(451, 2, 'LG 1.5 Ton 5 Star', 13, 62, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '34000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '34000 || 0 || 6800 || 100', '34000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(452, 2, 'LG 1.5 Ton 5 Star Split AC', 13, 62, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '24000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '24000 || 0 || 4800 || 100', '24000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(453, 2, 'LG window AC', 13, 62, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(454, 2, 'Whirlpool Split Ac', 13, 63, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '82', 1, '38000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '38000 || 0 || 7600 || 100', '38000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(455, 2, 'Whirlpool 3D Cool Inverter AC', 13, 63, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '82', 0, '34000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '34000 || 0 || 6800 || 100', '34000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(456, 2, 'Whirlpool 3D COOL DELUXE', 13, 63, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '82', 1, '32000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '32000 || 0 || 6400 || 100', '32000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(457, 2, 'Whirlpool 1.5 Ton 5 Star 3D', 13, 63, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '82', 0, '34000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '34000 || 0 || 6800 || 100', '34000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(458, 2, 'Hitachi 1 Ton 3 Star', 13, 64, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '83', 1, '24000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '24000 || 0 || 4800 || 100', '24000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(459, 2, 'V Cook Air Cooler Tower Fan', 13, 65, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '84', 1, '7000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7000 || 0 || 1400 || 100', '7000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(460, 2, 'Small Mobile Air Cooler', 13, 61, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '84', 0, '8000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '8000 || 0 || 1600 || 100', '8000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(461, 2, 'Symphony Air Cooler', 13, 59, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '85', 1, '9000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '9000 || 0 || 1800 || 100', '9000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(462, 2, 'Symphony Sumo 70', 13, 59, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '85', 0, '12000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '12000 || 0 || 2400 || 100', '12000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(463, 2, 'Sumo 75XL', 13, 66, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 0, '9000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '9000 || 0 || 1800 || 100', '9000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(464, 2, 'Plastic Body Air Cooler', 13, 66, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 0, '9000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '9000 || 0 || 1800 || 100', '9000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(465, 2, 'Bajaj Platini PX97', 13, 66, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 1, '12000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '12000 || 0 || 2400 || 100', '12000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(466, 2, 'Bajaj PX 93 DC DLX Room Cooler', 13, 66, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 1, '13000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '13000 || 0 || 2600 || 100', '13000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(467, 2, 'Bajaj PC 2012 20 Litres', 13, 66, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 0, '14000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '14000 || 0 || 2800 || 100', '14000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(468, 2, 'Bajaj DC 2016 Glacier Room Cooler', 13, 66, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 1, '8000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '8000 || 0 || 1600 || 100', '8000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(469, 2, 'Bajaj DC2015 43-litres', 13, 66, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 0, '10000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '10000 || 0 || 2000 || 100', '10000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(470, 2, 'Bajaj Dc 2015', 13, 66, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 0, '9000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '9000 || 0 || 1800 || 100', '9000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(471, 2, 'Samsung RR20R182YCR', 14, 69, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '24000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '24000 || 0 || 4800 || 100', '24000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(472, 2, 'Samsung RR20M2741U2', 14, 69, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(473, 2, 'Samsung Single Door Refrigerator', 14, 69, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '21000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '21000 || 0 || 4200 || 100', '21000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(474, 2, 'Samsung RR24N287YR8', 14, 69, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '21000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '21000 || 0 || 4200 || 100', '21000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(475, 2, 'Samsung RR20R182ZUT', 14, 69, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 1, '19000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '19000 || 0 || 3800 || 100', '19000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(476, 2, 'Samsung SRF719DLS', 14, 69, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '1', 0, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(477, 2, 'LG 285 L GL-D302', 14, 68, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 0, '17000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '17000 || 0 || 3400 || 100', '17000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(478, 2, 'LG 260 L 3 Star', 14, 68, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 0, '16000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '16000 || 0 || 3200 || 100', '16000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(479, 2, 'LG 190 L Direct Cool', 14, 68, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 0, '15000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(480, 2, 'LG Gl-I302RPOL', 14, 68, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(481, 2, 'LG GL-M322RMPL', 14, 68, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '17500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '17500 || 0 || 3500 || 100', '17500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(482, 2, 'Godrej Double Door Refrigerator', 14, 67, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '87', 0, '12000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '12000 || 0 || 2400 || 100', '12000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(483, 2, 'Godrej RD EDGE DUO', 14, 67, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '87', 0, '13000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '13000 || 0 || 2600 || 100', '13000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY));
INSERT INTO `ambit_product_add` (`apa_id`, `apa_vr_id`, `name`, `category`, `sub_cat`, `sub_sub_cat`, `features`, `description`, `weight`, `color`, `size`, `brand`, `posting_type`, `reserve_price`, `listing_duration`, `currency`, `price`, `selling_price`, `stock`, `video`, `status`, `popularity`, `keep_in`, `posting_date`) VALUES
(484, 2, 'Godrej 190 Ltr 4 Star', 14, 67, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '87', 1, '17000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '17000 || 0 || 3400 || 100', '17000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(485, 2, 'Godrej Rd Edge Pro', 14, 67, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '87', 0, '16000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '16000 || 0 || 3200 || 100', '16000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(486, 2, 'Godrej RD EPRO', 14, 67, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '87', 0, '15000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(487, 2, 'Godrej RD EDGE PRO Violet', 14, 67, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '87', 0, '14000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '14000 || 0 || 2800 || 100', '14000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(488, 2, 'Godrej RB EON', 14, 67, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '87', 1, '17000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '17000 || 0 || 3400 || 100', '17000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(489, 2, 'godrej-rd-edge-pro-210', 14, 67, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '87', 1, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(490, 2, 'Godrej Rt Eon 231', 14, 67, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '87', 0, '16000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '16000 || 0 || 3200 || 100', '16000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(491, 2, 'Godrej 263 Litre Double Door', 14, 67, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '87', 1, '12000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '12000 || 0 || 2400 || 100', '12000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(492, 2, 'Whirlpool 5ED5FHKXV', 14, 70, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '82', 1, '24000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '24000 || 0 || 4800 || 100', '24000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(493, 2, 'Whirlpool W Series 460 L', 14, 70, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '82', 0, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(494, 2, 'Whirlpool FP 263D', 14, 70, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '82', 1, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(495, 2, 'Haier Refrigeration', 14, 72, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '88', 1, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(496, 2, 'Haier HRD-1905CS-H', 14, 72, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '88', 0, '19000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '19000 || 0 || 3800 || 100', '19000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(497, 2, 'VIDEOCON DOUBLE DOOR REFRIGERATOR', 14, 71, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '49', 0, '24000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '24000 || 0 || 4800 || 100', '24000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(498, 2, 'Videocon 170 L 3 Star', 14, 71, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '49', 1, '23000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '23000 || 0 || 4600 || 100', '23000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(499, 2, 'Domestic Videocon Refrigerator', 14, 71, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '49', 1, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(500, 2, 'Videocon 225 Litres 5 Star', 14, 71, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '49', 0, '24000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '24000 || 0 || 4800 || 100', '24000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(501, 2, 'Bajaj 750W Classic Mixer Grinder', 15, 76, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 1, '6000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6000 || 0 || 1200 || 100', '6000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(502, 2, 'AnjaliMix 5 Jars 1000W', 15, 80, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '89', 0, '7000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7000 || 0 || 1400 || 100', '7000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(503, 2, 'Preethi Galaxy 750W Mixer Grinder', 15, 80, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '89', 1, '6500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6500 || 0 || 1300 || 100', '6500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(504, 2, '750 Watts 3 Jar Mixer Grinder', 15, 78, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '90', 1, '7500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7500 || 0 || 1500 || 100', '7500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(505, 2, 'Juicer Mixer Grinder', 15, 79, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 0, '3000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '3000 || 0 || 600 || 100', '3000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(506, 2, 'philips grinder', 15, 73, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 1, '8000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '8000 || 0 || 1600 || 100', '8000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(507, 2, 'Preethi TRIO-MG158 3 JAR', 15, 74, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 1, '7000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7000 || 0 || 1400 || 100', '7000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(508, 2, 'WONDERCHEF MIXER GRINDER', 15, 73, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '91', 1, '9000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '9000 || 0 || 1800 || 100', '9000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(509, 2, 'Wonderchef Cortina Juicer', 15, 73, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '91', 0, '4000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '4000 || 0 || 800 || 100', '4000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(510, 2, 'kenstar NUTRIV', 15, 75, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '92', 1, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(511, 2, 'Portable Juice Blender', 15, 79, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 0, '4000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '4000 || 0 || 800 || 100', '4000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(512, 2, 'Fruit And Vegetable Hand Juicer', 15, 75, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 1, '2000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2000 || 0 || 400 || 100', '2000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(513, 2, 'Homgeek Slow Electric Juicer', 15, 75, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 1, '6000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6000 || 0 || 1200 || 100', '6000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(514, 2, 'SOGA 2X Slow Juicer', 15, 78, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 0, '7000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7000 || 0 || 1400 || 100', '7000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(515, 2, 'Kuvings CS600', 15, 78, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 0, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(516, 2, 'Koios Juicer', 15, 75, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 0, '4000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '4000 || 0 || 800 || 100', '4000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(517, 2, 'Convection Microwave Oven', 15, 75, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '93', 0, '19000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '19000 || 0 || 3800 || 100', '19000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(518, 2, 'Black & Decker Grill Microwave', 15, 80, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '94', 0, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(519, 2, 'Black Decker 23 Ltr Microwave', 15, 80, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '94', 1, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(520, 2, 'SUQIAOQIAO Microwave', 15, 75, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '94', 0, '21000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '21000 || 0 || 4200 || 100', '21000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(521, 2, 'Multi-Function Electric Oven', 15, 76, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '94', 1, '24000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '24000 || 0 || 4800 || 100', '24000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(522, 2, 'Prestige 1100 m', 15, 74, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '95', 1, '25000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '25000 || 0 || 5000 || 100', '25000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(523, 2, 'Glen 60cm', 15, 79, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '96', 0, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(524, 2, 'Glen 6056 Touch Sensor', 15, 76, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '96', 1, '28000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '28000 || 0 || 5600 || 100', '28000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(525, 2, 'Glen 90 cm Kitchen Chimney', 15, 79, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '96', 1, '26000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '26000 || 0 || 5200 || 100', '26000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(526, 2, 'Kutchina Kitchen Chimney', 15, 77, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '97', 0, '24000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '24000 || 0 || 4800 || 100', '24000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(527, 2, 'Bosch DWP94BC50B', 15, 77, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '98', 0, '22000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '22000 || 0 || 4400 || 100', '22000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(528, 2, 'KENT Pop Up Toaster', 15, 78, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '99', 1, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(529, 2, 'Sencor STS 6054RD', 15, 74, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '100', 1, '6000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6000 || 0 || 1200 || 100', '6000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(530, 2, 'Sencor STS 6053VT', 15, 77, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '100', 0, '5500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5500 || 0 || 1100 || 100', '5500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(531, 2, '4 Slice Pop-Up Toaster', 15, 73, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '101', 1, '7000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7000 || 0 || 1400 || 100', '7000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(532, 2, 'Morphy Richards AT-204', 15, 78, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '101', 1, '6000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6000 || 0 || 1200 || 100', '6000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(533, 2, 'Morphy AT-401', 15, 78, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '101', 1, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(534, 2, 'Panini Press Grill', 15, 74, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '91', 1, '7000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7000 || 0 || 1400 || 100', '7000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(535, 2, 'Neo Sandwich Maker', 15, 74, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '91', 0, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(536, 2, 'Electric 3 In 1 Sandwich Maker', 15, 80, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '91', 0, '5500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5500 || 0 || 1100 || 100', '5500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(537, 2, 'Prestige Sandwich Toaster', 15, 75, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '95', 0, '4000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '4000 || 0 || 800 || 100', '4000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(538, 2, 'Waffle Sandwich Maker', 15, 74, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '95', 0, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(539, 2, 'Sinbo Grill Maker SSM-2536', 15, 77, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '102', 0, '7000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7000 || 0 || 1400 || 100', '7000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(540, 2, 'Portable BBQ Grill Maker HCL661', 15, 79, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '103', 0, '6500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6500 || 0 || 1300 || 100', '6500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(541, 2, 'Morphy Richards HBCP', 15, 73, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '101', 0, '3000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '3000 || 0 || 600 || 100', '3000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(542, 2, 'Havells 7 litres', 15, 74, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '104', 1, '14000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '14000 || 0 || 2800 || 100', '14000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(543, 2, 'Kent Pearl Ro Water Purifier', 15, 73, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '99', 1, '15000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(544, 2, 'HUL Pureit Ultima RO+UV Water Purifier', 15, 73, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '105', 1, '9000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '9000 || 0 || 1800 || 100', '9000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(545, 2, 'Eveready Electric Kettles Ket502', 15, 75, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '106', 1, '3000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '3000 || 0 || 600 || 100', '3000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(546, 2, 'Morphy Richards Flamio', 15, 74, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '101', 0, '2000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2000 || 0 || 400 || 100', '2000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(547, 2, 'Kenwood Mesmerine ZJM811 Jug Kettle', 15, 79, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '107', 1, '3000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '3000 || 0 || 600 || 100', '3000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(548, 2, 'Havells Vetro Digi Kettle', 15, 74, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '104', 0, '2000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2000 || 0 || 400 || 100', '2000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(549, 2, 'SmartKook Induction Cooktop', 15, 77, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '108', 1, '2500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2500 || 0 || 500 || 100', '2500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(550, 2, 'Usha Cook Joy', 15, 74, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '109', 0, '3000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '3000 || 0 || 600 || 100', '3000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(551, 2, 'Prestige 1200 Watt', 15, 77, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '95', 1, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(552, 2, 'Coffee maker', 15, 76, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 1, '2000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2000 || 0 || 400 || 100', '2000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(553, 2, 'Morphy Richards Primero Drip Coffee Maker', 15, 76, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '101', 0, '3500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '3500 || 0 || 700 || 100', '3500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(554, 2, 'Singer Xpress Brew 800 W Coffee Maker', 15, 74, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '110', 1, '3000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '3000 || 0 || 600 || 100', '3000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(555, 2, 'Prestige Atlas Electric Rice Cooker', 15, 77, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '110', 1, '4000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '4000 || 0 || 800 || 100', '4000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(556, 2, 'PHILIPS Bagless Vacuum Cleaner', 16, 85, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '70', 0, '19000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '19000 || 0 || 3800 || 100', '19000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(557, 2, 'Panasonic ECO-Max', 16, 81, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '51', 0, '18000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '18000 || 0 || 3600 || 100', '18000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(558, 2, 'Prestige 1200 Watt Vacuum Cleaner', 16, 83, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '95', 1, '17000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '17000 || 0 || 3400 || 100', '17000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(559, 2, 'Mini Car Vacuum Cleaner', 16, 85, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 0, '15000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '15000 || 0 || 3000 || 100', '15000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(560, 2, 'Bajaj Maxima', 16, 82, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 1, '2500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2500 || 0 || 500 || 100', '2500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(561, 2, 'Home Decorative 3 Light Ceiling Fan', 16, 81, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 0, '4000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '4000 || 0 || 800 || 100', '4000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(562, 2, 'blue-design-table-fan', 16, 83, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 0, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(563, 2, 'havells table fan', 16, 82, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '104', 0, '4000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '4000 || 0 || 800 || 100', '4000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(564, 2, 'HAVELLS Lumeno', 16, 83, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '104', 1, '3000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '3000 || 0 || 600 || 100', '3000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(565, 2, 'Wind Pro Stand 70', 16, 83, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '111', 1, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(566, 2, 'Orient 400 mm Stand', 16, 85, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '111', 1, '6000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6000 || 0 || 1200 || 100', '6000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(567, 2, 'Luminous 230 mm Fan', 16, 84, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '112', 1, '2500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '2500 || 0 || 500 || 100', '2500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(568, 2, 'Usha Duos Mist Air 400 mm', 16, 83, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '109', 0, '3000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '3000 || 0 || 600 || 100', '3000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(569, 2, 'Usha Maxx Air', 16, 82, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '109', 1, '4000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '4000 || 0 || 800 || 100', '4000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(570, 2, 'Bosch Fully-AutomaticWashing Machine', 16, 85, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '98', 1, '35000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '35000 || 0 || 7000 || 100', '35000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(571, 2, 'IFB 8 kg Water softener', 16, 86, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '113', 1, '29000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '29000 || 0 || 5800 || 100', '29000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(572, 2, 'Senorita Aqua SX 6.5 Kg', 16, 84, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '113', 1, '28000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '28000 || 0 || 5600 || 100', '28000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(573, 2, 'Semi Automatic Washing Machine', 16, 81, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '82', 0, '20000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '20000 || 0 || 4000 || 100', '20000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(574, 2, 'LG 7 kg Fully Automatic Washing Machine', 16, 81, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '30000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '30000 || 0 || 6000 || 100', '30000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(575, 2, 'LG WD14024D6', 16, 81, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '9', 1, '29000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '29000 || 0 || 5800 || 100', '29000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(576, 2, 'Havells Instanio 3-Litre Instant Geyser', 16, 81, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '104', 1, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(577, 2, 'Havells Instanio Geyser', 16, 82, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '104', 0, '7000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7000 || 0 || 1400 || 100', '7000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(578, 2, 'Havells Adonia R 15 Litre Geyser', 16, 83, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '104', 1, '6000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '6000 || 0 || 1200 || 100', '6000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(579, 2, 'ABS Geyser Instant Water Heater', 16, 85, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '114', 0, '7500.00', date_add(NOW(),INTERVAL 2 DAY), 1, '7500 || 0 || 1500 || 100', '7500.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(580, 2, 'KALPTREE 3 Ltr Snippy Instant', 16, 81, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '115', 0, '3000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '3000 || 0 || 600 || 100', '3000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(581, 2, 'Electric Iron', 16, 86, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '86', 0, '700.00', date_add(NOW(),INTERVAL 2 DAY), 1, '700 || 0 || 140 || 100', '700.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(582, 2, 'Signature Travel Iron', 16, 82, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '116', 1, '900.00', date_add(NOW(),INTERVAL 2 DAY), 1, '900 || 0 || 180 || 100', '900.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY)),
(583, 2, 'Singer Electric Sewing Machine', 16, 82, 0, '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est .', '', '1 || 2', '', '110', 0, '5000.00', date_add(NOW(),INTERVAL 2 DAY), 1, '5000 || 0 || 1000 || 100', '5000.00', 20, '', 1, 0, 1, date_add(NOW(),INTERVAL -5 DAY));

-- --------------------------------------------------------

--
-- Table structure for table `ambit_product_bid`
--

DROP TABLE IF EXISTS `ambit_product_bid`;
CREATE TABLE `ambit_product_bid` (
`id` int(11) NOT NULL,
  `apa_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `bid_amount` decimal(12,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=>looser, 1=>won',
  `auction_status` int(11) NOT NULL DEFAULT '1',
  `purchase_status` int(11) NOT NULL DEFAULT '0',
  `bid_status` int(11) NOT NULL DEFAULT '1' COMMENT '1=>active bid'
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_product_bid`
--

INSERT INTO `ambit_product_bid` (`id`, `apa_id`, `cus_id`, `currency`, `bid_amount`, `date`, `status`, `auction_status`, `purchase_status`, `bid_status`) VALUES
(1, 9, 3, 1, '23.31', date_add(NOW(),INTERVAL -1 DAY), 0, 0, 0, 1),
(2, 9, 2, 1, '25.00', date_add(NOW(),INTERVAL -1 DAY), 0, 0, 0, 1),
(3, 9, 1, 1, '10900.00', date_add(NOW(),INTERVAL -1 DAY), 1, 0, 1, 1),
(4, 27, 1, 1, '139.86', date_add(NOW(),INTERVAL -1 DAY), 0, 1, 0, 0),
(5, 27, 1, 1, '300.00', date_add(NOW(),INTERVAL -1 DAY), 0, 1, 0, 0),
(13, 27, 1, 1, '500001.00', date_add(NOW(),INTERVAL -1 DAY), 0, 1, 0, 0),
(21, 27, 2, 1, '500002.00', date_add(NOW(),INTERVAL -1 DAY), 0, 1, 0, 1),
(22, 27, 1, 1, '500003.00', date_add(NOW(),INTERVAL -1 DAY), 0, 1, 0, 1),
(23, 27, 2, 1, '500004.00', date_add(NOW(),INTERVAL -1 DAY), 0, 1, 0, 1),
(24, 27, 1, 1, '500005.00', date_add(NOW(),INTERVAL -1 DAY), 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_product_color`
--

DROP TABLE IF EXISTS `ambit_product_color`;
CREATE TABLE `ambit_product_color` (
`apc_id` int(11) NOT NULL,
  `apc_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_product_color`
--

INSERT INTO `ambit_product_color` (`apc_id`, `apc_name`, `image`) VALUES
(1, 'Black', 'black.jpg'),
(2, 'Grey', 'grey.jpg'),
(3, 'Red', 'red.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_product_image`
--

DROP TABLE IF EXISTS `ambit_product_image`;
CREATE TABLE `ambit_product_image` (
`api_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `api_apa_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_product_image`
--

INSERT INTO `ambit_product_image` (`api_id`, `image`, `status`, `api_apa_id`) VALUES
(1, 'Samsung-Galaxy-J8.jpg', 1, 1),
(2, 'Samsung-Galaxy-A7.jpg', 1, 2),
(3, 'Samsung-Galaxy-J2.jpg', 1, 3),
(4, 'Samsung-Galaxy-A51.jpg', 1, 4),
(5, 'Samsung-Galaxy-A71.jpg', 1, 5),
(6, 'Samsung-Galaxy-A21.jpg', 1, 6),
(7, 'Samsung-Galaxy-M11.jpg', 1, 7),
(8, 'Samsung-Galaxy-A31.jpg', 1, 8),
(9, 'Samsung-Galaxy-M21.jpg', 1, 9),
(10, 'Samsung-Galaxy-A41.jpg', 1, 10),
(11, 'Nokia-8.3-5G.jpg', 1, 11),
(12, 'Nokia-7.2.jpg', 1, 12),
(13, 'Nokia-7.1.jpg', 1, 13),
(14, 'Nokia-8.jpg', 1, 14),
(15, 'Nokia-2.1.jpg', 1, 15),
(16, 'Nokia-2.3.jpg', 1, 16),
(17, 'Nokia-4.2.jpg', 1, 17),
(18, 'Nokia-5.1.jpg', 1, 18),
(19, 'Nokia-6.1.jpg', 1, 19),
(20, 'Nokia-1-Plus.jpg', 1, 20),
(21, 'Nokia-8110-4G.jpg', 1, 21),
(22, 'Nokia-2720-Flip.jpg', 1, 22),
(23, 'Nokia-5310.jpg', 1, 23),
(24, 'Nokia-800-Tough.jpg', 1, 24),
(25, 'Apple-iPhone-X-64GB.jpg', 1, 25),
(26, 'iPhone-11-Pro-Max.jpg', 1, 26),
(27, 'Apple-iPhone-XR-Black.jpg', 1, 27),
(28, 'Apple-iPhone-6.jpg', 1, 28),
(29, 'iPhone-11.jpg', 1, 29),
(30, 'iPhone-8.jpg', 1, 30),
(31, 'Sony-Xperia-10-Plus.jpg', 1, 31),
(32, 'Sony-Xperia-M2.jpg', 1, 32),
(33, 'Sony-Xperia-10.jpg', 1, 33),
(34, 'Sony-Xperia-Z3.jpg', 1, 34),
(35, 'Sony-Xperia-XZ3.jpg', 1, 35),
(36, 'HTC-U19e.jpg', 1, 36),
(37, 'HTC-U12-Plus.jpg', 1, 37),
(38, 'HTC-Desire-828-dual-sim.jpg', 1, 38),
(39, 'Lenovo-Z6-Pro.jpg', 1, 39),
(40, 'Lenovo-Z5.jpg', 1, 40),
(41, 'Lenovo-Z5s.jpg', 1, 41),
(42, 'Lenovo-K6.jpg', 1, 42),
(43, 'Lenovo-S850.jpg', 1, 43),
(44, 'Oppo-A7n.jpg', 1, 44),
(45, 'Vodafone-Smart-N10.jpg', 1, 45),
(46, 'Spice-XLIFE-Victor5.jpg', 1, 46),
(47, 'Spice-Smart-Flo-Pace-3.jpg', 1, 47),
(48, 'LG-G8.jpg', 1, 48),
(49, 'LG-Solo-LTE.jpg', 1, 49),
(50, 'LG-G3-Moon-Violet.jpg', 1, 50),
(51, 'Samsung-Galaxy-Tab-S6-10.5.jpg', 1, 51),
(52, 'Samsung-Galaxy-Tab-S4.jpg', 1, 52),
(53, 'The-Galaxy-Tab-Active-Pro.jpg', 1, 53),
(54, 'Lenovo-Tab-M10.jpg', 1, 54),
(55, 'Lenovo-tab-4-10-inch.jpg', 1, 55),
(56, 'LifePLUS-4G-Calling-Tablet.jpg', 1, 56),
(57, 'LifePlus-Big-Screen-4G-Calling-Tablet.jpg', 1, 57),
(58, 'Tiitan-3G-Calling-Tablet.jpg', 1, 58),
(59, 'Microsoft-Surface-Pro-7.jpg', 1, 59),
(60, 'ASUS-ZenPad-Z301M-A2-GR.jpg', 1, 60),
(61, 'MTK8752-Octa-Core.jpg', 1, 61),
(62, 'Tablet-PC-Octa-Core-4GB.jpg', 1, 62),
(63, 'Jumper-EZpad.jpg', 1, 63),
(64, 'Jumper-Ezpad-6.jpg', 1, 64),
(65, 'Binai-K11.jpg', 1, 65),
(66, 'Intel-Inside-TM75A.jpg', 1, 66),
(67, 'Customize-8-Inch-Window8-Intel.jpg', 1, 67),
(68, 'Intel-Educational-Tablet-Pc.jpg', 1, 68),
(69, 'PIPO-W2Pro-32GB-Intel.jpg', 1, 69),
(70, 'DELL-Venue-8-20.3-cm.jpg', 1, 70),
(71, 'Apple-iPad-10.2.jpg', 1, 71),
(72, 'Apple-iPad-Space-Grey.jpg', 1, 72),
(73, 'iPad-Pro.jpg', 1, 73),
(74, 'iPad-Pro-12.9inch.jpg', 1, 74),
(75, 'Keyboard-Logitech-SLIM-FOLIO-PRO.jpg', 1, 75),
(76, 'Apple-10.5.jpg', 1, 76),
(77, 'Apple-Ipad-5-9-7-Inch.jpg', 1, 77),
(78, 'Tablet-APPLE-iPad-Air-2-9.7.jpg', 1, 78),
(79, 'Apple-iPad-Pro-12.9.jpg', 1, 79),
(80, 'iPad-9.7-Air-2.jpg', 1, 80),
(81, 'iPad-Mini.jpg', 1, 81),
(82, 'iPad-Pro-leak-exposes.jpg', 1, 82),
(83, 'iPad-Pro-128GB.jpg', 1, 83),
(84, 'apple_ipadmini.jpg', 1, 84),
(85, 'Apple-A14.jpg', 1, 85),
(86, 'LaunchPort-Sleeve.jpg', 1, 86),
(87, 'Apple-iPad-2-16GB.jpg', 1, 87),
(88, 'Apple-ipad-mini-4-7.-9.jpg', 1, 88),
(89, 'Apple-iPad-with-WiFi.jpg', 1, 89),
(90, 'KD-20000-mAh-Power-Bank.jpg', 1, 90),
(91, 'Ultra-Compact-Portable-Power-Bank.jpg', 1, 91),
(92, 'WST-Original-Mini-Power-Bank.jpg', 1, 92),
(93, 'Rapid-Charge-Compact.jpg', 1, 93),
(94, 'iPhone-Battery-Packs-&-Power-Banks.jpg', 1, 94),
(95, 'power-banks-for-iPhone-6s.jpg', 1, 95),
(96, 'Oppo-F9-Pro-Cat-Covers.jpg', 1, 96),
(97, 'Htc-Phone-Cases-Covers.jpg', 1, 97),
(98, 'Richlime-Mobile-Back-Cover.jpg', 1, 98),
(99, 'Samsung-Galaxy-A20-Case.jpg', 1, 99),
(100, 'ROYAL-bluetooth.jpg', 1, 100),
(101, 'Wireless-Bluetooth-Earpiece-V4.1.jpg', 1, 101),
(102, 'Warcraft-Wireless-Headset.jpg', 1, 102),
(103, 'htc-headset.jpg', 1, 103),
(104, 'Wired-Handsfree-Earphone.jpg', 1, 104),
(105, 'Wireless-Bluetooth-Headset.jpg', 1, 105),
(106, 'Portable-2600mAh-Mobile-Power-Bank.jpg', 1, 106),
(107, 'Belkin-Car-Cup-Mount.jpg', 1, 107),
(108, 'PhoneHolder.jpg', 1, 108),
(109, 'Samsung-Galaxy-A10-Phone-Charger.jpg', 1, 109),
(110, 'Mobile-Keeper.jpg', 1, 110),
(111, 'Metal-Tablet-Stand.jpg', 1, 111),
(112, 'Anti-fingerprint-Tablet-Back-Case.jpg', 1, 112),
(113, '7-8-inch-Tablet-Accessories.jpg', 1, 113),
(114, 'Portable-Foldable-Tablet-Holder.jpg', 1, 114),
(115, 'Tablet-Stand-For-iPad.jpg', 1, 115),
(116, 'Tablet-Cooling-Bracket.jpg', 1, 116),
(117, 'POS-X-iSAPPOS-Stand-Tablets.jpg', 1, 117),
(118, 'Anti-Theft-Security-Kiosk-&-POS-Stand.jpg', 1, 118),
(119, 'Smonet-Destop-Anti-Theft-Pos.jpg', 1, 119),
(120, 'Adjustable-Car-Tablet-Stand-Holder.jpg', 1, 120),
(121, 'Luxury-Crocodile-Grain-Leather-Case.jpg', 1, 121),
(122, 'Ugreen-Phone-Holder-Stand.jpg', 1, 122),
(123, 'Entif-Stand-Case-Cover.jpg', 1, 123),
(124, 'Apple-iPad-Air-2---Flip-Stand.jpg', 1, 124),
(125, 'VersaCover-for-iPad-mini.jpg', 1, 125),
(126, 'Suction-Cup-Mount.jpg', 1, 126),
(127, 'Yeldou-Tablet-Stand.jpg', 1, 127),
(128, 'PU-Leather-Case-Folding-Stand-Cover.jpg', 1, 128),
(129, 'Multi-Angle-Portable-Stand.jpg', 1, 129),
(130, 'Dteck-MediaPad-T5-Case.jpg', 1, 130),
(131, 'Microsoft-Surface-Pro-3.jpg', 1, 131),
(132, 'Surface-Pro-Charger.jpg', 1, 132),
(133, 'CHARGER-FOR-ARCHOS-97-CARBON-TABLET.jpg', 1, 133),
(134, 'Ksj-3-USB-Port-Plug.jpg', 1, 134),
(135, 'Samsung-Desktop-Computer.jpg', 1, 135),
(136, 'Samsung-690.jpg', 1, 136),
(137, 'Apple-iMac-21.5.jpg', 1, 137),
(138, 'Assembled-Desktop-Intel-Core.jpg', 1, 138),
(139, 'Computer-LED-Monitor.jpg', 1, 139),
(140, 'Assembled-Desktop.jpg', 1, 140),
(141, 'Frontech-4050A-Cabinet.jpg', 1, 141),
(142, 'Lenovo-Desktop-Computer.jpg', 1, 142),
(143, 'Lenovo-M720.jpg', 1, 143),
(144, 'Lenovo-M720-SFF.jpg', 1, 144),
(145, 'Lenovo-ThinkCentre-M720.jpg', 1, 145),
(146, 'Lenevo-Desktop-Computer.jpg', 1, 146),
(147, 'CTL-IP2153.jpg', 1, 147),
(148, 'Dell-Optiplex-960.jpg', 1, 148),
(149, 'The-Dell-Optiplex-Desktop-Tower-Computer.jpg', 1, 149),
(150, 'Dell-OptiPlex-3010.jpg', 1, 150),
(151, 'Dell-780-1TB-Windows.jpg', 1, 151),
(152, 'Dell--Precision-T390Workstation.jpg', 1, 152),
(153, 'Dell-24-Monitor.jpg', 1, 153),
(154, 'Dell-Optiplex-Desktop-Computer-PC.jpg', 1, 154),
(155, 'Dell-24-Full-HD.jpg', 1, 155),
(156, 'Dell-SE2419H.jpg', 1, 156),
(157, 'Dell-S2240L.jpg', 1, 157),
(158, 'Dell-SE2216H.jpg', 1, 158),
(159, 'Dell-S2216H.jpg', 1, 159),
(160, 'LED-PC-CPU-Computer-Desktop.jpg', 1, 160),
(161, 'Assemble-New-Pc.jpg', 1, 161),
(162, 'New-i5-Assembled-Desktop.jpg', 1, 162),
(163, 'High-Quality-CPU-Win-7.jpg', 1, 163),
(164, 'BBC3078-Black-Desktop.jpg', 1, 164),
(165, 'BBC-pmk1-Full-Tower-Gaming-Cabinet.jpg', 1, 165),
(166, 'BBC-0653BB.jpg', 1, 166),
(167, 'bbc-Assembled-Desktop-core2duo.jpg', 1, 167),
(168, 'Frontech-Polo-JIL-4059A.jpg', 1, 168),
(169, 'Frontech-Anchor-JIL-4130A.jpg', 1, 169),
(170, 'Frontech-Dawn-JIL-4132AS.jpg', 1, 170),
(171, 'Core-i5-8GB-Ram.jpg', 1, 171),
(172, 'OptiPlex-Desktop-Computers.jpg', 1, 172),
(173, 'OptiPlex-7060-ultimate-Tower.jpg', 1, 173),
(174, 'HP-EliteDesk-G1.jpg', 1, 174),
(175, 'HP-Core-i5-Windows.jpg', 1, 175),
(176, 'HP-280-G4-MT.jpg', 1, 176),
(177, 'Megaport-Gaming-PC.jpg', 1, 177),
(178, 'Samsung-Notebook-9-Pen-Laptop.jpg', 1, 178),
(179, 'Samsung-Notebook-9-Pro.jpg', 1, 179),
(180, 'Samsung-Notebook-7-Force-Laptop.jpg', 1, 180),
(181, 'samsung-galaxy-chromebook.jpg', 1, 181),
(182, 'Samsung-ChromeBook-XE50.jpg', 1, 182),
(183, 'IdeaPad-S145.jpg', 1, 183),
(184, 'IdeaPad-S340.jpg', 1, 184),
(185, 'MacBook-Pro-Model-A1990.jpg', 1, 185),
(186, 'Apple-MacBook-Pro.jpg', 1, 186),
(187, 'Apple-MACBOOK-PRO-15.jpg', 1, 187),
(188, 'PC-Apple-MacBook.jpg', 1, 188),
(189, 'Purple-Apple-Macbook.jpg', 1, 189),
(190, 'Lenovo-Ideapad-S145.jpg', 1, 190),
(191, 'Lenovo-IdeaPad-L340.jpg', 1, 191),
(192, 'Lenovo-Ideapad-S340.jpg', 1, 192),
(193, 'Lenovo-ThinkPad-X390.jpg', 1, 193),
(194, 'Lenovo-320.jpg', 1, 194),
(195, 'Lenovo-15.6.jpg', 1, 195),
(196, 'Lenovo-Ideapad-C340.jpg', 1, 196),
(197, 'Lenovo-Yoga-2-11.6.jpg', 1, 197),
(198, 'Lenovo-IdeaPad-Duet.jpg', 1, 198),
(199, 'Lenovo-IdeaPad-500s.jpg', 1, 199),
(200, 'Lenovo-14.jpg', 1, 200),
(201, 'Lenovo-Y700.jpg', 1, 201),
(202, 'Dell-Inspiron-15.6.jpg', 1, 202),
(203, 'Dell-Inspiron-15-3583.jpg', 1, 203),
(204, 'Dell-Latitude-7480.jpg', 1, 204),
(205, 'Dell-Inspiron-15.6-pink.jpg', 1, 205),
(206, 'HP-Pavilion.jpg', 1, 206),
(207, 'HP-Stream-11-Violet.jpg', 1, 207),
(208, 'PRO-X-KEYBOARD.jpg', 1, 208),
(209, 'Nuklz-N-Large-Print-Computer-Keyboard.jpg', 1, 209),
(210, 'BigBlu-Kinderboard-Large-Key-Keyboard.jpg', 1, 210),
(211, 'HP-K2500-Wireless-Keyboard.jpg', 1, 211),
(212, 'StarTech-USB.jpg', 1, 212),
(213, 'Stainless-Steel-Micro-USB-Cables.jpg', 1, 213),
(214, '3-Foot-USB-3.0-Micro-B-Cable.jpg', 1, 214),
(215, 'Transparent-wires.jpg', 1, 215),
(216, '30cm-USB-Cable.jpg', 1, 216),
(217, 'USB-Cable.jpg', 1, 217),
(218, 'IHMC-Public-Cmaps.jpg', 1, 218),
(219, 'Mouse-peripheral.jpg', 1, 219),
(220, 'Verbatim-Wireless-Mouse.jpg', 1, 220),
(221, 'amazonbasics-mouse.jpg', 1, 221),
(222, 'VicTsing-2.4G-Wireless-Mouse.jpg', 1, 222),
(223, 'Logitech-G7-Laser-Cordless-Mouse.jpg', 1, 223),
(224, 'Logitech-M187-Wireless-Mouse.jpg', 1, 224),
(225, 'VicTsing-Bluetooth-Wireless-Mouse.jpg', 1, 225),
(226, 'Universal-Silicone-Laptop-Keyboard-Cover.jpg', 1, 226),
(227, 'Universal-Keyboard-Cover.jpg', 1, 227),
(228, 'Ranz-3-In-1-Laptop-Protection.jpg', 1, 228),
(229, 'VGA-Cable.jpg', 1, 229),
(230, 'VGA-Cable-SVGA.jpg', 1, 230),
(231, 'Scm-3-Pin-Laptop-Power-Cable-Cord.jpg', 1, 231),
(232, 'Power-Cable-For-Laptop-Adapter.jpg', 1, 232),
(233, '18W-Power-Delivery-USB-C-Charger.jpg', 1, 233),
(234, 'Anker-33W-PowerPort.jpg', 1, 234),
(235, 'USB-C-Wall-Charger.jpg', 1, 235),
(236, 'Transcend-StoreJet-25M3.jpg', 1, 236),
(237, 'Transcend-External-Hard-Drive.jpg', 1, 237),
(238, 'External-Hard-Disk.jpg', 1, 238),
(239, 'iBall-Decor-Computer-Speakers.jpg', 1, 239),
(240, 'Logitech-Z-130---speakers.jpg', 1, 240),
(241, 'Loudspeaker-High-fidelity.jpg', 1, 241),
(242, 'SanDisk-Cruzer-Pen-Drive.jpg', 1, 242),
(243, '32-Gb-Pendrive.jpg', 1, 243),
(244, 'MECO-USB-Pen-Drive.jpg', 1, 244),
(245, 'Sony-Microvault-Tiny-16GB-Pen-Drive.jpg', 1, 245),
(246, 'Sony-Pen-Drive.jpg', 1, 246),
(247, '8GB-Sony-USB-2.0-Pen-Drive.jpg', 1, 247),
(248, 'Trion-19-INCH.jpg', 1, 248),
(249, 'NEW-DEVANTI-32.jpg', 1, 249),
(250, 'BPL-Vivid-Television.jpg', 1, 250),
(251, 'TCL-81.28-cm.jpg', 1, 251),
(252, 'Xiaomi-Mi-TV.jpg', 1, 252),
(253, 'impex-led-tv.jpg', 1, 253),
(254, 'LED-Ibell-LE40D1.jpg', 1, 254),
(255, 'Ibell-Led-Tv-40.jpg', 1, 255),
(256, 'LG-43LM5500PTA.jpg', 1, 256),
(257, 'LG-TV.jpg', 1, 257),
(258, 'LG-UHD-TV.jpg', 1, 258),
(259, 'LG-24LH454A.jpg', 1, 259),
(260, 'LG-Flat-TV.jpg', 1, 260),
(261, 'LG-21SB8RGE.jpg', 1, 261),
(262, 'LG-65-Inch-LED-Ultra-HD.jpg', 1, 262),
(263, 'LG-42LF7700-HD-TV.jpg', 1, 263),
(264, 'Sony-Bravia-80-Cm.jpg', 1, 264),
(265, 'Sony-Bravia-LED-TV-KLV-32R202G.jpg', 1, 265),
(266, 'Sony-R20f-Led-Tv.jpg', 1, 266),
(267, 'Sony-R30f-Led-Tv.jpg', 1, 267),
(268, 'Sony-55A8F.jpg', 1, 268),
(269, 'Sony-55-inch.jpg', 1, 269),
(270, 'Sony-Bravia-138.8-Cm.jpg', 1, 270),
(271, 'SONY-LED-TV-40-Inch-Full-HD.jpg', 1, 271),
(272, 'Sony-Bravia-Kdl-40R350E.jpg', 1, 272),
(273, 'Videocon-CRT-TV.jpg', 1, 273),
(274, 'Hyundai-TV-Led.jpg', 1, 274),
(275, 'Panasonic-TH-50PX75U-50.jpg', 1, 275),
(276, 'Panasonic-TH-L32U20D-LCD-TV.jpg', 1, 276),
(277, 'E400-Panasonic-Led-Tv.jpg', 1, 277),
(278, 'Panasonic-55-Inch-LED.jpg', 1, 278),
(279, 'Panasonic-32-Inch-LCD.jpg', 1, 279),
(280, 'Panasonic-50-VIERA.jpg', 1, 280),
(281, 'Panasonic-TH32F403N.jpg', 1, 281),
(282, 'Panasonic-VIERA.jpg', 1, 282),
(283, '52-Inch-Panasonic.jpg', 1, 283),
(284, 'Maxmo-40-Inch.jpg', 1, 284),
(285, 'Samsung-PS43F4500.jpg', 1, 285),
(286, 'Samsung-PS-50C450.jpg', 1, 286),
(287, 'SAMSUNG-43.jpg', 1, 287),
(288, 'Samsung-75-Inch-LED-Ultra.jpg', 1, 288),
(289, 'Samsung-QLED-8K-TV.jpg', 1, 289),
(290, 'Samsung-UN65RU7300FXZA.jpg', 1, 290),
(291, 'Samsung-50KU7000.jpg', 1, 291),
(292, 'SAMSUNG-Smart-LED.jpg', 1, 292),
(293, 'Samsung-UN32N5300FXZC.jpg', 1, 293),
(294, 'Samy-SM32.jpg', 1, 294),
(295, 'Sanyo-123-cm.jpg', 1, 295),
(296, 'TCL-S525-43.jpg', 1, 296),
(297, 'L43P8US-TCL.jpg', 1, 297),
(298, 'Trion-19-INCH.jpg', 1, 298),
(299, 'NEW-DEVANTI-32.jpg', 1, 299),
(300, 'BPL-Vivid-Television.jpg', 1, 300),
(301, 'TCL-81.28-cm.jpg', 1, 301),
(302, 'Xiaomi-Mi-TV.jpg', 1, 302),
(303, 'impex-led-tv.jpg', 1, 303),
(304, 'LED-Ibell-LE40D1.jpg', 1, 304),
(305, 'Ibell-Led-Tv-40.jpg', 1, 305),
(306, 'LG-43LM5500PTA.jpg', 1, 306),
(307, 'LG-TV.jpg', 1, 307),
(308, 'LG-UHD-TV.jpg', 1, 308),
(309, 'LG-24LH454A.jpg', 1, 309),
(310, 'LG-Flat-TV.jpg', 1, 310),
(311, 'LG-21SB8RGE.jpg', 1, 311),
(312, 'LG-65-Inch-LED-Ultra-HD.jpg', 1, 312),
(313, 'LG-42LF7700-HD-TV.jpg', 1, 313),
(314, 'Sony-Bravia-80-Cm.jpg', 1, 314),
(315, 'Sony-Bravia-LED-TV-KLV-32R202G.jpg', 1, 315),
(316, 'Sony-R20f-Led-Tv.jpg', 1, 316),
(317, 'Sony-R30f-Led-Tv.jpg', 1, 317),
(318, 'Sony-55A8F.jpg', 1, 318),
(319, 'Sony-55-inch.jpg', 1, 319),
(320, 'Sony-Bravia-138.8-Cm.jpg', 1, 320),
(321, 'SONY-LED-TV-40-Inch-Full-HD.jpg', 1, 321),
(322, 'Sony-Bravia-Kdl-40R350E.jpg', 1, 322),
(323, 'Videocon-CRT-TV.jpg', 1, 323),
(324, 'Hyundai-TV-Led.jpg', 1, 324),
(325, 'Panasonic-TH-50PX75U-50.jpg', 1, 325),
(326, 'Panasonic-TH-L32U20D-LCD-TV.jpg', 1, 326),
(327, 'E400-Panasonic-Led-Tv.jpg', 1, 327),
(328, 'Panasonic-55-Inch-LED.jpg', 1, 328),
(329, 'Panasonic-32-Inch-LCD.jpg', 1, 329),
(330, 'Panasonic-50-VIERA.jpg', 1, 330),
(331, 'Panasonic-TH32F403N.jpg', 1, 331),
(332, 'Panasonic-VIERA.jpg', 1, 332),
(333, '52-Inch-Panasonic.jpg', 1, 333),
(334, 'Maxmo-40-Inch.jpg', 1, 334),
(335, 'Samsung-PS43F4500.jpg', 1, 335),
(336, 'Samsung-PS-50C450.jpg', 1, 336),
(337, 'SAMSUNG-43.jpg', 1, 337),
(338, 'Samsung-75-Inch-LED-Ultra.jpg', 1, 338),
(339, 'Samsung-QLED-8K-TV.jpg', 1, 339),
(340, 'Samsung-UN65RU7300FXZA.jpg', 1, 340),
(341, 'Samsung-50KU7000.jpg', 1, 341),
(342, 'SAMSUNG-Smart-LED.jpg', 1, 342),
(343, 'Samsung-UN32N5300FXZC.jpg', 1, 343),
(344, 'Samy-SM32.jpg', 1, 344),
(345, 'Sanyo-123-cm.jpg', 1, 345),
(346, 'TCL-S525-43.jpg', 1, 346),
(347, 'L43P8US-TCL.jpg', 1, 347),
(348, 'smart-pink-headphone.jpg', 1, 348),
(349, 'Samsung-ED75E.jpg', 1, 349),
(350, 'Samsung-ue32eh4000-remote.jpg', 1, 350),
(351, 'SAMSUNG-BN59-01181B-REMOTE.jpg', 1, 351),
(352, 'Samsung-BN59-01247A.jpg', 1, 352),
(353, 'SAMSUNG-BN60-01181B-REMOTE.jpg', 1, 353),
(354, 'PowerLocus-Bluetooth-Over-Ear-Headphones.jpg', 1, 354),
(355, 'LatestTrend-Headphone.jpg', 1, 355),
(356, 'URC7935-Universal-Remote.jpg', 1, 356),
(357, 'Universal-Remote-URC1210.jpg', 1, 357),
(358, 'OVLENG-V8-1-Bass-Bluetooth-Headset.jpg', 1, 358),
(359, 'Mpow-H7-Pro-Bluetooth-Headphones.jpg', 1, 359),
(360, 'Audeze-LCD-Earpads.jpg', 1, 360),
(361, 'MROW-MDRXB950B1LCE.jpg', 1, 361),
(362, 'Truvison-TV-6045bt.jpg', 1, 362),
(363, 'Truvison-SE---6055.jpg', 1, 363),
(364, 'LG-LHD-427-5.1-Channel-DVD.jpg', 1, 364),
(365, 'LG-DH3140S-HOME-THEATER.jpg', 1, 365),
(366, 'LG-HT904TA-5.1-Home-Theatre.jpg', 1, 366),
(367, 'Shinco-V11-5.1-home-theater-audio-suite.jpg', 1, 367),
(368, 'NASCO-210-WATTS-LONG-SPEAKERS.jpg', 1, 368),
(369, 'Sony-DAV-DX375-5.1-Channel-DVD.jpg', 1, 369),
(370, 'Sony-DAV-HDX267W.jpg', 1, 370),
(371, 'Sony-DAV-TZ145-5.1-DVD-Home-Theatre.jpg', 1, 371),
(372, 'Sony-SA-D40-4.1-Home-Theatre-System.jpg', 1, 372),
(373, 'Intex-301-N-FMU-OS-4.1-Speaker-System.jpg', 1, 373),
(374, 'Oscar-4141BT-With-Digital-Display.jpg', 1, 374),
(375, 'murphy-Digital-Bluetooth-Home-Theater.jpg', 1, 375),
(376, 'Pioneer-HTP-074-Home-Theater.jpg', 1, 376),
(377, 'Channel-Home-Theater-Speaker.jpg', 1, 377),
(378, 'MARVELLOUS-MULTIMEDIA-SPEAKER-SYSTEM.jpg', 1, 378),
(379, 'Zebronics-ZEB-SW2490.jpg', 1, 379),
(380, 'JBL-Tuner.jpg', 1, 380),
(381, 'JBL-Boombox-Portable-Speaker.jpg', 1, 381),
(382, 'Tecsun-DR-920C-FM.jpg', 1, 382),
(383, 'Saregama-Carvaan.jpg', 1, 383),
(384, 'Carvaan-violet.jpg', 1, 384),
(385, 'New-Carvaan-2.0.jpg', 1, 385),
(386, 'Philips-IN-RL205-N-FM-Radio.jpg', 1, 386),
(387, 'Philips-AZ380.jpg', 1, 387),
(388, 'PHILIPS-HT-SPT6660.jpg', 1, 388),
(389, 'Portable-Radio.jpg', 1, 389),
(390, 'toshiba.jpg', 1, 390),
(391, 'TOA-DM-1200-Microphone.jpg', 1, 391),
(392, 'modern-Microphone.jpg', 1, 392),
(393, 'Glorik-Retro-Studio-Microphone.jpg', 1, 393),
(394, 'Portable-Microphone-Headset.jpg', 1, 394),
(395, 'Canon-EOS.jpg', 1, 395),
(396, 'Canon-Europe.jpg', 1, 396),
(397, 'Canon-PowerShot-G16.jpg', 1, 397),
(398, 'Canon-Eos-60d.jpg', 1, 398),
(399, 'Nikon-Coolpix.jpg', 1, 399),
(400, 'Nikon-Coolpix-S3600.jpg', 1, 400),
(401, 'Nikon-COOLPIX-A900.jpg', 1, 401),
(402, 'Nikon-Coolpix-W150-Blue.jpg', 1, 402),
(403, 'Nikon-COOLPIX-P1000.jpg', 1, 403),
(404, 'Nikon-Coolpix-W150-Orange.jpg', 1, 404),
(405, 'Nikon-Coolpix-W150.jpg', 1, 405),
(406, 'Nikon-Coolpix-W150-pink.jpg', 1, 406),
(407, 'Nikon-COOLPIX-yellow.jpg', 1, 407),
(408, 'Sony-Alpha-a6600.jpg', 1, 408),
(409, 'Sony-Cyber-Shot.jpg', 1, 409),
(410, 'Fujifilm-Instax.jpg', 1, 410),
(411, 'Fujifilm-X-A5.jpg', 1, 411),
(412, 'Philips-Still-Camera.jpg', 1, 412),
(413, 'Philips-Camera.jpg', 1, 413),
(414, 'Philips-Retro-Digicam.jpg', 1, 414),
(415, 'Sony-HDR-TD.jpg', 1, 415),
(416, 'Sony-Handycam.jpg', 1, 416),
(417, 'Sony-32GB-HDR-PJ540.jpg', 1, 417),
(418, 'Sony-FDR-AX700.jpg', 1, 418),
(419, 'Sony-NTSC-8mm-Video-camera.jpg', 1, 419),
(420, 'Sony-CCDTRV67.jpg', 1, 420),
(421, 'Sony-DCR-HC90.jpg', 1, 421),
(422, 'SONY-SONY-DCR-HC90.jpg', 1, 422),
(423, 'Sony-hd-1920-video-camera.jpg', 1, 423),
(424, 'Sony-HXR-NX70E.jpg', 1, 424),
(425, 'Sony-HXR-MC50P.jpg', 1, 425),
(426, 'Sony_HDR-FX1E.jpg', 1, 426),
(427, 'JVC-GR-SXM38US.jpg', 1, 427),
(428, 'JVC-GR-SXM740U.jpg', 1, 428),
(429, 'Canon-Video-Camera.jpg', 1, 429),
(430, 'Panasonic-HC-PV100GW.jpg', 1, 430),
(431, 'Panasonic-HC-V180.jpg', 1, 431),
(432, 'Panasonic-PV100.jpg', 1, 432),
(433, 'HC-W580EB.jpg', 1, 433),
(434, 'Camcorder-HDV.jpg', 1, 434),
(435, 'Camcorder.jpg', 1, 435),
(436, 'Voltas-Split-AC-183-ZZY.jpg', 1, 436),
(437, 'Voltas-Split-AC-183.jpg', 1, 437),
(438, 'Voltas-1.5ton-3-Star-Split-Ac.jpg', 1, 438),
(439, 'Voltas-1.5-Ton-5-Star.jpg', 1, 439),
(440, 'Voltas-AC-1.5Ton-WAC-183.jpg', 1, 440),
(441, 'Voltas-1-Ton-5-Star.jpg', 1, 441),
(442, 'Carrier-2-Ton-Estrella.jpg', 1, 442),
(443, 'Samsung-1.5-Ton.jpg', 1, 443),
(444, 'Samsung-1-Ton-3-Star.jpg', 1, 444),
(445, 'Samsung-1.5-Ton-Split-Ac.jpg', 1, 445),
(446, 'Samsung-AR18JC3ESLWNNA.jpg', 1, 446),
(447, 'Samsung-AR12JC5ESLZNNA-1-Ton.jpg', 1, 447),
(448, 'Samsung-Window-Ac.jpg', 1, 448),
(449, 'Samsung-1.5-Ton-AR18HC2UXNB.jpg', 1, 449),
(450, 'Daikin-Split-Air-Conditioner.jpg', 1, 450),
(451, 'LG-1.5-Ton-5-Star.jpg', 1, 451),
(452, 'LG-1.5-Ton-5-Star-Split-AC.jpg', 1, 452),
(453, 'LG-window-AC.jpg', 1, 453),
(454, 'Whirlpool-Split-Ac.jpg', 1, 454),
(455, 'Whirlpool-3D-Cool-Inverter-AC.jpg', 1, 455),
(456, 'Whirlpool-3D-COOL-DELUXE.jpg', 1, 456),
(457, 'Whirlpool-1.5-Ton-5-Star-3D.jpg', 1, 457),
(458, 'Hitachi-1-Ton-3-Star.jpg', 1, 458),
(459, 'V-Cook-Air-Cooler-Tower-Fan.jpg', 1, 459),
(460, 'Small-Mobile-Air-Cooler.jpg', 1, 460),
(461, 'Symphony-Air-Cooler.jpg', 1, 461),
(462, 'Symphony-Sumo-70.jpg', 1, 462),
(463, 'Sumo-75XL.jpg', 1, 463),
(464, 'Plastic-Body-Air-Cooler.jpg', 1, 464),
(465, 'Bajaj-Platini-PX97.jpg', 1, 465),
(466, 'Bajaj-PX-93-DC-DLX-Room-Cooler.jpg', 1, 466),
(467, 'Bajaj-PC-2012-20-Litres.jpg', 1, 467),
(468, 'Bajaj-DC-2016-Glacier-Room-Cooler.jpg', 1, 468),
(469, 'Bajaj-DC2015-43-litres.jpg', 1, 469),
(470, 'Bajaj-Dc-2015.jpg', 1, 470),
(471, 'Samsung-RR20R182YCR.jpg', 1, 471),
(472, 'Samsung-RR20M2741U2.jpg', 1, 472),
(473, 'Samsung-Single-Door-Refrigerator.jpg', 1, 473),
(474, 'Samsung-RR24N287YR8.jpg', 1, 474),
(475, 'Samsung-RR20R182ZUT.jpg', 1, 475),
(476, 'Samsung-SRF719DLS.jpg', 1, 476),
(477, 'LG-285-L-GL-D302.jpg', 1, 477),
(478, 'LG-260-L-3-Star.jpg', 1, 478),
(479, 'LG-190-L-Direct-Cool.jpg', 1, 479),
(480, 'LG-Gl-I302RPOL.jpg', 1, 480),
(481, 'LG-GL-M322RMPL.jpg', 1, 481),
(482, 'Godrej-Double-Door-Refrigerator.jpg', 1, 482),
(483, 'Godrej-RD-EDGE-DUO.jpg', 1, 483),
(484, 'Godrej-190-Ltr-4-Star.jpg', 1, 484),
(485, 'Godrej-Rd-Edge-Pro.jpg', 1, 485),
(486, 'Godrej-RD-EPRO.jpg', 1, 486),
(487, 'Godrej-RD-EDGE-PRO-Violet.jpg', 1, 487),
(488, 'Godrej-RB-EON.jpg', 1, 488),
(489, 'godrej-rd-edge-pro-210.jpg', 1, 489),
(490, 'Godrej-Rt-Eon-231.jpg', 1, 490),
(491, 'Godrej-263-Litre-Double-Door.jpg', 1, 491),
(492, 'Whirlpool-5ED5FHKXV.jpg', 1, 492),
(493, 'Whirlpool-W-Series-460-L.jpg', 1, 493),
(494, 'Whirlpool-FP-263D.jpg', 1, 494),
(495, 'Haier-Refrigeration.jpg', 1, 495),
(496, 'Haier-HRD-1905CS-H.jpg', 1, 496),
(497, 'VIDEOCON-DOUBLE-DOOR-REFRIGERATOR.jpg', 1, 497),
(498, 'Videocon-170-L-3-Star.jpg', 1, 498),
(499, 'Domestic-Videocon-Refrigerator.jpg', 1, 499),
(500, 'Videocon-225-Litres-5-Star.jpg', 1, 500),
(501, 'Bajaj-750W-Classic-Mixer-Grinder.jpg', 1, 501),
(502, 'AnjaliMix-5-Jars-1000W.jpg', 1, 502),
(503, 'Preethi-Galaxy-750W-Mixer-Grinder.jpg', 1, 503),
(504, '750-Watts-3-Jar-Mixer-Grinder.jpg', 1, 504),
(505, 'Juicer-Mixer-Grinder.jpg', 1, 505),
(506, 'philips-grinder.jpg', 1, 506),
(507, 'Preethi-TRIO-MG158-3-JAR.jpg', 1, 507),
(508, 'WONDERCHEF-MIXER-GRINDER.jpg', 1, 508),
(509, 'Wonderchef-Cortina-Juicer.jpg', 1, 509),
(510, 'kenstar-NUTRIV.jpg', 1, 510),
(511, 'Portable-Juice-Blender.jpg', 1, 511),
(512, 'Fruit-And-Vegetable-Hand-Juicer.jpg', 1, 512),
(513, 'Homgeek-Slow-Electric-Juicer.jpg', 1, 513),
(514, 'SOGA-2X-Slow-Juicer.jpg', 1, 514),
(515, 'Kuvings-CS600.jpg', 1, 515),
(516, 'Koios-Juicer.jpg', 1, 516),
(517, 'Convection-Microwave-Oven.jpg', 1, 517),
(518, 'Black-&-Decker-Grill-Microwave.jpg', 1, 518),
(519, 'Black-Decker-23-Ltr-Microwave.jpg', 1, 519),
(520, 'SUQIAOQIAO-Microwave.jpg', 1, 520),
(521, 'Multi-Function-Electric-Oven.jpg', 1, 521),
(522, 'Prestige-1100-m.jpg', 1, 522),
(523, 'Glen-60cm.jpg', 1, 523),
(524, 'Glen-6056-Touch-Sensor.jpg', 1, 524),
(525, 'Glen-90-cm-Kitchen-Chimney.jpg', 1, 525),
(526, 'Kutchina-Kitchen-Chimney.jpg', 1, 526),
(527, 'Bosch-DWP94BC50B.jpg', 1, 527),
(528, 'KENT-Pop-Up-Toaster.jpg', 1, 528),
(529, 'Sencor-STS-6054RD.jpg', 1, 529),
(530, 'Sencor-STS-6053VT.jpg', 1, 530),
(531, '4-Slice-Pop-Up-Toaster.jpg', 1, 531),
(532, 'Morphy-Richards-AT-204.jpg', 1, 532),
(533, 'Morphy-AT-401.jpg', 1, 533),
(534, 'Panini-Press-Grill.jpg', 1, 534),
(535, 'Neo-Sandwich-Maker.jpg', 1, 535),
(536, 'Electric-3-In-1-Sandwich-Maker.jpg', 1, 536),
(537, 'Prestige-Sandwich-Toaster.jpg', 1, 537),
(538, 'Waffle-Sandwich-Maker.jpg', 1, 538),
(539, 'Sinbo-Grill-Maker-SSM-2536.jpg', 1, 539),
(540, 'Portable-BBQ-Grill-Maker-HCL661.jpg', 1, 540),
(541, 'Morphy-Richards-HBCP.jpg', 1, 541),
(542, 'Havells-7-litres.jpg', 1, 542),
(543, 'Kent-Pearl-Ro-Water-Purifier.jpg', 1, 543),
(544, 'HUL-Pureit-Ultima-RO+UV-Water-Purifier.jpg', 1, 544),
(545, 'Eveready-Electric-Kettles-Ket502.jpg', 1, 545),
(546, 'Morphy-Richards-Flamio.jpg', 1, 546),
(547, 'Kenwood-Mesmerine-ZJM811-Jug-Kettle.jpg', 1, 547),
(548, 'Havells-Vetro-Digi-Kettle.jpg', 1, 548),
(549, 'SmartKook-Induction-Cooktop.jpg', 1, 549),
(550, 'Usha-Cook-Joy.jpg', 1, 550),
(551, 'Prestige-1200-Watt.jpg', 1, 551),
(552, 'Coffee-maker.jpg', 1, 552),
(553, 'Morphy-Richards-Primero-Drip-Coffee-Maker.jpg', 1, 553),
(554, 'Singer-Xpress-Brew-800-W-Coffee-Maker.jpg', 1, 554),
(555, 'Prestige-Atlas-Electric-Rice-Cooker.jpg', 1, 555),
(556, 'PHILIPS-Bagless-Vacuum-Cleaner.jpg', 1, 556),
(557, 'Panasonic-ECO-Max.jpg', 1, 557),
(558, 'Prestige-1200-Watt-Vacuum-Cleaner.jpg', 1, 558),
(559, 'Mini-Car-Vacuum-Cleaner.jpg', 1, 559),
(560, 'Bajaj-Maxima.jpg', 1, 560),
(561, 'Home-Decorative-3-Light-Ceiling-Fan.jpg', 1, 561),
(562, 'blue-design-table-fan.jpg', 1, 562),
(563, 'havells-table-fan.jpg', 1, 563),
(564, 'HAVELLS-Lumeno.jpg', 1, 564),
(565, 'Wind-Pro-Stand-70.jpg', 1, 565),
(566, 'Orient-400-mm-Stand.jpg', 1, 566),
(567, 'Luminous-230-mm-Fan.jpg', 1, 567),
(568, 'Usha-Duos-Mist-Air-400-mm.jpg', 1, 568),
(569, 'Usha-Maxx-Air.jpg', 1, 569),
(570, 'Bosch-Fully-AutomaticWashing-Machine.jpg', 1, 570),
(571, 'IFB-8-kg-Water-softener.jpg', 1, 571),
(572, 'Senorita-Aqua-SX-6.5-Kg.jpg', 1, 572),
(573, 'Semi-Automatic-Washing-Machine.jpg', 1, 573),
(574, 'LG-7-kg-Fully-Automatic-Washing-Machine.jpg', 1, 574),
(575, 'LG-WD14024D6.jpg', 1, 575),
(576, 'Havells-Instanio-3-Litre-Instant-Geyser.jpg', 1, 576),
(577, 'Havells-Instanio-Geyser.jpg', 1, 577),
(578, 'Havells-Adonia-R-15-Litre-Geyser.jpg', 1, 578),
(579, 'ABS-Geyser-Instant-Water-Heater.jpg', 1, 579),
(580, 'KALPTREE-3-Ltr-Snippy-Instant.jpg', 1, 580),
(581, 'Electric-Iron.jpg', 1, 581),
(582, 'Signature-Travel-Iron.jpg', 1, 582),
(583, 'Singer-Electric-Sewing-Machine.jpg', 1, 583);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_product_review`
--

DROP TABLE IF EXISTS `ambit_product_review`;
CREATE TABLE `ambit_product_review` (
`apr_id` int(11) NOT NULL,
  `apr_apa_id` int(11) NOT NULL,
  `apr_name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_product_review`
--

INSERT INTO `ambit_product_review` (`apr_id`, `apr_apa_id`, `apr_name`, `comment`, `rating`, `date`, `status`) VALUES
(3, 9, 'Siddharth', 'It''s very good', 4, date_add(NOW(),INTERVAL -1 DAY), 1),
(5, 9, 'XYZ', 'dhfgsdhfg', 4, date_add(NOW(),INTERVAL -1 DAY), 1),
(6, 10, 'Sidd', 'Fake product', 1, date_add(NOW(),INTERVAL -1 DAY), 0),
(7, 9, 'XYZ', 'dhfgsdhfg', 4, date_add(NOW(),INTERVAL -1 DAY), 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_pro_qustn_ans`
--

DROP TABLE IF EXISTS `ambit_pro_qustn_ans`;
CREATE TABLE `ambit_pro_qustn_ans` (
`apqa_id` int(11) NOT NULL,
  `apa_id` int(11) NOT NULL,
  `vr_id` int(11) NOT NULL,
  `ac_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ans_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_pro_qustn_ans`
--

INSERT INTO `ambit_pro_qustn_ans` (`apqa_id`, `apa_id`, `vr_id`, `ac_id`, `question`, `answer`, `date`, `ans_status`) VALUES
(3, 9, 2, 1, 'How many colors are available for this product ?', 'Seven colors  available', date_add(NOW(),INTERVAL -1 DAY), 1),
(4, 9, 2, 1, 'How many colors are available for this product ?', 'Three Colors', date_add(NOW(),INTERVAL -1 DAY), 1),
(6, 9, 2, 1, 'How many colors are available for this product ?', 'Only Gold Available', date_add(NOW(),INTERVAL -1 DAY), 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_return_product`
--

DROP TABLE IF EXISTS `ambit_return_product`;
CREATE TABLE `ambit_return_product` (
`arp_id` int(11) NOT NULL,
  `arp_ass_id` int(11) NOT NULL,
  `arp_apa_id` int(11) NOT NULL,
  `arp_ac_id` int(11) NOT NULL,
  `arp_vr_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `reason` int(11) NOT NULL COMMENT '1=>dead on arrival, 2=>Order Error, 3=>Received Wrong Item, 4=>Other',
  `open_or_not` int(11) NOT NULL COMMENT '1=>open, 0=>not open',
  `details` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `send_vendor` int(11) NOT NULL DEFAULT '0',
  `return_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_return_product`
--

INSERT INTO `ambit_return_product` (`arp_id`, `arp_ass_id`, `arp_apa_id`, `arp_ac_id`, `arp_vr_id`, `quantity`, `reason`, `open_or_not`, `details`, `date`, `status`, `send_vendor`, `return_status`) VALUES
(1, 5, 12, 1, 2, 1, 4, 0, 'wefesdftgr', date_add(NOW(),INTERVAL -1 DAY), 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_shipment_by`
--

DROP TABLE IF EXISTS `ambit_shipment_by`;
CREATE TABLE `ambit_shipment_by` (
`asb_id` int(11) NOT NULL,
  `shipment_by` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_shipment_by`
--

INSERT INTO `ambit_shipment_by` (`asb_id`, `shipment_by`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_shipment_status`
--

DROP TABLE IF EXISTS `ambit_shipment_status`;
CREATE TABLE `ambit_shipment_status` (
`ass_id` int(11) NOT NULL,
  `ass_apa_id` int(11) NOT NULL,
  `ass_ac_id` int(11) NOT NULL,
  `ass_vr_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shipment_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=> No, 1=> Yes',
  `order_id` varchar(255) NOT NULL,
  `payment_transfer` int(11) NOT NULL DEFAULT '0',
  `payment_status` int(11) NOT NULL COMMENT '0=>fail, 1=>pass, 2=>cod',
  `cancel_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_shipment_status`
--

INSERT INTO `ambit_shipment_status` (`ass_id`, `ass_apa_id`, `ass_ac_id`, `ass_vr_id`, `quantity`, `currency`, `price`, `date`, `shipment_status`, `order_id`, `payment_transfer`, `payment_status`, `cancel_status`) VALUES
(4, 9, 1, 2, 1, 1, '10900', date_add(NOW(),INTERVAL -1 DAY), 1, '12', 1, 1, 0),
(8, 29, 1, 2, 1, 1, '550 ', date_add(NOW(),INTERVAL -1 DAY), 0, '19', 0, 2, 0),
(9, 9, 1, 2, 2, 1, '21800', date_add(NOW(),INTERVAL -1 DAY), 1, '19', 1, 2, 0),
(11, 14, 1, 2, 1, 1, '34000', date_add(NOW(),INTERVAL -1 DAY), 0, '21', 0, 2, 0),
(12, 14, 1, 2, 2, 1, '291720 ', date_add(NOW(),INTERVAL -1 DAY), 0, '22', 0, 2, 0),
(13, 14, 1, 2, 1, 1, '1397339', date_add(NOW(),INTERVAL -1 DAY), 0, '22', 0, 2, 0),
(14, 9, 1, 2, 1, 2, '46761', date_add(NOW(),INTERVAL -1 DAY), 0, '23', 0, 2, 0),
(15, 9, 1, 2, 1, 1, '10900', date_add(NOW(),INTERVAL -1 DAY), 0, '24', 0, 2, 0),
(16, 10, 1, 2, 3, 1, '105000', date_add(NOW(),INTERVAL -1 DAY), 1, '25', 1, 2, 0),
(17, 14, 1, 2, 1, 1, '34000 ', date_add(NOW(),INTERVAL -1 DAY), 0, '26', 0, 2, 0),
(18, 14, 1, 2, 4, 1, '170000', date_add(NOW(),INTERVAL -1 DAY), 0, '26', 0, 2, 0),
(19, 10, 1, 2, 1, 1, '35000', date_add(NOW(),INTERVAL -1 DAY), 0, '27', 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_shipment_status_auction`
--

DROP TABLE IF EXISTS `ambit_shipment_status_auction`;
CREATE TABLE `ambit_shipment_status_auction` (
`ass_id` int(11) NOT NULL,
  `ass_apa_id` int(11) NOT NULL,
  `ass_ac_id` int(11) NOT NULL,
  `ass_vr_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shipment_status` int(11) NOT NULL DEFAULT '0',
  `order_id` varchar(255) NOT NULL,
  `payment_transfer` int(11) NOT NULL DEFAULT '0',
  `payment_status` int(11) NOT NULL,
  `cancel_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_shipment_status_auction`
--

INSERT INTO `ambit_shipment_status_auction` (`ass_id`, `ass_apa_id`, `ass_ac_id`, `ass_vr_id`, `quantity`, `currency`, `price`, `date`, `shipment_status`, `order_id`, `payment_transfer`, `payment_status`, `cancel_status`) VALUES
(4, 9, 1, 2, 1, 1, '10900.00', date_add(NOW(),INTERVAL -1 DAY), 0, '4', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_size_unit`
--

DROP TABLE IF EXISTS `ambit_size_unit`;
CREATE TABLE `ambit_size_unit` (
`asu_id` int(11) NOT NULL,
  `asu_name` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_size_unit`
--

INSERT INTO `ambit_size_unit` (`asu_id`, `asu_name`) VALUES
(1, 'cm'),
(2, 'inch'),
(3, 'ft');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_suggest_brand`
--

DROP TABLE IF EXISTS `ambit_suggest_brand`;
CREATE TABLE `ambit_suggest_brand` (
`asb_id` int(11) NOT NULL,
  `asb_name` varchar(255) NOT NULL,
  `asb_desc` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_suggest_brand`
--

INSERT INTO `ambit_suggest_brand` (`asb_id`, `asb_name`, `asb_desc`, `status`) VALUES
(2, 'Check Brand', 'Too good', 0),
(4, 'Demo Brand', 'It''s too good', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_terms_condition`
--

DROP TABLE IF EXISTS `ambit_terms_condition`;
CREATE TABLE `ambit_terms_condition` (
`id` int(11) NOT NULL,
  `terms` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_terms_condition`
--

INSERT INTO `ambit_terms_condition` (`id`, `terms`) VALUES
(1, '<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. </p> 								<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p> 								<p> Nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. </p> ');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_vendor_balance`
--

DROP TABLE IF EXISTS `ambit_vendor_balance`;
CREATE TABLE `ambit_vendor_balance` (
`avb_id` int(11) NOT NULL,
  `avb_vr_id` int(11) NOT NULL,
  `currency` int(11) NOT NULL DEFAULT '1',
  `balance` decimal(12,2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_vendor_balance`
--

INSERT INTO `ambit_vendor_balance` (`avb_id`, `avb_vr_id`, `currency`, `balance`) VALUES
(13, 2, 1, '133740.00'),
(14, 3, 1, '0.00'),
(15, 4, 1, '0.00'),
(16, 6, 1, '0.00'),
(17, 7, 1, '0.00'),
(18, 8, 1, '0.00'),
(19, 9, 1, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_vendor_qustn_ans`
--

DROP TABLE IF EXISTS `ambit_vendor_qustn_ans`;
CREATE TABLE `ambit_vendor_qustn_ans` (
`avqa_id` int(11) NOT NULL,
  `vr_id` int(11) NOT NULL,
  `ac_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ans_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_vendor_qustn_ans`
--

INSERT INTO `ambit_vendor_qustn_ans` (`avqa_id`, `vr_id`, `ac_id`, `question`, `answer`, `date`, `ans_status`) VALUES
(1, 2, 1, 'Can u deliver at kolkata ?', 'Yes, it belongs', date_add(NOW(),INTERVAL -1 DAY), 1),
(3, 2, 1, 'Can u deliver at kolkata ?', '', date_add(NOW(),INTERVAL -1 DAY), 0),
(4, 2, 1, 'Can u deliver at kolkata ?', 'Yes, it belongs', date_add(NOW(),INTERVAL -1 DAY), 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_vendor_review`
--

DROP TABLE IF EXISTS `ambit_vendor_review`;
CREATE TABLE `ambit_vendor_review` (
`avr_id` int(11) NOT NULL,
  `vr_id` int(11) NOT NULL,
  `avr_name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_vendor_review`
--

INSERT INTO `ambit_vendor_review` (`avr_id`, `vr_id`, `avr_name`, `comment`, `rating`, `date`, `status`) VALUES
(3, 2, 'Xyz', 'To good', 3, date_add(NOW(),INTERVAL -1 DAY), 0),
(4, 2, 'Xyz', 'To good', 3, date_add(NOW(),INTERVAL -1 DAY), 0),
(5, 2, 'Xyz', 'To good', 3, date_add(NOW(),INTERVAL -1 DAY), 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_weight_unit`
--

DROP TABLE IF EXISTS `ambit_weight_unit`;
CREATE TABLE `ambit_weight_unit` (
`awu_id` int(11) NOT NULL,
  `awu_unit` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_weight_unit`
--

INSERT INTO `ambit_weight_unit` (`awu_id`, `awu_unit`) VALUES
(1, 'gm'),
(2, 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_withdraw`
--

DROP TABLE IF EXISTS `ambit_withdraw`;
CREATE TABLE `ambit_withdraw` (
`aw_id` int(11) NOT NULL,
  `aw_vr_id` int(11) NOT NULL,
  `aw_withdraw_amnt` decimal(12,2) NOT NULL,
  `bank_account` bigint(20) NOT NULL,
  `view_status` int(11) NOT NULL DEFAULT '0',
  `transaction_status` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_withdraw`
--

INSERT INTO `ambit_withdraw` (`aw_id`, `aw_vr_id`, `aw_withdraw_amnt`, `bank_account`, `view_status`, `transaction_status`, `transaction_date`, `request_date`) VALUES
(1, 2, '4546.00', 1234567788998, 1, 1, date_add(NOW(),INTERVAL -1 DAY), date_add(NOW(),INTERVAL -1 DAY)),
(2, 2, '2000.00', 1234567788998, 1, 1, date_add(NOW(),INTERVAL -1 DAY), date_add(NOW(),INTERVAL -1 DAY));

-- --------------------------------------------------------

--
-- Table structure for table `mail_body_settings`
--

DROP TABLE IF EXISTS `mail_body_settings`;
CREATE TABLE `mail_body_settings` (
`mbs_id` int(11) NOT NULL,
  `send_to` text NOT NULL,
  `body` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_body_settings`
--

INSERT INTO `mail_body_settings` (`mbs_id`, `send_to`, `body`, `date`) VALUES
(1, 'Mail Send To Vendor', 'Hi  VENDOR  Your Product  PRODUCT  Purchased By  CUSTOMER  . Thank You', date_add(NOW(),INTERVAL -1 DAY)),
(2, 'Mail Send To Admin', 'Hi  VENDOR  Your Product  PRODUCT  Purchased By  CUSTOMER  . Thank You', date_add(NOW(),INTERVAL -1 DAY)),
(3, 'Mail Send To Buyer', 'Hi  VENDOR  Your Product  PRODUCT  Purchased By  CUSTOMER  . Thank You', date_add(NOW(),INTERVAL -1 DAY)),
(4, 'After Shipping Send Buyer', 'Hi  VENDOR  Your Product  PRODUCT  Purchased By  CUSTOMER  . Thank You', date_add(NOW(),INTERVAL -1 DAY)),
(5, 'After Shipping Send Vendor', 'Hi  VENDOR  Your Product  PRODUCT  Purchased By  CUSTOMER  . Thank You', date_add(NOW(),INTERVAL -1 DAY));

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway`
--

DROP TABLE IF EXISTS `payment_gateway`;
CREATE TABLE `payment_gateway` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pg_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_gateway`
--

INSERT INTO `payment_gateway` (`id`, `name`, `pg_id`, `status`) VALUES
(1, 'paypal', 'paypal@yourmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
`pc_id` int(11) NOT NULL,
  `pc_name` varchar(255) NOT NULL,
  `pc_icon` varchar(256) NOT NULL,
  `pc_image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pc_id`, `pc_name`, `pc_icon`, `pc_image`) VALUES
(1, 'Mobile phones', '', ''),
(2, 'Tablets', '', ''),
(3, 'Ipad', '', ''),
(4, 'Mobile accessories', '', ''),
(5, 'Computer', '', ''),
(6, 'Laptop', '', ''),
(7, 'Computer accessories', '', ''),
(8, 'Television', '', ''),
(9, 'Video accessories', '', ''),
(10, 'Home theator', '', ''),
(11, 'Camera', '', ''),
(12, 'Video camera', '', ''),
(13, 'Air conditionar', '', ''),
(14, 'Refrigerator', '', ''),
(15, 'Kitchen appliances', '', ''),
(16, 'Home appliances', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_category`
--

DROP TABLE IF EXISTS `product_sub_category`;
CREATE TABLE `product_sub_category` (
`psc_id` int(11) NOT NULL,
  `psc_pc_id` int(11) NOT NULL,
  `psc_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sub_category`
--

INSERT INTO `product_sub_category` (`psc_id`, `psc_pc_id`, `psc_name`) VALUES
(1, 1, 'Nokia'),
(2, 1, 'Samsung'),
(3, 1, 'Lenovo'),
(4, 1, 'LG'),
(5, 1, 'Oppo'),
(6, 1, 'Sony'),
(7, 1, 'HTC'),
(8, 1, 'IPhone'),
(9, 2, 'Samsung'),
(10, 2, 'Lenovo'),
(11, 2, 'Intel'),
(12, 2, 'Dell'),
(13, 3, 'Apple iPad'),
(14, 3, 'Apple iPad mini'),
(15, 3, 'IPad Pro'),
(16, 4, 'Batteries'),
(17, 4, 'Powerbank'),
(18, 4, 'Stand'),
(19, 4, 'Cover'),
(20, 4, 'Case'),
(21, 4, 'Holder'),
(22, 4, 'Bracket'),
(23, 4, 'Charger'),
(24, 4, 'Bluetooth'),
(25, 5, 'Hp'),
(26, 5, 'Dell'),
(27, 5, 'Lenovo'),
(28, 5, 'Intel'),
(29, 6, 'Apple'),
(30, 6, 'HP'),
(31, 6, 'Dell'),
(32, 6, 'Lenovo'),
(33, 7, 'Pen Drive'),
(34, 7, 'USB Cable'),
(35, 7, 'Mouse'),
(36, 7, 'Charger'),
(37, 7, 'Keyboard'),
(38, 7, 'Hard disk'),
(39, 7, 'Laptop Protection'),
(40, 8, 'LG'),
(41, 8, 'Panasonic'),
(42, 8, 'Samsung'),
(43, 8, 'Sony'),
(44, 8, 'Videocon'),
(45, 8, 'TCL'),
(46, 9, 'Headphone'),
(47, 9, 'Remote'),
(48, 9, 'Headset'),
(49, 10, 'DVD'),
(50, 10, 'FM'),
(51, 10, 'Home Theater'),
(52, 10, 'Speaker'),
(53, 10, 'Microphone'),
(54, 11, 'Nikon'),
(55, 11, 'Canon'),
(56, 11, 'Sony'),
(57, 12, 'Canon'),
(58, 12, 'Sony'),
(59, 13, 'Voltas'),
(60, 13, 'Samsung'),
(61, 13, 'Daikin'),
(62, 13, 'LG'),
(63, 13, 'Whirlpool'),
(64, 13, 'Hitachi'),
(65, 13, 'Blue Star'),
(66, 13, 'Bajaj'),
(67, 14, 'Godrej'),
(68, 14, 'LG'),
(69, 14, 'Samsung'),
(70, 14, 'Whirlpool'),
(71, 14, 'Videocon'),
(72, 14, 'Haier'),
(73, 15, 'Kitchen Chimney'),
(74, 15, 'Mixer Grinder'),
(75, 15, 'Juicer'),
(76, 15, 'Water Purifier'),
(77, 15, 'Electric Kettles'),
(78, 15, 'Induction Cooktops'),
(79, 15, 'Coffee Maker'),
(80, 15, 'Rice Cooker'),
(81, 16, 'Vacuum Cleaner'),
(82, 16, 'Fan'),
(83, 16, 'Washing Machine'),
(84, 16, 'Geyser'),
(85, 16, 'Electric Iron'),
(86, 16, 'Sewing Machine');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_sub_cat`
--

DROP TABLE IF EXISTS `product_sub_sub_cat`;
CREATE TABLE `product_sub_sub_cat` (
`pssc_id` int(11) NOT NULL,
  `pssc_psc_id` int(11) NOT NULL,
  `pssc_name` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sub_sub_cat`
--

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE `site_settings` (
`st_id` int(10) NOT NULL,
  `st_field` varchar(100) NOT NULL,
  `st_value` longtext NOT NULL,
  `st_updated_date` date NOT NULL,
  `st_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`st_id`, `st_field`, `st_value`, `st_updated_date`, `st_status`) VALUES
(20, 'currency_sign', 'US$', date_add(NOW(),INTERVAL -1 DAY), 1),
(22, 'Free Line For You', '0123456789', date_add(NOW(),INTERVAL -1 DAY), 1),
(19, 'currency', 'USD', date_add(NOW(),INTERVAL -1 DAY), 1),
(18, 'default_country', '1', date_add(NOW(),INTERVAL -1 DAY), 1),
(14, 'title', 'Auction Script, Ebay Clone Script', date_add(NOW(),INTERVAL -1 DAY), 1),
(15, 'meta_keyword', 'Auction Script, Ebay Clone', date_add(NOW(),INTERVAL -1 DAY), 1),
(16, 'meta_description', 'Auction Script, Ebay Clone', date_add(NOW(),INTERVAL -1 DAY), 1),
(17, 'logo', 'logo.png', date_add(NOW(),INTERVAL -1 DAY), 1),
(23, 'Email Us', ' sales@yourcompany.com', date_add(NOW(),INTERVAL -1 DAY), 1),
(24, 'Working Hours', '24 * 7', date_add(NOW(),INTERVAL -1 DAY), 1),
(25, 'site_name', 'MultiVendor.com', date_add(NOW(),INTERVAL -1 DAY), 1),
(26, 'company_name', 'My Company', date_add(NOW(),INTERVAL -1 DAY), 1),
(28, 'company_address', '42 avenue des Champs Elyses 75000 Paris Frances', date_add(NOW(),INTERVAL -1 DAY), 1),
(27, 'company_details', 'Maecenas euismod felis et purus consectetur, quis fermentum velition. Aenean egestas quis turpis vehicula.Maecenas euismod felis et purus consectetur, quis fermentum velition. Aenean egestas quis turpis vehicula.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. ', date_add(NOW(),INTERVAL -1 DAY), 1),
(29, 'withdraw_limit', '1000', date_add(NOW(),INTERVAL -1 DAY), 1),
(30, 'commision', '11||10', date_add(NOW(),INTERVAL -1 DAY), 1),
(31, 'facebook', 'https://www.facebook.com/', date_add(NOW(),INTERVAL -1 DAY), 1),
(32, 'twitter', 'http://www.twitter.com', date_add(NOW(),INTERVAL -1 DAY), 1),
(33, 'youtube', 'http://www.youtube.com', date_add(NOW(),INTERVAL -1 DAY), 1),
(34, 'footer-text', '2016 All Rights Reserved.', date_add(NOW(),INTERVAL -1 DAY), 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_registration`
--

DROP TABLE IF EXISTS `vendor_registration`;
CREATE TABLE `vendor_registration` (
`vr_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address_one` varchar(255) NOT NULL,
  `address_two` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `post_code` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `terms_agree` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_registration`
--

INSERT INTO `vendor_registration` (`vr_id`, `fname`, `lname`, `email`, `phone`, `fax`, `company`, `address_one`, `address_two`, `country`, `city`, `post_code`, `password`, `newsletter`, `image`, `status`, `terms_agree`) VALUES
(2, 'Demo', 'Vendor', 'vendor@yourmail.com', 7602632739, '234567', 'Home', 'Sonarpur', 'Sonarpur', 1, 1, 700150, '8db565fc4a30b682cb31ab78fa4c4008', 0, '1482925947admin.png', 1, 1),
(3, 'Sidd', 'Das', 's@gmail.com', 9874315138, '3454534', 'BMC', 'Kolkata, 134 ab/2 Road', 'Kolkata, 134 ab/2 Road', 1, 6, 721446, 'c4ca4238a0b923820dcc509a6f75849b', 1, '1482926485admin.jpg', 1, 1),
(4, 'Sanjay', 'Panja', 'sanjay@gmail.com', 7602632739, '435646', 'Infoware', 'Bidhannagar, Near PNB Bus Stand', 'Saltlake, Sec-v, E-1 Block', 1, 3, 700150, 'c4ca4238a0b923820dcc509a6f75849b', 0, '1484303554large.jpg', 1, 1),
(5, 'Partha', 'Ghorai', 'partha@gmail.com', 7602632739, '435646', 'Infoware', 'Bidhannagar, Near PNB Bus Stand', 'Saltlake, Sec-v, E-1 Block', 1, 3, 700150, 'c4ca4238a0b923820dcc509a6f75849b', 0, '1484303554large1.jpg', 1, 1),
(6, 'Subhodip', 'Dey', 'subhodip@gmail.com', 7602632739, '345678', 'Tech India', 'Shyambazar, Kol-150', 'Shyambazar, Kol-150', 1, 5, 700150, 'c4ca4238a0b923820dcc509a6f75849b', 0, '1505127286comment-image-1.jpg', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_about`
--
ALTER TABLE `ambit_about`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_add2cart`
--
ALTER TABLE `ambit_add2cart`
 ADD PRIMARY KEY (`aad_cart_id`);

--
-- Indexes for table `ambit_add2wish`
--
ALTER TABLE `ambit_add2wish`
 ADD PRIMARY KEY (`aaw_id`);

--
-- Indexes for table `ambit_add_banner`
--
ALTER TABLE `ambit_add_banner`
 ADD PRIMARY KEY (`aab_id`);

--
-- Indexes for table `ambit_add_slider`
--
ALTER TABLE `ambit_add_slider`
 ADD PRIMARY KEY (`aas_id`);

--
-- Indexes for table `ambit_advertisement`
--
ALTER TABLE `ambit_advertisement`
 ADD PRIMARY KEY (`aab_id`);

--
-- Indexes for table `ambit_brand`
--
ALTER TABLE `ambit_brand`
 ADD PRIMARY KEY (`ab_id`);

--
-- Indexes for table `ambit_buy_package`
--
ALTER TABLE `ambit_buy_package`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_buy_product`
--
ALTER TABLE `ambit_buy_product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_buy_product_auction`
--
ALTER TABLE `ambit_buy_product_auction`
 ADD PRIMARY KEY (`abpa_id`);

--
-- Indexes for table `ambit_city`
--
ALTER TABLE `ambit_city`
 ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `ambit_country`
--
ALTER TABLE `ambit_country`
 ADD PRIMARY KEY (`cn_id`);

--
-- Indexes for table `ambit_coupon`
--
ALTER TABLE `ambit_coupon`
 ADD PRIMARY KEY (`aco_id`);

--
-- Indexes for table `ambit_currency`
--
ALTER TABLE `ambit_currency`
 ADD PRIMARY KEY (`acu_id`);

--
-- Indexes for table `ambit_customer`
--
ALTER TABLE `ambit_customer`
 ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `ambit_faq`
--
ALTER TABLE `ambit_faq`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_features`
--
ALTER TABLE `ambit_features`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_membership`
--
ALTER TABLE `ambit_membership`
 ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `ambit_package_description`
--
ALTER TABLE `ambit_package_description`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_payment_method`
--
ALTER TABLE `ambit_payment_method`
 ADD PRIMARY KEY (`apm_id`);

--
-- Indexes for table `ambit_product_add`
--
ALTER TABLE `ambit_product_add`
 ADD PRIMARY KEY (`apa_id`);

--
-- Indexes for table `ambit_product_bid`
--
ALTER TABLE `ambit_product_bid`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_product_color`
--
ALTER TABLE `ambit_product_color`
 ADD PRIMARY KEY (`apc_id`);

--
-- Indexes for table `ambit_product_image`
--
ALTER TABLE `ambit_product_image`
 ADD PRIMARY KEY (`api_id`);

--
-- Indexes for table `ambit_product_review`
--
ALTER TABLE `ambit_product_review`
 ADD PRIMARY KEY (`apr_id`);

--
-- Indexes for table `ambit_pro_qustn_ans`
--
ALTER TABLE `ambit_pro_qustn_ans`
 ADD PRIMARY KEY (`apqa_id`);

--
-- Indexes for table `ambit_return_product`
--
ALTER TABLE `ambit_return_product`
 ADD PRIMARY KEY (`arp_id`);

--
-- Indexes for table `ambit_shipment_by`
--
ALTER TABLE `ambit_shipment_by`
 ADD PRIMARY KEY (`asb_id`);

--
-- Indexes for table `ambit_shipment_status`
--
ALTER TABLE `ambit_shipment_status`
 ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `ambit_shipment_status_auction`
--
ALTER TABLE `ambit_shipment_status_auction`
 ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `ambit_size_unit`
--
ALTER TABLE `ambit_size_unit`
 ADD PRIMARY KEY (`asu_id`);

--
-- Indexes for table `ambit_suggest_brand`
--
ALTER TABLE `ambit_suggest_brand`
 ADD PRIMARY KEY (`asb_id`);

--
-- Indexes for table `ambit_terms_condition`
--
ALTER TABLE `ambit_terms_condition`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_vendor_balance`
--
ALTER TABLE `ambit_vendor_balance`
 ADD PRIMARY KEY (`avb_id`);

--
-- Indexes for table `ambit_vendor_qustn_ans`
--
ALTER TABLE `ambit_vendor_qustn_ans`
 ADD PRIMARY KEY (`avqa_id`);

--
-- Indexes for table `ambit_vendor_review`
--
ALTER TABLE `ambit_vendor_review`
 ADD PRIMARY KEY (`avr_id`);

--
-- Indexes for table `ambit_weight_unit`
--
ALTER TABLE `ambit_weight_unit`
 ADD PRIMARY KEY (`awu_id`);

--
-- Indexes for table `ambit_withdraw`
--
ALTER TABLE `ambit_withdraw`
 ADD PRIMARY KEY (`aw_id`);

--
-- Indexes for table `mail_body_settings`
--
ALTER TABLE `mail_body_settings`
 ADD PRIMARY KEY (`mbs_id`);

--
-- Indexes for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
 ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
 ADD PRIMARY KEY (`psc_id`);

--
-- Indexes for table `product_sub_sub_cat`
--
ALTER TABLE `product_sub_sub_cat`
 ADD PRIMARY KEY (`pssc_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
 ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `vendor_registration`
--
ALTER TABLE `vendor_registration`
 ADD PRIMARY KEY (`vr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ambit_about`
--
ALTER TABLE `ambit_about`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ambit_add2cart`
--
ALTER TABLE `ambit_add2cart`
MODIFY `aad_cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ambit_add2wish`
--
ALTER TABLE `ambit_add2wish`
MODIFY `aaw_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ambit_add_banner`
--
ALTER TABLE `ambit_add_banner`
MODIFY `aab_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ambit_add_slider`
--
ALTER TABLE `ambit_add_slider`
MODIFY `aas_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ambit_advertisement`
--
ALTER TABLE `ambit_advertisement`
MODIFY `aab_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ambit_brand`
--
ALTER TABLE `ambit_brand`
MODIFY `ab_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `ambit_buy_package`
--
ALTER TABLE `ambit_buy_package`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ambit_buy_product`
--
ALTER TABLE `ambit_buy_product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ORDER ID',AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `ambit_buy_product_auction`
--
ALTER TABLE `ambit_buy_product_auction`
MODIFY `abpa_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ambit_city`
--
ALTER TABLE `ambit_city`
MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ambit_country`
--
ALTER TABLE `ambit_country`
MODIFY `cn_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ambit_coupon`
--
ALTER TABLE `ambit_coupon`
MODIFY `aco_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ambit_currency`
--
ALTER TABLE `ambit_currency`
MODIFY `acu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ambit_customer`
--
ALTER TABLE `ambit_customer`
MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ambit_faq`
--
ALTER TABLE `ambit_faq`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ambit_features`
--
ALTER TABLE `ambit_features`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ambit_membership`
--
ALTER TABLE `ambit_membership`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ambit_package_description`
--
ALTER TABLE `ambit_package_description`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ambit_payment_method`
--
ALTER TABLE `ambit_payment_method`
MODIFY `apm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ambit_product_add`
--
ALTER TABLE `ambit_product_add`
MODIFY `apa_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=584;
--
-- AUTO_INCREMENT for table `ambit_product_bid`
--
ALTER TABLE `ambit_product_bid`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ambit_product_color`
--
ALTER TABLE `ambit_product_color`
MODIFY `apc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ambit_product_image`
--
ALTER TABLE `ambit_product_image`
MODIFY `api_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=584;
--
-- AUTO_INCREMENT for table `ambit_product_review`
--
ALTER TABLE `ambit_product_review`
MODIFY `apr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ambit_pro_qustn_ans`
--
ALTER TABLE `ambit_pro_qustn_ans`
MODIFY `apqa_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ambit_return_product`
--
ALTER TABLE `ambit_return_product`
MODIFY `arp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ambit_shipment_by`
--
ALTER TABLE `ambit_shipment_by`
MODIFY `asb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ambit_shipment_status`
--
ALTER TABLE `ambit_shipment_status`
MODIFY `ass_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `ambit_shipment_status_auction`
--
ALTER TABLE `ambit_shipment_status_auction`
MODIFY `ass_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ambit_size_unit`
--
ALTER TABLE `ambit_size_unit`
MODIFY `asu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ambit_suggest_brand`
--
ALTER TABLE `ambit_suggest_brand`
MODIFY `asb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ambit_terms_condition`
--
ALTER TABLE `ambit_terms_condition`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ambit_vendor_balance`
--
ALTER TABLE `ambit_vendor_balance`
MODIFY `avb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `ambit_vendor_qustn_ans`
--
ALTER TABLE `ambit_vendor_qustn_ans`
MODIFY `avqa_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ambit_vendor_review`
--
ALTER TABLE `ambit_vendor_review`
MODIFY `avr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ambit_weight_unit`
--
ALTER TABLE `ambit_weight_unit`
MODIFY `awu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ambit_withdraw`
--
ALTER TABLE `ambit_withdraw`
MODIFY `aw_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mail_body_settings`
--
ALTER TABLE `mail_body_settings`
MODIFY `mbs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
MODIFY `psc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `product_sub_sub_cat`
--
ALTER TABLE `product_sub_sub_cat`
MODIFY `pssc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `vendor_registration`
--
ALTER TABLE `vendor_registration`
MODIFY `vr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;