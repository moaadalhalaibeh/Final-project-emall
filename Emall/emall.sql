-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 07:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emall`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_fullname`) VALUES
(1, 'moaad@gmail.com', '0000', 'moaad alhalaibeh');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_image`) VALUES
(1, 'Men', 'You will find everything related to the man here', 'photo-1504593811423-6dd665756598.jpg'),
(2, 'Women', 'You will find everything related to the women here	', 'photo-1504194921103-f8b80cadd5e4.jpg'),
(3, 'Electronics', 'A wide range of electronics', 'electronics.jpg'),
(4, 'Baby', 'A wide range of baby supplies', 'photo-1522771930-78848d9293e8.jpg'),
(5, 'Watches', 'Variety of watches', 'photo-1533139502658-0198f920d8e8.jpg'),
(6, 'Shoes', 'Variety of shoes', 'photo-1495555961986-6d4c1ecb7be3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(3) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `cust_password` varchar(50) NOT NULL,
  `cust_mobile` varchar(50) NOT NULL,
  `cust_address` varchar(50) NOT NULL,
  `cust_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_email`, `cust_password`, `cust_mobile`, `cust_address`, `cust_image`) VALUES
(1, 'ahmad alhalaibeh', 'ahmad@gmail.com', 'ahmad123', '0784451249', 'zarqa', 'france-in-pictures-beautiful-places-to-photograph-eiffel-tower.jpg'),
(2, 'anas abdulrahim', 'anas@gmail.com', 'anas123', '0781124675', 'amman', 'photo-1579783483458-83d02161294e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(3) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `cust_id` int(3) NOT NULL,
  `vendor_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `cust_id`, `vendor_id`) VALUES
(1, '0000-00-00', 1, 1),
(2, '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_det_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ven_id` text NOT NULL,
  `cust_id` text NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_det_id`, `order_id`, `pro_id`, `qty`, `total`, `ven_id`, `cust_id`, `order_date`) VALUES
(2, 1, 19, 3, 3600, '1', '1', '2021-02-04'),
(3, 1, 11, 1, 1200, '1', '1', '2021-02-04'),
(4, 2, 3, 1, 25, '1', '1', '2021-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(3) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_price` double NOT NULL,
  `pro_image` text NOT NULL,
  `cat_id` int(3) NOT NULL,
  `ven_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_desc`, `pro_price`, `pro_image`, `cat_id`, `ven_id`) VALUES
