-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 02:48 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `ID` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_info`
--

CREATE TABLE `appointment_info` (
  `ID` int(255) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_mobile` varchar(255) NOT NULL,
  `doctor_id` int(255) NOT NULL,
  `patient_id` int(255) NOT NULL,
  `patient_email` varchar(255) NOT NULL,
  `patient_gender` varchar(255) NOT NULL,
  `todaydate` date NOT NULL,
  `message` text NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_info`
--

INSERT INTO `appointment_info` (`id`, `appointment_date`, `patient_name`, `patient_mobile`, `doctor_id`, `patient_id`, `patient_email`, `patient_gender`, `today_date`, `message`, `status`) VALUES
(1, '0000-00-00 00:00:00', 'Joey Tribiani', '8929929', 1, 0, 'joey@gmail', 'Male', '2021-02-15', 'Please book my appointment urgently', 1),
(2, '0000-00-00 00:00:00', 'Salman Khan', '99299281', 2, 0, 'salman@gmail.com', 'Male', '2021-02-15', 'HI everyone, i am fine', 1),
(3, '2021-02-28 13:45:00', 'Hrithik', '928377828', 3, 0, 'hrithik@gmail', 'Male', '2021-02-15', 'Want an appointment of a surgeon', 1),
(5, '2021-02-27 11:00:00', 'Ramesh', '89276327', 3, 0, 'ramesh@gmail', 'Male', '2021-02-16', 'Hello there', 0),
(6, '2021-02-26 11:00:00', 'Rati Rai', '9283262', 6, 0, 'ratirai@gmail', 'Female', '2021-02-23', 'Please book my appointment urgently', 1),
(8, '2021-03-14 19:00:00', 'Suyash Tripathi', '928733733', 6, 1, 'sktripathi@gmail.com', 'Other', '2021-03-11', 'Please give me appointment', 1),
(12, '2021-03-24 20:38:00', 'Danish Shaikh', '928929832', 8, 4, 'muhddaarab@gmail', 'Male', '2021-03-21', 'Hello hi', 1),
(13, '0000-00-00 00:00:00', 'Suyash Tripathi', '928733733', 3, 1, 'sktripathi@gmail.com', 'Other', '2021-03-31', 'I need this appointment Asap', 0),
(14, '2021-04-05 10:15:00', 'Ashish Shukla', '928292922', 2, 0, 'ashish@gamil.com', 'Male', '2021-04-01', 'having stomach ache from past 5 days', 1),
(15, '2021-06-07 17:42:00', 'Rahul Sharma', '8293838000', 5, 0, 'rahul@gmail.com', 'Male', '2021-06-03', 'for xyzz', 1),
(16, '2021-06-08 15:44:00', 'Jay Sharma', '829937732', 4, 3, 'jayshar@gmail.com', 'Male', '2021-06-03', 'xyzz', 1),
(17, '2021-06-09 14:40:00', 'Harsh Singh', '8293729002', 3, 0, 'harshsg@gmail.com', 'Male', '2021-06-04', 'xyzabc', 1),
(18, '2021-06-07 10:41:00', 'Jay Sharma', '829937732', 6, 3, 'jayshar@gmail.com', 'Male', '2021-06-04', 'xyzzzz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `id` int(100) NOT NULL,
  `joining_date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `leaving_date` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`id`, `joiningdate`, `name`, `speciality`, `phone`, `email`, `gender`, `dob`, `image`, `shift`, `address`, `city`, `country`, `leaving_date`, `time_in`, `time_out`, `password`) VALUES
