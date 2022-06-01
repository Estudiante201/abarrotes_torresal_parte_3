-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: abarrotes
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCateg` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Arroz'),(2,'Aceite'),(3,'Azúcar y Endulzantes'),(4,'Menestras'),(5,'Conservas'),(6,'Fideos, Pastas y Salsas'),(7,'Salsas, Cremas y Condimentos'),(8,'Comidas Instantáneas'),(9,'Chocolatería'),(10,'Snacks y Piqueos');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `celular` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Bianca','Dulce Encanto','45643546',934456464,'biancadulceencanto@gmail.com'),(10,'Mary','Choe B.','43475645',935345345,'marychoeb@gmail.com'),(11,'Jennifer','McKinney A.','54440662',920838367,'jennifermckinneya@gmail.com');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle`
--

DROP TABLE IF EXISTS `detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle` (
  `idDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idFactura` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioVenta` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idDetalle`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle`
--

LOCK TABLES `detalle` WRITE;
/*!40000 ALTER TABLE `detalle` DISABLE KEYS */;
INSERT INTO `detalle` VALUES (1,1,73,2,8.10),(2,2,2,1,21.30),(3,2,3,2,18.90),(4,2,4,1,22.50),(5,3,44,1,4.70),(6,3,45,2,4.50),(7,3,48,1,1.50),(8,3,43,3,5.90),(9,3,73,1,8.10),(10,3,76,2,5.00);
/*!40000 ALTER TABLE `detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCompra` date NOT NULL,
  `montoTotal` decimal(18,2) NOT NULL,
  `tipoPago` varchar(20) NOT NULL,
  `idCliente` int(11) NOT NULL,
  PRIMARY KEY (`idFactura`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (1,'2022-05-29',16.20,'VISA',1),(2,'2022-05-31',81.60,'MASTERCARD',10),(3,'2022-05-31',51.00,'VISA',11);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProd` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'PAISANA','Arroz Extra PAISANA Bolsa 5Kg',15.80,24,1),(2,'COSTEÑO','Arroz Extra COSTEÑO Bolsa 5Kg',21.30,9,1),(3,'ROMPE OLLA','Arroz Superior Añejado ROMPE OLLA Bolsa 5Kg',18.90,6,1),(4,'FARAON','Arroz Extra Añejo FARAON Naranja Bolsa 5kg',22.50,12,1),(5,'BELL\'S','Arroz Extra BELL\'S Bolsa 5Kg',15.90,36,1),(6,'VALLENORTE','Arroz Extra VALLENORTE Gran Reserva Bolsa 5Kg',21.20,30,1),(7,'GRAN CHALAN','Arroz Extra GRAN CHALAN Bolsa 5Kg',17.50,20,1),(8,'SIGLO DE ORO','Arroz Extra SIGLO DE ORO Bolsa 1Kg',1.90,25,1),(9,'SCOTTI','Arroz Orgánico SCOTTI Caja 500g',2.50,17,1),(10,'GRAN CHALAN','Arroz Superior GRAN CHALAN Bolsa 750g',2.70,30,1),(11,'PRIMOR','Aceite Vegetal PRIMOR Premium Botella 1L',12.00,24,2),(12,'PRIMOR','Pack Aceite Vegetal PRIMOR Premium Botella 1L',22.00,15,2),(13,'BELL\'S','Aceite de Soya BELL\'S Botella 900ml',7.60,22,2),(14,'SOYA','Aceite de Soya SOYA Botella 900ml',8.20,25,2),(15,'BELL\'S','Aceite Vegetal BELL\'S Galonera 5L',45.90,10,2),(16,'VALDEPORRES','Aceite de Oliva VALDEPORRES Extra Virgen Botella 500ml',21.90,15,2),(17,'HUERTO ALAMEIN','Aceite de Oliva HUERTO ALAMEIN Extra Virgen Botella 1L',30.20,15,2),(18,'NICOLINI','Aceite de Oliva HUERTO ALAMEIN Extra Virgen Botella 1L',9.50,20,2),(19,'PRIMOR','Aceite Vegetal PRIMOR Botella 1.8L',18.50,20,2),(20,'NUTRA STEVIA','Endulzante Natural NUTRA STEVIA en Polvo Caja 120 Sobres',24.90,15,3),(21,'SUGAFOR','Endulzante SUGAFOR en Polvo Caja 200 Sobres',56.80,12,3),(22,'ROMPE OLLA','Endulzante SPLENDA en Polvo Caja 100 Sobres',42.50,15,3),(23,'BELL\'S','Azúcar Rubia BELL\'S Bolsa 2Kg',9.20,20,3),(24,'BELL\'S','Azúcar Blanca BELL\'S Bolsa 1Kg',4.90,15,3),(25,'BELL\'S','Azúcar Blanca BELL\'S Bolsa 5Kg',21.50,20,3),(26,'CASA GRANDE','Azúcar Rubia CASA GRANDE Bolsa 1Kg',5.40,20,3),(27,'COSTEÑO','Azúcar Rubia COSTEÑO Bolsa 1Kg',6.00,12,3),(28,'CARTAVIO','Azúcar Rubia CARTAVIO Bolsa 1Kg',5.40,12,3),(29,'LA BOLIVIANA','Endulzante Stevia LA BOLIVIANA Frasco 150g',20.40,15,3),(30,'BELL\'S','Lenteja Bebé BELL\'S Bolsa 500g',3.60,20,4),(31,'BELL\'S','Frijol Canario BELL\'S Bolsa 500g',6.20,30,4),(32,'COSTEÑO','Arveja Verde COSTEÑO Bolsa 500g',4.00,20,4),(33,'COSTEÑO','Maíz Pop Corn COSTEÑO Bolsa 500g',4.20,30,4),(34,'BELL\'S','Quinua BELL\'S Bolsa 500g',6.70,15,4),(35,'BELL\'S','Trigo Mote BELL\'S Bolsa 500g',3.20,20,4),(36,'BELL\'S ','Frijol BELL\'S Red Kidney Bolsa 500g',5.40,15,4),(37,'VALLENORTE','Lenteja Bebé VALLENORTE Bolsa 500g',5.80,20,4),(38,'NICOLINI','Trozos de Atún NICOLINI Lata 170g',5.00,20,5),(39,'PRIMOR','Trozos de Atún PRIMOR en Aceite Vegetal Lata 170g',5.50,15,5),(40,'CAMPOMAR','Lomos de Atún CAMPOMAR en Agua y Sal Lata 170g',6.00,20,5),(41,'CAMPOMAR','Filete de Atún CAMPOMAR en Aceite Vegetal Lata 170g',5.70,15,5),(42,'BELL\'S','Aceite de Oliva VALDEPORRES Extra Virgen Botella 500ml',8.90,15,5),(43,'FLORIDA','Filete de Atún FLORIDA en Agua 110kcal Lata 150g',5.90,12,5),(44,'DON VITTORIO','Spaguetti Don Vittorio Paquete 1 Kg',4.70,14,6),(45,'SAN SEN','Masa para Wantán SAN SEN Bolsa 500g',4.50,13,6),(46,'NICOLINI','Fideo Spaghetti NICOLINI Bolsa 1kg',3.70,15,6),(47,'SAN JORGE','Fideos Caracol SAN JORGE Mediano Bolsa 250g',1.30,15,6),(48,'SAN JORGE','Fideos Cabello de Ángel SAN JORGE Bolsa 250g',1.50,14,6),(49,'DON VITTORIO','Fideo Canuto Rayado DON VITTORIO Bolsa 250g',2.00,15,6),(50,'MOLITALIA','Fideos Spaghetti MOLITALIA Bolsa 1Kg',4.00,15,6),(51,'NICOLINI','Fideos Codo Chico NICOLINI Bolsa 250g',1.50,20,6),(52,'ALACENA','Mayonesa ALACENA Doypack 950g',15.90,15,7),(53,'EMSAL','Sal Marina EMSAL Mesa Bolsa 1Kg',1.80,15,7),(54,'SIBARITA','Pimienta Molida SIBARITA Sobre 21.6g Bolsa 6un',3.60,15,7),(55,'LIBBY S','Mostaza LIBBY\'S Doypack 200g',2.80,15,7),(56,'KIKKO','Salsa de Soya KIKO SIYAU Sazonador oriental Frasco 500ml',4.30,15,7),(57,'DOÑA GUSTA','DOÑA GUSTA Concentrado en Polvo Caja 42g',1.50,20,7),(58,'BELL\'S','Ajo Molido BELL’S Frasco 215g',5.30,15,7),(59,'WALIBI','Mayonesa Rendidora WALIBI Doypack 950g',14.00,15,7),(60,'HEINZ','Ketchup HEINZ Doypack 190g',5.20,15,7),(61,'MAGGI','Caldo MAGGI Cubito Sabor Carne 100g Paquete 25un',5.50,20,7),(62,'AJINOMEN','Sopa Instantánea con Fideos AJINOMEN Sabor Gallina Bolsa 80g',2.00,15,8),(63,'BELL\'S','Puré BELL\'S Papas Bolsa 125g',3.20,15,8),(64,'AJINOMEN','Sopa instantánea AJINOMEN Carne Bolsa 80gr',2.00,15,8),(65,'AJINOMEN','Sopa Instantánea AJINOMEN Sabor oriental Bolsa 80gr',2.00,15,8),(66,'NESTLE SUBLIME','Chocolate SUBLIME Sonrisa Caja 8un',14.90,18,9),(67,'LA IBERICA','Chocolate TRIÁNGULO Clásico Caja 10un',14.90,20,9),(68,'CHOCOFUN','Chocolate CHOCOFUN Caramelo Barra 216g',2.90,15,9),(69,'NESTLÉ','Chocolate BESOS DE MOZA Clásico Caja 9un x 24g',9.90,15,9),(70,'NESTLÉ','Chocolate LENTEJAS en Grageas Caja 30g',1.20,20,9),(71,'PRINGLES','Papas PRINGLES Sabor Original Lata 124g',9.80,18,10),(72,'VILLA NATURA','Arroz Extra COSTEÑO Bolsa 5Kg',10.90,19,10),(73,'LAY\'S','Hojuelas de Papas Fritas LAY\'S Clásicas Bolsa 210g',8.10,2,10),(74,'FRITO LAY','Snacks de Papa Maíz y Trigo PIQUEO SNAX Bolsa 280g',9.90,8,10),(75,'TORTEES','Piqueo FRITO LAY Tor-tees Picante Bolsa 138g',5.00,19,10),(76,'CHEETOS','Piqueos CHEETOS Boliqueso Bolsa 130g',5.00,2,10),(77,'KARINTO','Chifles Salado KARINTO Bolsa 150g',6.50,20,10),(78,'MEXI NACHO','Tortillas de Maíz MEXI NACHOS Bolsa 100g',4.20,20,10),(79,'BELL\'S','Trozos de Atún BELL\'S en Aceite Vegetal Lata 170g',5.00,20,5);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `correo` varchar(100) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('biancadulceencanto@gmail.com','Bianca','1234'),('jennifermckinneya@gmail.com','Jennifer','1234'),('marychoeb@gmail.com','Mary','1234');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-31 13:01:54
