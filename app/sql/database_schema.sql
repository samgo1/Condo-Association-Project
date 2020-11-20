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


CREATE TABLE `group` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `owner` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `owner` (`owner`),
  CONSTRAINT `group_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `member` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `group_membership` (
  `group_id` tinyint(3) unsigned NOT NULL,
  `member_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`group_id`,`member_id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `group_membership_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`),
  CONSTRAINT `group_membership_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `condo` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `condo_ownership` (
  `owner_id` tinyint(3) unsigned NOT NULL,
  `condo_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`owner_id`,`condo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `post` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `permission` enum('view only','view and comment','view, comment and link') DEFAULT 'view only',
  `author_id` tinyint(3) unsigned NOT NULL,
  `content_text` tinytext,
  `content_img` blob,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `post_visibility` (
  `post_id` tinyint(3) unsigned NOT NULL,
  `member_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`post_id`,`member_id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `post_visibility_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  CONSTRAINT `post_visibility_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `comment` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` tinyint(3) unsigned NOT NULL,
  `text` tinytext NOT NULL,
  `post_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`),
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


