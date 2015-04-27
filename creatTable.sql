/*------- CREATE SQL---------*/
DROP TABLE IF EXISTS  `wishwall_love`;
CREATE TABLE `wishwall_love` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `toWho` varchar(32) DEFAULT NULL,
  `fromWho` varchar(32) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `color` int(11) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`ID`),
  KEY `name` (`fromWho`,`toWho`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=utf8 COMMENT='表白墙数据表';