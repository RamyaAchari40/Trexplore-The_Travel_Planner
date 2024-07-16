-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 05:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trexplore`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `TripId` int(10) NOT NULL,
  `TA_id` varchar(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Adress` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`TripId`, `TA_id`, `Name`, `Adress`, `cost`, `contact`) VALUES
(1, 'TA201', 'Zain Rental House', 'Kasturba Road, Opposite to High Court, Bengaluru   near cubbon park', '1000 per night', '9876543214'),
(1, 'TA201', 'Urshitha AirBnB', 'Jayanagar, Benagluru near cubbon park', '2000 per night', '9875632145'),
(1, 'TA202', 'Sahana AirBnB', 'bannerughatta, Bengaluru', '1000 per night', '3265489756'),
(1, 'TA202', 'Shamitha Rents', 'bannerughatta, 6 th cross, Bengaluru', '1000 per night', '9865478956'),
(2, 'TA203', 'Rahul Homes', 'lalbhag road,near BMTC Office', '800 per night', '8895647895'),
(2, 'TA204', 'Sanket Rentals', 'Ballalbagh, Mangalore', '750 per night', '8887956235'),
(1, 'TA201', 'Zain Rental House', 'Kasturba Road, Opposite to High Court, Bengaluru', '1000 per night', '9856235412'),
(1, 'TA201', 'Urshitha AirBnB', 'Jayanagar, Benagluru', '2000 per night', '8756452310'),
(1, 'TA202', 'Sahana AirBnB', 'K P nagar, Bengaluru', '1000 per night', '5655698654'),
(1, 'TA202', 'Shamitha Rents', 'Harappanahalli, 6 th cross, Bengaluru', '1000 per night', '8756489561'),
(2, 'TA203', 'Rahul Homes', 'Pumpwell, kankanady, Mangalore', '800 per night', '9856231478'),
(2, 'TA204', 'Sanket Rentals', 'Ballalbagh, Mangalore', '750 per night', '8745210325');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `TransportationId` varchar(100) NOT NULL,
  `Bustype` enum('Government','Private','','') NOT NULL,
  `TravelAgency` varchar(1000) NOT NULL,
  `Cost` decimal(20,2) NOT NULL,
  `Time` time NOT NULL,
  `Type` varchar(300) NOT NULL,
  `Travelling Time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`TransportationId`, `Bustype`, `TravelAgency`, `Cost`, `Time`, `Type`, `Travelling Time`) VALUES
('T303', 'Government', 'KSRTC', 1000.00, '10:30:00', 'Airavata Club Class AC Sleeper', '10:00'),
('T303', 'Government', 'KSRTC', 700.00, '00:00:00', 'Rajahamsa Executive', '10:30'),
('T303', 'Government', 'KSRTC', 800.00, '20:10:00', 'Non AC Sleeper', '11:00'),
('T303', 'Private', 'Sugama', 1000.00, '21:00:00', 'Non AC Sleeper', '9:00'),
('T303', 'Private', 'Durgamba Motors', 850.00, '22:00:00', 'Ac Sleeper', '9:30'),
('T307', 'Government', 'KSRTC', 700.00, '16:30:00', 'Non AC Sleeper', '10:00'),
('T307', 'Government', 'KSRTC', 650.00, '00:00:00', 'KSRTC', '8:00'),
('T307', 'Private', 'Ganesh Travels', 650.00, '16:30:00', 'Non AC Sleeper', '9:00'),
('T307', 'Private', 'VRL', 600.00, '15:00:00', 'Ac Sleeper', '9:30');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `TripId` int(11) NOT NULL,
  `going_to` varchar(100) DEFAULT NULL,
  `going_from` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`TripId`, `going_to`, `going_from`) VALUES
(1, 'Bengalore', 'Mangalore'),
(2, 'Mangalore', 'Bengalore'),
(3, 'Mysore', 'Sirsi'),
(4, 'Sirsi', 'Mysore'),
(5, 'Kumta', 'Sirsi');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `TransportationId` varchar(100) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `Time` time NOT NULL,
  `TravellingTime` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`TransportationId`, `companyName`, `Time`, `TravellingTime`) VALUES
('T301', 'Indigo', '12:00:00', '1:05 Hrs'),
('T301', 'Airbus', '03:00:00', '1:00 Hrs'),
('T305', 'Airbus', '00:00:00', '1:10 Hrs'),
('T305', 'Indigo', '21:00:00', '1:00 Hrs');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `TripId` int(11) NOT NULL,
  `TA_id` varchar(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Adress` varchar(1000) NOT NULL,
  `About` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`TripId`, `TA_id`, `Name`, `Adress`, `About`) VALUES
