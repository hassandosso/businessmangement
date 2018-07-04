/*
SQLyog Community v11.52 (64 bit)
MySQL - 5.5.52 : Database - business_management
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`business_management` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `business_management`;

/*Table structure for table `clients_account` */

DROP TABLE IF EXISTS `clients_account`;

CREATE TABLE `clients_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`username`,`company`,`email`,`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clients_account` */

insert  into `clients_account`(`id`,`fullname`,`username`,`password`,`company`,`email`,`mobile`,`phone`,`town`,`address`,`street`) values (1,'Dosso Lassina','Hassan','$2y$11$Mjc2m2e6h4BwTUUElihRUu/QTisclgTCxh27DIQmmWa4rQN92PzrC','IVOIRESOFT','lassinadosso21@gmail.com','00918650135917','','Pune','Indicus Software, 27 Varshanand','Signal road');

/*Table structure for table `hassan_billcode` */

DROP TABLE IF EXISTS `hassan_billcode`;

CREATE TABLE `hassan_billcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hassan_billcode` */

insert  into `hassan_billcode`(`id`,`code`) values (11,'0011'),(12,'0012'),(13,'0013'),(14,'0014'),(15,'0015'),(16,'0016'),(17,'0017'),(18,'0018'),(19,'0019'),(20,'0020'),(21,'0021'),(22,'0022'),(23,'0023'),(24,'0024'),(25,'0025'),(26,'0026'),(27,'0027'),(28,'0028'),(29,'0029'),(30,'0030'),(31,'0031'),(32,'0032'),(33,'0033'),(34,'0034'),(35,'0035'),(36,'0036'),(37,'0037'),(38,'0038'),(39,'0039'),(40,'0040'),(41,'0041'),(42,'0042'),(43,'0043'),(44,'0044'),(45,'0045'),(46,'0046'),(47,'0047'),(48,'0048'),(49,'0049'),(50,'0050'),(51,'0051'),(52,'0052'),(53,'0053'),(54,'0054'),(55,'0055'),(56,'0056'),(57,'0057'),(58,'0058'),(59,'0059'),(60,'0060'),(61,'0061'),(62,'0062'),(63,'0063'),(64,'0064'),(65,'0065'),(66,'0066'),(67,'0067'),(68,'0068'),(69,'0069'),(70,'0070'),(71,'0071'),(72,'0072'),(73,'0073'),(74,'0074'),(75,'0075'),(76,'0076'),(77,'0077'),(78,'0078'),(79,'0079'),(80,'0080'),(81,'0081'),(82,'0082'),(83,'0083'),(84,'0084'),(85,'0085'),(86,'0086'),(87,'0087'),(88,'0088'),(89,'0089'),(90,'0090'),(91,'0091'),(92,'0092'),(93,'0093'),(94,'0094'),(95,'0095'),(96,'0096'),(97,'0097'),(98,'0098'),(99,'0099'),(100,'0100');

/*Table structure for table `hassan_billing` */

DROP TABLE IF EXISTS `hassan_billing`;

CREATE TABLE `hassan_billing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `tax` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `final_price` double NOT NULL,
  `item_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_date` date DEFAULT NULL,
  `customer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hassan_billing` */

insert  into `hassan_billing`(`id`,`bill_id`,`quantity`,`unit_price`,`total_price`,`tax`,`discount`,`final_price`,`item_name`,`bill_date`,`customer`) values (35,'0010',10,45,450,18,0,468,'Soda can Coke product','2018-06-22','company name / '),(36,'0010',8,65,520,10.4,20.8,509.6,'Apple Sauce','2018-06-22','company name / '),(37,'0010',15,100,1500,30,45,1485,'Tea green  bags','2018-06-22','company name / ');

/*Table structure for table `hassan_category` */

DROP TABLE IF EXISTS `hassan_category`;

CREATE TABLE `hassan_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hassan_category` */

insert  into `hassan_category`(`id`,`category_id`,`category_name`) values (1,'B','Beverages'),(2,'CPF','Canned & Packaged Foods'),(3,'BBC','Bakery Breakfast Cereal'),(4,'FF','Frozen Foods'),(5,'MKI','Miscellaneous Kitchen Items'),(6,'P','Produce'),(7,'RF','Refrigerated Foods'),(8,'CAT1','Category 1'),(9,'CAT2','Category 2'),(10,'CAT3','category 3'),(11,'CAT4','Category 4'),(12,'CAT5','Category 5'),(13,'CAT6','Category 6'),(14,'CAT7','Category 7'),(15,'CAT8','Category 8'),(16,'CAT9','Category 9'),(17,'CAT10','Category 10');

/*Table structure for table `hassan_customer` */

