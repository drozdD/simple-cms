-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Paź 2024, 21:48
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `jdrozd`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `elementy`
--

CREATE TABLE `elementy` (
  `id` int(100) NOT NULL,
  `typ` text COLLATE utf8_polish_ci NOT NULL,
  `topik` text COLLATE utf8_polish_ci NOT NULL,
  `header` text COLLATE utf8_polish_ci NOT NULL,
  `txt` text COLLATE utf8_polish_ci NOT NULL,
  `link` text COLLATE utf8_polish_ci NOT NULL DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `elementy`
--

INSERT INTO `elementy` (`id`, `typ`, `topik`, `header`, `txt`, `link`) VALUES
(15, 'news', 'Uwaga! Nowa cukernia!', 'Zapraszamy do naszej cukierni', 'Już 8 czerwca rusza nasza mała, swojska cukiernia. Będzie się ona mieściła przy ulicy Krakowskiej 7b. Serdeczbue zapraszamy na otwarcie, czeka na was mnóstwo atrakcji! Przyjdzcie i sami zobaczcie. LOrem Ipsum ipsum ipsumipsum ipsumipsum ipsum.', 'https://gazetakrakowska.pl/najlepsze-cukiernie-w-krakowie-zobacz-top-14-polecanych-cukierni-w-miescie-ranking-naszych-czytelnikow-29012021/ar/c17-15401080'),
(20, 'news', 'Jak poradzić sobie z dzikimi lokatorami?', 'Dzicy lokatorzy nie chcieli opuścić mieszkania seniorki. Znalazła na nich sposób', 'W Szczecinie 72-letnia Gabriela Mazurek w 2019 r. wynajęła mieszkanie parze w średnim wieku. Paromiesięczna regularność wpłat szybko przeszła w milczenie i zaległości finansowe. Dziś, po czterech latach, lokatorzy zalegają z opłatami na kwotę 42 tysięcy złotych, a mieszkanie jest w stanie, który budzi przerażenie. Pani Gabriela, wdowa, która mieszkanie nabyła za pieniądze pozostawione w spadku po rodzicach, miała nadzieję przekazać je w przyszłości synowi. Niestety, jej plany legły w gruzach, gdy najemcy, mimo braku płatności, odmówili opuszczenia lokalu.', 'https://wiadomosci.onet.pl/szczecin/dzicy-lokatorzy-zdewastowali-mieszkanie-seniorki-znalazla-na-nich-sposob/gd7tpms'),
(21, 'info', 'Uwaga! PROMOCJA', 'Promocja na artykuły AGD', 'Wszystkie pralki, żelazka, komputery oraz drukarki w oszałamiających cenach. AŻ DO -50%! Promocja trwa do końca czerwca. Zapraszamy do naszego sklepu - Ulica Marcińska 15c', 'https://www.euro.com.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `imie` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `grupa` varchar(100) COLLATE utf8_polish_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `imie`, `nazwisko`, `mail`, `login`, `password`, `grupa`) VALUES
(23, 'Andrzej', 'Duda', 'duda@gmail.com', 'dudizk', '1234', 'user'),
(24, 'Adam', 'Bobmbel', 'bomadam@gmail.com', 'adam', '12345', 'user'),
(25, 'Jakub', 'Drozd', 'drozd@.pl', 'drozd', '123', 'admin'),
(26, 'Admin', 'admin', 'admin@admin.pl', 'admin', '123', 'admin');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `elementy`
--
ALTER TABLE `elementy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `elementy`
--
ALTER TABLE `elementy`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
