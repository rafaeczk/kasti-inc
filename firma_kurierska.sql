-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 11:07 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firma_kurierska`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konto`
--

CREATE TABLE `konto` (
  `id_konta` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `data_rejestracji` date NOT NULL,
  `status` enum('ACTIVE','NOT_ACTIVE','BANNED','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konto`
--

INSERT INTO `konto` (`id_konta`, `login`, `password`, `data_rejestracji`, `status`) VALUES
(1, 'testLogin', '$2y$10$vNCt8Ou5J11HJs3n5Ss/9u5gk07P3PxjAqUODEyGXjvTDitiWFmNm', '2023-11-16', 'NOT_ACTIVE');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurier`
--

CREATE TABLE `kurier` (
  `id_kr` int(11) NOT NULL,
  `imie_kr` varchar(15) NOT NULL,
  `nazwisko_kr` varchar(30) NOT NULL,
  `telefon_kr` varchar(15) NOT NULL,
  `godziny_od` time NOT NULL,
  `godziny_do` time NOT NULL,
  `id_oddzialu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nadawca`
--

CREATE TABLE `nadawca` (
  `id_nadawcy` int(11) NOT NULL,
  `imie_n` varchar(15) NOT NULL,
  `nazwisko_n` varchar(30) NOT NULL,
  `email_n` varchar(30) NOT NULL,
  `telefon_n` varchar(15) NOT NULL,
  `ulica_n` varchar(30) NOT NULL,
  `nr_domu_n` varchar(5) NOT NULL,
  `nr_lokalu_n` int(10) UNSIGNED DEFAULT NULL,
  `kod_n` varchar(6) NOT NULL,
  `miasto_n` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odbiorca`
--

CREATE TABLE `odbiorca` (
  `id_odbiorcy` int(11) NOT NULL,
  `imie_o` varchar(15) NOT NULL,
  `nazwisko_o` varchar(30) NOT NULL,
  `email_o` varchar(30) NOT NULL,
  `telefon_o` varchar(15) NOT NULL,
  `ulica_o` varchar(30) NOT NULL,
  `nr_domu_o` varchar(5) NOT NULL,
  `nr_lokalu_o` int(10) UNSIGNED DEFAULT NULL,
  `kod_o` varchar(6) NOT NULL,
  `miasto_o` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oddzial_firmy`
--

CREATE TABLE `oddzial_firmy` (
  `id_oddzialu` int(11) NOT NULL,
  `nazwa_oddzialu` varchar(50) NOT NULL,
  `ulica_oddzialu` varchar(30) NOT NULL,
  `nr_domu_oddzialu` varchar(5) NOT NULL,
  `nr_lokalu_oddzialu` int(10) UNSIGNED DEFAULT NULL,
  `kod_oddzialu` varchar(6) NOT NULL,
  `miasto_oddzialu` varchar(20) NOT NULL,
  `tel_oddzialu` varchar(15) NOT NULL,
  `email_oddzialu` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `oddzial_firmy`
--

INSERT INTO `oddzial_firmy` (`id_oddzialu`, `nazwa_oddzialu`, `ulica_oddzialu`, `nr_domu_oddzialu`, `nr_lokalu_oddzialu`, `kod_oddzialu`, `miasto_oddzialu`, `tel_oddzialu`, `email_oddzialu`) VALUES
(1, 'Oddział Terenowy Rudna Mała k. Rzeszowa', 'Warszawska', '27', NULL, '35-098', 'Rudna Mała', '657-098-098', 'od_rm_rzeszow@kurierzy.pl'),
(2, 'Oddział Terenowy Jasło', 'Przemyska', '35', NULL, '31-218', 'Rudna Mała', '753-635-312', 'od_jaslo@kurierzy.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pojazd`
--

CREATE TABLE `pojazd` (
  `id_pojazdu` int(11) NOT NULL,
  `marka_p` varchar(20) NOT NULL,
  `model_p` varchar(15) NOT NULL,
  `nr_rej` varchar(8) DEFAULT NULL,
  `ladownosc` int(10) UNSIGNED NOT NULL,
  `id_oddzialu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przesylka`
--

CREATE TABLE `przesylka` (
  `id_przesylki` int(11) NOT NULL,
  `tracking_nr` varchar(50) NOT NULL,
  `waga` decimal(5,2) NOT NULL,
  `status_platnosci` enum('O','N') NOT NULL DEFAULT 'N',
  `metoda` enum('Przelew','Gotówka','Karta płatnicza','Przy odbiorze') DEFAULT NULL,
  `data_wyslania` date DEFAULT NULL,
  `data_odbioru` date DEFAULT NULL,
  `oplata` decimal(6,2) NOT NULL,
  `id_zlecenia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reklamacje`
--

CREATE TABLE `reklamacje` (
  `id_reklamacji` int(11) NOT NULL,
  `opis` text NOT NULL,
  `data_reklamacji` date NOT NULL,
  `data_rozpatrzenia` date NOT NULL,
  `id_przesylki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trasa`
--

CREATE TABLE `trasa` (
  `id_st_trasy` int(11) NOT NULL,
  `statuss` enum('Transport wewnętrzny','Wydano do doręczenia','W trakcie doręczenia','Dostarczono') DEFAULT NULL,
  `lokalizacja` varchar(60) NOT NULL,
  `data_zmiany` date NOT NULL,
  `id_przesylki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zlecenie`
--

CREATE TABLE `zlecenie` (
  `id_zlecenia` int(11) NOT NULL,
  `data_zlecenia` date NOT NULL,
  `id_kr` int(11) NOT NULL,
  `id_nadawcy` int(11) NOT NULL,
  `id_odbiorcy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `konto`
--
ALTER TABLE `konto`
  ADD PRIMARY KEY (`id_konta`);

--
-- Indeksy dla tabeli `kurier`
--
ALTER TABLE `kurier`
  ADD PRIMARY KEY (`id_kr`),
  ADD KEY `oddzial_firmy_id_oddzialu_fk` (`id_oddzialu`);

--
-- Indeksy dla tabeli `nadawca`
--
ALTER TABLE `nadawca`
  ADD PRIMARY KEY (`id_nadawcy`);

--
-- Indeksy dla tabeli `odbiorca`
--
ALTER TABLE `odbiorca`
  ADD PRIMARY KEY (`id_odbiorcy`);

--
-- Indeksy dla tabeli `oddzial_firmy`
--
ALTER TABLE `oddzial_firmy`
  ADD PRIMARY KEY (`id_oddzialu`),
  ADD UNIQUE KEY `nazwa_oddzialu` (`nazwa_oddzialu`),
  ADD UNIQUE KEY `kod_oddzialu` (`kod_oddzialu`),
  ADD UNIQUE KEY `tel_oddzialu` (`tel_oddzialu`),
  ADD UNIQUE KEY `email_oddzialu` (`email_oddzialu`);

--
-- Indeksy dla tabeli `pojazd`
--
ALTER TABLE `pojazd`
  ADD PRIMARY KEY (`id_pojazdu`),
  ADD UNIQUE KEY `nr_rej` (`nr_rej`),
  ADD KEY `oddzial2_firmy_id_oddzialu_fk` (`id_oddzialu`);

--
-- Indeksy dla tabeli `przesylka`
--
ALTER TABLE `przesylka`
  ADD PRIMARY KEY (`id_przesylki`),
  ADD KEY `zlecenie_id_zlecenia_fk` (`id_zlecenia`);

--
-- Indeksy dla tabeli `reklamacje`
--
ALTER TABLE `reklamacje`
  ADD PRIMARY KEY (`id_reklamacji`),
  ADD KEY `przesylka_id_przesylki_fk` (`id_przesylki`);

--
-- Indeksy dla tabeli `trasa`
--
ALTER TABLE `trasa`
  ADD PRIMARY KEY (`id_st_trasy`),
  ADD KEY `przesylka2_id_przesylki_fk` (`id_przesylki`);

--
-- Indeksy dla tabeli `zlecenie`
--
ALTER TABLE `zlecenie`
  ADD PRIMARY KEY (`id_zlecenia`),
  ADD KEY `kurier_id_kuriera_fk` (`id_kr`),
  ADD KEY `nadawca_id_nadawcy_fk` (`id_nadawcy`),
  ADD KEY `odbiorca_id_odbiorcy_fk` (`id_odbiorcy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konto`
--
ALTER TABLE `konto`
  MODIFY `id_konta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kurier`
--
ALTER TABLE `kurier`
  MODIFY `id_kr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nadawca`
--
ALTER TABLE `nadawca`
  MODIFY `id_nadawcy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `odbiorca`
--
ALTER TABLE `odbiorca`
  MODIFY `id_odbiorcy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oddzial_firmy`
--
ALTER TABLE `oddzial_firmy`
  MODIFY `id_oddzialu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pojazd`
--
ALTER TABLE `pojazd`
  MODIFY `id_pojazdu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `przesylka`
--
ALTER TABLE `przesylka`
  MODIFY `id_przesylki` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reklamacje`
--
ALTER TABLE `reklamacje`
  MODIFY `id_reklamacji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trasa`
--
ALTER TABLE `trasa`
  MODIFY `id_st_trasy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zlecenie`
--
ALTER TABLE `zlecenie`
  MODIFY `id_zlecenia` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kurier`
--
ALTER TABLE `kurier`
  ADD CONSTRAINT `oddzial_firmy_id_oddzialu_fk` FOREIGN KEY (`id_oddzialu`) REFERENCES `oddzial_firmy` (`id_oddzialu`);

--
-- Constraints for table `pojazd`
--
ALTER TABLE `pojazd`
  ADD CONSTRAINT `oddzial2_firmy_id_oddzialu_fk` FOREIGN KEY (`id_oddzialu`) REFERENCES `oddzial_firmy` (`id_oddzialu`);

--
-- Constraints for table `przesylka`
--
ALTER TABLE `przesylka`
  ADD CONSTRAINT `zlecenie_id_zlecenia_fk` FOREIGN KEY (`id_zlecenia`) REFERENCES `zlecenie` (`id_zlecenia`);

--
-- Constraints for table `reklamacje`
--
ALTER TABLE `reklamacje`
  ADD CONSTRAINT `przesylka_id_przesylki_fk` FOREIGN KEY (`id_przesylki`) REFERENCES `przesylka` (`id_przesylki`);

--
-- Constraints for table `trasa`
--
ALTER TABLE `trasa`
  ADD CONSTRAINT `przesylka2_id_przesylki_fk` FOREIGN KEY (`id_przesylki`) REFERENCES `przesylka` (`id_przesylki`);

--
-- Constraints for table `zlecenie`
--
ALTER TABLE `zlecenie`
  ADD CONSTRAINT `kurier_id_kuriera_fk` FOREIGN KEY (`id_kr`) REFERENCES `kurier` (`id_kr`),
  ADD CONSTRAINT `nadawca_id_nadawcy_fk` FOREIGN KEY (`id_nadawcy`) REFERENCES `nadawca` (`id_nadawcy`),
  ADD CONSTRAINT `odbiorca_id_odbiorcy_fk` FOREIGN KEY (`id_odbiorcy`) REFERENCES `odbiorca` (`id_odbiorcy`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