DROP TABLE IF EXISTS `hassan_customer`;

CREATE TABLE `hassan_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_contact` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hassan_customer` */

insert  into `hassan_customer`(`id`,`customer_id`,`customer_name`,`customer_contact`,`customer_email`,`customer_address`) values (1,'Caramoko Mohamed8650136112','Caramoko Mohamed','8650136112','mohd@gmail.com','glocal university Saharanpur');

/*Table structure for table `hassan_flow` */

DROP TABLE IF EXISTS `hassan_flow`;

CREATE TABLE `hassan_flow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stockid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flow_date` date DEFAULT NULL,
  `flow_item_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hassan_flow` */

insert  into `hassan_flow`(`id`,`stockid`,`flow_date`,`flow_item_number`) values (35,'06/21_sdccopro_33ml','2018-06-22',10),(36,'06/21_appSau','2018-06-22',8),(37,'06/21_teagrbag','2018-06-22',15);

/*Table structure for table `hassan_item` */

DROP TABLE IF EXISTS `hassan_item`;

CREATE TABLE `hassan_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`,`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hassan_item` */

insert  into `hassan_item`(`id`,`item_id`,`item_name`,`category`,`price`) values (1,'appj','Apple Juice','Beverages',99),(2,'cof','Coffee','Beverages',40),(3,'mi','Milk','Beverages',155),(4,'orju','Orange Juice not from concentrate','Beverages',105),(5,'sodb','Soda, bottle','Beverages',33),(6,'sodbc','Soda bottle Coke product','Beverages',25),(7,'sodc','Soda can','Beverages',30),(8,'sodcc','Soda can Coke product','Beverages',45),(9,'tgbg','Tea green  bags','Beverages',100),(10,'wr','Water regular/drinking','Beverages',35),(11,'ws','Water Sparkling/Mineral','Beverages',35),(12,'apps','Apple Sauce','Canned & Packaged Foods',65),(13,'bars','Barbeque Sauce','Canned & Packaged Foods',70),(14,'brcr','Bread Crumbs','Canned & Packaged Foods',40),(15,'chpf','Cheery Pie Filling','Canned & Packaged Foods',60),(16,'chnsc','Chicken Noodle Soup condensed','Canned & Packaged Foods',50),(17,'chnsr','Chicken Noodle Soup regular','Canned & Packaged Foods',115),(18,'chpc','Chips potato chips','Canned & Packaged Foods',25),(19,'comi','Coconut Milk','Canned & Packaged Foods',55),(20,'flall','Flour all purpose','Canned & Packaged Foods',39),(21,'flsr','Flour self rising','Canned & Packaged Foods',45),(22,'grbec','Green Beans canned','Canned & Packaged Foods',50),(23,'h','Honey','Canned & Packaged Foods',120),(24,'jpc','Jalopeno Peppers canned','Canned & Packaged Foods',45),(25,'ketc','Ketchup','Canned & Packaged Foods',10),(26,'Moc','Mandarin Oranges canned','Canned & Packaged Foods',78),(27,'May','Mayonnaise','Canned & Packaged Foods',45),(28,'michb','Milk Chocolate Bar','Canned & Packaged Foods',178),(29,'mushs','Mushrooms stems/pieces','Canned & Packaged Foods',145),(30,'musdi','Mustard dijon','Canned & Packaged Foods',29),(31,'Musy','Mustard yellow','Canned & Packaged Foods',35),(32,'nut','Nutella','Canned & Packaged Foods',200),(33,'oilCa','Oil Canola  100% pure','Canned & Packaged Foods',55),(34,'oilOl','Oil Olive 100% pure','Canned & Packaged Foods',12),(35,'oilolex','Oil Olive extra virgin','Canned & Packaged Foods',30),(36,'pasteggn','Pasta Egg Noodles','Canned & Packaged Foods',69),(37,'pastelm','Pasta Ellbow Maccaroni','Canned & Packaged Foods',12),(38,'pastpr','Pasta Penne Rigate','Canned & Packaged Foods',45),(39,'pasr','Pasta, Rotini/Rotelle/Fusilli','Canned & Packaged Foods',78),(40,'passpa','Pasta Spaghetti','Canned & Packaged Foods',36),(41,'peaB','Peanut Butter','Canned & Packaged Foods',123),(42,'pear','Peanuts roasted','Canned & Packaged Foods',154),(43,'brsaf','Breakfast Sausage','Frozen Foods',87),(44,'chkbf','Chicken Breasts','Frozen Foods',96),(45,'chnf','Chicken Nuggets','Frozen Foods',31),(46,'chtf','Chicken Tenderloin','Frozen Foods',15),(47,'fishfr','Fish Flounder','Frozen Foods',37),(48,'fishm','Fish Mahi','Frozen Foods',78),(49,'fishTil','Fish Tilapia ','Frozen Foods',89),(50,'frenfri','French Fries ','Frozen Foods',87),(51,'alifoil','Aluminum Foil','Miscellaneous Kitchen Items',96),(52,'paptow','Paper Towles','Miscellaneous Kitchen Items',34),(53,'plaswr','Plastic Wrap','Miscellaneous Kitchen Items',456),(54,'appgb','Apples Gala bag','Produce',58),(55,'apprgdb','Apples Red/Golden Delicious bag','Produce',14),(56,'cw','Carrots whole','Produce',789),(57,'grapr','Grapes red','Produce',32),(58,'le','Lemons','Produce',145),(59,'etice','Lettuce iceberg','Produce',147),(60,'mushw','Mushrooms whole','Produce',159),(61,'oniye','Onions yellow','Produce',136),(62,'bac','Bacon','Refrigerated Foods',157),(63,'beefsm','Beef Stew Meat','Refrigerated Foods',145),(64,'brpac','Brats 4-6 pack','Refrigerated Foods',123),(65,'butruns','Butter real unsalted/salted','Refrigerated Foods',147),(66,'chesing','Cheese Singles (imitation)','Refrigerated Foods',69),(67,'cheblo','Cheese block (regular)','Refrigerated Foods',48),(68,'chebou','Cheese Boursin','Refrigerated Foods',251),(69,'chebr','Cheese, Brie','Refrigerated Foods',198),(70,'cheshm','Cheese, shredded, Mexican style','Refrigerated Foods',199),(71,'cheshmo','Cheese, shredded, Mozarella','Refrigerated Foods',56);

/*Table structure for table `hassan_note` */

DROP TABLE IF EXISTS `hassan_note`;

CREATE TABLE `hassan_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` longtext,
  `reminder` date DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

/*Data for the table `hassan_note` */

insert  into `hassan_note`(`id`,`date`,`title`,`content`,`reminder`) values (38,'2018-06-26 16:29:27','test 5','time zone test ok','2018-06-28'),(39,'2018-06-27 11:18:41','test 1','test today note','2018-06-27'),(40,'2018-06-27 11:22:52','test 2','note remind at least 2 week later','2018-07-10'),(41,'2018-06-27 11:38:19','test 0','efrgejgf','2018-08-24'),(42,'2018-06-28 16:52:53','today test','sorry, transition doesnt work','2018-06-30'),(43,'2018-06-28 17:05:17','reminder','reminder empty','2018-06-30');

/*Table structure for table `hassan_stock` */

DROP TABLE IF EXISTS `hassan_stock`;

CREATE TABLE `hassan_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_number` int(11) NOT NULL,
  `entry_date` date DEFAULT NULL,
  `actual_number` int(11) DEFAULT NULL,
  `out_date` date DEFAULT NULL,
  PRIMARY KEY (`id`,`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hassan_stock` */

insert  into `hassan_stock`(`id`,`stock_id`,`item_name`,`initial_number`,`entry_date`,`actual_number`,`out_date`) values (1,'06/21_appJ_33ml','Apple Juice',200,'2018-06-21',200,NULL),(2,'06/21_cofpd','Coffee',150,'2018-06-21',150,NULL),(3,'06/21_milkpd_200g','Milk',250,'2018-06-21',250,NULL),(4,'06/21_orj_1l','Orange Juice not from concentrate',100,'2018-06-21',100,NULL),(5,'06/21_sdbt_33ml','Soda, bottle',125,'2018-06-21',125,NULL),(6,'06/21_sdbtckpro_33ml','Soda bottle Coke product',140,'2018-06-21',140,NULL),(7,'06/21_sdcan_33ml','Soda can',200,'2018-06-21',200,NULL),(8,'06/21_sdccopro_33ml','Soda can Coke product',110,'2018-06-21',100,'2018-06-22'),(9,'06/21_teagrbag','Tea green  bags',75,'2018-06-21',60,'2018-06-22'),(10,'06/21_watreg/dri_1l','Water regular/drinking',132,'2018-06-21',132,NULL),(11,'06/21_appSau','Apple Sauce',85,'2018-06-21',77,'2018-06-22');

/*Table structure for table `hassan_useraccount` */

DROP TABLE IF EXISTS `hassan_useraccount`;

CREATE TABLE `hassan_useraccount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hassan_useraccount` */

insert  into `hassan_useraccount`(`id`,`fullname`,`username`,`password`,`role`) values (1,'Dosso Lassina','Hassan','$2y$11$Mjc2m2e6h4BwTUUElihRUu/QTisclgTCxh27DIQmmWa4rQN92PzrC','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
