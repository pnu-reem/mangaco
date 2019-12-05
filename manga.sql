-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2019 at 08:37 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 5.6.40-13+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manga`
--

-- --------------------------------------------------------

--
-- Table structure for table `Favourite`
--

CREATE TABLE `Favourite` (
  `user_id` int(11) NOT NULL,
  `manga_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Favourite`
--

INSERT INTO `Favourite` (`user_id`, `manga_id`) VALUES
(2, 1),
(1, 2),
(1, 4),
(2, 7),
(3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `Genre`
--

CREATE TABLE `Genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Genre`
--

INSERT INTO `Genre` (`id`, `name`, `description`) VALUES
(1, 'Action', 'The action genre in anime depicts extremely high levels of intense action. More often than not, you\'ll be witnessing thrilling battles and action-packed fight scenes in the shows from this genre. These series will make you jump off your seat or knock your socks off. Overall, the action genre usually possesses lots of battle scenes, fluid animation, and highly-engaging elements that will make your adrenaline rush!'),
(2, 'Adventure', 'The adventure genre is about travelling and undertaking an adventure in a certain place or around the world (which may sometimes escalate to the whole universe or even to the other dimensions). In this genre, the main characters don’t usually stay in one place. They venture into several different places, usually with a goal in mind (e.g. searching for treasure, exploring some new place, defeating a heinous villain, or saving the world). Adventure anime are so broad and flexible that these shows can usually stretch to a huge number of episodes as well as overlap with multiple genres, usually with action.'),
(3, 'Comedy', 'The main purpose of the comedy genre is…you got it…to make you laugh! If it fails to make you laugh or at least make you giggle, then it’s a failure. But then again, humor can depend on your personal sense of humor. The animation may not be as impressive as TV shows in the action and drama category, but that can be forgiven for the laughs. Funny moments, hilarious scenes, wacky dialogue, comical happenings—all of these are covered by the comedy genre in anime!'),
(4, 'Drama', 'Bringing us tears and a wave of emotions is basically what the drama genre does best! Drama anime tends to connect the viewers to the experiences of the characters. This results in viewers feeling what the characters are going through. Whether it\'s a tickle of emotion or a barrage of feelings, the goal of these series is to touch our hearts. In anime, one of the greatest signs that the drama effectively worked is if it was able to make you cry.'),
(5, 'Horror', 'It’s not difficult to spot the horror genre in anime. Usually, if there are ghosts, monsters, gore, and creeps, then you’re likely watching a horror series. Heavy gore and bloody violence is a common trait. The most important factor for a show to be considered horror is its ability to scare and creep you out.'),
(6, 'Romance', 'Romance is all about love and sweet moments. Shows involved with this genre often have the skill to tug everyone’s heartstrings with their romantic scenes and tender moments. The focus of these shows is the romantic relationships between the characters as well as their blooming love with one another. You’ll often find romance anime tightly tied with the shoujo subgenre, but it also works pretty well with comedy, harem, and drama.');

-- --------------------------------------------------------

--
-- Table structure for table `GenreManga`
--

CREATE TABLE `GenreManga` (
  `genre_id` int(11) NOT NULL,
  `manga_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GenreManga`
--

INSERT INTO `GenreManga` (`genre_id`, `manga_id`) VALUES
(2, 1),
(3, 1),
(6, 1),
(5, 2),
(3, 3),
(6, 3),
(1, 4),
(4, 4),
(5, 4),
(4, 7),
(6, 7),
(4, 14),
(5, 14),
(3, 15),
(4, 15),
(5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `Manga`
--

CREATE TABLE `Manga` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `cover_image_filename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Manga`
--

INSERT INTO `Manga` (`id`, `name`, `description`, `author`, `year`, `cover_image_filename`) VALUES
(1, 'Gokusen', ' Fresh out of college, Kumiko \"Yankumi\" Yamaguchi becomes a math teacher at an all-boys high school. Unfortunately for her, she\'s assigned by the school board as the homeroom teacher for class 2-D, which happens to be the class of delinquent students. When the class attempts to make a living hell out of Yankumi\'s career, they fail as her persistence and aggression gain their respect. However, little does anyone in the school know that Yankumi is actually heir to the Kuroda Group - one of Tokyo\'s most powerful yakuza clans.', 'MORIMOTO Kozueko', 1999, 'images/gokusen.jpg'),
(2, 'Mimi no Kaidan', 'Itou Junji manga marathon! These were more classic Japanese ghost stories than his other paranormal/psychological stuff\r\nAlso titled \"Mimi\'s Ghost Stories\". A series of stories that follows Mimi, a girl who can\'t seem to escape the supernatural occurrences that continue around her.\r\nMysterious figures, strange neighbors, and deadly visitors lurk within the pages of this horror collection by the legendary Junji Ito. Come dive into this terrifying ride, if you dare.\r\nThe stories themselves weren\'t originally written by Ito Junji. Rather, they were originally popular urban legends (\"Kaidan\"), which were collected by Ito Junji and edited by him.\r\n', 'ITOU Junji', 2002, 'images/Mimi_no_Kaidan.png'),
(3, 'Horimiya', 'Hori is your average teenage girl... who has a side she wants no one else to ever find out about. Then there\'s her classmate Miyamura, your average glasses-wearing boy in school and a totally different person out. When the two meet unexpectedly, they discover each others\' secrets and develop an unexpected friendship.\r\n', 'HERO', 2011, 'images/horimiya.jpg'),
(4, 'Shingeki no Kyojin', 'In a world entirely ruled by giants, the human race, which has turned into their food, has surrounded its residential zones with immense walls, which both prevent their freedom outside the walls and protect them from incursions. However, as a result of the appearance of supergiants who cross the wall, a desperate struggle begins and the young heroes, who have lost their parents, fight the giant as a training corps, with a view to regaining their freedom. ', 'ISAYAMA Hajime', 2009, 'images/shingeki.jpg'),
(7, 'Taiyou no Ie', '\r\nBack in the day, that place was a house filled with magic - a place where you ended up smiling even if you were crying. Surely, an invisible wizard must have lived there. Or so I thought.\r\n\r\nWhat\'s a young child to do when her mother leaves her father for another man? Or when her father remarries a woman who brings along a child from a previous marriage? Or when her childhood neighbor friend invites her to live with him? ', 'TAAMO', 2010, 'images/taiyou.jpg'),
(14, 'Kyoukotsu no Yume', '\"If there\'s such a thing as a soul, does it remain in this world as long as the bones exist? Will all of my sins and sorrows remain in this world forever?\"\r\n\r\nTokyo, 1952. A beautiful, mysterious woman who\'s haunted by dark dreams claims to have murdered her ex-husband... three times. Meanwhile, a small seaside town is terrorized by a bizarre series of deaths. Four seemingly separate murders are linked by strange, unsettling dreams of bones... Is something supernatural going on, or are the real demons found in the depths of the human mind?\r\n', 'KYOUGOKU Natsuhiko', 2010, 'images/kyoukotsu_no_yume.png'),
(15, 'Muunira', 'jkuhrsygf hskiuyhskuh fsikurjk hfrsiku', 'abeer', 2019, 'images/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `email`, `username`, `password`) VALUES
(1, 'reem.codes@gmail.com', 'reema', 'reem'),
(2, 'reem.brain@gmail.com', 'gin', 'reem'),
(3, 'abeer@gmail.com', 'abeer', 'abeer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Favourite`
--
ALTER TABLE `Favourite`
  ADD PRIMARY KEY (`user_id`,`manga_id`),
  ADD KEY `manga_id` (`manga_id`);

--
-- Indexes for table `Genre`
--
ALTER TABLE `Genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `GenreManga`
--
ALTER TABLE `GenreManga`
  ADD PRIMARY KEY (`genre_id`,`manga_id`),
  ADD KEY `manga_id` (`manga_id`);

--
-- Indexes for table `Manga`
--
ALTER TABLE `Manga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Genre`
--
ALTER TABLE `Genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Manga`
--
ALTER TABLE `Manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Favourite`
--
ALTER TABLE `Favourite`
  ADD CONSTRAINT `Favourite_ibfk_1` FOREIGN KEY (`manga_id`) REFERENCES `Manga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Favourite_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `GenreManga`
--
ALTER TABLE `GenreManga`
  ADD CONSTRAINT `GenreManga_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `Genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `GenreManga_ibfk_2` FOREIGN KEY (`manga_id`) REFERENCES `Manga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
