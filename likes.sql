CREATE TABLE IF NOT EXISTS likes (
    id int(11) NOT NULL AUTO_INCREMENT,
    userid int(11) NOT NULL,
    postid int(11) NOT NULL,
    PRIMARY KEY (id)
);
