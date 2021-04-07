CREATE TABLE IF NOT EXISTS posts (
    id int(11) NOT NULL AUTO_INCREMENT,
    body text NOT NULL,
    date_added date NOT NULL,
    added_by varchar(255) NOT NULL,
    user_posted_to varchar(255) NOT NULL,
    likes int(11) NOT NULL,
    PRIMARY KEY (id)
);
