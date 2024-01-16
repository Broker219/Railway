-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 10 2024 г., 19:55
-- Версия сервера: 5.7.39
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `CRUD`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `railway_id` int(11) DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `railway_id`, `body`) VALUES
(3, 1, 'Посадка задерживается'),
(4, 4, 'Внимание: Отправление с первой платформы'),
(6, 9, 'Платформа 1'),
(7, 8, 'Платформа 8\r\n'),
(8, 1, 'Увы'),
(9, 14, 'Посадка с 5-й платформы'),
(10, 5, 'Платформа 8'),
(11, 5, 'Прибытие задерживается');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_railway` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_railway`, `id_user`) VALUES
(1, 2, 1),
(2, 2, 3),
(3, 1, 1),
(4, 4, 3),
(5, 8, 6),
(6, 14, 1),
(7, 1, 1),
(8, 15, 3),
(9, 15, 1),
(10, 6, 2),
(11, 10, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `railway`
--

CREATE TABLE `railway` (
  `id` int(11) NOT NULL,
  `departure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrival` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dated` date DEFAULT NULL,
  `timed` time DEFAULT NULL,
  `datea` date DEFAULT NULL,
  `timea` time DEFAULT NULL,
  `price` decimal(11,0) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `place` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `railway`
--

INSERT INTO `railway` (`id`, `departure`, `arrival`, `dated`, `timed`, `datea`, `timea`, `price`, `code`, `place`) VALUES
(1, 'Витебск', 'Минск', '2023-12-25', '12:00:00', '2023-12-25', '14:30:00', '31', 745, 129),
(2, 'Минск', 'Гродно', '2023-12-24', '12:00:00', '2023-12-24', '15:30:00', '25', 741, 181),
(4, 'Витебск', 'Могилёв', '2024-01-04', '13:00:00', '2024-01-04', '15:30:00', '22', 865, 155),
(5, 'Гомель', 'Минск', '2023-12-21', '14:20:00', '2023-12-21', '17:30:00', '28', 732, 190),
(6, 'Витебск', 'Гродно', '2023-12-21', '15:00:00', '2023-12-21', '18:30:00', '17', 116, 7),
(8, 'Гомель', 'Брест', '2023-12-21', '17:05:00', '2023-12-21', '19:00:00', '25', 735, 124),
(9, 'Гродно', 'Минск', '2023-12-21', '18:00:00', '2023-12-21', '21:35:00', '26', 741, 122),
(10, 'Гродно', 'Минск', '2023-12-21', '19:20:00', '2023-12-21', '22:55:00', '25', 743, 121),
(14, 'Минск', 'Витебск', '2023-12-24', '20:44:00', '2023-12-24', '04:51:00', '25', 784, 255),
(15, 'Витебск', 'Минск', '2024-01-17', '18:37:00', '2024-01-17', '21:43:00', '25', 743, 150);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Оксана', 'oksana.soloveva.199814@gmail.com', '$2y$10$hHz.FVR2oQwYAKya7z1TkOMAxvlCmvwKcjHq6FHZMgzKyaaz6ac6O'),
(2, 'Максим', 'maksim.lofit.123@gmail.com', '$2y$10$grRcRLLOIcK3ZCNjRRBYdO7910qpBD1IUFvaQoP5Vk6A7vu4jBee2'),
(3, 'Глеб', 'gleb.gurch.4124@gmail.com', '$2y$10$Ibot97/uEYJGnnr4Jh4h3ObzWJOk1Abjc2Y1DusY8.aCtjvtrfwAS'),
(4, 'Вова', 'ghgfh/dsfgg/1237@gmai.com', '$2y$10$aFN4Fx.9oFBRM3z8nwX40uxw2ls0jSOFaLAE2YBQNIVKOAkjB2Wli'),
(5, 'Миша', 'saf.asd.12@gmail.com', '$2y$10$bWQ7BcqVEH5wt73KaU.6vOFZGWYBzVZ/c5xghMFXXg1gENUqFbVFS'),
(6, 'Надежда', 'nad.kach@mail.com', '$2y$10$P7r9rPJi8.1GwY0azGt8lOPGNcQ.ShRIftyfbQxfHQ4FHnrMkDWiC'),
(8, 'Admin', 'admin@gmail.com', '$2y$10$8C5i6u604UDB07R8FLiSm.1K/jK7eATAcqcFX.QYbaZNX00iVUhrS');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `railway_id` (`railway_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_railway` (`id_railway`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `railway`
--
ALTER TABLE `railway`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `railway`
--
ALTER TABLE `railway`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`railway_id`) REFERENCES `railway` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_railway`) REFERENCES `railway` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
