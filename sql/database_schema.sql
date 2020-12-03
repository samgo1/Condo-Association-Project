SET FOREIGN_KEY_CHECKS=0; 

drop table if exists member;
drop table if exists `group`;
drop table if exists group_membership;
drop table if exists mailbox;
drop table if exists condo;
drop table if exists condo_ownership;
drop table if exists post;
drop table if exists post_visibility;
drop table if exists `comment`;

SET FOREIGN_KEY_CHECKS=1;

CREATE TABLE `member` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `civic_address` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `privilege` enum('admin','regular') NOT NULL DEFAULT 'regular',
  `login_username` varchar(20) NOT NULL,
  `login_password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `member` VALUES ('1','Ed Casper','active','50169 McDermott Street Suite 176','hubert.schumm@example.com','regular','harum','54bbcb8b9f0e404354c7'),
('2','Shayne Satterfield','active','913 Kristofer Shoal','kristopher00@example.net','regular','nostrum','aa4a385f5845949117c0'),
('3','Dr. Raymundo Cremin','active','790 Leonardo Greens Apt. 201','haag.murl@example.com','admin','aut','3dc7c45a8d347a0837eb'),
('4','Trystan Marvin','active','621 Kadin Alley Apt. 947','johnson.magali@example.org','regular','animi','1eea4760a68eb7f31886'),
('5','Dr. Dale Becker','active','6905 Aufderhar Tunnel','erika23@example.com','regular','aperiam','4e768ad2597bb73b39eb'),
('6','Alysson Rowe','active','908 Frederick Point Suite 101','vanessa.orn@example.net','admin','corporis','11158b8857e151d350bb'),
('7','Frankie Weissnat','active','45788 Terrell Track Apt. 441','diamond.bartoletti@example.org','regular','eveniet','5b588fef549d3e687076'),
('8','Adrianna Funk','active','11105 Sydnie Knolls','frank68@example.org','admin','aut','5f0887f722023b3f016d'),
('9','Cordell Kovacek','inactive','563 Arvilla Avenue','elta.hansen@example.com','admin','nemo','f2c689b7b6fac30aff40'),
('10','Monty Barton','active','489 Mayer Flat','junior18@example.net','admin','minus','414bac5878410c0dabf1'),
('11','Zackery Brekke','inactive','189 Blanda Ridge Apt. 673','sstanton@example.org','admin','a','72bd4aa2c9574a82de0b'),
('12','Sedrick Hagenes','active','6702 Brakus Harbors','pfeil@example.com','regular','consequatur','bceb850add283f859794'),
('13','Leland Legros','active','99595 Eliane Stream','ycartwright@example.org','regular','laboriosam','9ee5f3d04714c1d2d881'),
('14','Stephania Kuhlman','active','3974 Jovanny Mountain Suite 022','kelvin22@example.net','regular','minima','7a03302c3a34e50ed61f'),
('15','Myrtis Sawayn','active','876 Roob Road','colleen.o\'keefe@example.com','regular','quia','13a72d17ddb172354048'),
('16','Jerrold Brakus','active','2969 Billie Glens','tprohaska@example.net','admin','nesciunt','78b3404b0c9a3e130e61'),
('17','Mrs. Maia Hamill II','active','7529 Cummerata Canyon Suite 895','huel.sedrick@example.net','regular','excepturi','04bd0431f3cdd133c669'),
('18','Brigitte Hintz','active','7996 Reyna Squares','ogoodwin@example.net','admin','quibusdam','6179191cd07b13b4c6aa'),
('19','Palma Altenwerth','active','37344 Little Stream Suite 859','okemmer@example.org','admin','quia','4463f8f626fbd198491c'),
('20','Forrest Yost','active','92241 Mustafa Prairie','pmurphy@example.org','admin','omnis','498afa7c1616c6391f82');

CREATE TABLE `group` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `owner` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `owner` (`owner`),
  CONSTRAINT `group_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `member` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `group` VALUES ('1','saepe','1'),
('2','corporis','2'),
('3','perferendis','3');

