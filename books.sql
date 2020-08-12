-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 12 2020 г., 16:59
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors_table`
--

CREATE TABLE `authors_table` (
  `id` int(11) NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `authors_table`
--

INSERT INTO `authors_table` (`id`, `name`) VALUES
(1, 'Leo Tolstoy'),
(2, 'J.D. Salinger'),
(3, 'E.M. Mitchell'),
(4, 'Miguel de Cervantes'),
(5, 'F. Scott Fitzgerald'),
(6, 'Gabriel Garcia Marquez'),
(7, 'Herman Melville'),
(8, 'William Shakespeare');

-- --------------------------------------------------------

--
-- Структура таблицы `books_authors_table`
--

CREATE TABLE `books_authors_table` (
  `id` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `authorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `books_authors_table`
--

INSERT INTO `books_authors_table` (`id`, `bookId`, `authorId`) VALUES
(74, 2, 1),
(83, 4, 2),
(84, 4, 3),
(89, 1, 1),
(90, 3, 1),
(97, 23, 4),
(98, 24, 6),
(101, 26, 8),
(102, 27, 8),
(103, 28, 8),
(104, 25, 5),
(105, 25, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `books_table`
--

CREATE TABLE `books_table` (
  `id` int(11) NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `datePublished` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `books_table`
--

INSERT INTO `books_table` (`id`, `name`, `price`, `datePublished`) VALUES
(1, 'War and Peace', 392, '2020-08-10'),
(2, 'Anna Karenina', 280, '2020-08-12'),
(3, 'Sevastopol Sketches', 310, '2020-08-12'),
(4, 'The Catcher in the Rye', 241, '2020-08-12'),
(23, 'Don Quixote ', 240, '2020-08-12'),
(24, ' One Hundred Years of Solitude', 270, '2020-08-12'),
(25, 'Moby Dick', 320, '2020-08-12'),
(26, 'Hamlet', 240, '2020-08-12'),
(27, 'Romeo and Juliet', 320, '2020-08-12'),
(28, 'Julius Caesar', 279, '2020-08-12');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1597142792),
('m130524_201442_init', 1597142796),
('m190124_110200_add_verification_token_column_to_user_table', 1597142796);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors_table`
--
ALTER TABLE `authors_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books_authors_table`
--
ALTER TABLE `books_authors_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books_table`
--
ALTER TABLE `books_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors_table`
--
ALTER TABLE `authors_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `books_authors_table`
--
ALTER TABLE `books_authors_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT для таблицы `books_table`
--
ALTER TABLE `books_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
