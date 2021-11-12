-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2021 a las 05:52:27
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_channels`
--

CREATE TABLE `tb_channels` (
  `id_channel` int(11) NOT NULL,
  `name_channel` varchar(255) NOT NULL,
  `num_subs` int(11) NOT NULL,
  `num_videos` int(11) NOT NULL,
  `info_channel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `tb_channels`
--
DELIMITER $$
CREATE TRIGGER `channel_link` AFTER INSERT ON `tb_channels` FOR EACH ROW UPDATE tb_users AS tu
    SET tu.id_channel = (SELECT tch.id_channel FROM tb_channels AS tch WHERE tu.name_user = tch.name_channel)
    WHERE tu.name_user = NEW.name_channel
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comments`
--

CREATE TABLE `tb_comments` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `commented_at` date NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_followed`
--

CREATE TABLE `tb_followed` (
  `id_follow` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_channel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `tb_followed`
--
DELIMITER $$
CREATE TRIGGER `new_follow` AFTER INSERT ON `tb_followed` FOR EACH ROW UPDATE tb_channel SET num_subs = num_subs + 1
WHERE id_channel = NEW.id_channel
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `firstname_user` varchar(255) NOT NULL,
  `lastname_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `mail_user` varchar(255) NOT NULL,
  `pass_user` varchar(255) NOT NULL,
  `paypal_info` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `dateBirth_user` date NOT NULL,
  `profileDesc` varchar(255) DEFAULT NULL,
  `id_channel` int(11) DEFAULT NULL,
  `contentCreator` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_videolike`
--

CREATE TABLE `tb_videolike` (
  `id_like` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_video` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `tb_videolike`
--
DELIMITER $$
CREATE TRIGGER `new_like` AFTER INSERT ON `tb_videolike` FOR EACH ROW UPDATE tb_videos SET num_likes = num_likes + 1
WHERE id_video = NEW.id_video
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_videos`
--

CREATE TABLE `tb_videos` (
  `id_video` int(11) NOT NULL,
  `title_video` varchar(255) NOT NULL,
  `description_video` varchar(1000) DEFAULT NULL,
  `posted_at` date NOT NULL,
  `status_video` varchar(255) NOT NULL,
  `views_video` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `url_video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `tb_videos`
--
DELIMITER $$
CREATE TRIGGER `delated_video` AFTER DELETE ON `tb_videos` FOR EACH ROW UPDATE tb_channels SET num_videos = num_videos - 1 WHERE id_channel = OLD.id_owner
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `new_video` AFTER INSERT ON `tb_videos` FOR EACH ROW UPDATE tb_channels SET num_videos = num_videos + 1 WHERE id_channel = NEW.id_owner
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_channels`
--
ALTER TABLE `tb_channels`
  ADD PRIMARY KEY (`id_channel`);

--
-- Indices de la tabla `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_video` (`id_video`);

--
-- Indices de la tabla `tb_followed`
--
ALTER TABLE `tb_followed`
  ADD PRIMARY KEY (`id_follow`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_channel` (`id_channel`);

--
-- Indices de la tabla `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_channel` (`id_channel`);

--
-- Indices de la tabla `tb_videolike`
--
ALTER TABLE `tb_videolike`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_video` (`id_video`);

--
-- Indices de la tabla `tb_videos`
--
ALTER TABLE `tb_videos`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_owner` (`id_owner`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_channels`
--
ALTER TABLE `tb_channels`
  MODIFY `id_channel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_followed`
--
ALTER TABLE `tb_followed`
  MODIFY `id_follow` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_videolike`
--
ALTER TABLE `tb_videolike`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_videos`
--
ALTER TABLE `tb_videos`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD CONSTRAINT `tb_comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`),
  ADD CONSTRAINT `tb_comments_ibfk_2` FOREIGN KEY (`id_video`) REFERENCES `tb_videos` (`id_video`);

--
-- Filtros para la tabla `tb_followed`
--
ALTER TABLE `tb_followed`
  ADD CONSTRAINT `tb_followed_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`),
  ADD CONSTRAINT `tb_followed_ibfk_2` FOREIGN KEY (`id_channel`) REFERENCES `tb_channels` (`id_channel`);

--
-- Filtros para la tabla `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`id_channel`) REFERENCES `tb_channels` (`id_channel`);

--
-- Filtros para la tabla `tb_videolike`
--
ALTER TABLE `tb_videolike`
  ADD CONSTRAINT `tb_videolike_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`),
  ADD CONSTRAINT `tb_videolike_ibfk_2` FOREIGN KEY (`id_video`) REFERENCES `tb_videos` (`id_video`);

--
-- Filtros para la tabla `tb_videos`
--
ALTER TABLE `tb_videos`
  ADD CONSTRAINT `tb_videos_ibfk_1` FOREIGN KEY (`id_owner`) REFERENCES `tb_channels` (`id_channel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
