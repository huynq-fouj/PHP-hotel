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
  `bill_is_paid` tinyint(1) DEFAULT '0',
  `bill_cancel` tinyint(1) unsigned DEFAULT '0',
  `bill_staff_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblbill`
--

/*!40000 ALTER TABLE `tblbill` DISABLE KEYS */;
INSERT INTO `tblbill` (`bill_id`,`bill_room_id`,`bill_customer_id`,`bill_created_at`,`bill_fullname`,`bill_email`,`bill_phone`,`bill_start_date`,`bill_end_date`,`bill_number_adult`,`bill_number_children`,`bill_number_room`,`bill_notes`,`bill_static`,`bill_is_paid`,`bill_cancel`,`bill_staff_name`) VALUES 
 (2,17,15,'2023-11-15 00:00:00','Triệu Thị khánh Linh','linhnhi2243@gmail.com','0267312746','2024-01-01 00:00:00','2024-01-10 00:00:00',1,0,1,'Kiếm chỗ nghỉ trong dịp tết Tây',5,1,0,'Nguyễn Quang Huy'),
 (3,29,28,'2023-12-12 00:00:00','Nguyễn Đức An','nguyenducan20384@gmail.com','0973263849','2023-12-12 00:00:00','2023-12-14 00:00:00',2,0,1,'',5,1,0,'Nguyễn Quang Huy'),
 (4,28,23,'2023-12-12 00:00:00','Zenomi','zenomiarrtak2049@gmail.com','0238742343','2023-12-12 00:00:00','2023-12-20 00:00:00',1,0,1,'',5,1,0,'Nguyễn Quang Huy'),
 (5,26,29,'2023-12-13 00:00:00','Nguyễn Duy Khánh','nguyenduykhanh122@gmail.com','09570283928','2023-12-30 00:00:00','2024-01-10 00:00:00',3,1,2,'Cần đặt phòng trước cho kỳ tết Tây',2,0,0,'Nguyễn Quang Huy'),
 (7,29,15,'2023-12-13 00:00:00','Admin','nguyenquanghuylt2002@gmail.com','0337212814','2023-12-13 00:00:00','2023-12-17 00:00:00',1,0,1,'',5,0,1,'Nguyễn Quang Huy'),
 (8,25,30,'2023-12-18 00:00:00','Nguyễn Văn Hòa','hoavan1978@gmail.com','0393100328','2023-12-22 00:00:00','2023-12-31 00:00:00',2,1,1,'',4,0,0,'Triệu Thị Khánh Linh'),
 (9,27,30,'2023-12-18 00:00:00','Nguyễn Quang Huy','nguyenquanghuylt2002@gmail.com','0337212814','2023-12-18 00:00:00','2023-12-18 00:00:00',1,0,1,'',1,0,0,NULL),
 (10,28,30,'2023-12-18 00:00:00','Trần Thị Thu Trang','trangthu2993@gmail.com','0387292134','2024-01-01 00:00:00','2024-02-01 00:00:00',1,0,1,'',4,1,0,'Khổng Thị Hoài Thanh'),
 (11,29,15,'2023-12-19 00:00:00','Nguyễn Q Huy','nguyenquanghuylt2002@gmail.com','0337212814','2023-12-19 00:00:00','2023-12-19 00:00:00',1,0,1,'',1,0,1,NULL),
 (12,23,31,'2023-12-20 00:00:00','Arataki Itto','aratakiitto2394@gmail.com','0493953820','2024-01-01 00:00:00','2024-02-05 00:00:00',3,0,1,'',1,0,0,NULL),
 (14,28,15,'2023-12-22 00:00:00','Đỗ Việt Hà','hadov12983@gmail.com','0828723421','2023-12-30 00:00:00','2024-01-15 00:00:00',2,0,1,'',1,0,1,NULL),
 (15,16,32,'2023-12-22 00:00:00','Lương Thị Ngọc Thúy','thuyngoc23@gmail.com','0382938492','2023-12-22 00:00:00','2023-12-22 00:00:00',1,0,1,'',3,0,1,'Nguyễn Quang Huy'),
 (16,26,33,'2023-12-22 00:00:00','Triệu Quang Lâm','trieuquanglam3452@gmail.com','0339582813','2024-01-01 00:00:00','2024-01-15 00:00:00',4,0,1,'',1,0,1,NULL),
 (17,26,33,'2023-12-22 00:00:00','Triệu Quang Lâm','trieuquanglam3452@gmail.com','0928273928','2024-01-01 00:00:00','2024-01-30 00:00:00',4,0,1,'',1,0,0,NULL),
 (18,46,15,'2023-12-23 00:00:00','Nguyễn Tiến Đạt','nguyenquanghuylt2002@gmail.com','0337212814','2024-01-31 00:00:00','2024-02-28 00:00:00',2,0,1,'',2,1,0,'Triệu Thị Khánh Linh');
/*!40000 ALTER TABLE `tblbill` ENABLE KEYS */;


--
-- Definition of table `tblbillstatic`
--