CREATE TABLE `group_membership` (
  `group_id` tinyint(3) unsigned NOT NULL,
  `member_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`group_id`,`member_id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `group_membership_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`),
  CONSTRAINT `group_membership_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `group_membership` VALUES ('1','1'),
('2','2'),
('3','3'),

('3','2'),
('3','1'),
('3','6'),
('3','7'),
('3','8'),
('3','9'),
('1','2'),
('1','3'),
('1','12'),
('1','13'),
('1','14'),
('2','1'),
('2','3'),
('2','17'),
('2','18'),
('2','19'),
('2','20');



CREATE TABLE `mailbox` (
  `mail_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` tinyint(3) unsigned NOT NULL,
  `receiver_id` tinyint(3) unsigned NOT NULL,
  `date_time` datetime NOT NULL,
  `message_content` tinytext NOT NULL,
  PRIMARY KEY (`mail_id`),
  KEY `sender_id` (`sender_id`),
  KEY `receiver_id` (`receiver_id`),
  CONSTRAINT `mailbox_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `member` (`id`),
  CONSTRAINT `mailbox_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `mailbox` VALUES ('1','1','2','2006-11-03 16:53:14','Aliquam sed omnis tempore eos assumenda. Rem eos necessitatibus in dolores distinctio. Odit sit quia quae reiciendis minus.'),
('2','2','1','2005-12-20 15:25:41','Et consequuntur commodi quo eligendi nihil minus maiores. Tenetur porro qui qui ut ut sed. Aut adipisci ea dignissimos.'),
('3','3','1','1995-12-31 10:34:26','Dolor voluptatem dolorem eveniet culpa reiciendis recusandae qui. Sequi est aut aperiam enim rerum. Dolor consequuntur veniam nostrum voluptatem commodi.'),
('4','3','2','2000-01-29 21:41:22','Ea provident a sit totam ea ea ipsum. Recusandae architecto aut aut ab. Non ea totam perferendis.'),
('5','5','2','1974-12-29 00:05:11','Natus repudiandae veritatis est rerum quo beatae. Ut blanditiis non possimus velit. Laudantium iure est reiciendis non facere aperiam.'),
('6','6','1','2012-05-13 14:12:37','Sunt dolor adipisci rerum eum voluptas. Repellat omnis magnam natus consequatur a. Sunt occaecati dolores delectus et provident veniam qui.'),
('7','7','3','2019-03-14 07:39:34','Vero nobis ea officia unde. Esse omnis qui dolor repellat assumenda libero nihil possimus. Velit accusantium doloremque consequuntur a. Voluptas nisi architecto numquam sequi explicabo delectus architecto fugiat. Alias dolorem illo recusandae optio corpor'),
('8','8','3','2003-06-07 11:20:50','Sed placeat eos cum sit. Dolorum at sequi et velit quia saepe. Impedit laboriosam ut soluta consequatur. Repellendus voluptatibus voluptas necessitatibus.'),
('9','9','2','2001-01-12 06:02:15','Et id eum dolores in velit. Dolorum neque illum hic nulla delectus in nostrum. Quia voluptatem a quisquam.');


CREATE TABLE `condo` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `condo` VALUES ('1','8542 Lawson Pines, Handchester, CT 66167'),
('2','251 Alysha Glens, Port Angeline, IN 17815'),
('3','325 Brent Heights, New Fernando, NY 56738'),
('4','5766 Claire Streets, East Glendastad, RI '),
('5','8029 Feest Plains Suite 896, South Jerrol'); 

CREATE TABLE `condo_ownership` (
  `owner_id` tinyint(3) unsigned NOT NULL,
  `condo_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`owner_id`,`condo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `condo_ownership` VALUES 
('1', '1'),
('1', '2'),
('2', '1'),
('2','2'),
('3','3');

CREATE TABLE `post` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `permission` enum('view only','view and comment','view, comment and link') DEFAULT 'view only',
  `author_id` tinyint(3) unsigned NOT NULL,
  `content_text` tinytext,
  `content_img` varchar(64),
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `post` VALUES ('1','2020-12-03 17:37:23','view and comment','1','Front-door will be temporarily unavailable due to renovations, use back-door.',NULL),
('2','2020-11-29 08:36:10','view and comment','2','Internet will be upgraded next week',NULL),
('3','2020-11-04 10:20:40','view only','3','The pool access is blocked because of COVID',NULL);

CREATE TABLE `post_visibility` (
  `post_id` tinyint(3) unsigned NOT NULL,
  `member_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`post_id`,`member_id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `post_visibility_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  CONSTRAINT `post_visibility_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `post_visibility` VALUES 
('1', '1'),
('1', '2'),
('1', '3'),
('2', '1'),
('2','2'),
('2','3'),
('3','3'),
('3','2'),
('3','1');

CREATE TABLE `comment` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `commentor_id` tinyint(3) unsigned NOT NULL,
  `text` tinytext NOT NULL,
  `post_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commentor_id` (`commentor_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`commentor_id`) REFERENCES `member` (`id`),
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comment` VALUES 
('1', '2020-12-03 17:49:23', '2', 'Thank you for letting us know', '1'),
('2', '2020-12-03 17:51:00', '3', 'I don\'t have a key for the backdoor :(', '1'),
('3', '2020-11-29 09:00:00', '1', 'YEESSSSSSS', '2'),
('4', '2020-12-01 09:05:00', '3', 'My internet is still slow, call me', '2');


