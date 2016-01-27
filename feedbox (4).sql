-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2016 at 06:05 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feedbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `fb_locations`
--

CREATE TABLE IF NOT EXISTS `fb_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `is_published` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1 = ''Published'', 0 = ''UnPublished''',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = not deleted , 1 = deleted',
  `added_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fb_locations`
--

INSERT INTO `fb_locations` (`id`, `name`, `type`, `is_published`, `is_deleted`, `added_date`, `updated_date`) VALUES
(1, 'Hemas Group IT', 'hospital', '1', '0', '0000-00-00 00:00:00', '2016-01-27 07:25:06'),
(2, 'Hotel', 'hotel', '1', '0', '0000-00-00 00:00:00', '2016-01-27 07:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `fb_patients`
--

CREATE TABLE IF NOT EXISTS `fb_patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_number` varchar(255) DEFAULT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_contact_no` varchar(15) DEFAULT NULL,
  `patient_email` varchar(255) DEFAULT NULL,
  `patient_admission_date` datetime DEFAULT NULL,
  `patient_discharge_date` datetime DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fb_patients_feeds`
--

CREATE TABLE IF NOT EXISTS `fb_patients_feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feed` varchar(255) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `added_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fb_questionnaire`
--

CREATE TABLE IF NOT EXISTS `fb_questionnaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` enum('1','2') NOT NULL COMMENT '1 = Questionnaire, 2 = Instant Feedback',
  `language_type` enum('en','ta','si','multi') NOT NULL DEFAULT 'multi',
  `location` int(11) NOT NULL,
  `thank_image` varchar(255) NOT NULL,
  `thank_text` varchar(255) NOT NULL,
  `thank_text_desc` varchar(255) NOT NULL,
  `thank_text_si` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thank_text_desc_si` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thank_text_ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thank_text_desc_ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_colour` varchar(255) NOT NULL,
  `text_box_colour` varchar(255) NOT NULL,
  `btn_colour` varchar(255) NOT NULL,
  `btn_type` enum('3d','flat') NOT NULL DEFAULT 'flat',
  `btn_text_colour` varchar(255) NOT NULL,
  `banner_colour` varchar(255) NOT NULL,
  `banner_txt_colour` varchar(255) NOT NULL,
  `welcome_image` varchar(255) DEFAULT NULL,
  `welcome_text` varchar(255) DEFAULT NULL,
  `welcome_text_desc` varchar(255) DEFAULT NULL,
  `welcome_text_si` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `welcome_text_desc_si` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `welcome_text_ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `welcome_text_desc_ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `welcome_bg_colour` varchar(255) DEFAULT NULL,
  `active_user_detail` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1 = active user details , 0 = inactive user details',
  `is_published` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1 = ''Published'', 0 = ''UnPublished''',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = not deleted , 1 = deleted',
  `added_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fb_questionnaire`
--

INSERT INTO `fb_questionnaire` (`id`, `name`, `type`, `language_type`, `location`, `thank_image`, `thank_text`, `thank_text_desc`, `thank_text_si`, `thank_text_desc_si`, `thank_text_ta`, `thank_text_desc_ta`, `text_colour`, `text_box_colour`, `btn_colour`, `btn_type`, `btn_text_colour`, `banner_colour`, `banner_txt_colour`, `welcome_image`, `welcome_text`, `welcome_text_desc`, `welcome_text_si`, `welcome_text_desc_si`, `welcome_text_ta`, `welcome_text_desc_ta`, `welcome_bg_colour`, `active_user_detail`, `is_published`, `is_deleted`, `added_date`, `updated_date`) VALUES
(1, 'In patient feedback questionnaire', '1', 'multi', 2, 'face.png', 'Thank You', 'We value your feedback', 'fsdfsfff', 'fsdf', 'fsf', 'fsdf', '#FFFFFF', '#414141', '#f47b20', '3d', '#FFFFFF', '#f47b20', '#333', 'face.png', 'Welcome to Feedbox', 'Please rate your level of satisfaction by clicking the appropriate face', 'සාදරයෙන් පිළිගනිමු', '', '', '', '#333', '1', '1', '0', '2016-01-18 11:12:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fb_questions`
--

CREATE TABLE IF NOT EXISTS `fb_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_name` varchar(255) DEFAULT NULL,
  `question_name_ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `question_name_si` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `question_type_id` int(11) DEFAULT NULL,
  `answer_type` enum('emo','yno','txt','tarea') NOT NULL,
  `is_published` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1 = ''Published'', 0 = ''UnPublished''',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `added_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `fb_questions`
--

