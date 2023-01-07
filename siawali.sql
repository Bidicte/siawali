-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 07 jan. 2023 à 03:18
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `siawali`
--

-- --------------------------------------------------------

--
-- Structure de la table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_content` varchar(255) NOT NULL,
  `about_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `announcement_name` varchar(5) DEFAULT NULL,
  `announcement_wording` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `announcer`
--

CREATE TABLE `announcer` (
  `announcer_id` int(11) NOT NULL,
  `announcer_lastname` varchar(10) NOT NULL,
  `announcer_firstname` varchar(10) DEFAULT NULL,
  `annoucer_phone` int(10) DEFAULT NULL,
  `annoucer_email` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `cart_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`cart_id`, `customer_id`, `product_id`, `product_quantity`, `cart_date`) VALUES
(16, 1, 1, 1, '2023-01-05 14:38:49'),
(17, 1, 2, 1, '2023-01-05 14:41:39'),
(18, 1, 1, 2, '2023-01-05 14:43:18');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `day` date NOT NULL DEFAULT current_timestamp(),
  `hour` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `active`, `day`, `hour`) VALUES
(1, 'Ensemble blazer unicolore et pantalon', 1, '2022-12-20', '09:07:24'),
(2, 'Blazer', 1, '2023-01-05', '01:21:46'),
(3, 'Robe', 1, '2023-01-06', '15:23:56'),
(4, 'Pantalon Jean', 1, '2023-01-06', '15:24:57'),
(5, 'Lunettes', 1, '2023-01-06', '15:29:12'),
(6, 'Basket', 1, '2023-01-06', '15:47:07'),
(7, 'Sac', 1, '2023-01-06', '15:50:27');

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_lastname` varchar(150) NOT NULL,
  `customer_firstname` varchar(150) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_password` varchar(150) NOT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_lastname`, `customer_firstname`, `customer_email`, `customer_password`, `active`) VALUES
(1, 'MOUSSA VEKETO', 'Alexandra Bénédicte', 'malexandra13@yahoo.com', '$2y$10$IIyRjzBBrYlWg.1Ln3KU4eqNMs1MJ3uWxj/dCthVzjDxWTdSnwjdS', 1);

-- --------------------------------------------------------

--
-- Structure de la table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_wording` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `delivery_man`
--

CREATE TABLE `delivery_man` (
  `delivery_man_id` int(11) NOT NULL,
  `delivery_man_lastname` varchar(10) NOT NULL,
  `delivery_man_firstname` varchar(10) NOT NULL,
  `delivery_man_contact` int(15) NOT NULL,
  `delivery_man_address` varchar(5) DEFAULT NULL,
  `delivery_man_score` int(5) DEFAULT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_amount` int(15) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_hour` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `logo`
--

CREATE TABLE `logo` (
  `logo_id` int(11) NOT NULL,
  `logo_name` varchar(2) NOT NULL,
  `logo_date_add` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_content` varchar(255) NOT NULL,
  `message_date` date NOT NULL,
  `message_object` varchar(10) DEFAULT NULL,
  `visitor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `newsletter_id` int(11) NOT NULL,
  `newsletter_email` varchar(255) NOT NULL,
  `newsletter_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`newsletter_id`, `newsletter_email`, `newsletter_date`) VALUES
(1, 'malexandra13@yahoo.com', '2022-12-15');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_date` date NOT NULL,
  `order_four` datetime DEFAULT NULL,
  `order_wording` varchar(45) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `relaypoint_id` int(11) NOT NULL,
  `delivery_man_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(15) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `privilege`
--

CREATE TABLE `privilege` (
  `privilege_id` int(11) NOT NULL,
  `privilege_title` varchar(5) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_characteristic` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_color` varchar(15) NOT NULL,
  `product_size` varchar(100) NOT NULL,
  `name_url` varchar(255) NOT NULL,
  `name_url1` varchar(255) NOT NULL,
  `name_url2` varchar(255) NOT NULL,
  `modified_price` float NOT NULL,
  `active` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`product_id`, `category_name`, `subcategory_name`, `product_title`, `product_characteristic`, `product_description`, `product_quantity`, `product_price`, `product_color`, `product_size`, `name_url`, `name_url1`, `name_url2`, `modified_price`, `active`, `date`) VALUES
