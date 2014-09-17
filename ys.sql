-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成日時: 2014 年 8 月 15 日 04:58
-- サーバのバージョン: 5.6.12-log
-- PHP のバージョン: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `ys`
--
CREATE DATABASE IF NOT EXISTS `ys` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ys`;

-- --------------------------------------------------------

--
-- テーブルの構造 `ys_a`
--

CREATE TABLE IF NOT EXISTS `ys_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(1023) DEFAULT '''''',
  `qid` int(11) DEFAULT NULL,
  `target` varchar(31) DEFAULT NULL,
  `del` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- テーブルのデータのダンプ `ys_a`
--

INSERT INTO `ys_a` (`id`, `body`, `qid`, `target`, `del`) VALUES
(1, 'テクノロジー部です。', 1, 'Q_2', 0),
(2, '社内情報システムチームです。', 1, 'Q_3', 0),
(3, '経営管理部です。', 1, 'Q_4', 0),
(4, 'いいえ、私はテクノロジー部の部長ではありません。', 2, 'Q_5', 0),
(5, 'はい、私はテクノロジー部の部長です。', 2, 'T_1', 0),
(6, 'はい、私は社内情報システムチームのリーダーです。', 3, 'T_1', 0),
(7, 'いいえ、私は社内情報システムチームのリーダーではありません。', 3, 'T_2', 0),
(8, 'はい、私はプログラミングができます。', 4, 'T_2', 0),
(9, 'いいえ、私はプログラミングができません。', 4, 'T_3', 0),
(10, 'あはは、冗談です。', 5, 'T_1', 0),
(11, 'はい、ほんとうです。', 5, 'T_2', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `ys_l`
--

CREATE TABLE IF NOT EXISTS `ys_l` (
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` varchar(1023) DEFAULT NULL,
  `dotime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `ys_l`
--

INSERT INTO `ys_l` (`username`, `name`, `content`, `dotime`) VALUES
('g-li', '李元傑', 'システムにログインしました', '2014-08-07 13:49:38'),
('g-li', '李元傑', 'システムにログインしました', '2014-08-07 13:49:51'),
('g-li', '李元傑', 'システムにログインしました', '2014-08-07 17:20:02'),
('g-li', '李元傑', 'システムにログインしました', '2014-08-08 09:29:29'),
('g-li', '李元傑', 'システムにログインしました', '2014-08-08 09:30:21'),
('g-li', '李元傑', 'システムにログインしました', '2014-08-08 09:32:10'),
('g-li', '李元傑', 'システムにログインしました', '2014-08-08 09:32:10'),
('g-li', '李元傑', 'システムにログインしました', '2014-08-08 09:34:44'),
('g-li', '李元傑', 'システムにログインしました', '2014-08-08 09:35:19');

-- --------------------------------------------------------

--
-- テーブルの構造 `ys_q`
--

CREATE TABLE IF NOT EXISTS `ys_q` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(1023) DEFAULT NULL,
  `answer` varchar(255) DEFAULT 'none',
  `del` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- テーブルのデータのダンプ `ys_q`
--

INSERT INTO `ys_q` (`id`, `body`, `answer`, `del`) VALUES
(1, 'あなたのチームはなんですか。', '1,2,3', 0),
(2, 'あなたは部長ですか。', '4,5', 0),
(3, 'あなたはリーダーですか。', '6,7', 0),
(4, 'あなたはプログラミングがでいますか。', '8,9', 0),
(5, '本当ですか？！', '10,11', 0),
(11, 'body', 'none', 0),
(12, '啊哈哈', 'none', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `ys_r`
--

CREATE TABLE IF NOT EXISTS `ys_r` (
  `time` datetime DEFAULT NULL,
  `flow` varchar(255) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `ys_r`
--

INSERT INTO `ys_r` (`time`, `flow`, `tid`) VALUES
('2014-08-06 16:09:44', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', NULL),
('2014-08-06 16:10:17', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"11"}]', NULL),
('2014-08-06 16:26:51', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"}]', NULL),
('2014-08-06 16:27:36', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"}]', NULL),
('2014-08-06 16:33:19', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', NULL),
('2014-08-06 16:35:13', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"6"}]', NULL),
('2014-08-06 16:35:23', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', NULL),
('2014-08-06 16:36:21', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"7"}]', NULL),
('2014-08-06 16:39:10', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"7"}]', NULL),
('2014-08-06 17:14:33', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"}]', NULL),
('2014-08-06 17:22:18', '[{"qid":"1","aid":"3"},{"qid":"4","aid":"9"}]', NULL),
('2014-08-06 17:22:56', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"7"}]', NULL),
('2014-08-06 17:23:12', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"11"}]', NULL),
('2014-08-11 14:20:31', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', NULL),
('2014-08-11 14:22:04', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', NULL),
('2014-08-11 15:01:54', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"}]', NULL),
('2014-08-11 15:14:51', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', NULL),
('2014-08-11 15:16:24', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"}]', NULL),
('2014-08-11 18:01:08', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"7"}]', NULL),
('2014-08-11 18:01:25', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"7"},{"qid":"3","aid":"6"}]', NULL),
('2014-08-11 18:01:59', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"}]', NULL),
('2014-08-11 18:03:59', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', NULL),
('2014-08-11 18:04:07', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', NULL),
('2014-08-11 18:04:09', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"},{"qid":"5","aid":"10"}]', NULL),
('2014-08-11 18:04:10', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"},{"qid":"5","aid":"10"},{"qid":"5","aid":"11"}]', NULL),
('2014-08-11 18:04:19', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"},{"qid":"5","aid":"10"},{"qid":"5","aid":"11"},{"qid":"5","aid":"10"}]', NULL),
('2014-08-11 18:04:38', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"}]', NULL),
('2014-08-11 18:04:46', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"},{"qid":"2","aid":"5"}]', NULL),
('2014-08-11 18:04:57', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"},{"qid":"2","aid":"5"},{"qid":"2","aid":"5"}]', NULL),
('2014-08-11 18:12:01', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', NULL),
('2014-08-11 18:14:13', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', NULL),
('2014-08-11 18:19:58', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"7"}]', NULL),
('2014-08-11 18:20:35', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', NULL),
('2014-08-11 18:23:41', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', 1),
('2014-08-11 18:23:58', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"}]', 1),
('2014-08-11 18:24:15', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"11"}]', 2),
('2014-08-11 18:29:42', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"}]', 1),
('2014-08-13 17:13:15', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"6"}]', 1),
('2014-08-14 09:38:46', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"}]', 1),
('2014-08-14 10:27:56', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"}]', 1),
('2014-08-14 10:28:16', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"}]', 1),
('2014-08-14 10:30:22', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"5"}]', 1),
('2014-08-14 10:31:22', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"6"}]', 1),
('2014-08-14 10:32:43', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"7"}]', 2),
('2014-08-14 10:33:04', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"6"}]', 1),
('2014-08-14 10:33:29', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"6"}]', 1),
('2014-08-14 13:38:51', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"7"}]', 2),
('2014-08-14 13:39:36', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"6"}]', 1),
('2014-08-14 13:39:48', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', 1),
('2014-08-14 13:40:02', '[{"qid":"1","aid":"1"},{"qid":"2","aid":"4"},{"qid":"5","aid":"10"}]', 1),
('2014-08-14 15:24:50', '[{"qid":"1","aid":"2"},{"qid":"3","aid":"7"}]', 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `ys_s`
--

CREATE TABLE IF NOT EXISTS `ys_s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `startq` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `ys_s`
--

INSERT INTO `ys_s` (`id`, `name`, `startq`) VALUES
(1, '流れ1', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `ys_t`
--

CREATE TABLE IF NOT EXISTS `ys_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(1023) DEFAULT NULL,
  `del` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- テーブルのデータのダンプ `ys_t`
--

INSERT INTO `ys_t` (`id`, `body`, `del`) VALUES
(1, 'あなたは、テクノロジー部部長、社内情報システムチームリーダー、木下さんです！', 0),
(2, 'あなたは、経営管理部とテクノロジー部両方のメンバー、相澤さんです！', 0),
(3, 'あなたは、当社の人事担当、藤原さんです！', 0),
(6, 'this is a new 啊哈哈', 0),
(7, '', 0),
(8, 'newter', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `ys_u`
--

CREATE TABLE IF NOT EXISTS `ys_u` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastlogin` varchar(255) DEFAULT NULL,
  `sess` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `userlevel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `ys_u`
--

INSERT INTO `ys_u` (`id`, `username`, `password`, `lastlogin`, `sess`, `name`, `userlevel`) VALUES
(1, 'g-li', '1a4310693505f3718d753de7d96c5e06', '2014-08-08 09:35:19', 'b4udt7mr7np804qdpr34ijds73', '李元傑', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
