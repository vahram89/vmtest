-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 27 2019 г., 01:58
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lucky`
--

-- --------------------------------------------------------

--
-- Структура таблицы `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `journal_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `journal_id`, `created_at`, `end_date`) VALUES
(1, 1, 4, '2019-07-01 17:54:18', '2019-08-31'),
(2, 1, 2, '2019-05-01 17:55:02', '2019-07-31'),
(3, 1, 3, '2019-07-01 17:55:58', '2019-07-31'),
(4, 2, 1, '2019-06-01 17:56:23', '2019-07-31'),
(5, 2, 2, '2019-04-01 17:56:47', '2019-10-31'),
(6, 3, 1, '2019-07-01 17:57:21', '2019-11-30'),
(7, 3, 4, '2019-02-01 17:57:46', '2019-07-31');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`) VALUES
(1, 'Group 1', '2019-07-26 18:08:37'),
(2, 'Group 2', '2019-07-26 18:08:37'),
(3, 'Group 3', '2019-07-26 18:08:37');

-- --------------------------------------------------------

--
-- Структура таблицы `journals`
--

CREATE TABLE `journals` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `journals`
--

INSERT INTO `journals` (`id`, `title`, `number`, `created_at`) VALUES
(1, 'journal 1', 12345, '2019-07-27 17:51:56'),
(2, 'journal 2', 321, '2019-07-18 17:53:28'),
(3, 'journal 3', 56987, '2019-07-26 17:53:34'),
(4, 'journal 4', 4444, '2019-07-28 17:53:48');

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `tracking_number` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `group_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `sent_date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `journal_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `enter_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id`, `number`, `tracking_number`, `status`, `group_id`, `file`, `sent_date`, `user_id`, `journal_id`, `created_at`, `updated_at`, `enter_date`) VALUES
(1, 83, 'testtttt', 2, 2, 'file1.jpg', '2019-08-01', 3, 4, '2019-07-25 18:07:48', '2019-07-26 18:31:00', '2019-07-25'),
(2, 3383898, 'ZXZXZXsss', 2, 1, 'file2.jpg', '2019-07-26', 1, 3, '2019-07-26 18:07:48', '2019-07-26 18:31:00', '2019-07-26'),
(3, 834, 'track45', 2, 2, 'file3.jpg', '2019-08-02', 2, 1, '2019-07-26 18:07:48', '2019-07-26 18:31:00', '2019-07-26'),
(4, NULL, NULL, 1, 3, 'file4.jpg', NULL, NULL, NULL, '2019-07-26 18:07:48', '2019-07-26 18:31:00', '2019-07-26'),
(5, NULL, NULL, 1, 2, 'file5.jpg', NULL, NULL, NULL, '2019-07-25 18:07:48', '2019-07-26 18:31:00', '2019-07-25'),
(6, NULL, NULL, 1, 2, 'file6-test.jpg', NULL, NULL, NULL, '2019-07-27 18:07:48', '2019-07-26 18:31:00', '2019-07-27');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `created_at`) VALUES
(1, 'Poxos poxosyan Poxosi', 'Armenia Yerevan', '2019-07-25 16:48:32'),
(2, 'Petros Petrosyan Petrosi', 'Russia Moscow', '2019-07-26 16:48:26'),
(3, 'Samo Samoyan Samoi', 'USA Vashington', '2019-07-27 16:49:15');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followers-user_id-users-id` (`user_id`),
  ADD KEY `followers-journal_id-journal-id` (`journal_id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_number` (`number`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket-group_id-group-id` (`group_id`),
  ADD KEY `ticket-user_id-user-id` (`user_id`),
  ADD KEY `ticket-journal_id-journal-id` (`journal_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `journals`
--
ALTER TABLE `journals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers-journal_id-journal-id` FOREIGN KEY (`journal_id`) REFERENCES `journals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `followers-user_id-users-id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `ticket-group_id-group-id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket-journal_id-journal-id` FOREIGN KEY (`journal_id`) REFERENCES `journals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket-user_id-user-id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
