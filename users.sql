-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 20, 2019 at 06:18 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `24pill_code_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`post_id`, `post_title`, `post_content`, `post_date`, `user_email`) VALUES
(7, 'i am a writer', 'a lionrna lionrna lion has a tailrnit has a big headrnand a very small waist', '2019-08-05 21:14:08', 'jdoe@gmail.com'),
(8, 'lorem text', 'lorem ipsum dolor sit amet consectetur, adipisicing elit. itaque repudiandae quidem aspernatur. odit nemo eos deserunt unde veniam dolorum aut commodi, alias minus laudantium labore harum iure, voluptatum dolor laborum. lorem ipsum dolor sit amet, consectetur adipisicing elit. deserunt praesentium quo laudantium delectus asperiores. assumenda odio voluptatum magni quidem a explicabo fugiat omnis, ullam molestiae accusantium dignissimos ut earum eius?', '2019-08-05 21:53:29', 'jdoe@gmail.com'),
(9, 'the real monster', 'i am a monster of all kindsrnmy world spans across scared and terrified heartsrni fear no one till the greatestrni fall to my face in shame and regretrn', '2019-08-16 16:07:34', 'jdoe@gmail.com'),
(10, 'i am a human being', 'i am a human beingrni love to goffrncall me beev', '2019-08-16 16:50:19', 'jdoe@gmail.com'),
(11, 'cooking rice', 'cooking rice has been my dreamrni get stomach uprnwhich makes me upset', '2019-08-16 16:51:09', 'jdoe@gmail.com'),
(12, 'jeff lahm', 'jeff lahm is the best programmer ever to live on earthrnwell i think he wasrnat least that is what i thoughtrnuntil i met spongebob square shorts', '2019-08-16 17:33:40', 'jefflahm@gmail.com'),
(13, 'cooking rice', 'hello there i am a write cookerrni have a head gtreater than that of herod', '2019-08-18 05:34:44', 'jdoe@gmail.com'),
(14, 'lorem text', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. molestiae,rn a amet. quisquam saepe cumque ratione, odit magnam ducimus qui,rn libero minus nulla, optio porro dicta deleniti! sequi nihil doloribus tempora.rnvoluptate odio beatae, mollitia optio in quaerat cum, adipisci blanditiisrn ipsa ut qui? facilis accusamus corporis a asperiores voluptatem debitisrn cum? harum repudiandae, cumque ducimus quas corporis facere dolores esse.rnporro ad praesentium, architecto ab dolorem suscipit eos incidunt? rna autem consectetur nesciunt. modi temporibus dolores laboriosam rnquibusdam, natus recusandae ipsa aliquid. dolorum est quae earum rntempora asperiores voluptatibus corrupti?rnsunt sequi corrupti animi quasi aspernatur temporibus omnis fugarn dolore voluptatibus commodi ex, incidunt vero nulla. ab repudiandae rncum voluptatibus possimus laudantium error qui unde culpa ipsa neque?rn ab, illum!rnquam fuga laudantium inventore porro asperiores aliquamrn dolorum voluptates sapiente tempora eligendi nulla laboriosam commodirn minima incidunt mollitia necessitatibus possimus alias, neque deserunt?rn veritatis ratione natus dignissimos, amet vero consequuntur.', '2019-08-18 06:08:53', 'jdoe@gmail.com'),
(15, 'new line text', 'lorem ipsum dolor sit amet consectetur adipisicing elit. expedita quaerat molestias ab hic at nihil perspiciatis quasi adipisci quia suscipit, voluptates officia ullam ipsum, modi deserunt maxime. aliquid, veritatis nam!rnperspiciatis nesciunt accusamus illum dignissimos voluptatibus at expedita porro cum ex eaque dicta aliquam atque laborum, quidem ab iure quo, alias cupiditate consectetur unde sunt iusto? repellat nemo amet corporis.rnofficiis magnam exercitationem deleniti, incidunt excepturi aut esse nesciunt accusamus, omnis earum dignissimos. laboriosam error, velit consectetur autem ad dolore, assumenda praesentium porro ratione deserunt nam maiores pariatur aspernatur facilis!rnhic autem, culpa dolor enim maiores quidem quo, deleniti est ut recusandae animi itaque eius fugit id quis magnam et aliquam, ullam tempora veritatis repellat soluta laborum ea! sint, illo.rnrecusandae maiores expedita repudiandae nostrum nisi adipisci deserunt fuga architecto similique blanditiis illum, temporibus itaque molestiae earum iste totam illo sed dolorem nulla amet aliquam voluptate. excepturi sunt non ipsam.rntempore cupiditate excepturi deleniti enim eaque aliquid ipsam vitae reprehenderit ipsa tempora, sequi adipisci aliquam laboriosam quaerat aspernatur voluptate, nostrum, est qui nulla facilis voluptates nam quas! aut, adipisci reiciendis.rnipsam saepe corrupti aut dolorem! odit reiciendis voluptas deserunt voluptate, corrupti dolorem praesentium voluptatem odio magni voluptates molestiae commodi perferendis at beatae libero exercitationem accusantium cupiditate hic fugiat repellendus asperiores.rnrecusandae aspernatur rerum iusto cupiditate iure? assumenda delectus, porro tenetur doloribus voluptatum veritatis accusamus minus. veniam adipisci, optio, animi sint quia hic nihil facere ipsum accusantium ab repellendus ullam cupiditate!rndolorum quod perferendis corrupti id, accusantium consequatur fugiat nemo nihil. aspernatur sunt voluptatem porro laborum, dolore unde illum, natus corrupti temporibus placeat sed perferendis labore laboriosam, consequuntur ipsam est incidunt?rnillo dicta ipsam voluptatum assumenda porro excepturi laborum reiciendis quam enim esse perferendis, veritatis vitae voluptatibus, ipsum suscipit! in animi mollitia, ab quae dicta inventore aspernatur aut quam sequi maxime.rncorporis necessitatibus facere explicabo illo dolores cupiditate earum expedita sint tempore alias veniam dolore, accusamus velit ad ab provident facilis, nisi laborum. quia ad exercitationem molestias optio rem? culpa, totam.rnquas neque deserunt nisi maiores quos fuga praesentium accusantium ab maxime, delectus cupiditate dolor aspernatur, harum porro, corrupti quo qui animi expedita? minus odit qui nulla quas unde tempore sapiente!', '2019-08-18 08:43:22', 'jdoe@gmail.com'),
(16, 'fghdghd', 'gt fgh gfh ghjhk hhgkgbghgfdhrnfghgfdrnfghdrnfghdrngfhdfgrn', '2019-08-18 09:18:27', 'jdoe@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(25) NOT NULL,
  `user_last_name` varchar(25) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_bio` text NOT NULL,
  `user_register_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_password`, `user_bio`, `user_register_dt`) VALUES
(19, 'john', 'doe', 'jdoe@gmail.com', 'd35514736146439b7277437016cdb40d7fb65497', 'i am doe', '2019-07-30 09:07:55'),
(23, 'daniel', 'nortey', 'dnart@gmail.com', '99cd4016ebd699345af323ea3c60dc5b31fa0b90', 'i am daniel nartey', '2019-08-05 20:40:43'),
(24, 'jeffery', 'lahm', 'jefflahm@gmail.com', 'f3e731dfa293c7a83119d8aacfa41b5d2d780be9', 'i am jeff. you can call me jeyl', '2019-08-16 17:32:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;