(1, '1', '1', 'Tailleur Femme', 'Tailleur Pantalon unicolore', 'Ensemble Tailleur col V prenium', 4, 35, 'Bleu', 'S(36) M(38) L(40) XL(422)', 'photo_2022-10-17_23-48-06.jpg', 'photo_2022-10-17_23-49-43.jpg', 'photo_2022-10-17_23-47-11.jpg', 0, 1, '2023-01-02 01:09:37'),
(2, '2', '2', 'Blazer', 'Blazer', 'Blazer', 4, 25, 'Bleu', 'S(36) M(38) L(40) XL(42)', 'photo_2022-10-17_23-49-23.jpg', 'photo_2022-10-17_23-49-23.jpg', 'photo_2022-10-17_23-49-05.jpg', 0, 1, '2023-01-05 14:41:20'),
(3, '4', '4', 'Pantalon Jean', 'Boyfriend gros bas', 'Boyfriend', 8, 15, 'Bleu', 'S(36) M(38) L(40) XL(42)', 'photo_2022-10-18_00-20-12.jpg', 'photo_2022-10-18_00-20-16.jpg', 'photo_2022-10-18_00-20-25.jpg', 0, 1, '2023-01-06 15:28:07'),
(4, '5', '5', 'Lunette Louis Vuitton', 'Lunette Louis Vuitton Noir', 'Lunette Louis Vuitton', 5, 30, 'Noir', '15cm', 'photo_2022-10-18_00-03-37.jpg', 'photo_2022-10-18_00-03-41.jpg', 'photo_2022-10-18_00-03-48.jpg', 0, 1, '2023-01-06 15:33:10'),
(5, '3', '8', 'Robe Fille d\'acceuil', 'Robe Fille d\'acceuil', 'Robe Fille d\'acceuil', 4, 75, 'Rouge', 'S(36) M(38) L(40) XL(42)', 'photo_2022-10-18_00-12-00.jpg', 'photo_2022-10-18_00-12-00.jpg', 'photo_2022-10-18_00-12-00.jpg', 0, 1, '2023-01-06 15:42:20'),
(6, '3', '3', 'Robe Fleurie', 'Robe Fleurie mi-longue', 'Robe Fleurie', 4, 30, 'Noir Fleuri', 'S(36) M(38) L(40) XL(42)', 'photo_2022-10-17_23-42-14.jpg', 'photo_2022-10-17_23-42-14.jpg', 'photo_2022-10-17_23-42-14.jpg', 0, 1, '2023-01-06 15:44:25'),
(7, '6', '9', 'Basket Femme', 'Basket Femme', 'Basket Femme', 8, 20, 'Blanc', '37 38 39 40 41 42', 'photo_2022-10-17_23-55-53.jpg', 'photo_2022-10-17_23-55-23.jpg', 'photo_2022-10-17_23-56-01.jpg', 0, 1, '2023-01-06 15:49:54'),
(8, '7', '10', 'Sac à main ', 'Sac à main ', 'Sac à main MICHAEL KORS ', 5, 40, 'Marron', '35cm', 'photo_2022-10-17_23-09-09.jpg', 'photo_2022-10-17_23-09-09.jpg', 'photo_2022-10-17_23-09-09.jpg', 0, 1, '2023-01-06 15:53:00');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL,
  `promotion_date_debut` date NOT NULL,
  `promotion_date_end` date NOT NULL,
  `promotion_hour_debut` datetime NOT NULL,
  `promotion_hour_end` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `publicity`
--

