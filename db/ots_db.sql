-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2018 at 05:28 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ots_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `isActive`) VALUES
(1, 'JAVA', 1),
(2, 'PHP', 1),
(3, 'DOTNET', 1),
(4, 'PHYSICS', 1),
(7, 'CHEMISTRY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login_type` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fullname`, `username`, `password`, `email`, `login_type`, `isActive`) VALUES
(1, 'Admin', 'admin', 'pass', 'admin@admin.com', 'admin', 1),
(2, 'Content', 'content', 'pass', 'content@content.com', 'content', 1),
(6, 'Content2', 'content2', 'pass', 'test@test.com', 'content', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question` varchar(400) NOT NULL,
  `category_id` int(10) NOT NULL,
  `level` varchar(10) NOT NULL,
  `topics` varchar(100) NOT NULL,
  `question_type` varchar(20) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `category_id`, `level`, `topics`, `question_type`, `isActive`) VALUES
(158, 'What does PHP stand for 123?', 2, 'easy', '21', 'multiple', 1),
(159, 'Which version of PHP introduced Try/catch Exception?', 2, 'easy', '21', 'multiple', 1),
(160, 'Which of the following php statement/statements will store 111 in variable num?', 2, 'easy', '21', 'multiple', 1),
(161, 'A PHP script should start with ___ and end with ___:', 2, 'easy', '21', 'multiple', 1),
(162, 'Which of the conditional statements is/are supported by PHP?', 2, 'easy', '21', 'multiple', 1),
(163, 'Which of the looping statements is/are supported by PHP?', 2, 'easy', '21', 'multiple', 1),
(164, 'If $a = 12 what will be returned when ($a == 12) ? 5 : 1 is executed?', 2, 'easy', '21', 'multiple', 1),
(165, 'Who is the father of PHP?', 2, 'easy', '21', 'multiple', 1),
(166, 'Which one of the following lines need to be uncommented or added in the php.ini file so as to enable mysqli extension?', 2, 'easy', '21', 'multiple', 1),
(167, 'In which version of PHP was MySQL Native Driver(also known as mysqlnd) introduced?', 2, 'easy', '21', 'multiple', 1),
(168, 'Which one of the following statements instantiates the mysqli class?', 2, 'easy', '21', 'multiple', 1),
(169, 'Which one of the following statements can be used to select the database?', 2, 'easy', '21', 'multiple', 1),
(170, 'Which one of the following methods can be used to diagnose and display information about a MySQL connection error?', 2, 'easy', '21', 'multiple', 1),
(171, 'If there is no error, then what will the error() method return?', 2, 'easy', '21', 'multiple', 1),
(172, 'Which one of the following methods is responsible for sending the query to the database?', 2, 'easy', '21', 'multiple', 1),
(173, 'Which one of the following methods recuperates any memory consumed by a result set?', 2, 'easy', '21', 'multiple', 1),
(174, 'Which one of the following method is used to retrieve the number of rows affected by an INSERT, UPDATE, or DELETE query?', 2, 'easy', '21', 'multiple', 1),
(175, 'Which version of MySQL introduced the prepared statements?', 2, 'easy', '34', 'multiple', 1),
(176, 'Which of the following methods is used to execute the statement after the parameters have been bound?', 2, 'easy', '34', 'multiple', 1),
(178, 'What is wordpress?', 2, 'easy', '39', 'multiple', 1),
(179, 'Which of the following will hash a string/password to its md5 equivalent?', 2, 'easy', '39', 'multiple', 1),
(180, 'Which conditional tag checks if the dashboard or the administration panel is attempting to be displayed by returning â€œtrueâ€™ (if the URL being accessed is in the admin section) or â€œfalseâ€ (for a front-end page).', 2, 'easy', '39', 'multiple', 1),
(181, 'Which of the following functions are used to add administration menu item in WordPress ?', 2, 'easy', '39', 'multiple', 1),
(182, 'Which of the following functions are used to add administration menu item in WordPress ?', 2, 'easy', '39', 'multiple', 1),
(183, 'Which of the following WordPress Multisite functions allows for getting content from one blog and display it on another?', 2, 'easy', '39', 'multiple', 1),
(184, 'What is the BEST way to get last inserted row ID from WordPress database ?', 2, 'easy', '39', 'multiple', 1),
(185, ' Which of the follow is a WordPress alternatives for Ruby on Rails?', 2, 'easy', '39', 'multiple', 1),
(186, 'Which of the following code snippets can be used to create custom POST status in wordpress 3.0 +?', 2, 'easy', '39', 'multiple', 1),
(187, ' How can the upload media panel be included in a WordPress template/plugin?', 2, 'easy', '39', 'multiple', 1),
(188, 'What are the database privileges that are required for WordPress?', 2, 'easy', '39', 'multiple', 1),
(189, 'Which of the following is an example of a WordPress plugin that provides multilingual capabilities?', 2, 'easy', '39', 'multiple', 1),
(190, 'Which of the following functions can be used to create a WordPress page?', 2, 'easy', '39', 'multiple', 1),
(191, 'Which function is used to display the name of current page in wordpress?', 2, 'easy', '39', 'multiple', 1),
(192, 'Which of the following methods can be used to make permalinks SEO friendly?', 2, 'easy', '39', 'multiple', 1),
(193, 'Which of the following is the correct way to add custom excerpts length identifiers in WordPress?', 2, 'easy', '39', 'multiple', 1),
(194, 'Which of the following is the correct sequence of steps to adapt a WordPress plugin to a multisite?', 2, 'easy', '39', 'multiple', 1),
(195, 'Which function do you use to sanitize a generic text field for saving in the database?', 2, 'easy', '39', 'multiple', 1),
(196, 'On which of the following databases can WordPress be installed by default?', 2, 'easy', '39', 'multiple', 1),
(197, 'Which of the following actions must be performed to import data from wordpress.com?', 2, 'easy', '39', 'multiple', 1),
(198, 'Default taxonomies available in wordpress?', 2, 'easy', '39', 'multiple', 1),
(199, 'Meta tags can be added to WordPress pages by ________________.', 2, 'easy', '39', 'multiple', 1),
(200, 'Which of the following codes will return the current plugin directory in WordPress?', 2, 'easy', '39', 'multiple', 1),
(201, 'What is the limitation to the depth of your categories?', 2, 'easy', '39', 'multiple', 1),
(202, 'Can the contents of the wp-content folder be moved or renamed without changing any settings?', 2, 'easy', '39', 'truefalse', 1),
(203, 'what is wordpress recommended way of transferring site from one server to another server?', 2, 'easy', '39', 'multiple', 1),
(204, 'Which of the following code snippets best protects a system from SQL injections?', 2, 'easy', '39', 'multiple', 1),
(205, 'Which of the following role levels has the highest privilege?', 2, 'easy', '39', 'multiple', 1),
(206, 'How could site url and home url be changed in wordpress?', 2, 'easy', '39', 'multiple', 1),
(207, 'If you need to save data in WordPress for a limited amount of time, what is the best way to do this?', 2, 'easy', '39', 'multiple', 1),
(208, 'How do you call an instance of TinyMCE content editor in the admin?', 2, 'easy', '39', 'multiple', 1),
(209, 'Which hook should you use to add a script to your plugin admin page?', 2, 'easy', '39', 'multiple', 1),
(210, 'which function is use for add custom meta box ?', 2, 'easy', '39', 'multiple', 1),
(211, 'Which is the correct order of parameters?', 2, 'easy', '39', 'multiple', 1),
(212, 'Which of the following is the correct way to retrieve a featured image from a post?', 2, 'easy', '39', 'multiple', 1),
(215, 'Image size limits can be set _______________.', 2, 'easy', '39', 'multiple', 1),
(216, 'Which PHP method(s) can be used to send form data that is persistent across succeeding page views (such as for a language selection feature) in WordPress?', 2, 'easy', '39', 'truefalse', 1),
(217, 'Which of the following is the correct way to print the slug property of $firstTag object in this code snippet?$tags = wp_get_post_tags($post->ID);\r\n$firstTag = $tags[0];', 2, 'easy', '39', 'truefalse', 1),
(218, 'Which of the following code snippets is the correct way to get content from Tinymce via javascript ?', 2, 'easy', '39', 'truefalse', 1),
(219, 'Is super cache a built-in plugin of WordPress?', 2, 'easy', '39', 'truefalse', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_choices`
--

DROP TABLE IF EXISTS `question_choices`;
CREATE TABLE IF NOT EXISTS `question_choices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question_id` int(10) NOT NULL,
  `is_Correct_Choice` varchar(100) NOT NULL,
  `answer_choices` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_choices`
--

INSERT INTO `question_choices` (`id`, `question_id`, `is_Correct_Choice`, `answer_choices`) VALUES
(18, 158, '3', 'Personal Home Page^Hypertext Preprocessor^Pretext Hypertext Processor^Preprocessor Home Page'),
(19, 159, '2', 'PHP 4^PHP 5^PHP 5.3^PHP 6'),
(20, 160, '3', 'int $num = 111;^nt mum = 111;^$num = 111;^111 = $num;'),
(21, 161, '3', '< php >^< ? php ?>^< ? ? >^< ?php ? >'),
(22, 162, '3', 'if statements^if-else statements^if-elseif statements^switch statements'),
(23, 163, '3', 'for loop^while loop^do-while loop^foreach loop'),
(24, 164, '4', '12^1^Error^5'),
(25, 165, '1', 'Rasmus Lerdorf^Willam Makepiece^Drek Kolkevi^List Barely'),
(26, 166, '1', 'extension=php_mysqli.dll^extension=mysql.dll^extension=php_mysqli.dl^extension=mysqli.dl'),
(27, 167, '3', 'PHP 5.0^PHP 5.1^PHP 5.2^PHP 5.3'),
(28, 168, '2', 'mysqli = new mysqli()^$mysqli = new mysqli()^$mysqli->new.mysqli()^mysqli->new.mysqli()'),
(29, 169, '3', '$mysqli=select_db(â€˜databasenameâ€™);^mysqli=select_db(â€˜databasenameâ€™);^mysqli->select_db(â€˜databasenameâ€™);^$mysqli->select_db(â€˜databasenameâ€™);'),
(30, 170, '2', 'connect_errno()^connect_error()^mysqli_connect_errno()^mysqli_connect_error()'),
(31, 171, '3', 'TRUE^FALSE^Empty String^0'),
(32, 172, '1', 'query()^send_query()^sendquery()^query_send()'),
(33, 173, '3', 'destroy()^remover()^alloc()^free()'),
(34, 174, '2', 'num_rows()^affected_rows()^changed_rows()^new_rows()'),
(35, 175, '2', 'MySQL 4.0^MySQL 4.1^MySQL 4.2^MySQL 4.3'),
(36, 176, '1', 'bind_param()^bind_result()^bound_param()^bound_result()'),
(38, 178, '1,3,4', 'Framework^cms^third party software^desktop application'),
(39, 179, '2', 'md5()^wp_generate_password()^wp_generate_md5()^password_md5()'),
(40, 180, '3', 'my_admin()^view_admin()^is_admin()^root_admin()'),
(41, 181, '1', 'add_menu_page();^add_admin_item();^add_admin_page();^add_admin_option();^add_admin_feature();'),
(42, 182, '1', 'add_menu_page();^add_admin_item();^add_admin_page();^add_admin_option();'),
(43, 183, '2', 'switch_blog()^switch_to_blog()^restore_current_blog()^restore_to_current_blog()'),
(44, 185, '1', 'Refinery^Typof^Symenta^Rubyalt'),
(45, 186, '2', 'register_new_post()^register_post_status()^add_new_post_status()^modify_post_status()'),
(46, 187, '1', 'By using function wp_enqueue_script(â€˜media-uploadâ€™)^By using function wp_add_media( );^By using function wp_enqueue_script(â€˜uploadâ€™);^By using function wp_add_script(â€˜media-uploadâ€™);'),
(47, 188, '2', 'insert, delete, update, drop and alter^select, insert, delete, update, create, drop and alter^insert, delete, update, create, drop and alter^insert and delete'),
(48, 189, '2', 'WP Super Cache^qTranslate^BuddyPress^Hotfix'),
(49, 190, '1', 'wp_insert_post()^wp_insert_page()^wp_create_post()^wp_create_page()'),
(50, 191, '1', 'get_the_title()^content_title()^page_name()^post_name()'),
(51, 192, '4', 'Updating the database.^Changing the source code.^Configuring the feature in the config file.^Configuring the feature in the admin settings.'),
(52, 193, '1', 'By adding excerpt_length filter in function.php^Canâ€™t declare custom excerpts in wordpress^Custom exceprts are already available in wordpress^Using the_excerpt(â€˜longâ€™); or the_excerpt(â€˜shortâ€™)'),
(53, 194, '1', '1. Use $wpdb to iterate through all blogs 2. Hook according to the $blog_id 3. Install the plugin as Network only 4. Uninstall depends the specific plugin^1. Use $wp_posts to iterate through all blogs 2. Hook according to the $function 3. IInstall the plugin as Network only 4. Uninstall depends the specific plugin^1. Use $wp_posts to iterate through all blogs 2. Hook according to the $function 3. Install other activations except Network 4. Uninstall is the same for all the plugins^1. Use $wp_posts to iterate through all blogs 2. Hook according to the $function 3. Install the plugin as Network only 4. Uninstall is same for all the plugins'),
(54, 195, '4', 'capital_P_dangit();^esc_attr();^esc_url();^sanitize_text_field();^wp_strip_all_tags();'),
(55, 196, '1', 'MySQL^Oracle Database^Microsoft SQL Server^PostgreSQL'),
(56, 197, '3', 'Enter the full access to wordpress.com into the data import form so that it can automatically connect and directly retrieve content.^Import from wordpress.comâ€™s RSS.^Login to wordpress.com, then the export data using the export tool, then import an exported xml file to the site.'),
(57, 198, '3', 'category_id^link_category_id^post_format^format_post^post_tag_id^tag_post'),
(58, 199, '3', 'using plug-ins^adding them to the header.php file^updating the database^a and c'),
(59, 200, '1', 'plugin_basename($file);^ plugin_basename($url); ^bloginfo_plugin($url);^content_plugin_url( $path ); '),
(60, 201, '3', '10 levels^20 levels^No limit levels'),
(61, 202, '1', 'true^false'),
(62, 203, '2', 'using plugin^by changing site and home url in setting and then coping files and database from one server to another^both a and b^none of these^incorrect question'),
(63, 204, '3', 'sql_real_escape_strong()^mysql_real_escape()^mysql_real_escape_string()^mysql_not_real_delete_string()'),
(64, 205, '2', 'Level_0^Level_10^Depends on your settings.^Every role level has the same privilege.'),
(65, 206, '3', 'in apperance page^in wp_config_sample.php file^in wp_options table in database^choices a,b,c^none of these'),
(66, 207, '3', 'Options API^Pseudo Cron API^Transient API^Database API^HTTP API'),
(67, 208, '5', 'new_wp_editor()^the_editor()^tiny_mce()^new_editor()^wp_editor()'),
(68, 209, '5', 'admin_print_scripts-$page^wp_print_styles^wp_enqueue_scripts^wp_print_scripts^admin_enqueue_scripts'),
(69, 210, '3', 'wp_custom_meta_box()^custom_meta_box()^add_meta_box()^add_custom_metabox()'),
(70, 211, '2', 'register_taxonomy( $args, $object_type, $taxonomy );^register_taxonomy( $taxonomy, $object_type, $args );^register_taxonomy( $taxonomy, $args, $object_type );^register_taxonomy( $taxonomy, $args );'),
(71, 212, '3', 'echo get_post_thumb($page->ID^echo get_featured_image($page->ID, \'thumbnail\');^echo get_the_post_thumbnail($page->ID,thumbnail);^echo get_post_thumbnail($page->ID,\'thumbnail\''),
(72, 215, '3', 'directly in the posts^in the wp-imageresize plug-in^in the admin settings^a and b'),
(73, 216, '3', 'POST^GET^SESSION or COOKIE^POST or GET'),
(74, 217, '2', '$firstTag[â€˜slugâ€™];^$firstTag->slug^$firstTag.slug'),
(75, 218, '2', 'document.getElementById(â€˜contentâ€™)^tinymce.activeEditor.getContent();^tinymce.element.getContent();^document.getElement(â€˜tinymce_contentâ€™)'),
(76, 219, '2', 'true^false');

-- --------------------------------------------------------

--
-- Table structure for table `result_students`
--

DROP TABLE IF EXISTS `result_students`;
CREATE TABLE IF NOT EXISTS `result_students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) NOT NULL,
  `test_id` int(10) NOT NULL,
  `total_marks` int(10) DEFAULT NULL,
  `attempt` int(10) NOT NULL,
  `duration` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_students`
--

INSERT INTO `result_students` (`id`, `student_id`, `test_id`, `total_marks`, `attempt`, `duration`) VALUES
(1, 18, 2, 1, 39, '6.75519307');

-- --------------------------------------------------------

--
-- Table structure for table `score_students`
--

DROP TABLE IF EXISTS `score_students`;
CREATE TABLE IF NOT EXISTS `score_students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stud_id` int(10) NOT NULL,
  `test_id` int(10) NOT NULL,
  `question_id` int(11) NOT NULL,
  `correct` tinyint(1) DEFAULT NULL,
  `wrong` int(10) NOT NULL,
  `attempt` int(4) NOT NULL,
  `unattempt` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score_students`
--

INSERT INTO `score_students` (`id`, `stud_id`, `test_id`, `question_id`, `correct`, `wrong`, `attempt`, `unattempt`) VALUES
(1, 18, 2, 216, 0, 1, 1, 0),
(2, 18, 2, 186, 0, 1, 1, 0),
(3, 18, 2, 206, 0, 1, 1, 0),
(4, 18, 2, 199, 0, 1, 1, 0),
(5, 18, 2, 192, 0, 1, 1, 0),
(6, 18, 2, 203, 0, 1, 1, 0),
(7, 18, 2, 179, 0, 1, 1, 0),
(8, 18, 2, 185, 0, 1, 1, 0),
(9, 18, 2, 217, 0, 1, 1, 0),
(10, 18, 2, 190, 0, 1, 1, 0),
(11, 18, 2, 189, 0, 1, 1, 0),
(12, 18, 2, 210, 0, 1, 1, 0),
(13, 18, 2, 209, 0, 1, 1, 0),
(14, 18, 2, 204, 0, 1, 1, 0),
(15, 18, 2, 188, 0, 1, 1, 0),
(16, 18, 2, 196, 0, 1, 1, 0),
(17, 18, 2, 191, 0, 1, 1, 0),
(18, 18, 2, 212, 0, 1, 1, 0),
(19, 18, 2, 200, 0, 1, 1, 0),
(20, 18, 2, 211, 0, 1, 1, 0),
(21, 18, 2, 194, 0, 1, 1, 0),
(22, 18, 2, 180, 0, 1, 1, 0),
(23, 18, 2, 202, 0, 1, 1, 0),
(24, 18, 2, 195, 0, 1, 1, 0),
(25, 18, 2, 193, 0, 1, 1, 0),
(26, 18, 2, 219, 0, 1, 1, 0),
(27, 18, 2, 208, 0, 1, 1, 0),
(28, 18, 2, 198, 0, 1, 1, 0),
(29, 18, 2, 215, 0, 1, 1, 0),
(30, 18, 2, 187, 0, 1, 1, 0),
(31, 18, 2, 182, 0, 1, 1, 0),
(32, 18, 2, 197, 0, 1, 1, 0),
(33, 18, 2, 201, 0, 1, 1, 0),
(34, 18, 2, 205, 0, 1, 1, 0),
(35, 18, 2, 178, 1, 0, 1, 0),
(36, 18, 2, 181, 0, 1, 1, 0),
(37, 18, 2, 218, 0, 1, 1, 0),
(38, 18, 2, 183, 0, 1, 1, 0),
(39, 18, 2, 207, 0, 1, 1, 0),
(40, 2, 2, 215, 0, 1, 1, 0),
(41, 2, 2, 209, 0, 1, 1, 0),
(42, 2, 2, 216, 0, 1, 1, 0),
(43, 2, 2, 196, 0, 1, 1, 0),
(44, 2, 2, 182, 0, 1, 1, 0),
(45, 2, 2, 193, 0, 1, 1, 0),
(46, 2, 2, 192, 0, 1, 1, 0),
(47, 2, 2, 187, 0, 1, 1, 0),
(48, 2, 2, 194, 0, 1, 1, 0),
(49, 2, 2, 203, 0, 1, 1, 0),
(50, 2, 2, 207, 0, 1, 1, 0),
(51, 2, 2, 212, 1, 0, 1, 0),
(52, 2, 2, 204, 0, 1, 1, 0),
(53, 2, 2, 199, 0, 1, 1, 0),
(54, 2, 2, 206, 0, 1, 1, 0),
(55, 2, 2, 208, 0, 1, 1, 0),
(56, 2, 2, 217, 1, 0, 1, 0),
(57, 2, 2, 185, 0, 1, 1, 0),
(58, 2, 2, 188, 1, 0, 1, 0),
(59, 2, 2, 186, 0, 1, 1, 0),
(60, 2, 2, 195, 0, 1, 1, 0),
(61, 2, 2, 191, 0, 1, 1, 0),
(62, 2, 2, 219, 0, 1, 1, 0),
(63, 2, 2, 189, 0, 1, 1, 0),
(64, 2, 2, 218, 0, 1, 1, 0),
(65, 2, 2, 200, 0, 1, 1, 0),
(66, 2, 2, 178, 0, 1, 1, 0),
(67, 2, 2, 183, 0, 1, 1, 0),
(68, 2, 2, 179, 0, 1, 1, 0),
(69, 2, 2, 197, 0, 1, 1, 0),
(70, 2, 2, 211, 0, 1, 1, 0),
(71, 2, 2, 201, 0, 1, 1, 0),
(72, 2, 2, 205, 0, 1, 1, 0),
(73, 2, 2, 190, 0, 1, 1, 0),
(74, 2, 2, 180, 0, 1, 1, 0),
(75, 2, 2, 202, 0, 1, 1, 0),
(76, 2, 2, 181, 0, 1, 1, 0),
(77, 2, 2, 198, 0, 1, 1, 0),
(78, 2, 2, 210, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login_type` varchar(50) NOT NULL,
  `studentcategory` varchar(10) NOT NULL,
  `stud_city` varchar(50) NOT NULL,
  `stud_phone` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `attendTest` int(1) NOT NULL DEFAULT '0',
  `test_id` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fullname`, `username`, `password`, `email`, `login_type`, `studentcategory`, `stud_city`, `stud_phone`, `isActive`, `attendTest`, `test_id`, `score`) VALUES
(1, 'Student Java', 'java', 'pass', 'student@student.com', 'student', 'java', 'karnal', '123', 1, 0, 0, 0),
(2, 'Student Php', 'php', 'pass', 'email@email.com', 'student', 'php', 'karnal', '123', 1, 0, 0, 0),
(4, 'Student Dotnet', 'dotnet', 'pass', 'email@email.com', 'student', 'dotnet', 'karnal', '123', 1, 0, 0, 0),
(17, 'Dilpreet', 'dilpreet', 'pass', 'abc@test.com', 'student', 'php', 'karnal', '123', 1, 0, 0, 0),
(19, 'anusha', 'anusha', 'pass', 'test@test.com', 'student', 'java', 'karnal', '123', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test_students`
--

DROP TABLE IF EXISTS `test_students`;
CREATE TABLE IF NOT EXISTS `test_students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `testlevel` varchar(20) NOT NULL,
  `testcategory` varchar(20) NOT NULL,
  `testtopics` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `starttime` time NOT NULL,
  `enddate` date NOT NULL,
  `endtime` time NOT NULL,
  `question_limit` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_students`
--

INSERT INTO `test_students` (`id`, `testlevel`, `testcategory`, `testtopics`, `startdate`, `starttime`, `enddate`, `endtime`, `question_limit`) VALUES
(4, 'easy', 'php', '39', '2016-12-01', '00:00:00', '2016-12-30', '00:00:00', 0),
(5, 'easy', 'dotnet', '40', '2016-12-08', '00:00:00', '2016-12-20', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `test_topics`
--

DROP TABLE IF EXISTS `test_topics`;
CREATE TABLE IF NOT EXISTS `test_topics` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `test_level` varchar(10) NOT NULL,
  `test_cat` int(10) NOT NULL,
  `test_name` varchar(10) NOT NULL,
  `topic_content` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_topics`
--

INSERT INTO `test_topics` (`id`, `test_level`, `test_cat`, `test_name`, `topic_content`) VALUES
(2, 'easy', 1, 'JAVA', 'Java OOPs'),
(3, 'easy', 1, 'JAVA', 'Abstraction'),
(4, 'easy', 1, 'JAVA', 'Encapsulation - (Getters / Setters)'),
(5, 'easy', 1, 'JAVA', 'Inheritance - (Interface and abstract classes)'),
(6, 'easy', 1, 'JAVA', 'Polymorphism - (overriding and overloading)'),
(7, 'easy', 1, 'JAVA', 'Life of an object in Java - Learn where objects and variables live in Java'),
(8, 'easy', 1, 'JAVA', 'Classes - Learn about classes and class variables'),
(9, 'easy', 1, 'JAVA', 'Variables - Java primitive types, Arrays, Wrapper classes, auto boxing and unboxing'),
(10, 'easy', 1, 'JAVA', 'Exceptions - Learn how to handle unwanted situations in java. Learn about runtime and compile time exceptions. Explore these 5 keywords - try, catch, finally, throws and throw'),
(11, 'easy', 1, 'JAVA', 'Data structures - One of the most important concept while learning any programming language. Try to code your own data structures. Learn java collections'),
(12, 'easy', 1, 'JAVA', 'Generics - Another powerful tool in java. You will find generics a lot in production code. A must know topic of java'),
(13, 'easy', 1, 'JAVA', 'Death of an object - Learn about Garbage collection of java. If you are starting on java at least get yourself acquainted with the terminology'),
(14, 'easy', 1, 'JAVA', 'Networking and Threads - One of the biggest advantage of java is to reach out to other programs and process the requests in parallel.  Learn about serialization, buffer readers/writers and life cycle of thread. You should know about Thread class and Runnable interface'),
(21, 'easy', 2, 'PHP', 'Introduction to PHP'),
(22, 'easy', 2, 'PHP', 'Handling Html Form With Php'),
(23, 'medium', 2, 'PHP', 'Decisions and loop'),
(24, 'medium', 2, 'PHP', 'Function'),
(25, 'medium', 2, 'PHP', 'String'),
(26, 'medium', 2, 'PHP', 'Array'),
(27, 'medium', 2, 'PHP', 'Working with file and Directories'),
(28, 'medium', 2, 'PHP', 'String matching with regular expression'),
(29, 'medium', 2, 'PHP', 'Generating Images with PHP'),
(30, 'tough', 2, 'PHP', 'Introduction to OOPS'),
(31, 'tough', 2, 'PHP', 'Exception Handling'),
(32, 'tough', 2, 'PHP', 'Cake session'),
(33, 'easy', 2, 'PHP', 'Arrays'),
(34, 'easy', 2, 'PHP', 'Mysql'),
(35, 'easy', 2, 'PHP', 'PHP OOPS'),
(36, 'medium', 2, 'PHP', 'Date & Timestamp'),
(37, 'medium', 2, 'PHP', 'Functions in PHP'),
(38, 'easy', 2, 'PHP', 'HTML Forms'),
(39, 'easy', 2, 'PHP', 'Wordpress'),
(40, 'easy', 3, 'DOTNET', 'Basic');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question_choices`
--
ALTER TABLE `question_choices`
  ADD CONSTRAINT `question_choices_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
