-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 1 月 03 日 17:37
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db4_book`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `content` text DEFAULT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `url`, `content`, `indate`) VALUES
(13, 'これからはじめるReact実践入門', 'https://amzn.asia/d/2TzEI1X', 'React', '2023-12-23 21:25:59'),
(14, '1冊ですべて身につく HTML&CSSとWebデザイン', 'https://amzn.asia/d/1V9clUd', 'HTML, CSS', '2023-12-23 21:28:46'),
(15, '1冊ですべて身につくJavaScript入門講座', 'https://amzn.asia/d/8mM0hS2', 'Javascript', '2023-12-23 21:32:03'),
(16, '確かな力が身につくJavaScript「超」入門', 'https://amzn.asia/d/0wV7pUb', 'Javascript', '2023-12-23 21:32:56'),
(17, '初心者からちゃんとしたプロになる JavaScript基礎入門', 'https://amzn.asia/d/i1hWvMw', 'Javascript', '2023-12-23 21:33:39'),
(18, '確かな力が身につくPHP「超」入門', 'https://amzn.asia/d/gujNW2U', 'PHP', '2024-01-04 01:37:06');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
