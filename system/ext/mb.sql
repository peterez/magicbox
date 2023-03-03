-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Şub 2023, 16:42:45
-- Sunucu sürümü: 5.7.17
-- PHP Sürümü: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `wordpress`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mb_affiliate_code`
--

CREATE TABLE `mb_affiliate_code` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `name` varchar(300) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `identity` varchar(500) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `rate` int(11) DEFAULT '15',
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mb_affiliate_process`
--

CREATE TABLE `mb_affiliate_process` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `order_id` int(11) DEFAULT '0',
  `type` varchar(20) DEFAULT NULL,
  `product_id` int(11) DEFAULT '0',
  `code` varchar(15) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int(11) DEFAULT '1',
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,0) DEFAULT '0',
  `is_paid` tinyint(1) DEFAULT '0',
  `paid_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `rate` int(11) DEFAULT '15',
  `earn` decimal(10,0) DEFAULT '0',
  `status` tinyint(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mb_contact`
--

CREATE TABLE `mb_contact` (
  `id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT '0',
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `data` longtext,
  `ip` varchar(255) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '3'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mb_form_builder`
--

CREATE TABLE `mb_form_builder` (
  `id` int(11) NOT NULL,
  `mail` varchar(3000) DEFAULT NULL,
  `data` longtext,
  `label_data` longtext,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mb_login_log`
--

CREATE TABLE `mb_login_log` (
  `id` int(11) NOT NULL,
  `username` varchar(1200) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `browser` varchar(750) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mb_mail_campaign`
--

CREATE TABLE `mb_mail_campaign` (
  `id` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `subject` varchar(400) DEFAULT NULL,
  `body` longtext,
  `role` varchar(1000) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_process_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total` int(11) DEFAULT NULL,
  `sended` int(11) DEFAULT NULL,
  `error` varchar(255) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mb_mail_campaign_report`
--

CREATE TABLE `mb_mail_campaign_report` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) DEFAULT '0',
  `mail` varchar(360) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `mb_affiliate_code`
--
ALTER TABLE `mb_affiliate_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `code` (`code`),
  ADD KEY `status` (`status`),
  ADD KEY `date` (`date`);

--
-- Tablo için indeksler `mb_affiliate_process`
--
ALTER TABLE `mb_affiliate_process`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `type` (`type`),
  ADD KEY `code` (`code`),
  ADD KEY `status` (`status`),
  ADD KEY `is_paid` (`is_paid`);

--
-- Tablo için indeksler `mb_contact`
--
ALTER TABLE `mb_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`),
  ADD KEY `status` (`status`);

--
-- Tablo için indeksler `mb_form_builder`
--
ALTER TABLE `mb_form_builder`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mb_login_log`
--
ALTER TABLE `mb_login_log`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mb_mail_campaign`
--
ALTER TABLE `mb_mail_campaign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `status` (`status`);

--
-- Tablo için indeksler `mb_mail_campaign_report`
--
ALTER TABLE `mb_mail_campaign_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `campaign_id` (`campaign_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `mb_affiliate_code`
--
ALTER TABLE `mb_affiliate_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `mb_affiliate_process`
--
ALTER TABLE `mb_affiliate_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `mb_contact`
--
ALTER TABLE `mb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `mb_form_builder`
--
ALTER TABLE `mb_form_builder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `mb_login_log`
--
ALTER TABLE `mb_login_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `mb_mail_campaign`
--
ALTER TABLE `mb_mail_campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `mb_mail_campaign_report`
--
ALTER TABLE `mb_mail_campaign_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
