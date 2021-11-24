-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 19:47:25
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
-- Base de datos: `db_study_fans`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_create_comment` (IN `n_id_user` INT, IN `n_id_video` INT, IN `n_content` VARCHAR(500))  BEGIN
		INSERT INTO tb_comments (id_comment,id_user,id_video,commented_at,content)
		VALUES (null, n_id_user,n_id_video,CURRENT_TIMESTAMP,n_content);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_create_user` (IN `n_firstname_user` VARCHAR(255), IN `n_lastname_user` VARCHAR(255), IN `n_name_user` VARCHAR(255), IN `n_mail_user` VARCHAR(255), IN `n_pass_user` VARCHAR(255), IN `n_paypal_info` VARCHAR(255), IN `n_dateBirth_user` DATE, IN `n_profileDesc` VARCHAR(255))  BEGIN
	INSERT INTO tb_users(`id_user`, `firstname_user`, `lastname_user`, `name_user`, `mail_user`, `pass_user`, `paypal_info`, 										`created_at`, `dateBirth_user`, `profileDesc`, `id_channel`, `contentCreator`)
	VALUES (null, n_firstname_user, n_lastname_user, n_name_user, n_mail_user, sha2(n_pass_user,256), n_paypal_info, CURRENT_TIMESTAMP,
            	n_dateBirth_user, n_profileDesc, null, 0);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_create_user_and_channel` (IN `n_firstname_user` VARCHAR(255), IN `n_lastname_user` VARCHAR(255), IN `n_name_user` VARCHAR(255), IN `n_mail_user` VARCHAR(255), IN `n_pass_user` VARCHAR(255), IN `n_paypal_info` VARCHAR(255), IN `n_dateBirth_user` DATE, IN `n_profileDesc` VARCHAR(255))  BEGIN 
	INSERT INTO tb_users(`id_user`, `firstname_user`, `lastname_user`, `name_user`, 
												`mail_user`, `pass_user`, `paypal_info`, `created_at`, 
												`dateBirth_user`, `profileDesc`, `id_channel`, `contentCreator`) 
	VALUES (null, n_firstname_user, n_lastname_user, n_name_user, n_mail_user, 
					sha2(n_pass_user,256), n_paypal_info, CURRENT_TIMESTAMP, n_dateBirth_user, 
					n_profileDesc, null, 0);
	INSERT INTO tb_channels(`id_channel`, `name_channel`, `num_subs`, `num_videos`, 
													`info_channel`) 
	VALUES (null, n_name_user, 0, 0, null);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_create_video` (IN `n_title_video` VARCHAR(255), IN `n_description_video` VARCHAR(1000), IN `n_status_video` VARCHAR(255), IN `n_id_owner` INT, IN `n_miniature` VARCHAR(255), IN `n_filename` VARCHAR(255))  BEGIN 
	INSERT INTO tb_videos(id_video, title_video, description_video, posted_at, status_video, 
													views_video, id_owner, num_likes, url_video, miniature, 
													filename) 
	VALUES (null, n_title_video, n_description_video, CURRENT_TIMESTAMP,n_status_video, 0, 
						n_id_owner, 0, 0, n_miniature, n_filename);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_delate_comment` (IN `n_id_comment` INT)  BEGIN
	DELETE FROM `tb_comments` WHERE id_comment=n_id_comment;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_delete_channel` (IN `n_id_channel` INT)  BEGIN
	DELETE FROM tb_channels WHERE id_channel=n_id_channel;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_delete_like` (`n_id_like` INT, `n_id_user` INT)  BEGIN
	DELETE FROM tb_videolike WHERE id_like = n_id_like AND id_user = n_id_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_delete_user` (IN `n_id_user` INT)  BEGIN
	DELETE FROM tb_users WHERE id_user = n_id_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_delete_video` (IN `n_id_video` INT)  BEGIN
	DELETE FROM tb_videos WHERE id_video = n_id_video;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_login` (IN `n_id_user` INT, IN `n_email_user` VARCHAR(255), IN `n_pass_user` VARCHAR(255))  BEGIN
	SELECT email_user, pass_user FROM tb_users WHERE id_user = n_id_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_new_follow` (`n_id_user` INT, `n_id_channel` INT)  BEGIN 
	INSERT INTO tb_videolike (id_follow, id_user, id_channel) 
    VALUES (null, n_id_user, n_id_channel); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_new_like` (`n_id_user` INT, `n_id_video` INT)  BEGIN
	INSERT INTO tb_videolike (id_like, id_user, id_video)
    VALUES (null, n_id_user, n_id_video);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_show_update_user` (IN `n_id_user` INT)  BEGIN
	SELECT firstname_user, lastname_user, mail_user, pass_user, paypal_info, dateBirth, profileDesc 
    FROM tb_users 
    WHERE id_user = n_id_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_unfollow` (`n_id_user` INT, `n_id_channel` INT)  BEGIN
	DELETE FROM tb_followed WHERE id_user = n_id_user AND n_id_channel = n_id_channel;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_update_channel` (IN `n_id_channel` INT, IN `n_info_channel` VARCHAR(255))  BEGIN
	UPDATE tb_channels SET info_channel=n_info_channel
	WHERE id_channel=n_id_channel;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_update_comment` (IN `n_id_user` INT, IN `n_id_video` INT, IN `n_content` VARCHAR(500))  BEGIN 
	UPDATE tb_comments SET posted_at = CURRENT_TIMESTAMP, content=n_content 
    WHERE id_video=n_id_video AND id_user=n_id_user; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_update_user` (IN `n_id_user` INT, IN `n_firstname_user` VARCHAR(255), IN `n_lastname_user` VARCHAR(255), IN `n_mail_user` VARCHAR(255), IN `n_pass_user` VARCHAR(255), IN `n_paypal_info` VARCHAR(255), IN `n_dateBirth_user` DATE, IN `n_profileDesc` VARCHAR(255))  BEGIN
	UPDATE `tb_user` SET `firstname_user`=n_firstname_user,`lastname_user`=n_lastname_user,`mail_user`=n_mail_user,
    						`pass_user`=sha2(n_pass_user,256),`paypal_info`=n_paypal_info,`dateBirth_user`=n_dateBirth_user,
                            `profileDesc`=n_profileDesc
    WHERE id_user=n_id_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_update_video` (IN `n_id_video` INT, IN `n_title_video` VARCHAR(255), IN `n_description_video` VARCHAR(1000), IN `n_status_video` VARCHAR(255))  BEGIN 
	UPDATE `tb_videos` SET title_video=n_title_video, 
    						description_video=n_description_video, 
                            status_video=n_status_video 
    WHERE id_video=n_id_video; 
