-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 jun 2024 om 10:28
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_server_db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `food_admin`
--

CREATE TABLE `food_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `food_admin`
--

INSERT INTO `food_admin` (`id`, `username`, `password`) VALUES
(2, 'semmy', '$2y$10$u3OOS2gkGg/itiaNtK.7yu35L0ECejlThQICpdhjnbd3R.RJ2dhBW'),
(3, 'Wassim', '$2y$10$QfX2AKdIhyqy9ewHLUa03eOsUcrfUIxUE2Xr/l0h1KhWgIc4LNr/W');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `food_category`
--

CREATE TABLE `food_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `food_category`
--

INSERT INTO `food_category` (`id`, `name`) VALUES
(1, 'Pizza'),
(2, 'Drinks'),
(3, 'Desserts');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `food_orders`
--

CREATE TABLE `food_orders` (
  `id` int(11) NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `Telefoonnummer` varchar(20) NOT NULL,
  `Betalingopties` varchar(255) NOT NULL,
  `Bezorgmethode` varchar(255) NOT NULL,
  `Woonplaats` varchar(255) NOT NULL,
  `Postcode` varchar(7) DEFAULT NULL,
  `Huisnummer` varchar(50) NOT NULL,
  `totaal_prijs` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `food_orders`
--

INSERT INTO `food_orders` (`id`, `Naam`, `Telefoonnummer`, `Betalingopties`, `Bezorgmethode`, `Woonplaats`, `Postcode`, `Huisnummer`, `totaal_prijs`) VALUES
(1, 'Othmane Aissaoui', '546789', 'paytm', 'pickup', 'utrecht', '3527RG', 'Adena', 25.50),
(2, 'Othmane Aissaoui', '35876978567453642', 'paytm', 'delivery', 'utrecht', '3527RG', 'Adena', 30.00),
(3, 'Othmane Aissaoui', '35876978567453642', 'paytm', 'delivery', 'utrecht', '3527RG', 'Adena', 30.00),
(4, 'khalil', '0999999993', 'paypal', 'pickup', 'maarsen', '4324DF', '224', 15.75),
(6, 'Othmane', '111111111111111111', 'credit card', 'pickup', 'weee', '1111rt', '1111', 20.00),
(7, 'semmu', '321', 'cash on delivery', 'delivery', '1', '321', '321', 10.00);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `food_product`
--

CREATE TABLE `food_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `korting` decimal(5,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `food_product`
--

INSERT INTO `food_product` (`id`, `name`, `price`, `image_url`, `category_id`, `korting`) VALUES
(59, 'Pizza Extravaganzza', 13.99, '../uploads/pizza-7.jpg', 1, 1.00),
(60, 'Pizza Vegan Veggi', 13.99, '../uploads/pizza-3.jpg', 1, 0.00),
(61, 'Pizza Americana', 13.99, '../uploads/pizza-4.jpg', 1, 0.00),
(62, 'Pizza Caprese', 13.99, '../uploads/pizza-5.jpg', 1, 0.00),
(64, 'Pizza Pepperoni', 13.99, '../uploads/pizza-9.jpg', 1, 0.00),
(65, 'Pizza Vegan Margheritta', 13.99, '../uploads/pizza-6.jpg', 1, 0.00),
(66, 'Pizza Funghi', 13.99, '../uploads/pizza-8.jpg', 1, 0.00),
(67, 'Pizza Megheritta', 13.99, '../uploads/pizza-1.jpg', 1, 0.00),
(68, 'Coca-Cola', 2.99, '../uploads/cola.png', 2, 1.00),
(69, 'Hawai', 2.99, '../uploads/hawei.png', 2, 0.00),
(70, '7up', 2.99, '../uploads/7up.png', 2, 0.00),
(71, 'Sprite ', 2.99, '../uploads/sprit.png', 2, 0.00),
(72, 'Fanta', 2.99, '../uploads/fanta.png', 2, 0.00),
(73, 'Pepsi', 2.99, '../uploads/pepsi.png', 2, 0.00),
(74, 'Sundae Chocolate', 3.99, '../uploads/chocoladeijs.png', 3, 0.00),
(75, 'Sundae Aardbei', 3.99, '../uploads/aardbijiis.png', 3, 0.00),
(76, 'Ice Frappe Koffie-Karamel', 4.99, '../uploads/icedkaramel.png', 3, 0.00),
(77, 'Ice Frappe Mokka-Chocolate', 4.99, '../uploads/icechocolade.png', 3, 0.00),
(78, 'Iced Fruit Smoothie Aardbei', 4.99, '../uploads/icesmoothie.png', 3, 0.00),
(79, 'Iced Fruit Smoothie Mango', 4.99, '../uploads/smoothie.png', 3, 0.00);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `food_users`
--

CREATE TABLE `food_users` (
  `id` int(11) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `food_users`
--

INSERT INTO `food_users` (`id`, `usertype`, `email`, `username`, `password`, `banned`) VALUES
(4, '', 'othmane@gmail.com', 'Othmane', '$2y$10$vWGaA2wtFaao7KeVnkKVnuHk6xsKg92m0BDkMfPHunL40Ttqq/gV2', 0),
(6, '', 'othmaneaissaoui435@gmail.com', 'admin', '$2y$10$wtG329S9YBlaQy5Vvxf5PuRuq4g5WymhXi8kW/pVePqQJgMAhTd7O', 0),
(7, '', 'oth@gmail.com', '123', '$2y$10$hhBYI7Q/dkzcHGIZ6d80WONCaAyr9aXsQOXP83nWtRNDLBxHw30C.', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gastenboek_entries`
--

CREATE TABLE `gastenboek_entries` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `bericht` text NOT NULL,
  `afbeelding` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gastenboek_entries`
--

INSERT INTO `gastenboek_entries` (`id`, `username`, `naam`, `bericht`, `afbeelding`) VALUES
(38, 'm.kors@rocmn.nl', '', 'test', 'uploads/Tux.svg.png'),
(39, 'Junior24', '', 'Junior was here <3', ''),
(40, 'ElliotSoftaren', '', 'elliot was here', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gastenboek_users`
--

CREATE TABLE `gastenboek_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user',
  `message_submitted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gastenboek_users`
--

INSERT INTO `gastenboek_users` (`id`, `username`, `password`, `usertype`, `message_submitted`) VALUES
(55, 'Admin', '$2y$10$MsPrDZZtSykUpqgyH5TFWek97DI4ca1PoDgXKereUfgV/TSrJatyS', 'admin', 0),
(56, 'Semmy', '$2y$10$QyhmY6rOqE.lKoGwRqDzv.SpBUbb0Gff53vjojy19EcOKXS5AqmEC', 'user', 0),
(60, 'Joshua Elias', '$2y$10$9RNIJLnhevT/Yh6RCoqE4.tP9mEDCLXeSZxKeELwF6fR0VTkqcfMu', 'user', 0),
(61, 'user', '$2y$10$BI5JndsG6k8X7xte4zUsq.6LSFO8Jhcn.eu3tTF6/Qvdb8sn0AyCy', 'user', 0),
(62, 'admin123', '$2y$10$qYrKokEzmtZ9XoF6tkXxNuPfbCUdppmn5EG/04t4rHZ0jsKXnanEa', 'user', 0),
(63, 'die fiets', '$2y$10$U4TPI93rNJju59U8KGR9x.SMYG7yOvohtVKmB0eWNiq1znM57s66y', 'user', 0),
(64, 'manel', '$2y$10$5mRzHYN8qTo8mauEJTdIk.e6VCT.NOYK5p3ue8Ym4TPZV1zpoU/Ku', 'user', 0),
(65, 'm.kors@rocmn.nl', '$2y$10$aj6cd1CrElQARF/6unAHV.m1zRRFTGWcBY3TafMILCg.46y7wRQiO', 'user', 1),
(66, 'Junior24', '$2y$10$wKuH/EZ.Hlu6q.PUyeUSvuJxayFcfbdA4jarjgEi9EwjvJ.jydR9C', 'user', 1),
(67, 'ElliotSoftaren', '$2y$10$SpfyfS293SzxVWZ7hu4myOonCfrlf1DzwrcDmCre/w.vDT6AfySru', 'user', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `food_admin`
--
ALTER TABLE `food_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `food_orders`
--
ALTER TABLE `food_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `food_product`
--
ALTER TABLE `food_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexen voor tabel `food_users`
--
ALTER TABLE `food_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gastenboek_entries`
--
ALTER TABLE `gastenboek_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gastenboek_users`
--
ALTER TABLE `gastenboek_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `food_admin`
--
ALTER TABLE `food_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `food_category`
--
ALTER TABLE `food_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `food_orders`
--
ALTER TABLE `food_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `food_product`
--
ALTER TABLE `food_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT voor een tabel `food_users`
--
ALTER TABLE `food_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `gastenboek_entries`
--
ALTER TABLE `gastenboek_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT voor een tabel `gastenboek_users`
--
ALTER TABLE `gastenboek_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
