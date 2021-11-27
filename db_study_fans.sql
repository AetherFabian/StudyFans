-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 02:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_study_fans`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_create_comment` (IN `n_id_channel` INT, IN `n_id_video` INT, IN `n_content` VARCHAR(500))  BEGIN
		INSERT INTO tb_comments (id_comment,id_channel,id_video,commented_at,content)
		VALUES (null, n_id_channel,n_id_video,CURRENT_TIMESTAMP,n_content);
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
					n_pass_user, n_paypal_info, CURRENT_TIMESTAMP, n_dateBirth_user, 
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_delete_like` (IN `n_id_like` INT, IN `n_id_channel` INT)  BEGIN
	DELETE FROM tb_videolike WHERE id_like = n_id_like AND id_channel = n_id_channel;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_delete_user` (IN `n_id_user` INT)  BEGIN
	DELETE FROM tb_users WHERE id_user = n_id_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_delete_video` (IN `n_id_video` INT)  BEGIN
	DELETE FROM tb_videos WHERE id_video = n_id_video;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_login` (IN `n_mail_user` VARCHAR(255))  BEGIN
	SELECT id_user, mail_user, pass_user FROM tb_users WHERE mail_user = n_mail_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_new_follow` (IN `n_id_user` INT, IN `n_id_channel` INT)  BEGIN 
	INSERT INTO tb_videolike (id_follow, id_user, id_channel) 
    VALUES (null, n_id_user, n_id_channel); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_new_like` (IN `n_id_channel` INT, IN `n_id_video` INT)  BEGIN
	INSERT INTO tb_videolike (id_like, id_, id_video)
    VALUES (null, n_id_user, n_id_video);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_read_user` (IN `n_id_user` INT)  BEGIN
	SELECT * FROM tb_users WHERE id_user = n_id_user;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_update_comment` (IN `n_id_channel` INT, IN `n_id_video` INT, IN `n_content` VARCHAR(500))  BEGIN 
	UPDATE tb_comments SET posted_at = CURRENT_TIMESTAMP, content=n_content 
    WHERE id_video=n_id_video AND id_channel=n_id_channel; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_update_user` (IN `n_id_user` INT, IN `n_firstname_user` VARCHAR(255), IN `n_lastname_user` VARCHAR(255), IN `n_mail_user` VARCHAR(255), IN `n_paypal_info` VARCHAR(255), IN `n_dateBirth_user` DATE, IN `n_profileDesc` VARCHAR(255))  BEGIN 
    UPDATE tb_users SET firstname_user=n_firstname_user,
                        lastname_user=n_lastname_user,mail_user=n_mail_user, 
                        paypal_info=n_paypal_info,
                        dateBirth_user=n_dateBirth_user,profileDesc=n_profileDesc 
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
-- Table structure for table `tb_channels`
--

CREATE TABLE `tb_channels` (
  `id_channel` int(11) NOT NULL,
  `name_channel` varchar(255) NOT NULL,
  `num_subs` int(11) NOT NULL,
  `num_videos` int(11) NOT NULL,
  `info_channel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_channels`
--

INSERT INTO `tb_channels` (`id_channel`, `name_channel`, `num_subs`, `num_videos`, `info_channel`) VALUES
(1, 'Learn with Josh', 0, 5, NULL),
(2, 'GusValla', 0, 0, NULL),
(3, 'Faps13', 0, 0, NULL);

--
-- Triggers `tb_channels`
--
DELIMITER $$
CREATE TRIGGER `channel_link` AFTER INSERT ON `tb_channels` FOR EACH ROW UPDATE tb_users AS tu
    SET tu.id_channel = (SELECT tch.id_channel FROM tb_channels AS tch WHERE tu.name_user = tch.name_channel)
    WHERE tu.name_user = NEW.name_channel
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE `tb_comments` (
  `id_comment` int(11) NOT NULL,
  `id_channel` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `commented_at` date NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_comments`
--

INSERT INTO `tb_comments` (`id_comment`, `id_channel`, `id_video`, `commented_at`, `content`) VALUES
(5, 1, 2, '2021-11-25', 'Gracias por la ayuda!'),
(7, 3, 2, '2021-11-25', 'Muy buen video, puedes hacerlo pero con distribución Fedora?'),
(8, 2, 11, '2021-11-26', 'Muchas gracias brooooo!'),
(9, 1, 12, '2021-11-26', 'Puedes hacer ejemplo de cómo instalar Windows 11?'),
(10, 2, 12, '2021-11-26', 'Rifado');

-- --------------------------------------------------------

--
-- Table structure for table `tb_followed`
--

