-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2023 at 11:55 AM
-- Server version: 5.7.44
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warnerx3_DnDFinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` bigint(13) NOT NULL,
  `userID` bigint(13) NOT NULL,
  `admin_user_name` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `userID`, `admin_user_name`, `admin_password`) VALUES
(1, 1, 'test', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `completedcourses`
--

CREATE TABLE `completedcourses` (
  `courseid` char(13) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completedcourses`
--

INSERT INTO `completedcourses` (`courseid`, `user_id`) VALUES
('0-672-31753-1', 1),
('0-672-31698-9', 1),
('0-672-31703-5', 2),
('0-672-31749-8', 1),
('0-672-31697-8', 2),
('0-672-31698-9', 4043542408),
('0-672-31697-8', 4043542408),
('610610', 5713117084),
('0-672-31756-7', 5713117084),
('0-672-31697-8', 5713117084);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` char(20) NOT NULL,
  `topic` char(50) DEFAULT NULL,
  `description` char(100) DEFAULT NULL,
  `modality` char(100) DEFAULT NULL,
  `numberStudents` int(11) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `topic`, `description`, `modality`, `numberStudents`, `credits`) VALUES
('0-672-31697-8', 'Intro to Basics', 'Learn the basics of Dungeons & Dragons.', 'Online', 50, 3),
('0-672-31698-9', 'Abilities and Skills', 'Learn the abilities and skills that a player has.', 'Online', 50, 3),
('0-672-31701-2', 'Combat Basics', 'Learn the basics of combat in Dungeons & Dragons.', 'Online', 50, 3),
('0-672-31702-4', 'Combat Actions', 'Learn what combat actions are and how to effectively use them.', 'Online', 50, 3),
('0-672-31703-5', 'Barbarian Class Guide', 'Learn how to play the Barbarian Class', 'Online', 35, 3),
('0-672-31707-8', 'Bard Class Guide', 'Learn how to play the Bard Class', 'Online', 35, 3),
('0-672-31711-1', 'Cleric Class Guide', 'Learn how to play the Cleric Class', 'Online', 35, 3),
('0-672-31712-3', 'Druid Class Guide', 'Learn how to play the Druid Class', 'Online', 35, 3),
('0-672-31714-6', 'Fighter Class Guide', 'Learn how to play the Fighter Class', 'Online', 35, 3),
('0-672-31718-8', 'Monk Class Guide', 'Learn how to play the Monk Class', 'Online', 35, 3),
('0-672-31724-2', 'Paladin Class Guide', 'Learn how to play the Paladin Class', 'Online', 35, 3),
('0-672-31725-3', 'Ranger Class Guide', 'Learn how to play the Ranger Class', 'Online', 35, 3),
('0-672-31728-4', 'Rogue Class Guide', 'Learn how to play the Rogue Class', 'Online', 35, 3),
('0-672-31736-7', 'Sorcerer Class Guide', 'Learn how to play the Sorcerer Class', 'Online', 35, 3),
('0-672-31738-3', 'Warlock Class Guide', 'Learn how to play the Warlock Class', 'Online', 35, 3),
('0-672-31742-2', 'Wizard Class Guide', 'Learn how to play the Wizard Class', 'Online', 35, 3),
('0-672-31747-6', 'Artificer Class Guide', 'Learn how to play the Artificier Class', 'In-Person', 35, 3),
('0-672-31749-8', 'Blood Hunter Class Guide', 'Learn how to play the Druid Class', 'In-Person', 20, 3),
('0-672-31753-1', 'Intro to Subclasses', 'Learn what subclasses are and how to play with a subclass', 'In-Person', 25, 3),
('0-672-31756-7', 'Dungeon Master Class Guide', 'Learn how to be a Dungeon Master', 'In-Person', 25, 3);

-- --------------------------------------------------------

--
-- Table structure for table `studentincourse`
--

CREATE TABLE `studentincourse` (
  `courseid` char(13) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentincourse`
--

INSERT INTO `studentincourse` (`courseid`, `user_id`) VALUES
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 2),
('', 2),
('', 2),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 2),
('', 2),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 5713117084),
('', 2),
('', 5713117084),
('', 5713117084),
('', 2),
('', 2),
('', 2),
('', 5713117084),
('', 2),
('', 5713117084),
('', 5713117084),
('', 5713117084);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Topics` varchar(200) NOT NULL,
  `Descrip` varchar(200) NOT NULL,
  `Demog` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `user_name`, `password`, `Name`, `Address`, `Topics`, `Descrip`, `Demog`) VALUES
(1, 1, 'jared', 'jared', '', '', '', '', ''),
(2, 2, 'dhruv', 'dhruv', '', '', '', '', ''),
(3, 6903561206, 'xavier', 'xavier', '', '', '', '', ''),
(4, 5508721796, 'stavros', 'stavros', '', '', '', '', ''),
(7, 5713117084, 'John', 'john', 'John', '20 Peterson Ave', 'I like Dnd', 'i want to get better at dnd', 'I like to swim and play board games');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `completedcourses`
--
ALTER TABLE `completedcourses`
  ADD KEY `courseid` (`courseid`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
