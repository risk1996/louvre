-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `userbook`;
CREATE TABLE `userbook` (
  `email` varchar(30) NOT NULL,
  `isbn13` char(13) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review` text,
  PRIMARY KEY (`isbn13`,`email`),
  KEY `email` (`email`),
  CONSTRAINT `bookreview_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  CONSTRAINT `bookreview_ibfk_2` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `userbook` (`email`, `isbn13`, `rating`, `review`) VALUES
('buyer1@example.com',	'9780316322409',	4,	NULL),
('buyer1@example.com',	'9780439023481',	4,	NULL),
('buyer1@example.com',	'9780451524935',	4,	NULL);

-- 2017-12-07 08:04:42
