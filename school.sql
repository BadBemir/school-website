-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 19 2026 г., 05:32
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `school`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id` int NOT NULL,
  `fullname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('new','processed','rejected','done') COLLATE utf8mb4_unicode_ci DEFAULT 'new',
  `admin_comment` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id`, `fullname`, `phone`, `email`, `user_id`, `message`, `created_at`, `status`, `admin_comment`) VALUES
(1, 'Тест', '+79245224993', 'badbemir@gmail.com', NULL, '12312rsaftest', '2026-03-19 11:53:20', 'new', NULL),
(2, 'Тест', '+79245224993', 'badbemir@gmail.com', 2, 'ыфвфысчффысячсяч', '2026-03-19 12:17:40', 'new', NULL),
(3, 'Окак', '+79245224993', '12345@gmail.com', NULL, 'ыфсячсячмдхфцозщм', '2026-03-19 12:18:44', 'new', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created_at`, `image`) VALUES
(9, 'Онлайн-урок по цифровой грамотности и кибербезопасности на тему «Дропперство».', 'Ученики 8 «Г» класса посмотрели онлайн-урок по цифровой грамотности и кибербезопасности на тему «Дропперство».', '2026-02-21 04:46:16', 'uploads/news/img_69993898e8786.jpg'),
(10, 'Для дежурных классов сегодня была проведена торжественная линейка передачи дежурства', 'Для дежурных классов сегодня была проведена торжественная линейка передачи дежурства', '2026-02-21 04:46:43', 'uploads/news/img_699938b36be1c.jpg'),
(11, 'Я горжусь своей страной! Мы — граждане России!', 'В нашем городе состоялось знаменательное событие, организованное «Движением Первых» — «Мы — граждане России!».', '2026-02-21 04:47:11', 'uploads/news/img_699938cf4401b.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `id` int NOT NULL,
  `schedule_date` date NOT NULL,
  `class_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lesson2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lesson3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lesson4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lesson5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lesson6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lesson7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id`, `schedule_date`, `class_name`, `lesson1`, `lesson2`, `lesson3`, `lesson4`, `lesson5`, `lesson6`, `lesson7`, `created_at`) VALUES
(1, '2026-02-03', '2а', 'Окр.Мир - Пика.А.А.', 'Математика - Сухова.В.В.', 'Русский язык - Смирнова.А.В.', '', '', '', '', '2026-02-02 06:54:42');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'working',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `login`, `password`, `job`, `status`, `created_at`) VALUES
(1, 'Владимир Владиславович Вампир', 'vvv@gmail.com', 'vvv', '$2y$10$DZXZwcSsQS54Uxcs62ndkOcmWeprA11NJlWWPb8CdLuGFSA3jrSfC', 'Техник програмист', 'working', '2026-02-02 06:51:54'),
(2, 'Бадретдинов Дэмир Ильдарович', 'badbemir@gmail.com', 'baddemir', '$2y$10$yXiQSca/PknNxm4i8B1EUeEmiCmVzhkp691UaHakTbPbe0tM3DDWa', NULL, 'working', '2026-03-19 02:12:20');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
