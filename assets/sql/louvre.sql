DROP DATABASE IF EXISTS louvre;
CREATE DATABASE louvre;
USE louvre;

CREATE TABLE users(
    email       VARCHAR(30)     PRIMARY KEY,
    CHECK email LIKE '?%@?%.??%',
    role        VARCHAR(9)      NOT NULL,
    CHECK role IN ('admin', 'manager', 'employee', 'buyer'),
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
    edition     VARCHAR(5),
    pages       SMALLINT        NOT NULL,
    CHECK pages > 0,
    pubdate     DATE            NOT NULL,
    genre       VARCHAR(20)     NOT NULL,
    author      VARCHAR(50)     NOT NULL,
    language    VARCHAR(12)     NOT NULL,
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