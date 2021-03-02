-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 02:22 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc-backup`
--

-- --------------------------------------------------------

--
-- Table structure for table `cmts`
--

CREATE TABLE `cmts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cmts`
--

INSERT INTO `cmts` (`id`, `user_id`, `content`, `created_at`) VALUES
(1, NULL, 'This is my first cmt on my cmt system', '2021-02-21 18:38:19'),
(2, NULL, 'asdfasdfasdf', '2021-02-21 21:02:33'),
(3, NULL, 'dfasdfasdf', '2021-02-21 21:02:33'),
(4, NULL, 'dfbhsbhagh', '2021-02-21 22:55:43'),
(5, NULL, 'lolqeqweq', '2021-02-21 23:01:41'),
(6, NULL, 'new cmt with ajax', '2021-02-21 23:18:53'),
(7, NULL, 'new cmt with ajax', '2021-02-21 23:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `summary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `views`, `image`, `body`, `created_at`, `updated_at`, `summary`) VALUES
(1, 1, 'This is my first post', 39, 'banner.jpg', 'Content of the first ', '2020-11-27 16:32:40', '2021-02-18 20:30:10', ''),
(5, 15, '231', 0, 'dao-duc-gia-dinh.png', '231', '0000-00-00 00:00:00', '2021-02-18 20:30:10', ''),
(9, 15, '213', 1, 'ban.jpg', 'rewrew', '2020-12-04 12:04:42', '2021-02-18 21:59:46', ''),
(13, 18, 'Thông báo lịch học tiếng Anh kỳ Spring 2021', 23, 'alphalegion.jpg', '<p>PH&Ograve;NG TỔ CHỨC V&Agrave; QUẢN L&Yacute; Đ&Agrave;O TẠO TH&Ocirc;NG B&Aacute;O LỊCH HỌC TIẾNG ANH KỲ SPRING 2021</p>\r\n\r\n<p>Chi tiết sinh vi&ecirc;n xem tại link đ&iacute;nh k&egrave;m&nbsp; https://drive.google.com/file/d/1snu2YeegpwdJwy8fMHVMRHeRam09gulc/view?usp=sharing</p>\r\n\r\n<p>v&agrave; lịch học c&aacute; nh&acirc;n của m&igrave;nh tr&ecirc;n hệ thống ap.poly.edu.vn</p>\r\n\r\n<p>Lưu &yacute; đ&acirc;y l&agrave; m&ocirc;n tiếng Anh online sinh vi&ecirc;n kiểm tra email để tham gia nh&oacute;m của giảng vi&ecirc;n v&agrave; nắm được lịch học online, google meet (remote), đăng nhập v&agrave;o cms.poly.edu.vn trước ng&agrave;y 18/1/2021.</p>\r\n\r\n<p>Mọi thắc mắc về lịch học/ đổi lịch sẽ được xử l&yacute; trực tiếp tại c&aacute;c địa điểm sau trong 2 ng&agrave;y 11-12/1/2021:</p>\r\n\r\n<p>Ng&agrave;y 11/1/2021 từ 8h30-17h:</p>\r\n\r\n<p>- Level 1/ Tiếng Anh 1.1 + Level 4/ tiếng Anh 2.2 tại ph&ograve;ng F101</p>\r\n\r\n<p>- Level 2: tiếng Anh 1.2 tại Hội trường to&agrave; P</p>\r\n\r\n<p>- Level 3, tiếng Anh 2.1 tại ph&ograve;ng F102</p>\r\n\r\n<p>Ng&agrave;y 12/1/2021 từ 8h30 -14h00 tại Hội trường v&agrave; quầy dịch vụ sinh vi&ecirc;n: tất cả c&aacute;c level tiếng Anh n&oacute;i tr&ecirc;n.</p>\r\n\r\n<p>Lưu &yacute;: sinh vi&ecirc;n chỉ được đổi ch&eacute;o cho nhau, tức l&agrave; nếu bạn A ở lớp X muốn đổi sang lớp Y th&igrave; cần t&igrave;m bạn B ở lớp Y cũng muốn đổi sang lớp A.</p>\r\n\r\n<p>Nh&agrave; trường chỉ đổi lịch trực tiếp kh&ocirc;ng đổi qua email/ fanpage/ điện thoại tr&aacute;nh nhầm lẫn. Sinh vi&ecirc;n đ&atilde; đổi lịch kh&ocirc;ng được thay đổi về lớp cũ hay chuyển sang lớp kh&aacute;c nữa.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Người đăng: yenlh<br />\r\nThời gian: 21:36:21 - 09/01/2021<br />\r\nCập nhật lần cuối bởi yenlh v&agrave;o l&uacute;c 22:13:52 ng&agrave;y 09/01/2021</em></p>', '2021-01-15 08:12:48', '2021-02-20 20:34:36', 'Thông báo lịch học tiếng Anh kỳ Spring 2021'),
(18, 12, 'new post with topic update', 1, 'hydra.jpg', '<p>lol</p>', '2021-02-19 23:16:08', '2021-02-21 10:32:31', 'summary post'),
(20, 12, 'new post with topic 2', 25, 'imperial fists.jpg', '<p>lol 2</p>', '2021-02-19 23:21:30', '2021-02-20 20:34:33', 'summary post 2'),
(21, 12, 'Thông báo về lịch cấm các phương tiện di chuyển trên tuyến đường tại khu vực Mỹ đình', 1, 'don\' know.jpg', '<p><strong>TH&Ocirc;NG B&Aacute;O</strong></p>\r\n\r\n<p><strong>V/v Thời gian điều chỉnh t&ecirc;n đề t&agrave;i Dự &aacute;n tốt nghiệp kỳ Spring 2021</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ph&ograve;ng Đ&agrave;o tạo gửi c&aacute;c bạn sinh vi&ecirc;n hướng dẫn việc điều chỉnh t&ecirc;n đề t&agrave;i DATN kỳ SP21. C&aacute;c nh&oacute;m cử&nbsp;<strong>01 đại diện</strong>&nbsp;điền th&ocirc;ng tin v&agrave;o link dưới đ&acirc;y để điều chỉnh t&ecirc;n đề t&agrave;i:&nbsp;</p>\r\n\r\n<p><a href=\"https://docs.google.com/forms/d/e/1FAIpQLScLMEQqknxJ8WPkgR55OILQranarbp0Ua_1xOQObE7QmCMS0g/viewform\" target=\"_blank\">https://docs.google.com/forms/d/e/1FAIpQLScLMEQqknxJ8WPkgR55OILQranarbp0Ua_1xOQObE7QmCMS0g/viewform</a></p>\r\n\r\n<p><strong><em>Lưu &yacute;:&nbsp;</em></strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>ĐIỀU CHỈNH t&ecirc;n đề t&agrave;i, kh&ocirc;ng ĐỔI T&Ecirc;N đề t&agrave;i.</em></strong>&nbsp;</li>\r\n	<li>Những t&ecirc;n đề t&agrave;i điều chỉnh đều phải&nbsp;<strong>C&oacute; l&yacute; do v&agrave; sẽ được ph&ecirc; duyệt bởi Trưởng ban Đ&agrave;o tạo.&nbsp;</strong></li>\r\n	<li><strong>Về vấn đề nộp bản cứng phiếu điều chỉnh th&igrave; hiện tại do t&igrave;nh h&igrave;nh dịch Covid-19 đang diễn biến phức tạp n&ecirc;n việc nộp bản cứng sẽ được l&ugrave;i lại sau, PĐT sẽ th&ocirc;ng b&aacute;o cho sinh vi&ecirc;n lịch nộp bổ sung ở c&aacute;c th&ocirc;ng b&aacute;o tiếp theo.&nbsp;</strong></li>\r\n</ul>\r\n\r\n<p>Deadline điền form:&nbsp;<strong>Hết ng&agrave;y 23/2/2021.</strong>&nbsp;Sau thời gian tr&ecirc;n link đăng k&yacute; sẽ đ&oacute;ng.</p>\r\n\r\n<p>Sinh vi&ecirc;n lưu &yacute; đọc kỹ th&ocirc;ng tin trong th&ocirc;ng b&aacute;o n&agrave;y v&agrave; thực hiện đ&uacute;ng deadline.&nbsp;<em><strong>(n</strong></em><em><strong>hững nh&oacute;m kh&ocirc;ng c&oacute; nhu cầu điều chỉnh đề t&agrave;i vui l&ograve;ng bỏ qua TB n&agrave;y).</strong></em></p>\r\n\r\n<p>Mọi th&ocirc;ng tin thắc mắc, sinh vi&ecirc;n phản hồi lại email huongnt166@fe.edu.vn (Ms. Hường) để được giải đ&aacute;p.</p>\r\n\r\n<p>Tr&acirc;n trọng!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Người đăng: huongnt166<br />\r\nThời gian: 10:36:03 - 19/02/2021</em></p>', '2021-02-20 21:33:13', '2021-02-21 10:58:13', 'Thông báo về lịch cấm các phương tiện di chuyển trên tuyến đường tại khu vực Mỹ đình'),
(22, 12, 'THÔNG BÁO LỊCH ĐỊNH HƯỚNG DỰ ÁN TỐT NGHIỆP KỲ SUMMER 2021', 92, 'grimdilus.jpg', '<p><strong>TH&Ocirc;NG B&Aacute;O</strong></p>\r\n\r\n<p><strong>V/v Tham</strong><strong>&nbsp;dự buổi Định hướng Dự &aacute;n tốt nghiệp cho học kỳ Summer 2021&nbsp;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ph&ograve;ng TC&amp;QLĐT th&ocirc;ng b&aacute;o lịch&nbsp;ĐỊNH HƯỚNG DỰ &Aacute;N TỐT NGHIỆP HỌC KỲ SUMMER 2021.&nbsp;</p>\r\n\r\n<ol>\r\n	<li><strong>Đối tượng</strong>:&nbsp;</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>Bắt&nbsp;buộc: sinh vi&ecirc;n đang học kỳ 6 tại kỳ Spring 2021.&nbsp;</li>\r\n	<li>Khuyến kh&iacute;ch: sinh vi&ecirc;n kỳ 7 chưa l&agrave;m Dự &aacute;n tốt nghiệp.&nbsp;</li>\r\n	<li>Sinh&nbsp;vi&ecirc;n c&aacute;c Khối ng&agrave;nh CNTT, TKĐH, QTDN, TMĐT, QHCC, QTKS, HDDL.&nbsp;</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li><strong>Điều kiện ti&ecirc;n quyết c&aacute;c chuy&ecirc;n ng&agrave;nh</strong>&nbsp;</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>Điều kiện ti&ecirc;n quyết: sinh vi&ecirc;n học đủ c&aacute;c m&ocirc;n trong 6 kỳ đầu, trừ c&aacute;c m&ocirc;n tiếng Anh, Ch&iacute;nh trị Ph&aacute;p luật, Gi&aacute;o dục thể chất.&nbsp;Sinh vi&ecirc;n cần đạt c&aacute;c m&ocirc;n ti&ecirc;n quyết trước khi v&agrave;o học kỳ Summer 2021.&nbsp;</li>\r\n	<li>Điều&nbsp;kiện ti&ecirc;n quyết của m&ocirc;n&nbsp;Dự &aacute;n tốt nghiệp của c&aacute;c ng&agrave;nh, sinh vi&ecirc;n&nbsp;xem tại đ&acirc;y:&nbsp;<a href=\"https://docs.google.com/document/d/1dbGg4-mTrIJqMyMbukB5DaOC4DaZ7pto/edit#heading=h.gjdgxs\" target=\"_blank\">https://docs.google.com/document/d/1dbGg4-mTrIJqMyMbukB5DaOC4DaZ7pto/edit#heading=h.gjdgxs</a>&nbsp;</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>DSSV x&eacute;t&nbsp;điều kiện l&agrave;m Dự &aacute;n tốt nghiệp&nbsp;SV xem tại link sau (Lưu &yacute;: DS n&agrave;y&nbsp;cập nhật đến hết 18/2/2021,&nbsp;<strong>những sinh vi&ecirc;n đang học trả nợ m&ocirc;n ti&ecirc;n quyết vẫn tạm t&iacute;nh l&agrave; &ldquo;Chưa đạt&rdquo;), sinh vi&ecirc;n xem kỹ trong từng sheet tại link</strong>:&nbsp;<a href=\"https://docs.google.com/spreadsheets/d/139OBlL1FxC7Uce7lzaz8uID8i6Rw96_Q/edit#gid=1856449054\" target=\"_blank\">https://docs.google.com/spreadsheets/d/139OBlL1FxC7Uce7lzaz8uID8i6Rw96_Q/edit#gid=1856449054</a>&nbsp;</li>\r\n	<br />\r\n	<br />\r\n	&nbsp;\r\n</ul>\r\n\r\n<ol>\r\n	<li><strong>Lịch cụ thể</strong>:&nbsp;</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>H&igrave;nh thức: Online qua Google Meet.&nbsp;</li>\r\n	<li>Thời gian ng&agrave;y&nbsp;25/2/2021, cụ thể&nbsp;lịch từng ng&agrave;nh như sau:&nbsp;</li>\r\n</ul>\r\n\r\n<table style=\"width:660px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>TT</strong>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p><strong>Ng&agrave;nh</strong>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p><strong>Ng&agrave;y</strong>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p><strong>Thời gian</strong>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p><strong>Link tham gia</strong>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>1&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>QTDN, TMĐT, QHCC&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>25/2/2021&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>08h00 &ndash; 10h30&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>meet.google.com/tkr-mzgp-wes&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>2&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>QTKS - HDDL&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>25/2/2021</p>\r\n			</td>\r\n			<td>\r\n			<p>10h30 &ndash; 11h30&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>meet.google.com/cja-sdgs-nud&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>3&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>TKĐH&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>25/2/2021</p>\r\n			</td>\r\n			<td>\r\n			<p>08h30 &ndash; 11h00&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>meet.google.com/hrn-wucy-daa&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>4&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>TKW, LTMT&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>25/2/2021</p>\r\n			</td>\r\n			<td>\r\n			<p>13h30 &ndash; 15h30&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>meet.google.com/zpv-bjgo-fpx&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>5&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>UDPM&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>25/2/2021</p>\r\n			</td>\r\n			<td>\r\n			<p>15h30 &ndash; 17h30&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>meet.google.com/ozc-jgpd-fkw&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>V&igrave; t&iacute;nh chất quan trọng của buổi định hướng, đề nghị c&aacute;c bạn sinh vi&ecirc;n tham gia đầy đủ&nbsp;buổi Định hướng n&oacute;i tr&ecirc;n để nhận c&aacute;c th&ocirc;ng tin tiếp theo về việc l&agrave;m dự &aacute;n tốt nghiệp, trả nợ m&ocirc;n ti&ecirc;n quyết.</p>\r\n\r\n<p>Mọi thắc mắc, sinh vi&ecirc;n vui l&ograve;ng phản hồi qua email:&nbsp;<a href=\"mailto:huongnt166@fe.edu.vn\" target=\"_blank\">huongnt166@fe.edu.vn</a>&nbsp;(Ms Hường).&nbsp;</p>\r\n\r\n<p>Tr&acirc;n trọng!&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;H&agrave;&nbsp;Nội, ng&agrave;y 19 th&aacute;ng 2 năm 2021&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Ph&ograve;ng Tổ chức v&agrave; Quản l&yacute; Đ&agrave;o tạo&nbsp;</p>\r\n\r\n<p><em>Người đăng: huongnt166<br />\r\nThời gian: 10:26:05 - 19/02/2021</em></p>', '2021-02-20 21:34:03', '2021-02-21 23:20:25', 'V/v Tham dự buổi Định hướng Dự án tốt nghiệp cho học kỳ Summer 2021');

