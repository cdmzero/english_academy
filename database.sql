DROP DATABASE IF EXISTS laravel_master;

CREATE DATABASE laravel_master DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE laravel_master;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`(
id          int(255) auto_increment not null,
user_name   varchar(100),
surname     varchar(200),
role        varchar(20),
nick        varchar(100),
email       varchar(255),
password    varchar(255),
image       varchar(255),
created_at   datetime,
updated_at datetime,
remember_token varchar(255),

CONSTRAINT pk_user PRIMARY KEY(id)

)ENGINE=InnoDb;

INSERT INTO users VALUES(NULL,'Jose Francisco','Funez Arcediano', 'admin','cdmzero','jose@jose.com','$2y$10$4zxuopgbsSNIdE518WKd/u8KpRx.1qogtgxO7JJZJd92vXOl.uuiu','1586281316tio.png',CURTIME(),NULL,NULL);
INSERT INTO users VALUES(NULL,'Juan','Lopez', 'user','juanlp','jlp@gmail.com','pass',null,CURTIME(),NULL,NULL);
INSERT INTO users VALUES(NULL,'Manolo','Garcia', 'user','manlo','manolo@gmail.com','pass',null,CURTIME(),NULL,NULL);
INSERT INTO users VALUES(NULL,'Laura','Gutierrez','user','lagu', 'lora@lora.com','$2y$10$Zk7WLOgYreOGc0/g7ZEkjOassJ/j3S0XuUoJ7XBufo8Md6ztLt7qq','1586343460BEFDEA3B-D632-46E8-9F01-0CBF1A7E93FF.jpeg',CURTIME(),NULL,NULL);



DROP TABLE IF EXISTS `tests`;
CREATE TABLE tests(
id                              int(255) auto_increment not null,
user_id                         int(255),
test_name                       varchar(255),
test_type                       varchar(255),
num_questions                   int(255),
duration                        int(255),
status                          varchar(255),
mark_right                      float,
mark_wrong                      float,
created_at   datetime,
updated_at datetime,

CONSTRAINT pk_test PRIMARY KEY (id),
CONSTRAINT fk_usertest FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE


)ENGINE=InnoDb;

INSERT INTO tests VALUES(NULL,1,'University','Exam','20',20,'Pending',1,-1,CURTIME(),NULL);
INSERT INTO tests VALUES(NULL,1,'Campus','Exam','20',20,'Pending',1,-1,CURTIME(),NULL);
INSERT INTO tests VALUES(NULL,1,'London','Exam','20',45 ,'Pending',1,-1 ,CURTIME(),NULL);
INSERT INTO tests VALUES(NULL,1,'A1 A2','Exercise','5',10 ,'Pending',1,-1,CURTIME(),NULL);
INSERT INTO tests VALUES(NULL,1,'B1 B2','Grammar','5',10 ,'Pending',1,-1,CURTIME(),NULL);
INSERT INTO tests VALUES(NULL,1,'C1 C2','Exercise','5',10 ,'Pending',1,-1,CURTIME(),NULL);





DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions`(
id                          int(255) auto_increment not null,
test_id                     int(255),
question_title              text,
answerd                     int(255),
created_at                  datetime,
updated_at                  datetime,

CONSTRAINT `pk_question` PRIMARY KEY (id),
CONSTRAINT fk_test FOREIGN KEY(test_id) REFERENCES tests(id) ON DELETE CASCADE

)ENGINE=InnoDb;


INSERT INTO `questions` VALUES(NULL,'1', '¿En que ciudad se encuentra la Torre Eifel',1,CURTIME(),NULL);
INSERT INTO `questions` VALUES(NULL,'1', '¿Como se llama la capital de Francia',1,CURTIME(),NULL);
INSERT INTO `questions` VALUES(NULL,'1', '¿Cual es la ciudad mas importante que cruza el Senna',1,CURTIME(),NULL);

DROP TABLE IF EXISTS `options`;
CREATE TABLE `options`(
id                   int(255) auto_increment not null,
question_id                 int(255),
option_number               int(255),
option_title                text,
created_at   datetime,
updated_at datetime,


CONSTRAINT `pk_option` PRIMARY KEY (id),
CONSTRAINT fk_question FOREIGN KEY(question_id) REFERENCES questions(id) ON DELETE CASCADE

)ENGINE=InnoDb;


INSERT INTO `options` VALUES(NULL,'1','1', 'PARIS',CURTIME(),NULL);
INSERT INTO `options` VALUES(NULL,'1','2', 'MADRID',CURTIME(),NULL);
INSERT INTO `options` VALUES(NULL,'1','3', 'BARCELONA',CURTIME(),NULL);
INSERT INTO `options` VALUES(NULL,'1','4', 'POBLETE',CURTIME(),NULL);
INSERT INTO `options` VALUES(NULL,'2','1', 'PARIS',CURTIME(),NULL);
INSERT INTO `options` VALUES(NULL,'2','2', 'PUERTOLLANO',CURTIME(),NULL);
INSERT INTO `options` VALUES(NULL,'2','3', 'BARCELONA',CURTIME(),NULL);
INSERT INTO `options` VALUES(NULL,'2','4', 'MOZAMBIQUE',CURTIME(),NULL);
INSERT INTO `options` VALUES(NULL,'3','1', 'PARIS',CURTIME(),NULL);
INSERT INTO `options` VALUES(NULL,'3','2', 'MADRID',CURTIME(),NULL);
INSERT INTO `options` VALUES(NULL,'3','3', 'MARBELLA',CURTIME(),NULL);
INSERT INTO `options` VALUES(NULL,'3','4', 'ARGAMASILLA',CURTIME(),NULL);



DROP TABLE IF EXISTS `choices`;
CREATE TABLE choices(
id               int(255) auto_increment not null,
question_id             int(255),
user_id                 int(255),
test_id                 int(255),
user_choice             int(255),
mark                    float,
created_at   datetime,
updated_at datetime,


CONSTRAINT pk_choice PRIMARY KEY (id),
CONSTRAINT `fk_questioncho` FOREIGN KEY(question_id) REFERENCES `questions`(id) ON DELETE CASCADE,
CONSTRAINT `fk_usercho` FOREIGN KEY(user_id) REFERENCES `users`(id) ON DELETE CASCADE,
CONSTRAINT `fk_testcho` FOREIGN KEY(test_id) REFERENCES `tests`(id) ON DELETE CASCADE


)ENGINE=InnoDb;

INSERT INTO choices VALUES(NULL, 1,1,1,3,-1,CURTIME(),NULL);
INSERT INTO choices VALUES(NULL, 2,1,1,1,1,CURTIME(),NULL);
INSERT INTO choices VALUES(NULL, 3,1,1,1,1,CURTIME(),NULL);


DROP TABLE IF EXISTS `results`;
CREATE TABLE results(
id   int(255) auto_increment not null,
test_id     int(255),
user_id     int(255),
total_mark   float,
created_at   datetime,
updated_at   datetime,

CONSTRAINT pk_result PRIMARY KEY (id),
CONSTRAINT fk_user_id FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
CONSTRAINT fk_test_id FOREIGN KEY(test_id) REFERENCES tests(id) ON DELETE CASCADE

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