DROP TABLE IF EXISTS `tblbillstatic`;
CREATE TABLE `tblbillstatic` (
  `billstatic_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `billstatic_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billstatic_notes` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`billstatic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblbillstatic`
--

/*!40000 ALTER TABLE `tblbillstatic` DISABLE KEYS */;
INSERT INTO `tblbillstatic` (`billstatic_id`,`billstatic_name`,`billstatic_notes`) VALUES 
 (1,'Chờ xử lý','Đơn đăng ký đã tạo thành công và chờ người quản lý xem xét.\r\n'),
 (2,'Thành công - chờ nhận phòng','Đơn đặt phòng đã được duyệt và chờ người đăng ký nhận phòng'),
 (3,'Bị hủy','Đơn đặt phòng bị hủy vì một lý do nào đó'),
 (4,'Đã nhận phòng',NULL),
 (5,'Đã trả phòng',NULL);
/*!40000 ALTER TABLE `tblbillstatic` ENABLE KEYS */;


--
-- Definition of table `tblcontact`
--

DROP TABLE IF EXISTS `tblcontact`;
CREATE TABLE `tblcontact` (
  `contact_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact_fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_subject` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_seen` tinyint(1) unsigned DEFAULT '0',
  `contact_created_at` datetime NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblcontact`
--

/*!40000 ALTER TABLE `tblcontact` DISABLE KEYS */;
INSERT INTO `tblcontact` (`contact_id`,`contact_fullname`,`contact_email`,`contact_subject`,`contact_notes`,`contact_seen`,`contact_created_at`) VALUES 
 (1,'Nguyễn Quang Huy','nguyenquanghuylt2002@gmail.com','Về dịch vụ','Dịch vụ đáp úng chưa tốt lắm, mong cải thiện thêm',1,'2023-12-16 00:00:00'),
 (2,'Hotel HaiPhong Avant','haiphonghotelwie@gmail.com','Hợp tác','Chúng tôi muốn cơ hội hợp tác với dịch vụ của Hostay',0,'2023-12-22 00:00:00'),
 (3,'Phạm Tiến Công','congtien@gmail.com','dịch vụ tốt','...',1,'2023-12-23 00:00:00'),
 (4,'Khổng Thị Hoài Thanh','nguyenquanghuylt2002@gmail.com','Mất đồ','Tôi bị mất một túi đồ trong đó có giấy tờ tùy thân ở Mesun Hotel mong được hỗ trợ',1,'2023-12-23 00:00:00');
/*!40000 ALTER TABLE `tblcontact` ENABLE KEYS */;


--
-- Definition of table `tblroom`
--

DROP TABLE IF EXISTS `tblroom`;
CREATE TABLE `tblroom` (
  `room_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_number_people` int(10) unsigned DEFAULT NULL,
  `room_number_bed` int(10) unsigned DEFAULT NULL,
  `room_quality` float DEFAULT NULL,
  `room_bed_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_price` decimal(18,2) NOT NULL,
  `room_detail` text COLLATE utf8mb4_unicode_ci,
  `room_area` float NOT NULL,
  `room_static` int(10) unsigned DEFAULT '0',
  `room_image` text CHARACTER SET latin1,
  `room_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_hotel_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblroom`
--

/*!40000 ALTER TABLE `tblroom` DISABLE KEYS */;
INSERT INTO `tblroom` (`room_id`,`room_number_people`,`room_number_bed`,`room_quality`,`room_bed_type`,`room_price`,`room_detail`,`room_area`,`room_static`,`room_image`,`room_address`,`room_hotel_name`,`room_type_id`) VALUES 
 (16,4,2,3,'Giường đôi lớn','47.00','Tọa lạc tại trung tâm của Khu Phố Cổ Hà Nội, Luxury Hotel có một vị trí yên bình, nằm trong bán kính chỉ 5 phút đi bộ từ Hồ Hoàn Kiếm nổi tiếng và Nhà thờ Saint-Joseph. Đặc trưng với lối trang trí hiện đại của Việt Nam, tất cả các phòng của khách sạn đều được trang bị Wi-Fi miễn phí và máy lạnh tự điều chỉnh.\r\n</br></br>\r\nTất cả các phòng đều có sàn gỗ, TV màn hình phẳng và minibar. Một số phòng còn có cửa sổ kính suốt từ trần đến sàn hoặc ban công riêng. Trong phòng tắm riêng được trang bị vòi sen hoặc bồn tắm.\r\n</br></br>\r\nLuxury Hotel cách Chợ Đồng Xuân 10 phút đi bộ và cách Văn Miếu 5 phút lái xe. Từ nơi nghỉ này, du khách chỉ cần lái xe 10 phút là đến Lăng Chủ tịch Hồ Chí Minh, Chùa Một Cột và Ga Tàu Hà Nội. Sân bay Quốc tế Nội Bài cách đó 40 phút lái xe.\r\n</br></br>\r\nTại sảnh đợi có 4 máy vi tính cho khách sử dụng. Du khách có thể sắp xếp các dịch vụ cho thuê xe đạp, cho thuê xe hơi và giữ hành lý tại quầy lễ tân. Bàn bán tour còn có thể giúp khách tổ chức các chuyến đi trong ngày.\r\n</br></br>\r\nCác món ăn phương Tây và châu Á cũng như đồ uống không cồn được phục vụ tại nhà hàng của khách sạn.',20,1,'/hostay/public/images/1701419604_67112.jpg','2 Phu Doan Lane, Hoan Kiem, Quận Hoàn Kiếm, Hà Nội, Việt Nam','Hanoi Luxury Hotel',3),
 (17,2,1,3,'Giường đôi lớn','33.00','Situated within 11 km of My Dinh Stadium and 11 km of Vincom Center Nguyen Chi Thanh in Hanoi, Queen Hotel 2 - Hà Đông provides accommodation with seating area. This sustainable apartment is located 12 km from Vietnam Fine Arts Museum and 12 km from Hanoi Temple of Literature. The accommodation features a 24-hour front desk, full-day security and currency exchange for guests.\r\n</br></br>\r\nFeaturing a private bathroom with a shower and slippers, units at the apartment complex also feature free WiFi. All units at the apartment complex have air conditioning and a desk.\r\n</br></br>\r\nHa Noi Railway station is 13 km from the apartment, while Imperial Citadel is 13 km from the property. The nearest airport is Noi Bai International, 35 km from Queen Hotel 2 - Hà Đông, and the property offers a paid airport shuttle service.',25,1,'/hostay/public/images/1701419858_88986.jpg','số 26 BT4 KĐT Văn Phú, Phường Phú La, Quận Hà Đông, Hà Nội, Việt Nam','Queen Hotel 2 - Hà Đông',3),
 (18,4,2,4,'Giường đôi lớn','49.00','Hanoi Paradise Hotel & Travel nằm trong Phố Cổ mang tính biểu tượng của thành phố Hà Nội. Khách sạn cung cấp các phòng với Wi-Fi miễn phí và cách những điểm tham quan như Hồ Hoàn Kiếm và Nhà hát lớn Hà Nội một đoạn ngắn đi bộ.\r\n</br></br>\r\nTất cả các phòng tại đây đều có máy lạnh và được bài trí trang nhã với truyền hình cáp màn hình phẳng, máy tính cá nhân, máy pha trà/cà phê cùng đầu đĩa DVD. Một số phòng còn có ban công/sân hiên nhìn ra Phố Cổ.\r\n\r\nNhà hàng trong khuôn viên phục vụ cà phê Việt Nam, ẩm thực châu Âu và các món ăn ngon châu Á, trong khi dịch vụ ăn uống tại phòng cũng được đáp ứng. Các tiện nghi khác bao gồm bàn đặt tour, dịch vụ thu đổi ngoại tệ và dịch vụ giặt là. Quý khách cũng có thể sử dụng trung tâm dịch vụ doanh nhân của khách sạn.\r\n</br></br>\r\nKhu vực xung quanh Hồ Hoàn Kiếm là lựa chọn tuyệt vời để khám phá ẩm thực đường phố và trải nghiệm văn hóa Hà Nội. Khách sạn nằm trong bán kính 10 phút lái xe từ Lăng Chủ tịch Hồ Chí Minh, Bảo tàng Lịch sử Việt Nam và Văn miếu Quốc Tử Giám.',34,1,'/hostay/public/images/1701420065_61180.jpg','62 Hang Bac Street, Quận Hoàn Kiếm, Hà Nội, Việt Nam','Hanoi Paradise Hotel & Travel',2),
 (19,3,1,3,'Giường đôi cực lớn','36.00','Brilliant Majestic Hotel & Cafeteria is set in Da Nang, 500 metres from My Khe Beach and 2.2 km from Song Han Bridge. Featuring free bikes, the 4-star hotel has air-conditioned rooms with free WiFi, each with a private bathroom. The accommodation offers a 24-hour front desk, a concierge service and currency exchange for guests.\r\n</br></br>\r\nAt the hotel, rooms have a desk and a flat-screen TV. Brilliant Majestic Hotel & Cafeteria features some units with city views, and the rooms have a patio. At the accommodation all rooms include bed linen and towels.\r\n</br></br>\r\nGuests at Brilliant Majestic Hotel & Cafeteria can enjoy an à la carte or an Asian breakfast.\r\n</br></br>\r\nThe hotel offers an indoor pool.\r\n</br></br>\r\nLove Lock Bridge Da Nang is 2.7 km from Brilliant Majestic Hotel & Cafeteria, while Indochina Riverside Mall is 3 km from the property. The nearest airport is Da Nang International Airport, 6 km from the accommodation.',20,1,'/hostay/public/images/1701420248_79528.jpg','121 Hồ Nghinh, Đà Nẵng, Việt Nam','Brilliant Majestic Hotel & Cafeteria',3),
 (20,4,2,4,'Giường đôi nhỏ','13.00','Merry Land Hotel Da Nang cung cấp các phòng nghỉ tại thành phố Đà Nẵng, cách Cầu Sông Hàn chỉ 2 phút lái xe. Khách sạn có hồ bơi ngoài trời mở cửa quanh năm, sân hiên tắm nắng và quầy bar tại chỗ. Wi-Fi trong tất cả khu vực và chỗ đậu xe riêng trong khuôn viên đều được cung cấp miễn phí.\r\n</br></br>\r\nMỗi phòng nghỉ tại khách sạn này đều được trang bị máy điều hòa, TV màn hình phẳng, ấm đun nước và phòng tắm riêng kèm chậu rửa vệ sinh (bidet), dép cùng đồ vệ sinh cá nhân giúp khách cảm thấy thoải mái.\r\n</br></br>\r\nKhách sạn có lễ tân hoạt động 24 giờ và dịch vụ cho thuê xe hơi.\r\n</br></br>\r\nKhách sạn nằm cách Cầu Tàu Tình Yêu Đà Nẵng và trung tâm mua sắm Indochina Riverside Mall 5 phút lái xe. Công viên giải trí Asia Park và sân bay gần nhất là sân bay quốc tế Đà Nẵng đều cách Merry Land Hotel Da Nang 15 phút lái xe.',25,1,'/hostay/public/images/1701420438_53791.jpg','Lot B20- B21 Pham Van Dong Str, An Hai Bac Ward, Son Tra District, Đà Nẵng, Việt Nam','Merry Land Hotel Da Nang',1),
 (21,2,1,5,'Giường đôi lớn','65.00','Tọa lạc tại vị trí thuận tiện ở phường Bãi Cháy thuộc thành phố Hạ Long, cách Bãi biển Marina Bay 1,2 km, DeLaSea Ha Long Hotel cung cấp chỗ nghỉ với trung tâm thể dục, chỗ đỗ xe riêng miễn phí, khu vườn và nhà hàng. Khách sạn này có quầy bar, hồ bơi trong nhà, lễ tân 24 giờ, dịch vụ đưa đón sân bay, CLB trẻ em và WiFi miễn phí.\r\n</br></br>\r\nTất cả phòng nghỉ tại khách sạn có máy điều hòa, bàn làm việc, TV màn hình phẳng, phòng tắm riêng, ga trải giường, khăn tắm và sân hiên nhìn ra thành phố. Mỗi phòng đều được trang bị máy pha cà phê, tủ để quần áo và ấm đun nước. Một số phòng có sân trong trong khi các phòng khác nhìn ra biển. \r\n</br></br>\r\nKhách nghỉ tại DeLaSea Ha Long Hotel có thể thưởng thức bữa sáng kiểu Mỹ hoặc bữa sáng kiểu Á.\r\n</br></br>\r\nChỗ nghỉ nằm cách Bãi biển Bãi Cháy 2,3 km và Cáp treo Nữ hoàng 4,2 km. Sân bay gần nhất là sân bay quốc tế Cát Bi, nằm trong bán kính 40 km từ DeLaSea Ha Long Hotel.',40,1,'/hostay/public/images/1701701428_62742.jpg','Bai Chay Ward, Halong City, Quang Ninh Province, Vietnam A9, Lot 1, Ha Long Marine Boulevard, Hạ Long, Việt Nam','DeLaSea Ha Long Hotel',2),
 (22,2,1,4,'Giường đôi lớn','38.00','Ideally situated in the Ba Dinh district of Hanoi, THE GALAXY HOME APARTMENT ĐỘI CẤN is located 1.8 km from Ho Chi Minh Mausoleum, 2.3 km from Imperial Citadel and 2.3 km from Vietnam Fine Arts Museum. This 4-star hotel offers room service and free WiFi. The property is non-smoking and is situated 1.9 km from One Pillar Pagoda.\r\n</br></br>\r\nAt the hotel, the rooms include a desk. Complete with a private bathroom fitted with a bidet and free toiletries, all rooms at THE GALAXY HOME APARTMENT ĐỘI CẤN have a flat-screen TV and air conditioning, and some rooms are fitted with a balcony.\r\n</br></br>\r\nHanoi Temple of Literature is 2.4 km from the accommodation, while Vincom Center Nguyen Chi Thanh is 2.5 km from the property. The nearest airport is Noi Bai International Airport, 23 km from THE GALAXY HOME APARTMENT ĐỘI CẤN.',50,1,'/hostay/public/images/1702105765_51603.jpg','22 Ngõ 279 Phố Đội Cấn, Quận Ba Đình, Hà Nội, Việt Nam','THE GALAXY HOME APARTMENT ĐỘI CẤN',3),
 (23,2,1,3,'Giường đôi lớn','30.00','Situated in Da Lat, 1.7 km from Yersin Park Da Lat, Đà Lạt An Khang 2 HOTEL features accommodation with a garden, free private parking, a terrace and a restaurant. With free WiFi, this 3-star hotel offers a shared kitchen and room service. The accommodation provides a 24-hour front desk, a concierge service and organising tours for guests.\r\n</br></br>\r\nAt the hotel, the rooms come with a desk, a flat-screen TV, a private bathroom, bed linen and towels. All rooms have a kettle, while selected rooms also feature a balcony and others also feature mountain views. All rooms have a wardrobe.\r\n</br></br>\r\nXuan Huong Lake is 1.8 km from Đà Lạt An Khang 2 HOTEL, while Lam Vien Square is 1.9 km from the property. The nearest airport is Lien Khuong Airport, 26 km from the accommodation.',28,1,'/hostay/public/images/1702108021_18745.jpg','128 Đường Tô Hiến Thành, Đà Lạt, Việt Nam','Đà Lạt An Khang 2 HOTEL',2),
 (24,2,1,3,'Giường đôi lớn','17.00','Tọa lạc tại thành phố Đà Lạt, cách Công viên Yersin 1,6 km, Bazan Hotel Dalat - STAY 24H có chỗ nghỉ với khu vườn, chỗ đỗ xe riêng miễn phí và sảnh khách chung. Khách sạn 3 sao này cung cấp dịch vụ phòng và dịch vụ tiền sảnh. Chỗ nghỉ có lễ tân 24 giờ, dịch vụ đưa đón sân bay, khu vực bếp chung và WiFi miễn phí trong toàn bộ khuôn viên.\r\n</br></br>\r\nPhòng nghỉ tại khách sạn có bàn làm việc, TV màn hình phẳng, phòng tắm riêng, ga trải giường và khăn tắm. Tất cả các phòng đều được bố trí minibar.\r\n</br></br>\r\nHồ Xuân Hương và Quảng trường Lâm Viên đều nằm trong bán kính 1,8 km từ Bazan Hotel Dalat - STAY 24H. Sân bay gần nhất là sân bay Liên Khương, cách chỗ nghỉ 25 km.',22,1,'/hostay/public/images/1702108598_52459.jpg','36 To Hien Thanh , Đà Lạt, Việt Nam','Bazan Hotel Dalat - STAY 24H',1),
 (25,2,1,3,'Giường đôi cực lớn','46.00','Tọa lạc tại thành phố Đà Lạt, cách Quảng trường Lâm Viên 2,8 km, La Fleur 2 Luxury Garden Hotel cung cấp chỗ nghỉ với khu vườn, chỗ đỗ xe riêng miễn phí, sảnh khách chung và sân hiên. Chỗ nghỉ có quầy bar và cách Thiền viện Trúc Lâm 2,8 km. Chỗ nghỉ cung cấp dịch vụ lễ tân 24 giờ, dịch vụ đưa đón sân bay, dịch vụ phòng và WiFi miễn phí trong toàn bộ khuôn viên.\r\n</br></br>\r\nCác căn tại khách sạn được bố trí khu vực ghế ngồi, TV truyền hình cáp màn hình phẳng cũng như phòng tắm riêng với đồ vệ sinh cá nhân miễn phí và vòi xịt/chậu rửa vệ sinh. Các phòng đều được trang bị ấm đun nước. Một số phòng có ban công trong khi những phòng khác có tầm nhìn ra quang cảnh thành phố. Tại La Fleur 2 Luxury Garden Hotel, tất cả các phòng đều có sẵn ga trải giường và khăn tắm.\r\n</br></br>\r\nChỗ nghỉ phục vụ bữa sáng kiểu Mỹ, kiểu Á hoặc bữa sáng chay.\r\n</br></br>\r\nTại khách sạn 3 sao này còn có bể sục và sân chơi cho trẻ em.\r\n</br></br>\r\nCả Hồ Tuyền Lâm và Công viên Yersin Đà Lạt đều cách La Fleur 2 Luxury Garden Hotel 2,9 km. Sân bay gần nhất là sân bay Liên Khương, cách khách sạn 26 km.',35,1,'/hostay/public/images/1702108754_82392.jpg','57 An Bình, P.3, Đà Lạt, Việt Nam','La Fleur 2 Luxury Garden Hotel',2),
 (26,2,2,2,'Giường đơn lớn','12.00','Tọa lạc tại thành phố Đà Lạt, cách CLB chơi golf Dalat Palace 2,2 km, Hoàng Yến Villa Dalat cung cấp chỗ nghỉ với khu vườn, chỗ đỗ xe riêng miễn phí, sảnh khách chung và tiện nghi BBQ. Khách sạn 2 sao này có dịch vụ phòng và bàn đặt tour. Chỗ nghỉ cung cấp dịch vụ lễ tân 24 giờ, dịch vụ đưa đón sân bay, khu vực bếp chung và WiFi miễn phí trong toàn bộ khuôn viên.\r\n</br></br>\r\nTất cả phòng nghỉ tại khách sạn được trang bị TV truyền hình vệ tinh màn hình phẳng, tủ lạnh, ấm đun nước, vòi xịt/chậu rửa vệ sinh, đồ vệ sinh cá nhân miễn phí, tủ để quần áo và lò nướng. Các phòng có phòng tắm riêng với vòi sen cùng máy sấy tóc và tầm nhìn ra thành phố. \r\n</br></br>\r\nHoàng Yến Villa Dalat có sân hiên tắm nắng.\r\n</br></br>\r\nChỗ nghỉ nằm cách Vườn hoa Đà Lạt 2,8 km và Hồ Xuân Hương 4,5 km. Sân bay gần nhất là sân bay Liên Khương, nằm trong bán kính 31 km từ Hoàng Yến Villa Dalat.',22,1,'/hostay/public/images/1702108974_66878.jpg','Nguyễn Hữu Cảnh 20, Đà Lạt, Việt Nam','Hoàng Yến Villa Dalat',1),
 (27,4,2,2,'Giường đôi nhỏ','16.00','Tọa lạc tại thành phố Đà Lạt, cách Quảng trường Lâm Viên 2,9 km, Green Meadow Hotel & Villa Dalat cung cấp chỗ nghỉ với khu vườn, chỗ đỗ xe riêng miễn phí, sảnh khách chung và quầy bar. Khách sạn 2 sao này có dịch vụ phòng, lễ tân 24 giờ và WiFi miễn phí. Một số phòng nghỉ tại đây có ban công nhìn ra núi.\r\n</br></br>\r\nMỗi phòng nghỉ tại khách sạn đều được trang bị bàn làm việc, TV màn hình phẳng, phòng tắm riêng, ga trải giường và khăn tắm. Trong phòng được bố trí ấm đun nước và tủ lạnh. Một số phòng có sân hiên trong khi các phòng khác nhìn ra thành phố. \r\n</br></br>\r\nGreen Meadow Hotel & Villa Dalat nằm cách Hồ Xuân Hương 3,1 km và Công viên Yersin 3,2 km. Sân bay gần nhất là sân bay Liên Khương, cách chỗ nghỉ 29 km.',20,1,'/hostay/public/images/1702109084_62438.jpg','20 Nguyen Viet Xuan, Ward 4, Đà Lạt, Việt Nam','Green Meadow Dalat Hotel - STAY24H CITYVIEW',1),
 (28,2,1,3,'Giường đôi lớn','47.00','Coastal Panorama Oceanfront Suites is a beachfront aparthotel in Nha Trang, offering guests a sustainable accommodation with scenic sea views. Among the facilities of this property are a restaurant, a 24-hour front desk and a lift, along with free WiFi throughout the property. The rooftop pool features a pool bar and fence.\r\n</br></br>\r\nAccommodation is fitted with air conditioning, a fully equipped kitchenette with a dining area, a flat-screen TV and a private bathroom with walk-in shower, bathrobes and slippers. A microwave, a toaster and fridge are also available, as well as a kettle. At the aparthotel, every unit is equipped with bed linen and towels.\r\n</br></br>\r\nGuests are welcome to unwind in the in-house bar, while a minimarket is also available.\r\n</br></br>\r\nSightseeing tours are available around the property. The aparthotel has a sun terrace and an outdoor fireplace.\r\n</br></br>\r\nPopular points of interest near Coastal Panorama Oceanfront Suites include Nha Trang Beach, Tram Huong Tower and Nha Trang Centre Shopping Mall. The nearest airport is Cam Ranh International, 35 km from the accommodation, and the property offers a paid airport shuttle service.',42,1,'/hostay/public/images/1702109246_26757.jpg','02 Nguyễn Thị Minh Khai 40, Nha Trang, Việt Nam','Coastal Panorama Oceanfront Suites',2),
 (29,2,1,4,'Giường đôi lớn','13.00','Tọa lạc tại thành phố Nha Trang, cách Bãi biển Hòn Chồng 200 m, Putin Nha Trang Hotel cung cấp chỗ nghỉ với hồ bơi ngoài trời, chỗ đỗ xe riêng miễn phí, sảnh khách chung và sân hiên. Chỗ nghỉ này nằm trong bán kính khoảng 2,9 km từ Bãi biển Nha Trang, 3,5 km từ Bảo tàng Khánh Hòa và 3,5 km từ Trung tâm suối khoáng nóng Tháp Bà. Nơi đây có lễ tân 24 giờ, dịch vụ đưa đón sân bay, dịch vụ phòng và WiFi miễn phí.\r\n</br></br>\r\nTất cả phòng nghỉ tại khách sạn đều được bố trí máy điều hòa, khu vực ghế ngồi, TV truyền hình vệ tinh màn hình phẳng, két an toàn và phòng tắm riêng với vòi xịt/chậu rửa vệ sinh, đồ vệ sinh cá nhân miễn phí cùng máy sấy tóc. Các phòng được trang bị ấm đun nước. Một số phòng còn có ban công trong khi các phòng khác nhìn ra quang cảnh thành phố. Các phòng tại Putin Nha Trang Hotel đi kèm ga trải giường và khăn tắm.\r\n</br></br>\r\nNhà hàng tại chỗ nghỉ phục vụ ẩm thực châu Phi, Mỹ và Argentina. Du khách cũng có thể yêu cầu thực đơn chay, các món ăn không chứa sữa và halal (dành cho người theo đạo Hồi).\r\n</br></br>\r\nKhu vực này nổi tiếng với hoạt động đi xe đạp và du khách cũng có thể thuê xe đạp/xe hơi tại Putin Nha Trang Hotel.\r\n</br></br>\r\nKhách sạn nằm gần các địa danh nổi tiếng như Bãi tắm Ba Làng, Hòn Chồng và Tháp Bà Po Nagar. Sân bay gần nhất là sân bay quốc tế Cam Ranh, cách Putin Nha Trang Hotel 40 km.',14,2,'/hostay/public/images/1702109397_50878.jpg','Bãi Dương 6B, Nha Trang, Việt Nam','Putin Nha Trang Hotel',2),
 (30,2,1,4,'Giường đôi lớn','13.00','Nằm trong bán kính 30 m từ Bãi biển Nha Trang, khách sạn La Sera Hotel ở thành phố Nha Trang này có tầm nhìn ra toàn cảnh từ quán sky pool bar. Du khách có thể dùng bữa tại nhà hàng ngay trong khuôn viên.\r\n</br></br>\r\nMỗi phòng nghỉ theo phong cách hiện đại tại khách sạn này đều có khu vực tiếp khách, TV màn hình phẳng với các kênh truyền hình cáp và phòng tắm riêng. Một số phòng nhìn ra quang cảnh bãi biển, thành phố hoặc núi non.\r\n</br></br>\r\nLễ tân 24 giờ cung cấp rất nhiều dịch vụ trong đó có dịch vụ thu đổi ngoại tệ, sắp xếp tour du lịch, đặt vé cũng như trợ giúp đặc biệt. Khách sạn còn có cửa hàng quà tặng và cho thuê xe đạp.\r\n</br></br>\r\nLa Sera Hotel nằm trong bán kính 300 m từ CLB Thuyền buồm và 700 m từ Chợ Đầm. Sân bay gần nhất là Sân bay Quốc tế Cam Ranh, cách khách sạn 35 km.',18,1,'/hostay/public/images/1702109519_21612.jpg','98A/7 Tran Phu Street, Loc Tho Ward, Nha Trang, Việt Nam','La Sera Hotel',1),
 (31,2,1,5,'Giường đôi cực lớn','78.00','Tọa lạc tại thành phố Hạ Long, cách Bãi biển Marina Bay 800 m, Citadines Marina Halong cung cấp chỗ nghỉ với xe đạp cho khách sử dụng miễn phí, chỗ đỗ xe riêng miễn phí, hồ bơi ngoài trời và trung tâm thể dục. Khách sạn 5 sao này có CLB trẻ em, dịch vụ phòng và WiFi miễn phí. Khách sạn có hồ bơi trong nhà và lễ tân 24 giờ.\r\n</br></br>\r\nPhòng nghỉ gắn máy điều hòa tại khách sạn có bàn làm việc, ấm đun nước, két an toàn, TV màn hình phẳng, ban công và phòng tắm riêng với vòi xịt/chậu rửa vệ sinh. Một số phòng được bố trí bếp với tủ lạnh, lò vi sóng và minibar. Các phòng được trang bị tủ để quần áo.\r\n</br></br>\r\nNhà hàng tại Citadines Marina Halong phục vụ các món ăn châu Á và châu Âu. Du khách cũng có thể yêu cầu các món ăn chay, món thuần chay và món không chứa gluten.\r\n</br></br>\r\nDu khách có thể chơi bida tại chỗ nghỉ và khu vực này nổi tiếng với hoạt động đi xe đạp.\r\n</br></br>\r\nBãi biển Bãi Cháy nằm trong bán kính 2,6 km từ Citadines Marina Halong trong khi Cáp treo Nữ hoàng cách đó 5 km. Sân bay gần nhất là sân bay quốc tế Cát Bi, cách khách sạn 40 km.',24,1,'/hostay/public/images/1703329634_74216.jpg','Peninsula 3, Marina Ha Long, Hoang Quoc Viet Street,, Hạ Long, Việt Nam','Citadines Marina Halong',3),
 (32,2,1,3,'Giường đôi nhỏ','56.50','Set 2.5 km from Bai Chay Beach, Homestay Citadines Hạ Long B805 offers accommodation with a balcony, as well as a bar. This apartment also has a private pool. Free WiFi is available throughout the property and Marina Bay Beach is 700 metres away.\r\n</br></br>\r\nAll of the air-conditioned units feature a private bathroom, flat-screen TV, fully equipped kitchen and terrace.\r\n</br></br>\r\nHa Long Queen Cable Car is 5.1 km from the apartment, while Tuan Chau Harbour is 10 km from the property. The nearest airport is Cat Bi International Airport, 40 km from Homestay Citadines Hạ Long B805.',52,1,'/hostay/public/images/1703329974_40698.jpg','Hạ Long, Hạ Long, Việt Nam','Homestay Citadines Hạ Long B805',1),
 (33,2,1,4,'Giường đôi lớn','45.08','Nằm quay mặt ra bãi biển ở thành phố Hạ Long, Grand Fleuve Boutique cung cấp chỗ nghỉ 4 sao với hồ bơi ngoài trời, trung tâm thể dục và sân hiên. Chỗ nghỉ này có nhà hàng, quầy bar cũng như bể sục. Nơi đây cung cấp dịch vụ lễ tân 24 giờ, dịch vụ đưa đón sân bay, dịch vụ phòng và WiFi miễn phí.\r\n</br></br>\r\nPhòng nghỉ lắp máy điều hòa tại khách sạn được bố trí bàn làm việc, ấm đun nước, tủ lạnh, minibar, két an toàn, TV màn hình phẳng cũng như phòng tắm riêng với vòi xịt/chậu rửa vệ sinh. Ga trải giường và khăn tắm cũng được cung cấp trong các phòng nghỉ của Grand Fleuve Boutique.\r\n</br></br>\r\nCác điểm tham quan nổi tiếng gần chỗ nghỉ bao gồm Bãi biển Bãi Cháy, cáp treo Nữ Hoàng và Công viên giải trí Sun World Hạ Long. Sân bay gần nhất là sân bay quốc tế Cát Bi, cách Grand Fleuve Boutique 43 km.',25,1,'/hostay/public/images/1703330148_78577.jpg','E101 SUN PLAZA GRAND WORLD HA LONG STREET, Hạ Long, Việt Nam','Grand Fleuve Boutique',1),
 (34,2,1,4,'Giường đôi lớn','45.10','Tọa lạc tại thành phố Hạ Long, D\'Lecia Ha Long Hotel có hồ bơi ngoài trời, sảnh khách chung, nhà hàng và quầy bar. Khách sạn nằm trong bán kính khoảng 1,8 km từ Bãi biển Marina Bay, 2,2 km từ Bãi biển Bãi Cháy và 4,1 km từ Cáp treo Nữ hoàng Hạ Long. Chỗ nghỉ cung cấp dịch vụ lễ tân 24 giờ, dịch vụ đưa đón sân bay, dịch vụ phòng và WiFi miễn phí trong toàn bộ khuôn viên.\r\n</br></br>\r\nPhòng nghỉ gắn máy điều hòa tại khách sạn được bố trí bàn làm việc, ấm đun nước, minibar, két an toàn, TV màn hình phẳng và phòng tắm riêng với vòi xịt/chậu rửa vệ sinh. Các phòng tại D\'Lecia Ha Long Hotel đi kèm ga trải giường và khăn tắm.\r\n</br></br>\r\nKhách lưu trú tại chỗ nghỉ có thể thưởng thức bữa sáng kiểu Á.\r\n</br></br>\r\nKhu vực này nổi tiếng với hoạt động đi xe đạp và du khách cũng có thể thuê xe hơi tại khách sạn 4 sao này.\r\n</br></br>\r\nD\'Lecia Ha Long Hotel cách Cảng Tuần Châu 9,2 km và trung tâm thương mại Vincom Plaza Hạ Long 11 km. Sân bay gần nhất là sân bay quốc tế Cát Bi, cách khách sạn 40 km.',28,1,'/hostay/public/images/1703330271_56894.jpg','No.38 Tan Mai Street, Dong Hung Thang, Hạ Long, Việt Na','D\'Lecia Ha Long Hotel',3),
 (35,2,1,4,'Giường đôi lớn','19.83','Tọa lạc tại thành phố Hạ Long, cách Bãi biển Bãi Cháy 600 m, Lavender Bai Chay Halong Hotel cung cấp chỗ nghỉ với xe đạp cho khách sử dụng miễn phí, chỗ đỗ xe riêng miễn phí, sảnh khách chung và nhà hàng. Khách sạn 4 sao này có dịch vụ phòng, máy ATM, lễ tân 24 giờ, dịch vụ đưa đón sân bay, bếp chung và WiFi miễn phí trong toàn bộ khuôn viên.\r\n</br></br>\r\nPhòng nghỉ gắn máy điều hòa tại Lavender Bai Chay Halong Hotel có bàn làm việc, ấm đun nước, tủ lạnh, minibar, két an toàn, TV màn hình phẳng, sân hiên và phòng tắm riêng với vòi xịt/chậu rửa vệ sinh. Mỗi phòng đều được trang bị ga trải giường và khăn tắm.\r\n</br></br>\r\nKhu vực này nổi tiếng với hoạt động đi xe đạp và du khách cũng có thể thuê xe hơi tại khách sạn 4 sao này.\r\n</br></br>\r\nChỗ nghỉ nằm cách Cáp treo Nữ hoàng 1,6 km và trung tâm thương mại Vincom Plaza Hạ Long 8,2 km. Sân bay gần nhất là sân bay quốc tế Cát Bi, nằm trong bán kính 42 km từ Lavender Bai Chay Halong Hotel.',24,1,'/hostay/public/images/1703330471_88067.jpg','Căn E389, Khu Europe Sun Plaza Grand World , Đường Hạ Long, P. Bãi Cháy, Quảng Ninh Căn E389, Khu Sun Plaza Grand World, Đường Hạ Long, Hạ Long, Việt Nam','Lavender Bai Chay Halong Hotel',2),
 (36,2,1,5,'Giường đôi lớn','98.52','<b>Tận hưởng dịch vụ đỉnh cao, đẳng cấp thế giới tại The Yacht Hotel by DC</b>\r\n</br></br>\r\nSet in Ha Long, 1.3 km from Bai Chay Beach, The Yacht Hotel by DC offers accommodation with free bikes, free private parking, an outdoor swimming pool and a fitness centre. With a garden, the property also has a shared lounge, as well as a bar. The accommodation features a kids\' club, room service and currency exchange for guests.\r\n</br></br>\r\nAt the hotel you will find a restaurant serving Japanese, Vietnamese and local cuisine. Vegetarian, dairy-free and vegan options can also be requested.\r\n</br></br>\r\nThe Yacht Hotel by DC offers a sun terrace. Guests at the accommodation will be able to enjoy activities in and around Ha Long, like cycling.\r\n</br></br>\r\nSpeaking English, Vietnamese and Chinese at the 24-hour front desk, staff are always on hand to help.\r\n</br></br>\r\nHa Long Queen Cable Car is 2.1 km from The Yacht Hotel by DC, while Vincom Plaza Ha Long is 8.5 km from the property. The nearest airport is Cat Bi International Airport, 41 km from the hotel.',32,1,'/hostay/public/images/1703330612_47911.jpg','258 Bãi Cháy, Hạ Long, Việt Nam','The Yacht Hotel by DC',3),
 (37,4,1,4,'Giường đôi lớn','22.78','Tọa lạc tại thành phố Đà Nẵng, cách Bãi biển Mỹ Khê 200 m, Señorita Boutique Hotel cung cấp chỗ nghỉ với hồ bơi ngoài trời, chỗ đỗ xe riêng miễn phí, vườn và sảnh khách chung. Chỗ nghỉ nằm cách bãi biển Bắc Mỹ An 600 m và Cầu khoá Tình Yêu 3,3 km, tại đây có vườn và sân hiên. Chỗ nghỉ cung cấp dịch vụ lễ tân 24 giờ, dịch vụ đưa đón sân bay, dịch vụ phòng và Wi-Fi miễn phí trong toàn bộ khuôn viên.\r\n</br></br>\r\nPhòng nghỉ được trang bị máy điều hòa, TV màn hình phẳng với truyền hình vệ tinh, tủ lạnh, ấm đun nước, vòi sen, đồ vệ sinh cá nhân miễn phí và bàn làm việc. Phòng tắm riêng với máy sấy tóc, các phòng chọn lọc có ban công trong khi các phòng khác nhìn ra quang cảnh thành phố. Mỗi phòng của khách sạn đều được bố trí ga trải giường và khăn tắm.\r\n</br></br>\r\nChỗ nghỉ cung cấp bữa sáng buffet, bữa sáng kiểu Mỹ và kiểu Á hằng ngày. Nhà hàng tại Señorita Boutique Hotel phục vụ ẩm thực Việt Nam, địa phương và châu Á. Du khách cũng có thể yêu cầu thực đơn chay, thuần chay và các món ăn không chứa sữa.\r\n</br></br>\r\nTại đây có bàn đặt tour, dịch vụ cho thuê xe đạp và dịch vụ văn phòng với máy fax cùng máy photocopy.\r\n</br></br>\r\nChỗ nghỉ nằm cách Bảo tàng Chăm 4 km và Công viên Châu Á 4,1 km. Sân bay gần nhất là sân bay quốc tế Đà Nẵng, nằm trong bán kính 7 km từ Señorita Boutique Hotel.',25,1,'/hostay/public/images/1703330795_61635.jpg','89 Tran Bach Dang, Đà Nẵng, Việt Nam','Señorita Boutique Hotel',2),
 (38,2,1,4,'Giường đôi nhỏ','15.52','Tọa lạc tại thành phố Đà Nẵng, Sepon Blue Hotel có nhà hàng, hồ bơi ngoài trời, quầy bar và sảnh khách chung. Chỗ nghỉ còn có phòng gia đình và sân hiên. Chỗ nghỉ cung cấp dịch vụ lễ tân 24 giờ, dịch vụ phòng và dịch vụ thu đổi ngoại tệ cho khách.\r\n</br></br>\r\nPhòng nghỉ tại khách sạn được trang bị máy điều hòa, TV truyền hình vệ tinh màn hình phẳng, tủ lạnh, ấm đun nước, vòi xịt/chậu rửa vệ sinh, dép, bàn làm việc và két an toàn. Một số phòng nhìn ra quang cảnh biển. Tất cả các phòng đều được bố trí ga trải giường và khăn tắm.\r\n</br></br>\r\nSepon Blue Hotel phục vụ bữa sáng buffet hoặc kiểu Mỹ.\r\n</br></br>\r\nChỗ nghỉ nằm cách Bãi biển Mỹ Khê 350 m và Bãi biển Bắc Mỹ An 2 km. Sân bay gần nhất là sân bay quốc tế Đà Nẵng, nằm trong bán kính 6 km từ Sepon Blue Hotel, và chỗ nghỉ cung cấp dịch vụ đưa đón sân bay với một khoản phụ phí.',23,1,'/hostay/public/images/1703330937_68245.jpg','157-159 Võ Văn Kiệt, Đà Nẵng, Việt Nam','Sepon Blue Hotel',2),
 (39,1,1,4,'Giường đơn lớn','14.00','Nằm trên con đường từ Bãi biển Trần Phú ở thành phố Nha Trang, Venue Hotel cung cấp chỗ nghỉ trang nhã, được bài trí đẹp mắt cách Quảng trường 2/4 chỉ 300 m. Du khách có thể dùng bữa tại nhà hàng hoặc thưởng thức đồ uống tùy thích ở quán bar trong nhà. Wi-Fi có sẵn miễn phí trong toàn khuôn viên khách sạn.\r\n</br></br>\r\nVới ánh nắng mặt trời bừng sáng ban ngày, mỗi phòng được bài trí ấm áp có máy lạnh và cửa sổ lớn nhìn ra thành phố, biển hoặc đường phố xung quanh. Các phòng được trang bị TV, minibar, ấm đun nước điện và két an toàn. Tất cả mọi phòng đều được thiết kế phòng tắm riêng với đồ vệ sinh cá nhân miễn phí.\r\n</br></br>\r\nNhững khách lái xe đến chỗ nghỉ có thể sử dụng bãi đậu xe miễn phí trong khuôn viên.\r\n</br></br>\r\nThành thạo một số ngôn ngữ, nhân viên chỗ nghỉ làm việc 24/24 tại lễ tân để hỗ trợ đáp ứng các yêu cầu của quý khách. Venue Hotel cung cấp dịch vụ giữ hành lý, thu đổi ngoại tệ và bàn đặt tour. Du khách cũng có thể thuê xe đạp hoặc xe hơi tại chỗ nghỉ này.\r\n</br></br>\r\nSân bay Quốc tế Cam Ranh cách đó 26 km.',22,1,'/hostay/public/images/1703331073_47645.jpg','24 Ton Dan , Nha Trang, Việt Nam','Venue Hotel',1),
 (40,2,1,3,'Giường đôi lớn','18.26','Quay mặt ra bãi biển ở thành phố Nha Trang, Aaron Hotel cung cấp chỗ nghỉ 3 sao và có trung tâm thể dục, sảnh khách chung cũng như nhà hàng. Khách sạn 3 sao có lễ tân 24 giờ, dịch vụ tiền sảnh và WiFi miễn phí. Một số phòng nghỉ tại đây có ban công nhìn ra biển.\r\n</br></br>\r\nMỗi phòng tại Aaron Hotel đều được trang bị máy điều hòa, khu vực ghế ngồi, TV truyền hình vệ tinh màn hình phẳng, két an toàn, máy pha cà phê và phòng tắm riêng với đồ vệ sinh cá nhân miễn phí cùng máy sấy tóc. Một số phòng có sân hiên trong khi các phòng khác nhìn ra thành phố. Tất cả các phòng được bố trí ga trải giường và khăn tắm.\r\n</br></br>\r\nCác điểm tham quan nổi tiếng gần chỗ nghỉ bao gồm Bãi biển Nha Trang, Tháp Trầm Hương và Trung tâm mua sắm Nha Trang Centre. Sân bay gần nhất là sân bay quốc tế Cam Ranh, cách Aaron Hotel 34 km.',25,1,'/hostay/public/images/1703331180_70831.jpg','6/6 Tran Quang Khai Nha Trang, Nha Trang, Việt Nam','Aaron Hotel',2),
 (41,2,1,4,'Giường đôi lớn','13.00','Cách bãi biển Nha Trang vài phút tản bộ, Prime New Hotel là 1 tòa nhà ốp kính có tầm nhìn ra quang cảnh đại dương. Bữa sáng, dịch vụ đưa đón sân bay và Wi-Fi miễn phí có sẵn tại khách sạn.\r\n</br></br>\r\nPrime New Hotel cung cấp các phòng nghỉ tràn ngập ánh sáng tự nhiên. Các phòng được trang bị máy lạnh, truyền hình cáp, máy sấy tóc và minibar.\r\n</br></br>\r\nHotel Prime có bàn đặt tour chuyên tổ chức các chuyến đi trong ngày. Dịch vụ cho thuê xe đạp và xe hơi cũng được cung cấp để tạo sự thuận tiện cho khách.\r\n</br></br>\r\nCác dịch vụ khác tại khách sạn bao gồm lễ tân 24 giờ, tiện nghi để hành lý và dịch vụ phòng. Quý khách cũng có thể yêu cầu khách sạn cung cấp báo.\r\n</br></br>\r\nẨm thực Châu Á và Châu Âu được chế biến ngay trước mặt khách. Quý khách cũng có thể yêu cầu các món ăn truyền thống của Việt Nam. Quý khách sẽ tìm thấy tuyển chọn các loại cocktail và rượu vang đa dạng tại quầy bar.',24,1,'/hostay/public/images/1703331287_60222.jpg','22 Ton Dan, Nha Trang, Việt Na','Prime New Hotel',1),
 (42,2,2,4,'Giường đơn lớn','17.43','Located at the corner of Tran Phu and Nguyen Binh Khiem Street, Gem Nha Trang Hotel offers 4-star accommodation in Nha Trang. Guests can enjoy meals at the in-house restaurant or have a drink at the rooftop bar while taking in panoramic views.\r\n</br></br>\r\nIt is conveniently 50 metres away from Nha Trang Beach. Alexandre Yersin Museum is 500 metres from Gem Nha Trang Hotel, while Dam Market is 500 metres away. The nearest airport is Cam Ranh International Airport, 28 km from the property. Airport transfers and shuttle services are available at additional charges.\r\n</br></br>\r\nEach contemporary-styled room is fitted with a TV with cable channels. Some units feature a seating area where you can relax. Views of the beach, the Cai River or city are featured in certain rooms. The rooms have a private bathroom.\r\n</br></br>\r\nGuests can approach the 24-hour front desk for currency exchange, tour arrangements, ticketing and concierge services. There is a gift shop at the property. The hotel also offers bicycle rentals for guests who wish to explore the surrounding area.',29,1,'/hostay/public/images/1703331406_61509.jpg','181-183 Nguyen Binh Khiem, Xuong Huan Ward, Nha Trang, Việt Nam','Gem Nha Trang Hotel',1),
 (43,2,1,4,'Giường đôi nhỏ','60.65','The Song Luxury Apartment is a sustainable apartment in Vung Tau, offering free WiFi, infinity pool and garden. Guests can take in the mountain views and spend some time on the beach. The accommodation is air conditioned and features a sauna. The apartment has private parking, a sauna and a 24-hour front desk.\r\n</br></br>\r\nThe apartment provides guests with a balcony, sea views, a seating area, cable flat-screen TV, a fully equipped kitchen with a fridge and a stovetop, and a private bathroom with walk-in shower and slippers. A patio with an outdoor dining area and pool views is offered in all units. At the apartment complex, each unit has bed linen and towels.\r\n</br></br>\r\nA minimarket is available at the apartment.\r\n</br></br>\r\nYou can play table tennis at this 4-star apartment, and bike hire and car hire are available. A water park and kids pool are available at the apartment, while guests can also relax on the sun terrace.\r\n</br></br>\r\nBack Beach is less than 1 km from The Song Luxury Apartment, while Ho May Culture and Ecotourism Park is 3.7 km from the property. The nearest airport is Vung Tau Airport, 3 km from the accommodation.',40,1,'/hostay/public/images/1703331608_83573.jpg','28 Đường Thi Sách 08.18, Vũng Tàu, Việt Nam','The Song Luxury Apartment',2),
 (44,2,1,2,'Giường đôi nhỏ','13.00','Nằm quay mặt ra bãi biển ở thành phố Vũng Tàu, Summer Beach Hotel Vung Tau cung cấp chỗ nghỉ 3 sao với sảnh khách chung, nhà hàng và quầy bar. Khách sạn có khu vực bãi biển riêng và gần một số điểm tham quan nổi tiếng, cách Bãi Sau khoảng 70 m, Bãi Dứa 1,7 km và Mũi Nghinh Phong 1,5 km. Chỗ nghỉ có dịch vụ lễ tân 24 giờ, dịch vụ đưa đón sân bay, khu vực bếp chung và WiFi miễn phí trong toàn bộ khuôn viên.\r\n</br></br>\r\nPhòng nghỉ tại khách sạn được trang bị máy điều hòa, bàn làm việc, máy pha cà phê, tủ lạnh, minibar, két an toàn, TV màn hình phẳng, ấm đun nước và phòng tắm riêng với vòi xịt/chậu rửa vệ sinh. Một số phòng còn có khu vực bếp với lò vi sóng và bếp nấu. Tại Summer Beach Hotel Vung Tau, các phòng đều có ga trải giường và khăn tắm.\r\n</br></br>\r\nKhách sạn cho thuê xe đạp và xe hơi. Đạp xe là hoạt động phổ biến trong khu vực.\r\n</br></br>\r\nChỗ nghỉ nằm cách Bãi Trước 2,6 km và Bạch Dinh 4,3 km. Sân bay gần nhất là sân bay Vũng Tàu, cách Summer Beach Hotel Vung Tau 6 km.',18,1,'/hostay/public/images/1703331730_95998.jpg','Hẻm 45 Thùy Vân 45/18 Thùy Vân, phường 2, thành phố Vũng Tàu, Vũng Tàu, Việt Nam','Summer Beach Hotel Vung Tau',2),
 (45,4,2,3,'Giường đôi nhỏ','22.82','Tọa lạc tại thị xã Sa Pa, cách Ga cáp treo Fansipan Legend 6 km, Liberty Sapa Hotel cung cấp chỗ nghỉ với khu vườn, chỗ đỗ xe riêng miễn phí, sảnh khách chung và sân hiên. Khách sạn 3 sao này có nhà hàng và phòng nghỉ gắn máy điều hòa với WiFi miễn phí cùng phòng tắm riêng. Chỗ nghỉ cung cấp dịch vụ phòng, dịch vụ lễ tân 24 giờ và dịch vụ thu đổi ngoại tệ cho khách.\r\n</br></br>\r\nTất cả phòng nghỉ tại khách sạn đều có TV truyền hình cáp màn hình phẳng, ấm đun nước, vòi xịt/chậu rửa vệ sinh, đồ vệ sinh cá nhân miễn phí và bàn làm việc. Các phòng được trang bị ga trải giường và khăn tắm.\r\n</br></br>\r\nCác điểm tham quan nổi tiếng gần Liberty Sapa Hotel bao gồm Hồ Sa Pa, Nhà thờ Đá Sa Pa và Bến xe Sa Pa. Sân bay gần nhất là sân bay Wenshan Puzhehei, cách đó 222 km, và chỗ nghỉ cung cấp dịch vụ đưa đón sân bay với một khoản phụ phí.',25,1,'/hostay/public/images/1703331931_74529.jpg','69 Muong Hoa, Sapa Town, Lao Cai, Sa Pa, Việt Nam','Liberty Sapa Hotel',1),
 (46,2,1,4,'Giường đôi lớn','13.60','Flaco Hostel Sapa nằm ở thị xã Sa Pa, cách Ga cáp treo Fansipan Legend 5,2 km và Nhà thờ Đá Sa Pa 1 km. Hostel này có sảnh khách chung và nằm gần một số điểm tham quan nổi tiếng, cách Hồ Sa Pa khoảng 400 m, Bến xe Sa Pa 600 m cũng như Vườn hoa Hàm Rồng - Núi Hàm Rồng 2 km. Chỗ nghỉ cung cấp dịch vụ lễ tân 24 giờ, dịch vụ đưa đón sân bay, bếp chung và WiFi miễn phí trong toàn bộ khuôn viên.\r\n</br></br>\r\nMột số căn tại hostel cũng có tầm nhìn ra quang cảnh thành phố và phòng tắm riêng với vòi sen cùng dép.\r\n</br></br>\r\nThung lũng Mường Hoa và Thác Bạc đều nằm trong bán kính 12 km từ Flaco Hostel Sapa. Sân bay gần nhất là sân bay Wenshan Puzhehei, cách chỗ nghĩ 220 km.',20,1,'/hostay/public/images/1703332023_79057.jpg','516 Đường Điện Biên Phủ, Sa Pa, Việt Nam','Flaco Hostel Sapa',2);
/*!40000 ALTER TABLE `tblroom` ENABLE KEYS */;


--
-- Definition of table `tblroomtype`
--

DROP TABLE IF EXISTS `tblroomtype`;
CREATE TABLE `tblroomtype` (
  `roomtype_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `roomtype_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomtype_notes` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`roomtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblroomtype`
--

/*!40000 ALTER TABLE `tblroomtype` DISABLE KEYS */;
INSERT INTO `tblroomtype` (`roomtype_id`,`roomtype_name`,`roomtype_notes`) VALUES 
 (1,'Standard','Phòng ngủ thông thường'),
 (2,'Superior',NULL),
 (3,'Deluxe',NULL),
 (4,'Suite',NULL),
 (5,'Villa',NULL);
/*!40000 ALTER TABLE `tblroomtype` ENABLE KEYS */;


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
  `user_created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbluser`
--

/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` (`user_id`,`user_name`,`user_password`,`user_fullname`,`user_email`,`user_phone`,`user_permission`,`user_created_at`) VALUES 
 (15,'admin','25d55ad283aa400af464c76d713c07ad','Admin','nguyenquanghuylt2002@gmail.com','0337212814',5,'2023-11-20 00:00:00'),
 (16,'admin2','25d55ad283aa400af464c76d713c07ad','Admin 2','nguyenquanghuylt2002@gmail.com','0337212814',5,'2023-12-01 00:00:00'),
 (17,'hieuchuai1325','9a7a749e0e1b103542daf838bced97b4','Nguyễn Minh Hiếu','mhieu01032005@gmail.com','',1,'2023-12-01 00:00:00'),
 (18,'huynq22','600af65e7f95e2e38fc9e3a4121cfc24','Nguyễn Quang Huy','nguyenquanghuylt2002@gmail.com','0337212814',1,'2023-11-20 00:00:00'),
 (19,'thanhgk2317','600af65e7f95e2e38fc9e3a4121cfc24','Khổng Thị Hoài Thanh','khongthihoaithanhlt2003@gmail.com','',1,'2023-12-01 00:00:00'),
 (20,'linhnhi23','773142d662df9a962e605645a23a4654','Triệu Thị khánh Linh','linhnhi2243@gmail.com','',1,'2023-12-01 00:00:00'),
 (22,'antoni2','35f916fafa44b4034f7fd1c40e7b9cf9','Antonio','busketantoni123@gmail.com','0653673143',0,'2023-12-01 00:00:00'),
 (23,'zenoomi','600af65e7f95e2e38fc9e3a4121cfc24','Zenomi','kaiziruzenomi473@gmail.com','0834142684',0,'2023-12-01 00:00:00'),
 (24,'quyet2003','b90922a0944d7be8a90a6b9d1b35e575','Nguyễn Văn Khải','quyet358203@gmail.com','0283762387',0,'2023-12-01 00:00:00'),
 (25,'duongn1704','f24cef42b2ebf4c085d1b1640a81ca78','Nguyễn Thùy Dương','duongkha3002@gmail.com','0457323498',0,'2023-12-01 00:00:00'),
 (26,'manhduy137','acebfc1c108ba0f236deac18793d4daa','Nguyễn Duy Mạnh','nguyenmanhduy137@gmail.com',NULL,0,'2023-12-01 00:00:00'),
 (27,'huongcao','79729ff2972a24d4dce9a6750a68d649','Cao Thị Thanh Hường','caohuong12003@gmail.com','',0,'2023-12-12 00:00:00'),
 (28,'hungpham263','5407cdb7621bf4688e069f627fc3a496','Phạm Thái Hưng','phamthaihung263@gmail.com',NULL,0,'2023-12-12 00:00:00'),
 (29,'khanhduy283','0e29896517333b3fbff0e790f071fb03','Nguyễn Duy Khánh','nguyenduykhanh122@gmail.com',NULL,0,'2023-12-13 00:00:00'),
 (30,'huyvp22','600af65e7f95e2e38fc9e3a4121cfc24','Nguyễn Quang Huy','nguyenquanghuylt2002@gmail.com',NULL,0,'2023-12-18 00:00:00'),
 (31,'ittosuperstronger','600af65e7f95e2e38fc9e3a4121cfc24','Arataki Itto','aratakiitto2394@gmail.com',NULL,0,'2023-12-20 00:00:00'),
 (32,'thuyl23','600af65e7f95e2e38fc9e3a4121cfc24','Lương Thị Ngọc Thúy','thuyngoc23@gmail.com','0834392837',1,'2023-12-22 00:00:00'),
 (33,'lamtrieu34','25f9e794323b453885f5181f1b624d0b','Triệu Quang Lâm','trieuquanglam3452@gmail.com',NULL,0,'2023-12-22 00:00:00'),
 (34,'nampham392','7bd8bab2fb071637e260049a31511175','Phạm Hải Nam','phamhainam3049@gmail.com','0384739281',0,'2023-12-23 00:00:00'),
 (35,'phuongtr','9be37bdebdb5c7d79fa12e8e1834d264','Trần Thị Thu Phương','tranthithuphuong2005@gmail.com','0383737293',0,'2023-12-23 00:00:00'),
 (36,'anhpham9383','ae02470a0e80a5769b9a6eecfef6f03d','Phạm Đức Anh','nhpham9383@gmail.com','0393829349',0,'2023-12-23 00:00:00'),
 (37,'nhuquynh39484','e061f8f0edb0f242ac1628856138f92a','Bùi Thị Như Quỳnh','nhuquynh39484@gmail.com','0839493821',0,'2023-12-23 00:00:00'),
 (38,'lynguyen293','5711fe04da59f4cae04913f3a9272ff8','Nguyễn Thị Ly','lynguyen293@gmail.com','0383759389',0,'2023-12-23 00:00:00'),
 (39,'mikoyande3049','73fa5950e433974309f70fc5ccd7473c','Yae Miko','yaendhsk500@gmail.com','0357394732',0,'2023-12-23 00:00:00'),
 (40,'khanhdy3048','2df7b7c7fdce2b10744d8154a369608c','Nguyễn Duy Khánh','duykhanh238@gmail.com','0384739282',0,'2023-12-23 00:00:00'),
 (41,'vuvu3928','790ba97f9c3893ca01a29cd8096bb428','Vũ Long Vũ','vuvu3928@gmail.com','0384729373',0,'2023-12-23 00:00:00'),
 (42,'cucthanh2937','b8ce8dc19e730151b58536ed90d3ec16','Dỗ Thị Thanh Cúc','cucthanh2937@gmail.com','0837927189',0,'2023-12-23 00:00:00'),
 (43,'anhanh3928','374868225b552792e4f3983da3a1102d','Hoàng Anh','anhanh3928@gmail.com','0385739279',0,'2023-12-23 00:00:00'),
 (44,'hailongvuong2384','29b5c9c70338e6e548d80f86998fa9a5','Trần Hải','tranhai39720@gmail.com','0384729732',0,'2023-12-23 00:00:00'),
 (45,'thienta4053','7e409c889294a543ea1edf96190e05bf','Tạ Bá Thiện','tabathienlt20039@gmail.com','0384739274',0,'2023-12-23 00:00:00'),
 (46,'dangtran30293','8429ea4e079f44663d2d62d09194aea5','Trần Minh Đăng','dangthan29372@gmail.com','',0,'2023-12-23 00:00:00');
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