CREATE TABLE `publicity` (
  `publicity_id` int(11) NOT NULL,
  `publicity_title` varchar(5) NOT NULL,
  `publicity_sub_title` varchar(5) NOT NULL,
  `publicity_price` float NOT NULL,
  `publicity_date` date NOT NULL,
  `tip_id` int(11) NOT NULL,
  `announcer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `relaypoint`
--

CREATE TABLE `relaypoint` (
  `relaypoint_id` int(11) NOT NULL,
  `relaypoint_commune` varchar(10) NOT NULL,
  `relaypoint_town` varchar(10) NOT NULL,
  `relaypoint_description` varchar(10) DEFAULT NULL,
  `relaypoint_price` float NOT NULL,
  `relaypoint_wording` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_wording` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(150) NOT NULL,
  `slider_sub_title` varchar(150) NOT NULL,
  `slider_description` varchar(255) NOT NULL,
  `name_url` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_title`, `slider_sub_title`, `slider_description`, `name_url`, `user_id`, `active`, `date`) VALUES
(2, 'Siawali dresses', 'Chez siawali la mode à petit prix', 'Commencez à faire vos shopping maintenant ', 'photo_2022-10-18_00-10-38.jpg', 1, 1, '2022-12-15 12:15:44'),
(3, 'siawali', 'Chez siawali la mode à petit prix', 'Commencez à faire vos shopping maintenant ', 'photo_2022-10-18_00-12-35.jpg', 1, 1, '2022-12-15 12:22:50');

-- --------------------------------------------------------

--
-- Structure de la table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `subcategory_name`, `active`, `category_id`, `date`) VALUES
(1, 'Tunique Femme', 1, 1, '2022-12-20 09:10:58'),
(2, 'Blazer Zara', 1, 2, '2023-01-05 01:22:03'),
(3, 'Robe à fleurs', 1, 3, '2023-01-06 15:24:21'),
(4, 'Boyfriends ', 1, 4, '2023-01-06 15:25:12'),
(5, 'Lunette Louis Vuitton', 1, 5, '2023-01-06 15:29:33'),
(6, 'Lunette Gucci', 1, 5, '2023-01-06 15:29:43'),
(7, 'Lunette Dior', 1, 5, '2023-01-06 15:29:51'),
(8, 'Robe Fille d\'honneur', 1, 3, '2023-01-06 15:39:56'),
(9, 'Basket Femme', 1, 6, '2023-01-06 15:47:28'),
(10, 'Sac à main', 1, 7, '2023-01-06 15:50:50'),
(11, 'Sac Carré', 1, 7, '2023-01-06 15:51:15');

-- --------------------------------------------------------

--
-- Structure de la table `tip`
--

CREATE TABLE `tip` (
  `tip_id` int(11) NOT NULL,
  `tip_content` varchar(255) NOT NULL,
  `tip_nameurl` varchar(2552) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `type_payment`
--

CREATE TABLE `type_payment` (
  `type_payment_id` int(11) NOT NULL,
  `type_payment_name` varchar(45) DEFAULT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_firstname` varchar(100) NOT NULL,
  `user_phone` int(30) NOT NULL,
  `user_email` varchar(150) DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `user_login` varchar(45) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `token` text NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_lastname`, `user_firstname`, `user_phone`, `user_email`, `user_address`, `user_login`, `user_password`, `active`, `file_name`, `file_url`, `ip_address`, `token`, `registration_date`) VALUES
(1, 'Alexandra', 'VEKETO', 584893442, 'malexandra13@yahoo.com', 'Anono', 'alexa', 'siawali', 1, '', '', '', '', '2022-12-15 12:15:40');

-- --------------------------------------------------------

--
-- Structure de la table `visitor`
--

CREATE TABLE `visitor` (
  `visitor_id` int(11) NOT NULL,
  `visitor_ip_address` varchar(10) NOT NULL,
  `visitor_time` varchar(2) NOT NULL,
  `visiteur_hour` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`),
  ADD KEY `FK_users_about` (`user_id`);

--
-- Index pour la table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `FK_users_announcement` (`user_id`);

