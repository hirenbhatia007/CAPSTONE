-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 09:43 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catchyourart`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artistid` int(11) NOT NULL,
  `artistname` varchar(256) NOT NULL,
  `image` varchar(250) NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artistid`, `artistname`, `image`, `address`, `city`, `country`, `phone`, `email`, `password`) VALUES
(9, 'AdrianPiper', 'images/Artist/AdrianPiper.png', '37 vanier drive', 'kitchener', 'canada', '4111568796', 'adrianpiper@gmail.com', '94e47db534b5adc346bbfd1301963335'),
(10, 'AlexDacorte', 'images/Artist/Alex-Da-Corte.jpg', '49 king street W', 'cambridge', 'United Kingdom', '4567897896', 'alexdacortre@yahoo.com', '3a013fccbad1dea0894657ceea8216c5'),
(11, 'Andrea', 'images/Artist/andrea.jpg', '456 fountain street', 'Toronto', 'canada', '4167899856', 'andrea@gmail.com', '10f6c2a880d21c337f52fdc71581029a'),
(12, 'CaoFei', 'images/Artist/Cao-Fei.jpg', '45 blackcreek drive', 'kitchener', 'canada', '4167897895', 'Caofei@gmail.com', 'c573c5c229fc778e8bb15926d2aca43f'),
(13, 'Hockeny', 'images/Artist/david-hockney.jpg', '89 huron drive', 'windsor', 'canada', '2267896584', 'davidhockeny@yahoo.com', '843710978951b5049d530394e2c70153'),
(14, 'Mariele', 'images/Artist/mariele.jpg', '89 glenstroke drive', 'scarborough', 'canada', '4165789824', 'Mariele@gmail.com', '249b0ec2ef504b8af3fbe6684506894e'),
(15, 'Nicole', 'images/Artist/nicole-eisenman.jpg', '896 keys drive', 'woodstock', 'canada', '4165788796', 'nicole@yahoo.com', 'b96cce4cafbb6a52b92703b410225a01'),
(16, 'TakashiMurakama', 'images/Artist/takashi-murakami.jpg', '48 springbank avenue', 'London', 'canada', '2235789854', 'TakashiMurakama@gmail.com', '963366567cf541c70535e2284abdad98'),
(17, 'WuTsang', 'images/Artist/Wu-Tsang.jpg', '78 Morningwood drive', 'Barrie', 'canada', '4567899876', 'WuTsang@gmail.com', '544bd225e519efdbd92a6266319a9a3a'),
(18, 'Simone', 'images/Artist/Simone-Leigh.jpg', '456 weatherall avenue', 'cambridge', 'canada', '4567891234', 'Simone@gmail.com', '09bb7d8280ae5c2a90124f83f0f7b015'),
(19, 'Krupali Patel', 'images/Artist/Krupali.jpeg', '83 vanier drive', 'Kitchener', 'Canada', '647-563-1240', 'Krupali11@gmail.com', '78629811a4d3d30cbc425aa7356d45bb'),
(20, 'Megha Dave', 'images/Artist/Megha.jpg', '797, Doon Village Rd', 'Kitchener', 'Canada', '226-898-2366', 'megha221@gmail.com', '489877ec5b7a26bcc731272882ab08e4'),
(21, 'Krupal', 'images/Artist/Krupal.jpg', '206-286 CHANDLER DRIVE', 'Kitchener', 'Canada', '416-518-9396', 'krupal821@gmail.com', '2b8aacac3cf0d490ab80ae41f1b3b8df');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogid` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `artistid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogid`, `title`, `image`, `description`, `date`, `artistid`) VALUES
(2, 'headsee', 'images/Blog/BackGround.png', 'sacdsgfhh', '2019-04-16', 19);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryid`, `categoryname`) VALUES
(1, 'Painting'),
(2, 'Photography'),
(3, 'Mixed Media'),
(4, 'Drawing'),
(5, 'Digital'),
(6, 'Sculpture'),
(7, 'Hand Printed Works'),
(8, 'Realism'),
(9, 'Modern'),
(10, 'Pop Art'),
(11, 'Black & White'),
(12, 'Abstracts');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `total` int(20) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `address` varchar(60) NOT NULL,
  `city` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `cardnumber` int(20) NOT NULL,
  `securitycode` int(4) NOT NULL,
  `email` varchar(30) NOT NULL,
  `exprydate` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `total`, `fullname`, `address`, `city`, `country`, `phone`, `cardnumber`, `securitycode`, `email`, `exprydate`) VALUES
(3, 48, 688, 'Krupal Patel', '37 vanier drive', 'kitchener', 'canada', '226-899-0436', 2147483647, 457, 'nimit20@gmail.com', '2/2019');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `description` varchar(256) NOT NULL,
  `size` varchar(10) NOT NULL,
  `price` double(9,2) NOT NULL,
  `artistid` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `categoryid`, `description`, `size`, `price`, `artistid`, `image`) VALUES
(1, 'LostGarden', 1, 'Responsibly sourced solid ash frame, with hand applied black stain and finishing wax. 19mm wide by 44mm deep.', 'MEDIUM', 140.00, 9, 'images/painting/1.jpg'),
(2, 'Lilac', 1, 'Limited edition of 75 with 5 artist proofs. Hand-embossed and numbered', 'MEDIUM', 140.00, 10, 'images/painting/2.jpg'),
(3, 'Frieda', 1, 'Giclee print on 100% cotton rag paper with three silkscreen finishes: an irridescent blend over the collar', 'MEDIUM', 290.00, 9, 'images/painting/3.jpg'),
(4, 'Lost _Garden_red', 1, 'Limited edition of 75 with 5 artist proofs. Hand-embossed and numbered', 'MEDIUM', 160.00, 11, 'images/painting/4.jpg'),
(5, 'Frozen_wood', 2, 'Frozen wood photography painting.', 'LARGE', 170.00, 11, 'images/photography/1.jpg'),
(6, 'Lake', 2, 'Tree  in a lake.', 'MEDIUM', 250.00, 12, 'images/photography/2.jpg'),
(7, 'Balloon', 2, 'Balloons flying in deseart', 'MEDIUM', 180.00, 11, 'images/photography/3.jpg'),
(8, 'street', 2, 'street photograph from andrea', 'LARGE', 235.00, 11, 'images/photography/4.jpg'),
(9, 'Kids', 2, 'Dramatic art photography by takashi murakami', 'LARGE', 220.00, 16, 'images/photography/5.jpg'),
(10, 'Morning Light', 3, ' Acrylic Color Explorations by CaoFei', 'SMALL', 136.00, 12, 'images/mixed_media/1.jpg'),
(11, 'Flowers', 3, 'Flowers painting with Acrylic Color Explorations by CaoFei', 'MEDIUM', 157.00, 12, 'images/mixed_media/2.jpg'),
(12, 'I see you', 3, 'Original fine art from Hockeny', 'MEDIUM', 242.00, 13, 'images/mixed_media/3.jpg'),
(13, 'Cluster', 3, 'Mixed media art from Alex Da corte', 'LARGE', 175.00, 10, 'images/mixed_media/4.jpg'),
(14, 'wooden art', 3, 'Mixed wooden art from Mariele', 'LARGE', 156.00, 14, 'images/mixed_media/5.jpg'),
(15, 'Vintage', 8, 'painting from mid nineteenth century', 'LARGE', 160.00, 14, 'images/realism/1.jpg'),
(16, 'Village', 8, 'Ancient Europian people painting from Wu Tsang', 'MEDIUM', 123.00, 17, 'images/realism/2.jpg'),
(17, 'Farm', 8, 'painting of farmers.', 'MEDIUM', 125.00, 15, 'images/realism/3.jpg'),
(18, 'Aged lady', 8, 'Painting of aged lady by Hockeny', 'MEDIUM', 256.00, 13, 'images/realism/4.jpg'),
(19, 'old paining', 8, 'Painting from Mariele', 'SMALL', 138.00, 14, 'images/realism/5.jpg'),
(20, 'Dog\'s fight', 4, 'Dog\'s fighting painting from Andrea', 'SMALL', 178.00, 11, 'images/drawing/1.jpg'),
(21, 'Wolf', 4, 'Painting of wolf by simone', 'SMALL', 165.00, 18, 'images/drawing/2.jpg'),
(22, 'Drawing art', 4, 'Drawing art of beautiful lady by Wu Tsang', 'MEDIUM', 198.00, 17, 'images/drawing/3.jpg'),
(23, 'Cartoon', 4, 'cartoon of girl by Alex Da corte', 'MEDIUM', 129.00, 10, 'images/drawing/4.jpg'),
(24, 'Pencil art', 4, 'Drawing by Andrea', 'MEDIUM', 210.00, 11, 'images/drawing/5.jpg'),
(25, 'lady', 5, 'painting by Takashi murakami', 'MEDIUM', 180.00, 16, 'images/digital/1.jpg'),
(26, 'Digital', 5, 'painting by mariele', 'MEDIUM', 170.00, 14, 'images/digital/2.jpg'),
(27, 'Princess', 5, 'Digital painting by Nicole', 'MEDIUM', 155.00, 15, 'images/digital/3.jpg'),
(28, 'sad girl', 5, 'painting by Nicole', 'SMALL', 136.00, 15, 'images/digital/4.jpg'),
(29, 'Oil paint', 6, 'oil paint of kid by Andrea', 'MEDIUM', 200.00, 11, 'images/sculpture/1.jpg'),
(30, 'Acralic', 6, 'A sculpture art painting by Adrian piper', 'MEDIUM', 213.00, 9, 'images/sculpture/2.jpg'),
(31, 'clay', 6, 'a paintin from simone', 'LARGE', 158.00, 18, 'images/sculpture/3.jpg'),
(32, 'Sculpturte art', 6, 'a beautiful art painting from Wu Tsang', 'MEDIUM', 258.00, 17, 'images/sculpture/4.jpg'),
(33, 'Cartoon', 6, 'Sculpture paintng from Cao fei ', 'SMALL', 160.00, 12, 'images/sculpture/5.jpg'),
(34, 'Mug', 7, 'Hand printed painting from takashi murakami', 'MEDIUM', 186.00, 16, 'images/hand_printed/1.jpg'),
(35, 'toothbrushes', 7, 'a painting from Wu Tsang', 'MEDIUM', 167.00, 17, 'images/hand_printed/2.jpg'),
(36, 'Hands', 7, ' A painting from Mariele', 'MEDIUM', 173.00, 14, 'images/hand_printed/4.jpg'),
(37, 'Rainy days', 9, 'Street art by simone', 'MEDIUM', 136.00, 18, 'images/modern/1.jpg'),
(38, 'modern_paint', 9, 'A painting by Andrea', 'MEDIUM', 250.00, 11, 'images/modern/2.jpg'),
(39, 'sunny day', 9, 'painting of sunny day by Wu Tsang', 'MEDIUM', 187.00, 17, 'images/modern/3.jpg'),
(40, 'Colours', 9, 'A painting from Cao Fei', 'MEDIUM', 149.00, 12, 'images/modern/4.jpg'),
(41, 'colorful lady', 10, 'A painting from Takashi murakami.', 'MEDIUM', 234.00, 16, 'images/popart/1.jpg'),
(42, 'Pop', 10, 'A painting from Nicole', 'MEDIUM', 164.00, 15, 'images/popart/2.jpg'),
(43, 'Newyork', 10, 'Pop art of new york from  simone', 'LARGE', 186.00, 18, 'images/popart/3.jpg'),
(44, 'girl', 10, 'A painting from Wu Tsang', 'MEDIUM', 177.00, 17, 'images/popart/4.jpg'),
(45, 'B&W', 11, 'a black and white painting from Adrian Piper', 'MEDIUM', 159.00, 9, 'images/b&w/1.jpg'),
(46, 'Minimal B&W', 11, 'Minimal painting from Alex Da Cote', 'LARGE', 244.00, 10, 'images/b&w/2.jpg'),
(47, 'girl B&W', 11, 'A painting from Hockeny', 'SMALL', 115.00, 13, 'images/b&w/3.jpg'),
(48, 'sculpture B&W', 11, 'A b&W painting from simone', 'MEDIUM', 172.00, 18, 'images/b&w/4.jpg'),
(49, 'love', 11, 'A b&w painting of couple.', 'LARGE', 178.00, 15, 'images/b&w/5.jpg'),
(50, 'abstract', 12, 'a painting from Wu Tsang', 'MEDIUM', 164.00, 17, 'images/abstract/1.jpg'),
(51, 'abstact-2', 12, 'a abstracts painting from Takashi Murakami', 'MEDIUM', 166.00, 16, 'images/abstract/2.jpg'),
(52, 'mixed colors', 12, 'a mixed colords painting', 'LARGE', 259.00, 13, 'images/abstract/4.jpg'),
(53, 'Oilabstarct', 12, 'a abstact painting in oil painting', 'MEDIUM', 126.00, 13, 'images/abstract/5.jpg'),
(54, 'abstract colors', 12, 'painting by Adrian Piper', 'MEDIUM', 250.00, 9, 'images/abstract/3.jpg'),
(55, 'Abstract oil painting', 12, 'painting by adrian piper', 'MEDIUM', 140.00, 9, 'images/abstract/6.jpg'),
(56, 'India Gate', 12, 'Painting by Adrian piper.', 'LARGE', 229.00, 9, 'images/abstract/7.jpg'),
(57, 'Vanice city', 12, 'Oil painting of vanice city.', 'MEDIUM', 199.00, 9, 'images/abstract/8.jpg'),
(58, 'Moon Rouge', 12, 'Painting by Adrian Piper', 'MEDIUM', 239.00, 9, 'images/abstract/9.jpg'),
(59, 'Garden oil Painting', 12, 'Garden oil painting by Adrian Piper', 'LARGE', 222.00, 9, 'images/abstract/10.jpg'),
(60, 'Rainy Day', 11, 'painting By Alex-Da-Corte', 'MEDIUM', 235.00, 10, 'images/b&w/6.jpg'),
(61, 'Effile tower', 11, 'Effile tower black & white painting from Alex-Da-Corte', 'MEDIUM', 240.00, 10, 'images/b&w/7.jpg'),
(62, 'Buildings', 11, 'Original Painting by Alex-Da-Corte', 'MEDIUM', 225.00, 10, 'images/b&w/8.jpg'),
(63, 'River Front', 11, 'River bank painting by Alex-Da-Corte', 'MEDIUM', 188.00, 10, 'images/b&w/9.jpg'),
(64, 'Mountain', 11, 'Mountai black & white painting from Alex-Da-Corte', 'MEDIUM', 270.00, 10, 'images/b&w/10.jpg'),
(65, 'Lord Ganesha', 5, 'Lord Ganesha Painting by Alex-Da-Corte', 'SMALL', 190.00, 20, 'images/digital/5.jpg'),
(66, 'Krishna', 5, 'Lord Krishna painting by Andrea', 'LARGE', 267.00, 20, 'images/digital/6.jpg'),
(67, 'pencils', 5, 'Painting By Andrea', 'SMALL', 157.00, 20, 'images/digital/7.jpg'),
(68, 'Digital art', 5, 'Painting by Cao Fei', 'MEDIUM', 200.00, 19, 'images/digital/8.jpg'),
(69, 'Indian woman', 5, 'Painting by Cao Fei', 'MEDIUM', 240.00, 12, 'images/digital/9.jpg'),
(70, 'Warrior', 5, 'Painting from Cao Fei', 'LARGE', 265.00, 12, 'images/digital/10.jpg'),
(71, 'Kumfu boy', 4, 'Painting by Cao Fei', 'LARGE', 265.00, 19, 'images/drawing/6.jpg'),
(72, 'Drawing art', 4, 'Painting draw by Cao Fei', 'LARGE', 239.00, 12, 'images/drawing/7.jpg'),
(73, 'ChristmasTree', 4, ' Painting by David Hockeny', 'MEDIUM', 233.00, 19, 'images/drawing/8.jpg'),
(74, 'Landscape', 4, 'Landscape painting by David Hockeny', 'MEDIUM', 245.00, 13, 'images/drawing/9.jpg'),
(75, 'Landscape-2', 4, 'Painting from David Hockeny', 'MEDIUM', 261.00, 13, 'images/drawing/10.jpg'),
(76, 'Hand Printed works', 7, 'A hand printed works by David Hockeny', 'SMALL', 265.00, 13, 'images/hand_printed/3.jpg'),
(77, 'hand  Printed-2', 7, 'A hand Printed painting by David Hockeny', 'MEDIUM', 177.00, 13, 'images/hand_printed/5.jpg'),
(78, 'Flower', 7, 'A hand printed flower painting by Mariele', 'MEDIUM', 135.00, 14, 'images/hand_printed/6.jpg'),
(79, 'Tree', 7, 'A painting by Mariele', 'MEDIUM', 165.00, 14, 'images/hand_printed/7.jpg'),
(80, 'Flower-2', 7, 'Painting by Mariele', 'MEDIUM', 199.00, 14, 'images/hand_printed/8.jpg'),
(81, 'Flowers-3', 7, 'A painting by Mariele', 'MEDIUM', 225.00, 14, 'images/hand_printed/9.jpg'),
(82, 'Rose garden', 7, 'A painting by Mariele', 'MEDIUM', 179.00, 14, 'images/hand_printed/10.jpg'),
(83, 'Mixed one!!', 3, 'A painting by Nicole', 'MEDIUM', 200.00, 15, 'images/mixed_media/6.jpg'),
(84, 'sunset', 3, 'a PAINTING BY Nicole', 'MEDIUM', 215.00, 15, 'images/mixed_media/7.jpg'),
(85, 'FACE', 3, 'A painting by Nicole', 'MEDIUM', 158.00, 15, 'images/mixed_media/8.jpg'),
(86, 'Taj Mahal', 3, 'Painting by Nicole', 'MEDIUM', 169.00, 15, 'images/mixed_media/9.jpg'),
(87, 'mixed art', 3, 'A painting by Nicole', 'SMALL', 185.00, 15, 'images/mixed_media/10.jpg'),
(88, 'modern art', 9, 'A modern art painting by takashi murakami', 'LARGE', 189.00, 16, 'images/modern/5.jpg'),
(89, 'Moon', 9, 'A painting by Takshi Murakami', 'MEDIUM', 199.00, 16, 'images/modern/6.jpg'),
(90, 'Lake', 9, 'a painting by takashi murakami', 'MEDIUM', 210.00, 16, 'images/modern/7.jpg'),
(91, 'Modern painting', 9, 'A painting by Takashi Murakami', 'MEDIUM', 205.00, 16, 'images/modern/8.jpg'),
(92, 'Modern art', 9, 'A modern art painting by takashi murakami', 'MEDIUM', 195.00, 16, 'images/modern/9.jpg'),
(93, 'cloud', 2, 'A painting by Wu Tsang', 'MEDIUM', 200.00, 17, 'images/photography/6.jpg'),
(94, 'Deseart', 2, 'a photography art painting by Wu tsang', 'LARGE', 147.00, 17, 'images/photography/7.jpg'),
(95, 'River', 2, 'A painting by Wu Tsang', 'MEDIUM', 140.00, 17, 'images/photography/8.jpg'),
(96, 'Superman', 10, 'A superman painting by Simone', 'MEDIUM', 166.00, 18, 'images/popart/6.jpg'),
(97, 'Pop art', 10, 'A painting by Simone', 'MEDIUM', 203.00, 18, 'images/popart/5.jpg'),
(98, 'Workout girls', 8, 'A painting by Simone', 'LARGE', 186.00, 18, 'images/realism/6.jpg'),
(99, 'Girl in Farm', 8, 'A painting by Simone', 'MEDIUM', 184.00, 18, 'images/realism/8.jpg'),
(100, 'Bridge', 6, 'A  art painting by Simone', 'MEDIUM', 159.00, 18, 'images/sculpture/10.jpg'),
(101, 'Boat', 8, 'A painting by andrea', 'MEDIUM', 220.00, 11, 'images/realism/10.jpg'),
(102, 'Sleeping kid', 8, 'A sleeping kid painting.', 'MEDIUM', 240.00, 14, 'images/realism/9.jpg'),
(103, 'Vimntage market', 8, 'a vintage market painting by Nicole', 'MEDIUM', 225.00, 15, 'images/realism/7.jpg'),
(104, 'Vintage', 2, 'A painting by Mariele', 'MEDIUM', 236.00, 14, 'images/photography/10.jpg'),
(105, 'firework', 2, 'a painting by Alex-Da-Corte', 'MEDIUM', 289.00, 10, 'images/photography/9.jpg'),
(106, 'spiderman', 10, 'A spiderman painting by Takashi Murakami', 'MEDIUM', 250.00, 16, 'images/popart/8.jpg'),
(107, 'Charley', 2, 'a painting by Simone', 'MEDIUM', 245.00, 18, 'images/photography/9.jpg'),
(108, 'Popart-2', 10, 'a painting by Wu Tsang', 'MEDIUM', 199.00, 17, 'images/popart/10.jpg'),
(109, 'pop art painting', 10, 'a painting Cao fei', 'MEDIUM', 178.00, 12, 'images/popart/7.jpg'),
(110, 'Effile tower', 6, 'a painting by david hockeny', 'MEDIUM', 148.00, 13, 'images/sculpture/6.jpg'),
(111, 'Sculp art', 6, 'a painting by adrian piper', 'MEDIUM', 155.00, 9, 'images/sculpture/7.jpg'),
(112, 'Rouge', 6, 'a painting by Andrea\r\n', 'LARGE', 165.00, 11, 'images/sculpture/8.jpg'),
(113, 'city', 6, 'a painting by Wu Tsang', 'MEDIUM', 175.00, 17, 'images/sculpture/9.jpg'),
(114, 'Jungle', 1, 'A painting by nicole', 'MEDIUM', 148.00, 15, 'images/painting/10.jpg'),
(115, 'painting', 1, 'a apinting by Wu Tsang', 'MEDIUM', 122.00, 17, 'images/painting/5.jpg'),
(116, 'Girl with dog', 1, 'A painting by simone', 'MEDIUM', 135.00, 18, 'images/painting/6.jpg'),
(117, 'Roses', 1, 'A painting by Andrea', 'MEDIUM', 167.00, 11, 'images/painting/7.jpg'),
(118, 'Tree', 1, 'A painting by simone', 'MEDIUM', 178.00, 18, 'images/painting/8.jpg'),
(119, 'Coconut tree', 1, 'A painting by Cao fei', 'LARGE', 125.00, 12, 'images/painting/9.jpg'),
(120, 'cartoon', 6, 'a painting by Takashi murakami', 'MEDIUM', 133.00, 16, 'images/sculpture/5.jpg'),
(122, 'Model', 4, 'Art drew by me', 'LARGE', 340.40, 21, 'images/drawing/girl.jpg'),
(139, 'krupal', 7, '', 'MEDIUM', 1000.00, 19, 'images/hand_printed/Krupal.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `address`, `city`, `country`, `phone`, `email`, `password`) VALUES
(43, 'krupal1234', '', '', '', '0', 'patel821@gmail.com', 'fb8a0286e08f683d56788d4281502139'),
(44, 'KRUPAL', '206-286 CHANDLER DRIVE', 'Kitchener', 'Canada', '0', 'krupalcr6@gmail.com', '33053642da28a70ec4bd70d36d8099c6'),
(45, 'hiren', '', '', '', '647', 'krupal821@gmail.com', '33053642da28a70ec4bd70d36d8099c6'),
(46, 'KRUPALL', '206-286 CHANDLER DRIVE', 'Kitchener', 'Canada', '226', 'pAaTEL821@gmail.com', '33053642da28a70ec4bd70d36d8099c6'),
(47, 'Patel', '797, Doon Village Rd', 'Kitchener', '', '2147483647', 'Kruppal281@gmail.com', '33053642da28a70ec4bd70d36d8099c6'),
(48, 'Twinkle', '', '', '', '818', 'gaerhaer@gmail.com', '33053642da28a70ec4bd70d36d8099c6'),
(49, 'KRUPAL1', '', 'Kitchener', 'Canada', '226-898-2366', 'twinpatel20@gmail.com', '33053642da28a70ec4bd70d36d8099c6'),
(50, 'kaushal', '294 chandler dr', 'Kitchener', '', '647-563-1240', 'kaushalpatel257@gmail.com', 'c7f9c7ab114b9323210919701210591e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artistid`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogid`),
  ADD KEY `fk_artist` (`artistid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD KEY `fk_user` (`userid`),
  ADD KEY `fk_fproduct` (`productid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `fk_users` (`userid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `fk_catergory` (`categoryid`),
  ADD KEY `fk_artistid` (`artistid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `fk_artist` FOREIGN KEY (`artistid`) REFERENCES `artist` (`artistid`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `fk_fproduct` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_artistid` FOREIGN KEY (`artistid`) REFERENCES `artist` (`artistid`),
  ADD CONSTRAINT `fk_catergory` FOREIGN KEY (`categoryid`) REFERENCES `categories` (`categoryid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
