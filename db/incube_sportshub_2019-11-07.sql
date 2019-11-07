# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.37-MariaDB)
# Database: incube_sportshub
# Generation Time: 2019-11-07 11:22:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table g_about
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_about`;

CREATE TABLE `g_about` (
  `REC_ID` int(11) NOT NULL,
  `CONTENT` text,
  `USER_ID` varchar(15) DEFAULT NULL,
  `UPDATED` datetime DEFAULT NULL,
  `CREATED` datetime DEFAULT NULL,
  `IMAGE` varchar(100) NOT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `g_about` WRITE;
/*!40000 ALTER TABLE `g_about` DISABLE KEYS */;

INSERT INTO `g_about` (`REC_ID`, `CONTENT`, `USER_ID`, `UPDATED`, `CREATED`, `IMAGE`)
VALUES
	(1,'<p><span><strong style=\"color: #24ca9d\">TENTANG KAMI</strong></span></p>\r\n<p>Kikikuku.com merupakan toko online yang dibuat dengan misi untuk membantu para retailer di Indonesia dalam mendapatkan produk-produk dari luar negeri yang dapat dijual kembali. Dibawah legalitas PT Trimaran Indah Sukses, Kikikuku.com merupakan salah satu unit usaha dari grup bisnis yang telah berpengalaman dalam bidang perdagangan internasional.</p>\r\n<p>Kikikuku menyadari bahwa dalam bisnis retail, diperlukan produk yang unik pada tiap-tiap toko untuk menghindari perang harga. Namun kami juga memahami kesulitan para pedagang dalam mendapatkan barang-barang yang potensial untuk dijual kembali.</p>\r\n<p>Diperlukan waktu dan biaya bagi para pedagang untuk pulang pergi ke luar negeri untuk mencari suatu produk, ditambah lagi resiko produk yang dikirimkan tidak sesuai dengan perjanjian, resiko salah spesifikasi karena keterbatasan penguasaan bahasa asing dan berbagai macam resiko lainnya.</p>\r\n<p>Untuk itu kami hadir sebagai mediator antara pedagang dan produsen di luar negeri, untuk membantu para padagang dalam menyediakan produk-produk yang telah terseleksi, memiliki potensi untuk dijual kembali serta memastikan kualitas dan memfasilitasi pengirimannya ke Indonesia. Dengan kehadiran kami, pembeli tidak perlu bersusah payah lagi untuk mencari produk impor, resiko salah beli dapat diminimalisir, mendapatkan harga yang sangat kompetitif karena langsung membeli dari sumbernya, sehingga para pedagang dapat lebih fokus dalam proses pemasarannya.</p>\r\n<p><span><strong style=\"color: #24ca9d\">CARA MEMESAN</strong></span></p>\r\n<p>1. Konsumen memilih jenis dan kuantitas barang yang diminati, mengisi identitas (nama, telepon, alamat kirim dll), memasukan dalam keranjang belanja, kemudian lakukan check out</p>\r\n<p>2. Setelah itu kami akan menghitung harga dan ongkos kirim sesuai alamat tujuan</p>\r\n<p>3. Setelah kami selesai mengkalkulasi harga dan ongkos kirim, kami akan menghubungi anda kembali untuk memastikan pesanan Anda.</p>\r\n<p>4. Anda melakukan transfer dana pada kami</p>\r\n<p>5. Setelah dana kami terima. Kami akan memproses pesanan anda ke produsen</p>\r\n<p>6. Dana akan ditahan pada rekening perusahaan kami dan baru akan kami bayarkan ke produsen setelah barang terkirim</p>','admin','2019-08-29 12:52:49',NULL,'');

/*!40000 ALTER TABLE `g_about` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_banner
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_banner`;

