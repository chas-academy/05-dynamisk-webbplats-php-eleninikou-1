/* SKAPA ANVÄNDARE */
INSERT INTO users (firstname, lastname, email, password) 
VALUES (:firstname, :lastname, :email, :password);

/* SKAPA INLÄGG */
INSERT INTO posts (title, body, category, tag)
VALUES (:title, :body :category, :tag)

/* SÖK INLÄGG */
SELECT * FROM posts WHERE title LIKE %$search%

/* REDIGERA INLÄGG */

-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(10) unsigned NOT NULL,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `category` int(10) unsigned NOT NULL,
  `tag` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `tag` (`tag`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`category_id`),
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`tag`) REFERENCES `tags` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `posts` (`id`, `title`, `body`, `category`, `tag`) VALUES
(13,	'PROVE IT',	'DAMN YOU',	2,	1),
(24,	'snälla',	'fungera',	2,	1),
(25,	'heeeej',	'hejhej',	1,	2),
(26,	'other',	'other',	3,	3),
(27,	'MALAKA',	'malaka',	1,	4),
(36,	'OK',	'okok',	2,	NULL),
(39,	'HEej',	'hejhej',	1,	NULL);

DROP TABLE IF EXISTS `post_category`;
CREATE TABLE `post_category` (
  `posts_id` int(10) unsigned NOT NULL,
  `categories_id` int(10) unsigned NOT NULL,
  KEY `posts_id` (`posts_id`),
  KEY `categories_id` (`categories_id`),
  CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`category_id`),
  CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `post_tags`;
CREATE TABLE `post_tags` (
  `posts_id` int(10) unsigned NOT NULL,
  `tags_id` int(10) unsigned NOT NULL,
  KEY `posts_id` (`posts_id`),
  KEY `tags_id` (`tags_id`),
  CONSTRAINT `post_tags_ibfk_2` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`tag_id`),
  CONSTRAINT `post_tags_ibfk_1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `tag_id` int(10) unsigned NOT NULL,
  `tag_name` varchar(20) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2017-11-08 11:31:20