-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2018 at 02:55 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3033239_phpcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE `admin_panel` (
  `id` int(11) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `post` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(44, 'January-04-2018 20:31:02', 'Basic HTML Document', 'HTML', 'John', 'html.jpg', '<h1>Basic HTML Document - HTML Tags</h1>\r\n<p>As told earlier, HTML is a markup language and makes use of various tags to format the content. These tags are enclosed within angle braces. Except few tags, most of the tags have their corresponding closing tags.</p>\r\n<p>To learn HTML, you will need to study various tags and understand how they behave, while formatting a textual document. Learning HTML is simple as users have to learn the usage of different tags in order to format the text or images to make a beautiful webpage.</p>\r\n<p>World Wide Web Consortium (W3C) recommends to use lowercase tags starting from HTML 4.</p>\r\n<h4>!DOCTYPE</h4>\r\n<p>This tag defines the document type and HTML version.</p>\r\n<h4>html</h4>\r\n<p>This tag encloses the complete HTML document and mainly comprises of document header</p>\r\n<h4>head</h4>\r\n<p>This tag represents the document\'s header which can keep other HTML tags</p>\r\n<h4>title</h4>\r\n<p>The title tag is used inside the head tag to mention the document title.</p>\r\n<h4>body</h4>\r\n<p>This tag represents the document\'s body which keeps other HTML tags</p>\r\n<h4>h1</h4>\r\n<p>This tag represents the heading.</p>\r\n<h4>p</h4>\r\n<p>This tag represents a paragraph.</p>'),
(45, 'January-04-2018 20:31:43', 'HTML - Hypertext Markup Language', 'HTML', 'John', 'html.jpg', '<h1>HTML - Hypertext Markup Language</h1>\r\n<p>HTML stands for Hypertext Markup Language, and it is the most widely used language to write Web Pages.Hypertext refers to the way in which Web pages (HTML documents) are linked together. Thus, the link available on a webpage is called Hypertext.</p>\r\n<p>As its name suggests, HTML is a Markup Language which means you use HTML to simply \"mark-up\" a text document with tags that tell a Web browser how to structure it to display.</p>\r\n<p>Originally, HTML was developed with the intent of defining the structure of documents like headings, paragraphs, lists, and so forth to facilitate the sharing of scientific information between researchers.</p>\r\n<p>Now, HTML is being widely used to format web pages with the help of different tags available in HTML language.</p>'),
(47, 'January-04-2018 20:37:50', 'Advantages of CSS', 'CSS', 'Mike', 'css.jpg', '<h1>Advantages of CSS</h1>\r\n<p><b>CSS saves time</b> âˆ’ You can write CSS once and then reuse same sheet in multiple HTML pages. You can define a style for each HTML element and apply it to as many Web pages as you want.</p>\r\n<p><b>Pages load faster</b> âˆ’ If you are using CSS, you do not need to write HTML tag attributes every time. Just write one CSS rule of a tag and apply it to all the occurrences of that tag. So less code means faster download times.</p>\r\n<p><b>Easy maintenance</b> âˆ’ To make a global change, simply change the style, and all elements in all the web pages will be updated automatically.</p>\r\n<p><b>Superior styles to HTML</b> âˆ’ CSS has a much wider array of attributes than HTML, so you can give a far better look to your HTML page in comparison to HTML attributes.</p>\r\n<p><b>Multiple Device Compatibility</b> âˆ’ Style sheets allow content to be optimized for more than one type of device. By using the same HTML document, different versions of a website can be presented for handheld devices such as PDAs and cell phones or for printing.</p>\r\n<p><b>Global web standards</b> âˆ’ Now HTML attributes are being deprecated and it is being recommended to use CSS. So its a good idea to start using CSS in all the HTML pages to make them compatible to future browsers.</p>\r\n<p><b>Offline Browsing</b> âˆ’ CSS can store web applications locally with the help of an offline catche.Using of this, we can view offline websites.The cache also ensures faster loading and better overall performance of the website.</p>\r\n<p><b>Platform Independence</b> âˆ’ The Script offer consistent platform independence and can support latest browsers as well.</p>'),
(48, 'January-04-2018 20:42:10', 'CSS - Cascading Style Sheets', 'CSS', 'Mike', 'css.jpg', '<h1>CSS - Cascading Style Sheet</h1>\r\n<p>CSS is used to control the style of a web document in a simple and easy way.</p>\r\n<p>CSS is the acronym for Cascading Style Sheet. This tutorial covers both the versions CSS1,CSS2 and CSS3, and gives a complete understanding of CSS, starting from its basics to advanced concepts.</p>\r\n<p>Cascading Style Sheets, fondly referred to as CSS, is a simple design language intended to simplify the process of making web pages presentable.</p>\r\n<p>CSS handles the look and feel part of a web page. Using CSS, you can control the color of the text, the style of fonts, the spacing between paragraphs, how columns are sized and laid out, what background images or colors are used, layout designs,variations in display for different devices and screen sizes as well as a variety of other effects.</p>\r\n<p>CSS is easy to learn and understand but it provides powerful control over the presentation of an HTML document. Most commonly, CSS is combined with the markup languages HTML or XHTML.</p>'),
(49, 'January-04-2018 20:42:36', 'Twitter Bootstrap', 'BOOTSRAP', 'Mike', 'bs.jpg', '<h1>Twitter Bootstrap</h1>\r\n<p>Twitter Bootstrap is the most popular front end framework in the recent time. It is sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development. It uses HTML, CSS and Javascript. This tutorial will teach you the basics of Bootstrap Framework using which you can create web projects with ease.</p>\r\n<p>The tutorial is divided into sections such as Bootstrap Basic Structure, Bootstrap CSS, Bootstrap Layout Components and Bootstrap Plugins. Each of these sections contain related topics with simple and useful examples.</p>\r\n<p>Bootstrap is a sleek, intuitive, and powerful, mobile first front-end framework for faster and easier web development. It uses HTML, CSS and Javascript.</p>\r\n<p>Bootstrap was developed by Mark Otto and Jacob Thornton at Twitter. It was released as an open source product in August 2011 on GitHub.</p>'),
(50, 'January-04-2018 20:43:07', 'Why Use Bootstrap?', 'BOOTSRAP', 'Mary', 'bs.jpg', '<h1>Why Use Bootstrap?</h1>\r\n<p><b>Mobile first approach</b> âˆ’ Bootstrap 3, framework consists of Mobile first styles throughout the entire library instead them of in separate files.</p>\r\n<p><b>Browser Support</b> âˆ’ It is supported by all popular browsers.</p>\r\n<p><b>Easy to get started</b> âˆ’ With just the knowledge of HTML and CSS anyone can get started with Bootstrap. Also the Bootstrap official site has a good documentation.</p>\r\n<p><b>Responsive design</b> âˆ’ Bootstrap\'s responsive CSS adjusts to Desktops, Tablets and Mobiles. More about the responsive design is in the chapter Bootstrap Responsive Design.</p>'),
(52, 'January-04-2018 20:56:30', 'jQuery - Write Less Do More', 'JQUERY', 'Max', 'jquery.jpg', '<h1>jQuery - Write Less Do More</h1>\r\n<p>jQuery is a fast and concise JavaScript library created by John Resig in 2006. jQuery simplifies HTML document traversing, event handling, animating, and Ajax interactions for Rapid Web Development.</p>\r\n<p>jQuery is a fast and concise JavaScript Library created by John Resig in 2006 with a nice motto: Write less, do more. jQuery simplifies HTML document traversing, event handling, animating, and Ajax interactions for rapid web development. jQuery is a JavaScript toolkit designed to simplify various tasks by writing less code.</p>\r\n<h3>How to use jQuery?</h3>\r\n<p>There are two ways to use jQuery.</p>\r\n<p><b>Local Installation</b> âˆ’ You can download jQuery library on your local machine and include it in your HTML code.</p>\r\n<p><b>CDN Based Version</b> âˆ’ You can include jQuery library into your HTML code directly from Content Delivery Network (CDN).</p>'),
(53, 'January-04-2018 20:57:03', 'jQuery - Core Features', 'JQUERY', 'Max', 'jquery.jpg', '<h1>Core Features</h1>\r\n<h4>Here is the list of important core features supported by jQuery âˆ’</h4>\r\n<p><b>DOM manipulation</b> âˆ’ The jQuery made it easy to select DOM elements, negotiate them and modifying their content by using cross-browser open source selector engine called Sizzle.</p>\r\n<p><b>Event handling</b> âˆ’ The jQuery offers an elegant way to capture a wide variety of events, such as a user clicking on a link, without the need to clutter the HTML code itself with event handlers.</p>\r\n<p><b>AJAX Support</b> âˆ’ The jQuery helps you a lot to develop a responsive and featurerich site using AJAX technology.</p>\r\n<p><b>Animations</b> âˆ’ The jQuery comes with plenty of built-in animation effects which you can use in your websites.</p>\r\n<p><b>Lightweight</b> âˆ’ The jQuery is very lightweight library - about 19KB in size (Minified and gzipped).</p>\r\n<p><b>Cross Browser Support</b> âˆ’ The jQuery has cross-browser support, and works well in IE 6.0+, FF 2.0+, Safari 3.0+, Chrome and Opera 9.0+</p>\r\n<p><b>Latest Technology</b> âˆ’ The jQuery supports CSS3 selectors and basic XPath syntax.</p>'),
(54, 'January-04-2018 20:58:32', 'JavaScript - Interpreted Programming Language', 'JAVASCRIPT', 'Max', 'js.jpg', '<h1>JavaScript </h1>\r\n<p>JavaScript is a lightweight, interpreted programming language. It is designed for creating network-centric applications. It is complimentary to and integrated with Java. JavaScript is very easy to implement because it is integrated with HTML. It is open and cross-platform.</p>\r\n<h3>What is JavaScript ?</h3>\r\n<p>Javascript is a dynamic computer programming language. It is lightweight and most commonly used as a part of web pages, whose implementations allow client-side script to interact with the user and make dynamic pages. It is an interpreted programming language with object-oriented capabilities.</p>\r\n<p>JavaScript was first known as LiveScript, but Netscape changed its name to JavaScript, possibly because of the excitement being generated by Java. JavaScript made its first appearance in Netscape 2.0 in 1995 with the name LiveScript. The general-purpose core of the language has been embedded in Netscape, Internet Explorer, and other web browsers.</p>\r\n<h3>Client-side JavaScript</h3>\r\n<p>Client-side JavaScript is the most common form of the language. The script should be included in or referenced by an HTML document for the code to be interpreted by the browser.</p>\r\n<p>It means that a web page need not be a static HTML, but can include programs that interact with the user, control the browser, and dynamically create HTML content.</p>\r\n<p>The JavaScript client-side mechanism provides many advantages over traditional CGI server-side scripts. For example, you might use JavaScript to check if the user has entered a valid e-mail address in a form field.</p>\r\n<p>The JavaScript code is executed when the user submits the form, and only if all the entries are valid, they would be submitted to the Web Server.</p>\r\n<p>JavaScript can be used to trap user-initiated events such as button clicks, link navigation, and other actions that the user initiates explicitly or implicitly.</p>'),
(55, 'January-04-2018 20:58:58', 'Advantages of JavaScript', 'JAVASCRIPT', 'Mary', 'js.jpg', '<h1>Advantages of JavaScript</h1>\r\n<p>The merits of using JavaScript are âˆ’</p>\r\n<p><b>Less server interaction</b> âˆ’ You can validate user input before sending the page off to the server. This saves server traffic, which means less load on your server.</p>\r\n<p><b>Immediate feedback to the visitors</b> âˆ’ They don\'t have to wait for a page reload to see if they have forgotten to enter something.</p>\r\n<p><b>Increased interactivity</b> âˆ’ You can create interfaces that react when the user hovers over them with a mouse or activates them via the keyboard</p>\r\n<p><b>Richer interfaces</b> âˆ’ You can use JavaScript to include such items as drag-and-drop components and sliders to give a Rich Interface to your site visitors.</p>'),
(57, 'January-04-2018 21:10:23', 'Common uses of PHP', 'PHP', 'John', 'php.jpg', '<h1>Common uses of PHP</h1>\r\n<p>PHP performs system functions, i.e. from files on a system it can create, open, read, write, and close them.</p>\r\n<p>PHP can handle forms, i.e. gather data from files, save data to a file, through email you can send data, return data to the user.</p>\r\n<p>You add, delete, modify elements within your database through PHP.</p>\r\n<p>Access cookies variables and set cookies.</p>\r\n<p>Using PHP, you can restrict users to access some pages of your website.</p>'),
(58, 'January-04-2018 21:10:48', 'PHP - Server-Side Scripting Language', 'PHP', 'John', 'php.jpg', '<h1>PHP - Server-Side Scripting Language</h1>\r\n<p>The PHP Hypertext Preprocessor (PHP) is a programming language that allows web developers to create dynamic content that interacts with databases. PHP is basically used for developing web based software applications. This tutorial helps you to build your base with PHP.</p>\r\n<p>PHP started out as a small open source project that evolved as more and more people found out how useful it was. Rasmus Lerdorf unleashed the first version of PHP way back in 1994.</p>\r\n<p>PHP is a recursive acronym for \"PHP: Hypertext Preprocessor\".PHP is a server side scripting language that is embedded in HTML. It is used to manage dynamic content, databases, session tracking, even build entire e-commerce sites.</p>\r\n<p>It is integrated with a number of popular databases, including MySQL, PostgreSQL, Oracle, Sybase, Informix, and Microsoft SQL Server.PHP is pleasingly zippy in its execution, especially when compiled as an Apache module on the Unix side. The MySQL server, once started, executes even very complex queries with huge result sets in record-setting time.</p>\r\n<p>PHP supports a large number of major protocols such as POP3, IMAP, and LDAP. PHP4 added support for Java and distributed object architectures (COM and CORBA), making n-tier development a possibility for the first time.</p>'),
(59, 'January-04-2018 21:11:17', 'MySQL - Open-Source RDBMS', 'MYSQL', 'John', 'mysql.jpg', '<h1>MySQL - Open-Source RDBMS</h1>\r\n<p>MySQL is the most popular Open Source Relational SQL Database Management System. MySQL is one of the best RDBMS being used for developing various web-based software applications. MySQL is developed, marketed and supported by MySQL AB, which is a Swedish company. This tutorial will give you a quick start to MySQL and make you comfortable with MySQL programming.</p>\r\n<h3>What is a Database?</h3>\r\n<p>A database is a separate application that stores a collection of data. Each database has one or more distinct APIs for creating, accessing, managing, searching and replicating the data it holds.</p>\r\n<p>Other kinds of data stores can also be used, such as files on the file system or large hash tables in memory but data fetching and writing would not be so fast and easy with those type of systems.</p>\r\n<p>Nowadays, we use relational database management systems (RDBMS) to store and manage huge volume of data. This is called relational database because all the data is stored into different tables and relations are established using primary keys or other keys known as Foreign Keys.</p>'),
(60, 'January-04-2018 21:11:47', 'MYSQL - RDBMS Terminology', 'MYSQL', 'Mary', 'mysql.jpg', '<h1>RDBMS Terminology</h1>\r\n<p>Before we proceed to explain the MySQL database system, let us revise a few definitions related to the database.</p>\r\n<p><b>Database</b> âˆ’ A database is a collection of tables, with related data.</p>\r\n<p><b>Table</b> âˆ’ A table is a matrix with data. A table in a database looks like a simple spreadsheet.</p>\r\n<p><b>Column</b> âˆ’ One column (data element) contains data of one and the same kind, for example the column postcode.</p>\r\n<p><b>Row</b> âˆ’ A row (= tuple, entry or record) is a group of related data, for example the data of one subscription.</p>\r\n<p><b>Redundancy</b> âˆ’ Storing data twice, redundantly to make the system faster</p>\r\n<p><b>Primary Key</b> âˆ’ A primary key is unique. A key value can not occur twice in one table. With a key, you can only find one row.</p>\r\n<p><b>Foreign Key</b> âˆ’ A foreign key is the linking pin between two tables.</p>\r\n<p><b>Compound Key</b> âˆ’ A compound key (composite key) is a key that consists of multiple columns, because one column is not sufficiently unique.</p>\r\n<p><b>Index</b> âˆ’ An index in a database resembles an index at the back of a book.</p>\r\n<p><b>Referential Integrity</b> âˆ’ Referential Integrity makes sure that a foreign key value always points to an existing row.</p>'),
(61, 'January-04-2018 21:12:22', 'LARAVEL - Open-Source PHP Web Framework', 'LARAVEL', 'Mike', 'laravel.jpg', '<h1>LARAVEL - Open-Source PHP Web Framework</h1>\r\n<p>Laravel is a powerful MVC PHP framework, designed for developers who need a simple and elegant toolkit to create full-featured web applications. Laravel was created by Taylor Otwell. This is a brief tutorial that explains the basics of Laravel framework.</p>\r\n<p>Laravel is a MVC framework with bundles, migrations, and Artisan CLI. Laravel offers a robust set of tools and an application architecture that incorporates many of the best features of frameworks like CodeIgniter, Yii, ASP.NET MVC, Ruby on Rails, Sinatra, and others.</p>\r\n<p>Laravel is an Open Source framework. It has a very rich set of features which will boost the speed of Web Development. If you familiar with Core PHP and Advanced PHP, Laravel will make your task easier. It will save a lot time if you are planning to develop a website from scratch. Not only that, the website built in Laravel is also secure. It prevents the various attacks that can take place on websites.</p>'),
(62, 'January-04-2018 21:14:02', 'Laravel â€“ Features', 'LARAVEL', 'Mike', 'laravel.jpg', '<h1>Laravel â€“ Features</h1>\r\n<ul class=\"list-group\">\r\n	<li class=\"list-group-item\">Modularity</li>\r\n	<li class=\"list-group-item\">Testability</li>\r\n	<li class=\"list-group-item\">Routing</li>\r\n	<li class=\"list-group-item\">Configuration management</li>\r\n	<li class=\"list-group-item\">Query builder and ORM (Object Relational Mapper)</li>\r\n	<li class=\"list-group-item\">Schema builder, migrations, and seeding</li>\r\n	<li class=\"list-group-item\">Template engine</li>\r\n	<li class=\"list-group-item\">E-mailing</li>\r\n	<li class=\"list-group-item\">Authentication</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `creatorname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `datetime`, `name`, `creatorname`) VALUES
(2, 'January-02-2018 14:15:12', 'PHP', 'Admin'),
(3, 'January-02-2018 14:17:08', 'HTML', 'Admin'),
(4, 'January-02-2018 14:35:19', 'CSS', 'Admin'),
(5, 'January-02-2018 14:35:30', 'JAVASCRIPT', 'Admin'),
(6, 'January-02-2018 14:35:50', 'BOOTSRAP', 'Admin'),
(7, 'January-02-2018 14:35:56', 'JQUERY', 'Admin'),
(8, 'January-02-2018 14:36:14', 'MYSQL', 'Admin'),
(9, 'January-02-2018 14:36:19', 'LARAVEL', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approvedby` varchar(200) NOT NULL,
  `status` varchar(5) NOT NULL,
  `admin_panel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `datetime`, `name`, `email`, `comment`, `approvedby`, `status`, `admin_panel_id`) VALUES
(27, 'January-04-2018 21:17:34', 'John', 'John@gmail.com', 'Awesome Post!', 'pending', 'OFF', 62),
(28, 'January-04-2018 21:17:44', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'Mary', 'ON', 62),
(29, 'January-04-2018 21:17:59', 'Mary', 'Mary@gmail.com', 'Exactly What I Was Looking For!', 'pending', 'OFF', 62),
(30, 'January-04-2018 21:18:47', 'John', 'John@gmail.com', 'Exactly What I Was Looking For!', 'pending', 'OFF', 61),
(31, 'January-04-2018 21:18:59', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'Mary', 'ON', 61),
(32, 'January-04-2018 21:19:14', 'Mary', 'mary@gmail.com', 'Awesome Post!\r\n', 'pending', 'OFF', 61),
(33, 'January-04-2018 21:19:22', 'John', 'John@gmail.com', 'Awesome Post!\r\n', 'pending', 'OFF', 60),
(34, 'January-04-2018 21:19:31', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'pending', 'OFF', 60),
(35, 'January-04-2018 21:19:41', 'Mary', 'mary@gmail.com', 'Exactly What I Was Looking For!', 'pending', 'OFF', 60),
(36, 'January-04-2018 21:19:48', 'John', 'John@gmail.com', 'Exactly What I Was Looking For!', 'Mary', 'ON', 59),
(37, 'January-04-2018 21:19:58', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'Mary', 'ON', 59),
(38, 'January-04-2018 21:20:06', 'Mary', 'mary@gmail.com', 'Awesome Post!\r\n', 'Mary', 'ON', 59),
(39, 'January-04-2018 21:20:15', 'John', 'John@gmail.com', 'Awesome Post!\r\n', 'Mary', 'ON', 58),
(40, 'January-04-2018 21:20:23', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'pending', 'OFF', 58),
(41, 'January-04-2018 21:20:32', 'Maxy', 'mary@gmail.com', 'Exactly What I Was Looking For!', 'pending', 'OFF', 58),
(42, 'January-04-2018 21:20:39', 'John', 'John@gmail.com', 'Exactly What I Was Looking For!', 'Mary', 'ON', 57),
(43, 'January-04-2018 21:20:46', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'John', 'ON', 57),
(44, 'January-04-2018 21:20:57', 'Mary', 'mary@gmail.com', 'Awesome Post!\r\n', 'John', 'ON', 57),
(45, 'January-04-2018 21:21:04', 'John', 'John@gmail.com', 'Awesome Post!\r\n', 'John', 'ON', 55),
(46, 'January-04-2018 21:21:11', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'John', 'ON', 55),
(47, 'January-04-2018 21:21:19', 'Mary', 'mary@gmail.com', 'Exactly What I Was Looking For!', 'pending', 'OFF', 55),
(48, 'January-04-2018 21:21:30', 'John', 'John@gmail.com', 'Exactly What I Was Looking For!', 'John', 'ON', 54),
(49, 'January-04-2018 21:21:38', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'pending', 'OFF', 54),
(50, 'January-04-2018 21:22:01', 'Mary', 'mary@gmail.com', 'Good Work. Excellent!!', 'pending', 'OFF', 54),
(51, 'January-04-2018 21:22:10', 'John', 'John@gmail.com', 'Awesome Post!\r\n', 'pending', 'OFF', 53),
(52, 'January-04-2018 21:22:19', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'John', 'ON', 53),
(53, 'January-04-2018 21:22:26', 'Mary', 'mary@gmail.com', 'Exactly What I Was Looking For!', 'Mary', 'ON', 53),
(54, 'January-04-2018 21:22:33', 'John', 'John@gmail.com', 'Awesome Post!\r\n', 'Mary', 'ON', 52),
(55, 'January-04-2018 21:22:41', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'John', 'ON', 52),
(56, 'January-04-2018 21:22:50', 'Mary', 'mary@gmail.com', 'Exactly What I Was Looking For!', 'Mary', 'ON', 52),
(57, 'January-04-2018 21:22:59', 'John', 'John@gmail.com', 'Awesome Post!\r\n', 'pending', 'OFF', 50),
(58, 'January-04-2018 21:23:05', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'John', 'ON', 50),
(59, 'January-04-2018 21:23:13', 'Mary', 'mary@gmail.com', 'Exactly What I Was Looking For!', 'Mary', 'ON', 50),
(60, 'January-04-2018 21:23:24', 'John', 'John@gmail.com', 'Awesome Post!\r\n', 'pending', 'OFF', 49),
(61, 'January-04-2018 21:23:32', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'John', 'ON', 49),
(62, 'January-04-2018 21:23:40', 'Mary', 'mary@gmail.com', 'Exactly What I Was Looking For!', 'John', 'ON', 49),
(63, 'January-04-2018 21:23:49', 'John', 'John@gmail.com', 'Awesome Post!\r\n', 'Mike', 'ON', 48),
(64, 'January-04-2018 21:23:57', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'John', 'ON', 48),
(65, 'January-04-2018 21:24:05', 'Mary', 'mary@gmail.com', 'Exactly What I Was Looking For!', 'John', 'ON', 48),
(66, 'January-04-2018 21:24:14', 'John', 'John@gmail.com', 'Awesome Post!\r\n', 'Mike', 'ON', 47),
(67, 'January-04-2018 21:24:21', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'Mary', 'ON', 47),
(68, 'January-04-2018 21:24:28', 'Mary', 'mary@gmail.com', 'Exactly What I Was Looking For!', 'Mary', 'ON', 47),
(69, 'January-04-2018 21:24:36', 'John', 'John@gmail.com', 'Awesome Post!\r\n', 'Mike', 'ON', 45),
(70, 'January-04-2018 21:24:43', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'Mary', 'ON', 45),
(71, 'January-04-2018 21:24:51', 'Mary', 'mary@gmail.com', 'Exactly What I Was Looking For!', 'pending', 'OFF', 45),
(72, 'January-04-2018 21:24:59', 'John', 'John@gmail.com', 'Awesome Post!\r\n', 'Mike', 'ON', 44),
(73, 'January-04-2018 21:25:06', 'Max', 'Max@gmail.com', 'Clear and Concise!\r\n', 'John', 'ON', 44),
(74, 'January-04-2018 21:25:16', 'Mary', 'mary@gmail.com', 'Exactly What I Was Looking For!', 'Mike', 'ON', 44);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `creatorname` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `datetime`, `username`, `creatorname`, `password`) VALUES
(1, 'January-03-2018 18:25:17', 'John', 'Admin', 'john123'),
(2, 'January-03-2018 18:30:35', 'Max', 'Admin', 'Max123'),
(3, 'January-03-2018 18:30:48', 'Mike', 'Admin', 'Mike123'),
(4, 'January-03-2018 21:43:59', 'Mary', 'Mike', 'mary123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_panel_id` (`admin_panel_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
