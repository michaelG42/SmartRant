-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 10:15 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartrant`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(48) NOT NULL,
  `title` varchar(48) NOT NULL,
  `category` varchar(24) NOT NULL,
  `body` varchar(2400) NOT NULL,
  `date` varchar(48) NOT NULL,
  `comments` bit(1) NOT NULL,
  `rating` float NOT NULL,
  `imgLink` varchar(48) NOT NULL,
  `tags` varchar(48) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `username`, `title`, `category`, `body`, `date`, `comments`, `rating`, `imgLink`, `tags`) VALUES
(13, 'Michael', 'NewNewARticle', 'Health', 'aga agb agc agd age agf agg agh agi agj agk agl agm agn ago agp agq agr ags agt agu agv agw agx agy agz aha ahb ahc ahd ahe ahf ahg ahh ahi ahj ahk ahl ahm ahn aho ahp ahq ahr ahs aht ahu ahv ahw ahx ahy ahz aia aib aic aid aie aif aig aih aii aij aik ail aim ain aio aip aiq air ais ait aiu aiv aiw aix aiy aiz aja ajb ajc ajd aje ajf ajg ajh aji ajj ajk ajl ajm ajn ajo ajp ajq ajr ajs ajt aju ajv ajw ajx ajy ajz aka akb akc akd ake akf akg akh aki akj akk akl akm akn ako akp akq akr aks akt aku akv akw akx aky akz ala alb alc ald ale alf alg alh ali alj alk all alm aln alo alp alq alr als alt alu alv alw alx aly alz ama amb amc amd ame amf amg amh ami amj amk aml amm amn amo amp amq amr ams amt amu amv amw amx amy amz ana anb anc and ane anf ang anh ani anj ank anl anm ann ano anp anq anr ans ant anu anv anw anx any anz aoa aob aoc aod aoe aof aog aoh aoi aoj aok aol aom aon aoo aop aoq aor aos aot aou aov aow aox aoy aoz apa apb apc apd ape apf apg aph api apj apk apl apm apn apo app apq apr aps apt apu apv apw apx apy apz aqa aqb aqc aqd aqe aqf aqg aqh aqi aqj aqk aql aqm aqn aqo aqp aqq aqr aqs aqt aqu aqv aqw aqx aqy aqz ara arb arc ard are arf arg arh ari arj ark arl arm arn aro arp arq arr ars art aru arv arw arx ary arz asa asb asc asd ase asf asg ash asi asj ask asl asm asn aso asp asq asr ass ast asu asv asw asx asy asz ata atb atc atd ate atf atg ath ati atj atk atl atm atn ato atp atq atr ats att atu atv atw atx aty atz aua aub auc aud aue auf aug auh aui auj auk aul aum aun auo aup auq aur aus aut auu auv auw aux auy auz ava avb avc avd ave avf avg avh avi avj avk avl avm avn avo avp avq avr avs avt avu avv avw avx avy avz awa awb awc awd awe awf awg awh awi awj awk awl awm awn awo awp awq awr aws awt awu awv aww awx awy awz axa axb axc axd axe axf axg axh axi axj axk axl axm axn axo axp axq axr axs axt axu axv axw axx axy axz aya ayb ayc ayd aye ayf ayg ayh ayi ayj ayk ayl aym ayn ayo ayp ayq ayr ays ayt ayu ayv ayw ayx ayy ayz aza azb azc azd aze azf azg azh azi azj azk azl azm azn azo azp azq azr azs azt azu azv azw azx azy azz baa bab bac bad bae baf bag bah bai baj bak bal bam ban bao bap baq bar bas bat bau bav baw bax bay baz bba bbb bbc bbd bbe bbf bbg bbh bbi bbj bbk bbl bbm bbn bbo bbp bbq bbr bbs bbt bbu bbv bbw bbx bby bbz bca bcb bcc bcd bce bcf bcg bch bci bcj bck bcl bcm bcn bco bcp bcq bcr bcs bct bcu bcv bcw bcx bcy bcz bda bdb ', '2017-05-02 09:27:14am', b'1', 5, 'UserImages/Michael.png', 'words'),
(14, 'Michael', 'Health Benefits of Sleep', 'Science', 'Sleep plays a vital role in good health and well-being throughout your life. Getting enough quality sleep at the right times can help protect your mental health, physical health, quality of life, and safety.\r\n\r\nThe way you feel while you&#39;re awake depends in part on what happens while you&#39;re sleeping. During sleep, your body is working to support healthy brain function and maintain your physical health. In children and teens, sleep also helps support growth and development.\r\n\r\nThe damage from sleep deficiency can occur in an instant (such as a car crash), or it can harm you over time. For example, ongoing sleep deficiency can raise your risk for some chronic health problems. It also can affect how well you think, react, work, learn, and get along with others.', '2017-05-02 09:35:49am', b'0', 0, 'UserImages/Michael.png', 'robbed,from,Google'),
(15, 'Michael', 'Is Unit Testing worth the effort? ', 'Science', 'Article From https://stackoverflow.com/questions/67299/is-unit-testing-worth-the-effort\r\nThe details change daily, but the sentiment doesn&#39;t. Unit tests and test-driven development (TDD) have so many hidden and personal benefits as well as the obvious ones that you just can&#39;t really explain to somebody until they&#39;re doing it themselves.\r\n\r\nBut, ignoring that, here&#39;s my attempt!\r\n\r\nUnit Tests allows you to make big changes to code quickly. You know it works now because you&#39;ve run the tests, when you make the changes you need to make, you need to get the tests working again. This saves hours.\r\nTDD helps you to realise when to stop coding. Your tests give you confidence that you&#39;ve done enough for now and can stop tweaking and move on to the next thing.\r\nThe tests and the code work together to achieve better code. Your code could be bad / buggy. Your TEST could be bad / buggy. In TDD you are banking on the chances of both being bad / buggy being low. Often it&#39;s the test that needs fixing but that&#39;s still a good outcome.\r\nTDD helps with coding constipation. When faced with a large and daunting piece of work ahead writing the tests will get you moving quickly.\r\nUnit Tests help you really understand the design of the code you are working on. Instead of writing code to do something, you are starting by outlining all the conditions you are subjecting the code to and what outputs you&#39;d expect from that.\r\nUnit Tests give you instant visual feedback, we all like the feeling of all those green lights when we&#39;ve done. It&#39;s very satisfying. It&#39;s also much easier to pick up where you left off after an interruption because you can see where you got to - that next red light that needs fixing.\r\nContrary to popular belief unit testing does not mean writing twice as much code, or coding slower. It&#39;s faster and more robust than coding without tests once you&#39;ve got the hang of it. Test code itself is usually relatively trivial and doesn&#39;t add a big overhead to what you&#39;re doing. This is one you&#39;ll only believe when you&#39;re doing it :)\r\nI think it was Fowler who said: &#34;Imperfect tests, run frequently, are much better than perfect tests that are never written at all&#34;. I interpret this as giving me permission to write tests where I think they&#39;ll be most useful even if the rest of my code coverage is w', '2017-05-02 09:39:41am', b'1', 4, 'UserImages/Michael.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(48) NOT NULL,
  `body` varchar(2400) NOT NULL,
  `date` varchar(48) NOT NULL,
  `articleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `body`, `date`, `articleId`) VALUES
