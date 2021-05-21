-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2021 at 11:17 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BLOG`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `ID` varchar(10) NOT NULL,
  `FULL_NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(320) NOT NULL,
  `PASSWORD` varbinary(511) NOT NULL,
  `PROFILE_PIC_LOCATION` varchar(255) DEFAULT NULL,
  `BIO` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`ID`, `FULL_NAME`, `EMAIL`, `PASSWORD`, `PROFILE_PIC_LOCATION`, `BIO`) VALUES
('A_1', 'Joseph Benoy', 'josephbenoy03@gmail.com', 0x3f5981ed8b22fe55eb8ed6687c9da455, 'avatar.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mus mauris vitae ultricies leo. In arcu cursus euismod quis viverra nibh cras. A erat nam at lectus urna duis convallis convallis. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Aliquam vestibulum morbi blandit cursus risus at ultrices mi. Imperdiet massa tincidunt nunc pulvinar sapien. Ultrices gravida dictum fusce ut placerat. Viverra aliquet eget sit amet tellus. Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit sed. Volutpat maecenas volutpat blandit aliquam etiam erat. Suspendisse faucibus interdum posuere lorem ipsum. Morbi tempus iaculis urna id volutpat lacus laoreet non curabitur. Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Sed tempus urna et pharetra pharetra massa massa ultricies mi. Elit sed vulputate mi sit amet. Orci sagittis eu volutpat odio facilisis mauris sit amet massa. Enim eu turpis egestas pretium aenean. Scelerisque purus semper eget duis at tellus.\r\n\r\nInterdum consectetur libero id faucibus. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Quis imperdiet massa tincidunt nunc pulvinar sapien. Elementum curabitur vitae nunc sed velit dignissim sodales. Adipiscing diam donec adipiscing tristique. Amet aliquam id diam maecenas ultricies. Neque volutpat ac tincidunt vitae semper quis. Imperdiet dui accumsan sit amet nulla facilisi. Vitae ultricies leo integer malesuada nunc vel. Parturient montes nascetur ridiculus mus mauris vitae. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Mi sit amet mauris commodo. Nec nam aliquam sem et. Sed felis eget velit aliquet sagittis id consectetur purus. Vitae tortor condimentum lacinia quis. Etiam non quam lacus suspendisse faucibus interdum.\r\n\r\nImperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper. Bibendum at varius vel pharetra vel turpis nunc eget. Libero justo laoreet sit amet. Ac tortor vitae purus faucibus ornare suspendisse sed nisi. Scelerisque felis imperdiet proin fermentum leo vel orci porta. Enim sit amet venenatis urna cursus. Sodales ut eu sem integer vitae justo eget. Nunc congue nisi vitae suscipit tellus mauris a diam maecenas. Et netus et malesuada fames ac turpis. Sagittis purus sit amet volutpat consequat mauris nunc congue. At imperdiet dui accumsan sit. Magnis dis parturient montes nascetur. Eget sit amet tellus cras. Ut aliquam purus sit amet luctus venenatis. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida.\r\n\r\nSed enim ut sem viverra aliquet eget sit amet tellus. Metus dictum at tempor commodo ullamcorper a lacus vestibulum sed. Sed egestas egestas fringilla phasellus faucibus scelerisque. Convallis tellus id interdum velit laoreet. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque. Proin libero nunc consequat interdum varius sit amet mattis. Hac habitasse platea dictumst quisque sagittis purus. Aliquam etiam erat velit scelerisque in dictum non consectetur a. Dictum non consectetur a erat nam at lectus urna. In est ante in nibh mauris cursus mattis molestie a. Bibendum enim facilisis gravida neque convallis a cras. Diam donec adipiscing tristique risus nec feugiat. Lorem ipsum dolor sit amet consectetur. Lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt ornare. Vitae congue eu consequat ac felis donec et odio pellentesque. Lacus sed turpis tincidunt id aliquet risus feugiat in ante. Nunc sed blandit libero volutpat sed cras ornare. Vel pharetra vel turpis nunc eget lorem dolor sed viverra. Ultrices neque ornare aenean euismod elementum nisi quis eleifend.\r\n\r\nEu mi bibendum neque egestas congue quisque egestas diam in. Consectetur lorem donec massa sapien. Rhoncus aenean vel elit scelerisque. Cras sed felis eget velit aliquet. Id ornare arcu odio ut sem nulla. Amet consectetur adipiscing elit duis tristique sollicitudin. Enim diam vulputate ut pharetra sit. Netus et malesuada fames ac turpis egestas maecenas pharetra. At elementum eu facilisis sed odio morbi quis. Ipsum consequat nisl vel pretium lectus.');

