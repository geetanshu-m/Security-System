-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 10:27 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `security`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `sno` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`sno`, `username`, `password`) VALUES
(10, 'admin', 'admin'),
(11, 'lalit', '1996'),
(12, 'geetanshu', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `contract_emp`
--

CREATE TABLE `contract_emp` (
  `sno` int(11) NOT NULL,
  `category` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract_emp`
--

INSERT INTO `contract_emp` (`sno`, `category`, `name`) VALUES
(1, '14', 'rames'),
(2, '14', 'sureh'),
(3, '14', 'tom'),
(4, '15', 'pooja'),
(5, '15', 'sai'),
(6, '16', 'Nadeem'),
(7, '16', 'Aman'),
(8, '17', 'Raj'),
(9, '17', 'Shyam');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `sno` int(11) NOT NULL,
  `catergory` text NOT NULL,
  `Date_Of_Reciept` date NOT NULL,
  `Date_Of_Dispatch` date NOT NULL,
  `date1` date NOT NULL,
  `Name_Of_Contracter` text NOT NULL,
  `Vehicle_Number` text NOT NULL,
  `In_Time` time NOT NULL,
  `Out_Time` time NOT NULL,
  `DC_INV_No_and_Date` text NOT NULL,
  `SDV_INV_No_and_Date` text NOT NULL,
  `Consigner_Name_and_Address` text NOT NULL,
  `Goods_Reciveing_Department` text NOT NULL,
  `Goods_Dispatch_Department` text NOT NULL,
  `Reciver_Signature` text NOT NULL,
  `Security_Signature` text NOT NULL,
  `Remarks` text NOT NULL,
  `Empty_Container` text NOT NULL,
  `From_Address` text NOT NULL,
  `Newspaper` text NOT NULL,
  `Signature` text NOT NULL,
  `Courier_Name` text NOT NULL,
  `Docket_Number` text NOT NULL,
  `Sender_Signature` text NOT NULL,
  `To_Address` text NOT NULL,
  `Dispacted_By` text NOT NULL,
  `Shift` text NOT NULL,
  `Type_Of_Vehicle` text NOT NULL,
  `Pickup_Place` text NOT NULL,
  `Drop_Place` text NOT NULL,
  `Kilometer` int(11) NOT NULL,
  `Purpose` text NOT NULL,
  `Belongs_To` text NOT NULL,
  `Driver_Name` text NOT NULL,
  `Mobile_Number` text NOT NULL,
  `Department` text NOT NULL,
  `Badge_No` int(11) NOT NULL,
  `Quantity_In` int(11) NOT NULL,
  `Quantity_Out` int(11) NOT NULL,
  `Opened_By` text NOT NULL,
  `Location` text NOT NULL,
  `Closed_By` text NOT NULL,
  `Whom_To_Meet` text NOT NULL,
  `Name` text NOT NULL,
  `Department_NO_Security` int(11) NOT NULL,
  `Rank` text NOT NULL,
  `Post` text NOT NULL,
  `Time` time NOT NULL,
  `Quantity_Stock` int(11) NOT NULL,
  `Quantity_Available` int(11) NOT NULL,
  `HandingOver_Signature` text NOT NULL,
  `TakeingOver_Signature` text NOT NULL,
  `Description` text NOT NULL,
  `Token_Number` int(11) NOT NULL,
  `IS_in` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`sno`, `catergory`, `Date_Of_Reciept`, `Date_Of_Dispatch`, `date1`, `Name_Of_Contracter`, `Vehicle_Number`, `In_Time`, `Out_Time`, `DC_INV_No_and_Date`, `SDV_INV_No_and_Date`, `Consigner_Name_and_Address`, `Goods_Reciveing_Department`, `Goods_Dispatch_Department`, `Reciver_Signature`, `Security_Signature`, `Remarks`, `Empty_Container`, `From_Address`, `Newspaper`, `Signature`, `Courier_Name`, `Docket_Number`, `Sender_Signature`, `To_Address`, `Dispacted_By`, `Shift`, `Type_Of_Vehicle`, `Pickup_Place`, `Drop_Place`, `Kilometer`, `Purpose`, `Belongs_To`, `Driver_Name`, `Mobile_Number`, `Department`, `Badge_No`, `Quantity_In`, `Quantity_Out`, `Opened_By`, `Location`, `Closed_By`, `Whom_To_Meet`, `Name`, `Department_NO_Security`, `Rank`, `Post`, `Time`, `Quantity_Stock`, `Quantity_Available`, `HandingOver_Signature`, `TakeingOver_Signature`, `Description`, `Token_Number`, `IS_in`) VALUES
(1, '1', '2017-06-27', '0000-00-00', '0000-00-00', '', 'RJ14-CJ-1310', '11:21:00', '11:24:00', '99895', '', 'GEETANSHU', 'IT', '', '<img src = saved_images/1498542755.jpg>', 'Tundu', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 1, 0),
(2, '2', '0000-00-00', '2017-06-27', '0000-00-00', '', 'rj-sd-7878', '11:25:00', '11:32:00', '', '898', 'kjahsjhs', '', 'jkjkljkl', '<img src = saved_images/1498542951.jpg>', 'kjjjhjkhj', 'khkjh', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 2, 0),
(4, '3', '0000-00-00', '2017-06-27', '0000-00-00', '', 'kjkljlkjlj', '11:26:00', '11:32:00', '', 'kjkkjkj', 'kljkljkl', '', 'kjkhjk', '<img src = saved_images/1498542988.jpg>', 'bnmbmn', 'mnbnm', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 4, 0),
(5, '8', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '<img src = saved_images/1498543030.jpg>', 'jjjhjkh', 'jkhkjhkj', '', 'kjhjkhkj', '', '', 'jjkhjk', 'hkjhkjh', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 0, 1),
(6, '9', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '00:00:00', '00:00:00', '', '445456', '', '', '', '<img src = saved_images/1498543051.jpg>', 'jhhjhg', 'hjghj', '', '', '', '', '', '5454654', '', 'hjhjh', 'jkhjkhkjh', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 0, 1),
(7, '10', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '00:00:00', '00:00:00', '', '4545', '', '', '', '<img src = saved_images/1498543084.jpg>', 'hgfghfgh', 'fhgfg', '', '', '', '', '', '4545', '', 'jhghjghjgh', 'jhghjghjgj', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 0, 1),
(9, '14', '0000-00-00', '0000-00-00', '2017-06-27', 'rames', '', '11:30:00', '11:32:00', '', '', '', '', '', '', 'hghgjh', 'gjhgjh', '', '', '', '<img src = saved_images/1498543238.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 7, 0),
(10, '15', '0000-00-00', '0000-00-00', '2017-06-27', 'sai', '', '11:30:00', '11:32:00', '', '', '', '', '', '', 'kjkjhkj', 'hjkhkjhkj', '', '', '', '<img src = saved_images/1498543264.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 10, 0),
(11, '16', '0000-00-00', '0000-00-00', '2017-06-27', 'Nadeem', '', '11:31:00', '11:32:00', '', '', '', '', '', '', 'kjhjhh', 'jkhkj', '', '', '', '<img src = saved_images/1498543319.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 11, 0),
(12, '17', '0000-00-00', '0000-00-00', '2017-06-27', 'Raj', '', '11:32:00', '11:32:00', '', '', '', '', '', '', 'jhjhjhjkh', 'jkhjkhjk', '', '', '', '<img src = saved_images/1498543338.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 12, 0),
(13, '4', '0000-00-00', '0000-00-00', '2017-06-27', '', 'GFGHFHF', '12:57:00', '13:06:00', '', '', '', '', '', '<img src = saved_images/1498548464.jpg>', 'hghjgh', 'kjhkj', '20', 'fghfhg', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 13, 0),
(14, '5', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '12:58:00', '00:00:00', '', '', '', '', '', '<img src = saved_images/1498548540.jpg>', 'jhhgjhg', 'hjghjghj', '', '', 'Economic Times', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 0, 1),
(15, '6', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '12:59:00', '13:06:00', '', '', '', '', '', '', 'hhgjghjg', 'hjgjgj', '', '', '', '<img src = saved_images/1498548563.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', 'hhgjhgjhh', 0, '', '', '00:00:00', 0, 0, '', '', '', 14, 0),
(16, '7', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '<img src = saved_images/1498548587.jpg>', 'jhghjghjg', 'jhgjhgjh', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 0, 1),
(17, '18', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '13:00:00', '13:07:00', '', '', '', '', '', '', 'hgjhgjhg', 'hjgjhj', '', 'jhgjhgjhgjh', '', '<img src = saved_images/1498548647.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'jhhjhg', 0, 0, 0, '0', '', '', '', 'gjhgjhgjh', 0, '', '', '00:00:00', 0, 0, '', '', '', 15, 0),
(18, '19', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', 'ghjgjhghj', '', '', '', '', '<img src = saved_images/1498548667.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 5, 9, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', 'hghjgjhg', 0, 1),
(19, '20', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '13:01:00', '13:07:00', '', '', '', '', '', '', 'jhghjgjh', 'ghjgjhgj', '', '', '', '<img src = saved_images/1498548681.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', 'jghjghjghj', 'hghjghjghjg', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 16, 0),
(20, '21', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '13:01:00', '13:07:00', '', '', '', '', '', '', 'jhhgh', 'ghjghgh', '', 'ghfhgfhgf', '', '<img src = saved_images/1498548723.jpg>', '', '', '', '', '', '', '', '', '', 0, 'Personal', '', '', '8824887714', '', 0, 0, 0, '0', '', '', 'ghfghfghfhg', 'gfghfghf', 0, '', '', '00:00:00', 0, 0, '', '', '', 17, 0),
(21, '22', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '13:03:00', 0, 0, '', '', 'sdjhsghsghdgsajdhgsagdhsagdjhsagdjhasgdhasgdhsagdhgsajdgasjgdjasgdhasghdgsahgdjhsgdjhasgdsaghdgsjgdjsagdjhsgdhasdhgashdgjhsgdjasgdhasgd asgdjasgdasjdgsa dgadhsa dasjhd ashgd sagdsag djsgdjjsahgdjasg djsa dhjas dhasgdsag dasdgjs gdashd sagd hjasgdhasgd jasgdsa d', 0, 1),
(22, '23', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', 'jhjhjkhkj', 'hjkhjkh', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '13:03:00', 9, 52, '<img src = saved_images/1498548813.jpg>', '<img src = saved_images/1498548815.jpg>', 'gghghgshghsgdgsgdshdg\r\nhdfghdgfdsgfhdsgfdsg', 0, 1),
(23, '29', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '13:03:00', '13:07:00', '', '', '', '', '', '', '', '', '', '', '', '<img src = saved_images/1498548832.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'hkjhjkh', 0, 0, 0, '0', '', '', '', 'jhjhjhjk', 0, '', '', '00:00:00', 0, 0, '', '', '', 18, 0),
(24, '24', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '13:04:00', '13:07:00', '', '', '', '', '', '', '', '', '', '', '', '<img src = saved_images/1498548857.jpg>', '', '', '', '', '', 'Night', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', 'ghghgjhg', 5454, 'jhhghg', 'hjghjgjh', '00:00:00', 0, 0, '', '', '', 19, 0),
(25, '25', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '13:04:00', '13:07:00', '', '', '', '', '', '', '', '', '', '', '', '<img src = saved_images/1498548874.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', 'jhghjghjgjhghj', 0, '', '', '00:00:00', 0, 0, '', '', '', 20, 0),
(26, '26', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', 'hghghjghjgj', '', '', '', '<img src = saved_images/1498548888.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', 'hgfgfhgfgh', 0, '', '', '13:04:00', 0, 0, '', '', '', 0, 1),
(27, '27', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '13:04:00', '13:07:00', '', '', '', '', '', '', '', 'jhghghjgh', '', '', '', '<img src = saved_images/1498548902.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', 'hhjghjghjghjg', 0, '', '', '00:00:00', 0, 0, '', '', '', 21, 0),
(28, '27', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '13:05:00', '13:07:00', '', '', '', '', '', '', '', 'jhghjghjghjgh', '', '', '', '<img src = saved_images/1498548915.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', 'jghghjghjgjh', 0, '', '', '00:00:00', 0, 0, '', '', '', 22, 0),
(29, '28', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '13:05:00', '13:08:00', '', '', '', '', '', '', '', 'ghjghjgj', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', '', '', '', 'jhghjghghj', 0, '', '', '00:00:00', 0, 0, '', '', '', 23, 0),
(30, '11', '0000-00-00', '0000-00-00', '2017-06-27', '', 'jjhjghjghjghjg', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'hjghjghjg', 'ghjghjgjhg', 'jhghjghgjh', 0, '', '', '', '8954545454', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 0, 1),
(31, '12', '0000-00-00', '0000-00-00', '2017-06-27', '', 'hghgfghfghfghfgh', '13:05:00', '13:08:00', '', '', '', '', '', '', '', 'hgfhfgfgh', '', '', '', '', '', '', '', '', '', '', '', '', '', 58, '', '', '', '', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 24, 0),
(32, '13', '0000-00-00', '0000-00-00', '2017-06-27', '', 'ggfgfghf', '13:06:00', '13:08:00', '', '', '', '', '', '', 'jhgjhghjghj', 'kjhjhjhjkhhkjhjkhjk', '', '', '', '<img src = saved_images/1498548982.jpg>', '', '', '', '', '', '', '', '', '', 0, 'ffghfhgfghfghf', 'hgfghfghfghfgh', 'ghjghjgjhghjg', '9565656565', '', 0, 0, 0, '0', '', '', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 25, 0),
(33, '29', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '13:14:00', '13:15:00', '', '', '', '', '', '', '', '', '', '', '', '<img src = saved_images/1498549506.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'jghjk', 0, 0, 0, '0', '', '', '', 'hjgjhg', 0, '', '', '00:00:00', 0, 0, '', '', '', 26, 0),
(34, '20', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '13:15:00', '13:15:00', '', '', '', '', '', '', 'hjkh', 'kjhklk', '', '', '', '<img src = saved_images/1498549539.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, '0', 'kjhjk', 'jkhkkhkh', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 27, 0),
(35, '20', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '13:20:00', '13:21:00', '', '', '', '', '', '', 'fdkjl', 'fjkdg', '', '', '', '<img src = saved_images/1498549848.jpg>', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, 'jjfkhs', 'jdkgh', 'fdhjk', '', '', 0, '', '', '00:00:00', 0, 0, '', '', '', 28, 0),
(36, '29', '0000-00-00', '0000-00-00', '2017-06-27', '', '', '13:21:00', '13:21:00', '', '', '', '', '', '', '', '', '', '', '', '<img src = saved_images/1498549869.jpg>', '', '', '', '', '', '', '', '', '', 0, 'dkfjgkl', '', '', '', 'klffdgj', 0, 0, 0, '', '', '', '', 'dfkgj', 0, '', '', '00:00:00', 0, 0, '', '', '', 29, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mas_cat`
--

CREATE TABLE `mas_cat` (
  `sno` int(11) NOT NULL,
  `catagory` text NOT NULL,
  `db_cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_cat`
--

INSERT INTO `mas_cat` (`sno`, `catagory`, `db_cat_name`) VALUES
(1, 'Material In Out', 'material_in_out'),
(2, 'Courier', 'courier'),
(3, 'Contract Employees', 'contarct_employees'),
(4, 'Utilities', 'utilities'),
(5, 'Others', 'others'),
(6, 'Security Department', 'security_department'),
(7, 'Vehicle/Shift ', 'vehicle_shift');

-- --------------------------------------------------------

--
-- Table structure for table `relation_master`
--

CREATE TABLE `relation_master` (
  `SerialNumber1` int(11) NOT NULL,
  `Catergory` text NOT NULL,
  `SerialNumber` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relation_master`
--

INSERT INTO `relation_master` (`SerialNumber1`, `Catergory`, `SerialNumber`, `Description`, `Quantity`) VALUES
(1, '1', 1, 'LAPTOP', 5),
(2, '1', 1, 'MOBILE', 4),
(3, '2', 2, 'kjdjasdjh', 85),
(4, '2', 2, 'kjhjkh', 5),
(5, '4', 13, 'kjhjkhj', 5),
(6, '4', 13, 'jhggjhgj', 6),
(7, '4', 13, 'hjhjhjkh', 9),
(8, '7', 16, 'gffghfgfgh', 56),
(9, '7', 16, 'jhhjghjghj', 6),
(10, '7', 16, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `sno` int(11) NOT NULL,
  `coloums` text NOT NULL,
  `r21` int(11) NOT NULL DEFAULT '0',
  `r1` int(11) NOT NULL DEFAULT '0',
  `r2` int(11) NOT NULL DEFAULT '0',
  `r3` int(11) NOT NULL DEFAULT '0',
  `r4` int(11) NOT NULL DEFAULT '0',
  `r5` int(11) NOT NULL DEFAULT '0',
  `r6` int(11) NOT NULL DEFAULT '0',
  `r7` int(11) NOT NULL DEFAULT '0',
  `r8` int(11) NOT NULL DEFAULT '0',
  `r9` int(11) NOT NULL DEFAULT '0',
  `r10` int(11) NOT NULL DEFAULT '0',
  `r11` int(11) NOT NULL DEFAULT '0',
  `r12` int(11) NOT NULL DEFAULT '0',
  `r13` int(11) NOT NULL DEFAULT '0',
  `r14` int(11) NOT NULL DEFAULT '0',
  `r15` int(11) NOT NULL DEFAULT '0',
  `r16` int(11) NOT NULL DEFAULT '0',
  `r17` int(11) NOT NULL DEFAULT '0',
  `r18` int(11) NOT NULL DEFAULT '0',
  `r19` int(11) NOT NULL DEFAULT '0',
  `r20` int(11) NOT NULL DEFAULT '0',
  `r22` int(11) NOT NULL DEFAULT '0',
  `r23` int(11) NOT NULL DEFAULT '0',
  `r24` int(11) NOT NULL DEFAULT '0',
  `r25` int(11) NOT NULL DEFAULT '0',
  `r26` int(11) NOT NULL DEFAULT '0',
  `r27` int(11) NOT NULL DEFAULT '0',
  `r28` int(11) NOT NULL DEFAULT '0',
  `r29` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`sno`, `coloums`, `r21`, `r1`, `r2`, `r3`, `r4`, `r5`, `r6`, `r7`, `r8`, `r9`, `r10`, `r11`, `r12`, `r13`, `r14`, `r15`, `r16`, `r17`, `r18`, `r19`, `r20`, `r22`, `r23`, `r24`, `r25`, `r26`, `r27`, `r28`, `r29`) VALUES
(1, 'date1', 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'In_Time', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1),
(3, 'Vehicle_Number', 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Name_Of_Contracter', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Date_Of_Reciept', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Date_Of_Dispatch', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Out_Time', 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1),
(8, 'DC_INV_No_and_Date', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'SDV_INV_No_and_Date', 0, 0, 1, 1, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'Consigner_Name_and_Address', 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'Goods_Reciveing_Department', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'Reciver_Signature', 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'Goods_Dispatch_Department', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 'Security_Signature', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0),
(15, 'Remarks', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 0, 1, 1, 1, 0),
(16, 'Empty_Container', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 'From_Address', 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 'Newspaper', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 'Signature', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 1),
(20, 'Courier_Name', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 'Docket_Number', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 'Sender_Signature', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'To_Address', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 'Dispacted_By', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 'Shift', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(26, 'Type_Of_Vehicle', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 'Pickup_Place', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 'Drop_Place', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 'Kilometer', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 'Purpose', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(31, 'Belongs_To', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 'Driver_Name', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 'Mobile_Number', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 'Department', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(35, 'Badge_No', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 'Quantity_In', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 'Quantity_Out', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 'Opened_By', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 'Location', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 'Closed_By', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 'Whom_To_Meet', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 'Name', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1),
(43, 'Department_NO_Security', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(44, 'Rank', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(45, 'Post', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(46, 'Time', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0),
(47, 'Quantity_Stock', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(48, 'Quantity_Available', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(49, 'HandingOver_Signature', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(50, 'TakeingOver_Signature', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(51, 'Description', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0),
(52, 'Token_Number', 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sno` int(11) NOT NULL,
  `fsno` text NOT NULL,
  `category` text NOT NULL,
  `db_cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sno`, `fsno`, `category`, `db_cat_name`) VALUES
(1, '1', 'Material Inward', 'material_inward'),
(2, '1', 'Material Outward(Return-Able)', 'material_outward_r'),
(3, '1', 'Material Outward(Non-Return-Able)', 'material_outward_nr'),
(4, '4', 'Water', 'water'),
(5, '4', 'News Paper', 'newspaper'),
(6, '4', 'House Keeping Staff', 'house_keeping_staff'),
(7, '4', 'Milk', 'milk'),
(8, '2', 'Inward Courier', 'inward_courier'),
(9, '2', 'Bluedart Courier Material', 'bluedart_courier_material'),
(10, '2', 'DTDC', 'dtdc'),
(11, '7', 'Shift Employees', 'shift_employees'),
(12, '7', 'Shift Vehicle', 'shift_vehicle'),
(13, '7', 'Vehicle In & Out', 'vehicle'),
(14, '3', 'SAI SRI Enterprises', 'sai_sri_enterprises'),
(15, '3', 'Pooja Contract Employees In & Out', 'pooja_cont'),
(16, '3', 'Esspey Contract Employees In & Out', 'esspey_cont'),
(17, '3', 'Focus Contract Employees In & Out', 'focus_cont'),
(18, '5', 'Civil Workers', 'civil_workers'),
(19, '5', 'Tools', 'tools'),
(20, '5', 'Key Movement', 'key_movement'),
(21, '5', 'Visitors\r\n', 'visitor'),
(22, '5 ', 'Occurrence ', 'occurrence'),
(23, '5', 'Handing Over & Taking Over', 'handing_over_&_taking_over'),
(24, '6', 'Security Attendance  ', 'security_attendance'),
(25, '6', 'Security On Holiday', 'security_on_holiday'),
(26, '6', 'Patrolling  ', 'patrolling'),
(27, '6', 'Security Timing ', 'security_timing'),
(28, '6', 'Uniq Officer Visit ', 'uniq_officer_visit'),
(29, '5', 'Out Source Third Party Movement', 'out_source_third_party_movement');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `contract_emp`
--
ALTER TABLE `contract_emp`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `mas_cat`
--
ALTER TABLE `mas_cat`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `relation_master`
--
ALTER TABLE `relation_master`
  ADD PRIMARY KEY (`SerialNumber1`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `contract_emp`
--
ALTER TABLE `contract_emp`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `mas_cat`
--
ALTER TABLE `mas_cat`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `relation_master`
--
ALTER TABLE `relation_master`
  MODIFY `SerialNumber1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
