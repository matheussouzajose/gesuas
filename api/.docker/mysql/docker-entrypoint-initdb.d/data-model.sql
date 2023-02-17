DROP SCHEMA IF EXISTS gesuas;
CREATE SCHEMA IF NOT EXISTS gesuas DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE gesuas;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

# Dump da tabela accounts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
                           `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                           `name` varchar(255) NOT NULL,
                           `document_id` varchar(255) NOT NULL UNIQUE,
                           `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                           `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                           PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;

INSERT INTO `accounts` (`id`, `name`, `document_id`, `document_id`, `created_at`, `updated_at`)
VALUES
    (1,'Matheus Souza Jose', '12345678912', '2023-02-16 16:40:57', '2023-02-16 16:40:57');

/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;