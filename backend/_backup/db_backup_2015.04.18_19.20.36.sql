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
-- TABLE `news`
-- -------------------------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `category` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `offer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_news_offer` (`offer_id`),
  CONSTRAINT `FK_news_offer` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `offer`
-- -------------------------------------------
DROP TABLE IF EXISTS `offer`;
CREATE TABLE IF NOT EXISTS `offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `action_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `our_percent` int(11) NOT NULL DEFAULT '25',
  `status` enum('pause','active') NOT NULL DEFAULT 'active',
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
  `date` date NOT NULL,
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
  CONSTRAINT `FK_statistic_user` FOREIGN KEY (`user_ref_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK__offer` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `statistic_data`
-- -------------------------------------------
DROP TABLE IF EXISTS `statistic_data`;
CREATE TABLE IF NOT EXISTS `statistic_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stat_id` int(11) NOT NULL,
  `data` text NOT NULL,
  `good_region` enum('Y','N') NOT NULL DEFAULT 'Y',
  `status` enum('confirmed','banned','waiting') NOT NULL DEFAULT 'waiting',
  PRIMARY KEY (`id`),
  KEY `FK_statistic_data_statistic` (`stat_id`),
  CONSTRAINT `FK_statistic_data_statistic` FOREIGN KEY (`stat_id`) REFERENCES `statistic` (`id`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `user`
-- -------------------------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `role` enum('webmaster','advertiser','adminko') NOT NULL DEFAULT 'webmaster',
  `email_confirm_token` varchar(255) DEFAULT NULL,
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
-- TABLE DATA news
-- -------------------------------------------
INSERT INTO `news` (`id`,`title`,`text`,`category`,`create_date`,`offer_id`) VALUES
('4','Публичная Beta','Дорогие партнеры, спешим обрадовать!

Мы запустились в публичном beta режиме, уже можно запускать трафик на офферы. Удачной работы.','4','2015-04-15','');
INSERT INTO `news` (`id`,`title`,`text`,`category`,`create_date`,`offer_id`) VALUES
('5','Запуск нового оффера Patek Philippe Sky Moon','Друзья, мы запустили новый оффер интернет-магазин часов Patek Philippe Sky Moon. Пожалуйста, ознакомьтесь.
','0','2015-04-16','9');
INSERT INTO `news` (`id`,`title`,`text`,`category`,`create_date`,`offer_id`) VALUES
('6','Повышение выплат в Patek Philippe Sky Moon','Партнеры! Мы повысили выплаты в интернет-магазине часов Patek Philippe Sky Moon до 1500 рублей. Обратите внимание!','2','2015-04-16','9');
INSERT INTO `news` (`id`,`title`,`text`,`category`,`create_date`,`offer_id`) VALUES
('7','Запуск нового оффера \"Стайлер BABYLISS\"','Друзья, мы запустили новый оффер \"Стайлер BABYLISS\". Пожалуйста, ознакомьтесь.','0','2015-04-17','10');



-- -------------------------------------------
-- TABLE DATA offer
-- -------------------------------------------
INSERT INTO `offer` (`id`,`title`,`action_id`,`price`,`our_percent`,`status`,`region_id`,`lead`,`hold`,`access_type_id`,`cpe`,`postclick`,`site`,`caption`,`traff_1`,`traff_2`,`traff_3`,`traff_4`,`traff_5`,`traff_6`,`traff_7`,`traff_8`,`traff_9`,`traff_10`,`traff_11`,`create_time`) VALUES
('4','uTrader - Бинарные Опционы','14','10000','25','pause','1','безлимит','30','2','новый','30','https://ru.utrader.com/','<b>Пополнение счета на $200</b><br><br>
 uTrader<br><br>
Добро пожаловать на uTrader - безопасную и надежную торговую платформу. uTrader позволяет вам торговать бинарными опционами на разные активы и получать прибыль до 85% с каждой сделки.
<br><br>
ВЫСОКИЙ ДОХОД
  <br><br>
БЕСПЛАТНОЕ ОБУЧЕНИЕ
  <br><br>
УДОБНАЯ ПЛАТФОРМА','Y','Y','Y','Y','Y','Y','Y','Y','N','N','Y','2015-04-07 15:20:00');
INSERT INTO `offer` (`id`,`title`,`action_id`,`price`,`our_percent`,`status`,`region_id`,`lead`,`hold`,`access_type_id`,`cpe`,`postclick`,`site`,`caption`,`traff_1`,`traff_2`,`traff_3`,`traff_4`,`traff_5`,`traff_6`,`traff_7`,`traff_8`,`traff_9`,`traff_10`,`traff_11`,`create_time`) VALUES
('5','5 ИНСТРУМЕНТОВ - Илья Дерягин','3','1000','25','active','1','безлимит','3','2','новый','30','http://consulting.tricksy.bz/','<b>Специально для предпринимателей мной был написан курс по увеличению продаж. <br><br>В него вошли 5 полноценных инструментов, проверенных на практике в реальном бизнесе.</b>
<br><br>
<a href=\"https://psv4.vk.me/c423019/u3174432/docs/5c41fde58811/Bez-imeni-1.png\" target=\"_blank\">Промо-материал</a>','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','2015-04-07 15:50:00');
INSERT INTO `offer` (`id`,`title`,`action_id`,`price`,`our_percent`,`status`,`region_id`,`lead`,`hold`,`access_type_id`,`cpe`,`postclick`,`site`,`caption`,`traff_1`,`traff_2`,`traff_3`,`traff_4`,`traff_5`,`traff_6`,`traff_7`,`traff_8`,`traff_9`,`traff_10`,`traff_11`,`create_time`) VALUES
('6','ФотоПодушка - подушка  с Вашими фотографиями','3','150','25','active','1','безлимит','2','2','новый','30','http://fotopodushka.com/','<b>ЛУЧШИЕ МОМЕНТЫ 
ДОЛЖНЫ ОСТАВАТЬСЯ С ВАМИ</b></br>
уникальная деталь интерьера - подушка 
с Вашими фотографиями','N','Y','Y','Y','Y','Y','Y','Y','N','N','Y','2015-04-08 13:24:00');
INSERT INTO `offer` (`id`,`title`,`action_id`,`price`,`our_percent`,`status`,`region_id`,`lead`,`hold`,`access_type_id`,`cpe`,`postclick`,`site`,`caption`,`traff_1`,`traff_2`,`traff_3`,`traff_4`,`traff_5`,`traff_6`,`traff_7`,`traff_8`,`traff_9`,`traff_10`,`traff_11`,`create_time`) VALUES
('9','Patek Philippe Sky Moon | интернет-магазин часов','3','2000','25','active','1','безлимит','7','2','новый','30','http://watch-pp.ru/','<h3>ЧАСЫ PATEK PHILIPPE SKY MOON</h3><p>С ДОСТАВКОЙ ПО РОССИИ И ГАРАНТИЕЙ 5 ЛЕТ
</p><h5>Действует скидка 70% НА ВСЕ ЧАСЫ PATEK PHILIPPE!</h5>','N','Y','Y','Y','Y','Y','Y','Y','N','N','N','2015-04-16 12:05:00');
INSERT INTO `offer` (`id`,`title`,`action_id`,`price`,`our_percent`,`status`,`region_id`,`lead`,`hold`,`access_type_id`,`cpe`,`postclick`,`site`,`caption`,`traff_1`,`traff_2`,`traff_3`,`traff_4`,`traff_5`,`traff_6`,`traff_7`,`traff_8`,`traff_9`,`traff_10`,`traff_11`,`create_time`) VALUES
('10','Стайлер BABYLISS','2','870','25','active','1','безлимит','30','2','новый','30','http://sale-vrn.ru/','<p>ПРОФЕССИОНАЛЬНЫЙ СТАЙЛЕР ДЛЯ ВОЛОС
</p><p>BABYLISS PRO PERFECT CURL
</p><p><strong>Оплата за выкупленный товар. <br><br><strong>Минимальный холд 15 дней.</strong><br></strong><strong>Максимальный холд 30 дней.</strong>
</p>','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','2015-04-17 21:45:00');



-- -------------------------------------------
-- TABLE DATA offer_action
-- -------------------------------------------
INSERT INTO `offer_action` (`id`,`title`) VALUES
('1','Регистрация пользователя');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('2','Оплаченный заказ');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('3','Подтвержденная заявка');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('4','Подтвержденная регистрация');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('5','Заполнение формы обратного звонка');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('6','Переход на страницу');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('7','Процент от продажи');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('8','Активный игрок');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('9','Выданный займ');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('10','Качественная регистрация');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('11','Установка приложения');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('12','Прохождение тестового урока');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('13','Месячный доступ');
INSERT INTO `offer_action` (`id`,`title`) VALUES
('14','Пополнение счета');



-- -------------------------------------------
-- TABLE DATA payment
-- -------------------------------------------
INSERT INTO `payment` (`id`,`user_id`,`wmid`,`count`,`status`) VALUES
('8','2','456876451234','2000','Недостаточно средств');
INSERT INTO `payment` (`id`,`user_id`,`wmid`,`count`,`status`) VALUES
('9','15','879456556654','2000','Недостаточно средств');



-- -------------------------------------------
-- TABLE DATA region
-- -------------------------------------------
INSERT INTO `region` (`id`,`title`,`ref_cod`) VALUES
('1','Россия','ru');



-- -------------------------------------------
-- TABLE DATA statistic
-- -------------------------------------------
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('7','5','2','2015-04-13','29','5','1','1','0','0','1','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('9','5','2','2015-04-14','24','1','0','1','1','0','0','0','750');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('13','6','2','2015-04-14','2','1','0','0','0','0','0','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('14','5','2','2015-04-15','3','0','0','0','0','0','0','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('15','6','2','2015-04-15','1','0','0','0','0','0','0','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('16','5','15','2015-04-15','1','1','0','0','0','0','0','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('17','6','15','2015-04-15','1','1','0','0','0','0','0','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('18','9','2','2015-04-16','1','1','0','0','0','0','0','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('19','6','16','2015-04-16','4','0','1','0','0','0','0','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('20','6','2','2015-04-16','1','0','0','0','0','0','0','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('21','5','19','2015-04-17','1','1','0','0','0','0','0','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('22','5','23','2015-04-17','3','0','2','0','0','0','0','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('23','5','28','2015-04-17','1','0','1','0','0','0','0','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('24','10','2','2015-04-17','1','1','0','0','0','0','0','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('25','10','2','2015-04-18','1','0','0','0','0','0','0','0','0');
INSERT INTO `statistic` (`id`,`offer_id`,`user_ref_id`,`date`,`hits`,`visitors`,`tb`,`leads`,`confirmed`,`question`,`warning`,`hold`,`profit`) VALUES
('26','9','23','2015-04-18','1','0','1','0','0','0','0','0','0');



-- -------------------------------------------
-- TABLE DATA statistic_data
-- -------------------------------------------
INSERT INTO `statistic_data` (`id`,`stat_id`,`data`,`good_region`,`status`) VALUES
('23','9','cghfghfgh','Y','confirmed');



-- -------------------------------------------
-- TABLE DATA ticket
-- -------------------------------------------
INSERT INTO `ticket` (`id`,`sender_id`,`title`,`status`,`message`) VALUES
('8','12','фыв','0','выф');
INSERT INTO `ticket` (`id`,`sender_id`,`title`,`status`,`message`) VALUES
('9','11','Снижение холда','1','Хочу сделать запрос на уменьшение холда, возможно ли это? До этого было три выплаты. Спасибо.');
INSERT INTO `ticket` (`id`,`sender_id`,`title`,`status`,`message`) VALUES
('10','10','Снижение холда','1','Хочу, чтобы вы снизили холд.');
INSERT INTO `ticket` (`id`,`sender_id`,`title`,`status`,`message`) VALUES
('11','15','Привет','1','я устал');
INSERT INTO `ticket` (`id`,`sender_id`,`title`,`status`,`message`) VALUES
('12','16','доброго','1','за фотоподушку отчисления повысите? на сколько возможно');
INSERT INTO `ticket` (`id`,`sender_id`,`title`,`status`,`message`) VALUES
('13','12','asd','0','<a href=\"javascript:alert(\'1\')\">XSS 2</a>
<script>alert(\'2\');</script>');
INSERT INTO `ticket` (`id`,`sender_id`,`title`,`status`,`message`) VALUES
('14','1','Тест отправки писем','1','123');



-- -------------------------------------------
-- TABLE DATA ticket_comment
-- -------------------------------------------
INSERT INTO `ticket_comment` (`id`,`ticket_id`,`author_id`,`text`,`create_date`) VALUES
('12','8','12','<a href=\"#\">asd</a>','2015-04-14 13:22:09');
INSERT INTO `ticket_comment` (`id`,`ticket_id`,`author_id`,`text`,`create_date`) VALUES
('13','8','12','<a href=\"javascript:alert(\'Куки мне запели!: \'+document.cookie)\">XSS</a>','2015-04-14 13:24:16');
INSERT INTO `ticket_comment` (`id`,`ticket_id`,`author_id`,`text`,`create_date`) VALUES
('15','9','11','Да, мы готовы снизить холд. Теперь ваш холд 5 дней.','2015-04-14 16:21:54');
INSERT INTO `ticket_comment` (`id`,`ticket_id`,`author_id`,`text`,`create_date`) VALUES
('16','10','11','Да, мы готовы снизить холд. Теперь ваш холд 5 дней.','2015-04-14 16:24:41');
INSERT INTO `ticket_comment` (`id`,`ticket_id`,`author_id`,`text`,`create_date`) VALUES
('17','11','15','и беспомощен','2015-04-15 19:48:45');
INSERT INTO `ticket_comment` (`id`,`ticket_id`,`author_id`,`text`,`create_date`) VALUES
('18','11','2','Херово че','2015-04-15 19:52:15');
INSERT INTO `ticket_comment` (`id`,`ticket_id`,`author_id`,`text`,`create_date`) VALUES
('19','11','15','Ну и что мне делать','2015-04-15 19:59:07');
INSERT INTO `ticket_comment` (`id`,`ticket_id`,`author_id`,`text`,`create_date`) VALUES
('20','11','15','ну и','2015-04-15 20:01:43');
INSERT INTO `ticket_comment` (`id`,`ticket_id`,`author_id`,`text`,`create_date`) VALUES
('21','12','2','Здравствуйте, на этой неделе повышение невозможно, к сожалению. Напишите в конце следующей недели, пожалуйста. ','2015-04-16 19:09:18');
INSERT INTO `ticket_comment` (`id`,`ticket_id`,`author_id`,`text`,`create_date`) VALUES
('22','12','16','В перспективе на сколько можете повысить? в самой радужной преспективе','2015-04-16 20:21:54');
INSERT INTO `ticket_comment` (`id`,`ticket_id`,`author_id`,`text`,`create_date`) VALUES
('23','12','2','До 150 рублей за одобренную заявку или до 450 рублей за выкупленный товар.','2015-04-16 20:30:26');
INSERT INTO `ticket_comment` (`id`,`ticket_id`,`author_id`,`text`,`create_date`) VALUES
('24','14','1','Мой комментарий','2015-04-16 21:51:24');
INSERT INTO `ticket_comment` (`id`,`ticket_id`,`author_id`,`text`,`create_date`) VALUES
('25','14','1','Тестовый ответ админа','2015-04-16 21:52:37');



-- -------------------------------------------
-- TABLE DATA user
-- -------------------------------------------
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('1','$2y$13$vFsv46F1OA6NttejGb./7OP3EMzJyCm6ZsUvlccRWDXj3jxZ6yM7e','kRPi35S5VQ55OOz-A_vTkBgho4DG-kTf','','serebryanskiysergei@gmail.com','10','1428321852','1428793563','VioLeY','Serebrooo','8900307927','224','edUyfir4x0Jigx-_xdYxBpH9lYyTI_jq','adminko','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('2','$2y$13$y87XbsFaMbdotJM5haed6O4sTc8b5vOHojyrBePlhh8oMqdKZsTXG','uB_e0xRsfS1UlSxtwsZGmdBFtNGJ4SIO','','info.chernikov@gmail.com','10','1428322118','1428963338','Влад','Черников','8961032892','750','MX0dNZ5KRYee8r-V8-NOMF-3yD6ysPUD','adminko','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('5','$2y$13$Gn/x.Ibj5yvfqYCVAC8I2.PdmMnv/opk5bCMrt.ZdhpdFRbTHNj.e','8JtEIlEJMxYdRg3BrhYldeRWUqv29fHn','','magomedov777777@yandex.ru','10','1428434169','1428434169','','','','0','eQDDgEqWNqKlVDSC4FXy0oJ38E_af5aX','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('6','$2y$13$VkDJM1NAh0Qon50rcu9.M.Rugqh2x/GieNaL10BnWNTxnTOKQF5/y','Gh-vssSfe1WgB-6qM9K7P5CI71-t_dSN','','sergeev.aleksand@bk.ru','10','1428493727','1428493727','','','','0','Xq61-UxRFeX_QklqXM3fyVNBj4-z2Zin','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('7','$2y$13$kpcg2QKWswsDPB1zY0khrO4x7g7LIUkKuQEPq/5UL0H82QsoQTzom','yJjjhItF1bIRK9DYh_ueWvH1VTGboulz','','duhuxo@flurred.com','10','1428499336','1428499336','','','','0','n_75TMRgwUgXZjBSELgl3vFYrube530e','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('8','$2y$13$CGTCFQoSrNY7N9cI.bmaLOz4pzjlqw2PQu23gALIiCUmCDxAvStXS','bThT-LXXKnS8iiV2-x87lSCIRD53ygad','','alexkuzhel.biz@gmail.com','10','1428500932','1429040918','','','','0','mzWsD6JX2c3GVYW4ytXzARkTizoBtTGa','adminko','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('10','$2y$13$ukP62OXiB9SVEhh13kgU3edFsAlNgmkOdI2Ja5oaaWAXvBG4g5rxS','B4zUF2DguqohaVX12JKW0uQyupYDRl8Q','','vladwebmast@mail.ru','10','1428994428','1428994428','','','','0','OuJoHCij1ZgbNjjVB-pG22hg5KhsENeK','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('11','$2y$13$HcF/kCPhBjndXDri8j8fs.7vw1fBUnDvhSN5.4JNZK0QVhc5k1rNm','m8WoAnGXezkvuwZfu6Dicn5AOViJBGg5','','staylive@mail.ru','10','1429003631','1429003631','','','','0','jS2NXSXTFvL7I9vB1psFlFTWn_jpUZxb','adminko','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('12','$2y$13$2E3g4U2fsYgYDwQxU7QjDuU3fTqS4RgLbio3inMZ2U04k44uXWABy','Fk-4QZQU9-CTZwVLJrZVgtSq05u5MNiz','','acupofspirt@gmail.com','10','1429006337','1429040906','Максимка','Назарьев','','0','GzPrKnMAyeRU-lim_UpZJ82QNQUlNQ4Q','adminko','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('14','$2y$13$tvu.CTtW2xqFggeUtj.Sz.4uOm5Db.2l2wj8BSB31qKxpeCnJL9s.','8pSBwdPbsg-_NuUhIRnkTqf5ICtmgmo8','','scor_mail@mail.ru','10','1429096133','1429096144','scor_mail@mail.ru','','','0','2Dwoo9lP7oWp8oeEKv8GQBNHu6MmDIMo','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('15','$2y$13$c1gbMT69o23zVF/1tYR6j.Hcb5oWfLiZCxV3QsTkvatgsJ/nLcW2i','ZeQvLpzjgRfiI74GOjOK3mmhi1uugMvU','','the.log.vlad@gmail.com','10','1429116361','1429116407','the.log.vlad@gmail.com','','','0','2GPzj4mrVzXVKSyAcixgguGHo4gXq29z','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('16','$2y$13$.43L.GFfYWDG0FVpfEE0Q.0Ym.oBRgDJFBbIARpa0wT200dOztP4i','KtXTB2NW_CtiHobMOWFnY5iqsaHNM6ea','','suvoroff.maxim2016@yandex.ru','10','1429197892','1429197909','suvoroff.maxim2016@yandex.ru','','','0','gsP8DsvB83tnOob5MPDD3ggRQ4OzuuiA','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('17','$2y$13$m4jTE.KzqQ91Kffw27EkiumiCEJON..1GyrpKRn9srch6X3mBrspq','SYwtNoh71B8Ob04xeH-COPA5M_GzAtQI','','denis.glyviy@gmail.com','10','1429200331','1429200362','denis.glyviy@gmail.com','','','0','kEDy4gSbZ6qH58gpt6hXkocBY7f0gPDO','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('18','$2y$13$Aib/6JkLjJEnDBEvcUkAe./vPxVS7IHxMOtZPkGDQ9YhTKHn4mpuy','r8RXdaVWZXfpIxj47bZLyWGdYyKI1sNP','','smsiroot@gmail.com','10','1429216224','1429216252','smsiroot@gmail.com','','','0','TfbePdCNuAG2ocPqIazjhkKEoPv00vM5','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('19','$2y$13$JD4oOwnef5glxXa9jeGIPeaQm.KRvoPfg7zu4VBqIBmwjvVWDMhTu','hKU14XYOp9P6Fw34M763ftHTP1tFvSZj','','rusich_57@rambler.ru','10','1429248893','1429248964','rusich_57@rambler.ru','','','0','PqJg737f3OVSpDRPULKf92Yoa0OSw_Rm','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('20','$2y$13$apVo9Ee.BGJJUbaIfa5/tOdiDaLU.qgq4O5AYNQVUObQSmnqmLK3S','OknaScekfLsjJTw7j9Nzeba03pHRnQ7b','','bagtanoff@yandex.ru','10','1429259903','1429259926','bagtanoff@yandex.ru','','','0','Ndjthtz-HQorjQjq1V5jw3-1hDrZ3yGw','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('21','$2y$13$.QJXpdly4eIynco26g4e6Or90ucgyX6wE8h4vJCcOR4IQ4C/fezmS','FYkhCXbozKBewyMvbIh2C_dS1l9gU9lj','','brutesell@yandex.ru','10','1429263695','1429263716','brutesell@yandex.ru','','','0','wquEkYxcHT7_U0rzvQ4rJQmS5clY26K_','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('22','$2y$13$TK3.eDsrb6QXrdoTSb9FI.ytmQ1nU7ddDEqQ8KmgafVKT8tW7TVCe','JwaoPGoTHlSy0k7Ls42eGyVNtAW2qOHy','','travm@list.ru','10','1429267390','1429267405','travm@list.ru','','','0','lqCkdI3vgrxvgrV9quthVZk4R4fGJ9WW','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('23','$2y$13$jRhdgAh0srMbmQY4KPGBiu2VozaXIR7.Yb8OUdvcMhHVNUd8nLsYa','k0Vg5l-bxmMYq17eX7fCh0DanxCNe69c','','11.inkognito@mail.ru','10','1429271031','1429271305','11.inkognito@mail.ru','','','0','y7OLJp-83dor-EJavwhN4EOrY3Gz9xHv','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('24','$2y$13$0NqsCuIdsppcFF9et90Equjo66Ww0IbPXyNGMaBJ7IhtKp//LPAKe','Ybe0wyZzpdHSfbD4VAopA3URQkYPvSYV','','sebastarkin@gmail.com','10','1429272838','1429272849','sebastarkin@gmail.com','','','0','R8r-ydgR1rNMtK-1w6B_mZc35WBIYR3W','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('25','$2y$13$yl/Gu3HKDc1wuJ8/QgDNP.kP4aZMbxYTq.4c3IG1LkWq0i9ClzkmC','KcqZvHaHPQ1-eb2L8f-nKf_FHKZg7DOb','','kydr1995@mail.ru','10','1429275191','1429275202','kydr1995@mail.ru','','','0','QHhLUx3zpVf_ioKrHgCknb8qGD-MwEGe','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('26','$2y$13$dMEb85o1IQSSmfNp2Be/t.2.mqpXqCWOKu9ivvY5faeSf9o0GtEES','ZWqzMnYEGMCFrX5j-gg2gf4bMV9SoBSM','','on-line_50cent@mail.ru','10','1429277126','1429277144','on-line_50cent@mail.ru','','','0','xRUw_DeLrWO9qkcpWyMM8JDn4T-qugqj','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('27','$2y$13$mddGdL2iFXKM27Xuluv0FOwLiOlgH8QuYARjrYVncZOjxtZMEwWz.','n1y2TVQOodPcZdF2gyxnYYMOM5nQ8neq','','taras2206@ukr.net','10','1429286050','1429311637','taras2206@ukr.net','','','0','8bjAwHEUpj28bWmGiXOKGlMtOvC6EPXw','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('28','$2y$13$eFHTXq/8fzWaGJ6rXdNsPe5wzJsBFsjb9AJJodR4y37VE2rXXcfwS','dlkydvlV-EgxTrjrmIqgZHVTW_d6P9Ay','','myraxowa@mail.ru','10','1429287672','1429287711','myraxowa@mail.ru','','','0','s4F-YZ2QxSIlKHWUfqHg1X26S4aXbEvs','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('29','$2y$13$2mi4WP018X.LRWRj4kxovew0rUpS7SbRSa2HBwmthM7Paj1.bDsUK','gqK8hBn--xNDeI9sH6eIt-1Vu2Z91XPH','','meleshko2@ukr.net','10','1429297176','1429297191','meleshko2@ukr.net','','','0','mHYA5p0FfuwQQO1E1wb8PCD4m5aSxFir','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('30','$2y$13$UKc.K45M0B6qK2CQx//eJOtWo2KQtXDUd2pd/de9qmEVTY9rpK4Li','JmesgdiakbBB2xGinwMi-L5jJl_C4xfu','','zosujuvitu@flurred.com','10','1429300073','1429300098','zosujuvitu@flurred.com','','','0','n3mr9YzlG6bQiddgX4Y_NMJdNaDvhGqJ','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('31','$2y$13$/aI4xJ3kmOsD9UehdLVcuOmftSTJtgX6H/P3qxqXCEOOZraEPU38S','GBx5Y75edEZDlI3D9GaeIzC3-5nTZ9OB','','vitalikkisil1980@gmail.com','10','1429302116','1429302130','vitalikkisil1980@gmail.com','','','0','UU_rJmI3oSKq1cAa_Mi2vAVDlotAEht1','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('32','$2y$13$HFUaZHj7T.73w.aviEj2u.qbtVokXESOA6Xq3sHj2vq346FlZ3VUm','uie5hQk19zGooMHPMxXbooswJyixvoiq','','keks-pi@yandex.ru','10','1429353637','1429354336','keks-pi@yandex.ru','','','0','JQVBUvj1mBGyDvVB8lXXcqigXs_Wu8bS','webmaster','');
INSERT INTO `user` (`id`,`password_hash`,`auth_key`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`name`,`surname`,`phone`,`balance`,`ref`,`role`,`email_confirm_token`) VALUES
('33','$2y$13$WYm9Jb1GWsC3VfxS28ce5u/81ZBx6nKMHMaO/CKCH4.xCVMhNtLni','eaj5Rr-YuIe5tzP1X6uNZd8H3s4e9XWX','','keravit@yandex.ru','10','1429355669','1429355686','keravit@yandex.ru','','','0','JB0uyei2M8iDzDPs73i8RCuDHlOUyda2','webmaster','');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
