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
  `summary` text DEFAULT NULL,
  `ed` varchar(5) DEFAULT NULL,
  `pages` smallint(6) NOT NULL,
  `pubdate` date NOT NULL,
  `author` varchar(50) NOT NULL,
  `lang` varchar(12) NOT NULL,
  `format` varchar(5) NOT NULL,
  `adddate` date NOT NULL,
  PRIMARY KEY (`isbn13`),
  UNIQUE KEY `slug` (`slug`),
  KEY `lang` (`lang`),
  KEY `format` (`format`),
  CONSTRAINT `book_ibfk_1` FOREIGN KEY (`lang`) REFERENCES `langs` (`lang`),
  CONSTRAINT `book_ibfk_2` FOREIGN KEY (`format`) REFERENCES `formats` (`format`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`price` > 0),
  CONSTRAINT `CONSTRAINT_2` CHECK (`pages` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `book` (`isbn13`, `title`, `slug`, `price`, `summary`, `ed`, `pages`, `pubdate`, `author`, `lang`, `format`, `adddate`) VALUES
('9780316322409',	'I Am Malala',	'i-am-malala',	16.00,	'When the Taliban took control of the Swat Valley in Pakistan, one girl spoke out. Malala Yousafzai refused to be silenced and fought for her right to an education.\r\n\r\nOn Tuesday, October 9, 2012, when she was fifteen, she almost paid the ultimate price. She was shot in the head at point-blank range while riding the bus home from school, and few expected her to survive. \r\n\r\nInstead, Malala''s miraculous recovery has taken her on an extraordinary journey from a remote valley in northern Pakistan to the halls of the United Nations in New York. At sixteen, she has become a global symbol of peaceful protest and the youngest-ever Nobel Peace Prize laureate.\r\n\r\nI Am Malala is the remarkable tale of a family uprooted by global terrorism, of the fight for girls'' education, of a father who, himself a school owner, championed and encouraged his daughter to write and attend school, and of brave parents who have a fierce love for their daughter in a society that prizes sons.',	NULL,	327,	'2012-11-01',	'Malala Yousafzai',	'EN-US',	'PDF',	'2017-12-04'),
('9780393609394',	'Astrophysics for People in a Hurry',	'astrophysics-for-people-in-a-hurry',	18.95,	'What is the nature of space and time? How do we fit within the universe? How does the universe fit within us? There’s no better guide through these mind-expanding questions than acclaimed astrophysicist and best-selling author Neil deGrasse Tyson.\r\n\r\nBut today, few of us have time to contemplate the cosmos. So Tyson brings the universe down to Earth succinctly and clearly, with sparkling wit, in tasty chapters consumable anytime and anywhere in your busy day.\r\n\r\nWhile you wait for your morning coffee to brew, for the bus, the train, or a plane to arrive, Astrophysics for People in a Hurry will reveal just what you need to be fluent and ready for the next cosmic headlines: from the Big Bang to black holes, from quarks to quantum mechanics, and from the search for planets to the search for life in the universe.',	NULL,	222,	'2017-05-02',	'Neil deGrasse Tyson',	'EN-US',	'PDF',	'2017-12-04'),
('9780439023481',	'The Hunger Games',	'the-hunger-games',	10.99,	'The nation of Panem, formed from a post-apocalyptic North America, is a country that consists of a wealthy Capitol region surrounded by 12 poorer districts. Early in its history, a rebellion led by a 13th district against the Capitol resulted in its destruction and the creation of an annual televised event known as the Hunger Games. In punishment, and as a reminder of the power and grace of the Capitol, each district must yield one boy and one girl between the ages of 12 and 18 through a lottery system to participate in the games. The ''tributes'' are chosen during the annual Reaping and are forced to fight to the death, leaving only one survivor to claim victory.\r\n\r\nWhen 16-year-old Katniss''s young sister, Prim, is selected as District 12''s female representative, Katniss volunteers to take her place. She and her male counterpart Peeta, are pitted against bigger, stronger representatives, some of whom have trained for this their whole lives. , she sees it as a death sentence. But Katniss has been close to death before. For her, survival is second nature.',	NULL,	374,	'2008-09-14',	'Suzanne Collins',	'EN-US',	'PDF',	'2017-12-04'),
('9780451524935',	'1984',	'1984',	9.99,	'The year 1984 has come and gone, but George Orwell''s prophetic, nightmarish vision in 1949 of the world we were becoming is timelier than ever. 1984 is still the great modern classic of \"negative utopia\" -a startlingly original and haunting novel that creates an imaginary world that is completely convincing, from the first sentence to the last four words. No one can deny the novel''s hold on the imaginations of whole generations, or the power of its admonitions -a power that seems to grow, not lessen, with the passage of time.',	NULL,	328,	'1950-07-01',	'George Orwell',	'EN-US',	'EPUB',	'2017-12-04'),
('9780451526342',	'Animal Farm',	'animal-farm',	9.99,	'A farm is taken over by its overworked, mistreated animals. With flaming idealism and stirring slogans, they set out to create a paradise of progress, justice, and equality. Thus the stage is set for one of the most telling satiric fables ever penned –a razor-edged fairy tale for grown-ups that records the evolution from revolution against tyranny to a totalitarianism just as terrible. \r\nWhen Animal Farm was first published, Stalinist Russia was seen as its target. Today it is devastatingly clear that wherever and whenever freedom is attacked, under whatever banner, the cutting clarity and savage comedy of George Orwell’s masterpiece have a meaning and message still ferociously fresh.',	NULL,	144,	'1996-01-01',	'George Orwell',	'EN-US',	'EPUB',	'2017-12-04'),
('9781451648539',	'Steve Jobs',	'steve-jobs',	35.00,	'From best-selling author Walter Isaacson comes the landmark biography of Apple co-founder Steve Jobs.\r\n\r\nIn Steve Jobs: The Exclusive Biography, Isaacson provides an extraordinary account of Jobs'' professional and personal life. Drawn from three years of exclusive and unprecedented interviews Isaacson has conducted with Jobs as well as extensive interviews with Jobs'' family members and key colleagues from Apple and its competitors, Steve Jobs: The Exclusive Biography is the definitive portrait of the greatest innovator of his generation.',	NULL,	656,	'2011-10-24',	'Walter Isaacson',	'EN-US',	'PDF',	'2017-12-04'),
('9781455582341',	'How Google Works',	'how-google-works',	18.99,	'Both Eric Schmidt and Jonathan Rosenberg came to Google as seasoned Silicon Valley business executives, but over the course of a decade they came to see the wisdom in Coach John Wooden''s observation that ''it''s what you learn after you know it all that counts''. As they helped grow Google from a young start-up to a global icon, they relearned everything they knew about management. How Google Works is the sum of those experiences distilled into a fun, easy-to-read primer on corporate culture, strategy, talent, decision-making, communication, innovation, and dealing with disruption.\r\n\r\nThe authors explain how the confluence of three seismic changes - the internet, mobile, and cloud computing - has shifted the balance of power from companies to consumers. The companies that will thrive in this ever-changing landscape will be the ones that create superior products and attract a new breed of multifaceted employees whom the authors dub ''smart creatives''. The management maxims (''Consensus requires dissension'', ''Exile knaves but fight for divas'', ''Think 10X, not 10%'') are illustrated with previously unreported anecdotes from Google''s corporate history.\r\n\r\n''Back in 2010, Eric and I created an internal class for Google managers,'' says Rosenberg. ''The class slides all read ''Google confidential'' until an employee suggested we uphold the spirit of openness and share them with the world. This book codifies the recipe for our secret sauce: how Google innovates and how it empowers employees to succeed.''',	NULL,	305,	'2014-09-23',	'Eric Schmidt',	'EN-US',	'PDF',	'2017-12-04'),
('9781568364841',	'The Handbook of Japanese Verbs',	'handbook-japanese-verbs',	19.00,	'From the very earliest stages of study until far into the intermediate level, students of the Japanese language are continually scratching their heads over the usage of verbs. It is no wonder that they should feel the need for a solid reference book, one they can continually turn to throughout their studying careers. The Handbook of Japanese Verbs is just that book.\r\n\r\nThe Introduction takes the first step toward comprehension by pointing out the features of Japanese verbs that stand in contrast to their English counterparts, such as tense, politeness level, auxiliaries, and transitive and intransitive forms.\r\n\r\nPart 1 shows through tables and concise commentary how Japanese verbs are categorized, conjugated, and combined with auxiliaries. Each form is followed by a short exercise, reinforcing the points just made.\r\n\r\nPart 2 takes up the forms described in the first part and shows how they function in full-fledged sentences. Each discussion is followed by examples and exercises, ensuring that the student has understood the forms under discussion.\r\n\r\nIn the appendices, the student is offered a number of look-up methods, including an English-Japanese verb dictionary. This completes the apparatus necessary for a solid handbook on Japanese verbs, a book students can rely on for many years to come',	NULL,	256,	'2001-06-19',	'Taeko Kamiya',	'EN-US',	'PDF',	'2017-12-04'),
('9781853260315',	'20000 Leagues Under the Sea',	'twenty-thousands-league-under',	3.39,	'Professor Aronnax, his faithful servant, Conseil, and the Canadian harpooner, Ned Land, begin an extremely hazardous voyage to rid the seas of a little-known and terrifying sea monster. However, the \"monster\" turns out to be a giant submarine, commanded by the mysterious Captain Nemo, by whom they are soon held captive. So begins not only one of the great adventure classics by Jules Verne, the ''Father of Science Fiction'', but also a truly fantastic voyage from the lost city of Atlantis to the South Pole.',	NULL,	406,	'1998-01-01',	'Jules Verne',	'EN-UK',	'PDF',	'2017-12-04'),
('9788120343399',	'C++: How to Program',	'cpp-how-to-program',	171.40,	'With over 250,000 sold, Harvey and Paul Deitel''s \"C++ How to Program\" is the world''s best-selling introduction to C++ programming. Now, this classic has been thoroughly updated! The Deitels'' groundbreaking How to Program series offers unparalleled breadth and depth of programming concepts and intermediate-level topics for further study. The books in this series feature hundreds of complete, working programs with thousands of lines of code. Deitels'' \"C++ How to Program\" is the most comprehensive, practical introduction to C++ ever published-with hundreds of hands-on exercises, roughly 250 complete programs written and documented for easy learning, and exceptional insight into good programming practices, maximizing performance, avoiding errors, debugging, and testing. The updated Fifth Edition now includes a new early classes pedagogy-classes and objects are introduced in Chapter 3 and used throughout the book as appropriate. The new edition uses string and vector classes to make earlier examples more object-oriented. Large chapters are broken down into smaller, more manageable pieces. A new OOD/UML ATM case study replaces the elevator case study of previous editions, and UML in the OOD/UML case study and elsewhere in the book has been upgraded to UML 2. The Fifth Edition features new mini case studies (e.g., GradeBook and Time classes). An employee hierarchy replaces Point/Circle/Cylinder to introduce inheritance and polymorphism. Additional enhancements include tuned treatment of exception handling, new \"Using the Debugger\" material and a new \"Before You Begin\" section to help readers get set up properly. Also included are separate chapters on recursion and searching/sorting. TheFifth Edition retains every key concept and technique ANSI C++ developers need to master: control statements, functions, arrays, pointers and strings, classes and data abstraction, operator overloading, inheritance, virtual functions, polymorphism, I/O, templates, exception handling, file processing, data structures, and more. It also includes a detailed introduction to Standard Template Library (STL) containers, container adapters, algorithms, and iterators. The accompanying CD-ROM includes all the source code from the book. A valuable reference for programmers and anyone interested in learning the C++ programming language and object-oriented development in C++.',	'8',	1536,	'2004-12-01',	'Paul Deitel',	'EN-US',	'PDF',	'2017-12-04'),
('9789792239836',	'Winter in Tokyo',	'winter-in-tokyo',	4.95,	'Tetangga baruku, Nishimura Kazuto, datang ke Tokyo untuk mencari suasana baru. Itulah katanya, tapi menurutku alasannya lebih dari itu. Dia orang yang baik, menyenangkan, dan bisa diandalkan. Perlahan-lahan---mungkin sejak malam Natal itu---aku mulai memandangnya dengan cara yang berbeda. Dan sejak itu pula rasanya sulit membayangkan hidup tanpa dia.\r\n---Keiko tentang Kazuto\r\n\r\nSejak awal aku sudah merasa ada sesuatu yang menari dari Ishida Keiko. Segalanya terasa menyenangkan bila dia ada. Segalanya terasa baik bila dia ada. Saat ini di dalam hatinya masih ada seseorang yang ditunggunya. Cinta pertamanya. Kuharap dia bisa berhenti memikirkan orang itu dan mulai melihatku. Karena hidup tanpa dirinya sama sekali bukan hidup.\r\n---Kazuto tentang Keiko\r\n\r\nMereka pertama kali bertemu di awal musim dingin di Tokyo. Selama sebulan bersama, perasaan baru pun mulai terbentuk. Lalu segalanya berubah ketika suatu hari salah seorang dari mereka terbangun dan sama sekali tidak mengingat semua yang terjadi selama sebulan terakhir, termasuk orang yang tadinya sudah menjadi bagian penting dalam hidupnya...',	NULL,	313,	'2008-08-01',	'Ilana Tan',	'ID-ID',	'PDF',	'2017-12-04'),
('9789792248616',	'Negeri 5 Menara',	'negeri-5-menara',	8.00,	'Alif lahir di pinggir Danau Maninjau dan tidak pernah menginjak tanah di luar ranah Minangkabau. Masa kecilnya adalah berburu durian runtuh di rimba Bukit Barisan, bermain bola di sawah berlumpur dan tentu mandi berkecipak di air biru Danau Maninjau.\r\n\r\nTiba-tiba saja dia harus naik bus tiga hari tiga malam melintasi punggung Sumatera dan Jawa menuju sebuah desa di pelosok Jawa Timur. Ibunya ingin dia menjadi Buya Hamka walau Alif ingin menjadi Habibie. Dengan setengah hati dia mengikuti perintah Ibunya: belajar di pondok.\r\n\r\nDi kelas hari pertamanya di Pondok Madani (PM), Alif terkesima dengan “mantera” sakti man jadda wajada. Siapa yang bersungguh-sungguh pasti sukses.\r\n\r\nDia terheran-heran mendengar komentator sepakbola berbahasa Arab, anak menggigau dalam bahasa Inggris, merinding mendengar ribuan orang melagukan Syair Abu Nawas dan terkesan melihat pondoknya setiap pagi seperti melayang di udara.\r\n\r\nDipersatukan oleh hukuman jewer berantai, Alif berteman dekat dengan Raja dari Medan, Said dari Surabaya, Dulmajid dari Sumenep, Atang dari Bandung dan Baso dari Gowa. Di bawah menara masjid yang menjulang, mereka berenam kerap menunggu maghrib sambil menatap awan lembayung yang berarak pulang ke ufuk. Di mata belia mereka, awan-awan itu menjelma menjadi negara dan benua impian masing-masing. Kemana impian jiwa muda ini membawa mereka? Mereka tidak tahu. Yang mereka tahu adalah: Jangan pernah remehkan impian, walau setinggi apa pun. Tuhan sungguh Maha Mendengar.\r\n\r\nBagaimana perjalanan mereka ke ujung dunia ini dimulai? Siapa horor nomor satu mereka? Apa pengalaman mendebarkan di tengah malam buta di sebelah sungai tempat jin buang anak? Bagaimana sampai ada yang kasak-kusuk menjadi mata-mata misterius? Siapa Princess of Madani yang mereka kejar-kejar? Kenapa mereka harus botak berkilat-kilat? Bagaimana sampai Icuk Sugiarto, Arnold Schwarzenegger, Ibnu Rusyd, bahkan Maradona sampai akhirnya ikut campur? Ikuti perjalanan hidup yang inspiratif ini langsung dari mata para pelakunya. Negeri Lima Menara adalah buku pertama dari sebuah trilogi.',	NULL,	432,	'2009-08-01',	'Ahmad Fuadi',	'ID-ID',	'EPUB',	'2017-12-04'),
('9789792274813',	'Merry Riana: Mimpi Sejuta Dolar',	'merry-riana-mimpi-sejuta-dolar',	13.50,	'Titik awal keberhasilan adalah impian.\r\n\r\nDari seorang mahasiswi dengan ekonomi pas-pasan, Merry Riana, anak muda Indonesia, menjelma menjadi miliuner muda dan diakui sebagai pengusaha sukses, motivator yang sangat dinamis, serta pengarang buku terlaris di Singapura. Melewatkan masa kuliah yang penuh dengan keprihatinan finansial di Nanyang Technological University, Merry kemudian menciptakan perubahan paradigma berpikir dan memulai suatu perjuangan dengan konsep dan etos kerja keras luar biasa. Akhirnya, dia berhasil meraih penghasilan 1 juta dolar di usia 26 tahun.\r\n\r\nKini Merry ingin menciptakan dampak positif di dalam kehidupan banyak orang, terutama di Indonesia.\r\n\r\nBuku ini berisi pengalaman perjuangan Merry beserta hikmah yang sangat inspiratif dan bisa diterapkan untuk mencapai sukses dalam kehidupan.\r\n\r\n\r\n“Apa yang dilakukan Merry Riana adalah salah satu contoh bahwa usia tidak membatasi kita untuk sukses, melainkan keuletan dan kerja keras yang menjadi kuncinya.”\r\n--Andy F. Noya, Host Program Kick Andy\r\n\r\n“Saya suka cara Merry Riana membagi kisah perjuangan hidupnya, cara dia memandang hidup, dan cara dia memberikan motivasi tanpa menggurui.”\r\n--Ronal Surapradja, Penyiar, Host, Aktor, Musisi, Pekerja Seni\r\n\r\n“Terus berkarya yaah Mbak Merry Riana, semoga selalu menjadi inspirasi buat kita semua....”\r\n--Nycta Gina “Jeng Kelin”, Pemain Sinetron, Bintang Iklan, Presenter\r\n\r\n“Merry Riana mengajarkan pada kita bagaimana impian yang diselimuti tekad, keyakinan, dan kerja keras bisa membuahkan keberhasilan.”',	NULL,	362,	'2011-01-01',	'Alberthiene Endah',	'ID-ID',	'EPUB',	'2017-12-04'),
('9789793062921',	'Sang Pemimpi',	'sang-pemimpi',	6.00,	'Sang Pemimpi adalah sebuah lantunan kisah kehidupan yang memesona dan akan membuat Anda percaya akan tenaga cinta, percaya pada kekuatan mimpi dan pengorbanan, lebih dari itu, akan membuat Anda percaya kepada Tuhan. Andrea akan membawa Anda berkelana menerobos sudut-sudut pemikiran di mana Anda akan menemukan pandangan yang berbeda tentang nasib, tantangan intelektualitas, dan kegembiraan yang meluap-luap, sekaligus kesedihan yang mengharu biru. \r\n\r\nTampak komikal pada awalnya, selayaknya kenakalan remaja biasa, tapi kemudian tanpa Anda sadari, kisah dan karakter-karakter dalam buku ini lambat laun menguasai Anda. Karena potret-potret kecil yang menawan akan menghentakkan Anda pada rasa humor yang halus namun memiliki efek filosofis yang meresonansi. Karena arti perjuangan hidup dalam kemiskinan yang membelit dan cita-cita yang gagah berani dalam kisah dua orang tokoh utama buku ini: Arai dan Ikal akan menuntun Anda dengan semacam keanggunan dan daya tarik agar Anda dapat melihat ke dalam diri sendiri dengan penuh pengharapan, agar Anda menolak semua keputusasaan dan ketakberdayaan Anda sendiri. \r\n\r\n“Kita tak kan pernah mendahului nasib!” teriak Arai.\r\n“Kita akan sekolah ke Prancis, menjelajahi Eropa sampai ke Afrika! Apa pun yang terjadi!”',	NULL,	292,	'2006-01-01',	'Andrea Hirata',	'ID-ID',	'PDF',	'2017-12-04'),
('9789797591519',	'5 cm',	'5-cm',	7.55,	'Bestseller book di Gramedia Bookstore selama 2 tahun berturut-turut!\r\n\r\nLima sahabat telah menjalin persahabatan selama tujuh tahun. Mereka adalah Arial yang paling tampan, Riani sebagai satu-satunya wanita dalam kelompok itu, Zafran yang berlagak seperti seorang penyair, Ian yang paling subur badannya, dan Genta yang dianggap sebagai leader dalam kelompok itu. Kegemaran mereka adalah mengeksekusi hal-hal yang tidak mungkin dan mencoba segala hal, mulai dari kafe paling terkenal di Jakarta, sampai nonton layar tancap. Semuanya penggemar film, dari film Hollywood sampai film yang nggak kelas—kecuali film India karena mereka punya prinsip bahwa semua persoalan di dunia atau masalah pasti ada jalan keluarnya, tapi bukan dalam bentuk joget.\r\n\r\nSuatu saat, karena terdorong oleh rasa bosan di antara satu dan yang lain, mereka memutuskan untuk tidak saling berkomunikasi dan bertemu satu sama lain selama tiga bulan. Selama tiga bulan berpisah itulah telah terjadi banyak hal yang membuat hati mereka lebih kaya dari sebelumnya. Pertemuan setelah tiga bulan yang penuh dengan rasa kangen akhirnya terjadi dan dirayakan dengan sebuah perjalanan. Sebuah perjalanan yang penuh dengan keyakinan, mimpi, cita-cita, dan cinta. Sebuah perjalanan yang telah mengubah mereka menjadi manusia sesungguhnya, bukan Cuma seonggok daging yang bisa berbicara, berjalan, dan punya nama.\r\n\r\n“Ada yang pernah bilang kalau idealisme adalah kemewahan terakhir yang dimiliki oleh generasi muda….”',	NULL,	381,	'2005-01-01',	'Donny Dhirgantoro',	'ID-ID',	'PDF',	'2017-12-04'),
('9789799731234',	'Bumi Manusia',	'bumi-manusia',	6.50,	'Roman Tetralogi Buru mengambil latar belakang dan cikal bakal nation Indonesia di awal abad ke-20. Dengan membacanya waktu kita dibalikkan sedemikian rupa dan hidup di era membibitnya pergerakan nasional mula-mula, juga pertautan rasa, kegamangan jiwa, percintaan, dan pertarungan kekuatan anonim para srikandi yang mengawal penyemaian bangunan nasional yang kemudian kelak melahirkan Indonesia modern.\r\n\r\nRoman bagian pertama; Bumi Manusia, sebagai periode penyemaian dan kegelisahan dimana Minke sebagai aktor sekaligus kreator adalah manusia berdarah priyayi yang semampu mungkin keluar dari kepompong kejawaannya menuju manusia yang bebas dan merdeka, di sudut lain membelah jiwa ke-Eropa-an yang menjadi simbol dan kiblat dari ketinggian pengetahuan dan peradaban.\r\n\r\nPram menggambarkan sebuah adegan antara Minke dengan ayahnya yang sangat sentimentil: Aku mengangkat sembah sebagaimana biasa aku lihat dilakukan punggawa terhadap kakekku dan nenekku dan orangtuaku, waktu lebaran. Dan yang sekarang tak juga kuturunkan sebelum Bupati itu duduk enak di tempatnya. Dalam mengangkat sembah serasa hilang seluruh ilmu dan pengetahuan yang kupelajari tahun demi tahun belakangan ini. Hilang indahnya dunia sebagaimana dijanjikan oleh kemajuan ilmu .... Sembah pengagungan pada leluhur dan pembesar melalui perendahan dan penghinaan diri! Sampai sedatar tanah kalau mungkin! Uh, anak-cucuku tak kurelakan menjalani kehinaan ini.\r\n\r\n\"Kita kalah, Ma,\" bisikku.\r\n\r\n\"Kita telah melawan, Nak, Nyo, sebaik-baiknya, sehormat-hormatnya.\"',	NULL,	535,	'2005-01-01',	'Pramoedya Ananta Toer',	'ID-ID',	'EPUB',	'2017-12-04');

CREATE TABLE `bookdetail` (`isbn13` char(13), `title` varchar(50), `slug` varchar(50), `price` decimal(10,2), `discountedprice` decimal(15,2), `summary` text, `ed` varchar(5), `pages` smallint(6), `pubdate` date, `author` varchar(50), `language` varchar(20), `format` varchar(5), `genre` mediumtext, `discount` decimal(5,2), `adddate` date);


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
  PRIMARY KEY (`isbn13`,`genre`),
  KEY `bookgenre_ibfk_2` (`genre`),
  CONSTRAINT `bookgenre_ibfk_1` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`),
  CONSTRAINT `bookgenre_ibfk_2` FOREIGN KEY (`genre`) REFERENCES `genres` (`genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bookgenre` (`isbn13`, `genre`) VALUES
('9780316322409',	'Autobiography'),
('9780316322409',	'Feminism'),
('9780316322409',	'Nonfiction'),
('9780393609394',	'Nonfiction'),
('9780393609394',	'Physics'),
('9780393609394',	'Science'),
('9780439023481',	'Dystopia'),
('9780439023481',	'Fantasy'),
('9780439023481',	'Fiction'),
('9780439023481',	'Science Fiction'),
('9780439023481',	'Young Adult'),
('9780451524935',	'Classic'),
('9780451524935',	'Dystopia'),
('9780451524935',	'Fiction'),
('9780451524935',	'Science Fiction'),
('9780451526342',	'Classic'),
('9780451526342',	'Dystopia'),
('9780451526342',	'Fantasy'),
('9780451526342',	'Fiction'),
('9780451526342',	'Literature'),
('9780451526342',	'Science Fiction'),
('9781451648539',	'Biography'),
('9781451648539',	'Business'),
('9781451648539',	'Nonfiction'),
('9781451648539',	'Science'),
('9781451648539',	'Technology'),
('9781455582341',	'Business'),
('9781455582341',	'Management'),
('9781455582341',	'Nonfiction'),
('9781455582341',	'Science'),
('9781455582341',	'Technology'),
('9781568364841',	'Handbook'),
('9781568364841',	'Humanities'),
('9781568364841',	'Language'),
('9781568364841',	'Literature'),
('9781568364841',	'Reference'),
('9781853260315',	'Classic'),
('9781853260315',	'Cultural'),
('9781853260315',	'Fantasy'),
('9781853260315',	'Fiction'),
('9781853260315',	'Literature'),
('9781853260315',	'Novel'),
('9781853260315',	'Science Fiction'),
('9781853260315',	'Steampunk'),
('9788120343399',	'Computer Science'),
('9788120343399',	'Nonfiction'),
('9788120343399',	'Programming'),
('9788120343399',	'Reference'),
('9789792239836',	'Fiction'),
('9789792239836',	'Literature'),
('9789792239836',	'Novel'),
('9789792239836',	'Romance'),
('9789792248616',	'Fiction'),
('9789792248616',	'Novel'),
('9789792274813',	'Biography'),
('9789792274813',	'Leadership'),
('9789792274813',	'Nonfiction'),
('9789793062921',	'Fiction'),
('9789793062921',	'Literature'),
('9789793062921',	'Novel'),
('9789797591519',	'Adventure'),
('9789797591519',	'Fiction'),
('9789797591519',	'Literature'),
('9789797591519',	'Novel'),
('9789799731234',	'Fiction'),
('9789799731234',	'History'),
('9789799731234',	'Literature');

CREATE TABLE `bookpromotion` (
  `isbn13` char(13) NOT NULL,
  `discount` decimal(5,2) DEFAULT 0.00,
  `until` date NOT NULL,
  PRIMARY KEY (`isbn13`),
  CONSTRAINT `bookpromotion_ibfk_1` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`discount` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `bookrecommended` (`isbn13` char(13), `title` varchar(50), `slug` varchar(50), `price` decimal(10,2), `discountedprice` decimal(15,2), `summary` text, `ed` varchar(5), `pages` smallint(6), `pubdate` date, `author` varchar(50), `language` varchar(20), `format` varchar(5), `genre` mediumtext, `discount` decimal(5,2), `adddate` date, `info` text);


CREATE TABLE `cart` (
  `email` varchar(30) NOT NULL,
  `isbn13` char(13) NOT NULL,
  `discount` decimal(5,2) DEFAULT 0.00,
  `added` datetime NOT NULL,
  PRIMARY KEY (`email`,`isbn13`),
  KEY `isbn13` (`isbn13`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`discount` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `formats` (
  `format` varchar(5) NOT NULL,
  `emoji` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`format`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `formats` (`format`, `emoji`) VALUES
('EPUB',	'em-closed_book'),
('PDF',	'em-blue_book');

CREATE TABLE `genres` (
  `genre` varchar(25) NOT NULL,
  `parentgenre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`genre`),
  KEY `parentgenre` (`parentgenre`),
  CONSTRAINT `genres_ibfk_1` FOREIGN KEY (`parentgenre`) REFERENCES `genres` (`genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `genres` (`genre`, `parentgenre`) VALUES
('Classic',	NULL),
('Fiction',	NULL),
('Humanities',	NULL),
('Nonfiction',	NULL),
('Novel',	NULL),
('Young Adult',	NULL),
('Autobiography',	'Biography'),
('Management',	'Business'),
('Fantasy',	'Fiction'),
('Romance',	'Fiction'),
('Science Fiction',	'Fiction'),
('Steampunk',	'Fiction'),
('Cultural',	'Humanities'),
('Feminism',	'Humanities'),
('Literature',	'Humanities'),
('Leadership',	'Management'),
('Biography',	'Nonfiction'),
('Business',	'Nonfiction'),
('Physics',	'Nonfiction'),
('Science',	'Nonfiction'),
('Technology',	'Nonfiction'),
('Dystopia',	'Science Fiction'),
('Programming',	'Technology');

CREATE TABLE `langs` (
  `lang` char(5) NOT NULL,
  `language` varchar(20) NOT NULL,
  `emoji` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`lang`),
  UNIQUE KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `langs` (`lang`, `language`, `emoji`) VALUES
('EN-UK',	'British English',	'em-gb'),
('EN-US',	'American English',	'em-flag-um'),
('ID-ID',	'Indonesian',	'em-flag-id');

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
  `discount` decimal(5,2) DEFAULT 0.00,
  PRIMARY KEY (`invoiceno`,`isbn13`),
  KEY `isbn13` (`isbn13`),
  CONSTRAINT `transactionsdetail_ibfk_1` FOREIGN KEY (`invoiceno`) REFERENCES `transactions` (`invoiceno`),
  CONSTRAINT `transactionsdetail_ibfk_2` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`discount` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `userbook` (
  `email` varchar(30) NOT NULL,
  `isbn13` char(13) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review` text DEFAULT NULL,
  PRIMARY KEY (`isbn13`,`email`),
  KEY `email` (`email`),
  CONSTRAINT `bookreview_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  CONSTRAINT `bookreview_ibfk_2` FOREIGN KEY (`isbn13`) REFERENCES `book` (`isbn13`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`rating` between 1 and 10)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `roles` varchar(9) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `pass` char(64) NOT NULL,
  `salt` char(5) NOT NULL,
  PRIMARY KEY (`email`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`email` like '_%@_%.__%'),
  CONSTRAINT `CONSTRAINT_2` CHECK (`roles` in ('buyer','manager','admin')),
  CONSTRAINT `CONSTRAINT_3` CHECK (`gender` in ('M','F','O'))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`email`, `roles`, `fname`, `lname`, `gender`, `pass`, `salt`) VALUES
('buyer1@example.com',	'buyer',	'Buyersatu',	NULL,	'O',	'ea5ff37b3d91a0bf99ba76a66806e8fd734710e729690502ae97ad54ba91f8c5',	'DLrtV'),
('buyer2@example.com',	'buyer',	'Buyerdua',	NULL,	'O',	'678ae346315964ee5f183f18f61ac54f88d94cf879478bb0f3dba553f8d5f388',	'Yj2aJ'),
('miqdad@louvre.dev',	'admin',	'Miqdad',	'Abdurrahman',	'M',	'6188fafdb356e3f30cd476d3d8a019630d8fddc375feea1f1d28bbce73d43587',	'lfS8X'),
('stefanus@louvre.dev',	'manager',	'Stefanus',	'Kurniawan',	'M',	'f34504d41e676303b197bef6ef925b8e685193335ab0e5df374fbad86cde9e58',	'YkpPp'),
('william@louvre.dev',	'manager',	'William',	'Darian',	'M',	'f1c8885ef90f8112ad5f4606f54598f946a5d8e07ed2f729e642cc2fcef078a8',	'cCZx6');

DROP TABLE IF EXISTS `bookdetail`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `bookdetail` AS select `book`.`isbn13` AS `isbn13`,`book`.`title` AS `title`,`book`.`slug` AS `slug`,`book`.`price` AS `price`,round(`book`.`price` * (100 - coalesce(`bookpromotion`.`discount`,0)) / 100,2) AS `discountedprice`,`book`.`summary` AS `summary`,`book`.`ed` AS `ed`,`book`.`pages` AS `pages`,`book`.`pubdate` AS `pubdate`,`book`.`author` AS `author`,`langs`.`language` AS `language`,`book`.`format` AS `format`,group_concat(`bookgenre`.`genre` separator ',') AS `genre`,`bookpromotion`.`discount` AS `discount`,`book`.`adddate` AS `adddate` from ((((`book` join `bookgenre` on(`book`.`isbn13` = `bookgenre`.`isbn13`)) left join `bookpromotion` on(`book`.`isbn13` = `bookpromotion`.`isbn13`)) left join `langs` on(`book`.`lang` = `langs`.`lang`)) left join `formats` on(`book`.`format` = `formats`.`format`)) group by 1;

DROP TABLE IF EXISTS `bookrecommended`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `bookrecommended` AS select `bookfeatured`.`isbn13` AS `isbn13`,`bookdetail`.`title` AS `title`,`bookdetail`.`slug` AS `slug`,`bookdetail`.`price` AS `price`,round(`bookdetail`.`price` * (100 - coalesce(`bookdetail`.`discount`,0)) / 100,2) AS `discountedprice`,`bookdetail`.`summary` AS `summary`,`bookdetail`.`ed` AS `ed`,`bookdetail`.`pages` AS `pages`,`bookdetail`.`pubdate` AS `pubdate`,`bookdetail`.`author` AS `author`,`bookdetail`.`language` AS `language`,`bookdetail`.`format` AS `format`,`bookdetail`.`genre` AS `genre`,`bookdetail`.`discount` AS `discount`,`bookdetail`.`adddate` AS `adddate`,`bookfeatured`.`info` AS `info` from (`bookfeatured` left join `bookdetail` on(`bookfeatured`.`isbn13` = `bookdetail`.`isbn13`));

-- 2017-12-04 08:30:08