(1, 'TA201', 'The Bengaluru Cafe', 'Kasturba Road, Opposite to high court, Bengaluru', 'Restaurants in Bangalore, Bangalore Restaurants, Shanti Nagar restaurants, Best Shanti Nagar restaurants, Central Bangalore restaurants, Casual Dining in Bengaluru, Casual Dining near me, Casual Dining in Central Bangalore, Casual Dining in Shanti Nagar, in Bengaluru, near me, in Central Bangalore, in Shanti Nagar, in Bengaluru, near me, in Central Bangalore, in Shanti Nagar, Order food online in Shanti Nagar, Order food online in Bengaluru, Order food online in Central Bangalore, New Year Parties in Bengaluru, Christmas\' Special in Bengaluru'),
(1, 'TA202', 'South Ruchis Square', 'Gandhinagar, Bengaluru', ' South Ruchis is the paradise of restaurants for the vegetarian, organic and healthy food lovers, the cuisine offered at the South Ruchis is South Indian, North Indian and Chinese. The vegetarian dishes served are quintessentially some of the best that permanently lingers on the guests taste-buds making them to revisit the restaurant.'),
(2, 'TA203', 'Machali hotel', 'Hampankatta, Mangalore', ' “ Machali “ specialized in coastal Karnataka cuisine was started around 5 years back with intention of providing homely food to customers..the main intention here is to serve the freshest sea food possible as we procure them on daily basis . We also undertake bulk orders for outdoors.. in past five years we have gained a large no of customers base and goodwill from all parts of country and abroad\r\n\r\n'),
(2, 'TA204', 'The Buddha Cafe', 'DheralaKatte, Mangalore', ' This restaurant offers its guests to try Chinese and Indian cuisines. Its worth visiting Big Buddha Cafe to try nicely cooked ramen, white sauce pasta and momos. You will be offered great coffee or good ice tea.\r\n\r\nThis place is well known for its great service and friendly staff, that is always ready to help you. Low prices at this spot are good news for its customers. You will certainly like the comfortable ambiance. Google users awarded this restaurant 4.3.');

-- --------------------------------------------------------

--
-- Table structure for table `touristattractions`
--

