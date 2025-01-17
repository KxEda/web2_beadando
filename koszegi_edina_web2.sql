-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Nov 30. 20:41
-- Kiszolgáló verziója: 10.4.16-MariaDB
-- PHP verzió: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `koszegi_edina_web2`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `comment`
--

INSERT INTO `comment` (`id`, `news_id`, `user_id`, `created_at`, `content`) VALUES
(1, 2, 17, '2020-11-27', 'Szuper! Máris nézem a kínálatot!'),
(2, 2, 17, '2020-11-25', 'Sziasztok!\r\n\r\nA 4-es számú női kesztyű várható fehér-fekete színkombinációban is?'),
(5, 10, 28, '2020-11-30', 'Szuper!');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `menuitem`
--

CREATE TABLE `menuitem` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `menu_item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `menuitem`
--

INSERT INTO `menuitem` (`id`, `title`, `link`, `menu_item_id`) VALUES
(2, 'Home', './', NULL),
(3, 'News', './news.php', 2),
(4, 'Register', './register.php', NULL),
(5, 'Login', './login.php', NULL),
(6, 'Logout', './logout.php', NULL),
(7, 'Add news', './add_news.php', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created_at`, `user_id`) VALUES
(2, 'Első hír', 'Megérkeztek a téli bélelt, bőr motoros kesztyűk! \r\nAz első héten 20% kedvezmény!', '2020-11-18', 2),
(10, 'Második hír', 'BlackFriday!\r\n\r\nJövőhét pénteken minden női és férfi kezeslábas bőrruha 50%!', '0000-00-00', 2),
(11, 'Harmadik hír', 'Motoros túra!\r\n\r\nKedves motoros barátaim!\r\nAz alábbi linken megtekinthető a legutóbbi Balaton kerülő túrám:\r\nwww.valamivideonezoportal.hu/motorosbalatonostura', '0000-00-00', 17),
(15, 'Negyedik hír', 'Új áru!', '2020-11-27', 17),
(20, 'Ötödik hír', 'Weboldal karbantartás!\r\n\r\nKedves Látogatóink!\r\n\r\nA 2020.12.01 16:00 és 18:00 közötti időszakban a weboldal karbantartás miatt nem elérhető.\r\n\r\nSzíves megértésüket köszönjük!', '2020-11-28', 24),
(24, 'Hatodik hír', 'Használt motor eladó!\r\n\r\nKawasaki ER-5 2001-es évjárat, 2021.05.hó műszakival, kihasználatlanság miatt eladó.\r\n\r\nÉrdeklődni: +3699/12345678 telefonszámon.\r\n', '2020-11-29', 27),
(25, 'Teszt hír', 'A három utolsó hír megjelenítésének tesztelése (1).', '2020-11-30', 28);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'registered_user');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(2, 'edo', 'edo@edo.com', 'edo', 1),
(17, 'a', 'a@a.com', 'abxxB7HlIeckU', 2),
(18, 'b', 'b@b.com', 'aba/A2/wC9TVk', 2),
(19, 'c', 'c@c.com', 'abTnE83T.1gI6', 2),
(20, 'd', 'd@d.com', 'abFA4FtbLkSy.', 2),
(21, 'bob', 'bob@bob.com', 'bobpw', 2),
(22, 'ww', 'w@w.com', 'abMGh52G2uDdQ', 2),
(23, 'qwe', 'qwe@wqe.com', 'ab6p5vl3jJVGg', 2),
(24, 'sfsf', 'sfsf@a.com', 'abFZSxKKdq5s6', 2),
(25, 'AA', 'a@ab.com', 'abxxB7HlIeckU', 2),
(26, 'AA', 'proba@proba', 'abCzJCqKqyTm2', 2),
(27, 'proba', 'proba@proba', 'abg0p.MdZgRXs', 2),
(28, 'Test', 'test@test.com', 'abgOeLfPimXQo', 2);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`);

--
-- A tábla indexei `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_item_id` (`menu_item_id`);

--
-- A tábla indexei `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT a táblához `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`);

--
-- Megkötések a táblához `menuitem`
--
ALTER TABLE `menuitem`
  ADD CONSTRAINT `menuitem_ibfk_1` FOREIGN KEY (`menu_item_id`) REFERENCES `menuitem` (`id`);

--
-- Megkötések a táblához `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Megkötések a táblához `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
