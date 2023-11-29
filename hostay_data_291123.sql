-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.39-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema hostay_data
--

CREATE DATABASE IF NOT EXISTS hostay_data;
USE hostay_data;

--
-- Definition of table `tblbill`
--

DROP TABLE IF EXISTS `tblbill`;
CREATE TABLE `tblbill` (
  `bill_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bill_room_id` int(10) unsigned NOT NULL,
  `bill_customer_id` int(10) unsigned NOT NULL,
  `bill_created_at` datetime NOT NULL,
  `bill_fullname` varchar(100) NOT NULL,
  `bill_email` varchar(45) NOT NULL,
  `bill_phone` varchar(20) NOT NULL,
  `bill_start_date` datetime NOT NULL,
  `bill_end_date` datetime NOT NULL,
  `bill_number_adult` int(10) unsigned DEFAULT '0',
  `bill_number_children` int(10) unsigned DEFAULT '0',
  `bill_number_room` int(10) unsigned DEFAULT '1',
  `bill_notes` text,
  `bill_static` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbill`
--

/*!40000 ALTER TABLE `tblbill` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblbill` ENABLE KEYS */;


--
-- Definition of table `tblroom`
--

DROP TABLE IF EXISTS `tblroom`;
CREATE TABLE `tblroom` (
  `room_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_number_people` int(10) unsigned DEFAULT NULL,
  `room_number_bed` int(10) unsigned DEFAULT NULL,
  `room_quality` float DEFAULT NULL,
  `room_type` varchar(100) DEFAULT NULL,
  `room_bed_type` varchar(100) DEFAULT NULL,
  `room_price` decimal(10,0) NOT NULL,
  `room_detail` text,
  `room_area` float DEFAULT NULL,
  `room_static` int(10) unsigned DEFAULT '0',
  `room_image` text,
  `room_address` varchar(200) NOT NULL,
  `room_hotel_name` varchar(100) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroom`
--

/*!40000 ALTER TABLE `tblroom` DISABLE KEYS */;
INSERT INTO `tblroom` (`room_id`,`room_number_people`,`room_number_bed`,`room_quality`,`room_type`,`room_bed_type`,`room_price`,`room_detail`,`room_area`,`room_static`,`room_image`,`room_address`,`room_hotel_name`) VALUES 
 (1,2,1,4,'Standard','GiÆ°á»ng Ä‘Ã´i lá»›n','20','Boasting a terrace, Madelise Adora Hotel & Travel is situated in the centre of Hanoi, 400 metres from Hanoi Old City Gate. This 4-star hotel offers an ATM and a concierge service. The accommodation features a 24-hour front desk, airport transfers, room service and free WiFi throughout the property.\r\n',19,1,'/hostay/public/images/room-1.jpg','111 Pho Ma May, Hoan Kiem, Ha Noi, Viet Nam','Madelise Adora Hotel & Travel'),
 (2,2,1,4,'Deluxe','GiÆ°á»ng Ä‘Ã´i lá»›n','20','Ideally situated in the Ba Dinh district of Hanoi, THE GALAXY HOME APARTMENT is located 1.8 km from Ho Chi Minh Mausoleum, 2.3 km from Imperial Citadel and 2.3 km from Vietnam Fine Arts Museum. This 4-star hotel offers room service and free WiFi. The property is non-smoking and is situated 1.9 km from One Pillar Pagoda.',50,1,'/hostay/public/images/room-2.jpg','111 Pho Ma May, Hoan Kiem, Ha Noi, Viet Nam','The Galaxy Home Apartment'),
 (4,3,1,5,'Standard','GiÆ°á»ng Ä‘Ã´i lá»›n','30','Located in Hanoi, within 2.5 km of Vincom Center Nguyen Chi Thanh and 4.3 km of Vietnam Fine Arts Museum, Alula Sweet Home provides accommodation with a terrace and as well as free private parking for guests who drive. This 5-star hotel offers a shared kitchen and room service. Every room has a balcony with city views.\r\n\r\nAll units are equipped with air conditioning, a fridge, a microwave, a coffee machine, a shower, free toiletries and a desk. Guest rooms in the hotel are equipped with a flat-screen TV and a hairdryer.\r\n\r\nHanoi Temple of Literature is 4.3 km from Alula Sweet Home, while Vietnam Museum of Ethnology is 4.8 km away. The nearest airport is Noi Bai International Airport, 26 km from the accommodation.',40,1,'/hostay/public/images/1701228374_23717.jpg','Phá»‘ Quan NhÃ¢n 45, Quáº­n Thanh XuÃ¢n, HaÌ€ NÃ´Ì£i, ViÃªÌ£t Nam','Alula Sweet Home'),
 (5,2,1,4,'Standard','GiÆ°á»ng Ä‘Ã´i lá»›n','14','Located in Hanoi, 11 km from Vietnam Museum of Ethnology, NhÃ  Nghá»‰ Huyá»n Anh provides accommodation with a terrace, free private parking and a bar. The property is around 11 km from West Lake, 13 km from Quan Thanh Temple and 13 km from Ho Chi Minh Mausoleum. The air-conditioned rooms provide a river view and come with a desk and free WiFi.\r\n</br>\r\nAt the hotel, every room is fitted with a wardrobe. The private bathroom is equipped with a bidet, free toiletries and a hairdryer. At NhÃ  Nghá»‰ Huyá»n Anh every room is equipped with bed linen and towels.',25,3,'/hostay/public/images/1701228797_50530.jpg','Sá»‘ 17 ÄÆ°á»ng ÄÃª Ngá»c Giang, ThÃ´n Ngá»c Giang, VÄ©nh Ngá»c, ÄÃ´ng Anh, HaÌ€ NÃ´Ì£i, ViÃªÌ£t Nam','NhÃ  Nghá»‰ Huyá»n Anh'),
 (6,2,2,3,'Standard','GiÆ°á»ng Ä‘Æ¡n lá»›n','27','KhÃ¡ch sáº¡n Rococo is located in Hanoi, 8.5 km from Vietnam Fine Arts Museum and 8.5 km from One Pillar Pagoda. The property is around 1.8 km from My Dinh Stadium, 4.3 km from Vietnam Museum of Ethnology and 5.6 km from Vincom Center Nguyen Chi Thanh. The accommodation provides a shared lounge, room service and currency exchange for guests.\r\n\r\nThe hotel will provide guests with air-conditioned rooms offering a wardrobe, a kettle, a fridge, a safety deposit box, a flat-screen TV and a private bathroom with a shower.\r\n</br></br>\r\nAn Asian breakfast is available daily at KhÃ¡ch sáº¡n Rococo.\r\n</br></br>\r\nLanguages spoken at the reception include English and Korean.\r\n</br></br>\r\nHanoi Temple of Literature is 8.5 km from the accommodation, while Ho Chi Minh Mausoleum is 8.7 km away. The nearest airport is Noi Bai International, 27 km from KhÃ¡ch sáº¡n Rococo, and the property offers a paid airport shuttle service.                                    ',22,2,'/hostay/public/images/1701229175_75034.jpg','NgÃµ 39 ÄÃ¬nh ThÃ´n Sá»‘ 68, HaÌ€ NÃ´Ì£i, ViÃªÌ£t Nam','KhÃ¡ch sáº¡n Rococo'),
 (7,2,1,3,'Suite','GiÆ°á»ng Ä‘Ã´i lá»›n','55','Set in Hanoi, less than 1 km from Hanoi Old City Gate, Hotel du Monde Classic features views of the city. With a restaurant, the 3-star hotel has air-conditioned rooms with free WiFi, each with a private bathroom. St. Joseph Cathedral is 1.7 km away and Thang Long Water Puppet Theater is 1.4 km from the hotel.\r\n</br></br>\r\nAll units in the hotel are fitted with a kettle. All rooms have a wardrobe and a flat-screen TV, and some units at Hotel du Monde Classic have a balcony. All guest rooms will provide guests with a minibar.\r\n</br></br>\r\nGuests at the accommodation can enjoy a continental breakfast.\r\n</br></br>\r\nStaff at Hotel du Monde Classic are available to provide information at the 24-hour front desk.\r\n</br></br>\r\nPopular points of interest near the hotel include Quan Thanh Temple, Hoan Kiem Lake and West Lake. The nearest airport is Noi Bai International Airport, 22 km from Hotel du Monde Classic.                                    ',16,1,'/hostay/public/images/1701229710_56665.jpg','21 Hoe Nhai, Nguyen Trung Truc, Ba Dinh, Quáº­n Ba ÄÃ¬nh, HaÌ€ NÃ´Ì£i, ViÃªÌ£t Nam','Hotel du Monde Classic'),
 (8,2,1,3,'Deluxe','GiÆ°á»ng Ä‘Ã´i lá»›n','30','Set in Hanoi, less than 1 km from Hanoi Old City Gate, Hotel du Monde Classic features views of the city. With a restaurant, the 3-star hotel has air-conditioned rooms with free WiFi, each with a private bathroom. St. Joseph Cathedral is 1.7 km away and Thang Long Water Puppet Theater is 1.4 km from the hotel.\r\n</br></br>\r\nAll units in the hotel are fitted with a kettle. All rooms have a wardrobe and a flat-screen TV, and some units at Hotel du Monde Classic have a balcony. All guest rooms will provide guests with a minibar.\r\n</br></br>\r\nGuests at the accommodation can enjoy a continental breakfast.\r\n</br></br>\r\nStaff at Hotel du Monde Classic are available to provide information at the 24-hour front desk.\r\n</br></br>\r\nPopular points of interest near the hotel include Quan Thanh Temple, Hoan Kiem Lake and West Lake. The nearest airport is Noi Bai International Airport, 22 km from Hotel du Monde Classic.                                    ',16,1,'/hostay/public/images/1701229818_26032.jpg','Sá»‘ 17 ÄÆ°á»ng ÄÃª Ngá»c Giang, ThÃ´n Ngá»c Giang, VÄ©nh Ngá»c, ÄÃ´ng Anh, HÃ  Ná»™i, HaÌ€ NÃ´Ì£i, ViÃªÌ£t Nam','Hotel du Monde Classic'),
 (9,4,2,2,'Deluxe','GiÆ°á»ng Ä‘Ã´i nhá»','30','                                                                                Featuring a terrace, Cat Ba Hongkong Hotel is located in Cat Ba in the Hai Phong Municipality region, 1 km from Cat Co 2 Beach and 1.4 km from Cat Co 1 Beach. Featuring a shared lounge, the 2-star hotel has air-conditioned rooms with free WiFi, each with a private bathroom. The accommodation provides room service, a 24-hour front desk and currency exchange for guests.\r\n</br></br>\r\nGuest rooms are equipped with a flat-screen TV with satellite channels, a kettle, a bidet, free toiletries and a wardrobe. At the hotel each room is equipped with bed linen and towels.\r\n</br></br>\r\nBreakfast is available daily, and includes Ã  la carte, continental and Asian options. At Cat Ba Hongkong Hotel you will find a restaurant serving Seafood, Vietnamese and local cuisine. Vegetarian, dairy-free and vegan options can also be requested.\r\n</br></br>\r\nThe area is popular for hiking and cycling, and bike hire is available at the accommodation.\r\n</br></br>\r\nPopular points of interest near Cat Ba Hongkong Hotel include Cat Co 3 Beach, Cannon Fort and Ben Beo Harbour. The nearest airport is Cat Bi International, 53 km from the hotel, and the property offers a paid airport shuttle service.\r\n</br></br>\r\nCÃ¡c cáº·p Ä‘Ã´i Ä‘áº·c biá»‡t thÃ­ch Ä‘á»‹a Ä‘iá»ƒm nÃ y â€” há» cho Ä‘iá»ƒm 9,8 cho ká»³ nghá»‰ dÃ nh cho 2 ngÆ°á»i.                                                                        ',20,1,'/hostay/public/images/1701230161_67669.jpg','84 NÃºi Ngá»c, Äáº£o CÃ¡t BÃ , ViÃªÌ£t Nam','Cat Ba Hongkong Hotel'),
 (10,4,4,4,'Standard','GiÆ°á»ng Ä‘Ã´i nhá»','10','Featuring 4-star accommodation, CÃ´ng Khanh Boutique Inn - Hotel Elite is set in Cat Ba, 1 km from Cat Co 2 Beach and 1.4 km from Cat Co 1 Beach. Located around 8.1 km from Hospital Cave, the hotel is also 12 km away from Cat Ba National Park. The accommodation offers a 24-hour front desk, airport transfers, a tour desk and free WiFi throughout the property.\r\n</br></br>\r\nAn Asian breakfast is available every morning at the hotel. At CÃ´ng Khanh Boutique Inn - Hotel Elite you will find a restaurant serving European cuisine. A vegetarian option can also be requested.\r\n</br></br>\r\nPopular points of interest near the accommodation include Cat Co 3 Beach, Cannon Fort and Ben Beo Harbour. The nearest airport is Cat Bi International Airport, 53 km from CÃ´ng Khanh Boutique Inn - Hotel Elite.\r\n</br></br>\r\nCÃ¡c cáº·p Ä‘Ã´i Ä‘áº·c biá»‡t thÃ­ch Ä‘á»‹a Ä‘iá»ƒm nÃ y â€” há» cho Ä‘iá»ƒm 9,7 cho ká»³ nghá»‰ dÃ nh cho 2 ngÆ°á»i.                                                                                                            ',25,2,'/hostay/public/images/1701248498_80129.jpg','84 NÃºi Ngá»c, Äáº£o CÃ¡t BÃ , ViÃªÌ£t Nam','CÃ´ng Khanh Boutique Inn - Hotel Elite'),
 (11,2,1,5,'Deluxe','GiÆ°á»ng Ä‘Ã´i lá»›n','28','Coastal Panorama Oceanfront Suites is a beachfront aparthotel in Nha Trang, offering guests a sustainable accommodation with scenic sea views. Among the facilities of this property are a restaurant, a 24-hour front desk and a lift, along with free WiFi throughout the property. The rooftop pool features a pool bar and fence.\r\n</br></br>\r\nAccommodation is fitted with air conditioning, a fully equipped kitchenette with a dining area, a flat-screen TV and a private bathroom with walk-in shower, bathrobes and slippers. A microwave, a toaster and fridge are also available, as well as a kettle. At the aparthotel, every unit is equipped with bed linen and towels.\r\n</br></br>\r\nA buffet breakfast is available each morning at the aparthotel. Guests are welcome to unwind in the in-house bar, while a minimarket is also available.\r\n</br></br>\r\nSightseeing tours are available around the property. Coastal Panorama Oceanfront Suites has a sun terrace and an outdoor fireplace.\r\n</br></br>\r\nPopular points of interest near the accommodation include Nha Trang Beach, Tram Huong Tower and Nha Trang Centre Shopping Mall. The nearest airport is Cam Ranh International, 35 km from Coastal Panorama Oceanfront Suites, and the property offers a paid airport shuttle service.',42,1,'/hostay/public/images/1701254973_90562.jpg','02 Nguyá»…n Thá»‹ Minh Khai 40, Nha Trang, ViÃªÌ£t Nam','Coastal Panorama Oceanfront Suites'),
 (12,2,1,4,'Deluxe','GiÆ°á»ng Ä‘Ã´i lá»›n','15','Tá»a láº¡c táº¡i thÃ nh phá»‘ Nha Trang, cÃ¡ch Trung tÃ¢m Thuyá»n buá»“m Viá»‡t Nam 200 m, Apus Hotel cung cáº¥p chá»— á»Ÿ thoáº£i mÃ¡i vÃ  cÃ³ há»“ bÆ¡i ngoÃ i trá»i cÅ©ng nhÆ° nhÃ  hÃ ng. KhÃ¡ch sáº¡n cung cáº¥p Wi-Fi miá»…n phÃ­ trong toÃ n bá»™ tÃ²a nhÃ , Ä‘á»“ng thá»i cÃ³ quáº§y lá»… tÃ¢n 24 giá».\r\n</br></br>\r\nCÃ¡c phÃ²ng mÃ¡y láº¡nh Ä‘Æ°á»£c bÃ i trÃ­ trang nhÃ£ táº¡i Ä‘Ã¢y cÃ³ TV truyá»n hÃ¬nh cÃ¡p, kÃ©t an toÃ n (trong phÃ²ng), áº¥m Ä‘ung nÆ°á»›c Ä‘iá»‡n vÃ  minibar. CÃ¡c phÃ²ng táº¯m riÃªng Ä‘i kÃ¨m bá»“n táº¯m hoáº·c tiá»‡n nghi vÃ²i sen, mÃ¡y sáº¥y tÃ³c vÃ  Ä‘á»“ vá»‡ sinh cÃ¡ nhÃ¢n miá»…n phÃ­. CÃ¡c phÃ²ng cho táº§m nhÃ¬n ra quang cáº£nh thÃ nh phá»‘.\r\n</br></br>\r\nTáº¡i Apus Hotel, nhÃ¢n viÃªn thÃ¢n thiá»‡n cÃ³ thá»ƒ há»— trá»£ khÃ¡ch vá»›i dá»‹ch vá»¥ thu Ä‘á»•i ngoáº¡i tá»‡, dá»‹ch vá»¥ giáº·t lÃ  vÃ  sáº¯p xáº¿p tour du lá»‹ch. KhÃ¡ch sáº¡n cÅ©ng cÃ³ tiá»‡n nghi phá»¥c vá»¥ doanh nhÃ¢n trong khi dá»‹ch vá»¥ Ä‘Æ°a Ä‘Ã³n sÃ¢n bay cÃ³ thá»ƒ Ä‘Æ°á»£c cung cáº¥p vá»›i má»™t khoáº£n phá»¥ phÃ­.\r\n</br></br>\r\nChá»— nghá»‰ nÃ y náº±m trong bÃ¡n kÃ­nh 200 m tá»« CLB Thuyá»n buá»“m trong khi BÃ£i biá»ƒn Nha Trang cÃ¡ch Ä‘Ã³ chá»‰ 300 m.',22,1,'/hostay/public/images/1701255197_29430.jpg','95/9 Hung Vuong Street, Loc Tho Ward, Nha Trang, ViÃªÌ£t Nam','Apus Hotel'),
 (13,1,1,4,'Deluxe','GiÆ°á»ng Ä‘Ã´i lá»›n','29','Náº±m cÃ¡ch BÃ£i biá»ƒn Nha Trang chÆ°a Ä‘áº§y 100 m, Azura Gold Hotel & Apartment cung cáº¥p phÃ²ng nghá»‰ nhÃ¬n ra biá»ƒn. Chá»— nghá»‰ nÃ y cÃ³ bÃ n Ä‘áº·t tour, lá»… tÃ¢n 24 giá» vÃ  WiFi miá»…n phÃ­.\r\n</br></br>\r\nTrung tÃ¢m Thuyá»n buá»“m Viá»‡t Nam vÃ  Quáº£ng trÆ°á»ng chÃ­nh Ä‘á»u náº±m trong bÃ¡n kÃ­nh 200 m tá»« khaÌch saÌ£n. SÃ¢n bay Nha Trang cÃ¡ch Ä‘Ã³ 26 km.\r\n</br></br>\r\nPhÃ²ng nghá»‰ táº¡i Ä‘Ã¢y cÃ³ TV truyá»n hÃ¬nh cÃ¡p, minibar vÃ  phÃ²ng táº¯m riÃªng vá»›i tiá»‡n nghi vÃ²i sen cÃ¹ng Ä‘á»“ vá»‡ sinh cÃ¡ nhÃ¢n. MÃ´Ì£t sÃ´Ì phoÌ€ng Ä‘Æ°á»£c trang bá»‹ bÃ´Ì€n tÄƒÌm.\r\n</br></br>\r\nDu khÃ¡ch cÃ³ thá»ƒ Ä‘Æ°á»£c há»— trá»£ vá»›i cÃ¡c dá»‹ch vá»¥ giá»¯ hÃ nh lÃ½, giáº·t, á»§i vÃ  cho thuÃª phÆ°Æ¡ng tiá»‡n Ä‘i láº¡i. Dá»‹ch vá»¥ Ä‘Æ°a Ä‘Ã³n sÃ¢n bay cÅ©ng Ä‘Æ°á»£c cung cáº¥p.',28,1,'/hostay/public/images/1701255356_22262.jpg','64/2 Tran Phu Street, Loc Tho Ward, Nha Trang, ViÃªÌ£t Nam','Azura Gold Hotel & Apartment');
/*!40000 ALTER TABLE `tblroom` ENABLE KEYS */;


--
-- Definition of table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE `tbluser` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_permission` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` (`user_id`,`user_name`,`user_password`,`user_fullname`,`user_email`,`user_phone`,`user_permission`) VALUES 
 (1,'admin','25d55ad283aa400af464c76d713c07ad','Quáº£n trá»‹ há»‡ thá»‘ng','hostayadmin@gmail.com','0237910328',5),
 (2,'manager1','25d55ad283aa400af464c76d713c07ad','Quáº£n lÃ½ 1','hostaymanager1@gmail.com','0370510825',1),
 (3,'admin2373','600af65e7f95e2e38fc9e3a4121cfc24','AdminTC','nguyenquanghuylt2002@gmail.com','0337212814',5),
 (5,'thanhgk2317','0ada2fcc4b0096b314197f2f9d237e40','Khá»•ng Thá»‹ HoÃ i Thanh','thanhkth2003@gmail.com','0357912064',0),
 (6,'linhnhi111','600af65e7f95e2e38fc9e3a4121cfc24','Triá»‡u Thá»‹ khÃ¡nh Linh','trieulinh0506@gmail.com','0516200334',0),
 (7,'sakura2373','600af65e7f95e2e38fc9e3a4121cfc24','Kalyn Fruzan','kaylynfruzan212@gmail.com','0343874387',1),
 (9,'huyvp22','600af65e7f95e2e38fc9e3a4121cfc24','Nguyá»…n Quang Huy','nguyenquanghuylt2002@gmail.com','0359167130',1),
 (10,'hieuchuai1325','518ebae2a28568fc67c095cb7ce542b0','Nguyá»…n Minh Hiáº¿u','hieuchuai1325@gmail.com','',0),
 (11,'quyet243','5b2186a3975a5de3be9785f940ff20e9','Nguyá»…n VÄƒn Kháº£i','loitaiquyet330@gmail.com','',0),
 (12,'hiangf364','4a8da0c5b3d3223c10fa491d1ec36154','ÄÄƒng VÄƒn HoÃ ng','hoang123@gmail.com','',0);
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
