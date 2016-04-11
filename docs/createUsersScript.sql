CREATE TABLE user(
	id_user INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	twitter VARCHAR(100),
	password VARCHAR(100) NOT NULL,
	image VARCHAR(300),
	activation_code VARCHAR(30) NOT NULL,
	valid BOOLEAN DEFAULT false,
	PRIMARY KEY (id_user));