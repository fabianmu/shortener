DROP TABLE IF EXISTS `urls`;
CREATE TABLE `urls` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `long_url` text NOT NULL,
  `short_url` varchar(8) NOT NULL,
  `hits` bigint(20) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short_url` (`short_url`)
) ENGINE=MyISAM DEFAULT;
