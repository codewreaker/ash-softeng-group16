

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Table structure for table `se_task`
--

CREATE TABLE IF NOT EXISTS `se_task` (
  `task_id` int(9) NOT NULL,
  `task_name` varchar(338) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `user_id` int(9) NOT NULL,
  `setter_id` int(9) NOT NULL,
  `status` int(11) NOT NULL,
  `report` varchar(338) NOT NULL,
   PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `se_task`
--

INSERT INTO `se_task` (`task_id`, `task_name`, `start_time`, `end_time`, `user_id`, `setter_id`, `status`, `report`) VALUES
(1, 'Add a new table ', '2015-11-29 13:53:22', '0000-00-00 00:00:00', 1, 2, 1, 'This seems good');


