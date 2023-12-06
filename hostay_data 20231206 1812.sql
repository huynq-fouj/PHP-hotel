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
  `bill_fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_email` varchar(45) CHARACTER SET latin1 NOT NULL,
  `bill_phone` varchar(20) CHARACTER SET latin1 NOT NULL,
  `bill_start_date` datetime NOT NULL,
  `bill_end_date` datetime NOT NULL,
  `bill_number_adult` int(10) unsigned DEFAULT '0',
  `bill_number_children` int(10) unsigned DEFAULT '0',
  `bill_number_room` int(10) unsigned DEFAULT '1',
  `bill_notes` text COLLATE utf8mb4_unicode_ci,
  `bill_static` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblbill`
--

/*!40000 ALTER TABLE `tblbill` DISABLE KEYS */;
INSERT INTO `tblbill` (`bill_id`,`bill_room_id`,`bill_customer_id`,`bill_created_at`,`bill_fullname`,`bill_email`,`bill_phone`,`bill_start_date`,`bill_end_date`,`bill_number_adult`,`bill_number_children`,`bill_number_room`,`bill_notes`,`bill_static`) VALUES 
 (2,17,15,'2023-12-04 00:00:00','Triệu Thị khánh Linh','linhnhi2243@gmail.com','0267312746','2024-01-01 00:00:00','2024-01-10 00:00:00',1,0,1,'Kiếm chỗ nghỉ trong dịp tết Tây',1);
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
  `room_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_bed_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_price` decimal(10,0) NOT NULL,
  `room_detail` text COLLATE utf8mb4_unicode_ci,
  `room_area` float DEFAULT NULL,
  `room_static` int(10) unsigned DEFAULT '0',
  `room_image` text CHARACTER SET latin1,
  `room_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_hotel_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblroom`
--

/*!40000 ALTER TABLE `tblroom` DISABLE KEYS */;
INSERT INTO `tblroom` (`room_id`,`room_number_people`,`room_number_bed`,`room_quality`,`room_type`,`room_bed_type`,`room_price`,`room_detail`,`room_area`,`room_static`,`room_image`,`room_address`,`room_hotel_name`) VALUES 
 (16,4,2,3,'Deluxe','Giường đôi lớn','47','Tọa lạc tại trung tâm của Khu Phố Cổ Hà Nội, Luxury Hotel có một vị trí yên bình, nằm trong bán kính chỉ 5 phút đi bộ từ Hồ Hoàn Kiếm nổi tiếng và Nhà thờ Saint-Joseph. Đặc trưng với lối trang trí hiện đại của Việt Nam, tất cả các phòng của khách sạn đều được trang bị Wi-Fi miễn phí và máy lạnh tự điều chỉnh.\r\n</br></br>\r\nTất cả các phòng đều có sàn gỗ, TV màn hình phẳng và minibar. Một số phòng còn có cửa sổ kính suốt từ trần đến sàn hoặc ban công riêng. Trong phòng tắm riêng được trang bị vòi sen hoặc bồn tắm.\r\n</br></br>\r\nLuxury Hotel cách Chợ Đồng Xuân 10 phút đi bộ và cách Văn Miếu 5 phút lái xe. Từ nơi nghỉ này, du khách chỉ cần lái xe 10 phút là đến Lăng Chủ tịch Hồ Chí Minh, Chùa Một Cột và Ga Tàu Hà Nội. Sân bay Quốc tế Nội Bài cách đó 40 phút lái xe.\r\n</br></br>\r\nTại sảnh đợi có 4 máy vi tính cho khách sử dụng. Du khách có thể sắp xếp các dịch vụ cho thuê xe đạp, cho thuê xe hơi và giữ hành lý tại quầy lễ tân. Bàn bán tour còn có thể giúp khách tổ chức các chuyến đi trong ngày.\r\n</br></br>\r\nCác món ăn phương Tây và châu Á cũng như đồ uống không cồn được phục vụ tại nhà hàng của khách sạn.',20,1,'/hostay/public/images/1701419604_67112.jpg','2 Phu Doan Lane, Hoan Kiem, Quận Hoàn Kiếm, Hà Nội, Việt Nam','Hanoi Luxury Hotel'),
 (17,2,1,3,'Deluxe','Giường đôi lớn','33','Situated within 11 km of My Dinh Stadium and 11 km of Vincom Center Nguyen Chi Thanh in Hanoi, Queen Hotel 2 - Hà Đông provides accommodation with seating area. This sustainable apartment is located 12 km from Vietnam Fine Arts Museum and 12 km from Hanoi Temple of Literature. The accommodation features a 24-hour front desk, full-day security and currency exchange for guests.\r\n</br></br>\r\nFeaturing a private bathroom with a shower and slippers, units at the apartment complex also feature free WiFi. All units at the apartment complex have air conditioning and a desk.\r\n</br></br>\r\nHa Noi Railway station is 13 km from the apartment, while Imperial Citadel is 13 km from the property. The nearest airport is Noi Bai International, 35 km from Queen Hotel 2 - Hà Đông, and the property offers a paid airport shuttle service.',25,1,'/hostay/public/images/1701419858_88986.jpg','số 26 BT4 KĐT Văn Phú, Phường Phú La, Quận Hà Đông, Hà Nội, Việt Nam','Queen Hotel 2 - Hà Đông'),
 (18,4,2,4,'Superior','Giường đôi lớn','49','Hanoi Paradise Hotel & Travel nằm trong Phố Cổ mang tính biểu tượng của thành phố Hà Nội. Khách sạn cung cấp các phòng với Wi-Fi miễn phí và cách những điểm tham quan như Hồ Hoàn Kiếm và Nhà hát lớn Hà Nội một đoạn ngắn đi bộ.\r\n</br></br>\r\nTất cả các phòng tại đây đều có máy lạnh và được bài trí trang nhã với truyền hình cáp màn hình phẳng, máy tính cá nhân, máy pha trà/cà phê cùng đầu đĩa DVD. Một số phòng còn có ban công/sân hiên nhìn ra Phố Cổ.\r\n\r\nNhà hàng trong khuôn viên phục vụ cà phê Việt Nam, ẩm thực châu Âu và các món ăn ngon châu Á, trong khi dịch vụ ăn uống tại phòng cũng được đáp ứng. Các tiện nghi khác bao gồm bàn đặt tour, dịch vụ thu đổi ngoại tệ và dịch vụ giặt là. Quý khách cũng có thể sử dụng trung tâm dịch vụ doanh nhân của khách sạn.\r\n</br></br>\r\nKhu vực xung quanh Hồ Hoàn Kiếm là lựa chọn tuyệt vời để khám phá ẩm thực đường phố và trải nghiệm văn hóa Hà Nội. Khách sạn nằm trong bán kính 10 phút lái xe từ Lăng Chủ tịch Hồ Chí Minh, Bảo tàng Lịch sử Việt Nam và Văn miếu Quốc Tử Giám.',34,1,'/hostay/public/images/1701420065_61180.jpg','62 Hang Bac Street, Quận Hoàn Kiếm, Hà Nội, Việt Nam','Hanoi Paradise Hotel & Travel'),
 (19,3,1,3,'Deluxe','Giường đôi cực lớn','36','Brilliant Majestic Hotel & Cafeteria is set in Da Nang, 500 metres from My Khe Beach and 2.2 km from Song Han Bridge. Featuring free bikes, the 4-star hotel has air-conditioned rooms with free WiFi, each with a private bathroom. The accommodation offers a 24-hour front desk, a concierge service and currency exchange for guests.\r\n</br></br>\r\nAt the hotel, rooms have a desk and a flat-screen TV. Brilliant Majestic Hotel & Cafeteria features some units with city views, and the rooms have a patio. At the accommodation all rooms include bed linen and towels.\r\n</br></br>\r\nGuests at Brilliant Majestic Hotel & Cafeteria can enjoy an à la carte or an Asian breakfast.\r\n</br></br>\r\nThe hotel offers an indoor pool.\r\n</br></br>\r\nLove Lock Bridge Da Nang is 2.7 km from Brilliant Majestic Hotel & Cafeteria, while Indochina Riverside Mall is 3 km from the property. The nearest airport is Da Nang International Airport, 6 km from the accommodation.',20,1,'/hostay/public/images/1701420248_79528.jpg','121 Hồ Nghinh, Đà Nẵng, Việt Nam','Brilliant Majestic Hotel & Cafeteria'),
 (20,4,2,4,'Standard','Giường đôi nhỏ','13','Merry Land Hotel Da Nang cung cấp các phòng nghỉ tại thành phố Đà Nẵng, cách Cầu Sông Hàn chỉ 2 phút lái xe. Khách sạn có hồ bơi ngoài trời mở cửa quanh năm, sân hiên tắm nắng và quầy bar tại chỗ. Wi-Fi trong tất cả khu vực và chỗ đậu xe riêng trong khuôn viên đều được cung cấp miễn phí.\r\n</br></br>\r\nMỗi phòng nghỉ tại khách sạn này đều được trang bị máy điều hòa, TV màn hình phẳng, ấm đun nước và phòng tắm riêng kèm chậu rửa vệ sinh (bidet), dép cùng đồ vệ sinh cá nhân giúp khách cảm thấy thoải mái.\r\n</br></br>\r\nKhách sạn có lễ tân hoạt động 24 giờ và dịch vụ cho thuê xe hơi.\r\n</br></br>\r\nKhách sạn nằm cách Cầu Tàu Tình Yêu Đà Nẵng và trung tâm mua sắm Indochina Riverside Mall 5 phút lái xe. Công viên giải trí Asia Park và sân bay gần nhất là sân bay quốc tế Đà Nẵng đều cách Merry Land Hotel Da Nang 15 phút lái xe.',25,1,'/hostay/public/images/1701420438_53791.jpg','Lot B20- B21 Pham Van Dong Str, An Hai Bac Ward, Son Tra District, Đà Nẵng, Việt Nam','Merry Land Hotel Da Nang'),
 (21,2,1,5,'Superior','Giường đôi lớn','65','Tọa lạc tại vị trí thuận tiện ở phường Bãi Cháy thuộc thành phố Hạ Long, cách Bãi biển Marina Bay 1,2 km, DeLaSea Ha Long Hotel cung cấp chỗ nghỉ với trung tâm thể dục, chỗ đỗ xe riêng miễn phí, khu vườn và nhà hàng. Khách sạn này có quầy bar, hồ bơi trong nhà, lễ tân 24 giờ, dịch vụ đưa đón sân bay, CLB trẻ em và WiFi miễn phí.\r\n</br></br>\r\nTất cả phòng nghỉ tại khách sạn có máy điều hòa, bàn làm việc, TV màn hình phẳng, phòng tắm riêng, ga trải giường, khăn tắm và sân hiên nhìn ra thành phố. Mỗi phòng đều được trang bị máy pha cà phê, tủ để quần áo và ấm đun nước. Một số phòng có sân trong trong khi các phòng khác nhìn ra biển. \r\n</br></br>\r\nKhách nghỉ tại DeLaSea Ha Long Hotel có thể thưởng thức bữa sáng kiểu Mỹ hoặc bữa sáng kiểu Á.\r\n</br></br>\r\nChỗ nghỉ nằm cách Bãi biển Bãi Cháy 2,3 km và Cáp treo Nữ hoàng 4,2 km. Sân bay gần nhất là sân bay quốc tế Cát Bi, nằm trong bán kính 40 km từ DeLaSea Ha Long Hotel.',40,1,'/hostay/public/images/1701701428_62742.jpg','Bai Chay Ward, Halong City, Quang Ninh Province, Vietnam A9, Lot 1, Ha Long Marine Boulevard, Hạ Long, Việt Nam','DeLaSea Ha Long Hotel');
/*!40000 ALTER TABLE `tblroom` ENABLE KEYS */;


--
-- Definition of table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE `tbluser` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `user_password` varchar(45) CHARACTER SET latin1 NOT NULL,
  `user_fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(45) CHARACTER SET latin1 NOT NULL,
  `user_phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `user_permission` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbluser`
