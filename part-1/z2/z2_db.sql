-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 07 2021 г., 16:10
-- Версия сервера: 5.7.29-log
-- Версия PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `z2_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `info_long`
--

CREATE TABLE `info_long` (
  `r_id` int(20) UNSIGNED NOT NULL,
  `r_ip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_date` date NOT NULL,
  `r_time` time NOT NULL,
  `r_url_from` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_url_to` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `info_long`
--

INSERT INTO `info_long` (`r_id`, `r_ip`, `r_date`, `r_time`, `r_url_from`, `r_url_to`) VALUES
(1, '123jiji', '2012-01-20', '14:00:00', 'ji.ja', 'ji.ju'),
(2, '192.168.0.1', '2012-01-20', '15:00:00', 'https://jija.ru', 'https://jija.ua'),
(3, '192.168.0.1', '2015-01-20', '11:55:00', 'https://jijanul.kz', 'https://jijer.by'),
(4, '192.165.0.1', '2012-05-20', '16:50:00', 'https://kor.ru', 'https://ror.ua'),
(5, '192.188.0.1', '2015-04-20', '17:53:00', 'https://vstavay.kz', 'https://deris.by'),
(6, '192.165.0.1', '2012-05-20', '10:33:00', 'https://ror.ua', 'https://last.de'),
(7, '192.165.0.1', '2013-05-12', '10:33:00', 'https://ror.ua', 'https://last.de'),
(8, '192.188.0.1', '2024-04-15', '17:53:00', 'https://deris.by', 'https://lozhis.ch'),
(9, '192.168.0.2', '2000-09-11', '03:44:00', 'https://utro.rano', 'https://vecher.pozdno');

-- --------------------------------------------------------

--
-- Структура таблицы `info_short`
--

CREATE TABLE `info_short` (
  `h_id` int(20) NOT NULL,
  `h_ip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_browser` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_os` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `info_short`
--

INSERT INTO `info_short` (`h_id`, `h_ip`, `h_browser`, `h_os`) VALUES
(1, '192.168.0.1', 'Google Chrome', 'Windows 11'),
(2, '192.168.0.2', 'Safari', 'Mac OS'),
(3, '192.165.0.1', 'Internet Explorer', 'Windows 11'),
(4, '192.188.0.1', 'Safari', 'Mac OS'),
(5, '192.168.0.1', 'Komodo Browser', 'Mac OS'),
(6, '192.165.0.1', 'Internet Explorer', 'Windows 11'),
(7, '192.188.0.1', 'Safari', 'Mac OS'),
(8, '192.188.0.1', 'LastBrowser', 'Lost OS');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `info_long`
--
ALTER TABLE `info_long`
  ADD PRIMARY KEY (`r_id`);

--
-- Индексы таблицы `info_short`
--
ALTER TABLE `info_short`
  ADD PRIMARY KEY (`h_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `info_long`
--
ALTER TABLE `info_long`
  MODIFY `r_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `info_short`
--
ALTER TABLE `info_short`
  MODIFY `h_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
