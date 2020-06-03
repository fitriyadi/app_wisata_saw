/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.20 : Database - db_wisata
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_wisata` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_wisata`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `admin_id` char(3) DEFAULT NULL,
  `admin_name` varchar(30) DEFAULT NULL,
  `admin_username` varchar(30) DEFAULT NULL,
  `admin_password` varchar(30) DEFAULT NULL,
  `admin_email` varchar(15) DEFAULT NULL,
  `admin_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`admin_id`,`admin_name`,`admin_username`,`admin_password`,`admin_email`,`admin_status`) values ('A01','Nama','username','password','email@email.com','Admin');

/*Table structure for table `tb_armada` */

DROP TABLE IF EXISTS `tb_armada`;

CREATE TABLE `tb_armada` (
  `armada_id` char(5) NOT NULL,
  `armada_category` varchar(20) DEFAULT NULL,
  `armada_name` varchar(50) DEFAULT NULL,
  `armada_photo` varchar(30) DEFAULT NULL,
  `armada_information` text,
  PRIMARY KEY (`armada_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_armada` */

insert  into `tb_armada`(`armada_id`,`armada_category`,`armada_name`,`armada_photo`,`armada_information`) values ('AR001','Mini Bus','Armada 1','AR001.jpg','<p>Isi Keterangan baru</p>'),('AR002','Mini Bus','Armada 2','AR002.jpg','<p>Armada 2 bar keterangan</p>'),('AR003','Mini Bus','Armada 3','AR003.jpg','<p>Keterangan aramda 3</p>');

/*Table structure for table `tb_confirmation` */

DROP TABLE IF EXISTS `tb_confirmation`;

CREATE TABLE `tb_confirmation` (
  `confirmation_id` char(10) NOT NULL,
  `confirmation_order` char(10) DEFAULT NULL,
  `confirmation_number_bank` varchar(20) DEFAULT NULL,
  `confirmation_bank_name` varchar(20) DEFAULT NULL,
  `confirmation_bank_user` varchar(50) DEFAULT NULL,
  `confirmation_file` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`confirmation_id`),
  KEY `confirmation_order` (`confirmation_order`),
  CONSTRAINT `tb_confirmation_ibfk_1` FOREIGN KEY (`confirmation_order`) REFERENCES `tb_order` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_confirmation` */

insert  into `tb_confirmation`(`confirmation_id`,`confirmation_order`,`confirmation_number_bank`,`confirmation_bank_name`,`confirmation_bank_user`,`confirmation_file`) values ('KNF-000002','ORD-000002','1234567','Bank BCA','Tukino','KNF-000002.jpg'),('KNF-000003','ORD-000006','123123','BCA','Tukino','KNF-000003.jpg');

/*Table structure for table `tb_gallery` */

DROP TABLE IF EXISTS `tb_gallery`;

