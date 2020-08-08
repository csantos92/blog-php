-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-08-2020 a las 08:28:42
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Pop'),
(2, 'Rock'),
(3, 'Flamenco'),
(4, 'Punk'),
(14, 'Electro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entries`
--

DROP TABLE IF EXISTS `entries`;
CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `categorie_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `date_post` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users` (`user_id`),
  KEY `fk_categories` (`categorie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entries`
--

INSERT INTO `entries` (`id`, `user_id`, `categorie_id`, `title`, `description`, `date_post`) VALUES
(1, 30, 1, 'Estopa', 'Su álbum salió a la calle el 19 de octubre de 1999. El sencillo \"Suma y sigue\" que tuvo mucha repercusión y empezó a sonar en todas las emisoras de radio, pero sería tres meses mas tarde con el sencillo \"La raja de tu falda\" el que les llevara a la fama.\r\nIniciaron la Gira Ducados 2000\' que los llevó por toda España y gran parte de Latino américa. Lograron vender 1.000.000 discos. ', '2020-08-04'),
(3, 30, 4, 'Sum 41', 'In the late summer of 2018, Sum 41 frontman, Deryck Whibley, stepped off the tour bus after three solid years of worldwide touring, turned on the console in his home studio, picked up a guitar, and started pouring out song after song. Feeling incredibly inspired from 2016’s critically-acclaimed Europe Impala Gold certified, #9 Billboard Top Albums charting, 13 Voices album and touring cycle, Whibley feverishly started putting together songs from the cascade of ideas flying throughout his mind. Relentless touring and immense energy from some of the largest crowds the band had ever played in front of bred a multitude of ideas that Whibley had stockpiled and couldn’t wait to record. Within three weeks, the majority of the music for the new album, Order In Decline was written.', '2020-08-06'),
(4, 30, 4, 'Simple Plan', 'Simple Plan es un grupo canadiense que muchos han clasificado en el pop punk. El quinteto vio la luz entre 1999 y 2000, cuando sus integrantes se embarcaron en el proyecto. Está formada por Pierre Bouvier (voz), David Desrosiers (bajo y voces), Sébastien Lefebvre (guitarra y voces), Jeff Stinco (guitarra) y Chuck Comeau (batería). David, Seb y Jeff se encargan de crear la música y las armonías mientras que Pierre y Chuck dotan de sentido a las canciones componiendo temas llenos de sentimientos y profundidad. Es probable que la llave de su éxito esté en la sinceridad de sus palabras y su música contagiosa; además de su inagotable entusiasmo, carisma y volcamiento en sus fans.', '2020-08-06'),
(11, 31, 3, 'Fondo Flamenco', 'Alejandro Astola, Antonio Ríos y Rafael Ruda, son Fondo Flamenco, un grupo de tres jóvenes sevillanos de 22 años de media, que llevan en el panorama Musical más de 6 años con 4 Discos a sus espaldas (“Contracorriente”, “Las Cartas sobre la mesa”, “Paren el mundo que me bajo” y su reciente Disco “Surología”), más de 200 Conciertos en Directo, avalan su gran éxito. Estos Jóvenes Artistas irrumpieron desde entonces muy fuerte en la Música Española. Todo fue en el año 2007 gracias a una maqueta con siete temas, de la cual destacó el tema “Ojalá”, que a pesar de no tener ninguna promoción caló muy hondo entre el público joven vía Internet. Éxito que fue interpretado en Colombia por Camilo Echeverri, reconocido por su actuación y posterior triunfo en el reality show colombiano El Factor Xs del Canal RCN, obteniendo el tema también gran acogida por parte del público colombiano.\r\n\r\nDentro de su Discografía cabe destacar los siguientes Éxitos:\r\n\r\n“Escúchame mujer” (Con más de 17 Millones de Views en Youtube)\r\n\r\n“Ojalá” (Con más de 5 Millones de Views en Youtube)\r\n\r\n“Q,tal” (10 Millones de Views en Youtube)\r\n\r\n“Lo nuestro” (5 Millones de Views en Youtube)\r\n\r\n“El último Adiós” (5 Millones de Views en Youtube)\r\n\r\n“Confesión” (1,5 Millones de Views en Youtube)\r\n\r\nAlejandro Astola Soto, autor de las letras y la música de los temas del grupo, intenta que el público se sienta identificado en cada canción, abordando temas de actualidad en sus letras y mostrando mucha preocupación por temas sociales y comprometidos.\r\n\r\nDefinir el estilo Musical de Fondo Flamenco es muy difícil pues la evolución que han tenido desde su primer Disco ha sido sorprendente; desde el Flamenco más Pop de sus inicios han ido evolucionando constantemente en su música, fusionando el Rock, Funky, Jazz y Blues, pero sin perder su esencia Sureña. El poder Creativo y de Seducción con respecto a sus fans es impresionante la muestra está, en la cantidad de seguidores que tienen en youtube, Facebook, Twitter y Tuenti.', '2020-08-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(255) DEFAULT 'hola que tal',
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `pass`) VALUES
(40, 'elche', 'elche', 'elche@elche.com', '$2y$10$blHo4lwTOAheABTV15Pi0ORSy5C8cXTiOhFNUFX32ombIQ2og5hd.'),
(39, 'hola', 'hola', 'hola@hola.com', '$2y$10$ws9I/ZyVR74G.yFWPgcdYO72hVHR4ewgKiYCcMzSg6Ysc4QqgG6.2'),
(38, 'luna', 'luna', 'luna@luna.com', '$2y$10$31VSaQ6cH6B0C7mMYTgVZ.P42HPofYayVYAh5xMlOYbqFA0MZgJGK'),
(37, 'rosa', 'rosa', 'rosa@rosa.com', '$2y$10$sqw60A2y5MkknyqOB20zu.eWIwHPPslisZRXaVPCeTOnQ1n1lNQzy'),
(35, 'Perro', 'Sanchez', 'perro@perro.com', '$2y$10$26g2aztFnilFbQjc.QE34.41smEfRENaNq2uOcjlrchx8LjJRZyAi'),
(34, 'Ana', 'Guerra', 'ana@ana.com', '$2y$10$hA8y.S0uKorlgkdDj9Qi0uU6vrSEjBf6lGLmnQLMqu6kqB9V07jeq'),
(33, 'Antonio', 'Banderas', 'antonio@antonio.com', '$2y$10$oecrbPD5SRuIUXvX9eZPf.soBeA5z6G9e7H4A.rFMKzBnkzcMv5tu'),
(32, 'Pedro', 'Picapiedra', 'pedro@pedro.com', '$2y$10$YvIk2SJfqs9iqGXGZABFquaHaBas1HOU204Xr/2H6HNfdM374CiJW'),
(30, 'carlos', 'carlos', 'carlos@carlos.com', '$2y$10$ZZGTPFcGkkKCB8Le.FE1q.MO/IiMfBhA6V/yQ4OfiCADrjPuEPr2m'),
(31, 'azul', 'azul', 'azul@azul.com', '$2y$10$oMSFQfqZ/UHUyUa2IKP57uHZ5QgIAuKMhyRXf/ja8Jv5enKmtsiiS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
