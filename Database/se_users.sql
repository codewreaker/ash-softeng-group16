--
-- Database: `csashesi_prophet-agyeman-prempeh`
--

CREATE TABLE IF NOT EXISTS `se_user` (
user_id int(11) NOT NULL auto_increment,
email char(128) NOT NULL,
password char(128) NOT NULL,
fullname varchar(255) NOT NULL,
role varchar(50) NOT NULL,
contact varchar(50) NOT NULL,
user_salt varchar(50) NOT NULL,
is_verified tinyint(1) NOT NULL,
is_active tinyint(1) NOT NULL,
is_admin tinyint(1) NOT NULL,
verification_code varchar(65) NOT NULL,
PRIMARY KEY (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;
