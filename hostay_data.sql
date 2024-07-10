--
-- Create schema hostay_data
--
CREATE DATABASE IF NOT EXISTS hostay_data;
USE hostay_data;
-- -----------------------------TABLE----------------------------------------------
--
-- Definition of table `tblbill`
--
DROP 
  TABLE IF EXISTS `tblbill`;
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
  `bill_voucher_code` varchar(20), 
  `bill_personal_id` varchar(20), 
  `bill_checkin_code` varchar(20), 
  `bill_staff_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL, 
  PRIMARY KEY (`bill_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 19 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Definition of table `checkout`
--
DROP 
  TABLE IF EXISTS `checkout`;
CREATE TABLE checkout(
	id int auto_increment,
    bill_id int, 
    checkout_by_user varchar(20), 
    checkout_date date,
    description text,
    
    primary key(id)
);
--
-- Definition of table `employee`
--
DROP 
  TABLE IF EXISTS `employee`;
CREATE TABLE employee(
	id int auto_increment, 
    fullname nvarchar(50), 
    phone varchar(15),
    email varchar(20),
    address varchar(50),
    personal_id varchar(20),
    role enum('Bảo vệ', 'Lễ tân', 'Phục vụ'),
    
    primary key(id)
)
--
-- Definition of table `tblbillstatic`
--
DROP 
  TABLE IF EXISTS `tblbillstatic`;
