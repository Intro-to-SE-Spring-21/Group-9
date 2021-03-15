CREATE TABLE IF NOT EXISTS users (
    username varchar(255) NOT NULL,
    first_name varchar(255) NOT NULL,
    last_name varchar(255) NOT NULL,
    password varchar(32) NOT NULL,
    PRIMARY KEY (username)
);
