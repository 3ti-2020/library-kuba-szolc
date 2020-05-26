-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 27 Maj 2020, 01:34
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `autorzy`
--

CREATE TABLE `autorzy` (
  `id_autorzy` int(11) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `autorzy`
--

INSERT INTO `autorzy` (`id_autorzy`, `imie`, `nazwisko`) VALUES
(1, 'Stefan', 'Żeromski'),
(2, 'Adam', 'Mickiewicz');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `krzyzowa`
--

CREATE TABLE `krzyzowa` (
  `id_krzyzowa` int(11) NOT NULL,
  `id_autorzy` int(11) NOT NULL,
  `id_tytuly` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `krzyzowa`
--

INSERT INTO `krzyzowa` (`id_krzyzowa`, `id_autorzy`, `id_tytuly`) VALUES
(2, 1, 1),
(3, 2, 2),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tytuly`
--

CREATE TABLE `tytuly` (
  `id_tytuly` int(11) NOT NULL,
  `tytul` text NOT NULL,
  `ISBN` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tytuly`
--

INSERT INTO `tytuly` (`id_tytuly`, `tytul`, `ISBN`) VALUES
(1, 'Ludzie bezdomni', 8373271724),
(2, 'Pan Tadeusz', 9788365458872),
(3, 'Dziady', 9788375178302);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  ADD PRIMARY KEY (`id_autorzy`);

--
-- Indeksy dla tabeli `krzyzowa`
--
ALTER TABLE `krzyzowa`
  ADD PRIMARY KEY (`id_krzyzowa`),
  ADD KEY `autor` (`id_autorzy`),
  ADD KEY `tytul` (`id_tytuly`);

--
-- Indeksy dla tabeli `tytuly`
--
ALTER TABLE `tytuly`
  ADD PRIMARY KEY (`id_tytuly`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  MODIFY `id_autorzy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `krzyzowa`
--
ALTER TABLE `krzyzowa`
  MODIFY `id_krzyzowa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `tytuly`
--
ALTER TABLE `tytuly`
  MODIFY `id_tytuly` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `krzyzowa`
--
ALTER TABLE `krzyzowa`
  ADD CONSTRAINT `autor` FOREIGN KEY (`id_autorzy`) REFERENCES `autorzy` (`id_autorzy`),
  ADD CONSTRAINT `tytul` FOREIGN KEY (`id_tytuly`) REFERENCES `tytuly` (`id_tytuly`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
