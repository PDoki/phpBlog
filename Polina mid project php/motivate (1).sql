-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost:8889
-- Время создания: Янв 27 2019 г., 06:33
-- Версия сервера: 5.5.42
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `motivate`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `benefits` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `benefits`, `date`) VALUES
(2, 3, 'earn 10000$', 'build animal shelter', '2019-01-11 18:57:29'),
(3, 1, 'meet with friends', 'a lot of fun!!!\r\nlearn their latest news', '2019-01-11 20:33:30'),
(4, 3, 'Go Google', '<script>window.location = "http://google.com";</script>', '2019-01-11 22:37:13'),
(5, 1, 'make few lines', 'this is the first line\r\nthis is the second line\r\nthis is the third line', '2019-01-11 23:05:30'),
(6, 1, 'check quotes', 'I don''t need "quotes"', '2019-01-11 23:11:32'),
(7, 1, 'Survive the studies', 'be proud of myself\r\nget a well paid job', '2019-01-15 18:11:01'),
(8, 3, 'לכתוב בעברית', 'יכול לשלוח הודעות לאנשים אחרים', '2019-01-15 21:01:29'),
(11, 6, 'новая цель', 'Некий текст', '2019-01-22 19:54:31'),
(13, 5, 'another aim', 'some text here', '2019-01-22 21:09:17'),
(14, 7, 'цель по-русски', '1) это будет хорошо\r\n2) это будет хорошо\r\n3) это будет хорошо', '2019-01-23 06:33:52'),
(15, 8, 'speak English well', 'My husband will stop making fun of me when we are abroad.\r\nPlus, my children will adore me even more.', '2019-01-25 11:26:47'),
(16, 8, 'demo aim', '1. demo text\r\n2.demo text', '2019-01-27 00:08:15');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `joined_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `joined_on`) VALUES
(1, 'Avi Cohen', 'avi@gmail.com', '$2y$10$yxsMiivSzAU2OCf1KcX5p.mX4XYzbolcmhnNtrdSLzHlwXgO9.cP6', '2019-01-08 00:00:00'),
(3, 'Moshe Levi', 'moshe@gmail.com', '$2y$10$yxsMiivSzAU2OCf1KcX5p.mX4XYzbolcmhnNtrdSLzHlwXgO9.cP6', '2019-01-08 00:00:00'),
(4, 'all', 'all@gmail.com', '$2y$10$TU8cIGtaL8lOeCXaWvpc4.7Qq2fjrcELFZlNCnOWOfr.AMhQrqlOi', '2019-01-15 19:01:12'),
(5, 'Leon', 'leon@gmail.com', '$2y$10$SHiTBBcJp7kW.yQzPuNSVu7W8Wf8vTi4qaEY0fvoZg2S6HNRgw8jq', '2019-01-15 22:09:21'),
(6, 'ollie', 'ollie@gmail.com', '$2y$10$VUceQO0lAu50VmjoHLfp1uldnvfr2L8TrC03vexmV4jWaMLN4Pbcu', '2019-01-22 19:43:06'),
(7, 'frigg', 'frigg@gmail.com', '$2y$10$/a1WKGUfoPOp5/7GaOEl3uQUjFX0Gt0dTFonIzWBG0rKmyVqJyUJy', '2019-01-23 06:32:15'),
(8, 'Sabina', 'sabina@gmail.com', '$2y$10$x.RrgrStVkP46oUMrnd3UeKgPsseyykdQ9SqYMVhE4R0A7kc7T9Ua', '2019-01-25 11:25:16');

-- --------------------------------------------------------

--
-- Структура таблицы `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `avatar`) VALUES
(1, 1, 'default.png'),
(2, 3, 'moshe.png'),
(3, 4, 'default.png'),
(4, 5, 'default.png'),
(5, 6, 'default.png'),
(6, 7, 'default.png'),
(7, 8, '2019.01.25.10.25.16-pitter rabbit.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