--

/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` (`user_id`,`user_name`,`user_password`,`user_fullname`,`user_email`,`user_phone`,`user_permission`) VALUES 
 (15,'admin','25d55ad283aa400af464c76d713c07ad','Admin','nguyenquanghuylt2002@gmail.com','0337212814',5),
 (16,'admin2','25d55ad283aa400af464c76d713c07ad','Admin 2','nguyenquanghuylt2002@gmail.com','0337212814',5),
 (17,'hieuchuai1325','9a7a749e0e1b103542daf838bced97b4','Nguyễn Minh Hiếu','mhieu01032005@gmail.com','',1),
 (18,'huynq22','600af65e7f95e2e38fc9e3a4121cfc24','Nguyễn Quang Huy','nguyenquanghuylt2002@gmail.com','0337212814',1),
 (19,'thanhgk2317','600af65e7f95e2e38fc9e3a4121cfc24','Khổng Thị Hoài Thanh','khongthihoaithanhlt2003@gmail.com','',1),
 (20,'linhnhi23','773142d662df9a962e605645a23a4654','Triệu Thị khánh Linh','linhnhi2243@gmail.com','',1),
 (22,'antoni2','35f916fafa44b4034f7fd1c40e7b9cf9','Antonio','busketantoni123@gmail.com','0653673143',0),
 (23,'zenoomi','1684a9ae2ecead8daf25ef9abf18799f','Zenomi','kaiziruzenomi473@gmail.com','0834142684',0),
 (24,'quyet2003','b90922a0944d7be8a90a6b9d1b35e575','Nguyễn Văn Khải','quyet358203@gmail.com','0283762387',0),
 (25,'duongn1704','f24cef42b2ebf4c085d1b1640a81ca78','Nguyễn Thùy Dương','duongkha3002@gmail.com','0457323498',0),
 (26,'manhduy137','acebfc1c108ba0f236deac18793d4daa','Nguyễn Duy Mạnh','nguyenmanhduy137@gmail.com',NULL,0);
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
