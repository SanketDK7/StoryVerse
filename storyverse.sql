-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 07:13 PM
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
-- Database: `storyverse`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio_story`
--

CREATE TABLE `audio_story` (
  `id` int(8) NOT NULL,
  `title` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `audio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audio_story`
--

INSERT INTO `audio_story` (`id`, `title`, `image`, `audio`) VALUES
(1, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 'uploads/images/cinderella-story.jpg', 'uploads/audio/Cinderella.mp3'),
(2, 'This content is a little bit longer.This is a wider card with supporting text below as This content is a little bit longer.', 'uploads/images/fisherman and his wife.jpg', 'uploads/audio/The Fisherman and His Wife.mp3'),
(3, 'This content is a little bit longer.This is a wider card with supporting text below as This content is a little bit longer.', 'uploads/images/lonely-moon.jpg', 'uploads/audio/Lonely Moon.mp3'),
(4, 'This content is a little bit longer.This is a wider card with supporting text below as This content is a little bit longer.', 'uploads/images/little-mermaid.jpg', 'uploads/audio/The Little Mermaid.mp3'),
(5, 'This content is a little bit longer.This is a wider card with supporting text below as This content is a little bit longer.', 'uploads/images/The-snow-queen.jpg', 'uploads/audio/The Snow Queen.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(8) NOT NULL,
  `story` text NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `story`, `image`, `title`) VALUES
(1, 'Samantha \"Sam\" Montgomery is raised by her widowed father Hal, who runs a diner in the San Fernando Valley. Hal marries a vain and greedy woman named Fiona, who has twin daughters, Brianna and Gabriella. Hal later dies in the 1994 Northridge earthquake apparently without leaving a will, leading Fiona to inherit everything. Eight years later, 17-year-old Sam is tormented by her stepfamily, while the community faces a drought. Sam and her best friend Carter Farrell, an aspiring actor, are bullied by the popular clique at school, led by head cheerleader and mean girl Shelby Cummings. Forced to work at the diner to save money to attend Princeton, Sam is looked after by longtime manager Rhonda and confides in her online pen pal \"Nomad\", who shares her dream to attend Princeton to become a writer. Unbeknownst to Sam, \"Nomad\" is Austin Ames, the popular but unhappy school quarterback and Shelby\'s boyfriend, whose father, Andy, expects him to attend the University of Southern California.\r\n\r\nSam agrees to meet \"Nomad\" at the school Halloween dance and Austin breaks up with Shelby, although Shelby refuses to believe him. Fiona refuses to give Sam the night off to attend the dance, but Rhonda and Carter intervene. Rhonda gives Sam a mask and her old wedding dress to wear as \"Cinderella\". Dressed as \"Prince Charming\", Austin reveals to Sam that he is \"Nomad\" but does not recognize her under her mask, and they share a romantic dance. A masked Carter makes out with Shelby after defending her from the unwanted advances of Austin\'s friend, but is forced to drive Sam back to the diner before Fiona discovers she is gone. As they leave, Sam drops her cell phone, which is found by Austin, as he and the missing Cinderella are named homecoming prince and princess. The diner staff stalls Fiona and her daughters, and Sam arrives just in time.\r\n\r\nThe next day, Austin covers the school in flyers, hoping to identify the mysterious Cinderella and Carter is cruelly rejected by Shelby. Austin\'s friends present him with a crowd of girls claiming to be Cinderella, without success. He is accepted to Princeton but unable to tell his father and visits the diner, where Sam tries to tell him the truth. Brianna and Gabriella discover Sam\'s emails with Austin, realizing she\'s the mystery homecoming princess. After failing to convince Austin that they are each Cinderella, the twins present the emails to Shelby, convincing her that Sam schemed to steal Austin away from her. At the school pep rally, Shelby and the twins perform a humiliating skit exposing Sam as Cinderella and she runs home in tears.\r\n\r\nHaving intercepted Sam\'s acceptance letter from Princeton, Fiona forges a rejection and feigns sympathy, telling Sam she has a job at the diner for life. Rhonda encourages Sam not to lose hope and her stepsisters inadvertently uncover a wallpapered-over mural of Hal\'s motto. Inspired, Sam finally stands up to Fiona and quits the diner, leading Rhonda, the rest of the employees and even the customers to leave as well. Moving in with Rhonda, Sam confronts Austin for being afraid to show who he really is, just before the homecoming game. Seeing her leaving before the final play of the game, Austin stands up to his father and runs after Sam. He apologizes and they share their first kiss in the rain as the drought suddenly ends.\r\n\r\nSam finds her father\'s will hidden in her childhood fairytale book, revealing that everything was left to her, including the house and diner. As the rightful owner, Sam is able to sell her stepfamily\'s cars to pay for college, while Fiona claims to have never seen the will before, despite having signed it as a witness. Arrested for fraud and violating California child labor laws by the LAPD and D.A., she makes a deal with the latter to work her debt off at the diner, now co-owned by Rhonda; her daughters, after retrieving Sam\'s acceptance letter from the trash, are also forced to work with her as bus girls. Andy accepts Austin\'s decision to attend Princeton. Carter lands a commercial and rejects Shelby for Astrid, the school\'s goth DJ and announcer. Austin returns Sam\'s cell phone and they begin a relationship, driving off to Princeton together.', 'uploads/stories_image/cinderella-story.jpg', 'Cinderella'),
(2, 'There is a poor fisherman who lives with his wife in a hovel by the sea. One day the fisherman catches a fish who claims to be able to grant wishes and begs to be set free. The fisherman kindly releases it. When his wife hears the story, she says he ought to have had the fish grant him a wish. She insists that he go back and ask the flounder to grant her wish for a nice house.\r\n\r\nThe fisherman reluctantly returns to the shore but is uneasy when he finds that the sea seems to become turbid, as it was so clear before. He makes up a rhyme to summon the flounder, and it grants the wife\'s wish. The fisherman is pleased with his new wealth, but the wife is not and demands more, and demands that her husband go back and wish that he be made a king. Reluctantly, he does and gets his wish. But again and again, his wife sends him back to ask for more and more. The fisherman knows this is wrong but there is no reasoning with his wife. He says they should not annoy the flounder, and be content with what they have been given, but his wife is not content. Each time, the flounder grants the wishes with the words: \"just go home again, she has it already\" or similar, but each time the sea grows rougher and rougher.\r\n\r\nEventually, the wife wishes to command the sun, moon, and heavens, and she sends her husband to the flounder with the wish \"I want to become equal to God\". The flounder just tells the fisherman to go home, stating that \"she is sitting in her old hovel again\". And with that, the sea becomes calm once more, and the fisherman and his wife are once more living in nothing but their old, dirty hovel.', 'uploads/stories_image/fisherman and his wife.jpg', 'Fisher Man And His Wife');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `username`, `password`) VALUES
('Durvesh Chaudhari', 'durveshchaudhari11@gmail.com', 'Mrdurvesh11', '123');

-- --------------------------------------------------------

--
-- Table structure for table `video_story`
--

CREATE TABLE `video_story` (
  `id` int(8) NOT NULL,
  `title` varchar(150) NOT NULL,
  `video` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_story`
--

INSERT INTO `video_story` (`id`, `title`, `video`) VALUES
(2, 'Cinderela', 'uploads/video/Cinderella.mp4'),
(3, 'jack and the beanstalk', 'uploads/video/Jack and the Beanstalk.mp4'),
(4, 'Snow Queen', 'uploads/video/Snow Queen.mp4'),
(5, 'Snow White and the Seven Dwarfs Story', 'uploads/video/Snow White and the Seven Dwarfs Story.mp4'),
(6, 'The Ant and the Grasshopper', 'uploads/video/The Ant and the Grasshopper.mp4'),
(7, 'The Fisherman and His Wife', 'uploads/video/The Fisherman and His Wife.mp4'),
(8, 'The Little Meriend', 'uploads/video/The Little Mermaid.mp4'),
(9, 'The Lonely Moon', 'uploads/video/The Lonely Moon.mp4'),
(10, 'The Ugly Duckling', 'uploads/video/The Ugly Duckling.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio_story`
--
ALTER TABLE `audio_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_story`
--
ALTER TABLE `video_story`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio_story`
--
ALTER TABLE `audio_story`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `video_story`
--
ALTER TABLE `video_story`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
