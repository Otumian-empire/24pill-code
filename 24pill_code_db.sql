-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 04, 2019 at 04:48 PM
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
(33, 'Test 1', '&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;&amp;lt;span style=&amp;quot;color: #d4d4d4;&amp;quot;&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. &amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p style=&amp;quot;padding-left: 40px;&amp;quot;&amp;gt;&amp;lt;strong&amp;gt;&amp;lt;span style=&amp;quot;color: #d4d4d4;&amp;quot;&amp;gt;upiditate iusto dolore mollitia, dolor iure temporibus am&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;&amp;lt;span style=&amp;quot;color: #d4d4d4;&amp;quot;&amp;gt;et ducimus voluptatum? Quisquam deleniti adipisci tempori&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;&amp;lt;span style=&amp;quot;color: #d4d4d4;&amp;quot;&amp;gt;bus tempore iure, dolore repudiandae vel fugiat dicta qu&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;&amp;lt;span style=&amp;quot;color: #d4d4d4;&amp;quot;&amp;gt;is.Minus non accusamus veniam quis optio perspiciatis unde m&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;&amp;lt;span style=&amp;quot;color: #d4d4d4;&amp;quot;&amp;gt;aiores, laboriosam placeat perferendis beatae dolorem quisqua&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;&amp;lt;span style=&amp;quot;color: #d4d4d4;&amp;quot;&amp;gt;m expedita dignissimos natus rerum enim suscipit quidem provident&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;&amp;lt;span style=&amp;quot;color: #d4d4d4;&amp;quot;&amp;gt; ducimus exercitationem quia? Dignissimos dicta quisquam fugit.&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;', '2019-08-31 21:04:07', 'jdoe@gmail.com'),
(34, 'The date', '&amp;lt;p&amp;gt;testing date&amp;lt;/p&amp;gt;', '2019-08-31 21:18:07', 'jdoe@gmail.com'),
(35, 'The date1', '&amp;lt;p&amp;gt;The date&amp;lt;/p&amp;gt;', '2019-08-31 21:21:31', 'jdoe@gmail.com'),
(36, 'Test 3', '&amp;lt;p&amp;gt;print statement in python3&amp;lt;/p&amp;gt;\r\n&amp;lt;p&amp;gt;&amp;lt;code&amp;gt;print(\'hello world\')&amp;lt;/code&amp;gt;&amp;lt;/p&amp;gt;', '2019-09-01 11:23:01', 'jdoe@gmail.com'),
(37, 'Topic for Computer Science Engineering', '&amp;lt;p&amp;gt;&amp;lt;span style=&amp;quot;text-decoration: underline;&amp;quot;&amp;gt;Topic for Computer Science Engineering&amp;lt;/span&amp;gt;&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;ðŸ—ï¸ Part 1&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; a. Programming&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Learn to google properly (google-fu) âœ”ï¸&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - C (Vanilla C with Art and Science of C and or C Primer +)&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Javascript (Vanilla js, Jqeury, Qunit, ES6 &amp;amp;gt;)&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Python (Vanilla py, UnitText, api)&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Php (Vanilla php, UnitTest)&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Kotlin (Vanilla Kot, Desktop App)&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; b. Basic Software Engineering&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Git and Github âœ”ï¸&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - SSH âœ”ï¸&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - APIs&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - HTTP/HTTPS&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Basic terminals âœ”ï¸&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Basics of data structures&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Basics of algorithms&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Basic design patterns&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Encoding characters âœ”ï¸&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; c. Web Technology&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Html 5 and Css 3 (and Less)&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Bootstrap 4 &amp;amp;gt;&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Javascript (Vuejs, Nodejs)&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Python 3 (flask)&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Php(Slim, Laravel)&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; d. Database&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - Database design and implementation&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - SQL (Vanilla SQL, MySQL, SQLite)&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; - NoSQL (postgrl)&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;ðŸ—ï¸ Part 2&amp;lt;br /&amp;gt;Engineering and Discrete Maths&amp;lt;br /&amp;gt;Digital Logic&amp;lt;br /&amp;gt;Data Structures&amp;lt;br /&amp;gt;Algorithms And Algorithmic Analysis&amp;lt;br /&amp;gt;Theory of Computation&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;ðŸ—ï¸ Part 3&amp;lt;br /&amp;gt;Computer Organization &amp;amp;amp; Architecture&amp;lt;br /&amp;gt;Computer Networks&amp;lt;br /&amp;gt;Compiler Design&amp;lt;br /&amp;gt;Operating System&amp;lt;/p&amp;gt;', '2019-09-01 11:30:35', 'jdoe@gmail.com'),
(38, 'The Art of Computer Programming by Donald E. Knuth.  ', '&amp;lt;p style=&amp;quot;text-align: justify;&amp;quot;&amp;gt;&amp;lt;code&amp;gt;#!/bin/sh&amp;lt;/code&amp;gt;&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;################################################################################&amp;lt;br /&amp;gt;##&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; ##&amp;lt;br /&amp;gt;##&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; The Art of Computer Programming by Donald E. Knuth.&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; ##&amp;lt;br /&amp;gt;##&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; &amp;amp;nbsp; ##&amp;lt;br /&amp;gt;################################################################################&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;## Volume 1 - Fundamental Algorithms, 3rd Edition&amp;lt;br /&amp;gt;&amp;lt;code&amp;gt;wget -c https://archive.org/download/B-001-001-249/B-001-001-249.pdf -O art_of_compProg-vol1-3rd.pdf &amp;amp;amp;&amp;amp;amp;&amp;lt;/code&amp;gt;&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;## Volume 2 - Seminumerical Algorithms, 2nd Edition&amp;lt;br /&amp;gt;&amp;lt;code&amp;gt;wget -c https://archive.org/download/B-001-002-137/Addison.Wesley.Donald.E.Knuth.The.Art.of.Computer.Programming.Volume.2.pdf -O art_of_compProg-vol2-2nd.pdf &amp;amp;amp;&amp;amp;amp;&amp;lt;/code&amp;gt;&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;## Volume 3 - Sorting and Searching, 2nd Edition&amp;lt;br /&amp;gt;&amp;lt;code&amp;gt;wget -c https://archive.org/download/B-001-001-250/B-001-001-250.pdf -O art_of_compProg-vol3-2nd.pdf &amp;amp;amp;&amp;amp;amp;&amp;lt;/code&amp;gt;&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;## Volume 4A Part 1 - Combinatorial Algorithms&amp;lt;br /&amp;gt;&amp;lt;code&amp;gt;wget -c https://archive.org/download/B-001-001-251/B-001-001-251.pdf -O art_of_compProg-vol4A-pt1.pdf&amp;lt;/code&amp;gt;&amp;lt;/p&amp;gt;', '2019-09-01 19:09:10', 'jdoe@gmail.com'),
(39, '13 points to do to self learn embedded systems ', '&amp;lt;p&amp;gt;&amp;lt;br /&amp;gt;&amp;amp;nbsp;1. Learn C&amp;lt;br /&amp;gt;&amp;amp;nbsp;2. Learn Operating systems Concepts&amp;lt;br /&amp;gt;&amp;amp;nbsp;3. Learn computer architecture&amp;lt;br /&amp;gt;&amp;amp;nbsp;4. Get familiar with build process.&amp;lt;br /&amp;gt;&amp;amp;nbsp;5. Learn Basics electronics.&amp;lt;br /&amp;gt;&amp;amp;nbsp;6. Learn basic PCB design&amp;lt;br /&amp;gt;&amp;amp;nbsp;7. Learn to read basic data sheets&amp;lt;br /&amp;gt;&amp;amp;nbsp;8. Learn FPGA.&amp;lt;br /&amp;gt;&amp;amp;nbsp;9. Learn Web technologies.&amp;lt;br /&amp;gt;&amp;amp;nbsp;10. Learn image processing&amp;lt;br /&amp;gt;&amp;amp;nbsp;11. Go trough source codes.&amp;lt;br /&amp;gt;&amp;amp;nbsp;12. Learn reverse engineering&amp;lt;br /&amp;gt;&amp;amp;nbsp;13. Learn optimization techniques&amp;lt;/p&amp;gt;', '2019-09-02 00:20:23', 'jdoe@gmail.com'),
(40, 'Python 3.7.3 documentation', '&amp;lt;p&amp;gt;&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;Welcome! This is the documentation for Python 3.7.3.&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;Parts of the documentation:&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;What\'s new in Python 3.7?&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; or all &amp;quot;What\'s new&amp;quot; documents since 2.0&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;Tutorialâœ”ï¸&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; start here&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;Library Reference&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; keep this under your pillow&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;Language Reference&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; describes syntax and language elements&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;Python Setup and Usageâœ”ï¸&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; how to use Python on different platforms&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;Python HOWTOs&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; in-depth documents on specific topics&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;Installing Python Modules&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; installing from the Python Package Index &amp;amp;amp; other sources&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;Distributing Python Modules&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; publishing modules for installation by others&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;Extending and Embedding&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; tutorial for C/C++ programmers&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;Python/C API&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; reference for C/C++ programmers&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;FAQs&amp;lt;br /&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; frequently asked questions (with answers!)&amp;lt;/p&amp;gt;', '2019-09-02 00:23:39', 'jdoe@gmail.com'),
(41, 'Some Must read books', '&amp;lt;p&amp;gt;clean code by uncle bob âœ”ï¸&amp;lt;br /&amp;gt;clean architecture by uncle bob âœ”ï¸&amp;lt;br /&amp;gt;grokking algorithms âœ”ï¸&amp;lt;br /&amp;gt;head first design patterns: a brain-friendly guide âœ”ï¸&amp;lt;br /&amp;gt;Test driven development: by example âœ”ï¸&amp;lt;br /&amp;gt;soft skills: the software developer\'s life manual&amp;lt;br /&amp;gt;cracking the coding interview: 189 questions and solutions âœ”ï¸&amp;lt;br /&amp;gt;seven languages in seven weeks: a pragmatic guide to learning programming luages (pragmatis programmer) âœ”ï¸&amp;lt;br /&amp;gt;programming elixir âœ”ï¸&amp;lt;br /&amp;gt;go programming blue-print-second edition âœ”ï¸&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;inside the machine: how computers work&amp;lt;br /&amp;gt;CODE processor and stuff&amp;lt;br /&amp;gt;concrete mathematics: a foundation of computer science âœ”ï¸&amp;lt;br /&amp;gt;structure and interpretation of computer programs: proper introduction into programming&amp;lt;br /&amp;gt;how to design programmes: an introduction to programming and computing&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;Algorith design manual âœ”ï¸&amp;lt;br /&amp;gt;Introduction to algorithms âœ”ï¸&amp;lt;br /&amp;gt;compilers: principles, techniques and tools âœ”ï¸&amp;lt;br /&amp;gt;learn the c-programming language âœ”ï¸&amp;lt;br /&amp;gt;Advanced programming on the unix environment âœ”ï¸&amp;lt;br /&amp;gt;unix network programming vol 1 and 2 âœ”ï¸ âœ”ï¸&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;growing Object-oriented software, guided by Tests&amp;lt;br /&amp;gt;Domain driven design&amp;lt;br /&amp;gt;The elements of programming style&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;design patterns&amp;lt;br /&amp;gt;fundaments algorithms vol 1 art of computer programming series&amp;lt;br /&amp;gt;The annotated turing&amp;lt;br /&amp;gt;refactoring&amp;lt;br /&amp;gt;Extrem programming explained&amp;lt;br /&amp;gt;redshirts&amp;lt;br /&amp;gt;the bobiverse trilogy&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;On growth and forms&amp;lt;br /&amp;gt;the timeless ways of building&amp;lt;br /&amp;gt;natures patterns series: shapes, flow and branches&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;code complete 2&amp;lt;br /&amp;gt;the mythical man-month&amp;lt;br /&amp;gt;don\'t make me think, revisted: a common sense approach to web usability&amp;lt;br /&amp;gt;rapid development&amp;lt;br /&amp;gt;peopleware&amp;lt;br /&amp;gt;the design of everyday things&amp;lt;br /&amp;gt;about face: the essentials of everyday design&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;the inmate are running the asylum&amp;lt;br /&amp;gt;programming pearls âœ”ï¸&amp;lt;br /&amp;gt;The pragmatic programmer: from journeyman to master&amp;lt;br /&amp;gt;designing web usability&amp;lt;br /&amp;gt;regular expression cookbook&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;dynamics of software development&amp;lt;/p&amp;gt;', '2019-09-02 00:24:25', 'jdoe@gmail.com'),
(42, 'Dream big, wisely', '&amp;lt;p&amp;gt;Dream big, wisely&amp;lt;br /&amp;gt;If you can\'t look up, stand on something&amp;lt;br /&amp;gt;If you can\'t look up, sleeping on your back makes you&amp;lt;br /&amp;gt;The world is still beautiful, despite the despise&amp;lt;br /&amp;gt;Humour is colourless, whoever laughs, wished&amp;lt;br /&amp;gt;Two tails on a branch, one to reach&amp;lt;br /&amp;gt;Religion may change a person that wishes to be changed&amp;lt;/p&amp;gt;', '2019-09-02 00:25:07', 'jdoe@gmail.com');

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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `comment_text`, `comment_date`, `user_email`) VALUES
(24, 29, '&amp;lt;p&amp;gt;who cares about mouse when there is a cat&amp;lt;/p&amp;gt;', '2019-08-30 17:40:59', 'jdoe@gmail.com'),
(25, 29, '&amp;lt;p&amp;gt;&amp;lt;em&amp;gt;i am a guru&amp;lt;/em&amp;gt;&amp;lt;/p&amp;gt;', '2019-08-30 17:41:35', 'jdoe@gmail.com'),
(26, 30, 'I can see the &amp;lt;html&amp;gt; code &amp;lt;/html&amp;gt;', '2019-08-30 18:10:24', 'jdoe@gmail.com'),
(29, 36, 'hi, i just want to say good work and i hope you continue to inspire others to keep coding to change the tech world in africa', '2019-09-01 20:50:15', 'jdoe@gmail.com'),
(31, 37, 'hi donald', '2019-09-01 21:21:28', 'jdoe@gmail.com'),
(32, 38, 'download ', '2019-09-01 21:22:11', 'jdoe@gmail.com'),
(33, 35, 'date 2\r\n', '2019-09-01 21:22:45', 'jdoe@gmail.com'),
(34, 35, '&amp;lt;p&amp;gt;&amp;amp;lt;html&amp;amp;gt; tags much be code formatted&amp;lt;/p&amp;gt;\r\n&amp;lt;p&amp;gt;&amp;lt;code&amp;gt;&amp;amp;lt;html&amp;amp;gt;&amp;lt;/code&amp;gt;&amp;lt;/p&amp;gt;', '2019-09-01 21:23:25', 'jdoe@gmail.com'),
(35, 35, '&amp;lt;p&amp;gt;dsd&amp;lt;/p&amp;gt;', '2019-09-01 21:23:33', 'jdoe@gmail.com'),
(39, 37, '&amp;lt;p&amp;gt;thi is a great list&amp;lt;/p&amp;gt;', '2019-09-01 23:39:05', 'jdoe@gmail.com'),
(40, 37, '&amp;lt;p&amp;gt;hello world&amp;lt;/p&amp;gt;', '2019-09-01 23:40:08', 'jdoe@gmail.com'),
(41, 42, 'hello ', '2019-09-02 00:25:54', 'jdoe@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `token_id` int(11) NOT NULL,
  `token_text` int(6) NOT NULL,
  `token_date` datetime NOT NULL DEFAULT current_timestamp(),
  `token_state` tinyint(1) NOT NULL DEFAULT 0,
  `token_dormancy` datetime NOT NULL,
  `token_purpose` varchar(5) NOT NULL,
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
(27, 'daniel', 'asare', 'jdoe@gmail.com', 'd35514736146439b7277437016cdb40d7fb65497', 'i am ahiase mcclean', '2019-08-30 08:18:55'),
(28, 'jeffery_', 'charamara_', 'jeff_1@gmail.com', 'f3e731dfa293c7a83119d8aacfa41b5d2d780be9', 'i am jeff', '2019-08-31 12:58:57'),
(29, 'hello', 'nortey', 'dannot@gmail.com', '2591e5f46f28d303f9dc027d475a5c60d8dea17a', 'i am dan', '2019-09-02 09:05:55');

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
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`token_id`),
  ADD UNIQUE KEY `token_text` (`token_text`);

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
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;