(1, '2021-02-15', 'Alok Sharma', 'Cardiologist', 902828282, 'alok@gmail.com', 'Male', '1975-10-20', 'doctor1.jpg', 'Monday,Tuesday,Wednesday,Thursday,Friday,', '25/2 marimata', 'Indore', 'India', '0000-00-00', '12:00:00', '15:00:00', 'alok123'),
(2, '2021-02-15', 'Riya Verma', 'Pediatrician', 838322838, 'riya@mail.com', 'Female', '1992-01-10', 'doctor2.jpg', 'Monday,Tuesday,Wednesday,', '10/1 Rajwada', 'Indore', 'India', '2021-06-03', '10:00:00', '13:00:00', 'riya123'),
(3, '2021-02-15', 'Shahid khan', 'Surgeon', 928372222, 'shahid@gmail.com', 'Male', '1990-06-30', 'doctor3.jpg', 'Monday,Tuesday,Wednesday,Thursday,Friday,', '50/2 Chandni chawk', 'Delhi', 'India', '0000-00-00', '12:00:00', '18:00:00', 'shahid123'),
(4, '2021-02-18', 'Suresh Kumar', 'Allergists', 99288282, 'suresh@gmail', 'Male', '1985-05-10', 'doctor4.png', 'Monday,Tuesday,Wednesday,', '30/3 Shekhar nagar', 'Rajasthan', 'India', '2021-06-03', '14:00:00', '18:00:00', 'suresh123'),
(5, '2021-02-19', 'Radha Jain', 'Neurologist', 929832729, 'radha@gmail', 'Female', '1999-09-10', 'doctor5.jpg', 'Monday,Tuesday,Wednesday,Thursday,', 'Sunshine colony', 'Mumbai', 'India', '0000-00-00', '16:00:00', '19:00:00', 'radha123'),
(6, '2021-02-22', 'Palak Sharma', 'Cardiologist', 9283882456, 'palak@neema', 'Female', '1991-04-28', 'doctor6.jpg', 'Monday,Tuesday,Wednesday,', '50/2 Marimata', 'Indore', 'India', '0000-00-00', '09:00:00', '12:00:00', 'palak123'),
(7, '2021-02-27', 'Umesh Yadav', 'Allergists', 92818282, 'umesh@gmail', 'Male', '1985-01-10', 'doctor7.jpg', 'Monday,Tuesday,Wednesday,', '20/2 Chandan nagar', 'Indore', 'India', '0000-00-00', '14:00:00', '16:00:00', 'umesh123'),
(8, '2021-03-01', 'Munna Bhai', 'Plastic Surgeon', 9782882712, 'munna@bhai', 'Male', '1980-12-25', 'doctor8.jpg', 'Monday,Tuesday,Wednesday,Thursday,', 'Regal square', 'Indore', 'India', '0000-00-00', '20:00:00', '23:00:00', 'munna123');

-- --------------------------------------------------------

--
-- Table structure for table `ipd_info`
--

