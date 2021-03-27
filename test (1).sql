-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 13 Δεκ 2019 στις 10:26:55
-- Έκδοση διακομιστή: 10.4.8-MariaDB
-- Έκδοση PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `test`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `type` text NOT NULL,
  `price` double NOT NULL,
  `plot` text NOT NULL,
  `picture` text NOT NULL,
  `goes` text NOT NULL,
  `html_id` text NOT NULL,
  `catchphrase` text NOT NULL,
  `director` text NOT NULL,
  `starring` text NOT NULL,
  `release_date` date NOT NULL,
  `how_long` int(11) NOT NULL,
  `from_where` text NOT NULL,
  `age_restrictions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `movies`
--

INSERT INTO `movies` (`id`, `title`, `type`, `price`, `plot`, `picture`, `goes`, `html_id`, `catchphrase`, `director`, `starring`, `release_date`, `how_long`, `from_where`, `age_restrictions`) VALUES
(1, 'coco', 'Animation', 4, 'In Santa Cecilia, Mexico, Miguel dreams of becoming a musician, even though his family strictly forbids it. His great-great-grandmother Imelda was married to a man who left her and their daughter...', 'coco.jpg', 'new', 'coco', '', '', '', '0000-00-00', 0, '', ''),
(2, 'Annabelle', 'Thriller', 3, 'In Santa Monica, California, John Form, a doctor, presents his expectant wife Mia with a rare vintage porcelain doll as a gift for their first child to be placed in a collection of dolls in their daughter\'s nursery...', 'annabelle.jpg', 'new', 'annabelle', '', '', '', '0000-00-00', 0, '', ''),
(3, 'Hunger Games 4', 'Action', 3, 'As punishment for a failed past rebellion, the 12 districts of the nation of Panem are forced by the Capitol to select two tributes, one boy and one girl between ages 12 and 18, to fight to the death in...', 'hungergames.jpg', 'new', 'hunger', '', '', '', '0000-00-00', 0, '', ''),
(4, 'Avengers: The end game', 'Action', 3, '\"I STILL BELIEVE IN HEROES\"', 'avenger.jpg', 'carousel', 'avengers', '\"I STILL BELIEVE IN HEROES\"', '', '', '0000-00-00', 0, '', ''),
(5, 'Joker', 'Action/Drama', 3, '\"IS IT JUST ME OR IS IT GETTING CRAZIER OUT THERE?\"', 'joker.jpg', 'carousel', 'joker', '\"IS IT JUST ME OR IS IT GETTING CRAZIER OUT THERE?\"', '', '', '0000-00-00', 0, '', ''),
(6, 'The Lucky One', 'Romance', 3, '\"HE WAS THE TOAST TO HER BUTTER.\"', 'theluckyone2.jpg', 'carousel', 'lucky', '\"HE WAS THE TOAST TO HER BUTTER.\"', '', '', '0000-00-00', 0, '', '');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orders`
--

CREATE TABLE `orders` (
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`) VALUES
(1, 'kostas', '1234', 1),
(2, 'xrysa', '1111', 0);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