CREATE TABLE `touristattractions` (
  `TA_id` varchar(10) NOT NULL,
  `TripId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Adress` varchar(100) NOT NULL,
  `Cost` decimal(10,2) NOT NULL,
  `Description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `touristattractions`
--

INSERT INTO `touristattractions` (`TA_id`, `TripId`, `Name`, `Adress`, `Cost`, `Description`) VALUES
('TA201', 1, 'Cubbon Park', 'Kasturba Road, Behind High Court of Karnataka, Ambedkar Veedhi, Sampangi Rama Nagara, Bengaluru, Kar', 0.00, 'Cubbon Park, officially Sri Chamarajendra Park, is a landmark park in Bengaluru, located in the heart of the city in the Central Administrative Area. Originally created in 1870 under Major General Richard Sankey, then British Chief Engineer of Mysore State, it covered an area of 100 acres'),
('TA202', 1, 'Bannerghatta National Park', 'bannerughatta, Bengaluru, Karnataka', 260.00, 'Bannerghatta National Park is a national park in India, located near Bangalore, Karnataka. It was founded in 1970 and declared as a national park in 1974. In 2002, a small portion of the park became a zoological garden, the Bannerghatta Biological Park.'),
('TA203', 2, 'Kudroli Gokarnanatheshwara Temple', 'Kudroli, Manglore', 0.00, 'The Gokarnanatheshwara Temple, otherwise known as Kudroli Sri Gokarnanatha Kshetra, is in the Kudroli area of Mangalore in Karnataka, India. It was consecrated by Narayana Guru. It is dedicated to Gokarnanatha, a form of Lord Shiva.'),
('TA204', 2, 'Manjunatha Temple', 'Kadri, Manglore', 0.00, 'The temple of Manjunatheshwara on the hills of Kadri is said to be built during the 10th or 11th century. It was converted to a complete stone structure during the 14th century.\r\n\r\nThe bronze (panchlauha) idol of Lokeshwar (identified as Brahma), about 5 feet high, of the temple is called as oldest of the South Indian temples.'),
('TA209', 5, 'Vannalli Beach', 'Hedbander, Vannalli Rd, Kumta, Karnataka 581343', 0.00, 'Undoubtedly, Vannalli beach in Kumta is one of the most scenic and picture-perfect beaches along the shores of the Arabian Sea. This hidden paradise appears like an arch or a bow when viewed from the sky. With soft golden sands, blueish water, mild waves, palm grooves along the shores, colorful rocks, and seagulls flying everywhere this beach is sure to blow you off the ground with its beauty.\r\n\r\n'),
('TA210', 5, 'Sharavathi Kandla Mangrove Boardwalk', 'Honnavar,Karnataka', 0.00, 'A walk through this beautiful wooden walkway amidst the lush green Mangrove trees is one of the beautiful ways to enjoy nature and also helps in calming your mind. Its the best place to spend 1 to 2 hours easily. Moreover Mangroves are always green irrespective of the season , they are salt tolerant, helps in filtering out the heavy metals from water, and prevents erosion in coastal areas. '),
('TA301', 3, 'Shri Chamundeshwari Temple', 'Chamundi Hill, Mysuru, Karnataka 570010', 0.00, 'Sri Chamundeshwari Temple is about 13 kms from Mysuru, which is a prominent city in Karnataka State, India. Sri Chamundeshwari Temples is famous not only in India but also abroad. Atop of the hill the famous Sri Chamundeswari Temple. ‘Chamundi’ or ‘Durga’ is the fierce form of ‘Shakti’. She is the slayer of demons, ‘Chanda’ and ‘Munda’ and also ‘Mahishasura’, the buffalow-headed monster.'),
('TA302', 3, 'Krishnaraja Sagar (KRS) Dam', '12 Kms North-West Of Mysore, Srirangapatna, Karnataka 571607', 20.00, 'The Krishna Raja Sagara Dam (KRS Dam) was built across river Kaveri, the life-giving river for the Mysore and Mandya districts, in 1924. Apart from being the main source of water for irrigation in the most fertile Mysore and Mandya, the reservoir is the main source of drinking water for all of Mysore city and almost the whole of Bangalore city, the capital of the state of Karnataka.'),
('TA401', 4, 'Shri Marikamba Temple', 'Marikamba Road, Sirsi-581401', 0.00, 'Sirsi Marikamba Temple is a Hindu temple dedicated to Marikamba Devi ( Durga Devi ), located in Sirsi, Karnataka, It is also known as Marigudi, It was built in 1688, Sirsi Shri Marikamba Devi is \"elder sister\" of all Marikamba Devi\'s in Karnataka.'),
('TA402', 4, 'Sahasralinga ', 'River Shalmala, Hulgol, Sirsi, Uttara Kannada District, Karnataka 581336', 0.00, 'About 17 km from Sirsi, near the village of Sonda, quietly flows the river Shalmala. Surrounded by forests a part of this river hides an incredible heritage and a piece of history. he big and small stones have Shivalingas carved on them. Legend is that there are more than a thousand Linga hence the name Sahasralinga. Most of them even have the Nandi – Shiva’s vehicle carved on them. Some stones here even have more than one Shivalingas. ');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `TransportationId` varchar(100) NOT NULL,
  `TrainName` varchar(100) NOT NULL,
  `TrainNumber` int(100) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`TransportationId`, `TrainName`, `TrainNumber`, `Time`) VALUES
('T302', 'Murdeshwara Express', 16585, '20:15:00'),
('T302', 'Kannur Express', 16511, '21:35:00'),
('T306', 'Murdeshwara Express', 16585, '23:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE `transportation` (
  `TransportationId` varchar(100) NOT NULL,
  `TripId` int(11) NOT NULL,
  `Mode` enum('flight','bus','train','other private vehicles') NOT NULL,
  `goingfrom` varchar(100) NOT NULL,
  `going_to` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`TransportationId`, `TripId`, `Mode`, `goingfrom`, `going_to`) VALUES
('T301', 1, 'flight', 'Mangalore', 'bengalore'),
('T302', 1, 'train', 'Mangalore', 'Bengalore'),
('T303', 1, 'bus', 'Mangalore', 'Bengalore'),
('T305', 2, 'flight', 'Bengalore', 'Mangalore'),
('T306', 2, 'train', 'Bengalore', 'Mangalore'),
('T307', 2, 'bus', 'Bengalore', 'Mangalore');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`) VALUES
(2, 'sahana', 'bhajantrisahana2@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', '5a2fd468f2944797bc926c43c0842f77.jpg'),
(3, 'sanket', 'sanketambig2003@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'code.jpg'),
(5, 'saku', 'saku@7423', '116fa690d8dd9c3bd7465b59158f995c', '5a2fd468f2944797bc926c43c0842f77.jpg'),
(6, 'Prakrithi Sujir', 'prakrithi@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'IMG-20210426-WA0018.jpg'),
(14, 'ramya', 'ram@123', 'c20ad4d76fe97759aa27a0c99bff6710', 'Screenshot 2023-08-27 110337.png'),
(15, 'ram', 'ram@123', '289dff07669d7a23de0ef88d2f7129e7', 'CALC.png'),
(16, 'er24r', 'ravi2@gmail.com', '202cb962ac59075b964b07152d234b70', 'Screenshot 2023-08-27 110337.png'),
(17, 'Urshi', 'Urshi@456', '202cb962ac59075b964b07152d234b70', 'Rahh.jpeg.png'),
(18, 'ramya', 'ramyya1@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-03-20.png'),
(19, 'shamanth', 'sanket@12gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '4.png'),
(20, 'shamanth', 'sanket@gmail.com', '43cca4b3de2097b9558efefd0ecc3588', 'Screenshot 2024-03-08 175425.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD KEY `TripId` (`TripId`),
  ADD KEY `TA_Id` (`TA_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD KEY `TransportationId` (`TransportationId`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`TripId`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD KEY `TransportationId` (`TransportationId`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD KEY `TA_id` (`TA_id`),
  ADD KEY `tripId_fk` (`TripId`);

--
-- Indexes for table `touristattractions`
--
ALTER TABLE `touristattractions`
  ADD PRIMARY KEY (`TA_id`),
  ADD KEY `TripId` (`TripId`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD KEY `TransportationId` (`TransportationId`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`TransportationId`),
  ADD KEY `TripId` (`TripId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `TripId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9223372036854775807;

--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `TripId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD CONSTRAINT `accommodations_ibfk_1` FOREIGN KEY (`TripId`) REFERENCES `destination` (`TripId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accommodations_ibfk_2` FOREIGN KEY (`TA_id`) REFERENCES `touristattractions` (`TA_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`TransportationId`) REFERENCES `transportation` (`TransportationId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`TransportationId`) REFERENCES `transportation` (`TransportationId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`TripId`) REFERENCES `destination` (`TripId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_ibfk_2` FOREIGN KEY (`TA_id`) REFERENCES `touristattractions` (`TA_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `touristattractions`
--
ALTER TABLE `touristattractions`
  ADD CONSTRAINT `touristattractions_ibfk_2` FOREIGN KEY (`TripId`) REFERENCES `destination` (`TripId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `train`
--
ALTER TABLE `train`
  ADD CONSTRAINT `train_ibfk_1` FOREIGN KEY (`TransportationId`) REFERENCES `transportation` (`TransportationId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transportation`
--
ALTER TABLE `transportation`
  ADD CONSTRAINT `transportation_ibfk_1` FOREIGN KEY (`TripId`) REFERENCES `destination` (`TripId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
