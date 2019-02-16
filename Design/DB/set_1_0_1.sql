-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 16, 2019 at 03:11 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `incubation_centers`
--

CREATE TABLE `incubation_centers` (
  `slno` bigint(20) NOT NULL,
  `incubation_center_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `incubation_center_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''users'' table',
  `incubation_center_name` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Name of Incubation Center',
  `incubation_center_profile_pic_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Profile Picture Unique ID',
  `incubation_center_registered_date_time` datetime NOT NULL COMMENT 'Date & Time when incubation center was registered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Incubation Centers';

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
  `incubation_center_instagram_id` text COLLATE utf8_bin COMMENT 'Incubation Centers Instagram Profile ID',
  `incubation_center_last_update_date_time` datetime NOT NULL COMMENT 'Date & Time when incubation center info. was last updated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Info. of Incubation Centers';

-- --------------------------------------------------------

--
-- Table structure for table `startups`
--

CREATE TABLE `startups` (
  `slno` bigint(20) NOT NULL,
  `startup_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID for Startup',
  `startup_name` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Name of Startup',
  `startup_logo_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Startup Logo Unique ID',
  `startup_registered_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Startups';

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
  `startup_date_of_registration` date NOT NULL COMMENT 'Startup Date of Registration',
  `startup_cin_or_pan_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Startup Corporate Identification Number or PAN',
  `startup_address` text COLLATE utf8_bin NOT NULL COMMENT 'Startup Office Address',
  `startup_contact_number` int(11) NOT NULL COMMENT 'Contact Number of Startup',
  `startup_pincode` int(100) NOT NULL COMMENT 'Startup Pincode',
  `startup_state_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''states'' table',
  `startup_city_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''cities'' table',
  `startup_incubation_center_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''incubation_centers'' table',
  `startup_twitter_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Twitter ID of startup',
  `startup_linkedin_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'LinkedIn ID of startup',
  `startup_facebook_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Facebook ID of startup',
  `startup_instagram_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Instagram ID of startup',
  `startup_is_hiring` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicates whether startup is hiring. If 0 (zero) then NO, otherwise YES.',
  `startup_last_info_update_date_time` datetime NOT NULL COMMENT 'Date and Time when last time information regrading startup was updated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
-- Table structure for table `startup_founder_details`
--

CREATE TABLE `startup_founder_details` (
  `slno` bigint(20) NOT NULL,
  `startup_founder_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `startup_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''startups'' table',
  `startup_founder_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''users'' table',
  `startup_founder_added_date_time` datetime NOT NULL COMMENT 'Date & Time when founder was added'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Startup Founders';

-- --------------------------------------------------------

--
-- Table structure for table `startup_investor_details`
--

CREATE TABLE `startup_investor_details` (
  `slno` bigint(20) NOT NULL,
  `startup_investor_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `startup_investor_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''users'' table',
  `startup_investor_added_date_time` datetime NOT NULL COMMENT 'Date & Time when investor was added'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Investor Details of Startups';

-- --------------------------------------------------------

--
-- Table structure for table `startup_team_member_details`
--

CREATE TABLE `startup_team_member_details` (
  `slno` bigint(20) NOT NULL,
  `startup_team_member_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `startup_team_member_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''users'' table',
  `startup_team_member_designation` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT 'Designation of Team Member',
  `startup_team_member_added_date_time` datetime NOT NULL COMMENT 'Date & Time when team member was added'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Startup Team Members';

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `slno` bigint(20) NOT NULL,
  `state_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `state_text` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Name of State'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Indian State Names';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `slno` bigint(20) NOT NULL,
  `user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique User ID',
  `user_username` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Username of User',
  `user_passsword` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Password of User',
  `user_email_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Email ID of User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold Users';

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `slno` bigint(20) NOT NULL,
  `user_info_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID',
  `user_info_user_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Same as in ''users'' table',
  `user_name` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Full Name of User',
  `user_info_profile_pic_id` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Unique ID for profile picture',
  `user_info_is_a_investor` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicates whether user is investor or not, If 0 (zero) then NO, otherwise YES.',
  `user_official_link` text COLLATE utf8_bin NOT NULL COMMENT 'Website/App/Video Link of User',
  `user_profile_description` text COLLATE utf8_bin NOT NULL COMMENT 'Profile Description of User',
  `user_linkedin_link` text COLLATE utf8_bin COMMENT 'User''s LinkedIn Profile ID',
  `user_` text COLLATE utf8_bin COMMENT 'User''s Twitter Profile ID',
  `user_facebook_id` text COLLATE utf8_bin COMMENT 'User''s Facebook Profile ID',
  `user_instagram_id` text COLLATE utf8_bin COMMENT 'User''s Instagram Profile ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='To Hold info. of Users';

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
  ADD UNIQUE KEY `incubation_center_id` (`incubation_center_id`);

--
-- Indexes for table `incubation_centers_info`
--
ALTER TABLE `incubation_centers_info`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `incubation_center_info_id` (`incubation_center_info_id`);

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
-- Indexes for table `startup_founder_details`
--
ALTER TABLE `startup_founder_details`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `startup_founder_id` (`startup_founder_id`);

--
-- Indexes for table `startup_investor_details`
--
ALTER TABLE `startup_investor_details`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `startup_investor_id` (`startup_investor_id`);

--
-- Indexes for table `startup_team_member_details`
--
ALTER TABLE `startup_team_member_details`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `startup_team_member_id` (`startup_team_member_id`),
  ADD UNIQUE KEY `startup_team_member_user_id` (`startup_team_member_user_id`);

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
  ADD UNIQUE KEY `user_info_id` (`user_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incubation_centers`
--
ALTER TABLE `incubation_centers`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incubation_centers_info`
--
ALTER TABLE `incubation_centers_info`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `startups`
--
ALTER TABLE `startups`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `startups_info`
--
ALTER TABLE `startups_info`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `startup_founder_details`
--
ALTER TABLE `startup_founder_details`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `startup_investor_details`
--
ALTER TABLE `startup_investor_details`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `startup_team_member_details`
--
ALTER TABLE `startup_team_member_details`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
