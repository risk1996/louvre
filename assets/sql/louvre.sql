DROP DATABASE IF EXISTS louvre;
CREATE DATABASE louvre;
USE louvre;

CREATE TABLE users(
    email       VARCHAR(30)     PRIMARY KEY,
    CHECK email LIKE '_%@_%.__%',
    roles       VARCHAR(9)      NOT NULL,
    CHECK roles IN ('admin', 'manager', 'buyer'),
    fname       VARCHAR(25)     NOT NULL,
    lname       VARCHAR(25),
    pass        CHAR(64)        NOT NULL,
    salt        CHAR(5)         NOT NULL
);

CREATE TABLE book(
    isbn13      CHAR(13)        PRIMARY KEY,
    title       VARCHAR(50)     NOT NULL,
    price       DECIMAL(10,2)   NOT NULL,
    CHECK price >= 0.0,
    stock       SMALLINT        NOT NULL,
    CHECK stock >= 0,
    cover       VARCHAR(50),
    summary     TEXT,
    ed          VARCHAR(5),
    pages       SMALLINT        NOT NULL,
    CHECK pages > 0,
    pubdate     DATE            NOT NULL,
    genre       VARCHAR(20)     NOT NULL,
    author      VARCHAR(50)     NOT NULL,
    lang        VARCHAR(12)     NOT NULL,
    format      VARCHAR(5)      NOT NULL,
    CHECK format IN ('PDF', 'EPUB', 'MOBI', 'DJVU', 'AZW3')
);

CREATE TABLE bookreview(
    isbn13      CHAR(13),
    FOREIGN KEY(isbn13) REFERENCES book(isbn13),
    email       VARCHAR(30),
    FOREIGN KEY(email) REFERENCES users(email),
    PRIMARY KEY(isbn13, email),
    rating      TINYINT         NOT NULL,
    CHECK rating BETWEEN 1 AND 10,
    review      TEXT
);

CREATE TABLE bookfeatured(
    isbn13      CHAR(13)        PRIMARY KEY,
    FOREIGN KEY(isbn13) REFERENCES book(isbn13),
    info        TEXT,
    until       DATE            NOT NULL,
    CHECK until >= CURDATE()
);

CREATE TABLE bookpromotion(
    isbn13      CHAR(13)        PRIMARY KEY,
    FOREIGN KEY(isbn13) REFERENCES book(isbn13),
    discount    DECIMAL(5,2)    DEFAULT 0.0,
    until       DATE            NOT NULL,
    CHECK until >= CURDATE()
);

CREATE TABLE cart(
    email       VARCHAR(30),
    FOREIGN KEY(email) REFERENCES users(email),
    isbn13      CHAR(13),
    FOREIGN KEY(isbn13) REFERENCES book(isbn13),
    PRIMARY KEY(email, isbn13),
    quantity    SMALLINT        NOT NULL,
    CHECK quantity > 0,
    discount    DECIMAL(5,2)    DEFAULT 0.0,
    CHECK discount >= 0.0,
    addded      DATETIME        NOT NULL,
    CHECK adddate <= CURDATE()
);

CREATE TABLE transactions(
    invoiceno   CHAR(12)        PRIMARY KEY,
    CHECK invoiceno REGEXP 'TR-[a-zA-Z][a-zA-Z][a-zA-Z][a-zA-Z][0-9][0-9][0-9][0-9][0-9]',
    email       VARCHAR(30)     NOT NULL,
    FOREIGN KEY(email) REFERENCES users(email),
    payment     VARCHAR(15)     NOT NULL,
    CHECK paymethod IN ('VISA', 'Master Card', 'PayPal', 'Bitcoin'),
    invdate     DATETIME        NOT NULL,
    CHECK invoice <= CURDATE()
);

CREATE TABLE transactionsdetail(
    invoiceno   CHAR(12),
    FOREIGN KEY(invoiceno) REFERENCES transactions(invoiceno),
    isbn13      CHAR(13),
    FOREIGN KEY(isbn13) REFERENCES book(isbn13),
    PRIMARY KEY(invoiceno, isbn13),
    quantity    SMALLINT        NOT NULL,
    CHECK quantity > 0,
    discount    DECIMAL(5,2)    DEFAULT 0.0,
    CHECK discount >= 0.0
);

INSERT INTO users(email, roles, fname, lname, pass, salt) VALUES
    ('stefanus.kurniawan@student.umn.ac.id', 'manager', 'Stefanus', 'Kurniawan'  , '2a5f5d7be83e3f3352d6100dff7917a7709e46f9f0ca3ce1865256d8ffa61906', '8FWvP'),
    ('william.darian@student.umn.ac.id'    , 'manager', 'William' , 'Darian'     , '6294a4ceedecfdb87e3591cd102e12e739bbb202dad937a2ac48935c463eb76a', 'xIhtq'),
    ('miqdad.abdurrahman@student.umn.ac.id', 'admin'  , 'Miqdad'  , 'Abdurrahman', 'c1f99ea5d90bbe5b112065dfd6c6d68b3457c454d6df934625be4089d7244988', 'z8Uc5');

INSERT INTO book(isbn13, title, price, stock, cover, summary, ed, pages, pubdate, genre, author, lang, format) VALUES
    ('9788120343399', 'C++ How to Program', 171.40, 4, '9788120343399.png', 'This best-selling book provides a clear, simple, engaging and entertaining introduction to C++ programming with of fully coded C++ Programs. It is aimed at readers with little or no programming experience, It provides\r\nRich coverage of fundamentals, including two chapters on control statements.\r\nA clear, example-driven presentation of object-oriented programming.\r\nOptional modular sections on language features of the new C++ standard.\r\nMaking a Difference exercises set.\r\nException handling, strings, files, streams, data structures, Standard Template Library.\r\nSeveral major case studies: GradeBook, Time Employee classes, and the optional object-oriented design ATM case study.', '8', 1303, '2012-01-01', 'Textbook', 'Paul J. Deitel', 'English', 'PDF');