-- --------------------------------------------------------

--
-- Table structure for table `post_cmt`
--

CREATE TABLE `post_cmt` (
  `post_id` int(11) NOT NULL,
  `cmt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_cmt`
--

INSERT INTO `post_cmt` (`post_id`, `cmt_id`) VALUES
(22, 1),
(22, 2),
(22, 3),
(22, 6);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `cmt_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `cmt_id`, `content`, `created_at`, `user_id`) VALUES
(1, 1, 'this is the reply from 1st cmt', '2021-02-21 21:26:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reset_pass`
--

CREATE TABLE `reset_pass` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reset_pass`
--

INSERT INTO `reset_pass` (`id`, `email`, `token`) VALUES
(2, 'lol@gmail.com', '3729e9336b28f1baba14b458ea0c689f5b1583a5700ce5b568f0dbaef64eefa86c85686cfb480da1eed2963046ca6a27df11'),
(18, 'lchh0412@gmail.com', '8782f1c542d53d38eb0ff1cb2c9d54752988514f6037ced02c0da2bd0748ee1d27a364164cfc090db75336569713961b622b'),
(19, 'lechuhuuha@gmail.com', '2fc15c2f0e8a2812c997280b8798f646067215e60cb73fed3b1a10705d82357570fce89b8e055a0e002507c55fe59c458cc2');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 15, 'warhammer 40k', '2020-12-04 12:04:42', '2021-02-18 23:33:33'),
(2, 12, 'ap poly technic 123', '2021-02-18 21:57:58', '2021-02-19 00:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `topic_post`
--

CREATE TABLE `topic_post` (
  `topic_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic_post`
--

INSERT INTO `topic_post` (`topic_id`, `post_id`) VALUES
(1, 5),
(1, 9),
(2, 9),
(2, 18),
(1, 20),
(2, 21),
(1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `status`) VALUES
(10, 'dary', 'dary@hotmail.com', '$2y$10$5W3ZAgj1UjIvcnTVJ1wnE.ubWx0kfhEng9lgyAq7eeRdR5rDR7sd6', 0, 1),
(11, 'dary06', 'dary@gmail.com', '$2y$10$SlCqsEHmtIpPiIr2eC.tr.S0fuMD8AESxyC.oXhsbSvdf6XZbidLy', 0, 1),
(12, 'lechuhuuha', 'lechuhuuha@gmail.com', '$2y$10$1Q66NKRwXQOb2KsucSOPlOK7oEdDuiSRUFljbHe9XPLo4PZVE20yG', 1, NULL),
(13, 'longvan', 'thanhtu0904@gmail.com', '$2y$10$AHmD4WEpPkSQMqV7eI3Ste1LwL7g3reTcWXc92..7L5ko4VXcq/Mi', 0, NULL),
(15, 'longvanren', 'halchph10019@fpt.edu.vn', '$2y$10$WKhIGM2kkZj12/Yp/nhJ/ueJZ6ZAxAA0XmBEtlWA/jBzBdB4MRWKG', 0, NULL),
(16, 'halch', 'halch@inet.vn', '$2y$10$tiTc5shfW0q8p2dMHmiWq.5/0sk/w7sPfnkBPedE/NyT0YdSCxDKS', 0, NULL),
(17, 'lol', 'lol@gmail.com', '$2y$10$I/WVibuxoRKASbbfodTJDeSMu2CA.wKOwkTn7mWfkXTEoE0sC2QOS', 0, NULL),
(18, 'lchh0412', 'lchh0412@gmail.com', '$2y$10$PH1whWEXmYNh3aQ9CBKCVOrvs2JvAn0Rk5f1nEO5vpjJm3.Aky4La', 1, NULL),
(19, 'thanh', 'thanhtu0804@gmail.com', '$2y$10$WaCmPfdsEPM/mb4p/rTDgeBfaiAqXo0Vd4Aaf8woyx2KLgDztkRFy', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cmts`
--
ALTER TABLE `cmts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_pass`
--
ALTER TABLE `reset_pass`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cmts`
--
ALTER TABLE `cmts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reset_pass`
--
ALTER TABLE `reset_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
