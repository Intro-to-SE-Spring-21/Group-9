CREATE TABLE IF NOT EXISTS posts (
    id int(11) NOT NULL AUTO_INCREMENT,
    body text NOT NULL,
    date_added date NOT NULL,
    post_username varchar(255) NOT NULL,
    PRIMARY KEY (id)
);
