DROP TABLE IF EXISTS user;
CREATE TABLE  user (
  id   	INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(64)  NOT NULL,
  email     VARCHAR(128) NOT NULL,
  password  VARCHAR(255)  NOT NULL,
  UNIQUE KEY(Username),
  UNIQUE KEY(email)
);

CREATE TABLE password(
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  userID INT UNSIGNED NOT NULL, 
  title VARCHAR(64)  NOT NULL,
  username VARCHAR(64)  NOT NULL,
  password  VARCHAR(255)  NOT NULL,
  email     VARCHAR(128) NOT NULL,
  notes text NOT NULL,
  FOREIGN KEY (userID) References user(id)
);

INSERT INTO user (firstName, lastName, email, password) VALUES ('Ramon',  'Binz',  'ramon.binz@bbcag.ch',   sha2('ramon', 256));
INSERT INTO user (firstName, lastName, email, password) VALUES ('Samuel', 'Wicky', 'samuel.wicky@bbcag.ch', sha2('samuel', 256));
