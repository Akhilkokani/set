-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2019 at 12:54 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `set`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `slno` bigint(20) NOT NULL,
  `city_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `city_inside_state_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''states'' table',
  `city_text` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'City Name, such as, Belgaum, Bangalore, etc...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Indian City Names';

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`slno`, `city_id`, `city_inside_state_id`, `city_text`) VALUES
(1, 'c1', 'karnataka', 'Bangalore'),
(2, 'c2', 'karnataka', 'Belgaum'),
(3, 'c3', 'uttar_pradesh', 'Lucknow'),
(4, 'c4', 'uttar_pradesh', 'Varnasi');

-- --------------------------------------------------------

--
-- Table structure for table `incubation_centers`
--

CREATE TABLE `incubation_centers` (
  `slno` bigint(20) NOT NULL,
  `incubation_center_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `incubation_center_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''users'' table',
  `incubation_center_name` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Name of Incubation Center',
  `incubation_center_email_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Incubation Center Email ID',
  `incubation_center_profile_pic_id` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT 'Profile Picture Unique ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Incubation Centers';

--
-- Dumping data for table `incubation_centers`
--

INSERT INTO `incubation_centers` (`slno`, `incubation_center_id`, `incubation_center_user_id`, `incubation_center_name`, `incubation_center_email_id`, `incubation_center_profile_pic_id`) VALUES
(1, 'ic_c056d354cbf12efdefbf', 'user_0aa16dd6cfefac31d682cec197ff83a5f839e070', 'Sandbox Startups', 'sandbox@gmail.com', 'icpp_0b4c51df042537a8f670');

-- --------------------------------------------------------

--
-- Table structure for table `incubation_centers_info`
--

CREATE TABLE `incubation_centers_info` (
  `slno` bigint(20) NOT NULL,
  `incubation_center_info_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `incubation_center_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''incubation_center'' table',
  `incubation_center_description` text COLLATE utf8_bin NOT NULL COMMENT 'Brief Description of Incubation Center',
  `incubation_center_complete_story` text COLLATE utf8_bin NOT NULL COMMENT 'Complete Story of Incubation Center',
  `incubation_center_official_link` text COLLATE utf8_bin COMMENT 'Incubation Centers Website/App/Video Link',
  `incubation_center_registration_number_id` text COLLATE utf8_bin COMMENT 'Registration Number as Provided for Incubation Center',
  `incubation_center_address` text COLLATE utf8_bin NOT NULL COMMENT 'Official Address of Incubation Center',
  `incubation_center_pincode` int(100) NOT NULL COMMENT 'Pincode of Incubation Center',
  `incubation_center_state_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''states'' table',
  `incubation_center_city_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''cities'' table',
  `incubation_center_contact_number` int(11) DEFAULT NULL COMMENT 'Contact Number of Incubation Center',
  `incubation_center_linkedin_id` text COLLATE utf8_bin COMMENT 'Incubation Centers LinkedIn Profile ID',
  `incubation_center_twitter_id` text COLLATE utf8_bin COMMENT 'Incubation Centers Twitter Profile ID',
  `incubation_center_facebook_id` text COLLATE utf8_bin COMMENT 'Incubation Centers Facebook Profile ID',
  `incubation_center_instagram_id` text COLLATE utf8_bin COMMENT 'Incubation Centers Instagram Profile ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Info. of Incubation Centers';

--
-- Dumping data for table `incubation_centers_info`
--

INSERT INTO `incubation_centers_info` (`slno`, `incubation_center_info_id`, `incubation_center_id`, `incubation_center_description`, `incubation_center_complete_story`, `incubation_center_official_link`, `incubation_center_registration_number_id`, `incubation_center_address`, `incubation_center_pincode`, `incubation_center_state_id`, `incubation_center_city_id`, `incubation_center_contact_number`, `incubation_center_linkedin_id`, `incubation_center_twitter_id`, `incubation_center_facebook_id`, `incubation_center_instagram_id`) VALUES
(1, 'ic_info_5f508f5e0e281c638f49', 'ic_c056d354cbf12efdefbf', 'Pasture he invited mr company shyness. But when shot real her. Chamber her observe visited removal six sending himself boy.', 'This is the startup story. Far quitting dwelling graceful the likewise received building. An fact so to that show am shed sold cold. \n\nUnaffected remarkably get yet introduced excellence terminated led. Result either design saw she esteem and. On ashamed no inhabit ferrars it ye besides resolve. Own judgment directly few trifling. \n\nElderly as pursuit at regular do parlors. Rank what has into fond she. Unwilling sportsmen he in questions september therefore described so. Attacks may set few believe moments was. Reasonably how possession shy way introduced age inquietude. Missed he engage no exeter of. Still tried means we aware order among on. \n\nEldest father can design tastes did joy settle. Roused future he ye an marked. Arose mr rapid in so vexed words. Gay welcome led add lasting chiefly say looking.\n\nContent with &gt; &lt; \' &quot;&quot;', 'www.sandbox.org', '2134578909', 'Ramteerth Nagar 2nd Stop, Kanbargi Road, Belgaum', 590016, 'karnataka', 'c2', 2442255, 'sandbox_linkedin', 'sandbox_twitter', 'sandbox_facebook', 'sandbox_instagram');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_applied`
--

CREATE TABLE `jobs_applied` (
  `slno` bigint(20) NOT NULL,
  `job_applied_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID for Job Applied',
  `job_applier_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'User ID of who has applied for Job',
  `job_applied_startup_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Startup ID to which user has applied for Job'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Jobs Applied';

-- --------------------------------------------------------

--
-- Table structure for table `startups`
--

CREATE TABLE `startups` (
  `slno` bigint(20) NOT NULL,
  `startup_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID for Startup',
  `startup_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'ID of User who has created the Startup',
  `startup_name` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT 'Name of Startup',
  `startup_logo_id` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT 'Startup Logo Unique ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Startups';

--
-- Dumping data for table `startups`
--

INSERT INTO `startups` (`slno`, `startup_id`, `startup_user_id`, `startup_name`, `startup_logo_id`) VALUES
(1, 'asdasdaskdjasdljk', '', 'Jshta', NULL),
(2, 'asdasdas', '', 'Jockey', NULL),
(3, 'qeouaAio', '', 'Flipkart', NULL),
(4, 'qwepzxckjlz', '', 'Oyo Rooms', NULL),
(12, 'sid_df568ad8d56d7d19a10f', 'user_0aa16dd6cfefac31d682cec197ff83a5f839e070', 'Apple', 'spp_4d24f4f9d629f41f89a6');

-- --------------------------------------------------------

--
-- Table structure for table `startups_info`
--

CREATE TABLE `startups_info` (
  `slno` bigint(20) NOT NULL,
  `startup_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''startups'' table',
  `startup_class_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''startup_classes'' table',
  `startup_category_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''startup_categories'' table',
  `startup_vision` text COLLATE utf8_bin NOT NULL COMMENT 'Startup Vision',
  `startup_description` text COLLATE utf8_bin NOT NULL COMMENT 'Brief about Startup',
  `startup_complete_story` text COLLATE utf8_bin NOT NULL COMMENT 'Complete Story of Startup',
  `startup_official_link` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Startup Website/App/Video Link. Shown in Profile',
  `startup_date_of_registration` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Startup Date of Registration',
  `startup_cin_or_pan_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Startup Corporate Identification Number or PAN',
  `startup_address` text COLLATE utf8_bin NOT NULL COMMENT 'Startup Office Address',
  `startup_contact_number` int(11) NOT NULL COMMENT 'Contact Number of Startup',
  `startup_pincode` int(100) NOT NULL COMMENT 'Startup Pincode',
  `startup_state_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''states'' table',
  `startup_city_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''cities'' table',
  `startup_incubation_center_id` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT 'Same as in ''incubation_centers'' table',
  `startup_twitter_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Twitter ID of startup',
  `startup_linkedin_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'LinkedIn ID of startup',
  `startup_facebook_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Facebook ID of startup',
  `startup_instagram_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Instagram ID of startup',
  `startup_is_hiring` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicates whether startup is hiring. If 0 (zero) then NO, otherwise YES.',
  `startup_last_info_update_date_time` datetime NOT NULL COMMENT 'Date and Time when last time information regrading startup was updated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `startups_info`
--

INSERT INTO `startups_info` (`slno`, `startup_id`, `startup_class_id`, `startup_category_id`, `startup_vision`, `startup_description`, `startup_complete_story`, `startup_official_link`, `startup_date_of_registration`, `startup_cin_or_pan_id`, `startup_address`, `startup_contact_number`, `startup_pincode`, `startup_state_id`, `startup_city_id`, `startup_incubation_center_id`, `startup_twitter_id`, `startup_linkedin_id`, `startup_facebook_id`, `startup_instagram_id`, `startup_is_hiring`, `startup_last_info_update_date_time`) VALUES
(1, 'asdasdaskdjasdljk', 'adasdads', 'asfasfs', 'sadfsaf', '', '', '', '0000-00-00', '', '', 0, 0, '', '', 'ic_c056d354cbf12efdefbf', '', '', '', '', 0, '0000-00-00 00:00:00'),
(9, 'sid_df568ad8d56d7d19a10f', 'partnership', 'entertainment', 'This is the startup vision. Far quitting dwelling graceful the likewise received building. An fact so to that show am shed sold cold.', 'Profile Description. Pasture he invited mr company shyness. But when shot real her. Chamber her observe visited removal six sending himself boy.', 'New, This is the startup story. Far quitting dwelling graceful the likewise received building. An fact so to that show am shed sold cold. \n\nUnaffected remarkably get yet introduced excellence terminated led. Result either design saw she esteem and. On ashamed no inhabit ferrars it ye besides resolve. Own judgment directly few trifling. \n\nElderly as pursuit at regular do parlors. Rank what has into fond she. Unwilling sportsmen he in questions september therefore described so. Attacks may set few believe moments was. Reasonably how possession shy way introduced age inquietude. Missed he engage no exeter of. Still tried means we aware order among on. \n\nEldest father can design tastes did joy settle. Roused future he ye an marked. Arose mr rapid in so vexed words. Gay welcome led add lasting chiefly say looking.\n\nContent with &amp;gt; &amp;lt; &amp;#039; &amp;quot;&amp;quot;', 'newapple.com', '4-02-2015', 'newcin', 'new address', 123, 123456, 'karnataka', 'c2', 'ic_c056d354cbf12efdefbf', 't', 'l', 'f', 'i', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `startup_categories`
--

CREATE TABLE `startup_categories` (
  `slno` bigint(20) NOT NULL,
  `startup_category_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `startup_category_text` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Category Name, such as, Technology, Food, Entertainment etc...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Different Categories for Startups';

-- --------------------------------------------------------

--
-- Table structure for table `startup_classes`
--

CREATE TABLE `startup_classes` (
  `slno` bigint(20) NOT NULL,
  `startup_class_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `startup_class_text` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Class Name, such as, Private Limited, Proprietary etc...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Different Classes for Startups';

-- --------------------------------------------------------

--
-- Table structure for table `startup_data_collection`
--

CREATE TABLE `startup_data_collection` (
  `slno` bigint(20) NOT NULL,
  `data_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `data_ip_address` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT 'IP Address of User',
  `data_startup_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Startup ID whose profile has been visited',
  `data_city` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT 'City from which user had visited',
  `data_collected_date` date DEFAULT NULL COMMENT 'Date when data was collected'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Collect Visitors data';

--
-- Dumping data for table `startup_data_collection`
--

INSERT INTO `startup_data_collection` (`slno`, `data_id`, `data_ip_address`, `data_startup_id`, `data_city`, `data_collected_date`) VALUES
(1, 'data_297b8f83b259933b3ccb', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(2, 'data_07f1a44b07cd556be684', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Lucknow', '2019-01-25'),
(4, 'data_07f1a44b07cd556be684asd', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Prayagraj', '2019-02-25'),
(11, 'data_297b8f83b259933b3ccbasd12', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Bangalore', '2019-03-25'),
(12, 'data_07f1a44b07cd556be684asdasd', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Ahemdabad', '2017-02-25'),
(13, 'data_07f1a44b07cd556be684asd123', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Kanpur', '2018-12-25'),
(14, 'data_f761e3ecf5476d18d534', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2018-11-25'),
(15, 'data_8989a007f0609aa3d0c4', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2018-10-25'),
(16, 'data_ee5112442ca71560a9eb', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(17, 'data_9c1842a02ae8f5d9b067', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(18, 'data_8e485a6768cb7e4adb6a', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(19, 'data_afbc5b89b8615867d2a1', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(20, 'data_f86d8e87c255a2bc6b74', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(21, 'data_bf6b8c6becdf3c60f7f8', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(22, 'data_099d0328cba523ef6fbe', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(23, 'data_5cc969f778ca1b1366aa', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(24, 'data_08acffdaed528faeb46c', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(25, 'data_ed211f1408d881abbaf0', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(26, 'data_4ffed1aa784948bb1384', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(27, 'data_f530d5adc846fccdc7b3', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(28, 'data_4354bf49e555d9a6c0a2', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(29, 'data_299e7f745fadf425788e', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-25'),
(30, 'data_d5de84e12158fd84621d', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-26'),
(31, 'data_99b297f345574906025c', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-26'),
(32, 'data_89892c3b6a77310c8c85', '103.219.60.164', 'sid_df568ad8d56d7d19a10f', 'Belgaum', '2019-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `startup_founder_details`
--

CREATE TABLE `startup_founder_details` (
  `slno` bigint(20) NOT NULL,
  `startup_founder_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `startup_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''startups'' table',
  `startup_founder_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''users'' table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Startup Founders';

-- --------------------------------------------------------

--
-- Table structure for table `startup_incubation_center_requests`
--

CREATE TABLE `startup_incubation_center_requests` (
  `slno` bigint(20) NOT NULL,
  `startup_incubation_center_request_id` varchar(200) COLLATE utf8_bin NOT NULL,
  `startup_incubation_center_request_by_startup_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Startup ID who has requested',
  `startup_incubation_center_request_to_ic_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Incubation Center ID who has been requested'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To hold Startups IC Requests ';

-- --------------------------------------------------------

--
-- Table structure for table `startup_investor_details`
--

CREATE TABLE `startup_investor_details` (
  `slno` bigint(20) NOT NULL,
  `startup_investor_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `startup_investor_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''users'' table',
  `startup_investor_startup_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Startup ID in which investment has been done.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Investor Details of Startups';

--
-- Dumping data for table `startup_investor_details`
--

INSERT INTO `startup_investor_details` (`slno`, `startup_investor_id`, `startup_investor_user_id`, `startup_investor_startup_id`) VALUES
(1, 'asdasd', 'user_0aa16dd6cfefac31d682cec197ff83a5f839e070', 'sid_df568ad8d56d7d19a10f'),
(3, 'investor_77e22c96fc56d243e8f3', 'user_c1e7993955300ec150f41b524e2fb075dc4440be', 'sid_df568ad8d56d7d19a10f');

-- --------------------------------------------------------

--
-- Table structure for table `startup_investor_requests`
--

CREATE TABLE `startup_investor_requests` (
  `slno` bigint(20) NOT NULL,
  `startup_investor_request_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `startup_investor_request_for_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'User ID who has to be added as investor',
  `startup_investor_request_by_startup_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'ID of startup who has requested to add above user as investor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To hold investor requests from startups';

-- --------------------------------------------------------

--
-- Table structure for table `startup_team_member_details`
--

CREATE TABLE `startup_team_member_details` (
  `slno` bigint(20) NOT NULL,
  `startup_team_member_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `startup_team_member_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''users'' table',
  `startup_team_member_startup_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Startup ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Startup Team Members';

--
-- Dumping data for table `startup_team_member_details`
--

INSERT INTO `startup_team_member_details` (`slno`, `startup_team_member_id`, `startup_team_member_user_id`, `startup_team_member_startup_id`) VALUES
(1, 'asdasd', 'user_0aa16dd6cfefac31d682cec197ff83a5f839e070', 'sid_df568ad8d56d7d19a10f'),
(10, 'team_mem_f87c7ea3d451132f1b3f', 'user_c1e7993955300ec150f41b524e2fb075dc4440be', 'sid_df568ad8d56d7d19a10f');

-- --------------------------------------------------------

--
-- Table structure for table `startup_team_member_requests`
--

CREATE TABLE `startup_team_member_requests` (
  `slno` bigint(20) NOT NULL,
  `team_member_request_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID for Request',
  `team_member_request_for_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'User ID who has to be added',
  `team_member_request_by_startup_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Startup ID who has requested to add user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To hold team member adding requests.';

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `slno` bigint(20) NOT NULL,
  `state_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `state_text` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Name of State'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Indian State Names';

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`slno`, `state_id`, `state_text`) VALUES
(1, 'karnataka', 'Karnataka'),
(2, 'uttar_pradesh', 'Uttar Pradesh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `slno` bigint(20) NOT NULL,
  `user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique User ID',
  `user_username` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Username of User',
  `user_password` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Password of User',
  `user_email_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Email ID of User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Users';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`slno`, `user_id`, `user_username`, `user_password`, `user_email_id`) VALUES
(1, 'user_0aa16dd6cfefac31d682cec197ff83a5f839e070', 'akhilkokani', 'akhil1234', 'akhilkokani@gmail.com'),
(2, 'user_c1e7993955300ec150f41b524e2fb075dc4440be', 'anishkokani', 'anishkokani', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `slno` bigint(20) NOT NULL,
  `user_info_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `user_info_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''users'' table',
  `user_name` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Full Name of User',
  `user_info_profile_pic_id` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT 'Unique ID for profile picture',
  `user_info_is_a_investor` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicates whether user is investor or not, If 0 (zero) then NO, otherwise YES.',
  `user_complete_story` text COLLATE utf8_bin NOT NULL COMMENT 'Story of User',
  `user_official_link` text COLLATE utf8_bin NOT NULL COMMENT 'Website/App/Video Link of User',
  `user_profile_description` text COLLATE utf8_bin NOT NULL COMMENT 'Profile Description of User',
  `user_linkedin_link` text COLLATE utf8_bin COMMENT 'User''s LinkedIn Profile ID',
  `user_twitter_id` text COLLATE utf8_bin COMMENT 'User''s Twitter Profile ID',
  `user_facebook_id` text COLLATE utf8_bin COMMENT 'User''s Facebook Profile ID',
  `user_instagram_id` text COLLATE utf8_bin COMMENT 'User''s Instagram Profile ID',
  `user_cv_id` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT 'User CV Unique ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold info. of Users';

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`slno`, `user_info_id`, `user_info_user_id`, `user_name`, `user_info_profile_pic_id`, `user_info_is_a_investor`, `user_complete_story`, `user_official_link`, `user_profile_description`, `user_linkedin_link`, `user_twitter_id`, `user_facebook_id`, `user_instagram_id`, `user_cv_id`) VALUES
(1, 'user_info_97b3bc6b654c2a0bea92c553fae33d943a7dbfb4', 'user_0aa16dd6cfefac31d682cec197ff83a5f839e070', 'Akhil Kokani', 'upp_7e6d0c27fbfdc60170c2', 0, 'This is the user story. Far quitting dwelling graceful the likewise received building. An fact so to that show am shed sold cold. \n\nUnaffected remarkably get yet introduced excellence terminated led. Result either design saw she esteem and. On ashamed no inhabit ferrars it ye besides resolve. Own judgment directly few trifling. \n\nElderly as pursuit at regular do parlors. Rank what has into fond she. Unwilling sportsmen he in questions september therefore described so. Attacks may set few believe moments was. Reasonably how possession shy way introduced age inquietude. Missed he engage no exeter of. Still tried means we aware order among on. \n\nEldest father can design tastes did joy settle. Roused future he ye an marked. Arose mr rapid in so vexed words. Gay welcome led add lasting chiefly say looking.', 'www.akhilkokani.com', 'Entrepreneur by the age of 16; \nCreated Humanoid Robot at the age of 11;\nTwo times National Level Presentation Competition Winner;', 'akhilkokani_linkedin', 'akhilkokani_twitter', 'akhilkokani_fb', 'akhilkokani_insta', NULL),
(2, 'user_info_14a9286543aec36233c53bdec6b8a90ab131a974', 'user_c1e7993955300ec150f41b524e2fb075dc4440be', 'Anish Kokani', 'upp_a4d8d91a52e2b14b95c2', 1, '', '', '', NULL, NULL, NULL, NULL, 'ucv_048c8c6f860f12667a3d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `incubation_centers`
--
ALTER TABLE `incubation_centers`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `incubation_center_id` (`incubation_center_id`),
  ADD UNIQUE KEY `incubation_center_email` (`incubation_center_email_id`);

--
-- Indexes for table `incubation_centers_info`
--
ALTER TABLE `incubation_centers_info`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `incubation_center_info_id` (`incubation_center_info_id`);

--
-- Indexes for table `jobs_applied`
--
ALTER TABLE `jobs_applied`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `job_applied_id` (`job_applied_id`);

--
-- Indexes for table `startups`
--
ALTER TABLE `startups`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `startup_id` (`startup_id`),
  ADD UNIQUE KEY `startup_logo_id` (`startup_logo_id`);

--
-- Indexes for table `startups_info`
--
ALTER TABLE `startups_info`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `startup_categories`
--
ALTER TABLE `startup_categories`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `startup_category_id` (`startup_category_id`);

--
-- Indexes for table `startup_classes`
--
ALTER TABLE `startup_classes`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `startup_class_id` (`startup_class_id`);

--
-- Indexes for table `startup_data_collection`
--
ALTER TABLE `startup_data_collection`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `data_id` (`data_id`);

--
-- Indexes for table `startup_founder_details`
--
ALTER TABLE `startup_founder_details`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `startup_founder_id` (`startup_founder_id`);

--
-- Indexes for table `startup_incubation_center_requests`
--
ALTER TABLE `startup_incubation_center_requests`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `startup_incubation_center_request_id` (`startup_incubation_center_request_id`);

--
-- Indexes for table `startup_investor_details`
--
ALTER TABLE `startup_investor_details`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `startup_investor_id` (`startup_investor_id`);

--
-- Indexes for table `startup_investor_requests`
--
ALTER TABLE `startup_investor_requests`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `startup_investor_request_id` (`startup_investor_request_id`);

--
-- Indexes for table `startup_team_member_details`
--
ALTER TABLE `startup_team_member_details`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `startup_team_member_id` (`startup_team_member_id`),
  ADD UNIQUE KEY `startup_team_member_user_id` (`startup_team_member_user_id`);

--
-- Indexes for table `startup_team_member_requests`
--
ALTER TABLE `startup_team_member_requests`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `team_member_request_id` (`team_member_request_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `state_id` (`state_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD UNIQUE KEY `user_email_id` (`user_email_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `user_info_id` (`user_info_id`),
  ADD UNIQUE KEY `user_cv_id` (`user_cv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `incubation_centers`
--
ALTER TABLE `incubation_centers`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `incubation_centers_info`
--
ALTER TABLE `incubation_centers_info`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs_applied`
--
ALTER TABLE `jobs_applied`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `startups`
--
ALTER TABLE `startups`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `startups_info`
--
ALTER TABLE `startups_info`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `startup_categories`
--
ALTER TABLE `startup_categories`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `startup_classes`
--
ALTER TABLE `startup_classes`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `startup_data_collection`
--
ALTER TABLE `startup_data_collection`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `startup_founder_details`
--
ALTER TABLE `startup_founder_details`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `startup_incubation_center_requests`
--
ALTER TABLE `startup_incubation_center_requests`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `startup_investor_details`
--
ALTER TABLE `startup_investor_details`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `startup_investor_requests`
--
ALTER TABLE `startup_investor_requests`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `startup_team_member_details`
--
ALTER TABLE `startup_team_member_details`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `startup_team_member_requests`
--
ALTER TABLE `startup_team_member_requests`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
