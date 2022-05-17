SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_heading` varchar(255) NOT NULL,
  `article_body` varchar(512) NOT NULL,
  `article_image` varchar(256) NOT NULL,
  `aricle_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `articles` (`article_id`, `article_heading`, `article_body`, `article_image`, `aricle_url`) VALUES
(1, '15 Best Cough Syrups In India', 'Table of Contents BEST COUGH SYRUPS FOR DRY COUGHBENEFITS OF COUGH SYRUPTHINGS TO KEEP IN MIND BEFORE BUYING YOUR DRY COUGH SYRUPHOW TO USE COUGH SYRUPFAQS All of you must have been afflicted with coughs several times. An illness affecting your respiratory system may present with symptoms like cough and sore throat. Cough can be ', 'https://blog-images.pharmeasy.in/2022/05/13221151/6-2.jpg?dim=0x230&dpr=1.25&q=100', 'https://pharmeasy.in/blog/15-best-cough-syrups-in-india/'),
(2, 'Summer Blues? 11 Ways To Cheer You Up', 'Summer, a time associated with fun-filled days in the sun, going to amusement parks and jolly vacations is not always as it looks. Research has proven that several people tend to face SAD or Seasonal affective Disorder during the summers. Although SAD is usually seen in the colder months of winter, a small fraction of ', 'https://blog-images.pharmeasy.in/2022/05/13173506/19-2.jpg?dim=0x230&dpr=1.25&q=100', 'https://pharmeasy.in/blog/summer-blues-11-ways-to-cheer-you-up/'),
(3, '5 Sports You Must Try This Summer', 'The summer season is here and so are your long summer holidays. One of the best ways to take advantage of this season after springing out of winter hibernation is through summer sports. From beginner to challenging, there are a variety of sports to choose from. Sports don’t require you to be an athlete to ', 'https://blog-images.pharmeasy.in/2022/05/13173012/20-1.jpg?dim=0x230&dpr=1.25&q=100', 'https://pharmeasy.in/blog/?p=159408');

-- --------------------------------------------------------


CREATE TABLE `medicines` (
  `medicine_id` int(255) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `medicine_image` varchar(255) NOT NULL,
  `type_id` int(255) NOT NULL,
  `company_id` int(255) NOT NULL,
  `prescription` float NOT NULL,
  `medicine_description` varchar(512) NOT NULL,
  `medicine_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_image`, `type_id`, `company_id`, `prescription`, `medicine_description`, `medicine_price`) VALUES
