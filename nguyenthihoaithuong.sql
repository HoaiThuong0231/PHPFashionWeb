-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 23, 2024 lúc 03:14 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nguyenthihoaithuong`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`) VALUES
(1, 'Thời trang nam', '0000-00-00 00:00:00'),
(2, 'Thời trang nữ', '0000-00-00 00:00:00'),
(3, 'Phụ kiện', '0000-00-00 00:00:00'),
(4, 'Túi xách', '2023-10-07 12:44:30'),
(5, 'Giày dép', '2023-11-09 00:01:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `receiverName` text NOT NULL,
  `receiverPhone` int(11) NOT NULL,
  `receiverAddress` text NOT NULL,
  `receiverEmail` text NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`Id`, `user_Id`, `receiverName`, `receiverPhone`, `receiverAddress`, `receiverEmail`, `order_date`) VALUES
(11, 49, 'Hoàng Long đẹp trai', 462956316, 'Hồ Chí Minh', 'royaldragonit@gmail.com', '2023-11-09'),
(12, 49, 'Hoàng Long đẹp trai', 462956316, 'Hồ Chí Minh', 'royaldragonit@gmail.com', '2023-11-09'),
(13, 49, 'Hoàng Long đẹp trai', 462956316, 'Hồ Chí Minh', 'royaldragonit@gmail.com', '2023-11-09'),
(14, 49, 'Hoài Thương', 462956316, 'Hồ Chí Minh', 'royaldragonit@gmail.com', '2023-11-09'),
(15, 49, 'Hoài Thương', 462956316, 'Hồ Chí Minh', 'royaldragonit@gmail.com', '2023-11-09'),
(16, 49, 'Hoài Thương', 462956316, 'Hồ Chí Minh', 'royaldragonit@gmail.com', '2023-11-09'),
(17, 71, 'abbbb', 334972877, 'Bà Rịa Vũng Tàu', 'phamconghieu3380@gmail.com', '2023-11-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`, `total_price`) VALUES
(11, 1, 0, 1800000, 0),
(11, 8, 1, 45000000, 0),
(11, 72, 1, 130000000, 0),
(12, 1, 1, 1800000, 0),
(12, 8, 1, 45000000, 0),
(12, 72, 1, 130000000, 0),
(13, 1, 4, 1800000, 7200000),
(13, 8, 3, 45000000, 135000000),
(13, 72, 2, 130000000, 260000000),
(14, 2, 1, 2800000, 2800000),
(14, 72, 1, 130000000, 130000000),
(15, 2, 1, 2800000, 2800000),
(15, 72, 1, 130000000, 130000000),
(16, 2, 1, 2800000, 2800000),
(16, 72, 1, 130000000, 130000000),
(17, 2, 1, 2800000, 2800000),
(17, 71, 1, 6800000, 6800000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_id` varchar(50) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `is_on_sale` tinyint(1) DEFAULT 0,
  `sale_price` float DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `cat_id`, `image`, `price`, `description`, `is_on_sale`, `sale_price`, `created_at`, `views`) VALUES
(1, 'SHIRT DRESS WITH CD BUTTONS', '2', 'dress01.png', 2000000, '<p>The shirt dress reframes the House\'s hallmark silhouette with the collection\'s codes of elegance. Crafted in lightweight black wool and silk, it features a flared cut enhanced by frill details as well as a tonal tie at the waist. Christian Dior Paris buttons, revealing a star adorned with a resin pearl, delicately adorn the neckline. The dress can be worn with a variety of pieces from the Dior wardrobe for an elegant outfit.</p>\r\n\r\n<p>-Tied belt and frills at waist\r\nFront button closure<br>\r\n-Christian Dior Paris buttons with resin pearl detail<br>\r\n-Lined<br>\r\n-77% wool, 23% silk<br>\r\n-Made in France<br></p>\r\n', 1, 1800000, '0000-00-00 00:00:00', 28),
(2, 'MID-LENGTH DRAPED DRESS', '2', 'dress02.png', 3000000, '<p>The mid-length dress is a hallmark Dior silhouette revisited with the House\'s modern codes of elegance. Crafted in beige cotton gabardine, it features a flared silhouette with thin straps and is accented by a draped effect. The mid-length dress can be worn with the matching peacoat to complete the look.</p>\n\n<p>-Back zip closure<br>\n-Draped effect<br>\n-Unlined<br>\n-100% cotton<br>\n-Made in Italy<br></p>', 1, 2800000, NULL, 9),
(3, 'FLARED DRESS & PUFF SLEEVES', '2', 'dress03.png', 15000000, '<p>The dress showcases the black and white Houndstooth motif. Crafted in lightweight wool, it is distinguished by a flared silhouette adorned with a belt that defines the waist, as well as short puff sleeves that lend a retro touch. The flared dress will complete elegant and refined looks.</p>\r\n\r\n<p>-Tonal belt<br>\r\n-Front button closure<br>\r\n-Horn buttons<br>\r\n-Lined<br>\r\n-100% wool<br>\r\n-Made in France<br></p>', 1, 14000000, '0000-00-00 00:00:00', 3),
(4, 'SHORT DRESS', '2', 'dress04.png', 35000000, '<p>The dress showcases the season\'s signature Plan de Paris motif, inspired by House archives and centered around Dior\'s historic address on Avenue Montaigne. Crafted in compact white and black technical mesh, it is distinguished by its straight cut and short sleeves, as well as by the Christian Dior signature on the front. The dress can be worn with other Plan de Paris creations to complete the look.</p>\r\n<p>-83% viscose, 17% polyester (18-gauge)*<br>\r\n-Made in Italy<br>\r\n</p>\r\n<p>*This garment is crafted in a lightweight knit.</p>', 1, 32000000, NULL, 2),
(5, 'WHITE DRESS', '2', 'dress05.png', 19000000, 'SPECIAL DRESS WITH WHITE COLOR', 1, 17000000, '0000-00-00 00:00:00', 2),
(6, 'DRESS WITH BELT', '2', 'dress06.png', 27000000, '<p>The dress is distinguished by its casual, knee-length silhouette. Crafted in beige cotton gabardine, it features a flared cut enhanced by a utilitarian-inspired belt that highlights the waist, while a zip closure and flap patch pockets accentuate the laid-back appeal. The versatile dress can be paired with sneakers or boots for a contemporary look.</p>\n<p>-Embroidered bee emblem<br>\n-Technical fabric belt with metallic buckle<br>\n-Front zip closure<br>\n-Unlined<br>\n-100% cotton<br>\n-Made in Italy<br>\n</p>\n', 1, 25000000, NULL, 2),
(7, 'SHORT BELTED SHIRT DRESS', '2', 'dress07.png', 22000000, '<p>The cropped shirt dress combines elegance and modernity. Crafted in pink lightweight wool and silk, it is distinguished by a flared cut embellished with Dior Tribales buttons, showcasing a resin pearl and CD signature inspired by the iconic House earring. Completed with a tonal belt highlighting the waist, the short-sleeved dress will create contemporary, refined looks.</p>\r\n<p>-Tonal belt<br>\r\n-Dior Tribales button closure<br>\r\n-Lined<br>\r\n-77% wool, 23% silk<br>\r\n-Made in France<br>\r\n-We recommend removing the accessories before cleaning<br>\r\n</p>\r\n', 1, 20000000, NULL, 2),
(8, 'FITTED DRESS &\'CD\' BUTTONS', '2', 'dress08.png', 50000000, '<p>The black short-sleeved dress has a refined silhouette. Cut in lightweight wool and silk, it has a cropped silhouette that accentuates the waist. Three \'CD\' buttons enhance the neckline and lend a refined touch to the piece. The versatile dress can be worn with numerous pieces from the Dior wardrobe for an elegant style.</p>\r\n<p>-Spread collar<br>\r\n-\'CD\' buttons<br>\r\n-Short sleeves<br>\r\n-Tonal lining<br>\r\n-77% wool, 23% silk<br>\r\n-Made in Italy<br>\r\n</p>\r\n', 1, 45000000, NULL, 5),
(11, 'Shirt Blue Striped Cotton Poplin', '1', 'shirt01.png', 30000000, 'New for Spring 2024, the shirt showcases the signature Christian Dior Rue François 1er Paris 1947 print, an homage to House heritage with a key date and historic address for Dior. Crafted in blue cotton poplin with stripes, it features an oversized silhouette with a patch pocket on the chest and a shirttail hem. The shirt can be worn with seasonal pants for a contemporary outfit.<br><br>\r\n\r\n- Christian Dior Rue François 1er Paris 1947 print\r\n- Collar: 6.5 cm / 2.5 inches\r\n- Patch pocket\r\n- Mother-of-pearl buttons\r\n- 100% cotton\r\n- Made in Italy', 1, 28000000, NULL, 4),
(12, 'Shirt Pink Cotton Twill', '1', 'shirt02.png', 36000000, 'New for Spring 2024, the shirt offers a contemporary take on a timeless piece. Crafted in pink cotton twill, it is enhanced by a contrasting Dior embroidery on the chest, as well as an oversized silhouette that\'s both chic and laid-back. The placket with mother-of-pearl buttons lends a classic touch. The shirt can pair effortlessly with any pants to complete an elegant look.<br><br>\n\n- Contrasting Dior embroidery on the chest<br>\n- Collar: 6.5 cm / 2.5 inches<br>\n- Mother-of-pearl buttons<br>\n- 100% cotton<br>\n- Made in Italy<br>', NULL, NULL, '0000-00-00 00:00:00', 5),
(13, 'MKII-EFFECT OVERSHIRT', '1', 'shirt03.png', 50000000, '<p>New for Spring 2024, the overshirt offers a casual silhouette with a contemporary aesthetic. Crafted in beige cotton twill, the style is distinguished by a graphic deep blue all-over MKII effect, making each item unique. The laid-back overshirt will create a coordinated pair with the matching Carpenter-effect pants.<p/>\r\n\r\n- Deep blue all-over MKII print<br>\r\n- Dior-engraved metal buttons<br>\r\n- 100% organic cotton<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 1),
(14, 'OVERSHIRT', '1', 'shirt04.png', 31000000, 'The overshirt showcases an environmentally innovative denim fabric made from regenerative agriculture. Crafted in blue cotton twill, it is laser-faded with an eco-responsible approach that reduces the use of water during production. Displaying a vintage effect, the style is enhanced by a Dior-embossed leather tag on the chest and back. The overshirt can be worn with the matching jeans to complete a modern look.<br>\r\nFor lasting care, follow the care instructions on the garment’s tag. So as to preserve its quality, wash the overshirt inside out, as little as possible and dry flat in open air. Your denim will lighten over time and become a unique piece.<br>\r\nCare: Do not wash the garment above 30 °C (86 °F), bleach it, iron it above 100 °C (212 °F) or tumble dry. Dry clean normally.<br><br>\r\n- Dior-embossed leather tag on the chest and back <br>\r\n- Chest pocket<br>\r\n- Metal buttons with Dior signature<br>\r\n- Laser-faded<br>\r\n- Vintage effect<br>\r\n- 88% ROC* cotton, 11% polyester, 1% elastane<br>\r\n- Medium-weight denim – 11 oz<br>\r\n- Made in Italy<br>', 1, 25000000, NULL, 0),
(15, 'DIOR OBLIQUE SHORT-SLEEVED SHIRT', '1', 'shirt05.png', 27000000, 'The gray short-sleeved shirt highlights the House\'s hallmark Dior Oblique motif. Crafted in silk twill, the design has a comfortable fit and straight hem for a relaxed style. The creation can be paired with the matching Bermuda shorts to complete the look.<br><br>\r\n\r\n- Gray all-over Dior Oblique print<br>\r\n- Collar: 5.5 cm / 2 inches<br>\r\n- Concealed button placket<br>\r\n- Mother-of-pearl buttons with Dior signature<br>\r\n- Short sleeves<br>\r\n- Straight hem with side vents<br>\r\n- 100% organic silk<br>\r\n- Made in Italy<br>\r\n\r\n', 1, 30000000, NULL, 1),
(16, 'CD DIAMOND SHIRT', '1', 'shirt06.png', 25000000, 'Tailoring is at the heart of House heritage and is the very essence of the Dior ateliers\' savoir-faire. Celebrating this unique expertise, Kim Jones, Creative Director of Dior Men, reimagines the codes of elegance of an iconic Dior silhouette: the classic shirt. Crafted in soft and breathable light blue cotton jacquard, it is further embellished with a tonal all-over CD Diamond motif with a matte finish that lends it texture. An essential men\'s wardrobe item, it can be coordinated with a suit to complete a modern formal Dior look.<br><br>\r\n\r\n- Tonal all-over CD Diamond jacquard<br>\r\n- Collar: 6.5 cm / 2.5 inches<br>\r\n- Concealed button placket<br>\r\n- Mother-of-pearl buttons with Dior signature<br>\r\n- Shirttail hem<br>\r\n- 100% cotton<br>\r\n- Made in Italy<br>', 1, 30000000, NULL, 0),
(17, 'SHIRT WITH DIOR EMBROIDERY', '1', 'shirt07.png', 26000000, 'Quintessential savoir-faire from Dior ateliers, tailoring is at the heart of House heritage. Crafted in soft and light white cotton poplin, the shirt is distinguished by its collar embroidered with a black Dior signature in handwritten letters. The hallmark item can be worn with a suit for a modern, formal and total Dior look.<br><br>\r\n\r\n- Black Dior signature embroidery on the collar<br>\r\n- Collar: 5.5 cm / 2 inches<br>\r\n- Concealed button placket<br>\r\n- Mother-of-pearl buttons with Dior signature<br>\r\n- Hallmark stitching on the back<br>\r\n- Shirttail hem<br>\r\n- 100% cotton 120/2<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(18, 'DIOR OBLIQUE OVERSHIRT', '1', 'shirt08.png', 37000000, 'The overshirt is a modern hallmark piece. Crafted in raw blue cotton denim, it has a Dior Oblique motif printed on the interior. The style can pair with the matching jeans to complete the look.<br><br>\r\n\r\n- White all-over Dior Oblique print on the interior<br>\r\n- Interior chest pocket<br>\r\n- Metal buttons with \'DIOR\' signature<br>\r\n- Straight hem<br>\r\n- 83% cotton, 16% polyester, 1% elastane<br>\r\n- Made in Italy<br>', 0, NULL, NULL, 1),
(19, 'DIOR MÉTAMORPHOSE BELT', '3', 'belt01.png', 18500000, 'New for the Cruise 2024 collection, the Dior Métamorphose belt suggests transformation, evolution and freedom through a signature animal from the collection. Crafted in black ultrasmooth calfskin, the belt is adorned with a buckle in the shape of a butterfly, carefully made in matte gold-finish metal and enhanced by the CD signature. Highlighting the waist with elegance, the timeless accessory will pair effortlessly with jeans, a skirt or a dress.\r\n- CD butterfly buckle\r\n- Christian Dior Paris signature on the interior\r\n- Matte gold-finish metal detailing\r\n- 100% calfskin\r\n- Made in Italy', NULL, NULL, NULL, 0),
(20, 'FOREVER DIOR REVERSIBLE BELT', '3', 'belt02.png', 20500000, 'New for the Cruise 2024 collection, the Forever Dior belt pays tribute to the collection\'s key signature. Crafted in black smooth calfskin on one side and latte on the other, it is enhanced by a gold-finish metal CD Forever Dior buckle with shiny double-satin finish. Equipped with a swivel feature, the design also features two removable loops that can be worn in an either tonal or contrasting fashion. Both modern and timeless, the thin silhouette will pair effortlessly with jeans, a skirt or a dress.\r\n\r\n- CD Forever Dior buckle\r\n- Shiny gold- and satin-finish metal detailing\r\n- Two removable loops\r\n- 100% calfskin\r\n- Made in Italy', NULL, NULL, NULL, 0),
(21, '30 MONTAIGNE REVERSIBLE BELT', '3', 'belt03.png', 23500000, 'Inspired by the hallmark namesake bag, the 30 Montaigne belt is offered in a reversible variation, thanks to its swivel feature. Crafted in black smooth calfskin on one side and latte smooth calfskin on the other, it is embellished with the iconic shiny gold-finish metal \'CD\' buckle. The design also features two removable loops that can be worn in an either tonal or contrasting fashion. The timeless accessory elegantly highlights the waist and will coordinate well with jeans, a skirt or a dress. \r\n- 30 Montaigne \'CD\' buckle \r\n- Shiny gold-finish metal detailing \r\n- Two removable loops \r\n- 100% calfskin \r\n- Made in Italy', NULL, NULL, NULL, 0),
(22, '30 MONTAIGNE REVERSIBLE BELT', '3', 'belt04.png', 21000000, 'Inspired by the hallmark namesake bag, the 30 Montaigne belt is available in a reversible variation, thanks to its swivel feature. Crafted in smooth calfskin with pastel midnight blue on one side and powder pink on the other, it is embellished with the iconic shiny gold-finish metal CD buckle. The design also features two removable loops that can be worn in an either tonal or contrasting fashion. The timeless accessory elegantly highlights the waist and will pair effortlessly with jeans, a skirt or a dress.\r\n\r\n- 30 Montaigne CD buckle\r\n- Shiny gold-finish metal detailing\r\n- Two removable loops\r\n- 100% calfskin\r\n- Made in Italy', 1, 19000000, NULL, 0),
(23, 'D-FENCE REVERSIBLE BELT', '3', 'belt05.png', 22500000, 'A bold and elegant look, the D-Fence belt is available in a reversible variation thanks to its removable buckle. Crafted in smooth calfskin featuring golden saddle on one side and black on the other, the style is enhanced by an antique gold-finish metal Dior buckle. The design also features two removable loops that can be worn in an either tonal or contrasting fashion. Highlighting the waist with elegance, the belt will coordinate well with jeans, a skirt or a dress.\r\n\r\n- Removable D-Fence Dior buckle\r\n- Antique gold-finish metal detailing\r\n- Two removable loops\r\n- 100% calfskin\r\n- Made in Italy', NULL, NULL, NULL, 0),
(24, 'DIOR CARO BELT\r\n', '3', 'belt06.png', 35000000, 'New for the Summer 2023 season, the Dior Caro belt draws inspiration from the namesake bag. Crafted in black smooth calfskin, it showcases a hand-assembled chain accented with white glass pearls and a new CD buckle in pale gold-finish metal. Featuring an elegant sliding system in the back that offers an adjustable fit, the belt will lend a touch of refinement to a Bar Jacket, a dress or jeans.\r\n\r\n- 30 Montaigne CD buckle\r\n- Christian Dior Paris signature on the interior\r\n- Chain with white glass pearls\r\n- The back slides to allow an adjustable fit\r\n- Pale gold-finish metal detailing\r\n- 100% calfskin\r\n- Made in Italy', 1, 42000000, NULL, 1),
(25, 'MISS DIOR BELT', '3', 'belt07.png', 22000000, 'New for Winter 2023, the Miss Dior belt is inspired by the iconic Lady Dior bag. Crafted in powder pink smooth calfskin, it features a CD pin buckle and a ring suspending the line\'s hallmark D.I.O.R. charm in pale gold-finish metal. The belt will lend an elegant and timeless touch to a Bar Jacket, dress or jeans.\r\n\r\n- CD pin buckle\r\n- Christian Dior Paris signature on the - interior\r\n- Pale gold-finish metal detailing\r\n- Pale gold-finish metal D.I.O.R. charm\r\n- 100% calfskin\r\n- Made in Italy', NULL, NULL, NULL, 0),
(26, '30 MONTAIGNE BELT', '3', 'belt08.png', 54000000, 'Revealed at the Fall-Winter 2023-2024 fashion show, the 30 Montaigne belt is inspired by the hallmark namesake bag. Showcasing the House\'s exceptional savoir-faire, the black smooth calfskin style presents meticulously crafted leather flowers delicately hand-embroidered onto the belt. The unique design stands out with a shiny gold-finish metal CD buckle embellished with black resin and further adorned by hand-applied white resin pearls. Elegant and sophisticated, the belt will lend a couture touch to a Bar Jacket, dress or jeans.\r\n\r\n- 30 Montaigne CD buckle\r\n- Shiny gold-finish metal detailing\r\n- White resin pearls\r\n- Black resin\r\n- 100% calfskin\r\n- Made in Italy\r\n- Runway Look 36', NULL, NULL, NULL, 0),
(27, 'White Butterfly Sunglasses', '3', 'glasses01.png', 15412000, 'The CDior B2U sunglasses offer a new take on the House\'s CD signature. The butterfly frame in white acetate is enhanced by a gold-finish metal CD hinge inspired by the 30 Montaigne jewelry collection. Completed by gray lenses, the new essential style will elevate all looks with a touch of sophistication.<br><br>\r\n\r\n- White acetate frame<br>\r\n- Gray lenses<br>\r\n- Christian Dior signature on the left lens<br>\r\n- Christian Dior Paris signature on the temples<br>\r\n- Gold-finish metal signature hinge<br>\r\n- 100% UVA/UVB protection<br>\r\n- Filter category: 3<br>\r\n- Suitable for prescription<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(29, 'Black Butterfly Sunglasses', '3', 'glasses02.png', 15412000, 'Shown at the Fall-Winter 2023-2024 fashion show, the CDior B1U sunglasses offer a new take on the House\'s CD signature. The low butterfly frame in black acetate is enhanced by a gold-finish metal CD hinge inspired by the 30 Montaigne jewelry collection. Completed by gray lenses, the new essential style will elevate all looks with a touch of modern sophistication.<br><br>\r\n\r\n- Black acetate frame<br>\r\n- Gray lenses<br>\r\n- Christian Dior signature on the left lens<br>\r\n- Christian Dior Paris signature on the temples<br>\r\n- Gold-finish metal signature hinge<br>\r\n- 100% UVA/UVB protection<br>\r\n- Filter category: 3<br>\r\n- Suitable for prescription<br>\r\n- Made in Italy<br>\r\n- Runway Looks 2, 14, 31, 66 and 86<br>', NULL, NULL, NULL, 0),
(30, 'D-BOBBY BUCKET HAT', '3', 'hat01.png', 26500000, 'The D-Bobby bucket hat is crafted in beige and blue technical cotton fully embroidered with the Macrocannage motif. The style is enhanced by a contrasting band embroidered with the Christian Dior Paris signature. The small brim bucket hat will lend the finishing touch to daytime attire.<br><br>\r\n\r\n- Beige and blue Macrocannage embroidered motif<br>\r\n- Contrasting embroidered band with Christian Dior Paris signature<br>\r\n- Small brim<br>\r\n- 95% cotton, 5% polypropylene<br>\r\n- Made in Italy<br>\r\n', 1, 22500000, NULL, 0),
(31, 'D-BOBBY BUTTERFLY BUCKET HAT', '3', 'hat02.png', 2650000, 'The D-Bobby bucket hat features the Toile de Jouy Mexico motif by Pietro Ruffo, showcasing butterflies and traditional Mexican flowers in a concert of colors. Crafted in white and pastel midnight blue fully embroidered cotton, the style is enhanced by a contrasting band embroidered with the Christian Dior Paris signature. Colorful and refined, the small brim bucket hat will lend the finishing touch to daytime outfits and can be coordinated with other Toile de Jouy Mexico creations from the collection.<br><br>\r\n\r\n- White and pastel midnight blue Toile de Jouy Mexico embroidered motif<br>\r\n- Contrasting embroidered band with Christian Dior Paris signature<br>\r\n- Small brim<br>\r\n- 95% cotton, 5% polypropylene<br>\r\n- Made in Italy<br>\r\n', NULL, NULL, NULL, 0),
(32, 'MEDIUM LADY D-LITE BAG', '4', 'bag01.png', 145000000, 'The Lady D-Lite bag combines classic elegance with House modernity. The style is fully embroidered with a white multicolor Toile de Jouy Mexico motif by Pietro Ruffo, showcasing butterflies and traditional Mexican flowers in a concert of colors. A Christian Dior Paris signature adorns the front, while D.I.O.R. charms in pale gold-finish metal enhance and highlight the silhouette. Featuring a wide, removable embroidered shoulder strap, the medium Lady D-Lite bag can be carried by hand or worn crossbody.<br><br>\r\n\r\n- Christian Dior Paris signature on the front<br>\r\n- Wide removable shoulder strap<br>\r\n- Interior zip pocket<br>\r\n- Large patch pocket<br>\r\n- The bag may be paired with the House\'s - different embroidered straps<br>\r\n- Dust bag included<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(33, 'SADDLE BAG', '4', 'bag02.png', 110000000, 'Maria Grazia Chiuri brings a fresh update to the iconic Saddle bag. The design is fully embroidered with a white multicolor Toile de Jouy Mexico motif by Pietro Ruffo, showcasing butterflies and traditional Mexican flowers in a concert of colors. Featuring a Christian Dior Paris signature on the front, the legendary design features a Saddle flap with a D stirrup clasp on a magnetic pull, as well as an antique gold-finish metal CD signature on each side of the handle. The bag can be carried by hand or worn over the shoulder and may be customized with different shoulder straps.<br><br>\r\n\r\n- D stirrup clasp with magnetic strap<br>\r\n- CD signature on the strap<br>\r\n- Main compartment<br>\r\n- Back pocket<br>\r\n- Dust bag included<br>\r\nMade in Italy<br>', NULL, NULL, NULL, 0),
(34, 'SADDLE BAG WITH STRAP', '4', 'bag03.png', 120000000, 'Maria Grazia Chiuri brings a fresh update to the iconic Saddle bag. Crafted in black grained calfskin, the legendary design features a Saddle flap with a D stirrup clasp on a magnetic strap, as well as an antique gold-finish metal CD signature on either side of the strap. Equipped with a thin, adjustable and removable shoulder strap, the Saddle bag may be carried by hand, worn over the shoulder or crossbody.<br><br>\r\n\r\n- D stirrup clasp with magnetic strap<br>\r\n- CD signature on the strap<br>\r\n- Thin, adjustable and removable shoulder strap<br>\r\n- Interior pocket<br>\r\n- Back pocket<br>\r\n- Dust bag included<br>\r\n- Made in Italy<br>', 1, 100000000, NULL, 0),
(35, 'MEDIUM LADY D-JOY BAG', '4', 'bag04.png', 82000000, 'The Lady D-Joy bag captures the House\'s vision of elegance and beauty. Refined and sleek, this timeless style showcases the iconic streamlined aesthetic of the Lady Dior line. Crafted in black lambskin with Cannage stitching, it is enhanced by pale gold-finish metal D.I.O.R. charms embellishing its silhouette. Featuring one removable chain shoulder strap and another adjustable and removable leather shoulder strap, the medium Lady D-Joy bag can be carried by hand or worn crossbody as a daily companion.<br><br>\r\n\r\n- Removable chain strap<br>\r\n- Removable and adjustable leather shoulder strap<br>\r\n- Interior patch pocket<br>\r\n- Dust bag included<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 1),
(36, 'MINI LADY DIOR BAG', '4', 'bag05.png', 145000000, 'The Lady Dior bag epitomizes the House\'s vision of elegance and beauty. Sleek and refined, the timeless yet relevant style is crafted in black ultramatte calfskin with Cannage stitching, creating the instantly recognizable quilted texture. The tonal metal D.I.O.R. charms further embellish and illuminate its silhouette. Featuring a removable chain shoulder strap, the miniature Lady Dior bag can be carried by hand, worn over the shoulder or crossbody as an ideal evening companion.<br><br>\r\n\r\n- Removable chain<br>\r\n- Interior zip pocket<br>\r\n- The bag may be paired with the House\'s different embroidered straps<br>\r\n- Dust bag included<br>\r\n- Made in Italy<br>\r\n', 1, 132000000, NULL, 0),
(37, 'LARGE DIOR BOOK TOTE', '4', 'bag06.png', 95000000, 'Introduced by Maria Grazia Chiuri, Creative Director of Christian Dior, the Dior Book Tote has become a staple of the Dior aesthetic. Presented at the Cruise 2024 fashion show and designed to hold all the daily essentials, this variation is fully embroidered with a beige multicolor Butterfly Bandana motif, combining the butterfly with the timeless bandana pattern in a graphic spirit. Adorned with the Christian Dior Paris signature on the front, the large tote exemplifies the House\'s signature savoir-faire and may be carried by hand or worn over the shoulder.<br><br>\r\n\r\n- Christian Dior Paris signature on the front<br>\r\n- Dust bag included<br>\r\n- Made in Italy<br>\r\n- Runway Look 54<br>', NULL, NULL, NULL, 0),
(38, 'MEDIUM C\'EST DIOR BAG', '4', 'bag07.png', 100000000, 'The C\'est Dior bag is an elegant and timeless creation. Crafted in powder beige calfskin, it is distinguished by the embossed CD signature on the front, testifying to the House\'s savoir-faire. Thanks to its CD Lock closure with a twisting letter D, the bucket bag can keep the essentials secure. A top handle and adjustable, removable chain strap with a leather insert allow the medium bag to be comfortably carried by hand or worn over the shoulder.<br><br>\r\n\r\n- CD Lock closure<br>\r\n- Removable chain shoulder strap with adjustable leather insert<br>\r\n- Removable leather top handle<br>\r\n- Dust bag included<br>\r\n- Made in Italy<br>\r\n', NULL, NULL, NULL, 1),
(39, 'MEDIUM LADY D-JOY BAG', '4', 'bag08.png', 150000000, 'The Lady D-Joy bag captures the House\'s vision of elegance and beauty by showcasing the iconic streamlined aesthetic of the Lady Dior line. Crafted in black lambskin, it is enhanced by gold-finish metal butterfly studs accenting the Cannage stitching, while the D.I.O.R. charms are completed by a pale gold-finish metal Butterfly charm with a white resin pearl illuminating the silhouette. Featuring one removable chain strap and another adjustable and removable leather strap, the medium Lady D-Joy bag can be carried by hand, worn over the shoulder or crossbody as a daily companion.<br><br>\r\n\r\n- Removable chain strap<br>\r\n- Removable and adjustable leather shoulder strap<br>\r\n- Interior patch pocket<br>\r\n- Dust bag included<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(40, 'MEDIUM LADY DIOR BAG', '4', 'bag09.png', 230000000, 'The Lady Dior bag captures the House\'s vision of beauty and elegance. Sleek and refined, the timeless style is crafted in embroidered calfskin enhanced by the latte multicolor Blurred Flowers Corn motif, a modern take on the archival pattern with a heathered effect. Pale gold-finish metal D.I.O.R. charms offer elegant appeal. Featuring a thin, removable leather shoulder strap, the medium Lady Dior bag can be carried by hand or worn crossbody.<br><br>\r\n\r\n- Thin, adjustable and removable shoulder strap<br>\r\n- Interior zip pocket<br>\r\n- Large patch pocket<br>\r\n- The bag may be paired with the House\'s different embroidered straps<br>\r\n- Dust bag included<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(41, 'TOP HANDLE BAG', '4', 'bag10.png', 285000000, 'Unveiled at the Fall-Winter 2023-2024 fashion show, the Top Handle bag is a refined creation with retro appeal. The exceptional style is crafted in satin fully embroidered in strass of varying sizes and shades of burgundy, offering three-dimensional luminosity. Its large compartment has a patch pocket to organize the daily essentials and a small mirror. The elegant design is enhanced by a unique Christian Dior Paris closure and can be carried by hand or worn over the shoulder thanks to its satin handle.<br><br>\r\n\r\n- Interior patch pocket and small mirror<br>\r\n- Christian Dior Paris closure<br>\r\n- Satin handle<br>\r\n- Dust bag included<br>\r\n- Made in Italy<br>\r\nRunway Look 47', NULL, NULL, NULL, 0),
(42, '30 MONTAIGNE EAST-WEST BAG', '4', 'bag11.png', 91000000, 'The East-West bag with chain enhances the 30 Montaigne line with a timeless and elegant design. The bag is crafted in blue jacquard and highlights the House\'s hallmark Dior Oblique motif. The flap has an antique gold-finish metal CD clasp, inspired by the seal of a Christian Dior perfume bottle. Other details, like the embossed 30 Montaigne signature on the back, highlight the streamlined design. The bag features a removable chain strap with a leather insert that allows it to be comfortably carried by hand, worn over the shoulder or crossbody.<br><br>\r\n\r\n- Flap closure<br>\r\n- CD clasp<br>\r\n- Embossed 30 Montaigne signature on the back<br>\r\n- Removable and adjustable chain shoulder strap with leather insert<br>\r\n- Interior patch pocket<br>\r\n- Back pocket<br>\r\n- Dust bag included<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(43, 'MEDIUM DIOR TOUJOURS BAG', '4', 'bag12.png', 110000000, 'Unveiled at the Spring-Summer 2023 fashion show, the Dior Toujours bag is distinguished by a casual and practical design. Crafted in black calfskin with Macrocannage topstitching, it showcases a spacious interior compartment with a matching pouch to organize the essentials. Its leather strap closure keeps items secure while the D of the CD Lock closure twists to adjust the sides and enhance the bag\'s silhouette. The leather handles can be adjusted using the small notches in order to be able to carry the medium bag by hand or wear it over the shoulder.<br><br>\r\n\r\n- CD Lock and strap closures<br>\r\n- D.I.O.R. charms<br>\r\n- Removable interior pouch<br>\r\n- Adjustable leather handles<br>\r\n- Dust bag included<br>\r\n- Made in Italy<br>\r\n', NULL, NULL, NULL, 0),
(44, 'D-STRIKE ANKLE BOOT', '5', 'shoe01.png', 54000000, 'DESCRIPTION\r\nNew for the Cruise 2024 collection, the D-Strike ankle boot adds couture details to a bold silhouette. Presented in black matte calfskin, the style stands out with a wide band adorned with functional white resin pearls, inspired by the iconic Dior Tribales earrings. A gold-tone CD signature on the top resin pearl and rear Christian Dior Paris signature as well as an ultra-lightweight EVA sole complete the modern ankle boot.<br><br>\r\n\r\n- Gold-tone Christian Dior Paris signature at the back<br>\r\n- Decorative CD resin pearl<br>\r\n- Side zip closure<br>\r\n- Rear tab<br>\r\n- Notched EVA sole with star, Christian Dior\'s lucky symbol<br>\r\n- Made in Italy<br>\r\n', 1, 52000000, NULL, 0),
(45, 'NAUGHTILY-D HEELED ANKLE BOOT', '5', 'shoe02.png', 45000000, 'New for Winter 2023, the Naughtily-D heeled ankle boot showcases streamlined, elegant lines. Offering a sophisticated play of transparency, the mesh style is fully embroidered with a black Dior Roses motif and embellished with the Christian Dior signature and tonal suede calfskin details. The ankle boot is distinguished by its no-tongue design for an openwork effect. The 8 cm (3) block heel and laces complete the delicate creation.<br><br>\r\n\r\n- Embroidered Christian Dior signature<br>\r\n- Suede calfskin laces<br>\r\n- Rear zipper fastening<br>\r\n- Leather sole with engraved star, Christian Dior\'s lucky symbol<br>\r\nMade in Italy<br>', NULL, NULL, NULL, 0),
(46, 'NAUGHTILY-D HEELED ANKLE BOOT', '5', 'shoe03.png', 42000000, 'The Naughtily-D heeled ankle boot showcases streamlined, elegant lines. Offering a sophisticated play of transparency, the mesh style is fully embroidered with a sand-colored Dior Roses motif and embellished with the Christian Dior signature and tonal suede calfskin details. The ankle boot is distinguished by its no-tongue design for an openwork effect. The 3 cm (1) block heel and laces complete the delicate creation.<br><br>\r\n\r\n- Embroidered Christian Dior signature<br>\r\n- Suede calfskin laces<br>\r\n- Rear zipper fastening<br>\r\n- Leather sole with engraved star, Christian Dior\'s lucky symbol<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(47, '30 MONTAIGNE ANKLE BOOT', '5', 'shoe04.png', 43000000, 'New for Winter 2023, the 30 Montaigne ankle boot is both a modern and timeless creation. The black calfskin combines with the notched rubber sole, making it effortless and comfortable. The ankle strap is enhanced by a gold-finish CD clasp, giving it the hallmark touch. The ankle boot is an ideal accessory for any casual attire.<br><br>\r\n\r\n- Gold-finish metal CD signature on the decorative strap<br>\r\n- Side zip closure<br>\r\n- Notched rubber sole with star, Christian Dior\'s lucky symbol<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(48, 'D-MAJOR BOOT', '5', 'shoe05.png', 50000000, 'The D-Major boot showcases bold, modern appeal. Joining black and white Cannage tweed with black calfskin, the style is enhanced by an embroidered Christian Dior Paris band inspired by the Dior Book Tote. The adjustable strap highlighting the ankle and the notched sole in ultra-lightweight rubber complete the shoe.<br><br>\r\n\r\n- Christian Dior Paris signature embroidered on the upper<br>\r\n- Adjustable nylon strap around the ankle with CD signature<br>\r\n- Notched rubber sole with star, Christian Dior\'s lucky symbol<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(49, 'DIORACT SANDAL', '5', 'shoe06.png', 35000000, 'The pastel peyote green lambskin Dioract sandal showcases a modern silhouette. The style features an anatomically shaped sole made with an ultra-lightweight and comfortable leather. Self-fastener straps further enhanced by a gold-finish metal Dior signature on the upper strap complete the design. The sandal will lend a contemporary touch to any look.<br><br>\r\n\r\n- Gold-finish metal Dior signature<br>\r\n- Two adjustable self-fastening straps<br>\r\n- Anatomically shaped leather insole<br>\r\n- Notched EVA sole with star, Christian Dior\'s lucky symbol<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(50, 'DWAY SLIDE', '5', 'shoe07.png', 23000000, 'The hallmark Dway slide features a nude multicolor Toile de Jouy Mexico motif by Pietro Ruffo, showcasing butterflies and traditional Mexican flowers in a concert of colors. The upper has an embroidered Christian Dior Paris signature for an instantly recognizable touch. Its streamlined silhouette makes it easy to slip on to complete a relaxed look that will pair well with other Toile de Jouy Mexico creations from the collection.<br><br>\r\n\r\n- Christian Dior Paris signature embroidered on the upper<br>\r\n- Toile de Jouy Mexico leather insole<br>\r\n- Leather sole with engraved star, Christian Dior\'s lucky symbol<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 3),
(51, 'DIOR BALLET FLAT', '5', 'shoe08.png', 25500000, 'New for the Cruise 2024 collection, the Dior Ballet flat revisits a timeless pattern with elements of House couture. Crafted in nude quilted calfskin with the Cannage motif, it is distinguished by a delicate grosgrain bow on the front adorned with a white CD resin pearl inspired by the iconic Dior Tribales earrings. Thanks to a padded leather insole, the supple, comfortable ballet flat will add the finishing touch to all of the season\'s looks.<br><br>\r\n\r\n- Grosgrain bow on the front<br>\r\n- Decorative CD resin pearl<br>\r\n- Padded calfskin insole<br>\r\n- Leather sole with star, Christian Dior\'s lucky symbol<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(52, 'J\'ADIOR SLINGBACK FLAT', '5', 'shoe09.png', 27440000, 'The J\'Adior slingback flat is a prime example of Dior\'s savoir-faire. The white and black embroidered cotton style showcases the season\'s signature Plan de Paris motif, inspired by House archives and centered around Dior\'s historic address on Avenue Montaigne. The two-tone embroidered J\'Adior signature ribbon is embellished with an elegant bow. The slingback flat will lend a refined and sophisticated touch and can be paired with other Plan de Paris creations from the collection.<br><br>\r\n\r\n- J\'Adior two-tone embroidered cotton ribbon<br>\r\n- Flat bow<br>\r\n- Leather sole with star, Christian Dior\'s lucky symbol<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(53, 'WALK\'N\'DIOR PLATFORM SNEAKER', '5', 'shoe10.png', 33000000, 'The Walk\'n\'Dior platform sneaker enhances the line with a modern creation. The deep blue Dior Oblique embroidered cotton upper reveals a comfortable thick sole, tongue and Christian Dior Paris laces. The sneaker will add a contemporary touch to any laid-back look.<br><br>\r\n\r\n- Signatures on tongue, sole and laces<br>\r\n- EVA platform with star, Christian Dior\'s lucky symbol<br>\r\n- Made in Italy<br>\r\n- Additional set of laces provided<br>', NULL, NULL, NULL, 0),
(54, 'DIOR OBLIQUE TIE', '3', 'tie01.png', 6500000, 'The tie highlights the hallmark Dior Oblique motif, a House symbol since 1967. Crafted in gray silk jacquard, the tie will elevate any suit with a refined and sophisticated touch.<br><br>\r\n\r\n- All-over gray Dior Oblique jacquard<br>\r\n- House signature<br>\r\n- 100% silk<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(55, 'MICRO CD DIAMOND TIE', '3', 'tie02.png', 6500000, 'New for Spring 2024, the navy blue tie showcases the hallmark CD Diamond motif in a micro white and black version. The silk tie will elevate suits with a modern and sophisticated touch.<br><br>\r\n\r\n- White and black micro CD Diamond jacquard<br>\r\n- Dior signature jacquard on the exterior of the tail<br>\r\n- 100% silk<br>\r\n- Made in Italy<br>\r\n', 0, NULL, NULL, 1),
(56, 'DIOR MULTI TIE', '3', 'tie03.png', 6500000, 'New for Spring 2024, the black tie showcases the Dior Multi signature in blue multicolor jacquard, highlighting multiple Dior signatures in a graphic italic version. The silk tie will elevate shirts with an original touch.<br><br>\r\n\r\n- Blue multicolor Dior Multi signature jacquard below the knot<br>\r\n- Dior signature jacquard on the exterior of the tail<br>\r\n- 100% silk<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(57, 'CD DIAMOND S6F', '3', 'glass03.png', 17660000, 'The CD Diamond S6F sunglasses enhance the line with a square flat top form featuring contemporary appeal. The black and crystal-tone acetate frame showcases temples engraved with the CD Diamond motif and embellished with a subtle play of transparency and diamond-shaped details. The CD Diamond interior hinge in gold-finish metal completes the tailoring-inspired sunglasses.<br><br>\r\n\r\n- Black and crystal-tone acetate frame<br>\r\n- Gray lenses<br>\r\n- Christian Dior signature on the left lens<br>\r\n- Engraved CD Diamond and diamond-shaped details on the temples<br>\r\n- Internal hinge with gold-finish metal CD Diamond signature<br>\r\n- 100% UVA/UVB protection<br>\r\n- Filter category: 3<br>\r\n- Suitable for prescription<br>\r\n- Made in Italy<br>\r\n- Exclusive CD Diamond sunglasses case included<br>', NULL, NULL, NULL, 1),
(58, 'DIORBLACKSUIT R7U BIOACETATE', '3', 'glasses04.png', 9561000, 'The DiorBlackSuit R7U sunglasses, crafted in bio-acetate, enhance the collection with a sophisticated pantos form. The black frame reveals a signature hinge inspired by the stitched details of Dior Men suits, as well as an engraved CD logo. Thin struts and a subtle border in silver-finish metal complement the gray lenses, while the double bridge lends a touch of modern elegance.<br><br>\r\n\r\n- Black bio-acetate frame<br>\r\n- Dior eyewear collections in bio-acetate contain an average of 65% biodegradable materials<br>\r\n- Gray lenses<br>\r\n- Engraved CD signature hinge<br>\r\n- 100% UVA/UVB protection<br>\r\n- Filter category: 3<br>\r\n- Suitable for prescription<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(59, 'CD LINK A1U', '3', 'glasses05.png', 15733000, 'The CD Link A1U sunglasses have a striking and modern pilot-shape design. The gunmetal frame is adorned with an openwork CD signature, further embellished with guilloche detailing and confirming its technical appeal. Gray mirrored lenses with the Dior Oblique motif complete the urban sunglasses.\r\n*Color sold exclusively on Dior.com and in Dior boutiques<br><br>\r\n\r\n- Gunmetal frame<br>\r\n- Gray mirrored lenses with Dior Oblique motif<br>\r\n- Silver-finish metal temples with an openwork CD signature<br>\r\n- Black acetate temple tips<br>\r\n- 100% UVA/UVB protection<br>\r\n- Filter category: 3<br>\r\n- Suitable for prescription<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(60, 'CD DIAMOND S3F', '3', 'glasses06.png', 17660000, 'The CD Diamond S3F sunglasses, featuring green lenses, enhance the line with a square form and sophisticated details. The translucent yellow acetate frame reveals temples engraved with the CD Diamond motif and embellished with a play of transparency and diamond-shaped details. The CD Diamond interior hinge in gold-finish metal completes the tailoring-inspired sunglasses.<br><br>\r\n\r\n- Translucent yellow acetate frame<br>\r\n- Green lenses<br>\r\n- Christian Dior signature on the left lens<br>\r\n- Engraved CD Diamond and diamond-shaped details on the temples<br>\r\n- Internal hinge with gold-finish metal CD Diamond signature<br>\r\n- 100% UVA/UVB protection<br>\r\n- Filter category: 3<br>\r\n- Suitable for prescription<br>\r\n- Made in Italy<br>\r\n- Exclusive CD Diamond glasses case included<br>', NULL, NULL, NULL, 1),
(61, 'PETIT CD BRACELET', '3', 'bracelet01.png', 13000000, 'The Petit CD bracelet is an elegant and timeless creation. The thin chain crafted in gold-finish metal showcases a black glass cabochon adorned with the CD signature and delicately encircled by white resin pearls. The sophisticated bracelet can be worn with other creations from the Petit CD line.<br><br>\r\n\r\n- White resin pearls<br>\r\n- Black glass<br>\r\n- CD signature<br>\r\n- Gold-finish metal<br>\r\n- Lobster clasp<br>\r\n- Made in Europe<br>', NULL, NULL, NULL, 0),
(62, 'CHRISTIAN DIOR BRACELET SET', '3', 'bracelet02.png', 12000000, 'The Christian Dior bracelets are reinvented for the season with new color combinations. The Christian Dior signature adorns peach blossom pink and white embroidery. The bracelets are adjustable with handmade tassel cords, and can be worn for any occasion, alone or stacked.<br><br>\r\n\r\n- Embroidered Christian Dior signature at the front<br>\r\n- Peach blossom pink and white embroidery<br>\r\n- Slide fastening with tassels<br>\r\n- This set contains two bracelets<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(63, 'PETIT CD BRACELET', '3', 'bracelet03.png', 11000000, 'The Petit CD bracelet has an elegant and streamlined aesthetic. The style is comprised of a thin gold-finish metal chain showcasing a \'CD\' signature at the center. A small white resin pearl completes the look. Modern and refined, the bracelet may be worn with other Petit CD creations.<br><br>\r\n\r\n- White resin pearl<br>\r\n- \'CD\' signature<br>\r\n- Gold-finish metal<br>\r\n- Lobster clasp<br>\r\n- Made in Germany<br>', NULL, NULL, NULL, 0),
(64, '30 MONTAIGNE BRACELET', '3', 'bracelet04.png', 17500000, 'The 30 Montaigne bracelet is both modern and timeless. It is made with a gold-finish metal chain that showcases the CD signature with a pavé of silver-reflective crystals at the center. The bracelet can be worn with other 30 Montaigne creations.<br><br>\r\n\r\n- Silver-tone crystals<br>\r\n- CD signature<br>\r\n- Gold-finish metal<br>\r\n- Lobster clasp<br>\r\n- Made in Germany<br>', NULL, NULL, NULL, 0),
(65, 'DIOR MÉTAMORPHOSE BRACELET', '3', 'bracelet05.png', 24500000, 'Unveiled at the Cruise 2024 fashion show, the Dior Métamorphose bracelet suggests transformation, evolution and freedom through a signature animal from the collection. Embodying the House\'s exceptional savoir-faire, its double design features an oversized butterfly finely crafted in matte gold-finish metal and embellished with a white CD resin pearl. The elegant bracelet can be styled with other creations from the Dior Métamorphose line.<br><br>\r\n\r\n- White resin pearl<br>\r\n- CD signature<br>\r\n- Butterfly detailing<br>\r\n- Matte gold-finish metal<br>\r\n- Lobster clasp<br>\r\n- Made in Italy<br>\r\n- Runway Look 73<br>', NULL, NULL, NULL, 0),
(66, 'CROPPED JACKET', '2', 'jacket01.png', 105000000, 'New for the Cruise 2024 collection, the black cropped jacket in wool with a terry effect honors House codes of elegance. Its straight silhouette is enhanced by CD buttons and scalloped edges. Completed by patch pockets, the jacket can be paired with the matching skirt to complete the look.<br><br>\r\n\r\n- Front button closure<br>\r\n- CD horn buttons<br>\r\n- Scalloped edges<br>\r\n- Lining<br>\r\n- 81% virgin wool, 19% polyamide<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(67, 'PINK CROPPED JACKET', '2', 'jacket02.png', 105000000, 'New for the Cruise 2024 collection, the ecru cropped jacket in wool with a terry effect honors House codes of elegance. Its straight silhouette is enhanced by CD buttons and scalloped edges. Completed by patch pockets, the jacket can be paired with the matching skirt to complete the look.<br><br>\r\n\r\n- Front button closure<br>\r\n- CD horn buttons<br>\r\n- Scalloped edges<br>\r\n- Lining<br>\r\n- 81% virgin wool, 19% polyamide<br>\r\n- Made in Italy<br>', NULL, NULL, NULL, 0),
(68, 'FITTED JACKET', '2', 'jacket03.png', 130000000, 'New for the Cruise 2024 collection, the jacket showcases the House\'s codes of timeless elegance. Crafted in black wool and silk with a velvet effect on the front, it features a fitted, single-breasted cut with a notched collar. The jacket may be worn with a skirt from the collection to complete a decidedly Dior look.<br><br>\r\n\r\n- Front button closure<br>\r\n- Horn buttons<br>\r\n- Lining<br>\r\n- 77% wool, 23% silk<br>\r\n- Made in Italy<br>', 0, NULL, NULL, 0),
(71, 'CARO JACKET', '2', 'jacket04.png', 6800000, 'The technical wool fleece knit Caro Jacket is a creation that is as elegant as it is timeless. Its regular fit features a button closure and three patch pockets on the front. The design is enhanced by a contrasting \'CHRISTIAN DIOR\' signature on the back. The Caro Jacket will pair with any of the season\'s outfits for a hallmark look.<br><br>\r\n\r\n- \'CHRISTIAN DIOR\' signature on the back<br>\r\n- Front button closure<br>\r\n- Horn buttons<br>\r\n- Unlined<br>\r\n- 85% wool, 14% polyamide, 1% elastane (3-gauge)*<br>\r\n- Made in Italy<br>\r\n', 0, NULL, '2017-11-21 09:59:17', 3),
(72, '30 MONTAIGNE BAR JACKET', '2', 'jacket05.png', 130000000, 'The Bar Jacket is an emblematic style from the New Look collection, first created by Christian Dior in 1947. Reimagined by Maria Grazia Chiuri, the silhouette is crafted in a lightweight blend of white wool and silk. It features notch lapels and welt pockets that delicately highlight the waist. The Bar Jacket pairs well with the entire Dior wardrobe for an elegant and refined look.<br><br>\r\n\r\n- Flattering shape, structured yet supple construction<br>\r\n- Handsewn topstitching<br>\r\n- Notch lapels<br>\r\n- Single-breasted three-button front<br>\r\n- 100% crêpe de chine silk lining<br>\r\n77% wool, 23% silk<br>\r\n- Made in France<br>', 0, NULL, '2017-11-21 09:59:56', 19),
(120, 'DIOR BRACELET', '3', 'bracelet05.png', 24500000, 'Unveiled at the Cruise 2024 fashion show, the Dior Métamorphose bracelet suggests transformation, evolution and freedom through a signature animal from the collection. Embodying the House\'s exceptional savoir-faire, its double design features an oversized butterfly finely crafted in matte gold-finish metal and embellished with a white CD resin pearl. The elegant bracelet can be styled with other creations from the Dior Métamorphose line.<br><br>\r\n\r\n- White resin pearl<br>\r\n- CD signature<br>\r\n- Butterfly detailing<br>\r\n- Matte gold-finish metal<br>\r\n- Lobster clasp<br>\r\n- Made in Italy<br>\r\n- Runway Look 73<br>', 0, 0, '2023-11-09 00:00:00', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `role` varchar(50) DEFAULT 'user',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `gender`, `email`, `phone`, `avatar`, `address`, `role`, `created_at`) VALUES
(43, 'an binh', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Nguyễn Văn An Binh', 0, 'an@gmail.com', '0908765431', NULL, '123 nguyen trai', 'user', '2023-09-16 09:20:33'),
(49, 'abc', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Hoàng Long đẹp trai', 0, 'royaldragonit@gmail.com', '0462956316', NULL, 'Hồ Chí Minh', 'user', '2023-10-07 20:23:00'),
(50, 'admin123', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'saguasfho', 0, 'royaldragonit@gmail.com', '1234567890', 'temp.png', 'Bà Rịa Vũng Tàu', 'user', '2023-10-14 18:00:03'),
(68, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'saguasfho', 0, 'nguyenthuong.010600@gmail.com', '01245664', 'ảnh1.jpg', 'Bà Rịa Vũng Tàu', 'admin', '2023-10-14 18:02:55'),
(69, 'abcd', '81fe8bfe87576c3ecb22426f8e57847382917acf', 'smasfjosf', 0, 'nguyenthuong.010600@gmail.com', '022255611', 'mon.jpg', 'shggfiuk', 'user', '2023-10-14 18:04:24'),
(70, 'hoaithuong', '116e5dc860fe863bd6895f020be507f51fd8e0e1', 'Hoài Thương', 0, 'nguyenthuong.010600@gmail.com', '0334972658', 'aabb.jpg', 'Bà Rịa Vũng Tàu', 'user', '2023-10-14 18:19:53'),
(71, 'hoaithuong123', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'abbbb', 0, 'phamconghieu3380@gmail.com', '0334972877', 'avatar.jpg', 'Bà Rịa Vũng Tàu', 'user', '2023-11-09 15:34:03');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
