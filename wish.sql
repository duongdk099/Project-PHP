-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 23, 2022 lúc 11:49 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `wish`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `liste_id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `descr` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `tarif` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `item`
--

INSERT INTO `item` (`id`, `liste_id`, `nom`, `descr`, `img`, `url`, `tarif`) VALUES
(1, 2, 'Champagne', 'Bouteille de champagne + flutes + jeux à gratter', 'champagne.jpg', 'helo', '20.00'),
(2, 2, 'Musique', 'Partitions de piano à 4 mains', 'musique.jpg', '', '25.00'),
(3, 2, 'Exposition', 'Visite guidée de l’exposition ‘REGARDER’ à la galerie Poirel', 'poirelregarder.jpg', '', '14.00'),
(4, 3, 'Goûter', 'Goûter au FIFNL', 'gouter.jpg', '', '20.00'),
(5, 3, 'Projection', 'Projection courts-métrages au FIFNL', 'film.jpg', '', '10.00'),
(6, 2, 'Bouquet', 'Bouquet de roses et Mots de Marion Renaud', 'rose.jpg', '', '16.00'),
(7, 2, 'Diner Stanislas', 'Diner à La Table du Bon Roi Stanislas (Apéritif /Entrée / Plat / Vin / Dessert / Café / Digestif)', 'bonroi.jpg', '', '60.00'),
(8, 3, 'Origami', 'Baguettes magiques en Origami en buvant un thé', 'origami.jpg', '', '12.00'),
(9, 3, 'Livres', 'Livre bricolage avec petits-enfants + Roman', 'bricolage.jpg', '', '24.00'),
(10, 2, 'Diner  Grand Rue ', 'Diner au Grand’Ru(e) (Apéritif / Entrée / Plat / Vin / Dessert / Café)', 'grandrue.jpg', '', '59.00'),
(11, 0, 'Visite guidée', 'Visite guidée personnalisée de Saint-Epvre jusqu’à Stanislas', 'place.jpg', '', '11.00'),
(12, 2, 'Bijoux', 'Bijoux de manteau + Sous-verre pochette de disque + Lait après-soleil', 'bijoux.jpg', '', '29.00'),
(19, 0, 'Jeu contacts', 'Jeu pour échange de contacts', 'contact.png', '', '5.00'),
(22, 0, 'Concert', 'Un concert à Nancy', 'concert.jpg', '', '17.00'),
(23, 1, 'Appart Hotel', 'Appart’hôtel Coeur de Ville, en plein centre-ville', 'https://bom.so/O0mZbM', '', '56.00'),
(24, 2, 'Hôtel d\'Haussonville', 'Hôtel d\'Haussonville, au coeur de la Vieille ville à deux pas de la place Stanislas', 'hotel_haussonville_logo.jpg', '', '169.00'),
(25, 1, 'Boite de nuit', 'Discothèque, Boîte tendance avec des soirées à thème & DJ invités', 'boitedenuit.jpg', '', '32.00'),
(26, 1, 'Planètes Laser', 'Laser game : Gilet électronique et pistolet laser comme matériel, vous voilà équipé.', 'laser.jpg', '', '15.00'),
(27, 1, 'Fort Aventure', 'Découvrez Fort Aventure à Bainville-sur-Madon, un site Accropierre unique en Lorraine ! Des Parcours Acrobatiques pour petits et grands, Jeu Mission Aventure, Crypte de Crapahute, Tyrolienne, Saut à l\'élastique inversé, Toboggan géant... et bien plus encore.', 'fort.jpg', '', '25.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `liste`
--

CREATE TABLE `liste` (
  `no` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiration` date DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `liste`
--

INSERT INTO `liste` (`no`, `user_id`, `titre`, `description`, `expiration`, `token`) VALUES
(1, 1, 'Pour fêter le bac !', 'Pour un week-end à Nancy qui nous fera oublier les épreuves. ', '2018-06-27', 'nosecure1'),
(2, 2, 'Liste de mariage d\'Alice et Bob', 'Nous souhaitons passer un week-end royal à Nancy pour notre lune de miel :)', '2018-06-30', 'nosecure2'),
(3, 3, 'C\'est l\'anniversaire de Charlie', 'Pour lui préparer une fête dont il se souviendra :)', '2017-12-12', 'nosecure3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`user`, `pass`) VALUES
('Hello', '1'),
('Helloaze', '123456'),
('azeaze', 'azeazeaze');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reservation_item`
--

CREATE TABLE `reservation_item` (
  `id_item` int(11) NOT NULL,
  `nom_res` varchar(50) NOT NULL,
  `text` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `reservation_item`
--

INSERT INTO `reservation_item` (`id_item`, `nom_res`, `text`) VALUES
(1, '', ''),
(2, '', ''),
(3, '', ''),
(4, '', ''),
(5, '', ''),
(6, '', ''),
(7, '', ''),
(8, '', ''),
(9, '', ''),
(10, '', ''),
(21, '', ''),
(22, '', ''),
(23, 'azeaze', 'azeaze'),
(24, '', ''),
(25, '', ''),
(26, '', ''),
(27, '', ''),
(28, '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `liste`
--
ALTER TABLE `liste`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `liste`
--
ALTER TABLE `liste`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
