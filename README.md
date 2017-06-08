
DATABASE SCRIPT 

CREATE TABLE posts (
id int(11) NOT NULL AUTO_INCREMENT, category_id int(11) NOT NULL, user_id int(11) NOT NULL, title varchar(255) NOT NULL, slug varchar(255) NOT NULL, body text NOT NULL, post_image varchar(255) NOT NULL, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE categories (
id int(11) NOT NULL AUTO_INCREMENT, user_id int(11) NOT NULL, name varchar(255) NOT NULL, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (id)
) ENGINE=InnoDB;


