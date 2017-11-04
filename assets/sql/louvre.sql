DROP DATABASE IF EXISTS louvre;
CREATE DATABASE louvre;
USE louvre;

CREATE TABLE users(
    email       VARCHAR(30)     PRIMARY KEY,
    CHECK email LIKE '?%@?%.??%',
    role        VARCHAR(9)      NOT NULL,
    CHECK role IN ('admin', 'employee', 'buyer'),
    fname       VARCHAR(25)     NOT NULL,
    lname       VARCHAR(25),
    pass        CHAR(64)        NOT NULL,
    salt        CHAR(5)         NOT NULL
);

CREATE TABLE book(
    isbn13      CHAR(13)        PRIMARY KEY,
    title       VARCHAR(50)     NOT NULL,
    price       DECIMAL(10,2)   NOT NULL,
    CHECK price >= 0,
    stock       SMALLINT        NOT NULL,
    CHECK stock >= 0,
    cover       VARCHAR(50)     NOT NULL,
    summary     TEXT,
    edition     VARCHAR(5),
    pages       SMALLINT        NOT NULL,
    CHECK pages > 0,
    pubdate     DATE            NOT NULL,
    language    VARCHAR(12)     NOT NULL,
    format      VARCHAR(5)      NOT NULL,
    CHECK format IN ('PDF', 'EPUB', 'MOBI', 'DJVU', 'AZW3')
);

CREATE TABLE bookgenre(
    isbn13      CHAR(13),
    FOREIGN KEY(isbn13) REFERENCES book(isbn13),
    genre       VARCHAR(20)     NOT NULL,
    PRIMARY KEY(isbn13, genre)
);

CREATE TABLE bookauthor(
    isbn13      CHAR(13),
    FOREIGN KEY(isbn13) REFERENCES book(isbn13),
    aname       VARCHAR(50)     NOT NULL,
    PRIMARY KEY(isbn13, author)
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

CREATE TABLE transactions(
    invoiceno   CHAR(12),
    CHECK invoiceno REGEXP 'TR-[a-zA-Z][a-zA-Z][a-zA-Z][a-zA-Z][0-9][0-9][0-9][0-9][0-9]',
    isbn13      CHAR(13),
    FOREIGN KEY(isbn13) REFERENCES book(isbn13),
    email       VARCHAR(30),
    FOREIGN KEY(email) REFERENCES users(email),
    PRIMARY KEY(invoiceno, isbn13, email),
    quantity    SMALLINT        NOT NULL,
    CHECK quantity > 0,
    discount    DECIMAL(5,2)    DEFAULT 0.0,
    invdate     DATETIME        NOT NULL,
    CHECK invoice <= CURDATE()
);