-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: std-mysql
-- Время создания: Янв 28 2021 г., 13:40
-- Версия сервера: 5.7.26-0ubuntu0.16.04.1
-- Версия PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `std_949_3sem_php_exam`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `answer_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_itself` text NOT NULL,
  `expert_ip` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`answer_id`, `question_id`, `answer_itself`, `expert_ip`, `date`) VALUES
(18, 33, 'wg', NULL, NULL),
(19, 34, '-1', NULL, NULL),
(20, 34, '-2', NULL, NULL),
(21, 35, '2', NULL, NULL),
(22, 35, '4', NULL, NULL),
(23, 36, 'затем', NULL, NULL),
(24, 37, 'большой текст', NULL, NULL),
(25, 37, 'очень большой текст', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `question_type` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `question_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`question_id`, `question_type`, `session_id`, `question_text`) VALUES
(33, 3, 97, 'WEO'),
(34, 1, 101, 'вопрос 1'),
(35, 2, 104, 'вопрос 2'),
(36, 3, 107, 'вопрос 3'),
(37, 4, 110, 'вопрос 4');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `is_open` tinyint(1) NOT NULL,
  `session_link` varchar(255) DEFAULT NULL,
  `session_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`session_id`, `is_open`, `session_link`, `session_token`) VALUES
(97, 1, 'http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token=fc64c5d7de649034a31a759a273c648ab554339b', 'fc64c5d7de649034a31a759a273c648ab554339b'),
(99, 1, 'http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token=57a92b164481ef5d9801b8d8bb044afe2e25f0c3', '57a92b164481ef5d9801b8d8bb044afe2e25f0c3'),
(100, 1, 'http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token=7c739efd1db4958ee899994545aeca92420af331', '7c739efd1db4958ee899994545aeca92420af331'),
(101, 1, 'http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token=2891ee807080dc7f713edea06ad59752d167f85d', '2891ee807080dc7f713edea06ad59752d167f85d'),
(102, 1, 'http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token=b69ae63409d0ad4f36f8930085faf27bb16cba73', 'b69ae63409d0ad4f36f8930085faf27bb16cba73'),
(103, 1, 'http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token=e6dec462163be93090a65f5fc7d7e044eec57fb5', 'e6dec462163be93090a65f5fc7d7e044eec57fb5'),
(104, 1, 'http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token=6a10895201d6e4ce7aa39244e60c41260decc70e', '6a10895201d6e4ce7aa39244e60c41260decc70e'),
(105, 1, 'http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token=365e62140b546bff61b7b8dd1444ecf23bd248a0', '365e62140b546bff61b7b8dd1444ecf23bd248a0'),
(106, 1, 'http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token=948299b9bbc98e48a27494c49f1045098a1be96e', '948299b9bbc98e48a27494c49f1045098a1be96e'),
(107, 1, 'http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token=4af1ba0ace740339f60cc92ac60ef6c175a50ca3', '4af1ba0ace740339f60cc92ac60ef6c175a50ca3'),
(108, 1, 'http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token=3cc0d33e376c676c8d68a74c3afaebacb5430f69', '3cc0d33e376c676c8d68a74c3afaebacb5430f69'),
(109, 1, 'http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token=db515e8e3090da9bee99f2a899022a87512c80b1', 'db515e8e3090da9bee99f2a899022a87512c80b1'),
(110, 1, 'http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token=c3ee89834df0e95d04f5cac25f8e6b78a9020fdc', 'c3ee89834df0e95d04f5cac25f8e6b78a9020fdc');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD UNIQUE KEY `answer_id` (`answer_id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD UNIQUE KEY `question_id` (`question_id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `session_id` (`session_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
