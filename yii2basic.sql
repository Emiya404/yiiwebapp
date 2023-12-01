-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: yii2basic
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog_post`
--

DROP TABLE IF EXISTS `blog_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `blog_post_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_post`
--

LOCK TABLES `blog_post` WRITE;
/*!40000 ALTER TABLE `blog_post` DISABLE KEYS */;
INSERT INTO `blog_post` VALUES (1,'日本遭放射性废液溅射污染2人仍未出院！','10月底，福岛核泄露事件再次引起国际关注。据了解，两名工作人员在处理福岛第一核电站的核废水时不慎被放射性液体溅射，造成身体受到污染。这一消息一经传出，立即引起了各方的高度重视和忧虑。\r\n事情发生在10月25日，当时有五名工作人员正在进行核废水处理的关键步骤。\r\n不幸的是，事故突然发生，两人被紧急送往医院，目前的状况仍然不容乐观。\r\n尽管经过了长达9小时的紧急净化，但两名工作人员身上的辐射水平仍未降至安全标准。据报道，一名工人全身，另一名工人的下半身和双臂遭到污染。\r\n这起事件引发的担忧不仅仅是因为工作人员的健康问题。\r\n更深层次的，是对东京电力公司管理核废水方式的质疑。工作人员在清理多核素处理系统（ALPS）管道期间，并未得到足够的个人防护设备，这不得不让人怀疑其安全操作的完备性。\r\n在事故发生后，东电方面进行了调查，结果显示，事故是由于在清洗过程中产生的气体造成的压力过大，导致连接处突然断裂，核废水因此四溅。\r\n而在此事发生的同时，东京电力公司却宣布了新一轮的核废水排放计划。据悉，从11月2日开始，将有约7800吨的核污染水被排放入海。这无疑加剧了国际社会对福岛核事故处理的担忧。\r\n中国驻日本大使馆发言人也作出回应，表达了对受伤工作人员的同情，并强调了处理核废水时的风险性。\r\n他严肃指出，此类事件的再次发生，凸显了福岛核废水处理过程中存在的风险，也使得国际社会对排放核废水到海洋的行为感到忧虑。\r\n中国方面敦促日本政府正视和回应国际社会的关切，采取负责任的态度，确保相关处理过程透明，并接受国际监督。\r\n这一连串的事件，无疑对东电的公信力造成了打击，也使得国际社会对核安全问题的讨论更加激烈。\r\n人们期待相关部门能够吸取教训，真正做到安全第一，严格防范类似事故的再次发生。',8),(2,'冠中生态：公司目前未配备核废水处理相关设备，也不涉及相关技术和业务','每经AI快讯，有投资者在投资者互动平台提问：公司有核废水处理设备吗？\r\n冠中生态（300948.SZ）10月27日在投资者互动平台表示，公司目前未配备核废水处理相关设备，也不涉及相关技术和业务。\r\n(记者 蔡鼎)\r\n免责声明：本文内容与数据仅供参考，不构成投资建议，使用前核实。据此操作，风险自担。\r\n每日经济新闻',8);
/*!40000 ALTER TABLE `blog_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `parent_comment_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,8,'这个网站做到一半啦，试试评论功能','2023-10-29 06:36:00',NULL),(5,8,'前台发送评论功能测试','2023-11-29 23:19:57',NULL);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES ('BR','Brazil',170115000),('CA','Canada',1147000),('CN','China',1277558000),('DE','Germany',82164700),('FR','France',59225700),('GB','United Kingdom',59623400),('IN','India',1013662000),('RU','Russia',146934000),('US','United States',278357000);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authKey` varchar(255) NOT NULL,
  `accessToken` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `user_status` enum('on','off','forbidden') NOT NULL,
  `user_type` enum('normal','admin') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (8,'admin','admin','11111','11111','13519903151','on','admin'),(9,'emiya','123456','22222','22222','13119905198','on','admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-01 14:23:40
