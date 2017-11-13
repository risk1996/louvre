-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `isbn13` char(13) NOT NULL,
  `title` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` smallint(6) NOT NULL,
  `cover` varchar(50) DEFAULT NULL,
  `summary` text,
  `edition` varchar(5) DEFAULT NULL,
  `pages` smallint(6) NOT NULL,
  `pubdate` date NOT NULL,
  `genre` varchar(20) NOT NULL,
  `author` varchar(50) NOT NULL,
  `language` varchar(12) NOT NULL,
  `format` varchar(5) NOT NULL,
  PRIMARY KEY (`isbn13`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `book` (`isbn13`, `title`, `slug`, `price`, `stock`, `cover`, `summary`, `edition`, `pages`, `pubdate`, `genre`, `author`, `language`, `format`) VALUES
('9780134448237',	'C++:How to Program 10th ed',	'how-to-program-10th-deitel',	171.40,	17,	NULL,	NULL,	'10',	1080,	'2016-03-10',	'Textbook',	'Paul Deitel',	'English',	'PDF'),
('9780316322409',	'I Am Malala',	'i-am-malala',	34.30,	31,	NULL,	NULL,	NULL,	327,	'2013-10-08',	'Biography',	'Malala Yousafzai',	'English',	'PDF'),
('9780439023481',	'The Hunger Games',	'the-hunger-games',	18.99,	21,	NULL,	NULL,	NULL,	384,	'2008-09-14',	'Sci-Fi',	'Suzanne Collins',	'English',	'PDF'),
('9781451648539',	'Steve Jobs',	'steve-jobs',	35.00,	10,	NULL,	'',	NULL,	656,	'2011-10-24',	'Biography',	'Walter Isaacson',	'English',	'PDF'),
('9781455582341',	'How Google Works',	'how-google-works',	30.00,	5,	NULL,	NULL,	NULL,	304,	'2014-09-23',	'Business',	'Eric Schmidt',	'English',	'PDF'),
('9781568364841',	'The Handbook of Japanese Verbs',	'handbook-japanese-verbs',	15.90,	3,	NULL,	NULL,	NULL,	256,	'2012-11-06',	'Handbook',	'Taeko Kamiya',	'English',	'PDF'),
('9781853260315',	'20000 Leagues Under the Sea',	'twenty-thousands-league-under',	7.98,	15,	NULL,	'',	NULL,	256,	'1998-01-01',	'Literature',	'Jules Verne',	'English',	'PDF');

DROP TABLE IF EXISTS `bookfeatured`;
CREATE TABLE `bookfeatured` (
  `isbn13` char(13) NOT NULL,
  `info` text,
  `until` date NOT NULL,
  PRIMARY KEY (`isbn13`),
  CONSTRAINT `bookfeatured_ibfk_1` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `bookpromotion`;
CREATE TABLE `bookpromotion` (
  `isbn13` char(13) NOT NULL,
  `discount` decimal(5,2) DEFAULT '0.00',
  `until` date NOT NULL,
  PRIMARY KEY (`isbn13`),
  CONSTRAINT `bookpromotion_ibfk_1` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `bookreview`;
CREATE TABLE `bookreview` (
  `isbn13` char(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review` text,
  PRIMARY KEY (`isbn13`,`email`),
  KEY `email` (`email`),
  CONSTRAINT `bookreview_ibfk_1` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`),
  CONSTRAINT `bookreview_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `email` varchar(30) NOT NULL,
  `isbn13` char(13) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `discount` decimal(5,2) DEFAULT '0.00',
  `addded` datetime NOT NULL,
  PRIMARY KEY (`email`,`isbn13`),
  KEY `isbn13` (`isbn13`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `invoiceno` char(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `payment` varchar(15) NOT NULL,
  `invdate` datetime NOT NULL,
  PRIMARY KEY (`invoiceno`),
  KEY `email` (`email`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `transactionsdetail`;
CREATE TABLE `transactionsdetail` (
  `invoiceno` char(12) NOT NULL,
  `isbn13` char(13) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `discount` decimal(5,2) DEFAULT '0.00',
  PRIMARY KEY (`invoiceno`,`isbn13`),
  KEY `isbn13` (`isbn13`),
  CONSTRAINT `transactionsdetail_ibfk_1` FOREIGN KEY (`invoiceno`) REFERENCES `transactions` (`invoiceno`),
  CONSTRAINT `transactionsdetail_ibfk_2` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `roles` varchar(9) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `pass` char(64) NOT NULL,
  `salt` char(5) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2017-11-13 06:29:30
