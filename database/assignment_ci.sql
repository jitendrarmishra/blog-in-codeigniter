-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2020 at 11:49 AM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `category_id` int(9) NOT NULL,
  `menu_id` int(9) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_slug` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `category_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `meta_title` varchar(200) DEFAULT NULL,
  `meta_description` varchar(200) DEFAULT NULL,
  `meta_keyword` varchar(200) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`category_id`, `menu_id`, `category_name`, `category_slug`, `text`, `category_status`, `meta_title`, `meta_description`, `meta_keyword`, `date_time`) VALUES
(1, 0, 'Cricket', 'cricket', '', 'active', '', '', '', '2020-03-12 06:41:28'),
(2, 0, 'Football', 'football', '', 'active', '', '', '', '2020-03-12 06:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `comment_id` int(11) NOT NULL,
  `register_id` int(9) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` date DEFAULT NULL,
  `status` enum('approve','not_approve') NOT NULL DEFAULT 'not_approve',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`comment_id`, `register_id`, `user_name`, `email`, `post_id`, `comment`, `date`, `status`, `date_added`) VALUES
(1, 1, 'dsdsa', 'jitu1@gmail.com', 4, 'sdasdsa', '2020-03-28', 'not_approve', '2020-03-28 08:53:57'),
(2, 1, 'sdsadas', 'jitu1@gmail.coms', 5, 'adasdasdsad', '2020-03-28', 'approve', '2020-03-28 10:53:19'),
(3, 0, 'Jitendra Mishra', 'jitu1@gmail.com', 6, 'assdfasasd', '2020-03-29', 'approve', '2020-03-28 18:38:25'),
(4, 0, 'Jitendra Mishra', 'jitu1@gmail.com', 6, 'Hi This is test comment', '2020-03-29', 'approve', '2020-03-28 18:38:35'),
(5, 0, 'Jitendra Mishra', 'jitu1@gmail.com', 6, 'ASAs', '2020-03-29', 'not_approve', '2020-03-28 18:56:52'),
(6, 0, 'Jitendra Mishra', 'jitendra.mishra@yahoo.com', 5, 'TEst 11122', '2020-03-29', 'not_approve', '2020-03-29 05:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `post_id` int(9) NOT NULL,
  `category_id` int(9) NOT NULL,
  `post_title` varchar(500) NOT NULL,
  `post_slug` varchar(200) NOT NULL,
  `post_text` text NOT NULL,
  `post_author` int(9) NOT NULL,
  `post_date` date NOT NULL,
  `is_featured` enum('yes','no') NOT NULL DEFAULT 'no',
  `image` varchar(100) NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_description` varchar(200) DEFAULT NULL,
  `meta_keyword` varchar(200) DEFAULT NULL,
  `post_status` enum('active','inactive') DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`post_id`, `category_id`, `post_title`, `post_slug`, `post_text`, `post_author`, `post_date`, `is_featured`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `post_status`, `date_time`) VALUES
