-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-12-11 07:59:15
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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
  `femalenote` text NOT NULL COMMENT 'メモ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `female`
--

INSERT INTO `female` (`id`, `femalenumber`, `femalename`, `femalenote`) VALUES
(1, 'A001', '馬場典子', '５０間近の美魔女'),
(2, 'A002', '小澤陽子', 'アラサーの色気'),
(3, 'A003', '森香澄', '若手最高の乳袋'),
(4, 'A004', '上野愛奈', 'お人形みたい'),
(5, 'A005', '堤玲奈', 'キュート'),
(6, 'A006', '良原安美', 'スレンダー美女'),
(7, 'A007', '相場詩織', '秋田のスレンダー');


CREATE TABLE `age` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agevalue` int(2) NOT NULL COMMENT '年齢値',
  `agedisp` text NOT NULL COMMENT '年齢表示',
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into age (`agevalue`,`agedisp`) VALUES
('10','10代'),
('20','20代'),
('30','30代'),
('40','40代'),
('50','50代');