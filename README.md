# CodeIgniter 2
Open Source PHP Framework (originally from EllisLab)
For more info, please refer to the user-guide at http://www.codeigniter.com/userguide2/  
**WARNING:** *CodeIgniter 2.x is no longer under development and only receives security patches until October 31st, 2015.
Please update your installation to the latest CodeIgniter 3.x version available
(upgrade instructions [here](http://www.codeigniter.com/userguide3/installation/upgrade_300.html)).*


DATABASE SCRIPT 

CREATE TABLE posts (
id int(11) NOT NULL AUTO_INCREMENT, category_id int(11) NOT NULL, user_id int(11) NOT NULL, title varchar(255) NOT NULL, slug varchar(255) NOT NULL, body text NOT NULL, post_image varchar(255) NOT NULL, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (id)
) ENGINE=InnoDB;


