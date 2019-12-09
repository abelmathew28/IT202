-- Database: `Banking_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_activity`
--

CREATE TABLE `account_activity` (
  `activity_id` int(11) NOT NULL,
  `transaction_type` enum('deposit','withdrawal','transfer') NOT NULL,
  `amount` int(11) NOT NULL,
  `effective_balance` int(20) NOT NULL,
  `depositer_detail_id` int(11) NOT NULL,
  `recipient_detail_id` int(11) NOT NULL,
  `transaction_show` enum('1','2') NOT NULL,
  `activity_date` date NOT NULL,
  `status` enum('active','pending','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `account_holders`
--

CREATE TABLE `account_holders` (
  `holder_id` int(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `login_id` int(11) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_holders`
--

INSERT INTO `account_holders` (`holder_id`, `first_name`, `Last_name`, `address1`, `address2`, `state`, `zip_code`, `phone`, `email`, `login_id`, `status`) VALUES
(1, 'admin', 'admin', 'Bank of NJIT', '', 'New Jersey', 07728, '9633855087', 'abm@gmail.com', 1, 'active'),
(7, 'Abel', 'Mathew', '3 Tiverton Court', '', 'New Jersey', 07728, '7323331899', 'abel@gmail.com', 22, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `bank_detail`
--

CREATE TABLE `bank_detail` (
  `ID` int(11) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_address` text NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_detail`
--

INSERT INTO `bank_detail` (`ID`, `bank_name`, `bank_address`, `state`, `zip`, `status`) VALUES
(1, 'Bank of NJIT', '323 Dr MLK Jr Blvd, Newark, NJ 44145, United States', 'Newark', 07102, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `holders_detail`
--

CREATE TABLE `holders_detail` (
  `detail_id` int(11) NOT NULL,
  `holder_id` int(11) NOT NULL,
  `account_number` text NOT NULL,
  `account_type` enum('Savings','Checking') NOT NULL,
  `security_question_id` int(11) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `initial_deposit` int(11) NOT NULL,
  `current_balance` int(11) NOT NULL,
  `last_transaction_date` date NOT NULL,
  `last_transaction_amount` int(11) NOT NULL,
  `transaction_type` enum('deposit','withdrawal','transfer') NOT NULL DEFAULT 'deposit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passcode` text NOT NULL,
  `usertype` enum('admin','user') NOT NULL,
  `status` enum('active','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `passcode`, `usertype`, `status`) VALUES
(1, 'abm@gmail.com', '$2y$10$mkHFbhNY0vAzei2r4VHv2eAJCldpHxIpC0/lO/8A.N2NU5NDViupC', 'admin', 'active'),
(22, 'abel@gmail.com', '$2y$10$EgAJf6B4bJEr15MM9Bmi9OktiKoI7yK1aQMG1uwnTPRI4hTNQX./6', 'user', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `security_question`
--

CREATE TABLE `security_question` (
  `ID` int(11) NOT NULL,
  `security_question` varchar(100) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `security_question`
--

INSERT INTO `security_question` (`ID`, `security_question`, `status`) VALUES
(1, 'Who is your first teacher?', 'active'),
(2, 'Who is your favorite sports person?', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_activity`
--
ALTER TABLE `account_activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `account_holders`
--
ALTER TABLE `account_holders`
  ADD PRIMARY KEY (`holder_id`);

--
-- Indexes for table `bank_detail`
--
ALTER TABLE `bank_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `holders_detail`
--
ALTER TABLE `holders_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `security_question`
--
ALTER TABLE `security_question`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_activity`
--
ALTER TABLE `account_activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `account_holders`
--
ALTER TABLE `account_holders`
  MODIFY `holder_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bank_detail`
--
ALTER TABLE `bank_detail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holders_detail`
--
ALTER TABLE `holders_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `security_question`
--
ALTER TABLE `security_question`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

