-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for vitproject
CREATE DATABASE IF NOT EXISTS `vitproject` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `vitproject`;

-- Dumping structure for table vitproject.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `name`, `username`, `email`, `phone`, `country`, `password`, `role`, `photo`, `created_at`, `updated_at`, `remember_token`, `status`) VALUES
	(1, 'CharitAble', NULL, 'admin@charitable.com', '1234567890', NULL, '$2y$10$B32djtHew0rMp4w0uJ.2geH.jwzHgG4tx1XxwXEhT5GWrOLa9VbCG', 'administrator', 'tm3testimonial-author-1.png', '2022-04-17 11:54:32', '2022-04-17 11:54:32', 'gb78HDHNHtxlBoq3APB0xKu8qjttCFWhkjMCYJZGPLnyCp3ByBaZOZ98KnhO', 1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table vitproject.advertisements
CREATE TABLE IF NOT EXISTS `advertisements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('script','banner') NOT NULL,
  `advertiser_name` varchar(255) DEFAULT NULL,
  `redirect_url` varchar(255) DEFAULT NULL,
  `banner_size` varchar(255) NOT NULL,
  `banner_file` varchar(255) DEFAULT NULL,
  `script` text DEFAULT NULL,
  `clicks` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.advertisements: ~0 rows (approximately)
/*!40000 ALTER TABLE `advertisements` DISABLE KEYS */;
/*!40000 ALTER TABLE `advertisements` ENABLE KEYS */;

-- Dumping structure for table vitproject.blogs
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vitproject.blogs: ~2 rows (approximately)
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` (`id`, `title`, `details`, `featured_image`, `source`, `views`, `created_at`, `updated_at`, `status`) VALUES
	(1, 'charitAble', 'A Website that allows you to connect with NGOs.', 'placeholder.jpg', 'Margik Bhatt', 8, '2022-04-18 15:25:10', '2022-04-17 14:10:29', 1);
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;

-- Dumping structure for table vitproject.brands
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.brands: ~9 rows (approximately)
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` (`id`, `logo`, `status`) VALUES
	(3, 'Io1519468640zbrand.png', 1),
	(4, '601519468648zbrand.png', 1),
	(5, 'oX1519468660zbrand.png', 1),
	(6, 'uZ1519468670zbrand.png', 1),
	(7, 'JB1519468717zbrand.png', 1),
	(8, 'jn1519468725zbrand.png', 1),
	(9, 'Ee1519468732zbrand.png', 1),
	(10, 'WQ1519468743zbrand.png', 1),
	(11, 'Rr1519468753zbrand.png', 1);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;

-- Dumping structure for table vitproject.campaigns
CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdby` int(11) NOT NULL DEFAULT 0,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature_image` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `video_link` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `available_fund` float NOT NULL DEFAULT 0,
  `default_amount` float DEFAULT NULL,
  `preloaded_amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_after` enum('goal','date') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'goal',
  `featured` int(11) NOT NULL DEFAULT 0,
  `admin_aproved` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('pending','running','closed','reject') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table vitproject.campaigns: ~4 rows (approximately)
/*!40000 ALTER TABLE `campaigns` DISABLE KEYS */;
INSERT INTO `campaigns` (`id`, `createdby`, `category`, `title`, `description`, `feature_image`, `video_link`, `start_date`, `end_date`, `goal`, `available_fund`, `default_amount`, `preloaded_amount`, `end_after`, `featured`, `admin_aproved`, `created_at`, `updated_at`, `status`) VALUES
	(1, 0, 'Clothes', 'Clothes Campaign', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id \r\ncongue lorem, sed egestas mauris. Suspendisse euismod mi facilisis porta\r\n tincidunt. Sed in nisi vitae lacus laoreet vulputate. Aenean est \r\nsapien, ullamcorper lacinia eros consequat, laoreet dignissim eros. Nam \r\nfeugiat enim id dolor finibus interdum. In elementum nisi eget sem \r\nbibendum elementum. In pharetra auctor augue. Donec nisl dolor, \r\nvenenatis ac nulla eget, elementum iaculis nunc. Etiam fermentum at ante\r\n sed tempus.\r\n</p>\r\n<p>\r\nNunc porttitor, tellus in aliquam pretium, turpis mauris placerat metus,\r\n ac interdum lorem dolor mattis lectus. Pellentesque sed bibendum erat. \r\nQuisque a sapien ultrices, tincidunt velit eget, fringilla erat. \r\nPellentesque eget erat dolor. Sed eget porta odio, mollis hendrerit \r\njusto. Aenean odio arcu, rhoncus vitae facilisis at, cursus sed tortor. \r\nNunc varius tellus id dui eleifend facilisis. Phasellus lectus elit, \r\npulvinar sed nibh in, porttitor consequat dolor. Cras condimentum arcu \r\nsed metus viverra, id rutrum elit interdum. Nam in pellentesque urna. \r\nInteger ullamcorper, ex nec accumsan sodales, ipsum ipsum congue ante, \r\neget consectetur metus mauris commodo erat. Integer pharetra ante vel \r\ndolor convallis, vel tincidunt urna consequat.\r\n</p>\r\n<p>\r\nAenean diam quam, eleifend sit amet mauris nec, sollicitudin viverra \r\nsem. Duis nisl magna, consectetur ac ullamcorper a, mollis ac libero. \r\nNullam vestibulum ex ac neque efficitur, non finibus nisl pellentesque. \r\nNam ac turpis dolor. Nunc blandit, dolor id pellentesque sagittis, \r\nlibero mauris dignissim ipsum, et dignissim lorem lacus ut lacus. Morbi \r\nsagittis tincidunt finibus. Duis ut rutrum leo. Sed consectetur posuere \r\nodio, ac consectetur diam dapibus ac. Praesent elementum arcu vitae \r\ntellus lacinia, sed molestie ex accumsan. Orci varius natoque penatibus \r\net magnis dis parturient montes, nascetur ridiculus mus. Aenean ut nunc \r\nut lorem vestibulum fermentum sit amet ac metus.\r\n</p>\r\n<p>\r\nSed fringilla et nulla a maximus. Duis accumsan, sapien eu feugiat \r\nconsectetur, nibh neque elementum neque, ac sagittis sapien odio nec \r\nnisi. Morbi porta quis eros quis ornare. Quisque vel iaculis lorem. \r\nVestibulum faucibus, turpis eu hendrerit laoreet, nisl arcu imperdiet \r\nturpis, egestas pretium ante elit at mi. Nulla suscipit at felis vel \r\ncommodo. Nullam quis tempor eros. Nunc aliquet mattis nibh ut ultricies.\r\n Vestibulum enim eros, malesuada sed quam in, malesuada accumsan mi. \r\nCras vel dolor purus. Sed fringilla lectus in justo aliquam imperdiet. \r\nAenean tincidunt libero dictum dapibus rhoncus. Nulla iaculis lectus sit\r\n amet iaculis facilisis. Praesent scelerisque elit nec accumsan \r\nultricies.\r\n</p>', 'clothemain.jpg', 'https://www.youtube.com/watch?v=WLt2cnu9Hg0', NULL, '2017-06-11 00:00:00', 1000, 0, 20, '20.00,30.00,40.00,50.00', 'date', 1, 'yes', '2017-06-04 16:52:03', '2018-01-09 15:56:37', 'running'),
	(3, 2, 'Education', 'Educate Campaign', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id \r\ncongue lorem, sed egestas mauris. Suspendisse euismod mi facilisis porta\r\n tincidunt. Sed in nisi vitae lacus laoreet vulputate. Aenean est \r\nsapien, ullamcorper lacinia eros consequat, laoreet dignissim eros. Nam \r\nfeugiat enim id dolor finibus interdum. In elementum nisi eget sem \r\nbibendum elementum. In pharetra auctor augue. Donec nisl dolor, \r\nvenenatis ac nulla eget, elementum iaculis nunc. Etiam fermentum at ante\r\n sed tempus.\r\n</p>\r\n<p>\r\nNunc porttitor, tellus in aliquam pretium, turpis mauris placerat metus,\r\n ac interdum lorem dolor mattis lectus. Pellentesque sed bibendum erat. \r\nQuisque a sapien ultrices, tincidunt velit eget, fringilla erat. \r\nPellentesque eget erat dolor. Sed eget porta odio, mollis hendrerit \r\njusto. Aenean odio arcu, rhoncus vitae facilisis at, cursus sed tortor. \r\nNunc varius tellus id dui eleifend facilisis. Phasellus lectus elit, \r\npulvinar sed nibh in, porttitor consequat dolor. Cras condimentum arcu \r\nsed metus viverra, id rutrum elit interdum. Nam in pellentesque urna. \r\nInteger ullamcorper, ex nec accumsan sodales, ipsum ipsum congue ante, \r\neget consectetur metus mauris commodo erat. Integer pharetra ante vel \r\ndolor convallis, vel tincidunt urna consequat.\r\n</p>\r\n<p>\r\nAenean diam quam, eleifend sit amet mauris nec, sollicitudin viverra \r\nsem. Duis nisl magna, consectetur ac ullamcorper a, mollis ac libero. \r\nNullam vestibulum ex ac neque efficitur, non finibus nisl pellentesque. \r\nNam ac turpis dolor. Nunc blandit, dolor id pellentesque sagittis, \r\nlibero mauris dignissim ipsum, et dignissim lorem lacus ut lacus. Morbi \r\nsagittis tincidunt finibus. Duis ut rutrum leo. Sed consectetur posuere \r\nodio, ac consectetur diam dapibus ac. Praesent elementum arcu vitae \r\ntellus lacinia, sed molestie ex accumsan. Orci varius natoque penatibus \r\net magnis dis parturient montes, nascetur ridiculus mus. Aenean ut nunc \r\nut lorem vestibulum fermentum sit amet ac metus.\r\n</p>\r\n<p>\r\nSed fringilla et nulla a maximus. Duis accumsan, sapien eu feugiat \r\nconsectetur, nibh neque elementum neque, ac sagittis sapien odio nec \r\nnisi. Morbi porta quis eros quis ornare. Quisque vel iaculis lorem. \r\nVestibulum faucibus, turpis eu hendrerit laoreet, nisl arcu imperdiet \r\nturpis, egestas pretium ante elit at mi. Nulla suscipit at felis vel \r\ncommodo. Nullam quis tempor eros. Nunc aliquet mattis nibh ut ultricies.\r\n Vestibulum enim eros, malesuada sed quam in, malesuada accumsan mi. \r\nCras vel dolor purus. Sed fringilla lectus in justo aliquam imperdiet. \r\nAenean tincidunt libero dictum dapibus rhoncus. Nulla iaculis lectus sit\r\n amet iaculis facilisis. Praesent scelerisque elit nec accumsan \r\nultricies.\r\n</p>', 'educationmain.jpg', 'https://www.youtube.com/watch?v=WLt2cnu9Hg0', NULL, '2017-06-12 00:00:00', 1000, 260, NULL, '50,60,70', 'goal', 1, 'yes', '2017-06-10 15:56:32', '2018-01-09 16:46:39', 'running'),
	(12, 8, 'Foods', 'Food Campaign', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id \r\ncongue lorem, sed egestas mauris. Suspendisse euismod mi facilisis porta\r\n tincidunt. Sed in nisi vitae lacus laoreet vulputate. Aenean est \r\nsapien, ullamcorper lacinia eros consequat, laoreet dignissim eros. Nam \r\nfeugiat enim id dolor finibus interdum. In elementum nisi eget sem \r\nbibendum elementum. In pharetra auctor augue. Donec nisl dolor, \r\nvenenatis ac nulla eget, elementum iaculis nunc. Etiam fermentum at ante\r\n sed tempus.\r\n</p>\r\n<p>\r\nNunc porttitor, tellus in aliquam pretium, turpis mauris placerat metus,\r\n ac interdum lorem dolor mattis lectus. Pellentesque sed bibendum erat. \r\nQuisque a sapien ultrices, tincidunt velit eget, fringilla erat. \r\nPellentesque eget erat dolor. Sed eget porta odio, mollis hendrerit \r\njusto. Aenean odio arcu, rhoncus vitae facilisis at, cursus sed tortor. \r\nNunc varius tellus id dui eleifend facilisis. Phasellus lectus elit, \r\npulvinar sed nibh in, porttitor consequat dolor. Cras condimentum arcu \r\nsed metus viverra, id rutrum elit interdum. Nam in pellentesque urna. \r\nInteger ullamcorper, ex nec accumsan sodales, ipsum ipsum congue ante, \r\neget consectetur metus mauris commodo erat. Integer pharetra ante vel \r\ndolor convallis, vel tincidunt urna consequat.\r\n</p>\r\n<p>\r\nAenean diam quam, eleifend sit amet mauris nec, sollicitudin viverra \r\nsem. Duis nisl magna, consectetur ac ullamcorper a, mollis ac libero. \r\nNullam vestibulum ex ac neque efficitur, non finibus nisl pellentesque. \r\nNam ac turpis dolor. Nunc blandit, dolor id pellentesque sagittis, \r\nlibero mauris dignissim ipsum, et dignissim lorem lacus ut lacus. Morbi \r\nsagittis tincidunt finibus. Duis ut rutrum leo. Sed consectetur posuere \r\nodio, ac consectetur diam dapibus ac. Praesent elementum arcu vitae \r\ntellus lacinia, sed molestie ex accumsan. Orci varius natoque penatibus \r\net magnis dis parturient montes, nascetur ridiculus mus. Aenean ut nunc \r\nut lorem vestibulum fermentum sit amet ac metus.\r\n</p>\r\n<p>\r\nSed fringilla et nulla a maximus. Duis accumsan, sapien eu feugiat \r\nconsectetur, nibh neque elementum neque, ac sagittis sapien odio nec \r\nnisi. Morbi porta quis eros quis ornare. Quisque vel iaculis lorem. \r\nVestibulum faucibus, turpis eu hendrerit laoreet, nisl arcu imperdiet \r\nturpis, egestas pretium ante elit at mi. Nulla suscipit at felis vel \r\ncommodo. Nullam quis tempor eros. Nunc aliquet mattis nibh ut ultricies.\r\n Vestibulum enim eros, malesuada sed quam in, malesuada accumsan mi. \r\nCras vel dolor purus. Sed fringilla lectus in justo aliquam imperdiet. \r\nAenean tincidunt libero dictum dapibus rhoncus. Nulla iaculis lectus sit\r\n amet iaculis facilisis. Praesent scelerisque elit nec accumsan \r\nultricies.\r\n</p>', 'foodmain.jpg', 'https://www.youtube.com/watch?v=WLt2cnu9Hg0', NULL, '2022-03-17 00:00:00', 1000, 0, NULL, NULL, 'goal', 0, 'yes', '2022-02-24 08:47:44', '2022-02-24 08:51:35', 'running'),
	(15, 12, NULL, 'xsgfweg', 'egfseg', '1650205913download.jpg', NULL, NULL, '2022-04-19 00:00:00', -20, 0, NULL, 'dhdrhdsrh', 'date', 0, 'no', '2022-04-17 14:31:53', '2022-04-17 14:33:26', 'closed');
/*!40000 ALTER TABLE `campaigns` ENABLE KEYS */;

-- Dumping structure for table vitproject.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vitproject.category: ~4 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `slug`, `image`, `status`) VALUES
	(19, 'Clothes', 'nonprofit', 'clothemain.jpg', 1),
	(20, 'Education', 'fashion', 'educationmain.jpg', 1),
	(21, 'Foods', 'foods', 'foodmain.jpg', 1);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table vitproject.code_scripts
CREATE TABLE IF NOT EXISTS `code_scripts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `google_analytics` text NOT NULL,
  `meta_keys` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.code_scripts: ~0 rows (approximately)
/*!40000 ALTER TABLE `code_scripts` DISABLE KEYS */;
INSERT INTO `code_scripts` (`id`, `google_analytics`, `meta_keys`) VALUES
	(1, '<script>\r\n   //Google Analytics Scriptfffffffffffffffffffffffssssfffffs\r\n</script>', 'Genius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,Sea');
/*!40000 ALTER TABLE `code_scripts` ENABLE KEYS */;

-- Dumping structure for table vitproject.counter
CREATE TABLE IF NOT EXISTS `counter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('referral','browser') NOT NULL DEFAULT 'referral',
  `referral` varchar(255) DEFAULT NULL,
  `total_count` int(11) NOT NULL DEFAULT 0,
  `todays_count` int(11) NOT NULL DEFAULT 0,
  `today` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.counter: ~11 rows (approximately)
/*!40000 ALTER TABLE `counter` DISABLE KEYS */;
INSERT INTO `counter` (`id`, `type`, `referral`, `total_count`, `todays_count`, `today`) VALUES
	(1, 'referral', 'www.facebook.com', 5, 0, NULL),
	(2, 'referral', 'geniusocean.com', 2, 0, NULL),
	(3, 'browser', 'Windows 10', 775, 0, NULL),
	(4, 'browser', 'Linux', 17, 0, NULL),
	(5, 'browser', 'Unknown OS Platform', 324, 0, NULL),
	(6, 'browser', 'Windows 7', 4, 0, NULL),
	(7, 'referral', 'yandex.ru', 1, 0, NULL),
	(8, 'browser', 'Windows 8.1', 51, 0, NULL),
	(9, 'referral', 'www.google.com', 2, 0, NULL),
	(10, 'browser', 'Android', 2, 0, NULL),
	(11, 'browser', 'Mac OS X', 1, 0, NULL),
	(12, 'referral', '26.177.254.53', 1, 0, NULL);
/*!40000 ALTER TABLE `counter` ENABLE KEYS */;

-- Dumping structure for table vitproject.country
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.country: 238 rows
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
	(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
	(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
	(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
	(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
	(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
	(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
	(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
	(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
	(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
	(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
	(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
	(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
	(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
	(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
	(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
	(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
	(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
	(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
	(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
	(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
	(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
	(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
	(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
	(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
	(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
	(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
	(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
	(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
	(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
	(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
	(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
	(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
	(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
	(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
	(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
	(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
	(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
	(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
	(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
	(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
	(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
	(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
	(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
	(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
	(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
	(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
	(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
	(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
	(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
	(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
	(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
	(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
	(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
	(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
	(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
	(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
	(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
	(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
	(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
	(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
	(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
	(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
	(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
	(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
	(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
	(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
	(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
	(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
	(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
	(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
	(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
	(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
	(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
	(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
	(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
	(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
	(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
	(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
	(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
	(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
	(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
	(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
	(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
	(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
	(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
	(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
	(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
	(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
	(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
	(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
	(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
	(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
	(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
	(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
	(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
	(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
	(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
	(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
	(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
	(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
	(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
	(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
	(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
	(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
	(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
	(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
	(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
	(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
	(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
	(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
	(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
	(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
	(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
	(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
	(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
	(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
	(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
	(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
	(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
	(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
	(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
	(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
	(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
	(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
	(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
	(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
	(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
	(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
	(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
	(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
	(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
	(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
	(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
	(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
	(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
	(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
	(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
	(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
	(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
	(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
	(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
	(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
	(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
	(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
	(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
	(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
	(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
	(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
	(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
	(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
	(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
	(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
	(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
	(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
	(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
	(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
	(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
	(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
	(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
	(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
	(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
	(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
	(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
	(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
	(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
	(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
	(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
	(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
	(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
	(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
	(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
	(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
	(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
	(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
	(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
	(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
	(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
	(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
	(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
	(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
	(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
	(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
	(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
	(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
	(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
	(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
	(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
	(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
	(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
	(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
	(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
	(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
	(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
	(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
	(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
	(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
	(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
	(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
	(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
	(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
	(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
	(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
	(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
	(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
	(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
	(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
	(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
	(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
	(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
	(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
	(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
	(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
	(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
	(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
	(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
	(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
	(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
	(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
	(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
	(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
	(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
	(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
	(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
	(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
	(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
	(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
	(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
	(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
	(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
	(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
	(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
	(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
	(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
	(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
	(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
	(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
	(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
	(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;

-- Dumping structure for table vitproject.donations
CREATE TABLE IF NOT EXISTS `donations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_number` varchar(255) DEFAULT NULL,
  `campid` int(11) DEFAULT NULL,
  `campby` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `anonymous` enum('yes','no') NOT NULL DEFAULT 'no',
  `donator_name` varchar(255) DEFAULT NULL,
  `donator_email` varchar(255) DEFAULT NULL,
  `donator_phone` varchar(255) DEFAULT NULL,
  `donator_address` varchar(255) DEFAULT NULL,
  `donator_city` varchar(255) DEFAULT NULL,
  `donator_zip` varchar(255) DEFAULT NULL,
  `donation_method` varchar(255) DEFAULT NULL,
  `txn_id` varchar(255) DEFAULT NULL,
  `charge_id` varchar(255) DEFAULT NULL,
  `donate_date` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.donations: ~0 rows (approximately)
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;

-- Dumping structure for table vitproject.faqs
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vitproject.faqs: ~4 rows (approximately)
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` (`id`, `question`, `answer`, `status`) VALUES
	(1, 'First FAQ Question?', '<span style="color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">One of the most beloved song of the 90\'s is here for, brought to you in fine hogh definition by one of the biggest SRK-Kajol fan Abhishek Singh.Hope you all enjoy the full song.Please subscribe as well for more videos.As I am new, you probably wont find much videos from me now. But since the <br></span><span style="color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">One of the most beloved song of the 90\'s is here for, brought to you in fine hogh definition by one of the biggest SRK-Kajol fan Abhishek Singh.Hope you all enjoy the full song.Please subscribe as well for more videos.As I am new, you probably wont find much videos from me now. But since the <br></span><span style="color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">One of the most beloved song of the 90\'s is here for, brought to you in fine hogh definition by one of the biggest SRK-Kajol fan Abhishek Singh.Hope you all enjoy the full song.Please subscribe as well for more videos.As I am new, you probably wont find much videos from me now. But since the </span><span style="color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">One of the most beloved song of the 90\'s is here for, brought to you in fine hogh definition by one of the biggest SRK-Kajol fan Abhishek Singh.Hope you all enjoy the full song.Please subscribe as well for more videos.As I am new, you probably wont find much videos from me now. But since the <br><br></span><span style="color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">One of the most beloved song of the 90\'s is here for, brought to you in fine hogh definition by one of the biggest SRK-Kajol fan Abhishek Singh.Hope you all enjoy the full song.Please subscribe as well for more videos.As I am new, you probably wont find much videos from me now. But since the </span><br><span style="color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;"></span><span style="color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;"></span><span style="color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;"></span>', 1),
	(2, 'First FAQ Question 23333?', 'In publishing and graphic design, lorem ipsum is a filler text commonly \r\nused to demonstrate the graphic elements of a document or visual \r\npresentation.<br><br>In publishing and graphic design, lorem ipsum is a filler text commonly \r\nused to demonstrate the graphic elements of a document or visual \r\npresentation.<br><br>In publishing and graphic design, lorem ipsum is a filler text commonly \r\nused to demonstrate the graphic elements of a document or visual \r\npresentation.<br>', 1),
	(3, 'test questionssssss 4344', 'fdkjfgadbfogj vaduofgbad gousdgojadoufghdakpofgupioadhgfpineqg', 1),
	(4, 'test questionssssss', 'fdkjfgadbfogj vaduofgbad gousdgojadoufghdakpofgupioadhgfpineqg', 1);
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;

-- Dumping structure for table vitproject.gallery_images
CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `packageid` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.gallery_images: ~14 rows (approximately)
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
INSERT INTO `gallery_images` (`id`, `packageid`, `image`) VALUES
	(10, 5, 'ql1493393791single_blog-img1.png'),
	(11, 5, 'L91493393791single_blog-img2.png'),
	(12, 5, '9H1493393791single_blog-img3.png'),
	(13, 8, 'Nu14935510431-min.jpg'),
	(14, 8, '8k14935510432-min.jpg'),
	(15, 8, 'xE14935510433-min.jpg'),
	(16, 8, 'CI14935510434-min.jpg'),
	(17, 8, 'Oc14935510435-min.jpg'),
	(18, 8, 'qo14935510436-min.jpg'),
	(19, 9, 'fg14935513162-min.jpg'),
	(20, 9, 'yw14935513163-min.jpg'),
	(21, 9, 'W114935513164-min.jpg'),
	(22, 9, 'Ri14935513165-min.jpg'),
	(23, 9, 'Fu14935513166-min.jpg');
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;

-- Dumping structure for table vitproject.page_settings
CREATE TABLE IF NOT EXISTS `page_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact` text CHARACTER SET latin1 NOT NULL,
  `contact_email` text CHARACTER SET latin1 NOT NULL,
  `about` text CHARACTER SET latin1 NOT NULL,
  `faq` text CHARACTER SET latin1 NOT NULL,
  `welcome_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `welcome_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `welcome_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `welcome_link` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slider_status` int(11) DEFAULT 1,
  `split_status` int(11) DEFAULT 1,
  `welcome_status` int(11) DEFAULT 1,
  `service_status` int(11) DEFAULT 1,
  `category_status` int(11) DEFAULT 1,
  `counter_status` int(11) DEFAULT 1,
  `latest_status` int(11) DEFAULT 1,
  `featured_status` int(11) DEFAULT 1,
  `volunteer_status` int(11) DEFAULT 1,
  `portfolio_status` int(11) DEFAULT 1,
  `testimonial_status` int(11) DEFAULT 1,
  `blog_status` int(11) DEFAULT 1,
  `partners_status` int(11) DEFAULT 1,
  `home_reg_status` int(11) DEFAULT 1,
  `w_b_status` int(11) NOT NULL DEFAULT 1,
  `c_status` int(11) NOT NULL,
  `a_status` int(11) NOT NULL,
  `f_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vitproject.page_settings: ~0 rows (approximately)
/*!40000 ALTER TABLE `page_settings` DISABLE KEYS */;
INSERT INTO `page_settings` (`id`, `contact`, `contact_email`, `about`, `faq`, `welcome_title`, `welcome_image`, `welcome_description`, `welcome_link`, `slider_status`, `split_status`, `welcome_status`, `service_status`, `category_status`, `counter_status`, `latest_status`, `featured_status`, `volunteer_status`, `portfolio_status`, `testimonial_status`, `blog_status`, `partners_status`, `home_reg_status`, `w_b_status`, `c_status`, `a_status`, `f_status`) VALUES
	(1, 'Success! Thanks for contacting us, we will get back to you shortly.', 'admin@vitproject.com', '<div>\r\nThis platform is for all NGOs all around the country.This would help them overcome issues regarding lack of technical expertise and would enhance their reach around the country, which would be beneficial for both the NGOs and the people in need. \r\n<br>\r\nOur user authentication system may as well help the organization to verify the legit user and also help them establish their trust in the market.\r\n</div><div>\r\nWe are aiming to build a web app that provides a platform for all NGOs all around the country.\r\n<br>\r\nThis would help them overcome issues regarding lack of technical expertise and would enhance their reach around the country, which would be beneficial for both the NGOs and the people in need. \r\n<br>\r\nOur user authentication system may as well help the organization to verify the legit user and also help them establish their trust in the market.\r\n</div>', '<div>\r\n<h2>What is Lorem Ipsum, Really?</h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and\r\n typesetting industry. Lorem Ipsum has been the industry\'s standard \r\ndummy text ever since the 1500s, when an unknown printer took a galley \r\nof type and scrambled it to make a type specimen book. It has survived \r\nnot only five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n</div><div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the\r\n readable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packages and web \r\npage editors now use Lorem Ipsum as their default model text, and a \r\nsearch for \'lorem ipsum\' will uncover many web sites still in their \r\ninfancy. Various versions have evolved over the years, sometimes by \r\naccident, sometimes on purpose (injected humour and the like).</p>\r\n</div><br><div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, "Lorem ipsum dolor sit amet..", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom "de Finibus Bonorum et Malorum" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p>\r\n</div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but \r\nthe majority have suffered alteration in some form, by injected humour, \r\nor randomised words which don\'t look even slightly believable. If you \r\nare going to use a passage of Lorem Ipsum, you need to be sure there \r\nisn\'t anything embarrassing hidden in the middle of text. All the Lorem \r\nIpsum generators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc.</p>', 'Welcome to CharitAble Please Raise your Helping Hand', 'mainpage.jpeg', 'This platform is for all NGOs all around the country.This would help them overcome issues regarding lack of technical expertise and would enhance their reach around the country, which would be beneficial for both the NGOs and the people in need. Our user authentication system may as well help the organization to verify the legit user and also help them establish their trust in the market.', 'http://localhost/Charity/campaigns', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0);
/*!40000 ALTER TABLE `page_settings` ENABLE KEYS */;

-- Dumping structure for table vitproject.portfolios
CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.portfolios: ~0 rows (approximately)
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;

-- Dumping structure for table vitproject.section_titles
CREATE TABLE IF NOT EXISTS `section_titles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `service_text` text CHARACTER SET latin1 DEFAULT NULL,
  `category_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `newcamp_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `newcamp_text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pricing_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `pricing_text` text CHARACTER SET latin1 DEFAULT NULL,
  `volunteer_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `volunteer_text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `portfolio_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `portfolio_text` text CHARACTER SET latin1 DEFAULT NULL,
  `testimonial_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `testimonial_text` text CHARACTER SET latin1 DEFAULT NULL,
  `blog_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog_text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vitproject.section_titles: ~0 rows (approximately)
/*!40000 ALTER TABLE `section_titles` DISABLE KEYS */;
INSERT INTO `section_titles` (`id`, `service_title`, `service_text`, `category_title`, `category_text`, `newcamp_title`, `newcamp_text`, `pricing_title`, `pricing_text`, `volunteer_title`, `volunteer_text`, `portfolio_title`, `portfolio_text`, `testimonial_title`, `testimonial_text`, `blog_title`, `blog_text`) VALUES
	(1, 'Our Services', 'Below are some of the services we offer', 'Campaign Categories', '', 'Latest Campaign', 'Charities are great at marketing. They often put on inspiring and interesting campaigns to raise awareness and spread their messages far and wide. Here are three of the best charity marketing campaigns.', 'Featured Campaign', 'We\'d like to assist you in planning your next food drive or fundraiser! Our Featured Campaigns are simple to put together and will motivate your community to get involved. They\'re also a lot of fun to play with! To get started, select a campaign from the list below.', 'Our Volunteers', 'We\'ve been boasting about our verifed user base right? Go on, we have listed our top volunteers below', '', '', 'Customers reviews is the most  important  aspect to build trust for the first move eh? We are transparent for who we are! Please share your reviews so that even other could enjoy these services.', 'Coming Soon..', 'Latest Blogs', 'Make sure to look at our blogs from various donations in the past ');
/*!40000 ALTER TABLE `section_titles` ENABLE KEYS */;

-- Dumping structure for table vitproject.service_section
CREATE TABLE IF NOT EXISTS `service_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `text` text CHARACTER SET latin1 NOT NULL,
  `icon` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vitproject.service_section: ~4 rows (approximately)
/*!40000 ALTER TABLE `service_section` DISABLE KEYS */;
INSERT INTO `service_section` (`id`, `title`, `text`, `icon`, `status`) VALUES
	(2, 'TOP VERIFIED NGOs', 'We only allow NGO\'s that are genuine and verified personally by our professional team members. This helps to maintain security on the Charitable platform by avoiding fake/fraud NGO\'s to participate in the Charity processes.', 'AgVUntitled-1.jpg', 1),
	(3, 'Personally Verified UserBase', 'User Identity Verification is a security measure that verifies that all requests made from within your app or Web Chat widget are coming from authentic end users. This ensures that 3rd parties cannot perform malicious actions, such as filing Issues on behalf of your users, or updating their personal information.', 'dIs2.jpg', 1),
	(4, 'No 3rd Party Involved', 'This means that whatever you donate goes directly from the NGOs to the needy ones. SO there\'s no doubt of counterfeiting.', 'Fz53.jpg', 1);
/*!40000 ALTER TABLE `service_section` ENABLE KEYS */;

-- Dumping structure for table vitproject.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `currency_sign` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_business` varchar(255) NOT NULL,
  `stripe_key` varchar(255) DEFAULT NULL,
  `stripe_secret` varchar(255) DEFAULT NULL,
  `success_msg` text DEFAULT NULL,
  `withdraw_charge` int(11) NOT NULL DEFAULT 0,
  `paypal_donate` int(11) NOT NULL DEFAULT 1,
  `stripe_donate` int(11) NOT NULL DEFAULT 1,
  `anonym_donation` int(11) NOT NULL DEFAULT 1,
  `theme_color` varchar(255) DEFAULT NULL,
  `css_file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.settings: ~0 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `logo`, `favicon`, `title`, `url`, `about`, `address`, `phone`, `fax`, `email`, `footer`, `background`, `currency_sign`, `currency_code`, `paypal_business`, `stripe_key`, `stripe_secret`, `success_msg`, `withdraw_charge`, `paypal_donate`, `stripe_donate`, `anonym_donation`, `theme_color`, `css_file`) VALUES
	(1, 'logo1.png', 'favicon.ico', 'CharitAble', 'NIL', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae&nbsp;', '124/6 Street, Country', '00 000 000 000', '00 000 000 000', 'admin@vitproject.com', 'Copyright 2022 @ CharitAble', 'mainpage.jpeg', '₹', 'INR', 'admin@vitproject.com', 'pk_test_bD5Si0msHNV75sd5R71jSJFb', 'sk_test_r7zxASOuYYCiuT3svkUtuh6W', '<h1 class="text-center" style="color: green">Payment Success.<br> Thank You !!</h1>\n                        <h2>Your Donation Received Successfully.</h2>', 2, 1, 1, 0, '#3174C2', 'genius1.css');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table vitproject.site_language
CREATE TABLE IF NOT EXISTS `site_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `home` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about_us` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_us` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_in` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sign_up` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `my_account` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgot_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `campaigns` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `running_campaigns` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `completed_campaigns` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donations` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `funded` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `campaign_details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `days_left` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dates` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `withdraw` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `settings` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transactions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscribe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_us_today` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `submit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dashboard` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_profile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `change_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latest_blogs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recent_posts` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_links` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view_details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_documentation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `share_in_social` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donate_anonymous` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enter_details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vitproject.site_language: ~0 rows (approximately)
/*!40000 ALTER TABLE `site_language` DISABLE KEYS */;
INSERT INTO `site_language` (`id`, `home`, `about_us`, `contact_us`, `faq`, `log_in`, `sign_up`, `my_account`, `forgot_password`, `campaigns`, `running_campaigns`, `completed_campaigns`, `donations`, `funded`, `campaign_details`, `donate`, `goal`, `days_left`, `created_by`, `dates`, `action`, `amount`, `withdraw`, `settings`, `transactions`, `total`, `subscription`, `subscribe`, `address`, `contact_us_today`, `street_address`, `phone`, `email`, `fax`, `submit`, `name`, `dashboard`, `update_profile`, `change_password`, `latest_blogs`, `recent_posts`, `footer_links`, `view_details`, `blog`, `api_documentation`, `share_in_social`, `donate_anonymous`, `enter_details`, `logout`) VALUES
	(1, 'Home', 'About Us', 'Contact Us', 'FAQ', 'Log In', 'Sign Up', 'My Account', 'Forgot Password', 'Campaigns', 'Running Campaigns', 'Completed Campaigns', 'Donations', 'Funded', 'Campaign Details', 'Donate', 'Goal', 'Days Left', 'Created By', 'Date', 'Action', 'Amount', 'Withdraw', 'Settings', 'Transactions', 'Total', 'SUBSCRIBE TO OUR NEWSLETTER', 'Subscribe', 'Address', 'Contact Us Today!', 'Contact Info', 'Phone', 'Email', 'Fax', 'Submit', 'Name', 'Dashboard', 'Update Profile', 'Change Password', 'Latest Blogs', 'Recent Posts', 'Footer Links', 'Read More', 'Blog', 'API Documantation', 'Share', 'Donate Anonymous', 'Enter Details', 'Logout');
/*!40000 ALTER TABLE `site_language` ENABLE KEYS */;

-- Dumping structure for table vitproject.sliders
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `text` text CHARACTER SET latin1 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `text_position` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vitproject.sliders: ~1 rows (approximately)
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` (`id`, `title`, `text`, `image`, `text_position`, `status`) VALUES
	(3, 'CharitAble', '"Charity Abled For All"', 'slider1.jpg', 'slide_style_center', 1);
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;

-- Dumping structure for table vitproject.social_links
CREATE TABLE IF NOT EXISTS `social_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) NOT NULL,
  `twiter` varchar(255) NOT NULL,
  `g_plus` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `f_status` enum('enable','disable') NOT NULL DEFAULT 'enable',
  `t_status` enum('enable','disable') NOT NULL DEFAULT 'enable',
  `g_status` enum('enable','disable') NOT NULL DEFAULT 'enable',
  `link_status` enum('enable','disable') NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.social_links: ~0 rows (approximately)
