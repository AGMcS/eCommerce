-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 07:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `dummyform`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountID` varchar(7) NOT NULL,
  `AdminID` varchar(7) DEFAULT NULL,
  `FirstName` varchar(32) NOT NULL,
  `LastName` varchar(32) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `City` varchar(32) NOT NULL,
  `Country` varchar(32) NOT NULL,
  `Postcode` varchar(8) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountID`, `AdminID`, `FirstName`, `LastName`, `Street`, `City`, `Country`, `Postcode`, `Email`, `Password`) VALUES
('US12345', 'AD12345', 'Admin', 'Admin', 'Admin', 'London', 'England', 'BT5 6RT', 'admin@gmail.com', 'admin'),
('US26359', NULL, 'John', 'Lyn', '123 Garden Row', 'Portrush', 'England', 'BT8 3RT', 'johndeer@gmail.com', '123'),
('US30503', NULL, 'Laura', 'Cummings', '30 Greenfield Way', 'Limavady', 'Northern Ireland', '1234 5T6', 'laura.cummings@gmail.com', '$2y$10$eStZwPVzd5fn73VFGxOsTu9jMc/i/kH1xiQQV5einQL7TeCDu2vsi'),
('US45818', NULL, 'Jimmy', 'Taggart', '123 Garden Ave', 'Blackpool', 'England', '1234 5T6', 'jim.bobb@gmail.com', '$2y$10$CiQHGWlbSAORcZTggZfHreVvzz72.8VvDkzOKvWtsYafSlF.2I61e'),
('US46318', NULL, 'Darren', 'Gallagher', '31 Maclevennon Rd', 'Portrush', 'Northern Ireland', 'BT33 123', 'darren@gmail.com', 'password'),
('US48190', NULL, 'Bob', 'Deer', '123 Nowhere St', 'London', 'England', 'BT5 6RT', 'test@test.com', '123'),
('US54271', NULL, '++', 'Dummy', '123 Garden Row', 'Dummy', 'Northern Ireland', 'Dummy', 'maryscott@gmail.com', 'aaa'),
('US61901', NULL, 'JimBob', 'McKnob', '123 Nobby Lane', 'Drumahoe', 'Northern Ireland', '1234 5T6', 'jim.bob@gmail.com', 'qwerty'),
('US67585', 'AD11111', 'Admin', 'Admin', '123 Admin Road', 'Adminstown', 'Northern Ireland', 'BT5 6RT', 'administrator@gmail.com', '$2y$10$wyXr7Phg9q/wERZRA87Bs.g.Gn7Yc7Ix.q8J8Sgepf8s9gtB0hJX.'),
('US72339', NULL, 'Mary-Jane', 'Scott', '27 Fairview Close', 'Glasgow', 'Scotland', 'BT56 0T3', 'maryscott@gmail.com', 'mary'),
('US81842', NULL, 'David', 'Thompson', '123 Wayview Close', 'Ballymoney', 'Northern Ireland', 'BT60 6YH', 'david.thompson@gmail.com', '$2y$10$FZtoiHfUxmlLMQppxrmUi.hnNL925w1yfbCRbLl1BRAIOhW9OhZ.e'),
('US83493', NULL, 'Tommy', 'Henry', '123 Maidstone Hill', 'London', 'England', 'BT9 5UA', 'tommy.henry21@gmail.com', 'password'),
('US96604', NULL, 'Jimmy', 'Taggart', '45 Sea View Lane', 'Blackpool', 'England', 'BT3 6YT', 'littlejimmytaggart@gmail.com', '$2y$10$MYNdcAuKVJMBI5XMzwdW9eHqsfkrnKYlfqUZYkiDKwqPEeQY62hE2');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` varchar(7) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Price` double NOT NULL,
  `Description` text NOT NULL,
  `ImagePath` varchar(80) NOT NULL,
  `AltImagePath` varchar(100) DEFAULT NULL,
  `AltImagePathTwo` varchar(100) DEFAULT NULL,
  `Tags` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Name`, `Price`, `Description`, `ImagePath`, `AltImagePath`, `AltImagePathTwo`, `Tags`) VALUES
('ACC1000', 'Carhartt Bucket Hat', 25, '• Fabric: Cotton\r\n• 8 Wale Corduroy\r\n• Fit: Regular Fit\r\n• Construction: Traditional Bucket Construction\r\n• Brim: Wide Brim\r\n• Additional Details: Woven Rvca Patch At Side\r\n• Interior Fit Label\r\n• Hat Styles: Bucket\r\n• Material: 100% Cotton', 'assets\\img\\products\\accessories\\carharttHatBlack1.png', 'assets\\img\\products\\accessories\\hatCarharttBlack2.png', 'assets\\img\\products\\accessories\\hatCarharttBlack3.png', 'Hat Black Carhartt Head Dark'),
('ACC1001', 'Vans Snapback', 25, '• Vans Salton Cap\r\n• One size fits all\r\n• 6-panel construction\r\n• Flat peak\r\n• Low profile\r\n• Unstructured dome\r\n• Adjustable strap to back\r\n• Vans branding to front\r\n• Material: Cotton\r\n• Cap Styles: Snapback Caps\r\n• Material: 100% Cotton\r\n• Material - Lining: 100% Polyester', 'assets\\img\\products\\accessories\\hatVansCream1.png', 'assets\\img\\products\\accessories\\hatVansCream2.png', NULL, 'Hat Vans Cream Light Headwear'),
('ACC1002', 'Volcom Beanie', 25, '• Unisex beanie\r\n• Soft and warm and acrylic ribbed knit\r\n• Stretchy ribbed knit fits a wide range of people comfortably\r\n• Turned up cuff\r\n• Woven Volcom patch on the cuff\r\n• Beanie Style: Cuff\r\n• Height: 23.5 cm\r\n• Material: 100% Acrylic', 'assets\\img\\products\\accessories\\hatVolcomWine1.png', 'assets\\img\\products\\accessories\\hatVolcomWine2.png', NULL, 'Wine Red Purple Hat Volcom Headwear'),
('KID1000', 'Vans White Tee', 20, '• Unisex round neck, short sleeve tee\r\n• Classic fit\r\n• Ringspun cotton\r\n• Printed branding\r\n• Material: 100% cotton', 'assets\\img\\products\\kids\\kidsTeeWhite1.png', 'assets\\img\\products\\kids\\kidsTeeWhite2.png', NULL, 'Top T-Shirt Kid\'s Kids Child Child\'s Children\'s White Light '),
('KID1001', 'Napajiri Jacket', 40, '• Kid\'s casual summer jacket\r\n• Pullover anorak style jacket with a 1/4 length zip on the chest plus a full length zip down the left side seam\r\n• Water resistant face fabric\r\n• Critically taped seams prevent water entering between the fabric in high pressure areas\r\n• Mesh lining\r\n• Zippered pouch pocket on the chest hidden under a fabric flap\r\n• Low profile hood with an elasticated edge\r\n• Internal cuffs\r\n• Adjustable drawcord on the hem to close the fit around your body\r\n• Napapijri banding on the pocket and upper left sleeve\r\n• Norwegian flag embroidered on the pocket\r\n• Ventilation eyelets', 'assets\\img\\products\\kids\\kidsJacketBlack1.png', 'assets\\img\\products\\kids\\kidsJacketBlack2.png', 'assets\\img\\products\\kids\\kidsJacketBlack3.png', 'Kid\'s Kids Black Jacket Top Dark Coat Child\'s Childs Children\'s Childrens'),
('KID1002', 'Element Hoodie', 30, '• Fabric: Cotton polyester fabric [260 g/m2]\r\n• Fit: Regular fit\r\n• Lining: Brushed\r\n• Pockets: Kangaroo pocket\r\n• Screen print on chest, back and sleeve', 'assets\\img\\products\\kids\\kidsHoodieTeal2.png', 'assets\\img\\products\\kids\\kidsHoodieTeal2.png', NULL, 'Top Kid\'s Kids Hoodies Top Blue Green Teal Child\'s Childs Children\'s Childrens'),
('MEN1000', 'Dickies Tee', 35, '• Dickies Mount Vista men’s long sleeve t-shirt\r\n• Made from soft jersey cotton\r\n• Relaxed fit with long sleeves for extra warmth\r\n• Iconic Dickies woven logo on the chest\r\n• Inspired by classic workwear styles\r\n• Ribbed cuffs to keep in the warmth\r\n• Features a chest pocket', 'assets/img/products/mens/mensTeeWhite1.png', 'assets\\img\\products\\mens\\mensTeeWhite2.png', NULL, 'Tops Mens Men\'s White Light Longsleeve'),
('MEN1001', 'Patagonia Windbreaker', 85, '• Featherweight recycled nylon ripstop with a PFC-free DWR finish (durable water repellent coating that does not contain perfluorinated chemicals)\r\n• Zippered chest pocket converts to stuffsack with a reinforced carabiner clip-in loop\r\n• Slim fit with a slight drop tail for better fit during movement\r\n• Hood adjusts in one pull and won’t block peripheral vision\r\n• Durable half-elastic cuffs; drawcord hem\r\n• Reflective P-6 logo on left chest\r\n• Fair Trade Certified™ sewn, which means the people who made it earned a premium for their labor\r\n• Made in Vietnam\r\n• 105 g', 'assets/img/products/mens/mensJacketBlack1.png', 'assets\\img\\products\\mens\\mensJacketBlack2.png', NULL, 'Mens Men\'s Top Black Dark Jacket Coat'),
('MEN1002', 'Patagonia Fleece', 65, '• Midweight fleece\r\n• Fully recycled polyester construction\r\n• Soft and warm\r\n• Raglan sleeves ensure good freedom of movement\r\n• Stand up collar\r\n• Jersey trim to wind flap, cuff, and hem\r\n• Patagonia branding to the chest\r\n• Pocket to the sleeve\r\n• Handwarmer pockets with zip fastening\r\n• Fair Trade Certified™ sewn\r\n• bluesign® approved', 'assets/img/products/mens/mensFleece1.png', 'assets\\img\\products\\mens\\mensFleece2.png', 'assets\\img\\products\\mens\\mensFleece3.png', 'Mens Men\'s Fleece Coat Jacket Warm Top'),
('MEN1003', 'Men\'s Yellow Jumper', 50, 'Lorem ipsum, dolor sit amet consectetur', 'assets/img/products/mens/mensJumperYell.png', NULL, NULL, 'Men Men\'s Top Jumper Yellow Light '),
('WOM1000', 'O\'Neill Tee', 35, '• Women\'s short sleeve t-shirt\r\n• Rounded neckline\r\n• Subtle O\'Neill branding on the left side of the chest\r\n• Large repeat graphic on the back\r\n• Water based pigment dye\r\n• Straight hem', 'assets/img/products/womens/womensTeeLilac1.png', 'assets\\img\\products\\womens\\womensTeeLilac2.png', 'assets\\img\\products\\womens\\womensTeeLilac3.png', 'Womans Womens Woman\'s Women\'s Top T-Shirt Ladies '),
('WOM1001', 'O\'Neill Fleece', 60, 'With a slightly oversized fit and soft fabric, the Slick Half Zip Fleece is your go-to for post-surf downtime or lounging around on the weekend. The high neck, half chest zip, elasticated cuffs and hem keep you warm and snug on your days out of the water. Engineered for versatile durability with Polartec® recycled polyester as part of our O\'Neill Blue product range.\r\n\r\n• Jacket Type: Fleece\r\n• Material: 100% Polyester (Recycled)\r\n• Sustainability: Recycled Content 50% Plus', 'assets/img/products/womens/womensFleeceOrange1.png', 'assets\\img\\products\\womens\\womensFleeceOrange2.png', 'assets\\img\\products\\womens\\womensFleeceOrange3.png', 'Woman Women Woman\'s Womens Ladies Top Fleece Jacket Coat Warm Orange Light'),
('WOM1002', 'Patagonia Jacket', 70, '• Patagonia branded\r\n	• Recycled polyester ripstop shell\r\n	• DWR (durable water repellent) finish\r\n	• Contoured, female fit\r\n	• 800-fill-power Advanced Global Traceable Down\r\n• Goose down is certified by NSF International\r\n• Single pull adjustable hood\r\n• Centre-front Vislon® zipper\r\n• Wicking interior storm flap\r\n• Zipper garage at chin for enhanced comfort\r\n• Nylon-bound elastic cuffs\r\n• Inner pocket doubles to stuff sack with carabiner clip-in loop\r\n• Handwarmer pockets have Vislon® zippers and garages\r\n• Adjustable hem with pulling cord in the pocket\r\n• bluesign® approved', 'assets/img/products/womens/womensJacketBlack1.png', 'assets\\img\\products\\womens\\womensJacketBlack2.png', 'assets\\img\\products\\womens\\womensJacketBlack3.png', 'Womans Womens Woman\'s Women\'s Top Black Dark Jacket Coat');

-- --------------------------------------------------------

--
-- Table structure for table `purchasehistory`
--

CREATE TABLE `purchasehistory` (
  `AccountID` varchar(7) NOT NULL,
  `ProductID` varchar(7) NOT NULL,
  `Size` varchar(1) NOT NULL,
  `Quantity` tinyint(4) DEFAULT NULL,
  `PurchaseDate` date NOT NULL,
  `Time` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchasehistory`
