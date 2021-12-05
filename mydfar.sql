-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 02:46 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydfar`
--

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_const` varchar(50) NOT NULL,
  `color_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`, `status_const`, `color_code`) VALUES
(1, 'Active', 'ACTIVE', NULL),
(2, 'Deactive', 'DEACTIVE', NULL),
(3, 'Pending', 'PENDING', NULL),
(4, 'Reject', 'REJECT', NULL),
(5, 'yes', 'YES', NULL),
(6, 'no', 'NO', NULL),
(7, 'info', 'INFI', NULL),
(8, 'Admin View', 'STATUS_ADMIN_VIEW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_module`
--

CREATE TABLE `sys_module` (
  `module_id` int(11) UNSIGNED NOT NULL,
  `module` varchar(150) NOT NULL,
  `module_const` varchar(150) NOT NULL,
  `application_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `parent_module_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_module`
--

INSERT INTO `sys_module` (`module_id`, `module`, `module_const`, `application_id`, `parent_module_id`) VALUES
(50, 'User Manager', 'USR_MANAGER', 1, 0),
(51, 'User List Viwe', 'SYS_USER_LIST_VIWE', 1, 50),
(52, 'Add New User', 'SYS_USER_ADD_NEW_PAGE', 1, 50),
(53, 'Edit User', 'SYS_USER_EDIT', 1, 50),
(54, 'User Group', 'SYS_USER_GROUP', 1, 50),
(55, 'User Group Set Permission', 'SYS_USER_GROUP_SET_PERMISSION', 1, 50),
(56, 'User Group Set Permission Save', 'SYS_USER_GROUP_SET_PERMISSION_SAVE', 1, 50),
(57, 'Add New User Group', 'SYS_USER_GROUP_ADD', 1, 50),
(100, 'Subject Area', 'SYS_DATA_ADD', 1, 0),
(101, 'Subject Fishermen', 'SYS_ADD_FISHERMAN', 1, 100),
(102, 'Subject Vessel Owners', 'SYS_ADD_OWNERS', 1, 100),
(103, 'Subject Vessels', 'SYS_ADD_VESSELS', 1, 100),
(104, 'Subject VMS Transponder', 'SYS_ADD_TRANSPONDER', 1, 100),
(105, 'Subject Satellite', 'SYS_ADD_SATELLITE', 1, 100),
(106, 'Subject Distress Log Data', 'SYS_ADD_LOG', 1, 100),
(107, 'Subject Death Data', 'SYS_ADD_DEATH', 1, 100),
(108, 'Subject VMS Transfers', 'SYS_ADD_TRANSFERS', 1, 100),
(109, 'Subject High Sea Departure', 'SYS_ADD_DEPARTURE', 1, 100),
(110, 'Subject Satellite Billing', 'SYS_ADD_SATELLITE_BILL', 1, 100),
(200, 'Reports Manage', 'SYS_REPORTS', 1, 0),
(201, 'Generate Reports', 'SYS_VIEW_REPORTS', 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `sys_user`
--

CREATE TABLE `sys_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `email` varchar(150) DEFAULT NULL,
  `status_id` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user`
--

INSERT INTO `sys_user` (`user_id`, `username`, `password`, `user_group_id`, `email`, `status_id`, `name`) VALUES
(1, 'admin', '34ec78fcc91ffb1e54cd85e4a0924332', 1, 'admin.dfar@gmail.com', 1, 'Admin'),
(2, 'user_DO', 'd4579b2688d675235f402f6b4b43bcbf', 5, 'userdo.klt.dfar@gmail.com', 1, 'User DO'),
(3, 'user_FO', 'eed807024939b808083f0031a56e9872', 6, 'user.fo.dfar@gmail.com', 1, 'User FO'),
(4, 'user_HO', 'b5d9b59113086d3f9f9f108adaaa9ab5', 4, 'user.ho.nbo.dfar@gmail.com', 1, 'User HO'),
(6, 'user_MO', '27c9d5187cd283f8d160ec1ed2b5ac89', 3, 'user.mo.dfar@gmail.com', 1, 'User MO');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_group`
--

CREATE TABLE `sys_user_group` (
  `user_group_id` int(11) UNSIGNED NOT NULL,
  `user_group` varchar(150) NOT NULL,
  `sys_user_group_id` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `company_id` int(4) UNSIGNED NOT NULL DEFAULT 0,
  `const` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user_group`
--

INSERT INTO `sys_user_group` (`user_group_id`, `user_group`, `sys_user_group_id`, `company_id`, `const`) VALUES
(1, 'Admin', 1, 1, NULL),
(3, 'Monitoring Officer', 3, 0, NULL),
(4, 'Harbour Officer', 4, 0, NULL),
(5, 'Dev Officer', 5, 0, NULL),
(6, 'Fisheries Officer', 6, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_group_module`
--

CREATE TABLE `sys_user_group_module` (
  `module_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_group_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user_group_module`
--

INSERT INTO `sys_user_group_module` (`module_id`, `user_group_id`) VALUES
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(50, 2),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(100, 2),
(101, 1),
(101, 5),
(101, 6),
(102, 1),
(102, 3),
(102, 4),
(102, 5),
(103, 1),
(103, 3),
(103, 4),
(103, 5),
(104, 1),
(104, 5),
(105, 1),
(106, 1),
(106, 3),
(107, 1),
(107, 3),
(108, 1),
(108, 5),
(109, 1),
(109, 4),
(110, 1),
(201, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_login_history`
--

CREATE TABLE `sys_user_login_history` (
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `timestamp` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user_login_history`
--

INSERT INTO `sys_user_login_history` (`user_id`, `ip`, `timestamp`) VALUES
(1, '::1', '04/07/2021 11:21:01 PM'),
(1, '::1', '04/07/2021 11:21:01 PM'),
(1, '::1', '04/07/2021 11:21:02 PM'),
(1, '::1', '04/07/2021 11:21:03 PM'),
(1, '::1', '04/07/2021 11:21:17 PM'),
(1, '::1', '04/07/2021 11:21:18 PM'),
(1, '::1', '04/07/2021 11:21:19 PM'),
(1, '::1', '04/07/2021 11:21:20 PM'),
(1, '::1', '04/07/2021 11:21:21 PM'),
(1, '::1', '04/08/2021 4:52:16 AM'),
(1, '::1', '04/08/2021 4:52:41 AM'),
(1, '::1', '04/08/2021 4:53:56 AM'),
(1, '::1', '04/08/2021 4:54:28 AM'),
(1, '::1', '04/08/2021 7:33:51 AM'),
(1, '::1', '04/08/2021 7:33:56 AM'),
(1, '::1', '04/08/2021 7:33:58 AM'),
(1, '::1', '04/08/2021 7:33:59 AM'),
(1, '::1', '04/08/2021 7:34:01 AM'),
(1, '::1', '04/08/2021 7:34:02 AM'),
(1, '::1', '04/08/2021 7:34:06 AM'),
(1, '::1', '04/08/2021 7:40:49 AM'),
(1, '::1', '04/08/2021 7:40:51 AM'),
(1, '::1', '04/08/2021 7:40:54 AM'),
(1, '::1', '04/08/2021 7:40:55 AM'),
(1, '::1', '04/08/2021 7:40:57 AM'),
(1, '::1', '04/08/2021 7:40:58 AM'),
(1, '::1', '04/08/2021 7:40:59 AM'),
(1, '::1', '04/08/2021 7:41:14 AM'),
(1, '::1', '04/08/2021 7:43:45 AM'),
(1, '::1', '04/08/2021 7:46:36 AM'),
(1, '::1', '04/08/2021 7:50:55 AM'),
(1, '::1', '04/08/2021 7:51:03 AM'),
(1, '::1', '04/08/2021 10:41:13 AM'),
(1, '::1', '04/08/2021 10:42:35 AM'),
(1, '::1', '04/08/2021 10:43:19 AM'),
(1, '::1', '04/08/2021 10:49:01 AM'),
(1, '::1', '04/08/2021 10:49:02 AM'),
(1, '::1', '04/08/2021 10:49:03 AM'),
(1, '::1', '04/08/2021 10:57:54 AM'),
(1, '::1', '04/08/2021 10:57:56 AM'),
(1, '::1', '04/08/2021 10:57:57 AM'),
(1, '::1', '04/08/2021 10:58:24 AM'),
(1, '::1', '04/08/2021 10:58:59 AM'),
(1, '::1', '04/08/2021 3:58:31 PM'),
(1, '::1', '04/08/2021 4:57:02 PM'),
(1, '::1', '04/08/2021 4:57:28 PM'),
(1, '::1', '04/08/2021 11:23:37 PM'),
(1, '::1', '04/08/2021 11:44:21 PM'),
(1, '::1', '04/08/2021 11:45:25 PM'),
(1, '::1', '04/08/2021 11:46:31 PM'),
(1, '::1', '04/08/2021 11:47:54 PM'),
(1, '::1', '04/08/2021 11:48:53 PM'),
(1, '::1', '04/08/2021 11:50:33 PM'),
(1, '::1', '04/08/2021 11:51:26 PM'),
(1, '::1', '04/08/2021 11:51:50 PM'),
(1, '::1', '04/08/2021 11:53:01 PM'),
(1, '::1', '04/08/2021 11:53:38 PM'),
(1, '::1', '04/09/2021 5:10:42 AM'),
(1, '::1', '04/09/2021 5:11:23 AM'),
(1, '::1', '04/09/2021 5:11:34 AM'),
(1, '::1', '04/09/2021 5:11:41 AM'),
(1, '::1', '04/09/2021 5:11:46 AM'),
(1, '::1', '04/09/2021 5:11:47 AM'),
(1, '::1', '04/09/2021 5:11:56 AM'),
(1, '::1', '04/09/2021 5:12:04 AM'),
(1, '::1', '04/09/2021 5:12:06 AM'),
(1, '::1', '04/09/2021 5:12:07 AM'),
(1, '::1', '04/09/2021 5:12:32 AM'),
(1, '::1', '04/09/2021 5:12:33 AM'),
(1, '::1', '04/09/2021 5:12:51 AM'),
(1, '::1', '04/09/2021 5:13:59 AM'),
(1, '::1', '04/09/2021 5:15:35 AM'),
(1, '::1', '04/09/2021 5:16:21 AM'),
(1, '::1', '04/09/2021 5:26:46 AM'),
(1, '::1', '04/09/2021 5:41:35 AM'),
(1, '::1', '04/09/2021 1:16:08 PM'),
(1, '::1', '04/09/2021 1:16:34 PM'),
(1, '::1', '04/09/2021 1:18:00 PM'),
(1, '::1', '04/09/2021 1:18:03 PM'),
(1, '::1', '04/09/2021 1:18:05 PM'),
(1, '::1', '04/10/2021 8:12:00 AM'),
(1, '::1', '04/10/2021 8:12:17 AM'),
(1, '::1', '04/10/2021 8:12:35 AM'),
(1, '::1', '04/10/2021 8:12:46 AM'),
(1, '::1', '04/10/2021 9:28:55 AM'),
(1, '::1', '04/10/2021 2:59:11 PM'),
(1, '111.223.145.3', '04/12/2021 12:37:42 AM'),
(1, '111.223.145.3', '04/12/2021 12:37:42 AM'),
(1, '111.223.145.3', '04/12/2021 12:37:42 AM'),
(1, '212.104.237.4', '04/12/2021 5:40:59 AM'),
(1, '212.104.237.4', '04/12/2021 5:40:59 AM'),
(1, '212.104.237.4', '04/12/2021 5:40:59 AM'),
(1, '212.104.237.4', '04/12/2021 9:05:59 PM'),
(1, '212.104.237.4', '04/12/2021 9:05:59 PM'),
(1, '212.104.237.4', '04/12/2021 9:06:00 PM'),
(1, '::1', '04/12/2021 9:24:11 PM'),
(1, '::1', '04/12/2021 9:25:43 PM'),
(1, '::1', '04/12/2021 9:40:02 PM'),
(1, '::1', '04/12/2021 9:40:03 PM'),
(1, '::1', '04/12/2021 9:40:04 PM'),
(1, '::1', '04/12/2021 9:41:01 PM'),
(1, '::1', '04/13/2021 6:20:57 AM'),
(1, '::1', '04/13/2021 10:28:43 AM'),
(1, '::1', '04/13/2021 11:55:48 AM'),
(1, '::1', '04/13/2021 11:55:49 AM'),
(1, '::1', '04/13/2021 11:55:50 AM'),
(1, '::1', '04/13/2021 7:07:12 PM'),
(1, '::1', '04/13/2021 7:19:08 PM'),
(1, '::1', '04/13/2021 7:23:32 PM'),
(1, '::1', '04/13/2021 11:38:46 PM'),
(1, '::1', '04/14/2021 2:14:15 PM'),
(1, '::1', '04/16/2021 7:54:54 PM'),
(1, '212.104.237.234', '04/16/2021 9:09:51 PM'),
(1, '212.104.237.234', '04/16/2021 9:09:52 PM'),
(1, '127.0.0.1', '04/16/2021 9:52:16 PM'),
(1, '61.245.171.112', '04/16/2021 10:07:45 PM'),
(1, '::1', '04/16/2021 10:25:20 PM'),
(1, '127.0.0.1', '04/17/2021 10:42:38 AM'),
(1, '127.0.0.1', '04/17/2021 10:42:43 AM'),
(1, '127.0.0.1', '04/17/2021 1:58:45 PM'),
(1, '127.0.0.1', '04/17/2021 2:02:12 PM'),
(1, '127.0.0.1', '04/17/2021 2:02:13 PM'),
(1, '127.0.0.1', '04/17/2021 2:02:16 PM'),
(1, '127.0.0.1', '04/17/2021 2:06:53 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:11 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:13 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:14 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:16 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:17 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:18 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:19 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:20 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:21 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:24 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:25 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:26 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:27 PM'),
(1, '127.0.0.1', '04/17/2021 2:10:29 PM'),
(1, '::1', '04/18/2021 10:06:59 PM'),
(1, '::1', '04/18/2021 10:07:19 PM'),
(1, '127.0.0.1', '04/19/2021 10:02:27 AM'),
(1, '::1', '04/19/2021 7:00:46 PM'),
(1, '::1', '04/19/2021 7:00:47 PM'),
(1, '::1', '04/19/2021 7:00:48 PM'),
(1, '::1', '04/19/2021 7:00:48 PM'),
(1, '::1', '04/19/2021 7:00:49 PM'),
(1, '::1', '04/20/2021 10:12:41 PM'),
(1, '::1', '04/22/2021 11:10:54 AM'),
(1, '::1', '04/22/2021 11:10:57 AM'),
(1, '::1', '04/22/2021 11:24:59 AM'),
(1, '::1', '04/22/2021 11:25:01 AM'),
(1, '::1', '04/22/2021 11:25:04 AM'),
(1, '::1', '04/22/2021 11:25:05 AM'),
(1, '::1', '04/22/2021 11:25:07 AM'),
(1, '::1', '04/24/2021 6:17:38 PM'),
(1, '::1', '04/24/2021 6:17:42 PM'),
(1, '::1', '04/25/2021 10:19:02 AM'),
(1, '::1', '04/25/2021 6:19:33 PM'),
(1, '::1', '05/03/2021 1:32:48 AM'),
(1, '::1', '05/04/2021 3:48:49 PM'),
(1, '::1', '05/04/2021 8:22:13 PM'),
(1, '::1', '05/04/2021 8:22:14 PM'),
(1, '::1', '05/04/2021 8:22:15 PM'),
(1, '::1', '05/05/2021 6:44:50 PM'),
(1, '::1', '05/05/2021 9:13:38 PM'),
(1, '::1', '05/05/2021 9:13:38 PM'),
(1, '::1', '05/05/2021 9:13:39 PM'),
(1, '::1', '05/05/2021 9:13:41 PM'),
(1, '::1', '05/05/2021 9:13:41 PM'),
(1, '::1', '05/05/2021 9:46:35 PM'),
(1, '212.104.237.153', '05/05/2021 9:47:10 PM'),
(1, '::1', '05/06/2021 9:28:50 PM'),
(1, '::1', '05/07/2021 12:06:22 AM'),
(1, '::1', '05/07/2021 12:46:56 AM'),
(1, '::1', '05/07/2021 12:13:07 PM'),
(1, '::1', '05/07/2021 1:15:52 PM'),
(1, '182.161.4.130', '05/07/2021 1:19:28 PM'),
(1, '182.161.4.130', '05/07/2021 1:19:28 PM'),
(1, '182.161.4.130', '05/07/2021 1:19:28 PM'),
(1, '::1', '05/07/2021 5:33:32 PM'),
(1, '::1', '05/07/2021 9:57:42 PM'),
(1, '::1', '05/07/2021 11:16:10 PM'),
(1, '::1', '05/07/2021 11:24:59 PM'),
(1, '::1', '05/07/2021 11:25:01 PM'),
(1, '111.223.159.76', '05/08/2021 12:57:28 AM'),
(1, '::1', '05/08/2021 11:57:50 AM'),
(1, '::1', '05/08/2021 10:18:39 PM'),
(1, '::1', '05/09/2021 10:40:04 AM'),
(1, '::1', '05/09/2021 2:19:09 PM'),
(1, '::1', '05/09/2021 8:33:06 PM'),
(1, '111.223.164.246', '05/09/2021 9:09:26 PM'),
(1, '111.223.164.246', '05/09/2021 9:39:46 PM'),
(1, '175.157.90.157', '05/09/2021 10:03:22 PM'),
(1, '112.134.143.133', '05/10/2021 10:55:53 PM'),
(1, '::1', '05/11/2021 3:12:58 PM'),
(1, '::1', '05/11/2021 3:13:00 PM'),
(1, '::1', '05/11/2021 3:13:43 PM'),
(1, '::1', '05/11/2021 3:14:59 PM'),
(1, '::1', '05/11/2021 3:19:17 PM'),
(1, '::1', '05/11/2021 6:05:00 PM'),
(1, '::1', '05/11/2021 6:19:05 PM'),
(1, '::1', '05/12/2021 9:38:22 PM'),
(1, '182.161.27.14', '05/13/2021 3:06:04 AM'),
(1, '::1', '05/13/2021 3:12:31 AM'),
(1, '112.134.101.54', '05/13/2021 4:41:24 AM'),
(1, '175.157.45.203', '05/13/2021 5:29:40 PM'),
(1, '::1', '05/13/2021 6:26:25 PM'),
(1, '::1', '05/13/2021 8:12:53 PM'),
(1, '123.231.108.190', '05/14/2021 2:30:59 AM'),
(1, '175.157.88.20', '05/14/2021 2:40:20 AM'),
(1, '175.157.88.20', '05/14/2021 2:40:20 AM'),
(1, '175.157.88.20', '05/14/2021 2:40:20 AM'),
(1, '175.157.88.20', '05/14/2021 2:41:46 AM'),
(1, '175.157.88.20', '05/14/2021 2:41:47 AM'),
(1, '175.157.88.20', '05/14/2021 2:41:47 AM'),
(1, '182.161.7.249', '05/14/2021 2:48:57 AM'),
(1, '::1', '05/14/2021 9:15:52 AM'),
(1, '112.134.227.86', '05/14/2021 9:59:16 AM'),
(1, '112.134.227.86', '05/14/2021 9:59:16 AM'),
(1, '112.134.227.86', '05/14/2021 9:59:16 AM'),
(1, '::1', '05/14/2021 10:11:18 AM'),
(1, '::1', '05/14/2021 10:11:19 AM'),
(1, '::1', '05/14/2021 10:11:20 AM'),
(1, '::1', '05/14/2021 10:36:19 AM'),
(1, '::1', '05/14/2021 10:43:40 AM'),
(1, '112.134.136.74', '05/14/2021 10:52:17 AM'),
(1, '123.231.108.202', '05/14/2021 9:22:36 PM'),
(1, '::1', '05/15/2021 12:29:11 AM'),
(1, '111.223.142.48', '05/15/2021 4:44:13 AM'),
(1, '::1', '05/15/2021 7:44:44 AM'),
(1, '::1', '05/15/2021 12:16:51 PM'),
(1, '::1', '05/15/2021 12:16:54 PM'),
(1, '::1', '05/15/2021 12:37:39 PM'),
(1, '111.223.142.48', '05/15/2021 1:06:27 PM'),
(1, '112.134.140.205', '05/15/2021 2:01:56 PM'),
(1, '61.245.161.23', '05/15/2021 2:38:51 PM'),
(1, '112.134.231.17', '05/15/2021 3:17:26 PM'),
(1, '61.245.161.23', '05/15/2021 5:43:43 PM'),
(1, '112.134.231.17', '05/15/2021 5:49:14 PM'),
(1, '112.134.231.17', '05/15/2021 5:49:14 PM'),
(1, '112.134.231.17', '05/15/2021 5:49:14 PM'),
(1, '112.134.231.17', '05/15/2021 5:49:26 PM'),
(1, '112.134.231.17', '05/15/2021 5:49:27 PM'),
(1, '112.134.231.17', '05/15/2021 5:49:27 PM'),
(1, '111.223.142.48', '05/15/2021 7:40:09 PM'),
(1, '112.134.231.17', '05/15/2021 7:54:19 PM'),
(1, '112.134.231.17', '05/15/2021 7:54:19 PM'),
(1, '112.134.231.17', '05/15/2021 7:54:19 PM'),
(1, '112.134.140.205', '05/15/2021 7:58:12 PM'),
(1, '112.134.140.205', '05/15/2021 7:58:12 PM'),
(1, '112.134.140.205', '05/15/2021 7:58:12 PM'),
(1, '111.223.142.48', '05/15/2021 8:31:04 PM'),
(2, '111.223.142.48', '05/15/2021 8:58:33 PM'),
(3, '111.223.142.48', '05/15/2021 9:01:12 PM'),
(1, '175.157.214.145', '05/15/2021 9:06:01 PM'),
(4, '175.157.214.145', '05/15/2021 9:07:04 PM'),
(1, '61.245.169.34', '05/15/2021 10:09:27 PM'),
(4, '175.157.214.145', '05/15/2021 10:15:20 PM'),
(4, '175.157.214.145', '05/15/2021 10:15:20 PM'),
(4, '175.157.214.145', '05/15/2021 10:15:20 PM'),
(4, '175.157.214.145', '05/15/2021 10:16:27 PM'),
(1, '175.157.214.145', '05/15/2021 10:16:58 PM'),
(1, '::1', '05/16/2021 7:14:49 AM'),
(1, '175.157.43.227', '05/16/2021 7:41:51 AM'),
(1, '175.157.43.227', '05/16/2021 7:41:51 AM'),
(1, '175.157.43.227', '05/16/2021 7:41:51 AM'),
(1, '::1', '05/16/2021 8:52:56 AM'),
(1, '::1', '05/16/2021 8:52:59 AM'),
(1, '::1', '05/16/2021 8:53:00 AM'),
(1, '::1', '05/16/2021 8:56:16 AM'),
(1, '43.250.241.231', '05/16/2021 9:25:10 AM'),
(1, '::1', '05/16/2021 9:29:10 AM'),
(1, '::1', '05/16/2021 9:44:49 AM'),
(1, '::1', '06/02/2021 11:10:50 PM'),
(1, '::1', '06/03/2021 12:35:15 AM'),
(1, '::1', '06/03/2021 12:47:38 AM'),
(1, '::1', '06/03/2021 12:47:38 AM'),
(1, '::1', '06/03/2021 12:47:38 AM'),
(1, '::1', '06/03/2021 12:48:18 AM'),
(1, '::1', '06/03/2021 12:48:18 AM'),
(1, '::1', '06/04/2021 12:14:41 AM'),
(1, '::1', '06/04/2021 11:44:56 PM'),
(1, '::1', '06/05/2021 10:02:22 PM'),
(1, '::1', '06/05/2021 10:02:27 PM'),
(1, '::1', '06/06/2021 7:17:00 PM'),
(1, '::1', '06/06/2021 11:50:33 PM'),
(1, '::1', '06/08/2021 1:41:57 AM'),
(1, '::1', '06/08/2021 1:42:05 AM'),
(1, '::1', '06/08/2021 1:42:07 AM'),
(1, '::1', '06/08/2021 8:03:30 PM'),
(1, '::1', '06/09/2021 12:07:28 AM'),
(1, '::1', '06/10/2021 12:53:04 AM'),
(1, '::1', '06/11/2021 12:56:10 AM'),
(1, '::1', '06/12/2021 12:39:36 AM'),
(1, '::1', '06/12/2021 8:23:50 PM'),
(1, '::1', '06/12/2021 8:50:48 PM'),
(1, '::1', '06/13/2021 12:13:26 AM'),
(1, '::1', '06/13/2021 12:13:29 AM'),
(1, '::1', '06/13/2021 3:40:36 PM'),
(1, '::1', '06/13/2021 3:40:40 PM'),
(1, '::1', '06/13/2021 4:43:43 PM'),
(1, '::1', '06/13/2021 4:43:43 PM'),
(1, '::1', '06/13/2021 4:43:43 PM'),
(1, '::1', '06/15/2021 4:06:59 AM'),
(1, '::1', '06/15/2021 4:07:51 AM'),
(1, '::1', '06/17/2021 4:28:26 AM'),
(1, '::1', '06/17/2021 10:53:19 PM'),
(1, '::1', '06/18/2021 7:25:10 PM'),
(1, '::1', '06/21/2021 9:51:33 PM'),
(1, '::1', '06/21/2021 9:56:01 PM'),
(1, '::1', '06/21/2021 9:56:01 PM'),
(1, '::1', '06/21/2021 9:56:01 PM'),
(1, '::1', '06/23/2021 9:51:57 PM'),
(1, '::1', '06/23/2021 9:51:57 PM'),
(1, '::1', '06/23/2021 9:51:57 PM'),
(1, '::1', '06/25/2021 9:06:26 PM'),
(1, '::1', '06/25/2021 11:51:06 PM'),
(1, '::1', '06/26/2021 1:04:16 AM'),
(1, '::1', '06/26/2021 1:09:04 AM'),
(1, '::1', '06/26/2021 1:09:04 AM'),
(1, '::1', '06/26/2021 1:09:04 AM'),
(1, '::1', '06/26/2021 2:29:00 AM'),
(1, '::1', '06/26/2021 2:29:00 AM'),
(1, '::1', '06/26/2021 2:29:00 AM'),
(1, '::1', '06/26/2021 6:11:29 AM'),
(1, '::1', '06/26/2021 6:22:31 AM'),
(1, '::1', '06/26/2021 6:43:41 AM'),
(1, '::1', '06/26/2021 6:43:41 AM'),
(1, '::1', '06/26/2021 6:43:41 AM'),
(1, '::1', '06/26/2021 6:59:41 AM'),
(1, '::1', '06/26/2021 6:59:41 AM'),
(1, '::1', '06/26/2021 6:59:41 AM'),
(1, '::1', '06/26/2021 7:18:43 AM'),
(1, '::1', '06/26/2021 7:18:43 AM'),
(1, '::1', '06/26/2021 7:18:43 AM'),
(1, '::1', '06/26/2021 3:04:23 PM'),
(1, '::1', '06/26/2021 3:11:23 PM'),
(1, '::1', '06/26/2021 3:21:03 PM'),
(1, '::1', '06/26/2021 3:24:47 PM'),
(1, '::1', '06/26/2021 3:28:35 PM'),
(1, '::1', '06/26/2021 7:10:59 PM'),
(1, '::1', '06/26/2021 8:12:46 PM'),
(1, '::1', '06/26/2021 8:12:46 PM'),
(1, '::1', '06/26/2021 8:12:46 PM'),
(1, '::1', '06/26/2021 10:49:22 PM'),
(1, '::1', '06/27/2021 12:18:55 AM'),
(1, '::1', '06/27/2021 12:18:55 AM'),
(1, '::1', '06/27/2021 1:31:02 PM'),
(1, '::1', '06/27/2021 10:30:33 PM'),
(1, '::1', '06/27/2021 11:43:34 PM'),
(1, '::1', '06/28/2021 12:16:58 AM'),
(1, '::1', '06/28/2021 12:19:16 AM'),
(1, '::1', '06/28/2021 12:19:16 AM'),
(1, '::1', '06/28/2021 12:19:16 AM'),
(1, '::1', '06/28/2021 2:20:08 PM'),
(1, '::1', '06/28/2021 4:58:14 PM'),
(1, '::1', '06/28/2021 5:28:31 PM'),
(1, '::1', '06/28/2021 7:26:49 PM'),
(1, '::1', '06/28/2021 7:34:39 PM'),
(1, '::1', '07/01/2021 6:35:05 PM'),
(1, '::1', '07/01/2021 11:31:13 PM'),
(1, '::1', '07/02/2021 2:46:22 AM'),
(1, '::1', '07/02/2021 5:17:17 AM'),
(1, '::1', '07/02/2021 5:29:14 AM'),
(1, '::1', '07/02/2021 12:59:32 PM'),
(1, '::1', '07/02/2021 11:24:42 PM'),
(1, '127.0.0.1', '07/03/2021 12:02:13 AM'),
(1, '::1', '07/03/2021 12:03:50 AM'),
(1, '127.0.0.1', '07/03/2021 1:08:08 AM'),
(1, '::1', '07/03/2021 4:05:13 PM'),
(1, '127.0.0.1', '07/03/2021 4:06:08 PM'),
(1, '::1', '07/03/2021 11:23:11 PM'),
(1, '::1', '07/04/2021 4:44:30 AM'),
(1, '::1', '07/04/2021 11:43:20 AM'),
(1, '127.0.0.1', '07/04/2021 1:29:18 PM'),
(1, '::1', '07/04/2021 1:38:56 PM'),
(1, '127.0.0.1', '07/04/2021 1:39:06 PM'),
(1, '::1', '07/04/2021 6:02:33 PM'),
(1, '127.0.0.1', '07/04/2021 9:41:42 PM'),
(1, '::1', '07/05/2021 11:47:19 AM'),
(1, '::1', '07/05/2021 11:48:28 AM'),
(1, '127.0.0.1', '07/05/2021 11:48:46 AM'),
(1, '::1', '07/05/2021 6:09:58 PM'),
(1, '::1', '07/05/2021 9:55:09 PM'),
(1, '::1', '07/06/2021 1:20:14 PM'),
(1, '::1', '07/06/2021 4:33:09 PM'),
(1, '::1', '07/06/2021 6:24:29 PM'),
(1, '::1', '07/06/2021 6:24:40 PM'),
(1, '::1', '07/06/2021 10:33:22 PM'),
(1, '::1', '07/13/2021 7:16:19 PM'),
(1, '::1', '07/13/2021 9:02:26 PM'),
(1, '::1', '07/14/2021 1:46:13 AM'),
(1, '::1', '07/14/2021 2:04:23 AM'),
(1, '::1', '07/14/2021 2:18:13 PM'),
(1, '::1', '07/15/2021 7:07:08 PM'),
(1, '::1', '07/16/2021 12:14:16 PM'),
(1, '::1', '07/17/2021 10:56:26 PM'),
(1, '::1', '08/27/2021 11:38:14 PM'),
(1, '::1', '08/28/2021 4:32:04 PM'),
(1, '::1', '08/28/2021 4:54:42 PM'),
(1, '::1', '08/28/2021 7:39:25 PM'),
(1, '::1', '08/28/2021 11:57:37 PM'),
(1, '::1', '08/29/2021 11:36:56 PM'),
(1, '127.0.0.1', '08/30/2021 5:21:05 AM'),
(1, '127.0.0.1', '08/30/2021 5:21:05 AM'),
(1, '127.0.0.1', '08/30/2021 5:21:05 AM'),
(1, '::1', '08/31/2021 2:32:04 AM'),
(1, '::1', '08/31/2021 3:18:56 AM'),
(1, '::1', '08/31/2021 10:50:18 PM'),
(1, '::1', '09/01/2021 1:11:10 AM'),
(1, '::1', '09/01/2021 1:18:58 AM'),
(1, '::1', '09/01/2021 9:30:26 PM'),
(1, '::1', '09/01/2021 11:26:41 PM'),
(1, '::1', '09/01/2021 11:31:10 PM'),
(1, '::1', '09/01/2021 11:31:10 PM'),
(1, '::1', '09/01/2021 11:31:10 PM'),
(1, '::1', '09/02/2021 12:19:48 AM'),
(1, '::1', '09/02/2021 12:25:36 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tblcrew`
--

CREATE TABLE `tblcrew` (
  `fishermenID` int(5) NOT NULL,
  `medicalFileName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbldeath`
--

CREATE TABLE `tbldeath` (
  `id` int(5) NOT NULL,
  `logBookID` int(5) NOT NULL,
  `fishermenID` int(5) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldeath`
--

INSERT INTO `tbldeath` (`id`, `logBookID`, `fishermenID`, `date`) VALUES
(1, 1, 1, '2021-06-03 00:00:00'),
(6, 2, 3, '2021-06-13 00:15:00'),
(7, 3, 18, '2021-06-26 23:41:00'),
(9, 1, 24, '2021-06-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbldeparturedetail`
--

CREATE TABLE `tbldeparturedetail` (
  `id` int(5) NOT NULL,
  `fishermenID` int(5) NOT NULL,
  `departureHeaderID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldeparturedetail`
--

INSERT INTO `tbldeparturedetail` (`id`, `fishermenID`, `departureHeaderID`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 16, 2),
(4, 15, 2),
(5, 18, 2),
(6, 18, 3),
(7, 12, 3),
(8, 8, 3),
(9, 24, 4),
(10, 23, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartureheader`
--

CREATE TABLE `tbldepartureheader` (
  `id` int(5) NOT NULL,
  `activeCode` varchar(250) NOT NULL,
  `vesselID` int(5) NOT NULL,
  `harbour` varchar(20) NOT NULL,
  `departureDate` date NOT NULL,
  `fishingGear` varchar(10) NOT NULL,
  `skipperID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldepartureheader`
--

INSERT INTO `tbldepartureheader` (`id`, `activeCode`, `vesselID`, `harbour`, `departureDate`, `fishingGear`, `skipperID`) VALUES
(1, 'VMS/2021-06-10/1', 1, 'Point Pedro', '2021-06-10', 'Long Line', 1),
(2, 'VMS/2021-06-28/2', 9, 'Oluwil', '2021-06-28', 'Long Line', 17),
(3, 'VMS/2021-09-26/3', 6, 'Codbay', '2021-09-26', 'Ring Net', 14),
(4, 'VMS/2021-09-26/4', 10, 'Walachchena', '2021-09-26', 'Ring Net', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbldependent`
--

CREATE TABLE `tbldependent` (
  `dependentID` int(5) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `Relationship` varchar(10) NOT NULL,
  `contactNo` int(10) NOT NULL,
  `fishermenID` int(5) NOT NULL,
  `row` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldependent`
--

INSERT INTO `tbldependent` (`dependentID`, `Name`, `NIC`, `Relationship`, `contactNo`, `fishermenID`, `row`) VALUES
(1, 'bbb', '423456789v', 'Father', 411, 1, 1),
(2, 'bbb', '123456789v', 'Mother', 411, 1, 2),
(3, 'c', '123456789v', 'Spouse', 0, 2, 1),
(4, 'd', '123456789v', 'Daughter', 0, 2, 2),
(5, 'e', '123456789v', 'aa', 0, 3, 1),
(6, 'f', '123456789v', 'a', 0, 3, 2),
(7, 'g', '123456789v', 'aa', 0, 4, 1),
(8, 'h', '123456789v', 'a', 0, 4, 2),
(9, '', '', '', 0, 5, 1),
(10, '', '', '', 0, 5, 2),
(11, '', '', '', 0, 6, 1),
(12, '', '', '', 0, 6, 2),
(13, '', '', '', 0, 7, 1),
(14, '', '', '', 0, 7, 2),
(15, '', '', '', 0, 8, 1),
(16, '', '', '', 0, 8, 2),
(17, '', '', '', 0, 9, 1),
(18, '', '', '', 0, 9, 2),
(19, '', '', '', 0, 10, 1),
(20, '', '', '', 0, 10, 2),
(21, 'ghgh', '333333333v', 'ghgh', 3333, 11, 1),
(22, 'ghgh', '3333333333', 'ghgh', 3333, 11, 2),
(23, '', '', '', 0, 12, 1),
(24, '', '', '', 0, 12, 2),
(25, '', '', '', 0, 13, 1),
(26, '', '', '', 0, 13, 2),
(27, '', '', '', 0, 14, 1),
(28, '', '', '', 0, 14, 2),
(29, 'aa', '999999999v', 'qqq', 111, 15, 1),
(30, 'qqq', '888888888v', 'qqq', 111, 15, 2),
(31, 'fsdfs', '423424', 'fdsfsfs', 42423432, 16, 1),
(32, 'fsfsf', '24242', 'fsdfs', 0, 16, 2),
(33, 'dsadasd', '777777777v', 'hgh', 2147483647, 17, 1),
(34, 'qqq', '777777777v', 'qqq', 2147483647, 17, 2),
(35, 'tertret', '777777777v', 'tertert', 2147483647, 18, 1),
(36, 'terterte', '777777777v', 'tertet', 2147483647, 18, 2),
(37, 'opop', '555555555v', 'opop', 2147483647, 19, 1),
(38, 'opop', '555555555v', 'opop', 2147483647, 19, 2),
(40, 'S M D Silva', '212102020V', 'Father', 712002120, 21, 1),
(41, 'D L L Peiris', '212102020V', 'Spouse', 712002120, 21, 2),
(42, 'zzzzzzz', '555555555555', 'Father', 2147483647, 22, 1),
(43, 'zzzzzzzzzz', '555555555555', 'Mother', 5555555, 22, 2),
(44, 'kkk', '888888888888', 'Father', 888888888, 23, 1),
(45, 'kkk', '888888888888', 'Mother', 888888888, 23, 2),
(46, 'asa', '114452211111', 'Father', 754412874, 24, 1),
(47, 'desdasd', '784574411255', 'Spouse', 789455114, 24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbldistrictoffice`
--

CREATE TABLE `tbldistrictoffice` (
  `districtOfficeID` int(5) NOT NULL,
  `district` varchar(5) NOT NULL,
  `description` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldistrictoffice`
--

INSERT INTO `tbldistrictoffice` (`districtOfficeID`, `district`, `description`) VALUES
(1, 'CBO', 'Colombo'),
(2, 'KLT', 'Kalutara'),
(3, 'GLE', 'Galle'),
(4, 'MTR', 'Matara'),
(5, 'TLE', 'Tangalle'),
(6, 'NBO', 'Negombo'),
(7, 'CHW', 'Chillaw'),
(8, 'TCO', 'Trincomalee'),
(9, 'PTM', 'Puttalam'),
(10, 'KMN', 'Kalmunai'),
(11, 'BCO', 'Batticaloa'),
(12, 'MLT', 'Mulativ'),
(13, 'MNN', 'Mannar'),
(14, 'KLN', 'Killinochchi'),
(15, 'JFN', 'Jaffna');

-- --------------------------------------------------------

--
-- Table structure for table `tblfidivision`
--

CREATE TABLE `tblfidivision` (
  `fiDivisionID` int(5) NOT NULL,
  `fiDivision` varchar(30) NOT NULL,
  `districtOfficeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfidivision`
--

INSERT INTO `tblfidivision` (`fiDivisionID`, `fiDivision`, `districtOfficeID`) VALUES
(1, 'Modara', 1),
(2, 'Mattakkuliya', 1),
(3, 'Dehiwala', 1),
(4, 'Rathmalana', 1),
(5, 'Agulana', 1),
(6, 'Moratuwa', 1),
(7, 'Egoda Uyana', 1),
(8, 'Aluthgama', 2),
(9, 'Beruwala North', 2),
(10, 'Beruwala South', 2),
(11, 'Maggona', 2),
(12, 'Payagala', 2),
(13, 'Kalutara South', 2),
(14, 'Kalutara North', 2),
(15, 'Wadduwa', 2),
(16, 'Panadura', 2),
(17, 'Ambalangoda', 3),
(18, 'Hikkaduwa', 3),
(19, 'Galle', 3),
(20, 'Suduwella', 4),
(21, 'Dikwella', 4),
(22, 'Kottagoda', 4),
(23, 'Gandara', 4),
(24, 'Gandara West', 4),
(25, 'Devinuwara', 4),
(26, 'Matara', 4),
(27, 'Mirissa', 4),
(28, 'Weligama', 4),
(29, 'Kapparathota', 4),
(30, 'Nilwella', 4),
(31, 'Unakuruwa', 5),
(32, 'Hambantota', 5),
(33, 'Tangalle', 5),
(34, 'Mawella', 5),
(35, 'Kahamodara', 5),
(36, 'Kalametiyawa', 5),
(37, 'Kudawella', 5),
(38, 'Kirinda', 5),
(39, 'Kalmunai', 10),
(40, 'Saindamarudu', 10),
(41, 'Karthivu', 10),
(42, 'Nindawur', 10),
(43, 'Thirukkovil', 10),
(44, 'Pothuvil', 10),
(45, 'Panama', 10),
(46, 'Lagoon', 10),
(47, 'Wakarayi-North', 11),
(48, 'Wakarayi-South', 11),
(49, 'Valachchenai-West', 11),
(50, 'Valachchenai-Mid', 11),
(51, 'Valachchenai - East', 11),
(52, 'Manmunaei-North1', 11),
(53, 'Manmunaei-North2', 11),
(54, 'Kuchchaveli-North', 8),
(55, 'Kuchchaveli-South', 8),
(56, 'Trincomalee-North2', 8),
(57, 'Trincomalee-Town1', 8),
(58, 'Trincomalee-Town2', 8),
(59, 'Trincomalee-West', 8),
(60, 'Kinniya', 8),
(61, 'Muthur', 8),
(62, 'Cod-Bay', 8),
(63, 'Nachchikkuda', 14),
(64, 'Poonagar', 14),
(65, 'Karachchi', 14),
(66, 'Kandawali', 14),
(67, 'Palei', 14),
(68, 'Mulathivu Town', 12),
(69, 'Mulathivu North', 12),
(70, 'Nayaru', 12),
(71, 'Kokkai', 12),
(72, 'Kayts', 15),
(73, 'Delft', 15),
(74, 'Jaffna West', 15),
(75, 'Jaffna East', 15),
(76, 'Chawakachcheri', 15),
(77, 'P.Pedro East', 15),
(78, 'P.Pedro West', 15),
(79, 'Mannar Town', 13),
(80, 'Pesaleyi', 13),
(81, 'Erukkalampiddi', 13),
(82, 'Nanaththan', 13),
(83, 'Silawathura', 13),
(84, 'Widathlathiwu', 13),
(85, 'Kalpitiya Island', 9),
(86, 'Kandakuliya', 9),
(87, 'Kalpitiya (Land)', 9),
(88, 'Palakuda', 9),
(89, 'Mangalaeliya', 9),
(90, 'Puttalam', 9),
(91, 'Chilaw Town', 7),
(92, 'Wennappuwa North', 7),
(93, 'Wennappuwa South', 7),
(94, 'Mahaweva South', 7),
(95, 'Mahaweva Mid', 7),
(96, 'Mahaweva North', 7),
(97, 'Arachchikattuwa', 7),
(98, 'Mahaweva West', 7),
(99, 'Naththandiya', 7),
(100, 'Dikovita', 6),
(101, 'Pitipana', 6),
(102, 'Uswetakeyyawa', 6),
(103, 'Kepungoda', 6),
(104, 'Waththala', 6),
(105, 'Duwa', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tblfishermen`
--

CREATE TABLE `tblfishermen` (
  `id` int(5) NOT NULL,
  `nameWithInitials` varchar(50) NOT NULL,
  `nameInFull` varchar(100) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `fisheriesIDNo` varchar(15) NOT NULL,
  `contactNo` int(10) NOT NULL,
  `addressHouse` varchar(30) NOT NULL,
  `addressStreetName` varchar(50) NOT NULL,
  `addressCity` varchar(50) NOT NULL,
  `userID` int(5) NOT NULL,
  `districtOffice` varchar(20) NOT NULL,
  `occupation` varchar(20) DEFAULT NULL,
  `natureOfOccupation` varchar(20) NOT NULL,
  `medicalFile` varchar(255) DEFAULT NULL,
  `cinecFile` varchar(255) DEFAULT NULL,
  `registrationDate` date NOT NULL,
  `is_active` varchar(5) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfishermen`
--

INSERT INTO `tblfishermen` (`id`, `nameWithInitials`, `nameInFull`, `nic`, `fisheriesIDNo`, `contactNo`, `addressHouse`, `addressStreetName`, `addressCity`, `userID`, `districtOffice`, `occupation`, `natureOfOccupation`, `medicalFile`, `cinecFile`, `registrationDate`, `is_active`) VALUES
(1, 'R M HANUS', 'RAHIM MOHOMAD HANUS', '423456789V', 'FI/TLE/1', 777911520, '27/2', 'CHURCH ROAD KATUGODA', 'GALLE', 0, 'TLE', 'Skipper', 'Part Time', '1622838207document.docx', '1622838207doc.docx', '2021-06-01', '1'),
(2, 'H T KUMARA', 'HATHURUSINGHAGE THILAK KUMARA', '123456789V', 'FI/CBO/2', 779695149, '\'PIYA NIVASA\'\'', 'THENNAKOON WATTA', 'GANDARA', 0, 'CBO', 'Crew Member', 'Full Time', '1622838207document.docx', '1622838207doc.docx', '2021-06-03', '1'),
(3, 'B T T KUMARA', 'BANDARAGE THENUKA THANUJA KUMARA', '123456789v', 'FI/CHW/3', 771199952, '57/1/1C', 'KOTASI SHEDARA ROAD', 'MIRISSA', 0, 'CHW', 'Crew Member', 'Full Time', '1622838207document.docx', '1622838207doc.docx', '2021-06-03', '1'),
(4, 'D P K UDUKUBURA', 'DON PRASAD KUMARA UDUKUBURA', '123456789V', 'FI/MTR/4', 773229650, '572/2', 'COLOMBO ROAD', 'GINTHOTA', 0, 'MTR', 'Skipper', 'Full Time', '1622838207document.docx', '1622838207doc.docx', '2021-06-06', '1'),
(5, 'S P K FERNANDO', 'SAMAN PUSHPA KUMARA FERNANDO', '555555555V', 'FI/CHW/5', 777866813, '\"KRISHANI NIWASA\"', 'DUMMALADENIYA SOUTH', 'WENNAPPUWA', 0, 'CHW', 'Crew Member', 'Full Time', '1622838207document.docx', '1622838207doc.docx', '2021-06-08', '1'),
(6, 'D D SILVA', 'DON DAYANANDA SILVA', '616161616V', 'FI/KLT/6', 718787880, '9/1', 'THALHENA', 'BERUWALA', 0, 'KLT', 'Crew Member', 'Full Time', '1622838207document.docx', '1622838207doc.docx', '2021-06-10', '1'),
(7, 'D C PERERA', 'DON CHAMINDAPERERA', '717171717V', 'FI/PTM/7', 773037968, '\"CHAMINDA NIWASA\"', 'KANDAKULIYA', 'KALPITIYA', 0, 'PTM', 'Crew Member', 'Full Time', '1622838207document.docx', '1622838207doc.docx', '2021-06-15', '1'),
(8, 'K V M FERNANDO', 'KANDAPITIYAGE VIMUKTHI MADUSHAN FERNANDO', '818181818V', 'FI/NBO/8', 777949843, '50', 'CUSTOM HOUSE ROAD', 'NEGOMBO', 0, 'NBO', 'Crew Member', 'Full Time', '1622838207document.docx', '1622838207doc.docx', '2021-06-23', '1'),
(9, 'Y JEYKANDAN', 'YADEV JEYKANDAN', '919191919V', 'FI/KMN/9', 773249094, '66', 'PRINCES GATE', 'COLOMBO 12', 0, 'KMN', 'Crew Member', 'Full Time', '1622838207document.docx', '1622838207doc.docx', '2021-06-25', '1'),
(10, 'A I DE SILVA', 'ANUSHA ISHAN DE SILVA', '101101101V', 'FI/KLT/10', 776831413, '41/113', 'WAWA ROAD KATUKURUNDA', 'KALUTARA', 0, 'KLT', 'Crew Member', 'Full Time', '1622838207document.docx', '1622838207doc.docx', '2021-06-30', '1'),
(11, 'G K KUMARA', 'GIHAN KINGSLY KUMARA', '333333333v', 'FI/GLE/11', 772373753, '131', 'MAHAWELLA ROAD PATHTHINIWATTA', 'GONAPINUWALA', 0, 'GLE', 'Skipper', 'Part Time', '1622838207document.docx', '1622838207doc.docx', '2021-06-30', '1'),
(12, 'P R KUMARA', 'PRADEEP RUWAN KUMARA', '121121121V', 'FI/MTR/12', 773750909, '\'NISALI\'\'', 'NILWELLA', 'DIKWELLA', 0, 'MTR', 'Crew Member', 'Full Time', '1622838207document.docx', '1622838207doc.docx', '2021-06-30', '1'),
(13, 'T N RANATHILAKE', 'THARINDU NILANTHA RANATHILAKE', '131131131V', 'FI/KLT/13', 774111370, '\'KUMUDU\'\'', 'SEENIGAMA', 'HIKKADUWA', 0, 'KLT', 'Crew Member', 'Full Time', '1622838207document.docx', '1622838207doc.docx', '2021-07-01', '1'),
(14, 'D N LUXMAN', 'DON NIMAL LUXMAN', '141141141V', 'FI/NBO/14', 724520890, '15/3A', 'DIKKOVITA HANDALA', 'WATTALA', 0, 'NBO', 'Skipper', 'Full Time', '1622838207document.docx', '1622838207doc.docx', '2021-07-01', '1'),
(15, 'N D DE SILVA', 'NADUN DEWUSIRI DE SILVA', '151151151V', 'FI/GLE/15', 779837656, '21', 'PEIRIS WEDA MAWATHA KARALAWADUMULLA', 'AMBALANGODA', 0, 'GLE', 'Crew Member', 'Full Time', '16246562091658MTR.pdf', '16246562091658MTR.pdf', '2021-07-02', '1'),
(16, 'S P PERERA', 'SUJITH PRASAD PERERA', '161161161V', 'FI/KLT/16', 716663483, '76', 'JAYASIRI STATE II HENA ROAD', 'BERUWALA', 0, 'KLT', 'Crew Member', 'Full Time', '16247050751658MTR.pdf', '16247050751658MTR.pdf', '2021-07-02', '1'),
(17, 'N S KUMARA', 'NUWAN SAMPATH KUMARA', '171171171V', 'FI/MTR/17', 234242424, '2', 'WEST KUDAWELLA', 'NAKULUGAMUWA', 0, 'MTR', 'Crew Member', 'Full Time', '16247059281658MTR.pdf', '16247059281658MTR.pdf', '2021-07-02', '1'),
(18, 'S C KUMARA', 'SITHUM CHAMINDA KUMARA', '181181181V', 'FI/TCO/18', 708524521, '54', 'GALPOTHTHAWATTA', 'GANDARA', 0, 'TCO', 'Crew Member', 'Full Time', '16247059991658MTR.pdf', '16247059991658MTR.pdf', '2021-07-02', '1'),
(19, 'S K WICKRAMASINGHE', 'SANATH KUMARA WICKRAMASINGHE', '191919191V', 'FI/TCO/19', 774944843, '12', 'SIRIMAPURA', 'TRINCOMALEE', 0, 'TCO', 'Crew Member', 'Full Time', '16248709201658MTR.pdf', '16248709201658MTR.pdf', '2021-07-02', '1'),
(21, 'D P Silva', 'Don Priyankara Silva', '200200200V', 'FI/CHW/21', 712000202, '34/A/1/1', 'Silva Place', 'Mahaweva', 0, 'CHW', 'Crew Member', 'Full Time', '1625413179DFAR  Reports (5).pdf', '1625413179DFAR  Reports (6).pdf', '2021-07-04', '1'),
(22, 'zzzz', 'zzzz', '555555555555', 'FI/TCO/22', 2147483647, '555zzzzz', 'zzzzzzzz', 'zzzzzz', 0, 'BCO', 'Skipper', 'Full Time', '1625466578DFAR  Reports (6).pdf', '1625466578DFAR  Reports (6).pdf', '2021-07-05', '1'),
(23, 'kkk', 'kkk', '888888888888', 'FI/CHW/23', 888888888, 'kkk', 'kkk', 'kkk', 0, 'GLE', 'Crew Member', 'Full Time', '16254729291464MTR.pdf', '16254729291464MTR.pdf', '2021-07-05', '1'),
(24, 'aaas', 'asass aa', '451452364444', 'FI/MTR/24', 112344588, '66', '446', 'asaa', 0, 'MTR', 'Crew Member', 'Full Time', '1632605059SQA.pdf', '1632605059SQA.pdf', '2021-09-26', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblharbour`
--

CREATE TABLE `tblharbour` (
  `id` int(11) NOT NULL,
  `harbour` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblharbour`
--

INSERT INTO `tblharbour` (`id`, `harbour`) VALUES
(1, 'Point Pedro'),
(2, 'Codbay'),
(3, 'Walachchena'),
(4, 'Oluwil');

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoicedetail`
--

CREATE TABLE `tblinvoicedetail` (
  `id` int(5) NOT NULL,
  `satMasterID` int(5) NOT NULL,
  `noOfUnits` int(5) NOT NULL,
  `Amount` decimal(6,2) NOT NULL,
  `invoiceHeaderID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblinvoicedetail`
--

INSERT INTO `tblinvoicedetail` (`id`, `satMasterID`, `noOfUnits`, `Amount`, `invoiceHeaderID`) VALUES
(1, 1, 1, '0.09', 1),
(2, 1, 1, '0.09', 1),
(3, 1, 1, '0.09', 1),
(4, 1, 1, '0.09', 1),
(5, 1, 1, '0.09', 1),
(6, 1, 1, '0.09', 1),
(7, 1, 1, '0.09', 2),
(8, 3, 1, '0.56', 2),
(9, 1, 1, '0.09', 2),
(10, 3, 1, '0.56', 2),
(11, 3, 1, '0.56', 3),
(12, 3, 1, '0.56', 3),
(13, 1, 1, '0.09', 4),
(14, 1, 1, '0.09', 4),
(15, 1, 1, '0.09', 4),
(16, 1, 2, '0.18', 5),
(17, 3, 1, '0.56', 5),
(18, 3, 1, '0.56', 6),
(19, 5, 1, '0.12', 6),
(20, 1, 1, '0.09', 7),
(21, 3, 3, '1.68', 7),
(22, 3, 2, '1.12', 8),
(23, 2, 4, '0.44', 8),
(24, 1, 1, '0.09', 9),
(25, 2, 2, '0.22', 9),
(26, 1, 1, '0.09', 10),
(27, 2, 2, '0.22', 10),
(28, 1, 1, '0.09', 11),
(29, 14, 14, '58.80', 11),
(30, 1, 1, '0.09', 12),
(31, 2, 2, '0.22', 12),
(32, 3, 1, '0.56', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoiceheader`
--

CREATE TABLE `tblinvoiceheader` (
  `id` int(5) NOT NULL,
  `invoiceDate` date NOT NULL,
  `usageMonthStartDate` date NOT NULL,
  `usageMonthEndDate` date NOT NULL,
  `TotalAmtUSD` decimal(6,2) NOT NULL,
  `ExchangeRate` decimal(6,2) NOT NULL,
  `TotalAmtLKR` decimal(6,2) NOT NULL,
  `vesselID` int(5) NOT NULL,
  `ownerID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `invoiceNumber` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblinvoiceheader`
--

INSERT INTO `tblinvoiceheader` (`id`, `invoiceDate`, `usageMonthStartDate`, `usageMonthEndDate`, `TotalAmtUSD`, `ExchangeRate`, `TotalAmtLKR`, `vesselID`, `ownerID`, `userID`, `invoiceNumber`) VALUES
(1, '2021-06-08', '2021-06-08', '2021-06-08', '0.27', '200.00', '54.00', 1, 1, 1, 'INV00001'),
(2, '2021-06-08', '2021-06-08', '2021-06-08', '0.65', '200.00', '130.00', 1, 1, 1, 'INV00002'),
(3, '2021-06-08', '2021-06-08', '2021-06-08', '1.12', '200.00', '224.00', 1, 1, 1, 'INV00003'),
(4, '2021-06-13', '2021-06-13', '2021-06-13', '0.27', '200.00', '54.00', 1, 2, 1, 'INV00004'),
(5, '2021-06-27', '2021-06-27', '2021-06-27', '0.74', '200.00', '148.00', 9, 4, 1, 'INV00005'),
(6, '2021-06-27', '2021-05-01', '2021-05-31', '0.68', '200.00', '136.00', 8, 3, 1, 'INV00006'),
(7, '2021-07-04', '2021-07-04', '2021-07-04', '1.77', '200.00', '354.00', 9, 4, 1, 'INV00007'),
(8, '2021-07-06', '2021-06-01', '2021-06-30', '1.56', '200.00', '312.00', 8, 8, 1, 'INV00008'),
(9, '2021-09-26', '2021-08-01', '2021-08-31', '0.31', '200.00', '62.00', 5, 5, 1, 'INV00009'),
(10, '2021-09-26', '0000-00-00', '0000-00-00', '0.31', '200.00', '62.00', 10, 15, 1, 'INV00010'),
(11, '2021-09-26', '2021-08-01', '2021-08-31', '58.89', '200.00', '9999.99', 1, 1, 1, 'INV00011'),
(12, '2021-07-02', '0000-00-00', '0000-00-00', '0.87', '200.00', '174.00', 1, 1, 1, 'INV00012');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogbook`
--

CREATE TABLE `tbllogbook` (
  `id` int(5) NOT NULL,
  `dateTime` datetime NOT NULL,
  `description` varchar(400) NOT NULL,
  `latitude` decimal(4,2) NOT NULL,
  `longitude` decimal(4,2) NOT NULL,
  `userID` int(5) NOT NULL,
  `vesselID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbllogbook`
--

INSERT INTO `tbllogbook` (`id`, `dateTime`, `description`, `latitude`, `longitude`, `userID`, `vesselID`) VALUES
(1, '2021-06-09 00:00:00', 'Informed to SL Navy. The Navy has taken over the S&R operation', '1.00', '1.00', 0, 1),
(2, '2021-06-13 00:15:00', 'Informed to SL Navy. The Navy has taken over the S&R operation', '1.20', '1.20', 0, 1),
(3, '2021-06-26 23:41:00', 'Informed to the SL Navy. As the Navy was unable to reach the location of the distressed vessel, Informed the other vessels near the distressed vessel for help.', '55.41', '7.14', 0, 7),
(4, '2021-06-26 23:48:00', 'Rescued by IMUL-A-251KLT', '2.00', '56.00', 0, 8),
(5, '2021-06-26 23:56:00', 'Informed to SL Navy. The Navy has taken over the S&R operation', '45.00', '67.00', 0, 6),
(6, '2021-06-26 23:57:00', 'Informed to SL Navy. The Navy has taken over the S&R operation', '89.00', '89.00', 0, 5),
(7, '2021-06-26 23:57:00', 'Informed to SL Navy. The Navy has taken over the S&R operation', '89.00', '89.00', 0, 5),
(8, '2021-06-26 23:57:00', 'Informed to the SL Navy. As the Navy was unable to reach the location of the distressed vessel, Informed the other vessels near the distressed vessel for help.', '89.00', '89.00', 0, 5),
(9, '2021-06-27 00:00:00', 'Rescued by IMUL-A-141CHW', '90.00', '90.00', 0, 8),
(10, '2021-06-27 00:00:00', 'Informed to SL Navy. The Navy has taken over the S&R operation', '90.00', '90.00', 0, 8),
(11, '2021-09-26 16:56:00', 'asdswdfsfddf', '15.45', '50.89', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tblowner`
--

CREATE TABLE `tblowner` (
  `id` int(5) NOT NULL,
  `districtOffice` varchar(100) NOT NULL,
  `ownerName` varchar(100) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `addressHouse` varchar(30) NOT NULL,
  `addressStreetName` varchar(50) NOT NULL,
  `addressCity` varchar(50) NOT NULL,
  `contactNo` int(10) NOT NULL,
  `registrationDate` date NOT NULL,
  `is_active` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblowner`
--

INSERT INTO `tblowner` (`id`, `districtOffice`, `ownerName`, `nic`, `addressHouse`, `addressStreetName`, `addressCity`, `contactNo`, `registrationDate`, `is_active`, `created`) VALUES
(1, 'KLT', 'D L SILVA', '111111111V', '14A', 'MARADANA ROAD MORAGALLA ', 'BERUWALA', 772713964, '2021-05-01', 1, '2021-05-01 02:01:14'),
(2, 'CBO', 'P H A SUMANADEERA', '222222222V', 'SAMARU', 'LUNUKALAPUWA', 'KOTTAGODA', 711635366, '2021-05-03', 1, '2021-05-03 04:22:06'),
(3, 'KLT', 'W S A RODRIGO', '333333333V', '240/P', 'THALWILA WELLA', 'THODUWAWA', 779121179, '2021-05-19', 1, '2021-05-19 02:02:42'),
(4, 'NBO', 'A A N K FERNANDO', '754785265V', '47/B', 'DUWA WATTA BEACH ROAD', 'MARAWILA', 777526865, '2021-06-08', 1, '2021-06-08 05:06:14'),
(5, 'TLE', 'S SARATH', '636363636V', '63/A/1', 'KADUWALA WATTA THIRANAGAMA', 'HIKKADUWA', 773458081, '2021-06-15', 1, '2021-06-15 05:26:38'),
(6, 'TCO', 'G N U KUMARA', '311111111V', '21', 'PELAYOOTHTHU ROAD', 'TRINCOMALEE', 773081297, '2021-06-25', 1, '2021-06-25 19:11:34'),
(7, 'MTR', 'R A J P K PERERA', '123456789V', '301/32', 'FIELD VIEW NALAGAS DENIYA', 'HIKKADUWA', 777519790, '2021-06-27', 1, '2021-06-27 02:40:14'),
(8, 'GLE', 'K KUSUMALATHA PERERA', '123456789V', '49/1', 'WIJEYARAMA ROAD BRAHAMANA WATTA', 'BALAPITIYA', 771636894, '2021-07-01', 1, '2021-07-01 04:13:25'),
(9, 'PTM', 'M M SAMPATH', '123456789V', '68', 'KAPUGAMA GEDARA WATTA KAPUGAMA', 'DEVINUWARA', 722873858, '2021-07-02', 1, '2021-07-02 04:15:15'),
(10, 'CBO', 'P DINESH PRASANNA', '145214521V', '2/C/1', 'PALAGATHURAYA WEST', 'KOCHIKADE', 773220254, '2021-07-02', 1, '2021-07-02 04:47:04'),
(11, 'PTM', 'B D S AJITH APPU', '994754125V', '284', 'PAALAKUDAWA', 'TALAWILA', 77312579, '2021-07-02', 1, '2021-07-02 05:24:28'),
(12, 'BCO', 'H N S DE SILVA', '121212121V', '07', 'FIELD VIEW THALAGAS DENIYA', 'HIKKADUWA', 77329444, '2021-07-03', 1, '2021-07-03 16:14:00'),
(13, 'MNN', 'N Sivadasan ', '778899445V', '47/A/1/1', 'Inner Cota Road', 'Baticaloa', 714141419, '2021-07-13', 1, '2021-07-13 22:44:17'),
(14, 'KLT', 'Fernando', '124514785412', '57ABC ', 'ABC Lane', 'ABC ', 715757575, '2021-09-26', 1, '2021-09-26 02:44:36'),
(15, 'NBO', 'Asanka', '987458425555', 'dada', 'adad', 'adada', 711111111, '2021-09-26', 1, '2021-09-26 16:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblsatellitemaster`
--

CREATE TABLE `tblsatellitemaster` (
  `id` int(5) NOT NULL,
  `dataType` varchar(12) NOT NULL,
  `description` varchar(25) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `unitPrice` decimal(4,2) NOT NULL,
  `is_active` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsatellitemaster`
--

INSERT INTO `tblsatellitemaster` (`id`, `dataType`, `description`, `currency`, `unitPrice`, `is_active`) VALUES
(1, 'S', 'Small Data', 'USD', '0.09', 1),
(2, 'M', 'Medium Data', 'USD', '0.11', 1),
(3, 'POLL-WT', 'Polling With Text_PSDN', 'USD', '0.56', 1),
(4, 'POLL-NT', 'Polling No Text_PSDN', 'USD', '0.31', 1),
(5, 'Flooding', 'Flooding ', 'USD', '0.12', 1),
(14, 'Fidsaas', 'adaada', 'USD', '4.20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblskipper`
--

CREATE TABLE `tblskipper` (
  `fishermenID` int(5) NOT NULL,
  `medicalFileName` varchar(100) NOT NULL,
  `cinecCertFileName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbltransponder`
--

CREATE TABLE `tbltransponder` (
  `id` int(5) NOT NULL,
  `ISN` varchar(25) NOT NULL,
  `antennaNo` int(15) NOT NULL,
  `IMN` int(15) NOT NULL,
  `VMS` int(4) NOT NULL,
  `registrationDate` date NOT NULL,
  `is_active` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltransponder`
--

INSERT INTO `tbltransponder` (`id`, `ISN`, `antennaNo`, `IMN`, `VMS`, `registrationDate`, `is_active`) VALUES
(1, '4TT097635CF9', 15136263, 421800781, 100, '2021-04-01', 0),
(2, '4TT097CD7A1F', 15136189, 421800978, 423, '2021-04-02', 1),
(3, '4TT097280B51', 15136191, 421800976, 377, '2021-04-02', 1),
(4, '4TT0973D8B5E', 15136190, 421800977, 103, '2021-04-04', 1),
(5, '4TT0974A5660', 15136188, 421800979, 104, '2021-04-05', 1),
(6, '4TT097BC9FB4', 15136257, 421800850, 439, '2021-04-02', 1),
(7, '4TT09784927D', 15136179, 421800899, 446, '2021-04-06', 1),
(8, '4TT097999984', 15136271, 421800895, 440, '2021-04-07', 1),
(9, '4TT097D40853', 15136270, 421800894, 448, '2021-04-07', 1),
(10, '4TT0979676D0', 14132022, 421800297, 101, '2021-04-19', 1),
(11, '4TT097719FD9', 14132007, 421800295, 115, '2021-07-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbltranspondertransfer`
--

CREATE TABLE `tbltranspondertransfer` (
  `id` int(5) NOT NULL,
  `transponderID` int(5) NOT NULL,
  `vesselID` int(5) NOT NULL,
  `jobDate` date NOT NULL,
  `jobStatus` varchar(15) NOT NULL DEFAULT '1',
  `userID` int(5) NOT NULL,
  `uninstallDate` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltranspondertransfer`
--

INSERT INTO `tbltranspondertransfer` (`id`, `transponderID`, `vesselID`, `jobDate`, `jobStatus`, `userID`, `uninstallDate`) VALUES
(1, 1, 1, '2021-06-10', '0', 1, '2021-06-13 04:16:25'),
(2, 1, 1, '2021-06-10', '0', 1, '2021-06-13 04:16:27'),
(3, 1, 1, '2021-06-10', '0', 1, '2021-06-27 00:32:14'),
(4, 1, 1, '2021-06-10', '1', 1, NULL),
(5, 1, 1, '2021-06-10', '1', 1, NULL),
(6, 1, 1, '2021-06-10', '1', 1, NULL),
(7, 1, 1, '2021-06-10', '1', 1, NULL),
(8, 1, 1, '2021-06-10', '1', 1, NULL),
(9, 1, 1, '2021-06-10', '1', 1, NULL),
(10, 1, 5, '2021-06-20', '1', 0, NULL),
(11, 1, 1, '2021-06-13', '1', 1, NULL),
(12, 1, 7, '2021-06-13', '1', 0, NULL),
(13, 1, 8, '2021-06-17', '1', 0, NULL),
(14, 1, 9, '2021-06-26', '1', 0, NULL),
(15, 2, 9, '2021-06-26', '0', 1, '2021-06-26 22:52:12'),
(16, 2, 5, '2021-06-27', '1', 1, NULL),
(17, 10, 10, '2021-09-26', '1', 0, NULL),
(18, 4, 11, '2021-11-08', '1', 0, NULL),
(19, 4, 12, '2021-11-08', '1', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userID` int(5) NOT NULL,
  `userName` int(10) NOT NULL,
  `empNo` int(5) NOT NULL,
  `password` int(12) NOT NULL,
  `designation` int(25) NOT NULL,
  `centre` int(30) NOT NULL,
  `userType` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblvessel`
--

CREATE TABLE `tblvessel` (
  `id` int(5) NOT NULL,
  `vesselName` varchar(20) NOT NULL,
  `districtOffice` varchar(20) NOT NULL,
  `vesselNo` varchar(15) NOT NULL,
  `length` float NOT NULL,
  `height` float NOT NULL,
  `material` varchar(6) NOT NULL,
  `year` int(4) NOT NULL,
  `serialNo` varchar(12) NOT NULL,
  `yardID` int(5) NOT NULL,
  `ownerID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `registrationDate` date NOT NULL,
  `transponderID` int(5) DEFAULT NULL,
  `engineCategory` varchar(25) NOT NULL,
  `is_active` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblvessel`
--

INSERT INTO `tblvessel` (`id`, `vesselName`, `districtOffice`, `vesselNo`, `length`, `height`, `material`, `year`, `serialNo`, `yardID`, `ownerID`, `userID`, `registrationDate`, `transponderID`, `engineCategory`, `is_active`) VALUES
(1, 'SHAINI DUWA', 'KLT', 'IMUL-A-01KLT', 35.5, 12, 'Steel', 2019, '221800781', 1, 1, 0, '2021-05-02', 1, 'Mitzubishi', 1),
(2, 'ASHANI DUWA 01', 'CBO', 'IMUL-A-02CBO', 44, 15, 'Fiber', 2019, '221800978', 1, 2, 0, '2021-05-03', 2, 'Yamaha', 1),
(3, 'SAYARAWA 01', 'KLT', 'IMUL-A-03KLT', 42, 12, 'Fiber', 2020, '221800976', 1, 3, 0, '2021-05-19', 3, 'Mitzubishi', 1),
(4, 'AMINDA PUTHA 02', 'NBO', 'IMUL-A-04NBO', 30.5, 15, 'Fiber', 2020, '221800977', 1, 4, 0, '2021-06-08', 4, 'Mitzubishi', 1),
(5, 'MANOJ MALLEE', 'TLE', 'IMUL-A-05TLE', 30.5, 15, 'Fiber', 2019, '221800979', 1, 5, 0, '2021-06-15', 5, 'Mitzubishi', 1),
(6, 'NIMSHA DUWA 03', 'TCO', 'IMUL-A-06TCO', 44, 12.5, 'Fiber', 2020, '221800850', 1, 6, 0, '2021-06-25', 6, 'Mitzubishi', 1),
(7, 'SADEWU PUTHA', 'MTR', 'IMUL-A-07MTR', 35.5, 12, 'Fiber', 2020, '221800899', 1, 7, 0, '2021-06-27', 7, 'Mitzubishi', 1),
(8, 'MADU RANI', 'GLE', 'IMUL-A-08GLE', 33, 17, 'Fiber', 2019, '221800895', 1, 8, 0, '2021-07-01', 8, 'Mitzubishi', 1),
(9, 'Samantha Putha', 'PTM', 'IMUL-A-09PTM', 44, 17, 'Steel', 2020, '221800894', 1, 9, 0, '2021-07-02', 9, 'Yamaha', 1),
(10, 'assss', 'GLE', 'IMUL-A-010GLE', 34, 12, 'Fiber', 2014, 'fffafafaf', 1, 15, 0, '2021-09-26', 10, 'Mitzubishi', 1),
(11, 'Dilini Duwa', 'KLT', 'IMUL-A-011KLT', 60, 17, 'Fiber', 2021, '14255111', 1, 2, 0, '2021-11-08', 4, 'Mitzubishi', 1),
(12, 'Dilini Duwa', 'KLT', 'IMUL-A-012KLT', 60, 17, 'Fiber', 2021, '14255111', 1, 2, 0, '2021-11-08', 4, 'Mitzubishi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblxx`
--

CREATE TABLE `tblxx` (
  `xxID` int(11) NOT NULL,
  `xxName` varchar(100) DEFAULT NULL,
  `xxType` varchar(50) DEFAULT NULL,
  `xxNo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblxx`
--

INSERT INTO `tblxx` (`xxID`, `xxName`, `xxType`, `xxNo`) VALUES
(1, 'xna', 'xt', 'xn'),
(2, 'xna', 'xt', 'xn'),
(3, 'ss', 'Walachchena', 'ss'),
(4, 'zz', 'Walachchena', 'zz'),
(5, 'zz', 'Walachchena', 'zz'),
(6, 'asd', 'Codbay', 'asd'),
(7, 'lkkre', 'Codbay', 'lkkre'),
(8, 'dfg', 'Oluwil', 'dfg');

-- --------------------------------------------------------

--
-- Table structure for table `tblxxdep`
--

CREATE TABLE `tblxxdep` (
  `id` int(5) NOT NULL,
  `xxdep1name` varchar(50) DEFAULT NULL,
  `xxdep1contact` int(10) DEFAULT NULL,
  `xxdep1addhouse` varchar(20) DEFAULT NULL,
  `xxdep1addstreet` varchar(20) DEFAULT NULL,
  `xxdep1addcity` varchar(20) DEFAULT NULL,
  `xxID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblyard`
--

CREATE TABLE `tblyard` (
  `id` int(5) NOT NULL,
  `yardName` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `districtOfficeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblyard`
--

INSERT INTO `tblyard` (`id`, `yardName`, `location`, `districtOfficeID`) VALUES
(1, 'Yard 1', 'Matara', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_count_group`
-- (See below for the actual view)
--
CREATE TABLE `vw_user_count_group` (
`user_group_id` int(11) unsigned
,`user_group` varchar(150)
,`user_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_group_module`
-- (See below for the actual view)
--
CREATE TABLE `vw_user_group_module` (
`module_id` int(11) unsigned
,`module` varchar(150)
,`user_group_id` int(11) unsigned
,`user_group` varchar(150)
,`parent_module_id` int(11) unsigned
);

-- --------------------------------------------------------

--
-- Structure for view `vw_user_count_group`
--
DROP TABLE IF EXISTS `vw_user_count_group`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_count_group`  AS SELECT `sys_user_group`.`user_group_id` AS `user_group_id`, `sys_user_group`.`user_group` AS `user_group`, count(`sys_user`.`user_id`) AS `user_count` FROM (`sys_user_group` left join `sys_user` on(`sys_user`.`user_group_id` = `sys_user_group`.`user_group_id`)) GROUP BY `sys_user_group`.`user_group_id` ORDER BY `sys_user_group`.`user_group` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_user_group_module`
--
DROP TABLE IF EXISTS `vw_user_group_module`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_group_module`  AS SELECT `sys_module`.`module_id` AS `module_id`, `sys_module`.`module` AS `module`, `sys_user_group`.`user_group_id` AS `user_group_id`, `sys_user_group`.`user_group` AS `user_group`, `sys_module`.`parent_module_id` AS `parent_module_id` FROM ((`sys_user_group` join `sys_user_group_module` on(`sys_user_group_module`.`user_group_id` = `sys_user_group`.`user_group_id`)) join `sys_module` on(`sys_module`.`module_id` = `sys_user_group_module`.`module_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sys_module`
--
ALTER TABLE `sys_module`
  ADD PRIMARY KEY (`module_id`) USING BTREE;

--
-- Indexes for table `sys_user`
--
ALTER TABLE `sys_user`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- Indexes for table `sys_user_group`
--
ALTER TABLE `sys_user_group`
  ADD PRIMARY KEY (`user_group_id`) USING BTREE;

--
-- Indexes for table `sys_user_group_module`
--
ALTER TABLE `sys_user_group_module`
  ADD PRIMARY KEY (`module_id`,`user_group_id`) USING BTREE;

--
-- Indexes for table `tblcrew`
--
ALTER TABLE `tblcrew`
  ADD PRIMARY KEY (`fishermenID`);

--
-- Indexes for table `tbldeath`
--
ALTER TABLE `tbldeath`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `(logBookID)Foreign` (`logBookID`),
  ADD KEY `(fishermenID)Foreign` (`fishermenID`);

--
-- Indexes for table `tbldeparturedetail`
--
ALTER TABLE `tbldeparturedetail`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `(fishermenID)Foreign` (`fishermenID`),
  ADD KEY `(departureHeaderID)Foreign` (`departureHeaderID`);

--
-- Indexes for table `tbldepartureheader`
--
ALTER TABLE `tbldepartureheader`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `(VesselID)Foreign` (`vesselID`);

--
-- Indexes for table `tbldependent`
--
ALTER TABLE `tbldependent`
  ADD PRIMARY KEY (`dependentID`),
  ADD KEY `(fishermenID)Foreign` (`fishermenID`);

--
-- Indexes for table `tbldistrictoffice`
--
ALTER TABLE `tbldistrictoffice`
  ADD PRIMARY KEY (`districtOfficeID`) USING BTREE;

--
-- Indexes for table `tblfidivision`
--
ALTER TABLE `tblfidivision`
  ADD PRIMARY KEY (`fiDivisionID`),
  ADD KEY `(districtOfficeID)Foreign` (`districtOfficeID`) USING BTREE;

--
-- Indexes for table `tblfishermen`
--
ALTER TABLE `tblfishermen`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `(userID)Foreign` (`userID`),
  ADD KEY `(districtOfficeID)Foreign` (`districtOffice`);

--
-- Indexes for table `tblharbour`
--
ALTER TABLE `tblharbour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblinvoicedetail`
--
ALTER TABLE `tblinvoicedetail`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `(satMasterID)Foreign` (`satMasterID`),
  ADD KEY `(invoiceHeaderID)Foreign` (`invoiceHeaderID`);

--
-- Indexes for table `tblinvoiceheader`
--
ALTER TABLE `tblinvoiceheader`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `(VesselID)Foreign` (`vesselID`),
  ADD KEY `(OwnerID)Foreign` (`ownerID`),
  ADD KEY `(userID)Foreign` (`userID`);

--
-- Indexes for table `tbllogbook`
--
ALTER TABLE `tbllogbook`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `(userID)Foreign` (`userID`),
  ADD KEY `(VesselID)Foreign` (`vesselID`);

--
-- Indexes for table `tblowner`
--
ALTER TABLE `tblowner`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `(districtOfficeID)Foreign` (`districtOffice`);

--
-- Indexes for table `tblsatellitemaster`
--
ALTER TABLE `tblsatellitemaster`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tblskipper`
--
ALTER TABLE `tblskipper`
  ADD PRIMARY KEY (`fishermenID`);

--
-- Indexes for table `tbltransponder`
--
ALTER TABLE `tbltransponder`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbltranspondertransfer`
--
ALTER TABLE `tbltranspondertransfer`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `(transponderID)Foreign` (`transponderID`),
  ADD KEY `(VesselID)Foreign` (`vesselID`),
  ADD KEY `(userID)Foreign` (`userID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tblvessel`
--
ALTER TABLE `tblvessel`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `(yardID)Foreign` (`yardID`) USING BTREE,
  ADD KEY `(ownerID)Foreign` (`ownerID`) USING BTREE,
  ADD KEY `(userID)Foreign` (`userID`) USING BTREE,
  ADD KEY `(districtOfficeID)Foreign` (`districtOffice`) USING BTREE,
  ADD KEY `(transponderID)Foreign` (`transponderID`);

--
-- Indexes for table `tblxx`
--
ALTER TABLE `tblxx`
  ADD PRIMARY KEY (`xxID`);

--
-- Indexes for table `tblxxdep`
--
ALTER TABLE `tblxxdep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblyard`
--
ALTER TABLE `tblyard`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `(districtOfficeID)Foreign` (`districtOfficeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sys_user`
--
ALTER TABLE `sys_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sys_user_group`
--
ALTER TABLE `sys_user_group`
  MODIFY `user_group_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbldeath`
--
ALTER TABLE `tbldeath`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbldeparturedetail`
--
ALTER TABLE `tbldeparturedetail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbldepartureheader`
--
ALTER TABLE `tbldepartureheader`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbldependent`
--
ALTER TABLE `tbldependent`
  MODIFY `dependentID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbldistrictoffice`
--
ALTER TABLE `tbldistrictoffice`
  MODIFY `districtOfficeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblfidivision`
--
ALTER TABLE `tblfidivision`
  MODIFY `fiDivisionID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tblfishermen`
--
ALTER TABLE `tblfishermen`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblharbour`
--
ALTER TABLE `tblharbour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblinvoicedetail`
--
ALTER TABLE `tblinvoicedetail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblinvoiceheader`
--
ALTER TABLE `tblinvoiceheader`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbllogbook`
--
ALTER TABLE `tbllogbook`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblowner`
--
ALTER TABLE `tblowner`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblsatellitemaster`
--
ALTER TABLE `tblsatellitemaster`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbltransponder`
--
ALTER TABLE `tbltransponder`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbltranspondertransfer`
--
ALTER TABLE `tbltranspondertransfer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblvessel`
--
ALTER TABLE `tblvessel`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblxx`
--
ALTER TABLE `tblxx`
  MODIFY `xxID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblxxdep`
--
ALTER TABLE `tblxxdep`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblyard`
--
ALTER TABLE `tblyard`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