(1, 'ULTRABOOST DNA X MAHOMES SHOES', 'gold and black adidas shoes', 180, 'ultraboost-dna-x-mahomes-shoes.jpg', 6, '1'),
(2, 'ULTRABOOST DNA SHOES', 'modern shoes 2021', 180, 'Ultraboost_DNA_Shoes_Black_FW8711_012_hover_standard.jpg', 6, '1'),
(3, 'Grandad', 'new T-shirt designed specially for summer', 25, '145861270_1345687945795036_2800131568274921409_n.jpg', 1, '1'),
(4, 'Block Sleeve T-Shirt', 'Stock up on everyday essentials with this soft cotton-rich T-shirt. An update on our best-selling raglan styles it comes with in grey with contrast black sleeves signature embroidery and stripe detailing to the crew neckline and sleeves.', 30, 'S2787859_C109_Alt1.jpg', 1, '1'),
(5, 'Teal Animal Print Tiered Midi Shirt Dress', 'Sashay your way from workdays to weekends in this shirt dress - in a rich shade of teal it comes with a tie belt and front button fastenings together with an elegant tiered skirt that really amps up the glam factor. Finished with a ditsy animal print you can team it with trainers or pair with our chunky Chelsea boots for an effortless wardrobe win.', 45, '1602745080.6219618-S2804931_C671_Alt4.jpg', 2, '1'),
(6, 'Glitter Tie Neck Jumper', 'Get your grip on some glitter with this sparkly black jumper - it s a must-have for any dinner. The lightweight knit s finished with a dramatic neck tie for a formal finish that ll look great in all your festive photoshoots.', 45, 'S2799160_C101_Alt4 (1).jpg', 2, '1'),
(7, 'Girls Frill Dungaree & T-Shirt Set (Newborn-23mths', 'When it comes to cute outfits for baby you can t go wrong with this sweet dungaree set. In pink with frill straps and handy popper fastenings for easy changing it comes complete with a long-sleeved T-shirt to layer underneath.', 32, '1610446631.8679836-S2812203_C323_Alt1.jpg', 4, '1'),
(8, 'Girls Red Cord Dress Top & Headband Set (Newborn-2', 'Your little one will look cute as can be in this spotty dress set. It includes a red cord dress and a long-sleeved white top with embroidered collar to layer underneath accompanied by a matching bow headband for a picture-perfect finishing touch. It makes a lovely outfit for her first parties!', 22, 'S2796978_C333_Alt1.jpg', 4, '1'),
(9, 'Eone Bradley Mesh 36mm Black', 'Now available in a smaller profile, the Bradley Mesh 36mm is crafted from stainless steel and ceramics with a durable stainless steel mesh strap. This timepiece offers a sleek take on the classic 40mm Bradley models.', 315, 'eone-bradley-Bradley_Black_Mesh_36mm_Lifestyle_900x.jpg', 5, '1'),
(10, 'Eone Bradley Classic Rose Gold Mesh II', 'The Bradley is a tactile timepiece that allows you to not only see what time it is, but to feel what time it is. Instead of traditional watch hands, time is indicated by two ball bearings, one indicating minutes (top), and one indicating hours (side). These two ball bearings are connected, with magnets, to a watch movement beneath the watch face.The magnets make it so that even if the ball bearings are moved when touched, they spring back to the correct time with a gentle shake of your wrist.', 450, 'Bradley_Mesh_Rose_Gold_II_1__08218.1529602284.1280.1280_1800x1800.jpg', 5, '1'),
(11, 'iPhone 12 Pro Max', 'iPhone 12 Pro Max Black color 128GB Storage', 1200, 'Apple-iPhone-12-Pro-Max-Pacific-Blue-frontimage.png', 3, '1'),
(12, 'Canon EOS Rebel T8i EF-S 18-55mm is STM Lens Kit, ', '24 1 Megapixel CMOS (APS-C) sensor with is 100–6400 (H: 12800)', 750, '81AUQk0y5vL._AC_SL1500_.jpg', 3, '1'),
(13, 'Taylor & Wright Regular Fit Formal Trousers', 'Taylor & Wright s impeccable tailoring collection provides you with the perfect work and formal wear trouser. The black design features belt loop and pocket detailing.', 17, '1562157613.691461-S2727554_C101_Alt1.jpg', 1, '2'),
(14, 'Premium Check Pyjama Set', 'Lounging just got extra comfy with our premium pyjama set. It includes a pair of woven check pyjama bottoms with an elasticated drawstring waist accompanied by a long-sleeve waffle pyjama top with a ribbed crew neckline. Comfy and cosy it s a real winter must-have!', 35, 'S2799730_C270_Alt1.jpg', 1, '2'),
(15, 'Soft Touch Hoodie', 'Say hello to glorious cosy comfort with our range of soft touch lounge/leisurewear. This pink hoodie has a front pocket drawstring hood and a loose comfy fit - made from our signature super soft material you ll never want to take it off. Pair with the matching joggers for sporty coordination.', 75, 'S2805271_C323_Alt4.jpg', 2, '2'),
(16, 'Super Soft V Neck Jumper', 'Our super soft knitwear collection is snuggly without skimping on style - and this navy V-neck jumper is a real wardrobe must-have. Whether you re wearing it with pyjama bottoms around the house or dressing it up with jeans and jewellery it s a piece you won t want to take off.', 14, 'S2786794_C323_Alt1.jpg', 2, '2'),
(17, 'HP OfficeJet Pro 8025 All-in-One Wireless Printer', 'Upgrade your office– Replacing the HP OfficeJet Pro 6968, this home office printer offers faster printing at 20 pages per minute, includes fast color copy, scan, and fax for increased productivity, and is 14% smaller', 57, '71qmjgFw5FL._AC_SL1500_.jpg', 3, '2'),
(18, 'Acer Aspire 5 A515-55-56VK', '15.6\" Full HD IPS Display, 10th Gen Intel Core i5-1035G1, 8GB DDR4, 256GB NVMe SSD, Intel Wireless WiFi 6 AX201, Fingerprint Reader, Backlit Keyboard, Windows 10 Home', 700, '81AdDRxcO7L._AC._SR360,460.jpg', 3, '2'),
(19, 'Girls Long Sleeve Bunny T-Shirt (Newborn-23mths)', 'Creating cute outfits for your little one is easy with this long-sleeved tee. Made from soft pink cotton it comes with a bunny motif and a frill detail to the hem with 3D pom pom tails adding extra cute points.', 12, 'fasfasfasfasf.PNG', 4, '2'),
(20, 'Girls 3 Pack Leggings (Newborn-23mths)', 'Stock up on comfy essentials for baby with this handy pack of leggings. It includes a mix of plain spot and floral print designs in pretty shades of pink for easy outfit pairing.', 11, 'S2797055_C323_Alt1.jpg', 4, '2'),
(21, 'California Watch Co. Mavericks Chrono SS Silver Or', 'Mavericks is home to the biggest, most powerful wave on the west coast. The Mavericks Collection defines tough, with bold numerals, a unidirectional rotating bezel and a 60 minute chronograph. The watch is water resistant to 10 ATM, and features lume hands that make it ultra-legible whether you re out at night or doing a deep dive. Built-in quick release springbar system allows you to effortlessly swap out straps if you want to change up your look.', 280, 'california-watch-co-lifestyle-mavericks-chrono-1_1800x1800.jpg', 5, '2'),
(22, 'California Watch Co. Venice Beach Digital Clear Wh', 'Southern California Venice Beach is home to a two mile long beachfront boardwalk, quirky street performers, and a skatepark built right on the sand. Our Venice Beach digital collection brings the soul of the boardwalk to your wrist, with colorful accents and a caseback etching of the iconic skatepark.', 80, 'california-watch-co-venice-beach-digital-lifestyle-15_1800x1800.jpg', 5, '2'),
(23, 'Leopard Tab Chunky Sole Trainers', 'Put a sassy spin on sporty dressing with these lace-up trainers. Styled in white PU with a chunky sole they re finished with leopard tab detailing to the ankle for a pop of print. Heel Height: Approx 2 1/2 inch.', 13, '1593675263.2959306-S2784187_CLEO_Alt1.jpg', 6, '2'),
(24, 'Beige Spot Print Trainers', 'Put a standout spin on your daytime looks with these lace-up trainers. Crafted in the classic low-top shape that s easy to team with everything from denim to dresses these trainers come in a versatile shade of taupe with spot panel detailing for a touch of laidback style.', 15, '1596095829.7494557-S2784584_C740_Alt1.jpg', 6, '2');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(3) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `vendor_email` varchar(50) NOT NULL,
  `vendor_password` varchar(50) NOT NULL,
  `vendor_mobile` varchar(50) NOT NULL,
  `vendor_address` varchar(50) NOT NULL,
  `vendor_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `vendor_email`, `vendor_password`, `vendor_mobile`, `vendor_address`, `vendor_image`) VALUES
(1, 'moaad HA', 'moaad@gmail.com', 'moaad123', '0789906924', 'madaba', '47048449_1853863994668448_1460929582386380800_n.jpg'),
(2, 'mohammad alhalaibeh', 'moh@gmail.com', 'moh123', '07784459148', 'mafraq', 'photo-1511367461989-f85a21fda167.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_det_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
