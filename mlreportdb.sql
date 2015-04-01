-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2015 at 04:30 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.39

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mlreports`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `org` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `about` text NOT NULL,
  `title` varchar(5) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `qualif` varchar(200) NOT NULL,
  `signat` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aboutcst`
--

CREATE TABLE IF NOT EXISTS `aboutcst` (
  `name` varchar(130) NOT NULL,
  `org` varchar(150) NOT NULL,
  `GP_cost` decimal(4,2) NOT NULL,
  `DNA_cost` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accid`
--

CREATE TABLE IF NOT EXISTS `accid` (
  `id` int(11) NOT NULL,
  `accid` text NOT NULL,
  `options` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accomp`
--

CREATE TABLE IF NOT EXISTS `accomp` (
  `cid` int(11) NOT NULL,
  `accomp` text NOT NULL,
  `org` varchar(20) NOT NULL,
  `aby` varchar(15) NOT NULL,
  `aln` varchar(30) NOT NULL,
  `afn` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE IF NOT EXISTS `agency` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `an` varchar(50) NOT NULL,
  `aa` varchar(80) DEFAULT NULL,
  `ap` varchar(9) DEFAULT NULL,
  `ac` varchar(20) DEFAULT NULL,
  `ae` varchar(50) DEFAULT NULL,
  `af` varchar(30) DEFAULT NULL,
  `org` varchar(30) NOT NULL,
  `lnm` varchar(30) NOT NULL,
  `latlong` varchar(100) NOT NULL,
  `at` varchar(30) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

--
-- Table structure for table `anatomy_pain`
--

CREATE TABLE IF NOT EXISTS `anatomy_pain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(150) NOT NULL,
  `local` varchar(100) NOT NULL,
  `loc_id` smallint(6) NOT NULL,
  `org` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE IF NOT EXISTS `app` (
  `org` varchar(20) NOT NULL,
  `dr` varchar(30) NOT NULL,
  `stime` varchar(20) NOT NULL,
  `etime` varchar(20) NOT NULL,
  `apptm` varchar(20) NOT NULL,
  `dt` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appoint`
--

CREATE TABLE IF NOT EXISTS `appoint` (
  `org` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `dt` date NOT NULL,
  `tm` varchar(20) NOT NULL,
  `reason` text NOT NULL,
  `dr` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `a_login`
--

CREATE TABLE IF NOT EXISTS `a_login` (
  `lnm` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `back`
--

CREATE TABLE IF NOT EXISTS `back` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bones`
--

CREATE TABLE IF NOT EXISTS `bones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `num` varchar(200) NOT NULL,
  `tp` varchar(200) NOT NULL DEFAULT 'Bone',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

-- --------------------------------------------------------

--
-- Table structure for table `booki`
--

CREATE TABLE IF NOT EXISTS `booki` (
  `cid` int(11) NOT NULL,
  `bi` varchar(100) NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cclist`
--

CREATE TABLE IF NOT EXISTS `cclist` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cn` varchar(50) NOT NULL,
  `ca` varchar(80) NOT NULL,
  `cp` varchar(9) NOT NULL,
  `cc` varchar(20) NOT NULL,
  `ct` varchar(30) NOT NULL,
  `latlong` varchar(100) NOT NULL,
  `org` varchar(30) NOT NULL,
  `lnm` varchar(30) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `ce` varchar(40) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

-- --------------------------------------------------------

--
-- Table structure for table `claimant`
--

CREATE TABLE IF NOT EXISTS `claimant` (
  `mlrId` int(11) NOT NULL,
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `org` varchar(20) NOT NULL,
  `ct` varchar(8) NOT NULL,
  `cfn` varchar(50) NOT NULL,
  `cln` varchar(50) NOT NULL,
  `cdb` date NOT NULL,
  `emp` varchar(30) DEFAULT NULL,
  `cda` date NOT NULL,
  `cde` date NOT NULL,
  `clinicId` int(11) NOT NULL,
  `tm` time NOT NULL,
  `ca1` varchar(40) NOT NULL,
  `ca2` varchar(40) NOT NULL,
  `cp` varchar(9) NOT NULL,
  `cc1` varchar(20) NOT NULL,
  `cc2` varchar(20) NOT NULL,
  `ce` varchar(50) NOT NULL,
  `cage` int(11) NOT NULL,
  `cageref` varchar(30) NOT NULL,
  `csol` int(11) NOT NULL,
  `csolref` varchar(50) NOT NULL,
  `gen` varchar(1) NOT NULL,
  `msreType` varchar(18) NOT NULL,
  `weight` varchar(7) NOT NULL,
  `height` varchar(7) NOT NULL,
  `clid` int(11) NOT NULL,
  `typeOfCase` varchar(200) NOT NULL,
  `stat` varchar(2) NOT NULL,
  `attend` tinyint(2) NOT NULL,
  `doc` varchar(30) NOT NULL,
  `ll` varchar(50) NOT NULL,
  PRIMARY KEY (`mlrId`),
  UNIQUE KEY `Unique` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1703 ;

-- --------------------------------------------------------

--
-- Table structure for table `clientappointment`
--

CREATE TABLE IF NOT EXISTS `clientappointment` (
  `clinicId` int(11) NOT NULL,
  `examTime` time NOT NULL,
  `stat` varchar(200) NOT NULL,
  `clientId` int(11) NOT NULL,
  `org` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE IF NOT EXISTS `clinic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `venue` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `timePerSlot` varchar(10) NOT NULL,
  `venueId` int(11) NOT NULL,
  `org` varchar(200) NOT NULL,
  `doc` varchar(200) NOT NULL,
  `stat` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `comp`
--

CREATE TABLE IF NOT EXISTS `comp` (
  `id` int(11) NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dlive`
--

CREATE TABLE IF NOT EXISTS `dlive` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `domh`
--

CREATE TABLE IF NOT EXISTS `domh` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eff`
--

CREATE TABLE IF NOT EXISTS `eff` (
  `cid` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tp` varchar(200) NOT NULL,
  `effT` varchar(200) NOT NULL,
  `prob` varchar(50) NOT NULL,
  `bdy_ord` smallint(2) NOT NULL,
  `stat` varchar(14) NOT NULL,
  `msg` text NOT NULL,
  `lvl` varchar(40) NOT NULL,
  `options` text NOT NULL,
  `pg` varchar(200) NOT NULL,
  `org` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=544 ;

-- --------------------------------------------------------

--
-- Table structure for table `effsaved`
--

CREATE TABLE IF NOT EXISTS `effsaved` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(200) NOT NULL,
  `txt` text NOT NULL,
  `inputs` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE IF NOT EXISTS `emp` (
  `id` int(11) NOT NULL,
  `msg1` text NOT NULL,
  `org` varchar(20) NOT NULL,
  `num` int(11) NOT NULL,
  `ind` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `examtimes`
--

CREATE TABLE IF NOT EXISTS `examtimes` (
  `clinicId` int(11) NOT NULL,
  `time` time NOT NULL,
  `clients` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `final_comms`
--

CREATE TABLE IF NOT EXISTS `final_comms` (
  `cid` varchar(10) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `org` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genap`
--

CREATE TABLE IF NOT EXISTS `genap` (
  `id` int(11) NOT NULL,
  `msg1` text NOT NULL,
  `msg2` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hcirc`
--

CREATE TABLE IF NOT EXISTS `hcirc` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE IF NOT EXISTS `hospitals` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) NOT NULL,
  `sa` varchar(80) DEFAULT NULL,
  `sp` varchar(9) DEFAULT NULL,
  `sc` varchar(15) DEFAULT NULL,
  `sf` varchar(15) DEFAULT NULL,
  `se` varchar(50) DEFAULT NULL,
  `st` varchar(30) NOT NULL,
  `latlong` varchar(100) NOT NULL,
  `org` varchar(30) NOT NULL,
  `lnm` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `idchk`
--

CREATE TABLE IF NOT EXISTS `idchk` (
  `idType` varchar(200) NOT NULL,
  `Photo` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ident`
--

CREATE TABLE IF NOT EXISTS `ident` (
  `cid` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `chk` text NOT NULL,
  `org` varchar(20) NOT NULL,
  `identNo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `injuries`
--

CREATE TABLE IF NOT EXISTS `injuries` (
  `value` varchar(200) NOT NULL,
  `key` varchar(200) NOT NULL,
  `d8Tym` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inves`
--

CREATE TABLE IF NOT EXISTS `inves` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iwse`
--

CREATE TABLE IF NOT EXISTS `iwse` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `id` int(11) NOT NULL,
  `jrest` text,
  `jabs` text,
  `mpas` text,
  `mmpast` text,
  `ltef` text,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `linked`
--

CREATE TABLE IF NOT EXISTS `linked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cId1` int(11) NOT NULL,
  `cId2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `org` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `stat` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lower`
--

CREATE TABLE IF NOT EXISTS `lower` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menh`
--

CREATE TABLE IF NOT EXISTS `menh` (
  `id` int(11) NOT NULL,
  `msg1` text NOT NULL,
  `msg2` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mlrinvs`
--

CREATE TABLE IF NOT EXISTS `mlrinvs` (
  `invs_id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` varchar(6) NOT NULL,
  `name` varchar(135) NOT NULL,
  `org` varchar(120) NOT NULL,
  `dated` varchar(13) NOT NULL,
  `descript` varchar(175) NOT NULL,
  `aref` varchar(120) NOT NULL,
  `qty` smallint(6) NOT NULL,
  `price` double(6,2) NOT NULL,
  PRIMARY KEY (`invs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `mreco2`
--

CREATE TABLE IF NOT EXISTS `mreco2` (
  `id` int(11) NOT NULL,
  `org` varchar(50) NOT NULL,
  `mid` int(11) NOT NULL,
  `txt` text NOT NULL,
  `ord` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mrecs`
--

CREATE TABLE IF NOT EXISTS `mrecs` (
  `id` int(11) NOT NULL,
  `org` varchar(20) NOT NULL,
  `title` varchar(70) NOT NULL,
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `rel` varchar(60) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `mreps`
--

CREATE TABLE IF NOT EXISTS `mreps` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `neck`
--

CREATE TABLE IF NOT EXISTS `neck` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE IF NOT EXISTS `occupations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `occupation` varchar(150) NOT NULL,
  `org` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

-- --------------------------------------------------------

--
-- Table structure for table `openpostcodedb`
--

CREATE TABLE IF NOT EXISTS `openpostcodedb` (
  `street` varchar(26) DEFAULT NULL,
  `area` varchar(28) DEFAULT NULL,
  `city` varchar(22) DEFAULT NULL,
  `county` varchar(39) DEFAULT NULL,
  `postcode` varchar(15) DEFAULT NULL,
  `something` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `outcodepostcodes`
--

CREATE TABLE IF NOT EXISTS `outcodepostcodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outcode` varchar(4) NOT NULL,
  `lat` varchar(20) NOT NULL,
  `lng` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2891 ;

-- --------------------------------------------------------

--
-- Table structure for table `pmh`
--

CREATE TABLE IF NOT EXISTS `pmh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `hist` text NOT NULL,
  `pg` varchar(200) NOT NULL,
  `options` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `org` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1703 ;

-- --------------------------------------------------------

--
-- Table structure for table `pmhmedical`
--

CREATE TABLE IF NOT EXISTS `pmhmedical` (
  `value` varchar(200) NOT NULL,
  `key` varchar(200) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pmhsaved`
--

CREATE TABLE IF NOT EXISTS `pmhsaved` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(200) NOT NULL,
  `txt` text NOT NULL,
  `inputs` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `prog`
--

CREATE TABLE IF NOT EXISTS `prog` (
  `id` int(11) NOT NULL,
  `prob` varchar(120) NOT NULL,
  `prog` text,
  `status` varchar(3) NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qualif`
--

CREATE TABLE IF NOT EXISTS `qualif` (
  `org` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `ord` int(11) NOT NULL,
  `qualif` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE IF NOT EXISTS `recent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cId` int(11) NOT NULL,
  `tStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `org` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=285 ;

-- --------------------------------------------------------

--
-- Table structure for table `refer_notes`
--

CREATE TABLE IF NOT EXISTS `refer_notes` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_id` varchar(7) NOT NULL,
  `ref_cid` varchar(7) NOT NULL,
  `notes` varchar(250) NOT NULL,
  `person` varchar(100) NOT NULL,
  `note_dt` varchar(15) NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `repgen`
--

CREATE TABLE IF NOT EXISTS `repgen` (
  `cid` varchar(30) NOT NULL,
  `org` varchar(30) NOT NULL,
  `num` int(3) NOT NULL,
  `dt` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sbelt`
--

CREATE TABLE IF NOT EXISTS `sbelt` (
  `org` varchar(30) NOT NULL,
  `id` varchar(30) NOT NULL,
  `sBelt` tinyint(1) NOT NULL,
  `cid` int(11) NOT NULL,
  `sBexemp` varchar(1) NOT NULL,
  `frmExemp` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scanstbl`
--

CREATE TABLE IF NOT EXISTS `scanstbl` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `advsr` varchar(6) NOT NULL,
  `descript` varchar(150) NOT NULL,
  `reqDt` varchar(14) NOT NULL,
  `recDt` varchar(14) NOT NULL,
  `appAttend` varchar(110) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `shist`
--

CREATE TABLE IF NOT EXISTS `shist` (
  `id` int(11) NOT NULL,
  `h` text,
  `inj` text,
  `treat` text,
  `hlyf` text,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soi`
--

CREATE TABLE IF NOT EXISTS `soi` (
  `cid` int(11) NOT NULL,
  `chk` varchar(100) NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solicitor`
--

CREATE TABLE IF NOT EXISTS `solicitor` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) NOT NULL,
  `sa` varchar(80) DEFAULT NULL,
  `sp` varchar(9) DEFAULT NULL,
  `sc` varchar(15) DEFAULT NULL,
  `sf` varchar(15) DEFAULT NULL,
  `se` varchar(50) DEFAULT NULL,
  `st` varchar(30) NOT NULL,
  `latlong` varchar(100) NOT NULL,
  `org` varchar(30) NOT NULL,
  `lnm` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=316 ;

-- --------------------------------------------------------

--
-- Table structure for table `specinst`
--

CREATE TABLE IF NOT EXISTS `specinst` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cid` smallint(6) NOT NULL,
  `org` varchar(25) NOT NULL,
  `expert` varchar(20) NOT NULL,
  `note` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `stat`
--

CREATE TABLE IF NOT EXISTS `stat` (
  `org` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `dt` date NOT NULL,
  `tm` varchar(20) NOT NULL,
  `stat` int(11) NOT NULL,
  `dr` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE IF NOT EXISTS `suggestion` (
  `sug_id` int(7) NOT NULL AUTO_INCREMENT,
  `suggestion` varchar(250) NOT NULL,
  `org` varchar(60) NOT NULL,
  `dte` varchar(15) NOT NULL,
  KEY `sug_id` (`sug_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `surgeries`
--

CREATE TABLE IF NOT EXISTS `surgeries` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) NOT NULL,
  `sa` varchar(80) DEFAULT NULL,
  `sp` varchar(9) DEFAULT NULL,
  `sc` varchar(15) DEFAULT NULL,
  `sf` varchar(15) DEFAULT NULL,
  `se` varchar(50) DEFAULT NULL,
  `st` varchar(30) NOT NULL,
  `latlong` varchar(100) NOT NULL,
  `org` varchar(30) NOT NULL,
  `lnm` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `thorax`
--

CREATE TABLE IF NOT EXISTS `thorax` (
  `id` int(11) NOT NULL,
  `msg` varchar(200) NOT NULL DEFAULT 'Was not examined.',
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE IF NOT EXISTS `travel` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `treat`
--

CREATE TABLE IF NOT EXISTS `treat` (
  `cid` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tp` varchar(200) NOT NULL,
  `msg` text NOT NULL,
  `options` text NOT NULL,
  `pg` varchar(200) NOT NULL,
  `stat` varchar(2) NOT NULL,
  `org` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=409 ;

-- --------------------------------------------------------

--
-- Table structure for table `typeofcase`
--

CREATE TABLE IF NOT EXISTS `typeofcase` (
  `typeOfCase` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upper`
--

CREATE TABLE IF NOT EXISTS `upper` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `org` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `fName` varchar(30) NOT NULL,
  `lName` varchar(30) NOT NULL,
  `stat` varchar(50) NOT NULL,
  `uName` varchar(30) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `mob` varchar(30) NOT NULL,
  `peml` varchar(50) NOT NULL,
  `weml` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
