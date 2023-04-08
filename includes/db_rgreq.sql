-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 08:30 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rgreq`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absentees`
--

CREATE TABLE `tbl_absentees` (
  `ab_id` int(11) NOT NULL,
  `ab_date` varchar(20) NOT NULL,
  `ab_day` varchar(20) NOT NULL,
  `stu_grade` varchar(20) NOT NULL,
  `grade_teacher` varchar(50) NOT NULL,
  `ab_reason` varchar(200) NOT NULL,
  `ab_remarks` varchar(200) NOT NULL,
  `ab_status` int(11) NOT NULL,
  `stuName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_absentees`
--

INSERT INTO `tbl_absentees` (`ab_id`, `ab_date`, `ab_day`, `stu_grade`, `grade_teacher`, `ab_reason`, `ab_remarks`, `ab_status`, `stuName`) VALUES
(47, '2016/11/08', '2', 'Eight', 'Hari Sanjel', 'Puja at home', '', 1, 'Sanchit Maharjan'),
(46, '2016/11/08', '2', 'Seven', 'Bhushan', 'Call not received!', '', 1, 'Arpan Phuyal'),
(45, '2016/10/31', '1', 'Eight', 'Hari Sanjel', 'High Fever', '', 1, 'Dilear Khan'),
(44, '2016/09/08', '4', 'Seven', 'Bhushan', 'marriage party', '', 1, 'Samar Rana'),
(43, '2016/09/08', '4', 'Eight', 'Hari Sanjel', 'Fever', '', 1, 'Sanchit Maharjan'),
(42, '2016/08/23', '2', 'Seven', 'Bhushan', 'high fever', '', 1, 'Samar Rana'),
(41, '2016/08/23', '2', 'Eight', 'Hari Sanjel', 'attended party', '', 1, 'Dilear Khan'),
(40, '2016/08/18', '4', 'Seven', 'Bhushan', 'Malaysia visit', '', 1, 'Sujay Tuladhar'),
(39, '2016/08/18', '4', 'Seven', 'Bhushan', 'Party at home', '', 1, 'Samar Rana'),
(38, '2016/08/18', '4', 'Eight', 'Hari Sanjel', 'High Fever', '', 1, 'Sanchit Maharjan'),
(37, '2016/08/18', '4', 'Eight', 'Hari Sanjel', 'Went to Immigration', '', 1, 'Prerana Mehta'),
(36, '2016/08/18', '4', 'Eight', 'Hari Sanjel', 'Typhoid', '', 1, 'Dilear Khan'),
(35, '2016/08/05', '5', 'Eight', 'Hari Sanjel', '', '', 0, 'Sanchit Maharjan'),
(34, '2016/07/23', '6', 'Seven', 'Bhushan', '', '', 0, 'Tejash Agrawal'),
(33, '2016/07/23', '6', 'Eight', 'Hari Sanjel', '', '', 0, 'Sanchit Maharjan'),
(32, '2016/07/23', '6', 'Seven', 'Bhushan', 'High Fever', '', 1, 'Samar Rana'),
(30, '2016/07/23', '6', 'Seven', 'Bhushan', '', '', 0, 'Tejash Agrawal'),
(31, '2016/07/23', '6', 'Eight', 'Hari Sanjel', 'Party', '', 1, 'Prerana Mehta'),
(48, '2016/11/08', '2', 'Eight', 'Hari Sanjel', 'Out of Valley', '', 1, 'Dilear Khan'),
(49, '2016/11/08', '2', 'Eight', 'Hari Sanjel', 'Marriage Ceremony at home', '', 1, 'Prerana Mehta'),
(50, '2016/11/08', '2', 'Seven', 'Bhushan', '', '', 0, 'Samar Rana'),
(51, '2016/12/01', '4', 'Eight', 'Hari Sanjel', 'Typhoid', '', 1, 'Prerana Mehta'),
(52, '2016/12/01', '4', 'Seven', 'Bhushan', 'Daddy''s cause', '', 1, 'Arpan Phuyal'),
(53, '2016/12/01', '4', 'Seven', 'Bhushan', 'Bus left him', '', 1, 'Samar Rana'),
(54, '2016/12/01', '4', 'Eight', 'Hari Sanjel', 'sister''s marriage', '', 1, 'Sanchit Maharjan'),
(55, '2016/12/05', '1', 'Eight', 'Hari Sanjel', 'Out of valley', '', 1, 'Sanchit Maharjan'),
(56, '2016/12/06', '2', 'Eight', 'Hari Sanjel', 'Marriage ceremony at home', '', 1, 'Prerana Mehta'),
(57, '2016/12/06', '2', 'Eight', 'Hari Sanjel', 'High Fever', '', 1, 'Prinsh Thapa'),
(58, '2016/12/06', '2', 'Seven', 'Bhushan', 'Fever', '', 1, 'Samar Rana'),
(59, '2016/12/07', '3', 'Eight', 'Hari Sanjel', 'Fever', '', 1, 'Prinsh Thapa'),
(60, '2016/12/07', '3', 'Seven', 'Bhushan', 'Puja at home', '', 1, 'Arpan Phuyal'),
(61, '2016/12/07', '3', 'Seven', 'Bhushan', 'Marriage party', '', 1, 'Samar Rana'),
(62, '2017/02/06', '1', 'Eight', 'Hari Sanjel', 'Diahhroea', '', 1, 'Dilear Khan'),
(63, '2017/02/06', '1', 'Eight', 'Hari Sanjel', 'Maleria', '', 1, 'Pem Tsering Gurung'),
(64, '2017/02/28', '2', 'Eight', 'Hari Sanjel', 'Party', '', 1, 'Pem Tsering Gurung'),
(65, '2017/02/28', '2', 'Eight', 'Hari Sanjel', 'Fever', '', 1, 'Prinsh Thapa'),
(66, '2017/02/28', '2', 'Six', 'Rashmi Dahal', '', '', 0, 'Riza Shrestha'),
(67, '2017/02/28', '2', 'Eight', 'Hari Sanjel', '', '', 0, 'Dilear Khan'),
(68, '2017/02/28', '2', 'Eight', 'Hari Sanjel', '', '', 0, 'Pem Tsering Gurung'),
(69, '2017/02/28', '2', 'Eight', 'Hari Sanjel', '', '', 0, 'Prerana Mehta'),
(70, '2017/02/28', '2', 'Eight', 'Hari Sanjel', '', '', 0, 'Prinsh Thapa'),
(71, '2017/02/28', '2', 'Eight', 'Hari Sanjel', '', '', 0, 'Sanchit Maharjan'),
(72, '2017/05/23', '2', 'Eight', 'Hari Sanjel', '', '', 0, 'Dilear Khan'),
(73, '2017/07/22', '6', 'Eight', 'Hari Sanjel', 'Fever', '', 1, 'Prinsh Thapa'),
(74, '2017/08/05', '6', 'Eight', 'Hari Sanjel', 'Out of country', '', 1, 'Aryan Kumar'),
(75, '2017/08/31', '4', 'Nine', 'Hari Sanjel', 'fever', '', 1, 'Aaryan Raghubanshi'),
(76, '2017/10/08', '0', 'Nine', 'Hari Sanjel', '', '', 0, 'Pem Tsering Gurung'),
(77, '2018/01/11', '4', 'Nine', 'Hari Sanjel', '', '', 0, 'Shreeyam Lama'),
(78, '2018/04/22', '0', 'Nine', 'Hari Sanjel', 'Fever', '', 1, 'Shreeyam Lama'),
(79, '2018/04/22', '0', 'Nine', 'Hari Sanjel', 'Missed the bus', '', 1, 'Dilear Khan'),
(80, '2018/04/22', '0', 'Nine', 'Hari Sanjel', 'High fever', '', 1, 'Prerana Mehta'),
(81, '2018/07/20', '5', 'Nine', 'Hari Sanjel', '', '', 0, 'Pem Tsering Gurung'),
(82, '2018/11/13', '2', 'Eight', 'Bhushan', '', '', 0, 'Dejin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complain`
--

CREATE TABLE `tbl_complain` (
  `complainID` int(11) NOT NULL,
  `stuNAME` varchar(255) NOT NULL,
  `complain` varchar(255) NOT NULL,
  `complainedBY` varchar(255) NOT NULL,
  `witness` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `complainDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_complain`
--

INSERT INTO `tbl_complain` (`complainID`, `stuNAME`, `complain`, `complainedBY`, `witness`, `status`, `complainDate`) VALUES
(1, 'Dejin', 'bullying', 'Hari Sanjel', 'Bhushan Sir', 1, '2017-01-30'),
(2, 'Tejash Agrawal', 'missed class', 'Hari Sanjel', 'Aryan ', 1, '2017-07-09'),
(3, 'Arpan Phuyal', 'Misbehhhhhhhh', 'Hari Sanjel', 'Whole class', 1, '2017-07-10'),
(4, 'Sanchit Maharjan', 'Bullying to Prithivi', 'Hari Sanjel', 'Diwa Shrestha', 1, '2017-07-11'),
(5, 'Samar Rana', 'disrespect to teachers', 'Hari Sanjel', 'Whole class', 1, '2017-07-12'),
(6, 'Dilear Khan', 'Class disturb', 'Hari Sanjel', 'Sanchit Maharjan', 1, '2017-07-13'),
(7, 'Tejash Agrawal', 'bullying to juniors', 'Hari Sanjel', 'Samar Rana', 1, '2017-07-14'),
(8, 'Dejin', 'bullying', 'Hari Sanjel', 'Samar', 0, '2017-08-05'),
(9, 'Aaryan Raghubanshi', 'bullying', 'Hari Sanjel', 'samar rana', 1, '2017-08-31'),
(10, 'Aaryan Raghubanshi', 'Thrown paper to friend', 'Hari Sanjel', 'Hari Sir', 1, '2018-01-11'),
(11, 'Aryan Kumar', 'Bullying to juniors', 'Hari Sanjel', 'Naresh Sir', 0, '2018-04-22'),
(12, 'Riza Shrestha', 'Making noise', 'Hari Sanjel', 'Whole class', 1, '2018-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compliment`
--

CREATE TABLE `tbl_compliment` (
  `complimentID` int(11) NOT NULL,
  `stuNAME` varchar(255) NOT NULL,
  `compliment` varchar(255) NOT NULL,
  `complimentedBY` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `complimentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_compliment`
--

INSERT INTO `tbl_compliment` (`complimentID`, `stuNAME`, `compliment`, `complimentedBY`, `status`, `complimentDate`) VALUES
(1, 'Arpan Phuyal', 'Khasai Kehi Hoina!', 'Hari Sanjel', 0, '2017-01-30'),
(2, 'Samar Rana', 'excellent work !!!', 'Hari Sanjel', 0, '0000-00-00'),
(3, 'Dilear Khan', 'For outstanding project work in maths', 'Hari Sanjel', 0, '0000-00-00'),
(4, 'Arpan Phuyal', 'Extra Project Work', 'Hari Sanjel', 0, '0000-00-00'),
(5, 'Arpan Phuyal', 'Hard Work', 'Hari Sanjel', 0, '0000-00-00'),
(6, 'Sanchit Maharjan', 'Extra ordinary Project Work', 'Hari Sanjel', 0, '2017-07-22'),
(7, 'Arpan Phuyal', 'Hardwork', 'Hari Sanjel', 0, '2017-08-05'),
(8, 'Prinsh Thapa', 'Scored highest marks in Maths', 'Hari Sanjel', 0, '2018-01-11'),
(9, 'Samar Rana', 'Haircut', 'Hari Sanjel', 0, '2018-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice`
--

CREATE TABLE `tbl_notice` (
  `notID` int(11) NOT NULL,
  `notDate` date NOT NULL,
  `notSubject` varchar(255) NOT NULL,
  `notice` text NOT NULL,
  `notFrom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notice`
--

INSERT INTO `tbl_notice` (`notID`, `notDate`, `notSubject`, `notice`, `notFrom`) VALUES
(1, '2017-07-10', 'Exam', 'Exam duty out!', 'Principal'),
(2, '2017-07-22', 'HEHE', 'HEHEHE', 'Co-ordinator'),
(3, '2017-07-22', 'School Reopens', 'School reopens hai tomorrow', 'Principal'),
(4, '2017-08-05', 'Training Session', 'There will be training session on Sunday!', 'Principal'),
(5, '2017-08-31', 'PTM', 'PTM wilfkj safds fksdhf ksdhf sdjfks', 'Principal'),
(6, '2018-01-11', 'School Reopens', 'Dear Teachers, \r\n', 'Principal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderID` int(11) NOT NULL,
  `orderedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orderedBy` varchar(50) NOT NULL,
  `item1` varchar(200) NOT NULL DEFAULT '-',
  `item2` varchar(200) NOT NULL DEFAULT '-',
  `item3` varchar(200) NOT NULL DEFAULT '-',
  `item4` varchar(200) NOT NULL DEFAULT '-',
  `item5` varchar(200) NOT NULL DEFAULT '-',
  `forstudent` varchar(20) NOT NULL,
  `forteacher` varchar(20) NOT NULL,
  `stupurpose` varchar(200) NOT NULL DEFAULT '-',
  `teapurpose` varchar(200) NOT NULL DEFAULT '-',
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderID`, `orderedDate`, `orderedBy`, `item1`, `item2`, `item3`, `item4`, `item5`, `forstudent`, `forteacher`, `stupurpose`, `teapurpose`, `status`) VALUES
(20, '2016-03-25 18:15:00', 'Hari Sanjel', 'Math copy - 25 copies', ' Board markers - 1', ' Green Correction Pen - 2', ' Black Pen - 1', ' Scissors - 1', 'student', 'teacher', 'Assignments', 'Daily use', 2),
(21, '2016-03-25 18:15:00', 'Bhushan', 'Exercise copy - 30 copies', ' Permanent markers - 2', ' Green Correction Pen - 3', ' Red Pen - 1', ' Chart papers - 10', 'student', 'teacher', 'SS work', 'classroom decoration and teaching purpose', 2),
(23, '2016-03-25 18:15:00', 'Hari Sanjel', 'long scale - 3', '', '', '', '', '', 'teacher', 'They have lost it.', '', -1),
(24, '2016-03-25 18:15:00', 'Hari Sanjel', 'Pan Balance', '', '', '', '', '', 'teacher', '', 'Teaching equation', -1),
(25, '2016-03-25 18:15:00', 'Hari Sanjel', 'Colour A4 papers - 20', '', '', '', '', 'student', 'teacher', 'decorations', 'classroom decoration', 0),
(37, '2016-04-04 18:15:00', 'Sashendra Dongol', 'Board marker - 4 (different colours)', ' Pen - 2 (black)', '', '', '', '', 'teacher', '', 'Daily work', 2),
(27, '2016-03-26 18:15:00', 'Hari Sanjel', 'scale', ' pencil', ' sketch pad - 100', ' books - 40', '', 'student', 'teacher', 'Assignments', 'Lesson Plan', 0),
(28, '2016-03-26 18:15:00', 'Hari Sanjel', 'book matarai - 100', '', '', '', '', 'student', '', 'Textbook', '', 2),
(29, '2016-03-26 18:15:00', 'Hari Sanjel', 'chart papers matrai - 10', '', '', '', '', '', 'teacher', '', 'decorations', -1),
(38, '2016-04-04 18:15:00', 'Hari Sanjel', 'Scissors - 2', ' Board markers - 2', '', '', '', '', 'teacher', '', 'Daily work', 1),
(32, '2016-03-27 18:15:00', 'Hari Sanjel', 'jaya lai copy - 20 wota', '', '', '', '', 'student', '', 'lekhna', '', 2),
(39, '2016-04-04 18:15:00', 'Hari Sanjel', 'Chart papers - 15', '', '', '', '', '', 'teacher', '', 'teaching materials', 0),
(34, '2016-03-28 18:15:00', 'Hari Sanjel', 'graph papers (100 pcs)', '', '', '', '', 'student', '', 'Exam ', '', 2),
(47, '2016-05-07 15:04:29', 'Hari Sanjel', 'khoi', '', '', '', '', 'student', '', 'thaha chhaina', '', 2),
(42, '2016-04-05 15:21:50', 'Hari Sanjel', 'jaya - 90', '', '', '', '', 'student', 'teacher', 'xcvbnm', 'dfghj', 1),
(45, '2016-05-07 04:21:27', 'Prem Sharma', 'Sticky Tape', ' Marker', ' Pen-2 (red)', ' Exercise books', '', '', 'teacher', '', 'classroom decoration', 2),
(44, '2016-05-07 03:53:13', 'Hari Sanjel', 'Gel Pen', '', '', '', '', '', 'teacher', '', 'Class', 1),
(46, '2016-05-07 11:36:04', 'Hari Sanjel', 'latest', '', '', '', '', '', '', '', '', -1),
(48, '2016-07-12 01:35:02', 'Hari Sanjel', 'Green Pen-2', '', '', '', '', '', 'teacher', '', 'copy correction', 2),
(49, '2016-07-12 08:11:56', 'Hari Sanjel', 'copies - 15', '', '', '', '', 'student', '', 'SS', '', 2),
(50, '2016-07-23 11:03:18', 'Hari Sanjel', 'Green Pen', '', '', '', '', '', 'teacher', '', 'Correction', -1),
(51, '2016-07-23 11:04:08', 'Bhushan', 'Chart papers - 25', '', '', '', '', '', 'teacher', '', 'Decoration', 2),
(52, '2016-08-18 13:14:36', 'Hari Sanjel', 'Correction Pen - 1', '', '', '', '', '', 'teacher', '', 'daily use', 2),
(53, '2016-09-08 04:39:35', 'Hari Sanjel', 'Chart papers (Black) - 5', '', '', '', '', '', 'teacher', '', 'classroom decoration', 1),
(54, '2016-09-08 04:57:42', 'Hari Sanjel', 'Copies (Maths) - 50 copies', '', '', '', '', 'student', '', 'Daily work', '', 2),
(55, '2016-10-31 02:32:50', 'Hari Sanjel', 'Exercise copies (math)- 100 copies', ' Board marker - 2', ' Pencils - 10', '', '', 'student', 'teacher', 'daily work', 'decoration', 2),
(56, '2016-11-08 08:25:29', 'Mahesh Kumar Giri', 'Chart paper(different colour) - 5', '', '', '', '', 'student', '', 'classroom use', '', 2),
(57, '2016-12-05 15:52:18', 'Hari Sanjel', 'Exercise book(Nepali) - 50 copies', ' Permanent marker - 2', ' Green pen - 2', '', '', 'student', 'teacher', 'cw/hw', 'daily use', 2),
(58, '2016-12-06 06:47:12', 'Prakash Pradhan', 'A4 paper - 1 bundle', '', '', '', '', '', 'teacher', '', 'daily work', 2),
(59, '2016-12-06 07:13:51', 'Prakash Pradhan', 'Colour chart papers - 10', ' pencils - 5', '', '', '', 'student', '', 'Daily work', '', 2),
(60, '2016-12-07 15:04:32', 'Hari Sanjel', 'cello gel pen -2', ' marker - 5', '', '', '', '', 'teacher', '', 'copy correction and daily work', 2),
(61, '2017-02-06 07:21:18', 'Hari Sanjel', 'Board Marker - 2 (different colours)', '', '', '', '', '', 'teacher', '', 'daily need', 2),
(62, '2017-02-28 05:25:33', 'Hari Sanjel', 'board markers (different colours) - 2', '', '', '', '', '', 'teacher', '', 'daily use', 2),
(63, '2017-07-22 03:49:13', 'Hari Sanjel', 'Colour papers - 10', '', '', '', '', '', 'teacher', '', '', 2),
(64, '2017-08-05 06:24:53', 'Hari Sanjel', 'Green pen - 3', '', '', '', '', '', 'teacher', '', 'Correction', 2),
(65, '2017-08-31 06:53:36', 'Hari Sanjel', 'colour papers - 10', '', '', '', '', 'student', '', 'decoration', '', 2),
(66, '2017-12-04 13:01:53', 'Bhushan', 'copy', ' pencils', ' pens', ' marker', ' colour papers', '', 'teacher', '', 'Nothing', 1),
(67, '2018-01-11 06:25:55', 'Hari Sanjel', 'A4 colour paper - 20', ' Green Pen - 2', ' Permanent marker - 2', '', '', '', 'teacher', '', 'CLassroom Decoration', 2),
(68, '2018-01-11 06:35:42', 'Hari Sanjel', 'khai - 4', ' kunni - 3', '', '', '', '', 'teacher', '', '', -1),
(69, '2018-01-11 06:41:55', 'Hari Sanjel', 'khhjj', '', '', '', '', 'student', '', '', '', -1),
(70, '2018-01-11 06:58:19', 'Hari Sanjel', 'copy - 5', ' book - 2', '', '', '', 'student', '', 'Regular work', '', 2),
(71, '2018-04-22 03:46:49', 'Hari Sanjel', 'Pencil - 4', '', '', '', '', '', 'teacher', '', 'Daily work', 0),
(72, '2018-04-22 05:21:30', 'Hari Sanjel', 'CHart papers - 10', ' A4 colour paper - 1', '', '', '', '', 'teacher', '', 'Class decoration', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `stuID` varchar(20) NOT NULL,
  `stuName` varchar(100) NOT NULL,
  `stuGrade` varchar(20) NOT NULL,
  `stuSection` varchar(5) NOT NULL,
  `stuAddress` varchar(100) NOT NULL,
  `stuHouse` varchar(20) NOT NULL,
  `stuFNo` varchar(10) NOT NULL,
  `stuMNo` varchar(10) NOT NULL,
  `stuHomeNo` varchar(10) NOT NULL,
  `stuDOB` varchar(30) NOT NULL,
  `stuBus` varchar(10) NOT NULL,
  `stuGender` varchar(10) NOT NULL,
  `stuECA1` varchar(30) NOT NULL,
  `stuECA2` varchar(30) NOT NULL,
  `stuImage` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`stuID`, `stuName`, `stuGrade`, `stuSection`, `stuAddress`, `stuHouse`, `stuFNo`, `stuMNo`, `stuHomeNo`, `stuDOB`, `stuBus`, `stuGender`, `stuECA1`, `stuECA2`, `stuImage`) VALUES
('RG/001/2012', 'Prerana Mehta', 'Nine', 'A', 'Jorpati', 'Tree', '9851145543', '984109875', '014453109', '2003/12/05', 'VO1', 'Female', 'Music', 'Anchoring', ''),
('RG/002/2012', 'Dilear Khan', 'Nine', 'A', 'Battisputali', 'Sun', '9851123873', '9813454267', '014498765', '2002/01/09', 'VO2', 'Male', 'Cricket', 'Football', ''),
('RG/003/2012', 'Tejash Agrawal', 'Eight', '', '', '', '', '', '', '', '', '', '', '', ''),
('RG/00001/2', 'Aaryan Raghubanshi', 'Nine', '', 'Bhaisepati', 'Rock', '9851109878', '9841235612', '015545432', '2060/12/12', 'BO1', 'Male', 'Football', 'Cricket', '../uploads/IMG_20150703_124054.jpg'),
('RG/005/2012', 'Samar Rana', 'Eight', '', 'Sunakothi CIvil Homes', 'ROCK', '9851098734', '9841345420', '015545342', '2005/12/06', 'B02', 'Male', 'Basketball', 'Maths Club', ''),
('RG/008/2012', 'Sanchit Maharjan', 'Nine', '', 'Gwarko', 'Water', '9851167521', '9801345673', '015543098', '2004/01/19', 'V01', 'Male', 'Football', 'Swimming', ''),
('RG/2020/2321', 'Dejin', 'Eight', 'A', 'Sinamangal', 'Water', '9851009876', '9841356980', '014446543', '2063/09/10', 'A', 'Male', 'Football', 'Music', ''),
('RG/001/2016', 'Shreeyam Lama', 'Nine', 'A', 'hgfd', 'Rock', '3456789875', '3456789875', '3456789875', '2001/10/10', 'BO2', 'Female', 'Drama', 'Art', '../uploads/Hari Sir.jpg'),
('RG/08/2016', 'Prinsh Thapa', 'Nine', 'A', 'Bhaktapur', 'Tree', '9851109878', '9841340989', '01-6634895', '2003 Nov 29', 'VO2', 'Male', 'Cricket', 'Music', '../uploads/daura thapne.jpg'),
('RG/00234/2015', 'Pem Tsering Gurung', 'Nine', 'A', 'Mhepi', 'Tree', '9851106504', '9851148626', '014385460', '21 Sept. 2003', 'VO1', 'Male', 'Football', 'Basketball', '../uploads/Untitled.png'),
('RG/00834/2015', 'Riza Shrestha', 'Seven', 'A', 'Koteshowr', 'Rock', '9851434323', '9841343432', '014454324', '2000/01/22', 'BO4', 'Female', 'Skating', 'Drama', '../uploads/MRP JAYA -1.jpg'),
('RG/0001/2016', 'Aryan Kumar', 'Eight', 'A', 'Lalitpur', 'Rock', '9841545434', '9865676545', '015544343', '2005/12/12', 'BO1', 'Male', 'football', 'volleyball', '../uploads/picture001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `passWord` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userMode` varchar(20) NOT NULL,
  `imageURL` varchar(255) NOT NULL,
  `loginTime` date NOT NULL,
  `code` varchar(255) NOT NULL,
  `isGradeTeacher` int(11) NOT NULL,
  `grade` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `fullName`, `userName`, `passWord`, `email`, `userMode`, `imageURL`, `loginTime`, `code`, `isGradeTeacher`, `grade`) VALUES
(9, 'Rushi Bhaju', 'rushi', 'eb4fcac30a12596187ad6f4aab529ddf', 'rushi@rajarshigurukul.edu.np', 'admin', '../uploads/JAYA DV 1.jpg', '2016-03-22', '', 0, ''),
(14, 'Srijana', 'shri', 'dcb65b9e1bbb389e800c472875a937ac', 'shri@rajarshigurukul.edu.np', 'store', '../uploads/JAYA DV 1.jpg', '2016-03-22', '', 0, ''),
(15, 'Hari Sanjel', 'hari', 'a9bcf1e4d7b95a22e2975c812d938889', 'harisanjel@gmail.com', 'staff', '../uploads/MRP HARI.jpg', '2016-03-26', '', 1, 'Nine'),
(25, 'Bhushan', 'bhushan', 'cf1852c25f0fad4d1c0eb5f71e3fe5cb', 'bhushan@rajarshigurukul.edu.np', 'staff', '../uploads/bhushan.jpg', '2016-04-02', '', 0, 'Eight'),
(31, 'Mahesh Kumar Giri', 'mahesh', '49bb197bec17b7d20b2df6b1f3c3434a', 'mahesh@rajarshigurukul.edu.np', 'staff', '../uploads/MRP HARI.jpg', '2016-11-08', '', 0, 'Seven'),
(52, 'Jenny Shahi', 'jenny', 'ebe6941ee8a10c14dc933ae37a0f43fc', 'jenny@rajarshigurukul.edu.np', 'reception', '../uploads/profile.jpg', '2017-08-13', '', 0, ''),
(53, 'Manisha Sherpa', 'manisha', '247e0a31048554f35902283df30263ab', 'manisha@rajarshigurukul.edu.np', 'admin', '../uploads/Hari Sir ko.jpg', '2018-01-11', 'abc', 0, ''),
(50, 'Dilip Rana', 'dilip', '21232f297a57a5a743894a0e4a801fc3', 'dilip@rajarshigurukul.edu.np', 'principal', '../uploads/MRP HARI - Copy.jpg', '2017-02-22', '', 0, ''),
(51, 'Rashmi Dahal', 'rashmi', '1253208465b1efa876f982d8a9e73eef', 'rashmi@rajarshigurukul.edu.np', 'staff', '../uploads/rashmi.jpg', '2017-02-28', '', 0, 'Six');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_absentees`
--
ALTER TABLE `tbl_absentees`
  ADD PRIMARY KEY (`ab_id`);

--
-- Indexes for table `tbl_complain`
--
ALTER TABLE `tbl_complain`
  ADD PRIMARY KEY (`complainID`);

--
-- Indexes for table `tbl_compliment`
--
ALTER TABLE `tbl_compliment`
  ADD PRIMARY KEY (`complimentID`);

--
-- Indexes for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  ADD PRIMARY KEY (`notID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`stuID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absentees`
--
ALTER TABLE `tbl_absentees`
  MODIFY `ab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `tbl_complain`
--
ALTER TABLE `tbl_complain`
  MODIFY `complainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_compliment`
--
ALTER TABLE `tbl_compliment`
  MODIFY `complimentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  MODIFY `notID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
