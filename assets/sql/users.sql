-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

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

INSERT INTO `users` (`email`, `roles`, `fname`, `lname`, `pass`, `salt`) VALUES
('buyer1@example.com',	'buyer',	'Buyersatu',	NULL,	'EA5FF37B3D91A0BF99BA76A66806E8FD734710E729690502AE97AD54BA91F8C5',	'DLrtV'),
('miqdad@louvre.dev',	'admin',	'Miqdad',	'Abdurrahman',	'6188FAFDB356E3F30CD476D3D8A019630D8FDDC375FEEA1F1D28BBCE73D43587',	'lfS8X'),
('stefanus@louvre.dev',	'manager',	'Stefanus',	'Kurniawan',	'F34504D41E676303B197BEF6EF925B8E685193335AB0E5DF374FBAD86CDE9E58',	'YkpPp'),
('william@louvre.dev',	'manager',	'William',	'Darian',	'F1C8885EF90F8112AD5F4606F54598F946A5D8E07ED2F729E642CC2FCEF078A8',	'cCZx6')
ON DUPLICATE KEY UPDATE `email` = VALUES(`email`), `roles` = VALUES(`roles`), `fname` = VALUES(`fname`), `lname` = VALUES(`lname`), `pass` = VALUES(`pass`), `salt` = VALUES(`salt`);

-- 2017-11-17 08:07:20
