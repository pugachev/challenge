-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2024 年 5 月 03 日 02:14
-- サーバのバージョン： 5.7.39
-- PHP のバージョン: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `jquerytest`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `age`
--

CREATE TABLE `age` (
  `id` int(11) NOT NULL,
  `agevalue` int(11) NOT NULL,
  `agedisp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `age`
--

INSERT INTO `age` (`id`, `agevalue`, `agedisp`) VALUES
(1, 10, '10代'),
(2, 20, '20代'),
(3, 30, '30代'),
(4, 40, '40代'),
(5, 50, '50代');

-- --------------------------------------------------------

--
-- テーブルの構造 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cateid` int(11) NOT NULL,
  `catename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `category`
--

INSERT INTO `category` (`id`, `cateid`, `catename`) VALUES
(1, 1000, '神戸牛'),
(2, 1001, '黒毛和牛'),
(3, 1002, 'オージービーフ');

-- --------------------------------------------------------

--
-- テーブルの構造 `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `coursename` text NOT NULL,
  `cateid` int(11) DEFAULT NULL,
  `subcateid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `courses`
--

INSERT INTO `courses` (`id`, `courseid`, `coursename`, `cateid`, `subcateid`) VALUES
(1, 3000, '神戸牛焼き肉(10000円)', 1000, 2000),
(2, 3001, '神戸牛せいろ蒸し(12000円)', 1000, 2001),
(3, 3002, '黒毛和牛すき焼き(8000円)', 1001, 2004);

-- --------------------------------------------------------

--
-- テーブルの構造 `female`
--

CREATE TABLE `female` (
  `id` int(11) NOT NULL,
  `femalenumber` varchar(5) NOT NULL COMMENT '番号',
  `femalename` text NOT NULL COMMENT '名前',
  `femalenote` text NOT NULL COMMENT 'メモ',
  `femaleage` int(11) NOT NULL COMMENT '年齢'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `female`
--

INSERT INTO `female` (`id`, `femalenumber`, `femalename`, `femalenote`, `femaleage`) VALUES
(1, 'A001', '馬場典子', '５０間近の美魔女', 40),
(2, 'A002', '小澤陽子', 'アラサーの色気', 30),
(3, 'A003', '森香澄', '若手最高の乳袋', 20),
(4, 'A004', '上野愛奈', 'お人形みたい', 30),
(5, 'A005', '堤玲奈', 'キュート', 20),
(6, 'A006', '良原安美', 'スレンダー美女', 20),
(7, 'A007', '相場詩織', '秋田のスレンダー', 30),
(8, 'A008', '大島璃音', '小顔で美脚', 20),
(9, 'A009', '檜山沙耶', '茨城の美人', 20),
(10, 'A010', '戸北美月', '高身長な美人', 20),
(11, 'A011', '宇垣美里', 'めちゃ美形', 30),
(12, 'A012', '鈴木唯', 'スタイル抜群', 20),
(13, 'A013', '田中みな実', 'マイクロぼいん', 30),
(14, 'A014', '宮司愛海', '爽やか美人', 30);

-- --------------------------------------------------------

--
-- テーブルの構造 `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `subcateid` int(11) NOT NULL,
  `subcatename` text NOT NULL,
  `cateid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `sub_category`
--

INSERT INTO `sub_category` (`id`, `subcateid`, `subcatename`, `cateid`) VALUES
(5, 2000, '焼き肉', 1000),
(6, 2001, 'せいろ蒸し', 1000),
(7, 2002, 'すき焼き', 1001),
(8, 2003, 'ユッキ', 1002),
(9, 2004, 'せいろ蒸し', 1001);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
