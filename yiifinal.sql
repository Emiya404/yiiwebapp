-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: yiiwebapp
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
-- Table structure for table `bookmark`
--

DROP TABLE IF EXISTS `bookmark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookmark` (
  `mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `mark_name` varchar(255) NOT NULL,
  `mark_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`mark_id`),
  KEY `mark_user` (`mark_user`),
  CONSTRAINT `bookmark_ibfk_1` FOREIGN KEY (`mark_user`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookmark`
--

LOCK TABLES `bookmark` WRITE;
/*!40000 ALTER TABLE `bookmark` DISABLE KEYS */;
INSERT INTO `bookmark` VALUES (6,'admin的收藏夹',1);
/*!40000 ALTER TABLE `bookmark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (5,'新闻动态'),(6,'官方发声'),(7,'网友讨论'),(8,'特别通知');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_post` int(11) DEFAULT NULL,
  `comment_user` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (23,22,1,'加油加油！！！','2024-01-20 06:16:24');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `like_post` int(11) NOT NULL,
  `like_user` int(11) NOT NULL,
  `like_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`like_post`,`like_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (22,1,'2024-01-20 06:16:15');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `markrecord`
--

DROP TABLE IF EXISTS `markrecord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markrecord` (
  `mark_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`mark_id`,`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `markrecord`
--

LOCK TABLES `markrecord` WRITE;
/*!40000 ALTER TABLE `markrecord` DISABLE KEYS */;
INSERT INTO `markrecord` VALUES (6,22);
/*!40000 ALTER TABLE `markrecord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `send_uid` int(11) DEFAULT NULL,
  `recv_uid` int(11) DEFAULT NULL,
  `msg_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `msg_read` tinyint(1) DEFAULT NULL,
  `msg_text` text DEFAULT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (12,1,5,'2024-01-20 06:16:48',NULL,'请在新的一年继续加油');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pollution`
--

DROP TABLE IF EXISTS `pollution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pollution` (
  `pollution_id` int(11) NOT NULL AUTO_INCREMENT,
  `pollution_type` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `pollution_src` int(11) NOT NULL,
  `pollution_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `region_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pollution_id`),
  KEY `region_id` (`region_id`),
  CONSTRAINT `pollution_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=592 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pollution`
--

LOCK TABLES `pollution` WRITE;
/*!40000 ALTER TABLE `pollution` DISABLE KEYS */;
INSERT INTO `pollution` VALUES (425,'1',0,'2024-01-20 04:00:00',5),(426,'',11,'2024-01-21 06:30:00',6),(427,'',158,'2024-01-22 02:45:00',7),(428,'',85,'2024-01-23 00:15:00',8),(429,'1',1,'2024-01-24 08:30:00',9),(430,'',351,'2024-01-25 01:45:00',10),(431,'8',8,'2024-01-26 05:20:00',11),(432,'',1219,'2024-01-27 03:10:00',12),(433,'',366,'2024-01-28 06:50:00',13),(434,'',52,'2024-01-29 09:30:00',14),(435,'7',7,'2024-01-30 12:15:00',15),(436,'',21,'2024-01-31 01:30:00',16),(437,'',44,'2024-02-01 04:45:00',29),(438,'8',8,'2024-02-02 07:20:00',30),(439,'1',1,'2024-02-03 10:00:00',31),(440,'',11,'2024-02-04 01:30:00',32),(441,'',21,'2024-02-05 14:15:00',33),(443,'1',1,'2024-02-07 06:10:00',35),(444,'2',2,'2024-02-08 09:30:00',36),(445,'7',7,'2024-02-09 12:00:00',37),(446,'',199,'2024-02-10 02:30:00',38),(447,'',283,'2024-02-11 04:45:00',40),(448,'',0,'2024-02-12 07:20:00',41),(449,'',12,'2024-02-13 10:00:00',42),(450,'',11,'2024-02-14 01:30:00',43),(451,'',35,'2024-02-15 14:15:00',44),(452,'',22,'2024-02-16 15:45:00',45),(453,'',59,'2024-02-17 06:10:00',46),(454,'',22,'2024-02-18 09:30:00',47),(455,'',195,'2024-02-19 12:00:00',48),(456,'',304,'2024-02-20 02:30:00',49),(457,'1',1,'2024-02-21 04:45:00',50),(458,'',0,'2024-02-22 07:20:00',51),(459,'',50,'2024-02-23 10:00:00',52),(460,'',61,'2024-02-24 01:30:00',53),(461,'',216,'2024-02-25 14:15:00',54),(462,'',21,'2024-02-26 15:45:00',55),(463,'',14,'2024-02-27 06:10:00',56),(464,'2',2,'2024-02-28 09:30:00',57),(465,'',19,'2024-02-29 12:00:00',58),(466,'',30,'2024-03-01 02:30:00',59),(467,'3',3,'2024-03-02 04:45:00',60),(468,'',231,'2024-03-03 07:20:00',61),(469,'',2555,'2024-03-04 10:00:00',62),(470,'',12,'2024-03-05 01:30:00',63),(471,'1',1,'2024-03-06 14:15:00',64),(472,'',11,'2024-03-07 15:45:00',65),(473,'',3305,'2024-03-08 06:10:00',66),(474,'',18,'2024-03-09 09:30:00',67),(475,'',305,'2024-03-10 12:00:00',68),(476,'',0,'2024-03-11 02:30:00',69),(477,'',40,'2024-03-12 04:45:00',70),(478,'4',4,'2024-03-13 07:20:00',71),(479,'',0,'2024-03-14 10:00:00',72),(480,'2',2,'2024-03-15 01:30:00',73),(481,'6',6,'2024-03-16 14:15:00',74),(482,'',15,'2024-03-17 15:45:00',75),(483,'',226,'2024-03-18 06:10:00',76),(484,'',132,'2024-03-19 09:30:00',77),(485,'',12,'2024-03-20 12:00:00',78),(486,'',1430,'2024-03-21 02:30:00',189),(487,'',695,'2024-03-22 04:45:00',80),(488,'',337,'2024-03-23 07:20:00',81),(489,'',84,'2024-03-24 10:00:00',82),(490,'',204,'2024-03-25 01:30:00',83),(491,'',201,'2024-03-26 14:15:00',84),(492,'',2036,'2024-03-27 15:45:00',85),(493,'',13,'2024-03-28 06:10:00',86),(494,'',5390,'2024-03-29 09:30:00',87),(495,'',27,'2024-03-30 12:00:00',88),(496,'',129,'2024-03-31 02:30:00',89),(497,'',32,'2024-04-01 04:45:00',90),(498,'',0,'2024-04-02 07:20:00',91),(499,'',986,'2024-04-03 10:00:00',92),(500,'',117,'2024-04-04 01:30:00',93),(501,'4',4,'2024-04-05 14:15:00',94),(502,'6',6,'2024-04-06 15:45:00',95),(503,'',23,'2024-04-07 06:10:00',96),(504,'',39,'2024-04-08 09:30:00',97),(505,'1',1,'2024-04-09 12:00:00',98),(506,'',0,'2024-04-10 02:30:00',99),(507,'',77,'2024-04-11 04:45:00',100),(508,'',35,'2024-04-12 07:20:00',101),(509,'',52,'2024-04-13 10:00:00',102),(510,'9',9,'2024-04-14 01:30:00',103),(511,'8',8,'2024-04-15 14:15:00',104),(512,'5',5,'2024-04-16 15:45:00',105),(513,'',218,'2024-04-17 06:10:00',106),(514,'1',1,'2024-04-18 09:30:00',107),(515,'9',9,'2024-04-19 12:00:00',108),(516,'7',7,'2024-04-20 02:30:00',109),(517,'',1004,'2024-04-21 04:45:00',112),(518,'5',5,'2024-04-22 07:20:00',113),(519,'5',5,'2024-04-23 10:00:00',114),(520,'3',3,'2024-04-24 01:30:00',115),(521,'',91,'2024-04-25 14:15:00',116),(522,'10',10,'2024-04-26 15:45:00',117),(523,'',35,'2024-04-27 06:10:00',118),(524,'',11,'2024-04-28 09:30:00',119),(525,'',15,'2024-04-29 12:00:00',120),(526,'',770,'2024-04-30 02:30:00',121),(527,'',138,'2024-05-01 04:45:00',122),(528,'6',6,'2024-05-02 07:20:00',123),(529,'5',5,'2024-05-03 10:00:00',124),(530,'',206,'2024-05-04 01:30:00',125),(531,'',413,'2024-05-05 14:15:00',126),(532,'',53,'2024-05-06 15:45:00',127),(533,'',174,'2024-05-07 06:10:00',128),(534,'',27,'2024-05-08 09:30:00',129),(535,'8',8,'2024-05-09 12:00:00',130),(536,'',17,'2024-05-10 02:30:00',131),(537,'',153,'2024-05-11 04:45:00',132),(538,'',189,'2024-05-12 07:20:00',133),(539,'',438,'2024-05-13 10:00:00',134),(540,'',223,'2024-05-14 01:30:00',135),(541,'',126,'2024-05-15 14:15:00',136),(542,'',158,'2024-05-16 15:45:00',137),(543,'',1476,'2024-05-17 06:10:00',138),(544,'5',5,'2024-05-18 09:30:00',139),(545,'',0,'2024-05-19 12:00:00',140),(546,'',0,'2024-05-20 02:30:00',141),(547,'',0,'2024-05-21 04:45:00',142),(548,'',12,'2024-05-22 07:20:00',143),(549,'',38,'2024-05-23 10:00:00',144),(550,'',0,'2024-05-24 01:30:00',145),(551,'1',1,'2024-05-25 14:15:00',146),(552,'',217,'2024-05-26 15:45:00',147),(553,'',86,'2024-05-27 06:10:00',148),(554,'',46,'2024-05-28 09:30:00',149),(555,'',0,'2024-05-29 12:00:00',150),(556,'',354,'2024-05-30 02:30:00',151),(557,'',1374,'2024-05-31 04:45:00',152),(558,'',48,'2024-06-01 07:20:00',153),(559,'',0,'2024-06-02 10:00:00',154),(560,'1',1,'2024-06-03 01:30:00',155),(561,'',0,'2024-06-04 14:15:00',156),(562,'',65,'2024-06-05 15:45:00',157),(563,'3',3,'2024-06-06 06:10:00',158),(564,'',0,'2024-06-07 09:30:00',159),(565,'',444,'2024-06-08 12:00:00',160),(566,'',522,'2024-06-09 02:30:00',161),(567,'',59,'2024-06-10 04:45:00',162),(568,'',426,'2024-06-11 07:20:00',163),(569,'5',5,'2024-06-12 10:00:00',164),(570,'',22,'2024-06-13 01:30:00',165),(571,'',312,'2024-06-14 14:15:00',166),(572,'',0,'2024-06-15 15:45:00',167),(573,'3',3,'2024-06-16 06:10:00',168),(574,'',0,'2024-06-17 09:30:00',169),(575,'',21,'2024-06-18 12:00:00',170),(576,'',43,'2024-06-19 02:30:00',171),(577,'',0,'2024-06-20 04:45:00',172),(578,'',729,'2024-06-21 07:20:00',173),(579,'',0,'2024-06-22 10:00:00',174),(580,'',136,'2024-06-23 01:30:00',175),(581,'',239,'2024-06-24 14:15:00',176),(582,'',2258,'2024-06-25 15:45:00',177),(583,'',4624,'2024-06-26 06:10:00',188),(584,'',40,'2024-06-27 09:30:00',179),(585,'',37,'2024-06-28 12:00:00',180),(586,'',0,'2024-06-29 02:30:00',181),(587,'',217,'2024-01-20 07:32:47',183),(588,'',226,'2024-01-20 07:32:47',NULL),(589,'3',3,'2024-01-20 07:32:47',NULL),(590,'',0,'2024-01-20 07:32:47',NULL),(591,'',21,'2024-01-20 07:32:47',NULL);
/*!40000 ALTER TABLE `pollution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_author` int(11) DEFAULT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_type` int(11) DEFAULT NULL,
  `post_text` text DEFAULT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (20,1,'日本核污染水处置应科学、公开、透明、安全',7,'日方应立即停止核污染水排海各项准备，并同周边邻国、国际机构开展充分、有意义的协商，包括寻找排海以外的最佳处置方案，确保核污染水得到科学、公开、透明、安全的处置，并接受严格国际监督\r\n\r\n　　2021年4月13日，日本政府单方面宣布向海洋排放福岛核污染水的决定。两年来，无论是日本国内民众还是国际社会，都对日本政府此举可能带来的影响表示强烈担忧。日本政府出于一己之私，置全球公共利益于不顾，视国际法治为无物，至今仍在顽固推进核污染水排海准备工作，且拒绝正面回应国际社会的关切，在错误道路上越走越远。\r\n\r\n　　2011年3月11日，日本福岛第一核电站发生最高级别核事故，导致三座核反应堆堆芯熔化损毁，放射性物质大量释放。福岛核事故给日本人民带来沉重的灾难，中国等周边国家对事故的发生深表同情，并向日本政府和人民提供了及时的人道主义援助。10多年后，日本政府无视国际社会呼声，选择向人类赖以生存的海洋排放核污染水，将风险转嫁给全人类，这种做法令人心寒。\r\n\r\n　　日本核污染水曾与熔化的堆芯充分接触，含有60多种放射性核素，包括碳—14、碘—129等半衰期极长的核素。日本采用稀释的办法降低核污染水中放射性物质浓度，却不对所有放射性核素进行总量控制。日本声称经过处理的核污染水安全无害，却又不愿应太平洋岛国要求将其排向日本内河或用作农业、工业用水，日方做法无异于自欺欺人。\r\n\r\n　　日本核污染水排海计划是将本国私利凌驾于国际公共利益之上。核污染水排海没有先例。日方理应与各利益攸关方及相关国际组织进行充分协商，确定最安全的处置方案。然而，日本政府单方面宣布将核污染水排海，刻意限制国际原子能机构技术工作组的授权，只允许其评估日方选择的方案，进而宣扬国际原子能机构对日方的方案表示“认可”。很多国家要求日方考虑长期储存核污染水等其他方案，日方出于眼前的经济成本考虑充耳不闻，依然我行我素，极其不负责任，也给其国家形象造成长期负面影响。\r\n\r\n　　日方已囤积130多万吨核污染水，预计排放时间长达30年，整个过程的影响具有极大不确定性。核污染水中含有的很多放射性核素尚无有效处理技术，部分半衰期极长的核素可能随洋流扩散并形成生物富集效应，额外增加环境中的放射性核素总量。日方“多核素去除设备”的可靠性及相关工程的长期有效性问题仍然存疑。日方今年3月发布的数据显示，经该设备处理后的核污染水仍有近70%不达标。核污染水一旦排海，其中的放射性核素将在10年后蔓延至全球海域，影响全球海洋环境及海洋生物。\r\n\r\n　　核污染水排海具有跨国界影响，根据一般国际法和《联合国海洋法公约》等规定，日方有义务采取一切措施避免环境污染，有义务与可能受影响的国家充分协商，有义务评估和监测环境影响，有义务采取预防措施确保危险最小化，有义务保障信息透明，有义务开展国际合作。日方试图找各种借口推卸责任、逃避国际义务，只将排海决定和准备进展向有关国家单方面通报，迄今未全面回应中国和俄罗斯专业技术部门从科学角度对日方排海方案提出的诸多疑问，无法取信于国际社会。\r\n\r\n　　在核污染水处置这一关乎重大国际公共利益的问题上，日方所作所为与国际社会期待相去甚远。日方应立即停止核污染水排海各项准备，并同周边邻国、国际机构开展充分、有意义的协商，包括寻找排海以外的最佳处置方案，确保核污染水得到科学、公开、透明、安全的处置，并接受严格国际监督。','2024-01-20 06:12:21','frontendassets/img/blogimage/blog0.jpg'),(21,5,'第3轮排海将启动！5人意外接触核污水',5,'昨天（10月25日）11时10分左右\r\n\r\n在处理福岛第一核电站\r\n\r\n核污染水放射性物质的过程中\r\n\r\n由于水管脱落，核污染水溅出\r\n\r\n5名工作人员接触到了\r\n\r\n含放射性物质的核污染水\r\n\r\n\r\n福岛核电站工作人员介绍情况\r\n\r\n5人当时都佩戴口罩\r\n\r\n和穿着全身防护服\r\n\r\n但其中2人身体表面的辐射量\r\n\r\n一直没有降低到安全标准值以下\r\n\r\n不得不持续接受擦拭清除处理\r\n\r\n据该发布会消息\r\n\r\n溅出水量约为100毫升\r\n\r\n当地时间8月24日\r\n\r\n福岛第一核电站的核污染水排放至太平洋\r\n\r\n据日本放送协会（NHK）报道，日本东京电力公司称，福岛核电站第二批核污染水排放从10月5日开始，已于10月23日排放完毕，共排放约7810吨核污染水。截至目前，已有超1.5万吨核污染水流入海洋。\r\n\r\n报道称，在排放过程中，输送核污染水的过滤器附着了类似锈斑的物体，导致水泵压力一度降低，在对过滤器进行清理后恢复原状，未对排放造成影响。','2024-01-20 06:13:56','frontendassets/img/blogimage/blog1.jpg'),(22,1,'建站伊始',8,'终于换新了自己的博客建站，在新的时光里，我会加油更新自己的知识，也会不断翻新之前存在错误的博客。\r\n站里现有的博客文章都是之前自己原创的，借鉴的时候请拜托写上引用，不排除有一些结论是匆匆得出的暴论，但是那又跟小白有什么关系呢（笑）。','2024-01-20 06:16:07','frontendassets/img/blogimage/blog2.jpg');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_code` varchar(10) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (5,'AF','Afghanistan'),(6,'AL','Albania'),(7,'DZ','Algeria'),(8,'AO','Angola'),(9,'AG','Antigua and Barbuda'),(10,'AR','Argentina'),(11,'AM','Armenia'),(12,'AU','Australia'),(13,'AT','Austria'),(14,'AZ','Azerbaijan'),(15,'BS','Bahamas'),(16,'BH','Bahrain'),(17,'BD','Bangladesh'),(18,'BB','Barbados'),(19,'BY','Belarus'),(20,'BE','Belgium'),(21,'BZ','Belize'),(22,'BJ','Benin'),(23,'BT','Bhutan'),(24,'BO','Bolivia'),(25,'BA','Bosnia and Herzegovina'),(26,'BW','Botswana'),(28,'BN','Brunei'),(29,'BG','Bulgaria'),(30,'BF','Burkina Faso'),(31,'BI','Burundi'),(32,'KH','Cambodia'),(33,'CM','Cameroon'),(35,'CV','Cape Verde'),(36,'CF','Central African Republic'),(37,'TD','Chad'),(38,'CL','Chile'),(40,'CO','Colombia'),(41,'KM','Comoros'),(42,'CD','Democratic Republic of the Congo'),(43,'CG','Republic of the Congo'),(44,'CR','Costa Rica'),(45,'CI','Ivory Coast'),(46,'HR','Croatia'),(47,'CY','Cyprus'),(48,'CZ','Czech Republic'),(49,'DK','Denmark'),(50,'DJ','Djibouti'),(51,'DM','Dominica'),(52,'DO','Dominican Republic'),(53,'EC','Ecuador'),(54,'EG','Egypt'),(55,'SV','El Salvador'),(56,'GQ','Equatorial Guinea'),(57,'ER','Eritrea'),(58,'EE','Estonia'),(59,'ET','Ethiopia'),(60,'FJ','Fiji'),(61,'FI','Finland'),(62,'FR','France'),(63,'GA','Gabon'),(64,'GM','Gambia'),(65,'GE','Georgia'),(66,'DE','Germany'),(67,'GH','Ghana'),(68,'GR','Greece'),(69,'GD','Grenada'),(70,'GT','Guatemala'),(71,'GN','Guinea'),(72,'GW','Guinea-Bissau'),(73,'GY','Guyana'),(74,'HT','Haiti'),(75,'HN','Honduras'),(76,'HK','Hong Kong'),(77,'HU','Hungary'),(78,'IS','Iceland'),(80,'ID','Indonesia'),(81,'IR','Iran'),(82,'IQ','Iraq'),(83,'IE','Ireland'),(84,'IL','Israel'),(85,'IT','Italy'),(86,'JM','Jamaica'),(87,'JP','Japan'),(88,'JO','Jordan'),(89,'KZ','Kazakhstan'),(90,'KE','Kenya'),(91,'KI','Kiribati'),(92,'KR','South Korea'),(93,'KW','Kuwait'),(94,'KG','Kyrgyzstan'),(95,'LA','Laos'),(96,'LV','Latvia'),(97,'LB','Lebanon'),(98,'LS','Lesotho'),(99,'LR','Liberia'),(100,'LY','Libya'),(101,'LT','Lithuania'),(102,'LU','Luxembourg'),(103,'MK','North Macedonia'),(104,'MG','Madagascar'),(105,'MW','Malawi'),(106,'MY','Malaysia'),(107,'MV','Maldives'),(108,'ML','Mali'),(109,'MT','Malta'),(110,'MR','Mauritania'),(111,'MU','Mauritius'),(112,'MX','Mexico'),(113,'MD','Moldova'),(114,'MN','Mongolia'),(115,'ME','Montenegro'),(116,'MA','Morocco'),(117,'MZ','Mozambique'),(118,'MM','Myanmar'),(119,'NA','Namibia'),(120,'NP','Nepal'),(121,'NL','Netherlands'),(122,'NZ','New Zealand'),(123,'NI','Nicaragua'),(124,'NE','Niger'),(125,'NG','Nigeria'),(126,'NO','Norway'),(127,'OM','Oman'),(128,'PK','Pakistan'),(129,'PA','Panama'),(130,'PG','Papua New Guinea'),(131,'PY','Paraguay'),(132,'PE','Peru'),(133,'PH','Philippines'),(134,'PL','Poland'),(135,'PT','Portugal'),(136,'QA','Qatar'),(137,'RO','Romania'),(138,'RU','Russia'),(139,'RW','Rwanda'),(140,'WS','Samoa'),(141,'ST','Sao Tome and Principe'),(142,'SA','Saudi Arabia'),(143,'SN','Senegal'),(144,'RS','Serbia'),(145,'SC','Seychelles'),(146,'SL','Sierra Leone'),(147,'SG','Singapore'),(148,'SK','Slovakia'),(149,'SI','Slovenia'),(150,'SB','Solomon Islands'),(151,'ZA','South Africa'),(152,'ES','Spain'),(153,'LK','Sri Lanka'),(154,'KN','Saint Kitts and Nevis'),(155,'LC','Saint Lucia'),(156,'VC','Saint Vincent and the Grenadines'),(157,'SD','Sudan'),(158,'SR','Suriname'),(159,'SZ','Eswatini'),(160,'SE','Sweden'),(161,'CH','Switzerland'),(162,'SY','Syria'),(163,'TW','Taiwan'),(164,'TJ','Tajikistan'),(165,'TZ','Tanzania'),(166,'TH','Thailand'),(167,'TL','Timor-Leste'),(168,'TG','Togo'),(169,'TO','Tonga'),(170,'TT','Trinidad and Tobago'),(171,'TN','Tunisia'),(172,'TR','Turkey'),(173,'TM','Turkmenistan'),(174,'UG','Uganda'),(175,'UA','Ukraine'),(176,'AE','United Arab Emirates'),(177,'GB','United Kingdom'),(179,'UY','Uruguay'),(180,'UZ','Uzbekistan'),(181,'VU','Vanuatu'),(182,'VE','Venezuela'),(183,'VN','Vietnam'),(184,'YE','Yemen'),(185,'ZM','Zambia'),(186,'ZW','Zimbabwe'),(188,'US','United States'),(189,'IN','India'),(190,'BR','Brazil');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suggestion`
--

DROP TABLE IF EXISTS `suggestion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suggestion` (
  `suggestion_id` int(11) NOT NULL AUTO_INCREMENT,
  `suggestion_user` int(11) DEFAULT NULL,
  `suggestion_text` text DEFAULT NULL,
  `suggestion_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`suggestion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suggestion`
--

LOCK TABLES `suggestion` WRITE;
/*!40000 ALTER TABLE `suggestion` DISABLE KEYS */;
/*!40000 ALTER TABLE `suggestion` ENABLE KEYS */;
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
  `user_type` enum('admin','guest') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin','authKey1','accessToken1','admin'),(5,'guest1','guest1','AUTH1','ACCE1','guest');
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

-- Dump completed on 2024-01-20 21:18:10
