-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Jun 2022 um 18:19
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ehs-shop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `cat_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`categoryID`, `cat_description`) VALUES
(1, 'Laptops\r\n'),
(2, 'PC'),
(3, 'Smartphones'),
(4, 'Games/Consoles'),
(5, 'Accessoires');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `prod_name` varchar(256) NOT NULL,
  `available_quantity` int(255) NOT NULL,
  `prod_description` varchar(1000) NOT NULL,
  `prod_condition` varchar(100) NOT NULL,
  `prod_img_name` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`productID`, `prod_name`, `available_quantity`, `prod_description`, `prod_condition`, `prod_img_name`, `price`, `categoryID`, `userID`) VALUES
(49, 'Lenovo E30 Tower', 2, 'i5 processor 4.2 GHz \r\n8 GB RAM 1TB SSD\r\nNvidia Quadro P120', 'used', '4889-lenovo-e30-tower-2.jpg', 250, 2, 6),
(50, '128 GB SSD', 4, '128 GB SSD M.2.', 'used', '5230-81OWQ6Q3ztL._AC_SX450_.jpg', 10, 5, 6),
(51, 'XboX One s', 2, 'Xbox One', 'new', '2725-087efc15-7859-4641-afbc-bfddf11ba960.jpg', 500, 4, 5),
(52, 'Iphone 13 ', 1, 'new Iphone 13', 'new', '2236-210915130352700801900161L.jpg', 999, 3, 5),
(54, 'HP Monitor', 1, 'very good quality', 'used', '1433-hp monitor.jpg', 100, 2, 7),
(56, 'ACER Gaming Notebook', 1, 'Nitro 5, i9-11900H, 16GB RAM, 1TB SSD, RTX 3060, 17.3 Zoll ', 'new', '8625-gam.webp', 1060, 1, 7),
(57, 'Dell XPS 13', 1, 'Intel Core i7-1165G7, Intel Iris Xe Graphics, RAM: 16GB, Storage: 512GB', 'used', '9473-dell.jpg', 500, 1, 7),
(58, 'Asus Zenbook Pro 14', 1, 'ntel Core i7-12700H with 16 GB RAM', 'used', '7001-asus.jpg', 1250, 1, 7),
(59, 'PlayStation 4', 1, 'never used', 'new', '2698-ps4.jpg', 300, 4, 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `mobile`, `password`, `date_time`) VALUES
(5, 'Faruk', 'Imamovic', 'farukt9@gmail.com', '06681207137', '$2y$10$CtZxFLgAVHNeAcXBEHpMwecLCFoE.wpsJgSv6tWq606eIBc0S26xW', '2022-06-13 22:22:46'),
(6, 'John', 'Smith', 'johnsmith@test.at', '68351874', '$2y$10$5ns/yeFzri674jvCTg9gmOakXS9WQQAeghCojJaDu1dTpJyoBvo/W', '2022-06-13 22:47:54'),
(7, 'Jovana', 'Joksimovic', 'hello@hello.at', '444', '$2y$10$.TdXNvaT6go7fpPTwoDuE.zQW5JrRYz.wJujDBv/t8kerFWYu7.1G', '2022-06-24 16:24:39'),
(8, 'jovi', 'jovi', 'jovi@jovi.at', '55', '$2y$10$eOUu5sWEc6pei3Cw3Ip7F.iz.zNef/xezaN9xYTDiDgcRcxXwOlMO', '2022-06-25 02:25:50'),
(9, 'Jovana', 'jovana', 'jovana@jovana.at', '77', '$2y$10$w101a4xyFEt91nNfzngb1eKe1y0yzFEvys6J5bG9FatLtWdLA4YTS', '2022-06-26 22:12:07');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `id` (`id`);

--
-- Indizes für die Tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `userID` (`userID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
