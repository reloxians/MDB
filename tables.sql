




DROP TABLE IF EXISTS `forum_answer`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `forum_answer` (
  `question` text character set latin1 NOT NULL,
  `question_id` int(10) NOT NULL default '0',
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(65) NOT NULL default '',
  `a_email` varchar(65) NOT NULL default '',
  `a_answer` text character set latin1 NOT NULL,
  `votes` int(4) NOT NULL default '0' ,
  `comments` LONGTEXT NOT NULL,
  `a_datetime` varchar(25) NOT NULL default '',
  `accepted` int(10)  NOT NULL default '0',
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  `edited` int(10) NOT NULL default '0',
  `editor` varchar(65) NOT NULL default '',
  `edited_time` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`a_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;



/////////////////////////////////////////////////////////////////////////////////



DROP TABLE IF EXISTS `forum_answer`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `forum_answer` (
  `question` text character set latin1 NOT NULL,
  `question_id` int(10) NOT NULL default '0',
  `a_id` int(10) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(65) NOT NULL default '',
  `a_email` varchar(65) NOT NULL default '',
  `a_answer` text character set latin1 NOT NULL,
  `votes` int(4) NOT NULL default '0' ,
  `comments` LONGTEXT NOT NULL,
  `a_datetime` varchar(25) NOT NULL default '',
  `accepted` int(10)  NOT NULL default '0',
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  `edited` int(10) NOT NULL default '0',
  `editor` varchar(65) NOT NULL default '',
  `edited_time` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`a_id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ROW_FORMAT=DYNAMIC;
SET character_set_client = @saved_cs_client;

////////////////////////////////////////////////////////////


ALTER TABLE `forum_question` ADD `restore_count` int(4) NOT NULL default '0' AFTER `deleted`;

DROP TABLE IF EXISTS `forum_question`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `forum_question` (
  `id` int(10)  NOT NULL auto_increment,
  `question` text character set latin1 NOT NULL,
  `detail` text character set latin1 NOT NULL,
  `name` varchar(65) NOT NULL default '',
  `email` varchar(65) NOT NULL default '',
  `tag1` varchar(10) NOT NULL default '',
  `tag2` varchar(10) NOT NULL default '',
  `tag3` varchar(10) NOT NULL default '',
  `tag4` varchar(10) NOT NULL default '',
  `tag5` varchar(10) NOT NULL default '',
  `tag6` varchar(10) NOT NULL default '',
  `datetime` varchar(25) NOT NULL default '',
  `view` int(4) NOT NULL default '0',
  `reply` int(4) NOT NULL default '0',
  `votes` int(11) NOT NULL default '0',
  `comments` LONGTEXT NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  `deleted` int(10) NOT NULL default '0',
  `restore_count` int(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  FULLTEXT KEY `question` (`question`,`detail`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;


////////////////////////////////////////////////////////////////


DROP TABLE IF EXISTS `comments`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `comments` (
  `question_id` int(10) NOT NULL default '0',
  `id` int(10) NOT NULL auto_increment,
  `comment` text character set latin1 NOT NULL,
  `username` varchar(65) NOT NULL,
  PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

////////////////////////////////////////////////////////////////////


DROP TABLE IF EXISTS `notifications`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `notifications` (
  `username` varchar(65) NOT NULL,
  `id` int(10) NOT NULL auto_increment,
  `info` text character set latin1 NOT NULL,
  `detail` text character set latin1 NOT NULL,
  `source` varchar(65) NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  `new` int(10) NOT NULL default '1',
  PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;


/////////////////////////////////////////////////////////////////////////////////


DROP TABLE IF EXISTS `users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text,
  `phone` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `account_status` tinyint(4) DEFAULT '0',
  `activation_code` varchar(50) NOT NULL,
  `news_letter_status` tinyint(4) DEFAULT '0',
  `joindate` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `shortbio` text,
  `admin_status` tinyint(4) DEFAULT '0',
  `forgot_pass_identity` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `longbio` text,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `stumbleupon` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `googleplus` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `profession` text,
  `gender` varchar(255) DEFAULT NULL,
  `maritialstatus` varchar(255) DEFAULT NULL,
  `backgroundpicture` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `vimeo` varchar(255) DEFAULT NULL,
  `points` int(255) DEFAULT '10',
  `views` int(255) NOT NULL default '0',
  `lastseen` date NOT NULL,
  
  
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;



/////////////////////////////////////////////////////////////////////////////

DROP TABLE IF EXISTS `badges`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `badges` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(255) NOT NULL, 
 `badge` varchar(65) NOT NULL,
 
 PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

 

///////////////////////////////////////////////////////////////////////////////


DROP TABLE IF EXISTS `followers`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `followers` (
  `id` int(65) NOT NULL auto_increment,
  `leader_name` varchar(65) NOT NULL,
  `follower_name` varchar(65) NOT NULL,
  
  
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;





///////////////////////////////////////////////////////////////////////////////////



DROP TABLE IF EXISTS `developers`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `developers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `biograph` text,
  `company` varchar(255) DEFAULT NULL,
  `jobtitle` varchar(255) DEFAULT NULL,
  `jobdetails` text,
  `startdate` date NOT NULL,
  `schooltype` varchar(255) DEFAULT NULL,
  `schoolname` varchar(255) NOT NULL,
  `coursetitle` varchar(255) NOT NULL,
  `begindate` date NOT NULL,
  `enddate` date NOT NULL,
  `news_letter_status` tinyint(4) DEFAULT '0',
  `skills` text,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `views` int(255) NOT NULL default '0',
 
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;

///////////////////////////////////////////////////////////////////////////////


DROP TABLE IF EXISTS `answer_edit`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `answer_edit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `a_id` int(10) NOT NULL default '0',
  `subject` text character set latin1 NOT NULL,
  `editor_name` varchar(65) NOT NULL default '',
  `editor_answer` text character set latin1 NOT NULL,
  `editor_reason` text character set latin1 NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
SET character_set_client = @saved_cs_client;

/////////////////////////////////////////////////////////////


DROP TABLE IF EXISTS `answer_comments`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `answer_comments` (
  `id` int(10) NOT NULL auto_increment,
  `a_id` int(10) NOT NULL default '0',
  `comment` text character set latin1 NOT NULL,
  `username` varchar(65) NOT NULL,
  PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

////////////////////////////////////////////////////////////////////



DROP TABLE IF EXISTS `job_choices`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `job_choices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(65) NOT NULL default '',
  `username` varchar(65) NOT NULL default '',
  `wordpress` int(10) NOT NULL default '0',
  `webapps` int(10) NOT NULL default '0',
  `blogger` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
SET character_set_client = @saved_cs_client;

/////////////////////////////////////////////////////////////


DROP TABLE IF EXISTS `company_choices`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `company_choices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(65) NOT NULL default '',
  `email` varchar(65) NOT NULL default '',
  `product_based` int(10) NOT NULL default '0',
  `service_based` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
SET character_set_client = @saved_cs_client;

/////////////////////////////////////////////////////////////



DROP TABLE IF EXISTS `email_choices`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `email_choices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(65) NOT NULL default '',
  `email` varchar(65) NOT NULL default '',
  `enhancement` int(10) NOT NULL default '0',
  `q_and_a` int(10) NOT NULL default '0',
  `general` int(10) NOT NULL default '0',
  `recommendations` int(10) NOT NULL default '0',
  `pending_email` varchar(65) NOT NULL default '',
  `conf_code` varchar(65) NOT NULL,
  PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
SET character_set_client = @saved_cs_client;

/////////////////////////////////////////////////////////////



DROP TABLE IF EXISTS `favorites`; 
SET @saved_cs_client = @@character_set_client; 
SET character_set_client = utf8; 
CREATE TABLE `favorites` ( 
	`id` int(10) unsigned NOT NULL auto_increment, 
	`question_id` int(10) unsigned NOT NULL, 
	`question` text character set latin1 NOT NULL,
	`username` varchar(65) NOT NULL default '', 
	PRIMARY KEY (`id`) 
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC; SET character_set_client = @saved_cs_client; 
	
	
	
/////////////////////////////////////////////////////////////////////////


DROP TABLE IF EXISTS `temp_users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `temp_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text,
  `phone` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `account_status` tinyint(4) DEFAULT '0',
  `activation_code` varchar(50) NOT NULL,
  `news_letter_status` tinyint(4) DEFAULT '0',
  `joindate` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `shortbio` text,
  `admin_status` tinyint(4) DEFAULT '0',
  `forgot_pass_identity` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `longbio` text,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `stumbleupon` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `googleplus` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `profession` text,
  `gender` varchar(255) DEFAULT NULL,
  `maritialstatus` varchar(255) DEFAULT NULL,
  `backgroundpicture` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `vimeo` varchar(255) DEFAULT NULL,
  `points` int(255) DEFAULT '10',
  `views` int(255) NOT NULL default '0',
  `lastseen` date NOT NULL,
  
  
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;



/////////////////////////////////////////////////////////////////////////////



DROP TABLE IF EXISTS `achievements`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `achievements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `welcome` int(10) NOT NULL default '0',
  `asker` int(10) NOT NULL default '0',
  `contributor` int(10) NOT NULL default '0',
  `active` int(10) NOT NULL default '0',
  `teacher` int(10) NOT NULL default '0',
  `peer_pressure` int(10) NOT NULL default '0'
  `good_citizen` int(10) NOT NULL default '0',
  `good_answer` int(10) NOT NULL default '0',
  `good_question` int(10) NOT NULL default '0',
  `networker` int(10) NOT NULL default '0',
  `great_question` int(10) NOT NULL default '0',
  `epic` int(10) NOT NULL default '0',
  `self_learned` int(10) NOT NULL default '0',
  `developer` int(10) NOT NULL default '0',
  `question_ninja` int(10) NOT NULL default '0',
  `top_answer` int(10) NOT NULL default '0',
  `popular_answer` int(10) NOT NULL default '0',

	PRIMARY KEY (`id`) 
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC; SET character_set_client = @saved_cs_client; 

//////////////////////////////////////////////////////////////////////////////////


DROP TABLE IF EXISTS `help_center`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `help_center` (
  `id` int(10)  NOT NULL auto_increment,
  `title` text character set latin1 NOT NULL,
  `detail` text character set latin1 NOT NULL,
  `category` varchar(65) NOT NULL default '',
  `view` int(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  FULLTEXT KEY `question` (`title`,`detail`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;


////////////////////////////////////////////////////////////////


DROP TABLE IF EXISTS `question_votes`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `question_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `vote` int(10) NOT NULL default '0',

	PRIMARY KEY (`id`) 
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC; SET character_set_client = @saved_cs_client; 
		
	
/////////////////////////////////////////////////////////////////////////////////////




DROP TABLE IF EXISTS `answer_votes`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `answer_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `vote` int(10) NOT NULL default '0',

	PRIMARY KEY (`id`) 
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC; SET character_set_client = @saved_cs_client; 
		
	
/////////////////////////////////////////////////////////////////////////////////////