END$$

DELIMITER ;

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
-- Volcado de datos para la tabla `tb_channels`
--

INSERT INTO `tb_channels` (`id_channel`, `name_channel`, `num_subs`, `num_videos`, `info_channel`) VALUES
(2, 'GusValla', 0, 0, NULL),
(3, 'Faps13', 0, 0, NULL),
(4, 'CarSalazar', 0, 0, NULL),
(5, 'Learn with Josh', 0, 0, NULL),
(7, 'Test', 0, 1, NULL);

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
DELIMITER $$
CREATE TRIGGER `unfollow` AFTER DELETE ON `tb_followed` FOR EACH ROW UPDATE tb_channels SET num_subs = num_subs - 1 WHERE id_channel = OLD.id_channel
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

--
-- Volcado de datos para la tabla `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `firstname_user`, `lastname_user`, `name_user`, `mail_user`, `pass_user`, `paypal_info`, `created_at`, `dateBirth_user`, `profileDesc`, `id_channel`, `contentCreator`) VALUES
(9, 'Gustavo', 'Valladolid', 'GusValla', 'a6520150033@utch.edu.mx', '1c142b2d01aa34e9a36bde480645a57fd69e14155dacfab5a3f9257b77fdc8d8', 'churrosaurio17@gmail.com', '2021-11-24', '2002-08-17', 'UTCH BIS Student', 2, 0),
(10, 'Fabian', 'Escobar', 'Faps13', 'a6520150036@utch.edu.mx', '4fc2b5673a201ad9b1fc03dcb346e1baad44351daa0503d5534b4dfdcc4332e0', NULL, '2021-11-24', '2002-05-13', 'Software Developer JR', 3, 0),
(11, 'Carlos', 'Salazar', 'CarSalazar', 'a6520150015@utch.edu.mx', '110198831a426807bccd9dbdf54b6dcb5298bc5d31ac49069e0ba3d210d970ae', 'carlossaulsalazarcruz@gmail.com', '2021-11-24', '2001-08-10', 'Software Developer JR', 4, 0),
(12, 'Joshua', 'Aviles', 'Learn with Josh', 'a6520150001@utch.edu.mx', '7e4a684d570406798de06e42c873c54df82ba8c178328a73b82d6e0b5e777943', '', '2021-11-24', '2001-02-07', 'TID31BISM', 5, 0),
(14, 'Test', 'Test', 'Test', 'test@gmail.com', '7e4a684d570406798de06e42c873c54df82ba8c178328a73b82d6e0b5e777943', '', '2021-11-24', '2021-11-24', 'Test', 7, 0);

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
CREATE TRIGGER `dislike` AFTER DELETE ON `tb_videolike` FOR EACH ROW UPDATE tb_videos SET num_likes = num_likes - 1 WHERE id_video = OLD.id_video
$$
DELIMITER ;
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
  `status_video` tinyint(4) NOT NULL,
  `views_video` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `url_video` varchar(255) NOT NULL,
  `miniature` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_videos`
--

INSERT INTO `tb_videos` (`id_video`, `title_video`, `description_video`, `posted_at`, `status_video`, `views_video`, `id_owner`, `num_likes`, `url_video`, `miniature`, `filename`) VALUES
(5, 'Prueba', 'Prueba', '2021-11-24', 0, 0, 7, 0, '0', 'Captura de pantalla (26).png', 'Captura de pantalla (27).png');

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
  MODIFY `id_channel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_followed`
--
ALTER TABLE `tb_followed`
  MODIFY `id_follow` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tb_videolike`
--
ALTER TABLE `tb_videolike`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_videos`
--
ALTER TABLE `tb_videos`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