CREATE TABLE `tblbillstatic` (
  `billstatic_id` int(10) unsigned NOT NULL AUTO_INCREMENT, 
  `billstatic_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL, 
  `billstatic_notes` text COLLATE utf8mb4_unicode_ci, 
  PRIMARY KEY (`billstatic_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Definition of table `tblcontact`
--
DROP 
  TABLE IF EXISTS `tblcontact`;
CREATE TABLE `tblcontact` (
  `contact_id` int(10) unsigned NOT NULL AUTO_INCREMENT, 
  `contact_fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL, 
  `contact_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL, 
  `contact_subject` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL, 
  `contact_notes` text COLLATE utf8mb4_unicode_ci NOT NULL, 
  `contact_seen` tinyint(1) unsigned DEFAULT '0', 
  `contact_created_at` datetime NOT NULL, 
  PRIMARY KEY (`contact_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Definition of table `tblroom`
--
DROP 
  TABLE IF EXISTS `tblroom`;
CREATE TABLE `tblroom` (
  `room_id` int(10) unsigned NOT NULL AUTO_INCREMENT, 
  `room_number_people` int(10) unsigned DEFAULT NULL, 
  `room_number_bed` int(10) unsigned DEFAULT NULL, 
  `room_quality` float DEFAULT NULL, 
  `room_bed_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL, 
  `room_price` decimal(18, 2) NOT NULL, 
  `room_detail` text COLLATE utf8mb4_unicode_ci, 
  `room_area` float NOT NULL, 
  `room_static` int(10) unsigned DEFAULT '0', 
  `room_image` text CHARACTER SET latin1, 
  `room_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL, 
  `room_hotel_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL, 
  `room_type_id` int(10) unsigned NOT NULL, 
  PRIMARY KEY (`room_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 47 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Definition of table `tblroomtype`
--
DROP 
  TABLE IF EXISTS `tblroomtype`;
CREATE TABLE `tblroomtype` (
  `roomtype_id` int(10) unsigned NOT NULL AUTO_INCREMENT, 
  `roomtype_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL, 
  `roomtype_notes` text COLLATE utf8mb4_unicode_ci, 
  PRIMARY KEY (`roomtype_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Definition of table `tbluser`
--
DROP 
  TABLE IF EXISTS `tbluser`;
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
) ENGINE = InnoDB AUTO_INCREMENT = 47 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Definition of table `voucher`
--
DROP 
  TABLE IF EXISTS `voucher`;
CREATE TABLE voucher (
  voucher_id int unsigned NOT NULL AUTO_INCREMENT, 
  voucher_code varchar(20), 
  start_date datetime, 
  expire_date datetime, 
  percent int, 
  discount_limit bigint default 0, 
  min_order_value bigint default 0, 
  usage_limit int, 
  usage_count int default 0, 
  status ENUM('active', 'expired', 'used') default 'active', 
  create_at datetime default now(), 
  user_id int, 
  description text, 
  primary key(voucher_id)
);
--
-- Definition of table `checkin`
--
DROP 
  TABLE IF EXISTS checkin;
CREATE TABLE checkin(
  checkin_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
  first_indentity_card text, 
  second_indentity_card text, 
  checkin_code varchar(20), 
  checkin_date datetime, 
  create_at datetime default now(), 
  checkin_user varchar(20), 
  bill_id varchar(20), 
  status varchar(20) default 'uncheck', 
  -- uncheck, checked, incorrect
  description text, 
  primary key (checkin_id)
);
-- --------------------- VALUES ----------------------------------------
-- ---- INSERT VALUES
-- bill values
INSERT INTO `tblbill` (
  `bill_id`, `bill_room_id`, `bill_customer_id`, 
  `bill_created_at`, `bill_fullname`, 
  `bill_email`, `bill_phone`, `bill_start_date`, 
  `bill_end_date`, `bill_number_adult`, 
  `bill_number_children`, `bill_number_room`, 
  `bill_notes`, `bill_static`, `bill_is_paid`, 
  `bill_cancel`, `bill_staff_name`
) 
VALUES 
  (
    2, 17, 15, '2023-11-15 00:00:00', 'Triệu Thị khánh Linh', 
    'linhnhi2243@gmail.com', '0267312746', 
    '2024-01-01 00:00:00', '2024-01-10 00:00:00', 
    1, 0, 1, 'Kiếm chỗ nghỉ trong dịp tết Tây', 
    5, 1, 0, 'Nguyễn Quang Huy'
  ), 
  (
    3, 29, 28, '2023-12-12 00:00:00', 'Nguyễn Đức An', 
    'nguyenducan20384@gmail.com', '0973263849', 
    '2023-12-12 00:00:00', '2023-12-14 00:00:00', 
    2, 0, 1, '', 5, 1, 0, 'Nguyễn Quang Huy'
  ), 
  (
    4, 28, 23, '2023-12-12 00:00:00', 'Zenomi', 
    'zenomiarrtak2049@gmail.com', '0238742343', 
    '2023-12-12 00:00:00', '2023-12-20 00:00:00', 
    1, 0, 1, '', 5, 1, 0, 'Nguyễn Quang Huy'
  ), 
  (
    5, 26, 29, '2023-12-13 00:00:00', 'Nguyễn Duy Khánh', 
    'nguyenduykhanh122@gmail.com', 
    '09570283928', '2023-12-30 00:00:00', 
    '2024-01-10 00:00:00', 3, 1, 2, 'Cần đặt phòng trước cho kỳ tết Tây', 
    2, 0, 0, 'Nguyễn Quang Huy'
  ), 
  (
    7, 29, 15, '2023-12-13 00:00:00', 'Admin', 
    'nguyenquanghuylt2002@gmail.com', 
    '0337212814', '2023-12-13 00:00:00', 
    '2023-12-17 00:00:00', 1, 0, 1, '', 
    5, 0, 1, 'Nguyễn Quang Huy'
  ), 
  (
    8, 25, 30, '2023-12-18 00:00:00', 'Nguyễn Văn Hòa', 
    'hoavan1978@gmail.com', '0393100328', 
    '2023-12-22 00:00:00', '2023-12-31 00:00:00', 
    2, 1, 1, '', 4, 0, 0, 'Triệu Thị Khánh Linh'
  ), 
  (
    9, 27, 30, '2023-12-18 00:00:00', 'Nguyễn Quang Huy', 
    'nguyenquanghuylt2002@gmail.com', 
    '0337212814', '2023-12-18 00:00:00', 
    '2023-12-18 00:00:00', 1, 0, 1, '', 
    1, 0, 0, NULL
  ), 
  (
    10, 28, 30, '2023-12-18 00:00:00', 
    'Trần Thị Thu Trang', 'trangthu2993@gmail.com', 
    '0387292134', '2024-01-01 00:00:00', 
    '2024-02-01 00:00:00', 1, 0, 1, '', 
    4, 1, 0, 'Khổng Thị Hoài Thanh'
  ), 
  (
    11, 29, 15, '2023-12-19 00:00:00', 
    'Nguyễn Q Huy', 'nguyenquanghuylt2002@gmail.com', 
    '0337212814', '2023-12-19 00:00:00', 
    '2023-12-19 00:00:00', 1, 0, 1, '', 
    1, 0, 1, NULL
  ), 
  (
    12, 23, 31, '2023-12-20 00:00:00', 
    'Arataki Itto', 'aratakiitto2394@gmail.com', 
    '0493953820', '2024-01-01 00:00:00', 
    '2024-02-05 00:00:00', 3, 0, 1, '', 
    1, 0, 0, NULL
  ), 
  (
    14, 28, 15, '2023-12-22 00:00:00', 
    'Đỗ Việt Hà', 'hadov12983@gmail.com', 
    '0828723421', '2023-12-30 00:00:00', 
    '2024-01-15 00:00:00', 2, 0, 1, '', 
    1, 0, 1, NULL
  ), 
  (
    15, 16, 32, '2023-12-22 00:00:00', 
    'Lương Thị Ngọc Thúy', 'thuyngoc23@gmail.com', 
    '0382938492', '2023-12-22 00:00:00', 
    '2023-12-22 00:00:00', 1, 0, 1, '', 
    3, 0, 1, 'Nguyễn Quang Huy'
  ), 
  (
    16, 26, 33, '2023-12-22 00:00:00', 
    'Triệu Quang Lâm', 'trieuquanglam3452@gmail.com', 
    '0339582813', '2024-01-01 00:00:00', 
    '2024-01-15 00:00:00', 4, 0, 1, '', 
    1, 0, 1, NULL
  ), 
  (
    17, 26, 33, '2023-12-22 00:00:00', 
    'Triệu Quang Lâm', 'trieuquanglam3452@gmail.com', 
    '0928273928', '2024-01-01 00:00:00', 
    '2024-01-30 00:00:00', 4, 0, 1, '', 
    1, 0, 0, NULL
  ), 
  (
    18, 46, 15, '2023-12-23 00:00:00', 
    'Nguyễn Tiến Đạt', 'nguyenquanghuylt2002@gmail.com', 
    '0337212814', '2024-01-31 00:00:00', 
    '2024-02-28 00:00:00', 2, 0, 1, '', 
    2, 1, 0, 'Triệu Thị Khánh Linh'
  );
-- tblbillstatic
INSERT INTO `tblbillstatic` (
  `billstatic_id`, `billstatic_name`, 
  `billstatic_notes`
) 
VALUES 
  (
    1, 'Chờ xử lý', 'Đơn đăng ký đã tạo thành công và chờ người quản lý xem xét.\r\n'
  ), 
  (
    2, 'Thành công - chờ nhận phòng', 
    'Đơn đặt phòng đã được duyệt và chờ người đăng ký nhận phòng'
  ), 
  (
    3, 'Bị hủy', 'Đơn đặt phòng bị hủy vì một lý do nào đó'
  ), 
  (4, 'Đã nhận phòng', NULL), 
  (5, 'Đã trả phòng', NULL);
-- tblcontact
INSERT INTO `tblcontact` (
  `contact_id`, `contact_fullname`, 
  `contact_email`, `contact_subject`, 
  `contact_notes`, `contact_seen`, 
  `contact_created_at`
) 
VALUES 
  (
    1, 'Nguyễn Quang Huy', 'nguyenquanghuylt2002@gmail.com', 
    'Về dịch vụ', 'Dịch vụ đáp úng chưa tốt lắm, mong cải thiện thêm', 
    1, '2023-12-16 00:00:00'
  ), 
  (
    2, 'Hotel HaiPhong Avant', 'haiphonghotelwie@gmail.com', 
    'Hợp tác', 'Chúng tôi muốn cơ hội hợp tác với dịch vụ của Hostay', 
    0, '2023-12-22 00:00:00'
  ), 
  (
    3, 'Phạm Tiến Công', 'congtien@gmail.com', 
    'dịch vụ tốt', '...', 1, '2023-12-23 00:00:00'
  ), 
  (
    4, 'Khổng Thị Hoài Thanh', 'nguyenquanghuylt2002@gmail.com', 
    'Mất đồ', 'Tôi bị mất một túi đồ trong đó có giấy tờ tùy thân ở Mesun Hotel mong được hỗ trợ', 
    1, '2023-12-23 00:00:00'
  );
INSERT INTO `tblroom` (
  `room_id`, `room_number_people`, 
  `room_number_bed`, `room_quality`, 
  `room_bed_type`, `room_price`, `room_detail`, 
  `room_area`, `room_static`, `room_image`, 
  `room_address`, `room_hotel_name`, 
  `room_type_id`
) 
VALUES 
  (
    16, 4, 2, 3, 'Giường đôi lớn', 
    '1600000', 'Tọa lạc tại trung tâm của Khu Phố Cổ Hà Nội, Luxury Hotel có một vị trí yên bình, nằm trong bán kính chỉ 5 phút đi bộ từ Hồ Hoàn Kiếm nổi tiếng và Nhà thờ Saint-Joseph. Đặc trưng với lối trang trí hiện đại của Việt Nam, tất cả các phòng của khách sạn đều được trang bị Wi-Fi miễn phí và máy lạnh tự điều chỉnh.\r\n</br></br>\r\nTất cả các phòng đều có sàn gỗ, TV màn hình phẳng và minibar. Một số phòng còn có cửa sổ kính suốt từ trần đến sàn hoặc ban công riêng. Trong phòng tắm riêng được trang bị vòi sen hoặc bồn tắm.\r\n</br></br>\r\nLuxury Hotel cách Chợ Đồng Xuân 10 phút đi bộ và cách Văn Miếu 5 phút lái xe. Từ nơi nghỉ này, du khách chỉ cần lái xe 10 phút là đến Lăng Chủ tịch Hồ Chí Minh, Chùa Một Cột và Ga Tàu Hà Nội. Sân bay Quốc tế Nội Bài cách đó 40 phút lái xe.\r\n</br></br>\r\nTại sảnh đợi có 4 máy vi tính cho khách sử dụng. Du khách có thể sắp xếp các dịch vụ cho thuê xe đạp, cho thuê xe hơi và giữ hành lý tại quầy lễ tân. Bàn bán tour còn có thể giúp khách tổ chức các chuyến đi trong ngày.\r\n</br></br>\r\nCác món ăn phương Tây và châu Á cũng như đồ uống không cồn được phục vụ tại nhà hàng của khách sạn.', 
    20, 1, '/hostay/public/images/1701419604_67112.jpg', 
    '2 Phu Doan Lane, Hoan Kiem, Quận Hoàn Kiếm, Hà Nội, Việt Nam', 
    'Hanoi Luxury Hotel', 3
  ), 
  (
    17, 2, 1, 3, 'Giường đôi lớn', 
    '1700000', 'Situated within 11 km of My Dinh Stadium and 11 km of Vincom Center Nguyen Chi Thanh in Hanoi, Queen Hotel 2 - Hà Đông provides accommodation with seating area. This sustainable apartment is located 12 km from Vietnam Fine Arts Museum and 12 km from Hanoi Temple of Literature. The accommodation features a 24-hour front desk, full-day security and currency exchange for guests.\r\n</br></br>\r\nFeaturing a private bathroom with a shower and slippers, units at the apartment complex also feature free WiFi. All units at the apartment complex have air conditioning and a desk.\r\n</br></br>\r\nHa Noi Railway station is 13 km from the apartment, while Imperial Citadel is 13 km from the property. The nearest airport is Noi Bai International, 35 km from Queen Hotel 2 - Hà Đông, and the property offers a paid airport shuttle service.', 
    25, 1, '/hostay/public/images/1701419858_88986.jpg', 
    'số 26 BT4 KĐT Văn Phú, Phường Phú La, Quận Hà Đông, Hà Nội, Việt Nam', 
    'Queen Hotel 2 - Hà Đông', 3
  ), 
  (
    18, 4, 2, 4, 'Giường đôi lớn', 
    '1000000', 'Hanoi Paradise Hotel & Travel nằm trong Phố Cổ mang tính biểu tượng của thành phố Hà Nội. Khách sạn cung cấp các phòng với Wi-Fi miễn phí và cách những điểm tham quan như Hồ Hoàn Kiếm và Nhà hát lớn Hà Nội một đoạn ngắn đi bộ.\r\n</br></br>\r\nTất cả các phòng tại đây đều có máy lạnh và được bài trí trang nhã với truyền hình cáp màn hình phẳng, máy tính cá nhân, máy pha trà/cà phê cùng đầu đĩa DVD. Một số phòng còn có ban công/sân hiên nhìn ra Phố Cổ.\r\n\r\nNhà hàng trong khuôn viên phục vụ cà phê Việt Nam, ẩm thực châu Âu và các món ăn ngon châu Á, trong khi dịch vụ ăn uống tại phòng cũng được đáp ứng. Các tiện nghi khác bao gồm bàn đặt tour, dịch vụ thu đổi ngoại tệ và dịch vụ giặt là. Quý khách cũng có thể sử dụng trung tâm dịch vụ doanh nhân của khách sạn.\r\n</br></br>\r\nKhu vực xung quanh Hồ Hoàn Kiếm là lựa chọn tuyệt vời để khám phá ẩm thực đường phố và trải nghiệm văn hóa Hà Nội. Khách sạn nằm trong bán kính 10 phút lái xe từ Lăng Chủ tịch Hồ Chí Minh, Bảo tàng Lịch sử Việt Nam và Văn miếu Quốc Tử Giám.', 
    34, 1, '/hostay/public/images/1701420065_61180.jpg', 
    '62 Hang Bac Street, Quận Hoàn Kiếm, Hà Nội, Việt Nam', 
    'Hanoi Paradise Hotel & Travel', 
    2
  ), 
  (
    19, 3, 1, 3, 'Giường đôi cực lớn', 
    '1250000', 'Brilliant Majestic Hotel & Cafeteria is set in Da Nang, 500 metres from My Khe Beach and 2.2 km from Song Han Bridge. Featuring free bikes, the 4-star hotel has air-conditioned rooms with free WiFi, each with a private bathroom. The accommodation offers a 24-hour front desk, a concierge service and currency exchange for guests.\r\n</br></br>\r\nAt the hotel, rooms have a desk and a flat-screen TV. Brilliant Majestic Hotel & Cafeteria features some units with city views, and the rooms have a patio. At the accommodation all rooms include bed linen and towels.\r\n</br></br>\r\nGuests at Brilliant Majestic Hotel & Cafeteria can enjoy an à la carte or an Asian breakfast.\r\n</br></br>\r\nThe hotel offers an indoor pool.\r\n</br></br>\r\nLove Lock Bridge Da Nang is 2.7 km from Brilliant Majestic Hotel & Cafeteria, while Indochina Riverside Mall is 3 km from the property. The nearest airport is Da Nang International Airport, 6 km from the accommodation.', 
    20, 1, '/hostay/public/images/1701420248_79528.jpg', 
    '121 Hồ Nghinh, Đà Nẵng, Việt Nam', 
    'Brilliant Majestic Hotel & Cafeteria', 
    3
  ), 
  (
    20, 4, 2, 4, 'Giường đôi nhỏ', 
    '1350000', 'Merry Land Hotel Da Nang cung cấp các phòng nghỉ tại thành phố Đà Nẵng, cách Cầu Sông Hàn chỉ 2 phút lái xe. Khách sạn có hồ bơi ngoài trời mở cửa quanh năm, sân hiên tắm nắng và quầy bar tại chỗ. Wi-Fi trong tất cả khu vực và chỗ đậu xe riêng trong khuôn viên đều được cung cấp miễn phí.\r\n</br></br>\r\nMỗi phòng nghỉ tại khách sạn này đều được trang bị máy điều hòa, TV màn hình phẳng, ấm đun nước và phòng tắm riêng kèm chậu rửa vệ sinh (bidet), dép cùng đồ vệ sinh cá nhân giúp khách cảm thấy thoải mái.\r\n</br></br>\r\nKhách sạn có lễ tân hoạt động 24 giờ và dịch vụ cho thuê xe hơi.\r\n</br></br>\r\nKhách sạn nằm cách Cầu Tàu Tình Yêu Đà Nẵng và trung tâm mua sắm Indochina Riverside Mall 5 phút lái xe. Công viên giải trí Asia Park và sân bay gần nhất là sân bay quốc tế Đà Nẵng đều cách Merry Land Hotel Da Nang 15 phút lái xe.', 
    25, 1, '/hostay/public/images/1701420438_53791.jpg', 
    'Lot B20- B21 Pham Van Dong Str, An Hai Bac Ward, Son Tra District, Đà Nẵng, Việt Nam', 
    'Merry Land Hotel Da Nang', 1
  ), 
  (
    21, 2, 1, 5, 'Giường đôi lớn', 
    '1550000', 'Tọa lạc tại vị trí thuận tiện ở phường Bãi Cháy thuộc thành phố Hạ Long, cách Bãi biển Marina Bay 1,2 km, DeLaSea Ha Long Hotel cung cấp chỗ nghỉ với trung tâm thể dục, chỗ đỗ xe riêng miễn phí, khu vườn và nhà hàng. Khách sạn này có quầy bar, hồ bơi trong nhà, lễ tân 24 giờ, dịch vụ đưa đón sân bay, CLB trẻ em và WiFi miễn phí.\r\n</br></br>\r\nTất cả phòng nghỉ tại khách sạn có máy điều hòa, bàn làm việc, TV màn hình phẳng, phòng tắm riêng, ga trải giường, khăn tắm và sân hiên nhìn ra thành phố. Mỗi phòng đều được trang bị máy pha cà phê, tủ để quần áo và ấm đun nước. Một số phòng có sân trong trong khi các phòng khác nhìn ra biển. \r\n</br></br>\r\nKhách nghỉ tại DeLaSea Ha Long Hotel có thể thưởng thức bữa sáng kiểu Mỹ hoặc bữa sáng kiểu Á.\r\n</br></br>\r\nChỗ nghỉ nằm cách Bãi biển Bãi Cháy 2,3 km và Cáp treo Nữ hoàng 4,2 km. Sân bay gần nhất là sân bay quốc tế Cát Bi, nằm trong bán kính 40 km từ DeLaSea Ha Long Hotel.', 
    40, 1, '/hostay/public/images/1701701428_62742.jpg', 
    'Bai Chay Ward, Halong City, Quang Ninh Province, Vietnam A9, Lot 1, Ha Long Marine Boulevard, Hạ Long, Việt Nam', 
    'DeLaSea Ha Long Hotel', 2
  ), 
  (
    22, 2, 1, 4, 'Giường đôi lớn', 
    '900000', 'Ideally situated in the Ba Dinh district of Hanoi, THE GALAXY HOME APARTMENT ĐỘI CẤN is located 1.8 km from Ho Chi Minh Mausoleum, 2.3 km from Imperial Citadel and 2.3 km from Vietnam Fine Arts Museum. This 4-star hotel offers room service and free WiFi. The property is non-smoking and is situated 1.9 km from One Pillar Pagoda.\r\n</br></br>\r\nAt the hotel, the rooms include a desk. Complete with a private bathroom fitted with a bidet and free toiletries, all rooms at THE GALAXY HOME APARTMENT ĐỘI CẤN have a flat-screen TV and air conditioning, and some rooms are fitted with a balcony.\r\n</br></br>\r\nHanoi Temple of Literature is 2.4 km from the accommodation, while Vincom Center Nguyen Chi Thanh is 2.5 km from the property. The nearest airport is Noi Bai International Airport, 23 km from THE GALAXY HOME APARTMENT ĐỘI CẤN.', 
    50, 1, '/hostay/public/images/1702105765_51603.jpg', 
    '22 Ngõ 279 Phố Đội Cấn, Quận Ba Đình, Hà Nội, Việt Nam', 
    'THE GALAXY HOME APARTMENT ĐỘI CẤN', 
    3
  ), 
  (
    23, 2, 1, 3, 'Giường đôi lớn', 
    '1305000', 'Situated in Da Lat, 1.7 km from Yersin Park Da Lat, Đà Lạt An Khang 2 HOTEL features accommodation with a garden, free private parking, a terrace and a restaurant. With free WiFi, this 3-star hotel offers a shared kitchen and room service. The accommodation provides a 24-hour front desk, a concierge service and organising tours for guests.\r\n</br></br>\r\nAt the hotel, the rooms come with a desk, a flat-screen TV, a private bathroom, bed linen and towels. All rooms have a kettle, while selected rooms also feature a balcony and others also feature mountain views. All rooms have a wardrobe.\r\n</br></br>\r\nXuan Huong Lake is 1.8 km from Đà Lạt An Khang 2 HOTEL, while Lam Vien Square is 1.9 km from the property. The nearest airport is Lien Khuong Airport, 26 km from the accommodation.', 
    28, 1, '/hostay/public/images/1702108021_18745.jpg', 
    '128 Đường Tô Hiến Thành, Đà Lạt, Việt Nam', 
    'Đà Lạt An Khang 2 HOTEL', 
    2
  ), 
  (
    24, 2, 1, 3, 'Giường đôi lớn', 
    '1700000', 'Tọa lạc tại thành phố Đà Lạt, cách Công viên Yersin 1,6 km, Bazan Hotel Dalat - STAY 24H có chỗ nghỉ với khu vườn, chỗ đỗ xe riêng miễn phí và sảnh khách chung. Khách sạn 3 sao này cung cấp dịch vụ phòng và dịch vụ tiền sảnh. Chỗ nghỉ có lễ tân 24 giờ, dịch vụ đưa đón sân bay, khu vực bếp chung và WiFi miễn phí trong toàn bộ khuôn viên.\r\n</br></br>\r\nPhòng nghỉ tại khách sạn có bàn làm việc, TV màn hình phẳng, phòng tắm riêng, ga trải giường và khăn tắm. Tất cả các phòng đều được bố trí minibar.\r\n</br></br>\r\nHồ Xuân Hương và Quảng trường Lâm Viên đều nằm trong bán kính 1,8 km từ Bazan Hotel Dalat - STAY 24H. Sân bay gần nhất là sân bay Liên Khương, cách chỗ nghỉ 25 km.', 
    22, 1, '/hostay/public/images/1702108598_52459.jpg', 
    '36 To Hien Thanh , Đà Lạt, Việt Nam', 
    'Bazan Hotel Dalat - STAY 24H', 
    1
  ), 
  (
    25, 2, 1, 3, 'Giường đôi cực lớn', 
    '2300000', 'Tọa lạc tại thành phố Đà Lạt, cách Quảng trường Lâm Viên 2,8 km, La Fleur 2 Luxury Garden Hotel cung cấp chỗ nghỉ với khu vườn, chỗ đỗ xe riêng miễn phí, sảnh khách chung và sân hiên. Chỗ nghỉ có quầy bar và cách Thiền viện Trúc Lâm 2,8 km. Chỗ nghỉ cung cấp dịch vụ lễ tân 24 giờ, dịch vụ đưa đón sân bay, dịch vụ phòng và WiFi miễn phí trong toàn bộ khuôn viên.\r\n</br></br>\r\nCác căn tại khách sạn được bố trí khu vực ghế ngồi, TV truyền hình cáp màn hình phẳng cũng như phòng tắm riêng với đồ vệ sinh cá nhân miễn phí và vòi xịt/chậu rửa vệ sinh. Các phòng đều được trang bị ấm đun nước. Một số phòng có ban công trong khi những phòng khác có tầm nhìn ra quang cảnh thành phố. Tại La Fleur 2 Luxury Garden Hotel, tất cả các phòng đều có sẵn ga trải giường và khăn tắm.\r\n</br></br>\r\nChỗ nghỉ phục vụ bữa sáng kiểu Mỹ, kiểu Á hoặc bữa sáng chay.\r\n</br></br>\r\nTại khách sạn 3 sao này còn có bể sục và sân chơi cho trẻ em.\r\n</br></br>\r\nCả Hồ Tuyền Lâm và Công viên Yersin Đà Lạt đều cách La Fleur 2 Luxury Garden Hotel 2,9 km. Sân bay gần nhất là sân bay Liên Khương, cách khách sạn 26 km.', 
    35, 1, '/hostay/public/images/1702108754_82392.jpg', 
    '57 An Bình, P.3, Đà Lạt, Việt Nam', 
    'La Fleur 2 Luxury Garden Hotel', 
    2
  ), 
  (
    26, 2, 2, 2, 'Giường đơn lớn', 
    '1230000', 'Tọa lạc tại thành phố Đà Lạt, cách CLB chơi golf Dalat Palace 2,2 km, Hoàng Yến Villa Dalat cung cấp chỗ nghỉ với khu vườn, chỗ đỗ xe riêng miễn phí, sảnh khách chung và tiện nghi BBQ. Khách sạn 2 sao này có dịch vụ phòng và bàn đặt tour. Chỗ nghỉ cung cấp dịch vụ lễ tân 24 giờ, dịch vụ đưa đón sân bay, khu vực bếp chung và WiFi miễn phí trong toàn bộ khuôn viên.\r\n</br></br>\r\nTất cả phòng nghỉ tại khách sạn được trang bị TV truyền hình vệ tinh màn hình phẳng, tủ lạnh, ấm đun nước, vòi xịt/chậu rửa vệ sinh, đồ vệ sinh cá nhân miễn phí, tủ để quần áo và lò nướng. Các phòng có phòng tắm riêng với vòi sen cùng máy sấy tóc và tầm nhìn ra thành phố. \r\n</br></br>\r\nHoàng Yến Villa Dalat có sân hiên tắm nắng.\r\n</br></br>\r\nChỗ nghỉ nằm cách Vườn hoa Đà Lạt 2,8 km và Hồ Xuân Hương 4,5 km. Sân bay gần nhất là sân bay Liên Khương, nằm trong bán kính 31 km từ Hoàng Yến Villa Dalat.', 
    22, 1, '/hostay/public/images/1702108974_66878.jpg', 
    'Nguyễn Hữu Cảnh 20, Đà Lạt, Việt Nam', 
    'Hoàng Yến Villa Dalat', 1
  ), 
  (
    27, 4, 2, 2, 'Giường đôi nhỏ', 
    '1900000', 'Tọa lạc tại thành phố Đà Lạt, cách Quảng trường Lâm Viên 2,9 km, Green Meadow Hotel & Villa Dalat cung cấp chỗ nghỉ với khu vườn, chỗ đỗ xe riêng miễn phí, sảnh khách chung và quầy bar. Khách sạn 2 sao này có dịch vụ phòng, lễ tân 24 giờ và WiFi miễn phí. Một số phòng nghỉ tại đây có ban công nhìn ra núi.\r\n</br></br>\r\nMỗi phòng nghỉ tại khách sạn đều được trang bị bàn làm việc, TV màn hình phẳng, phòng tắm riêng, ga trải giường và khăn tắm. Trong phòng được bố trí ấm đun nước và tủ lạnh. Một số phòng có sân hiên trong khi các phòng khác nhìn ra thành phố. \r\n</br></br>\r\nGreen Meadow Hotel & Villa Dalat nằm cách Hồ Xuân Hương 3,1 km và Công viên Yersin 3,2 km. Sân bay gần nhất là sân bay Liên Khương, cách chỗ nghỉ 29 km.', 
    20, 1, '/hostay/public/images/1702109084_62438.jpg', 
    '20 Nguyen Viet Xuan, Ward 4, Đà Lạt, Việt Nam', 
    'Green Meadow Dalat Hotel - STAY24H CITYVIEW', 
    1
  ), 
  (
    28, 2, 1, 3, 'Giường đôi lớn', 
    '3100000', 'Coastal Panorama Oceanfront Suites is a beachfront aparthotel in Nha Trang, offering guests a sustainable accommodation with scenic sea views. Among the facilities of this property are a restaurant, a 24-hour front desk and a lift, along with free WiFi throughout the property. The rooftop pool features a pool bar and fence.\r\n</br></br>\r\nAccommodation is fitted with air conditioning, a fully equipped kitchenette with a dining area, a flat-screen TV and a private bathroom with walk-in shower, bathrobes and slippers. A microwave, a toaster and fridge are also available, as well as a kettle. At the aparthotel, every unit is equipped with bed linen and towels.\r\n</br></br>\r\nGuests are welcome to unwind in the in-house bar, while a minimarket is also available.\r\n</br></br>\r\nSightseeing tours are available around the property. The aparthotel has a sun terrace and an outdoor fireplace.\r\n</br></br>\r\nPopular points of interest near Coastal Panorama Oceanfront Suites include Nha Trang Beach, Tram Huong Tower and Nha Trang Centre Shopping Mall. The nearest airport is Cam Ranh International, 35 km from the accommodation, and the property offers a paid airport shuttle service.', 
    42, 1, '/hostay/public/images/1702109246_26757.jpg', 
    '02 Nguyễn Thị Minh Khai 40, Nha Trang, Việt Nam', 
    'Coastal Panorama Oceanfront Suites', 
    2
  ), 
  (
    29, 2, 1, 4, 'Giường đôi lớn', 
    '2100000', 'Tọa lạc tại thành phố Nha Trang, cách Bãi biển Hòn Chồng 200 m, Putin Nha Trang Hotel cung cấp chỗ nghỉ với hồ bơi ngoài trời, chỗ đỗ xe riêng miễn phí, sảnh khách chung và sân hiên. Chỗ nghỉ này nằm trong bán kính khoảng 2,9 km từ Bãi biển Nha Trang, 3,5 km từ Bảo tàng Khánh Hòa và 3,5 km từ Trung tâm suối khoáng nóng Tháp Bà. Nơi đây có lễ tân 24 giờ, dịch vụ đưa đón sân bay, dịch vụ phòng và WiFi miễn phí.\r\n</br></br>\r\nTất cả phòng nghỉ tại khách sạn đều được bố trí máy điều hòa, khu vực ghế ngồi, TV truyền hình vệ tinh màn hình phẳng, két an toàn và phòng tắm riêng với vòi xịt/chậu rửa vệ sinh, đồ vệ sinh cá nhân miễn phí cùng máy sấy tóc. Các phòng được trang bị ấm đun nước. Một số phòng còn có ban công trong khi các phòng khác nhìn ra quang cảnh thành phố. Các phòng tại Putin Nha Trang Hotel đi kèm ga trải giường và khăn tắm.\r\n</br></br>\r\nNhà hàng tại chỗ nghỉ phục vụ ẩm thực châu Phi, Mỹ và Argentina. Du khách cũng có thể yêu cầu thực đơn chay, các món ăn không chứa sữa và halal (dành cho người theo đạo Hồi).\r\n</br></br>\r\nKhu vực này nổi tiếng với hoạt động đi xe đạp và du khách cũng có thể thuê xe đạp/xe hơi tại Putin Nha Trang Hotel.\r\n</br></br>\r\nKhách sạn nằm gần các địa danh nổi tiếng như Bãi tắm Ba Làng, Hòn Chồng và Tháp Bà Po Nagar. Sân bay gần nhất là sân bay quốc tế Cam Ranh, cách Putin Nha Trang Hotel 40 km.', 
    14, 2, '/hostay/public/images/1702109397_50878.jpg', 
    'Bãi Dương 6B, Nha Trang, Việt Nam', 
    'Putin Nha Trang Hotel', 2
  );
INSERT INTO `tblroomtype` (
  `roomtype_id`, `roomtype_name`, `roomtype_notes`
) 
VALUES 
  (
    1, 'Standard', 'Phòng ngủ thông thường'
  ), 
  (2, 'Superior', NULL), 
  (3, 'Deluxe', NULL), 
  (4, 'Suite', NULL), 
  (5, 'Villa', NULL);
INSERT INTO `tbluser` (
  `user_id`, `user_name`, `user_password`, 
  `user_fullname`, `user_email`, `user_phone`, 
  `user_permission`, `user_created_at`
) 
VALUES 
  (
    15, 'admin', '25d55ad283aa400af464c76d713c07ad', 
    'Admin', 'nguyenquanghuylt2002@gmail.com', 
    '0337212814', 5, '2023-11-20 00:00:00'
  ), 
  (
    16, 'admin2', '25d55ad283aa400af464c76d713c07ad', 
    'Admin 2', 'nguyenquanghuylt2002@gmail.com', 
    '0337212814', 5, '2023-12-01 00:00:00'
  ), 
  (
    17, 'hieuchuai1325', '9a7a749e0e1b103542daf838bced97b4', 
    'Nguyễn Minh Hiếu', 'mhieu01032005@gmail.com', 
    '', 1, '2023-12-01 00:00:00'
  ), 
  (
    18, 'huynq22', '600af65e7f95e2e38fc9e3a4121cfc24', 
    'Nguyễn Quang Huy', 'nguyenquanghuylt2002@gmail.com', 
    '0337212814', 1, '2023-11-20 00:00:00'
  ), 
  (
    19, 'thanhgk2317', '600af65e7f95e2e38fc9e3a4121cfc24', 
    'Khổng Thị Hoài Thanh', 'khongthihoaithanhlt2003@gmail.com', 
    '', 1, '2023-12-01 00:00:00'
  ), 
  (
    20, 'linhnhi23', '773142d662df9a962e605645a23a4654', 
    'Triệu Thị khánh Linh', 'linhnhi2243@gmail.com', 
    '', 1, '2023-12-01 00:00:00'
  ), 
  (
    22, 'antoni2', '35f916fafa44b4034f7fd1c40e7b9cf9', 
    'Antonio', 'busketantoni123@gmail.com', 
    '0653673143', 0, '2023-12-01 00:00:00'
  ), 
  (
    23, 'zenoomi', '600af65e7f95e2e38fc9e3a4121cfc24', 
    'Zenomi', 'kaiziruzenomi473@gmail.com', 
    '0834142684', 0, '2023-12-01 00:00:00'
  ), 
  (
    24, 'quyet2003', 'b90922a0944d7be8a90a6b9d1b35e575', 
    'Nguyễn Văn Khải', 'quyet358203@gmail.com', 
    '0283762387', 0, '2023-12-01 00:00:00'
  ), 
  (
    25, 'duongn1704', 'f24cef42b2ebf4c085d1b1640a81ca78', 
    'Nguyễn Thùy Dương', 'duongkha3002@gmail.com', 
    '0457323498', 0, '2023-12-01 00:00:00'
  ), 
  (
    26, 'manhduy137', 'acebfc1c108ba0f236deac18793d4daa', 
    'Nguyễn Duy Mạnh', 'nguyenmanhduy137@gmail.com', 
    NULL, 0, '2023-12-01 00:00:00'
  ), 
  (
    27, 'huongcao', '79729ff2972a24d4dce9a6750a68d649', 
    'Cao Thị Thanh Hường', 'caohuong12003@gmail.com', 
    '', 0, '2023-12-12 00:00:00'
  ), 
  (
    28, 'hungpham263', '5407cdb7621bf4688e069f627fc3a496', 
    'Phạm Thái Hưng', 'phamthaihung263@gmail.com', 
    NULL, 0, '2023-12-12 00:00:00'
  ), 
  (
    29, 'khanhduy283', '0e29896517333b3fbff0e790f071fb03', 
    'Nguyễn Duy Khánh', 'nguyenduykhanh122@gmail.com', 
    NULL, 0, '2023-12-13 00:00:00'
  ), 
  (
    30, 'huyvp22', '600af65e7f95e2e38fc9e3a4121cfc24', 
    'Nguyễn Quang Huy', 'nguyenquanghuylt2002@gmail.com', 
    NULL, 0, '2023-12-18 00:00:00'
  ), 
  (
    31, 'ittosuperstronger', '600af65e7f95e2e38fc9e3a4121cfc24', 
    'Arataki Itto', 'aratakiitto2394@gmail.com', 
    NULL, 0, '2023-12-20 00:00:00'
  ), 
  (
    32, 'thuyl23', '600af65e7f95e2e38fc9e3a4121cfc24', 
    'Lương Thị Ngọc Thúy', 'thuyngoc23@gmail.com', 
    '0834392837', 1, '2023-12-22 00:00:00'
  ), 
  (
    33, 'lamtrieu34', '25f9e794323b453885f5181f1b624d0b', 
    'Triệu Quang Lâm', 'trieuquanglam3452@gmail.com', 
    NULL, 0, '2023-12-22 00:00:00'
  ), 
  (
    34, 'nampham392', '7bd8bab2fb071637e260049a31511175', 
    'Phạm Hải Nam', 'phamhainam3049@gmail.com', 
    '0384739281', 0, '2023-12-23 00:00:00'
  ), 
  (
    35, 'phuongtr', '9be37bdebdb5c7d79fa12e8e1834d264', 
    'Trần Thị Thu Phương', 'tranthithuphuong2005@gmail.com', 
    '0383737293', 0, '2023-12-23 00:00:00'
  ), 
  (
    36, 'anhpham9383', 'ae02470a0e80a5769b9a6eecfef6f03d', 
    'Phạm Đức Anh', 'nhpham9383@gmail.com', 
    '0393829349', 0, '2023-12-23 00:00:00'
  ), 
  (
    37, 'nhuquynh39484', 'e061f8f0edb0f242ac1628856138f92a', 
    'Bùi Thị Như Quỳnh', 'nhuquynh39484@gmail.com', 
    '0839493821', 0, '2023-12-23 00:00:00'
  ), 
  (
    38, 'lynguyen293', '5711fe04da59f4cae04913f3a9272ff8', 
    'Nguyễn Thị Ly', 'lynguyen293@gmail.com', 
    '0383759389', 0, '2023-12-23 00:00:00'
  ), 
  (
    39, 'mikoyande3049', '73fa5950e433974309f70fc5ccd7473c', 
    'Yae Miko', 'yaendhsk500@gmail.com', 
    '0357394732', 0, '2023-12-23 00:00:00'
  ), 
  (
    40, 'khanhdy3048', '2df7b7c7fdce2b10744d8154a369608c', 
    'Nguyễn Duy Khánh', 'duykhanh238@gmail.com', 
    '0384739282', 0, '2023-12-23 00:00:00'
  ), 
  (
    41, 'vuvu3928', '790ba97f9c3893ca01a29cd8096bb428', 
    'Vũ Long Vũ', 'vuvu3928@gmail.com', 
    '0384729373', 0, '2023-12-23 00:00:00'
  ), 
  (
    42, 'cucthanh2937', 'b8ce8dc19e730151b58536ed90d3ec16', 
    'Dỗ Thị Thanh Cúc', 'cucthanh2937@gmail.com', 
    '0837927189', 0, '2023-12-23 00:00:00'
  ), 
  (
    43, 'anhanh3928', '374868225b552792e4f3983da3a1102d', 
    'Hoàng Anh', 'anhanh3928@gmail.com', 
    '0385739279', 0, '2023-12-23 00:00:00'
  ), 
  (
    44, 'hailongvuong2384', '29b5c9c70338e6e548d80f86998fa9a5', 
    'Trần Hải', 'tranhai39720@gmail.com', 
    '0384729732', 0, '2023-12-23 00:00:00'
  ), 
  (
    45, 'thienta4053', '7e409c889294a543ea1edf96190e05bf', 
    'Tạ Bá Thiện', 'tabathienlt20039@gmail.com', 
    '0384739274', 0, '2023-12-23 00:00:00'
  ), 
  (
    46, 'dangtran30293', '8429ea4e079f44663d2d62d09194aea5', 
    'Trần Minh Đăng', 'dangthan29372@gmail.com', 
    '', 0, '2023-12-23 00:00:00'
  );
INSERT INTO `tblbill` VALUES
(1,27,47,'2024-01-01 00:00:00','amet','ckerluke@example.org','1-135-847-2835x380','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,0,'Esse eaque dicta natus at sit.',0,0,0,'yfuh','14658365931','ugdp','nam'),
(2,25,29,'2024-01-01 00:00:00','est','kayli.lemke@example.net','04687711265','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,2,'Et consequatur ab recusandae cum repellat consequatur.',0,1,0,'kmma','26899282846','qeaz','soluta'),
(3,27,21,'2024-01-01 00:00:00','aut','hassan51@example.net','452.648.5321','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,1,'Et minima rerum ut.',0,0,0,'kfaw','29157058327','acyw','amet'),
(4,26,18,'2024-01-01 00:00:00','accusantium','uondricka@example.org','1-766-222-3006','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,1,'Laboriosam non voluptatem consequatur aut temporibus eligendi enim.',0,1,0,'vaip','17005024524','unfv','eum'),
(5,22,20,'2024-01-01 00:00:00','enim','njacobson@example.net','(105)543-6804x2492','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,2,'Necessitatibus ullam perferendis nihil est cupiditate voluptatum cum.',0,1,0,'bjxr','16865686007','jpsy','consequatur'),
(6,16,17,'2024-01-01 00:00:00','quis','boehm.dakota@example.net','09134773338','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,0,'Tenetur iste dolor in quasi et a.',0,0,0,'bmim','28274110277','hzsi','commodi'),
(7,18,39,'2024-01-01 00:00:00','quis','vanessa90@example.com','580.857.5594','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,2,'Exercitationem omnis quod nesciunt.',0,1,0,'edxa','21764403708','oplt','rem'),
(8,18,17,'2024-01-01 00:00:00','libero','nico.maggio@example.org','(267)815-7843x974','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Perspiciatis maiores quae architecto nulla et illo repellendus.',0,1,0,'saab','15318747375','jwzf','aut'),
(9,21,22,'2024-01-01 00:00:00','qui','rudy95@example.org','+01(0)5786542121','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,2,'Quo eos ut qui ut.',0,1,0,'bhsl','29460641769','lqti','quod'),
(10,26,51,'2024-01-01 00:00:00','delectus','dayana02@example.net','945.243.2516x14007','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,1,'Id animi laborum et.',0,0,0,'lcum','14888678756','xmyg','itaque'),
(11,27,36,'2024-01-01 00:00:00','iure','kuhic.lonzo@example.com','08507071463','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,2,'Molestiae tempore modi quasi atque dolor laboriosam quis enim.',0,0,0,'cntl','32863017901','nxsd','laborum'),
(12,27,29,'2024-01-01 00:00:00','quia','connelly.meda@example.org','+08(4)5209905382','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,2,'Nam quae aliquid omnis ipsa non impedit aliquam voluptatum.',0,1,0,'vvkv','27996972862','ookr','quae'),
(13,17,43,'2024-01-01 00:00:00','sed','demarco45@example.org','157-125-2880x39106','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Fugiat veniam omnis accusamus omnis sit omnis fuga voluptas.',0,1,0,'iuky','14380550139','bssk','explicabo'),
(14,23,49,'2024-01-01 00:00:00','accusantium','kcassin@example.org','04021418859','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,1,'Sed eligendi est voluptate asperiores dicta.',0,1,0,'suns','17381515225','fexk','et'),
(15,26,35,'2024-01-01 00:00:00','aut','sydnie.pouros@example.com','465-501-3911x5502','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,0,'Corrupti libero recusandae autem voluptatem blanditiis et impedit.',0,1,0,'zmls','33904746839','gkdb','accusamus'),
(16,28,20,'2024-01-01 00:00:00','consequatur','jleannon@example.com','1-893-447-8313x0925','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,0,'Reiciendis recusandae modi beatae ipsum officiis ut ut.',0,1,0,'chrk','33269059187','ykps','laudantium'),
(17,16,40,'2024-01-01 00:00:00','nihil','koby06@example.net','680.780.3027x69777','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Aut consequuntur amet dolorem dolorem.',0,1,0,'rjqz','29537836321','yfdh','eos'),
(18,25,26,'2024-01-01 00:00:00','ut','waino.kemmer@example.net','(415)515-6764x0216','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Ex maxime exercitationem commodi.',0,0,0,'hbfe','32445177672','arzw','quidem'),
(19,17,37,'2024-01-01 00:00:00','aperiam','mjohnson@example.org','05760242482','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,0,'Sit labore sit enim optio.',0,0,0,'ntnf','30525196558','mevz','architecto'),
(20,29,39,'2024-01-01 00:00:00','qui','vpurdy@example.org','616.416.6613x3715','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,0,'Totam aliquam qui fugiat rerum distinctio nostrum.',0,0,0,'bgck','20268767506','etnl','natus'),
(21,22,29,'2024-01-01 00:00:00','quisquam','osinski.deangelo@example.net','723.166.6590x306','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,2,'Omnis explicabo aperiam sint officiis voluptatem.',0,1,0,'txtn','17313872722','uamb','eos'),
(22,23,34,'2024-01-01 00:00:00','sit','brooklyn.konopelski@example.org','425-462-1133','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,2,'Odit et et ab omnis consequuntur hic voluptatem perspiciatis.',0,1,0,'jihg','27097648989','pnwt','quibusdam'),
(23,27,37,'2024-01-01 00:00:00','blanditiis','schimmel.mertie@example.com','09024171354','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,0,'Autem vel ullam sit.',0,1,0,'ubwu','31213807335','pslk','eveniet'),
(24,28,31,'2024-01-01 00:00:00','minima','glover.tyrique@example.net','04315521681','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,0,'Est et eligendi repellendus.',0,1,0,'xvxl','16797043756','ajgd','sint'),
(25,18,33,'2024-01-01 00:00:00','dicta','estelle55@example.net','304.673.1204','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,0,'Distinctio iusto aut excepturi voluptatem.',0,1,0,'khap','31323728918','flli','est'),
(26,17,47,'2024-01-01 00:00:00','et','mike.hyatt@example.org','946.394.8936x23496','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,1,'Eveniet aspernatur ratione maiores blanditiis ab natus consectetur.',0,0,0,'zsxt','33032215701','khsn','occaecati'),
(27,24,33,'2024-01-01 00:00:00','ea','berge.jerald@example.org','978-973-4611x00089','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,0,'Sequi ut excepturi quia illo.',0,1,0,'qxqc','26006040654','qpdv','asperiores'),
(28,23,15,'2024-01-01 00:00:00','sint','jazlyn.ebert@example.net','1-606-557-1889','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,1,'Nisi sit odit ut vel.',0,1,0,'oczv','33836461592','zeeg','quo'),
(29,21,49,'2024-01-01 00:00:00','asperiores','georgiana.crona@example.com','139.094.8795x627','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,2,'Reiciendis perferendis perferendis placeat eos.',0,0,0,'hfhk','32929902450','bijm','tenetur'),
(30,28,47,'2024-01-01 00:00:00','blanditiis','orn.fae@example.net','067-125-2550','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,1,'Magnam deserunt molestiae perferendis doloribus.',0,0,0,'aiox','13386746837','kwyy','fugiat'),
(31,27,15,'2024-01-01 00:00:00','quo','jacquelyn.schiller@example.net','531-497-6000x3372','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Provident quasi delectus consequuntur.',0,1,0,'sybk','17071149268','cbga','laborum'),
(32,16,43,'2024-01-01 00:00:00','tenetur','monahan.ova@example.com','1-228-316-6353','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,2,'Suscipit fugit tempore modi nihil assumenda laudantium.',0,1,0,'ptnk','18656113321','ofko','molestiae'),
(33,16,45,'2024-01-01 00:00:00','facilis','elouise90@example.org','1-265-565-4867x373','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,0,'Laborum asperiores maxime dolor aliquam impedit.',0,0,0,'rnvw','25438002742','yrvt','incidunt'),
(34,17,25,'2024-01-01 00:00:00','eos','aletha.mayert@example.net','(907)882-5022','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,0,'Quia quasi sed blanditiis sit.',0,1,0,'xsiz','18867495792','gzcu','voluptatibus'),
(35,24,44,'2024-01-01 00:00:00','voluptatem','ereynolds@example.net','1-431-206-9157x824','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,2,'Voluptatem sunt libero vero et nesciunt.',0,1,0,'rlxw','24974463912','nxtk','beatae'),
(36,19,38,'2024-01-01 00:00:00','laboriosam','mya60@example.org','1-079-500-1104x34292','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,2,'Vel quis facilis qui omnis et aperiam alias.',0,1,0,'gjhk','23394541218','nvve','enim'),
(37,20,30,'2024-01-01 00:00:00','est','olson.jaycee@example.com','1-144-545-6443','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,1,'Illum suscipit vero veritatis.',0,1,0,'ekjr','12637437962','glmp','laudantium'),
(38,19,46,'2024-01-01 00:00:00','facilis','aerdman@example.com','263-273-2903x680','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,1,'Neque sunt qui ea deserunt architecto minus porro.',0,0,0,'nrtm','24385982731','fbof','dolore'),
(39,22,38,'2024-01-01 00:00:00','dolore','antonio.rohan@example.net','(750)625-2891','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Quas sed porro ut quis qui sint.',0,1,0,'iqzy','21999254382','dswt','corporis'),
(40,24,44,'2024-01-01 00:00:00','odit','kuvalis.ardella@example.net','334.552.2386x7787','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,1,'Illum perspiciatis deleniti rerum voluptatem debitis.',0,1,0,'yeqk','32499671802','uouk','quo'),
(41,20,41,'2024-01-01 00:00:00','repellat','heichmann@example.com','758-174-2675x5203','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,2,'Voluptatum nobis magni sit et necessitatibus provident excepturi delectus.',0,0,0,'cxyy','19233049547','hnlf','non'),
(42,27,51,'2024-01-01 00:00:00','est','veda96@example.org','299.319.9028x93283','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,2,'Exercitationem dolore esse reiciendis adipisci vero.',0,1,0,'tlgx','20749525304','eexa','eaque'),
(43,17,21,'2024-01-01 00:00:00','enim','watsica.dayna@example.net','093.444.6164','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,2,'Nisi odit aut expedita saepe.',0,1,0,'iljm','33124149529','iosh','animi'),
(44,22,17,'2024-01-01 00:00:00','non','gkilback@example.com','219-492-5417','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Consequatur corporis non quaerat autem.',0,1,0,'yeoe','21634920941','ewks','voluptatem'),
(45,19,43,'2024-01-01 00:00:00','tempora','tamara45@example.net','862.428.2681x88946','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,2,'Vel incidunt ducimus saepe.',0,0,0,'ipmm','12890369531','nako','sit'),
(46,26,26,'2024-01-01 00:00:00','dolores','squitzon@example.net','(894)171-2994','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,0,'Libero sunt nisi esse fugit cumque modi.',0,0,0,'pkzq','21465088049','vtsm','quae'),
(47,18,30,'2024-01-01 00:00:00','veritatis','janelle47@example.net','(393)055-8478x45693','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,2,'Similique et at aut est.',0,1,0,'fmhq','21022151244','gfwm','reiciendis'),
(48,17,43,'2024-01-01 00:00:00','sunt','whermann@example.net','(820)865-1898','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,0,'Porro vitae ipsum cumque enim.',0,0,0,'igmy','20137278650','iacs','nemo'),
(49,16,45,'2024-01-01 00:00:00','quia','carter.scarlett@example.org','+95(7)7596457486','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,2,'Vel est esse id et voluptatibus cum consequatur.',0,1,0,'hfyc','25524151227','htxm','amet'),
(50,21,39,'2024-01-01 00:00:00','dolor','ansley76@example.com','728-821-4852x67401','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,0,'Hic quibusdam doloribus iste alias voluptatem.',0,0,0,'icae','22372369488','cjex','pariatur'),
(51,25,19,'2024-01-01 00:00:00','explicabo','thompson.lou@example.com','1-509-440-2122x9382','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,1,'Aspernatur non debitis dolor omnis explicabo autem.',0,1,0,'oaki','16332132727','dbln','voluptatem'),
(52,24,38,'2024-01-01 00:00:00','minima','ywitting@example.org','371.681.4381x6425','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,0,'Consectetur dolorum iusto id quibusdam non dolorem.',0,0,0,'bhrw','15233112276','gihd','explicabo'),
(53,28,28,'2024-01-01 00:00:00','nostrum','zwalsh@example.net','(086)232-5632x726','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,1,'Numquam architecto repellendus magni sed sit sit.',0,0,0,'qopj','24906110497','hzun','odio'),
(54,17,30,'2024-01-01 00:00:00','et','odonnelly@example.org','850-606-5058','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,0,'Eveniet non quidem et et et rerum et.',0,0,0,'zdyf','16585896080','bjzo','officia'),
(55,18,49,'2024-01-01 00:00:00','sit','shad24@example.com','1-880-577-4249','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,2,'Et sequi accusantium voluptatibus sapiente.',0,0,0,'ysqt','13511134564','ipnd','velit'),
(56,28,18,'2024-01-01 00:00:00','incidunt','murphy.elfrieda@example.com','+63(7)3089082056','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,2,'Ut ab consequatur molestiae molestiae impedit.',0,1,0,'tgob','15953757059','tpbx','ratione'),
(57,29,47,'2024-01-01 00:00:00','amet','adonnelly@example.net','943-014-5975x1390','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,2,'Cumque possimus blanditiis qui ratione.',0,1,0,'imhr','27409478410','wwcx','accusantium'),
(58,28,45,'2024-01-01 00:00:00','modi','danielle.aufderhar@example.org','094.853.5701x5787','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,1,'Porro mollitia repudiandae qui.',0,0,0,'uxrq','12343741771','avbt','aut'),
(59,20,51,'2024-01-01 00:00:00','eaque','tamia.beer@example.net','1-045-495-5496','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Molestias maxime consequatur beatae tempora.',0,0,0,'exqx','29036209908','kgnd','quaerat'),
(60,23,48,'2024-01-01 00:00:00','doloremque','mcglynn.rudy@example.net','125.998.7835x45695','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,1,'Quia iste nihil hic sint quis.',0,0,0,'ggxy','16897577776','ooqw','cupiditate'),
(61,28,34,'2024-01-01 00:00:00','tempore','peter56@example.org','09978125892','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,1,'Quibusdam praesentium corrupti eum et iste.',0,0,0,'jkha','23249523137','aaxm','ipsum'),
(62,16,46,'2024-01-01 00:00:00','fuga','olson.markus@example.org','269.549.7122x50049','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,0,'Nihil cumque non qui sequi occaecati cum doloremque et.',0,0,0,'wevc','24258841565','yyvs','nemo'),
(63,26,15,'2024-01-01 00:00:00','voluptas','braulio54@example.org','1-396-200-1047','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,2,'Iste rerum voluptatem debitis eius.',0,1,0,'ixuj','16190916582','uivk','commodi'),
(64,16,48,'2024-01-01 00:00:00','a','laura06@example.net','+66(5)6332090882','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Ea et ex dolor vitae reiciendis.',0,1,0,'epae','19655666429','wfjv','et'),
(65,25,41,'2024-01-01 00:00:00','qui','morissette.jaida@example.org','813-444-4270x6658','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Voluptatem reiciendis doloremque architecto velit.',0,1,0,'udai','28367247233','dbic','itaque'),
(66,22,33,'2024-01-01 00:00:00','et','lisandro.mohr@example.net','+42(3)1453369250','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Corrupti tempora tempora ipsa rerum delectus ad.',0,1,0,'ktrh','26072323231','hwjj','aut'),
(67,26,18,'2024-01-01 00:00:00','aspernatur','mathew78@example.org','(415)459-5721x7731','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,2,'Provident qui explicabo quisquam sunt minima rerum.',0,1,0,'pusj','20382075882','qeno','nisi'),
(68,24,20,'2024-01-01 00:00:00','eum','maida41@example.net','388-239-8700','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,2,'Quis qui ut est porro.',0,1,0,'krhn','20308710737','iwgv','fugit'),
(69,24,47,'2024-01-01 00:00:00','qui','wgreenholt@example.com','1-764-978-6566x10292','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,1,'Ea soluta nihil ut accusantium vero.',0,0,0,'nplu','28289784236','ktdf','numquam'),
(70,29,40,'2024-01-01 00:00:00','consequuntur','dbarton@example.org','(101)209-3334x74506','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Autem maiores mollitia enim qui dolor sunt.',0,1,0,'bfla','32049544801','siwi','enim'),
(71,29,29,'2024-01-01 00:00:00','odio','qmckenzie@example.org','+01(2)4886931973','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,0,'In repellendus consequatur repellendus ut.',0,1,0,'ypmw','32685016754','ouzf','recusandae'),
(72,22,45,'2024-01-01 00:00:00','dolorem','glakin@example.net','(310)429-9775','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,1,'Porro accusantium veniam voluptate voluptas ex provident atque reprehenderit.',0,0,0,'lbzs','12827821868','iuoa','quaerat'),
(73,17,42,'2024-01-01 00:00:00','est','qtillman@example.org','02195969979','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,2,'Iste et incidunt quaerat sunt.',0,1,0,'oebm','25273398616','tbsl','laborum'),
(74,16,19,'2024-01-01 00:00:00','ea','aveum@example.net','1-526-456-1423x39387','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,2,'Porro beatae facilis eos sapiente soluta ipsa.',0,0,0,'tjcd','27033526361','vscz','repellendus'),
(75,26,31,'2024-01-01 00:00:00','laborum','elissa.lueilwitz@example.net','476-261-6944x86810','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,0,'Accusantium voluptas quod quia accusantium architecto.',0,1,0,'pqcp','13789772375','suoq','distinctio'),
(76,18,27,'2024-01-01 00:00:00','et','daugherty.armand@example.net','(503)062-3627','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Iusto earum eaque tenetur unde incidunt cumque.',0,0,0,'jdpp','34662758216','huxp','officia'),
(77,26,33,'2024-01-01 00:00:00','reprehenderit','moen.al@example.org','(999)501-9281','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,0,'Voluptatem non atque aspernatur.',0,0,0,'gdpl','14412772510','qeju','magni'),
(78,25,41,'2024-01-01 00:00:00','impedit','gkautzer@example.com','242-842-0336','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,0,'Nihil explicabo dolores consectetur tenetur laborum totam.',0,1,0,'cpjq','30434962084','jiai','explicabo'),
(79,21,46,'2024-01-01 00:00:00','omnis','dschmidt@example.com','403-957-3384','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,1,'Enim ipsum accusantium excepturi inventore.',0,0,0,'fjrx','29099427026','hdbo','consequatur'),
(80,18,49,'2024-01-01 00:00:00','ipsum','xvolkman@example.net','(975)427-4392','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,1,'Et facere ut molestiae.',0,0,0,'zkrk','25977476169','zcza','molestiae'),
(81,17,23,'2024-01-01 00:00:00','quia','hodkiewicz.ryann@example.org','113-402-5533x42479','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,1,'Recusandae praesentium unde minima error et quia.',0,0,0,'nlaq','17504470521','lhgq','vel'),
(82,28,38,'2024-01-01 00:00:00','qui','reagan.d\'amore@example.org','298.835.7032','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,1,'Excepturi officiis dolorum deleniti ipsum.',0,0,0,'ginq','18975268515','ddey','enim'),
(83,18,32,'2024-01-01 00:00:00','non','izaiah.labadie@example.com','1-884-860-0416','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,0,'Nostrum dolorem nisi amet sed.',0,1,0,'sfym','17783995646','fycz','hic'),
(84,20,27,'2024-01-01 00:00:00','quis','ruben39@example.net','1-318-961-9527','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,2,'Saepe vitae modi qui minima sit dolore illo nemo.',0,0,0,'kjae','21286753136','oyfp','aliquam'),
(85,22,34,'2024-01-01 00:00:00','consequatur','abraham70@example.org','867-794-7370','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,0,'Voluptas facilis assumenda quibusdam et labore nesciunt magni.',0,1,0,'ujau','27799572638','fvav','error'),
(86,22,15,'2024-01-01 00:00:00','ea','kuhlman.meredith@example.net','1-575-547-3723x0833','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,2,'Non possimus et ea facere incidunt.',0,1,0,'nkyq','13557314313','nvdc','earum'),
(87,16,26,'2024-01-01 00:00:00','quas','stracke.margot@example.org','04876679328','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,1,'Accusantium provident distinctio sapiente dicta aut iure.',0,1,0,'zxds','16380215976','yuig','aut'),
(88,28,32,'2024-01-01 00:00:00','in','dharvey@example.org','206.882.2261x9075','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,2,'Minus ab illum sapiente officia quis necessitatibus.',0,1,0,'xojs','33075841722','prur','fugit'),
(89,28,26,'2024-01-01 00:00:00','amet','johnathan58@example.org','781.456.1121','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,2,'Placeat sed similique sapiente reiciendis asperiores quidem.',0,0,0,'slcd','30926924321','sbmj','atque'),
(90,28,20,'2024-01-01 00:00:00','ex','rrolfson@example.org','08126218113','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,0,'Et sed similique voluptas aliquid.',0,0,0,'zbmo','31134126733','ujmb','fugiat'),
(91,19,20,'2024-01-01 00:00:00','doloribus','dayton.buckridge@example.org','312.855.5024x2462','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,2,'Architecto consectetur tenetur amet ut.',0,1,0,'czdd','14308660654','ynxp','et'),
(92,18,23,'2024-01-01 00:00:00','repudiandae','pluettgen@example.org','(152)071-3531x464','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,0,'Eaque voluptatem est iste.',0,1,0,'rxpr','33433587965','yoyo','sit'),
(93,16,17,'2024-01-01 00:00:00','dolor','greenfelder.retha@example.net','+02(2)4871084942','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,2,'In ut harum est nulla.',0,0,0,'mrod','26424764376','furu','animi'),
(94,27,51,'2024-01-01 00:00:00','saepe','ali.schultz@example.net','780.585.2297x1880','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,0,'Nihil quasi quam et quos.',0,1,0,'vhmu','30113763858','oyym','saepe'),
(95,17,21,'2024-01-01 00:00:00','eum','elva.bartoletti@example.org','1-654-258-8794x96898','2024-01-01 00:00:00','2024-01-04 00:00:00',2,2,2,'Ex veritatis unde accusamus omnis corporis.',0,0,0,'fmge','31898037994','wpkz','assumenda'),
(96,24,25,'2024-01-01 00:00:00','blanditiis','gleason.connor@example.org','08445293011','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,2,'Quia et sit consectetur.',0,1,0,'aqqh','22950029361','buli','magnam'),
(97,22,39,'2024-01-01 00:00:00','molestiae','wwilkinson@example.org','1-419-898-9394x3506','2024-01-01 00:00:00','2024-01-04 00:00:00',1,1,2,'Corporis architecto et excepturi perferendis dolores.',0,0,0,'iaet','31093038377','vbrw','placeat'),
(98,18,39,'2024-01-01 00:00:00','quidem','bins.sophie@example.com','849-726-6950x47416','2024-01-01 00:00:00','2024-01-04 00:00:00',1,2,0,'Omnis neque iusto a.',0,1,0,'qljs','25656645964','robx','sed'),
(99,21,37,'2024-01-01 00:00:00','maxime','gutkowski.madie@example.com','1-567-446-7085x921','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,1,'Minima quis alias officiis doloremque fugit aut voluptas.',0,0,0,'jnqe','12851761915','gvbx','delectus'),
(100,21,26,'2024-01-01 00:00:00','labore','kris.samir@example.com','802-652-9251','2024-01-01 00:00:00','2024-01-04 00:00:00',2,1,2,'Eos illum est numquam illum.',0,1,0,'qrwu','19733468075','lxjn','et');

INSERT INTO `tblbill` VALUES
(101,23,42,'2024-02-01 00:00:00','iure','clementina95@example.com','397.090.6191x87721','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,2,'Qui id sequi nisi quis omnis.',0,1,0,'hvet','24398561905','npar','maiores'),
(102,20,43,'2024-02-01 00:00:00','consectetur','umarks@example.com','1-324-224-8713','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,2,'Excepturi ipsam exercitationem culpa cumque qui.',0,1,0,'oszj','14788200093','bxae','nemo'),
(103,28,36,'2024-02-01 00:00:00','eos','arturo.schultz@example.org','00942936625','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,2,'Ea suscipit quas aut omnis ut qui.',0,1,0,'iqgz','34834483832','qgfl','voluptates'),
(104,27,36,'2024-02-01 00:00:00','iure','garland.tillman@example.net','1-739-466-2389','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,1,'Delectus laudantium aut saepe voluptas voluptate enim doloribus odio.',0,1,0,'xyob','33146015531','uzzu','rerum'),
(105,18,23,'2024-02-01 00:00:00','nemo','bolson@example.com','475.933.2298x2534','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Molestiae accusamus consequatur perspiciatis ipsam.',0,1,0,'wufg','27981370186','sppv','voluptas'),
(106,22,44,'2024-02-01 00:00:00','quo','piper52@example.org','(219)283-1573x6174','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,1,'Nihil aut veritatis incidunt nulla et et voluptatem.',0,1,0,'drnp','19496420944','oucq','qui'),
(107,16,28,'2024-02-01 00:00:00','deserunt','lavinia.runolfsson@example.com','(461)293-4624x9700','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,1,'Accusamus quam et culpa ratione aut.',0,1,0,'yygp','28740679350','zfxv','est'),
(108,18,45,'2024-02-01 00:00:00','et','eliseo40@example.org','771.028.3174x9964','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Soluta omnis dolores asperiores sit molestiae voluptatibus saepe.',0,1,0,'isck','31360086928','uovd','occaecati'),
(109,26,38,'2024-02-01 00:00:00','voluptatibus','duncan97@example.com','167.059.8460x5009','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,0,'Autem et rem consectetur maxime.',0,1,0,'wsqe','29110761420','vdcb','recusandae'),
(110,21,47,'2024-02-01 00:00:00','esse','justen39@example.net','558-660-4841','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,1,'Et aut error rerum itaque officia id.',0,1,0,'plly','17353659334','gvin','laborum'),
(111,27,15,'2024-02-01 00:00:00','maxime','alfreda98@example.net','1-178-696-4235x733','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,0,'Dicta fugit aut id consequatur expedita incidunt et.',0,1,0,'futj','17339632634','wxyz','optio'),
(112,24,34,'2024-02-01 00:00:00','laboriosam','sstamm@example.net','(412)829-7040','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,2,'Nesciunt aut natus maxime quia ex.',0,1,0,'tvvw','21034047527','qzyg','repudiandae'),
(113,19,32,'2024-02-01 00:00:00','quis','go\'hara@example.org','(870)335-2719','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,1,'Illum officia exercitationem sed sit repellendus rerum quo.',0,1,0,'dgkg','21710383664','zohg','delectus'),
(114,26,16,'2024-02-01 00:00:00','eveniet','dudley.brown@example.com','851-395-0689x20124','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Delectus perspiciatis aut dolorem voluptatem.',0,1,0,'rmcf','16111733237','fokk','aut'),
(115,18,38,'2024-02-01 00:00:00','ipsa','xraynor@example.net','037.797.1688x15726','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,2,'Qui non dolor eligendi est.',0,1,0,'rmst','27530481448','bmop','nemo'),
(116,20,41,'2024-02-01 00:00:00','sed','fritsch.wilson@example.com','491-608-3548','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,1,'Et laboriosam nostrum facere quis nobis delectus.',0,1,0,'qjat','13230779047','vcjd','et'),
(117,17,48,'2024-02-01 00:00:00','consectetur','zkunde@example.com','(737)837-3669','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Id magni doloribus voluptas.',0,1,0,'ecsp','29956394917','zstc','repudiandae'),
(118,17,19,'2024-02-01 00:00:00','ut','nwuckert@example.org','1-616-103-7741x6806','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,1,'Est et esse cupiditate.',0,1,0,'gjyq','20583470243','sxpm','nisi'),
(119,17,38,'2024-02-01 00:00:00','natus','mustafa64@example.org','136.463.0172','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Maxime soluta velit omnis ut.',0,1,0,'ttvu','16127337495','sruv','magnam'),
(120,23,48,'2024-02-01 00:00:00','facilis','schimmel.mabelle@example.org','271-736-9106x0264','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Ut voluptates numquam quae rerum consequatur.',0,1,0,'pfvi','15218892462','mfge','minima'),
(121,29,51,'2024-02-01 00:00:00','tempora','alfred.kuphal@example.net','462.390.3185x80205','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,0,'Dicta ea sunt illo.',0,1,0,'fbgl','30718823838','wdkh','quis'),
(122,28,38,'2024-02-01 00:00:00','et','pabbott@example.net','(032)166-2043x1011','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,1,'Blanditiis rerum sequi aut tenetur quaerat.',0,1,0,'jwar','21217114681','zepa','et'),
(123,22,18,'2024-02-01 00:00:00','sit','maida55@example.org','779-820-6389x53719','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,1,'Reiciendis error dolores dolor natus voluptatem quo suscipit.',0,1,0,'vdyu','22640589423','zxih','quia'),
(124,21,49,'2024-02-01 00:00:00','aut','oberbrunner.mckenzie@example.net','(540)867-6945','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,1,'Et sed nostrum dolore enim reiciendis vero.',0,1,0,'sqbw','22622727538','ccuo','enim'),
(125,24,18,'2024-02-01 00:00:00','in','lacey25@example.net','798-611-2877x2205','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,2,'Atque ratione esse expedita culpa asperiores illum excepturi.',0,1,0,'bhhq','16739665195','stxv','rerum'),
(126,19,43,'2024-02-01 00:00:00','deserunt','lewis.boyer@example.net','(102)987-1536x09610','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,0,'Facilis nemo est quia odio voluptatem cupiditate.',0,1,0,'vpjt','24343102756','nxxc','velit'),
(127,25,34,'2024-02-01 00:00:00','quo','lyda.kautzer@example.org','1-345-545-3123x1599','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Culpa illo et repellat rerum.',0,1,0,'fnsu','21171440762','gxsg','dolorum'),
(128,21,43,'2024-02-01 00:00:00','officiis','eve.huel@example.net','1-044-663-9822','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,1,'Sint aliquid quidem quis consequatur.',0,1,0,'pcke','26172586567','sdfp','et'),
(129,19,38,'2024-02-01 00:00:00','beatae','leonel.hansen@example.net','+21(5)2900647680','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,0,'Cupiditate et ipsam commodi minus repellat tempore.',0,1,0,'ajzg','20344264271','ccwg','distinctio'),
(130,21,31,'2024-02-01 00:00:00','fugit','estokes@example.org','1-802-107-6635x376','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,0,'Est quis dolor quis necessitatibus ut deleniti.',0,1,0,'jgdh','18111576164','wndw','molestiae'),
(131,20,29,'2024-02-01 00:00:00','ut','ubeatty@example.com','1-707-279-9668x4705','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,1,'Quas a iusto aspernatur eum.',0,1,0,'hwfj','22999756408','vcrt','id'),
(132,29,26,'2024-02-01 00:00:00','id','fstrosin@example.org','944-352-9142','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,2,'Voluptas natus est omnis qui accusantium mollitia.',0,1,0,'gvik','33054086646','fptf','repellat'),
(133,27,33,'2024-02-01 00:00:00','cum','savion.blanda@example.org','945.694.8722x89104','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,2,'Est ab sapiente qui voluptates.',0,1,0,'sgsj','13478941329','drgw','alias'),
(134,23,50,'2024-02-01 00:00:00','suscipit','maiya20@example.net','(909)041-1411x23744','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Animi pariatur dolor veritatis facilis odio.',0,1,0,'bhkd','13198328427','pknx','officiis'),
(135,23,16,'2024-02-01 00:00:00','mollitia','jeremie25@example.net','1-072-379-9121x7588','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Neque enim nostrum recusandae ut commodi voluptatem occaecati.',0,1,0,'ntpa','33248819943','sjkz','corporis'),
(136,16,33,'2024-02-01 00:00:00','nihil','pkautzer@example.org','698.182.0791x131','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Sapiente explicabo eius vel vero odio culpa quod non.',0,1,0,'taxa','21087119877','rnoh','et'),
(137,18,45,'2024-02-01 00:00:00','veniam','dexter.williamson@example.org','1-185-954-6894','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Ratione unde eligendi officiis impedit consequatur adipisci distinctio.',0,1,0,'oewq','25063559950','zgyu','ex'),
(138,17,21,'2024-02-01 00:00:00','qui','arden65@example.net','(798)422-0683','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Ut illum et aut odit consequatur.',0,1,0,'lcka','26123369192','ukcj','rem'),
(139,24,40,'2024-02-01 00:00:00','necessitatibus','chasity.parisian@example.org','937.518.1081','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,1,'Veritatis ea et sed ipsa soluta aspernatur.',0,1,0,'bmit','30754312253','utxt','expedita'),
(140,28,21,'2024-02-01 00:00:00','officia','noemy02@example.com','230-703-4016x275','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,0,'Sit quia modi tempore harum eos ullam.',0,1,0,'ngky','34696246310','dppo','mollitia'),
(141,21,16,'2024-02-01 00:00:00','alias','sydni31@example.org','653.323.6236x75853','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,0,'Est ducimus similique ea.',0,1,0,'vbyj','26835022694','rrdu','enim'),
(142,27,23,'2024-02-01 00:00:00','cumque','alvera.grant@example.net','125-157-9456x5586','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,0,'Quaerat quo aperiam illum distinctio occaecati ducimus tenetur.',0,1,0,'aejf','27207096080','kgfk','itaque'),
(143,29,15,'2024-02-01 00:00:00','ipsam','kirlin.justice@example.com','192-505-1686','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Harum dolores vel ratione quis aut.',0,1,0,'euwb','19892334436','sveg','voluptas'),
(144,20,28,'2024-02-01 00:00:00','blanditiis','nina.ernser@example.net','1-388-971-5667','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,1,'Culpa ea animi quia tempora molestias minus.',0,1,0,'kgmb','32797034012','vhcp','et'),
(145,29,27,'2024-02-01 00:00:00','autem','roberts.mathilde@example.net','(417)594-8610','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,0,'Perferendis excepturi unde et et eum.',0,1,0,'ybbt','18496282045','obsg','velit'),
(146,20,21,'2024-02-01 00:00:00','ut','blick.bradford@example.net','861-416-4087','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,2,'Deleniti culpa delectus nulla inventore nisi.',0,1,0,'glzc','21081699892','kdfr','expedita'),
(147,20,25,'2024-02-01 00:00:00','ipsum','casper.pearl@example.org','07289853639','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Dolores sit rerum sed quia repudiandae et quidem quia.',0,1,0,'bxsr','25459951749','bmee','non'),
(148,27,30,'2024-02-01 00:00:00','dolorem','sanford.willms@example.net','(772)923-3752x0782','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,1,'Possimus maxime doloremque suscipit laborum qui maiores.',0,1,0,'chmi','20925269271','azsh','fugit'),
(149,19,48,'2024-02-01 00:00:00','id','predovic.katelynn@example.org','702.223.3962x3280','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Optio recusandae vitae quod iste nihil.',0,1,0,'vhyd','20274758524','mrjj','aut'),
(150,23,40,'2024-02-01 00:00:00','aliquid','tharris@example.org','(971)461-7668x9913','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Et rerum qui quaerat quasi modi.',0,1,0,'wsoz','34214975527','wdgl','rerum'),
(151,18,24,'2024-02-01 00:00:00','enim','carter.ralph@example.org','870.744.4141x510','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,0,'Amet distinctio est tenetur quia dignissimos atque nihil.',0,1,0,'kfkc','25588469148','judv','magni'),
(152,17,32,'2024-02-01 00:00:00','expedita','haag.maryam@example.net','1-830-869-2716x39000','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,2,'Non perspiciatis nihil est.',0,1,0,'idkd','20189386334','zmxz','quia'),
(153,25,31,'2024-02-01 00:00:00','optio','jvon@example.net','1-955-624-1085x584','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Ratione qui minima consequuntur voluptate sequi nisi.',0,1,0,'bkfx','30578888762','dept','et'),
(154,20,46,'2024-02-01 00:00:00','accusantium','htorp@example.org','400-698-1784x44211','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,1,'Iure sapiente pariatur adipisci error.',0,1,0,'wqtu','19842243580','wrcm','quo'),
(155,22,50,'2024-02-01 00:00:00','et','michel10@example.com','1-852-439-6906x6337','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,0,'Tempore ullam officiis possimus dolores et.',0,1,0,'wgoo','27800513653','ella','hic'),
(156,27,23,'2024-02-01 00:00:00','assumenda','dedrick31@example.org','245.231.7342','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,0,'Aut et iusto et quibusdam est.',0,1,0,'gqat','29101769833','qiro','quia'),
(157,18,23,'2024-02-01 00:00:00','dolor','mmraz@example.com','678-842-3205x81407','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Animi cum maiores autem non nisi non laboriosam voluptas.',0,1,0,'hltu','16276421892','jtos','sed'),
(158,19,31,'2024-02-01 00:00:00','sequi','lindsey77@example.com','458.731.6123x6775','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Ut ut ut earum ipsum sed excepturi.',0,1,0,'vdtd','19776310018','fldg','aut'),
(159,19,30,'2024-02-01 00:00:00','magnam','zola.lueilwitz@example.com','961-353-5998','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Culpa tenetur amet eligendi ex ut.',0,1,0,'dqer','20958812213','wnsd','maxime'),
(160,28,26,'2024-02-01 00:00:00','et','kaden.olson@example.org','04076315258','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Et numquam quo aliquid beatae qui.',0,1,0,'kfkz','32519302334','suhs','itaque'),
(161,18,24,'2024-02-01 00:00:00','qui','anahi74@example.net','(284)371-9627x551','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,1,'Autem itaque officiis aliquam nulla.',0,1,0,'gdre','20900489646','atdt','dolor'),
(162,17,39,'2024-02-01 00:00:00','vero','uskiles@example.net','(950)543-5550x0813','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Ex eaque praesentium repellat veniam placeat eum.',0,1,0,'wxqq','15066896114','siur','ea'),
(163,22,40,'2024-02-01 00:00:00','magni','tyra75@example.net','(980)915-7640x13747','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,0,'Eos soluta nulla est.',0,1,0,'tckm','20452645334','gbpg','repellat'),
(164,21,28,'2024-02-01 00:00:00','qui','cschamberger@example.org','1-513-771-8998x44674','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,2,'Vitae quo sed consequatur distinctio ipsum et ut in.',0,1,0,'khxq','33087395928','dvgq','blanditiis'),
(165,17,34,'2024-02-01 00:00:00','dolorem','bailey.cali@example.net','+11(1)0463270995','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,0,'Sit quia facere rem enim quis placeat quo.',0,1,0,'lcon','21579811420','mczz','dolorum'),
(166,20,48,'2024-02-01 00:00:00','officiis','alta20@example.net','870.874.3691x3400','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,1,'Harum sint aliquid id.',0,1,0,'fkqo','24391795368','jwxv','ut'),
(167,28,29,'2024-02-01 00:00:00','natus','tking@example.net','939-315-7303x805','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,0,'Sed laboriosam et labore eaque.',0,1,0,'eusj','13303607322','fhds','omnis'),
(168,24,41,'2024-02-01 00:00:00','voluptatem','owehner@example.org','1-374-874-0162','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,0,'Velit aliquam placeat veniam deleniti culpa.',0,1,0,'fpjm','32459165134','rfjp','et'),
(169,25,24,'2024-02-01 00:00:00','molestias','kbaumbach@example.org','(953)552-1632x7183','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,1,'Eos dolore omnis quisquam nulla ipsam et voluptatem.',0,1,0,'gynd','33857159794','dwrh','ea'),
(170,19,16,'2024-02-01 00:00:00','non','mfarrell@example.org','+81(1)5569697792','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,2,'Voluptatem placeat voluptas et impedit.',0,1,0,'udhy','19750690220','xkfm','rerum'),
(171,16,34,'2024-02-01 00:00:00','quia','kaelyn36@example.net','093-226-5315x5182','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Est exercitationem necessitatibus itaque eius tempora eius.',0,1,0,'xwnd','31620720313','arbl','est'),
(172,19,49,'2024-02-01 00:00:00','tempora','xweimann@example.org','059-013-4345x535','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,0,'Quae commodi distinctio quas aliquid voluptatibus.',0,1,0,'rtee','24567748573','zunk','alias'),
(173,17,32,'2024-02-01 00:00:00','aliquam','keon50@example.org','06129454127','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,2,'Labore aut provident omnis consequuntur earum consectetur natus.',0,1,0,'goqr','22255484680','jets','facere'),
(174,26,49,'2024-02-01 00:00:00','ipsam','leannon.arno@example.org','+14(1)9731124661','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,0,'Quia illo ipsam occaecati.',0,1,0,'sgrc','32532898219','mgga','magnam'),
(175,22,27,'2024-02-01 00:00:00','fuga','pasquale69@example.org','+19(8)4565462259','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,2,'Cupiditate sit quasi et cum quidem sint.',0,1,0,'olvm','24687307352','faqw','aut'),
(176,28,51,'2024-02-01 00:00:00','eum','pouros.aidan@example.org','1-642-913-9755','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,1,'Ex rerum minus ducimus autem aut.',0,1,0,'amjd','18469631538','wveo','tempora'),
(177,18,49,'2024-02-01 00:00:00','accusamus','cleora89@example.org','1-666-371-7121x69806','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,0,'Dolorem nemo laborum rerum nisi distinctio officiis illo.',0,1,0,'lxbf','18727590408','tcln','quis'),
(178,19,35,'2024-02-01 00:00:00','totam','brekke.godfrey@example.org','+15(7)1433255163','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,0,'Eum sunt delectus facere ea.',0,1,0,'ttry','24422976731','mjek','dolorem'),
(179,26,36,'2024-02-01 00:00:00','perspiciatis','kkling@example.org','(032)534-8305x384','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,0,'Sed temporibus dolorem aliquid vero.',0,1,0,'awuo','26160613865','jgej','eos'),
(180,22,40,'2024-02-01 00:00:00','soluta','hhartmann@example.net','1-804-502-2812x6460','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,0,'Velit delectus rerum vel quo quo et porro in.',0,1,0,'qwms','26217045760','loiu','eius'),
(181,29,27,'2024-02-01 00:00:00','aut','mbruen@example.net','396.220.4228x1903','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,0,'Omnis veritatis doloremque omnis est labore ipsa sit.',0,1,0,'dmdc','28074452442','rhyk','soluta'),
(182,28,35,'2024-02-01 00:00:00','aut','kyleigh65@example.com','292.058.7009x78531','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,0,'Voluptatem tempora similique at eos illum dolorum sapiente consequatur.',0,1,0,'nyoo','29362315402','kpsr','sit'),
(183,29,43,'2024-02-01 00:00:00','doloribus','pwisozk@example.org','(584)651-4585x91493','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,0,'Consequatur molestias at nam et cumque rerum sed.',0,1,0,'vtyw','31223734107','ogrc','autem'),
(184,16,51,'2024-02-01 00:00:00','aspernatur','kihn.cooper@example.com','960.989.1834','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,0,'Nam deserunt quis nam distinctio quia tenetur placeat.',0,1,0,'fvhx','17382189299','qoqs','adipisci'),
(185,28,24,'2024-02-01 00:00:00','et','pbartoletti@example.org','1-144-263-3417','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,0,'Et et voluptatum rerum occaecati.',0,1,0,'nlzg','13380923978','zeey','placeat'),
(187,27,37,'2024-02-01 00:00:00','rem','pollich.odie@example.com','700-796-4299x0886','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,2,'Non blanditiis sapiente vel laboriosam earum.',0,1,0,'mzss','31791110723','kifv','dolores'),
(188,25,32,'2024-02-01 00:00:00','officiis','ellis89@example.net','(980)980-7254x2280','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,2,'Autem aut aperiam et molestias autem qui itaque.',0,1,0,'mjqq','14593136137','yeqw','deleniti'),
(189,28,30,'2024-02-01 00:00:00','incidunt','zromaguera@example.com','399-541-3518','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,1,'Eos reprehenderit quia veniam.',0,1,0,'uunm','14974842367','dxkg','consequuntur'),
(190,29,43,'2024-02-01 00:00:00','et','ward.nicholaus@example.net','133-966-7676','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,0,'Voluptas magni quisquam et aut neque nulla.',0,1,0,'mied','13786476608','jlwb','praesentium'),
(191,18,20,'2024-02-01 00:00:00','recusandae','hane.christop@example.net','+75(9)3861595388','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Consectetur minima sint atque rem id est vel.',0,1,0,'seew','34472578188','scrs','aliquam'),
(192,23,21,'2024-02-01 00:00:00','in','flavie.kuhlman@example.com','682-273-7925x83073','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Veniam ut facilis rem.',0,1,0,'ixyt','18180762434','qndj','eos'),
(193,21,21,'2024-02-01 00:00:00','qui','joanie39@example.org','1-301-187-0549x460','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,2,'Veniam ad odit est voluptas esse corrupti.',0,1,0,'hpkx','29680315428','ppds','sit'),
(194,23,18,'2024-02-01 00:00:00','et','rhett39@example.com','(923)860-3348','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,2,'Assumenda animi voluptatem ut magni officia nam.',0,1,0,'hyoi','16444872483','ibko','sit'),
(195,18,40,'2024-02-01 00:00:00','sit','ngaylord@example.net','(629)762-4527','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Sapiente cupiditate enim sunt praesentium.',0,1,0,'zsmy','25537709047','zbnt','nulla'),
(196,22,37,'2024-02-01 00:00:00','laudantium','cornell21@example.com','937-149-6679x525','2024-02-01 00:00:00','2024-02-03 00:00:00',2,2,2,'Aliquid doloremque doloremque sed eligendi dolor voluptate nobis.',0,1,0,'vkdk','32054784977','vcxx','rerum'),
(197,29,37,'2024-02-01 00:00:00','error','terrell69@example.org','1-920-405-2517x703','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Sed sit aut voluptatem nostrum molestias fuga amet.',0,1,0,'hzjl','23235094909','qcal','cumque'),
(198,25,34,'2024-02-01 00:00:00','corrupti','barton74@example.com','833.962.7219x557','2024-02-01 00:00:00','2024-02-03 00:00:00',2,1,2,'Sed magni placeat beatae excepturi delectus maiores.',0,1,0,'jrue','19985825053','giyb','optio'),
(199,26,19,'2024-02-01 00:00:00','rem','moore.stephany@example.org','05516617286','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,1,'Sit quod expedita iure quam dolores et.',0,1,0,'jtat','33341388895','vumj','incidunt'),
(200,26,32,'2024-02-01 00:00:00','tenetur','millie.leffler@example.net','1-199-661-0750x256','2024-02-01 00:00:00','2024-02-03 00:00:00',1,2,2,'Iste est vitae dolores corporis.',0,1,0,'qgyj','14310719583','bwep','facilis'),
(201,20,40,'2024-02-01 00:00:00','fugiat','runolfsdottir.glenda@example.org','675-782-4239','2024-02-01 00:00:00','2024-02-03 00:00:00',1,1,0,'Qui adipisci tempore in et accusantium ratione.',0,1,0,'wggw','25755962812','tpod','a');

INSERT INTO `tblbill` VALUES
(202,25,27,'2024-03-01 00:00:00','vel','mbaumbach@example.net','283-180-5010x2619','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,1,'Eaque iste nam distinctio.',0,1,0,'dfzs','24474184212','lmqg','aut'),
(203,28,16,'2024-03-01 00:00:00','id','jaycee42@example.net','501-333-5213x12847','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,0,'Dolor est similique adipisci quos culpa aut.',0,1,0,'pwqe','22387617255','hqrz','eius'),
(204,27,48,'2024-03-01 00:00:00','praesentium','veum.keshaun@example.org','(761)277-9676','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,0,'Magni id unde veritatis.',0,1,0,'yxmb','26579730625','swlm','eligendi'),
(205,24,51,'2024-03-01 00:00:00','qui','eunice.stark@example.org','385-057-4958','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,1,'Eum perferendis esse qui.',0,1,0,'kfie','13246178387','nrgw','illo'),
(206,26,44,'2024-03-01 00:00:00','molestiae','brown.randal@example.org','(806)917-6310x234','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,0,'Et magnam iste voluptatem corrupti a sequi consectetur laboriosam.',0,1,0,'hnjf','34855658890','ikni','recusandae'),
(207,25,46,'2024-03-01 00:00:00','voluptas','janae.reichel@example.org','08601541446','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,0,'Ullam itaque tempore ipsa et corrupti est sequi.',0,1,0,'foqh','17971621372','qwke','aut'),
(208,21,29,'2024-03-01 00:00:00','voluptas','bbuckridge@example.net','1-745-987-2110x2661','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,0,'Itaque ut esse est veniam beatae illo et.',0,1,0,'yevs','23839404638','kiyd','molestiae'),
(209,21,31,'2024-03-01 00:00:00','voluptatum','concepcion.sipes@example.org','+08(6)2067917060','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,2,'Expedita qui ut excepturi et.',0,1,0,'zpky','30030004535','yqoe','voluptatem'),
(210,28,25,'2024-03-01 00:00:00','fuga','bert09@example.net','+96(1)3338647603','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,2,'Dicta dignissimos dolor repellat veniam.',0,1,0,'ittl','13539893033','koyr','autem'),
(211,23,23,'2024-03-01 00:00:00','expedita','zbashirian@example.com','370.527.6268','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,0,'Neque nesciunt repellat esse nam.',0,1,0,'zjxf','19968372252','dfpx','veritatis'),
(212,24,38,'2024-03-01 00:00:00','aut','jovan.vonrueden@example.org','066.038.7136','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,2,'Quia voluptatem aperiam quidem et.',0,1,0,'ypcy','32379462736','vihr','quaerat'),
(213,24,37,'2024-03-01 00:00:00','in','acorwin@example.com','08105134546','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,0,'Nemo pariatur odio nostrum animi sit.',0,1,0,'sudx','14850133128','ezvi','porro'),
(214,16,48,'2024-03-01 00:00:00','at','eunice18@example.org','1-291-332-0653','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,2,'Magni architecto non mollitia.',0,1,0,'mgda','16633392705','elvj','quos'),
(215,16,47,'2024-03-01 00:00:00','quia','aosinski@example.com','1-592-702-3571','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,2,'Id quisquam fuga omnis optio consequatur eius.',0,1,0,'tabr','34554954499','ygrz','nam'),
(216,24,30,'2024-03-01 00:00:00','ut','madalyn.braun@example.org','00823162996','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,0,'Modi illo nihil libero rerum voluptates aut.',0,1,0,'qajc','31136086961','gciq','beatae'),
(217,19,37,'2024-03-01 00:00:00','porro','lmurazik@example.net','01153896409','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,2,'Natus ut adipisci accusamus beatae ut architecto.',0,1,0,'optc','28009136132','wvxy','ea'),
(218,27,27,'2024-03-01 00:00:00','qui','bwolff@example.net','(069)001-0068x7948','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,0,'In dolores vel libero in.',0,1,0,'ucrn','33047409655','tabl','dolor'),
(219,25,20,'2024-03-01 00:00:00','voluptas','xtromp@example.net','(342)443-2665','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,0,'Est facere et totam.',0,1,0,'wxkq','19611781819','pfbs','distinctio'),
(220,27,27,'2024-03-01 00:00:00','eveniet','gzieme@example.net','+29(9)2115309274','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,0,'Sed nihil nam necessitatibus et velit reiciendis ipsam laudantium.',0,1,0,'fbyd','30751234285','cgne','ut'),
(221,22,51,'2024-03-01 00:00:00','ratione','esperanza60@example.com','743.505.9031','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,0,'Necessitatibus sit eaque magni.',0,1,0,'gtiq','12882928536','cyod','ducimus'),
(222,28,50,'2024-03-01 00:00:00','et','charlotte.bailey@example.net','275-158-7916','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,1,'Aspernatur corporis reiciendis magnam id vel.',0,1,0,'vdky','20484183312','gjvg','et'),
(223,19,30,'2024-03-01 00:00:00','ipsa','russel.ethyl@example.net','092-415-3520','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,1,'Vel enim et id ullam ad et.',0,1,0,'forl','34750113731','egad','sint'),
(224,25,44,'2024-03-01 00:00:00','nihil','aoberbrunner@example.com','550-835-9570x321','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,2,'Vitae error neque quia nulla.',0,1,0,'jzyd','35105785904','rjdm','qui'),
(225,23,43,'2024-03-01 00:00:00','qui','dimitri52@example.com','076-977-8178','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,1,'Dolore aut et voluptatem.',0,1,0,'psdg','27809615963','ryfn','et'),
(226,28,39,'2024-03-01 00:00:00','cum','lily02@example.net','1-961-556-2380x5564','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,0,'Sed eos facilis ut.',0,1,0,'idut','23915325658','rdus','pariatur'),
(227,19,39,'2024-03-01 00:00:00','consequatur','murphy.dach@example.net','(755)323-9919x03015','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,1,'Dicta voluptas aperiam rerum optio.',0,1,0,'ihnp','16535652763','hqje','omnis'),
(228,18,51,'2024-03-01 00:00:00','sit','auer.samantha@example.com','1-345-230-0660x736','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,2,'Animi quia temporibus et dolores eos eum in.',0,1,0,'drvd','21334370166','dauh','quas'),
(229,24,25,'2024-03-01 00:00:00','minus','rempel.kathryne@example.org','1-175-572-7536x5604','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,2,'Rerum voluptatem quia dicta voluptatum.',0,1,0,'hqhu','14360390704','xksv','nemo'),
(230,16,22,'2024-03-01 00:00:00','ut','wmclaughlin@example.org','1-473-822-6737','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,1,'Aliquid dolore sequi voluptatum consequatur voluptates esse dolorem.',0,1,0,'nsph','14668168515','bsib','voluptatem'),
(231,20,39,'2024-03-01 00:00:00','et','posinski@example.net','062-122-7447','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,1,'Nostrum mollitia hic eum eos sit libero hic repudiandae.',0,1,0,'snmc','31057003479','jeau','dolore'),
(232,18,43,'2024-03-01 00:00:00','consequatur','zlubowitz@example.net','441.699.7948x51169','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,1,'Necessitatibus cum explicabo voluptatem pariatur in non numquam.',0,1,0,'iuyl','13454437673','casw','voluptatibus'),
(234,28,30,'2024-03-01 00:00:00','saepe','ida27@example.net','(558)732-2831','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,2,'Dolores praesentium cum cumque laboriosam et.',0,1,0,'tzuq','33896046268','xeub','ex'),
(235,25,43,'2024-03-01 00:00:00','doloremque','waters.chaz@example.org','832-930-8868x7952','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,2,'Non quia cumque quis repellat saepe provident.',0,1,0,'hfyn','19196830752','idkr','dolor'),
(236,19,38,'2024-03-01 00:00:00','vero','prudence.bechtelar@example.net','1-591-056-4500x268','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,1,'Eos sunt suscipit officia ea.',0,1,0,'ruvs','17541292968','juyj','id'),
(237,25,17,'2024-03-01 00:00:00','quidem','igusikowski@example.org','224.160.1655x04739','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,0,'Minus ipsum repellat id ipsa repudiandae autem provident qui.',0,1,0,'nfpo','34787218910','fhwr','quia'),
(238,17,25,'2024-03-01 00:00:00','dolorem','pierce52@example.org','1-834-680-0269','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,1,'Illo consequuntur veritatis harum itaque blanditiis.',0,1,0,'rifi','15140732729','qqpq','quisquam'),
(239,20,46,'2024-03-01 00:00:00','quia','wstokes@example.com','329.536.6297x5669','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,2,'Aut minima maxime dolorem ipsum quo.',0,1,0,'jmrl','35185517818','hgas','soluta'),
(240,28,17,'2024-03-01 00:00:00','et','padberg.demetrius@example.com','02418286630','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,0,'Quae est sed maiores adipisci occaecati qui.',0,1,0,'nuij','13311493300','yhby','unde'),
(241,19,24,'2024-03-01 00:00:00','praesentium','hpredovic@example.org','1-168-894-8315','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,1,'Eaque iusto nulla iure omnis.',0,1,0,'ntuj','28111760319','doxy','eius'),
(242,18,18,'2024-03-01 00:00:00','unde','tre.collier@example.net','670-545-6054x10216','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,0,'Consectetur nulla aut adipisci.',0,1,0,'arci','30619679798','wrgf','eius'),
(243,27,22,'2024-03-01 00:00:00','eligendi','oren.hills@example.net','+17(1)2109778782','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,2,'Odit et sit voluptatem suscipit.',0,1,0,'imcr','14883373199','vtwv','omnis'),
(244,17,35,'2024-03-01 00:00:00','enim','brisa.fisher@example.net','+60(6)7065288932','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,1,'Adipisci eveniet quibusdam quis.',0,1,0,'tgij','17214189841','mgds','molestias'),
(245,16,39,'2024-03-01 00:00:00','optio','mschuster@example.net','(605)067-1728x7357','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,2,'Vitae non nemo qui reprehenderit hic hic vero.',0,1,0,'lppe','34921662307','jxvh','cum'),
(246,24,50,'2024-03-01 00:00:00','eum','atowne@example.com','148.473.0865x933','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,2,'Et veritatis aliquid possimus itaque temporibus qui porro itaque.',0,1,0,'lboz','21397176620','cdih','quam'),
(247,21,24,'2024-03-01 00:00:00','incidunt','vdaugherty@example.org','1-775-272-8525x0032','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,1,'Ullam sapiente aperiam laboriosam sapiente officiis voluptatem fugit.',0,1,0,'cbcy','34375617256','vqmq','fugiat'),
(248,28,41,'2024-03-01 00:00:00','iste','ashly37@example.net','(147)450-5396','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,2,'Veritatis non est enim excepturi incidunt cum incidunt.',0,1,0,'yjhn','25984321358','husp','hic'),
(249,16,50,'2024-03-01 00:00:00','corporis','aditya72@example.net','143-774-3277','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,2,'Vel aperiam nam rerum adipisci aut.',0,1,0,'yebt','26005078580','iqqt','dolore'),
(250,23,46,'2024-03-01 00:00:00','nobis','durgan.krystel@example.net','(177)876-8547','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,0,'Nisi rerum sed alias aut id enim.',0,1,0,'rkgc','16924462912','cebz','explicabo'),
(251,24,22,'2024-03-01 00:00:00','est','wmraz@example.net','+28(8)9546215536','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,1,'Cumque facere reiciendis magnam velit distinctio.',0,1,0,'aguy','18718581009','lhbu','voluptatem'),
(252,25,21,'2024-03-01 00:00:00','quis','albert61@example.net','948-230-9545','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,0,'Natus commodi necessitatibus ut ipsam.',0,1,0,'cbet','33492718925','uedy','id'),
(253,27,22,'2024-03-01 00:00:00','itaque','kkonopelski@example.net','01993056848','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,0,'Quis iure dolor excepturi quia.',0,1,0,'tppn','16460687526','ozqq','officiis'),
(254,19,26,'2024-03-01 00:00:00','eveniet','manuela65@example.org','(904)241-6264','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,2,'Itaque et adipisci iusto.',0,1,0,'kukj','21465874209','nbbq','consectetur'),
(255,24,34,'2024-03-01 00:00:00','a','wrosenbaum@example.com','398-338-3964x4011','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,0,'Eum molestias voluptas aperiam dolorem et quam molestiae.',0,1,0,'wrht','29468621595','prhq','dolor'),
(256,23,46,'2024-03-01 00:00:00','sequi','clemmie59@example.net','553.621.0499','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,2,'In molestiae non provident unde quam nesciunt rem assumenda.',0,1,0,'ygkk','30223228071','htrb','blanditiis'),
(257,16,48,'2024-03-01 00:00:00','non','lzulauf@example.org','(125)402-2022x6172','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,1,'Eius et nobis deserunt.',0,1,0,'ckkk','33375688097','kegy','sed'),
(258,20,17,'2024-03-01 00:00:00','animi','oswift@example.com','578.898.2461','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,2,'Accusamus et et aspernatur eveniet et molestiae.',0,1,0,'rmtw','15022318840','yqlm','quae'),
(259,18,35,'2024-03-01 00:00:00','ut','aleannon@example.com','+60(0)3640857781','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,2,'Eos veniam est officia dolorum minus.',0,1,0,'qhbp','24603374833','dwxo','et'),
(260,25,20,'2024-03-01 00:00:00','cupiditate','amy69@example.com','515-993-0388','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,2,'Distinctio ducimus officia dolorem animi nihil laudantium.',0,1,0,'gijz','18424299231','jjhe','suscipit'),
(261,19,26,'2024-03-01 00:00:00','molestiae','lee05@example.org','+97(6)5980038504','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,0,'Et assumenda aut repudiandae id ea consequatur.',0,1,0,'oykc','28280817173','pero','ut'),
(262,27,30,'2024-03-01 00:00:00','deserunt','beth.koepp@example.com','+55(4)0579616605','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,1,'Ut quia sit quia aut.',0,1,0,'btmq','21232335132','iaqx','non'),
(263,16,34,'2024-03-01 00:00:00','deleniti','runolfsson.reese@example.net','1-703-617-1879x684','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,1,'Consectetur autem tempora vel non autem et modi.',0,1,0,'flre','25624097223','ball','alias'),
(264,18,31,'2024-03-01 00:00:00','est','winifred59@example.com','1-066-899-3922x5515','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,0,'Architecto voluptas rerum exercitationem ea alias.',0,1,0,'hygx','24161474429','miao','rerum'),
(265,24,37,'2024-03-01 00:00:00','quo','eugenia35@example.org','252-248-5723','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,0,'Aperiam dolore sequi voluptates velit accusantium.',0,1,0,'jcxw','14932458666','xizp','vel'),
(266,24,30,'2024-03-01 00:00:00','illo','jamarcus.lemke@example.com','562-446-6390x7511','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,2,'Excepturi magni quia iure.',0,1,0,'ryhp','34141272049','jvky','ullam'),
(267,23,41,'2024-03-01 00:00:00','cumque','brakus.sean@example.org','402-674-1012x62088','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,0,'Maxime inventore reprehenderit architecto vitae aliquam quidem ratione.',0,1,0,'ujos','14369949032','wsfb','perspiciatis'),
(268,25,42,'2024-03-01 00:00:00','et','xwindler@example.org','086-331-7744','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,1,'Cumque eum debitis doloremque qui sed consequatur non.',0,1,0,'nwqm','34837672695','oqep','ut'),
(269,18,28,'2024-03-01 00:00:00','eius','wellington98@example.net','592-417-2742','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,1,'Suscipit inventore harum pariatur laborum eveniet debitis.',0,1,0,'vczd','15052264988','wncj','commodi'),
(270,29,42,'2024-03-01 00:00:00','eos','eliane74@example.com','(512)759-2310x54172','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,1,'Iste placeat et quia voluptas dolores ex.',0,1,0,'kmjw','31543848741','qnjl','consectetur'),
(271,28,42,'2024-03-01 00:00:00','nemo','karli.quigley@example.com','+20(4)0786079294','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,1,'Atque consequatur corrupti aperiam magnam accusamus quos blanditiis nesciunt.',0,1,0,'bvfq','17557170265','iqxv','veritatis'),
(272,23,21,'2024-03-01 00:00:00','tempore','therese.hayes@example.org','1-243-473-8823','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,0,'Porro laborum suscipit sed.',0,1,0,'fqvi','28438583381','nhgn','tenetur'),
(273,28,42,'2024-03-01 00:00:00','sunt','wilburn16@example.com','03760923302','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,0,'Eum non accusantium dolorem blanditiis doloribus.',0,1,0,'rjyi','32772747457','mqxl','quo'),
(274,21,26,'2024-03-01 00:00:00','voluptatem','meta.mclaughlin@example.com','1-109-303-8728x87308','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,1,'Qui omnis et expedita et rerum.',0,1,0,'wktq','14403955487','jzix','inventore'),
(275,19,36,'2024-03-01 00:00:00','atque','pasquale34@example.net','(392)205-4192','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,2,'Cumque placeat est voluptatem quo sapiente iste.',0,1,0,'ppql','24815393722','pcsk','aut'),
(276,25,50,'2024-03-01 00:00:00','velit','gordon66@example.net','(217)946-9089','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,1,'Ut soluta veritatis quis nihil distinctio.',0,1,0,'zntr','34057339258','jsrr','temporibus'),
(277,18,42,'2024-03-01 00:00:00','fugit','norris86@example.com','1-896-271-5167x8819','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,1,'Earum nam non officia.',0,1,0,'swvv','29467445060','kkyu','exercitationem'),
(278,28,24,'2024-03-01 00:00:00','non','hyatt.marjorie@example.org','442.304.3712','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,2,'Perferendis possimus dolorem dignissimos eveniet placeat libero repellat.',0,1,0,'ybkq','25087468998','cdcw','labore'),
(279,18,15,'2024-03-01 00:00:00','modi','meggie86@example.net','1-623-409-7157x6071','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,2,'Laborum ut mollitia assumenda velit inventore atque ut.',0,1,0,'wlvw','25289830305','safn','voluptatem'),
(280,17,18,'2024-03-01 00:00:00','omnis','rodrigo.lakin@example.net','1-257-119-7619','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,1,'Pariatur ipsa pariatur nemo atque dolor.',0,1,0,'yxod','32353735191','cfqd','aut'),
(281,29,46,'2024-03-01 00:00:00','ab','talia94@example.org','226-981-7318x05415','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,2,'Aut dolores molestiae aut qui.',0,1,0,'hwyb','35108539051','iwzs','molestiae'),
(282,23,50,'2024-03-01 00:00:00','maxime','walker.ewald@example.com','1-282-618-6221x0325','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,1,'Omnis illo non voluptas quaerat eaque dolor neque harum.',0,1,0,'rmrk','29271433733','cdbp','enim'),
(283,20,27,'2024-03-01 00:00:00','sed','gutmann.brandt@example.org','505.706.9591x695','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,2,'Alias vel in fugit nihil occaecati.',0,1,0,'cfxc','18480291835','qztq','molestiae'),
(284,25,51,'2024-03-01 00:00:00','laudantium','mccullough.ezra@example.org','521-252-8886','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,1,'Non maxime ratione sint minus cum laborum.',0,1,0,'lzaw','20946865202','ucgp','nobis'),
(285,17,50,'2024-03-01 00:00:00','sint','treva08@example.com','1-598-988-2568x6896','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,2,'Ratione et et non incidunt aspernatur minus.',0,1,0,'fpul','29718821335','jeqd','iusto'),
(286,23,35,'2024-03-01 00:00:00','atque','nmann@example.net','02585504278','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,0,'Vero sed quam quae officiis voluptas consequatur qui.',0,1,0,'lofa','18056391938','utlz','qui'),
(287,21,51,'2024-03-01 00:00:00','soluta','lbayer@example.com','+23(3)1312626060','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,2,'Ducimus cum quaerat dolor earum nam exercitationem.',0,1,0,'nryp','12452215008','gcay','placeat'),
(288,24,48,'2024-03-01 00:00:00','earum','huels.barrett@example.com','1-549-033-6745x883','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,0,'Officiis repellendus qui corrupti et voluptatem dolores exercitationem.',0,1,0,'ihyq','17450668808','vats','esse'),
(289,20,42,'2024-03-01 00:00:00','alias','audrey09@example.org','1-376-954-5001','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,1,'Dolores voluptate aspernatur iusto aliquam id.',0,1,0,'zspj','31595582738','jrdc','commodi'),
(290,29,39,'2024-03-01 00:00:00','quia','nicholas.moore@example.com','1-919-731-7788x30063','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,1,'Sequi minus exercitationem vero facere labore beatae.',0,1,0,'jehl','17476999178','sppc','modi'),
(291,19,17,'2024-03-01 00:00:00','qui','sigurd51@example.net','1-489-653-0425','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,2,'Exercitationem adipisci ducimus animi et consequatur velit quibusdam vel.',0,1,0,'wdlj','32378257612','mmyz','sed'),
(292,29,17,'2024-03-01 00:00:00','voluptate','fernando.botsford@example.org','931.013.2694','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,2,'Numquam ut dolor neque sequi.',0,1,0,'fxoc','15564520515','gljg','sapiente'),
(293,22,46,'2024-03-01 00:00:00','aut','terrance.fisher@example.net','645-056-0719x21391','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,1,'Alias accusamus voluptatem deserunt numquam.',0,1,0,'thmc','16332990851','xjjo','quos'),
(294,17,49,'2024-03-01 00:00:00','sed','brennan85@example.net','1-977-758-8935x13634','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,1,'Ut ad aliquam quas quo qui.',0,1,0,'gnhl','35145393598','hsow','et'),
(295,23,34,'2024-03-01 00:00:00','asperiores','west.oliver@example.org','1-233-733-7619x43259','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,2,'Fugiat explicabo rerum similique ea iste.',0,1,0,'zcci','25599757195','ktmj','reprehenderit'),
(296,24,42,'2024-03-01 00:00:00','nesciunt','satterfield.jermaine@example.net','1-735-534-1354x5538','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,1,'Omnis incidunt quod dolorum dignissimos in.',0,1,0,'coob','16513955709','euzb','sed'),
(297,17,27,'2024-03-01 00:00:00','enim','mitchell70@example.net','(161)356-6751x41468','2024-03-01 00:00:00','2024-03-03 00:00:00',1,1,0,'Numquam commodi qui mollitia praesentium et est omnis.',0,1,0,'atqa','32075089709','gtvf','quibusdam'),
(298,26,28,'2024-03-01 00:00:00','et','tromp.mckenzie@example.net','900.787.4429x57757','2024-03-01 00:00:00','2024-03-03 00:00:00',1,2,1,'Tempore sint sit voluptatem.',0,1,0,'qeis','14382358190','bueb','fuga'),
(299,29,17,'2024-03-01 00:00:00','sed','csenger@example.com','523-185-5485x7403','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,2,'Consequatur eum in rerum.',0,1,0,'qllj','34150448683','bnal','accusamus'),
(300,25,26,'2024-03-01 00:00:00','rerum','yesenia27@example.net','345-036-7145','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,1,'Nulla aut hic possimus nisi soluta ullam perferendis omnis.',0,1,0,'rjhw','28944327112','mbsl','architecto'),
(301,23,32,'2024-03-01 00:00:00','et','towne.gardner@example.net','290.594.7378','2024-03-01 00:00:00','2024-03-03 00:00:00',2,2,2,'Rem est aut et hic impedit sint.',0,1,0,'zier','19415600190','trjs','quaerat'),
(302,29,42,'2024-03-01 00:00:00','nisi','gheaney@example.net','05204997032','2024-03-01 00:00:00','2024-03-03 00:00:00',2,1,2,'Laudantium qui fugiat veniam perferendis adipisci.',0,1,0,'jakp','27422190635','iipe','sed');
INSERT INTO `tblbill` VALUES
(303,22,33,'2024-04-01 00:00:00','nihil','leonie08@example.org','728.046.8605x9972','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,2,'Fugiat voluptatibus eveniet amet voluptatem.',0,1,0,'gvym','34362138712','qkbb','qui'),
(304,21,36,'2024-04-01 00:00:00','consequuntur','josianne51@example.net','(896)486-2626','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,1,'Et voluptatem qui tempora vel.',0,1,0,'qmbw','33136342910','edif','officiis'),
(305,23,36,'2024-04-01 00:00:00','officiis','cartwright.dean@example.com','759.862.4021x655','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,0,'Natus aut nihil ad.',0,1,0,'hhud','30050465897','oftu','occaecati'),
(306,23,39,'2024-04-01 00:00:00','voluptate','slubowitz@example.net','1-465-294-6858','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,1,'Inventore tempora nobis officiis natus ad quae omnis.',0,1,0,'kdsd','19879516527','enxz','velit'),
(307,17,51,'2024-04-01 00:00:00','maxime','ocollier@example.org','416-323-9424','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,0,'Sunt adipisci facilis aspernatur harum nam assumenda voluptatum voluptas.',0,1,0,'hqkp','15534029050','iwna','natus'),
(308,26,42,'2024-04-01 00:00:00','facilis','clesch@example.com','627-874-3192x8360','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,2,'Esse non vitae et aut quia.',0,1,0,'mudj','21630801539','izmv','odio'),
(309,20,40,'2024-04-01 00:00:00','non','sidney43@example.net','924.441.0443x02939','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,2,'Sed sed rem aspernatur recusandae consequuntur rem labore veritatis.',0,1,0,'gfuk','33102144808','yprw','voluptatem'),
(310,18,39,'2024-04-01 00:00:00','occaecati','rudy88@example.com','(168)601-6022x32520','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,2,'Velit magni in qui quasi natus.',0,1,0,'fvrv','33418933170','nehf','iste'),
(311,27,21,'2024-04-01 00:00:00','et','yabbott@example.com','691.765.2301','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,2,'Quis velit nihil aut repellat.',0,1,0,'kwfj','13757538892','vxuu','illum'),
(312,18,41,'2024-04-01 00:00:00','voluptas','wuckert.herta@example.net','1-718-148-8433','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,1,'Blanditiis neque qui veniam velit cumque.',0,1,0,'nqtw','24797974833','whhk','quaerat'),
(313,24,39,'2024-04-01 00:00:00','expedita','laila76@example.org','1-669-375-9840','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,0,'Suscipit voluptatibus hic quibusdam maiores ipsam dignissimos sed.',0,1,0,'uhoz','33783402880','vtws','quis'),
(314,25,48,'2024-04-01 00:00:00','sunt','tiana.kub@example.org','1-060-550-5950','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,1,'Unde reiciendis non praesentium architecto in dolorum id harum.',0,1,0,'meyc','17411234087','ntcd','est'),
(315,24,38,'2024-04-01 00:00:00','nisi','lawrence.berge@example.com','195.249.7439x3737','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,0,'Ea libero fugit sed.',0,1,0,'qdfs','27053887339','puec','eos'),
(316,29,24,'2024-04-01 00:00:00','error','katelynn.von@example.com','149.371.9177x95453','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,0,'Et vel explicabo et quae error est.',0,1,0,'zosc','29042167120','xfqh','qui'),
(317,26,16,'2024-04-01 00:00:00','nam','kuphal.joanie@example.org','(318)830-1833x7098','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,1,'Dicta ex qui tempore molestiae cum labore.',0,1,0,'vfve','32710808453','mvsa','quae'),
(318,26,50,'2024-04-01 00:00:00','autem','hgoldner@example.org','+31(7)3205047135','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,1,'Quis architecto eius a.',0,1,0,'cnfl','15332156748','acfy','qui'),
(319,27,40,'2024-04-01 00:00:00','expedita','favian.zulauf@example.com','777.968.2051','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,1,'Provident dicta ullam asperiores numquam sequi laborum laborum.',0,1,0,'qnlj','15082365133','uwmf','placeat'),
(320,26,21,'2024-04-01 00:00:00','et','clifford51@example.net','1-691-326-3695','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,0,'Mollitia eveniet autem sit itaque numquam.',0,1,0,'tchh','24979887367','zwrx','esse'),
(321,18,40,'2024-04-01 00:00:00','ipsum','ydooley@example.org','252.518.0738','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,2,'Ratione nostrum saepe illum et ut totam sint consectetur.',0,1,0,'pgur','31780991782','tzkh','sunt'),
(322,20,50,'2024-04-01 00:00:00','nobis','vonrueden.angelina@example.org','(655)377-3572x187','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,2,'Sunt dolor error voluptatum dolores error officiis consequatur facere.',0,1,0,'liwo','17557967977','wvep','qui'),
(323,29,22,'2024-04-01 00:00:00','ex','vwilliamson@example.com','046-337-6102','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,0,'Magnam voluptas ea qui est qui at et.',0,1,0,'bbvj','33478771570','gide','autem'),
(324,16,39,'2024-04-01 00:00:00','velit','botsford.luna@example.com','852.427.2106x1930','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,0,'Qui id porro et et sequi sequi necessitatibus praesentium.',0,1,0,'kury','19790701873','hjzi','ipsum'),
(325,24,27,'2024-04-01 00:00:00','dolorem','labadie.jillian@example.com','08833676324','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,2,'Dignissimos saepe quas eos eum est ducimus optio beatae.',0,1,0,'xxmu','14425835000','foke','ducimus'),
(326,22,26,'2024-04-01 00:00:00','dolor','qwillms@example.com','119.700.0311x7710','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,2,'Eos non inventore vero exercitationem est quas.',0,1,0,'mtgw','18982815222','yoyf','hic'),
(327,26,36,'2024-04-01 00:00:00','totam','wuckert.michel@example.com','(496)717-2949x20589','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,1,'Architecto perferendis repellendus aut alias molestiae maxime natus.',0,1,0,'mwql','27079552418','keki','sed'),
(328,18,36,'2024-04-01 00:00:00','occaecati','herman.imelda@example.net','1-246-070-7608x79133','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,1,'Omnis consequatur sequi consequatur ut ut.',0,1,0,'hism','21496241855','jlqa','in'),
(329,28,30,'2024-04-01 00:00:00','qui','amir.carroll@example.com','523-899-3523','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,0,'Ut sint ut impedit fugit quia corrupti.',0,1,0,'prno','12572521243','jeaz','sed'),
(330,25,26,'2024-04-01 00:00:00','nemo','jones.delmer@example.com','646.907.4180','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,0,'Numquam et molestiae fuga.',0,1,0,'jkuq','24894562771','evdu','blanditiis'),
(331,23,42,'2024-04-01 00:00:00','distinctio','pbecker@example.com','1-843-594-2119','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,2,'Aspernatur ipsum aperiam dolor voluptatem et.',0,1,0,'ugfa','23463251297','beyk','et'),
(332,20,26,'2024-04-01 00:00:00','harum','tina29@example.com','779.840.5512','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,2,'Laborum nihil recusandae neque accusantium quasi nostrum.',0,1,0,'bpas','15123332037','qrsy','asperiores'),
(333,21,38,'2024-04-01 00:00:00','harum','ihauck@example.org','(442)570-5823x2538','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,2,'Dolores laboriosam non tenetur eos tempore non.',0,1,0,'tqnd','30079030346','zavk','illo'),
(334,21,44,'2024-04-01 00:00:00','tempora','carmen.wunsch@example.net','717-421-0462x2675','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,1,'Eligendi qui tenetur consequatur aut.',0,1,0,'jnhw','13792864311','vqsy','dolorem'),
(335,17,27,'2024-04-01 00:00:00','quam','xzulauf@example.org','+55(1)1318291934','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,0,'Veritatis vero voluptas animi enim provident eum.',0,1,0,'ykrl','16552937425','kdkb','numquam'),
(336,28,24,'2024-04-01 00:00:00','dolor','fsimonis@example.com','1-730-133-3428x90823','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,1,'Quia et aliquam sed maxime laudantium pariatur.',0,1,0,'abfu','31901312051','unup','magnam'),
(337,29,23,'2024-04-01 00:00:00','ad','mvandervort@example.com','1-439-342-1866x35193','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,0,'Harum eum tenetur iste pariatur aliquid ipsa quia.',0,1,0,'fvpq','29502248638','yrvg','est'),
(338,20,23,'2024-04-01 00:00:00','eius','jesus.wyman@example.org','897-524-1551x71138','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,0,'Consequatur tenetur iusto maxime expedita eum ex non.',0,1,0,'iqxk','18610141040','oovw','et'),
(339,16,15,'2024-04-01 00:00:00','et','mpagac@example.org','(402)397-2482','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,1,'Ut autem natus impedit ullam ut.',0,1,0,'wwjq','31847042419','mrqv','iste'),
(340,24,22,'2024-04-01 00:00:00','hic','christiana05@example.org','+26(1)3525946837','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,0,'Sapiente architecto repellendus fugit et.',0,1,0,'payx','29649774740','hdth','repudiandae'),
(341,24,33,'2024-04-01 00:00:00','exercitationem','brodriguez@example.org','1-492-083-7566','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,1,'Et non mollitia fugit accusantium deserunt et debitis.',0,1,0,'rori','18744402736','vdch','modi'),
(342,25,50,'2024-04-01 00:00:00','temporibus','breana.bednar@example.org','09942810447','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,1,'Qui ad enim et magni numquam.',0,1,0,'adaa','23744230910','wzke','minus'),
(343,28,16,'2024-04-01 00:00:00','laboriosam','stracke.lilian@example.net','1-798-498-4503x7947','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,1,'Non necessitatibus quas est facilis aut pariatur voluptatibus qui.',0,1,0,'ejdd','23104607659','zkmh','ipsa'),
(344,23,35,'2024-04-01 00:00:00','possimus','eherman@example.org','281-245-2514x3977','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,1,'Nemo natus odit quis culpa.',0,1,0,'dmuj','31140545547','ureq','odio'),
(345,20,31,'2024-04-01 00:00:00','eaque','israel.kihn@example.org','(352)195-8043x591','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,0,'Similique sit aliquam facilis quod commodi.',0,1,0,'hsoo','19205801064','ldzz','est'),
(346,19,35,'2024-04-01 00:00:00','error','santiago.conn@example.com','057-741-1704x8729','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,0,'Ducimus dolorem illum quis blanditiis ea accusamus quae.',0,1,0,'esnh','28010359506','znij','reiciendis'),
(347,18,49,'2024-04-01 00:00:00','nulla','helga.bayer@example.com','1-591-371-3622','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,2,'Vero voluptas ullam in enim sunt.',0,1,0,'emyp','20767662188','ondu','repellendus'),
(348,17,21,'2024-04-01 00:00:00','nihil','margaretta.pouros@example.com','06634444012','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,1,'Earum molestiae vel fugit.',0,1,0,'rmhq','32407418819','qbsi','id'),
(349,18,35,'2024-04-01 00:00:00','laboriosam','kaleb72@example.org','251-450-0520x5996','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,2,'Voluptatum temporibus velit et rem.',0,1,0,'vsqc','28398283366','mczg','eum'),
(350,27,17,'2024-04-01 00:00:00','aliquam','carlotta31@example.org','(874)182-3989x00649','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,0,'Dicta aperiam ducimus iste numquam.',0,1,0,'bibs','24989211673','vhhy','tempora'),
(351,20,30,'2024-04-01 00:00:00','est','helena.runte@example.net','(616)594-6201x733','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,2,'Iste voluptatem fugit voluptas aliquid dolor sequi.',0,1,0,'hjcb','13841515798','toxm','explicabo'),
(352,20,33,'2024-04-01 00:00:00','quo','laverne.treutel@example.net','(638)411-3584x75059','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,1,'Et quam maxime qui.',0,1,0,'toyn','18276650322','pael','odit'),
(353,26,46,'2024-04-01 00:00:00','inventore','gruecker@example.org','+26(7)0526284955','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,1,'Dicta nisi occaecati et vel occaecati aut.',0,1,0,'veim','34546401391','xvtr','assumenda'),
(354,25,30,'2024-04-01 00:00:00','aut','vickie.weber@example.net','1-386-838-5248','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,2,'Inventore et at reiciendis porro veritatis modi.',0,1,0,'pnty','30882510447','oazj','blanditiis'),
(355,16,51,'2024-04-01 00:00:00','ut','roderick44@example.net','1-179-137-4879','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,2,'Provident molestiae cupiditate veritatis eveniet tempore sit.',0,1,0,'jpaz','32876005121','lrfp','vel'),
(356,25,20,'2024-04-01 00:00:00','illo','lorine23@example.org','472.098.2829x7217','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,0,'Nihil quas eum accusamus aliquam magnam in.',0,1,0,'bzer','21647669804','gsqt','temporibus'),
(357,18,30,'2024-04-01 00:00:00','minus','stokes.ezequiel@example.com','1-119-015-2923x9663','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,0,'Cum maiores est hic distinctio impedit.',0,1,0,'ehlk','29900454638','uhdm','temporibus'),
(358,19,48,'2024-04-01 00:00:00','sint','elijah73@example.net','625-761-5461x880','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,1,'Sunt voluptas non eum eos consectetur id earum.',0,1,0,'bjou','29961108311','caun','aut'),
(359,17,21,'2024-04-01 00:00:00','vitae','skyla70@example.net','388.888.1378x147','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,0,'Et totam consequuntur autem temporibus rem officia et.',0,1,0,'xfzm','20648663851','amns','eum'),
(360,21,39,'2024-04-01 00:00:00','dolorem','cormier.leta@example.com','06232670170','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,0,'Odio adipisci nihil esse ut aut ut id dolores.',0,1,0,'urko','21073492768','epwb','voluptatibus'),
(361,24,29,'2024-04-01 00:00:00','a','evalyn34@example.net','(084)545-3587','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,1,'Quod quia odit quisquam rerum.',0,1,0,'vxov','31877706883','sclr','ab'),
(362,19,29,'2024-04-01 00:00:00','voluptatem','akeem.kemmer@example.net','451.664.8756','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,1,'Aliquid omnis cupiditate autem facilis.',0,1,0,'wujn','27524930202','nmsi','omnis'),
(363,19,23,'2024-04-01 00:00:00','quia','ccruickshank@example.org','242.475.7605','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,0,'Sit aut ratione voluptatem sunt molestias asperiores dolorem.',0,1,0,'djri','32867378043','wdeh','nobis'),
(364,24,51,'2024-04-01 00:00:00','qui','rschmeler@example.com','253-913-3418x10072','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,2,'Doloribus temporibus dicta repudiandae.',0,1,0,'ytxj','20815346808','fuon','atque'),
(365,20,17,'2024-04-01 00:00:00','nihil','madisyn07@example.org','105.225.8777x2265','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,1,'Rerum molestias numquam nihil.',0,1,0,'yxed','20599313659','iutl','nisi'),
(366,20,35,'2024-04-01 00:00:00','qui','gbalistreri@example.org','925-340-4304x480','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,1,'Quasi soluta eos qui sapiente ut.',0,1,0,'lbjj','16176718426','sxpk','voluptas'),
(367,19,26,'2024-04-01 00:00:00','iure','isenger@example.com','656.829.0114x3384','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,1,'Numquam maxime quis minima ut.',0,1,0,'ehwt','32510269747','dtao','similique'),
(368,26,23,'2024-04-01 00:00:00','omnis','dorothea98@example.org','(219)034-8996','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,0,'Ut sapiente id qui totam dicta est quas.',0,1,0,'oxuc','17299671305','doxw','eius'),
(369,22,15,'2024-04-01 00:00:00','aliquid','koch.aileen@example.net','1-218-057-7803x7061','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,0,'Et amet a labore libero consectetur.',0,1,0,'atic','23274856955','pnzi','perspiciatis'),
(370,25,49,'2024-04-01 00:00:00','et','joey78@example.org','(072)167-4557x147','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,0,'Veniam possimus sed vitae sunt error.',0,1,0,'wcdu','12345520339','qswp','aut'),
(371,27,37,'2024-04-01 00:00:00','minima','tatyana.ernser@example.org','(841)383-4667x0513','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,1,'Nihil ut eveniet aut autem quaerat necessitatibus.',0,1,0,'uifx','21917311376','wixq','quia'),
(372,29,30,'2024-04-01 00:00:00','ea','eduardo41@example.org','(700)114-5310','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,1,'Aspernatur omnis numquam voluptatibus voluptatem.',0,1,0,'btqf','15072377477','wzma','id'),
(373,28,17,'2024-04-01 00:00:00','minima','orville83@example.org','737-089-5515x72888','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,2,'Maiores repellat velit et iure vel enim ea inventore.',0,1,0,'owvr','15886924320','mekt','in'),
(374,17,31,'2024-04-01 00:00:00','pariatur','dreilly@example.org','1-915-726-5397x84132','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,2,'Et cum totam nostrum eos libero accusamus illo.',0,1,0,'yyyh','23322738068','msko','et'),
(375,18,24,'2024-04-01 00:00:00','voluptatem','bessie20@example.net','06595068092','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,1,'Iure blanditiis sunt nemo laboriosam excepturi ipsam.',0,1,0,'vwbg','19358328825','ubzj','dolorem'),
(376,25,29,'2024-04-01 00:00:00','laborum','narciso.mckenzie@example.org','(394)946-0515x04104','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,1,'Voluptas atque est odit voluptas recusandae.',0,1,0,'gfbm','23200266245','zdyj','aperiam'),
(377,24,47,'2024-04-01 00:00:00','minus','jazmyn.dietrich@example.net','1-993-567-8741x6148','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,0,'Reprehenderit ratione aut error.',0,1,0,'ahjc','18347604875','dxgi','est'),
(378,23,37,'2024-04-01 00:00:00','et','conn.yoshiko@example.com','562-352-2582x234','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,2,'Nesciunt molestiae velit deleniti velit.',0,1,0,'ddzk','16839227439','fvhv','qui'),
(379,25,37,'2024-04-01 00:00:00','consequatur','yundt.myah@example.net','(820)719-3993','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,1,'Nesciunt est mollitia ratione ea saepe et voluptas.',0,1,0,'tznj','33789271368','wfwg','nam'),
(380,23,43,'2024-04-01 00:00:00','tenetur','maximo.o\'conner@example.net','1-576-119-8952x130','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,0,'Et qui non praesentium quia numquam aspernatur ut.',0,1,0,'zvkt','35176118325','cqgu','delectus'),
(381,21,33,'2024-04-01 00:00:00','iusto','bledner@example.net','(266)841-6567','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,0,'Omnis perferendis necessitatibus iste ullam non impedit.',0,1,0,'ifcj','22598340329','ljfh','blanditiis'),
(382,20,23,'2024-04-01 00:00:00','omnis','velda68@example.net','1-868-177-0219x769','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,0,'Mollitia ut recusandae odit.',0,1,0,'tigl','28013192941','sqwu','nihil'),
(383,16,41,'2024-04-01 00:00:00','ullam','prosacco.hiram@example.net','001-964-1918x7146','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,1,'A deserunt ea harum dolores fugit et quis.',0,1,0,'cmcw','28779871967','rzkg','est'),
(384,21,49,'2024-04-01 00:00:00','ipsum','stoltenberg.jamar@example.org','599-353-5202','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,0,'Deleniti id sint quia distinctio corporis et non.',0,1,0,'xwuj','31215327637','ipro','atque'),
(385,25,32,'2024-04-01 00:00:00','velit','ustroman@example.org','401-580-6553x647','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,0,'Ipsam similique numquam quis est totam a.',0,1,0,'nzmq','16547559651','zkyp','dicta'),
(386,18,20,'2024-04-01 00:00:00','quas','krajcik.odie@example.org','08315094759','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,0,'Dolorem accusamus voluptas architecto quo.',0,1,0,'dnrn','20658012713','fcjc','est'),
(387,27,46,'2024-04-01 00:00:00','voluptas','ludwig.bins@example.net','(128)142-1045','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,2,'Similique fugit ea officiis.',0,1,0,'jfhx','33965367021','qyvx','aut'),
(388,29,15,'2024-04-01 00:00:00','ut','luettgen.melissa@example.com','(544)892-5847','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,0,'Quibusdam doloribus repellat est sit assumenda aut.',0,1,0,'wzhy','32406929909','dqby','dolorum'),
(389,29,49,'2024-04-01 00:00:00','omnis','fkerluke@example.net','00576483713','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,1,'Dolorem mollitia voluptatem atque.',0,1,0,'xehh','26642430985','rraj','aut'),
(390,17,18,'2024-04-01 00:00:00','enim','tia.kihn@example.com','759.293.9006x15457','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,1,'Sunt delectus est harum.',0,1,0,'fffn','13602857908','xafc','nesciunt'),
(391,16,23,'2024-04-01 00:00:00','hic','schaden.juvenal@example.net','667.744.9576x675','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,1,'Qui quisquam sed et labore.',0,1,0,'ktzr','13651349718','kglw','id'),
(393,17,44,'2024-04-01 00:00:00','mollitia','metz.zackary@example.com','519.430.3331x23024','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,1,'Voluptate perferendis ut enim quaerat consequatur.',0,1,0,'lysy','28284572837','znvp','quo'),
(394,16,38,'2024-04-01 00:00:00','accusantium','schimmel.ova@example.net','+35(1)6165246284','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,2,'Et dolorem minima magni distinctio voluptas minus rem.',0,1,0,'hezd','35111851823','xwcu','praesentium'),
(395,24,23,'2024-04-01 00:00:00','ut','tiana48@example.org','1-416-168-0986x54584','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,2,'Aut et maiores mollitia ipsum eaque.',0,1,0,'izgw','13792402281','gdib','iure'),
(396,16,35,'2024-04-01 00:00:00','libero','khessel@example.com','06912924368','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,1,'Repudiandae eaque voluptate porro quisquam itaque assumenda cumque.',0,1,0,'asbn','30510251858','dwnq','et'),
(397,20,41,'2024-04-01 00:00:00','aut','batz.irwin@example.org','+93(2)6201889248','2024-04-01 00:00:00','2024-04-03 00:00:00',2,1,2,'Consequatur dolor itaque consequatur fugit aspernatur ea magnam.',0,1,0,'simn','27143673690','yavm','odio'),
(398,20,37,'2024-04-01 00:00:00','voluptatem','pledner@example.com','524-572-3561','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,2,'Nobis reiciendis blanditiis aut velit.',0,1,0,'zhtm','34447029275','vrzt','amet'),
(399,21,41,'2024-04-01 00:00:00','error','o\'keefe.kallie@example.org','+92(0)5374838546','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,1,'Neque nobis dolorem sunt consequatur qui.',0,1,0,'mdmw','34825921507','mkxs','cum'),
(400,22,39,'2024-04-01 00:00:00','voluptatem','carrie70@example.org','1-193-281-9940','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,2,'Laborum quis qui consectetur vero fugit minus.',0,1,0,'nkjc','34386106896','qafh','et'),
(401,24,43,'2024-04-01 00:00:00','facere','alyson23@example.net','1-867-134-1968x164','2024-04-01 00:00:00','2024-04-03 00:00:00',2,2,0,'Temporibus dolorum quos est aut corporis aut.',0,1,0,'lmoe','24227297335','nytt','ipsam'),
(402,25,46,'2024-04-01 00:00:00','necessitatibus','nicolette.wisoky@example.org','895.033.6604','2024-04-01 00:00:00','2024-04-03 00:00:00',1,2,0,'Mollitia voluptas nisi voluptatum sed aut magni.',0,1,0,'kktj','21506172145','kvpr','recusandae'),
(403,25,50,'2024-04-01 00:00:00','sequi','lemke.leonora@example.com','475-444-0785','2024-04-01 00:00:00','2024-04-03 00:00:00',1,1,1,'Ut molestiae eius esse ut.',0,1,0,'votu','28480130730','lihu','qui');
INSERT INTO `tblbill` VALUES
(404,28,31,'2024-05-01 00:00:00','eum','zulauf.cara@example.org','(677)489-6034x9377','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,0,'Ad dolor tempore porro qui ipsam.',0,1,0,'sxcr','24136903402','ozhm','voluptas'),
(405,17,44,'2024-05-01 00:00:00','a','carlos64@example.net','1-904-211-4447x69350','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,0,'Sed nesciunt minus pariatur non aut.',0,1,0,'bdhh','31685006698','saev','nihil'),
(406,24,19,'2024-05-01 00:00:00','autem','cooper78@example.org','684-441-6371x600','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,0,'Eum cumque incidunt placeat neque magnam ea recusandae.',0,1,0,'kfsk','26378259937','rmov','nobis'),
(407,20,22,'2024-05-01 00:00:00','dolor','dcorwin@example.net','1-012-433-4822','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,0,'Et impedit rerum id dolor esse.',0,1,0,'zdfy','33135357760','jqma','est'),
(408,26,47,'2024-05-01 00:00:00','ut','yesenia.mayert@example.org','1-864-748-2892x11189','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,1,'Debitis accusantium quo sunt.',0,1,0,'fqzh','26548822566','zkxh','quasi'),
(409,20,45,'2024-05-01 00:00:00','quaerat','misty.howell@example.com','+20(9)8965918001','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,0,'Corrupti quis ratione sapiente ipsam ut sunt laboriosam quis.',0,1,0,'zsgu','13398404955','gaqg','et'),
(410,19,24,'2024-05-01 00:00:00','suscipit','eschmitt@example.net','1-980-671-8692x92966','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,1,'Doloremque nemo rem minus ratione similique inventore.',0,1,0,'qekp','32118330052','ikxl','sunt'),
(411,19,30,'2024-05-01 00:00:00','iure','lesley.durgan@example.net','237-595-6048','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,1,'Facere veritatis incidunt libero omnis velit.',0,1,0,'zpwq','27170643146','gnzm','necessitatibus'),
(412,27,41,'2024-05-01 00:00:00','ducimus','bgerlach@example.com','123-297-8072','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,1,'Quod ut expedita aspernatur veritatis architecto aperiam quis.',0,1,0,'abph','20298077514','zlew','maxime'),
(413,29,43,'2024-05-01 00:00:00','neque','minnie11@example.com','04390181266','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,1,'Est sit necessitatibus ad rem repellat provident impedit.',0,1,0,'szgf','19637668193','mgvj','quia'),
(414,26,45,'2024-05-01 00:00:00','quod','citlalli.vonrueden@example.com','1-674-961-8859x860','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,1,'Facere qui debitis vitae ipsum occaecati nihil.',0,1,0,'fqre','14191532834','rxbf','voluptatem'),
(415,28,51,'2024-05-01 00:00:00','eaque','jess.klocko@example.com','(507)549-0235x45070','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,2,'Ut aut adipisci fugit in est incidunt.',0,1,0,'bzfu','23922547659','xyeg','laboriosam'),
(416,23,33,'2024-05-01 00:00:00','ullam','margot33@example.org','+97(2)4611612718','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,2,'Delectus et numquam laudantium inventore rem pariatur.',0,1,0,'aglr','14482834594','tkvo','et'),
(417,24,49,'2024-05-01 00:00:00','amet','stamm.candelario@example.net','022.744.8704x89273','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,2,'Id voluptas qui quia voluptate aliquid.',0,1,0,'nqxs','15787944440','wgui','provident'),
(418,17,48,'2024-05-01 00:00:00','qui','vwaelchi@example.com','857-044-9068x8070','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,0,'Magnam voluptatem dolor delectus quidem ipsum quod.',0,1,0,'qzyk','13673808004','eqag','et'),
(419,20,30,'2024-05-01 00:00:00','neque','alan62@example.com','(704)810-5155x7740','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,1,'In id atque quia nulla.',0,1,0,'qyve','30471232437','fddc','omnis'),
(421,20,25,'2024-05-01 00:00:00','totam','judge.purdy@example.org','(465)671-3637x52479','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,1,'Quo occaecati doloribus minima impedit aut asperiores.',0,1,0,'cusg','34008498371','wdlp','eligendi'),
(422,21,16,'2024-05-01 00:00:00','fugiat','kianna04@example.com','1-105-820-2236','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,2,'Blanditiis sequi veritatis quia esse architecto.',0,1,0,'aqpl','15925022326','cijx','dicta'),
(423,19,20,'2024-05-01 00:00:00','maxime','jada.williamson@example.net','143.564.2998','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,0,'Est quo reprehenderit sit optio.',0,1,0,'wyto','29117067790','rjlh','omnis'),
(424,22,18,'2024-05-01 00:00:00','officia','jrippin@example.net','+37(5)3850074590','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,2,'Est nobis sed rerum nihil explicabo fuga placeat.',0,1,0,'ngkj','25822168440','jcwe','voluptas'),
(425,20,41,'2024-05-01 00:00:00','excepturi','juanita21@example.com','(027)006-7316x25303','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,2,'Eos dolorem ad laudantium architecto.',0,1,0,'vjrf','31375292491','qeen','dolor'),
(426,26,32,'2024-05-01 00:00:00','soluta','mmclaughlin@example.org','(370)897-8773x5904','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,2,'Suscipit quia facilis consequuntur eum.',0,1,0,'xwtu','34758083277','uhrl','autem'),
(427,17,33,'2024-05-01 00:00:00','quasi','vwiza@example.org','02770506722','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,2,'Consequuntur quisquam vel aliquam ea occaecati est.',0,1,0,'jfwu','21215131587','quuj','possimus'),
(428,23,49,'2024-05-01 00:00:00','voluptatem','uriel43@example.net','(647)862-2709','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,2,'Odit voluptates perspiciatis et voluptas voluptas porro.',0,1,0,'hlzn','19086239841','cvud','fugiat'),
(429,27,47,'2024-05-01 00:00:00','omnis','seth64@example.org','110.036.9552x8083','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,0,'Eum laboriosam sint hic et voluptas similique.',0,1,0,'tzob','14659596943','esla','ex'),
(430,29,42,'2024-05-01 00:00:00','ut','bradly31@example.net','350-281-2300','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,1,'Est laboriosam ipsam dicta nobis provident quas dolores.',0,1,0,'konm','28082862900','oihs','provident'),
(431,29,18,'2024-05-01 00:00:00','maxime','bstark@example.net','380-158-1174x411','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,1,'Laudantium exercitationem doloremque et omnis laboriosam asperiores.',0,1,0,'phmf','14790963823','odqz','voluptas'),
(432,27,31,'2024-05-01 00:00:00','magnam','fstroman@example.net','1-369-601-2610x145','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,1,'Cum sunt inventore aut soluta doloremque.',0,1,0,'mide','22393876300','afgi','quis'),
(433,17,43,'2024-05-01 00:00:00','nulla','nspencer@example.com','769-183-1303x73139','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,0,'Est animi omnis dolores adipisci sed odio perferendis.',0,1,0,'tuet','15994830181','xtse','autem'),
(434,24,40,'2024-05-01 00:00:00','earum','hattie.kessler@example.net','881.522.5957x870','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,2,'Qui sint aut consequatur omnis dignissimos.',0,1,0,'lfly','19660320244','yqig','architecto'),
(435,22,39,'2024-05-01 00:00:00','placeat','morissette.oran@example.com','1-845-692-1383x97686','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,0,'Veritatis natus architecto sunt provident aliquam.',0,1,0,'iuvo','30946735639','wzks','iste'),
(436,19,20,'2024-05-01 00:00:00','ab','adolf17@example.org','1-878-345-3185x8740','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,1,'Voluptate necessitatibus dolore reprehenderit voluptas repellat est nesciunt rem.',0,1,0,'uhrt','31455759670','ngay','ea'),
(437,24,21,'2024-05-01 00:00:00','praesentium','pschowalter@example.com','554.272.0401','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,0,'Omnis eius quas a eos.',0,1,0,'edbj','20615934584','ffwy','hic'),
(438,24,50,'2024-05-01 00:00:00','unde','barrows.edna@example.net','(369)794-5695','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,2,'Consequatur eos id eos minima impedit ut.',0,1,0,'zppb','29085281418','hfte','at'),
(439,23,20,'2024-05-01 00:00:00','molestias','nikko10@example.com','(786)504-1579x855','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,2,'Deleniti et expedita saepe itaque et voluptas.',0,1,0,'duiu','23349932759','epjx','iusto'),
(440,18,42,'2024-05-01 00:00:00','dolorem','kevon77@example.org','426-203-5184x1305','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,2,'A soluta velit cum et perspiciatis.',0,1,0,'xbqk','25281393981','zvpf','quaerat'),
(441,19,46,'2024-05-01 00:00:00','laudantium','sienna14@example.net','1-561-969-9187','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,1,'Occaecati optio totam cumque nulla.',0,1,0,'rvrv','30285953002','qwdn','aperiam'),
(442,28,26,'2024-05-01 00:00:00','dolorem','karen.okuneva@example.org','00241451857','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,0,'Cupiditate commodi aut quas ut accusantium laborum consectetur.',0,1,0,'irzb','32951772158','kxqv','repudiandae'),
(443,18,46,'2024-05-01 00:00:00','dolorem','armstrong.garnet@example.net','(455)086-9786x982','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,2,'Itaque dignissimos aut eos temporibus aut facere.',0,1,0,'igfo','32053787455','nbmt','cumque'),
(444,25,51,'2024-05-01 00:00:00','expedita','peggie.christiansen@example.org','(375)919-6052','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,1,'Esse sunt qui quasi nihil reiciendis.',0,1,0,'xrur','23787648132','pexv','similique'),
(445,19,32,'2024-05-01 00:00:00','optio','eulalia.douglas@example.com','(521)922-6227x5813','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,0,'Incidunt ut architecto qui unde praesentium quia.',0,1,0,'xwpg','21494248064','azki','iusto'),
(446,21,45,'2024-05-01 00:00:00','eos','amie.ryan@example.org','1-162-556-0416','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,1,'Voluptas repellendus architecto omnis fugit suscipit.',0,1,0,'myif','22626716455','ptan','facilis'),
(447,28,33,'2024-05-01 00:00:00','consectetur','uschmeler@example.net','(026)798-7788','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,0,'Ipsa voluptatem enim aspernatur maxime mollitia.',0,1,0,'glbn','16029255667','oyyl','eum'),
(448,29,15,'2024-05-01 00:00:00','eveniet','wilhelm97@example.com','1-032-935-3056x35439','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,0,'Voluptas at delectus officiis qui.',0,1,0,'romg','18306352682','vztn','quia'),
(449,23,45,'2024-05-01 00:00:00','adipisci','walton.kunde@example.org','1-712-162-6777','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,1,'Recusandae quos soluta esse repellendus iure fugiat.',0,1,0,'zylt','27540141358','qiob','fuga'),
(450,28,45,'2024-05-01 00:00:00','odio','gbaumbach@example.com','(541)117-7971x30295','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,1,'Voluptatem consequatur adipisci voluptatibus maxime officia quod.',0,1,0,'zuha','30533221602','obbc','est'),
(451,18,33,'2024-05-01 00:00:00','et','noemi88@example.org','+66(2)7669307294','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,2,'Totam qui facere consequatur nulla rem repellat et ut.',0,1,0,'qzmp','33073287529','ncds','sed'),
(452,25,38,'2024-05-01 00:00:00','exercitationem','mariano.nikolaus@example.org','611-943-6797x4039','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,0,'Delectus quia totam eos.',0,1,0,'gjno','15956193042','hhap','vero'),
(453,22,21,'2024-05-01 00:00:00','est','mariane91@example.net','777.871.9530x659','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,1,'Consequuntur et autem officia sit est id.',0,1,0,'zyrm','33117208510','gwpt','ut'),
(454,25,28,'2024-05-01 00:00:00','et','haven.deckow@example.com','1-376-783-6776x96646','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,2,'Impedit est saepe et atque aut.',0,1,0,'mayt','35239581201','anfa','facere'),
(455,24,47,'2024-05-01 00:00:00','perferendis','lucius43@example.org','513.624.2169','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,1,'Iure incidunt sed repellendus quis perferendis architecto animi.',0,1,0,'dwyq','13929148068','uvtu','quia'),
(456,28,43,'2024-05-01 00:00:00','repudiandae','brielle32@example.net','705.113.1363','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,2,'Voluptatum voluptatem qui ut optio dolorem.',0,1,0,'fpim','29903284739','owfx','quos'),
(457,16,26,'2024-05-01 00:00:00','alias','hodkiewicz.jodie@example.com','(083)174-6665x280','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,0,'Dolor et odio rem omnis harum.',0,1,0,'ejio','34331467821','dbyq','et'),
(458,26,15,'2024-05-01 00:00:00','non','wgerhold@example.org','1-038-960-5684x018','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,0,'Qui at et voluptatem eos accusantium sed laboriosam provident.',0,1,0,'gylm','16868370289','adlk','accusamus'),
(459,24,49,'2024-05-01 00:00:00','ut','frederik.fisher@example.net','(156)535-3356x5338','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,1,'Est repellat eius et magnam.',0,1,0,'zswx','20179450730','mkpl','dolorem'),
(460,20,23,'2024-05-01 00:00:00','quia','kessler.cleora@example.net','(706)965-4579','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,2,'Voluptatum voluptatibus aut quod dolorum id.',0,1,0,'gmwo','34589676135','gpyk','facilis'),
(461,21,34,'2024-05-01 00:00:00','assumenda','burdette.walter@example.com','947.963.9122','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,0,'Eos aliquam voluptate quidem fugiat officia quidem iusto deleniti.',0,1,0,'yolt','27398384814','sdbb','ut'),
(462,21,18,'2024-05-01 00:00:00','ex','shaniya.morar@example.org','1-889-656-0897x014','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,2,'Quo optio accusantium blanditiis omnis alias.',0,1,0,'pfhk','19484913759','vbwu','temporibus'),
(463,23,51,'2024-05-01 00:00:00','in','tstamm@example.com','1-263-786-8574','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,2,'Non et excepturi in illum a cumque.',0,1,0,'xwsk','15599139923','ncvh','molestiae'),
(464,26,45,'2024-05-01 00:00:00','commodi','beverly82@example.com','482-488-4876x4002','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,2,'Et corrupti voluptas corporis voluptas pariatur consectetur.',0,1,0,'dryy','14155978798','adpk','blanditiis'),
(465,19,38,'2024-05-01 00:00:00','beatae','hbednar@example.org','851.227.9584x54924','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,0,'Et sed numquam expedita sunt.',0,1,0,'tjzi','28552048148','djce','sint'),
(466,16,33,'2024-05-01 00:00:00','blanditiis','treynolds@example.net','128.562.5766x14545','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,2,'Adipisci est aut qui rerum.',0,1,0,'gpeh','15562858451','dgoj','ut'),
(467,16,30,'2024-05-01 00:00:00','quia','yschmeler@example.com','04792413924','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,1,'Doloremque possimus atque nobis enim hic quis.',0,1,0,'uqpi','28650121895','cunj','perferendis'),
(468,16,35,'2024-05-01 00:00:00','similique','johathan49@example.net','1-750-337-3099','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,1,'Eum officia quam modi nesciunt nostrum.',0,1,0,'tsad','32294820985','foby','corporis'),
(469,22,20,'2024-05-01 00:00:00','ducimus','darwin41@example.org','706-984-6303','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,2,'Voluptate minus nobis atque voluptatibus quaerat.',0,1,0,'rjyb','21303845693','utmy','eos'),
(470,16,44,'2024-05-01 00:00:00','tenetur','pearlie.kling@example.com','363-542-0977','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,1,'Sed autem reprehenderit occaecati quaerat eaque dolore.',0,1,0,'dxzo','30409762535','yfzd','neque'),
(471,20,37,'2024-05-01 00:00:00','temporibus','ondricka.arnold@example.org','1-252-938-3017x658','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,0,'Perspiciatis voluptatum beatae id quia sit voluptatem id.',0,1,0,'qnvt','26536494494','lisa','pariatur'),
(472,29,41,'2024-05-01 00:00:00','omnis','gjaskolski@example.net','1-970-964-7283x86498','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,0,'Voluptas dolorum eaque eaque reprehenderit error explicabo.',0,1,0,'ogwj','23437594583','vfih','sequi'),
(473,25,16,'2024-05-01 00:00:00','necessitatibus','batz.nathan@example.org','714-665-3717x373','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,2,'Et explicabo cumque sed enim aspernatur molestiae aliquid aut.',0,1,0,'tpyc','21395697126','iyun','animi'),
(474,28,38,'2024-05-01 00:00:00','voluptatem','upton.deion@example.org','376.370.6840x8368','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,1,'Cumque iusto amet quo aut incidunt autem dicta et.',0,1,0,'jzix','17325518133','yhgs','ut'),
(475,24,18,'2024-05-01 00:00:00','blanditiis','lockman.bartholome@example.com','1-493-130-2759','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,0,'Est cupiditate doloribus voluptatem similique neque pariatur sunt molestiae.',0,1,0,'odvy','35269821970','jref','doloribus'),
(476,27,42,'2024-05-01 00:00:00','esse','emilia16@example.net','(421)574-2956x4005','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,0,'Non fugit dignissimos laudantium quaerat fuga vitae velit.',0,1,0,'llln','15127888917','ntmk','officiis'),
(477,25,35,'2024-05-01 00:00:00','et','tluettgen@example.org','08906074809','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,2,'Eos quasi est ad.',0,1,0,'fnuk','30077375258','vlsc','doloremque'),
(478,27,31,'2024-05-01 00:00:00','eligendi','kshlerin.lenny@example.org','968.806.8271x494','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,0,'Omnis quisquam aut eum voluptatem modi molestias.',0,1,0,'kgfm','22528273387','ucba','nihil'),
(479,24,17,'2024-05-01 00:00:00','officiis','brendon.beier@example.org','(566)026-3416x0526','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,0,'Repudiandae quo nemo deserunt omnis voluptas non.',0,1,0,'ntmb','25651733660','fyqo','ad'),
(480,22,19,'2024-05-01 00:00:00','et','rudy50@example.com','1-310-868-9097','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,1,'Nesciunt est reprehenderit ullam vel molestias.',0,1,0,'ftds','16693035535','jdhl','accusantium'),
(481,22,31,'2024-05-01 00:00:00','aliquam','felicity60@example.net','033-459-2478','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,0,'At magni molestiae vitae rem ipsum.',0,1,0,'dcju','14229058341','nxtt','fuga'),
(482,21,36,'2024-05-01 00:00:00','id','trantow.jessyca@example.com','798-669-4233x693','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,0,'Aspernatur inventore reiciendis inventore recusandae harum a.',0,1,0,'ogen','29410447898','pxzc','quis'),
(483,28,36,'2024-05-01 00:00:00','qui','hilpert.ellsworth@example.net','940.660.3930x407','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,0,'Aut deserunt sed vero sed temporibus ut fugiat.',0,1,0,'btzb','14757466262','pxxp','iste'),
(484,26,42,'2024-05-01 00:00:00','ea','vada66@example.org','+96(4)0182422236','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,1,'Sit ratione perspiciatis eum eius quia distinctio.',0,1,0,'vzyk','21094181055','dhei','qui'),
(485,26,32,'2024-05-01 00:00:00','ab','xstamm@example.org','084-842-0342x62086','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,0,'Consequatur voluptatem explicabo assumenda accusamus.',0,1,0,'ntnr','26486595849','irbi','qui'),
(486,28,40,'2024-05-01 00:00:00','hic','o\'conner.joshua@example.com','1-993-950-4908','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,2,'Itaque pariatur mollitia iusto necessitatibus repellendus.',0,1,0,'ihhw','31300442741','ybuv','minus'),
(487,29,34,'2024-05-01 00:00:00','earum','jasen.kihn@example.org','1-788-482-3796','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,1,'Modi sint ut nostrum labore corrupti.',0,1,0,'cgig','34450413887','ccrd','magnam'),
(488,29,29,'2024-05-01 00:00:00','perspiciatis','stroman.angeline@example.net','951-735-7881x534','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,0,'Officia maiores perferendis qui inventore.',0,1,0,'kgrs','25639180121','bjeg','quisquam'),
(489,18,49,'2024-05-01 00:00:00','repudiandae','coleman48@example.com','(484)805-6500','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,0,'In deleniti culpa optio.',0,1,0,'ccvt','13833083102','fqeq','aut'),
(490,16,17,'2024-05-01 00:00:00','blanditiis','landen.harris@example.org','214-853-7325x810','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,2,'Non placeat consequatur reprehenderit suscipit quis.',0,1,0,'kpow','22512670518','vjgy','molestiae'),
(491,21,46,'2024-05-01 00:00:00','quia','michel16@example.net','576-068-0419x12641','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,0,'Officiis quia assumenda quam ipsam maiores.',0,1,0,'vobb','28005946825','uylu','debitis'),
(492,19,45,'2024-05-01 00:00:00','dolores','patsy94@example.net','(607)780-9227','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,0,'Aut praesentium voluptatem vitae perferendis culpa eveniet doloremque.',0,1,0,'fzid','29902861803','ariq','eum'),
(493,24,20,'2024-05-01 00:00:00','enim','doyle.melba@example.net','412-050-5677x124','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,0,'Beatae porro nihil at.',0,1,0,'gzdm','31907986471','bflt','quaerat'),
(494,26,42,'2024-05-01 00:00:00','nostrum','schaefer.kian@example.com','729.032.1312','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,1,'Necessitatibus dolor illum similique.',0,1,0,'lurd','22709024799','cskt','sapiente'),
(495,21,34,'2024-05-01 00:00:00','ipsum','bailey.demario@example.com','(412)960-4161x7073','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,1,'Iusto eius molestiae quis sequi voluptatem.',0,1,0,'hcvc','29111401309','sbzz','perferendis'),
(496,21,21,'2024-05-01 00:00:00','tenetur','braun.alivia@example.com','03946030961','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,0,'Facilis et quae quidem et dolor quaerat molestiae.',0,1,0,'mfqq','32499152830','rrhs','aut'),
(497,16,36,'2024-05-01 00:00:00','qui','nmccullough@example.net','691.268.6054x542','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,2,'Hic modi dolorem perferendis eveniet ipsa praesentium rerum consectetur.',0,1,0,'kvyg','31181669638','zktz','rem'),
(498,22,50,'2024-05-01 00:00:00','aliquid','damaris79@example.org','1-390-647-6509x55292','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,2,'Nostrum ut aut repudiandae aut quod rerum nihil.',0,1,0,'pxuj','34902174488','hrvs','nemo'),
(499,23,43,'2024-05-01 00:00:00','rem','kim.batz@example.net','00364781552','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,2,'Doloribus voluptas rerum quia impedit nesciunt qui in id.',0,1,0,'lulx','29139631606','ypzc','quas'),
(500,17,46,'2024-05-01 00:00:00','quo','breitenberg.jana@example.com','+03(1)9736243134','2024-05-01 00:00:00','2024-05-03 00:00:00',2,1,0,'Consequuntur qui aspernatur ipsum.',0,1,0,'zsqg','19343257411','wmnn','nemo'),
(501,21,37,'2024-05-01 00:00:00','consectetur','tito.mitchell@example.org','462-493-9527','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,0,'Est ipsa accusamus voluptatem inventore consequatur tenetur.',0,1,0,'bqdv','27330266731','coyf','necessitatibus'),
(502,16,46,'2024-05-01 00:00:00','enim','volkman.kristoffer@example.com','1-349-656-3124x639','2024-05-01 00:00:00','2024-05-03 00:00:00',2,2,2,'Tempora et totam incidunt dolore ex quo cupiditate.',0,1,0,'burk','21051638434','nmqi','libero'),
(503,21,27,'2024-05-01 00:00:00','tenetur','gjohns@example.org','1-894-118-1769x229','2024-05-01 00:00:00','2024-05-03 00:00:00',1,2,0,'Aperiam aut harum ad.',0,1,0,'zuvv','23406734395','vpck','nihil'),
(504,21,28,'2024-05-01 00:00:00','delectus','lowell18@example.org','1-715-491-9644','2024-05-01 00:00:00','2024-05-03 00:00:00',1,1,2,'Iste quam aut et necessitatibus mollitia voluptate.',0,1,0,'hlam','22162383231','tien','magni');
INSERT INTO `tblbill` VALUES
(505,28,16,'2024-06-01 00:00:00','nisi','okautzer@example.org','(854)576-3254x3831','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,2,'Exercitationem iste consequatur et.',0,1,0,'dzhm','30270086979','cxqw','dolores'),
(506,26,27,'2024-06-01 00:00:00','cumque','hank.goldner@example.net','540-785-4777','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,2,'Aut est ut magni tempore.',0,1,0,'rrqh','15017194706','xatf','necessitatibus'),
(507,29,37,'2024-06-01 00:00:00','vitae','cassidy.upton@example.org','1-104-275-0550x42876','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,1,'Saepe soluta aut consequatur reiciendis.',0,1,0,'kxuq','32800998553','kbtu','ipsa'),
(508,29,42,'2024-06-01 00:00:00','eos','rae20@example.com','770.816.3372x0931','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,0,'Debitis ut similique sint quos doloribus hic.',0,1,0,'iuul','22698899834','nugu','aut'),
(509,29,30,'2024-06-01 00:00:00','cumque','darrin.conroy@example.com','464-658-6815','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,1,'Cum consequatur iste est autem sunt similique.',0,1,0,'jhsm','31371298082','kibw','cumque'),
(510,22,33,'2024-06-01 00:00:00','corrupti','icie94@example.net','01354110983','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Ducimus doloremque alias repellendus consequatur voluptate.',0,1,0,'xpfx','25507263241','sdey','dolores'),
(511,23,22,'2024-06-01 00:00:00','quaerat','shirley20@example.org','(662)536-7474x04655','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,1,'Quia magni ut necessitatibus eveniet quis quis consequatur.',0,1,0,'ptfz','17598694675','jlwg','vero'),
(512,25,23,'2024-06-01 00:00:00','minima','bgerhold@example.org','1-016-972-9520','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,1,'Commodi inventore amet eveniet earum est.',0,1,0,'abdb','22669481660','kobb','nostrum'),
(513,24,15,'2024-06-01 00:00:00','reiciendis','pmoen@example.net','(710)156-6031x41643','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,1,'Neque et non est qui tempore.',0,1,0,'pmzh','28177487997','bzso','non'),
(514,23,15,'2024-06-01 00:00:00','possimus','lueilwitz.lizeth@example.com','283.074.9047x619','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,0,'Quos minima odio voluptas voluptatem voluptatem magnam facere.',0,1,0,'gwlw','32163872517','wisb','nam'),
(515,19,37,'2024-06-01 00:00:00','odit','homenick.alana@example.net','(458)762-3296','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,0,'Iusto quia rerum ullam quis delectus.',0,1,0,'ixho','25938389201','hbvn','aspernatur'),
(516,25,23,'2024-06-01 00:00:00','vel','julia.padberg@example.com','134-070-2216','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,1,'Nisi voluptate tempore fugit itaque quia optio omnis quod.',0,1,0,'mwnr','32840916664','efte','vel'),
(517,21,40,'2024-06-01 00:00:00','vero','lang.wilhelmine@example.net','+79(1)7964380964','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,2,'Quis asperiores vero ut hic et magni.',0,1,0,'vrlg','13460031384','hmcw','aut'),
(518,23,30,'2024-06-01 00:00:00','dolores','chris34@example.com','+00(5)1330773408','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Fuga sint ea mollitia.',0,1,0,'ezgv','35216835165','dusb','debitis'),
(519,23,31,'2024-06-01 00:00:00','sed','aurore07@example.com','678-656-5122','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,1,'Fuga iste fugiat illo aut harum quaerat laboriosam vel.',0,1,0,'ucfj','15232952610','lvji','est'),
(520,25,48,'2024-06-01 00:00:00','vitae','claudia45@example.com','08740150820','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Sunt est et provident illo recusandae et architecto velit.',0,1,0,'xzof','31025326462','bliy','non'),
(521,24,34,'2024-06-01 00:00:00','reiciendis','fschmeler@example.com','452-448-1277','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,1,'Magni deserunt nostrum enim eaque quam expedita omnis.',0,1,0,'snav','14503643672','xdeo','enim'),
(522,20,19,'2024-06-01 00:00:00','assumenda','friesen.eula@example.net','874-700-1386x381','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,2,'Et blanditiis aut quos quia nihil iusto.',0,1,0,'pknl','28025332692','jvvw','pariatur'),
(523,28,33,'2024-06-01 00:00:00','dolorem','predovic.craig@example.com','137-216-7336x759','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Incidunt voluptatem modi eius ut.',0,1,0,'funk','32430068415','kzwk','explicabo'),
(524,21,27,'2024-06-01 00:00:00','in','ricardo06@example.org','215-942-4858','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,0,'Non voluptatibus dolore sunt dignissimos reprehenderit.',0,1,0,'aaxj','13549914216','cijc','ea'),
(526,28,19,'2024-06-01 00:00:00','est','vada31@example.net','+84(5)5139028944','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Dignissimos eius dolore quod est quod.',0,1,0,'kuum','18864996854','jelz','nostrum'),
(527,25,40,'2024-06-01 00:00:00','explicabo','hagenes.patricia@example.org','+70(2)2516480300','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,0,'Facilis qui quas sint voluptatibus enim expedita aut cumque.',0,1,0,'lflj','15678667186','rfgx','accusamus'),
(528,18,22,'2024-06-01 00:00:00','veritatis','qkling@example.org','(699)724-4569x1153','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Doloribus sapiente neque illo omnis iste amet.',0,1,0,'jrhy','20961926728','uatn','architecto'),
(529,23,47,'2024-06-01 00:00:00','et','salvatore.gottlieb@example.net','(243)322-8885x302','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,0,'Dolore nisi a expedita.',0,1,0,'fvhl','35022190698','xpfl','dolores'),
(530,23,16,'2024-06-01 00:00:00','totam','eichmann.orrin@example.com','+35(7)5908325447','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,1,'At eos dolorem omnis nesciunt error labore.',0,1,0,'wlwt','31897503015','xqht','est'),
(531,20,26,'2024-06-01 00:00:00','inventore','lily33@example.com','(938)879-6267','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,1,'Explicabo quis perspiciatis aut dolorum.',0,1,0,'ltly','20821508693','pofa','pariatur'),
(532,27,34,'2024-06-01 00:00:00','sint','qgerhold@example.net','(108)388-5099','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,1,'Sit debitis aut non officia rem quis est in.',0,1,0,'wrpv','16219181853','vzft','vel'),
(533,26,48,'2024-06-01 00:00:00','pariatur','hettinger.sister@example.org','847.777.2405','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,1,'Occaecati repudiandae vitae fuga aut dolorum dolore.',0,1,0,'jihl','32115803375','vjkv','dolores'),
(534,29,41,'2024-06-01 00:00:00','quo','zhaley@example.com','1-978-622-4029x0438','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,2,'Nisi sint corporis amet nihil tempore quae eligendi enim.',0,1,0,'hdhj','18739650386','wcgd','ut'),
(535,26,37,'2024-06-01 00:00:00','aut','cletus33@example.com','1-894-867-4857','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,0,'Labore maiores recusandae animi commodi quas reiciendis quos.',0,1,0,'hpxv','15247409042','exgw','repellendus'),
(536,27,17,'2024-06-01 00:00:00','odit','ifeest@example.org','040.775.5934x82634','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,1,'Quia voluptatibus animi adipisci id.',0,1,0,'cqrd','33130605578','svmb','sed'),
(537,20,24,'2024-06-01 00:00:00','odio','aliya84@example.net','(627)980-9342','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Vel eos rerum in sed facilis.',0,1,0,'jhdy','29954096397','inqn','magni'),
(538,21,47,'2024-06-01 00:00:00','excepturi','stanton.percival@example.com','049.497.9973x1909','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,1,'Consequatur rerum eum quo et voluptatum voluptatem.',0,1,0,'iwxx','14091902044','opnr','est'),
(539,27,36,'2024-06-01 00:00:00','rerum','cschmidt@example.net','(382)381-8324','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,0,'Quidem voluptas vero vero omnis dolore ut eaque quia.',0,1,0,'sjkp','22812107583','xztg','amet'),
(540,20,42,'2024-06-01 00:00:00','et','cvandervort@example.net','502-239-4228x53761','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,0,'In nobis officiis voluptatem facilis ipsa vel autem.',0,1,0,'dwks','26566838004','eryz','sint'),
(541,23,41,'2024-06-01 00:00:00','et','cartwright.ryley@example.org','601-261-5552x740','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Quia incidunt voluptatibus nulla quia quis animi.',0,1,0,'vnts','32670311402','fykv','modi'),
(542,23,24,'2024-06-01 00:00:00','necessitatibus','ifahey@example.net','726.072.2607x137','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,1,'Ut laborum laborum quos est dolores adipisci.',0,1,0,'chou','29784064222','otab','aut'),
(543,26,40,'2024-06-01 00:00:00','ut','stanton.reymundo@example.org','(208)209-7898x94203','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,2,'Qui qui voluptas est sed nulla magnam quo.',0,1,0,'dkzg','13725602282','tdoh','rerum'),
(544,23,43,'2024-06-01 00:00:00','et','dbashirian@example.com','052.911.9709','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,2,'Eum est fugiat et deserunt non minima quisquam.',0,1,0,'nzox','12414456710','yjed','quod'),
(545,22,41,'2024-06-01 00:00:00','illo','thomenick@example.net','04357544141','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,2,'Sit et rem et exercitationem veritatis iure in.',0,1,0,'gokk','17480980111','zbdd','harum'),
(546,16,29,'2024-06-01 00:00:00','recusandae','tkuhn@example.net','409-342-6189','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,2,'Veritatis ea est rerum aut reprehenderit est dolorum vel.',0,1,0,'ohtu','25884992253','nfyl','quia'),
(547,24,29,'2024-06-01 00:00:00','omnis','reece01@example.org','140-709-6244x9323','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,1,'Culpa esse sunt odio.',0,1,0,'rgmf','14262267445','dmnl','assumenda'),
(548,21,15,'2024-06-01 00:00:00','et','shayna33@example.org','1-483-246-7908x80815','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,1,'Nisi aut accusantium perferendis nulla.',0,1,0,'onad','29276275092','jroy','ratione'),
(549,29,44,'2024-06-01 00:00:00','quia','doris.rogahn@example.org','647.402.2867','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,0,'Enim perspiciatis laborum enim nam quibusdam et voluptatem.',0,1,0,'umaa','13062147542','dtjd','voluptatem'),
(550,27,23,'2024-06-01 00:00:00','voluptatem','iroberts@example.com','437.021.5317','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Consequatur eum autem qui sit quisquam.',0,1,0,'ovvj','21663117393','pxyb','et'),
(551,27,49,'2024-06-01 00:00:00','culpa','tressa91@example.com','1-477-318-3732','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,1,'Tenetur vero nostrum nemo accusamus repellendus est est.',0,1,0,'drnt','18505680727','ckkx','earum'),
(552,19,37,'2024-06-01 00:00:00','quia','dexter.becker@example.net','(984)921-9330','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,2,'Quam nemo amet repudiandae numquam saepe necessitatibus.',0,1,0,'gyhz','27431563345','etpz','aperiam'),
(553,18,28,'2024-06-01 00:00:00','amet','eveline73@example.com','+69(8)8046864296','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,0,'Consequatur facere quod sint.',0,1,0,'uxwv','31551846621','nyjb','enim'),
(554,22,51,'2024-06-01 00:00:00','nihil','grimes.rogers@example.net','1-026-249-3677','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,1,'Natus molestiae molestiae tempora maiores.',0,1,0,'uexw','12493467336','hgkt','quae'),
(555,24,48,'2024-06-01 00:00:00','accusamus','caesar.monahan@example.org','08413951542','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,2,'Hic laudantium recusandae quam quia aut repudiandae numquam.',0,1,0,'edts','33941969379','ryzv','dolore'),
(556,28,18,'2024-06-01 00:00:00','corrupti','lizeth83@example.org','226.500.9696','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,2,'Quia architecto est eos similique.',0,1,0,'etvj','27077362617','vutn','at'),
(557,19,24,'2024-06-01 00:00:00','delectus','madalyn.dare@example.com','392-034-9617','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,1,'Ut hic quam maxime est veritatis.',0,1,0,'nuwj','25303471474','vfcj','vero'),
(558,16,37,'2024-06-01 00:00:00','non','kamryn.wunsch@example.com','886.772.3040x0720','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,0,'Et nobis est beatae non.',0,1,0,'tpbe','33996995487','bmqg','sunt'),
(559,27,38,'2024-06-01 00:00:00','iure','liliana.johnson@example.com','1-022-964-5538','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,2,'Voluptatum aut maxime quis delectus similique.',0,1,0,'hpza','22950162331','cvot','et'),
(560,25,16,'2024-06-01 00:00:00','delectus','myrtis.koch@example.net','1-552-208-8879x908','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,2,'Praesentium veniam nam ut sequi ad.',0,1,0,'drvt','22950951499','utdd','sunt'),
(561,17,41,'2024-06-01 00:00:00','odit','frederik89@example.com','481-668-0003x2930','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,2,'Aut dolores quibusdam blanditiis optio nihil.',0,1,0,'clna','17865131254','himu','tempore'),
(562,19,50,'2024-06-01 00:00:00','non','dora.greenfelder@example.net','1-006-692-8555','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,1,'Magni et autem id modi illo odio.',0,1,0,'mlkh','25864776099','wqrx','eos'),
(563,20,16,'2024-06-01 00:00:00','sunt','melyna.nienow@example.com','618-901-1047x271','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,2,'Nemo voluptas et sed deserunt repellat voluptas corporis deleniti.',0,1,0,'qkjr','18648829403','bott','sit'),
(564,29,50,'2024-06-01 00:00:00','eaque','fausto61@example.org','(211)925-5715','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,0,'Beatae modi minus commodi hic mollitia earum velit.',0,1,0,'xgdi','15455241650','ordh','ipsum'),
(565,24,51,'2024-06-01 00:00:00','fugiat','daniel.mazie@example.com','1-486-255-6202','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,2,'Sint voluptas sit facilis officiis tempore tempore.',0,1,0,'pipl','28759671720','unvj','at'),
(566,16,25,'2024-06-01 00:00:00','dolor','wbartoletti@example.org','1-832-572-5141','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,2,'Ullam placeat deserunt vel.',0,1,0,'sgdm','29596968537','zqju','eum'),
(567,18,15,'2024-06-01 00:00:00','quam','oran24@example.net','1-801-523-8544x560','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,1,'Nobis numquam officia voluptatem rem.',0,1,0,'hpir','25908080844','kdwc','sapiente'),
(568,17,49,'2024-06-01 00:00:00','tenetur','hterry@example.net','(415)585-2613x9591','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,1,'Quis maiores ut illo atque quo et.',0,1,0,'itsg','17250065805','gsdw','veritatis'),
(569,20,28,'2024-06-01 00:00:00','voluptatem','camilla79@example.org','1-847-765-2862','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,0,'Adipisci nobis assumenda ipsam accusamus.',0,1,0,'owxx','21779055448','rkxp','doloremque'),
(570,27,29,'2024-06-01 00:00:00','consequuntur','pollich.karlie@example.org','049.581.3376','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,1,'Occaecati ratione magni odit dolorum voluptates facilis ea voluptates.',0,1,0,'onmo','28571978232','rhel','vero'),
(571,22,28,'2024-06-01 00:00:00','earum','angelica.bailey@example.com','+24(3)0863805639','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,1,'Qui et rerum esse officiis ratione iste est.',0,1,0,'nhus','25363281932','hnqo','ab'),
(572,19,21,'2024-06-01 00:00:00','vitae','dovie.kiehn@example.net','1-112-938-8731x694','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,0,'Cum voluptatem aut eos rem laborum necessitatibus quos.',0,1,0,'dryt','13958190113','jhcx','qui'),
(573,28,45,'2024-06-01 00:00:00','in','alva83@example.org','447-642-5589x13892','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,1,'Corporis temporibus dolorum placeat quae aperiam incidunt.',0,1,0,'mbqu','15950486957','xhxm','dolorem'),
(574,23,18,'2024-06-01 00:00:00','adipisci','emerson.beatty@example.net','396-598-6224x25894','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,0,'Praesentium eligendi et deserunt pariatur repellendus.',0,1,0,'yvtm','30949308416','vyxp','sunt'),
(575,19,27,'2024-06-01 00:00:00','quae','levi25@example.com','02557102261','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,0,'In est ipsam sint ipsa fugit impedit ducimus maxime.',0,1,0,'baba','18496762144','iquq','reprehenderit'),
(576,20,42,'2024-06-01 00:00:00','dolor','elizabeth.wolf@example.com','1-990-341-3365','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,1,'Et deserunt eius facilis voluptas ab aut dolore iure.',0,1,0,'bsvm','32297690310','kcaz','distinctio'),
(577,22,23,'2024-06-01 00:00:00','deserunt','xdubuque@example.com','1-496-975-2883x0505','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,1,'Aspernatur in sit officia enim minus tempore dolorem et.',0,1,0,'wesh','30183462699','isir','in'),
(578,19,26,'2024-06-01 00:00:00','minima','zbaumbach@example.org','812-306-1324x25703','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,2,'Totam exercitationem voluptatum repudiandae mollitia expedita qui.',0,1,0,'etdz','26347790676','hzqe','est'),
(579,25,50,'2024-06-01 00:00:00','commodi','qkreiger@example.com','(323)533-6178','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,2,'Perferendis sed ex deserunt maxime vitae id et.',0,1,0,'ywvn','16577537934','wfby','aperiam'),
(580,24,45,'2024-06-01 00:00:00','est','parker.kiarra@example.com','(593)173-2157','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,1,'Iste et nesciunt explicabo veniam sapiente sit.',0,1,0,'atdv','18230782967','lndw','omnis'),
(581,28,30,'2024-06-01 00:00:00','ab','friesen.lea@example.com','340.582.8940x9742','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,1,'Dicta id id ipsum est repudiandae voluptatem maxime.',0,1,0,'mzfk','31471207312','wzbc','voluptas'),
(582,21,47,'2024-06-01 00:00:00','eum','olson.cody@example.com','+90(7)1193935601','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,0,'Ut qui cum veritatis dicta occaecati eos tempora.',0,1,0,'wfju','22263932724','wujg','quod'),
(583,29,27,'2024-06-01 00:00:00','dignissimos','schoen.maverick@example.com','1-152-802-5110x0988','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,1,'Qui velit iusto explicabo natus officia quis.',0,1,0,'qmhu','27700923337','lxza','voluptatem'),
(584,19,37,'2024-06-01 00:00:00','qui','hellen48@example.net','458-472-6591x6329','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,0,'Numquam non praesentium eveniet libero at rem dolor labore.',0,1,0,'xswx','28547260932','habp','dolorem'),
(585,23,29,'2024-06-01 00:00:00','itaque','bosco.herman@example.org','(262)372-1398','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,1,'Quo iure aperiam nemo laudantium et corrupti.',0,1,0,'ktvu','15550261707','ozyu','animi'),
(586,19,26,'2024-06-01 00:00:00','mollitia','leland.bergstrom@example.org','392-286-7751x51855','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,2,'Quaerat et molestias fuga facilis exercitationem.',0,1,0,'ypfy','29001545601','ngmr','asperiores'),
(587,17,24,'2024-06-01 00:00:00','magnam','aliza.goodwin@example.com','+47(5)1044928924','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,1,'Aut optio molestiae doloribus ipsa laborum rem ullam.',0,1,0,'yllf','21640038028','eoay','minus'),
(588,16,20,'2024-06-01 00:00:00','explicabo','unitzsche@example.org','784.600.9708','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,0,'Et numquam dolorem voluptates explicabo.',0,1,0,'ajqs','14995576501','ljyx','ducimus'),
(589,24,41,'2024-06-01 00:00:00','qui','brook07@example.net','1-405-617-2376x887','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Maxime aut quia dignissimos et.',0,1,0,'mgrj','12979388363','bkfa','repellat'),
(590,27,21,'2024-06-01 00:00:00','ipsum','dejah65@example.net','602-733-5588','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,0,'Et aperiam qui non laboriosam.',0,1,0,'lofj','34215552350','ilpz','assumenda'),
(591,19,17,'2024-06-01 00:00:00','quisquam','pinkie.walter@example.net','+68(9)1708251298','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,2,'Rerum aspernatur facere soluta velit ut doloribus.',0,1,0,'budp','25814807567','vonh','eos'),
(592,20,15,'2024-06-01 00:00:00','quia','yoshiko39@example.com','333-089-0857x7854','2024-06-01 00:00:00','2024-06-03 00:00:00',2,2,1,'Est odio unde perferendis.',0,1,0,'wsxm','29811406402','qvlb','qui'),
(593,21,30,'2024-06-01 00:00:00','sapiente','xdickens@example.org','603.847.3992x42647','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,1,'Iste officia veniam esse id aut.',0,1,0,'vwho','30718262031','yomn','et'),
(594,26,40,'2024-06-01 00:00:00','voluptates','jwalter@example.org','624-767-2998x61584','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Tenetur ullam aut hic sed delectus qui debitis.',0,1,0,'bcwh','31099455832','jgfx','et'),
(595,24,19,'2024-06-01 00:00:00','assumenda','wiza.enrico@example.com','(413)489-8666','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,0,'Dolorem a qui et quaerat quod doloremque impedit.',0,1,0,'lemo','20889998974','gupd','suscipit'),
(596,18,15,'2024-06-01 00:00:00','voluptatem','breanna.sauer@example.org','1-712-966-8802','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,2,'Ut aut delectus expedita saepe nihil beatae ut.',0,1,0,'dfcp','29047581761','uymo','odio'),
(597,28,41,'2024-06-01 00:00:00','reiciendis','cale.cummerata@example.com','1-916-152-6822x4885','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,2,'Itaque iure ratione reiciendis officia corporis odit sed aut.',0,1,0,'rfdu','32513381939','xrjd','et'),
(598,29,42,'2024-06-01 00:00:00','aut','grimes.mallory@example.com','217-152-1405x3166','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,0,'Vitae deleniti veritatis excepturi praesentium dolorum quis sunt impedit.',0,1,0,'cegc','34971182665','ckwu','dolorum'),
(599,24,37,'2024-06-01 00:00:00','ipsum','jace.rogahn@example.org','(633)973-1510','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,2,'Corrupti architecto voluptates in consectetur voluptas doloribus.',0,1,0,'eaqi','19105767315','tyla','consequatur'),
(600,18,44,'2024-06-01 00:00:00','impedit','rohan.gardner@example.net','(418)429-5380x034','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Sunt qui minima culpa id ex voluptatem.',0,1,0,'egvd','27963870247','jfvy','aut'),
(601,25,39,'2024-06-01 00:00:00','minus','magali33@example.net','04227475972','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,1,'Beatae magni qui et deleniti quia.',0,1,0,'vuto','13842781355','xygf','cum'),
(602,22,38,'2024-06-01 00:00:00','animi','vbernhard@example.org','945.317.2124','2024-06-01 00:00:00','2024-06-03 00:00:00',2,1,0,'Ut et id sed et quaerat itaque sed.',0,1,0,'gzan','26625656078','iqlu','eligendi'),
(603,23,31,'2024-06-01 00:00:00','id','lulu32@example.net','08188720042','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,0,'Voluptatem est expedita est iusto.',0,1,0,'avwn','30759649285','tpwd','aliquam'),
(604,17,21,'2024-06-01 00:00:00','et','rippin.marielle@example.net','08008267582','2024-06-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Consequatur quia nihil ab eligendi consequatur neque vitae.',0,1,0,'ivpl','31592381516','ochm','et'),
(605,28,26,'2024-06-01 00:00:00','molestiae','stark.melyna@example.org','1-948-363-1794x324','2024-06-01 00:00:00','2024-06-03 00:00:00',1,2,2,'Qui similique qui beatae est est.',0,1,0,'swbn','23027369769','pntv','sequi');
INSERT INTO `tblbill` VALUES
(619,23,41,'2024-07-01 00:00:00','quis','caterina52@example.org','241.893.5934x276','2024-07-01 00:00:00','2024-06-03 00:00:00',1,1,0,'Distinctio temporibus tenetur tenetur porro et et corrupti ipsam.',0,0,0,'dxbc','28854172898','kirb','placeat'),
(620,20,34,'2024-07-01 00:00:00','soluta','gage.fisher@example.org','(947)440-8051','2024-07-01 00:00:00','2024-06-03 00:00:00',1,1,1,'Fugit repudiandae qui delectus recusandae.',0,1,0,'ecun','20433064097','zrdg','nihil'),
(621,22,38,'2024-07-01 00:00:00','molestiae','royce03@example.net','1-062-597-4736','2024-07-01 00:00:00','2024-06-03 00:00:00',2,1,2,'Quia porro eos commodi fugiat.',0,1,0,'qytf','20881057269','gutf','magni'),
(624,29,27,'2024-07-01 00:00:00','tenetur','zelda.schroeder@example.com','149.636.8303x69482','2024-07-01 00:00:00','2024-06-03 00:00:00',1,2,1,'Aut odit aut non ipsum.',0,0,0,'qvwk','33132535468','aitc','praesentium'),
(635,26,16,'2024-07-01 00:00:00','ipsam','demarcus.bauch@example.org','1-266-009-5353x0269','2024-07-01 00:00:00','2024-06-03 00:00:00',1,1,1,'Vitae et dolor culpa ut voluptate harum.',0,0,0,'uhgn','13926525190','xsyy','qui'),
(636,27,28,'2024-07-01 00:00:00','repellendus','oshanahan@example.net','973.583.2792x2838','2024-07-01 00:00:00','2024-06-03 00:00:00',2,2,1,'Iure quis enim voluptatibus et illo a assumenda.',0,1,0,'cjpd','19561571376','fwng','delectus'),
(642,28,32,'2024-07-01 00:00:00','quae','mgorczany@example.net','09801934970','2024-07-01 00:00:00','2024-06-03 00:00:00',2,2,0,'Ab atque quis corporis.',0,0,0,'uesn','24276061303','ozrb','quibusdam'),
(646,23,50,'2024-07-01 00:00:00','vitae','gus.gerlach@example.org','793.598.9020x2860','2024-07-01 00:00:00','2024-06-03 00:00:00',2,1,2,'Aut et omnis aut totam blanditiis dolore.',0,1,0,'laeo','28573986032','uzps','officiis'),
(651,27,49,'2024-07-01 00:00:00','incidunt','pconsidine@example.net','+54(8)8843657795','2024-07-01 00:00:00','2024-06-03 00:00:00',2,2,0,'Nemo quod nihil facere temporibus perferendis harum delectus.',0,0,0,'lhlx','30130344142','ntta','consequuntur'),
(654,21,51,'2024-07-01 00:00:00','recusandae','nyasia40@example.com','+44(3)4042802907','2024-07-01 00:00:00','2024-06-03 00:00:00',1,1,1,'Assumenda sit odio saepe quisquam aut non consequuntur vel.',0,0,0,'yfxt','28988622623','yoyv','qui'),
(667,25,37,'2024-07-01 00:00:00','et','rice.raoul@example.org','+47(7)1340632903','2024-07-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Autem quis non dolorem recusandae animi fugit reiciendis.',0,1,0,'ssis','34406509475','vimb','tempore'),
(673,19,20,'2024-07-01 00:00:00','occaecati','gerson45@example.com','(215)666-2697x2496','2024-07-01 00:00:00','2024-06-03 00:00:00',2,1,1,'Sed reiciendis aliquid ut voluptate officia ratione.',0,1,0,'dcda','14335193621','hyrg','eum'),
(680,24,47,'2024-07-01 00:00:00','molestiae','kailey56@example.org','1-151-104-4456x297','2024-07-01 00:00:00','2024-06-03 00:00:00',1,2,1,'Placeat velit fuga excepturi tempore fuga nisi placeat dolores.',0,0,0,'dbgs','35205029470','sldh','hic'),
(687,17,44,'2024-07-01 00:00:00','pariatur','clovis.wuckert@example.org','103-804-9585x629','2024-07-01 00:00:00','2024-06-03 00:00:00',1,2,0,'Sint atque vero dolore porro in.',0,1,0,'kemy','25241449813','tqtq','vitae'),
(696,28,43,'2024-07-01 00:00:00','doloribus','vinnie05@example.com','+56(7)3855439598','2024-07-01 00:00:00','2024-06-03 00:00:00',2,2,2,'Perspiciatis error possimus dolorum eos ea labore.',0,1,0,'fjca','27908763654','hong','ut'),
(697,25,36,'2024-07-01 00:00:00','occaecati','cooper76@example.com','532-168-2473','2024-07-01 00:00:00','2024-06-03 00:00:00',2,1,0,'Nisi corrupti in ipsum et.',0,0,0,'nrij','15399500156','inrf','neque'),
(698,27,32,'2024-07-01 00:00:00','harum','gregg82@example.net','553.166.9248','2024-07-01 00:00:00','2024-06-03 00:00:00',2,2,2,'Totam quae id et odio assumenda sed.',0,0,0,'yzjb','16069843007','inxd','aut'),
(699,23,32,'2024-07-01 00:00:00','dolores','paucek.shyanne@example.net','(783)408-5778','2024-07-01 00:00:00','2024-06-03 00:00:00',2,2,1,'Vel deleniti molestiae itaque voluptas voluptatem in expedita deserunt.',0,0,0,'essq','29960483460','eunw','quam'),
(701,21,51,'2024-07-01 00:00:00','officiis','toby54@example.com','(502)273-9970x2511','2024-07-01 00:00:00','2024-06-03 00:00:00',1,1,0,'Eum aliquam voluptatem laudantium quia.',0,1,0,'kgpt','15143173790','rlme','vel'),
(703,21,37,'2024-07-01 00:00:00','harum','melisa10@example.org','1-778-458-6608x99517','2024-07-01 00:00:00','2024-06-03 00:00:00',1,1,2,'Officiis magnam sed temporibus sunt non rerum sed.',0,1,0,'vrmv','32072662190','lyon','reprehenderit');
-- --------------------- PROCUDURE--------------------------------------
-- -- check and update expire date
DELIMITER // CREATE PROCEDURE update_voucher_status() BEGIN -- Update status to 'expired' if the current date is greater than expire_date
UPDATE 
  voucher 
SET 
  status = 'expired' 
WHERE 
  expire_date < NOW() 
  AND status != 'expired';
END // DELIMITER;
