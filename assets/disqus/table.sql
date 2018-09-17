



DROP TABLE IF EXISTS `comments`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(255) NOT NULL,
  `firstname`varchar(255) NOT NULL,
	`lastname`varchar(255) NOT NULL,  
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `approved` int(255) NOT NULL default 0,
  `likes` int(255) NOT NULL default 0,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;
  
  
  ///////////////////////////////////////////////////////////////////////
  
  
DROP TABLE IF EXISTS `replies`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(255) NOT NULL,
  `firstname`varchar(255) NOT NULL,
	`lastname`varchar(255) NOT NULL,  
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `approved` int(255) NOT NULL default 0,
  `likes` int(255) NOT NULL default 0,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;
  
  
  
  
  
  
  