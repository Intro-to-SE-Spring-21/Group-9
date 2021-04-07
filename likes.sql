CREATE TABLE IF NOT EXISTS likes (
    id int(11) NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    postid int(11) NOT NULL,
    PRIMARY KEY (id)
);
