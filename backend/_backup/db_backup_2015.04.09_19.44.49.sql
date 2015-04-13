-- -------------------------------------------
SET AUTOCOMMIT=0;
START TRANSACTION;
SET SQL_QUOTE_SHOW_CREATE = 1;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- -------------------------------------------
-- -------------------------------------------
-- START BACKUP
-- -------------------------------------------
-- -------------------------------------------
-- TABLE `access_type`
-- -------------------------------------------
DROP TABLE IF EXISTS `access_type`;
CREATE TABLE IF NOT EXISTS `access_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `migration`
-- -------------------------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `offer`
-- -------------------------------------------
DROP TABLE IF EXISTS `offer`;
CREATE TABLE IF NOT EXISTS `offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `action_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `region_id` int(11) NOT NULL,
  `lead` varchar(255) NOT NULL,
  `hold` int(11) NOT NULL,
  `access_type_id` int(11) NOT NULL,
  `cpe` varchar(255) NOT NULL,
  `postclick` int(11) NOT NULL,
  `site` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `traff_1` enum('Y','N') NOT NULL,
  `traff_2` enum('Y','N') NOT NULL,
  `traff_3` enum('Y','N') NOT NULL,
  `traff_4` enum('Y','N') NOT NULL,
  `traff_5` enum('Y','N') NOT NULL,
  `traff_6` enum('Y','N') NOT NULL,
  `traff_7` enum('Y','N') NOT NULL,
  `traff_8` enum('Y','N') NOT NULL,
  `traff_9` enum('Y','N') NOT NULL,
  `traff_10` enum('Y','N') NOT NULL,
  `traff_11` enum('Y','N') NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_offer_offer_action` (`action_id`),
  KEY `FK_offer_access_type` (`access_type_id`),
  KEY `FK_offer_region` (`region_id`),
  CONSTRAINT `FK_offer_access_type` FOREIGN KEY (`access_type_id`) REFERENCES `access_type` (`id`),
  CONSTRAINT `FK_offer_offer_action` FOREIGN KEY (`action_id`) REFERENCES `offer_action` (`id`),
  CONSTRAINT `FK_offer_region` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `offer_action`
-- -------------------------------------------
DROP TABLE IF EXISTS `offer_action`;
CREATE TABLE IF NOT EXISTS `offer_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='ОПЛАЧЕННЫЙ ЗАКАЗ\r\nПОДТВЕРЖДЕННАЯ ЗАЯВКА\r\nПОДТВЕРЖДЕННАЯ РЕГИСТРАЦИЯ\r\nЗАПОЛНЕНИЕ ФОРМЫ ОБРАТНОГО ЗВОНКА\r\nПЕРЕХОД НА СТРАНИЦУ\r\nПРОЦЕНТ ОТ ПРОДАЖИ\r\nАКТИВНЫЙ ИГРОК\r\nВЫДАННЫЙ ЗАЙМ\r\nКАЧЕСТВЕННАЯ РЕГИСТРАЦИЯ\r\nУСТАНОВКА ПРИЛОЖЕНИЯ\r\nПРОХОЖДЕНИЕ ТЕСТОВОГО УРОКА\r\nМЕСЯЧНЫЙ ДОСТУП\r\nВНЕСЕНИЕ ПОПОЛНЕНИЕ СЧЕТА';

-- -------------------------------------------
-- TABLE `payment`
-- -------------------------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `wmid` varchar(255) NOT NULL,
  `count` varchar(255) NOT NULL,
  `status` enum('Активно','Отклонено','Недостаточно средств','Выполнено') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__user` (`user_id`),
  CONSTRAINT `FK__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `region`
-- -------------------------------------------
DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '0',
  `ref_cod` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `statistic`
-- -------------------------------------------
DROP TABLE IF EXISTS `statistic`;
CREATE TABLE IF NOT EXISTS `statistic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_id` int(11) NOT NULL DEFAULT '0',
  `user_ref_id` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `hits` int(11) NOT NULL DEFAULT '0',
  `visitors` int(11) NOT NULL DEFAULT '0',
  `tb` int(11) NOT NULL DEFAULT '0',
  `leads` int(11) NOT NULL DEFAULT '0',
  `confirmed` int(11) NOT NULL DEFAULT '0',
  `question` int(11) NOT NULL DEFAULT '0',
  `warning` int(11) NOT NULL DEFAULT '0',
  `hold` int(11) NOT NULL DEFAULT '0',
  `profit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__offer` (`offer_id`),
  KEY `FK_statistic_user` (`user_ref_id`),
  CONSTRAINT `FK__offer` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`id`),
  CONSTRAINT `FK_statistic_user` FOREIGN KEY (`user_ref_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `statistic_data`
