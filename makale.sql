-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Oca 2024, 12:43:26
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `makale`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_tittle` text NOT NULL,
  `article_photo` blob NOT NULL,
  `article_file` varchar(200) NOT NULL,
  `article_download` int(11) NOT NULL,
  `article_writing` varchar(50) NOT NULL,
  `article_add_time` date NOT NULL,
  `article_description` text NOT NULL,
  `article_information` varchar(100) NOT NULL,
  `article_category_id` int(11) NOT NULL,
  `article_user_id` bigint(11) NOT NULL,
  `article_status` bigint(11) NOT NULL,
  `article_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `articles`
--

INSERT INTO `articles` (`article_id`, `article_tittle`, `article_photo`, `article_file`, `article_download`, `article_writing`, `article_add_time`, `article_description`, `article_information`, `article_category_id`, `article_user_id`, `article_status`, `article_price`) VALUES
(2, 'İLHAMİ', 0x65316634323266323363666261303863376364316534616235623137353532352e706e67, 'makaleler.pdf', 0, 'İLHAMİ', '0000-00-00', 'İLHAMİ', 'İLHAMİ', 1, 1, 1, 40),
(3, 'mert', 0x616161612e706e67, 'hafta1.1.pdf', 0, 'mert', '0000-00-00', 'mert', 'mert', 1, 1, 1, 70),
(4, 'a', 0x706e672d7472616e73706172656e742d66656e657262616863652d732d6b2d66656e657262616863652d6d656e2d732d6261736b657462616c6c2d73706f7274732d6173736f63696174696f6e2d666f6f7462616c6c2d6c6f676f2d666f6f7462616c6c2e706e67, 'jung horney.pdf', 0, 'a', '0000-00-00', 'a', 'a', 1, 1, 0, 20),
(5, 'a', 0x706e672d7472616e73706172656e742d66656e657262616863652d732d6b2d66656e657262616863652d6d656e2d732d6261736b657462616c6c2d73706f7274732d6173736f63696174696f6e2d666f6f7462616c6c2d6c6f676f2d666f6f7462616c6c2e706e67, 'jung horney.pdf', 0, 'a', '0000-00-00', 'a', 'a', 2, 1, 0, 2),
(6, 'Edebi Makale', 0x65646562692d6365766972692d332d31303234783634302e706e67, 'jung horney.pdf', 0, 'İlhami Yılmaz', '0000-00-00', 'CARL GUSTAV JUNG\r\nAnalitik Psikoloji: Temel Kavramlar ve İlkeler\r\nJung zihinden ve zihinsel etkinliklerden söz ederken bunların yerine hem bilinç hem de\r\nbilinçdışını kapsayan ruh (psişe) ve ruhsal (psişik) terimlerini kullanmıştır.\r\nPsişik Enerji ve Kompleksler\r\nJung\'un ruh kavramı dinamik, sürekli hareket halinde olan ve aynı za\r\nmanda kendi kendini düzenleyen bir sistemdir ve bu sistemin enerji kaynağı\r\nda libidodur . Jung\'a göre libido doğal enerjidir ve öncelikli görevi kişiliğin işleyişini\r\nsağlamaktır. \"Yaşam enerjisi\" olarak da adlandırdığı psişik enerji için libido kavramını\r\nkullanmayı sürdürse de, klasik psikanalitik görüşten farklı olarak libidonun yalnızca cinsel\r\niçerikli olmadığını belirtmiştir.\r\nJung’un psişik enerjiye ilişkin bir diğer önemli kavramı ise değerdir. Değer belli bir psişik\r\nöğeye aktarılan enerjinin miktarıdır. Jung’a göre bir olay ya da davranışa bağlanan değer\r\nne denli fazla ise o olay ya da davranış o denli istenir olmaktadır.\r\nHer ne kadar bir şeye yöneltilen psişik enerjinin kesin değerini belirleyemesek de, bu\r\ndeğeri başka şeylere yöneltilen değerlerle kıyaslayarak ölçebiliriz.\r\nBu şekliyle Jung\'un değer kavramı Freud\'un kateksis kavramına benzerlik göstermektedir.\r\nJung’un belirttiği bazı içgüdüler; beslenme(açlık ve susuzluk), cinsellik, güç, hareketlilik\r\n(değişim ilgisi, seyahat arzusu ve oyun), bütünleşme ya da kendi olma (bireyleşme) ve\r\nyaratıcılıktır.Jung\'un Freud\'dan ayrıldığı noktalardan birisi de, insanların doğuştan getir\r\ndiği bir dini inanç gereksinimleri olduğu ve tanrı fikrinin psikolojik işlevsellik\r\niçin kesinlikle gerekli olduğunu düşünmesidir.', 'Edebi  Makale', 4, 1, 1, 100),
(7, 'Edebi Makale', 0x65646562692d6365766972692d332d31303234783634302e706e67, 'Bilgisayar Muhendsiligi.pdf', 1, 'İlhami Yılmaz', '0000-00-00', '<?php\r\n\r\n$vt_sunucu=\"localhost\";\r\n$vt_kullanici=\"root\";\r\n$vt_sifre=\"\";\r\n$vt_adi=\"yerebatansarnic\";\r\n\r\n$baglan=mysqli_connect($vt_sunucu, $vt_kullanici, $vt_sifre, $vt_adi);\r\n\r\nif(!$baglan){\r\n    die(\"Veritabanı bağlantı işlemi başarısız\".mysqli_connect_errır());\r\n}\r\n\r\n\r\n?>', 'Edebi  Makale', 2, 1, 1, 0),
(8, 'Fenerbahçe', 0x706e672d7472616e73706172656e742d66656e657262616863652d732d6b2d66656e657262616863652d6d656e2d732d6261736b657462616c6c2d73706f7274732d6173736f63696174696f6e2d666f6f7462616c6c2d6c6f676f2d666f6f7462616c6c2e706e67, '224410124_İlhami_Yılmaz.pdf', 2, 'Ali Koç', '0000-00-00', 'Her zaman her yerde en büyük FENERBAHÇE', 'Şampiyon', 3, 1, 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basket`
--

CREATE TABLE `basket` (
  `article_id` int(11) NOT NULL,
  `article_user_id` int(11) NOT NULL,
  `article_title` varchar(300) NOT NULL,
  `article_price` int(11) NOT NULL,
  `article_file` int(11) NOT NULL,
  `buy_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_tittle` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`category_id`, `category_tittle`) VALUES
(1, 'Bilim'),
(2, 'Teknoloji'),
(3, 'Spor'),
(4, 'Edebi'),
(5, 'Gazete');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_name` varchar(100) NOT NULL,
  `message_surname` varchar(100) NOT NULL,
  `message_mail` varchar(100) NOT NULL,
  `message_message` varchar(150) NOT NULL,
  `message_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`message_id`, `message_name`, `message_surname`, `message_mail`, `message_message`, `message_status`) VALUES
(0, 'wqr', 'sdaasdas', 'asdasfasf', 'asdasda', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_admin`
--

CREATE TABLE `site_admin` (
  `site_admin_id` int(11) NOT NULL,
  `site_admin_username` varchar(100) NOT NULL,
  `site_admin_password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `site_admin`
--

INSERT INTO `site_admin` (`site_admin_id`, `site_admin_username`, `site_admin_password`) VALUES
(1, 'admin', 12345);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `user_job` varchar(50) NOT NULL,
  `user_jobtitle` varchar(50) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_surname`, `user_job`, `user_jobtitle`, `user_mail`, `user_phone`, `user_username`, `user_password`, `user_status`) VALUES
(1, 'ilhami', 'yılmaz', 'öğrenci', 'mühendis', 'ilo@mail.com', 531627896, 'ilhamii', '1234', '1'),
(2, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd@gmail.com', 1212121, 'asdasd', 'asdasd', '1'),
(3, 'MURAT', 'MERİÇELLİ', 'ÖĞRETİM GÖREVLİSİ', 'PROF', 'canimhocam@gmail.com', 1212121, 'Murat', '1907', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `wallet_user_id` int(11) NOT NULL,
  `wallet_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `wallet_user_id`, `wallet_quantity`) VALUES
(1, 1, 99470);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `site_admin`
--
ALTER TABLE `site_admin`
  ADD PRIMARY KEY (`site_admin_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `site_admin`
--
ALTER TABLE `site_admin`
  MODIFY `site_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