(1, 1, 'Deccan Warriors better on Sea Tigers in a low-scoring game, win the Balasore Premier League', 'deccan-warriors-better-on-sea-tigers-in-a-low-scoring-game-win-the-balasore-premier-league', '<p>Deccan Warriors, BLS 120 in 20 overs (Pradipta Das 44, Sesha Guru Induru 4/16, Chandan K. Sahu 2/15) beat Sea Tigers, BLS 107 in 20 overs (Chandan K. Sahu 29, Nirbishankar Barik 3/10, Lelin Kumar Bal 3/18) by 13 runs. </p>\r\n\r\n<p>Well, as the Sea Tiger started their innings, everyone thought they would chase down a small target with ease and will win the season 11 of Balasore Premier League. But Deccan Warriors had other plans, as their bowlers came all attacking on the batting side and defended the target beautifully. They knew if they struck with early breakthroughs, they will have the upper hand. Sea Tigers lost three of their wickets in the powerplay, in fact, by the fifth over, Nasim, Behera and Taj all were in the pavillion. Then the short partnership of 41 runs between Amjit and Akram brought the Tigers to a decent position, but again they lost four wickets in cluster. After 16 overs, their score was 72/7 and they now needed 49 runs in the last four overs. Now it was all on Sahu to take his team to the verge of victory. As the last over arrived, they needed 26 runs, Sahu hit three consecutive boundaries but P Das got rid of him on the fourth delivery and it was all over for Sea Tigers. He dismissed Majhi on the very next ball and won the game for Deccan Warriors. Barik and Bal picked up three wickets each and P Das also took a couple of wickets to his name.</p>\r\n\r\n<p>Earlier, Sea Tigers elected to field first after winning the toss, they knew if they restrict Warriors under 140, they will have their chance. Warriors were given early blows when Sahu and Uddin dismissed the opening duo with mere 23 runs on board. Now Ronald Das and P Das guided the innings before former was out caught by Taj Khan off the bowling of Amjit. Then, P Das with other batsmen somehow managed to get the score to 120, he played well for his 44 but didn&#39;t got any support from his fellow mates. Sea Tigers bowled really well, specially Induru who got a four wicket haul. Both Uddin and Induru gave 16 runs in their respective four overs. Deccan Warriors were eventually bowled out on the last ball of the innings for 120 runs.</p>\r\n\r\n<p>The final of season 11 was low-scoring, but it had everything that a final should have. Bowlers were on a roll today, they showed T20s are also meant for bowlers. Let&#39;s see what the next season brings for us, till then, enjoy and cheers!</p>\r\n\r\n<p> </p>\r\n\r\n<p><a href="https://cricheroes.in/cricket-news/2901/Balasore/Deccan-Warriors-better-on-Sea-Tigers-in-a-low-scoring-game,-win-the-Balasore-Premier-League">https://cricheroes.in/cricket-news/2901/Balasore/Deccan-Warriors-better-on-Sea-Tigers-in-a-low-scoring-game,-win-the-Balasore-Premier-League</a></p>', 1, '2020-03-28', 'yes', '1583989433568_0xY8F7zKOWbF.jpg', 'Deccan Warriors, BLS 120 in 20 overs (Pradipta Das 44, Sesha Guru Induru 4/16, Chandan K. Sahu 2/15) ', 'Deccan Warriors, BLS 120 in 20 overs (Pradipta Das 44, Sesha Guru Induru 4/16, Chandan K. Sahu 2/15) ', 'Deccan Warriors, BLS 120 in 20 overs (Pradipta Das 44, Sesha Guru Induru 4/16, Chandan K. Sahu 2/15) ', 'active', '2020-03-28 11:26:23'),
(2, 1, 'Bangar turns down Bangladesh consultant offer', 'bangar-turns-down-bangladesh-consultant-offer', '<p>Sanjay Bangar, India&#39;s former batting coach, has turned down Bangladesh Cricket Board&#39;s offer to become its Test team&#39;s consultant citing professional commitments.</p>\r\n\r\n<p>Bangar, who was offered to become Bangladesh&#39;s batting consultant ahead of the two-Test series against Australia in June, declined the role as he signed a two-year contract with Star Sports in the interim.</p>\r\n\r\n<p>"They offered me the position eight weeks ago. But in the interim, I finalised finalised my contract with Star which gave me the opportunity to balance out my personal and professional commitments. However, I look forward to working with BCB in the future," Bangar was quoted as saying by PTI.</p>\r\n\r\n<p>Bangar had worked as the batting coach of the Indian team from 2014 to 2019 and was replaced by Vikram Rathour at the start of the home season in September. Bangar&#39;s last assignment with the national team was the West Indies tour that followed immediately after the 2019 World Cup in the UK. The 47-year-old was the only one whose contract wasn&#39;t renewed while head coach Ravi Shastri, bowling coach Bharat Arun and fielding coach R Sridhar all had their roles extended. Bangar has since been involved in commentary.</p>\r\n\r\n<p>The BCB had approached the Indian for the role after former South Africa batsman Neil McKenzie, who is Bangladesh&#39;s white-ball consultant, refused to extend his role to all formats.</p>\r\n\r\n<p>© Cricbuzz</p>', 1, '2020-03-19', 'yes', 'Coach-Sanjay-Bangar.jpg', '', '', '', 'active', '2020-03-19 08:33:14'),
(3, 1, '"Can\'t Look Beyond Him": Wasim Jaffer Backs MS Dhoni For T20 World Cup', 'cant-look-beyond-him-wasim-jaffer-backs-ms-dhoni-for-t20-world-cup', '<p>Former India opener and domestic legend Wasim Jaffer has said that going into the T20 World Cup, Team India cannot look beyond veteran wicketkeeper-batsman MS Dhoni, if he is fit and in form. Jaffer, who announced his retirement from all forms of the game earlier this month, claimed Dhoni&#39;s inclusion could ease the pressure on KL Rahul or Rishabh Pant, who are currently sharing the gloves for Team India in limited-overs cricket. "If Dhoni is fit and in form I think we can&#39;t look beyond him as he&#39;ll be an asset behind the stumps and also lower down the order. It&#39;ll take the pressure of keeping off Rahul and India can play Pant as a batsman too if they want a lefty," Jaffer said in a tweet.</p>\r\n\r\n<p>Dhoni, 38, last played for India at the 2019 World Cup in England where the Men in Blue were knocked out in the semi-finals. Since then, he has been on a sabbatical and is due to appear on the cricket field in the upcoming edition of the Indian Premier League (IPL).</p>\r\n\r\n<p>India head coach Ravi Shastri has already stated that Dhoni&#39;s selection depends on his performance in IPL.</p>\r\n\r\n<p>"It all depends on when he starts playing and how he is playing during the IPL. What are the other people doing with the wicket-keeping gloves or what is the form of those players as opposed to Dhoni&#39;s form. The IPL becomes a massive tournament because that could be the last tournament after which more or less your 15 is decided," Shastri had told IANS in November last year.</p>\r\n\r\n<p>"There might be one player who might be there and thereabouts in case of an injury or whatever. But your team I would say would be known after the IPL. What I would say is rather than speculating of who is where, wait for the IPL to get over and then you are in a position to take a call on who are the best 17 in the country," he had added.</p>\r\n\r\n<p>The IPL 2020 edition, originally due to start on March 29, has been postponed till April 15 due to the coronavirus outbreak.</p>\r\n\r\n<p> </p>\r\n\r\n<p><a href="https://sports.ndtv.com/cricket/wasim-jaffer-backs-ms-dhoni-for-t20-world-cup-2197284">https://sports.ndtv.com/cricket/wasim-jaffer-backs-ms-dhoni-for-t20-world-cup-2197284</a></p>', 1, '2020-03-19', 'yes', 'qvdisppg_ms-dhoni-afp_625x300_26_February_20.jpg', '"Can\'t Look Beyond Him": Wasim Jaffer Backs MS Dhoni For T20 World Cup', '"Can\'t Look Beyond Him": Wasim Jaffer Backs MS Dhoni For T20 World Cup', '"Can\'t Look Beyond Him": Wasim Jaffer Backs MS Dhoni For T20 World Cup', 'active', '2020-03-19 09:02:32'),
(4, 1, 'Coronavirus Pandemic | Australia Aiming to Hold T20 World Cup as Scheduled', 'coronavirus-pandemic--australia-aiming-to-hold-t20-world-cup-as-scheduled', '<p>Cricket Australia is aiming to hold the men&#39;s Twenty20 World Cup as scheduled this year despite the escalating coronavirus pandemic, but admitted the situation is fluid.</p>\r\n\r\n<p>The tournament is due to get underway in October at seven venues across the country with the West Indies defending their title.</p>\r\n\r\n<p>Despite the rest of this year&#39;s Australian cricket season being cancelled this week due to spiralling virus fears, plans for the World Cup remain unchanged.</p>\r\n\r\n<p><br>\r\n"We&#39;re really hoping that all forms of sport can be played again in a few weeks&#39; or a few months&#39; time," CA chief Kevin Roberts said late Tuesday.</p>\r\n\r\n<p>"None of us are experts in this situation obviously, so our hope is that we&#39;re back in very much normal circumstances come October and November when the men&#39;s T20 World Cup is to be played.</p>\r\n\r\n<p>"And at this stage we&#39;re planning on November 15, to have a full house at the MCG (for the final) to inspire the world through men&#39;s cricket as the women&#39;s cricketers did here just last week," he added.</p>\r\n\r\n<p>Australia swept to their fifth women&#39;s T20 World Cup title on March 8, crushing India by 85 runs in front of more than 86,000 fans at the Melbourne Cricket Ground.</p>\r\n\r\n<p>Since then, a host of sports in Australia have cancelled or suspended their activities with the government banning outdoor gatherings of more than 500 people and indoor groups of more than 100.</p>\r\n\r\n<p>Australia has reported more than 500 confirmed cases of coronavirus, with the increase in infections accelerating daily. There have been six deaths and airline Qantas Thursday announced it would halt all international flights later this month.</p>\r\n\r\n<p>In addition to the World Cup, Australia is due to host India and Afghanistan for Test series this year with Roberts telling cricket.com.au he hoped to announce the 2020-2021 season schedule next month as planned.</p>\r\n\r\n<p>But he said emergency planning for COVID-19 was the higher priority.</p>\r\n\r\n<p>"We&#39;re moving now from management of the onset of coronavirus as a critical incident, to how do we guarantee the continuity of our business and our organisation beyond that," he said.</p>\r\n\r\n<p> </p>\r\n\r\n<p><a href="https://www.news18.com/cricketnext/news/coronavirus-pandemic-australia-aiming-to-hold-t20-world-cup-as-scheduled-2542191.html">https://www.news18.com/cricketnext/news/coronavirus-pandemic-australia-aiming-to-hold-t20-world-cup-as-scheduled-2542191.html</a></p>', 1, '2020-03-19', 'yes', 'WEST-INDIES-WT20-GETTY.jpg', 'Coronavirus Pandemic | Australia Aiming to Hold T20 World Cup as Scheduled', 'Coronavirus Pandemic | Australia Aiming to Hold T20 World Cup as Scheduled', 'Coronavirus Pandemic | Australia Aiming to Hold T20 World Cup as Scheduled', 'active', '2020-03-19 09:00:58'),
(5, 1, 'Be Smart & Proactive to Combat Coronavirus: Rohit Sharma', 'be-smart--proactive-to-combat-coronavirus-rohit-sharma', '<p>India cricketer Rohit Sharma has expressed his concern over the ongoing coronavirus outbreak and has called on his countrymen to take all preventive measures to fight COVID-19 outbreak.</p>\r\n\r\n<p>In a video posted on his official Twitter and Facebook account, Rohit on Monday said that people need to be smart and proactive in their approach to tackle coronavirus outbreak, which has so far claimed over 6,000 lives worldwide.</p>\r\n\r\n<p>"Last few weeks have been tough for all of us and the world has come to a standstill which is very sad to see. The only way we can come to normalcy is by all of us coming together. And we can do this by being a little smart, a little proactive, knowing our surroundings and as and when we get any symptoms inform your nearest medical authorities," said Rohit.</p>\r\n\r\n<p>The governments across various states in the country have recommended people to follow social distancing apart from ordering closures of schools, malls, cinema halls in their bid to avoid gatherings</p>\r\n\r\n<p>"It&#39;s because we all want our kids to go to the school, we want to go to the malls and we all want to watch movies in the theatres," said the Indian opener.</p>\r\n\r\n<p>The 32-year-old also appreciated the efforts of the medical professionals across the world who have been putting their lives at risk while treating those infected with novel coronavirus.</p>\r\n\r\n<p>"I appreciate the efforts of all the doctors and the medical staff across the world who have put their lives on risk while taking care of the people who have tested positive with coronavirus," said Rohit.</p>\r\n\r\n<p>"Last, but not the least, my heart goes out for people who have lost their lives and their families. Take care, be safe," he added.</p>\r\n\r\n<p>Earlier, India skipper Virat Kohli had also called on people to "stay safe and vigilant" amid the ongoing coronavirus outbreak.</p>\r\n\r\n<p>"Let&#39;s stay strong and fight the COVID-19 outbreak by taking all precautionary measures. Stay safe, be vigilant and most importantly remember, prevention is better than cure. Please take care everyone," Kohli had tweeted last week.</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><a href="https://www.news18.com/cricketnext/news/be-smart-proactive-to-combat-coronavirus-rohit-sharma-2538271.html">https://www.news18.com/cricketnext/news/be-smart-proactive-to-combat-coronavirus-rohit-sharma-2538271.html</a></p>', 1, '2020-03-19', 'yes', '800px-Armadillo-Florida-3000x2175_4_4MB-2009.jpg', 'Be Smart & Proactive to Combat Coronavirus: Rohit Sharma', 'Be Smart & Proactive to Combat Coronavirus: Rohit Sharma', 'Be Smart & Proactive to Combat Coronavirus: Rohit Sharma', 'active', '2020-03-19 09:05:55'),
(6, 2, '"Can\'t Look Beyond Him": Wasim Jaffer Backs MS Dhoni For T20 World Cup', 'cant-look-beyond-him-wasim-jaffer-backs-ms-dhoni-for-t20-world-cup', '<p>Former India opener and domestic legend Wasim Jaffer has said that going into the T20 World Cup, Team India cannot look beyond veteran wicketkeeper-batsman MS Dhoni, if he is fit and in form. Jaffer, who announced his retirement from all forms of the game earlier this month, claimed Dhoni&#39;s inclusion could ease the pressure on KL Rahul or Rishabh Pant, who are currently sharing the gloves for Team India in limited-overs cricket. "If Dhoni is fit and in form I think we can&#39;t look beyond him as he&#39;ll be an asset behind the stumps and also lower down the order. It&#39;ll take the pressure of keeping off Rahul and India can play Pant as a batsman too if they want a lefty," Jaffer said in a tweet.</p>\r\n\r\n<p>Dhoni, 38, last played for India at the 2019 World Cup in England where the Men in Blue were knocked out in the semi-finals. Since then, he has been on a sabbatical and is due to appear on the cricket field in the upcoming edition of the Indian Premier League (IPL).</p>\r\n\r\n<p>India head coach Ravi Shastri has already stated that Dhoni&#39;s selection depends on his performance in IPL.</p>\r\n\r\n<p>"It all depends on when he starts playing and how he is playing during the IPL. What are the other people doing with the wicket-keeping gloves or what is the form of those players as opposed to Dhoni&#39;s form. The IPL becomes a massive tournament because that could be the last tournament after which more or less your 15 is decided," Shastri had told IANS in November last year.</p>\r\n\r\n<p>"There might be one player who might be there and thereabouts in case of an injury or whatever. But your team I would say would be known after the IPL. What I would say is rather than speculating of who is where, wait for the IPL to get over and then you are in a position to take a call on who are the best 17 in the country," he had added.</p>\r\n\r\n<p>The IPL 2020 edition, originally due to start on March 29, has been postponed till April 15 due to the coronavirus outbreak.</p>', 1, '2020-03-28', 'no', '800px-Armadillo-Florida-3000x2175_4_4MB-20091.jpg', 'sdsad', 'dsad', 'sdsads', 'active', '2020-03-28 11:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `register_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createddate` date NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`register_id`, `name`, `email`, `password`, `createddate`, `status`) VALUES
(1, 'Jitendra Mishra', 'jitendra.mishra@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-03-12', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('admin','user') NOT NULL,
  `login_sesstion` varchar(100) DEFAULT NULL,
  `update_password` varchar(100) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT '''active'',''inactive'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `l_name`, `email_id`, `password`, `type`, `login_sesstion`, `update_password`, `status`) VALUES
(1, 'Jitendra', 'Mishra', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', 'd15f7d544b139a679711a67bd90dff0b', NULL, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `category_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `post_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `register_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
