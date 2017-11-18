-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `louvre`;
CREATE DATABASE `louvre` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `louvre`;

CREATE TABLE `book` (
  `isbn13` char(13) NOT NULL,
  `title` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` smallint(6) NOT NULL,
  `summary` text DEFAULT NULL,
  `ed` varchar(5) DEFAULT NULL,
  `pages` smallint(6) NOT NULL,
  `pubdate` date NOT NULL,
  `author` varchar(50) NOT NULL,
  `lang` varchar(12) NOT NULL,
  `format` varchar(5) NOT NULL,
  PRIMARY KEY (`isbn13`),
  UNIQUE KEY `slug` (`slug`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`price` > 0),
  CONSTRAINT `CONSTRAINT_2` CHECK (`stock` >= 0),
  CONSTRAINT `CONSTRAINT_3` CHECK (`pages` > 0),
  CONSTRAINT `CONSTRAINT_4` CHECK (`format` in ('PDF','EPUB','MOBI','AZW3','DVJU'))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `book` (`isbn13`, `title`, `slug`, `price`, `stock`, `summary`, `ed`, `pages`, `pubdate`, `author`, `lang`, `format`) VALUES
('9780316322409',	'I Am Malala',	'i-am-malala',	16.00,	3,	'When the Taliban took control of the Swat Valley in Pakistan, one girl spoke out. Malala Yousafzai refused to be silenced and fought for her right to an education.\r\n\r\nOn Tuesday, October 9, 2012, when she was fifteen, she almost paid the ultimate price. She was shot in the head at point-blank range while riding the bus home from school, and few expected her to survive. \r\n\r\nInstead, Malala''s miraculous recovery has taken her on an extraordinary journey from a remote valley in northern Pakistan to the halls of the United Nations in New York. At sixteen, she has become a global symbol of peaceful protest and the youngest-ever Nobel Peace Prize laureate.\r\n\r\nI Am Malala is the remarkable tale of a family uprooted by global terrorism, of the fight for girls'' education, of a father who, himself a school owner, championed and encouraged his daughter to write and attend school, and of brave parents who have a fierce love for their daughter in a society that prizes sons.',	NULL,	327,	'2012-11-01',	'Malala Yousafzai',	'English',	'PDF'),
('9780439023481',	'The Hunger Games',	'the-hunger-games',	10.99,	7,	'The nation of Panem, formed from a post-apocalyptic North America, is a country that consists of a wealthy Capitol region surrounded by 12 poorer districts. Early in its history, a rebellion led by a 13th district against the Capitol resulted in its destruction and the creation of an annual televised event known as the Hunger Games. In punishment, and as a reminder of the power and grace of the Capitol, each district must yield one boy and one girl between the ages of 12 and 18 through a lottery system to participate in the games. The ''tributes'' are chosen during the annual Reaping and are forced to fight to the death, leaving only one survivor to claim victory.\r\n\r\nWhen 16-year-old Katniss''s young sister, Prim, is selected as District 12''s female representative, Katniss volunteers to take her place. She and her male counterpart Peeta, are pitted against bigger, stronger representatives, some of whom have trained for this their whole lives. , she sees it as a death sentence. But Katniss has been close to death before. For her, survival is second nature.',	NULL,	374,	'2008-09-14',	'Suzanne Collins',	'English',	'PDF'),
('9781451648539',	'Steve Jobs',	'steve-jobs',	35.00,	10,	'From best-selling author Walter Isaacson comes the landmark biography of Apple co-founder Steve Jobs.\r\n\r\nIn Steve Jobs: The Exclusive Biography, Isaacson provides an extraordinary account of Jobs'' professional and personal life. Drawn from three years of exclusive and unprecedented interviews Isaacson has conducted with Jobs as well as extensive interviews with Jobs'' family members and key colleagues from Apple and its competitors, Steve Jobs: The Exclusive Biography is the definitive portrait of the greatest innovator of his generation.',	NULL,	656,	'2011-10-24',	'Walter Isaacson',	'English',	'PDF'),
('9781455582341',	'How Google Works',	'how-google-works',	18.99,	6,	'Both Eric Schmidt and Jonathan Rosenberg came to Google as seasoned Silicon Valley business executives, but over the course of a decade they came to see the wisdom in Coach John Wooden''s observation that ''it''s what you learn after you know it all that counts''. As they helped grow Google from a young start-up to a global icon, they relearned everything they knew about management. How Google Works is the sum of those experiences distilled into a fun, easy-to-read primer on corporate culture, strategy, talent, decision-making, communication, innovation, and dealing with disruption.\r\n\r\nThe authors explain how the confluence of three seismic changes - the internet, mobile, and cloud computing - has shifted the balance of power from companies to consumers. The companies that will thrive in this ever-changing landscape will be the ones that create superior products and attract a new breed of multifaceted employees whom the authors dub ''smart creatives''. The management maxims (''Consensus requires dissension'', ''Exile knaves but fight for divas'', ''Think 10X, not 10%'') are illustrated with previously unreported anecdotes from Google''s corporate history.\r\n\r\n''Back in 2010, Eric and I created an internal class for Google managers,'' says Rosenberg. ''The class slides all read ''Google confidential'' until an employee suggested we uphold the spirit of openness and share them with the world. This book codifies the recipe for our secret sauce: how Google innovates and how it empowers employees to succeed.''',	NULL,	305,	'2014-09-23',	'Eric Schmidt',	'English',	'PDF'),
('9781568364841',	'The Handbook of Japanese Verbs',	'handbook-japanese-verbs',	19.00,	2,	'From the very earliest stages of study until far into the intermediate level, students of the Japanese language are continually scratching their heads over the usage of verbs. It is no wonder that they should feel the need for a solid reference book, one they can continually turn to throughout their studying careers. The Handbook of Japanese Verbs is just that book.\r\n\r\nThe Introduction takes the first step toward comprehension by pointing out the features of Japanese verbs that stand in contrast to their English counterparts, such as tense, politeness level, auxiliaries, and transitive and intransitive forms.\r\n\r\nPart 1 shows through tables and concise commentary how Japanese verbs are categorized, conjugated, and combined with auxiliaries. Each form is followed by a short exercise, reinforcing the points just made.\r\n\r\nPart 2 takes up the forms described in the first part and shows how they function in full-fledged sentences. Each discussion is followed by examples and exercises, ensuring that the student has understood the forms under discussion.\r\n\r\nIn the appendices, the student is offered a number of look-up methods, including an English-Japanese verb dictionary. This completes the apparatus necessary for a solid handbook on Japanese verbs, a book students can rely on for many years to come',	NULL,	256,	'2001-06-19',	'Taeko Kamiya',	'English',	'PDF'),
('9781853260315',	'20000 Leagues Under the Sea',	'twenty-thousands-league-under',	3.39,	8,	'Professor Aronnax, his faithful servant, Conseil, and the Canadian harpooner, Ned Land, begin an extremely hazardous voyage to rid the seas of a little-known and terrifying sea monster. However, the \"monster\" turns out to be a giant submarine, commanded by the mysterious Captain Nemo, by whom they are soon held captive. So begins not only one of the great adventure classics by Jules Verne, the ''Father of Science Fiction'', but also a truly fantastic voyage from the lost city of Atlantis to the South Pole.',	NULL,	406,	'1998-01-01',	'Jules Verne',	'English',	'PDF'),
('9788120343399',	'C++:How to Program',	'cpp-how-to-program',	171.40,	4,	'With over 250,000 sold, Harvey and Paul Deitel''s \"C++ How to Program\" is the world''s best-selling introduction to C++ programming. Now, this classic has been thoroughly updated! The Deitels'' groundbreaking How to Program series offers unparalleled breadth and depth of programming concepts and intermediate-level topics for further study. The books in this series feature hundreds of complete, working programs with thousands of lines of code. Deitels'' \"C++ How to Program\" is the most comprehensive, practical introduction to C++ ever published-with hundreds of hands-on exercises, roughly 250 complete programs written and documented for easy learning, and exceptional insight into good programming practices, maximizing performance, avoiding errors, debugging, and testing. The updated Fifth Edition now includes a new early classes pedagogy-classes and objects are introduced in Chapter 3 and used throughout the book as appropriate. The new edition uses string and vector classes to make earlier examples more object-oriented. Large chapters are broken down into smaller, more manageable pieces. A new OOD/UML ATM case study replaces the elevator case study of previous editions, and UML in the OOD/UML case study and elsewhere in the book has been upgraded to UML 2. The Fifth Edition features new mini case studies (e.g., GradeBook and Time classes). An employee hierarchy replaces Point/Circle/Cylinder to introduce inheritance and polymorphism. Additional enhancements include tuned treatment of exception handling, new \"Using the Debugger\" material and a new \"Before You Begin\" section to help readers get set up properly. Also included are separate chapters on recursion and searching/sorting. TheFifth Edition retains every key concept and technique ANSI C++ developers need to master: control statements, functions, arrays, pointers and strings, classes and data abstraction, operator overloading, inheritance, virtual functions, polymorphism, I/O, templates, exception handling, file processing, data structures, and more. It also includes a detailed introduction to Standard Template Library (STL) containers, container adapters, algorithms, and iterators. The accompanying CD-ROM includes all the source code from the book. A valuable reference for programmers and anyone interested in learning the C++ programming language and object-oriented development in C++.',	'8',	1536,	'2004-12-01',	'Paul Deitel',	'English',	'PDF');

CREATE TABLE `bookdetail` (`isbn13` char(13), `title` varchar(50), `slug` varchar(50), `price` decimal(10,2), `stock` smallint(6), `summary` text, `ed` varchar(5), `pages` smallint(6), `pubdate` date, `author` varchar(50), `lang` varchar(12), `format` varchar(5), `genre` mediumtext, `discount` decimal(5,2));


CREATE TABLE `bookfeatured` (
  `isbn13` char(13) NOT NULL,
  `info` text DEFAULT NULL,
  `until` date NOT NULL,
  PRIMARY KEY (`isbn13`),
  CONSTRAINT `bookfeatured_ibfk_1` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `bookgenre` (
  `isbn13` char(13) NOT NULL,
  `genre` varchar(25) NOT NULL,
  KEY `isbn13` (`isbn13`),
  CONSTRAINT `bookgenre_ibfk_1` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bookgenre` (`isbn13`, `genre`) VALUES
('9780316322409',	'Nonfiction'),
('9780316322409',	'Autobiography'),
('9780316322409',	'Feminism'),
('9780439023481',	'Young Adult'),
('9780439023481',	'Fiction'),
('9780439023481',	'Science Fiction'),
('9780439023481',	'Dystopia'),
('9780439023481',	'Fantasy'),
('9781451648539',	'Biography'),
('9781451648539',	'Nonfiction'),
('9781451648539',	'Business'),
('9781451648539',	'Technology'),
('9781451648539',	'Science'),
('9781455582341',	'Business'),
('9781455582341',	'Nonfiction'),
('9781455582341',	'Science'),
('9781455582341',	'Technology'),
('9781455582341',	'Management'),
('9781568364841',	'Literature'),
('9781568364841',	'Handbook'),
('9781568364841',	'Reference'),
('9781568364841',	'Language'),
('9781568364841',	'Humanities'),
('9781853260315',	'Fiction'),
('9781853260315',	'Classic'),
('9781853260315',	'Fantasy'),
('9781853260315',	'Literature'),
('9781853260315',	'Cultural'),
('9781853260315',	'Science Fiction'),
('9781853260315',	'Steampunk'),
('9781853260315',	'Novel'),
('9788120343399',	'Computer Science'),
('9788120343399',	'Programming'),
('9788120343399',	'Reference'),
('9788120343399',	'Nonfiction');

CREATE TABLE `bookpromotion` (
  `isbn13` char(13) NOT NULL,
  `discount` decimal(5,2) DEFAULT 0.00,
  `until` date NOT NULL,
  PRIMARY KEY (`isbn13`),
  CONSTRAINT `bookpromotion_ibfk_1` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`discount` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `bookrecommended` (`isbn13` char(13), `title` varchar(50), `slug` varchar(50), `price` decimal(10,2), `stock` smallint(6), `summary` text, `ed` varchar(5), `pages` smallint(6), `pubdate` date, `author` varchar(50), `lang` varchar(12), `format` varchar(5), `genre` mediumtext, `discount` decimal(5,2), `info` text);


CREATE TABLE `bookreview` (
  `isbn13` char(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review` text DEFAULT NULL,
  PRIMARY KEY (`isbn13`,`email`),
  KEY `email` (`email`),
  CONSTRAINT `bookreview_ibfk_1` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`),
  CONSTRAINT `bookreview_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`rating` between 1 and 10)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `cart` (
  `email` varchar(30) NOT NULL,
  `isbn13` char(13) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `discount` decimal(5,2) DEFAULT 0.00,
  `addded` datetime NOT NULL,
  PRIMARY KEY (`email`,`isbn13`),
  KEY `isbn13` (`isbn13`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`quantity` > 0),
  CONSTRAINT `CONSTRAINT_2` CHECK (`discount` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `transactions` (
  `invoiceno` char(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `payment` varchar(15) NOT NULL,
  `invdate` datetime NOT NULL,
  PRIMARY KEY (`invoiceno`),
  KEY `email` (`email`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`payment` in ('Debit','Visa','MasterCard','PayPal'))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `transactionsdetail` (
  `invoiceno` char(12) NOT NULL,
  `isbn13` char(13) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `discount` decimal(5,2) DEFAULT 0.00,
  PRIMARY KEY (`invoiceno`,`isbn13`),
  KEY `isbn13` (`isbn13`),
  CONSTRAINT `transactionsdetail_ibfk_1` FOREIGN KEY (`invoiceno`) REFERENCES `transactions` (`invoiceno`),
  CONSTRAINT `transactionsdetail_ibfk_2` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`quantity` > 0),
  CONSTRAINT `CONSTRAINT_2` CHECK (`discount` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `roles` varchar(9) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `pass` char(64) NOT NULL,
  `salt` char(5) NOT NULL,
  PRIMARY KEY (`email`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`email` like '?%@?%.??%'),
  CONSTRAINT `CONSTRAINT_2` CHECK (`roles` in ('buyer','manager','admin'))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`email`, `roles`, `fname`, `lname`, `pass`, `salt`) VALUES
('buyer1@example.com',	'buyer',	'Buyersatu',	NULL,	'EA5FF37B3D91A0BF99BA76A66806E8FD734710E729690502AE97AD54BA91F8C5',	'DLrtV'),
('miqdad@louvre.dev',	'admin',	'Miqdad',	'Abdurrahman',	'6188FAFDB356E3F30CD476D3D8A019630D8FDDC375FEEA1F1D28BBCE73D43587',	'lfS8X'),
('stefanus@louvre.dev',	'manager',	'Stefanus',	'Kurniawan',	'F34504D41E676303B197BEF6EF925B8E685193335AB0E5DF374FBAD86CDE9E58',	'YkpPp'),
('william@louvre.dev',	'manager',	'William',	'Darian',	'F1C8885EF90F8112AD5F4606F54598F946A5D8E07ED2F729E642CC2FCEF078A8',	'cCZx6');

DROP TABLE IF EXISTS `bookdetail`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `bookdetail` AS select `book`.`isbn13` AS `isbn13`,`book`.`title` AS `title`,`book`.`slug` AS `slug`,`book`.`price` AS `price`,`book`.`stock` AS `stock`,`book`.`summary` AS `summary`,`book`.`ed` AS `ed`,`book`.`pages` AS `pages`,`book`.`pubdate` AS `pubdate`,`book`.`author` AS `author`,`book`.`lang` AS `lang`,`book`.`format` AS `format`,group_concat(`bookgenre`.`genre` separator ',') AS `genre`,`bookpromotion`.`discount` AS `discount` from ((`book` join `bookgenre` on(`book`.`isbn13` = `bookgenre`.`isbn13`)) left join `bookpromotion` on(`book`.`isbn13` = `bookpromotion`.`isbn13`)) group by 1;

DROP TABLE IF EXISTS `bookrecommended`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `bookrecommended` AS select `bookfeatured`.`isbn13` AS `isbn13`,`bookdetail`.`title` AS `title`,`bookdetail`.`slug` AS `slug`,`bookdetail`.`price` AS `price`,`bookdetail`.`stock` AS `stock`,`bookdetail`.`summary` AS `summary`,`bookdetail`.`ed` AS `ed`,`bookdetail`.`pages` AS `pages`,`bookdetail`.`pubdate` AS `pubdate`,`bookdetail`.`author` AS `author`,`bookdetail`.`lang` AS `lang`,`bookdetail`.`format` AS `format`,`bookdetail`.`genre` AS `genre`,`bookdetail`.`discount` AS `discount`,`bookfeatured`.`info` AS `info` from (`bookfeatured` left join `bookdetail` on(`bookfeatured`.`isbn13` = `bookdetail`.`isbn13`));

-- 2017-11-18 04:14:49
