-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 May 2021, 01:27:43
-- Sunucu sürümü: 10.4.6-MariaDB
-- PHP Sürümü: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `makale_duragi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_photo` varchar(255) NOT NULL,
  `article_file` varchar(255) NOT NULL,
  `article_download` int(11) NOT NULL,
  `article_writing` varchar(255) NOT NULL,
  `article_add_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `article_description` text NOT NULL,
  `article_information` text NOT NULL,
  `article_category_id` int(11) NOT NULL,
  `article_user_id` int(11) NOT NULL,
  `article_status` int(11) DEFAULT 0,
  `article_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `article_photo`, `article_file`, `article_download`, `article_writing`, `article_add_time`, `article_description`, `article_information`, `article_category_id`, `article_user_id`, `article_status`, `article_price`) VALUES
(14, 'Statistical Convergence', 'Statistical Convergence of Double Sequences on Intuitionistic Fuzzy Normed Spaces.png', 'Manuscript(gönderilen) St.Double IFN.pdf', 11, 'Kamil Demirci', '2021-03-30 06:29:25', 'The concept of statistical convergence was presented by Steinhaus(1951). This concept was extended to the double sequences by Mursaleenand Edely (2003). In this paper, we dene and study statistical analogueof convergence and Cauchy for double sequences on intuitionistic fuzzynormed spaces. Then we give a useful characterization for statisticallyconvergent double sequences. Furthermore, we display an example suchthat our method of convergence is stronger than the usual convergencefor double sequences on intuitionistic fuzzy normed spaces.', 'The concept of statistical convergence was presented by Steinhaus(1951). This concept was extended to the double sequences by Mursaleenand Edely (2003).', 1, 4, 1, '45'),
(15, 'Korovkin-Type Approximation Theorem ', 'Statistical Convergence of Double Sequences on Intuitionistic Fuzzy Normed Spaces (1).png', '(19) Korovkin Type Approximation Theorem For Double Sequences of Positive Linear Operators Via Statistical A-summability.pdf', 14, 'Sevda Karaku', '2021-03-30 06:33:48', 'Approximation theory has important applications in theory of polynomialapproximation, in various areas of functional analysis, in numerical solutionsof differential and integral equations, etc. Korovkin type approximation theoremshave been studied via statistical convergence and equi-statistical convergence. Also, it was proved that those results are stronger than the classicalKorovkin theorem. Our primary interest in the present paper is to obtain a', 'Abstract. In this paper, using the concept of statistical A-summability which is stronger than the A-statistical convergence we provide a Korovkin- type approximation theorem on the space of all continuous real valued functions defined on any compact subset of the real two-dimensional space. We also study the rates of statistical A-summability of positive linear operators.', 2, 4, 1, '0'),
(16, 'TÜRKÇE EĞİTİMİNE YÖNELİK BİR İÇERİK ANALİZİ', 'Statistical Convergence of Double Sequences on Intuitionistic Fuzzy Normed Spaces (2).png', 'ZETANALZMAKALE.pdf', 72, 'Elif AKTAŞ', '2021-03-30 06:41:47', 'Eğitim araştırması, eğitim politika ve uygulamalarıyla ilgili, bilimsel yöntemlere başvurularak yapılan araştırmalardır. Ülkelerin eğitim sistemlerindeki gelişmeler, eğitim araştırmalarının varlığı ve niteliğiyle yakından ilişkilidir. Eğitimdeki bilimsel araştırmalar, genel anlamda eğitim problemlerinin çözülmesi, öğretim materyallerinin ve metotlarının geliştirilmesi, öğrenenlerin zihinsel çalışma süreci gibi konularda oldukça yararlı bilimsel bilgiler üretmeyi hedefler (Ekiz, 2013: 18). Eğitim araştırması temelde bir problem çözme, bir dizi hipotezi test etme ya da bir dizi soruya cevap bulmayı amaçlar (Balcı, 2007: 17). Bunun yanı sıra eğitim araştırmaları, geçmişte nasıl bir insan yetiştirdiğimizi belirleyen eğitim politikalarını sorgular, eleştirel bir yaklaşımla aksayan yönleri betimler ve gelecekte nasıl bir insan yetiştireceğimizin cevabını bilimsel yollarla kestirmeye çalışır (Kıncal, 2013: 262). Eğitimle ilgili nesnel, geçerli ve güvenilir bilgi üretmeyi hedefleyen alan eğitimi araştırmaları son yıllarda giderek artan bir önem kazanmıştır. Günümüzde özellikle Türkçenin ana dili ve yabancı dil olarak öğretimine yönelik çok sayıda bilimsel araştırma yapılmaktadır. Bu araştırmaların neler olduğunun betimlenmesine yönelik her çalışma, gelecekte yapılacak çalışmalara ışık tutacaktır.', 'Türkiye’de SSCI ve Ulakbim sosyal bilimler veri tabanlarında taranan dergilerdeki Türkçenin eğitimi ve öğretimi alanında 2004-2013 yılları arasında yayımlanan 724 adet araştırma makalesidir.', 3, 4, 1, '0'),
(18, 'KİTAP İNCELEME REHBERİ ', 'Statistical Convergence of Double Sequences on Intuitionistic Fuzzy Normed Spaces (4).png', 'AKADEMİK_KİTAP_İNCELEMESİ_HAZIRLAMAREHBERİ.pdf', 15, 'Yunus Alhan,', '2021-03-30 06:52:04', 'Akademik bir kitap incelemesi, bir kaynağınbetimlenmesi, analiz edilmesi ve değerlendirilmesidir. Kitap inceleme faaliyetinin odak noktasında eleştiri olduğu için, inceleme bir özettenziyade eserin zayıf ve güçlü yönlerini ortayakoyan bir çalışmadır. Fakat bu çalışmayı yaparken yalnızca eleştiri yapmak yerine, eleştiriyitemellendirecek ve destekleyecek kanıtların dasunulması gerekir.Özet olarak bir inceleme aşağıdaki sorularıncevabını vermeye çalışır: ', 'Bu Rehber, Anadolu Üniversitesi Sosyal Bilimler Enstitüsü Kamu Hukuku Tezli Yüksek Lisans Programı 2013-2014 akademik yılında, Hukukta Yöntem Sorunları dersi kapsamında hazırlanmış, yazarlarından Hukuk Kuramı dergisinde yayımlanmak üzere izin alınmıştır.', 2, 4, 1, '15'),
(21, 'Türkiyede\'ki Makale Değerlendirmeleri', 'ekle1.png', 'ekle1.pdf', 0, 'Çiğdem KILIÇ', '2021-03-31 07:02:12', 'The study has been structured by using the qualitative research methods and techniques. The method of the research is document review, which is used in qualitative studies. The data obtained has been analyzed by using the descriptive analysis technique, which is a qualitative analysis technique. Since the evaluation of the articles published in the field of adult education in Turkey in terms of cer-tain criteria was aimed, the meta-evaluation method was employed in the present study. The articles were evaluated in terms of the defined criteria and by means of document analysis. The population of the study comprises the 156 articles, in the forms of research about the adult education and relevant subjects, review and compilation, which had been published in peer-reviewed academic journals in Turkey. The sample of the study comprises 49 research and review articles pre-pared in the qualitative, quantitative and mixed types. In the selection of the sam-ple of the study, the purposive sampling was employed. In order to reach the arti-cles on adult education published in academic journals in Turkey, the articles pub-lished in peer reviewed academic journals under the main heading of “adult educa-tion” were searched by using the Google Academic and ULAKBİM (Turkish Na-tional Academic Network and Information Center) databases – without any time limitation; and all found articles which were considered to be related to the subject headings concerning the adult education were included in the scope of the study.', 'This article aims the meta-evaluation of the articles published in Turkey with regards to the field of “adult education” in terms of the essential elements required to be present in a scientific study. In line with this aim, 49 articles written in the form of research-investigation have been evaluated under the headings of ‘introduction’, ‘method’, ‘findings’, ‘conclusion’ and ‘suggestions’.', 3, 18, 1, '0'),
(22, 'Güvenirlik Çalışmalarının', 'ekle2.png', 'ekle2.pdf', 6, 'Ekim Pekünlü', '2021-03-31 07:03:59', 'ICC değerlerinin yanlış yorumlanmasını önlemek amacıyla,\r\nölçüm değerlerindeki değişebilirlikten etkilenmeyen\r\n“değişim katsayısı (CV)” ve “standart ölçüm hatası (SEM)”\r\ngibi mutlak güvenirlik yöntemlerinin (1-2) de ICC’yle birlikte\r\nkullanılması büyük önem taşımaktadır. Elde edilen ölçüm\r\ndeğerlerindeki değişebilirlik düzeyi ve/veya ölçüm değerleriyle\r\norantılı olan olası bir değişebilirliğin varlığı (heteroscedasticity;\r\ndeğişken varyans) göz önünde bulundurularak\r\nuygun istatistiksel yöntem tercih edilmelidir (1).\r\nGenellikle farklı ölçüm yöntemlerinin güvenirliğinin\r\nincelenmesinde kullanılan, araştırmalardaki sistematik ve\r\nrasgele hataları birbirinden ayırt edebilen ve uygulaması\r\nkolay olan Bland-Altman yönteminin (4) bu tür güvenilirlik\r\nçalışmasında kullanılmasıyla sonuçların hem görsel hem de\r\nsayısal açıdan daha ayrıntılı bir şekilde incelenmesi mümkün\r\nolacaktır.\r\nBu araştırma verilerinin yukarıda belirtilen istatistiksel\r\nyöntemler kullanılarak tekrar değerlendirilmesi ve elde edilecek\r\ngüvenirlik sonuçlarının yayınlanan sonuçlarla tutarlılık\r\ngösterip göstermeyeceğinin belirlenmesi önemli bir\r\nkonuyu oluşturmaktadır. Hatalı yorumlanmış olabilecek bu\r\nsonuçlar düzeltilmediği takdirde (eğer gerçekten de hatalı\r\nbir yorumlama bulunuyorsa) literatüre mevcut araştırma\r\nkonusuyla ilgili hatalı bilgilerin aktarılmış olacağı göz önünde\r\nbulundurulmalıdır.\r\nÇalışmada dikkati çeken bir diğer nokta da ölçümlerin\r\ngünün hangi saat diliminde gerçekleştirildiğinin belirtilmemiş\r\nolmasıdır. Katılımcıların olası olarak farklı zaman dilimlerinde\r\ntestlere katılmış olması, izometrik kas kuvvetinin sirkadiyen\r\nritmine (5) bağlı olarak test sonuçları üzerinde yanlılık\r\nyaratmış olabilir. Bu tür bir durum söz konusu ise, bu\r\ndurumun çalışmanın sınırlılığı olarak belirtilmesi makalenin\r\nkalitesini arttıracaktır.', 'Sınıf içi korelasyon katsayısı (ICC), güvenirlik çalışmalarında sıklıkla kullanılan bir yöntemdir. Ancak güvenirlik çalışmalarında sonuçların sadece ICC’ye göre yorumlanması çeşitli sakıncalar içermektedir. ICC, bağıl güvenirliği ölçen bir yöntem olduğundan sistematik hata ve rasgele hata arasında ayrım yapamaz (1-2). ICC ayrıca örneklem büyüklüğünden ve katılımcıların ölçüm değerleri arasındaki değişebilirlikten (variability) etkilenir', 4, 18, 1, '35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basket`
--

CREATE TABLE `basket` (
  `article_id` int(11) NOT NULL,
  `article_user_id` int(11) NOT NULL,
  `article_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `article_price` varchar(200) CHARACTER SET utf8 NOT NULL,
  `article_file` varchar(255) NOT NULL,
  `buy_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `basket`
--

INSERT INTO `basket` (`article_id`, `article_user_id`, `article_title`, `article_price`, `article_file`, `buy_status`) VALUES
(57, 4, 'Statistical Convergence', '85', 'Manuscript(gönderilen) St.Double IFN.pdf', 1),
(58, 4, 'TÜRKÇE EĞİTİMİNE YÖNELİK BİR İÇERİK ANALİZİ', '2', 'ZETANALZMAKALE.pdf', 1),
(59, 4, 'adgfhdgfadgfhgdsga', '50', 'Manuscript(gönderilen) St.Double IFN (2).pdf', 1),
(60, 4, 'adgfhdgfadgfhgdsga', '50', 'Manuscript(gönderilen) St.Double IFN (2).pdf', 1),
(61, 4, 'Statistical Convergence', '85', 'Manuscript(gönderilen) St.Double IFN.pdf', 1),
(62, 4, 'Statistical Convergence', '85', 'Manuscript(gönderilen) St.Double IFN.pdf', 1),
(63, 18, 'Statistical Convergence', '85', 'Manuscript(gönderilen) St.Double IFN.pdf', 1),
(64, 4, 'Statistical Convergence', '45', 'Manuscript(gönderilen) St.Double IFN.pdf', 1),
(65, 4, 'Statistical Convergence', '45', 'Manuscript(gönderilen) St.Double IFN.pdf', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Bilimsel Makaleler'),
(2, 'Araştırma/Deneysel Makale'),
(3, 'Lisansüstü Tez Makaleleri'),
(4, 'Editöre Mektup'),
(5, 'Tarihi Makale'),
(6, 'Kitap İncelemeleri'),
(7, 'Edebi Makaleler'),
(8, 'Gazete Makaleleri');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_name` varchar(250) NOT NULL,
  `message_surname` varchar(250) NOT NULL,
  `message_mail` varchar(250) NOT NULL,
  `message_message` text NOT NULL,
  `message_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`message_id`, `message_name`, `message_surname`, `message_mail`, `message_message`, `message_status`) VALUES
(16, 'Zeynep', 'Uysal', 'zynpuys@gmail.com', 'Sponsorluk için konuşabilir miyiz?', 1),
(17, 'Yusuf', 'Yiğit', 'ysf16@gmail.com', 'Merhaba. Saatler ile ilgili bir makalem var. Hnagi kategori daha uygun olur acaba ?\r\n\r\n', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_admin`
--

CREATE TABLE `site_admin` (
  `site_admin_id` int(11) NOT NULL,
  `site_admin_username` varchar(255) NOT NULL,
  `site_admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `site_admin`
--

INSERT INTO `site_admin` (`site_admin_id`, `site_admin_username`, `site_admin_password`) VALUES
(1, 'talhabal', 'yeni');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_surname` varchar(255) NOT NULL,
  `user_job` varchar(250) NOT NULL,
  `user_jobtitle` varchar(250) NOT NULL,
  `user_mail` varchar(250) NOT NULL,
  `user_phone` varchar(250) NOT NULL,
  `user_username` varchar(250) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_surname`, `user_job`, `user_jobtitle`, `user_mail`, `user_phone`, `user_username`, `user_password`, `user_status`) VALUES
(4, 'Mehmet', 'Yılmaz', 'Doktor', 'Uzman', 'alidemir@gmail.com', '05487951785', 'mehmet17', '246126', 1),
(18, 'Zeynep', 'Kaya', 'Öğretmen', 'Fizik', 'zeynep@gmail.com', '0536478514', 'zeynepkaya', '1909', 1),
(20, 'Gökmen', 'Yastıkçı', 'Öğretim Görevlisi', 'Profesör', 'gokmen.ubys@gmail.com', '025547885555', 'gokmen123', '123456', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `wallet_user_id` int(11) NOT NULL,
  `wallet_quantity` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `wallet_user_id`, `wallet_quantity`) VALUES
(3, 4, '485'),
(4, 18, '415');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `article_user_id` (`article_user_id`);

--
-- Tablo için indeksler `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`article_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

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
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `basket`
--
ALTER TABLE `basket`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `site_admin`
--
ALTER TABLE `site_admin`
  MODIFY `site_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`article_user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
