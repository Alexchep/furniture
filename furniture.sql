-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 21 2016 г., 17:41
-- Версия сервера: 5.6.17
-- Версия PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `furniture`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table of categories';

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(7, 'Тумбы', NULL),
(10, 'Диваны', 14),
(11, 'Комоды', 7),
(12, 'Столы', NULL),
(13, 'Компьютерные столы', 12),
(14, 'Кровати', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT 'Неактивен'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table of comments';

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `author_name`, `date`, `status`) VALUES
(1, 'Хороший сервис!', 'alexchep', '2016-11-16 17:01:00', 'Активен'),
(2, 'Hello', 'chep', '2016-11-19 14:48:06', '0'),
(3, 'hello', 'yurec', '2016-11-19 14:48:06', 'Неактивен'),
(4, 'Все чудесно) )))', 'Алекс', '2016-11-19 20:53:36', 'Активен');

-- --------------------------------------------------------

--
-- Структура таблицы `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `path_to_pic` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table of galleries';

--
-- Дамп данных таблицы `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `description`, `path_to_pic`, `category_id`) VALUES
(7, 'Благородный козлик', 'Бээ', 'Pcb9MFZLAJs.jpg', 13),
(8, 'Орущий козлик', 'Ааа', 'MoXxlurLW4w.jpg', 7),
(9, 'Обдолбанный козлик', 'Гыыыы', 'LOa_a_2YyFE.jpg', 14),
(10, 'Голодный козлик', 'Есть пожрать че?', 'Tx3SUdo5-hs.jpg', 11);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
