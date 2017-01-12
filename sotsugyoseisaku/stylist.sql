-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 1 朁E12 日 15:55
-- サーバのバージョン： 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sotsugyo`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `stylist`
--

CREATE TABLE `stylist` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `prefecture` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `SNS` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci NOT NULL,
  `coordinate1` text COLLATE utf8_unicode_ci NOT NULL,
  `coordinate2` text COLLATE utf8_unicode_ci NOT NULL,
  `coordinate3` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `stylist`
--

INSERT INTO `stylist` (`id`, `name`, `prefecture`, `service`, `comment`, `SNS`, `picture`, `coordinate1`, `coordinate2`, `coordinate3`) VALUES
(1, '澤木祐子', '東京', 'ショッピング同行、カウンセリング', '社団法人国際スタイリングカウンセラー協会代表理事。スタイリスト歴36年の経験を生かして心と体をテーマに幸せになるトータルライフコーディネートを提案!', 'http://ameblo.jp/happylifelove516/', 'sawakiyuko6.jpg', 'sawakiyuko4.jpg', 'sawakiyuko3.jpg', 'sawakiyuko5.jpg'),
(2, '麻比奈芽美', '神奈川', 'スタイルブック制作、ショッピングクルーズ、ショッピング同行', '美しい50代を創る装いコンシェルジュ。ハイ＆ローのブランドミックスコーディネート、得意の小物使いで皆様の「おしゃれ気分」を咲かせるお手伝いをさせて頂きます。', 'http://ameblo.jp/asahinamemi/\r\nhttps://www.instagram.com/memiasahina_magnifique/', 'asahina memi1.jpg', '', '', ''),
(3, '桑原智恵子', '東京、その他', 'ファッション同行、その他', '(装so)ファッション＋(話wa)話し方＋(礼re)マナー＝自分史上最高の私になる！\r\n印象管理専門家＆スカーフスタイリスト®桑原智恵子（barbara）です。', 'http://ameblo.jp/barbara-style/', 'kuwabara chieko1.jpg', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stylist`
--
ALTER TABLE `stylist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stylist`
--
ALTER TABLE `stylist`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