CREATE TABLE `tb_gallery` (
  `gallery_id` char(5) NOT NULL,
  `gallery_photo` varchar(50) DEFAULT NULL,
  `gallery_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_gallery` */

insert  into `tb_gallery`(`gallery_id`,`gallery_photo`,`gallery_name`) values ('GL001','AR001.jpg','Gallery 1'),('GL002','AR002.jpg','Gallery 2 Baru');

/*Table structure for table `tb_hotel` */

DROP TABLE IF EXISTS `tb_hotel`;

CREATE TABLE `tb_hotel` (
  `hotel_id` char(5) NOT NULL,
  `hotel_name` varchar(50) DEFAULT NULL,
  `hotel_rate` int(11) DEFAULT NULL,
  `hotel_information` text,
  `hotel_photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_hotel` */

insert  into `tb_hotel`(`hotel_id`,`hotel_name`,`hotel_rate`,`hotel_information`,`hotel_photo`) values ('HT001','Hotel 1',1,'<p>Ini namanya hotel,,,&nbsp;</p>','HT001.jpg'),('HT002','Hotel 2',2,'<p>keterangan hotel 2</p>','HT002.jpg'),('HT003','Hotel 3',3,'<p>keterangan hotel 3</p>','HT003.jpg');

/*Table structure for table `tb_location` */

DROP TABLE IF EXISTS `tb_location`;

CREATE TABLE `tb_location` (
  `location_id` char(5) NOT NULL,
  `location_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_location` */

insert  into `tb_location`(`location_id`,`location_name`) values ('LK001','Yogyakarta'),('LK002','Sleman'),('LK003','Bantul'),('LK004','Wates'),('LK005','Wonosari'),('LK006','Boyolali'),('LK007','Semarang'),('LK008','Wonogiri'),('LK009','Wonosobo');

/*Table structure for table `tb_member` */

DROP TABLE IF EXISTS `tb_member`;

CREATE TABLE `tb_member` (
  `member_id` char(5) NOT NULL,
  `member_name` varchar(30) DEFAULT NULL,
  `member_username` varchar(30) DEFAULT NULL,
  `member_password` varchar(30) DEFAULT NULL,
  `member_phone` varchar(15) DEFAULT NULL,
  `member_ktp_no` varchar(20) DEFAULT NULL,
  `member_location` varchar(50) DEFAULT NULL,
  `member_birth` date DEFAULT NULL,
  `member_addres` varchar(100) DEFAULT NULL,
  `member_gender` char(1) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_member` */

insert  into `tb_member`(`member_id`,`member_name`,`member_username`,`member_password`,`member_phone`,`member_ktp_no`,`member_location`,`member_birth`,`member_addres`,`member_gender`) values ('M-001','Tukino','Tukino','aa','081908789098','090989801616191','Sleman','1990-09-20','Jln.Pandega Sleman, Yogyakarta','L'),('M-002','Tukino','namasaya','ada saja','adasaja',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tb_order` */

DROP TABLE IF EXISTS `tb_order`;

CREATE TABLE `tb_order` (
  `order_id` char(10) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_packcage` char(5) DEFAULT NULL,
  `order_status` varchar(20) DEFAULT NULL,
  `order_member` char(5) DEFAULT NULL,
  `order_reservasi` date DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `order_packcage` (`order_packcage`),
  KEY `order_member` (`order_member`),
  CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`order_packcage`) REFERENCES `tb_packcage` (`packcage_id`),
  CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`order_member`) REFERENCES `tb_member` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_order` */

insert  into `tb_order`(`order_id`,`order_date`,`order_packcage`,`order_status`,`order_member`,`order_reservasi`) values ('ORD-000002','2017-09-04','PK001','Valid','M-001',NULL),('ORD-000005','2017-09-20','PK001','Pending','M-001','2017-09-22'),('ORD-000006','2017-09-20','PK001','Tidak Valid','M-001','2017-09-21');

/*Table structure for table `tb_packcage` */

DROP TABLE IF EXISTS `tb_packcage`;

CREATE TABLE `tb_packcage` (
  `packcage_id` char(5) NOT NULL,
  `packcage_name` varchar(50) DEFAULT NULL,
  `packcage_armada` char(5) DEFAULT NULL,
  `packcage_hotel` char(5) DEFAULT NULL,
  `packcage_long_tour` int(11) DEFAULT NULL,
  `packcage_price` int(11) DEFAULT NULL,
  `packcage_amount` int(11) DEFAULT NULL,
  `packcage_detail` text,
  PRIMARY KEY (`packcage_id`),
  KEY `packcage_armada` (`packcage_armada`),
  KEY `packcage_hotel` (`packcage_hotel`),
  CONSTRAINT `tb_packcage_ibfk_1` FOREIGN KEY (`packcage_armada`) REFERENCES `tb_armada` (`armada_id`),
  CONSTRAINT `tb_packcage_ibfk_2` FOREIGN KEY (`packcage_hotel`) REFERENCES `tb_hotel` (`hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_packcage` */

insert  into `tb_packcage`(`packcage_id`,`packcage_name`,`packcage_armada`,`packcage_hotel`,`packcage_long_tour`,`packcage_price`,`packcage_amount`,`packcage_detail`) values ('PK001','3 DAY TOUR AADC 2 JOGJA','AR001','HT001',3,1050000,3,'<p>AADC 2 adalah film yang diproduseri oleh Mira Lesmana dan Riri Riza , bercerita tentang &rdquo; Love &amp; Second Change to love someone &rdquo; sepasang kekasih yaitu RANGGA dan CINTA , disaat waktu yang sudah terlalu lama selama 9 Tahun perpisahan karena alasan yang tidak jelas oleh rangga membuat cinta memendam kekecewaan dan kesedihan terhadap rangga , tapi kekuatan cinta dapat mempertemukan mereka kembali dan mendapatkan kesempatan untuk memulai cinta yang sudah lama di pendam mereka berdua.</p><p>Rasakan moment dan feelnya nya bersama kami dengan mengunjungi tempat-tempat scene lokasi syuting AADC2 di kota yang indah Jogjakarta. saran kami nonton dulu ya filmnya supaya feelnya dapat saat mengunjungi lokasi-lokasi perjalan rangga dan cinta di Jogjakarta</p><p>&nbsp;</p><p><strong>DAY 01&nbsp;&nbsp;: PADEPOKAN BAGONG&ndash; RATU BOKO &ndash; TEBING BREKSI&ndash; KLINIK KOPI &ndash; GREENHOST BOUTIQUE HOTEL ( L / D )</strong></p><p>08.00 &ndash; 09.00 : Penjemputan Rombongan di Bandara Adisucipto Jogja&nbsp;<br />09.00 &ndash; 11.00 : Perjalanan Menuju padepokan bagong kasudiarja<br />11.00 &ndash; 12.00 : Makan siang di Lokal Resto ( tempat cinta dan teman-teman sarapan )<br />13.00 &ndash; 16:00 : Kunjungan dan Aktivitas Wisata di Candi ratu boko dan tebing breksi&nbsp;<br />16.00 &ndash; 18:00 : Kunjungan menuju klinik kopi<br />18.00 &ndash; 19.00 : makan malam Lokal restaurant<br />19.00 &ndash; 20.00 : check in hotel Greenhost Boutique, istirahat &amp; free time&nbsp;</p><p>&nbsp;</p><p><strong>DAY 02 :&nbsp;&nbsp;BOROBUDUR SUNRISE &ndash; VIAVIA BAKERY &ndash; SELIE COFFE &ndash; PAPERMOON PUPPET &ndash; PANTAI PARANGKUSUMO &ndash; SATE KLATAK ( L / D)</strong></p><p>04.00 &ndash; 06.00 : Perjalanan menuju Magelang. Menikmati sunrise di Candi Borobudur;<br />06.00 &ndash; 08.00 : Perjalanan menuju viavia bakery membeli sarapan roti&nbsp;<br />08.00 &ndash; 10.00 : Kunjungan dan Aktivitas Wisata di Candi Pawon Magelang<br />10.00 &ndash; 11.30 : Kunjungan&nbsp;&nbsp;di sellie coffe&nbsp;<br />11.30 &ndash; 12.30 : menuju sate klatak pak bari ( tempat cinta dan rangga makan malam )<br />12.30 &ndash; 14.30 : Perjalanan menuju teater papermoon puppet&nbsp;<br />14.30 &ndash; 16.30 : Kunjungan pantai parangkusumo&nbsp;<br />16.30 &ndash; 17.00 : Perjalanan menuju Hotel, Istirahat dan Free Time<br />19.00 &ndash; 21.00 : Kunjungan di Malioboro dan Nol KM Jogja (Dinner Personal Charge)</p><p>&nbsp;</p><p><strong>Day 03: SUNRISE GEREJA AYAM&ndash; PUTHUK SETUMBHU &ndash; GUDEG YUDJUM &nbsp; ( L ) &nbsp; &nbsp;</strong></p><p>07.30 &ndash; 08.30 : Peserta diharapkan sudah bersiap &amp; Check Out Hotel;<br />08.30 &ndash; 11.00 : Kunjungan menuju gereja ayam dan puthuk setumbu<br />12.00 &ndash; 13.00 : Makan siang di gudeg yudjum<br />13.00 &ndash; 14.00 : Transfer Out bandara Adisucipto Jogjakarta dan Tour Selesai&nbsp;</p><p>&nbsp;</p><p><strong>PAKET TOUR TERMASUK :&nbsp;</strong></p><ol>	<li>Antar jemput peserta di tempat yang disepakati (dalam kota).</li>	<li>Transportasi Pariwisata all in selama tour (Mobil, BBM &amp; Driver)</li>	<li>Tiket masuk setiap di obyek wisata.</li>	<li>Tour Leader / Local Tour Guide.</li>	<li>Makan sesuai program.</li>	<li>Welcome snack &amp; Drink</li>	<li>Air mineral 600 ml 1 hari 1 botol.</li>	<li>Free dokumentasi (min. 20 pax).</li>	<li>Free spanduk tur (min. 20 pax).</li>	<li>Donasi di setiap obyek wisata.</li>	<li>Asuransi perjaanan wisata</li>	<li>P3K &amp; obat standar</li>	<li>Biaya parkir kendaraan</li></ol><p>&nbsp;</p><p><strong>PAKET TOUR TIDAK TERMASUK :&nbsp;</strong></p><ol>	<li>Akomodasi Hotel (hubungi kami untuk memilih hotel favorit Anda).</li>	<li>Transportasi dari kota asal ke Semarang.</li>	<li>Tipping Tour Leader, Guide dan Driver.</li>	<li>Jasa Porter.</li>	<li>Pengeluaran pribadi.</li>	<li>Pajak.</li></ol>'),('PK002','1 DAY BOROBUDUR SUNRISE TOUR','AR001','HT001',1,300000,1,'<p><strong>INTENERARY DETAILS : UPDATE JANUARI 2017</strong></p><ul>	<li>03.00 - 04.00 &nbsp;: Akan di Jemput Dini Hari Oleh Guide ( Bandara/ Statsiun/ Hotel) Yogyakarta</li>	<li>04.00 - 05.00 : Perjalanan menuju Candi Borobudur Magelang</li>	<li>05.00 - 06.30 : Menikmati keindahan Sunrise Borobudur</li>	<li>06.30 - 08.00 : Makan pagi di Lokal Restaurant</li>	<li>08.00 - 10.00 : Kunjungan dan Aktivitas Wisata di Candi Borobudur</li>	<li>10.00 - 11.00 : Perjalanan Menuju Kota Yogyakarta</li>	<li>12.00 &ndash; 13.00 : Makan siang Local Restaurant</li>	<li>13.00 &ndash; 15.00 : Kunjungan dan Aktivitas wisata di Keraton Yogya &amp; Istana Taman Sari</li>	<li>15.00 &ndash; 18.00 :&nbsp;Kunjungan di Jalan Malioboro (Free time)</li>	<li>18.00 - 19.00&nbsp;&nbsp;:Makan malam lokal Restaurant</li>	<li>19.30 - 20.00&nbsp;: Perjalanan kembali pulang &amp; Tour Selesai</li></ul><p>&nbsp;</p><p><strong>PAKET TOUR TERMASUK :&nbsp;</strong></p><p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transport Wisata(Kendaraan + Pengemudi Profesional + BBM)</p><p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tiket Masuk Semua Objek Wisata sesuai program</p><p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asuransi Perjalanan Wisata</p><p>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Meals (Breakfast, Lunch &amp; Dinner) sesuai Program;</p><p>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Air mineral selama perjalanan (600 ml)</p><p>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome Snack&nbsp; + Soft Drink;</p><p>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Local Guide (English Speaking Guide)</p><p>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P3K dan Obat2 standar</p><p>9.&nbsp;&nbsp;&nbsp;Fee Crew Bus + Kondektur</p><p>11.&nbsp;&nbsp;&nbsp;Foto dan Dokumentasi</p>'),('PK003','1 DAY RATU BOKO SUNSET','AR001','HT001',1,250000,1,'<p><strong>NTENERARY DETAILS : UPDATE JANUARI 2017</strong></p><ul>	<li>08.00 - 09.00 : Penjemputan Meeting Point ( Bandara/ Statsiun/ Hotel) Jogjakarta</li>	<li>09.00 &ndash; 10.00 : Kunjungan dan Aktivitas Wisata di Keraton Yogyakarta &amp; Istana Taman Sari&nbsp;</li>	<li>10.00 - 12.00 : Kunjungan di Kawasan Jalan malioboro (Free Time)</li>	<li>13.00 &ndash; 14.00 : Makan siang lokal Restaurant Jogja</li>	<li>14.00 - 16.00 : Kunjungan dan Aktivitas wisata di Candi Prambanan</li>	<li>16.00 &ndash; 18.00 : Hunting Sunset Kawasan Candi Ratu Boko</li>	<li>18.00 - 19.00&nbsp;&nbsp;:Makan malam lokal Restaurant</li>	<li>19.30 - 20.00&nbsp;: Perjalanan kembali pulang &amp; Tour Selesai</li></ul><p>&nbsp;</p><p><strong>PAKET TOUR TERMASUK :&nbsp;</strong></p><p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transport Wisata(Kendaraan + Pengemudi Profesional + BBM)</p><p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tiket Masuk Semua Objek Wisata sesuai program</p><p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asuransi Perjalanan Wisata</p><p>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Meals (Lunch &amp; Dinner) sesuai Program;</p><p>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Air mineral selama perjalanan (600 ml)</p><p>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome Snack&nbsp; + Soft Drink;</p><p>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Local Guide (English Speaking Guide)</p><p>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P3K dan Obat2 standar</p><p>9.&nbsp;&nbsp;&nbsp;Fee Crew Bus + Kondektur</p><p>11.&nbsp;&nbsp;&nbsp;Foto dan Dokumentasi</p>'),('PK004','3 DAY LAVA TOUR YOGYAKARTA','AR001','HT001',3,985000,3,'<p><strong>LAVA TOUR YOGYA 3 DAY 2 NIGHT : VALID LOW SEASON 017</strong></p><p><strong>HARI PERTAMA : CANDI BOROBUDUR &nbsp;(L / D) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></p><p>10.00 &ndash; 11.00 : Penjemputan Rombongan di Bandara Adi Sucipto Jogjakarta;<br />11.00 &ndash; 12.00 : Makan siang di Lokal Restaurant<br />12.00 &ndash; 14.00 : Perjalanan menuju Magelang Jawa Tengah<br />14.00 &ndash; 16:00 : Kunjungan dan Aktivitas Wisata di&nbsp;<strong>Candi Borobudur Magelang</strong><br />16.00 &ndash; 18.00 : Perjalanan kembali menuju Jogjakarta<br />18:00 &ndash; 19:00 : Makan Malam di Lokal Restaurant<br />20.00 &ndash; 20.30 : Check In Hotel, Istirahat &amp; Free Time</p><p>&nbsp;</p><p><strong>HARI KEDUA : ULLEN SENTALU &ndash; LAVA TOUR &ndash; RATU BOKO ( L / D ) &nbsp;&nbsp;</strong></p><p>08.30 &ndash; 09.00 : Peserta diharapkan sudah Sarapan pagi di Hotel &amp; Check Out Hotel;<br />08.00 &ndash; 10.00 : Perjalanan menuju Keliurang Yogyakarta (Perjalanan &plusmn; 1 jam)<br />10.30 -11.30 : Kunjungan dan Aktivitas Wisata di&nbsp;<strong>MUSEUM ULLEN SENTALU&nbsp;</strong><br />11.30 &ndash; 13.00 : Makan siang di Pemancingan dan Resto Moro Lejar (Lunch buffet)<br />13.30 &ndash; 15.00 : Transfer Jeep Merapi dan Aktivitas Wisata&nbsp;<strong>LAVA TOUR MERAPI</strong>&nbsp;<br />15.00 &ndash; 18.00 : Kunjungan dan Hunting Sunset di&nbsp;<strong>CANDI RATU BOKO</strong><br />18.00 &ndash; 19.00 : Makan malam di Lokal Restaurant<br />19.00 &ndash; 21:30 : Kembali ke Hotel, Istirahat &amp; Free Time;</p><p>&nbsp;</p><p><strong>HARI KETIGA : KERATON - TAMAN SARI - MALIOBORO ( L ) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></p><p>07.00 &ndash; 08.00 : Peserta di harapkan sudah Sarapan pagi dan Check Out Hotel;<br />08.00 - 0900 : Kunjungan dan Aktivitas Wisata di&nbsp;<strong>KERATON YOGYAKARTA</strong><br />09.00 - 10.00 : Kunjungan dan Aktivitas Wisata di&nbsp;<strong>ISTANA TAMAN SARI</strong><br />10.00 - 12.00 : Free time dan Shoping di&nbsp;<strong>KAWASAN MALIOBORO</strong><br />12.00 - 13.00 : Makan siang di Local Resto : Gudeg Yu Djum&nbsp;<br />08:00 &ndash; 09:00 : Shoping Oleh-oleh Khas Jogjakarta<br />09.00 &ndash; 10.00 : Transfer Out Stasiun/Bandara Semarang Tawang &amp; Tour Selesai&hellip;</p><p>&nbsp;</p><p><strong>PAKET TOUR TERMASUK :&nbsp;</strong></p><ol>	<li>Antar jemput peserta di tempat yang disepakati (dalam kota).</li>	<li>Transportasi Pariwisata all in selama tour (Mobil, BBM &amp; Driver)</li>	<li>Jeep Lava Tour - 1 Jeep 4 Orang (Durasi 2 jam)</li>	<li>Tiket masuk setiap di obyek wisata.</li>	<li>Tour Leader / Local Tour Guide.</li>	<li>Makan sesuai program.</li>	<li>Welcome snack &amp; Drink</li>	<li>Air mineral 600 ml 1 hari 1 botol.</li>	<li>Free dokumentasi (min. 20 pax).</li>	<li>Free spanduk tur (min. 20 pax).</li>	<li>Donasi di setiap obyek wisata.</li>	<li>Asuransi perjaanan wisata</li>	<li>P3K &amp; obat standar</li>	<li>Biaya parkir kendaraan</li></ol><p>&nbsp;</p><p><strong>PAKET TOUR TIDAK TERMASUK :&nbsp;</strong></p><ol>	<li>Akomodasi Hotel (hubungi kami untuk memilih hotel favorit Anda).</li>	<li>Transportasi dari kota asal ke Semarang.</li>	<li>Tipping Tour Leader, Guide dan Driver.</li>	<li>Jasa Porter.</li>	<li>Pengeluaran pribadi.</li>	<li>Pajak.</li></ol>'),('PK005','1 DAY FANTASTIC TOUR YOGYA','AR001','HT001',1,323000,1,'<p><strong>INTENERARY DETAILS : jUPDATE JANUARI 2017</strong></p><p>08.00 - 09.00 : Penjemputan Meeting Point ( Bandara/ Statsiun/ Hotel) Jogjakarta<br />09.00 &ndash; 12.00 : Kunjungan dan AKtivitas Wisata di&nbsp;JogjaBay Pirates Adventure Waterpark<br />13.00 &ndash; 14.00 : Makan siang lokal Restaurant Jogja&nbsp;<br />14.00 - 16.00 : Kunjungan dan Aktivitas Wisata di Museum De Mata De Arca<br />16.00 &ndash; 18.00 : Free Time &nbsp;di Malioboro Street Jogjakarta<br />18.30 - 19.00 : Makan malam di Lokal Resto Jogjakarta&nbsp;<br />19.00 - 20.00 &nbsp;: Perjalanan kembali pulang &amp; Tour Selesai</p><p>&nbsp;</p><p><strong>PAKET TOUR TERMASUK :&nbsp;</strong></p><p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transport Wisata(Kendaraan + Pengemudi Profesional + BBM)</p><p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tiket Masuk Semua Objek Wisata sesuai program</p><p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asuransi Perjalanan Wisata</p><p>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Meals (Lunch &amp; Dinner) sesuai Program;</p><p>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Air mineral selama perjalanan (600 ml)</p><p>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome Snack&nbsp; + Soft Drink;</p><p>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Local Guide (English Speaking Guide)</p><p>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P3K dan Obat2 standar</p><p>9.&nbsp;&nbsp;&nbsp;Fee Crew Bus + Kondektur</p><p>11.&nbsp;&nbsp;&nbsp;Foto dan Dokumentasi</p>'),('PK006','3 DAY GOA PINDUL YOGYAKARTA','AR001','HT001',3,950000,3,'<p>I<strong>TINERARY DETAILS : VALID LOW SEASON 2017</strong></p><p><strong>HARI PERTAMA : CANDI BOROBUDUR&nbsp;</strong>&nbsp;<strong>( L / D)</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p>10.00 &ndash; 11.00 : Penjemputan Rombongan di Bandara Adi Sucipto Jogjakarta;<br />11.00 &ndash; 12.00 : Makan siang di Lokal Restaurant<br />12.00 &ndash; 14.00 : Perjalanan menuju Magelang Jawa Tengah<br />14.00 &ndash; 16:00 : Kunjungan dan Aktivitas Wisata di&nbsp;<strong>Candi Borobudur</strong><br />16.00 &ndash; 18.00 : Perjalanan kembali menuju Jogjakarta<br />18:00 &ndash; 19:00 : Makan Malam di Lokal Restaurant<br />20.00 &ndash; 20.30 : Check In Hotel, Istirahat &amp; Free Time</p><p>&nbsp;</p><p><strong>HARI KEDUA : TEBING BREKSI - GOA PINDUL &ndash; INDRAYANTI &nbsp;( L / D ) &nbsp; &nbsp;</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p>08700 &ndash; 08.00 : Peserta diharapkan sudah Sarapan pagi di Hotel;<br />08.00 - 09.00 : Kunjungan dan AKtivitas Wisata di&nbsp;<strong>Tebing Breksi&nbsp;</strong><br />09.00 &ndash; 11.00 : Perjalanan menuju Gunung Kidul Yogyakarta (Perjalanan &plusmn; 2 jam)<br />11.00 &ndash; 12.00 : Makan siang Lokal Restaurant Gunung Kidul<br />12.00 -14.30 : Kunjungan dan Aktivitas Wisata di&nbsp;<strong>Goa Pindul : Cave Tubing</strong><br />14.30 - 15.00 : Perjalanan menuju Pantai Gunung Kidul<br />15.00 &ndash; 16.30 : Kunjungan dan Aktivitas Wisata di&nbsp;<strong>Pantai Indrayanti &amp; Pantai SUndak</strong><br />16.30 &ndash; 19.00 : Perjalanan menuju Jogja &amp; Makan malam di Lokal Restaurant<br />19.00 &ndash; 21:30 : Kembali ke Hotel, Istirahat &amp; Free Time;</p><p>&nbsp;</p><p><strong>HARI KETIGA : KERATON - TAMAN SARI - MALIOBORO &nbsp;( L) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></p><p>07.00 &ndash; 08.00 : Peserta di harapkan sudah Sarapan pagi dan Check Out Hotel;<br />08.00 - 0900 : Kunjungan dan Aktivitas Wisata di&nbsp;<strong>KERATON YOGYAKARTA</strong><br />09.00 - 10.00 : Kunjungan dan Aktivitas Wisata di&nbsp;<strong>ISTANA TAMAN SARI</strong><br />10.00 - 12.00 : Free time dan Shoping di&nbsp;<strong>KAWASAN MALIOBORO</strong><br />12.00 - 13.00 : Makan siang di Local Resto : Gudeg Yu Djum&nbsp;<br />08:00 &ndash; 09:00 : Shoping Oleh-oleh Khas Jogjakarta<br />09.00 &ndash; 10.00 : Transfer Out Stasiun/Bandara Semarang Tawang &amp; Tour Selesai&hellip;</p><p>&nbsp;</p><p><strong>PAKET TOUR TERMASUK :&nbsp;</strong></p><ol>	<li>Antar jemput peserta di tempat yang disepakati (dalam kota).</li>	<li>Transportasi Pariwisata all in selama tour (Mobil, BBM &amp; Driver)</li>	<li>Tiket masuk setiap di obyek wisata.</li>	<li>Tour Leader / Local Tour Guide.</li>	<li>Makan sesuai program.</li>	<li>Welcome snack &amp; Drink</li>	<li>Air mineral 600 ml 1 hari 1 botol.</li>	<li>Free dokumentasi (min. 20 pax).</li>	<li>Free spanduk tur (min. 20 pax).</li>	<li>Donasi di setiap obyek wisata.</li>	<li>Asuransi perjaanan wisata</li>	<li>P3K &amp; obat standar</li>	<li>Biaya parkir kendaraan</li></ol><p>&nbsp;</p><p><strong>PAKET TOUR TIDAK TERMASUK :&nbsp;</strong></p><ol>	<li>Akomodasi Hotel (hubungi kami untuk memilih hotel favorit Anda).</li>	<li>Transportasi dari kota asal ke Semarang.</li>	<li>Tipping Tour Leader, Guide dan Driver.</li>	<li>Jasa Porter.</li>	<li>Pengeluaran pribadi.</li>	<li>Pajak.</li></ol>');

/*Table structure for table `tb_packcage_detail` */

DROP TABLE IF EXISTS `tb_packcage_detail`;

CREATE TABLE `tb_packcage_detail` (
  `packcage_id` char(5) DEFAULT NULL,
  `packcage_tour` char(5) DEFAULT NULL,
  KEY `packcage_id` (`packcage_id`),
  KEY `packcage_tour` (`packcage_tour`),
  CONSTRAINT `tb_packcage_detail_ibfk_1` FOREIGN KEY (`packcage_id`) REFERENCES `tb_packcage` (`packcage_id`),
  CONSTRAINT `tb_packcage_detail_ibfk_2` FOREIGN KEY (`packcage_tour`) REFERENCES `tb_tour` (`tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_packcage_detail` */

insert  into `tb_packcage_detail`(`packcage_id`,`packcage_tour`) values ('PK002','WT001'),('PK001','WT001'),('PK001','WT002'),('PK001','WT003'),('PK003','WT001'),('PK004','WT001'),('PK004','WT002'),('PK004','WT003'),('PK005','WT001'),('PK006','WT001'),('PK006','WT002'),('PK006','WT003');

/*Table structure for table `tb_tour` */

DROP TABLE IF EXISTS `tb_tour`;

CREATE TABLE `tb_tour` (
  `tour_id` char(5) NOT NULL,
  `tour_name` varchar(50) DEFAULT NULL,
  `tour_location` char(5) DEFAULT NULL,
  `tour_category` varchar(50) DEFAULT NULL,
  `tour_photo` varchar(50) DEFAULT NULL,
  `tour_information` text,
  PRIMARY KEY (`tour_id`),
  KEY `tour_location` (`tour_location`),
  CONSTRAINT `tb_tour_ibfk_1` FOREIGN KEY (`tour_location`) REFERENCES `tb_location` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_tour` */

insert  into `tb_tour`(`tour_id`,`tour_name`,`tour_location`,`tour_category`,`tour_photo`,`tour_information`) values ('WT001','Wisata 1','LK001','Pantai','AR001.jpg','<p>isi wista 1</p>'),('WT002','Wisata 2','LK001','Agrowisata','AR002.jpg','<p>oke siap</p>'),('WT003','Wisata 3','LK001','Pantai','AR003.jpg','<p>isi wisata 3</p>');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
