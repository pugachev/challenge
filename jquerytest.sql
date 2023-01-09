-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-01-09 09:19:08
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 7.4.33

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
-- テーブルの構造 `female`
--

CREATE TABLE `female` (
  `id` int(11) NOT NULL,
  `femalenumber` varchar(5) NOT NULL COMMENT '番号',
  `femalename` text NOT NULL COMMENT '名前',
  `femalenote` text NOT NULL COMMENT 'メモ',
  `femaleage` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `female`
--

INSERT INTO `female` (`id`, `femalenumber`, `femalename`, `femalenote`, `femaleage`) VALUES
(1, 'A001', '馬場典子', '５０間近の美魔女', 4),
(2, 'A002', '小澤陽子', 'アラサーの色気', 3),
(3, 'A003', '森香澄', '若手最高の乳袋', 2),
(4, 'A004', '上野愛奈', 'お人形みたい', 3),
(5, 'A005', '堤玲奈', 'キュート', 2),
(6, 'A006', '良原安美', 'スレンダー美女', 2),
(7, 'A007', '相場詩織', '秋田のスレンダー', 3),
(8, 'A008', '大島璃音', '小顔で美脚', 2),
(9, 'A009', '檜山沙耶', '茨城の美人', 2),
(10, 'A010', '戸北美月', '高身長な美人', 2),
(11, 'A011', '宇垣美里', 'めちゃ美形', 3),
(12, 'A012', '鈴木唯', 'スタイル抜群', 2),
(13, 'A013', '田中みな実', 'マイクロぼいん', 3),
(14, 'A014', '宮司愛海', '爽やか美人', 3);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `female`
--
ALTER TABLE `female`
  ADD PRIMARY KEY (`id`),
  ADD KEY `femaleage` (`femaleage`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `female`
--
ALTER TABLE `female`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `female`
--
ALTER TABLE `female`
  ADD CONSTRAINT `female_ibfk_1` FOREIGN KEY (`femaleage`) REFERENCES `age` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