-- --------------------------------------------------------

--
-- Table structure for table `MESSAGES`
--

CREATE TABLE `MESSAGES` (
  `ID` varchar(20) NOT NULL,
  `FULL_NAME` varchar(25) NOT NULL,
  `EMAIL` varchar(320) NOT NULL,
  `PHONE` varchar(15) NOT NULL,
  `MESSAGES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `MESSAGES`
--

INSERT INTO `MESSAGES` (`ID`, `FULL_NAME`, `EMAIL`, `PHONE`, `MESSAGES`) VALUES
('M_0', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', 'Good post vro<3'),
('M_1', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', 'Good post btw !!!'),
('M_10', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '&lt;script&gt;alert(\'hello world!\')&lt;/script&gt;'),
('M_11', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '&lt;script&gt;alert(\'hello world!\')&lt;/script&gt;'),
('M_12', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '&lt;script&gt;alert(\'hello world!\')&lt;/script&gt;'),
('M_13', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '&lt;script&gt;alert(\'hello world!\')&lt;/script&gt;'),
('M_14', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '&lt;script&gt;alert(\'hello world!\')&lt;/script&gt;'),
('M_15', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '<script>alert(\'hello world!\')</script>'),
('M_16', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '<script>alert(\'hello world!\')</script>'),
('M_17', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '&lt;script&gt;alert(\'hello world!\')&lt;/script&gt;'),
('M_18', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '&lt;script&gt;alert(\'hello world!\')&lt;/script&gt;'),
('M_19', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', 'slerisofsfrefherkfhjelvrntullllllllllllllllllllllllllllh'),
('M_2', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '<script>alert(\'joseph\');</script>'),
('M_3', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', 'asfdsafsefwsfrwf'),
('M_4', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '&lt;script&gt;alert(\'hello world!\')&lt;/script&gt;'),
('M_5', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '&lt;script&gt;alert(\'hello world!\')&lt;/script&gt;'),
('M_6', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '&lt;script&gt;alert(\'hello world!\')&lt;/script&gt;'),
('M_7', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '&lt;script&gt;alert(\'hello world!\')&lt;/script&gt;'),
('M_8', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '&lt;script&gt;alert(\'hello world!\')&lt;/script&gt;'),
('M_9', 'joseph benoy', 'josephbenoy03@gmail.com', '08086542888', '&lt;script&gt;alert(\'hello world!\')&lt;/script&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `POST`
--

CREATE TABLE `POST` (
  `ID` varchar(10) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `TITLE_SLAG` varchar(100) NOT NULL,
  `AUTHOR` varchar(10) NOT NULL,
  `DATE` date NOT NULL,
  `CONTENT` text NOT NULL,
  `VIEWS` int DEFAULT NULL,
  `COVER_IMAGE_LOCATION` varchar(255) DEFAULT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `POST`
--

INSERT INTO `POST` (`ID`, `TITLE`, `TITLE_SLAG`, `AUTHOR`, `DATE`, `CONTENT`, `VIEWS`, `COVER_IMAGE_LOCATION`, `DESCRIPTION`) VALUES
('P_1', 'How to root android phone', 'How-to-root-android-phone', 'A_1', '2021-05-18', 'This is a tutorial about how to root android phone', 2, 'cover.jpg', 'Simple tutorial about how to do this'),
('P_2', 'how to kill a process in linux', 'how-to-kill-a-process-in-linux', 'A_1', '2021-05-11', 'This tutorial is about how to kill a process in linux', 0, 'cover.jpg', 'Simple tutorial about how to do this'),
('P_3', 'How to scrap amazon', 'how-to-scrap-amazon', 'A_1', '2021-05-17', 'Scrap from amazon anonymously using PHP.', 2, 'cover.jpg', 'Simple tutorial about how to do this'),
('P_4', 'how to create a database', 'how-to-create-a-database', 'A_1', '2021-05-09', 'Tutorial about creating a database', 0, 'cover.jpg', 'Tutorial about database'),
('P_5', 'what is dark web', 'what-is-dark-web', 'A_1', '2021-05-03', 'Terrifying facts about dark web', 0, 'cover.jpg', 'Facts about dark web'),
('P_6', 'Best smartphones under 25000', 'best-smartphones-under-25000', 'A_1', '2021-05-12', 'This is the details of best smartphones under 25000', 0, 'cover.jpg', 'List of smartphones 2021'),
('P_7', 'How to choose crypto currencies', 'how-to-choose-crytpo-currencies', 'A_1', '2021-05-17', 'A cryptocurrency is an encrypted decentralized digital currency that can be transferred from one individual to another.\r\n\r\nSince the launch of Bitcoin, many players have joined the market. Aside from Bitcoin, the other top players are Ethereum(ETH), Litecoin (LTC) and Ripple (XRP).\r\n<span class=\"row text-center\">\r\n<span class=\"col-12\">\r\n<img src=\"admin/uploads/post_images/light-sign-typography-lighting.jpg\" class=\"img-fluid post-content-image\" style=\"width:100% !important;\">\r\n</span>\r\n</span>\r\nWith many cryptocurrencies in the market, it is difficult for traders to choose which to trade.\r\n\r\nThe problem of decision is made harder by new market players touting their currencies as the next Bitcoin. Below are tips to follow to choose which cryptocurrency to trade.\r\n\r\n\r\nChoose Your Level of Risk\r\n\r\nWith more than 2300 cryptocurrencies in the market, Bitcoin is the most volatile and stable. Investing in BTC is seen as a safe bet because it is the oldest in the market and is priced below its $20,000 all-time high.\r\n\r\nThe other cryptocurrencies are referred to as “altcoins” with ETH, LTC, and XRP being established and stable cryptos.\r\n\r\nIt is advisable to spread your risk by diversifying your investment. To strengthen your investment portfolio, you may have to invest in one or more stable digital currencies.\r\n\r\nStable currencies are designed to mimic flat currency. These keep price fluctuations minimum and are a good way to put your money into a cryptocurrency exchange.\r\n\r\nConduct Independent Research\r\n\r\nWhile listening to a company’s representatives and ready opinions is important, nothing gives you better judgment than conducting independent research. Before deciding to trade BTC/USD vs ETH/USD or any other cryptocurrency, look at their historical charts.\r\n\r\nAreas to pay attention to should be circulation and market cap. While the price is important, it is not something to get stuck on.\r\n\r\nLook for stability and dig up a cryptocurrency’s full history. A digital currency could still be in its growth stage and might show a record of continuous growth.\r\n\r\nOn the other hand, it might have a history of big peaks and large corrections. Avoid currencies that have suffered large drops in their market cap. This is an indication of dying demand.\r\n\r\nFind out as much as you can about the company offering the cryptocurrency, and the problems it intends to solve.\r\n\r\nSeek offerings that have innovative technology and strong backing of the idea. Research on the leadership of the company, their technical team and the track record of the CEO.\r\n\r\nBe on the Lookout for Possible ICO Offerings\r\n\r\nInitial Coin Offerings (ICOs) are the go-to method for digital currency companies looking to come up with working capital and roll out new cryptocurrencies.\r\n\r\nSimilar to the stock market, this involves betting on the company that can deliver the product and gives you returns on your investment.\r\n\r\nWhen choosing which cryptocurrency to invest in, ICOs present you with a good opportunity. In essence, you have no historical charts to guide you. So you have to rely on your understanding of the offering, what makes it stand out in the market, and the team behind the offering.\r\n\r\nSince you are starting from the ground up, investing in a good ICO will help you achieve big gains. To help you be in a position to spot the next profitable ICO, look into past successful offerings and keep track of recent trends in the industry.\r\n\r\nLook into Unknown Crypto Exchanges\r\n\r\nIf you missed out on an ICO, you have a chance to buy the currencies on cryptocurrency exchanges. Most well known and established exchanges limit the currencies they trade. You are likely to find a better investment on lesser-known platforms.\r\n\r\nTo protect your investment, conduct independent research on the crypto exchange and the people running it.\r\n\r\nBe Aware and Vigilant\r\n\r\nChoosing which cryptocurrencies and altcoins to trade can be a daunting task. Sticking to the facts and not making emotional decisions will help you select the investment that will be right for you.\r\n\r\nOnce you have selected the coin you want to invest in, remain vigilant and monitor your portfolio closely. Be on the lookout for all news regarding your investment and continue conducting the same independent research as you did before investing.\r\n\r\nAltcoins might not experience the same rapid growth as Bitcoin since some are in the growth phase. However, choosing the right cryptocurrency to invest in can lead to lucrative returns.', 1, 'light-sign-typography-lighting.jpg', 'Basic to advanced crypto currency tutorial'),
('P_8', 'Best linux distros 2021', 'best-linux-distros-2021', 'A_1', '2021-05-16', 'List of the best linux in this year 2021.', 0, 'cover.jpg', 'List of linux OSs for 2021');

-- --------------------------------------------------------

--
-- Table structure for table `TAG`
--

CREATE TABLE `TAG` (
  `ID` varchar(5) NOT NULL,
  `NAME` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `TAG`
--

INSERT INTO `TAG` (`ID`, `NAME`) VALUES
('T_1', 'android'),
('T_3', 'bitcoin'),
('T_4', 'dark web'),
('T_2', 'linux'),
('T_5', 'smartphones');

-- --------------------------------------------------------

--
-- Table structure for table `USED_TAGS`
--

CREATE TABLE `USED_TAGS` (
  `ID` varchar(10) NOT NULL,
  `POST_ID` varchar(10) NOT NULL,
  `TAG_ID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `USED_TAGS`
--

INSERT INTO `USED_TAGS` (`ID`, `POST_ID`, `TAG_ID`) VALUES
('UT_1', 'P_1', 'T_1'),
('UT_10', 'P_7', 'T_3'),
('UT_2', 'P_2', 'T_2'),
('UT_3', 'P_3', 'T_1'),
('UT_4', 'P_4', 'T_2'),
('UT_5', 'P_5', 'T_3'),
('UT_6', 'P_6', 'T_4'),
('UT_7', 'P_7', 'T_5'),
('UT_8', 'P_8', 'T_4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `MESSAGES`
--
ALTER TABLE `MESSAGES`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `POST`
--
ALTER TABLE `POST`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `TITLE` (`TITLE`),
  ADD UNIQUE KEY `TITLE_SLAG` (`TITLE_SLAG`),
  ADD KEY `AUTHOR` (`AUTHOR`);

--
-- Indexes for table `TAG`
--
ALTER TABLE `TAG`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NAME` (`NAME`);

--
-- Indexes for table `USED_TAGS`
--
ALTER TABLE `USED_TAGS`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `POST_ID` (`POST_ID`),
  ADD KEY `TAG_ID` (`TAG_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `POST`
--
ALTER TABLE `POST`
  ADD CONSTRAINT `POST_ibfk_1` FOREIGN KEY (`AUTHOR`) REFERENCES `ADMIN` (`ID`);

--
-- Constraints for table `USED_TAGS`
--
ALTER TABLE `USED_TAGS`
  ADD CONSTRAINT `USED_TAGS_ibfk_1` FOREIGN KEY (`POST_ID`) REFERENCES `POST` (`ID`),
  ADD CONSTRAINT `USED_TAGS_ibfk_2` FOREIGN KEY (`TAG_ID`) REFERENCES `TAG` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