/*!40000 ALTER TABLE `social_links` DISABLE KEYS */;
INSERT INTO `social_links` (`id`, `facebook`, `twiter`, `g_plus`, `linkedin`, `f_status`, `t_status`, `g_status`, `link_status`) VALUES
	(1, 'http://facebook.com', 'http://twitter.com/', 'http://google.com/', 'http://linkedin.com/', 'enable', 'enable', 'disable', 'enable');
/*!40000 ALTER TABLE `social_links` ENABLE KEYS */;

-- Dumping structure for table vitproject.split_section
CREATE TABLE IF NOT EXISTS `split_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.split_section: ~1 rows (approximately)
/*!40000 ALTER TABLE `split_section` DISABLE KEYS */;
/*!40000 ALTER TABLE `split_section` ENABLE KEYS */;

-- Dumping structure for table vitproject.subscription
CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.subscription: 0 rows
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;

-- Dumping structure for table vitproject.testimonials
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review` text CHARACTER SET latin1 NOT NULL,
  `client` varchar(255) CHARACTER SET latin1 NOT NULL,
  `designation` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vitproject.testimonials: ~0 rows (approximately)
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;

-- Dumping structure for table vitproject.user_profiles
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `verified` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table vitproject.user_profiles: 2 rows
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` (`id`, `name`, `gender`, `phone`, `fax`, `email`, `password`, `country`, `address`, `city`, `zip`, `created_at`, `updated_at`, `remember_token`, `status`, `verified`) VALUES
	(13, 'Tester', NULL, '1234567890', NULL, 'some@some.com', '$2y$10$w.L1D8Oy2KvioobJSWBBo.zFf2fPkEYuGoCjXGWMsOLZB/Y176hqC', NULL, NULL, NULL, NULL, '2022-04-17 14:41:32', '2022-04-17 14:41:32', NULL, 1, 0),
	(12, 'UTKARSH VARSHNEY', NULL, '+917701895752', NULL, 'utkarshrock2000@gmail.com', '$2y$10$uSduS/L3gjBMYhzVDPWmXODkpt3nT3Aizjh2L2NZ3ycchbWYweWmC', NULL, NULL, NULL, NULL, '2022-04-17 13:21:24', '2022-04-17 13:21:24', NULL, 1, 0);
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;

-- Dumping structure for table vitproject.volunteers
CREATE TABLE IF NOT EXISTS `volunteers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_plus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','former') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table vitproject.volunteers: ~4 rows (approximately)
/*!40000 ALTER TABLE `volunteers` DISABLE KEYS */;
INSERT INTO `volunteers` (`id`, `name`, `designation`, `photo`, `facebook`, `google_plus`, `twitter`, `linkedin`, `status`) VALUES
	(2, 'Margik Bhatt', 'Owner', 'placeholder.jpg', 'https://www.facebook.com', 'https://www.google.com', 'https://www.twitter.com', 'https://www.linkedin.com', 'active'),
	(3, 'Hardik Matho', 'Manager', 'placeholder.jpg', 'https://www.facebook.com', 'https://www.google.com', 'https://www.twitter.com', 'https://www.linkedin.com', 'active'),
	(4, 'Utkarsh', 'Manager', 'placeholder.jpg', 'https://www.facebook.com', 'https://www.google.com', 'https://www.twitter.com', 'https://www.linkedin.com', 'active'),
	(5, 'Ashwin Parasuram', 'Web Developer', 'placeholder.jpg', 'https://www.facebook.com', 'https://www.google.com', 'https://www.twitter.com', 'https://www.linkedin.com', 'active');
/*!40000 ALTER TABLE `volunteers` ENABLE KEYS */;

-- Dumping structure for table vitproject.withdraws
CREATE TABLE IF NOT EXISTS `withdraws` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campid` int(11) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `acc_email` varchar(255) DEFAULT NULL,
  `acc_phone` varchar(255) DEFAULT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `acc_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `swift` varchar(255) DEFAULT NULL,
  `reference` text DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `fee` float DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('pending','completed','rejected') NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table vitproject.withdraws: ~1 rows (approximately)
/*!40000 ALTER TABLE `withdraws` DISABLE KEYS */;
/*!40000 ALTER TABLE `withdraws` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
