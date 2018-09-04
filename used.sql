



DROP TABLE IF EXISTS `admin`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_token` varchar(255) NOT NULL,
  `second_token` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `auth_code` varchar(255) NOT NULL,
  `account_status` int(10) NOT NULL default '0',
  
  
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;


/////////////////////////////////


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
  `phone` varchar(50) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `auth_code` varchar(255) NOT NULL,
  `account_status` int(10) NOT NULL default '0',
  
  
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;

//////////////////////////////////////////////////

DROP TABLE IF EXISTS `active_service`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `active_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  `expiration` timestamp NOT NULL default '0000-00-00 00:00:00',
  `renewal_fee` int(65) NOT NULL,
  `one_time_fee` int(65) NOT NULL,
  `activity_status` int(4) NOT NULL default '0' ,
  `reminded` int(4) NOT NULL default '0',
  
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;



////////////////////////////////////////////////////////

DROP TABLE IF EXISTS `app_service`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `app_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  `one_time_fee` int(65) NOT NULL,
  `activity_status` int(4) NOT NULL default '0' ,
  
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;

/////////////////////////////////////////////////////////////


DROP TABLE IF EXISTS `renew_service`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `renew_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  `renewal_fee` int(65) NOT NULL,
  `activity_status` int(4) NOT NULL default '0' ,
  
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;

//////////////////////////////////////////////////////////////

DROP TABLE IF EXISTS `app_service_request`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `app_service_request` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `charge` int(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `paid` int(100) NOT NULL default '0',
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;
  
/////////////////////////////////////////////////////////////


DROP TABLE IF EXISTS `website_service_request`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `website_service_request` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `charge` int(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `paid` int(100) NOT NULL default '0',
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;
  
  
  
DROP TABLE IF EXISTS `cart_order`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `cart_order` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `item` text NOT NULL,
  `price` int(255) NOT NULL,
  `billing` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  `paid` int(100) NOT NULL default '0',
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;
  
  
  
  ////////////////////////////////////////////////////////

DROP TABLE IF EXISTS `notify`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  `stats` int(65) NOT NULL default '0' ,
  
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;



///////////////////////////////////////////////////////////////

DROP TABLE IF EXISTS `ipay`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `ipay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `product` text NOT NULL,
  `price` int(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;



///////////////////////////////////////////////////////////////

DROP TABLE IF EXISTS `ipay_balance`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `ipay_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `product` text NOT NULL,
  `price` int(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;




///////////////////////////////////////////////////////////////

DROP TABLE IF EXISTS `survey`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `survey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `source_answer` text NOT NULL,
  `time_answer` text NOT NULL,
  `service_answer` text NOT NULL,
  `rate_answer` text NOT NULL,
  `recommend_answer` text NOT NULL,
  `improve_answer` text NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;




///////////////////////////////////////////////////////////////

DROP TABLE IF EXISTS `job_applicant`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `job_applicant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `skills` text(255) NOT NULL,
  `working_years` text(255) NOT NULL,
  `department` text(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `potrait` varchar(255) NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;
  
  
  
  
///////////////////////////////////////////////////////////////

DROP TABLE IF EXISTS `books`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_key` varchar(255) NOT NULL,
  `cover_name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(255) NOT NULL,
  `description` text(255) NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;




///////////////////////////////////////////////////////////////

DROP TABLE IF EXISTS `book_sales`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `book_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  
  
  PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1480 ;


  


