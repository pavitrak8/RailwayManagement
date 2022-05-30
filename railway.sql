SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

#Creating table for USER
CREATE TABLE IF NOT EXISTS `user`(
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Mbl_No` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE (`Mbl_No`),
  UNIQUE (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

#Creating table for PASSENGER
CREATE TABLE IF NOT EXISTS `passenger` (
  `pnr` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`pnr`,`name`,`age`,`gender`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#Creating table for TRAIN
CREATE TABLE IF NOT EXISTS `train` (
  `Train_no` int(11) NOT NULL AUTO_INCREMENT,
  `Train_name` varchar(50) NOT NULL,
  `tr_src` varchar(50) NOT NULL,
  `dept_time` time NOT NULL,
  `tr_dest` varchar(50) NOT NULL,
  `arr_time` time NOT NULL,
  `arr_day` varchar(10) DEFAULT NULL,
  `distance` int(11) NOT NULL,
  PRIMARY KEY (`Train_no`),
  KEY `tr_src` (`tr_src`),
  KEY `tr_dest` (`tr_dest`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

#Creating table for STATION
CREATE TABLE IF NOT EXISTS `station` (
  `stn_name` varchar(50) NOT NULL,
  `stn_code` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`stn_name`),
  KEY `stn_code` (`stn_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

#Creating table for TICKET
CREATE TABLE IF NOT EXISTS `ticket` (
  `tid` int(11) NOT NULL,
  `doj` date NOT NULL,
  `tfare` int(11) NOT NULL,
  `class` varchar(50) NOT NULL,
  `nos` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `src` varchar(50) NOT NULL,
  `dest` varchar(50) NOT NULL,
  `Train_no` int(11) NOT NULL,
  `pnr` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pnr`),
  FOREIGN KEY(`tid`) references user(`UID`),
  FOREIGN KEY(`src`) references station(`stn_name`),
  FOREIGN KEY(`dest`) references station(`stn_name`),
  FOREIGN KEY(`Train_no`) references train(`Train_no`),
  UNIQUE KEY `UNIQUE` (`tid`,`Train_no`,`doj`,`status`),
  UNIQUE KEY `pnr` (`pnr`,`tid`,`Train_no`,`doj`,`class`,`status`),
  UNIQUE KEY `pnr_2` (`pnr`,`tid`,`Train_no`,`src`,`dest`,`doj`,`tfare`,`class`,`nos`,`status`),
  KEY `FK_ID` (`tid`),
  KEY `FK_TN_DOJ_C` (`Train_no`,`doj`,`class`),
  KEY `class` (`class`),
  KEY `src` (`src`,`dest`),
  KEY `dest` (`dest`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


#Creating table for CANCELLED
CREATE TABLE IF NOT EXISTS `cancelled` (
  `pnr` int(10) NOT NULL,
  `rfare` int(11) DEFAULT '0',
  FOREIGN KEY(`pnr`) references passenger(`pnr`),
  PRIMARY KEY (`pnr`,`rfare`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#Creating table for SCHEDULE
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Train_no` int(11) NOT NULL,
  `station_name` varchar(50) NOT NULL,
  `arrival_time` time NOT NULL,
  `departure_time` time NOT NULL DEFAULT '00:00:00',
  `distance` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(`Train_no`) references train(`Train_no`),
  KEY `Train_no` (`Train_no`),
  KEY `station_name` (`station_name`),
  KEY `id` (`id`),
  KEY `distance` (`distance`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

#Creating table for CLASS
CREATE TABLE IF NOT EXISTS `class` (
  `cname` varchar(5) NOT NULL,
  PRIMARY KEY (`cname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#Creating table for CLASS_SEATS
CREATE TABLE IF NOT EXISTS `classseats` (
  `Train_no` int(11) NOT NULL,
  `sp` varchar(50) NOT NULL COMMENT 'Starting_Point',
  `dp` varchar(50) NOT NULL COMMENT 'Destination_Point',
  `DOJ` date NOT NULL,
  `class` varchar(10) NOT NULL,
  `fare` int(11) NOT NULL,
  `seatsleft` int(11) NOT NULL,
  PRIMARY KEY (`Train_no`,`sp`,`dp`,`doj`,`class`),
  FOREIGN KEY(`Train_no`) references train(`Train_no`),
  FOREIGN KEY(`sp`) references station(`stn_name`),
  FOREIGN KEY(`dp`) references station(`stn_name`),
  FOREIGN KEY(`class`) references class(`cname`),
  KEY `class` (`class`),
  KEY `sp` (`sp`,`dp`),
  KEY `dp` (`dp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



#Insert values into USER
INSERT INTO `user` (`UID`, `Email`, `Password`, `Mbl_no`, `DOB`) VALUES
(1005631456, 'anisha5528@gmail.com', 'ani5528', '9812369024', '1998-04-09'),
(1005631254, 'rah2ul@gmail.com', 'rah2ul', '9701258262', '1964-02-27'),
(1005631245, 'preemsid@gmail.com', 'prem5#', '9912452786', '1963-05-04'),
(1005631376, 'sheetalvi2@gmail.com', 'shee@#', '9138050328', '1963-11-25'),
(1005631687, 'vinayabcd@gmail.com', 'vin#ya', '9258099443', '1959-05-08'),
(1005631432, 'akhilkumar@gmail.com', 'akhi234', '9433807644', '1991-09-24'),
(1005631522, 'aishu@gmail.com', 'ais2345', '9344280679', '1966-06-26'),
(1005631209, 'primal@gmail.com', 'pri#@l', '9467389055', '1956-08-22'),
(1005631234, 'pavi@gmail.com', 'pavi6y8', '9567832997', '1998-05-31'),
(1005631500, 'tina@gmail.com', 'tin12@34', '9647788321', '1997-03-29');

#Insert values into PASSENGER
INSERT INTO `passenger` (`pnr`, `name`, `age`, `gender`) VALUES
(1234768941, 'Anisha', 23, 'F'),
(1233568949, 'Rahul', 57, 'M'),
(1234767948, 'Prem', 58, 'M'),
(1246768954, 'Sheetal', 58, 'F'),
(1234767935, 'Vinay', 62, 'M'),
(1234764895, 'Akhil', 30, 'M');

#Insert values into TRAIN
INSERT INTO `train` (`Train_no`, `Train_name`, `tr_src`, `dept_time`, `tr_dest`,`arr_time`, `arr_day`, `distance`) VALUES
(13457, 'DURONTO EXPRESS', 'YESHWANTHPUR', '23:40:00', 'HYDERABAD', '13:55:00', 'Day 2', 700),
(16517, 'KANNUR Express', 'YESHWANTHPUR', '20:00:00', 'KANNUR', '10:30:00', 'Day 2', 650),
(16518, 'KANNUR Express', 'KANNUR', '18:00:00', 'YESHWANTHPUR', '09:30:00', 'Day 2', 650),
(02302, 'HOWRAH RAJDHANI EXPRESS', 'NEW DELHI', '16:50:00', 'HOWRAH', '09:55:00', 'Day 2', 670),
(12697, 'TRIVANDRUM EXPRESS', 'CHENNAI CENTRAL', '15:10:00', 'TRIVANDRUM', '07:05:00', 'Day 2', 500),
(19568, 'VIVEK EXPRESS', 'AHMEDABAD', '10:00:00', 'MADURAI', '03:45:00', 'Day 3', 800),
(09321, 'TIRUKKURAL EXPRESS', 'CHENNAI', '08:05:00', 'NEW DELHI', '22:00:00', 'Day 3', 1410),
(06078, 'HAZRAT NIZAMUDDIN EXPRESS', 'NEW DELHI', '08:30:00', 'YESHWANTHPUR', '00:10:00', 'Day 3', 1200),
(06253, 'KONARK EXPRESS', 'HYDERABAD', '23:30:00', 'MUMBAI CENTRAL', '18:05:00', 'Day 2', 700),
(16524, 'KARWAR EXPRESS', 'YESHWANTHPUR', '20:00:00', 'KARWAR', '12:50:00', 'Day 2', 750),
(12133, 'MARUSAGAR EXPRESS', 'MUMBAI CENTRAL', '23:02:00', 'KARWAR', '09:58:00', 'Day 2', 800),
(17682, 'RAJDHANI EXPRESS', 'NEW DELHI', '16:35:00', 'MUMBAI CENTRAL', '09:00:00', 'Day 2 ', 900),
(17683, 'RAJDHANI EXPRESS', 'MUMBAI CENTRAL', '01:00:00', 'NEW DELHI', '20:30:00', 'Day 1', 900);

#Insert values into STATION
INSERT INTO `station` (`stn_name`, `stn_code`) VALUES
('MADURAI', 1245),
('CHENNAI CENTRAL', 2431),
('YESHWANTHPUR', 1087),
('MUMBAI CENTRAL', 3567),
('HOWRAH', 1410),
('AHMEDABAD', 1325),
('NEW DELHI', 1567),
('HYDERABAD', 3521),
('TRIVANDRUM', 1754),
('MANGALORE CENTRAL', 1256),
('KARWAR', 1270),
('KANNUR', 2450);

#Insert values into TICKET
INSERT INTO `ticket` (`tid`, `doj`, `tfare`, `class`, `nos`, `status`, `src`, `dest`, `Train_no`, `pnr`) VALUES
(1005631456, '2021-12-30', 750, '1A', 2, 'BOOKED', 'YESHWANTHPUR', 'KARWAR', 16524, 1233568949),
(1005631254, '2021-12-07', 500, 'SL', 1, 'BOOKED', 'CHENNAI CENTRAL', 'TRIVANDRUM', 12697, 1246768954),
(1005631245, '2021-12-26', 2300, '3AC', 4, 'CANCELLED', 'MUMBAI CENTRAL', 'NEW DELHI', 17683, 1234764895),
(1005631376, '2021-12-25', 800, 'SL', 2, 'CANCELLED', 'MUMBAI CENTRAL', 'KARWAR', 12133, 1234768941),
(1005631432, '2021-12-11', 1200, '2AC', 1, 'BOOKED', 'NEW DELHI', 'YESHWANTHPUR', 06078, 1273568948);

#Insert values into CANCELLED
INSERT INTO `cancelled` (`pnr`, `rfare`) VALUES
(1234768941, 550),
(1234764895, 300);

#Insert values into SCHEDULE
INSERT INTO `schedule` (`id`, `Train_no`, `station_name`, `arrival_time`, `departure_time`, `distance`) VALUES
(433, 13457, 'YESHWANTHPUR', '23:40:00', '23:40:00', 0),
(434, 13457, 'HINDUPUR', '01:13:00', '01:15:00', 96),
(435, 13457, 'ANANTHAPURAM', '04:15:00', '04:20:00', 220),
(436, 13457, 'KURNOOL', '08:47:00', '08:50:00', 306),
(437, 13457, 'HYDERABAD', '13:55:00', '13:55:00', 664),
(133, 16517, 'YESHWANTHPUR', '20:00:00', '20:00:00', 0),
(134, 16517, 'MYSORE', '22:30:00', '22:35:00', 138),
(135, 16517, 'HASSAN', '01:00:00', '01:03:00', 258),
(136, 16517, 'MANGALORE CENTRAL', '08:00:00', '08:10:00', 447),
(137, 16517, 'KANNUR', '10:30:00', '10:30:00', 635),
(143, 16518, 'KANNUR', '18:00:00', '18:00:00', 0),
(144, 16518, 'SUBRAHMANYA ROAD', '23:55:00', '23:58:00', 224),
(145, 16518, 'MANDYA', '07:08:00', '07:10:00', 486),
(146, 16518, 'KENGERI', '08:15:00', '08:20:00', 567),
(147, 16518, 'YESHWANTHPUR', '09:30:00', '09:30:00', 635),
(173, 02302, 'NEW DELHI', '16:50:00', '16:50:00', 0),
(174, 02302, 'PRAYAGPUR', '23:43:00', '23:45:00', 635),
(175, 02302, 'GAYA', '03:55:00', '03:58:00', 992),
(176, 02302, 'DHANBAD', '06:33:00', '06:38:00', 1192),
(177, 02302, 'HOWRAH', '09:55:00', '09:55:00', 1447),
(213, 12697, 'CHENNAI', '15:10:00', '15:10:00', 0),
(214, 12697, 'SALEM', '19:37:00', '19:40:00', 334),
(215, 12697, 'ERNAKULAM', '01:55:00', '02:00:00', 684),
(216, 12697, 'KOLLAM', '05:12:00', '05:15:00', 840),
(217, 12697, 'TRIVANDRUM', '07:05:00', '07:05:00', 982),
(243, 19568, 'AHMEDABAD', '10:00:00', '10:00:00', 0),
(244, 19568, 'SURAT', '14:25:00', '14:35:00', 230),
(245, 19568, 'KALYAN', '19:42:00', '19:45:00', 586),
(246, 19568, 'SALEM', '01:20:00', '01:25:00', 1890),
(247, 19568, 'MADURAI', '03:45:00', '03:45:00', 2077),
(103, 09321, 'CHENNAI CENTRAL', '08:05:00', '08:05:00', 0),
(104, 09321, 'ITARSI', '07:45:00', '07:48:00', 1390),
(105, 09321, 'GWALIOR', '14:16:00', '14:30:00', 1869),
(106, 09321, 'AGRA', '17:50:00', '17:55:00', 1988),
(107, 09321, 'NEW DELHI', '22:00:00', '22:00:00', 2182),
(113, 06078, 'NEW DELHI', '08:30:00', '08:30:00', 0),
(114, 06078, 'AGRA', '10:55:00', '11:00:00', 188),
(115, 06078, 'ITARSI', '18:40:00', '18:45:00', 787),
(116, 06078, 'KACHEGUDA', '08:35:00', '08:40:00', 1667),
(117, 06078, 'HINDUPUR', '18:18:00', '18:20:00', 2192),
(118, 06078, 'YESHWANTHPUR', '00:10:00', '00:10:00', 2745),
(163, 06253, 'HYDERABAD', '23:30:00', '23:30:00', 0),
(164, 06253, 'WADI', '03:45:00', '03:50:00', 185),
(165, 06253, 'SOLAPUR', '06:40:00', '06:45:00', 335),
(166, 06253, 'PUNE', '12:05:00', '12:10:00', 598),
(167, 06253, 'MUMBAI CENTRAL', '18:05:00', '18:05:00', 790),
(123, 16524, 'YESHWANTHPUR', '20:00:00', '20:00:00', 0),
(124, 16524, 'SAKLESHPUR', '00:15:00', '00:17:00', 216),
(125, 16524, 'SURATHKAL', '06:00:00', '06:05:00', 435),
(126, 16524, 'KUNDAPURA', '08:00:00', '08:10:00', 539),
(127, 16524, 'KARWAR', '12:50:00', '12:50:00', 761),
(303, 12133, 'MUMBAI CENTRAL', '23:02:00', '23:02:00', 0),
(304, 12133, 'THANE', '23:33:00', '23:35:00', 34),
(305, 12133, 'RATNAGIRI', '04:40:00', '04:45:00', 431),
(306, 12133, 'MADGAON', '09:00:00', '09:10:00', 765),
(307, 12133, 'KARWAR', '09:58:00', '09:58:00', 860),
(333, 17682, 'NEW DELHI', '16:35:00', '16:35:00', 0),
(334, 17682, 'RAJASTHAN', '20:00:00', '20:10:00', 1100),
(335, 17682, 'MADHYA PRADESH', '03:30:00', '03:33:00', 1500),
(336, 17682, 'MUMBAI CENTRAL', '09:00:00', '09:00:00', 2300),
(314, 17683, 'MUMBAI CENTRAL', '01:00:00', '01:00:00', 0),
(315, 17683, 'MADHYA PRADESH', '05:30:00', '05:40:00', 1500),
(316, 17683, 'RAJASTHAN', '15:45:00', '15:50:00', 2000),
(317, 17683, 'NEW DELHI', '20:30:00', '20:30:00', 2300);

#Insert values into CLASS
INSERT INTO `class` (`cname`) VALUES
('1A'),
('1AC'),
('2AC'),
('3AC'),
('CC'),
('2S'),
('SL');

#Insert values into CLASS_SEATS
INSERT INTO `classseats` (`Train_no`, `sp`, `dp`, `DOJ`, `class`, `fare`, `seatsleft`) VALUES
(16524, 'YESHWANTHPUR', 'KARWAR', '2021-12-30', 'SL', 750, 107),
(16524, 'YESHWANTHPUR', 'KARWAR', '2021-12-30', '1AC', 2500, 87),
(16524, 'YESHWANTHPUR', 'KARWAR', '2021-12-30', '2AC', 1250, 57),
(16524, 'YESHWANTHPUR', 'KARWAR', '2021-12-30', '3AC', 1150, 95),
(17682, 'NEW DELHI', 'MUMBAI CENTRAL', '2021-12-31', 'SL', 900, 95),
(17682, 'NEW DELHI', 'MUMBAI CENTRAL', '2021-12-31', '1AC', 2300, 85),
(17682, 'NEW DELHI', 'MUMBAI CENTRAL', '2021-12-31', '2AC', 1850, 105),
(17682, 'NEW DELHI', 'MUMBAI CENTRAL', '2021-12-31', '3AC', 1500, 57),
(06253, 'HYDERABAD', 'MUMBAI CENTRAL', '2021-12-27', 'SL', 700, 27),
(06253, 'HYDERABAD', 'MUMBAI CENTRAL', '2021-12-27', '1AC', 2000, 47),
(06253, 'HYDERABAD', 'MUMBAI CENTRAL', '2021-12-27', '2AC', 1600, 70),
(06253, 'HYDERABAD', 'MUMBAI CENTRAL', '2021-12-27', '3AC', 1100, 17);



#Creating Trigger for CLASS_SEATS
DROP TRIGGER IF EXISTS `before_insert_on_classseats`;
DELIMITER //
CREATE TRIGGER `before_insert_on_classseats` BEFORE INSERT ON `classseats`
 FOR EACH ROW begin
if datediff(curdate(),new.DOJ)>0 then
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = 'Improper date!!! Please check it!';
end if;
if new.fare<=0 then 
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Check fare!!!';
end if;
if new.seatsleft<=0 then 
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Check seats!!!';
end if;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_update_on_classseats`;
DELIMITER //
CREATE TRIGGER `before_update_on_classseats` BEFORE UPDATE ON `classseats`
 FOR EACH ROW begin
if datediff(curdate(),new.DOJ)>0 then
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Improper date!!! Please check it!';
end if;
if new.fare<=0 then 
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Check fare!!!';
end if;
if new.seatsleft<=0 then 
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Check seats!!!';
end if;
end
//
DELIMITER ;


#Creating Trigger for CLASS_SEATS
DROP TRIGGER IF EXISTS `before_insert_on_passenger`;
DELIMITER //
CREATE TRIGGER `before_insert_on_passenger` BEFORE INSERT ON `passenger`
 FOR EACH ROW begin
if new.gender NOT IN ('M','F') then
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Enter M:Male F:Female.';
end if;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_update_on_passenger`;
DELIMITER //
CREATE TRIGGER `before_update_on_passenger` BEFORE UPDATE ON `passenger`
 FOR EACH ROW begin
if new.gender NOT IN ('M','F') then
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Enter M:Male F:Female.';
end if;
end
//
DELIMITER ;


#Creating Trigger for TICKET
DROP TRIGGER IF EXISTS `after_insert_on_ticket`;
DELIMITER //
CREATE TRIGGER `after_insert_on_ticket` AFTER INSERT ON `ticket`
 FOR EACH ROW begin
UPDATE classseats SET seatsleft=seatsleft-new.nos where Train_no=new.Train_no AND class=new.class AND DOJ=new.doj;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `after_update_on_ticket`;
DELIMITER //
CREATE TRIGGER `after_update_on_ticket` AFTER UPDATE ON `ticket`
 FOR EACH ROW begin
if (new.status='CANCELLED' AND datediff(new.doj,curdate())<0 ) then
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Cancellation Not Possible!!!!';
end if;

if (new.status='CANCELLED' AND datediff(new.doj,curdate())>0 )then
UPDATE classseats SET seatsleft=seatsleft+new.nos where Train_no=new.Train_no AND class=new.class AND DOJ=new.doj;
 if datediff(new.doj,curdate())>=30 then 
 INSERT INTO cancelled values (new.pnr,new.tfare);
 end if;
 if datediff(new.doj,curdate())<30 then 
 INSERT INTO cancelled values (new.pnr,0.5*new.tfare);
 end if;
end if;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_insert_on_ticket`;
DELIMITER //
CREATE TRIGGER `before_insert_on_ticket` BEFORE INSERT ON `ticket`
 FOR EACH ROW begin
if new.tfare<0 then
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Negative balance NOT possible';
end if;
if new.nos<=0 then
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Negative OR 0 seats NOT possible';
end if;
if (select seatsleft from classseats where Train_no=new.Train_no AND class=new.class AND DOJ=new.doj AND sp=new.src AND dp=new.dest) < new.nos then 
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Not enough seats available!!!';
end if;
if datediff(new.doj,curdate())<0 then
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Booking Not Possible!!!!';
end if;
SET new.status='BOOKED';
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_update_on_ticket`;
DELIMITER //
CREATE TRIGGER `before_update_on_ticket` BEFORE UPDATE ON `ticket`
 FOR EACH ROW begin
if new.tfare<0 then
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Negative balance NOT possible';
end if;
if new.nos<=0 then
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Negative OR 0 seats NOT possible';
end if;
if (select seatsleft from classseats where Train_no=new.Train_no AND class=new.class AND DOJ=new.doj AND sp=new.src AND dp=new.dest) < new.nos then 
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Not enough seats available!!!';
end if;
end
//
DELIMITER ;


#Creating Trigger for Train
DROP TRIGGER IF EXISTS `before_insert_on_train`;
DELIMITER //
CREATE TRIGGER `before_insert_on_train` BEFORE INSERT ON `train`
 FOR EACH ROW begin
if (new.arr_time<new.dept_time AND new.arr_day='Day 1') then
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Improper Timings';
end if;
if (new.tr_dest=new.tr_src) then
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Same Starting & Destination Points not allowed';
end if;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_update_on_train`;
DELIMITER //
CREATE TRIGGER `before_update_on_train` BEFORE UPDATE ON `train`
 FOR EACH ROW begin
if (new.arr_time<new.dept_time AND new.arr_day='Day 1') then
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Improper Timings';
end if;
end
//
DELIMITER ;


#Creating Trigger for USER
DROP TRIGGER IF EXISTS `before_insert_on_user`;
DELIMITER //
CREATE TRIGGER `before_insert_on_user` BEFORE INSERT ON `user`
 FOR EACH ROW begin
if (year(curdate())-year(new.DOB))<18 then 
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Minimum age for registering must be 18 years.';
end if;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_update_on_user`;
DELIMITER //
CREATE TRIGGER `before_update_on_user` BEFORE UPDATE ON `user`
 FOR EACH ROW begin
if (year(curdate())-year(new.DOB))<18 then 
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Minimum age for registering must be 18 years.';
end if;
end
//
DELIMITER ;