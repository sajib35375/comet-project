-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 08:09 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rajniti', 'rajniti', 0, '2021-04-10 13:57:42', '2021-04-11 17:45:36'),
(6, 'Orthoniti', 'orthoniti', 0, '2021-04-11 15:57:54', '2021-04-11 17:45:34'),
(7, 'Khela-dhula', 'khela-dhula', 0, '2021-04-11 15:58:20', '2021-04-11 17:45:30'),
(8, 'Binodon-Group', 'binodon-group', 0, '2021-04-11 15:58:38', '2021-04-11 17:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 3, 7, NULL, NULL),
(2, 3, 8, NULL, NULL),
(3, 5, 1, NULL, NULL),
(4, 5, 6, NULL, NULL),
(5, 5, 7, NULL, NULL),
(6, 5, 8, NULL, NULL),
(7, 7, 1, NULL, NULL),
(8, 7, 6, NULL, NULL),
(9, 7, 8, NULL, NULL),
(10, 8, 1, NULL, NULL),
(11, 8, 6, NULL, NULL),
(12, 8, 8, NULL, NULL),
(13, 9, 1, NULL, NULL),
(14, 9, 6, NULL, NULL),
(15, 10, 1, NULL, NULL),
(16, 10, 6, NULL, NULL),
(17, 10, 8, NULL, NULL),
(18, 11, 7, NULL, NULL),
(19, 11, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2021_04_09_000645_create_roles_table', 1),
(13, '2021_04_10_194646_create_categories_table', 2),
(14, '2021_04_12_131249_create_tags_table', 3),
(19, '2021_04_12_195039_create_posts_table', 4),
(20, '2021_04_16_235118_create_category_post_table', 5),
(21, '2021_04_18_021018_create_post_tag_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `featured`, `content`, `status`, `trash`, `created_at`, `updated_at`) VALUES
(1, 1, 'সিনেমার ‘মিষ্টি মেয়ে’ কবরী মারা গেছেন', 'sinemar-mishti-meye-kbree-mara-gechen', '{\"post_type\":\"Image\",\"post_title\":\"\\u09b8\\u09bf\\u09a8\\u09c7\\u09ae\\u09be\\u09b0 \\u2018\\u09ae\\u09bf\\u09b7\\u09cd\\u099f\\u09bf \\u09ae\\u09c7\\u09df\\u09c7\\u2019 \\u0995\\u09ac\\u09b0\\u09c0 \\u09ae\\u09be\\u09b0\\u09be \\u0997\\u09c7\\u099b\\u09c7\\u09a8\",\"post_image\":\"4b259dfeb5f595400334c6960400978e.jpg\",\"post_gallery\":[],\"post_video\":\"\",\"post_audio\":null}', '<p>অসম্পূর্ণ অনেক কাজ, অনেক স্বপ্ন রেখেই চলে গেলেন কবরী। বাংলার অন্যতম সেরা অভিনেত্রী সারাহ বেগম কবরী। ঢাকার সিনেমার &lsquo;মিষ্টি মেয়ে&rsquo; কবরী সক্রিয় ছিলেন সিনেমায়। ক্যামেরার সামনে থেকে চলে গিয়েছিলেন পেছনে, পরিচালকের আসনে। করোনায় আক্রান্ত হয়ে ১৩ দিনের মাথায় তিনি চলে গেলেন (ইন্না লিল্লাহি ওয়া ইন্না ইলাইহি রাজিউন)। শুক্রবার রাত ১২টা ২০মিনিটে রাজধানীর শেখ রাসেল গ্যাস্ট্রোলিভার হাসপাতালে তিনি শেষ নিশ্বাস ত্যাগ করেন। তাঁর বয়স হয়েছিল ৭১ বছর। প্রথম আলোকে কবরীর ছেলে শাকের চিশতী খবরটি নিশ্চিত করেন।</p>', 1, 1, '2021-04-16 17:31:11', '2021-04-18 13:44:41'),
(2, 1, 'এখনো আমি যথেষ্ট পরিমাণে ‘জীবিত’ আছি: সুমন', 'ekhno-ami-zthesht-primane-jeebit-achi-sumn', '{\"post_type\":\"Image\",\"post_title\":\"\\u098f\\u0996\\u09a8\\u09cb \\u0986\\u09ae\\u09bf \\u09af\\u09a5\\u09c7\\u09b7\\u09cd\\u099f \\u09aa\\u09b0\\u09bf\\u09ae\\u09be\\u09a3\\u09c7 \\u2018\\u099c\\u09c0\\u09ac\\u09bf\\u09a4\\u2019 \\u0986\\u099b\\u09bf: \\u09b8\\u09c1\\u09ae\\u09a8\",\"post_image\":\"75c5e7ae9eba6f17c7d1dd3cbfd0b001.jpg\",\"post_gallery\":[],\"post_video\":\"\",\"post_audio\":null}', '<p>ব্যাংককের একটি হাসপাতালে চিকিৎসা নিচ্ছেন অর্থহীন ব্যান্ডের সুমন। তিনি সংগীতাঙ্গনে &lsquo;বেজবাবা সুমন&rsquo; নামেই পরিচিত। বর্তমানে তিনি ব্যাংককের একটি হোটেল আছেন। সেখান থেকে তিন দিন পরপর হাসপাতালে গিয়ে থেরাপি নিতে হচ্ছে। তাঁর শারীরিক অবস্থা অতটা ভালো নয়। এর মধ্যেই গুজব ছড়িয়েছে সুমন মৃত্যুর জন্য দিন গুনছেন। বিষয়টি তাঁর নজরে এসেছে। গুজব রটনাকারীদের উদ্দেশে সুমন পরিষ্কার জানিয়েছেন, তিনি এখনো জীবিত আছেন।</p>\r\n\r\n<p>গত মাসের শুরুতে গুরুতর অসুস্থ হয়ে পড়েন সুমন। উন্নত চিকিৎসার জন্য থাইল্যান্ডের ব্যাংককে নেওয়া হয়েছে এই গায়ককে। শারীরিক অবস্থা খারাপ দেখে সেখানকার চিকিৎসকেরা তাঁকে আইসিইউতে ভর্তি করেন। সেখানে তাঁকে ৬ দিন থাকতে হয়। তাঁর শারীরিক অবস্থা কিছুটা ভালো হলে তাঁকে রুমে স্থানান্তর করা হয়। তারপর থেকে তাঁকে নিয়মিত থেরাপি দেওয়া হচ্ছে। এখনো তাঁর অবস্থা আশঙ্কামুক্ত নয়। তাঁর স্পাইনাল কর্ডের অবস্থা নাজুক। আবারও তাঁর সার্জারি প্রয়োজন।</p>', 1, 1, '2021-04-16 19:00:11', '2021-04-18 13:44:36'),
(3, 1, 'সব সময় ভেবেছি, আমাকে ঘুরে দাঁড়াতে হবে', 'sb-smy-vebechi-amake-ghure-dannrate-hbe', '{\"post_type\":\"Image\",\"post_title\":\"\\u09b8\\u09ac \\u09b8\\u09ae\\u09df \\u09ad\\u09c7\\u09ac\\u09c7\\u099b\\u09bf, \\u0986\\u09ae\\u09be\\u0995\\u09c7 \\u0998\\u09c1\\u09b0\\u09c7 \\u09a6\\u09be\\u0981\\u09dc\\u09be\\u09a4\\u09c7 \\u09b9\\u09ac\\u09c7\",\"post_image\":\"195f6c3cc1bd9e06776e62955c87b31a.JPG\",\"post_gallery\":[],\"post_video\":\"\",\"post_audio\":null}', '<blockquote>&lsquo;ক্লোজআপ ওয়ান: তোমাকেই খুঁজছে বাংলাদেশ&rsquo; প্রতিযোগিতার দ্বিতীয় আসরের সেরা ১০ প্রতিযোগীর অন্যতম&nbsp;<strong>সাজিয়া সুলতানা পুতুল</strong>। কঠোর লকডাউন ও বাংলা নতুন বছরের সন্ধিক্ষণে বিয়ে করে অভিনন্দন ও শুভেচ্ছায় ভাসছেন তিনি। বিচ্ছেদকালের দুঃসময়, আকস্মিক বিয়ে, ভবিষ্যৎ ভাবনা নিয়ে কথা বললেন এই কণ্ঠশিল্পী।</blockquote>', 1, 0, '2021-04-16 19:06:56', '2021-04-16 19:06:56'),
(4, 1, '‘দ্য ফাদার’–এর সিকুয়েল ‘দ্য সান’', 'dz-fadar-er-sikuyel-dz-san', '{\"post_type\":\"Image\",\"post_title\":\"\\u2018\\u09a6\\u09cd\\u09af \\u09ab\\u09be\\u09a6\\u09be\\u09b0\\u2019\\u2013\\u098f\\u09b0 \\u09b8\\u09bf\\u0995\\u09c1\\u09df\\u09c7\\u09b2 \\u2018\\u09a6\\u09cd\\u09af \\u09b8\\u09be\\u09a8\\u2019\",\"post_image\":\"6c115e868cdd42ebc796ec35cff7c2e5.jpg\",\"post_gallery\":[],\"post_video\":\"\",\"post_audio\":null}', '<p>বাফটা থেকে পুরস্কার এসেছে। গোল্ডেন গ্লোবে মনোনীত হয়েছে। অস্কারের জন্য অপেক্ষা। অভিষেকেই বাজিমাত ফ্লোরিয়ান জেলারের। &lsquo;দ্য ফাদার&rsquo; এখন আলোচনায়। এখনো দুটো আসর বাকি। অস্কারেও হাতভর্তি পুরস্কার আসতে পারে, অনেকেই এমনটা ধারণা করছেন। এরই মধ্যে শোনা গেল, ছবিটির সিকুয়েল আসছে। &lsquo;দ্য সান&rsquo; নামের এই ছবিতে থাকছেন হিউ জ্যাকম্যান ও লরা ডার্ন।</p>', 1, 1, '2021-04-16 19:10:22', '2021-04-18 13:44:28'),
(5, 1, 'বাঙালির গয়নায় পারস্যের মিনাকারি', 'bangalir-gynay-parszer-minakari', '{\"post_type\":\"Image\",\"post_title\":\"\\u09ac\\u09be\\u0999\\u09be\\u09b2\\u09bf\\u09b0 \\u0997\\u09df\\u09a8\\u09be\\u09df \\u09aa\\u09be\\u09b0\\u09b8\\u09cd\\u09af\\u09c7\\u09b0 \\u09ae\\u09bf\\u09a8\\u09be\\u0995\\u09be\\u09b0\\u09bf\",\"post_image\":\"e524aa534646c0a0b85ffdbd6a7552ca.jpg\",\"post_gallery\":[],\"post_video\":\"\",\"post_audio\":null}', '<p>পারস্যের গয়না ও এর তৈরির পদ্ধতি নিয়ে রয়েছে আমাদের অশেষ মুগ্ধতা। অতীতের অনবদ্য এক পদ্ধতি হলো মিনাকারী। আজও রয়েছে এর সমান আকর্ষণ। মিনাকারি নকশা আবেদন এখনও অবিকল আছে এর রাজকীয় অভিজাত্য নিয়ে।</p>\r\n\r\n<p>বিশ্বজুড়ে পারস্যের সৌন্দর্যকথা সুবিদিত। পারস্যের পোশাক-আশাক, বেশভূষা, সাজসজ্জা, গয়না আমাদের সব সময় মোহিত করে। মিল্টনের কথায়, &lsquo;সৌন্দর্য প্রাকৃতিক মুদ্রা, যা কখনো মজুত করে রাখা যায় না।&rsquo; ঠিক তাই অনেক বিষয়েই পারস্যের সঙ্গে বাংলার সাযুজ্য দেখা যায়। পারস্যের সেই নান্দনিকতা, শৈল্পিক সৃষ্টি বিভিন্নভাবে রঙে-রূপে আমাদের নিজস্বতায় উজ্জ্বল হয়ে উঠেছে।</p>\r\n\r\n<p>পারস্যের গয়নার প্রতি আমাদের মুগ্ধতার শেষ নেই। অতীত ও বর্তমানে গয়নার জগতে সবচেয়ে রাজকীয় ও অভিজাত হলো মিনাকারি নকশা। গয়নায় মিনাকারির উৎপত্তি প্রাচীন পারস্যে।</p>', 1, 0, '2021-04-16 19:13:31', '2021-04-16 19:13:31'),
(6, 1, 'করোনা সংক্রমণের তীব্রতা আরও বেড়েছে: আইইডিসিআর', 'krona-sngkrmner-teebrta-aroo-bereche-aiidisiar', '{\"post_type\":\"Image\",\"post_title\":\"\\u0995\\u09b0\\u09cb\\u09a8\\u09be \\u09b8\\u0982\\u0995\\u09cd\\u09b0\\u09ae\\u09a3\\u09c7\\u09b0 \\u09a4\\u09c0\\u09ac\\u09cd\\u09b0\\u09a4\\u09be \\u0986\\u09b0\\u0993 \\u09ac\\u09c7\\u09dc\\u09c7\\u099b\\u09c7: \\u0986\\u0987\\u0987\\u09a1\\u09bf\\u09b8\\u09bf\\u0986\\u09b0\",\"post_image\":\"7b84a8d039c2e5156e35147d624ada46.webp\",\"post_gallery\":[],\"post_video\":\"\",\"post_audio\":null}', '<p>করোনাভাইরাস (কোভিড-১৯) রোগের তীব্রতা আরও বেড়েছে বলে জানিয়েছে রোগতত্ত্ব, রোগনিয়ন্ত্রণ ও গবেষণা প্রতিষ্ঠানের (আইইডিসিআর)। সংস্থাটি বলছে, কোভিড-১৯ রোগীরা খুব দ্রুত মারা যাচ্ছেন।</p>\r\n\r\n<p>শনিবার রাতে আইইডিসিআর এক বুলেটিনে এসব তথ্য জানিয়েছে।</p>\r\n\r\n<p>আইইডিসিআরের তথ্য বলছে, কোভিড-১৯ মহামারিতে গেল মার্চে মৃতের সংখ্যা ছিল ৬৩৮, যা এপ্রিলের প্রথম ১৫ দিনে এসে বেড়ে দাঁড়িয়েছে ৯৪১&ndash;এ। মৃত্যুর সংখ্যা বেড়েছে ৩২ দশমিক ২ শতাংশ।</p>', 1, 1, '2021-04-17 14:36:19', '2021-04-18 13:44:23'),
(7, 1, 'সাগরে মহীসোপানের দাবি বাংলাদেশের, জাতিসংঘে আপত্তি ভারতের', 'sagre-mheesopaner-dabi-bangladeser-jatisngghe-aptti-varter', '{\"post_type\":\"Image\",\"post_title\":\"\\u09b8\\u09be\\u0997\\u09b0\\u09c7 \\u09ae\\u09b9\\u09c0\\u09b8\\u09cb\\u09aa\\u09be\\u09a8\\u09c7\\u09b0 \\u09a6\\u09be\\u09ac\\u09bf \\u09ac\\u09be\\u0982\\u09b2\\u09be\\u09a6\\u09c7\\u09b6\\u09c7\\u09b0, \\u099c\\u09be\\u09a4\\u09bf\\u09b8\\u0982\\u0998\\u09c7 \\u0986\\u09aa\\u09a4\\u09cd\\u09a4\\u09bf \\u09ad\\u09be\\u09b0\\u09a4\\u09c7\\u09b0\",\"post_image\":\"\",\"post_gallery\":[],\"post_video\":\"\",\"post_audio\":null}', '<p>বঙ্গোপসাগরে বাংলাদেশের মহীসোপানের দাবির বিষয়ে জাতিসংঘে আপত্তি তুলেছে ভারত। সমুদ্রপৃষ্ঠের যে বেসলাইনের ভিত্তিতে বাংলাদেশ মহীসোপান নির্ধারণ করেছে, তা ভারতের মহীসোপানের একটি অংশ। তাই ভারত জাতিসংঘের মহীসোপান নির্ধারণবিষয়ক কমিশনে বাংলাদেশের দাবিকে বিবেচনায় না নেওয়ার অনুরোধ জানিয়েছে।</p>\r\n\r\n<p>শুক্রবার জাতিসংঘের মহীসোপান নির্ধারণসংক্রান্ত কমিশনে (সিএলসিএস) ভারত এই আপত্তি জানায়।</p>\r\n\r\n<p>ভারতের আগে এ বছরের জানুয়ারিতে বাংলাদেশের দাবির বিষয়ে পর্যবেক্ষণ দিয়েছে মিয়ানমার। কিন্তু ভারতের মতো বাংলাদেশের দাবির প্রতি আপত্তি জানায়নি দেশটি। বাংলাদেশ আইনগতভাবে মহীসোপানের যতটা প্রাপ্য, তা থেকে নিজেদের অংশ বলে দাবি করছে দুই প্রতিবেশী দেশ। দুই নিকট প্রতিবেশীর বিরোধিতার কারণে বাংলাদেশের মহীসোপানের বিষয়টির এখনো সুরাহা হয়নি।</p>\r\n\r\n<p>প্রসঙ্গত, ২০১১ সালে জাতিসংঘের কাছে মহীসোপানের দাবির বিষয়ে বাংলাদেশ আবেদন জানায়। গত বছরের অক্টোবরে ওই দাবির বিষয়ে সংশোধনী জমা দেয় বাংলাদেশ।</p>', 1, 0, '2021-04-17 14:37:26', '2021-04-17 14:37:26'),
(8, 1, 'খালেদা জিয়ার অবস্থা স্থিতিশীল, মানসিকভাবে শক্ত আছেন', 'khaleda-jizar-obstha-sthitiseel-mansikvabe-skt-achen', '{\"post_type\":\"Image\",\"post_title\":\"\\u0996\\u09be\\u09b2\\u09c7\\u09a6\\u09be \\u099c\\u09bf\\u09af\\u09bc\\u09be\\u09b0 \\u0985\\u09ac\\u09b8\\u09cd\\u09a5\\u09be \\u09b8\\u09cd\\u09a5\\u09bf\\u09a4\\u09bf\\u09b6\\u09c0\\u09b2, \\u09ae\\u09be\\u09a8\\u09b8\\u09bf\\u0995\\u09ad\\u09be\\u09ac\\u09c7 \\u09b6\\u0995\\u09cd\\u09a4 \\u0986\\u099b\\u09c7\\u09a8\",\"post_image\":\"5bacb029a26e537c99f485f1ab6d696d.webp\",\"post_gallery\":[],\"post_video\":\"\",\"post_audio\":null}', '<p>করোনাভাইরাসে আক্রান্ত বিএনপির চেয়ারপারসন খালেদা জিয়ার শারীরিক অবস্থা এখন পর্যন্ত স্থিতিশীল আছে বলে জানিয়েছেন তাঁর চিকিৎসকেরা। চিকিৎসকেরা আরও জানিয়েছেন, এখন পর্যন্ত সবকিছু ঠিকঠাকমতোই হচ্ছে। তিনি মানসিকভাবে অনেক শক্ত আছেন।<br />\r\nআজ শনিবার রাতে খালেদা জিয়ার গুলশানের বাসভবন &lsquo;ফিরোজা&rsquo;য় যান চিকিৎসকেরা। তাঁর শারীরিক অবস্থা দেখে বেরিয়ে এসে চিকিৎসক দলের প্রধান অধ্যাপক এফ এম সিদ্দিকী সাংবাদিকদের এসব কথা বলেন।</p>\r\n\r\n<p>&nbsp;গত শনিবার করোনাভাইরাসের নমুনা পরীক্ষা করেছিলেন খালেদা জিয়া। পরদিন রোববার তাঁর করোনা পজিটিভ আসে। খালেদা জিয়ার বাসভবনে তিনি বাদে আরও আটজন করোনায় আক্রান্ত হয়েছেন।</p>\r\n\r\n<p>মেডিসিন ও বক্ষব্যাধি বিশেষজ্ঞ এফ এম&nbsp;সিদ্দিকী বলেন, গতকাল শুক্রবার সারা দিন খালেদা জিয়ার জ্বর ছিল। তবে আজ শনিবার দিনভর জ্বর আসেনি। সন্ধ্যার পর জ্বর এসেছিল।</p>', 1, 0, '2021-04-17 14:38:46', '2021-04-17 14:38:46'),
(9, 1, 'চীনের আধিপত্য রুখতে একমত যুক্তরাষ্ট্র-জাপান', 'ceener-adhiptz-rukhte-ekmt-zuktrashtr-japan', '{\"post_type\":\"Image\",\"post_title\":\"\\u099a\\u09c0\\u09a8\\u09c7\\u09b0 \\u0986\\u09a7\\u09bf\\u09aa\\u09a4\\u09cd\\u09af \\u09b0\\u09c1\\u0996\\u09a4\\u09c7 \\u098f\\u0995\\u09ae\\u09a4 \\u09af\\u09c1\\u0995\\u09cd\\u09a4\\u09b0\\u09be\\u09b7\\u09cd\\u099f\\u09cd\\u09b0-\\u099c\\u09be\\u09aa\\u09be\\u09a8\",\"post_image\":\"49259b4fdef85ec7c9c02dee76689acd.webp\",\"post_gallery\":[],\"post_video\":\"\",\"post_audio\":null}', '<p>দক্ষিণ ও পূর্ব চীন সাগরে চীনের আধিপত্য ও বলপ্রয়োগের বিরোধিতা করে যাবে যুক্তরাষ্ট্র ও জাপান। যুক্তরাষ্ট্র সফরে গিয়ে চীন বিষয়ে এমন মন্তব্য করেছেন জাপানের প্রধানমন্ত্রী ইয়োশিহিদে সুগা।</p>\r\n\r\n<p><br />\r\nফিন্যান্সিয়াল টাইমস ও সিএনএনের খবরে বলা হয়, শুক্রবার হোয়াইট হাউসে মার্কিন প্রেসিডেন্ট জো বাইডেনের সঙ্গে দেখা করেন জাপানের প্রধানমন্ত্রী। বাইডেনকে পাশে রেখে সুগা বলেন, চীন বিষয়ে ও ইন্দো&ndash;প্যাসিফিক অঞ্চলের সুরক্ষা পরিবেশ নিয়ে তাঁরা দুই নেতা আলোচনা করেছেন।</p>\r\n\r\n<p><br />\r\nমার্কিন প্রেসিডেন্ট বাইডেন বলেন, &lsquo;পূর্ব চীন সাগর, দক্ষিণ চীন সাগরের পাশাপাশি উত্তর কোরিয়ার বিষয়ে এবং চীন থেকে আসা নানা চ্যালেঞ্জ নিয়ে আমরা একসঙ্গে কাজ করব।&rsquo;<br />\r\nসুগা বলেন, &lsquo;আধিপত্য চালিয়ে ও বলপ্রয়োগ করে দক্ষিণ ও পূর্ব চীন সাগরের স্থিতাবস্থা পরিবর্তনের প্রচেষ্টা এবং এ অঞ্চলে অন্যদের যেকোনো ধরনের হুমকির বিরোধিতা করতে আমরা একমত হয়েছি।&rsquo;</p>', 1, 0, '2021-04-17 14:41:11', '2021-04-17 14:41:11'),
(10, 1, 'Banshkhali Power Plant Site:5 workers killed as cops open fire', 'banshkhali-power-plant-site5-workers-killed-as-cops-open-fire', '{\"post_type\":\"Gallery\",\"post_title\":\"Banshkhali Power Plant Site:5 workers killed as cops open fire\",\"post_image\":\"\",\"post_gallery\":[\"ab39b86df1ee7abb0418ca2eee71922d.webp\",\"b4a34e60dcd7edb5dd9562ae666c5171.jpg\",\"aa8b2b0a3682e7876b670164de55c356.jpg\",\"366017d86cbef1a02243bd929ac7ab7b.jfif\",\"5807de07b60079a558a7d7f7107efb3a.jpg\"],\"post_video\":\"\",\"post_audio\":null}', '<p>&quot;But the workers did not believe the police and demanded that high officials from the power plant come and talk to them. A few minutes later, police appeared again and started firing shots in the air to disperse the protesters,&quot; said Miran, whose pants and T-shirt were soaked in blood.</p>\r\n\r\n<p>Later, workers regrouped and started throwing brick chunks at the law enforcers, who had taken position nearby. At this, police started firing indiscriminately, leaving some dead and many other injured, several witnesses told The Daily Star.</p>', 1, 0, '2021-04-17 20:31:16', '2021-04-17 20:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1, NULL, NULL),
(2, 10, 4, NULL, NULL),
(3, 11, 1, NULL, NULL),
(4, 11, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shahnewaj sajib', 'shahnewaj-sajib', 0, '2021-04-12 07:56:55', '2021-04-12 10:05:19'),
(2, 'MST. TOMIYA SULTANA', 'mst-tomiya-sultana', 0, '2021-04-12 08:15:51', '2021-04-12 10:05:00'),
(3, 'Anika Tasmin', 'anika-tasmin', 0, '2021-04-12 08:16:03', '2021-04-12 10:52:19'),
(4, 'Shahnewaj sajib opu', 'shahnewaj-sajib-opu', 0, '2021-04-12 11:28:43', '2021-04-12 12:40:52'),
(5, 'Rana vai tex', 'rana-vai-tex', 0, '2021-04-17 18:58:31', '2021-04-17 18:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone_number`, `username`, `email_verified_at`, `photo`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Shahnewaj sajib', 'sajibsust99@gmail.com', '8801779435375', 'sajib', NULL, NULL, '$2y$10$31lv3rMkJ5x.RZnlit0T/.UE.AmP1lU6EbdOEnz4Z.2CrSPR8WS8a', 1, NULL, '2021-04-09 13:53:23', '2021-04-18 12:57:59'),
(2, NULL, 'Anika Tasmin', 'ani@gmail.com', '8801621527999', 'anika', NULL, NULL, '$2y$10$d34qI1lc3cNCp1Ru6TvMl.blmboyRaHkk8qFzfEqE2x4YaZasyo/K', 1, NULL, '2021-04-09 17:44:39', '2021-04-18 13:01:20'),
(3, NULL, 'MST. TOMIYA SULTANA', 'tomiyasultan@yahoo.com', '8801659537528', 'shikha', NULL, NULL, '$2y$10$JfFR9xf/h46g0lqCoRs62OC.TkW1zq4dbn.4Izy5VXtutEviE4NH6', 1, NULL, '2021-04-09 17:47:41', '2021-04-09 17:47:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
