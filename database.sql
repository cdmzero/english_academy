DROP DATABASE IF EXISTS laravel_master;

CREATE DATABASE laravel_master DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE laravel_master;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`(
id          int(255) auto_increment not null,
role        varchar(20),
user_name        varchar(100),
surname     varchar(200),
nick        varchar(100),
email       varchar(255),
password    varchar(255),
image       varchar(255),
created_at   datetime,
updated_at datetime,
remember_token varchar(255),

CONSTRAINT pk_users PRIMARY KEY(id)

)ENGINE=InnoDb;

INSERT INTO users VALUES(NULL, 'user','Jose Francisco','Funez Arcediano','cdmzero','jose@jose.com','$2y$10$4zxuopgbsSNIdE518WKd/u8KpRx.1qogtgxO7JJZJd92vXOl.uuiu','1586281316tio.png',CURTIME(),NULL,NULL);
INSERT INTO users VALUES(NULL, 'user','Juan','Lopez','juanlp','jlp@gmail.com','pass',null,CURTIME(),NULL,NULL);
INSERT INTO users VALUES(NULL, 'user','Manolo','Garcia','manlo','manolo@gmail.com','pass',null,CURTIME(),NULL,NULL);
INSERT INTO users VALUES(NULL, 'user','Laura','Gutierrez','lagu','lora@lora.com','$2y$10$Zk7WLOgYreOGc0/g7ZEkjOassJ/j3S0XuUoJ7XBufo8Md6ztLt7qq','1586343460BEFDEA3B-D632-46E8-9F01-0CBF1A7E93FF.jpeg',CURTIME(),NULL,NULL);



DROP TABLE IF EXISTS `tests`;
CREATE TABLE tests(
id                           int(255) auto_increment not null,
num_questions                int(255),
test_name                    varchar(255),
max_time                     int(255),

CONSTRAINT pk_tests PRIMARY KEY (id)

)ENGINE=InnoDb;

INSERT INTO tests VALUES(NULL, 30,'University',900);
INSERT INTO tests VALUES(NULL, 30,'Campus',900);
INSERT INTO tests VALUES(NULL, 31,'London',900);




DROP TABLE IF EXISTS `qna`;
CREATE TABLE `qna`(
id                          int(255) auto_increment not null,
test_id                     int(255),
question                    varchar(255),
answerd                     text,
a                           text,
b                           text,
c                           text,
d                           text,
CONSTRAINT `pk_qna` PRIMARY KEY (id),
CONSTRAINT fk_test FOREIGN KEY(test_id) REFERENCES tests(id) ON DELETE CASCADE

)ENGINE=InnoDb;


INSERT INTO `qna` VALUES(NULL,'1', '¿En que ciudad se encuentra la Torre Eifel','A','PARIS','MADRID','LONDRES','SEVILLA');
INSERT INTO `qna` VALUES(NULL,'1', '¿Como se llama la capital de Francia','D','SEVILLA','MADRID','LONDRES','PARIS ');
INSERT INTO `qna` VALUES(NULL,'1', '¿Cual es la ciudad mas importante que cruza el Senna','B','MADRID',' PARIS','LONDRES','SEVILLA');



DROP TABLE IF EXISTS `choices`;
CREATE TABLE choices(
id              int(255) auto_increment not null,
qna_id          int(255),
user_id         int(255),
choice          CHAR(1),

CONSTRAINT pk_choices PRIMARY KEY (id),
CONSTRAINT `fk_qnaid` FOREIGN KEY(qna_id) REFERENCES `qna`(id) ON DELETE CASCADE,
CONSTRAINT fk_usersid FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE


)ENGINE=InnoDb;


INSERT INTO choices VALUES(NULL, '1','1','A');
INSERT INTO choices VALUES(NULL, '2','1','C');
INSERT INTO choices VALUES(NULL, '3','1','A');

DROP TABLE IF EXISTS `results`;
CREATE TABLE results(
id          int(255) auto_increment not null,
test_id     int(255),
user_id     int(255),
mark        float,
created_at   datetime,
updated_at   datetime,

CONSTRAINT pk_results PRIMARY KEY (id),
CONSTRAINT fk_users_id FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
CONSTRAINT fk_tests_id FOREIGN KEY(test_id) REFERENCES tests(id) ON DELETE CASCADE

)ENGINE=InnoDb;

INSERT INTO `results` VALUES (NULL, 1, 1, 98.99,CURTIME(), NULL);
INSERT INTO `results` VALUES (NULL, 1, 1, 78.99,CURTIME(), NULL);
INSERT INTO `results` VALUES (NULL, 1, 1, 68.99,CURTIME(), NULL);
INSERT INTO `results` VALUES (NULL, 1, 2, 58.99,CURTIME(), NULL);
INSERT INTO `results` VALUES (NULL, 1, 2, 48.99,CURTIME(), NULL);
INSERT INTO `results` VALUES (NULL, 1, 2, 58.99,CURTIME(), NULL);
INSERT INTO `results` VALUES (NULL, 2,  2, 59.99,CURTIME(), NULL);
INSERT INTO `results` VALUES (NULL, 3,  3, 98.99,CURTIME(), NULL);
INSERT INTO `results` VALUES (NULL, 2,  4, 99.99,CURTIME(), NULL);
INSERT INTO `results` VALUES (NULL, 3,  4, 77.99,CURTIME(), NULL);
INSERT INTO `results` VALUES (NULL, 2,  4, 19.99,CURTIME(), NULL);
INSERT INTO results VALUES(NULL, 1 ,1,76.5,CURTIME(),null);
INSERT INTO results VALUES(NULL, 2 ,3,66.5,CURTIME(),null);
INSERT INTO results VALUES(NULL, 1 ,2,36.5,CURTIME(),null);
INSERT INTO results VALUES(NULL, 1 ,3,96.5,CURTIME(),null);
INSERT INTO results VALUES(NULL, 1 ,4, 26.5,CURTIME(),null);
INSERT INTO results VALUES(NULL, 2 ,4, 36.5,CURTIME(),null);
INSERT INTO results VALUES(NULL, 3 ,4, 46.5,CURTIME(),null);