--
-- Index pour la table `announcer`
--
ALTER TABLE `announcer`
  ADD PRIMARY KEY (`announcer_id`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `UPDATE_FK_custom` (`customer_id`),
  ADD KEY `UPDATE_FK_prod` (`product_id`),
  ADD KEY `UPDATE_FK_produc` (`product_quantity`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Index pour la table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Index pour la table `delivery_man`
--
ALTER TABLE `delivery_man`
  ADD PRIMARY KEY (`delivery_man_id`),
  ADD KEY `FK_customer` (`customer_id`);

--
-- Index pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Index pour la table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`),
  ADD KEY `FK_users_logo` (`user_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `FK_visitor` (`visitor_id`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`newsletter_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `UPDATE_FK_customer` (`customer_id`),
  ADD KEY `FK_delivery` (`delivery_id`),
  ADD KEY `FK_payment` (`payment_id`),
  ADD KEY `FK_relaypoint` (`relaypoint_id`),
  ADD KEY `FK_delivery_man` (`delivery_man_id`);

--
-- Index pour la table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Index pour la table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`privilege_id`),
  ADD KEY `FK_role` (`role_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_id`),
  ADD KEY `FK_users_promotion` (`user_id`);

--
-- Index pour la table `publicity`
--
ALTER TABLE `publicity`
  ADD PRIMARY KEY (`publicity_id`),
  ADD KEY `FK_tip` (`tip_id`),
  ADD KEY `FK_announcer` (`announcer_id`);

--
-- Index pour la table `relaypoint`
--
ALTER TABLE `relaypoint`
  ADD PRIMARY KEY (`relaypoint_id`),
  ADD KEY `FK_users` (`user_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `FK_users_role` (`user_id`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`),
  ADD KEY `FK_user_slider` (`user_id`);

--
-- Index pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `FK_category` (`category_id`);

--
-- Index pour la table `tip`
--
ALTER TABLE `tip`
  ADD PRIMARY KEY (`tip_id`),
  ADD KEY `FK_users_tip` (`user_id`);

--
-- Index pour la table `type_payment`
--
ALTER TABLE `type_payment`
  ADD PRIMARY KEY (`type_payment_id`),
  ADD KEY `UPDATE_FK_payment` (`payment_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `announcer`
--
ALTER TABLE `announcer`
  MODIFY `announcer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `delivery_man`
--
ALTER TABLE `delivery_man`
  MODIFY `delivery_man_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `logo`
--
ALTER TABLE `logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `privilege_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `publicity`
--
ALTER TABLE `publicity`
  MODIFY `publicity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `relaypoint`
--
ALTER TABLE `relaypoint`
  MODIFY `relaypoint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tip`
--
ALTER TABLE `tip`
  MODIFY `tip_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_payment`
--
ALTER TABLE `type_payment`
  MODIFY `type_payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `FK_users_about` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `FK_users_announcement` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `UPDATE_FK_custom` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `UPDATE_FK_prod` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `UPDATE_FK_produc` FOREIGN KEY (`product_quantity`) REFERENCES `product` (`product_id`);

--
-- Contraintes pour la table `delivery_man`
--
ALTER TABLE `delivery_man`
  ADD CONSTRAINT `FK_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Contraintes pour la table `logo`
--
ALTER TABLE `logo`
  ADD CONSTRAINT `FK_users_logo` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_visitor` FOREIGN KEY (`visitor_id`) REFERENCES `visitor` (`visitor_id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_delivery` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`delivery_id`),
  ADD CONSTRAINT `FK_delivery_man` FOREIGN KEY (`delivery_man_id`) REFERENCES `delivery_man` (`delivery_man_id`),
  ADD CONSTRAINT `FK_payment` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`),
  ADD CONSTRAINT `FK_relaypoint` FOREIGN KEY (`relaypoint_id`) REFERENCES `relaypoint` (`relaypoint_id`),
  ADD CONSTRAINT `UPDATE_FK_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Contraintes pour la table `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `FK_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `FK_users_promotion` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `publicity`
--
ALTER TABLE `publicity`
  ADD CONSTRAINT `FK_announcer` FOREIGN KEY (`announcer_id`) REFERENCES `announcer` (`announcer_id`),
  ADD CONSTRAINT `FK_tip` FOREIGN KEY (`tip_id`) REFERENCES `tip` (`tip_id`);

--
-- Contraintes pour la table `relaypoint`
--
ALTER TABLE `relaypoint`
  ADD CONSTRAINT `FK_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `FK_users_role` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `FK_user_slider` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `FK_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Contraintes pour la table `tip`
--
ALTER TABLE `tip`
  ADD CONSTRAINT `FK_users_tip` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `type_payment`
--
ALTER TABLE `type_payment`
  ADD CONSTRAINT `UPDATE_FK_payment` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