CREATE TABLE `tb_followed` (
  `id_follow` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_channel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `tb_followed`
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
-- Table structure for table `tb_users`
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
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `firstname_user`, `lastname_user`, `name_user`, `mail_user`, `pass_user`, `paypal_info`, `created_at`, `dateBirth_user`, `profileDesc`, `id_channel`, `contentCreator`) VALUES
(1, 'Joshua Alexis', 'Aviles', 'Learn with Josh', 'a6520150001@utch.edu.mx', '$2y$10$zq5Oz4vEPZqYZrOSgPuztOqCQoUsjtBtuyTKxNM.o0r8y7b8oqVfu', '', '2021-11-24', '2001-02-07', 'TID31BISM', 1, 0),
(2, 'Gustavo', 'Valladolid', 'GusValla', 'a6520150033@utch.edu.mx', '$2y$10$R3K8SFMZDKHPjfTfn9n4/OApLEtMKKSruo8fpf76BezWPnVFLzxrS', 'churrosaurio17@gmail.com', '2021-11-25', '2002-08-17', 'UTCH BIS Student', 2, 0),
(3, 'Fabian', 'Escobar', 'Faps13', 'a6520150036@utch.edu.mx', '$2y$10$rqYU0EtEFpn2GnszQ7QGG.yej4XA8y0yZXu3mZLchE1fhlaEF.OWq', '', '2021-11-25', '2002-05-13', 'Software Developer JR', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_videolike`
--

CREATE TABLE `tb_videolike` (
  `id_like` int(11) NOT NULL,
  `id_channel` int(11) NOT NULL,
  `id_video` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `tb_videolike`
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
-- Table structure for table `tb_videos`
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
-- Dumping data for table `tb_videos`
--

INSERT INTO `tb_videos` (`id_video`, `title_video`, `description_video`, `posted_at`, `status_video`, `views_video`, `id_owner`, `num_likes`, `url_video`, `miniature`, `filename`) VALUES
(2, 'User managment Ubuntu', 'Manejar usuarios en distribución linux Ubuntu', '2021-11-25', 0, 0, 1, 0, '0', 'Captura de pantalla (15).png', 'User management Ubuntu.mp4'),
(11, 'Process and Package Management on UNIX/Linux', 'Distribución Ubuntu', '2021-11-26', 0, 0, 1, 0, '0', 'ER proyecto - Copia de Copia de ER DIAGRAM StudyFans.png', 'Process and Package Management on UNIX..Linux.mp4'),
(12, 'UNIX-Linux operating system installation', 'Instalación de Ubuntu en Máquina Virtual Box', '2021-11-26', 0, 0, 1, 0, '0', 'Captura de pantalla (165).png', 'Practice execution report of UNIX.-Linux operating system installation.mp4'),
(13, 'Lamalá de Pâques', 'Receta de lámala de pâques paso por paso (French Tutorial)', '2021-11-26', 0, 0, 1, 0, '0', 'Captura de pantalla (109).png', 'Comment préparer. le Lamala de Pâques.mp4'),
(14, '¿Cómo armar un PC?', 'Armar un PC e identificar componentes', '2021-11-26', 0, 0, 1, 0, '0', 'Captura de pantalla (104).png', 'Cómo Armar un PC.mp4');

--
-- Triggers `tb_videos`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_channels`
--
ALTER TABLE `tb_channels`
  ADD PRIMARY KEY (`id_channel`);

--
-- Indexes for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_video` (`id_video`),
  ADD KEY `tb_comments_ibfk_3` (`id_channel`);

--
-- Indexes for table `tb_followed`
--
ALTER TABLE `tb_followed`
  ADD PRIMARY KEY (`id_follow`),
  ADD KEY `id_channel` (`id_channel`),
  ADD KEY `tb_followed_ibfk_3` (`id_user`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_channel` (`id_channel`);

--
-- Indexes for table `tb_videolike`
--
ALTER TABLE `tb_videolike`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_video` (`id_video`),
  ADD KEY `tb_videolike_ibfk_3` (`id_channel`);

--
-- Indexes for table `tb_videos`
--
ALTER TABLE `tb_videos`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_owner` (`id_owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_channels`
--
ALTER TABLE `tb_channels`
  MODIFY `id_channel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_followed`
--
ALTER TABLE `tb_followed`
  MODIFY `id_follow` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_videolike`
--
ALTER TABLE `tb_videolike`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_videos`
--
ALTER TABLE `tb_videos`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD CONSTRAINT `tb_comments_ibfk_2` FOREIGN KEY (`id_video`) REFERENCES `tb_videos` (`id_video`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_comments_ibfk_3` FOREIGN KEY (`id_channel`) REFERENCES `tb_channels` (`id_channel`) ON DELETE CASCADE;

--
-- Constraints for table `tb_followed`
--
ALTER TABLE `tb_followed`
  ADD CONSTRAINT `tb_followed_ibfk_2` FOREIGN KEY (`id_channel`) REFERENCES `tb_channels` (`id_channel`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_followed_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_channels` (`id_channel`) ON DELETE CASCADE;

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`id_channel`) REFERENCES `tb_channels` (`id_channel`) ON DELETE CASCADE;

--
-- Constraints for table `tb_videolike`
--
ALTER TABLE `tb_videolike`
  ADD CONSTRAINT `tb_videolike_ibfk_2` FOREIGN KEY (`id_video`) REFERENCES `tb_videos` (`id_video`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_videolike_ibfk_3` FOREIGN KEY (`id_channel`) REFERENCES `tb_channels` (`id_channel`) ON DELETE CASCADE;

--
-- Constraints for table `tb_videos`
--
ALTER TABLE `tb_videos`
  ADD CONSTRAINT `tb_videos_ibfk_1` FOREIGN KEY (`id_owner`) REFERENCES `tb_channels` (`id_channel`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
