-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2023 lúc 09:31 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `interior_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sofa', '2023-11-14 14:54:33', NULL),
(2, 'Chair', '2023-11-14 14:54:33', NULL),
(3, 'Bed', '2023-11-14 14:54:57', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(22, '2023_11_11_153033_create_categories_table', 1),
(23, '2023_11_11_153209_create_products_table', 1),
(24, '2023_11_11_153524_create_product_comments_table', 1),
(25, '2023_11_11_153746_create_orders_table', 1),
(26, '2023_11_11_153908_create_order_details_table', 1),
(27, '2023_11_14_144949_create_contacts_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hà Nội', '0912345678', '2023-11-14 19:51:27', '2023-11-14 19:51:27'),
(2, 1, 'Hà Nội', '0979349098', '2023-11-14 21:07:20', '2023-11-14 21:07:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 33000000, '2023-11-14 19:51:27', '2023-11-14 19:51:27'),
(2, 2, 1, 3, 99000000, '2023-11-14 21:07:20', '2023-11-14 21:07:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cate_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `discount`, `image`, `cate_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sofa Coastal 2 seat blue', 33000000, 0, 'pro_1.png', 1, 'Coastal sofa impresses with its flowing curves, following the Modern Organic trend - close to nature but still modern and comfortable. The special feature of this collection lies in the meticulousness of skilled craftsmen, who have completed the flawless winding seams, creating a neat design that \"balances\" every angle. Feeling smooth and relaxed will be the first adjectives mentioned when experiencing Coastal sofa.', '2023-11-14 14:55:44', NULL),
(2, 'Sofa Bridge 3 seats cognac', 100000000, 10, 'pro_2.png', 1, '3-seat Bridge sofa with seat frame made from natural oak imported from America, providing a sturdy and durable design. The highlight is the delicately crafted handrail with uniquely stylized wood grain lines. Delicate touches will be evoked when you gently touch the surface of the product, because high-quality natural leather will bring a soft and authentic feel. The product has a variety of options with 3 different colors: beige, cognac and black. Bridge 3-seat sofa is a product suitable for a luxurious and elegant living room space.', '2023-11-14 15:01:18', NULL),
(3, 'Bolero 3-seat sofa + blue fabric ottoman', 24000000, 0, 'pro_3.png', 1, 'The 3-seat Bolero sofa and blue fabric sofa 18 have black painted metal legs and the mattress is covered with high-quality blue fabric. The design of Bolero sofa is simple but brings sophistication to the living room space. It is also a sofa product worth owning because of its design and usage experience.', '2023-11-15 04:23:44', NULL),
(4, 'Osaka 3-seater sofa', 28000000, 0, 'pro_4.png', 1, 'The 3-seat sofa from the Osaka collection has a modern and poetic Japanese touch, creating a unique living space full of luxury. The product has sturdy gold-colored stainless steel legs and a fabric-covered mattress that is removable. Osaka 3-seater sofa model 1 fabric 29 not only brings a sophisticated and luxurious design but also makes the sitter feel comfortable and at ease.', '2023-11-15 04:23:44', NULL),
(5, 'Sofa Jazz 3 chỗ hiện đại da cognac', 60000000, 0, 'pro_5.png', 1, 'The 3-seat Jazz sofa is covered with high-quality cowhide, providing a soft, smooth, and wonderfully relaxing feeling. Modern design with unique beauty from elegant shapes and delicate lines is the biggest plus point of Jazz sofa.', '2023-11-15 04:26:39', NULL),
(6, 'Cabo 3-seat sofa', 35000000, 20, 'pro_6.png', 1, 'Cabo sofa is designed with three seats. The sofa legs use sturdy metal painted in a combination of black and gold to create luxury, and the chair frame is made from wood covered with high-quality fabric. The sofa is a suitable choice for the living room space because of its modern and soft design.', '2023-11-15 04:27:40', NULL),
(7, 'PENNY 3-seat sofa – orange fabric', 54000000, 10, 'pro_7.png', 1, 'The simplicity, sophistication, elegance and no less outstandingness of this Sofa with the eternal bloodline of Scandivian with successive color versions from dark to light Pastel will bring unmistakable colors and Diversity for each living space in your home. The square, slender, gentle design is a blend of firmness and lightness, all essential elements converging in this sofa.', '2023-11-15 04:28:53', NULL),
(8, 'Bali leather 3-seater combo sofa', 60000000, 10, 'pro_8.png', 1, 'Bali 520 leather 3-seater combo sofa in dark brown color is your wisest choice to make your living room space more warm and comfortable. This is a leather sofa model with a beech wood frame with super elastic cushions, black and gold painted metal legs, and natural leather upholstery that is very luxurious and durable, suitable for a luxurious reception space.', '2023-11-15 04:29:43', NULL),
(9, 'Modern 3-seater Jazz sofa in brown leather', 60000000, 0, 'pro_9.png', 1, 'The 3-seat Jazz sofa is covered with high-quality cowhide, providing a soft, smooth, and wonderfully relaxing feeling. Modern design with unique beauty from elegant shapes and delicate lines is the biggest plus point of Jazz sofa.', '2023-11-15 04:30:27', NULL),
(10, 'Sofa Jazz 2.5 chỗ hiện đại da cognac', 56000000, 20, 'pro_10.png', 1, 'The 2.5-seat Jazz sofa is covered with high-quality cowhide, providing a soft, smooth, and wonderfully relaxing feeling. Modern design with unique beauty from elegant shapes and delicate lines is the biggest plus point of Jazz sofa.', '2023-11-15 04:31:17', NULL),
(11, 'Coastal dining chair', 5100000, 0, 'pro_11.png', 2, 'Coastal is boldly Vietnamese by skillfully blending the beauty inspired by our country\'s coastal region with high-quality materials and modern design. Coastal dining chair with four sturdy wooden legs, covered with soft fabric and designed to suit Vietnamese people\'s physical condition. All parts in contact with the body are soft and elegant. Coastal\'s design language combines flexible and natural lines, fresh green fabric with the color of the sea, solid features, and warm wood tones to create a harmonious contrast like the mysterious sea and the land. immediately familiar.', '2023-11-15 04:31:56', NULL),
(12, 'Gold Coastal dining chair', 5100000, 10, 'pro_12.png', 2, 'Coastal is boldly Vietnamese by skillfully blending the beauty inspired by our country\'s coastal region with high-quality materials and modern design. Coastal dining chair with four sturdy wooden legs, covered with soft fabric and designed to suit Vietnamese people\'s physical condition. All parts in contact with the body are soft and elegant. Coastal\'s design language combines flexible and natural lines, fresh green fabric with the color of the sea, solid features, and warm wood tones to create a harmonious contrast like the mysterious sea and the land. immediately familiar.', '2023-11-15 04:32:45', NULL),
(32, 'Coastal green dining chair', 5100000, 10, 'pro_13.png', 2, 'Coastal is boldly Vietnamese by skillfully blending the beauty inspired by our country\'s coastal region with high-quality materials and modern design. Coastal dining chair with four sturdy wooden legs, covered with soft fabric and designed to suit Vietnamese people\'s physical condition. All parts in contact with the body are soft and elegant. Coastal\'s design language combines flexible and natural lines, fresh green fabric with the color of the sea, solid features, and warm wood tones to create a harmonious contrast like the mysterious sea and the land. immediately familiar.', '2023-11-15 04:35:11', NULL),
(33, 'Peak orange fabric dining chair', 4800000, 0, 'pro_14.png', 2, 'The Peak dining chair is a notable interior focal point because it is surrounded by a bright, striking orange fabric. The chair\'s legs are made of luxurious black powder-coated iron, which is considered the perfect combination of design that captures the trends and preferences of today\'s youth.', '2023-11-15 04:35:11', NULL),
(34, 'Peak dining chair in blue fabric', 4800000, 20, 'pro_15.png', 2, 'The Peak dining chair is a notable interior focal point because it is surrounded by a bright, striking blue fabric. The chair\'s legs are made from trendy black powder-coated iron, which is considered a perfect combination, a design that captures current trends.', '2023-11-15 04:36:36', NULL),
(36, 'Rusty dining chair', 12000000, 0, 'pro_16.png', 2, 'The Rusty dining chair is a notable interior focal point because it is covered with a bright, striking blue fabric. The chair\'s legs are made from trendy black powder-coated iron, which is considered a perfect combination, a design that captures current trends.', '2023-11-15 04:38:02', NULL),
(37, 'Albert Kuip Taupe swivel dining chair', 13000000, 0, 'pro_17.png', 2, 'The Albert Kuip Taupe dining chair is a notable interior focal point because it is surrounded by a bright, striking blue fabric. The chair\'s legs are made from trendy black powder-coated iron, which is considered a perfect combination, a design that captures current trends.', '2023-11-15 04:38:41', NULL),
(38, 'Black and white Gerda chair', 5400000, 0, 'pro_18.png', 2, 'The Gerda dining chair is a notable interior focal point because it is covered with a bright, striking blue fabric. The chair\'s legs are made from trendy black powder-coated iron, which is considered a perfect combination, a design that captures current trends.', '2023-11-15 04:40:22', NULL),
(39, 'Elegance armless dining chair in natural color', 16000000, 10, 'pro_19.png', 2, 'The Elegance chair is made from American Ash wood. The seating surface is meticulously designed with the interweaving of high-quality ropes imported from Germany. With good water resistance and high elasticity, the product promises to bring an enjoyable experience to users. The backrest curves gently to give the user a comfortable sitting position. Elegance chairs with minimalist design will bring a cozy and elegant space.', '2023-11-15 04:40:22', NULL),
(40, 'Elegance armless dining chair black', 16000000, 10, 'pro_20.png', 2, 'The Elegance chair is made from American Ash wood. The seating surface is meticulously designed with the interweaving of high-quality ropes imported from Germany. With good water resistance and high elasticity, the product promises to bring an enjoyable experience to users. The backrest curves gently to give the user a comfortable sitting position. Elegance chairs with minimalist design will bring a cozy and elegant space.', '2023-11-15 04:41:16', NULL),
(41, 'Coastal bed KD1058-18 1m6', 29000000, 0, 'pro_21.png', 3, 'The Coastal bed brings the feeling of lying on a long, peaceful beach, with smooth curves at the headboard, edges and graceful V-shaped flap, reminiscent of the image of seagulls flying over the sea. The Coastal collection was originally designed for resort apartments in coastal areas. But with creativity and innovation, Coastal becomes dynamic and suitable for many living spaces, bringing nature into every space.', '2023-11-15 04:41:55', NULL),
(42, 'Coastal bed KD1058-18 1m8', 32000000, 0, 'pro_22.png', 3, 'The Coastal bed brings the feeling of lying on a long, peaceful beach, with smooth curves at the headboard, edges and graceful V-shaped flap, reminiscent of the image of seagulls flying over the sea. The Coastal collection was originally designed for resort apartments in coastal areas. But with creativity and innovation, Coastal becomes dynamic and suitable for many living spaces, bringing nature into every space.', '0000-00-00 00:00:00', NULL),
(43, 'Coastal yellow bed 1m6', 29000000, 0, 'pro_23.png', 3, 'The Coastal bed brings the feeling of lying on a long, peaceful beach, with smooth curves at the headboard, edges and graceful V-shaped flap, reminiscent of the image of seagulls flying over the sea. The Coastal collection was originally designed for resort apartments in coastal areas. But with creativity and innovation, Coastal becomes dynamic and suitable for many living spaces, bringing nature into every space.', '2023-11-15 04:43:48', NULL),
(44, 'Coastal yellow bed 1m8', 32000000, 0, 'pro_24.png', 3, 'The Coastal bed brings the feeling of lying on a long, peaceful beach, with smooth curves at the headboard, edges and graceful V-shaped flap, reminiscent of the image of seagulls flying over the sea. The Coastal collection was originally designed for resort apartments in coastal areas. But with creativity and innovation, Coastal becomes dynamic and suitable for many living spaces, bringing nature into every space.', '2023-11-15 04:44:31', NULL),
(45, 'Green Coastal bed 1m6', 28900000, 0, 'pro_25.png', 3, 'The Coastal bed brings the feeling of lying on a long, peaceful beach, with smooth curves at the headboard, edges and graceful V-shaped flap, reminiscent of the image of seagulls flying over the sea. The Coastal collection was originally designed for resort apartments in coastal areas. But with creativity and innovation, Coastal becomes dynamic and suitable for many living spaces, bringing nature into every space.', '2023-11-15 04:45:03', NULL),
(46, 'Coastal green bed 1m8', 32000000, 0, 'pro_26.png', 3, 'The Coastal bed brings the feeling of lying on a long, peaceful beach, with smooth curves at the headboard, edges and graceful V-shaped flap, reminiscent of the image of seagulls flying over the sea. The Coastal collection was originally designed for resort apartments in coastal areas. But with creativity and innovation, Coastal becomes dynamic and suitable for many living spaces, bringing nature into every space.', '2023-11-15 04:46:25', NULL),
(47, 'Iris Drawer Bed 1M6 Fabric Belfast 41', 15000000, 10, 'pro_27.png', 3, 'Iris Drawer Bed 1M6 Fabric Belfast 41 with elegant gray tones helps the bedroom space feel more luxurious and modern. The MFC wooden frame provides a sturdy feel and a soft fabric cover, giving users the most relaxing experience. With a design of 4 drawers around the bed, it both saves space and is convenient in storing things. Thanks to that, the living space will be more airy and neat with this smart design.', '2023-11-15 04:47:03', NULL),
(48, 'Iris Drawer Bed 1M8 Fabric Belfast 41', 15000000, 0, 'pro_28.png', 3, 'Iris Drawer Bed 1M6 Fabric Belfast 41 with elegant gray tones helps the bedroom space feel more luxurious and modern. The MFC wooden frame provides a sturdy feel and a soft fabric cover, giving users the most relaxing experience. With a design of 4 drawers around the bed, it both saves space and is convenient in storing things. Thanks to that, the living space will be more airy and neat with this smart design.', '2023-11-15 04:47:03', NULL),
(49, 'Leman bed 1m8 fabric VACT4328', 34000000, 0, 'pro_29.png', 3, 'Giường Leman với tông màu xám trang nhã giúp không gian phòng ngủ thêm phần sang trọng và hiện đại. Khung gỗ MFC mang lại cảm giác chắc chắn cùng lớp vải bọc êm ái, cho người dùng trải nghiệm thư thái nhất. Với thiết kế 4 hộc kéo xung quanh giường, vừa tiết kiệm diện tích, lại vừa tiện dụng trong việc cất giữ đồ đạc. Nhờ vậy, không gian sống sẽ thông thoáng và gọn gàng hơn với thiết kế thông minh này.', '2023-11-15 04:47:46', NULL),
(50, 'Giường Leman 1m8 vải VACT7464', 33000000, 0, 'pro_30.png', 3, 'Leman bed with elegant gray tones helps the bedroom space feel more luxurious and modern. The MFC wooden frame provides a sturdy feel and a soft fabric cover, giving users the most relaxing experience. With a design of 4 drawers around the bed, it both saves space and is convenient in storing things. Thanks to that, the living space will be more airy and neat with this smart design.', '2023-11-15 04:48:14', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `messages` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `email`, `name`, `messages`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 'nguyentranlinh31@gmail.com', 'Nguyen Tran Ngoc Linh', 'OK', 4, '2023-11-14 19:38:29', '2023-11-14 19:38:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mèo méo meo', 'loli@gmail.com', NULL, '$2y$10$L.JpKhhMil2Rz2uyoWPo9.d0yHoTsReUtLKrQsa42PdWvFBDHzCiu', NULL, '2023-11-14 08:04:16', '2023-11-14 08:04:16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Chỉ mục cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_comments_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD CONSTRAINT `product_comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