INSERT INTO `fb_questions` (`id`, `question_name`, `question_name_ta`, `question_name_si`, `questionnaire_id`, `question_type_id`, `answer_type`, `is_published`, `is_deleted`, `added_date`, `updated_date`) VALUES
(1, 'Friendliness', 'நேசம்', 'සුහදශීලී', 1, 1, 'emo', '1', '0', '0000-00-00 00:00:00', '2016-01-26 05:45:12'),
(2, 'Knowledge & Skills', NULL, NULL, 1, 1, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Care & Concern', '', '', 1, 2, 'emo', '1', '0', '0000-00-00 00:00:00', '2016-01-26 08:28:24'),
(4, 'Knowledge & Skills', NULL, NULL, 1, 2, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Speed of Response', NULL, NULL, 1, 2, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Care & Concern', NULL, NULL, 1, 3, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Clarity of Explanation', NULL, NULL, 1, 3, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Knowledge & Skill', NULL, NULL, 1, 3, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Laboratory Services', NULL, NULL, 1, 4, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Pharmacy Services', NULL, NULL, 1, 4, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'X-Ray/MRI/CT', NULL, NULL, 1, 4, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Meals Provided by hospital', NULL, NULL, 1, 4, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Hospital Facilities & Equipment', NULL, NULL, 1, 4, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Consultant', NULL, NULL, 1, 4, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Staff attention/ Courtesy', NULL, NULL, 1, 5, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Explanation on cost and procedures', NULL, NULL, 1, 5, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Escort  to room and handover\r\n', NULL, NULL, 1, 5, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Overall rating on  admission process', NULL, NULL, 1, 5, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Explanation on bills and charges', NULL, NULL, 1, 6, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Explanation on discharge advise', NULL, NULL, 1, 6, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Time taken to discharge', NULL, NULL, 1, 6, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Overall rating on discharge process', NULL, NULL, 1, 6, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'The help you received from hospital staff to control your pain', NULL, NULL, 1, 7, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'How did the  hospital staff respond to your health care problems', NULL, NULL, 1, 7, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Parking facilities', NULL, NULL, 1, 8, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Canteen facilities', NULL, NULL, 1, 8, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Toilet Cleanliness ', NULL, NULL, 1, 8, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'General cleanliness of the hospital ', NULL, NULL, 1, 8, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Signage and directions ', NULL, NULL, 1, 8, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'What is your overall satisfaction with Hemas Hospital?', NULL, NULL, 1, NULL, 'emo', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Would you recommend Hemas Hospital to Another Person?', NULL, NULL, 1, NULL, 'yno', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Do you wish to compliment any staff for outstanding care & services?', '', '', 1, NULL, 'tarea', '1', '0', '0000-00-00 00:00:00', '2016-01-26 08:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `fb_question_types`
--

CREATE TABLE IF NOT EXISTS `fb_question_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_si` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `is_published` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1 = ''Published'', 0 = ''UnPublished''',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = not deleted , 1 = deleted',
  `added_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fb_question_types`
--

INSERT INTO `fb_question_types` (`id`, `name`, `name_ta`, `name_si`, `location_id`, `is_published`, `is_deleted`, `added_date`, `updated_date`) VALUES
(1, 'Counter Staff', NULL, NULL, 2, '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Nursing Staff', NULL, NULL, 2, '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Medical Staff', NULL, NULL, 2, '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Other Services', NULL, NULL, 2, '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Admission Process', NULL, NULL, 2, '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Discharge Process', NULL, NULL, 2, '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Pain & complaint management', NULL, NULL, 2, '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Facilities', NULL, NULL, 2, '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `fb_report_view`
--
CREATE TABLE IF NOT EXISTS `fb_report_view` (
`id` int(11)
,`feed` varchar(255)
,`questionnaire_id` int(11)
,`question_id` int(11)
,`added_date` datetime
,`patient_name` varchar(255)
,`question_name` varchar(255)
,`name` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `fb_settings`
--

CREATE TABLE IF NOT EXISTS `fb_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fb_settings`
--

INSERT INTO `fb_settings` (`id`, `name`, `slug`, `value`) VALUES
(1, 'Business Type', 'business_type', 'hotel'),
(2, 'Site URL', 'site_url', 'http://localhost/feedbox/en');

-- --------------------------------------------------------

--
-- Table structure for table `fb_user`
--

CREATE TABLE IF NOT EXISTS `fb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `user_name` varchar(300) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '''1'' => ''Super Admin'' ,''2'' => ''Admin'' ,''3'' => ''Report User''',
  `email` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `location_id` int(11) NOT NULL,
  `is_online` enum('1','0') NOT NULL DEFAULT '1' COMMENT 'Online =1,Offline=0',
  `is_published` enum('1','0') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `added_by` int(11) DEFAULT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fb_user`
--

INSERT INTO `fb_user` (`id`, `name`, `user_name`, `user_type`, `email`, `password`, `location_id`, `is_online`, `is_published`, `is_deleted`, `added_by`, `added_date`, `updated_date`, `updated_by`) VALUES
(1, 'Thulara', 'thulara', 1, 'tom@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '0', '1', '0', 0, '2015-03-21 18:29:36', '2015-08-17 05:38:44', 0),
(8, 'Gayathma', 'gayathma', 2, 'tom@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '1', '1', '0', 0, '2015-03-21 18:29:36', '2016-01-27 00:42:33', 8);

-- --------------------------------------------------------

--
-- Structure for view `fb_report_view`
--
DROP TABLE IF EXISTS `fb_report_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fb_report_view` AS select `fb_patients_feeds`.`id` AS `id`,`fb_patients_feeds`.`feed` AS `feed`,`fb_patients_feeds`.`questionnaire_id` AS `questionnaire_id`,`fb_patients_feeds`.`question_id` AS `question_id`,`fb_patients_feeds`.`added_date` AS `added_date`,`fb_patients`.`patient_name` AS `patient_name`,`fb_questions`.`question_name` AS `question_name`,`fb_question_types`.`name` AS `name` from (((`fb_patients_feeds` join `fb_patients` on((`fb_patients`.`id` = `fb_patients_feeds`.`patient_id`))) join `fb_questions` on((`fb_questions`.`id` = `fb_patients_feeds`.`question_id`))) left join `fb_question_types` on((`fb_question_types`.`id` = `fb_questions`.`question_type_id`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