-- -------------------------------------------
DROP TABLE IF EXISTS `statistic_data`;
CREATE TABLE IF NOT EXISTS `statistic_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `data` text NOT NULL,
  `good_region` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `FK__statistic_user` (`user_id`),
  KEY `FK__statistic_offer` (`offer_id`),
  CONSTRAINT `FK__statistic_offer` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`id`),
  CONSTRAINT `FK__statistic_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ticket`
-- -------------------------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ticket_user` (`sender_id`),
  CONSTRAINT `FK_ticket_user` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ticket_comment`
-- -------------------------------------------
DROP TABLE IF EXISTS `ticket_comment`;
CREATE TABLE IF NOT EXISTS `ticket_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__ticket` (`ticket_id`),
  KEY `FK_ticket_comment_user` (`author_id`),
  CONSTRAINT `FK__ticket` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`),
  CONSTRAINT `FK_ticket_comment_user` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `user`
-- -------------------------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `balance` double DEFAULT '0',
  `ref` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE DATA access_type
-- -------------------------------------------
INSERT INTO `access_type` (`id`,`title`) VALUES
('1','Доступ');
INSERT INTO `access_type` (`id`,`title`) VALUES
('2','Перейти');



-- -------------------------------------------
-- TABLE DATA migration
-- -------------------------------------------
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m000000_000000_base','1428256212');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m130524_201442_init','1428256225');



-- -------------------------------------------
-- TABLE DATA offer
-- -------------------------------------------
INSERT INTO `offer` (`id`,`title`,`action_id`,`price`,`region_id`,`lead`,`hold`,`access_type_id`,`cpe`,`postclick`,`site`,`caption`,`traff_1`,`traff_2`,`traff_3`,`traff_4`,`traff_5`,`traff_6`,`traff_7`,`traff_8`,`traff_9`,`traff_10`,`traff_11`,`create_time`) VALUES
('1','test','2','123','1','13','3213','2','213','3123','2131','<p>321312</p>','Y','Y','N','Y','Y','N','Y','Y','Y','Y','N','2015-04-09 14:30:00');
INSERT INTO `offer` (`id`,`title`,`action_id`,`price`,`region_id`,`lead`,`hold`,`access_type_id`,`cpe`,`postclick`,`site`,`caption`,`traff_1`,`traff_2`,`traff_3`,`traff_4`,`traff_5`,`traff_6`,`traff_7`,`traff_8`,`traff_9`,`traff_10`,`traff_11`,`create_time`) VALUES
('2','test 2','2','123','1','123','123','2','123','123','3','<p>312321312</p>','Y','Y','N','N','Y','N','Y','Y','N','Y','Y','2015-04-09 15:20:00');



-- -------------------------------------------
-- TABLE DATA offer_action
-- -------------------------------------------
INSERT INTO `offer_action` (`id`,`title`) VALUES
('1','Оплаченный заказ');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('2','Подтвержденная явка');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('3','Подтвержденная регистрация');