--

INSERT INTO `purchasehistory` (`AccountID`, `ProductID`, `Size`, `Quantity`, `PurchaseDate`, `Time`) VALUES
('US12345', 'ACC1000', '', 1, '2023-04-19', '15:29:03'),
('US12345', 'ACC1000', '', 1, '2023-04-19', '15:31:04'),
('US12345', 'ACC1001', '', 1, '2023-04-19', '15:29:03'),
('US12345', 'ACC1001', '', 1, '2023-04-19', '15:31:04'),
('US12345', 'ACC1001', '', 1, '2023-04-19', '15:32:27'),
('US12345', 'ACC1002', '', 1, '2023-04-17', '11:16:52'),
('US12345', 'ACC1002', '', 1, '2023-04-19', '15:15:00'),
('US12345', 'ACC1002', '', 1, '2023-04-19', '15:29:03'),
('US12345', 'ACC1002', '', 1, '2023-04-19', '15:31:04'),
('US12345', 'KID1000', 'S', 2, '2023-04-17', '11:16:52'),
('US12345', 'KID1000', 'S', 3, '2023-04-17', '13:47:22'),
('US12345', 'KID1001', 'M', 2, '2023-04-19', '13:39:05'),
('US12345', 'KID1001', 'S', 1, '2023-04-21', '15:21:50'),
('US12345', 'KID1002', 'S', 1, '2023-04-17', '11:16:52'),
('US12345', 'MEN1000', 'M', 2, '2023-04-17', '13:36:13'),
('US46318', 'ACC1002', '', 3, '2023-04-17', '16:33:46'),
('US46318', 'ACC1002', '', 1, '2023-04-18', '15:44:39'),
('US46318', 'ACC1002', '', 1, '2023-04-18', '15:48:48'),
('US46318', 'KID1000', 'L', 1, '2023-04-13', '15:53:34'),
('US46318', 'KID1000', 'M', 2, '2023-04-13', '15:51:56'),
('US46318', 'KID1000', 'M', 1, '2023-04-18', '15:48:48'),
('US46318', 'KID1000', 'S', 3, '2023-04-13', '15:51:32'),
('US46318', 'MEN1001', 'L', 1, '2023-04-18', '15:44:39'),
('US46318', 'MEN1001', 'M', 1, '2023-04-13', '16:04:02'),
('US46318', 'MEN1001', 'M', 1, '2023-04-18', '15:44:39'),
('US46318', 'MEN1001', 'S', 3, '2023-04-18', '15:44:39'),
('US46318', 'MEN1002', 'S', 2, '2023-04-13', '16:04:02'),
('US46318', 'WOM1002', 'S', 3, '2023-04-13', '16:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ProductID` varchar(7) NOT NULL,
  `reviewTitle` varchar(100) NOT NULL,
  `AccountID` varchar(7) NOT NULL,
  `ReviewScore` tinyint(4) NOT NULL,
  `Review` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ProductID`, `reviewTitle`, `AccountID`, `ReviewScore`, `Review`) VALUES
('ACC1000', 'What is this? A hat for ants?', 'US12345', 1, 'Doesn\'t fit my big head'),
('ACC1001', 'Some hat!', 'US12345', 5, 'It\'s a wile nice hat'),
('ACC1002', 'Nice hat', 'US12345', 3, 'Very nice hat. Fits well. Ears kept warm.'),
('MEN1001', 'Very Good!!', 'US46318', 5, 'The wind was broke!'),
('MEN1002', 'It was ok.', 'US26359', 4, 'Warm and fits good. Shame there\'s not more colours available.'),
('MEN1002', 'Very nice fleece', 'US46318', 5, 'Keeps you warm! Looks great! Fits a bit too loosely for my liking. Would recommend though!');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `ProductID` varchar(7) NOT NULL,
  `Size` varchar(2) NOT NULL,
  `Amount` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`ProductID`, `Size`, `Amount`) VALUES
('ACC1000', '', 7),
('ACC1001', '', 0),
('ACC1002', '', 10),
('KID1000', 'L', 5),
('KID1000', 'M', 4),
('KID1000', 'S', 0),
('KID1001', 'L', 3),
('KID1001', 'M', 4),
('KID1001', 'S', 4),
('KID1002', 'L', 5),
('KID1002', 'M', 4),
('KID1002', 'S', 5),
('MEN1000', 'L', 0),
('MEN1000', 'M', 5),
('MEN1000', 'S', 5),
('MEN1001', 'L', 2),
('MEN1001', 'M', 3),
('MEN1001', 'S', 4),
('MEN1002', 'L', 3),
('MEN1002', 'M', 5),
('MEN1002', 'S', 0),
('MEN1003', 'L', 5),
('MEN1003', 'M', 5),
('MEN1003', 'S', 4),
('WOM1000', 'L', 6),
('WOM1000', 'M', 5),
('WOM1000', 'S', 4),
('WOM1001', 'L', 5),
('WOM1001', 'M', 5),
('WOM1001', 'S', 4),
('WOM1002', 'L', 3),
('WOM1002', 'M', 5),
('WOM1002', 'S', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userqueries`
--

CREATE TABLE `userqueries` (
  `Name` varchar(32) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `queryDate` date NOT NULL,
  `time` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userqueries`
--

INSERT INTO `userqueries` (`Name`, `Email`, `Subject`, `Message`, `queryDate`, `time`) VALUES
('Darren Gallagher', 'darren@gmail.com', 'This is with htmlspecialchars', 'This is &lt;b&gt;bold text&lt;/b&gt; and this is &lt;span class=&quot;text-danger&quot;&gt;red text&lt;/span&gt;', '2023-04-20', '11:04:38'),
('Juan', 'bigJuan@hotmail.co.uk', 'Help me', 'I don\'t know what I\'m doing', '2023-04-19', '15:52:36'),
('Test', 'test@test.com', 'This is without htmlspecialchars', 'This should be <b>bold text</b> and this should be <span class=\"text-danger\">red text</span>', '2023-04-20', '11:02:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `purchasehistory`
--
ALTER TABLE `purchasehistory`
  ADD PRIMARY KEY (`AccountID`,`ProductID`,`Size`,`PurchaseDate`,`Time`),
  ADD KEY `purchasehistory_fk2` (`ProductID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ProductID`,`AccountID`),
  ADD KEY `reviews_fk1` (`AccountID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`ProductID`,`Size`);

--
-- Indexes for table `userqueries`
--
ALTER TABLE `userqueries`
  ADD PRIMARY KEY (`Name`,`Email`,`Subject`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchasehistory`
--
ALTER TABLE `purchasehistory`
  ADD CONSTRAINT `purchasehistory_fk1` FOREIGN KEY (`AccountID`) REFERENCES `account` (`AccountID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchasehistory_fk2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_fk1` FOREIGN KEY (`AccountID`) REFERENCES `account` (`AccountID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_fk2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_fk1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;