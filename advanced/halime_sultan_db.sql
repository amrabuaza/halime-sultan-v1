-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 02:54 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `halime_sultan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'test', 'ds'),
(2, 'test2', 'sdas4d6as5d');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `price_after_sale` double DEFAULT NULL,
  `weight` double NOT NULL,
  `sub_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `description`, `price`, `price_after_sale`, `weight`, `sub_category_id`) VALUES
(31, 'itemtest1', 'ds', 12, 2, 1.3, 2),
(33, 'itemtest3', 'sa', 12, 1, 2, 2),
(34, 'amr-test-photo', 'for testing and new photo and update the items photos', 123, 0, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `item_color`
--

CREATE TABLE `item_color` (
  `id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_color`
--

INSERT INTO `item_color` (`id`, `color`, `item_id`) VALUES
(31, 'red', 31),
(34, 'green', 33),
(37, 'red', 34),
(38, 'blue', 34),
(39, 'green', 34),
(40, 'red', 33);

-- --------------------------------------------------------

--
-- Table structure for table `item_feadback`
--

CREATE TABLE `item_feadback` (
  `id` int(11) NOT NULL,
  `feadback` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_photo`
--

CREATE TABLE `item_photo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_photo`
--

INSERT INTO `item_photo` (`id`, `name`, `item_id`) VALUES
(4, '10572aed-f940-4872-a4d7-78c0add33176_nav_bar.png', 31),
(6, '5932e887-a0d9-4153-8dee-3e0320a768db_authorization_of_market_place.png', 31),
(19, '2020-02/b52765b2-f021-47cc-b849-b541b4be1e5d.png', 33),
(21, '2020-02/27f44cdb-1248-4d7a-88f5-88a63b68392b', 33),
(22, '2020-03/e6aba13f-426c-4601-9cea-6276ec7b9b08.png', 34);

-- --------------------------------------------------------

--
-- Table structure for table `item_quantity_in_stock`
--

CREATE TABLE `item_quantity_in_stock` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_quantity_in_stock`
--

INSERT INTO `item_quantity_in_stock` (`id`, `quantity`, `item_id`) VALUES
(1, 13, 31),
(2, 10, 33),
(3, 9, 34);

-- --------------------------------------------------------

--
-- Table structure for table `item_shipping_price`
--

CREATE TABLE `item_shipping_price` (
  `id` int(11) NOT NULL,
  `price` double NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_shipping_price`
--

INSERT INTO `item_shipping_price` (`id`, `price`, `item_id`) VALUES
(4, 12, 31);

-- --------------------------------------------------------

--
-- Table structure for table `item_size`
--

CREATE TABLE `item_size` (
  `id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_size`
--

INSERT INTO `item_size` (`id`, `size`, `item_id`) VALUES
(35, 'lg', 31),
(39, 'md', 31),
(40, 'lg', 33),
(41, 'sm', 33),
(42, 'xlg', 33),
(43, 'lg', 34),
(44, 'sm', 34);

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
('m000000_000000_base', 1579945723),
('m130524_201442_init', 1579945725),
('m190124_110200_add_verification_token_column_to_user_table', 1579945725);

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_color_id` int(11) NOT NULL,
  `item_size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_fees_per_country`
--

CREATE TABLE `shipping_fees_per_country` (
  `id` int(11) NOT NULL,
  `price` double NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_fees_per_country`
--

INSERT INTO `shipping_fees_per_country` (`id`, `price`, `country_id`) VALUES
(1, 3, 112);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `base_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `description`, `base_category_id`) VALUES
(1, 'test', 'ds', 2),
(2, 'test2', 'ds', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `transaction_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cost` double NOT NULL,
  `status` enum('success','failed') NOT NULL,
  `card_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `item_weight` double NOT NULL,
  `price` double NOT NULL,
  `user_address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birth_date` date NOT NULL,
  `country_id` int(11) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `type` enum('admin','user') NOT NULL DEFAULT 'user',
  `phone_number` varchar(255) NOT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `access_token` varchar(255) NOT NULL,
  `picture_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `gender`, `birth_date`, `country_id`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `type`, `phone_number`, `verification_code`, `verified`, `access_token`, `picture_id`) VALUES
(1, 'root', 'Amr', 'A. Abu Aza', 'male', '1995-10-06', 1, '', '$2y$13$sdvhszWoYkpE4W8Phl55puX3KVmHRGPVaZWLFmdii0LD8M0PovOPm', NULL, 'root@hotmail.com', 10, '0000-00-00 00:00:00', '2020-03-12 19:39:32', 'admin', '962780663397', '', 0, '2f9decc3d5905c59afd882e74c34b9530206d2b035a354bab5c79f20ee5e569e', 18),
(2, 'ahmad', 'Ahmad', 'alma8ableh', 'male', '1965-03-03', 1, '', '$2y$13$go97VJ9xxNQ0ZTj5UN2Sg.OhZC2mOkqz9ovi62aQk.nT2O.CGfnBS', NULL, 'ahmad@hotmail.com', 10, '0000-00-00 00:00:00', '2020-03-01 09:17:13', 'admin', '12', NULL, 0, '11428ce4e784db3fdd533309ed70066e2d2dca1077bdc1b000ad682b1ed07327', NULL),
(11, 'amr', 'amr', 'abu aza', 'male', '1994-03-08', 1, 'lxf3K6F11p-nYm636rChXnoOZgmsWBCf9f92ce1b-a789-4c0f-a39d-b6ff51c623ce', '$2y$13$tqbxNqHO/EEVcDGl6lpG6OKWpdZmJ8wi6UBDFwAN1f2CnJStMPPcm', NULL, 'amr@hotmail.com', 10, '2020-02-01 01:10:48', '2020-03-01 09:14:15', 'user', '12', NULL, 1, '7YtgoXcgopX_QC6rEEJt4paXX3NbUZDZ3a12826f-2fcf-4433-a810-26620739016c', NULL),
(12, 'mohammad', 'mohammad', 'bni khaled', 'male', '1980-11-30', 1, '', '$2y$13$G/e8BxTRaC/6WGkurkYA.uEzRakaY3HMEDpFivhr/ei3lHUSeAEV.', NULL, 'mohammad@hotmail.com', 10, '2020-02-13 16:50:29', '2020-03-01 09:14:27', 'user', '123', NULL, 0, 'dfe3e8101bb7030424562ca013f6da5d3eb03a8533819214de59f67cc87bfd8e', NULL),
(14, 'mohmad', 'sdk;ldsfds', 'sss', 'female', '0000-00-00', 1, '', '$2y$13$QSI82iSTr8sQIkudfzXBHObqwQ5PFiiOd6mzrX2Ex10AsO2yPEV0S', NULL, 'test@test.com', 10, '2020-03-07 18:18:25', '2020-03-07 19:51:44', 'user', '111', NULL, 0, '2aeac13195f7a9fd80de57d6767b2e204593d63ee139e5289afc83835c601188', 17),
(15, 'test_country', '', '', 'male', '0000-00-00', 112, '', '$2y$13$oq.AlQpZnQN1tJp2485N6OhsTnBy4d2C4N.Wk7Zum1PXaYpV.7hva', NULL, 'country@test.com', 10, '2020-03-07 23:07:25', '2020-03-08 00:07:25', 'user', '132', NULL, 0, '4aa78c4066018a5a9b5f720560e83f82cf2ed4026a18d0b618e92701425a0b50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `building_number_or_name` varchar(255) NOT NULL,
  `floor_number` int(11) NOT NULL,
  `apartment_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `country`, `city`, `region`, `street_name`, `building_number_or_name`, `floor_number`, `apartment_number`, `user_id`) VALUES
(1, 'Jordan', 'irbid', 'al7i el shar8i', '30\'s', 'AlThorea 4 ', 0, 3, 1),
(2, 'Jordan', 'irbid', 'al7i el shar8i', '30\'s', 'AlThorea 4 ', 0, 3, 1),
(3, 'jordan', 'irbid', '7ai shr8i', '30th', '22', 3, 8, 1),
(4, 'jordan', 'irbid', '7ai shr8i', '30th', '22', 3, 8, 1),
(5, 'jordan', 'irbid', '7ai shr8i', '30th', '22', 3, 8, 1),
(6, 'jordan', 'irbid', '7ai shr8i', '30th', '22', 3, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `status` enum('inProgress','onTheWay','delivered','cancelled','pending') NOT NULL,
  `total` double NOT NULL,
  `shipping_cost` double DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `promo_code_id` int(11) DEFAULT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `transfer_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `status`, `total`, `shipping_cost`, `user_id`, `promo_code_id`, `transaction_id`, `transfer_id`, `created_at`, `updated_at`) VALUES
(2, '', 0, NULL, 1, NULL, NULL, NULL, '2020-03-10 19:35:27', '2020-03-10 20:35:27'),
(3, '', 0, NULL, 1, NULL, NULL, NULL, '2020-03-10 19:36:28', '2020-03-10 20:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_order_hestory`
--

CREATE TABLE `user_order_hestory` (
  `id` int(11) NOT NULL,
  `status` enum('inprogress','inTheWay','delivered','canceled') NOT NULL,
  `total` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_address_id` int(11) NOT NULL,
  `promo_code_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `transfer_id` int(11) NOT NULL,
  `user_order_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_picture`
--

CREATE TABLE `user_picture` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_picture`
--

INSERT INTO `user_picture` (`id`, `name`, `user_id`) VALUES
(14, 'user-pictures/2020-03/acb4c4f9-d807-4975-8e17-ffdfa6ca685d.jfif', 2),
(17, 'user-pictures/2020-03/b1543d81-2735-4e47-a771-38f95e38bb7b.png', 14),
(18, 'user-pictures/2020-03/690bc65a-8b89-4ac4-8dac-2602ca556718.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_item_sub_category` (`sub_category_id`);

--
-- Indexes for table `item_color`
--
ALTER TABLE `item_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_item_color_item` (`item_id`);

--
-- Indexes for table `item_feadback`
--
ALTER TABLE `item_feadback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_item_feadback_item` (`item_id`),
  ADD KEY `con_item_feadback_order` (`order_id`);

--
-- Indexes for table `item_photo`
--
ALTER TABLE `item_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_item_photo_item` (`item_id`);

--
-- Indexes for table `item_quantity_in_stock`
--
ALTER TABLE `item_quantity_in_stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Indexes for table `item_shipping_price`
--
ALTER TABLE `item_shipping_price`
  ADD PRIMARY KEY (`id`,`item_id`),
  ADD KEY `con_item_shipping_item` (`item_id`);

--
-- Indexes for table `item_size`
--
ALTER TABLE `item_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_item_size_item` (`item_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `con_order_address_address_id` (`address_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_order_items_item` (`item_id`),
  ADD KEY `con_user_items_user_order` (`order_id`),
  ADD KEY `con_user_item_item_color` (`item_color_id`),
  ADD KEY `con_user_item_item_size` (`item_size_id`);

--
-- Indexes for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_fees_per_country`
--
ALTER TABLE `shipping_fees_per_country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_id` (`country_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_sub_category_base_category` (`base_category_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_transaction_user` (`user_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_transfer_user` (`user_address_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `con_user_country_id` (`country_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_user_address_user` (`user_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_user_order_promo_code` (`promo_code_id`),
  ADD KEY `con_user_order_transaction` (`transaction_id`),
  ADD KEY `con_user_order_transfer` (`transfer_id`),
  ADD KEY `con_user_order_user` (`user_id`);

--
-- Indexes for table `user_order_hestory`
--
ALTER TABLE `user_order_hestory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_user_order_hestory_promo_code` (`promo_code_id`),
  ADD KEY `con_user_order_hestory_transaction` (`transaction_id`),
  ADD KEY `con_user_order_hestory_transfer` (`transfer_id`),
  ADD KEY `con_user_order_hestory_user` (`user_id`),
  ADD KEY `con_user_order_hestory_user_address` (`user_address_id`),
  ADD KEY `con_user_order_hestory_user_order` (`user_order_id`);

--
-- Indexes for table `user_picture`
--
ALTER TABLE `user_picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_user_picture_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `item_color`
--
ALTER TABLE `item_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `item_feadback`
--
ALTER TABLE `item_feadback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_photo`
--
ALTER TABLE `item_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `item_quantity_in_stock`
--
ALTER TABLE `item_quantity_in_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item_shipping_price`
--
ALTER TABLE `item_shipping_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_size`
--
ALTER TABLE `item_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_fees_per_country`
--
ALTER TABLE `shipping_fees_per_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_order_hestory`
--
ALTER TABLE `user_order_hestory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_picture`
--
ALTER TABLE `user_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `con_item_sub_category` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_color`
--
ALTER TABLE `item_color`
  ADD CONSTRAINT `con_item_color_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_feadback`
--
ALTER TABLE `item_feadback`
  ADD CONSTRAINT `con_item_feadback_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_item_feadback_order` FOREIGN KEY (`order_id`) REFERENCES `user_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_photo`
--
ALTER TABLE `item_photo`
  ADD CONSTRAINT `con_item_photo_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_quantity_in_stock`
--
ALTER TABLE `item_quantity_in_stock`
  ADD CONSTRAINT `con_item_quantity_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_shipping_price`
--
ALTER TABLE `item_shipping_price`
  ADD CONSTRAINT `con_item_shipping_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_size`
--
ALTER TABLE `item_size`
  ADD CONSTRAINT `con_item_size_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_address`
--
ALTER TABLE `order_address`
  ADD CONSTRAINT `con_order_address_address_id` FOREIGN KEY (`address_id`) REFERENCES `user_address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_order_address_order_id` FOREIGN KEY (`order_id`) REFERENCES `user_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `con_order_items_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_user_item_item_color` FOREIGN KEY (`item_color_id`) REFERENCES `item_color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_user_item_item_size` FOREIGN KEY (`item_size_id`) REFERENCES `item_size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_user_items_user_order` FOREIGN KEY (`order_id`) REFERENCES `user_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `con_sub_category_base_category` FOREIGN KEY (`base_category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `con_transaction_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `con_transfer_user` FOREIGN KEY (`user_address_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `con_user_country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `con_user_address_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `con_user_order_promo_code` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_code` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_user_order_transaction` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_user_order_transfer` FOREIGN KEY (`transfer_id`) REFERENCES `transfer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_user_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_order_hestory`
--
ALTER TABLE `user_order_hestory`
  ADD CONSTRAINT `con_user_order_hestory_promo_code` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_code` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_user_order_hestory_transaction` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `con_user_order_hestory_transfer` FOREIGN KEY (`transfer_id`) REFERENCES `transfer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `con_user_order_hestory_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `con_user_order_hestory_user_address` FOREIGN KEY (`user_address_id`) REFERENCES `user_address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `con_user_order_hestory_user_order` FOREIGN KEY (`user_order_id`) REFERENCES `user_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_picture`
--
ALTER TABLE `user_picture`
  ADD CONSTRAINT `con_user_picture_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