CREATE TABLE `g_banner` (
  `REC_ID` int(4) NOT NULL AUTO_INCREMENT,
  `TYPE` varchar(10) DEFAULT NULL,
  `LINK_TYPE` varchar(15) NOT NULL,
  `LINKTO` varchar(255) DEFAULT NULL,
  `BANNER_IMAGE` varchar(255) NOT NULL,
  `ORDER_NO` varchar(50) DEFAULT NULL,
  `FLAG` int(4) NOT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `CREATED` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USER_ID` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `g_banner` WRITE;
/*!40000 ALTER TABLE `g_banner` DISABLE KEYS */;

INSERT INTO `g_banner` (`REC_ID`, `TYPE`, `LINK_TYPE`, `LINKTO`, `BANNER_IMAGE`, `ORDER_NO`, `FLAG`, `DESCRIPTION`, `CREATED`, `UPDATED`, `USER_ID`)
VALUES
	(31,'- Select T','NONE','www.youtube.com','/image/upload/banner/avatar-deadpool-256.png','3',0,'situs menonton','2016-05-16 16:45:30','2019-08-27 11:35:46','admin'),
	(32,'- Select T','NONE','www.detik.com','/image/upload/banner/backgroundlogin.jpg','2',1,'situs mencari berita','2016-05-16 17:19:08','2019-08-27 11:36:06','admin'),
	(33,'MAIN','NONE','www.gmail.com','/image/upload/banner/logo1.png','1',1,'situs mengirim email','2016-05-19 11:08:58','2019-08-26 11:03:36','admin'),
	(35,'MAIN','NONE','asd','/image/upload/banner/avatar-deadpool-256.png',NULL,0,'main','2019-08-27 11:59:42','0000-00-00 00:00:00',NULL),
	(36,'BOTTOM','NONE','sdf','/image/upload/banner/backgroundlogin.jpg',NULL,0,'bottom','2019-08-27 12:00:05','0000-00-00 00:00:00',NULL);

/*!40000 ALTER TABLE `g_banner` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_cart`;

CREATE TABLE `g_cart` (
  `REC_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CART_ID` varchar(50) DEFAULT NULL,
  `PRODUCT_ID` varchar(20) DEFAULT NULL,
  `PRODUCT_QUANTITY` varchar(10) DEFAULT NULL,
  `PRODUCT_PRICE` varchar(20) DEFAULT NULL,
  `PRODUCT_NAME` varchar(255) DEFAULT NULL,
  `PRODUCT_NOTES` varchar(255) DEFAULT NULL,
  `PRODUCT_BUYER` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `g_cart` WRITE;
/*!40000 ALTER TABLE `g_cart` DISABLE KEYS */;

INSERT INTO `g_cart` (`REC_ID`, `CART_ID`, `PRODUCT_ID`, `PRODUCT_QUANTITY`, `PRODUCT_PRICE`, `PRODUCT_NAME`, `PRODUCT_NOTES`, `PRODUCT_BUYER`)
VALUES
	(1,'4ed3881eae690aaeb37f906449754315f003aaeb','923655709','50','384000','Factory direct\'s jewelry tiara for children lollipops for children three-piece Necklace Bracelet ring',NULL,'al.mixev@gmail.com'),
	(2,'f4fd4e4aa6e993d2dff6985a57811e6e1d1fe4f7','923655709','50','384000','Factory direct\'s jewelry tiara for children lollipops for children three-piece Necklace Bracelet ring',NULL,'al.mixev@gmail.com'),
	(3,'493d460c51a94bd597464e51c7c621919c665998','923655709','50','384000','Factory direct\'s jewelry tiara for children lollipops for children three-piece Necklace Bracelet ring','PLEASE SEND ONLY THE WHITE','al.mixev@gmail.com'),
	(4,'493d460c51a94bd597464e51c7c621919c665998','923655709','50','384000','DIRECT ORDER','DON\'T DO THIS PLEASE','al.mixev@gmail.com'),
	(5,'493d460c51a94bd597464e51c7c621919c665998',NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `g_cart` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_confirm_payment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_confirm_payment`;

CREATE TABLE `g_confirm_payment` (
  `REC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ORDER_ID` varchar(20) NOT NULL,
  `ACCOUNT_NAME` varchar(50) NOT NULL,
  `ACCOUNT_NUMBER` varchar(20) NOT NULL,
  `PAYMENT_AMOUNT` varchar(255) NOT NULL,
  `ACCOUNT_BANK` varchar(20) NOT NULL,
  `PAYMENT_ID` int(3) DEFAULT NULL,
  `PAYMENT_DATE` datetime NOT NULL,
  `PAYMENT_IMAGE` varchar(100) NOT NULL,
  `FLAG` int(1) DEFAULT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table g_contactus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_contactus`;

CREATE TABLE `g_contactus` (
  `REC_ID` int(4) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(200) NOT NULL,
  `DESCRIPTION` varchar(200) NOT NULL,
  `IMAGE` varchar(255) NOT NULL,
  `UPDATED` datetime DEFAULT NULL,
  `USER_ID` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `g_contactus` WRITE;
/*!40000 ALTER TABLE `g_contactus` DISABLE KEYS */;

INSERT INTO `g_contactus` (`REC_ID`, `TITLE`, `DESCRIPTION`, `IMAGE`, `UPDATED`, `USER_ID`)
VALUES
	(1,'<center>Our Office</center>','Pluit Business Center, #02-03<br/>\r\nJakarta Utara<br/>','office.png','2017-08-30 11:21:50','admin'),
	(6,'<center>Working Hours</center>','Monday - Saturday from 09:00 to 18:00,<br/>Sunday closed','Clock.png','2017-08-30 11:21:50','admin'),
	(7,'<center>Whatsapp</center>','KIKIKUKU<br/> No 0812 XXXX XXXX','Whatsapp.png','2017-08-30 12:33:31','admin');

/*!40000 ALTER TABLE `g_contactus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_convert
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_convert`;

CREATE TABLE `g_convert` (
  `REC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` varchar(255) NOT NULL,
  `VALUE` double NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `UPDATED_BY` varchar(10) NOT NULL,
  `CREATED_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CURRENCY` varchar(10) NOT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `g_convert` WRITE;
/*!40000 ALTER TABLE `g_convert` DISABLE KEYS */;

INSERT INTO `g_convert` (`REC_ID`, `ID`, `VALUE`, `DESCRIPTION`, `STATUS`, `UPDATED_BY`, `CREATED_TIME`, `UPDATED_TIME`, `CURRENCY`)
VALUES
	(1,'Margin',0.3,'Lorem Ipsum ','HISTORY','ADMIN','2019-08-22 15:49:40','2019-08-22 17:51:23','IDR'),
	(2,'Margin',0.1,'Update Price for Frontend','HISTORY','ADMIN','2019-08-22 15:49:40','2019-08-22 15:53:55','IDR'),
	(3,'Margin Value',0.3,'Testing Margin','CURRENT','ADMIN','2019-08-22 17:51:23','2019-10-14 12:45:15','');

/*!40000 ALTER TABLE `g_convert` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_faq
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_faq`;

CREATE TABLE `g_faq` (
  `REC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CONTENT` text,
  `FAQ_CONTENT` text NOT NULL,
  `USER_ID` varchar(15) DEFAULT NULL,
  `UPDATED` datetime DEFAULT NULL,
  `CREATED` datetime DEFAULT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `g_faq` WRITE;
/*!40000 ALTER TABLE `g_faq` DISABLE KEYS */;

INSERT INTO `g_faq` (`REC_ID`, `CONTENT`, `FAQ_CONTENT`, `USER_ID`, `UPDATED`, `CREATED`)
VALUES
	(14,'Mengapa <span xss=removed>KIKIKUKU</span>','Di <span xss=removed>KIKIKUKU</span>.com, Anda akan mendapatkan kemudahan untuk membeli produk produk berkualitas dari luar negeri, sampai ke Indonesia.',NULL,NULL,NULL),
	(15,'Cara Menjadi Member KIKIKUKU','Ikuti langkah langkah berikut ini:\r\n                          <ul>\r\n                            <li>Register dan daftarkan akun Anda, pastikan data diri Anda valid dan benar</li>\r\n                            <li>Aktivasi akun Anda melalui Email yang Anda daftarkan</li>\r\n                            <li>Setelah Akun Anda aktif, silahkan jelajahi dan cari Produk sesuai dengan kebutuhan Anda</li>\r\n                          </ul>',NULL,NULL,NULL),
	(16,'Bagaimana caranya memesan Produk, dan berapa biaya impor sampai di Indonesia?','Silahkan pilih produk produk yang Anda inginkan, isi jumlah kuantiti yang diinginkan, dan penjelasan yang Anda butuhkan.<br>\r\n                          Lakukan checkout jika Anda telah selesai memilih Produk.<br>\r\n                          Tim Kami akan menghubungi Anda kembali untuk menginformasikan total biaya Impor serta pajak yang perlu dibayarkan sampai di Indonesia.',NULL,NULL,NULL),
	(17,'Bagaimana jika saya berada diluar Jakarta?',' ....',NULL,NULL,NULL),
	(18,'Apa saja pilihan pembayarannya?',' ..... ',NULL,NULL,NULL),
	(19,'Kapan perkiraan barang pesanan saya sampai?',' ....... ',NULL,NULL,NULL),
	(20,'Bagaimana jika ada kerusakan/ cacat pada barang yang saya pesan?',' .....',NULL,NULL,NULL),
	(21,'Apa perbedaan utama kikikuku.com dengan situs-situs online shop lain seperti Alibaba.com dan sejenisnya?',' pada situs trading besar lain, umumnya mereka hanya menghubungkan antara pembeli langsung\r\ndengan penjual tanpa adanya fasilitas pengecekan kualitas barang secara fisik. Dalam hal ini maka\r\nresiko-resiko sepenuhnya akan ditanggung oleh pembeli. Sedangkan pada kikikuku.com, kami\r\nmembantu menjembatani proses impor dengan memastikan secara fisik bahwa produk yang hendak\r\ndibeli adalah produk yang berkualitas dan layak jual. Selain kualitas barang, kami juga turut mengurus\r\nproses import barang dengan menggunakan ekpedisi internasional maupun lokal yang efisien agar\r\nproduk dapat dipastikan diterima di konsumen secara tepat waktu dengan harga yang kompetitif.',NULL,NULL,NULL),
	(22,'Bagaimana harga barang yang akan saya dapatkan?','Kami yakin bahwa anda akan bisa mendapatkan harga yang sangat kompetitif karena:</br>\r\na. Sebagai situs yang langsung melakukan proses pemesanan ke pabrik, tentunya harga\r\nmenjadi sangat kompetitif dibanding bila anda membeli dari agen yang telah melewati\r\nrantai distribusi yang lebih panjang.</br>\r\n\r\nb. Sebagai perusahaan yang juga membantu memilih ekpedisi pengiriman, kami senantiasa\r\nmencari layanan ekspedisi dengan harga yang lebih bersaing, sehingga biaya transport juga\r\ndapat ditekan</br>\r\n\r\nc. Anda juga tidak perlu melakukan sewa sudang sendiri saat proses impor</br>\r\n\r\nd. Dengan melakukan pesanan secara online, anda juga akan menghemat biaya survei ke luar\r\nnegeri',NULL,NULL,NULL),
	(23,'Bagaimana kepastian pengirimannya?','Sebagai perusahaan lokal di Indonesia yang juga memiliki perwakilan di China, kami mampu\r\nmembantu memastikan proses bahwa barang yang dikirim adalah merupakan produk yang\r\nsesuai. Dan kami juga akan membantu melakukan proses masuknya barang ke Indonesia sesuai\r\nperaturan yang berlaku, sehingga mengurangi resiko barang tertahan di bea cukai.',NULL,NULL,NULL),
	(24,'Berapa lama prosesnya?','Rata-rata proses pengiriman dari China ke Jakarta adalah 4 minggu ditambah waktu produksi\r\npabrik yang berbeda beda, tergantung jenis produk yang dipesan. ',NULL,NULL,NULL),
	(25,'Bagaimana kemananan uang saya?','Untuk memastikan produsen melakukan proses produksi dan pengiriman secara sesuai kuantiti\r\ndan spesifikasi yang dipesan, kami hanya akan membayarkan uang anda pada produsen setelah\r\nbarang dikirimkan. ',NULL,NULL,NULL),
	(26,'Pengiriman dapat dilakukan kemana saja?','Pengiriman dapat dilakukan ke Jabodetabek, untuk wilayah lain akan kami cek terlebih dahulu.',NULL,NULL,NULL),
	(27,'Bagaimana cara menghubungi customer service kami','Untuk menghubungi customer service kami dapat dilakukan melalui email dan fitur chat yang\r\ntelah kami sediakan.',NULL,NULL,NULL);

/*!40000 ALTER TABLE `g_faq` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_howto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_howto`;

CREATE TABLE `g_howto` (
  `REC_ID` int(11) NOT NULL,
  `CONTENT` text,
  `USER_ID` varchar(15) DEFAULT NULL,
  `UPDATED` datetime DEFAULT NULL,
  `CREATED` datetime DEFAULT NULL,
  `IMAGE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `g_howto` WRITE;
/*!40000 ALTER TABLE `g_howto` DISABLE KEYS */;

INSERT INTO `g_howto` (`REC_ID`, `CONTENT`, `USER_ID`, `UPDATED`, `CREATED`, `IMAGE`)
VALUES
	(1,'<p style=\"color: #24ca9d\">CARA MEMESAN</p>\r\n<p>1. Konsumen memilih jenis dan kuantitas barang yang diminati, mengisi identitas (nama, telepon, alamat kirim dll), memasukan dalam keranjang belanja, kemudian lakukan check out</p>\r\n<p>2. Setelah itu kami akan menghitung harga dan ongkos kirim sesuai alamat tujuan</p>\r\n<p>3. Setelah kami selesai mengkalkulasi harga dan ongkos kirim, kami akan menghubungi anda kembali untuk memastikan pesanan Anda.</p>\r\n<p>4. Anda melakukan transfer dana pada kami</p>\r\n<p>5. Setelah dana kami terima. Kami akan memproses pesanan anda ke produsen</p>\r\n<p>6. Dana akan ditahan pada rekening perusahaan kami dan baru akan kami bayarkan ke produsen setelah barang terkirim</p>','admin','2019-08-30 08:45:32',NULL,'');

/*!40000 ALTER TABLE `g_howto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_member
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_member`;

CREATE TABLE `g_member` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) DEFAULT NULL,
  `BIRTH_DATE` date DEFAULT NULL,
  `JOIN_DATE` datetime DEFAULT NULL,
  `PHONE` varchar(45) NOT NULL DEFAULT '',
  `ADDRESS` varchar(100) NOT NULL DEFAULT '',
  `ADDRESS_2` varchar(100) NOT NULL,
  `COUNTRY` varchar(100) NOT NULL,
  `PROVINCE` varchar(100) NOT NULL DEFAULT '',
  `ZIP` varchar(100) NOT NULL DEFAULT '',
  `EMAIL` varchar(100) NOT NULL DEFAULT '',
  `PASSWORD` varchar(100) NOT NULL DEFAULT '',
  `STATUS` varchar(15) NOT NULL DEFAULT '',
  `HASH` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `id` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `g_member` WRITE;
/*!40000 ALTER TABLE `g_member` DISABLE KEYS */;

INSERT INTO `g_member` (`ID`, `FIRST_NAME`, `LAST_NAME`, `BIRTH_DATE`, `JOIN_DATE`, `PHONE`, `ADDRESS`, `ADDRESS_2`, `COUNTRY`, `PROVINCE`, `ZIP`, `EMAIL`, `PASSWORD`, `STATUS`, `HASH`)
VALUES
	(12,'Wisan','Maulana','2019-07-16','2019-07-16 00:00:00','0882828222','jalan jalan','jalan jalan kuy','Indonesia','jakarta','12313','wisan.maulana@gmail.com','d0db236402cd0019465296729022b7277040745d','ACTIVE','94947a0ca91fd69840334d33b6bceb0c813ffcda'),
	(14,'Admin','Testing',NULL,'2019-08-06 02:17:34','082299737991','Duren Village F1 No 7','Ciledug, Tangerang','Indonesia','Tangerang','15157','al.mixev@gmail.com','6367c48dd193d56ea7b0baad25b19455e529f5ee','ACTIVE','1a63d24f06428cea6017f3aa2a581fc7bfc7ef2b'),
	(15,'Andre','Justyn',NULL,'2019-08-14 07:48:25','081381841194','Arcadia Village','Paloma 28 Gading Serpong','Indonesia','Banten','15810','ajustynaj@gmail.com','6367c48dd193d56ea7b0baad25b19455e529f5ee','ACTIVE','375c31e1b8b05150d9c88f80139cfde7613aa6a5'),
	(16,'R','Andika',NULL,'2019-08-19 07:32:43','812222123123','Jl. KH. Hasyim Ashari No.26, RT.1/RW.7, Petojo Utara, Gambir, Jakarta Pusat, DKI Jakarta 10130','Petojo Utara, Gambir, Jakarta Pusat, DKI Jakarta 10130','Indonesia','DKI Jakarta','10130','rpokemonnew000@gmail.com','d09a615effd23308f98f1f182cb60c1939ff359e','ACTIVE','4aed13c050cb4c9a93a0227824b5e4f831fe3ae8'),
	(17,'stephan','AJ',NULL,'2019-08-30 01:55:11','01221313','test','test','Indonesia','Jakarta','14450','stephan.aj@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','ACTIVE','d0f836e0c049048699ef659f7bbe028ff18743da'),
	(23,'Andre ','Justyn','2019-10-24','2019-10-15 03:54:11','082299381739','Bekasi Barat','Jakarta Timur','Indonesia','Bekasi','15157','andre.justyn@gmail.com','f7ad951ca39ffb91d9dce99c9b5bf44b3036b301','PENDING','164eecbff006b3c3f318d087beec8000365a0054'),
	(24,'Andi','Wardana','1970-01-01','2019-10-29 02:51:02','08973909281','Pamulang Permai','Tangerang Selatan','Indonesia','Pamulang','15157','andi.wardana@incubesolutions.com','da39a3ee5e6b4b0d3255bfef95601890afd80709','PENDING','6520b1a12cf4e1d3d4966d2cafaa6cf215b7a547'),
	(37,'Andi','Wardana','1970-01-01','2019-10-29 02:59:24','08973909281','Pamulang Permai','Tangerang Selatan','Indonesia','Pamulang','15157','andi.wardana@incubesolutions.com','da39a3ee5e6b4b0d3255bfef95601890afd80709','PENDING','6520b1a12cf4e1d3d4966d2cafaa6cf215b7a547'),
	(38,'Andi','Wardana','1994-07-07','2019-10-29 02:59:50','08973909281','Pamulang Permai','Tangerang Selatan','Indonesia','Pamulang','15157','andi.wardana@incubesolutions.com','da39a3ee5e6b4b0d3255bfef95601890afd80709','PENDING','6520b1a12cf4e1d3d4966d2cafaa6cf215b7a547'),
	(39,'Andrea','Justina','1994-07-07','2019-10-29 03:01:06','082299383819','Pedurenan PErmai','Tangerang','Virgin Islands (U.S.)','Tangerang','15157','andrea.justina@gmail.com','f7ad951ca39ffb91d9dce99c9b5bf44b3036b301','ACTIVE','a9e878a3094fee7661ad43d310e38b3af5696c3a'),
	(44,'Andi','Wardana','1994-07-07','2019-11-05 11:55:21','08973909281','Pamulang Permai','Tangerang Selatan','Indonesia','Pamulang','15157','tesaw@gmail.com','da39a3ee5e6b4b0d3255bfef95601890afd80709','ACTIVE','224c9d0d52973ae662f2a9e8352a2a1a1090967f'),
	(45,'Andi','Wardana','1994-07-07','2019-11-05 11:55:51','08973909281','Pamulang Permai','Tangerang Selatan','Indonesia','Pamulang','15157','dawdd2@gmail.com','52ebcba4aca46000ea623018e68c4aa68e2f6c71','ACTIVE','8a9ebdea6feab52470c3bc8d27c0bd71b2aecc2c'),
	(46,'Andi','Wardana','1994-07-07','2019-11-05 11:56:31','08973909281','Pamulang Permai','Tangerang Selatan','Indonesia','Pamulang','15157','ddwd221@gmail.com','29120f443a17e6c02041a5e5706b8e0a6ca4bc1b','ACTIVE','c507c1504b619adaa79bab56765b015a122c5c59');

/*!40000 ALTER TABLE `g_member` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_message`;

CREATE TABLE `g_message` (
  `REC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SENDER_ID` varchar(10) NOT NULL,
  `ORDER_ID` varchar(20) NOT NULL,
  `MESSAGE` varchar(255) NOT NULL,
  `MESSAGE_TIME` datetime NOT NULL,
  `USER_READ_FLAG` int(11) NOT NULL,
  `ADMIN_READ_FLAG` int(11) NOT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `g_message` WRITE;
/*!40000 ALTER TABLE `g_message` DISABLE KEYS */;

INSERT INTO `g_message` (`REC_ID`, `SENDER_ID`, `ORDER_ID`, `MESSAGE`, `MESSAGE_TIME`, `USER_READ_FLAG`, `ADMIN_READ_FLAG`)
VALUES
	(1,'ADMIN','KKU1908000002','Selamat siang','2019-08-14 00:00:00',0,0),
	(2,'CUSTOMER','KKU1910000007','Iya siang kak','2019-08-14 00:00:00',0,0),
	(3,'CUSTOMER','KKU1908000001','Mohon maaf, saya ada kesalahan dalam input jumlah pesanan','2019-08-14 00:00:00',0,0),
	(4,'CUSTOMER','KKU1908000001','Apa bisa saya request perubahan jumlah ya?','2019-08-14 00:00:00',0,0),
	(5,'CUSTOMER','KKU1908000002','Haloo','0000-00-00 00:00:00',0,0),
	(6,'CUSTOMER','KKU1908000002','Haloo','2019-08-16 15:48:55',0,0),
	(7,'CUSTOMER','KKU1908000002','Jad gimana nasib saya ya?','2019-08-16 15:08:44',0,0),
	(8,'CUSTOMER','KKU1908000002','Jad gimana nasib saya ya?','2019-08-16 15:08:44',0,0),
	(9,'CUSTOMER','KKU1908000001','Apa bisa dirubah jumlahnya?','2019-08-16 16:08:01',0,0),
	(10,'ADMIN','KKU1908000002','loh heh?','2019-08-16 17:08:04',0,0),
	(11,'CUSTOMER','KKU1908000001','Haloo admin','2019-08-16 17:08:37',0,0),
	(12,'CUSTOMER','KKU1908000001','Jadi bagaimana nasib barang saya ya?','2019-08-16 17:08:05',0,0),
	(13,'CUSTOMER','KKU1908000001','Jadi bagaimana nasib barang saya ya?','2019-08-16 17:08:11',0,0),
	(14,'CUSTOMER','KKU1908000001','Jadi bagaimana nasib barang saya ya?','2019-08-16 17:08:24',0,0),
	(15,'CUSTOMER','KKU1908000001','Jadi bagaimana nasib barang saya ya?','2019-08-16 17:08:26',0,0),
	(16,'CUSTOMER','KKU1908000002','Jadi bagaimana ya?','2019-08-16 17:08:51',0,0),
	(17,'CUSTOMER','KKU1908000002','Jadi bagaimana ya?','2019-08-16 17:08:17',0,0),
	(18,'CUSTOMER','KKU1908000002','Jadi bagaimana ya?','2019-08-16 17:08:19',0,0),
	(19,'CUSTOMER','KKU1908000001','','2019-08-16 17:08:41',0,0),
	(20,'CUSTOMER','KKU1908000001','','2019-08-16 17:08:15',0,0),
	(21,'CUSTOMER','KKU1908000001','','2019-08-16 17:08:21',0,0),
	(22,'CUSTOMER','KKU1908000001','','2019-08-16 17:08:23',0,0),
	(23,'CUSTOMER','KKU1908000001','','2019-08-16 17:08:26',0,0),
	(24,'CUSTOMER','KKU1908000001','Tumpuk boi','2019-08-16 17:08:02',0,0),
	(25,'CUSTOMER','KKU1908000002','Saya mau tanya','2019-08-16 18:08:04',0,0),
	(26,'CUSTOMER','KKU1910000007','Saya mau tanya','2019-08-16 18:08:10',0,0),
	(27,'ADMIN','KKU1908000001','bisa sabar gak jadi manusia?','2019-08-16 18:08:26',0,0),
	(28,'ADMIN','KKU1908000001','bisa sabar gak jadi manusia?','2019-08-16 18:08:27',0,0),
	(29,'ADMIN','KKU1908000001','orang kok gapunya atitude','2019-08-16 18:08:56',0,0),
	(30,'CUSTOMER','KKU1908000001','tes','2019-08-19 10:08:28',0,0),
	(31,'CUSTOMER','KKU1908000001','tes','2019-08-19 10:08:37',0,0),
	(32,'CUSTOMER','KKU1908000001','ssdf','2019-08-20 15:08:44',0,0),
	(33,'CUSTOMER','KKU1908000002','dfg','2019-08-20 15:08:27',0,0),
	(34,'CUSTOMER','KKU1910000007','Selamat sore','2019-08-20 17:08:29',0,0),
	(35,'ADMIN','KKU1910000007','test','2019-08-21 16:08:17',0,0),
	(36,'ADMIN','KKU1910000006','test','2019-08-21 16:08:29',0,0),
	(37,'ADMIN','KKU1910000006','test','2019-08-21 16:08:30',0,0),
	(38,'ADMIN','KKU1908000001','test','2019-08-21 16:08:30',0,0),
	(39,'CUSTOMER','KKU1910000006','barangnya sudah saya terima ya','2019-08-25 22:08:05',0,0),
	(40,'ADMIN','KKU1908000002','halo, barang sudah saya update mohon dicek kembali ya','2019-08-26 10:08:10',0,0),
	(41,'ADMIN','KKU1908000002','halo, barang sudah saya update mohon dicek kembali ya','2019-08-26 10:08:10',0,0),
	(42,'ADMIN','KKU1908000005','halo','2019-08-26 10:08:41',0,0),
	(43,'ADMIN','KKU1908000003','halo','2019-08-26 10:08:54',0,0),
	(44,'ADMIN','KKU1908000005','halo admin testing','2019-08-26 10:08:57',0,0),
	(45,'ADMIN','KKU1908000005','siang admin testing','2019-08-26 10:08:27',0,0),
	(46,'ADMIN','KKU1908000003','siang andre','2019-08-26 10:08:12',0,0),
	(47,'ADMIN','KKU1908000003','halo','2019-08-26 10:08:57',0,0),
	(48,'ADMIN','KKU1908000005','hola','2019-08-26 10:08:38',0,0),
	(49,'ADMIN','KKU1908000004','halo selamat siang','2019-08-26 10:08:06',0,0),
	(50,'ADMIN','KKU1908000001','tes','2019-08-26 11:08:13',0,0),
	(51,'ADMIN','KKU1908000002','tes','2019-08-26 11:08:16',0,0),
	(52,'ADMIN','KKU1908000002','tes','2019-08-26 11:08:17',0,0),
	(53,'ADMIN','KKU1908000002','tes','2019-08-26 11:08:17',0,0),
	(54,'ADMIN','KKU1908000007','hi','2019-08-30 13:08:51',0,0),
	(55,'ADMIN','KKU1910000007','bisa kami bantu?','2019-08-30 13:08:10',0,0),
	(56,'CUSTOMER','KKU1910000006','halo selamat sore','2019-10-22 18:10:55',0,1),
	(57,'CUSTOMER','KKU1910000007','Barang yang saya pesan jadi kapan bisa sampai ya?','2019-10-22 18:10:49',0,1),
	(58,'CUSTOMER','KKU1910000007','dan saya juga ada perubahan dalam pemesanan barang','2019-10-22 18:10:39',0,1),
	(59,'CUSTOMER','KKU1910000005','Halo, selamat malam','2019-10-22 19:10:27',0,1),
	(60,'CUSTOMER','KKU1910000005','Saya ingin bertanya mengenai pesanan saya','2019-10-22 19:10:35',0,1),
	(61,'CUSTOMER','KKU1910000005','Saya ada kesalahan dalam jumlah pemesanan','2019-10-22 19:10:47',0,1),
	(62,'CUSTOMER','KKU1910000005','Halooo','2019-10-22 19:10:59',0,1),
	(63,'CUSTOMER','KKU1910000005','Jadi kapan bisa dibalas?','2019-10-22 19:10:05',0,1),
	(64,'CUSTOMER','KKU1910000007','tes','2019-10-23 12:10:07',0,1),
	(65,'CUSTOMER','KKU1910000006','test','2019-10-23 18:10:06',0,1),
	(66,'CUSTOMER','KKU1910000006','hi hi ganteng','2019-10-23 18:10:11',0,1);

/*!40000 ALTER TABLE `g_message` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_order_detail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_order_detail`;

CREATE TABLE `g_order_detail` (
  `REC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FLAG` varchar(2) NOT NULL,
  `ORDER_NO` varchar(20) NOT NULL DEFAULT '',
  `PROD_ID` varchar(25) NOT NULL DEFAULT '0',
  `PROD_NAME` varchar(250) DEFAULT NULL,
  `QUANTITY` smallint(6) NOT NULL DEFAULT '0',
  `WEIGHT` double NOT NULL DEFAULT '0',
  `PRICE` double NOT NULL DEFAULT '0',
  `FINAL_PRICE` double NOT NULL,
  `POSTAGE` double NOT NULL,
  `NOTES` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`REC_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `g_order_detail` WRITE;
/*!40000 ALTER TABLE `g_order_detail` DISABLE KEYS */;

INSERT INTO `g_order_detail` (`REC_ID`, `FLAG`, `ORDER_NO`, `PROD_ID`, `PROD_NAME`, `QUANTITY`, `WEIGHT`, `PRICE`, `FINAL_PRICE`, `POSTAGE`, `NOTES`)
VALUES
	(22,'1','KKU1910000005','924119885','Kids baseball caps',10,0,0,0,0,'Please send the white ones'),
	(21,'1','KKU1910000004','925069672','Js-2113 20CM fake solar ruler calculator ruler calculator ruler calculator',18000,0,6982.342,6982.342,0,''),
	(20,'1','KKU1910000004','924119885','Kids baseball caps',10,0,0,0,0,'Please send the white ones'),
	(19,'1','KKU1910000002','929038103','Factory direct sale of European and American fashion hand and diamond crystal headband hair band hair accessories',600,0,18482.67,18482.67,0,'Please send only the girl'),
	(18,'1','KKU1910000002','926900588','2015 Europe and later exaggerated large vintage necklace jewelry pendants gold necklaces wholesale',12,0,45179.86,45179.86,0,'Please send without any of the expensive gems'),
	(17,'1','KKU1910000001','929038103','Factory direct sale of European and American fashion hand and diamond crystal headband hair band hair accessories',600,0,18482.67,18482.67,0,'Please send only the girl'),
	(16,'1','KKU1910000001','926900588','2015 Europe and later exaggerated large vintage necklace jewelry pendants gold necklaces wholesale',12,0,45179.86,45179.86,0,'Please send without any of the expensive gems'),
	(23,'1','KKU1910000005','925069672','Js-2113 20CM fake solar ruler calculator ruler calculator ruler calculator',18000,0,6982.342,6982.342,0,''),
	(24,'1','KKU1910000006','924119885','Kids baseball caps',10,0,0,0,0,'Please send the white ones'),
	(25,'1','KKU1910000006','925069672','Js-2113 20CM fake solar ruler calculator ruler calculator ruler calculator',18000,0,6982.342,6982.342,0,''),
	(26,'1','KKU1910000007','924039739',NULL,10,0,29925,29925,0,'Send the turqoise only'),
	(27,'1','KKU1910000007','930353837',NULL,1000,0,390.3198,390.3198,0,'Please send only the pink color');

/*!40000 ALTER TABLE `g_order_detail` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_order_master
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_order_master`;

CREATE TABLE `g_order_master` (
  `ORDER_NO` varchar(20) NOT NULL DEFAULT '',
  `ORDER_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MEMBER_ID` varchar(15) NOT NULL DEFAULT '0',
  `MEMBER_NAME` varchar(255) NOT NULL,
  `MEMBER_PHONE` varchar(20) NOT NULL,
  `MEMBER_EMAIL` varchar(100) NOT NULL,
  `TOTAL_ORDER` double NOT NULL DEFAULT '0',
  `TOTAL_POSTAGE` double NOT NULL,
  `STATUS` varchar(20) NOT NULL,
  `UPDATED` datetime DEFAULT NULL,
  `ADDRESS_1` varchar(255) NOT NULL,
  `ADDRESS_2` varchar(255) NOT NULL,
  `COUNTRY` varchar(50) NOT NULL,
  `ZIP` varchar(15) NOT NULL,
  `STATE` varchar(50) NOT NULL,
  PRIMARY KEY (`ORDER_NO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `g_order_master` WRITE;
/*!40000 ALTER TABLE `g_order_master` DISABLE KEYS */;

INSERT INTO `g_order_master` (`ORDER_NO`, `ORDER_DATE`, `MEMBER_ID`, `MEMBER_NAME`, `MEMBER_PHONE`, `MEMBER_EMAIL`, `TOTAL_ORDER`, `TOTAL_POSTAGE`, `STATUS`, `UPDATED`, `ADDRESS_1`, `ADDRESS_2`, `COUNTRY`, `ZIP`, `STATE`)
VALUES
	('KKU1910000001','2019-10-11 02:09:26','14','Admin Testing','082299737991','al.mixev@gmail.com',11631760.32,0,'NEW ORDER',NULL,'Duren Village F1 No 7','Ciledug, Tangerang','Indonesia','15157','Tangerang'),
	('KKU1910000002','2019-10-11 02:10:14','14','Admin Testing','082299737991','al.mixev@gmail.com',11631760.32,0,'NEW ORDER',NULL,'Duren Village F1 No 7','Ciledug, Tangerang','Indonesia','15157','Tangerang'),
	('KKU1910000004','2019-10-11 02:20:46','14','Admin Testing','082299737991','al.mixev@gmail.com',125682156,0,'NEW ORDER',NULL,'Duren Village F1 No 7','Ciledug, Tangerang','Indonesia','15157','Tangerang'),
	('KKU1910000005','2019-10-11 02:21:07','14','Admin Testing','082299737991','al.mixev@gmail.com',125682156,0,'NEW ORDER',NULL,'Duren Village F1 No 7','Ciledug, Tangerang','Indonesia','15157','Tangerang'),
	('KKU1910000006','2019-10-23 17:17:52','14','Admin Testing','082299737991','al.mixev@gmail.com',125682156,0,'UPDATED',NULL,'Duren Village F1 No 7','Ciledug, Tangerang','Indonesia','15157','Tangerang'),
	('KKU1910000007','2019-10-23 12:11:39','14','Admin Testing','082299737991','al.mixev@gmail.com',689569.8,0,'DONE',NULL,'Duren Village F1 No 7','Ciledug, Tangerang','Indonesia','15157','Tangerang');

/*!40000 ALTER TABLE `g_order_master` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_privacy
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_privacy`;

CREATE TABLE `g_privacy` (
  `REC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CONTENT` text,
  `USER_ID` varchar(15) DEFAULT NULL,
  `UPDATED` datetime DEFAULT NULL,
  `CREATED` datetime DEFAULT NULL,
  `IMAGE` varchar(100) NOT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `g_privacy` WRITE;
/*!40000 ALTER TABLE `g_privacy` DISABLE KEYS */;

INSERT INTO `g_privacy` (`REC_ID`, `CONTENT`, `USER_ID`, `UPDATED`, `CREATED`, `IMAGE`)
VALUES
	(1,'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\n\nWhere does it come from?\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\n\nWhere can I get some?\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','admin','2016-05-16 14:38:22',NULL,'Koala.jpg');

/*!40000 ALTER TABLE `g_privacy` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_product`;

CREATE TABLE `g_product` (
  `ID` int(50) NOT NULL,
  `PRODUCT_ID` varchar(255) NOT NULL,
  `PRODUCT_NAME` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `COLOR` varchar(255) NOT NULL,
  `TYPE` varchar(10) NOT NULL,
  `PRODUCT_PRICE` varchar(50) NOT NULL,
  `IMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `g_product` WRITE;
/*!40000 ALTER TABLE `g_product` DISABLE KEYS */;

INSERT INTO `g_product` (`ID`, `PRODUCT_ID`, `PRODUCT_NAME`, `DESCRIPTION`, `COLOR`, `TYPE`, `PRODUCT_PRICE`, `IMAGE`)
VALUES
	(1,'PROD0009','Electric Bike','Professional research and development / production / sales / custom all kinds of electric and the balance of the car / scooter / ATV / go karts, etc. to provide various types of vehicle accessories micro letter: 13516920456','BLACK','WHOLE','5000000','');

/*!40000 ALTER TABLE `g_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_reset_password
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_reset_password`;

CREATE TABLE `g_reset_password` (
  `REC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_EMAIL` varchar(50) NOT NULL,
  `RESET_ID` varchar(50) NOT NULL,
  `RESET_STATUS` varchar(10) NOT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `g_reset_password` WRITE;
/*!40000 ALTER TABLE `g_reset_password` DISABLE KEYS */;

INSERT INTO `g_reset_password` (`REC_ID`, `USER_EMAIL`, `RESET_ID`, `RESET_STATUS`)
VALUES
	(28,'al.mixev@gmail.com','3099daa18909f8b8a95137fb32ff978d7f9f193d','FINISHED'),
	(27,'al.mixev@gmail.com','be86759b19e5cbf085e8430d22ac106f771dbe9c','ACTIVE'),
	(26,'al.mixev@gmail.com','5566a07b9a3a0ca22c108e544be40a5c5662b3d1','ACTIVE'),
	(25,'al.mixev@gmail.com','05d032828c268592b9ff7007e429299b17477619','ACTIVE'),
	(24,'al.mixev@gmail.com','024191e2594a244355b59940ad71342e6b0a3fcf','ACTIVE'),
	(23,'al.mixev@gmail.com','8b26025f1e3cd75a5e1f434a992a5ad5d3d0f0a0','ACTIVE');

/*!40000 ALTER TABLE `g_reset_password` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table g_terms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `g_terms`;

CREATE TABLE `g_terms` (
  `REC_ID` int(11) NOT NULL,
  `CONTENT` text,
  `USER_ID` varchar(15) DEFAULT NULL,
  `UPDATED` datetime DEFAULT NULL,
  `CREATED` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `g_terms` WRITE;
/*!40000 ALTER TABLE `g_terms` DISABLE KEYS */;

INSERT INTO `g_terms` (`REC_ID`, `CONTENT`, `USER_ID`, `UPDATED`, `CREATED`)
VALUES
	(1,'<div class=\"row\">\r\n	<div class=\"std\" style=\"padding:15px;\"><div class=\"custom-page custom-style-2\">\r\n              <div class=\"page-title title-big without-border\">\r\n                </div>\r\n                <div class=\"a-center\">\r\n                <p>Dalam melakukan aktivitas di website kami, pengguna diwajibkan untuk membaca dan memahami syarat dan ketentuan yang berlaku di www.gelarukm.com, apabila pengguna masih menggunakan dan melakukan aktivitas di situs www.gelarukm.com maka pengguna telah membaca, mengerti, memahami dan menyetujui semua isi dalam Syarat dan Ketentuan yang berlaku dalam situs www.gelarukm.com, tapi jika pengguna tidak menyetujui syarat dan ketentuan yang berlaku dalam situs www.gelarukm.com maka pengguna tidak diperkenankan untuk menggunakan dan melakukan aktivitas di situs www.gelarukm.com.<br><br>\r\n                Dengan ini kami sampaikan syarat dan Ketentuan yang berlaku di Situs www.gelarukm.com, sebagai berikut;\r\n                </p>\r\n                \r\n                </div>\r\n                <div><!-- class=\"bg-without\" -->\r\n                <ul class=\"custom-pag-list\">\r\n                <li>\r\n                <span class=\"material-design-list88\"></span>\r\n                <h4>DIFINISI</h4>\r\n                <p>www.gelarukm.com merupakan situs layanan online dalam memasarkan dan menjual produk-produk yang berhubungan dengan Usaha Mikro Kecil Menengah dan Koperasi yang selanjutnya disebut GelarUkm.<br><br>\r\n                  Pengguna merupakan Pihak yang menggunakan layanan GelarUkm.<br>\r\n                  <br>\r\n                  Pembeli merupakan Pengguna yang terdaftar untuk melakukan transaksi produk-produk/barang-barang yang dijual melalui GelarUkm.<br><br>\r\n                  Pembayaran merupakan Harga yang telah disepakati dan disetujui dari transaksi pembelian yang dilakukan melalui GelarUkm oleh pembeli dengan mentransfer sejumlah uang melalui rekening yang telah ditetapkan/tercantum dalam GelarUkm.<br><br>\r\n                  <strong>Rupiah merupakan mata uang yang digunakan dalam mekanisme pembayaran setiap produk yang dibeli melalui GelarUkm</strong>.<br>\r\n                  <br>\r\n                  Produk merupakan barang/jasa <strong>yang sifatnya halal dan tidak melanggar peraturan hukum dan Kesusilaan </strong>yang dijual melalui GelarUkm.<br>\r\n                  <br>\r\n                  UMKMK merupakan Usaha Mikro Kecil Menengah dan Koperasi yang menjual produknya disitus GelarUkm.<br>\r\n                  <br>\r\n                  <strong>Asuransi merupakan pengalihan risiko atas kerusakan produk dalam proses pengiriman produk ke alamat Pembeli</strong>.<br>\r\n                  <br>\r\n                  Setiap Penggguna dan Pembeli telah menyetujui dan menyepakati semua aturan-aturan yang telah ditetapkan oleh GelarUkm melalui syarat dan ketentuan ini.<br>\r\n                  <br>\r\n                  Syarat dan ketentuan ini dapat berubah-ubah sewaktu-waktu tanpa pemberitahuan sebelumnya.<br><br>\r\n                  <strong>Semua sengketa yang ada di antara para pihak akan dihadirkan di hadapan pengadilan negeri di tempat domisili GelarUkm yang telah mengkonfirmasi pemesanan, kecuali GelarUkm memilih forum lain yang lebih kompeten. Semua perjanjian antara GelarUkm dan PEMBELI tunduk pada hukum Negara Indonesia dimana entitas GelarUkm telah terdaftar.</strong></p>\r\n                <p> </p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-gift\"></span>\r\n                <h4>PRODUK</h4>\r\n                <p>Produk yang dijual melalui GelarUkm tidak hanya berupa barang-barang UMKMK tetapi juga dalam bentuk jasa<br><br>\r\nJasa yang ditawarkan melalui GelarUkm adalah jasa pelatihan-pelatihan terhadap UMKMK, Jasa pelatihan terhadap SDM-SDM perusahaan, <strong>Jasa pengurusan Merk Dagang, Hak Paten dan atau Hak Kekayaan Intektual lainnya,</strong> team building dalam bentuk Outbond dan Jasa program pemberdayaan masyarakat melalui dana-dana CSR ataupun dana lembaga donor.<br><br>\r\nBarang-barang yang dijual merupakan barang-barang dari para UMKMK di Indonesia dan tidak menutup kemungkinan juga berasal dari luar Indonesia.<br><br>\r\nBarang-barang yang di jual di situs GelarUkm tidak selalu tersedia stocknya sehingga pembeli harus bersabar untuk menunggu barang yang dibeli sampai di terima oleh pembeli mengingat barang-barang yang dijual oleh situs GelarUkm merupakan barang-barang UMKMK yang kebanyakan harus di produksi ulang berdasarkan permintaan.<br><br>\r\nPenjualan barang diakukan dengan sistem grosir dan eceran. <br><br>\r\nAdapun jenis barang yang dijual grosir atau eceran tercantum dalam GelarUkm. <br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-money\"></span>\r\n                <h4>HARGA</h4>\r\n                <p>Harga barang yang terdapat dalam situs GelarUkm merupakan harga barang eceran ataupun grosir sesuai dengan jenis barang yang dijual.<br><br>\r\nHarga barang yang tercantum dalam situs GelarUkm belum termasuk Biaya Ongkos Kirim dan biaya-biaya lain yang mungkin timbul (akan dijelaskan secara rinci pada saat transaksi pembelian).<br><br>\r\nHarga Jasa Pelatihan dan Jasa Program yang tercantum dalam situs GelarUkm belum termasuk biaya pajak (PPn dan PPh).<br><br>\r\nHarga dapat berubah-ubah sewaktu-waktu tanpa pemberitahuan sebelumnya.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-shopping-basket\"></span>\r\n                <h4>ATURAN DALAM MELAKUKAN PEMBELIAN</h4>\r\n                <p>Pembeli harus terdaftar dalam GelarUkm<br><br>\r\nPembeli melakukan transaksi pembelian berdasarkan syarat dan ketentuan yang telah ditetapkan oleh GelarUkm.<br><br>\r\nPembeli wajib untuk melakukan transfer terlebih dahulu sesuai harga barang yang dipesan/dibeli melalui GelarUkm.<br><br>\r\nPembayaran/Transfer paling lambat  1 x 24 jam, apabila lewat dari 1 x 24 jam maka pesanan yang telah dipesan/dibeli dianggap batal secara otomatis.<br><br>\r\nApabila pembeli ingin memesan/membeli kembali barang yang telah dibatalkan secara otomatis sebelumnya maka pembeli wajib memesan/membeli kembali dan melalui GelarUkm sesuai dengan syarat dan ketentuan yang telah dietapkan oleh GelarUkm selama barang yang dipesan/dibeli masih ada persediaannya.<br><br>\r\nBarang-barang yang telah dibeli tidak dapat dikembalikan ataupun diganti dengan barang lain kecuali penjelasan detail pada bagian ATURAN PENGEMBALIAN BARANG/ RETURN POLICY.<br><br>\r\n</p>\r\n                </li>\r\n                </ul>\r\n                </div><br><br><br>\r\n                <ul class=\"custom-pag-list color-2\">\r\n                <li>\r\n                <span class=\"material-design-credit98\"></span>\r\n                <h4>ATURAN DALAM MELAKUKAN PENJUALAN</h4>\r\n                <p>Saat ini sistem penjualan masih dilakukan oleh admin GelarUkm dimana penjual wajib terdaftar dalam situs GelarUkm yang kemudian mengirimkan jenis produk melalui gambar dalam bentuk *.png, gambaran produk, dan harga. <br><br>\r\nProduk yang kami anggap baik akan kami tampilkan untuk dijual melalui situs GelarUkm.<br><br>\r\nKami berhak menolak untuk menampilkan produk penjual.<br><br>\r\nProduk yang ditolak oleh admin GelarUkm akan dihapus.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-ban\"></span>\r\n                <h4>HAL HAL YANG DILARANG</h4>\r\n                <p>Pengguna dilarang keras melakukan penyalahgunaan situs GelarUkm<br><br>\r\nPengguna dilarang melakukan manipulasi sistem yang ada di GelarUkm baik itu berupa barang, penambahan dan atau pengurangan konten, dan apapun yang bertentangan dengan melakukan penyalahgunaan yang ada di situs GelarUkm.<br><br>\r\nPengguna dilarang merusak atau mengirimkan gambar, tulisan, viru-virus atau apapun yang dapat mengganggu dan merusak sistem GelarUkm.<br><br>\r\nPengguna dilarang menggunakan isi konten yang berada di situs GelarUkm untuk menduplikasi ataupun untuk kepentingan pengguna diluar penggunaan dalam situs GelarUkm.<br>\r\n<br>\r\nPengguna dilarang menyebarkan gambar dan kata-kata yang memicu persaingan bisnis yang tidak sehat atas setiap produk yang akan dijual di GelarUkm.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-mail-reply-all\"></span>\r\n                <h4>PENGEMBALIAN BARANG</h4>\r\n                <p>Beberapa hal yang menjadi ketentuan di situs GelarUkm dalam hal Pengembalian Barang/Uang;<br><br>\r\nBarang yang di beli dan di terima oleh Pembeli terbukti rusak karena proses pengiriman artinya pada saat pembeli menerima barang dari GelarUkm maka pembeli harus segera mengirimkan foto kerusakan barang tersebut pada saat itu juga melalui whatsapp, bbm, atau email GelarUkm dan kemudian untuk mengirimkan kembali ke alamat penerimaan barang situs GelarUkm yang ditentukan 1x24 jam sejak diterimanya barang oleh pembeli.<br><br>\r\nBarang yang dibeli melalui situs GelarUkm terbukti proses pengiriman barangnya tidak sampai ke alamat yang dituju (alamat yang diberikan oleh pembeli).<br><br>\r\nGelarUkm tidak dapat menyediakan barang yang telah dibayar oleh pembeli sampai batas waktu yang telah ditentukan dan disepakati.<br><br>\r\nKelebihan pembayaran yang dilakukan saat membeli barang-barang di situs GelarUkm<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"material-design-world96\"></span>\r\n                <h4>Force Majeur </h4>\r\n                <p>GelarUkm termasuk Komisaris, Direktur dan karyawan dari GelarUkm tidak bertanggung jawab terhadap keadaan yang dapat menyebabkan keterlambatan, pelanggaran, kegagalan atau apapun dalam memenuhi semua kewajibannya yang disebabkan diluar wewenang / kendali kami seperti bencana alam, gempa bumi, longsor, kebakaran, banjir, perang, serangan teroris, huru-hara, pemogokan, <strong>kecelakaan alat transportasi darat, laut dan udara yang disebabkan oleh gangguan cuaca/alam sehingga tidak dapat melakukan pengiriman, perubahan Undang-Undang atau peraturan dibawahnya dan atau kebijakan/peraturan/pembatasan oleh pemerintah dan perubahan tata ruang dan wilayah suatu daerah</strong>.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"material-design-screen47\"></span>\r\n                <h4>PEMBERITAHUAN</h4>\r\n                <p>Segala sesuatu yang ada dalam situs GelarUkm dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya termasuk didalamnya barang, harga, syarat dan ketentuan yang berlaku didalam situs GelarUkm. <br><br>\r\nPengguna yang menggunakan atau mengakses layanan melalui situs GelarUkm dianggap telah mengerti dan menyetujui semua syarat dan ketentuan yang diberlakukan oleh GelarUkm.<br><br>\r\nKami tidak bertanggung jawab terhadap gangguan layanan situs GelarUkm, pengiriman barang, kerugian/kelalain dari pengguna, kualitas barang, pelanggaran Hak dan Kekayaan Intelektual, penyalahgunaan barang yang telah dibeli, kerusakan alat komunikasi atau alat elektronik lainnya baik itu yang disebabkan oleh virus ataupun yang disebabkan hal lainnya akibat dari mengakses situs GelarUkm, adanya tindakan orang lain yang melakukan peratasan,  dan hal lainnya diluar dari kendalai dan pengawasan GelarUkm.\r\n<br><br>\r\n</p>\r\n                </li>\r\n                </ul>\r\n                </div></div>            \r\n            </div>','admin','2016-09-27 10:53:01',NULL),
	(0,'<div class=\"row\">\r\n                <div class=\"std\" xss=removed><div class=\"custom-page custom-style-2\">\r\n                <div class=\"page-title title-big without-border\">\r\n                </div>\r\n                <div class=\"a-center\">\r\n                <p>Dalam melakukan aktivitas di website kami, pengguna diwajibkan untuk membaca dan memahami syarat dan ketentuan yang berlaku di www.gelarukm.com, apabila pengguna masih menggunakan dan melakukan aktivitas di situs www.gelarukm.com maka pengguna telah membaca, mengerti, memahami dan menyetujui semua isi dalam Syarat dan Ketentuan yang berlaku dalam situs www.gelarukm.com, tapi jika pengguna tidak menyetujui syarat dan ketentuan yang berlaku dalam situs www.gelarukm.com maka pengguna tidak diperkenankan untuk menggunakan dan melakukan aktivitas di situs www.gelarukm.com.<br><br>\r\n                Dengan ini kami sampaikan syarat dan Ketentuan yang berlaku di Situs www.gelarukm.com, sebagai berikut;\r\n                </p>\r\n                \r\n                </div>\r\n                <div>&lt;!-- class=\"bg-without\" --&gt;\r\n                <ul class=\"custom-pag-list\">\r\n                <li>\r\n                <span class=\"material-design-list88\"></span>\r\n                <h4>DIFINISI</h4>\r\n                <p>www.gelarukm.com merupakan situs layanan online dalam memasarkan dan menjual produk-produk yang berhubungan dengan Usaha Mikro Kecil Menengah dan Koperasi yang selanjutnya disebut GelarUkm.<br><br>\r\n                  Pengguna merupakan Pihak yang menggunakan layanan GelarUkm.<br>\r\n                  <br>\r\n                  Pembeli merupakan Pengguna yang terdaftar untuk melakukan transaksi produk-produk/barang-barang yang dijual melalui GelarUkm.<br><br>\r\n                  Pembayaran merupakan Harga yang telah disepakati dan disetujui dari transaksi pembelian yang dilakukan melalui GelarUkm oleh pembeli dengan mentransfer sejumlah uang melalui rekening yang telah ditetapkan/tercantum dalam GelarUkm.<br><br>\r\n                  <strong>Rupiah merupakan mata uang yang digunakan dalam mekanisme pembayaran setiap produk yang dibeli melalui GelarUkm</strong>.<br>\r\n                  <br>\r\n                  Produk merupakan barang/jasa <strong>yang sifatnya halal dan tidak melanggar peraturan hukum dan Kesusilaan </strong>yang dijual melalui GelarUkm.<br>\r\n                  <br>\r\n                  UMKMK merupakan Usaha Mikro Kecil Menengah dan Koperasi yang menjual produknya disitus GelarUkm.<br>\r\n                  <br>\r\n                  <strong>Asuransi merupakan pengalihan risiko atas kerusakan produk dalam proses pengiriman produk ke alamat Pembeli</strong>.<br>\r\n                  <br>\r\n                  Setiap Penggguna dan Pembeli telah menyetujui dan menyepakati semua aturan-aturan yang telah ditetapkan oleh GelarUkm melalui syarat dan ketentuan ini.<br>\r\n                  <br>\r\n                  Syarat dan ketentuan ini dapat berubah-ubah sewaktu-waktu tanpa pemberitahuan sebelumnya.<br><br>\r\n                  <strong>Semua sengketa yang ada di antara para pihak akan dihadirkan di hadapan pengadilan negeri di tempat domisili GelarUkm yang telah mengkonfirmasi pemesanan, kecuali GelarUkm memilih forum lain yang lebih kompeten. Semua perjanjian antara GelarUkm dan PEMBELI tunduk pada hukum Negara Indonesia dimana entitas GelarUkm telah terdaftar.</strong></p>\r\n                <p> </p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-gift\"></span>\r\n                <h4>PRODUK</h4>\r\n                <p>Produk yang dijual melalui GelarUkm tidak hanya berupa barang-barang UMKMK tetapi juga dalam bentuk jasa<br><br>\r\nJasa yang ditawarkan melalui GelarUkm adalah jasa pelatihan-pelatihan terhadap UMKMK, Jasa pelatihan terhadap SDM-SDM perusahaan, <strong>Jasa pengurusan Merk Dagang, Hak Paten dan atau Hak Kekayaan Intektual lainnya,</strong> team building dalam bentuk Outbond dan Jasa program pemberdayaan masyarakat melalui dana-dana CSR ataupun dana lembaga donor.<br><br>\r\nBarang-barang yang dijual merupakan barang-barang dari para UMKMK di Indonesia dan tidak menutup kemungkinan juga berasal dari luar Indonesia.<br><br>\r\nBarang-barang yang di jual di situs GelarUkm tidak selalu tersedia stocknya sehingga pembeli harus bersabar untuk menunggu barang yang dibeli sampai di terima oleh pembeli mengingat barang-barang yang dijual oleh situs GelarUkm merupakan barang-barang UMKMK yang kebanyakan harus di produksi ulang berdasarkan permintaan.<br><br>\r\nPenjualan barang diakukan dengan sistem grosir dan eceran. <br><br>\r\nAdapun jenis barang yang dijual grosir atau eceran tercantum dalam GelarUkm. <br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-money\"></span>\r\n                <h4>HARGA</h4>\r\n                <p>Harga barang yang terdapat dalam situs GelarUkm merupakan harga barang eceran ataupun grosir sesuai dengan jenis barang yang dijual.<br><br>\r\nHarga barang yang tercantum dalam situs GelarUkm belum termasuk Biaya Ongkos Kirim dan biaya-biaya lain yang mungkin timbul (akan dijelaskan secara rinci pada saat transaksi pembelian).<br><br>\r\nHarga Jasa Pelatihan dan Jasa Program yang tercantum dalam situs GelarUkm belum termasuk biaya pajak (PPn dan PPh).<br><br>\r\nHarga dapat berubah-ubah sewaktu-waktu tanpa pemberitahuan sebelumnya.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-shopping-basket\"></span>\r\n                <h4>ATURAN DALAM MELAKUKAN PEMBELIAN</h4>\r\n                <p>Pembeli harus terdaftar dalam GelarUkm<br><br>\r\nPembeli melakukan transaksi pembelian berdasarkan syarat dan ketentuan yang telah ditetapkan oleh GelarUkm.<br><br>\r\nPembeli wajib untuk melakukan transfer terlebih dahulu sesuai harga barang yang dipesan/dibeli melalui GelarUkm.<br><br>\r\nPembayaran/Transfer paling lambat  1 x 24 jam, apabila lewat dari 1 x 24 jam maka pesanan yang telah dipesan/dibeli dianggap batal secara otomatis.<br><br>\r\nApabila pembeli ingin memesan/membeli kembali barang yang telah dibatalkan secara otomatis sebelumnya maka pembeli wajib memesan/membeli kembali dan melalui GelarUkm sesuai dengan syarat dan ketentuan yang telah dietapkan oleh GelarUkm selama barang yang dipesan/dibeli masih ada persediaannya.<br><br>\r\nBarang-barang yang telah dibeli tidak dapat dikembalikan ataupun diganti dengan barang lain kecuali penjelasan detail pada bagian ATURAN PENGEMBALIAN BARANG/ RETURN POLICY.<br><br>\r\n</p>\r\n                </li>\r\n                </ul>\r\n                </div><br><br><br>\r\n                <ul class=\"custom-pag-list color-2\">\r\n                <li>\r\n                <span class=\"material-design-credit98\"></span>\r\n                <h4>ATURAN DALAM MELAKUKAN PENJUALAN</h4>\r\n                <p>Saat ini sistem penjualan masih dilakukan oleh admin GelarUkm dimana penjual wajib terdaftar dalam situs GelarUkm yang kemudian mengirimkan jenis produk melalui gambar dalam bentuk *.png, gambaran produk, dan harga. <br><br>\r\nProduk yang kami anggap baik akan kami tampilkan untuk dijual melalui situs GelarUkm.<br><br>\r\nKami berhak menolak untuk menampilkan produk penjual.<br><br>\r\nProduk yang ditolak oleh admin GelarUkm akan dihapus.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-ban\"></span>\r\n                <h4>HAL HAL YANG DILARANG</h4>\r\n                <p>Pengguna dilarang keras melakukan penyalahgunaan situs GelarUkm<br><br>\r\nPengguna dilarang melakukan manipulasi sistem yang ada di GelarUkm baik itu berupa barang, penambahan dan atau pengurangan konten, dan apapun yang bertentangan dengan melakukan penyalahgunaan yang ada di situs GelarUkm.<br><br>\r\nPengguna dilarang merusak atau mengirimkan gambar, tulisan, viru-virus atau apapun yang dapat mengganggu dan merusak sistem GelarUkm.<br><br>\r\nPengguna dilarang menggunakan isi konten yang berada di situs GelarUkm untuk menduplikasi ataupun untuk kepentingan pengguna diluar penggunaan dalam situs GelarUkm.<br>\r\n<br>\r\nPengguna dilarang menyebarkan gambar dan kata-kata yang memicu persaingan bisnis yang tidak sehat atas setiap produk yang akan dijual di GelarUkm.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-mail-reply-all\"></span>\r\n                <h4>PENGEMBALIAN BARANG</h4>\r\n                <p>Beberapa hal yang menjadi ketentuan di situs GelarUkm dalam hal Pengembalian Barang/Uang;<br><br>\r\nBarang yang di beli dan di terima oleh Pembeli terbukti rusak karena proses pengiriman artinya pada saat pembeli menerima barang dari GelarUkm maka pembeli harus segera mengirimkan foto kerusakan barang tersebut pada saat itu juga melalui whatsapp, bbm, atau email GelarUkm dan kemudian untuk mengirimkan kembali ke alamat penerimaan barang situs GelarUkm yang ditentukan 1x24 jam sejak diterimanya barang oleh pembeli.<br><br>\r\nBarang yang dibeli melalui situs GelarUkm terbukti proses pengiriman barangnya tidak sampai ke alamat yang dituju (alamat yang diberikan oleh pembeli).<br><br>\r\nGelarUkm tidak dapat menyediakan barang yang telah dibayar oleh pembeli sampai batas waktu yang telah ditentukan dan disepakati.<br><br>\r\nKelebihan pembayaran yang dilakukan saat membeli barang-barang di situs GelarUkm<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"material-design-world96\"></span>\r\n                <h4>Force Majeur </h4>\r\n                <p>GelarUkm termasuk Komisaris, Direktur dan karyawan dari GelarUkm tidak bertanggung jawab terhadap keadaan yang dapat menyebabkan keterlambatan, pelanggaran, kegagalan atau apapun dalam memenuhi semua kewajibannya yang disebabkan diluar wewenang / kendali kami seperti bencana alam, gempa bumi, longsor, kebakaran, banjir, perang, serangan teroris, huru-hara, pemogokan, <strong>kecelakaan alat transportasi darat, laut dan udara yang disebabkan oleh gangguan cuaca/alam sehingga tidak dapat melakukan pengiriman, perubahan Undang-Undang atau peraturan dibawahnya dan atau kebijakan/peraturan/pembatasan oleh pemerintah dan perubahan tata ruang dan wilayah suatu daerah</strong>.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"material-design-screen47\"></span>\r\n                <h4>PEMBERITAHUAN</h4>\r\n                <p>Segala sesuatu yang ada dalam situs GelarUkm dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya termasuk didalamnya barang, harga, syarat dan ketentuan yang berlaku didalam situs GelarUkm. <br><br>\r\nPengguna yang menggunakan atau mengakses layanan melalui situs GelarUkm dianggap telah mengerti dan menyetujui semua syarat dan ketentuan yang diberlakukan oleh GelarUkm.<br><br>\r\nKami tidak bertanggung jawab terhadap gangguan layanan situs GelarUkm, pengiriman barang, kerugian/kelalain dari pengguna, kualitas barang, pelanggaran Hak dan Kekayaan Intelektual, penyalahgunaan barang yang telah dibeli, kerusakan alat komunikasi atau alat elektronik lainnya baik itu yang disebabkan oleh virus ataupun yang disebabkan hal lainnya akibat dari mengakses situs GelarUkm, adanya tindakan orang lain yang melakukan peratasan,  dan hal lainnya diluar dari kendalai dan pengawasan GelarUkm.\r\n<br><br>\r\n</p>\r\n                </li>\r\n                </ul>\r\n                </div></div>            \r\n            </div>',NULL,'2019-07-26 07:15:18',NULL),
	(0,'<div class=\"row\">\r\n                <div class=\"std\" xss=removed><div class=\"custom-page custom-style-2\">\r\n                <div class=\"page-title title-big without-border\">\r\n                </div>\r\n                <div class=\"a-center\">\r\n                <p>Dalam melakukan aktivitas di website kami, pengguna diwajibkan untuk membaca dan memahami syarat dan ketentuan yang berlaku di www.gelarukm.com, apabila pengguna masih menggunakan dan melakukan aktivitas di situs www.gelarukm.com maka pengguna telah membaca, mengerti, memahami dan menyetujui semua isi dalam Syarat dan Ketentuan yang berlaku dalam situs www.gelarukm.com, tapi jika pengguna tidak menyetujui syarat dan ketentuan yang berlaku dalam situs www.gelarukm.com maka pengguna tidak diperkenankan untuk menggunakan dan melakukan aktivitas di situs www.gelarukm.com.<br><br>\r\n                Dengan ini kami sampaikan syarat dan Ketentuan yang berlaku di Situs www.gelarukm.com, sebagai berikut;\r\n                </p>\r\n                \r\n                </div>\r\n                <div>&lt;!-- class=\"bg-without\" --&gt;\r\n                <ul class=\"custom-pag-list\">\r\n                <li>\r\n                <span class=\"material-design-list88\"></span>\r\n                <h4>DIFINISI</h4>\r\n                <p>www.gelarukm.com merupakan situs layanan online dalam memasarkan dan menjual produk-produk yang berhubungan dengan Usaha Mikro Kecil Menengah dan Koperasi yang selanjutnya disebut GelarUkm.<br><br>\r\n                  Pengguna merupakan Pihak yang menggunakan layanan GelarUkm.<br>\r\n                  <br>\r\n                  Pembeli merupakan Pengguna yang terdaftar untuk melakukan transaksi produk-produk/barang-barang yang dijual melalui GelarUkm.<br><br>\r\n                  Pembayaran merupakan Harga yang telah disepakati dan disetujui dari transaksi pembelian yang dilakukan melalui GelarUkm oleh pembeli dengan mentransfer sejumlah uang melalui rekening yang telah ditetapkan/tercantum dalam GelarUkm.<br><br>\r\n                  <strong>Rupiah merupakan mata uang yang digunakan dalam mekanisme pembayaran setiap produk yang dibeli melalui GelarUkm</strong>.<br>\r\n                  <br>\r\n                  Produk merupakan barang/jasa <strong>yang sifatnya halal dan tidak melanggar peraturan hukum dan Kesusilaan </strong>yang dijual melalui GelarUkm.<br>\r\n                  <br>\r\n                  UMKMK merupakan Usaha Mikro Kecil Menengah dan Koperasi yang menjual produknya disitus GelarUkm.<br>\r\n                  <br>\r\n                  <strong>Asuransi merupakan pengalihan risiko atas kerusakan produk dalam proses pengiriman produk ke alamat Pembeli</strong>.<br>\r\n                  <br>\r\n                  Setiap Penggguna dan Pembeli telah menyetujui dan menyepakati semua aturan-aturan yang telah ditetapkan oleh GelarUkm melalui syarat dan ketentuan ini.<br>\r\n                  <br>\r\n                  Syarat dan ketentuan ini dapat berubah-ubah sewaktu-waktu tanpa pemberitahuan sebelumnya.<br><br>\r\n                  <strong>Semua sengketa yang ada di antara para pihak akan dihadirkan di hadapan pengadilan negeri di tempat domisili GelarUkm yang telah mengkonfirmasi pemesanan, kecuali GelarUkm memilih forum lain yang lebih kompeten. Semua perjanjian antara GelarUkm dan PEMBELI tunduk pada hukum Negara Indonesia dimana entitas GelarUkm telah terdaftar.</strong></p>\r\n                <p> </p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-gift\"></span>\r\n                <h4>PRODUK</h4>\r\n                <p>Produk yang dijual melalui GelarUkm tidak hanya berupa barang-barang UMKMK tetapi juga dalam bentuk jasa<br><br>\r\nJasa yang ditawarkan melalui GelarUkm adalah jasa pelatihan-pelatihan terhadap UMKMK, Jasa pelatihan terhadap SDM-SDM perusahaan, <strong>Jasa pengurusan Merk Dagang, Hak Paten dan atau Hak Kekayaan Intektual lainnya,</strong> team building dalam bentuk Outbond dan Jasa program pemberdayaan masyarakat melalui dana-dana CSR ataupun dana lembaga donor.<br><br>\r\nBarang-barang yang dijual merupakan barang-barang dari para UMKMK di Indonesia dan tidak menutup kemungkinan juga berasal dari luar Indonesia.<br><br>\r\nBarang-barang yang di jual di situs GelarUkm tidak selalu tersedia stocknya sehingga pembeli harus bersabar untuk menunggu barang yang dibeli sampai di terima oleh pembeli mengingat barang-barang yang dijual oleh situs GelarUkm merupakan barang-barang UMKMK yang kebanyakan harus di produksi ulang berdasarkan permintaan.<br><br>\r\nPenjualan barang diakukan dengan sistem grosir dan eceran. <br><br>\r\nAdapun jenis barang yang dijual grosir atau eceran tercantum dalam GelarUkm. <br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-money\"></span>\r\n                <h4>HARGA</h4>\r\n                <p>Harga barang yang terdapat dalam situs GelarUkm merupakan harga barang eceran ataupun grosir sesuai dengan jenis barang yang dijual.<br><br>\r\nHarga barang yang tercantum dalam situs GelarUkm belum termasuk Biaya Ongkos Kirim dan biaya-biaya lain yang mungkin timbul (akan dijelaskan secara rinci pada saat transaksi pembelian).<br><br>\r\nHarga Jasa Pelatihan dan Jasa Program yang tercantum dalam situs GelarUkm belum termasuk biaya pajak (PPn dan PPh).<br><br>\r\nHarga dapat berubah-ubah sewaktu-waktu tanpa pemberitahuan sebelumnya.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-shopping-basket\"></span>\r\n                <h4>ATURAN DALAM MELAKUKAN PEMBELIAN</h4>\r\n                <p>Pembeli harus terdaftar dalam GelarUkm<br><br>\r\nPembeli melakukan transaksi pembelian berdasarkan syarat dan ketentuan yang telah ditetapkan oleh GelarUkm.<br><br>\r\nPembeli wajib untuk melakukan transfer terlebih dahulu sesuai harga barang yang dipesan/dibeli melalui GelarUkm.<br><br>\r\nPembayaran/Transfer paling lambat  1 x 24 jam, apabila lewat dari 1 x 24 jam maka pesanan yang telah dipesan/dibeli dianggap batal secara otomatis.<br><br>\r\nApabila pembeli ingin memesan/membeli kembali barang yang telah dibatalkan secara otomatis sebelumnya maka pembeli wajib memesan/membeli kembali dan melalui GelarUkm sesuai dengan syarat dan ketentuan yang telah dietapkan oleh GelarUkm selama barang yang dipesan/dibeli masih ada persediaannya.<br><br>\r\nBarang-barang yang telah dibeli tidak dapat dikembalikan ataupun diganti dengan barang lain kecuali penjelasan detail pada bagian ATURAN PENGEMBALIAN BARANG/ RETURN POLICY.<br><br>\r\n</p>\r\n                </li>\r\n                </ul>\r\n                </div><br><br><br>\r\n                <ul class=\"custom-pag-list color-2\">\r\n                <li>\r\n                <span class=\"material-design-credit98\"></span>\r\n                <h4>ATURAN DALAM MELAKUKAN PENJUALAN</h4>\r\n                <p>Saat ini sistem penjualan masih dilakukan oleh admin GelarUkm dimana penjual wajib terdaftar dalam situs GelarUkm yang kemudian mengirimkan jenis produk melalui gambar dalam bentuk *.png, gambaran produk, dan harga. <br><br>\r\nProduk yang kami anggap baik akan kami tampilkan untuk dijual melalui situs GelarUkm.<br><br>\r\nKami berhak menolak untuk menampilkan produk penjual.<br><br>\r\nProduk yang ditolak oleh admin GelarUkm akan dihapus.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-ban\"></span>\r\n                <h4>HAL HAL YANG DILARANG</h4>\r\n                <p>Pengguna dilarang keras melakukan penyalahgunaan situs GelarUkm<br><br>\r\nPengguna dilarang melakukan manipulasi sistem yang ada di GelarUkm baik itu berupa barang, penambahan dan atau pengurangan konten, dan apapun yang bertentangan dengan melakukan penyalahgunaan yang ada di situs GelarUkm.<br><br>\r\nPengguna dilarang merusak atau mengirimkan gambar, tulisan, viru-virus atau apapun yang dapat mengganggu dan merusak sistem GelarUkm.<br><br>\r\nPengguna dilarang menggunakan isi konten yang berada di situs GelarUkm untuk menduplikasi ataupun untuk kepentingan pengguna diluar penggunaan dalam situs GelarUkm.<br>\r\n<br>\r\nPengguna dilarang menyebarkan gambar dan kata-kata yang memicu persaingan bisnis yang tidak sehat atas setiap produk yang akan dijual di GelarUkm.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-mail-reply-all\"></span>\r\n                <h4>PENGEMBALIAN BARANG</h4>\r\n                <p>Beberapa hal yang menjadi ketentuan di situs GelarUkm dalam hal Pengembalian Barang/Uang;<br><br>\r\nBarang yang di beli dan di terima oleh Pembeli terbukti rusak karena proses pengiriman artinya pada saat pembeli menerima barang dari GelarUkm maka pembeli harus segera mengirimkan foto kerusakan barang tersebut pada saat itu juga melalui whatsapp, bbm, atau email GelarUkm dan kemudian untuk mengirimkan kembali ke alamat penerimaan barang situs GelarUkm yang ditentukan 1x24 jam sejak diterimanya barang oleh pembeli.<br><br>\r\nBarang yang dibeli melalui situs GelarUkm terbukti proses pengiriman barangnya tidak sampai ke alamat yang dituju (alamat yang diberikan oleh pembeli).<br><br>\r\nGelarUkm tidak dapat menyediakan barang yang telah dibayar oleh pembeli sampai batas waktu yang telah ditentukan dan disepakati.<br><br>\r\nKelebihan pembayaran yang dilakukan saat membeli barang-barang di situs GelarUkm<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"material-design-world96\"></span>\r\n                <h4>Force Majeur </h4>\r\n                <p>GelarUkm termasuk Komisaris, Direktur dan karyawan dari GelarUkm tidak bertanggung jawab terhadap keadaan yang dapat menyebabkan keterlambatan, pelanggaran, kegagalan atau apapun dalam memenuhi semua kewajibannya yang disebabkan diluar wewenang / kendali kami seperti bencana alam, gempa bumi, longsor, kebakaran, banjir, perang, serangan teroris, huru-hara, pemogokan, <strong>kecelakaan alat transportasi darat, laut dan udara yang disebabkan oleh gangguan cuaca/alam sehingga tidak dapat melakukan pengiriman, perubahan Undang-Undang atau peraturan dibawahnya dan atau kebijakan/peraturan/pembatasan oleh pemerintah dan perubahan tata ruang dan wilayah suatu daerah</strong>.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"material-design-screen47\"></span>\r\n                <h4>PEMBERITAHUAN</h4>\r\n                <p>Segala sesuatu yang ada dalam situs GelarUkm dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya termasuk didalamnya barang, harga, syarat dan ketentuan yang berlaku didalam situs GelarUkm. <br><br>\r\nPengguna yang menggunakan atau mengakses layanan melalui situs GelarUkm dianggap telah mengerti dan menyetujui semua syarat dan ketentuan yang diberlakukan oleh GelarUkm.<br><br>\r\nKami tidak bertanggung jawab terhadap gangguan layanan situs GelarUkm, pengiriman barang, kerugian/kelalain dari pengguna, kualitas barang, pelanggaran Hak dan Kekayaan Intelektual, penyalahgunaan barang yang telah dibeli, kerusakan alat komunikasi atau alat elektronik lainnya baik itu yang disebabkan oleh virus ataupun yang disebabkan hal lainnya akibat dari mengakses situs GelarUkm, adanya tindakan orang lain yang melakukan peratasan,  dan hal lainnya diluar dari kendalai dan pengawasan GelarUkm.\r\n<br><br>\r\n</p>\r\n                </li>\r\n                </ul>\r\n                </div></div>            \r\n            </div>',NULL,'2019-07-26 07:15:28',NULL),
	(0,'<div class=\"row\">\r\n                <div class=\"std\" xss=removed><div class=\"custom-page custom-style-2\">\r\n                <div class=\"page-title title-big without-border\">\r\n                </div>\r\n                <div class=\"a-center\">\r\n                <p>Dalam melakukan aktivitas di website kami, pengguna diwajibkan untuk membaca dan memahami syarat dan ketentuan yang berlaku di www.gelarukm.com, apabila pengguna masih menggunakan dan melakukan aktivitas di situs www.gelarukm.com maka pengguna telah membaca, mengerti, memahami dan menyetujui semua isi dalam Syarat dan Ketentuan yang berlaku dalam situs www.gelarukm.com, tapi jika pengguna tidak menyetujui syarat dan ketentuan yang berlaku dalam situs www.gelarukm.com maka pengguna tidak diperkenankan untuk menggunakan dan melakukan aktivitas di situs www.gelarukm.com.<br><br>\r\n                Dengan ini kami sampaikan syarat dan Ketentuan yang berlaku di Situs www.gelarukm.com, sebagai berikut;\r\n                </p>\r\n                \r\n                </div>\r\n                <div>\r\n                <ul class=\"custom-pag-list\">\r\n                <li>\r\n                <span class=\"material-design-list88\"></span>\r\n                <h4>DIFINISI</h4>\r\n                <p>www.gelarukm.com merupakan situs layanan online dalam memasarkan dan menjual produk-produk yang berhubungan dengan Usaha Mikro Kecil Menengah dan Koperasi yang selanjutnya disebut GelarUkm.<br><br>\r\n                  Pengguna merupakan Pihak yang menggunakan layanan GelarUkm.<br>\r\n                  <br>\r\n                  Pembeli merupakan Pengguna yang terdaftar untuk melakukan transaksi produk-produk/barang-barang yang dijual melalui GelarUkm.<br><br>\r\n                  Pembayaran merupakan Harga yang telah disepakati dan disetujui dari transaksi pembelian yang dilakukan melalui GelarUkm oleh pembeli dengan mentransfer sejumlah uang melalui rekening yang telah ditetapkan/tercantum dalam GelarUkm.<br><br>\r\n                  <strong>Rupiah merupakan mata uang yang digunakan dalam mekanisme pembayaran setiap produk yang dibeli melalui GelarUkm</strong>.<br>\r\n                  <br>\r\n                  Produk merupakan barang/jasa <strong>yang sifatnya halal dan tidak melanggar peraturan hukum dan Kesusilaan </strong>yang dijual melalui GelarUkm.<br>\r\n                  <br>\r\n                  UMKMK merupakan Usaha Mikro Kecil Menengah dan Koperasi yang menjual produknya disitus GelarUkm.<br>\r\n                  <br>\r\n                  <strong>Asuransi merupakan pengalihan risiko atas kerusakan produk dalam proses pengiriman produk ke alamat Pembeli</strong>.<br>\r\n                  <br>\r\n                  Setiap Penggguna dan Pembeli telah menyetujui dan menyepakati semua aturan-aturan yang telah ditetapkan oleh GelarUkm melalui syarat dan ketentuan ini.<br>\r\n                  <br>\r\n                  Syarat dan ketentuan ini dapat berubah-ubah sewaktu-waktu tanpa pemberitahuan sebelumnya.<br><br>\r\n                  <strong>Semua sengketa yang ada di antara para pihak akan dihadirkan di hadapan pengadilan negeri di tempat domisili GelarUkm yang telah mengkonfirmasi pemesanan, kecuali GelarUkm memilih forum lain yang lebih kompeten. Semua perjanjian antara GelarUkm dan PEMBELI tunduk pada hukum Negara Indonesia dimana entitas GelarUkm telah terdaftar.</strong></p>\r\n                <p> </p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-gift\"></span>\r\n                <h4>PRODUK</h4>\r\n                <p>Produk yang dijual melalui GelarUkm tidak hanya berupa barang-barang UMKMK tetapi juga dalam bentuk jasa<br><br>\r\nJasa yang ditawarkan melalui GelarUkm adalah jasa pelatihan-pelatihan terhadap UMKMK, Jasa pelatihan terhadap SDM-SDM perusahaan, <strong>Jasa pengurusan Merk Dagang, Hak Paten dan atau Hak Kekayaan Intektual lainnya,</strong> team building dalam bentuk Outbond dan Jasa program pemberdayaan masyarakat melalui dana-dana CSR ataupun dana lembaga donor.<br><br>\r\nBarang-barang yang dijual merupakan barang-barang dari para UMKMK di Indonesia dan tidak menutup kemungkinan juga berasal dari luar Indonesia.<br><br>\r\nBarang-barang yang di jual di situs GelarUkm tidak selalu tersedia stocknya sehingga pembeli harus bersabar untuk menunggu barang yang dibeli sampai di terima oleh pembeli mengingat barang-barang yang dijual oleh situs GelarUkm merupakan barang-barang UMKMK yang kebanyakan harus di produksi ulang berdasarkan permintaan.<br><br>\r\nPenjualan barang diakukan dengan sistem grosir dan eceran. <br><br>\r\nAdapun jenis barang yang dijual grosir atau eceran tercantum dalam GelarUkm. <br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-money\"></span>\r\n                <h4>HARGA</h4>\r\n                <p>Harga barang yang terdapat dalam situs GelarUkm merupakan harga barang eceran ataupun grosir sesuai dengan jenis barang yang dijual.<br><br>\r\nHarga barang yang tercantum dalam situs GelarUkm belum termasuk Biaya Ongkos Kirim dan biaya-biaya lain yang mungkin timbul (akan dijelaskan secara rinci pada saat transaksi pembelian).<br><br>\r\nHarga Jasa Pelatihan dan Jasa Program yang tercantum dalam situs GelarUkm belum termasuk biaya pajak (PPn dan PPh).<br><br>\r\nHarga dapat berubah-ubah sewaktu-waktu tanpa pemberitahuan sebelumnya.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-shopping-basket\"></span>\r\n                <h4>ATURAN DALAM MELAKUKAN PEMBELIAN</h4>\r\n                <p>Pembeli harus terdaftar dalam GelarUkm<br><br>\r\nPembeli melakukan transaksi pembelian berdasarkan syarat dan ketentuan yang telah ditetapkan oleh GelarUkm.<br><br>\r\nPembeli wajib untuk melakukan transfer terlebih dahulu sesuai harga barang yang dipesan/dibeli melalui GelarUkm.<br><br>\r\nPembayaran/Transfer paling lambat  1 x 24 jam, apabila lewat dari 1 x 24 jam maka pesanan yang telah dipesan/dibeli dianggap batal secara otomatis.<br><br>\r\nApabila pembeli ingin memesan/membeli kembali barang yang telah dibatalkan secara otomatis sebelumnya maka pembeli wajib memesan/membeli kembali dan melalui GelarUkm sesuai dengan syarat dan ketentuan yang telah dietapkan oleh GelarUkm selama barang yang dipesan/dibeli masih ada persediaannya.<br><br>\r\nBarang-barang yang telah dibeli tidak dapat dikembalikan ataupun diganti dengan barang lain kecuali penjelasan detail pada bagian ATURAN PENGEMBALIAN BARANG/ RETURN POLICY.<br><br>\r\n</p>\r\n                </li>\r\n                </ul>\r\n                </div><br><br><br>\r\n                <ul class=\"custom-pag-list color-2\">\r\n                <li>\r\n                <span class=\"material-design-credit98\"></span>\r\n                <h4>ATURAN DALAM MELAKUKAN PENJUALAN</h4>\r\n                <p>Saat ini sistem penjualan masih dilakukan oleh admin GelarUkm dimana penjual wajib terdaftar dalam situs GelarUkm yang kemudian mengirimkan jenis produk melalui gambar dalam bentuk *.png, gambaran produk, dan harga. <br><br>\r\nProduk yang kami anggap baik akan kami tampilkan untuk dijual melalui situs GelarUkm.<br><br>\r\nKami berhak menolak untuk menampilkan produk penjual.<br><br>\r\nProduk yang ditolak oleh admin GelarUkm akan dihapus.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-ban\"></span>\r\n                <h4>HAL HAL YANG DILARANG</h4>\r\n                <p>Pengguna dilarang keras melakukan penyalahgunaan situs GelarUkm<br><br>\r\nPengguna dilarang melakukan manipulasi sistem yang ada di GelarUkm baik itu berupa barang, penambahan dan atau pengurangan konten, dan apapun yang bertentangan dengan melakukan penyalahgunaan yang ada di situs GelarUkm.<br><br>\r\nPengguna dilarang merusak atau mengirimkan gambar, tulisan, viru-virus atau apapun yang dapat mengganggu dan merusak sistem GelarUkm.<br><br>\r\nPengguna dilarang menggunakan isi konten yang berada di situs GelarUkm untuk menduplikasi ataupun untuk kepentingan pengguna diluar penggunaan dalam situs GelarUkm.<br>\r\n<br>\r\nPengguna dilarang menyebarkan gambar dan kata-kata yang memicu persaingan bisnis yang tidak sehat atas setiap produk yang akan dijual di GelarUkm.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"fa fa-mail-reply-all\"></span>\r\n                <h4>PENGEMBALIAN BARANG</h4>\r\n                <p>Beberapa hal yang menjadi ketentuan di situs GelarUkm dalam hal Pengembalian Barang/Uang;<br><br>\r\nBarang yang di beli dan di terima oleh Pembeli terbukti rusak karena proses pengiriman artinya pada saat pembeli menerima barang dari GelarUkm maka pembeli harus segera mengirimkan foto kerusakan barang tersebut pada saat itu juga melalui whatsapp, bbm, atau email GelarUkm dan kemudian untuk mengirimkan kembali ke alamat penerimaan barang situs GelarUkm yang ditentukan 1x24 jam sejak diterimanya barang oleh pembeli.<br><br>\r\nBarang yang dibeli melalui situs GelarUkm terbukti proses pengiriman barangnya tidak sampai ke alamat yang dituju (alamat yang diberikan oleh pembeli).<br><br>\r\nGelarUkm tidak dapat menyediakan barang yang telah dibayar oleh pembeli sampai batas waktu yang telah ditentukan dan disepakati.<br><br>\r\nKelebihan pembayaran yang dilakukan saat membeli barang-barang di situs GelarUkm<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"material-design-world96\"></span>\r\n                <h4>Force Majeur </h4>\r\n                <p>GelarUkm termasuk Komisaris, Direktur dan karyawan dari GelarUkm tidak bertanggung jawab terhadap keadaan yang dapat menyebabkan keterlambatan, pelanggaran, kegagalan atau apapun dalam memenuhi semua kewajibannya yang disebabkan diluar wewenang / kendali kami seperti bencana alam, gempa bumi, longsor, kebakaran, banjir, perang, serangan teroris, huru-hara, pemogokan, <strong>kecelakaan alat transportasi darat, laut dan udara yang disebabkan oleh gangguan cuaca/alam sehingga tidak dapat melakukan pengiriman, perubahan Undang-Undang atau peraturan dibawahnya dan atau kebijakan/peraturan/pembatasan oleh pemerintah dan perubahan tata ruang dan wilayah suatu daerah</strong>.<br><br>\r\n</p>\r\n                </li>\r\n                <li>\r\n                <span class=\"material-design-screen47\"></span>\r\n                <h4>PEMBERITAHUAN</h4>\r\n                <p>Segala sesuatu yang ada dalam situs GelarUkm dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya termasuk didalamnya barang, harga, syarat dan ketentuan yang berlaku didalam situs GelarUkm. <br><br>\r\nPengguna yang menggunakan atau mengakses layanan melalui situs GelarUkm dianggap telah mengerti dan menyetujui semua syarat dan ketentuan yang diberlakukan oleh GelarUkm.<br><br>\r\nKami tidak bertanggung jawab terhadap gangguan layanan situs GelarUkm, pengiriman barang, kerugian/kelalain dari pengguna, kualitas barang, pelanggaran Hak dan Kekayaan Intelektual, penyalahgunaan barang yang telah dibeli, kerusakan alat komunikasi atau alat elektronik lainnya baik itu yang disebabkan oleh virus ataupun yang disebabkan hal lainnya akibat dari mengakses situs GelarUkm, adanya tindakan orang lain yang melakukan peratasan,  dan hal lainnya diluar dari kendalai dan pengawasan GelarUkm.\r\n<br><br>\r\n</p>\r\n                </li>\r\n                </ul>\r\n                </div></div>            \r\n            </div>',NULL,'2019-07-26 07:16:25',NULL),
	(0,'<div class=\"row\">\r\n<div class=\"std\">\r\n<div class=\"custom-page custom-style-2\">\r\n<div class=\"page-title title-big without-border\"></div>\r\n<div class=\"a-center\">\r\n<p><strong>Dalam </strong>melakukan aktivitas di website kami, pengguna diwajibkan untuk membaca dan memahami syarat dan ketentuan yang berlaku di www.gelarukm.com, apabila pengguna masih menggunakan dan melakukan aktivitas di situs www.gelarukm.com maka pengguna telah membaca, mengerti, memahami dan menyetujui semua isi dalam Syarat dan Ketentuan yang berlaku dalam situs www.gelarukm.com, tapi jika pengguna tidak menyetujui syarat dan ketentuan yang berlaku dalam situs www.gelarukm.com maka pengguna tidak diperkenankan untuk menggunakan dan melakukan aktivitas di situs www.gelarukm.com.<br><br> Dengan ini kami sampaikan syarat dan Ketentuan yang berlaku di Situs www.gelarukm.com, sebagai berikut;</p>\r\n</div>\r\n<div>\r\n<ul class=\"custom-pag-list\">\r\n<li> <span class=\"material-design-list88\"> </span>\r\n<h4>DIFINISI</h4>\r\n<p>www.gelarukm.com merupakan situs layanan online dalam memasarkan dan menjual produk-produk yang berhubungan dengan Usaha Mikro Kecil Menengah dan Koperasi yang selanjutnya disebut GelarUkm.<br><br> Pengguna merupakan Pihak yang menggunakan layanan GelarUkm.<br> <br> Pembeli merupakan Pengguna yang terdaftar untuk melakukan transaksi produk-produk/barang-barang yang dijual melalui GelarUkm.<br><br> Pembayaran merupakan Harga yang telah disepakati dan disetujui dari transaksi pembelian yang dilakukan melalui GelarUkm oleh pembeli dengan mentransfer sejumlah uang melalui rekening yang telah ditetapkan/tercantum dalam GelarUkm.<br><br> <strong>Rupiah merupakan mata uang yang digunakan dalam mekanisme pembayaran setiap produk yang dibeli melalui GelarUkm</strong>.<br> <br> Produk merupakan barang/jasa <strong>yang sifatnya halal dan tidak melanggar peraturan hukum dan Kesusilaan </strong>yang dijual melalui GelarUkm.<br> <br> UMKMK merupakan Usaha Mikro Kecil Menengah dan Koperasi yang menjual produknya disitus GelarUkm.<br> <br> <strong>Asuransi merupakan pengalihan risiko atas kerusakan produk dalam proses pengiriman produk ke alamat Pembeli</strong>.<br> <br> Setiap Penggguna dan Pembeli telah menyetujui dan menyepakati semua aturan-aturan yang telah ditetapkan oleh GelarUkm melalui syarat dan ketentuan ini.<br> <br> Syarat dan ketentuan ini dapat berubah-ubah sewaktu-waktu tanpa pemberitahuan sebelumnya.<br><br> <strong>Semua sengketa yang ada di antara para pihak akan dihadirkan di hadapan pengadilan negeri di tempat domisili GelarUkm yang telah mengkonfirmasi pemesanan, kecuali GelarUkm memilih forum lain yang lebih kompeten. Semua perjanjian antara GelarUkm dan PEMBELI tunduk pada hukum Negara Indonesia dimana entitas GelarUkm telah terdaftar.</strong></p>\r\n<p> </p>\r\n</li>\r\n<li> <span class=\"fa fa-gift\"> </span>\r\n<h4>PRODUK</h4>\r\n<p>Produk yang dijual melalui GelarUkm tidak hanya berupa barang-barang UMKMK tetapi juga dalam bentuk jasa<br><br> Jasa yang ditawarkan melalui GelarUkm adalah jasa pelatihan-pelatihan terhadap UMKMK, Jasa pelatihan terhadap SDM-SDM perusahaan, <strong>Jasa pengurusan Merk Dagang, Hak Paten dan atau Hak Kekayaan Intektual lainnya,</strong> team building dalam bentuk Outbond dan Jasa program pemberdayaan masyarakat melalui dana-dana CSR ataupun dana lembaga donor.<br><br> Barang-barang yang dijual merupakan barang-barang dari para UMKMK di Indonesia dan tidak menutup kemungkinan juga berasal dari luar Indonesia.<br><br> Barang-barang yang di jual di situs GelarUkm tidak selalu tersedia stocknya sehingga pembeli harus bersabar untuk menunggu barang yang dibeli sampai di terima oleh pembeli mengingat barang-barang yang dijual oleh situs GelarUkm merupakan barang-barang UMKMK yang kebanyakan harus di produksi ulang berdasarkan permintaan.<br><br> Penjualan barang diakukan dengan sistem grosir dan eceran. <br><br> Adapun jenis barang yang dijual grosir atau eceran tercantum dalam GelarUkm. <br><br></p>\r\n</li>\r\n<li>\r\n<h4>HARGA</h4>\r\n<p>Harga barang yang terdapat dalam situs GelarUkm merupakan harga barang eceran ataupun grosir sesuai dengan jenis barang yang dijual.<br><br> Harga barang yang tercantum dalam situs GelarUkm belum termasuk Biaya Ongkos Kirim dan biaya-biaya lain yang mungkin timbul (akan dijelaskan secara rinci pada saat transaksi pembelian).<br><br> Harga Jasa Pelatihan dan Jasa Program yang tercantum dalam situs GelarUkm belum termasuk biaya pajak (PPn dan PPh).<br><br> Harga dapat berubah-ubah sewaktu-waktu tanpa pemberitahuan sebelumnya.<br><br></p>\r\n</li>\r\n<li>\r\n<h4>ATURAN DALAM MELAKUKAN PEMBELIAN</h4>\r\n<p>Pembeli harus terdaftar dalam GelarUkm<br><br> Pembeli melakukan transaksi pembelian berdasarkan syarat dan ketentuan yang telah ditetapkan oleh GelarUkm.<br><br> Pembeli wajib untuk melakukan transfer terlebih dahulu sesuai harga barang yang dipesan/dibeli melalui GelarUkm.<br><br> Pembayaran/Transfer paling lambat  1 x 24 jam, apabila lewat dari 1 x 24 jam maka pesanan yang telah dipesan/dibeli dianggap batal secara otomatis.<br><br> Apabila pembeli ingin memesan/membeli kembali barang yang telah dibatalkan secara otomatis sebelumnya maka pembeli wajib memesan/membeli kembali dan melalui GelarUkm sesuai dengan syarat dan ketentuan yang telah dietapkan oleh GelarUkm selama barang yang dipesan/dibeli masih ada persediaannya.<br><br> Barang-barang yang telah dibeli tidak dapat dikembalikan ataupun diganti dengan barang lain kecuali penjelasan detail pada bagian ATURAN PENGEMBALIAN BARANG/ RETURN POLICY.<br><br></p>\r\n</li>\r\n</ul>\r\n</div>\r\n<br><br><br> \r\n<ul class=\"custom-pag-list color-2\">\r\n<li>\r\n<h4>ATURAN DALAM MELAKUKAN PENJUALAN</h4>\r\n<p>Saat ini sistem penjualan masih dilakukan oleh admin GelarUkm dimana penjual wajib terdaftar dalam situs GelarUkm yang kemudian mengirimkan jenis produk melalui gambar dalam bentuk *.png, gambaran produk, dan harga. <br><br> Produk yang kami anggap baik akan kami tampilkan untuk dijual melalui situs GelarUkm.<br><br> Kami berhak menolak untuk menampilkan produk penjual.<br><br> Produk yang ditolak oleh admin GelarUkm akan dihapus.<br><br></p>\r\n</li>\r\n<li>\r\n<h4>HAL HAL YANG DILARANG</h4>\r\n<p>Pengguna dilarang keras melakukan penyalahgunaan situs GelarUkm<br><br> Pengguna dilarang melakukan manipulasi sistem yang ada di GelarUkm baik itu berupa barang, penambahan dan atau pengurangan konten, dan apapun yang bertentangan dengan melakukan penyalahgunaan yang ada di situs GelarUkm.<br><br> Pengguna dilarang merusak atau mengirimkan gambar, tulisan, viru-virus atau apapun yang dapat mengganggu dan merusak sistem GelarUkm.<br><br> Pengguna dilarang menggunakan isi konten yang berada di situs GelarUkm untuk menduplikasi ataupun untuk kepentingan pengguna diluar penggunaan dalam situs GelarUkm.<br> <br> Pengguna dilarang menyebarkan gambar dan kata-kata yang memicu persaingan bisnis yang tidak sehat atas setiap produk yang akan dijual di GelarUkm.<br><br></p>\r\n</li>\r\n<li>\r\n<h4>PENGEMBALIAN BARANG</h4>\r\n<p>Beberapa hal yang menjadi ketentuan di situs GelarUkm dalam hal Pengembalian Barang/Uang;<br><br> Barang yang di beli dan di terima oleh Pembeli terbukti rusak karena proses pengiriman artinya pada saat pembeli menerima barang dari GelarUkm maka pembeli harus segera mengirimkan foto kerusakan barang tersebut pada saat itu juga melalui whatsapp, bbm, atau email GelarUkm dan kemudian untuk mengirimkan kembali ke alamat penerimaan barang situs GelarUkm yang ditentukan 1x24 jam sejak diterimanya barang oleh pembeli.<br><br> Barang yang dibeli melalui situs GelarUkm terbukti proses pengiriman barangnya tidak sampai ke alamat yang dituju (alamat yang diberikan oleh pembeli).<br><br> GelarUkm tidak dapat menyediakan barang yang telah dibayar oleh pembeli sampai batas waktu yang telah ditentukan dan disepakati.<br><br> Kelebihan pembayaran yang dilakukan saat membeli barang-barang di situs GelarUkm<br><br></p>\r\n</li>\r\n<li>\r\n<h4>Force Majeur</h4>\r\n<p>GelarUkm termasuk Komisaris, Direktur dan karyawan dari GelarUkm tidak bertanggung jawab terhadap keadaan yang dapat menyebabkan keterlambatan, pelanggaran, kegagalan atau apapun dalam memenuhi semua kewajibannya yang disebabkan diluar wewenang / kendali kami seperti bencana alam, gempa bumi, longsor, kebakaran, banjir, perang, serangan teroris, huru-hara, pemogokan, <strong>kecelakaan alat transportasi darat, laut dan udara yang disebabkan oleh gangguan cuaca/alam sehingga tidak dapat melakukan pengiriman, perubahan Undang-Undang atau peraturan dibawahnya dan atau kebijakan/peraturan/pembatasan oleh pemerintah dan perubahan tata ruang dan wilayah suatu daerah</strong>.<br><br></p>\r\n</li>\r\n<li>\r\n<h4>PEMBERITAHUAN</h4>\r\n<p>Segala sesuatu yang ada dalam situs GelarUkm dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya termasuk didalamnya barang, harga, syarat dan ketentuan yang berlaku didalam situs GelarUkm. <br><br> Pengguna yang menggunakan atau mengakses layanan melalui situs GelarUkm dianggap telah mengerti dan menyetujui semua syarat dan ketentuan yang diberlakukan oleh GelarUkm.<br><br> Kami tidak bertanggung jawab terhadap gangguan layanan situs GelarUkm, pengiriman barang, kerugian/kelalain dari pengguna, kualitas barang, pelanggaran Hak dan Kekayaan Intelektual, penyalahgunaan barang yang telah dibeli, kerusakan alat komunikasi atau alat elektronik lainnya baik itu yang disebabkan oleh virus ataupun yang disebabkan hal lainnya akibat dari mengakses situs GelarUkm, adanya tindakan orang lain yang melakukan peratasan,  dan hal lainnya diluar dari kendalai dan pengawasan GelarUkm. <br><br></p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>',NULL,'2019-07-30 08:02:48',NULL),
	(0,'<div class=\"row\">\r\n<div class=\"std\">\r\n<div class=\"custom-page custom-style-2\">\r\n<div class=\"a-center\">\r\n<p><strong>Dalam </strong>melakukan aktivitas di website kami, pengguna diwajibkan untuk membaca dan memahami syarat dan ketentuan yang berlaku di www.KIKIKUKU.com, apabila pengguna masih menggunakan dan melakukan aktivitas di situs www.KIKIKUKU.com maka pengguna telah membaca, mengerti, memahami dan menyetujui semua isi dalam Syarat dan Ketentuan yang berlaku dalam situs www.KIKIKUKU.com, tapi jika pengguna tidak menyetujui syarat dan ketentuan yang berlaku dalam situs www.KIKIKUKU.com maka pengguna tidak diperkenankan untuk menggunakan dan melakukan aktivitas di situs www.KIKIKUKU.com.<br><br> Dengan ini kami sampaikan syarat dan Ketentuan yang berlaku di Situs www.KIKIKUKU.com, sebagai berikut;</p>\r\n</div>\r\n<div>\r\n<ul class=\"custom-pag-list\">\r\n<li> <span class=\"material-design-list88\"> </span>\r\n<h4>DIFINISI</h4>\r\n<p>www.KIKIKUKU.com merupakan situs layanan online dalam memasarkan dan menjual produk-produk yang berhubungan dengan Usaha Mikro Kecil Menengah dan Koperasi yang selanjutnya disebut KIKIKUKU.<br><br> Pengguna merupakan Pihak yang menggunakan layanan KIKIKUKU.<br> <br> Pembeli merupakan Pengguna yang terdaftar untuk melakukan transaksi produk-produk/barang-barang yang dijual melalui KIKIKUKU.<br><br> Pembayaran merupakan Harga yang telah disepakati dan disetujui dari transaksi pembelian yang dilakukan melalui KIKIKUKU oleh pembeli dengan mentransfer sejumlah uang melalui rekening yang telah ditetapkan/tercantum dalam KIKIKUKU.<br><br> <strong>Rupiah merupakan mata uang yang digunakan dalam mekanisme pembayaran setiap produk yang dibeli melalui KIKIKUKU</strong>.<br> <br> Produk merupakan barang/jasa <strong>yang sifatnya halal dan tidak melanggar peraturan hukum dan Kesusilaan </strong>yang dijual melalui KIKIKUKU.<br> <br> UMKMK merupakan Usaha Mikro Kecil Menengah dan Koperasi yang menjual produknya disitus KIKIKUKU.<br> <br> <strong>Asuransi merupakan pengalihan risiko atas kerusakan produk dalam proses pengiriman produk ke alamat Pembeli</strong>.<br> <br> Setiap Penggguna dan Pembeli telah menyetujui dan menyepakati semua aturan-aturan yang telah ditetapkan oleh KIKIKUKU melalui syarat dan ketentuan ini.<br> <br> Syarat dan ketentuan ini dapat berubah-ubah sewaktu-waktu tanpa pemberitahuan sebelumnya.<br><br> <strong>Semua sengketa yang ada di antara para pihak akan dihadirkan di hadapan pengadilan negeri di tempat domisili KIKIKUKU yang telah mengkonfirmasi pemesanan, kecuali KIKIKUKU memilih forum lain yang lebih kompeten. Semua perjanjian antara KIKIKUKU dan PEMBELI tunduk pada hukum Negara Indonesia dimana entitas KIKIKUKU telah terdaftar.</strong></p>\r\n<p> </p>\r\n</li>\r\n<li> <span class=\"fa fa-gift\"> </span>\r\n<h4>PRODUK</h4>\r\n<p>Produk yang dijual melalui KIKIKUKU tidak hanya berupa barang-barang UMKMK tetapi juga dalam bentuk jasa<br><br> Jasa yang ditawarkan melalui KIKIKUKU adalah jasa pelatihan-pelatihan terhadap UMKMK, Jasa pelatihan terhadap SDM-SDM perusahaan, <strong>Jasa pengurusan Merk Dagang, Hak Paten dan atau Hak Kekayaan Intektual lainnya,</strong> team building dalam bentuk Outbond dan Jasa program pemberdayaan masyarakat melalui dana-dana CSR ataupun dana lembaga donor.<br><br> Barang-barang yang dijual merupakan barang-barang dari para UMKMK di Indonesia dan tidak menutup kemungkinan juga berasal dari luar Indonesia.<br><br> Barang-barang yang di jual di situs KIKIKUKU tidak selalu tersedia stocknya sehingga pembeli harus bersabar untuk menunggu barang yang dibeli sampai di terima oleh pembeli mengingat barang-barang yang dijual oleh situs KIKIKUKU merupakan barang-barang UMKMK yang kebanyakan harus di produksi ulang berdasarkan permintaan.<br><br> Penjualan barang diakukan dengan sistem grosir dan eceran. <br><br> Adapun jenis barang yang dijual grosir atau eceran tercantum dalam KIKIKUKU. <br><br></p>\r\n</li>\r\n<li>\r\n<h4>HARGA</h4>\r\n<p>Harga barang yang terdapat dalam situs KIKIKUKU merupakan harga barang eceran ataupun grosir sesuai dengan jenis barang yang dijual.<br><br> Harga barang yang tercantum dalam situs KIKIKUKU belum termasuk Biaya Ongkos Kirim dan biaya-biaya lain yang mungkin timbul (akan dijelaskan secara rinci pada saat transaksi pembelian).<br><br> Harga Jasa Pelatihan dan Jasa Program yang tercantum dalam situs KIKIKUKU belum termasuk biaya pajak (PPn dan PPh).<br><br> Harga dapat berubah-ubah sewaktu-waktu tanpa pemberitahuan sebelumnya.<br><br></p>\r\n</li>\r\n<li>\r\n<h4>ATURAN DALAM MELAKUKAN PEMBELIAN</h4>\r\n<p>Pembeli harus terdaftar dalam KIKIKUKU<br><br> Pembeli melakukan transaksi pembelian berdasarkan syarat dan ketentuan yang telah ditetapkan oleh KIKIKUKU.<br><br> Pembeli wajib untuk melakukan transfer terlebih dahulu sesuai harga barang yang dipesan/dibeli melalui KIKIKUKU.<br><br> Pembayaran/Transfer paling lambat  1 x 24 jam, apabila lewat dari 1 x 24 jam maka pesanan yang telah dipesan/dibeli dianggap batal secara otomatis.<br><br> Apabila pembeli ingin memesan/membeli kembali barang yang telah dibatalkan secara otomatis sebelumnya maka pembeli wajib memesan/membeli kembali dan melalui KIKIKUKU sesuai dengan syarat dan ketentuan yang telah dietapkan oleh KIKIKUKU selama barang yang dipesan/dibeli masih ada persediaannya.<br><br> Barang-barang yang telah dibeli tidak dapat dikembalikan ataupun diganti dengan barang lain kecuali penjelasan detail pada bagian ATURAN PENGEMBALIAN BARANG/ RETURN POLICY.<br><br></p>\r\n</li>\r\n</ul>\r\n</div>\r\n<br><br><br> \r\n<ul class=\"custom-pag-list color-2\">\r\n<li>\r\n<h4>ATURAN DALAM MELAKUKAN PENJUALAN</h4>\r\n<p>Saat ini sistem penjualan masih dilakukan oleh admin KIKIKUKU dimana penjual wajib terdaftar dalam situs KIKIKUKU yang kemudian mengirimkan jenis produk melalui gambar dalam bentuk *.png, gambaran produk, dan harga. <br><br> Produk yang kami anggap baik akan kami tampilkan untuk dijual melalui situs KIKIKUKU.<br><br> Kami berhak menolak untuk menampilkan produk penjual.<br><br> Produk yang ditolak oleh admin KIKIKUKU akan dihapus.<br><br></p>\r\n</li>\r\n<li>\r\n<h4>HAL HAL YANG DILARANG</h4>\r\n<p>Pengguna dilarang keras melakukan penyalahgunaan situs KIKIKUKU<br><br> Pengguna dilarang melakukan manipulasi sistem yang ada di KIKIKUKU baik itu berupa barang, penambahan dan atau pengurangan konten, dan apapun yang bertentangan dengan melakukan penyalahgunaan yang ada di situs KIKIKUKU.<br><br> Pengguna dilarang merusak atau mengirimkan gambar, tulisan, viru-virus atau apapun yang dapat mengganggu dan merusak sistem KIKIKUKU.<br><br> Pengguna dilarang menggunakan isi konten yang berada di situs KIKIKUKU untuk menduplikasi ataupun untuk kepentingan pengguna diluar penggunaan dalam situs KIKIKUKU.<br> <br> Pengguna dilarang menyebarkan gambar dan kata-kata yang memicu persaingan bisnis yang tidak sehat atas setiap produk yang akan dijual di KIKIKUKU.<br><br></p>\r\n</li>\r\n<li>\r\n<h4>PENGEMBALIAN BARANG</h4>\r\n<p>Beberapa hal yang menjadi ketentuan di situs KIKIKUKU dalam hal Pengembalian Barang/Uang;<br><br> Barang yang di beli dan di terima oleh Pembeli terbukti rusak karena proses pengiriman artinya pada saat pembeli menerima barang dari KIKIKUKU maka pembeli harus segera mengirimkan foto kerusakan barang tersebut pada saat itu juga melalui whatsapp, bbm, atau email KIKIKUKU dan kemudian untuk mengirimkan kembali ke alamat penerimaan barang situs KIKIKUKU yang ditentukan 1x24 jam sejak diterimanya barang oleh pembeli.<br><br> Barang yang dibeli melalui situs KIKIKUKU terbukti proses pengiriman barangnya tidak sampai ke alamat yang dituju (alamat yang diberikan oleh pembeli).<br><br> KIKIKUKU tidak dapat menyediakan barang yang telah dibayar oleh pembeli sampai batas waktu yang telah ditentukan dan disepakati.<br><br> Kelebihan pembayaran yang dilakukan saat membeli barang-barang di situs KIKIKUKU<br><br></p>\r\n</li>\r\n<li>\r\n<h4>Force Majeur</h4>\r\n<p>KIKIKUKU termasuk Komisaris, Direktur dan karyawan dari KIKIKUKU tidak bertanggung jawab terhadap keadaan yang dapat menyebabkan keterlambatan, pelanggaran, kegagalan atau apapun dalam memenuhi semua kewajibannya yang disebabkan diluar wewenang / kendali kami seperti bencana alam, gempa bumi, longsor, kebakaran, banjir, perang, serangan teroris, huru-hara, pemogokan, <strong>kecelakaan alat transportasi darat, laut dan udara yang disebabkan oleh gangguan cuaca/alam sehingga tidak dapat melakukan pengiriman, perubahan Undang-Undang atau peraturan dibawahnya dan atau kebijakan/peraturan/pembatasan oleh pemerintah dan perubahan tata ruang dan wilayah suatu daerah</strong>.<br><br></p>\r\n</li>\r\n<li>\r\n<h4>PEMBERITAHUAN</h4>\r\n<p>Segala sesuatu yang ada dalam situs KIKIKUKU dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya termasuk didalamnya barang, harga, syarat dan ketentuan yang berlaku didalam situs KIKIKUKU. <br><br> Pengguna yang menggunakan atau mengakses layanan melalui situs KIKIKUKU dianggap telah mengerti dan menyetujui semua syarat dan ketentuan yang diberlakukan oleh KIKIKUKU.<br><br> Kami tidak bertanggung jawab terhadap gangguan layanan situs KIKIKUKU, pengiriman barang, kerugian/kelalain dari pengguna, kualitas barang, pelanggaran Hak dan Kekayaan Intelektual, penyalahgunaan barang yang telah dibeli, kerusakan alat komunikasi atau alat elektronik lainnya baik itu yang disebabkan oleh virus ataupun yang disebabkan hal lainnya akibat dari mengakses situs KIKIKUKU, adanya tindakan orang lain yang melakukan peratasan,  dan hal lainnya diluar dari kendalai dan pengawasan KIKIKUKU. <br><br></p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>',NULL,'2019-07-31 03:23:15',NULL);

/*!40000 ALTER TABLE `g_terms` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_category`;

CREATE TABLE `m_category` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(150) NOT NULL DEFAULT '',
  `DESCRIPTION` varchar(250) DEFAULT NULL,
  `ORDER_NO` varchar(30) DEFAULT NULL,
  `IMAGE` varchar(250) DEFAULT NULL,
  `PARENT` int(11) DEFAULT '0',
  `LEVEL` int(11) NOT NULL,
  `LINK` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_category` WRITE;
/*!40000 ALTER TABLE `m_category` DISABLE KEYS */;

INSERT INTO `m_category` (`ID`, `NAME`, `DESCRIPTION`, `ORDER_NO`, `IMAGE`, `PARENT`, `LEVEL`, `LINK`)
VALUES
	(1,'Fashion Accesssories','Fashion Accesssories','1',NULL,0,0,NULL),
	(2,'Apparel, Shoes & Parts','Apparel, Shoes & Parts','2',NULL,0,0,NULL),
	(3,'Homeware & Decoration','Homeware & Decoration','3',NULL,0,0,NULL),
	(4,'Festival, Party & Wedding','Festival, Party & Wedding','4',NULL,0,0,NULL),
	(5,'Toys, Fun & Novelty','Toys, Fun & Novelty','5',NULL,0,0,NULL),
	(6,'School & Office','School & Office','6',NULL,0,0,NULL),
	(7,'Sports & Outdoor','Sports & Outdoor','7',NULL,0,0,NULL),
	(8,'Hardware & Tools','Hardware & Tools','8',NULL,0,0,NULL),
	(101,'Hair Ornaments','Hair Ornaments','1',NULL,1,1,'6'),
	(102,'Jewelry & Ornament','Jewelry & Ornament','2',NULL,1,1,'7'),
	(103,'Scarf','Scarf','3',NULL,1,1,'88'),
	(107,'Fashion Jewelry & Accessories','Fashion Jewelry & Accessories','7',NULL,1,1,'512'),
	(108,'Fashion Jewelry, Arts & Crafts, Accessories','Fashion Jewelry, Arts & Crafts, Accessories','8',NULL,1,1,'513'),
	(110,'Clock & Watch','Clock & Watch','10',NULL,1,1,'517'),
	(111,'Garment Accessories','Garment Accessories','11',NULL,1,1,'65'),
	(112,'Cosmetics','Cosmetics','12',NULL,1,1,'81'),
	(113,'Eyeglasses','Eyeglasses','13',NULL,1,1,'84'),
	(114,'Mirror & Comb','Mirror & Comb','14',NULL,1,1,'101'),
	(115,'Cosmetic Accessories','Cosmetic Accessories','15',NULL,1,1,'109'),
	(116,'Beauty Products','Beauty Products','16',NULL,1,1,'119'),
	(117,'Cosmetics/Beauty Products','Cosmetics/Beauty Products','17',NULL,1,1,'501'),
	(118,'Apperal Accessories','Apperal Accessories','18',NULL,1,1,'502'),
	(119,'Accessories','Accessories','19',NULL,1,1,'515'),
	(120,'Scarf','Scarf','20',NULL,1,1,'88'),
	(121,'Socks','Socks','21',NULL,1,1,'130'),
	(122,'Knitted Goods','Knitted Goods','22',NULL,1,1,'132'),
	(123,'Frame/Accessories','Frame/Accessories','23',NULL,1,1,'189'),
	(124,'Garments','Garments','24',NULL,1,1,'514'),
	(125,'Knitted Cloth','Knitted Cloth','25',NULL,1,1,'151'),
	(126,'Knitted Fabric','Knitted Fabric','26',NULL,1,1,'152'),
	(127,'Hair Ornaments','Hair Ornaments','27',NULL,1,1,'528'),
	(128,'Artificial Flower Accessories','Artificial Flower Accessories','28',NULL,1,1,'201116'),
	(129,'Fashion Jewelry','Fashion Jewelry','29',NULL,1,1,'1001101'),
	(130,'Fashion Jewelry','Fashion Jewelry','30',NULL,1,1,'1001105'),
	(131,'Fashion Jewelry Accessories','Fashion Jewelry Accessories','31',NULL,1,1,'1001102'),
	(201,'Button & Zipper','Button & Zipper','1',NULL,2,1,'104'),
	(202,'Caddice','Caddice','2',NULL,2,1,'44'),
	(203,'Tie','Tie','3',NULL,2,1,'45'),
	(204,'Lace','Lace','4',NULL,2,1,'46'),
	(205,'Belt/Accessories','Belt/Accessories','5',NULL,2,1,'131'),
	(206,'Apperal Accessories','Apperal Accessories','6',NULL,2,1,'502'),
	(207,'Shoes','Shoes','7',NULL,2,1,'80'),
	(208,'Bra & Underwear','Bra & Underwear','8',NULL,2,1,'86'),
	(210,'Hat & Cap','Hat & Cap','10',NULL,2,1,'133'),
	(211,'Gloves','Gloves','11',NULL,2,1,'134'),
	(212,'Ear Cover','Ear Cover','12',NULL,2,1,'155'),
	(213,'Shoes','Shoes','13',NULL,2,1,'519'),
	(214,'Trousers','Trousers','14',NULL,2,1,'141'),
	(215,'Men\'s Wear','Men\'s Wear','15',NULL,2,1,'142'),
	(216,'Jeans','Jeans','16',NULL,2,1,'143'),
	(217,'Women\'s Wear','Women\'s Wear','17',NULL,2,1,'144'),
	(218,'Pajamas','Pajamas','18',NULL,2,1,'147'),
	(219,'Children\'s Wear','Children\'s Wear','19',NULL,2,1,'148'),
	(220,'Sweater','Sweater','20',NULL,2,1,'149'),
	(221,'Shirts and Others','Shirts and Others','21',NULL,2,1,'153'),
	(222,'Leather','Leather','22',NULL,2,1,'201113'),
	(301,'Artifial Flower','Artificial Flower','1',NULL,3,1,'1'),
	(302,'Flower Accessories','Flower Accessories','2',NULL,3,1,'2'),
	(303,'Decorative Craft','Decorative Craft','3',NULL,3,1,'9'),
	(304,'Ornament Accessories','Ornament Accessories','4',NULL,3,1,'10'),
	(305,'Ceramic & Crystal','Ceramic & Crystal','5',NULL,3,1,'12'),
	(306,'Flower, Ornaments, Craft','Flower, Ornaments, Craft','6',NULL,3,1,'504'),
	(307,'Toy, Flower, Ornaments, Accessories','Toy, Flower, Ornaments, Accessories','7',NULL,3,1,'505'),
	(308,'Kitchen & Sanitary Hardware','Kitchen & Sanitary Hardware','8',NULL,3,1,'18'),
	(309,'Small Home Appliances','Small Home Appliances','9',NULL,3,1,'19'),
	(310,'Clock & Watch','Clock & Watch','10',NULL,3,1,'22'),
	(311,'Photo Frame & Parts','Photo Frame & Parts','11',NULL,3,1,'93'),
	(312,'New Year Pictures & Calendar & Couplet','New Year Pictures & Calendar & Couplet','12',NULL,3,1,'199'),
	(313,'Towel','Towel','13',NULL,3,1,'51'),
	(314,'Daily Necessities','Daily Necessities','14',NULL,3,1,'78'),
	(315,'Daily Necessities','Daily Necessities','15',NULL,3,1,'518'),
	(316,'Paintings','Paintings','16',NULL,3,1,'524'),
	(317,'Pets/Aquarium Products','Pets/Aquarium Products','17',NULL,3,1,'530'),
	(318,'Curtain Cloth','Curtain Cloth','18',NULL,3,1,'140'),
	(319,'Bedding','Bedding','19',NULL,3,1,'63'),
	(320,'Home-decoration Light','Home-decoration Light','20',NULL,3,1,'201109'),
	(321,'Delicate Home Lightings Area','Delicate Home Lightings Area','21',NULL,3,1,'201115'),
	(401,'Festival Craft','Festival Craft','1',NULL,4,1,'8'),
	(402,'Celerbration Products','Celerbration Products','2',NULL,4,1,'521'),
	(403,'Wedding & Celerbration Products','Wedding & Celerbration Products','3',NULL,4,1,'526'),
	(404,'Festival Light','Festival Light','4',NULL,4,1,'201111'),
	(501,'Tourism Craft','Tourism Craft','1',NULL,5,1,'13'),
	(502,'Toy','Toy','2',NULL,5,1,'115'),
	(503,'Toys, Ornaments, Crafts','Toys, Ornaments, Crafts','3',NULL,5,1,'511'),
	(504,'DIY Crafts','DIY Crafts','4',NULL,5,1,'527'),
	(601,'Office & Study Stationery','Office & Study Stationery','1',NULL,6,1,'68'),
	(602,'Pen Paper Ink','Pen Paper Ink','2',NULL,6,1,'107'),
	(603,'Suitcase & Bag','Suitcase & Bag','3',NULL,6,1,'516'),
	(701,'Rain Wear & Pack','Rain Wear & Pack','1',NULL,7,1,'14'),
	(702,'Suitcase & Bag','Suitcase & Bag','2',NULL,7,1,'15'),
	(703,'Umbrella','Umbrella','3',NULL,7,1,'24'),
	(704,'Vehicle','Vehicle','4',NULL,7,1,'25'),
	(705,'Cultural & Sports','Cultural & Sports','5',NULL,7,1,'503'),
	(706,'Outdoor Products','Outdoor Products','6',NULL,7,1,'508'),
	(708,'Cultural & Sports Products','Cultural & Sports Products','8',NULL,1,1,'102'),
	(709,'Sports Wear','Sports Wear','9',NULL,1,1,'150'),
	(801,'Electrical Products','Electrial Products','1',NULL,8,1,'16'),
	(802,'Hardware Tools & Accessories','Hardware Tools & Accessories','2',NULL,8,1,'17'),
	(803,'Telecommunications','Telecommunications','3',NULL,8,1,'20'),
	(804,'Electronic Appliances, Photographic Equipment','Electronic Appliances, Photographic Equipment','4',NULL,8,1,'21'),
	(805,'Lock','Lock','5',NULL,8,1,'23'),
	(806,'Hardware & Electronics','Hardware & Electronics','6',NULL,8,1,'31'),
	(807,'Electronics','Electronics','7',NULL,8,1,'32'),
	(808,'Featured Products','Featured Products','8',NULL,8,1,'37'),
	(809,'Umbrella','Umbrella','9',NULL,8,1,'135'),
	(810,'Battery/Lamp/Flash Light/Electronics','Battery/Lamp/Flash Light/Electronics','10',NULL,8,1,'500'),
	(811,'Thread & Tape','Thread & Tape','11',NULL,8,1,'74'),
	(812,'Car & Motorcycle Accessories','Car & Motorcycle Accessories','12',NULL,8,1,'145'),
	(813,'Car Necessities','Car Necessities','13',NULL,8,1,'146'),
	(814,'Printing & Packing Machine','Printing & Packing Machine','14',NULL,8,1,'201101'),
	(815,'Industry Electrical Machine','Industry Electrical Machine','15',NULL,8,1,'201102'),
	(816,'Logistics Equipment','Logistics Equipment','16',NULL,8,1,'201103'),
	(817,'Food Processing Machine ','Food Processing Machine ','17',NULL,8,1,'201104'),
	(818,'Printing & Packing Machine','Printing & Packing Machine','18',NULL,8,1,'201105'),
	(819,'Engine & Generating Equipment','Engine & Generating Equipment','19',NULL,8,1,'201106'),
	(820,'Ribbon Loom & Injection Machine','Ribbon Loom & Injection Machine','20',NULL,8,1,'201107'),
	(821,'Measuring Tools & Knife','Measuring Tools & Knife','21',NULL,8,1,'201108'),
	(822,'Lighting Equipment','Lighting Equipment','22',NULL,8,1,'201110'),
	(823,'Engineering Light','Engineering Light','23',NULL,8,1,'201112');

/*!40000 ALTER TABLE `m_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_type`;

CREATE TABLE `m_type` (
  `ID` varchar(15) NOT NULL DEFAULT '',
  `NAME` varchar(150) NOT NULL DEFAULT '',
  `DESCRIPTION` varchar(250) DEFAULT NULL,
  `ORDER_NO` varchar(30) DEFAULT NULL,
  `IMAGE` varchar(250) DEFAULT NULL,
  `PARENT` varchar(15) DEFAULT NULL,
  `STATUS` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table s_api
# ------------------------------------------------------------

DROP TABLE IF EXISTS `s_api`;

CREATE TABLE `s_api` (
  `REC_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) DEFAULT NULL,
  `KEY` varchar(40) NOT NULL DEFAULT '',
  `LEVEL` int(2) DEFAULT NULL,
  `IGNORE_LIMITS` tinyint(1) DEFAULT NULL,
  `IS_PRIVATE_KEY` tinyint(1) DEFAULT NULL,
  `IP_ADDRESS` text,
  `DATE_CREATED` int(11) DEFAULT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `s_api` WRITE;
/*!40000 ALTER TABLE `s_api` DISABLE KEYS */;

INSERT INTO `s_api` (`REC_ID`, `USER_ID`, `KEY`, `LEVEL`, `IGNORE_LIMITS`, `IS_PRIVATE_KEY`, `IP_ADDRESS`, `DATE_CREATED`)
VALUES
	(1,1,'minyakkayuputih',1,0,1,'192.168.1.1',20191018),
	(2,2,'nasipadang',1,0,0,'192.168.1.2',20191018);

/*!40000 ALTER TABLE `s_api` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table s_api_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `s_api_logs`;

CREATE TABLE `s_api_logs` (
  `REC_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `URI` varchar(255) DEFAULT NULL,
  `METHOD` varchar(6) DEFAULT NULL,
  `PARAMS` text,
  `API_KEY` varchar(40) DEFAULT NULL,
  `IP_ADDRESS` varchar(45) DEFAULT NULL,
  `TIME` int(11) DEFAULT NULL,
  `RTIME` float DEFAULT NULL,
  `AUTHORIZED` varchar(1) DEFAULT NULL,
  `RESPONSE_CODE` smallint(3) DEFAULT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `s_api_logs` WRITE;
/*!40000 ALTER TABLE `s_api_logs` DISABLE KEYS */;

INSERT INTO `s_api_logs` (`REC_ID`, `URI`, `METHOD`, `PARAMS`, `API_KEY`, `IP_ADDRESS`, `TIME`, `RTIME`, `AUTHORIZED`, `RESPONSE_CODE`)
VALUES
	(1,'api/debug_member','get','a:11:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:56:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575\";}','','::1',1571376999,NULL,'0',NULL),
	(2,'api/debug_member','get','a:12:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=6c71bfa43341e2a7ac5c5c699ba6cbd1a24860b1\";}','minyakkayuputih','::1',1571377008,NULL,'1',NULL),
	(3,'api/debug_member','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=6c71bfa43341e2a7ac5c5c699ba6cbd1a24860b1\";}','minyakkayuputih','::1',1571377996,NULL,'1',NULL),
	(4,'api/debug_member','get','a:11:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=69039070f51be5d1093abdc790c51348b55a87f7\";}','','::1',1572264520,NULL,'0',NULL),
	(5,'api/debug_member','get','a:12:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=69039070f51be5d1093abdc790c51348b55a87f7\";}','minyakkayuputih','::1',1572264537,NULL,'1',NULL),
	(6,'api/debug_member','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=69039070f51be5d1093abdc790c51348b55a87f7\";}','minyakkayuputih','::1',1572264544,NULL,'1',NULL),
	(7,'api/tmp','get','a:11:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=c98581c4078d58be053c47663d1aca82c9fe835a\";}','','::1',1572323803,NULL,'0',NULL),
	(8,'api/tmp','get','a:12:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=99a0f734ff5ec3cb076c3c731ba105103756441f\";}','minyakkayuputih','::1',1572323808,NULL,'1',NULL),
	(9,'api/tmp','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=99a0f734ff5ec3cb076c3c731ba105103756441f\";}','minyakkayuputih','::1',1572328283,NULL,'1',NULL),
	(10,'api/tmp','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=9aaa3d9306b3748a86cb9362acfe6e46122f0462\";}','minyakkayuputih','::1',1572328288,NULL,'1',NULL),
	(11,'api/tmp','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=9aaa3d9306b3748a86cb9362acfe6e46122f0462\";}','minyakkayuputih','::1',1572328323,NULL,'1',NULL),
	(12,'api/tmp','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=9aaa3d9306b3748a86cb9362acfe6e46122f0462\";}','minyakkayuputih','::1',1572328328,NULL,'1',NULL),
	(13,'api/tmp','get','a:11:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=9aaa3d9306b3748a86cb9362acfe6e46122f0462\";}','','::1',1572328360,NULL,'0',NULL),
	(14,'api/tmp','get','a:12:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=9aaa3d9306b3748a86cb9362acfe6e46122f0462\";}','','::1',1572328371,NULL,'0',NULL),
	(15,'api/tmpd','get','a:11:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=9aaa3d9306b3748a86cb9362acfe6e46122f0462\";}','','::1',1572328375,NULL,'0',NULL),
	(16,'api','get','a:11:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=9aaa3d9306b3748a86cb9362acfe6e46122f0462\";}','','::1',1572328376,NULL,'0',NULL),
	(17,'api','get','a:12:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=9aaa3d9306b3748a86cb9362acfe6e46122f0462\";}','','::1',1572328548,NULL,'0',NULL),
	(18,'api/tmp','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=9aaa3d9306b3748a86cb9362acfe6e46122f0462\";}','minyakkayuputih','::1',1572328729,NULL,'1',NULL),
	(19,'api','get','a:12:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=6780ea3941269f733c3b636c1ece06ea34d96598\";}','minyakkayuputih','::1',1572328732,NULL,'1',NULL),
	(20,'api/kikikuku','get','a:12:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=7db8cdf9f89288aa7ae53d8a983b3dd7a5150fb8\";}','minyakkayuputih','::1',1572329229,NULL,'1',NULL),
	(21,'api/register','get','a:12:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=7db8cdf9f89288aa7ae53d8a983b3dd7a5150fb8\";}','minyakkayuputih','::1',1572329245,NULL,'1',NULL),
	(22,'api/register','post','a:8:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"b1d6d7c8-f21f-4f30-8b27-365e7c64e3ba\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:14:\"Content-Length\";s:1:\"0\";s:10:\"Connection\";s:10:\"keep-alive\";}','','::1',1572332207,NULL,'0',NULL),
	(23,'api/register','get','a:9:{s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"7b54c023-bdc7-4395-b035-be1f74ed9aa2\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=5d952e7b753ffe706f4b7f70a6aab3066eabd8fd\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572332251,NULL,'1',NULL),
	(24,'api/register','get','a:9:{s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"3fca5bba-ca91-45f8-a17b-38a333e44bd1\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=5d952e7b753ffe706f4b7f70a6aab3066eabd8fd\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572332280,NULL,'1',NULL),
	(25,'api/register','get','a:9:{s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"07216447-f080-440c-ae6a-5e3f15374f4b\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=5d952e7b753ffe706f4b7f70a6aab3066eabd8fd\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572332310,NULL,'1',NULL),
	(26,'api/register','post','a:11:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"e5e7f893-91cc-4403-aa73-98c1146a81d1\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------171234248644464661735291\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=5d952e7b753ffe706f4b7f70a6aab3066eabd8fd\";s:14:\"Content-Length\";s:3:\"167\";s:10:\"Connection\";s:10:\"keep-alive\";s:10:\"uFirstName\";s:2:\"AL\";}','','::1',1572332374,NULL,'0',NULL),
	(27,'api/register','post','a:12:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"77996648-b13d-442c-9589-c68987495d7d\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------455089129644005148893214\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=5d952e7b753ffe706f4b7f70a6aab3066eabd8fd\";s:14:\"Content-Length\";s:3:\"284\";s:10:\"Connection\";s:10:\"keep-alive\";s:10:\"uFirstName\";s:2:\"AL\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572332382,NULL,'1',NULL),
	(28,'api/register','post','a:12:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"3b0440de-01cf-43c9-9238-a549c3e78afe\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------213071484123787068100887\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=5d952e7b753ffe706f4b7f70a6aab3066eabd8fd\";s:14:\"Content-Length\";s:3:\"284\";s:10:\"Connection\";s:10:\"keep-alive\";s:10:\"uFirstName\";s:2:\"AL\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572332391,NULL,'1',NULL),
	(29,'api/register','post','a:12:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"792d5ce7-76fc-4215-bed8-fe2eefe4b23a\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------126701404859732165065248\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=5d952e7b753ffe706f4b7f70a6aab3066eabd8fd\";s:14:\"Content-Length\";s:3:\"284\";s:10:\"Connection\";s:10:\"keep-alive\";s:10:\"uFirstName\";s:2:\"AL\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572332496,NULL,'1',NULL),
	(30,'api/register','post','a:12:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"b72f29ad-7d0f-4e89-b9ae-d1dc32f45d39\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------889255531409612197024820\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=5d952e7b753ffe706f4b7f70a6aab3066eabd8fd\";s:14:\"Content-Length\";s:3:\"284\";s:10:\"Connection\";s:10:\"keep-alive\";s:10:\"uFirstName\";s:2:\"AL\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572332501,NULL,'1',NULL),
	(31,'api/register','post','a:12:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"b6c54354-6d72-4bf1-8fab-84d826119533\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------330348997619042404830359\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=5d952e7b753ffe706f4b7f70a6aab3066eabd8fd\";s:14:\"Content-Length\";s:3:\"284\";s:10:\"Connection\";s:10:\"keep-alive\";s:10:\"uFirstName\";s:2:\"AL\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572332506,NULL,'1',NULL),
	(32,'api/register','post','a:12:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"26ed7d3f-8dd0-4756-bed8-578b89b828cc\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------874352654476518537611382\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=5d952e7b753ffe706f4b7f70a6aab3066eabd8fd\";s:14:\"Content-Length\";s:3:\"293\";s:10:\"Connection\";s:10:\"keep-alive\";s:10:\"uFirstName\";s:11:\"NASI PADANG\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572332514,NULL,'1',NULL),
	(33,'api/register','post','a:12:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"5ab65e9a-2ccf-4ee5-a2c3-5086866e545b\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------336984039245460520022380\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4cb84d6f29d9daebd655ef986247e35581d256b0\";s:14:\"Content-Length\";s:3:\"284\";s:10:\"Connection\";s:10:\"keep-alive\";s:10:\"uFirstName\";s:2:\"AL\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572332519,NULL,'1',NULL),
	(34,'api/register','post','a:10:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"cf0723c3-ea79-4a11-aa99-20c2abd0d10a\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------415567162391162323644555\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4cb84d6f29d9daebd655ef986247e35581d256b0\";s:14:\"Content-Length\";s:1:\"0\";s:10:\"Connection\";s:10:\"keep-alive\";}','','::1',1572332524,NULL,'0',NULL),
	(35,'api/register','post','a:10:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"549a2c32-ca68-44f2-91d1-036a16aff178\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------983693000152175754456500\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4cb84d6f29d9daebd655ef986247e35581d256b0\";s:14:\"Content-Length\";s:1:\"0\";s:10:\"Connection\";s:10:\"keep-alive\";}','','::1',1572332529,NULL,'0',NULL),
	(36,'api/register','get','a:11:{s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"89ad0611-cc98-4299-a0bb-8c0079cde8a7\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------774132314769257354713933\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4cb84d6f29d9daebd655ef986247e35581d256b0\";s:14:\"Content-Length\";s:1:\"0\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572332541,NULL,'1',NULL),
	(37,'api/register','post','a:10:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"54bab1b4-6bd4-4a88-8092-da5caa28c05d\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------926177927203192679182039\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4cb84d6f29d9daebd655ef986247e35581d256b0\";s:14:\"Content-Length\";s:1:\"0\";s:10:\"Connection\";s:10:\"keep-alive\";}','','::1',1572333787,NULL,'0',NULL),
	(38,'api/register','post','a:11:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"3632ae31-a7f4-427a-b459-3ec240d2d043\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------882571888351272739007898\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=987eadc2ae365fec768f08e5dc7ee997dadfe327\";s:14:\"Content-Length\";s:3:\"173\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572333792,NULL,'1',NULL),
	(39,'api/register','post','a:18:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"7c5b9087-50f8-4150-b680-4e636da15bb0\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------343164629336116457655909\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=987eadc2ae365fec768f08e5dc7ee997dadfe327\";s:14:\"Content-Length\";s:4:\"1011\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";}','minyakkayuputih','::1',1572334643,NULL,'1',NULL),
	(40,'api/register','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=7db8cdf9f89288aa7ae53d8a983b3dd7a5150fb8\";}','minyakkayuputih','::1',1572334682,NULL,'1',NULL),
	(41,'api/Register','get','a:11:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=3b463bdc8f5eac2b858c7a837105fcd62e729ef0\";}','','::1',1572334966,NULL,'0',NULL),
	(42,'api/Register','get','a:12:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=3b463bdc8f5eac2b858c7a837105fcd62e729ef0\";}','','::1',1572335029,NULL,'0',NULL),
	(43,'api/register','post','a:18:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"be08d4f4-6629-4418-b92c-6db8d20c24b3\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------088219237465864839597937\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=61b0496ee154820713f54d5696d9a4cae4632069\";s:14:\"Content-Length\";s:4:\"1011\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";}','minyakkayuputih','::1',1572335033,NULL,'1',NULL),
	(44,'api/Register','get','a:12:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=c2f400382a586073812cc8602a49eb4928219469\";}','','::1',1572335110,NULL,'0',NULL),
	(45,'api/Register','get','a:12:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=c2f400382a586073812cc8602a49eb4928219469\";}','','::1',1572335119,NULL,'0',NULL),
	(46,'api/register','get','a:12:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=c2f400382a586073812cc8602a49eb4928219469\";}','minyakkayuputih','::1',1572335123,NULL,'1',NULL),
	(47,'api/register','post','a:18:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"d8d9ec87-079f-46ef-a08b-2bf7f4466409\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------915006266157772508313198\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4e3faa99f2dc90724c1bb7a19f01b8d3d7f109b8\";s:14:\"Content-Length\";s:4:\"1011\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";}','minyakkayuputih','::1',1572335128,NULL,'1',NULL),
	(48,'api/register','post','a:18:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"07ef5c99-b46a-4d52-8009-278add2a72ba\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------753956615507737195294542\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4e3faa99f2dc90724c1bb7a19f01b8d3d7f109b8\";s:14:\"Content-Length\";s:4:\"1011\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";}','minyakkayuputih','::1',1572335331,NULL,'1',NULL),
	(49,'api/register','post','a:21:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"8e486bef-bbdf-4fa3-bc90-e600aaf9fe68\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------839855214123147261533734\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4e3faa99f2dc90724c1bb7a19f01b8d3d7f109b8\";s:14:\"Content-Length\";s:4:\"1350\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:4:\"date\";s:10:\"12-09-1999\";}','minyakkayuputih','::1',1572335428,NULL,'1',NULL),
	(50,'api/register','post','a:21:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"3a198c75-33f6-4c6f-9dd7-2bc6ad6ecf66\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------794839152612345644888010\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=18a51cad23f68d124371c681868100c2ffd6e894\";s:14:\"Content-Length\";s:4:\"1350\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:4:\"date\";s:10:\"12-09-1999\";}','minyakkayuputih','::1',1572335434,NULL,'1',NULL),
	(51,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"5fa2f8b4-4230-4177-866f-6942933a1694\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------422553034461231484470990\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=18a51cad23f68d124371c681868100c2ffd6e894\";s:14:\"Content-Length\";s:4:\"1465\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:4:\"date\";s:10:\"12-09-1999\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572335462,NULL,'1',NULL),
	(52,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"467e2c06-8e87-40fa-8466-946775c708f9\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------787967970118058258793155\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=18a51cad23f68d124371c681868100c2ffd6e894\";s:14:\"Content-Length\";s:4:\"1465\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:4:\"date\";s:10:\"12-09-1999\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572335482,NULL,'1',NULL),
	(53,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"c782e888-4795-4012-bf9e-3195a3e7e00c\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------104978209007144067873663\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=18a51cad23f68d124371c681868100c2ffd6e894\";s:14:\"Content-Length\";s:4:\"1465\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:4:\"date\";s:10:\"12-09-1999\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572335526,NULL,'1',NULL),
	(54,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"8ff5ffa1-39cf-45fb-96c2-62456cb4d051\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------616983616648656169377804\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=18a51cad23f68d124371c681868100c2ffd6e894\";s:14:\"Content-Length\";s:4:\"1465\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:4:\"date\";s:10:\"12-09-1999\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572335640,NULL,'1',NULL),
	(55,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"9176a3d4-0b1c-4066-8ae2-d58a068fe7c9\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------263802437335175184454276\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=18a51cad23f68d124371c681868100c2ffd6e894\";s:14:\"Content-Length\";s:4:\"1464\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:4:\"date\";s:9:\"12-9-1999\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572335672,NULL,'1',NULL),
	(56,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"878f4473-3208-46cb-b961-fd9fed17699b\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------451614848611852442461889\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=18a51cad23f68d124371c681868100c2ffd6e894\";s:14:\"Content-Length\";s:4:\"1465\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:4:\"date\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572335785,NULL,'1',NULL),
	(57,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"fd45b9a4-e080-4e77-992d-c27346bd6bf0\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------660715813932355263549097\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=00d92c6d43fe1d10be6eea4b98e02f0404007699\";s:14:\"Content-Length\";s:4:\"1465\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:4:\"date\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572335897,NULL,'1',NULL),
	(58,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"875f8b85-f004-4feb-8a3f-539077b930c4\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------178208226025162858238522\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=00d92c6d43fe1d10be6eea4b98e02f0404007699\";s:14:\"Content-Length\";s:4:\"1465\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:4:\"date\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572335910,NULL,'1',NULL),
	(59,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"2448279c-3388-4400-9eef-35ee64c77880\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------723433237613750749493646\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=00d92c6d43fe1d10be6eea4b98e02f0404007699\";s:14:\"Content-Length\";s:4:\"1465\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:4:\"date\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572335918,NULL,'1',NULL),
	(60,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"4ac00e3f-54c2-47e1-a44d-02cbb208eb01\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------722634029481351400821848\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=00d92c6d43fe1d10be6eea4b98e02f0404007699\";s:14:\"Content-Length\";s:4:\"1465\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:4:\"date\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572335964,NULL,'1',NULL),
	(61,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"3f7d8dcc-97dc-4f82-84df-4d70872681a9\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------951842652812343557165158\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=00d92c6d43fe1d10be6eea4b98e02f0404007699\";s:14:\"Content-Length\";s:4:\"1470\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572335990,NULL,'1',NULL),
	(62,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"a292eb87-5e50-48aa-9aa2-0e0cb6c839e3\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------626764001366234970326442\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=fc7b83ac5b38617267efb459c20047f2fc13807d\";s:14:\"Content-Length\";s:4:\"1470\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572336311,NULL,'1',NULL),
	(63,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"2ecdc7c2-3622-4f00-b173-eb2a2de1873a\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------865512458509054905509361\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=fc7b83ac5b38617267efb459c20047f2fc13807d\";s:14:\"Content-Length\";s:4:\"1470\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572336338,NULL,'1',NULL),
	(64,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"2af623ad-814f-4034-a291-2ed4e6a98d75\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------016236407201227093334586\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=fc7b83ac5b38617267efb459c20047f2fc13807d\";s:14:\"Content-Length\";s:4:\"1470\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572336358,NULL,'1',NULL),
	(65,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"57cada22-01d3-4208-a281-def56b8e09d9\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------005190670380192657539899\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=fc7b83ac5b38617267efb459c20047f2fc13807d\";s:14:\"Content-Length\";s:4:\"1470\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572336369,NULL,'1',NULL),
	(66,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"3e553738-5f8a-4bdf-b327-d5ffb91d5fc6\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------159895637464005456204897\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=fc7b83ac5b38617267efb459c20047f2fc13807d\";s:14:\"Content-Length\";s:4:\"1470\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:32:\"andi.wardana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572336415,NULL,'1',NULL),
	(67,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"7fa382fe-5a7f-4978-8d00-d8601bdc06de\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------105419625058760166571771\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=fc7b83ac5b38617267efb459c20047f2fc13807d\";s:14:\"Content-Length\";s:4:\"1471\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:33:\"andi.wadrdana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572336417,NULL,'1',NULL),
	(68,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"b4031645-1460-4f2c-ae84-684d5ef477cf\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------222326273204396645505408\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=fc7b83ac5b38617267efb459c20047f2fc13807d\";s:14:\"Content-Length\";s:4:\"1471\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:33:\"andi.wadrdana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572336438,NULL,'1',NULL),
	(69,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"26419959-7155-4b30-84e7-d5fab17b2631\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------915833597958020673285572\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=fc7b83ac5b38617267efb459c20047f2fc13807d\";s:14:\"Content-Length\";s:4:\"1471\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:33:\"andi.wadrdana@incubesolutions.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:12:\"Andiwardana1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07/07/1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572336455,NULL,'1',NULL),
	(70,'api','get','a:11:{s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"e3702500-b3d2-46b7-9d9e-8ae0e463a027\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------239135940808091205401410\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=fc7b83ac5b38617267efb459c20047f2fc13807d\";s:14:\"Content-Length\";s:1:\"0\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572341107,NULL,'1',NULL),
	(71,'api/verification','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"hash\";s:40:\"da39a3ee5e6b4b0d3255bfef95601890afd80709\";s:5:\"email\";s:33:\"andi.wadrdana@incubesolutions.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"1d245cbf-1a7b-4ac3-a486-3f0485ded863\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------815219732245636776466705\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=776eae4c232899b1bacecf3e7baf255f11375c57\";s:14:\"Content-Length\";s:1:\"0\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572341478,NULL,'1',NULL),
	(72,'api/verification','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"hash\";s:40:\"da39a3ee5e6b4b0d3255bfef95601890afd80709\";s:5:\"email\";s:33:\"andi.wadrdana@incubesolutions.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"440c8a21-fd5c-4c32-ae1b-6fd96a6a9663\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------706087523547190279555863\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=8eac0e7ee13e435a6dfa6ad34ed74c100db59af3\";s:14:\"Content-Length\";s:1:\"0\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572341502,NULL,'1',NULL),
	(73,'api/verification','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"hash\";s:40:\"da39a3ee5e6b4b0d3255bfef95601890afd80709\";s:5:\"email\";s:33:\"andi.wadrdana@incubesolutions.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"eb61e24a-d0d2-4058-9c26-0b07762dae9c\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------106024915277934298945467\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=8eac0e7ee13e435a6dfa6ad34ed74c100db59af3\";s:14:\"Content-Length\";s:1:\"0\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572341542,NULL,'1',NULL),
	(74,'api/verification','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"hash\";s:40:\"779fe68372edc48fdba87017b27114545edf6755\";s:5:\"email\";s:33:\"andi.wadrdana@incubesolutions.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"126a266c-f21f-443c-b879-2a58f1d95433\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------477337090463958905981888\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=8eac0e7ee13e435a6dfa6ad34ed74c100db59af3\";s:14:\"Content-Length\";s:1:\"0\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572341592,NULL,'1',NULL),
	(75,'api/verification','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"hash\";s:40:\"779fe68372edc48fdba87017b27114545edf6755\";s:5:\"email\";s:33:\"andi.wadrdana@incubesolutions.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"8935991f-ad01-4108-bdf8-5fd442d342b2\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------230368498470793761714690\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=8eac0e7ee13e435a6dfa6ad34ed74c100db59af3\";s:14:\"Content-Length\";s:1:\"0\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572341618,NULL,'1',NULL),
	(76,'api/login','get','a:11:{s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"d8ca52c4-3e3a-4541-90cc-f248245b512e\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------027510027280376979185629\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=8eac0e7ee13e435a6dfa6ad34ed74c100db59af3\";s:14:\"Content-Length\";s:3:\"310\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572342613,NULL,'1',NULL),
	(77,'api','get','a:11:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:56:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575\";}','','::1',1572405557,NULL,'0',NULL),
	(78,'api/login','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"a043d9f1-7c6d-4a0d-81fe-09ba090fe49d\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------145481007484038289578798\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:14:\"Content-Length\";s:3:\"310\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572409869,NULL,'1',NULL),
	(79,'api/login','get','a:11:{s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"a06d2215-74bc-418b-9ca1-fa6867ec2b0d\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------108413892044857698400828\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=41f332c3a0923543cc8184f1b86e595191de3fce\";s:14:\"Content-Length\";s:3:\"318\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572410076,NULL,'1',NULL),
	(80,'api/login','get','a:11:{s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"1bb509bd-2dc1-4ba3-abe8-d56856bafd2e\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------692988176304646783319427\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=41f332c3a0923543cc8184f1b86e595191de3fce\";s:14:\"Content-Length\";s:3:\"318\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572410340,NULL,'1',NULL),
	(81,'api/login','post','a:12:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"359040a4-bff4-4a41-9c01-d15a1bfecbb5\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------739972761355187974418026\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=800c6b44af815fb6790287e75c16b79f1544ba87\";s:14:\"Content-Length\";s:3:\"318\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:27:\"djailwjdilawjdlawihdjliawjd\";}','','::1',1572410349,NULL,'0',NULL),
	(82,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"039419a5-784e-435c-9b11-e1c2a60123a6\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------099247789135445090835568\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=800c6b44af815fb6790287e75c16b79f1544ba87\";s:14:\"Content-Length\";s:3:\"435\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:27:\"djailwjdilawjdlawihdjliawjd\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572410389,NULL,'1',NULL),
	(83,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"81c0f4d5-f73d-46b9-9e6e-eebd1073e4a7\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------511177208046820811464916\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=800c6b44af815fb6790287e75c16b79f1544ba87\";s:14:\"Content-Length\";s:3:\"435\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:27:\"djailwjdilawjdlawihdjliawjd\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572411072,NULL,'1',NULL),
	(84,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"713a6930-9d72-4761-957d-1b7a305a55a3\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------303116663129336554169392\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=e5c7d6a8f941309ca869d9c9232f9798a429fd15\";s:14:\"Content-Length\";s:3:\"435\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:27:\"djailwjdilawjdlawihdjliawjd\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572411291,NULL,'1',NULL),
	(85,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"d887c099-4fb5-433f-bf84-ac65326413b1\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------827518181518651857888318\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=e5c7d6a8f941309ca869d9c9232f9798a429fd15\";s:14:\"Content-Length\";s:3:\"435\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:27:\"djailwjdilawjdlawihdjliawjd\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572411450,NULL,'1',NULL),
	(86,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"7530e28e-0d56-4f08-ab48-19a164d2823c\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------966899960683549833338819\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=452b2a3c21397ecb035748716ee4168a933c6dce\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572411989,NULL,'1',NULL),
	(87,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"34cfb68b-36d3-4418-beb8-c030a5d2d2da\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------282919036574572247003171\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=7f2add969a61a5f19b3ab5e6a7ec914c2f40469f\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572412016,NULL,'1',NULL),
	(88,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"6bcc063d-5b8a-4212-a726-533cd57f9831\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------968493422992156475450030\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=7f2add969a61a5f19b3ab5e6a7ec914c2f40469f\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572414231,NULL,'1',NULL),
	(89,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"81c95f33-e49f-405c-b7aa-bb2ff577065e\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------038523597238230207828128\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1070d9a4d68c37d60cd75b2fa649799b3b6b8071\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572414262,NULL,'1',NULL),
	(90,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"f590bd3e-bcba-449a-aad3-1ef20e2b9f9b\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------853246347626686839117858\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1070d9a4d68c37d60cd75b2fa649799b3b6b8071\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572414291,NULL,'1',NULL),
	(91,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"17025a78-37fc-4fac-8741-fa556b83b650\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------114492938848505495577367\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1070d9a4d68c37d60cd75b2fa649799b3b6b8071\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572414304,NULL,'1',NULL),
	(92,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"1794ef0c-6420-4b74-bd28-e912dec2300d\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------295345940240081034534449\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1070d9a4d68c37d60cd75b2fa649799b3b6b8071\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572414310,NULL,'1',NULL),
	(93,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"cf8fd476-a50e-4cbd-9e6f-ad064a5fbcee\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------017611557324234078296704\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1070d9a4d68c37d60cd75b2fa649799b3b6b8071\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572414341,NULL,'1',NULL),
	(94,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"00c92cad-e888-4790-942d-f29b0bff2461\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------399904190478925884071597\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1070d9a4d68c37d60cd75b2fa649799b3b6b8071\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572414432,NULL,'1',NULL),
	(95,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"91a9e214-6711-4f1f-b786-b0287f7c47bc\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------863344571096369883320012\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1070d9a4d68c37d60cd75b2fa649799b3b6b8071\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572414447,NULL,'1',NULL),
	(96,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"3bfd93fc-1129-4448-a018-b268c2114a1e\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------588305075497670316298430\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1070d9a4d68c37d60cd75b2fa649799b3b6b8071\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572414505,NULL,'1',NULL),
	(97,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"0e95afde-f194-4f0a-8425-b13c4ccf746f\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------733616426101775831726973\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1070d9a4d68c37d60cd75b2fa649799b3b6b8071\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572414560,NULL,'1',NULL),
	(98,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"c621bdb9-4525-4b4b-b130-a8d747eda8ad\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------012232648601566856014011\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4f8d1fea2aff36991deb5456b1dd354ea78b8b40\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572414585,NULL,'1',NULL),
	(99,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"c94d4a78-8307-45d9-a92e-b018ac6fb104\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------304373925604027178407983\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4f8d1fea2aff36991deb5456b1dd354ea78b8b40\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572414620,NULL,'1',NULL),
	(100,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"2b42398f-1ad7-4029-8f50-bcc9def14cf4\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------585811504323403131854283\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4f8d1fea2aff36991deb5456b1dd354ea78b8b40\";s:14:\"Content-Length\";s:3:\"448\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:24:\"andrea.justina@gmail.com\";s:8:\"password\";s:40:\"f7ad951ca39ffb91d9dce99c9b5bf44b3036b301\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572414760,NULL,'1',NULL),
	(101,'api/cart','post','a:15:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"f48fcef5-3272-44e7-9683-02f6431703a6\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------470575018336409937514933\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4f8d1fea2aff36991deb5456b1dd354ea78b8b40\";s:14:\"Content-Length\";s:3:\"742\";s:10:\"Connection\";s:10:\"keep-alive\";s:10:\"product-id\";s:9:\"923655709\";s:8:\"quantity\";s:2:\"50\";s:13:\"product-price\";s:6:\"384000\";s:12:\"product-name\";s:99:\"Factory direct jewelry tiara for children lollipops for children three-piece Necklace Bracelet ring\";s:14:\"customer-notes\";s:18:\"Don\'t release this\";}','','::1',1572417009,NULL,'0',NULL),
	(102,'api/cart','post','a:16:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"33226eff-3dcc-496d-a36a-2289340ac35e\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------973076952955780259792801\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=96516ffb9383a7a481220279a08ab16394030a68\";s:14:\"Content-Length\";s:3:\"859\";s:10:\"Connection\";s:10:\"keep-alive\";s:10:\"product-id\";s:9:\"923655709\";s:8:\"quantity\";s:2:\"50\";s:13:\"product-price\";s:6:\"384000\";s:12:\"product-name\";s:99:\"Factory direct jewelry tiara for children lollipops for children three-piece Necklace Bracelet ring\";s:14:\"customer-notes\";s:18:\"Don\'t release this\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572417017,NULL,'1',NULL),
	(103,'api/cart','post','a:16:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"478a2319-a288-41e9-a3e2-b02e7cb6af2e\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------691595853696473593132982\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=96516ffb9383a7a481220279a08ab16394030a68\";s:14:\"Content-Length\";s:3:\"861\";s:10:\"Connection\";s:10:\"keep-alive\";s:10:\"product-id\";s:9:\"923655709\";s:8:\"quantity\";s:2:\"50\";s:13:\"product-price\";s:6:\"384000\";s:12:\"product-name\";s:101:\"Factory direct\'s jewelry tiara for children lollipops for children three-piece Necklace Bracelet ring\";s:14:\"customer-notes\";s:18:\"Don\'t release this\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572417031,NULL,'1',NULL),
	(104,'api/cart','post','a:15:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"dfec3758-70a6-43e7-a7a6-156cb112e8be\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------763296718769098626817577\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=96516ffb9383a7a481220279a08ab16394030a68\";s:14:\"Content-Length\";s:3:\"730\";s:10:\"Connection\";s:10:\"keep-alive\";s:10:\"product-id\";s:9:\"923655709\";s:8:\"quantity\";s:2:\"50\";s:13:\"product-price\";s:6:\"384000\";s:12:\"product-name\";s:101:\"Factory direct\'s jewelry tiara for children lollipops for children three-piece Necklace Bracelet ring\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572417111,NULL,'1',NULL),
	(105,'api/cart','post','a:17:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"99085c31-60ac-4399-b542-5acc57f5fb87\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------162583880966963895003155\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=96516ffb9383a7a481220279a08ab16394030a68\";s:14:\"Content-Length\";s:3:\"990\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"product-id\";s:9:\"923655709\";s:8:\"quantity\";s:2:\"50\";s:13:\"product-price\";s:6:\"384000\";s:12:\"product-name\";s:101:\"Factory direct\'s jewelry tiara for children lollipops for children three-piece Necklace Bracelet ring\";s:13:\"customer-note\";s:18:\"Don\'t release this\";s:13:\"product-buyer\";s:18:\"al.mixev@gmail.com\";}','minyakkayuputih','::1',1572417673,NULL,'1',NULL),
	(106,'api/cart','post','a:17:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"e52d9b07-befc-4fc0-b63d-083f1eff0b6d\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------546526598609441979039921\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4aa996d7d67b231f4479af6c17c792a0f6162342\";s:14:\"Content-Length\";s:3:\"990\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"product-id\";s:9:\"923655709\";s:8:\"quantity\";s:2:\"50\";s:13:\"product-price\";s:6:\"384000\";s:12:\"product-name\";s:101:\"Factory direct\'s jewelry tiara for children lollipops for children three-piece Necklace Bracelet ring\";s:13:\"customer-note\";s:18:\"Don\'t release this\";s:13:\"product-buyer\";s:18:\"al.mixev@gmail.com\";}','minyakkayuputih','::1',1572417695,NULL,'1',NULL),
	(107,'api/cart','post','a:17:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"5d0388d8-6007-4b1b-aea1-7fb524c8cc30\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------637961643074019590426030\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4aa996d7d67b231f4479af6c17c792a0f6162342\";s:14:\"Content-Length\";s:3:\"990\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"product-id\";s:9:\"923655709\";s:8:\"quantity\";s:2:\"50\";s:13:\"product-price\";s:6:\"384000\";s:12:\"product-name\";s:101:\"Factory direct\'s jewelry tiara for children lollipops for children three-piece Necklace Bracelet ring\";s:13:\"customer-note\";s:18:\"Don\'t release this\";s:13:\"product-buyer\";s:18:\"al.mixev@gmail.com\";}','minyakkayuputih','::1',1572417713,NULL,'1',NULL),
	(108,'api/cart','post','a:17:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"4380d873-4a3f-4b6b-90b5-88945324a3c6\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------373365167865469406717974\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4aa996d7d67b231f4479af6c17c792a0f6162342\";s:14:\"Content-Length\";s:3:\"990\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"product-id\";s:9:\"923655709\";s:8:\"quantity\";s:2:\"50\";s:13:\"product-price\";s:6:\"384000\";s:12:\"product-name\";s:101:\"Factory direct\'s jewelry tiara for children lollipops for children three-piece Necklace Bracelet ring\";s:13:\"customer-note\";s:18:\"Don\'t release this\";s:13:\"product-buyer\";s:18:\"al.mixev@gmail.com\";}','minyakkayuputih','::1',1572417779,NULL,'1',NULL),
	(109,'api/cart','post','a:17:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"84913eb3-2c32-424f-a4b8-4372256fb98a\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------702085923988968169745054\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4aa996d7d67b231f4479af6c17c792a0f6162342\";s:14:\"Content-Length\";s:3:\"901\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"product-id\";s:9:\"923655709\";s:8:\"quantity\";s:2:\"50\";s:13:\"product-price\";s:6:\"384000\";s:12:\"product-name\";s:12:\"DIRECT ORDER\";s:13:\"customer-note\";s:18:\"Don\'t release this\";s:13:\"product-buyer\";s:18:\"al.mixev@gmail.com\";}','minyakkayuputih','::1',1572417786,NULL,'1',NULL),
	(110,'api/cart','get','a:10:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"ba52ac56-89dc-4336-a164-0fb8f8ac9eaa\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------706655208884537443682050\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=4aa996d7d67b231f4479af6c17c792a0f6162342\";s:14:\"Content-Length\";s:3:\"295\";s:10:\"Connection\";s:10:\"keep-alive\";}','','::1',1572418382,NULL,'0',NULL),
	(111,'api/cart','get','a:11:{s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"fcd7edd0-24d7-498f-b718-9b8a84e363c7\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------003964330051788332395561\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=bebd794e75ce4cd7a14b08758487c8660eb16edb\";s:14:\"Content-Length\";s:3:\"178\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572418396,NULL,'1',NULL),
	(112,'api/cart','get','a:11:{s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"6b6c9937-74bd-40a2-a454-75604b46e646\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------578788261420181431222688\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=bebd794e75ce4cd7a14b08758487c8660eb16edb\";s:14:\"Content-Length\";s:3:\"178\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572418439,NULL,'1',NULL),
	(113,'api/cart','get','a:11:{s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"55caacb1-0c6b-4c9e-82ce-91bfc900af1e\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------655678763054575634440220\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=bebd794e75ce4cd7a14b08758487c8660eb16edb\";s:14:\"Content-Length\";s:3:\"178\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572418449,NULL,'1',NULL),
	(114,'api/cart','get','a:11:{s:3:\"key\";s:15:\"minyakkayuputih\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"8523d78c-d5dc-4708-bd1a-0e69024958d6\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------131561063370343923350391\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=bebd794e75ce4cd7a14b08758487c8660eb16edb\";s:14:\"Content-Length\";s:3:\"178\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572418506,NULL,'1',NULL),
	(115,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"aca1e061-86e6-44b6-aa0f-9dfaf5aa91d7\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=bebd794e75ce4cd7a14b08758487c8660eb16edb\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572418531,NULL,'1',NULL),
	(116,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"1baf084f-5f3e-4f6d-9eed-010db6656366\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=bebd794e75ce4cd7a14b08758487c8660eb16edb\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572418555,NULL,'1',NULL),
	(117,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"6f92b369-d1e1-4ce2-b1ae-b5ee69126397\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=bebd794e75ce4cd7a14b08758487c8660eb16edb\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572418567,NULL,'1',NULL),
	(118,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"f4b93262-8770-4e88-81b6-0ae7c3781a1d\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=bebd794e75ce4cd7a14b08758487c8660eb16edb\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572418645,NULL,'1',NULL),
	(119,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"01b5b11f-6abb-4e82-9053-e4176f1b5a4b\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=bebd794e75ce4cd7a14b08758487c8660eb16edb\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572418664,NULL,'1',NULL),
	(120,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"95b9488d-31fe-45d3-bb21-192cdc9f3351\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=bebd794e75ce4cd7a14b08758487c8660eb16edb\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572418714,NULL,'1',NULL),
	(121,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"40ff0809-b0b2-4f68-997b-ebdb6490f350\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=89821c4705bd0b4663697e6be58fa51083a9fb12\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572418728,NULL,'1',NULL),
	(122,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"b73d93a5-7e7e-4443-8c99-5f341d1cfc3f\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=89821c4705bd0b4663697e6be58fa51083a9fb12\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572418788,NULL,'1',NULL),
	(123,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"bcc4e8e6-ec9b-4b98-b22a-a70a28fc564f\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=89821c4705bd0b4663697e6be58fa51083a9fb12\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572418900,NULL,'1',NULL),
	(124,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"f648c7e8-3ef7-48bc-a232-4d2270b6c15d\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=89821c4705bd0b4663697e6be58fa51083a9fb12\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572419250,NULL,'1',NULL),
	(125,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"e558f43e-f9bb-477e-909f-bfc8f2675136\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=0af3b1bd88b1f863b5530c84a3905a6e89879a5f\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572419263,NULL,'1',NULL),
	(126,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"0d05abac-755c-4621-b179-184ceef5bca4\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=0af3b1bd88b1f863b5530c84a3905a6e89879a5f\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572424030,NULL,'1',NULL),
	(127,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"7447a85a-7902-48ea-8b48-85306d9e2122\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=e11962f517aff2ffd00ce65c90649887f8781da9\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572424055,NULL,'1',NULL),
	(128,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"96111029-504d-4894-a8b4-7e732e46a9f5\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=e11962f517aff2ffd00ce65c90649887f8781da9\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572424275,NULL,'1',NULL),
	(129,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"3ad9dbec-1ac9-4ad5-853f-b707d80d1880\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=e11962f517aff2ffd00ce65c90649887f8781da9\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572424299,NULL,'1',NULL),
	(130,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"ba4ad3e8-98f8-435f-ac42-3914ac7caab5\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=e11962f517aff2ffd00ce65c90649887f8781da9\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572424311,NULL,'1',NULL),
	(131,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"10e504a8-1f40-4d99-9431-98773d5aa932\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=e11962f517aff2ffd00ce65c90649887f8781da9\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572424330,NULL,'1',NULL),
	(132,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"38619042-ada4-4456-911b-490d7d63d33f\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1c3d963007dbd1945d34cbd949ffe4fdbe91184c\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572424342,NULL,'1',NULL),
	(133,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"57f86c54-8b40-4350-b513-1ae6e53688dd\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1c3d963007dbd1945d34cbd949ffe4fdbe91184c\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572424349,NULL,'1',NULL),
	(134,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"dc5e929c-9f9e-4462-af98-614a50711a65\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1c3d963007dbd1945d34cbd949ffe4fdbe91184c\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572424372,NULL,'1',NULL),
	(135,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"3bed0a7e-f2a7-42cc-9c0f-2e6b5fefb628\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1c3d963007dbd1945d34cbd949ffe4fdbe91184c\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572424433,NULL,'1',NULL),
	(136,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"d9c9ffab-e410-47ea-ab34-7ba8321a2a37\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1c3d963007dbd1945d34cbd949ffe4fdbe91184c\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572424441,NULL,'1',NULL),
	(137,'api/cart','get','a:10:{s:3:\"key\";s:15:\"minyakkayuputih\";s:5:\"email\";s:18:\"al.mixev@gmail.com\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"9e2829f7-2236-4843-8fbf-ed7c809d15e3\";s:4:\"Host\";s:9:\"localhost\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1c3d963007dbd1945d34cbd949ffe4fdbe91184c\";s:10:\"Connection\";s:10:\"keep-alive\";}','minyakkayuputih','::1',1572424460,NULL,'1',NULL),
	(138,'api/cart','put','a:11:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"5892fe08-c779-48bc-94dc-3274f88f6cc4\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------377657002453689870097338\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=1c3d963007dbd1945d34cbd949ffe4fdbe91184c\";s:14:\"Content-Length\";s:3:\"421\";s:10:\"Connection\";s:10:\"keep-alive\";s:90:\"----------------------------377657002453689870097338\r\nContent-Disposition:_form-data;_name\";s:330:\"\"key\"\r\n\r\nminyakkayuputih\r\n----------------------------377657002453689870097338\r\nContent-Disposition: form-data; name=\"product-id\"\r\n\r\n923655709\r\n----------------------------377657002453689870097338\r\nContent-Disposition: form-data; name=\"product-buyer\"\r\n\r\nal.mixev@gmail.com\r\n----------------------------377657002453689870097338--\r\n\";}','','::1',1572427368,NULL,'0',NULL),
	(139,'api/cart','put','a:11:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"948a87bc-1cbf-427f-9873-ccc634fab8b1\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------266273512435035157683832\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=59a6b009add57aee0eb1d9225d2cda9d2102355e\";s:14:\"Content-Length\";s:3:\"421\";s:10:\"Connection\";s:10:\"keep-alive\";s:90:\"----------------------------266273512435035157683832\r\nContent-Disposition:_form-data;_name\";s:330:\"\"key\"\r\n\r\nminyakkayuputih\r\n----------------------------266273512435035157683832\r\nContent-Disposition: form-data; name=\"product-id\"\r\n\r\n923655709\r\n----------------------------266273512435035157683832\r\nContent-Disposition: form-data; name=\"product-buyer\"\r\n\r\nal.mixev@gmail.com\r\n----------------------------266273512435035157683832--\r\n\";}','','::1',1572427382,NULL,'0',NULL),
	(140,'api/cart','put','a:11:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"e708ffae-f3ad-4e36-a212-5f0811282409\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------519677717881051793171705\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=59a6b009add57aee0eb1d9225d2cda9d2102355e\";s:14:\"Content-Length\";s:3:\"304\";s:10:\"Connection\";s:10:\"keep-alive\";s:90:\"----------------------------519677717881051793171705\r\nContent-Disposition:_form-data;_name\";s:213:\"\"product-id\"\r\n\r\n923655709\r\n----------------------------519677717881051793171705\r\nContent-Disposition: form-data; name=\"product-buyer\"\r\n\r\nal.mixev@gmail.com\r\n----------------------------519677717881051793171705--\r\n\";}','','::1',1572427387,NULL,'0',NULL),
	(141,'api/cart','put','a:11:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"61e43daf-6ca2-4984-8921-19151aa2415b\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------071399996522397359745077\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=59a6b009add57aee0eb1d9225d2cda9d2102355e\";s:14:\"Content-Length\";s:3:\"416\";s:10:\"Connection\";s:10:\"keep-alive\";s:90:\"----------------------------071399996522397359745077\r\nContent-Disposition:_form-data;_name\";s:325:\"\"key\"\r\n\r\nnasipadang\r\n----------------------------071399996522397359745077\r\nContent-Disposition: form-data; name=\"product-id\"\r\n\r\n923655709\r\n----------------------------071399996522397359745077\r\nContent-Disposition: form-data; name=\"product-buyer\"\r\n\r\nal.mixev@gmail.com\r\n----------------------------071399996522397359745077--\r\n\";}','','::1',1572427404,NULL,'0',NULL),
	(142,'api/cart','put','a:11:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"83c23c9d-412a-4792-9841-9b7a2cd45063\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------232165855391939915129450\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=59a6b009add57aee0eb1d9225d2cda9d2102355e\";s:14:\"Content-Length\";s:3:\"416\";s:10:\"Connection\";s:10:\"keep-alive\";s:90:\"----------------------------232165855391939915129450\r\nContent-Disposition:_form-data;_name\";s:325:\"\"key\"\r\n\r\nnasipadang\r\n----------------------------232165855391939915129450\r\nContent-Disposition: form-data; name=\"product-id\"\r\n\r\n923655709\r\n----------------------------232165855391939915129450\r\nContent-Disposition: form-data; name=\"product-buyer\"\r\n\r\nal.mixev@gmail.com\r\n----------------------------232165855391939915129450--\r\n\";}','','::1',1572427411,NULL,'0',NULL),
	(143,'api/cart','put','a:11:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"a4d28a15-ce7a-4aea-9105-ec8b7ab65c15\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------704443404457043626922783\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=59a6b009add57aee0eb1d9225d2cda9d2102355e\";s:14:\"Content-Length\";s:3:\"416\";s:10:\"Connection\";s:10:\"keep-alive\";s:90:\"----------------------------704443404457043626922783\r\nContent-Disposition:_form-data;_name\";s:325:\"\"key\"\r\n\r\nnasipadang\r\n----------------------------704443404457043626922783\r\nContent-Disposition: form-data; name=\"product-id\"\r\n\r\n923655709\r\n----------------------------704443404457043626922783\r\nContent-Disposition: form-data; name=\"product-buyer\"\r\n\r\nal.mixev@gmail.com\r\n----------------------------704443404457043626922783--\r\n\";}','','::1',1572427442,NULL,'0',NULL),
	(144,'api/cart','put','a:11:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"aef6cc21-3a7b-4395-a057-d3d5ee706b82\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------573679798590109084709126\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=59a6b009add57aee0eb1d9225d2cda9d2102355e\";s:14:\"Content-Length\";s:3:\"168\";s:10:\"Connection\";s:10:\"keep-alive\";s:90:\"----------------------------573679798590109084709126\r\nContent-Disposition:_form-data;_name\";s:77:\"\"key\"\r\n\r\nnasipadang\r\n----------------------------573679798590109084709126--\r\n\";}','','::1',1572427446,NULL,'0',NULL),
	(145,'api/cart','put','a:11:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"27b94293-87a0-4452-b287-18774764054d\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------509332627568766136316724\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=59a6b009add57aee0eb1d9225d2cda9d2102355e\";s:14:\"Content-Length\";s:3:\"168\";s:10:\"Connection\";s:10:\"keep-alive\";s:90:\"----------------------------509332627568766136316724\r\nContent-Disposition:_form-data;_name\";s:77:\"\"key\"\r\n\r\nnasipadang\r\n----------------------------509332627568766136316724--\r\n\";}','','::1',1572427451,NULL,'0',NULL),
	(146,'api/cart','put','a:11:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"02c9afe2-b97a-43aa-a1c1-0075558d3e7e\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------325024740550156688688075\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=59a6b009add57aee0eb1d9225d2cda9d2102355e\";s:14:\"Content-Length\";s:3:\"168\";s:10:\"Connection\";s:10:\"keep-alive\";s:90:\"----------------------------325024740550156688688075\r\nContent-Disposition:_form-data;_name\";s:77:\"\"key\"\r\n\r\nnasipadang\r\n----------------------------325024740550156688688075--\r\n\";}','','::1',1572427536,NULL,'0',NULL),
	(147,'api/cart','put','a:11:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"2036b7e7-8239-42ea-992c-cb704208dd89\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------234575325036606538183582\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=59a6b009add57aee0eb1d9225d2cda9d2102355e\";s:14:\"Content-Length\";s:3:\"173\";s:10:\"Connection\";s:10:\"keep-alive\";s:90:\"----------------------------234575325036606538183582\r\nContent-Disposition:_form-data;_name\";s:82:\"\"key\"\r\n\r\nminyakkayuputih\r\n----------------------------234575325036606538183582--\r\n\";}','','::1',1572427547,NULL,'0',NULL),
	(148,'api/cart','put','a:11:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"4f13f80b-24c0-4c59-a770-d3b3e59798be\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------948921831779055338525765\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=59a6b009add57aee0eb1d9225d2cda9d2102355e\";s:14:\"Content-Length\";s:3:\"173\";s:10:\"Connection\";s:10:\"keep-alive\";s:90:\"----------------------------948921831779055338525765\r\nContent-Disposition:_form-data;_name\";s:82:\"\"key\"\r\n\r\nminyakkayuputih\r\n----------------------------948921831779055338525765--\r\n\";}','','::1',1572427791,NULL,'0',NULL),
	(149,'api/cart/update','post','a:12:{s:6:\"update\";N;s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"9d08b039-442e-4cc8-936c-bb3cf3e9369e\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------451984822985312744984346\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=055c4464acb289c1ab4062343e82dc9edcdb639f\";s:14:\"Content-Length\";s:3:\"173\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572427813,NULL,'1',NULL),
	(150,'api/cart/update','post','a:12:{s:6:\"update\";N;s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.18.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"3708346c-da10-4f6f-9828-7b2bf81815e9\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------467806112372941580346286\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=055c4464acb289c1ab4062343e82dc9edcdb639f\";s:14:\"Content-Length\";s:3:\"173\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572427906,NULL,'1',NULL),
	(151,'api/register','post','a:21:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.19.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"dcd4d299-afab-422d-a085-b17005dfafc7\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------691691510113108098850046\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:14:\"Content-Length\";s:4:\"1463\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:20:\"incubesolutionsnpct1\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:21:\"thisisatest@gmail.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:11:\"Nasigoreng1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07-07-1994\";s:8:\"province\";s:8:\"Pamulang\";}','','::1',1572929602,NULL,'0',NULL),
	(152,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.19.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"7af0a05e-0acb-4c2d-9493-7cad7bda8404\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------968088108842335355961272\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=3d9e48604f7e101a9c40b8aecbe71870b1652ddf\";s:14:\"Content-Length\";s:4:\"1458\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:21:\"thisisatest@gmail.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:11:\"Nasigoreng1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07-07-1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572929612,NULL,'1',NULL),
	(153,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.19.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"cf216f4f-9f94-4106-bc15-1aa7b628f6b2\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------604512629922214750891850\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=3d9e48604f7e101a9c40b8aecbe71870b1652ddf\";s:14:\"Content-Length\";s:4:\"1458\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:21:\"thisisatest@gmail.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:11:\"Nasigoreng1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07-07-1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572929636,NULL,'1',NULL),
	(154,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.19.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"db4134b8-fbec-4d65-ac26-2d5e3e991681\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------778234643692298540066255\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=3d9e48604f7e101a9c40b8aecbe71870b1652ddf\";s:14:\"Content-Length\";s:4:\"1454\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:17:\"teasawt@gmail.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:11:\"Nasigoreng1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07-07-1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572929643,NULL,'1',NULL),
	(155,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.19.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"ee3cb613-7dba-44a4-8214-bbf83decba6d\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------805974133229747432277868\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=3d9e48604f7e101a9c40b8aecbe71870b1652ddf\";s:14:\"Content-Length\";s:4:\"1452\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:15:\"tesaw@gmail.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:11:\"Nasigoreng1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07-07-1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572929666,NULL,'1',NULL),
	(156,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.19.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"0dd3edcc-13aa-4f99-88bf-7265f110538d\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------377764819109693479496230\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=3d9e48604f7e101a9c40b8aecbe71870b1652ddf\";s:14:\"Content-Length\";s:4:\"1452\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:15:\"tesaw@gmail.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:11:\"Nasigoreng1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07-07-1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572929679,NULL,'1',NULL),
	(157,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.19.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"3d9da6f2-e25a-4849-89ae-4f7e8f2561be\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------710843861191144870488894\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=3d9e48604f7e101a9c40b8aecbe71870b1652ddf\";s:14:\"Content-Length\";s:4:\"1452\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:15:\"tesaw@gmail.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:11:\"Nasigoreng1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07-07-1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572929721,NULL,'1',NULL),
	(158,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.19.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"b0e55f6a-2df7-402a-b6c3-a051ffd913ea\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------133516586224406003509582\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=3d9e48604f7e101a9c40b8aecbe71870b1652ddf\";s:14:\"Content-Length\";s:4:\"1453\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:16:\"dawdd2@gmail.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:11:\"Nasigoreng1\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07-07-1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572929751,NULL,'1',NULL),
	(159,'api/register','post','a:22:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.19.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"de783648-d58b-4f48-baae-7bad07250855\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------837594457612951652302520\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=3d9e48604f7e101a9c40b8aecbe71870b1652ddf\";s:14:\"Content-Length\";s:4:\"1457\";s:10:\"Connection\";s:10:\"keep-alive\";s:3:\"key\";s:15:\"minyakkayuputih\";s:9:\"firstName\";s:4:\"Andi\";s:8:\"lastName\";s:7:\"Wardana\";s:5:\"phone\";s:11:\"08973909281\";s:5:\"email\";s:17:\"ddwd221@gmail.com\";s:7:\"country\";s:9:\"Indonesia\";s:8:\"address1\";s:15:\"Pamulang Permai\";s:8:\"address2\";s:17:\"Tangerang Selatan\";s:8:\"password\";s:14:\"pejatenvillage\";s:3:\"zip\";s:5:\"15157\";s:9:\"birthdate\";s:10:\"07-07-1994\";s:8:\"province\";s:8:\"Pamulang\";}','minyakkayuputih','::1',1572929791,NULL,'1',NULL),
	(160,'api/login','post','a:12:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.19.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"08aadf16-e558-4b13-9daa-9eee38ea15be\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------480243459957701141383909\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=3d9e48604f7e101a9c40b8aecbe71870b1652ddf\";s:14:\"Content-Length\";s:3:\"300\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:21:\"dawdd2@gmail.com     \";s:8:\"password\";s:12:\"dawdwadawdaw\";}','','::1',1572930238,NULL,'0',NULL),
	(161,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.19.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"977074a9-02f2-4e79-833b-1edbe8103ad3\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------514438972267819606488529\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=9c0e21f5f927cfa17e62200d7996bcfb9b3f90d8\";s:14:\"Content-Length\";s:3:\"417\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:21:\"dawdd2@gmail.com     \";s:8:\"password\";s:12:\"dawdwadawdaw\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572930247,NULL,'1',NULL),
	(162,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.19.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"5c6cedc4-7463-4348-9861-cac7ea32c943\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------879868024488103296806021\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=9c0e21f5f927cfa17e62200d7996bcfb9b3f90d8\";s:14:\"Content-Length\";s:3:\"445\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:21:\"dawdd2@gmail.com     \";s:8:\"password\";s:40:\"52ebcba4aca46000ea623018e68c4aa68e2f6c71\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572930250,NULL,'1',NULL),
	(163,'api/login','post','a:13:{s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.19.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"f4b239e1-73fe-4c14-8f3e-9fef8a37a6b6\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------175993235926791590257984\";s:15:\"Accept-Encoding\";s:13:\"gzip, deflate\";s:6:\"Cookie\";s:51:\"dc_session=9c0e21f5f927cfa17e62200d7996bcfb9b3f90d8\";s:14:\"Content-Length\";s:3:\"454\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:30:\"       dawdd2@gmail.com       \";s:8:\"password\";s:40:\"52ebcba4aca46000ea623018e68c4aa68e2f6c71\";s:3:\"key\";s:15:\"minyakkayuputih\";}','minyakkayuputih','::1',1572930258,NULL,'1',NULL),
	(164,'api/debug_member','get','a:12:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=981d81a1f3cb8f5b52030f90406f0e0f7b1ef3a2\";}','minyakkayuputih','::1',1573105120,NULL,'1',NULL),
	(165,'api/register','get','a:12:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=981d81a1f3cb8f5b52030f90406f0e0f7b1ef3a2\";}','minyakkayuputih','::1',1573105149,NULL,'1',NULL),
	(166,'api/register','get','a:13:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:13:\"Cache-Control\";s:9:\"max-age=0\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=981d81a1f3cb8f5b52030f90406f0e0f7b1ef3a2\";}','minyakkayuputih','::1',1573105154,NULL,'1',NULL),
	(167,'api/debug_member','get','a:12:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=981d81a1f3cb8f5b52030f90406f0e0f7b1ef3a2\";}','minyakkayuputih','::1',1573105163,NULL,'1',NULL),
	(168,'api/register','get','a:12:{s:3:\"key\";s:15:\"minyakkayuputih\";s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:25:\"Upgrade-Insecure-Requests\";s:1:\"1\";s:10:\"User-Agent\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36\";s:14:\"Sec-Fetch-User\";s:2:\"?1\";s:6:\"Accept\";s:118:\"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:8:\"navigate\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:14:\"en-US,en;q=0.9\";s:6:\"Cookie\";s:109:\"optimizelyEndUserId=oeu1570790069310r0.07052308186975575; dc_session=981d81a1f3cb8f5b52030f90406f0e0f7b1ef3a2\";}','minyakkayuputih','::1',1573105178,NULL,'1',NULL);

/*!40000 ALTER TABLE `s_api_logs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table s_appl
# ------------------------------------------------------------

DROP TABLE IF EXISTS `s_appl`;

CREATE TABLE `s_appl` (
  `ID` varchar(15) NOT NULL DEFAULT '',
  `APPL_GROUP_ID` varchar(15) NOT NULL DEFAULT '',
  `NAME` varchar(50) NOT NULL DEFAULT '',
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `IMAGE` varchar(150) DEFAULT NULL,
  `ORDER_NO` tinyint(4) NOT NULL DEFAULT '0',
  `LINK` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `s_appl` WRITE;
/*!40000 ALTER TABLE `s_appl` DISABLE KEYS */;

INSERT INTO `s_appl` (`ID`, `APPL_GROUP_ID`, `NAME`, `DESCRIPTION`, `IMAGE`, `ORDER_NO`, `LINK`)
VALUES
	('PRODUCT','MAIN','Product','Product Maintenance','',3,''),
	('USER','SYSTEM','User','User Maintenance','',1,''),
	('GROUP','SYSTEM','Group','User Group Maintenance','',2,''),
	('BANNER','GENERAL','Banner','Banner','',1,'banner'),
	('ORDER','MAIN','Order Management','fas fa-clipboard-list',NULL,2,'orders'),
	('MEMBER','MAIN','Member List','fas fa-user-tie',NULL,1,'member'),
	('PRIVACY','GENERAL','Privacy','Privacy','',6,'privacy'),
	('ABOUT ','GENERAL','About Us','About Us','',2,'about'),
	('TERMS','GENERAL','Terms & Condition','Terms & Condition','',3,'terms'),
	('FAQ','GENERAL','Faq','Faq','',4,'faq'),
	('CONTACT','GENERAL','Contact','Contact','',5,'contact'),
	('MARGIN','MAIN','Margin Parameter','fas fa-funnel-dollar',NULL,3,'margin');

/*!40000 ALTER TABLE `s_appl` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table s_appl_detail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `s_appl_detail`;

CREATE TABLE `s_appl_detail` (
  `REC_ID` int(10) NOT NULL AUTO_INCREMENT,
  `APPL_ID` varchar(15) NOT NULL DEFAULT '',
  `ID` varchar(15) NOT NULL DEFAULT '',
  `DESCRIPTION` varchar(50) DEFAULT NULL,
  `ORDER_NO` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `s_appl_detail` WRITE;
/*!40000 ALTER TABLE `s_appl_detail` DISABLE KEYS */;

INSERT INTO `s_appl_detail` (`REC_ID`, `APPL_ID`, `ID`, `DESCRIPTION`, `ORDER_NO`)
VALUES
	(1,'PRODUCT','VIEW','VIEW',1),
	(2,'PRODUCT','ADD','ADD',2),
	(3,'PRODUCT','EDIT','EDIT',3),
	(4,'PRODUCT','DELETE','DELETE',4),
	(5,'PRODUCT','UPLOAD','UPLOAD',5),
	(6,'BANNER','VIEW','VIEW',1),
	(7,'BANNER','ADD','ADD',2),
	(8,'BANNER','EDIT','EDIT',3),
	(9,'BANNER','DELETE','DELETE',4),
	(10,'BANNER','UPLOAD','UPLOAD',5),
	(11,'USER','VIEW','VIEW',1),
	(12,'USER','ADD','ADD',2),
	(13,'USER','EDIT','EDIT',3),
	(14,'USER','DELETE','DELETE',4),
	(15,'GROUP','VIEW','VIEW',1),
	(16,'GROUP','ADD','ADD',2),
	(17,'GROUP','EDIT','EDIT',3),
	(18,'GROUP','DELETE','DELETE',4),
	(19,'MEMBER','VIEW','VIEW',1),
	(20,'MEMBER','EDIT','EDIT',2),
	(21,'MEMBER','DELETE','DELETE',3),
	(22,'CATEGORY','VIEW','VIEW',1),
	(23,'CATEGORY','ADD','ADD',2),
	(24,'CATEGORY','EDIT','EDIT',3),
	(25,'CATEGORY','DELETE','DELETE',4);

/*!40000 ALTER TABLE `s_appl_detail` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table s_appl_group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `s_appl_group`;

CREATE TABLE `s_appl_group` (
  `ID` varchar(15) NOT NULL DEFAULT '',
  `NAME` varchar(100) NOT NULL DEFAULT '',
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `ORDER_NO` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `s_appl_group` WRITE;
/*!40000 ALTER TABLE `s_appl_group` DISABLE KEYS */;

INSERT INTO `s_appl_group` (`ID`, `NAME`, `DESCRIPTION`, `ORDER_NO`)
VALUES
	('GENERAL','General Settings','fas fa-cogs',30),
	('SYSTEM','System','fas fa-users-cog',100),
	('MAIN','Main Module','fas fa-home',20);

/*!40000 ALTER TABLE `s_appl_group` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table s_group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `s_group`;

CREATE TABLE `s_group` (
  `ID` varchar(15) NOT NULL DEFAULT '',
  `NAME` varchar(100) NOT NULL DEFAULT '',
  `DESCRIPTION` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `s_group` WRITE;
/*!40000 ALTER TABLE `s_group` DISABLE KEYS */;

INSERT INTO `s_group` (`ID`, `NAME`, `DESCRIPTION`)
VALUES
	('ADMIN','Administrator','Administrator');

/*!40000 ALTER TABLE `s_group` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table s_group_appl
# ------------------------------------------------------------

DROP TABLE IF EXISTS `s_group_appl`;

CREATE TABLE `s_group_appl` (
  `GROUP_ID` varchar(15) NOT NULL DEFAULT '',
  `APPL_ID` varchar(15) NOT NULL DEFAULT '',
  `ROLE` varchar(255) NOT NULL DEFAULT '',
  `ID` int(15) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `s_group_appl` WRITE;
/*!40000 ALTER TABLE `s_group_appl` DISABLE KEYS */;

INSERT INTO `s_group_appl` (`GROUP_ID`, `APPL_ID`, `ROLE`, `ID`)
VALUES
	('ADMIN','ORDER','VIEW; ADD; EDIT; DELETE; UPLOAD; ',25),
	('ADMIN','MEMBER','VIEW; ADD; EDIT; DELETE; UPLOAD; ',26),
	('ADMIN','ABOUT','VIEW; ADD; EDIT; DELETE; UPLOAD; ',27),
	('ADMIN','BANNER','VIEW; ADD; EDIT; DELETE; UPLOAD; ',18),
	('ADMIN','TERMS','VIEW; ADD; EDIT; DELETE; UPLOAD; ',28),
	('ADMIN','FAQ','VIEW; ADD; EDIT; DELETE; UPLOAD; ',29),
	('ADMIN','CONTACT','VIEW; ADD; EDIT; DELETE; UPLOAD; ',30),
	('ADMIN','PRIVACY','VIEW; ADD; EDIT; DELETE; UPLOAD; ',31),
	('ADMIN','PRODUCT','VIEW; ADD; EDIT; DELETE; UPLOAD; ',4),
	('ADMIN','USER','VIEW; ADD; EDIT; DELETE; ',2),
	('ADMIN','GROUP','VIEW; ADD; EDIT; DELETE; ',1),
	('ADMIN','MARGIN','VIEW;ADD;EDIT;DELETE;UPLOAD',0);

/*!40000 ALTER TABLE `s_group_appl` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table s_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `s_user`;

CREATE TABLE `s_user` (
  `ID` varchar(15) NOT NULL DEFAULT '',
  `NAME` varchar(15) NOT NULL DEFAULT '',
  `PASS` varchar(50) DEFAULT NULL,
  `GROUP_ID` varchar(15) NOT NULL DEFAULT '',
  `STATUS` varchar(15) NOT NULL DEFAULT '',
  `ATTEMPTED_LOGIN` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `s_user` WRITE;
/*!40000 ALTER TABLE `s_user` DISABLE KEYS */;

INSERT INTO `s_user` (`ID`, `NAME`, `PASS`, `GROUP_ID`, `STATUS`, `ATTEMPTED_LOGIN`)
VALUES
	('tonystark','Tony Stark','0192023a7bbd73250516f069df18b500','ADMIN','ACTIVE',0),
	('ADMIN','Administrator','6367c48dd193d56ea7b0baad25b19455e529f5ee','ADMIN','ACTIVE',0);

/*!40000 ALTER TABLE `s_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `no` int(5) unsigned NOT NULL,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `pass` varchar(100) NOT NULL DEFAULT '',
  `nama` varchar(50) NOT NULL DEFAULT '',
  `status` char(3) NOT NULL DEFAULT '',
  `level` char(3) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;

INSERT INTO `tb_admin` (`no`, `userid`, `pass`, `nama`, `status`, `level`)
VALUES
	(9,'admin','21232f297a57a5a743894a0e4a801fc3','Admin New Life','1','2'),
	(17,'master','e10adc3949ba59abbe56e057f20f883e','Master','1','2');

/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table v_g_order_amount
# ------------------------------------------------------------

DROP VIEW IF EXISTS `v_g_order_amount`;

CREATE TABLE `v_g_order_amount` (
   `ORDER_NO` VARCHAR(20) NOT NULL DEFAULT '',
   `AMOUNT` DOUBLE NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table v_g_order_detail
# ------------------------------------------------------------

DROP VIEW IF EXISTS `v_g_order_detail`;

CREATE TABLE `v_g_order_detail` (
   `ID` INT(50) NOT NULL,
   `PRODUCT_ID` VARCHAR(255) NOT NULL,
   `PRODUCT_NAME` VARCHAR(255) NOT NULL,
   `DESCRIPTION` VARCHAR(255) NOT NULL,
   `COLOR` VARCHAR(255) NOT NULL,
   `TYPE` VARCHAR(10) NOT NULL,
   `PRODUCT_PRICE` VARCHAR(50) NOT NULL,
   `IMAGE` VARCHAR(255) NOT NULL,
   `REC_ID` INT(11) NOT NULL DEFAULT '0',
   `FLAG` VARCHAR(2) NOT NULL,
   `ORDER_NO` VARCHAR(20) NOT NULL DEFAULT '',
   `PROD_ID` VARCHAR(25) NOT NULL DEFAULT '0',
   `QUANTITY` SMALLINT(6) NOT NULL DEFAULT '0',
   `WEIGHT` DOUBLE NOT NULL DEFAULT '0',
   `PRICE` DOUBLE NOT NULL DEFAULT '0',
   `POSTAGE` DOUBLE NOT NULL,
   `NOTES` VARCHAR(250) NOT NULL DEFAULT ''
) ENGINE=MyISAM;



# Dump of table v_g_order_master
# ------------------------------------------------------------

DROP VIEW IF EXISTS `v_g_order_master`;

CREATE TABLE `v_g_order_master` (
   `ID` INT(10) NULL DEFAULT '0',
   `FIRST_NAME` VARCHAR(255) NULL DEFAULT NULL,
   `LAST_NAME` VARCHAR(255) NULL DEFAULT NULL,
   `BIRTH_DATE` DATE NULL DEFAULT NULL,
   `JOIN_DATE` DATETIME NULL DEFAULT NULL,
   `PHONE` VARCHAR(45) NULL DEFAULT '',
   `ADDRESS` VARCHAR(100) NULL DEFAULT '',
   `ADDRESS_2` VARCHAR(100) NULL DEFAULT NULL,
   `COUNTRY` VARCHAR(100) NULL DEFAULT NULL,
   `PROVINCE` VARCHAR(100) NULL DEFAULT '',
   `ZIP` VARCHAR(100) NULL DEFAULT '',
   `EMAIL` VARCHAR(100) NULL DEFAULT '',
   `PASSWORD` VARCHAR(100) NULL DEFAULT '',
   `STATUS` VARCHAR(15) NULL DEFAULT '',
   `HASH` VARCHAR(100) NULL DEFAULT '',
   `ORDER_NO` VARCHAR(20) NOT NULL DEFAULT '',
   `ORDER_DATE` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
   `MEMBER_ID` VARCHAR(15) NOT NULL DEFAULT '0',
   `MEMBER_NAME` VARCHAR(255) NOT NULL,
   `MEMBER_PHONE` VARCHAR(20) NOT NULL,
   `MEMBER_EMAIL` VARCHAR(100) NOT NULL,
   `TOTAL_ORDER` DOUBLE NOT NULL DEFAULT '0',
   `TOTAL_POSTAGE` DOUBLE NOT NULL,
   `STATUS_ORDER` VARCHAR(20) NOT NULL,
   `UPDATED` DATETIME NULL DEFAULT NULL,
   `ADDRESSO_1` VARCHAR(255) NOT NULL,
   `ADDRESSO_2` VARCHAR(255) NOT NULL,
   `COUNTRY_ORDER` VARCHAR(50) NOT NULL,
   `ZIP_ORDER` VARCHAR(15) NOT NULL,
   `STATE` VARCHAR(50) NOT NULL,
   `AMOUNT` DOUBLE NOT NULL DEFAULT '0'
) ENGINE=MyISAM;



# Dump of table v_g_orders
# ------------------------------------------------------------

DROP VIEW IF EXISTS `v_g_orders`;

CREATE TABLE `v_g_orders` (
   `ORDER_NO` VARCHAR(20) NOT NULL DEFAULT '',
   `ORDER_DATE` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
   `ORDER_STATUS` VARCHAR(20) NOT NULL,
   `ORDER_ID` VARCHAR(15) NOT NULL DEFAULT '0',
   `MEMBER_NAME` VARCHAR(255) NOT NULL,
   `MEMBER_PHONE` VARCHAR(20) NOT NULL,
   `MEMBER_EMAIL` VARCHAR(100) NOT NULL,
   `TOTAL_ORDER` DOUBLE NOT NULL DEFAULT '0',
   `TOTAL_POSTAGE` DOUBLE NOT NULL,
   `PRODUCT_ID` VARCHAR(25) NULL DEFAULT '0',
   `PRODUCT_QUANTITY` SMALLINT(6) NULL DEFAULT '0',
   `PRODUCT_WEIGHT` DOUBLE NULL DEFAULT '0',
   `PRODUCT_PRICE` DOUBLE NULL DEFAULT '0',
   `PRODUCT_FINAL_PRICE` DOUBLE NULL DEFAULT NULL,
   `PRODUCT_POSTAGE` DOUBLE NULL DEFAULT NULL,
   `PRODUCT_NOTES` VARCHAR(250) NULL DEFAULT ''
) ENGINE=MyISAM;





# Replace placeholder table for v_g_order_amount with correct view syntax
# ------------------------------------------------------------

DROP TABLE `v_g_order_amount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_g_order_amount`
AS SELECT
   `b`.`ORDER_NO` AS `ORDER_NO`,sum((`a`.`FINAL_PRICE` * `a`.`QUANTITY`)) AS `AMOUNT`
FROM (`g_order_detail` `a` join `g_order_master` `b` on((`a`.`ORDER_NO` = `b`.`ORDER_NO`))) group by `b`.`ORDER_NO`;


# Replace placeholder table for v_g_order_master with correct view syntax
# ------------------------------------------------------------

DROP TABLE `v_g_order_master`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_g_order_master`
AS SELECT
   `a`.`ID` AS `ID`,
   `a`.`FIRST_NAME` AS `FIRST_NAME`,
   `a`.`LAST_NAME` AS `LAST_NAME`,
   `a`.`BIRTH_DATE` AS `BIRTH_DATE`,
   `a`.`JOIN_DATE` AS `JOIN_DATE`,
   `a`.`PHONE` AS `PHONE`,
   `a`.`ADDRESS` AS `ADDRESS`,
   `a`.`ADDRESS_2` AS `ADDRESS_2`,
   `a`.`COUNTRY` AS `COUNTRY`,
   `a`.`PROVINCE` AS `PROVINCE`,
   `a`.`ZIP` AS `ZIP`,
   `a`.`EMAIL` AS `EMAIL`,
   `a`.`PASSWORD` AS `PASSWORD`,
   `a`.`STATUS` AS `STATUS`,
   `a`.`HASH` AS `HASH`,
   `b`.`ORDER_NO` AS `ORDER_NO`,
   `b`.`ORDER_DATE` AS `ORDER_DATE`,
   `b`.`MEMBER_ID` AS `MEMBER_ID`,
   `b`.`MEMBER_NAME` AS `MEMBER_NAME`,
   `b`.`MEMBER_PHONE` AS `MEMBER_PHONE`,
   `b`.`MEMBER_EMAIL` AS `MEMBER_EMAIL`,
   `b`.`TOTAL_ORDER` AS `TOTAL_ORDER`,
   `b`.`TOTAL_POSTAGE` AS `TOTAL_POSTAGE`,
   `b`.`STATUS` AS `STATUS_ORDER`,
   `b`.`UPDATED` AS `UPDATED`,
   `b`.`ADDRESS_1` AS `ADDRESSO_1`,
   `b`.`ADDRESS_2` AS `ADDRESSO_2`,
   `b`.`COUNTRY` AS `COUNTRY_ORDER`,
   `b`.`ZIP` AS `ZIP_ORDER`,
   `b`.`STATE` AS `STATE`,ifnull(`c`.`AMOUNT`,0) AS `AMOUNT`
FROM ((`g_order_master` `b` left join `g_member` `a` on((`a`.`ID` = `b`.`MEMBER_ID`))) left join `v_g_order_amount` `c` on((`b`.`ORDER_NO` = `c`.`ORDER_NO`)));


# Replace placeholder table for v_g_order_detail with correct view syntax
# ------------------------------------------------------------

DROP TABLE `v_g_order_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_g_order_detail`
AS SELECT
   `a`.`ID` AS `ID`,
   `a`.`PRODUCT_ID` AS `PRODUCT_ID`,
   `a`.`PRODUCT_NAME` AS `PRODUCT_NAME`,
   `a`.`DESCRIPTION` AS `DESCRIPTION`,
   `a`.`COLOR` AS `COLOR`,
   `a`.`TYPE` AS `TYPE`,
   `a`.`PRODUCT_PRICE` AS `PRODUCT_PRICE`,
   `a`.`IMAGE` AS `IMAGE`,
   `b`.`REC_ID` AS `REC_ID`,
   `b`.`FLAG` AS `FLAG`,
   `b`.`ORDER_NO` AS `ORDER_NO`,
   `b`.`PROD_ID` AS `PROD_ID`,
   `b`.`QUANTITY` AS `QUANTITY`,
   `b`.`WEIGHT` AS `WEIGHT`,
   `b`.`PRICE` AS `PRICE`,
   `b`.`POSTAGE` AS `POSTAGE`,
   `b`.`NOTES` AS `NOTES`
FROM (`g_product` `a` join `g_order_detail` `b` on((`a`.`PRODUCT_ID` = `b`.`PROD_ID`)));


# Replace placeholder table for v_g_orders with correct view syntax
# ------------------------------------------------------------

DROP TABLE `v_g_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_g_orders`
AS SELECT
   `a`.`ORDER_NO` AS `ORDER_NO`,
   `a`.`ORDER_DATE` AS `ORDER_DATE`,
   `a`.`STATUS` AS `ORDER_STATUS`,
   `a`.`MEMBER_ID` AS `ORDER_ID`,
   `a`.`MEMBER_NAME` AS `MEMBER_NAME`,
   `a`.`MEMBER_PHONE` AS `MEMBER_PHONE`,
   `a`.`MEMBER_EMAIL` AS `MEMBER_EMAIL`,
   `a`.`TOTAL_ORDER` AS `TOTAL_ORDER`,
   `a`.`TOTAL_POSTAGE` AS `TOTAL_POSTAGE`,
   `b`.`PROD_ID` AS `PRODUCT_ID`,
   `b`.`QUANTITY` AS `PRODUCT_QUANTITY`,
   `b`.`WEIGHT` AS `PRODUCT_WEIGHT`,
   `b`.`PRICE` AS `PRODUCT_PRICE`,
   `b`.`FINAL_PRICE` AS `PRODUCT_FINAL_PRICE`,
   `b`.`POSTAGE` AS `PRODUCT_POSTAGE`,
   `b`.`NOTES` AS `PRODUCT_NOTES`
FROM (`g_order_master` `a` left join `g_order_detail` `b` on((`a`.`ORDER_NO` = `b`.`ORDER_NO`)));

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
