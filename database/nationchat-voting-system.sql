-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `apps`;
CREATE TABLE `apps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xuser` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nick` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `age` int(50) NOT NULL,
  `location` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contribution` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `positionfor` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ircxp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ircu` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gnuworld` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `eggdrop` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `otherxp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `apps` (`id`, `name`, `xuser`, `nick`, `email`, `age`, `location`, `contribution`, `positionfor`, `ircxp`, `ircu`, `gnuworld`, `eggdrop`, `otherxp`, `message`, `photo`, `status`, `date`) VALUES
(145,	'Usman Ali Qureshi',	'BOSS',	'BOSS',	'usman@usmanaliqureshi.com',	34,	'Pakistan',	'Services Development / Customization,Website Maintenance / Modifications,News, Forum & Events Calendar Editor,User Help (#Help),BNC / ZNC Support (#NationBNC)',	'Helper',	'This is a test message.',	'This is a test message.',	'This is a test message.',	'This is a test message.',	'This is a test message.',	'This is a test message.',	'',	'Pending',	'2020-04-13 10:38:13');

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitename` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `settings` (`id`, `sitename`) VALUES
(1,	'NationCHAT Staff Voting System');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(75) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` int(50) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `username`, `password`, `level`, `name`, `email`, `phone`, `status`) VALUES
(1,	'BOSS',	'e10adc3949ba59abbe56e057f20f883e',	1500,	'Usman Ali Qureshi',	'boss@nationchat.org',	'030020133811',	'Active'),
(2,	'Oaric',	'e10adc3949ba59abbe56e057f20f883e',	1400,	'Abdullah Saaid',	'oaric@nationchat.org',	'',	'active'),
(3,	'blacklist3d',	'e10adc3949ba59abbe56e057f20f883e',	1300,	'Waheed Ur Rehman',	'blacklist3d@nationchat.org',	'',	'Active'),
(4,	'sidekick',	'e10adc3949ba59abbe56e057f20f883e',	1300,	'Ryan',	'sidekick@nationchat.org',	'',	'Active'),
(5,	'stell',	'e10adc3949ba59abbe56e057f20f883e',	1000,	'Stella Turner',	'stell@nationchat.org',	'',	'active'),
(6,	'umair',	'e10adc3949ba59abbe56e057f20f883e',	850,	'Umair',	'umair@nationchat.org',	'03134396343',	'active'),
(7,	'ace',	'e10adc3949ba59abbe56e057f20f883e',	900,	'',	'',	'',	'Active');

DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voter` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `candidate` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `decision` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` int(50) NOT NULL,
  `reason` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- 2020-04-13 10:59:06
