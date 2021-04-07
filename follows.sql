CREATE TABLE IF NOT EXISTS follows (
    id int(11) NOT NULL AUTO_INCREMENT,
    follower varchar(255) NOT NULL,
    followed varchar(255) NOT NULL,
    PRIMARY KEY (id)
);
