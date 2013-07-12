-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2013 at 02:55 p.m.
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `theartspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbartist`
--

CREATE TABLE IF NOT EXISTS `tbartist` (
  `ArtistID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Region` varchar(50) NOT NULL,
  `ProfilePic` varchar(50) NOT NULL,
  `PreferredMedium` varchar(100) NOT NULL,
  `Education` varchar(250) NOT NULL,
  `Awards` varchar(250) NOT NULL,
  `Biography` varchar(2000) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Visible` int(11) NOT NULL,
  PRIMARY KEY (`ArtistID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbartist`
--

INSERT INTO `tbartist` (`ArtistID`, `FirstName`, `LastName`, `Region`, `ProfilePic`, `PreferredMedium`, `Education`, `Awards`, `Biography`, `Email`, `Password`, `Visible`) VALUES
(1, 'James', 'Fisher', 'Wellington', 'jamesfisher1.jpg', 'Oil based paint', 'Bachelor of Visual Arts', 'The Wallace Arts Trust Vermont Award 2010', 'James is a self taught artist of dynamic talent. Building on each previous exhibition, James discovers and re-defines who he is through his paintings. James is known for his vibrant collection of portraiture, classic cars and other subjects in the realist realm, although his ability to adapt his style to suit any subject, has made him a popular commission artist. He has work in many collections both in New Zealand and overseas. In his new paintings, James explores new creative plains through texture and stroke, experimenting with techniques and deconstruction, refining and discarding as the piece develops its own.', 'james@fisher.com', 'james', 0),
(2, 'Brian', 'Alexander', 'Otago', 'brianalexander2.jpg', 'Sculpture', 'Master of Fine Art', '', 'Brian is an emerging self taught artist specialising in large original artworks and has been painting part time since 2000, but now intends painting full time.   His professional background is in engineering spending fifteen years in product design and has now decided to put his energies into art which is a passion that he has craved since he left high school.   He has lived in Dunedin most of his life where he now resides and paints in his home studio. ', 'brian@alexander.com', 'brian', 0),
(3, 'Diana', 'Adams', 'Canterbury', 'dianaadams3.jpg', 'Photographic Prints', 'Master of Fine Art', 'Young Artist of the Year 2006', 'Diana was born in Canterbury and has enjoyed painting for most of her life. In the past she has worked as a landscape architect but decided to paint full time after her first successful solo show. She is passionate about the New Zealand landscape and landforms. Her paintings capture the ethereal qualities of the landscape by reducing the subject to its essential elements.   She uses bold, deep colours and paints on stretched canvas over framed board. The paintings have a box like effect due to the painting continuing around the 5cm deep edges.   Diana is happy to be contacted directly regarding commissions or direct sales. All her recent works are added to this site regularly so keep checking for new works. Please contact Diana by clicking on an artwork and then on the contact button. Paintings can be couriered to you worldwide. ', 'diana@adams.com', 'diana', 0),
(4, 'Margaret ', 'Aroa', 'Bay of Plenty', 'margaretaroa4.jpg', 'Silver Jewellery + Greenstone', 'Self taught ', '', 'Margaret Aroa''s motivation is to capture a range of subjects in an expressionist style. Margaret draws her inspiration from overseas travel and many sailing trips around New Zealand and the Pacific. Margaret likes to focus on colour and depth in her compositions. ', 'margaret@aroa.com', 'margaret', 0),
(5, 'Ian', 'Hamlin', 'Wellington', 'ianhamlin5.jpg', 'Pencil and Ink', 'BVA', '', 'Born in 1960, Ian received no formal Art training after Fine Arts Preliminary level. Opting to paint full-time rather than attend Art school, he was competent enough to hold his first exhibition at the age of 18, every painting sold from his first display and repeating the feat the following year he has continued exhibiting successfully ever since.   Living at various times in Wellington and the Marlborough Sounds he exhibits in major galleries throughout the country and the UK. Ian has spent some time painting overseas with considerable distinction and has held exhibitions in Australia and the United Kingdom and was given the opportunity to exhibit at the "1990 International Art Fair " at the Barbican Centre in London.   Although predominantly an oil painter, Ian also works in pastel and watercolour. His paintings are well known for their attention to detail whether in panoramic view or intimate study. Variety of style has been a feature of his work.', 'ian@hamlin.com', 'ian', 0),
(6, 'Megan', 'Harvey', 'Hawke''s Bay', 'meganharvey6.jpg', 'Printmaking', 'Diploma of Fine Art', 'NZ Artist of the Year 2005', 'Megan Harvey has painted for most of her life. She took all Art options at school and achieved a Diploma of Fine Arts at Ilam School of Art, Christchurch. She has designed wallpapers and worked in a Card and Calendar Company. Recently she has held one-man exhibitions in Hastings and Taupo. Megan has been a Norsewear Art Exhibitor and has won awards in a Telecom Competition and in the Lake Taupo Open Exhibition. ', 'megan@harvey.com', 'megan', 0),
(7, 'Corina', 'Hazlett', 'Canterbury', 'corinahazlett7.jpg', 'Mixed media - pen and ink', 'Self taught ', 'RGA Art Society Annual Art Awards', 'Corina Hazlett lives in Waiau North Canterbury on a 650 hectare farm with her 3 children, Francesca, Lilly and Lachlan and husband James. They are 30 mins from Hanmer Springs Thermal Reserve at the foot of the Inland Kaikoura ranges. Corina is a self taught artist.   Her early years spent travelling, built up the foundations of what would fuel her passion and love of painting. During her time overseas she visited Jewish concentration camps, saw political refugees from Yugoslavia and visited the African Congo days after a military coup. Her first series of artworks in 1996 were watercolours of African Children from photographs during her time in central and eastern Africa in 1991. This interest in human emotions and of social environment was to become a strong influence in her work.', 'corina@hazlett.com', 'corina', 0),
(8, 'Andy', 'Hamilton', 'Auckland', 'andyhamilton8.jpg', 'Found materials', 'Amersham Art School UK 1975-6 ', '', 'Andy returned to his first love, watercolours, in 2011, after a twenty year break during which time he worked in the building industry as a designer and builder and as a screenprint designer for his wife''s fashion label, Scintilla. Originally from the UK he arrived in New Zealand in 1982 and spent his second day at Karekare Beach. Astonished and thrilled by the visceral landscape, he had to stay and has not failed to be astonished since. His watercolour landscapes portray the dramatic land forms and brilliant light so unique to Aotearoa. He either works in his studio in the hills behind Puhoi or in the field whenever possible. After a successful first exhibition in January 2012, Andy''s work is now in private collections in NZ and the UK. He only uses the highest quality paints and papers and is happy to do commissions. Andy is also a musician and songwriter whose current band is called "Dirt Road Orchestra".', 'andy@hamilton.com', 'andy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbartwork`
--

CREATE TABLE IF NOT EXISTS `tbartwork` (
  `ArtworkID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Year` int(11) NOT NULL,
  `Materials` varchar(100) NOT NULL,
  `Size` varchar(100) NOT NULL,
  `SaleStatus` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `PhotoLink` varchar(150) NOT NULL,
  `Visible` int(11) NOT NULL,
  PRIMARY KEY (`ArtworkID`),
  KEY `CategoryID` (`CategoryID`,`ArtistID`),
  KEY `ArtistID` (`ArtistID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbartwork`
--

INSERT INTO `tbartwork` (`ArtworkID`, `CategoryID`, `ArtistID`, `Title`, `Description`, `Year`, `Materials`, `Size`, `SaleStatus`, `Price`, `PhotoLink`, `Visible`) VALUES
(1, 1, 1, 'Untitled 1', 'Little Gem - I have painted a small series of Original Oil Paintings that are 5x8in and are matted with a A3 slightly off white matt. I haven''t framed this series as it is easier this way for postage. They are oil paintings so do not need to be frame', 2005, 'Oil on Canvas', '350 x 650mm', 'SOLD', 0, 'painting1.jpg', 0),
(2, 1, 1, 'Untitled 2', '', 2002, 'Oil on Canvas', '450 x 853mm', 'For Sale', 3000, 'painting2.jpg', 0),
(3, 2, 2, 'Agree to Differ', 'On the theme of doubt and dogma, "Agree to differ" offers an interesting variety of installation options - on a flat surface, hanging on a wall and the two parts placed in differing orientation to each other ', 1998, 'Copper and Wire', '1000 x 650mm', 'For Sale', 2500, 'sculpture1.jpg', 0),
(4, 2, 2, 'Human Landscape 3', '''Human Landscape 3'' was created by my fascination for the New Zealand landscape, the volcanos and mountains that look like human forms. This sculpture is a one-off unique and solid bronze. ', 2003, 'Solid bronze', '1200 x 1450mm', 'SOLD', 0, 'sculpture2.jpg', 0),
(5, 3, 3, 'Location', 'Photograph used for a location shot for outdoor shoot. 2010 ', 2010, 'Black and White digital print', '841 x 594mm', 'For Sale', 650, 'photography1.jpg', 0),
(6, 3, 3, 'Theatre pose', 'Contemporary makeovers captured. Studio work available to includes Makeup and styling ,includes set of prints.Book a shoot in our studio. ', 2013, 'Digital colour print', '841 x 594mm', 'SOLD', 0, 'photography2.jpg', 0),
(7, 4, 6, 'Bay of Island Pohutukawa Trees in Autumn', 'This Giclee Reproduction is printed onto canvas and is studio wrapped.   This painting was selected and published in a New Zealand calendar. ( price does not include postage) ', 2013, 'Giclee Reproduction', '810 x 530mm', 'For Sale', 895, 'print1.jpg', 0),
(8, 4, 6, 'Hands', 'Prints Available to purchase also at Terrace Downs Resort until August 1. Size of Limited ed Giclee (50) print Size: 1300 x 865 Price: $600 or Size: 90 x 60 Price: $360 ', 2012, 'Original Giclee Print', '600 x 900mm', 'For Sale', 740, 'print2.jpg', 0),
(9, 5, 7, 'Golden Love', '', 2013, 'Mixed media on board', '760 x 610mm', 'SOLD', 0, 'mixedmedia1.jpg', 0),
(10, 5, 7, 'From Land to Sea', 'This Triptych of three panels from the Periodic Table has a beautiful aged appearance. All symbols have been painted in Graphite Grey, with the names of each colour applied in it''s ''like'' colour...', 2009, 'Pencil and Ink on paper', '530 x 680 mm', 'SOLD', 0, 'mixedmedia2.jpg', 0),
(11, 6, 5, 'Kauaeranga Dam', '', 2008, 'Conte on paper', '297 x 420mm', 'For Sale', 250, 'drawing1.jpg', 0),
(12, 6, 5, 'Blue Jug and Lemons', 'Still life pastel drawing', 2013, 'Pastel on cotton rag', '360 x 540mm', 'For Sale', 360, 'drawing2.jpg', 0),
(13, 7, 4, 'Kutae Ring', 'large and funky pounamu,s/s', 2012, 'Greenstone and silver', '30 x 40mm', 'SOLD', 0, 'jewellery1.jpg', 0),
(14, 7, 4, 'Wheku Haere', 'Wheku Haere. Made for exhibition and show for Matariki celebrations in Napier 2008. Exhibited at Toimairangi in Hastings and Fashion Showcase at Brookfield wineries, Napier 13 July 2008. Materials, 10 cent coin peirced, sterling silver, black pearls', 2008, 'Sterling silver, black pearl shell ', '300 x 100mm', 'For Sale', 600, 'jewellery2.jpg', 0),
(15, 8, 8, 'Industrial Lace', '', 2013, 'Found materials', '200 x 400mm', 'For Sale', 380, 'other1.jpg', 0),
(16, 8, 8, 'Botanical Industrial', 'Amazing work can used in a series of work All sizes.Botanical series ', 2011, 'Digital Artwork - gloss print', '450 x 700mm', 'SOLD', 0, 'other2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbcategory`
--

CREATE TABLE IF NOT EXISTS `tbcategory` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbcategory`
--

INSERT INTO `tbcategory` (`CategoryID`, `CategoryName`) VALUES
(1, 'Painting'),
(2, 'Sculpture'),
(3, 'Photography'),
(4, 'Print'),
(5, 'Mixed-Media'),
(6, 'Drawing'),
(7, 'Jewellery'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbexhibition`
--

CREATE TABLE IF NOT EXISTS `tbexhibition` (
  `ExhibitionID` int(11) NOT NULL AUTO_INCREMENT,
  `ArtistID` int(11) NOT NULL,
  `ExhibitionTitle` varchar(100) NOT NULL,
  `StartDate` varchar(100) NOT NULL,
  `EndDate` varchar(100) NOT NULL,
  `ExhibitionDescription` varchar(500) NOT NULL,
  PRIMARY KEY (`ExhibitionID`),
  KEY `ArtistID` (`ArtistID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbexhibition`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbexhibitwork`
--

CREATE TABLE IF NOT EXISTS `tbexhibitwork` (
  `ExhibitworkID` int(11) NOT NULL AUTO_INCREMENT,
  `ExhibitionID` int(11) NOT NULL,
  `ArtworkID` int(11) NOT NULL,
  PRIMARY KEY (`ExhibitworkID`),
  KEY `ArtworkID` (`ArtworkID`),
  KEY `ExhibitionID` (`ExhibitionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbexhibitwork`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbartwork`
--
ALTER TABLE `tbartwork`
  ADD CONSTRAINT `tbartwork_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `tbcategory` (`CategoryID`),
  ADD CONSTRAINT `tbartwork_ibfk_2` FOREIGN KEY (`ArtistID`) REFERENCES `tbartist` (`ArtistID`);

--
-- Constraints for table `tbexhibition`
--
ALTER TABLE `tbexhibition`
  ADD CONSTRAINT `tbexhibition_ibfk_1` FOREIGN KEY (`ArtistID`) REFERENCES `tbartist` (`ArtistID`);

--
-- Constraints for table `tbexhibitwork`
--
ALTER TABLE `tbexhibitwork`
  ADD CONSTRAINT `tbexhibitwork_ibfk_1` FOREIGN KEY (`ArtworkID`) REFERENCES `tbartwork` (`ArtworkID`),
  ADD CONSTRAINT `tbexhibitwork_ibfk_2` FOREIGN KEY (`ExhibitionID`) REFERENCES `tbexhibition` (`ExhibitionID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
