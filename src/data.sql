-- MySQL dump 10.16  Distrib 10.1.10-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: akademija
-- ------------------------------------------------------
-- Server version	10.1.10-MariaDB-1~jessie

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20171108132201'),('20171108132338'),('20171108142758'),('20171126194926'),('20171126204735'),('20171201120945'),('20171211160329'),('20171211163416'),('20171211210953'),('20171212163329'),('20171212163926'),('20171214110034');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `width` double NOT NULL,
  `height` double NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E52FFDEE4584665A` (`product_id`),
  CONSTRAINT `FK_E52FFDEE4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'asdfa','ads@s.la','asdf','sdf',2,3,1,1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `main_picture` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `base_price` decimal(10,0) NOT NULL,
  `short_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `long_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D34A04AD5E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Boulderingo sienos','pic02.jpg',200,'Profesionalios laipiojimo sporto sienos','Boulderingas - vis labiau populiarėjantis sportas 2020 įtraukta į Olimpines žaidynes. Tokio tipo sienos dažniausiai nebūna aukštesnės nei 4.5 m. Saugumą užtikrina 300 mm storio čiužiniai. Laipiojant boulderingo salėje nereikia naudoti virvių ar saugos įrangos. Laipioti galima individualiai be jokio partnerio. Pagrindinis dėmesys skiriamas trumpiems techniniams gebėjimams ir jėgai. Moderni laipiojimo salė tai įvairiais kampais pasvirusi medinio karkaso siena su daugybe įvorių kybiams (laipiojimo akmenims).'),(2,'Aukštuminio laipiojimo sienos','pic03.jpg',230,'Profesionalios laipiojimo sporto sienos nuo 4.5 m','Aukštuminis laipiojimas - vis labiau populiarėjantis sportas 2020 įtraukta į Olimpines žaidynes. Tai didžiausią įspūdį paliekanti laipiojimo sporto rūšis, nes tenka lipti į kelesdešimt metrų aukštį. Saugumą užtirina sertifikuota saugojimo įranga. Tokios sienos dažniausiai būna nuo 6 iki 20 m aukščio. Įvairaus reljefo aukšta siena užtirkina, kad laipiotojui lipimas į viršų tikrai nepabos. Aušta laipiojimo siena yra puikus analogas bouleringo sienai, jei turite aukštas patalpas.'),(3,'Laisvalaikio sienelės mokykloms','pic04.jpg',220,'Alternatyvi sporto rūšis pamokoms','Laipiojimo siena jūsų mokykloje ar laisvalaikio centre yra puikus būdas įtraukti vaikus į sportą, taip padedant jiems ugdyti koordinaciją, bendradarbiavimo gebėjimus ir pasitikėjimą savimi. Naudojant nešiojimus čiužinius laipiojimo sienelė gali užimti itin mažai grindų ploto jūsų sporto salėje, tad galėsite naudoti sporto salę tiek tradiciniams sporto užsiėmimams tiek laipiojimo pamokoms.'),(4,'Namų sienelės','pic05.jpg',100,'Pramoginės sienelės namuose','Laipiojimo sienelės namuose tampa vis populiaresnės. Jei gyvenate toli nuo laipiojimo salės ar kitų aktyvių pramogų - sienelė namuose kaip tik jums. Toks įrenginys namuose puikiai tinka vaikų motorikos įgūdžiams lavinti. Sienelė gali būti įrengiame garaže, vaiko kambaryje ar verandoje. Dažniausiai naudojami papildomi čiužiniai saugumui užtikrinti.'),(5,'Lauko sienelės','pic06.jpg',300,'Atrakcija viešosiose erdvėse','Jei turite puikią vietą lauke, kur norėtumėte suburti daugiau žmonių, lauko sienelė puikiai padės sudominti visus parko lankytojus. Laipiojimas moko visapusiško kūno judėjimo bei padeda lavinti problemų sprendimo įgūdžius. Toks objektas parke šalia namų gali tapti puikiu traukos centru tiems kurie nori smagiai pasportuoti bei lavinti jėgą');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-14 12:12:12