(7, 'Michael', 'new comment', '2017-05-02 09:33:52am', 13),
(8, 'Michael', 'Another Comment', '2017-05-02 09:34:03am', 13),
(9, 'Michael', 'Another Comment', '2017-05-02 09:34:08am', 13);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `articleId` int(10) UNSIGNED NOT NULL,
  `oneStar` int(10) UNSIGNED NOT NULL,
  `twoStar` int(10) UNSIGNED NOT NULL,
  `threeStar` int(10) UNSIGNED NOT NULL,
  `fourStar` int(10) UNSIGNED NOT NULL,
  `fiveStar` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`articleId`, `oneStar`, `twoStar`, `threeStar`, `fourStar`, `fiveStar`) VALUES
(13, 0, 0, 0, 0, 4),
(14, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `userName` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `email` varchar(24) NOT NULL,
  `imgLink` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `password`, `email`, `imgLink`) VALUES
(23, 'Michael', 'Password', 'mgrin10@student.dkit.ie', 'UserImages/Michael.png'),
(25, 'new', 'Password', 'new@m.com', 'UserImages/DefaultImage.'),
(26, 'test1', 'Password', 't@m.com', 'UserImages/Defaultsdfsdf'),
(28, 'Nial', '12345', 'n@ma.com', 'UserImages/Default.png'),
(29, 'Steph', '12345', 's@m.com', 'UserImages/Default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articleId` (`articleId`),
  ADD KEY `articleId_2` (`articleId`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`articleId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
