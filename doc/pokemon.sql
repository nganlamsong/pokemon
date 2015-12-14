-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2015 at 01:41 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pokemon`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ABOUT` varchar(1000) NOT NULL,
  `INPROGRESS` int(11) NOT NULL,
  `STARTDATE` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `URL` varchar(5000) DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `POKEMON_ID` int(11) NOT NULL,
  `ORIGIN` varchar(5000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID`, `URL`, `NAME`, `POKEMON_ID`, `ORIGIN`) VALUES
(1, 'http://img09.deviantart.net/13fd/i/2015/325/2/a/commit_to_fight_by_nganlamsong-d9hjzgp.png', '', 1, ''),
(14, 'http://t04.deviantart.net/vgRv_r1A5I1f-CgSdQF3bfxdyB4=/300x200/filters:fixed_height(100,100):origin()/pre14/3182/th/pre/i/2014/320/8/0/the_strongest_mega_evolution_by_nganlamsong-d86knjy.png', '', 40, ''),
(15, 'http://t14.deviantart.net/K5K8BeaGAH33Cai213ZjuzzzWi0=/300x200/filters:fixed_height(100,100):origin()/pre09/a968/th/pre/i/2015/123/9/a/ancient_battle_by_nganlamsong-d8rz6lw.png', '', 40, ''),
(16, 'http://t03.deviantart.net/Z_tqxX8ZFY3fmDtJFVHoe-nihAM=/300x200/filters:fixed_height(100,100):origin()/pre00/1bd6/th/pre/i/2014/344/b/2/rayquaza___the_savior_by_nganlamsong-d89bwry.png', '', 40, ''),
(17, 'http://t00.deviantart.net/AJHLPL9Z0uZTnB4C0R-4fJkfS0Q=/300x200/filters:fixed_height(100,100):origin()/pre04/49de/th/pre/i/2014/279/e/1/mega_rayquaza_by_nganlamsong-d81nc5g.png', '', 40, ''),
(18, 'http://t12.deviantart.net/1rlluwHdz4I7MOKrtLMrZmjbLo4=/300x200/filters:fixed_height(100,100):origin()/pre04/0b24/th/pre/i/2013/303/9/7/i_am_blue____by_nganlamsong-d6sd0kt.png', '', 1, ''),
(19, 'http://t09.deviantart.net/q4NAovCNnNMIELCDNJzibyOfV2c=/300x200/filters:fixed_height(100,100):origin()/pre01/3f2d/th/pre/i/2013/237/3/f/new_age_of_pokemon__by_nganlamsong-d6jhhmp.png', '', 1, ''),
(20, 'http://t09.deviantart.net/R4ACe0GlMZkQhiniJ6k-1KWDEww=/300x200/filters:fixed_height(100,100):origin()/pre08/203c/th/pre/i/2013/223/7/4/megalucario_by_nganlamsong-d6hn4b9.png', '', 1, ''),
(21, 'http://t07.deviantart.net/947FsBsxlgKeXDVvhQQ49J45SgY=/300x200/filters:fixed_height(100,100):origin()/pre14/83ce/th/pre/i/2015/182/a/a/the_best_of_his_life_by_nganlamsong-d8zhyd8.png', '', 1, ''),
(22, 'http://t05.deviantart.net/VvztzHMNUvQkn2cWsNRQzF4MiKM=/300x200/filters:fixed_height(100,100):origin()/pre09/1796/th/pre/i/2014/115/2/3/assault_on_titan__by_nganlamsong-d7fwi1y.png', '', 1, ''),
(23, 'http://t03.deviantart.net/yZuAY4uc_7zvtZ4YoWmojZ9Mh-0=/300x200/filters:fixed_height(100,100):origin()/pre07/3bd4/th/pre/i/2014/090/5/8/protect_the_statue__by_nganlamsong-d7ccpb5.png', '', 1, ''),
(24, 'http://t11.deviantart.net/80PUbjkSyCPDVTbuXnnrir8S4Es=/300x200/filters:fixed_height(100,100):origin()/pre08/3f3e/th/pre/i/2014/243/3/9/fighting_for_future__by_nganlamsong-d7xc9vm.png', '', 1, ''),
(25, 'http://t13.deviantart.net/XeLuBClVcBwCueNxarpIbXg0eAo=/300x200/filters:fixed_height(100,100):origin()/pre02/1e35/th/pre/i/2014/004/f/c/mega_charizard_x___power_of_a_dragon__by_nganlamsong-d70r3q3.png', '', 5, ''),
(26, 'http://t14.deviantart.net/-Lq3PhvMpDIHsBY1ldVd2c24D4w=/300x200/filters:fixed_height(100,100):origin()/pre12/9368/th/pre/i/2013/248/8/e/megacharizard_by_nganlamsong-d6l7ai5.png', '', 6, ''),
(27, 'http://t14.deviantart.net/EKuzgHr8oVR_1QcubpkAeBaN3uI=/300x200/filters:fixed_height(100,100):origin()/pre07/93c3/th/pre/f/2014/295/3/9/39373ed858a56ec8ac4410c2cb8d12f7-d83qwt5.png', '', 26, ''),
(28, 'http://t13.deviantart.net/lTs0ie1Mg9_CcwVEOd2Qt7hBlnQ=/300x200/filters:fixed_height(100,100):origin()/pre09/f3d6/th/pre/i/2014/285/6/8/mega_pidgeot_by_nganlamsong-d82n391.png', '', 27, ''),
(29, 'http://t15.deviantart.net/G4RdIoygNrRPdw80kUtIJE11Z5w=/300x200/filters:fixed_height(100,100):origin()/pre10/e2a3/th/pre/i/2014/264/e/c/mega_gallade___the_blade_master_by_nganlamsong-d7zvepi.png', '', 48, ''),
(30, 'http://t01.deviantart.net/ZdFwLX39NHnZQryi7X03ScbbGp4=/300x200/filters:fixed_height(100,100):origin()/pre05/9aef/th/pre/i/2014/163/7/0/mega_sceptile_by_nganlamsong-d7m1oru.png', '', 32, ''),
(31, 'http://t01.deviantart.net/DZYORy8D0_CqhOlcMIOS0rJxmcs=/300x200/filters:fixed_height(100,100):origin()/pre06/4214/th/pre/i/2013/355/5/6/mega_houndoom_by_nganlamsong-d6yq8nd.png', '', 16, ''),
(32, 'http://t14.deviantart.net/sKJCQEkm4UirIsU95Mypi9h37VI=/300x200/filters:fixed_height(100,100):origin()/pre12/90af/th/pre/i/2014/023/e/b/mega_aerodactyl_by_nganlamsong-d6yllu8.png', '', 31, ''),
(33, 'http://t01.deviantart.net/OCHZF3Ew7fQjABcXAb16giK2D4I=/300x200/filters:fixed_height(100,100):origin()/pre07/9221/th/pre/f/2013/342/9/4/mega_manectric_by_nganlamsong-d6x651y.png', '', 21, ''),
(34, 'http://t11.deviantart.net/z96PTJUAhT_4qXwRS0rptDqnTqs=/300x200/filters:fixed_height(100,100):origin()/pre00/9ed5/th/pre/i/2015/033/c/5/mega_gardevoir_by_nganlamsong-d6y9ygy.png', '', 18, ''),
(35, 'http://t07.deviantart.net/nNEGI6-9L-JC-vOw-pE6enXhJ0Q=/300x200/filters:fixed_height(100,100):origin()/pre05/03b1/th/pre/f/2014/327/5/6/mega_zukain_by_nganlamsong-d87gkkc.png', '', 32, ''),
(36, 'http://t08.deviantart.net/3hKCIwJwV-PMSSvR6C_yvIE0BvQ=/300x200/filters:fixed_height(100,100):origin()/pre10/daf2/th/pre/i/2014/038/e/9/megaalakazam_by_nganlamsong-d75juvh.png', '', 9, ''),
(37, 'http://t03.deviantart.net/aagJLIUeQAAG-e9eJwxcPGN_kL4=/300x200/filters:fixed_height(100,100):origin()/pre03/6939/th/pre/f/2014/058/b/1/megablastoise_by_nganlamsong-d786wqf.png', '', 8, ''),
(38, 'http://t07.deviantart.net/WvjN3oC3NYl1roTWTQeXkg8VGhM=/300x200/filters:fixed_height(100,100):origin()/pre15/9b3e/th/pre/i/2015/332/2/2/mega_kangaskhan___double_the_trouble_by_nganlamsong-d9ibj0v.png', '', 28, ''),
(39, 'http://t08.deviantart.net/ER5qluP-QokC9g1faSd47FECUAw=/300x200/filters:fixed_height(100,100):origin()/pre03/9afc/th/pre/i/2013/342/e/6/mega_abomasnow_by_nganlamsong-d6x64qk.png', '', 25, ''),
(40, 'http://t08.deviantart.net/FEEnPSeBqn7Rb-cc6kQ6xqmXD0g=/300x200/filters:fixed_height(100,100):origin()/pre02/f1ab/th/pre/i/2013/338/b/d/mega_gyarados_by_nganlamsong-d6wpb39.png', '', 30, ''),
(41, 'http://t15.deviantart.net/ujoaLZ8KQcWEitFuDlEsOgvWrxI=/300x200/filters:fixed_height(100,100):origin()/pre05/baef/th/pre/i/2013/302/9/b/mega_tyranitar_by_nganlamsong-d6qnywu.png', '', 17, ''),
(42, 'http://t08.deviantart.net/2KqnsO0yCNi7TD7G5O7KSBZqMjU=/300x200/filters:fixed_height(100,100):origin()/pre14/057e/th/pre/i/2013/276/e/a/megavenusaur_by_nganlamsong-d6p1dod.png', '', 7, ''),
(43, 'http://t11.deviantart.net/he2i3DxyEpWVqwt7YeYd5rDHKJM=/300x200/filters:fixed_height(100,100):origin()/pre12/bbe9/th/pre/i/2013/228/4/2/megaabsol_by_nganlamsong-d6idmm2.png', '', 23, ''),
(44, 'http://t08.deviantart.net/izleHTMWv_U3gKVWgWTqqkvI-jM=/300x200/filters:fixed_height(100,100):origin()/pre14/796f/th/pre/i/2013/134/3/d/break_your_limit__by_nganlamsong-d6588im.png', '', 12, ''),
(45, 'http://t08.deviantart.net/CForlDObW8jrS5XdKdIo0Gd3iSY=/300x200/filters:fixed_height(100,100):origin()/pre03/5371/th/pre/i/2013/224/0/7/mega_mewtwo_by_nganlamsong-d636chg.png', '', 12, ''),
(46, 'http://t03.deviantart.net/WjNxC75cwBobFbSYqseVA52RMAo=/fit-in/150x150/filters:no_upscale():origin()/pre15/9b3e/th/pre/i/2015/332/2/2/mega_kangaskhan___double_the_trouble_by_nganlamsong-d9ibj0v.png', 'flaksdjf', 0, 'http://t03.deviantart.net/WjNxC75cwBobFbSYqseVA52RMAo=/fit-in/150x150/filters:no_upscale():origin()/pre15/9b3e/th/pre/i/2015/332/2/2/mega_kangaskhan___double_the_trouble_by_nganlamsong-d9ibj0v.png'),
(47, 'http://t07.deviantart.net/S0MWrujyMd44RcNJ6JZeMSyiUcI=/fit-in/150x150/filters:no_upscale():origin()/pre14/7e48/th/pre/i/2015/165/1/d/day_409_a___latias_by_autobottesla-d8x9zgj.png', 'con chim con', 0, 'http://t07.deviantart.net/S0MWrujyMd44RcNJ6JZeMSyiUcI=/fit-in/150x150/filters:no_upscale():origin()/pre14/7e48/th/pre/i/2015/165/1/d/day_409_a___latias_by_autobottesla-d8x9zgj.png'),
(48, 'http://t10.deviantart.net/Hp4hxqdRI7LpPUrOvMp8V-MCU7Q=/300x200/filters:fixed_height(100,100):origin()/pre03/cff3/th/pre/i/2013/194/e/b/006___charizard_by_nganlamsong-d4uauto.png', 'Charizard', 0, 'http://nganlamsong.deviantart.com/art/006-Charizard-292759692?q=gallery%3Anganlamsong%2F37637709&qo=23');

-- --------------------------------------------------------

--
-- Table structure for table `image_pokemon`
--

CREATE TABLE IF NOT EXISTS `image_pokemon` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PID` int(11) NOT NULL,
  `IID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `image_pokemon`
--

INSERT INTO `image_pokemon` (`ID`, `PID`, `IID`) VALUES
(1, 53, 46),
(2, 0, 47),
(3, 0, 48),
(4, 0, 49),
(5, 0, 49);

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

CREATE TABLE IF NOT EXISTS `pokemon` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NUMBER` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `MEGA` tinyint(4) NOT NULL DEFAULT '0',
  `LEGEND` tinyint(4) NOT NULL DEFAULT '0',
  `THUMBNAIL` varchar(1000) DEFAULT NULL,
  `GIF` varchar(1000) DEFAULT NULL,
  `AVARTAR` varchar(1000) DEFAULT NULL,
  `HIDDEN_AVARTAR` varchar(1000) NOT NULL,
  `INFO` varchar(2000) NOT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `INPROGRESS` tinyint(4) NOT NULL DEFAULT '0',
  `DATE_START` varchar(200) NOT NULL,
  `INFO_URL` varchar(5000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `pokemon`
--

INSERT INTO `pokemon` (`ID`, `NUMBER`, `NAME`, `MEGA`, `LEGEND`, `THUMBNAIL`, `GIF`, `AVARTAR`, `HIDDEN_AVARTAR`, `INFO`, `STATUS`, `INPROGRESS`, `DATE_START`, `INFO_URL`) VALUES
(1, 448, 'Lucario', 0, 0, NULL, 'http://media.pldh.net/pokemon/gen6/xy-animated/448-mega.gif', 'http://i65.tinypic.com/54x0ns.jpg', '', '', 1, 0, '', ''),
(4, 257, 'Blaziken', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:16:"6′3″ (1.91m)";s:6:"weight";s:19:"114.6 lbs (52.0 kg)";s:2:"hp";s:2:"80";s:3:"atk";s:3:"160";s:3:"def";s:2:"80";s:4:"satk";s:3:"130";s:4:"sdef";s:2:"80";s:3:"spd";s:3:"100";}', 0, 0, '', ''),
(5, 6, 'Charizard X', 0, 0, '', '', 'http://media.pldh.net/pokemon/shuffle/006-mega.png"', '', 'a:8:{s:6:"height";s:16:"5′7″ (1.70m)";s:6:"weight";s:20:"243.6 lbs (110.5 kg)";s:2:"hp";s:2:"78";s:3:"atk";s:3:"130";s:3:"def";s:3:"111";s:4:"satk";s:3:"130";s:4:"sdef";s:2:"85";s:3:"spd";s:3:"100";}', 1, 0, '', ''),
(6, 6, 'Charizard Y', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(7, 3, 'Venusaur', 0, 0, '', '', 'http://media.pldh.net/pokemon/shuffle/003-mega.png"', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(8, 9, 'Blastoise', 0, 0, '', '', 'saa', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 2, 0, '', ''),
(9, 65, 'Alakazam', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 2, 0, '', ''),
(10, 94, 'Gengar', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(11, 150, 'Mewtwo X', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(12, 150, 'Mewtwo Y', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(13, 181, 'Ampharos', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(14, 212, 'Scizzor', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 2, 0, '', ''),
(15, 214, 'Heracross', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(16, 291, 'Houndoom', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(17, 248, 'Tyranitar', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(18, 282, 'Gardevoir', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(19, 303, 'Mawile', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(20, 306, 'Aggron', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(21, 310, 'Electrive', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 2, 0, '', ''),
(22, 354, 'Bannete', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(23, 359, 'absol', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 2, 0, '', ''),
(24, 445, 'Garchomp', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(25, 460, 'Abomasnow', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(26, 15, 'Beedrill', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(27, 18, 'Pidgeot', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(28, 115, 'Kangaskhan', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(29, 127, 'Pinsir', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(30, 130, 'Gyarados', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(31, 142, 'Aerodactyl', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(32, 254, 'Sceptile', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(33, 260, 'Swampert', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(34, 308, 'Medicharm', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(35, 376, 'Metangross', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(36, 380, 'Latias', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(37, 381, 'Latias', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(38, 382, 'Kyogre', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(39, 383, 'Groudon', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(40, 384, 'Rayquaza', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(41, 95, 'Steelix', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(42, 362, 'Glalie', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(43, 373, 'Salamence', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(44, 531, 'Audino', 0, 0, NULL, NULL, NULL, '', '', NULL, 0, '', ''),
(45, 334, 'Altaria', 0, 0, NULL, NULL, NULL, '', '', NULL, 0, '', ''),
(46, 323, 'Camerupt', 0, 0, NULL, NULL, NULL, '', '', NULL, 0, '', ''),
(47, 319, 'Sharpedo', 0, 0, NULL, NULL, NULL, '', '', NULL, 0, '', ''),
(48, 475, 'Gallade', 0, 0, NULL, NULL, NULL, '', '', NULL, 0, '', ''),
(53, 2, 'Ivysaur', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '{"seconds":6,"minutes":8,"hours":23,"mday":3,"wday":4,"mon":12,"year":2015,"yday":336,"weekday":"Thu', ''),
(54, 6, 'Chamader', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 1, '{"seconds":10,"minutes":21,"hours":23,"mday":3,"wday":4,"mon":12,"year":2015,"yday":336,"weekday":"Thursday","month":"December","0":1449159670}', ''),
(55, 26, 'Raichu', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(56, 101, 'Electrode', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 1, 0, '', ''),
(57, 100, 'Voltorb', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(58, 121, 'Starmie', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(59, 94, 'Gengar', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(60, 83, 'Farfetch''d', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(61, 125, 'Electabuzz', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(62, 82, 'Magneton', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(63, 237, 'Hitmontop', 0, 0, '', '', '', '', 'a:8:{s:6:"height";s:0:"";s:6:"weight";s:0:"";s:2:"hp";s:0:"";s:3:"atk";s:0:"";s:3:"def";s:0:"";s:4:"satk";s:0:"";s:4:"sdef";s:0:"";s:3:"spd";s:0:"";}', 0, 0, '', ''),
(65, 0, 'VACHACHA', 0, 0, NULL, NULL, NULL, '', '', NULL, 0, '', ''),
(66, 0, 'Charizard', 0, 0, NULL, NULL, NULL, '', '', NULL, 0, '', ''),
(67, 0, 'Charmander1', 0, 0, NULL, NULL, NULL, '', '', NULL, 0, '', ''),
(68, 0, 'Charmander 2', 0, 0, NULL, NULL, NULL, '', '', NULL, 0, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
