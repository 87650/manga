-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Вер 08 2021 р., 18:20
-- Версія сервера: 8.0.15
-- Версія PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `task`
--

-- --------------------------------------------------------

--
-- Структура таблиці `manga`
--

CREATE TABLE `manga` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `id_authors` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `manga`
--

INSERT INTO `manga` (`id`, `title`, `id_authors`) VALUES
(1, 'Rumic World', 1),
(2, 'Shanghai Yōmakikai', 2),
(3, 'Arslan Senki', 2),
(4, 'Hero Tales ', 2),
(5, 'InuYasha', 1),
(6, 'Mermaid Saga', 1),
(7, 'Mezon Ikkoku', 1),
(8, 'Noble Farmer', 2),
(9, 'My Sweet Sunday', 1),
(10, 'I Can\'t Throw Away Books', 1),
(11, 'test', 1);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_authors` (`id_authors`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `manga`
--
ALTER TABLE `manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `manga`
--
ALTER TABLE `manga`
  ADD CONSTRAINT `manga_ibfk_1` FOREIGN KEY (`id_authors`) REFERENCES `authors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
