
CREATE TABLE users (
	id 			INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username 	VARCHAR(100) NOT NULL,
	email		VARCHAR(100) NOT NULL,
	password	VARCHAR(100) NOT NULL
	);

INSERT INTO users VALUES
	(1, 'databaseislife1', 'cs165WVW@up.edu.ph', '416e6987c66e47032a0bce171bb269f2'),
	(2, 'jmendoza1', 'jmendoza@cs165.com', '416e6987c66e47032a0bce171bb269f2');
