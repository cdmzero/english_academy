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
INSERT INTO users VALUES(NULL,'Laura','Gutierrez','user','lagu', 'lora@lora.com','$2y$10$IXualmuT4bAf/bEObGb5peHAoIPu0m2DQWXeTchOM.WWNakNqlPf.','1586343460BEFDEA3B-D632-46E8-9F01-0CBF1A7E93FF.jpeg',CURTIME(),NULL,NULL);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`(
id          int(255) auto_increment not null,
email       varchar(255),
token varchar(255),
created_at datetime,

CONSTRAINT pk_passresets PRIMARY KEY(id)

)ENGINE=InnoDb;



DROP TABLE IF EXISTS `tests`;
CREATE TABLE tests(
id                              int(255) auto_increment not null,
user_id                         int(255),
test_name                       varchar(255),
test_type                       varchar(255),
test_level                       varchar(255),
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

INSERT INTO tests VALUES(NULL,1,'University','Exam','High',3,20,'Pending',1,-1,CURTIME(),NULL);
INSERT INTO tests VALUES(NULL,1,'Campus','Exam','Intermediate',20,20,'Pending',1,-1,CURTIME(),NULL);
INSERT INTO tests VALUES(NULL,1,'London','Exam','Basic',20,45,'Pending',1,-1 ,CURTIME(),NULL);
INSERT INTO tests VALUES(NULL,1,'A1 A2','Exercise','Basic',5,10 ,'Pending',1,-1,CURTIME(),NULL);
INSERT INTO tests VALUES(NULL,1,'B1 B2','Grammar','Intermediate',5,10 ,'Pending',1,-1,CURTIME(),NULL);
INSERT INTO tests VALUES(NULL,1,'C1 C2','Exercise','High',5,10 ,'Pending',1,-1,CURTIME(),NULL);





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


INSERT INTO `questions` VALUES(NULL,'1', '¿En que ciudad se encuentra la Torre Eifel?',1,CURTIME(),NULL);
INSERT INTO `questions` VALUES(NULL,'1', '¿Como se llama la capital de Francia?',1,CURTIME(),NULL);
INSERT INTO `questions` VALUES(NULL,'1', '¿Cual es la ciudad mas importante que cruza el Senna?',1,CURTIME(),NULL);

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



DROP TABLE IF EXISTS `results`;
CREATE TABLE results(
id   int(255) auto_increment not null,
user_id     int(255),
test_id     int(255),
total_mark   float,
proportion   varchar(255),
created_at   datetime,
updated_at   datetime,

CONSTRAINT pk_result PRIMARY KEY (id),
CONSTRAINT fk_user_id FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
CONSTRAINT fk_test_id FOREIGN KEY(test_id) REFERENCES tests(id) ON DELETE CASCADE

)ENGINE=InnoDb;

INSERT INTO `results` VALUES (NULL, 1, 1, 98.99,'3/3',CURTIME(), NULL);
INSERT INTO `results` VALUES (NULL, 1, 1, 78.99,'2/3',CURTIME(), NULL);
INSERT INTO `results` VALUES (NULL, 1, 1, 68.99,'2/3',CURTIME(), NULL);



DROP TABLE IF EXISTS `lines`;
CREATE TABLE `lines`(
id                  int(255) auto_increment not null,
result_id           int(255),
question_title     varchar(255),
user_choice         varchar(255),
Option1          varchar(255),
Option2          varchar(255),
Option3          varchar(255),
Option4          varchar(255),
answerd          varchar(255),
created_at          datetime,
updated_at          datetime,

CONSTRAINT pk_line_choices PRIMARY KEY (id),
CONSTRAINT fk_result_ids FOREIGN KEY(result_id) REFERENCES results(id) ON DELETE CASCADE

)ENGINE=InnoDb;

INSERT INTO `lines` VALUES (NULL, 1,'¿En que ciudad se encuentra la Torre Eifel?', 1, 'PARIS','MADRID','BARCELONA','POBLETE', '1',NULL,NULL);
INSERT INTO `lines` VALUES (NULL, 1,'¿Como se llama la capital de Francia?', 3,'PARIS','MADRID','PUERTOLLANO','POBLETE', '1',NULL,NULL);
INSERT INTO `lines` VALUES (NULL, 1,'¿Cual es la ciudad mas importante que cruza el Senna?', 1, 'PARIS','MADRID','MARBELLA','POBLETE', '1',NULL,NULL);


