-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: lesson_8
-- ------------------------------------------------------
-- Server version	5.7.20-log

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
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `description_short` text,
  `description_long` text,
  `price` int(11) DEFAULT NULL,
  `img_adress` text,
  PRIMARY KEY (`goods_id`),
  KEY `category_idx` (`category_id`),
  CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `goods_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (32,2,'Mystic 2016 Diva Long John Женский гидрокостюм','Летний гидрокостюм Diva 3/2 D/L Long John с открытой спиной.','Экстра лёгкий, летний гидрокостюм. Предназначен для летнего сезона и комфортного пребывания в воде, t 22+ C. Практичный гидрокостюм сделан из неопрена M-Flex neoprene (100%) не сковывает движений и обеспечивает дополнительную термозащиту. Идеален в сочетании с лайкрой.',9500,'img/4b141de8ac6470be9348a358eb0d08b8.jpg'),(33,2,'Mystic Legend 5/3 гидрокостюм 2017','Теплый гидрокостюм для осеннего периода.','Обеспечивает весьма комфортное пребывание в воде от t +5 до +10 С.</p>',10999,'img/521c9d8ede70ac8bf853f9ea1282022d.jpg'),(34,3,'Горнолыжные ботинки Atomic Atomic Backland','Bacland — облегченные горнолыжные ботинки для бэккантри с термоформуемым внутренником.','Благодаря шарниру со сниженным коэффициентом трения Frictionless Pivot, системе языка Quick Click и механизму Free/Lock 2.0, обеспечивающему ход голенища в 74 градуса, в ботинках можно естественно двигаться при ходьбе. Применение технологии термоформовки Memory Fit, обеспечивает великолепный комфорт. Система шнуровки Cross Lace обхватывает стопу, а подошва с прогибом облегчает восхождение.',7200,'img/mount_boots_1.jpg'),(35,3,'Горнолыжные ботинки Atomic Atomic Hawx 1.0 80','Горнолыжные ботинки Hawx хорошо подходят для лыжника среднего уровня или начинающего, стремящегося к прогрессу — или для тех, кто просто выбирает не строгие ботинки.','Колодка средней ширины и уникальная зона гибкости i-Flex в носке, улучшающей контроль и баланс. На эту модель можно установить накладки на подошву Walk to Ride (WTR) для упрощения ходьбы. Точная посадка, отличная чувствительность и прекрасные рабочие качества.',8999,'img/mount_boots_2.jpg'),(36,3,'Горнолыжные ботинки Atomic Atomic Hawx 1.0 90 женские','Женские горнолыжные ботинки Hawx 1.0 90 — это четырёхклипсовые ботинки-бестселлер, идеально сбалансированные по соотношению цена/качество и предназначенные для широкого круга лыжниц.','Для экспертов, продвинутых и продолжающих. Оптимизированные передача усилия и посадка делают их лучшими. Комфортная колодка средней ширины и уникальная зона гибкости i-Flex в носке, которая позволяет передней части стопы лыжника естественно гнуться в повороте, предоставляя лыжнику лучший баланс, больший контроль и более простое катание. Модель совместима с накладками на подошву Walk to Ride (WTR) для упрощения ходьбы. Укомплектованы внутренним ботинком Sport.',8400,'img/mount_boots_3.jpg'),(37,4,'Горнолыжная маска Giro Giro Focus белый','Горнолыжная маска Focus с классическим функциональным дизайном и цилиндрическими линзами.','Горнолыжная маска Focus с классическим функциональным дизайном и цилиндрическими линзами удобно сидит и подходит ко всем шлемам Giro. Цилиндрические линзы получены термоформованием. Мягкая двухслойная PU пена с полиэстеровым покрытием создает микроклимат внутри маски, препятствуя запотеванию, что обеспечивает хорошую видимость и создает невероятный комфорт при катании.',5999,'img/65938058519da3a169b2af95980f80d3.jpg'),(38,4,'Маска Julbo 218 3 14 Revolution Zebra','Новая Фотохромная маска Julbo. Витринный образец, без чехла.','Julbo сделали всё возможное, чтобы фотохромные технологии были доступны всем.  Всего за несколько секунд маска меняет степень затемнения со 2-й на 4-ю. Зотолой цвет линзы дает отличную восприимчивость света и защиту. Быстро приспосабливается при изменениях освещения свет-тень.',4300,'img/dc7bb727ca8709a1f7072c9344b9341c.jpg'),(39,4,'Julbo Bang Next Snow Tiger','Новая Фотохромная маска Julbo. Витринный образец, без чехла.','Julbo сделали всё возможное, чтобы фотохромные технологии были доступны всем. Так и родилась маска Bang Next. Маска подойдёт большинству типов лица, совместима со шлемом, цилиндрическая линза, удобный настраиваемый ремешок. Snow Tiger — антибликовая и фотохромная линза. Всего за несколько секунд маска меняет степень затемнения со 2-й на 3-ю. Антиблик частично отсекает блики от поверхности, позволяя отличить снег ото льда.',5000,'img/4c244415133f32570c0bb24aed310850.jpg'),(40,1,'O’Brien Fremont 2017 Вейкборд','Вейкборд Fremont от O‘Brien взял самое лучшее от досок прошлого сезона!','Универсальная флексовая доска Fremont O‘brien для лебедки и катера, гладкая и прочная, подходит как профессионалам, так и начинающим райдерам. Вейкборд Fremont от O‘Brien взял самое лучшее от досок прошлого сезона: суперпрочный гладкий скользняк, съемные кили, благодаря которым можно регулировать вес и устойчивость доски, защита от ударов и сколов, возможность кататься как в парке, так и за катером..\r\n\r\nКлассическая технология Flex Technology обеспечивает агрессивную зарезку, мощный щелчок и мягкое приводнение.\r\n\r\nВейкборд Fremont - отличный выбор для тех, кто ищет надежную и универсальную доску.',17500,'img/8c6e1123b1fa3eaa431767fe4a2fb5a3.jpg'),(41,1,'Вейкборд O’Brien System 2015','Доска суперлегкая и маневренная сделана специально для вейкбордистов.','Вейкборд MODE оснащен самыми передовыми технологиями, которые когда-либо использовались в вейкборде. Действительно широкие доски может быть трудно поставить на кант, но не с V-Tech - технологией. Переменная линия уменьшает сопротивление при постановке доски на кант. V форма также смягчает посадку, вытесняя воду при ударе. MODE представляет собой интересное решение для обеспечения полета в воздухе и мягкого приземления.',15999,'img/wakeboard2.jpg'),(42,4,'Brenda DIGI Black/Blue Revo','Модель без оправы. Уплотнитель из поролона с флисовой проклейкой из антиалергенного материала крепится непосредственно к линзе.','Линза сферическая двойная «double lens», цвет желтый с покрытием Revo с голубым отливом, система противозапотевания «anti fog system». Линзы выполнены из материала поликарбонат «policarbon», 100 % исключают вредное UVA, UVB, UVC излучение, в левом верхнем углу рисунок \"снежинка\"\" со стразами категория фильтра 2. Вес маски: 60 г.\"',3800,'img/480478c2b8124bbe0c73c37f12bdc1bd.jpg'),(43,2,'Mission FZ LS 32','Мужской гидрокостюм с короткими штанинами и длинными рукавами','Mission FZ с молнией на груди был создан для неограниченной свободы движения c превосходной теплозащитой.\r\nПредназначен для использования во всех водных видах спорта, он построен с использованием неопрена Apex-Plus и дополнен пакетом удобных функций, такими как ультра-теплой FireLine изоляции и проклеенными P-Skin швами.\r\nMission обеспечивает уникальное сочетание тепла и гибкости.',13990,'img/60cf5744095dc0e2b94f4860b364cbbb.jpg'),(44,2,'Medo 2,5','Женский гидрокостюм с короткими рукавами и штанинами для жаркой погоды','Цельный гидрокостюм для занятий водными видами спорта и погружений в тропических водах.\r\nОбновленный фасон, привлекательный дизайн.\r\nМонокостюм без шлема, с короткими рукавами и укороченными штанинами до середины бедра.\r\nИзготовлен из неопрена толщиной 2,5 мм с двухсторонним нейлоновым покрытием, идеально подходит для снорклинга, плавания и дайвинга.\r\nНа рукавах и шортах - водонепроницаемые обтюраторы из неопрена с односторонней отделкой.\r\nМолния на спине со встроенной изолирующей подкладкой. \r\nРегулируемый воротник с застежкой-«липучкой».',4000,'img/fb5ce6371fce9bc0d46e4b18aed7b1ca.jpg');
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods_categories`
--

