DROP DATABASE IF EXISTS gamecentreDB;

CREATE DATABASE gamecentreDB;
USE gamecentreDB;

CREATE TABLE Player (
    username       VARCHAR (64)  NOT NULL,
    fullname       VARCHAR (128) NOT NULL,
    totalgames      INT NOT NULL,
    totalwins       INT NOT NULL,
    hashedpassword VARCHAR (128) NOT NULL,
    PRIMARY KEY (username)
);

CREATE TABLE ttt (
    username       VARCHAR (64)  NOT NULL,
    totalgames      INT NOT NULL,
    totalwins       INT NOT NULL,
    PRIMARY KEY (username),
    FOREIGN KEY (username) REFERENCES Player (username) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE sdk (
    username       VARCHAR (64)  NOT NULL,
    totalgames      INT NOT NULL,
    totalwins       INT NOT NULL,
    PRIMARY KEY (username),
    FOREIGN KEY (username) REFERENCES Player (username) ON DELETE CASCADE ON UPDATE CASCADE
);

-- INSERT INTO Player (username, fullname, hashedpassword)
--        VALUES ('noobplayer', 'Eve', '$2y$10$gaF8UcTIPsDuptKfWKh29OJasIpTQhOzmIjku8/YIQ5nCHQM2ty3G');

-- password = Np123