-- -------------------------------------------
-- TABLE DATA payment
-- -------------------------------------------
INSERT INTO `payment` (`id`,`user_id`,`wmid`,`count`,`status`) VALUES
('1','4','34223432','4234324','Выполнено');
INSERT INTO `payment` (`id`,`user_id`,`wmid`,`count`,`status`) VALUES
('2','4','123','100','Недостаточно средств');
INSERT INTO `payment` (`id`,`user_id`,`wmid`,`count`,`status`) VALUES
('3','1','45345435','54354353','Активно');
INSERT INTO `payment` (`id`,`user_id`,`wmid`,`count`,`status`) VALUES
('4','4','7646','6746','Недостаточно средств');



-- -------------------------------------------
-- TABLE DATA region
-- -------------------------------------------
INSERT INTO `region` (`id`,`title`,`ref_cod`) VALUES
('1','ru','ruru');



-- -------------------------------------------
-- TABLE DATA statistic
-- -------------------------------------------
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('1','2','5','2015-04-09','13','8','5','1','0','0','0','0','0');



-- -------------------------------------------
-- TABLE DATA statistic_data
-- -------------------------------------------
INSERT INTO `statistic_data` (`id`,`user_id`,`offer_id`,`data`,`good_region`) VALUES
('2','5','2','','Y');
INSERT INTO `statistic_data` (`id`,`user_id`,`offer_id`,`data`,`good_region`) VALUES
('3','5','2','','N');
INSERT INTO `statistic_data` (`id`,`user_id`,`offer_id`,`data`,`good_region`) VALUES
('4','5','2','|text=>qqq|','N');
INSERT INTO `statistic_data` (`id`,`user_id`,`offer_id`,`data`,`good_region`) VALUES
('5','5','2','<p>text=>qqq</p>','N');
INSERT INTO `statistic_data` (`id`,`user_id`,`offer_id`,`data`,`good_region`) VALUES
('6','5','2','<p>text=>qqq</p><p>pass=>heeloman</p>','N');
INSERT INTO `statistic_data` (`id`,`user_id`,`offer_id`,`data`,`good_region`) VALUES
('7','5','2','text=>qqq
pass=>heeloman
','N');



-- -------------------------------------------
-- TABLE DATA ticket
-- -------------------------------------------
INSERT INTO `ticket` (`id`,`sender_id`,`title`,`status`,`message`) VALUES
('1','1','Проблемы с сайтом','1','Ну тут типо обращение');



-- -------------------------------------------
-- TABLE DATA user
-- -------------------------------------------
INSERT INTO `user` (`id`,`username`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`) VALUES
('1','VioLeY','$2y$13$0plUGOHbiiUp8EPBc7MTaexCdTCypPSnaLdSrt/vdeCEGs04.yO1O','HiEA7Elo5Dl2leVc2TMxcfCub7X2vjKK','','serebryanskiysergei@gmail.com','10','1428157924','1428316359','First user','','','','');
INSERT INTO `user` (`id`,`username`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`) VALUES
('3','imvioley@gmail.com','$2y$13$tsHp8wk21RBK2CqtTiNEOeANqw7mzmNIGzNompcLVYY2IFfLjxMD.','YbvnGgLd-mBF35_yoNaVnJXbWn-oCeiE','','imvioley@gmail.com','10','1428250358','1428250358','','','','','');
INSERT INTO `user` (`id`,`username`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`) VALUES
('4','Serebroo','$2y$13$4tmKfS5f.lPoZcbe4ZNYe.l9J9WfPHirv.PiHzOTxJogYmsGcHR46','yTi5wCOINX-dRwCGJ1km-XdghoPxKrIz','','serebro@gmail.com','10','1428259606','1428574799','Sergei','Serebryanskiy','8900307927','0','');
INSERT INTO `user` (`id`,`username`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`) VALUES
('5','lalala@gmail.com','$2y$13$8SHxzq8hJ0o1l6NogCYGNOFnolz2i/bbN3NDBaKniLdTaq4D3XD3m','hY7t9zTdYd34saJtpEp7VhsUrwVVuq66','','lalala@gmail.com','10','1428317709','1428317720','Lalala','','','0','GOALESaf7Cy9CfB0h3u1XijY8o57nL6T');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
