-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Lis 2022, 23:11
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pogon-szczecin`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `log` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `register`
--

INSERT INTO `register` (`id`, `name`, `log`, `pwd`, `description`) VALUES
(1, 'Antoni', 'awalburg193', 'Siema', '566706403'),
(2, 'Antoni', 'awalburg193', 'Walburg', '423432423'),
(3, 'Antoni', 'awalburg193', 'Walburg', '423432423'),
(4, 'Antoni', 'awalburg193', 'Walburg', '423432423'),
(5, 'Antoni', 'awalburg193', 'Walburg', '423432423'),
(6, 'Antoni', 'awalburg193', 'Walburg', '423432423'),
(7, 'Antoni', 'awalburg193', 'Walburg', '423432423'),
(8, 'Antoni', 'awalburg193', 'Walburg', '423432423'),
(9, 'Antoni', 'awalburg193', 'Walburg', '423432423'),
(10, 'Antoni', '1', '1', '323');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
