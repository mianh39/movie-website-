-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 10:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE DATABASE IF NOT EXISTS `user` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `user`;




CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `poster` text NOT NULL,
  `poster1` text NOT NULL,
  `trailer` text NOT NULL,
  `description` text NOT NULL,
  `year` text NOT NULL,
  `genre` varchar(100) NOT NULL,
  `IMDB` float NOT NULL,
  `director` text NOT NULL,
  `hours` varchar(30) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `Name`, `poster`, `poster1`, `trailer`, `description`, `year`, `genre`, `IMDB`, `director`, `hours`, `rate`) VALUES
(1, 'Avatar: The Way of Water ', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/t6HIqrRAclMCA60NsSmeqe9RmNV.jpg', 'https://image.tmdb.org/t/p/original/ovM06PdF3M8wvKb06i4sjW3xoww.jpg', 'd9MyW72ELq0', 'Set more than a decade after the events of the first film, learn the story of the Sully family (Jake, Neytiri, and their kids), the trouble that follows them, the lengths they go to keep each other safe, the battles they fight to stay alive, and the tragedies they endure.', '2022', 'Science Fiction, Adventure, Action', 7.8, 'James Cameron', '3 hours 12 minutes', 0),
(2, 'Blue Beetle', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/xQoej3bB0ShPJZEkEhlYst5MViI.jpg', 'https://www.themoviedb.org/t/p/original/fGQcDkXuLPXpdztKj7VqtDNrKZG.jpg', 'vW7AX64EQDM', 'Jaime Reyes suddenly finds himself in possession of an ancient relic of alien biotechnology called the Scarab. When the Scarab chooses Jaime to be its symbiotic host, he\'s bestowed with an incredible suit of armor that\'s capable of extraordinary and unpredictable powers, forever changing his destiny as he becomes the superhero Blue Beetle.', '2023', 'Action, Science Fiction', 10, 'A DC movies', '3 hours 12 minutes', 0),
(3, 'The Super Mario Bros. Movie', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/qNBAXBIQlnOThrVvA6mA2B5ggV6.jpg', 'https://www.themoviedb.org/t/p/original/lWqjXgut48IK5f5IRbDBAoO2Epp.jpg', 'TnGl01FkMMo', 'While working underground to fix a water main, Brooklyn plumbers—and brothers—Mario and Luigi are transported down a mysterious pipe and wander into a magical new world. But when the brothers are separated, Mario embarks on an epic quest to find Luigi.', '2023', 'Animation, Adventure, Family, Fantasy, Comedy', 7.5, 'Shigeru Miyamoto', '1 hours 32 minutes', 0),
(4, 'Demon Slayer: Kimetsu no Yaiba', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/xUfRZu2mi8jH6SzQEJGP6tjBuYj.jpg', 'https://www.themoviedb.org/t/p/original/7e9maFsRJanwrR7YFgn6rEmudiX.jpg', 'VQGCKyvzIM4', 'It is the Taisho Period in Japan. Tanjiro, a kindhearted boy who sells charcoal for a living, finds his family slaughtered by a demon. To make matters worse, his younger sister Nezuko, the sole survivor, has been transformed into a demon herself. Though devastated by this grim reality, Tanjiro resolves to become a “demon slayer” so that he can turn his sister back into a human, and kill the demon that massacred his family.', '2019', 'Animation, Action & Adventure, Fantasy\r\n', 8.7, 'Haruo Sotozaki', '1 hours 55 minutes', 0),
(5, 'Suzume', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/vIeu8WysZrTSFb2uhPViKjX9EcC.jpg', 'https://www.themoviedb.org/t/p/original/ceYZCBfwbBwSpGJ6PapNVw5jqLG.jpg', '6R6q2fAp2n4', 'Suzume, 17, lost her mother as a little girl. On her way to school, she meets a mysterious young man. But her curiosity unleashes a calamity that endangers the entire population of Japan, and so Suzume embarks on a journey to set things right.', '2022', 'Animation, Drama, Adventure, Fantasy', 8.1, 'Makoto Shinkai', '2 hours 3 minutes', 0),
(6, 'Minions: The Rise of Gru', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/wKiOkZTN9lUUUNZLmtnwubZYONg.jpg', 'https://www.themoviedb.org/t/p/original/4bRbBquZDrqkUnj5wHX7KXkWbnR.jpg', '6DxjJzmYsXo', 'A fanboy of a supervillain supergroup known as the Vicious 6, Gru hatches a plan to become evil enough to join them, with the backup of his followers, the Minions.', '2022', 'Animation, Comedy, Family', 7.4, 'Kyle Balda', '1 hours 27 minutes', 0),
(7, 'Shazam! Fury of the Gods', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/3GrRgt6CiLIUXUtoktcv1g2iwT5.jpg', 'https://www.themoviedb.org/t/p/original/ot1WzjD045nA1QsCHtuZE8SOBLB.jpg', 'l37LjoV9W7M', 'Billy Batson and his foster siblings, who transform into superheroes by saying \"Shazam!\", are forced to get back into action and fight the Daughters of Atlas, who they must stop from using a weapon that could destroy the world.\r\n\r\n', '2023', 'Action, Comedy, Fantasy', 6.9, 'David F. Sandberg', '2 hours 10 minutes', 0),
(8, 'Mighty Morphin Power Rangers: Once & Always', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/vc87upO8vcAGj9OmgH3AIz6ikKB.jpg', 'https://www.themoviedb.org/t/p/original/vcNXzOfACCXZA7vb8SNde0LUC9o.jpg', 'ZKE2DC7Xzog', 'After tragedy strikes, an unlikely young hero takes her rightful place among the Power Rangers to face off against the team\'s oldest archnemesis.', '2023', 'Action, Science Fiction, Fantasy', 7.2, 'Charlie Haskell', '59 minutes', 0),
(9, 'The Black Demon', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/fNYqjsM0nXCnl7QLyBpecdqoFOp.jpg', 'https://www.themoviedb.org/t/p/original/8kZu1HNYRI0133Rb1CoQkLoQRy6.jpg', 'RpYgzeJ4Cn0', 'Oilman Paul Sturges\' idyllic family vacation turns into a nightmare when they encounter a ferocious megalodon shark that will stop at nothing to protect its territory. Stranded and under constant attack, Paul and his family must somehow find a way to get his family back to shore alive before it strikes again in this epic battle between humans and nature.', '2023', 'Horror, Thriller', 7.3, 'Adrian Grünberg', '1 hours 40 minutes', 0),
(10, 'Dead Ringers', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/3GZB7pnyAw6QV053TwxiqvRyOw3.jpg', 'https://www.themoviedb.org/t/p/original/tTpNW3zAYl37iKSheYSLgXBled1.jpg', 'FA_XOruRFfU', 'Elliot and Beverly Mantle are twins who share everything: drugs, lovers, and an unapologetic desire to do whatever it takes — including pushing the boundaries on medical ethics — in an effort to challenge antiquated practices and bring women’s healthcare to the forefront.', '2023', 'Mystery, Drama', 6.3, 'Alice Birch', '1 hours 32 minutes', 0),
(11, 'The Pope\'s Exorcist', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/9JBEPLTPSm0d1mbEcLxULjJq9Eh.jpg', 'https://www.themoviedb.org/t/p/original/4n6pKjKlrDApwlw7k36MkcQHgc9.jpg', 'YJXqvnT_rsk', 'Father Gabriele Amorth, Chief Exorcist of the Vatican, investigates a young boy\'s terrifying possession and ends up uncovering a centuries-old conspiracy the Vatican has desperately tried to keep hidden.', '2023', 'Horror, Thriller', 6.5, 'Julius Avery', '1 hours 43 minutes', 0),
(12, 'John Wick: Chapter 3 - Parabellum', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/ziEuG1essDuWuC5lpWUaw1uXY2O.jpg', 'https://www.themoviedb.org/t/p/original/vVpEOvdxVBP2aV166j5Xlvb5Cdc.jpg', 'M7XM597XO94', 'Super-assassin John Wick returns with a $14 million price tag on his head and an army of bounty-hunting killers on his trail. After killing a member of the shadowy international assassin’s guild, the High Table, John Wick is excommunicado, but the world’s most ruthless hit men and women await his every turn.', '2019', 'Characters, Story', 8.1, 'Chad Stahelski', '2 hours 11 minutes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`name`, `id`) VALUES
('Action', 1),
('Adventure', 2),
('Animation', 3),
('Comedy', 4),
('Crime', 5),
('Documentary', 6),
('Drama', 7),
('Family', 8),
('Fantasy', 9),
('History', 10),
('Horror', 11),
('Music', 12),
('Mystery', 13),
('Romance', 14),
('Science', 15),
('Fiction', 16),
('TV Movie', 17),
('Thriller', 18),
('War', 19),
('Wester', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`) VALUES
('1', '1', '1@gmail.com'),
('11', '11', '11@gmail.com'),
('12', '12', '12@gmail.com'),
('123', '1', '1@gmail.com'),
('1234', '1234', '1234@gmail.com'),
('admin', '123', 'thinhkhainguyen@gmail.com'),
('kem', '123456', 'kem@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