DROP TABLE IF EXISTS `goods_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods_categories` (
  `id` int(11) NOT NULL,
  `category_title` text,
  `description` text,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods_categories`
--

LOCK TABLES `goods_categories` WRITE;
/*!40000 ALTER TABLE `goods_categories` DISABLE KEYS */;
INSERT INTO `goods_categories` VALUES (1,'wakeboards','Вейкборды для любителей активного отдыха',0),(2,'hydrosuits','Прочные и практичные гидрокостюмы',0),(3,'mountboots','Горнолыжные ботинки',0),(4,'masks','Маски с широким спектром характеристик',0);
/*!40000 ALTER TABLE `goods_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(125) DEFAULT NULL,
  `id_good` int(11) NOT NULL,
  `review_ text` text,
  `approved` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_review`),
  KEY `goods_id_idx` (`id_good`),
  CONSTRAINT `goods_id` FOREIGN KEY (`id_good`) REFERENCES `goods` (`goods_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (123,'Vasya',32,'С другой стороны рамки и место обучения кадров в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям. Значимость этих проблем настолько очевидна, что рамки и место обучения кадров представляет собой интересный эксперимент проверки существенных финансовых и административных условий.',0),(124,'Мистер Юзер',32,'Равным образом укрепление и развитие структуры в значительной степени обуславливает создание модели развития.',0),(125,'1300',33,'Значимость этих проблем настолько очевидна, что укрепление и развитие структуры требуют определения и уточнения систем массового участия. Повседневная практика показывает, что начало повседневной работы по формированию позиции в значительной степени обуславливает создание новых предложений.',0);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text,
  `password` text,
  `user_name` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user2','63a9f0ea7bb98050796b649e85481845','Vasya'),(3,'new_user','faf99f6a84021032a6c39ec10bdc4fed','Pasha'),(4,'admin','d8578edf8458ce06fbc5bb76a58c5ca4','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-07 15:02:38