(1, 'Gelusil Mps Mint Flavour Sugar Free Bottle Of 400ml Liquid', 'https://cdn01.pharmeasy.in/dam/products_otc/I33946/gelusil-mps-mint-flavour-sugar-free-bottle-of-400ml-liquid-2-1641787977.jpg?dim=320x320&dpr=1&q=100', 3, 1, 0, 'Brand: GELUSIL MPS', 199),
(2, 'Alerid 10mg Strip Of 10 Tablets', 'https://cdn01.pharmeasy.in/dam/products/004765/alerid-10mg-strip-of-10-tablets-2-1641534614.jpg?dim=320x320&dpr=1&q=100', 1, 1, 0, 'ANTI-ALLERGIC', 299),
(3, 'Cephadex 250mg Capsule', 'https://cdn01.pharmeasy.in/dam/products/037546/cephadex-250mg-capsule-3-1641535562.jpg?dim=320x320&dpr=1&q=100', 2, 1, 1, 'ANTIBIOTIC', 399),
(4, 'Alcoliv 500mg Tablet', 'https://cdn01.pharmeasy.in/dam/products/004485/alcoliv-500mg-tablet-2-1641534612.jpg?dim=320x320&dpr=1&q=100', 1, 2, 0, 'HEPATOPROTECTIVE', 499),
(5, 'Attentrol 10 Capsule 10\'s', 'https://newassets.apollo247.com/pub/media/catalog/product/a/t/att0001.jpg', 2, 2, 1, 'Attention deficit hyperactivity disorder (ADHD)', 599),
(6, 'Levipil Syrup 100 ml', 'https://newassets.apollo247.com/pub/media/catalog/product/l/e/lev0132.jpg', 3, 2, 0, 'Epilepsy/Seizures', 699),
(7, 'Abacavir 300mg Tablets', 'https://4.imimg.com/data4/EA/TK/ANDROID-7293429/product-500x500.jpeg', 1, 3, 0, '(HIV) infection', 799),
(10, 'Becozinc H Syrup', 'https://onemg.gumlet.io/image/upload/l_watermark_346,w_690,h_700/a_ignore,w_690,h_700,c_pad,q_auto,f_auto/v1625648416/hust4ejsc4e9rxwrac7b.jpg', 3, 4, 0, 'vitamin B deficiency', 99),
(11, 'Dr Reddy Pain Relief Ointment Tube Of 30 G', 'https://cdn01.pharmeasy.in/dam/products_otc/I32521/dr-ortho-pain-relief-ointment-tube-of-30-g-2-1641787970.jpg?dim=320x320&dpr=1&q=100', 4, 4, 0, 'Pain Relief Ointment', 299);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_companies`
--

CREATE TABLE `medicine_companies` (
  `company_id` int(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `medicine_companies` (`company_id`, `company_name`, `company_image`) VALUES
(1, 'Cipla', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi3E57ich7fviRE6Mpjvr4HrbhHk2xvx_wfg&usqp=CAU'),
(2, 'Sun Pharma', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ893vnJE7F2oLgWP2qA5SvrbJYJQhVOWs_pA&usqp=CAU'),
(3, 'Aurobindo', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2bgucc7s30CaJrKD0yOmZybNrf0aVkdLIYA&usqp=CAU'),
(4, 'Dr. Reddy', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRUI-xb4XuliBBDZ9Mxq2MHCKqh2kMFO2EkA&usqp=CAU');

-- --------------------------------------------------------



CREATE TABLE `medicine_types` (
  `type_id` int(255) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `medicine_types` (`type_id`, `type_name`, `type_image`) VALUES
(1, 'Tablet', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQe1XEuqG8O3ioi3Wf756OXJ_NRFFTHU7ATpw&usqp=CAU'),
(2, 'Capsule', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSN9YOQ_3pFWjTQZAEh-CXmh7rOxOuIy27a4w&usqp=CAU'),
(3, 'Syrup', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZPSw69bu7D1EBgSjfVZyrKfzCz_HPS5GehQ&usqp=CAU'),
(4, 'Ointment', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmCjCXa0PkJ_aXxOiHN4s_UFn-yLVOzfnr9w&usqp=CAU');

-- --------------------------------------------------------

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_img` varchar(1024) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_cat_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_img`, `product_desc`, `product_cat_id`) VALUES
(1, 'Evecare Refreshing Intimate Wash For Women - 90ml', 138, 'https://cdn01.pharmeasy.in/dam/products_otc/G59900/evecare-refreshing-intimate-wash-for-women-90ml-6.2-1646136006.jpg,https://cdn01.pharmeasy.in/dam/products_otc/G59900/evecare-refreshing-intimate-wash-for-women-90ml-6.1-1646135996.jpg,https://cdn01.pharmeasy.in/dam/products_otc/G59900/evecare-refreshing-intimate-wash-for-women-90ml-6.3-1646136004.jpg', '', 1),
(2, 'Liveasy Wellness Calcium, Magnesium, Vitamin D3 & Zinc - Bones & Dental Health - Bottle 60 Tabs', 299, 'https://cdn01.pharmeasy.in/dam/products_otc/T22634/liveasy-wellness-calcium-magnesium-vitamin-d3-zinc-bones-dental-health-bottle-60-tabs-2-1643876895.jpg,https://cdn01.pharmeasy.in/dam/products_otc/T22634/liveasy-wellness-calcium-magnesium-vitamin-d3-zinc-bones-dental-health-bottle-60-tabs-3-1643876743.jpg,https://cdn01.pharmeasy.in/dam/products_otc/T22634/liveasy-wellness-calcium-magnesium-vitamin-d3-zinc-bones-dental-health-bottle-60-tabs-6.1-1643876934.jpg', '', 1),
(3, 'Lotus Professional Phyto-Rx Intensive Repair Anti-Ageing Serum, 30 Ml', 756, 'https://cdn01.pharmeasy.in/dam/products_otc/K63541/lotus-professional-phyto-rx-intensive-repair-anti-ageing-serum-30-ml-2-1641795452.jpg,https://cdn01.pharmeasy.in/dam/products_otc/K63541/lotus-professional-phyto-rx-intensive-repair-anti-ageing-serum-30-ml-6.1-1641795457.jpg,https://cdn01.pharmeasy.in/dam/products_otc/K63541/lotus-professional-phyto-rx-intensive-repair-anti-ageing-serum-30-ml-6.4-1641795460.jpg', '', 1),
(4, 'Everherb Karela Jamun Juice - Helps Maintains Healthy Sugar Levels -Helps In Weight Management - 1l', 199, 'https://cdn01.pharmeasy.in/dam/products_otc/L79986/everherb-karela-jamun-juice-helps-maintains-healthy-sugar-levels-helps-in-weight-management-1l-2-1643879977.jpg,https://cdn01.pharmeasy.in/dam/products_otc/L79986/everherb-karela-jamun-juice-helps-maintains-healthy-sugar-levels-helps-in-weight-management-1l-3-1643880092.jpg,https://cdn01.pharmeasy.in/dam/products_otc/L79986/everherb-karela-jamun-juice-helps-maintains-healthy-sugar-levels-helps-in-weight-management-1l-7-1643879975.jpg', '', 2),
(5, 'Pediasure 7+ Chocolate Refill - 400 Gm', 386, 'https://cdn01.pharmeasy.in/dam/products_otc/G76529/pediasure-7-chocolate-refill-400-gm-1-1641789668.jpg,https://cdn01.pharmeasy.in/dam/products_otc/G76529/pediasure-7-chocolate-refill-400-gm-4-1641789679.jpg,https://cdn01.pharmeasy.in/dam/products_otc/G76529/pediasure-7-chocolate-refill-400-gm-6.1-1641789672.jpg', '', 2),
(6, 'B-Protin Chocolate Nutrition Supplement Bottle Of 500 G', 446, 'https://cdn01.pharmeasy.in/dam/products_otc/264323/b-protin-chocolate-nutrition-supplement-bottle-of-500-g-2-1643884078.jpg,https://cdn01.pharmeasy.in/dam/products_otc/264323/b-protin-chocolate-nutrition-supplement-bottle-of-500-g-3-1643883540.jpg,https://cdn01.pharmeasy.in/dam/products_otc/264323/b-protin-chocolate-nutrition-supplement-bottle-of-500-g-6.1-1643883043.jpg', '', 2);

-- --------------------------------------------------------


CREATE TABLE `product_category` (
  `cat_id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `product_category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(1, 'Personal Care', 'https://cdn01.pharmeasy.in/dam/discovery/categoryImages/6256cbe92e3d386bb0293463b5928a2f.png'),
(2, 'Health Food and Drinks', 'https://cdn01.pharmeasy.in/dam/discovery/categoryImages/8106fc397f383ea08c774b4b44861a3f.png'),
(3, 'Skin Care', 'https://cdn01.pharmeasy.in/dam/discovery/categoryImages/16f3bef17dc730f89f381ed41ecb8000.png'),
(4, 'Home Care', 'https://cdn01.pharmeasy.in/dam/discovery/categoryImages/90931d91f15d326a9e439479d683e308.png'),
(5, 'Ayurvedic Care', 'https://cdn01.pharmeasy.in/dam/discovery/categoryImages/38b06b7e36883b49814d93076c5bf982.png'),
(6, 'Fitness & Supplements', 'https://cdn01.pharmeasy.in/dam/discovery/categoryImages/5f1f108206f43522b37c2e69070f8295.png'),
(7, 'Mother and Baby Care', 'https://cdn01.pharmeasy.in/dam/discovery/categoryImages/8a416183822c33b392b5b4bfdac1a114.png'),
(8, 'Healthcare Devices', 'https://cdn01.pharmeasy.in/dam/discovery/categoryImages/b276b1a47a1538bf85cac04573dae05a.png'),
(9, 'Covid Essentials', 'https://cdn01.pharmeasy.in/dam/discovery/categoryImages/50044c74b6c33b4baca34b57cc69af3e.png'),
(10, 'Beauty', 'https://cdn01.pharmeasy.in/dam/discovery/categoryImages/64e2a560805f3c0c91bb63a7f64f71df.jpg'),
(11, 'Elderly Care', 'https://cdn01.pharmeasy.in/dam/discovery/categoryImages/d97ea33273a530a493b73c61d28a609b.png'),
(12, 'Accessories and Wearables', 'https://cdn01.pharmeasy.in/dam/discovery/categoryImages/f0c48bce571139dab2349cdf45b84b29.png');

-- --------------------------------------------------------



CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `users` (`user_id`, `user_email`, `user_password`) VALUES
(1, 'abc@gmail.com', '$2y$10$T6booCz0Hab/BSbET8/CNuF3C6ISom7j2WHoTREb8pJ6SLQYUymYC'),
(2, 'abc2@gmail.com', '$2y$10$6ZEGk35r.ZoifezHmKB/gu3M5cCTQHYgWcvJ/ov4Jcw701MzVz8rW');


ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);


ALTER TABLE `medicines`
  ADD PRIMARY KEY (`medicine_id`);


ALTER TABLE `medicine_companies`
  ADD PRIMARY KEY (`company_id`);


ALTER TABLE `medicine_types`
  ADD PRIMARY KEY (`type_id`);


ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);


ALTER TABLE `product_category`
  ADD PRIMARY KEY (`cat_id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `medicines`
  MODIFY `medicine_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `medicine_companies`
  MODIFY `company_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `medicine_types`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `product_category`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
