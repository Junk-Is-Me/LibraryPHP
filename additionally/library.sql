-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 18 2021 г., 20:41
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
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `lib_authors`
--

CREATE TABLE `lib_authors` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `lib_authors`
--

INSERT INTO `lib_authors` (`id`, `name`, `description`) VALUES
(1, 'Пушкин А. С.', 'Русский поэт, драматург и прозаик, заложивший основы русского реалистического направления, литературный критик и теоретик литературы, историк, публицист, журналист; один из самых авторитетных литературных деятелей первой трети XIX века.'),
(2, 'Лермонтов М. Ю.', 'Русский поэт, прозаик, драматург, художник. Творчество Лермонтова, в котором сочетаются гражданские, философские и личные мотивы, отвечавшие насущным потребностям духовной жизни русского общества, ознаменовало собой новый расцвет русской литературы и оказало большое влияние на виднейших русских писателей и поэтов XIX и XX веков. Произведения Лермонтова получили большой отклик в живописи, театре, кинематографе. Его стихи стали подлинным кладезем для оперного, симфонического и романсового творчества. Многие из них стали народными песнями.'),
(3, 'Толстой Л.Н.', 'Один из наиболее известных русских писателей и мыслителей, один из величайших писателей-романистов мира. Участник обороны Севастополя. Просветитель, публицист, религиозный мыслитель, его авторитетное мнение послужило причиной возникновения нового религиозно-нравственного течения — толстовства. За свои взгляды был отлучён от церкви. Член-корреспондент Императорской Академии наук (1873), почётный академик по разряду изящной словесности (1900). Был номинирован на Нобелевскую премию по литературе (1902, 1903, 1904, 1905). Впоследствии отказался от дальнейших номинаций. Классик мировой литературы.');

-- --------------------------------------------------------

--
-- Структура таблицы `lib_books`
--

CREATE TABLE `lib_books` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `author_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `lib_books`
--

INSERT INTO `lib_books` (`id`, `title`, `author_id`) VALUES
(1, 'Капитанская дочка', 1),
(2, 'Пиковая дама', 1),
(3, 'Руслан и Людмила', 1),
(4, 'Мцыри', 2),
(5, 'Герой нашего времени', 2),
(6, 'Война и мир', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `lib_book_copies`
--

CREATE TABLE `lib_book_copies` (
  `id` int UNSIGNED NOT NULL,
  `book_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `return_date` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `lib_book_copies`
--

INSERT INTO `lib_book_copies` (`id`, `book_id`, `user_id`, `return_date`) VALUES
(1, 1, NULL, NULL),
(2, 1, 2, 1635172656),
(3, 1, NULL, NULL),
(4, 1, 1, 1632936738),
(5, 3, 2, 1635172670),
(6, 2, 2, 1632936739),
(7, 2, 2, 1635172669),
(8, 3, NULL, NULL),
(9, 3, 2, 1635172672),
(10, 3, 2, 1635172672),
(11, 3, 2, 1635172673),
(12, 3, 2, 1635172674),
(13, 4, 2, 1635172674),
(14, 5, 2, 1635172675),
(15, 5, NULL, NULL),
(16, 5, 2, 1635172678),
(17, 6, 2, 1635172680),
(18, 6, 2, 1635172681),
(19, 6, 2, 1635172682),
(20, 6, 2, 1635172683);

-- --------------------------------------------------------

--
-- Структура таблицы `lib_users`
--

CREATE TABLE `lib_users` (
  `id` int UNSIGNED NOT NULL,
  `type` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `lib_users`
--

INSERT INTO `lib_users` (`id`, `type`, `name`, `login`, `password`) VALUES
(1, 1, 'Марья Ивановна', 'mary', 'ea48576f30be1669971699c09ad05c94'),
(2, 0, 'Иван Иванов', 'ivan', '1e191d851b3b49a248f4ea62f6b06410'),
(3, 0, 'Пётр Петров', 'petr', '1e191d851b3b49a248f4ea62f6b06410');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `lib_authors`
--
ALTER TABLE `lib_authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lib_books`
--
ALTER TABLE `lib_books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lib_book_copies`
--
ALTER TABLE `lib_book_copies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lib_users`
--
ALTER TABLE `lib_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `lib_authors`
--
ALTER TABLE `lib_authors`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `lib_books`
--
ALTER TABLE `lib_books`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `lib_book_copies`
--
ALTER TABLE `lib_book_copies`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `lib_users`
--
ALTER TABLE `lib_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