CREATE TABLE `ipd_info` (
  `id` int(255) NOT NULL,
  `room_id` int(255) NOT NULL,
  `admit_date` date NOT NULL,
  `free_date` date NOT NULL,
  `patient_id` int(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `total_charge` varchar(255) NOT NULL,
  `amnt_paid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipd_info`
--

INSERT INTO `ipd_info` (`id`, `room_id`, `admit_date`, `free_date`, `patient_id`, `patient_name`, `mobile`, `email`, `gender`, `reason`, `total_charge`, `amnt_paid`, `status`) VALUES
(1, 1, '2021-05-02', '2021-05-05', 3, 'Jay Sharma', '829937732', 'jayshar@gmail.com', 'Male', 'Normal diarohea, need roomfor 2 days', '12000', '12000', 'old'),
(2, 3, '2021-06-03', '2021-06-09', 2, 'Shahid Kapoor', '892737728', 'shahidkp@gmail.com', 'Male', 'heart problem', '36000', '0', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `id` int(255) NOT NULL,
  `registeration_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `date_of_reg` date NOT NULL,
  `family_mobile` bigint(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `occupation` text NOT NULL,
  `height` decimal(65,0) NOT NULL,
  `weight` decimal(65,0) NOT NULL,
  `age` int(255) NOT NULL,
  `aadhar_no` varchar(255) NOT NULL,
  `pancard_no` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`id`, `registeration_no`, `fullname`, `password`, `email`, `mobile`, `gender`, `dob`, `marital_status`, `date_of_reg`, `family_mobile`, `address`, `city`, `country`, `occupation`, `height`, `weight`, `age`, `aadhar_no`, `pancard_no`, `image`) VALUES
(1, 'HMS001', 'Suyash Tripathi', 'sachin123', 'sktripathi@gmail.com', 928733733, 'Other', '2000-01-21', 'Married', '2021-03-09', 902929222, '50/2,MR10,Vijay nagar', 'Indore', 'India', 'Pilot', '166', '60', 20, '4234 9288 2882', 'TBC9929911', 'patient1.jpg'),
(2, 'HMS002', 'Shahid Kapoor', 'shahid123', 'shahidkp@gmail.com', 892737728, 'Male', '1995-03-30', 'Married', '2021-03-10', 983832922, 'Film City, Juhu', 'Mumbai', 'India', 'Actor', '170', '65', 44, '8763 8837 2938', 'PAN3920873', 'patient2.jpeg'),
(3, 'HMS003', 'Jay Sharma', 'jay123', 'jayshar@gmail.com', 829937732, 'Male', '1990-05-25', 'Married', '2021-03-12', 9828377728, '10/2 Vijay nagar Sch no.78', 'Indore', 'India', 'Engineer', '180', '65', 30, '5628 8263 82873', 'PAN827635', 'patient3.jpg'),
(4, 'HMS004', 'Danish Shaikh', 'daarab123', 'muhddaarab@gmail', 928929832, 'Male', '2001-09-20', 'Married', '2021-03-19', 82993832, 'Ahilya paltan, Risala', 'Indore', 'India', 'Youtuber', '180', '60', 19, '8277 2888 3673', 'PAN299382299', 'daarab.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_info`
--

CREATE TABLE `room_info` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_info`
--

INSERT INTO `room_info` (`id`, `name`, `category`, `about`, `charge`, `image`, `status`, `date_from`, `occ_to`) VALUES
(1, 'RMS101', 'Day Care', 'We have state of the art Day Care facility with nature friendly ambience & attendant sit outs. Treatment is provided on adjustable cozy chairs to make the whole experience feel pain-free.', '4000', 'day-care.jpg', 1, '0000-00-00', '0000-00-00'),
(2, 'RMS102', 'General Ward', 'A dormitory style layout beds. Each bed has a bed side trolley & common bathroom. There are separate wards for men and women.', '2500', 'general.jpg', 1, '0000-00-00', '0000-00-00'),
(3, 'RMS103', 'Luxury Room', 'Single centrally air conditioned well furnished accommodation with attached bathroom, sofa-cum-bed for attendant, TV & telephone facilities.', '6000', 'luxury-room.jpg', 0, '2021-06-03', '2021-06-09'),
(4, 'RMS104', 'Premium Twin Sharing Room', 'Specifically designed to comfortably accommodate two patient beds, it ensures an optimal level of privacy. Each patient is served meals as per the dietician\'s approval. The room has an attached bathroom, individual closets, personal lockers, direct dialin', '15000', 'premium-twin-sharing.jpg', 1, '0000-00-00', '0000-00-00'),
(5, 'RMS105', 'Private AC', 'Single well-furnished air-conditioned accommodation with attached bathroom, attendant couch with TV & telephone facilities.', '5000', 'private-ac.jpg', 1, '0000-00-00', '0000-00-00'),
(6, 'RMS106', 'Semi-Private (AC)', 'Two patients sharing well-furnished air-conditioned accommodation with attached bathroom, attendant couch with TV & telephone facilities.', '3500', 'semi-private-ac.jpg', 1, '0000-00-00', '0000-00-00'),
(7, 'RMS107', 'Super Deluxe Room', 'Single centrally air conditioned, well-furnished accommodation with attached bathroom, sofa-cum-bed for attendant, central oxygen suction facility, TV, telephone & mini fridge.', '7000', 'super-deluxe.jpg', 1, '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `appointment_info`
--


--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipd_info`
--
ALTER TABLE `ipd_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_info`
--
ALTER TABLE `room_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment_info`
--
ALTER TABLE `appointment_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `doctor_info`
--
ALTER TABLE `doctor_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ipd_info`
--
ALTER TABLE `ipd_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_info`
--
ALTER TABLE `room_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
