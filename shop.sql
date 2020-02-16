<!--error--><br />
<b>Deprecated</b>:  Array and string offset access syntax with curly braces is deprecated in <b>Z:\home\localhost\www\Tools\phpmyadmin\libraries\Util.php</b> on line <b>2124</b><br />
<script language=JavaScript src='/denwer/errors/phperror_js.php'></script>-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 09 2020 г., 15:58
-- Версия сервера: 5.7.15
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cart` (`id`, `Product_id`, `User_id`) VALUES
(19, 2, 14),
(21, 2, 14),
(23, 2, 14),
(25, 2, 14),
(27, 2, 14),
(30, 2, 14),
(31, 2, 14),
(33, 1, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `Name`) VALUES
(1, 'Книги'),
(2, 'Одежда'),
(3, 'Компьютерная периферия'),
(4, 'Комплектующие для ПК');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `User_id`, `Product_id`, `Date`) VALUES
(1, 14, 2, '2020-02-08 16:51:10'),
(2, 14, 2, '2020-02-08 16:53:09'),
(3, 14, 2, '2020-02-08 16:53:17'),
(4, 14, 1, '2020-02-08 17:00:20'),
(5, 14, 2, '2020-02-08 17:00:57'),
(6, 14, 2, '2020-02-08 17:03:07'),
(7, 14, 2, '2020-02-08 17:03:16'),
(8, 13, 1, '2020-02-08 19:16:02'),
(9, 13, 2, '2020-02-08 19:18:05'),
(10, 13, 4, '2020-02-08 20:44:24'),
(11, 13, 6, '2020-02-08 20:57:56'),
(12, 13, 10, '2020-02-08 21:43:34'),
(13, 13, 4, '2020-02-08 22:14:49');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `Catalog_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Count` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `Discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `products` (`id`, `Catalog_id`, `Name`, `Count`, `Price`, `Image`, `Description`, `Discount`) VALUES
(4, 2, 'GUESS', 26, 3490, '10810034-1.jpg', 'Опции капюшонабез капюшона\r\nУход за вещамибережная стирка при 30 градусах\r\nФактура материалатрикотажный\r\nПокройпрямой\r\nВид застежкибез застежки\r\nДлина изделия по спинке35 см\r\nКомплектациятолстовка\r\nПолДевочки\r\nСезондемисезон\r\nСтрана брендаСоединенные Штаты\r\nСтрана производительИндия', 0),
(5, 2, 'Ekonika', 250, 12990, '10790751-1.jpg', 'натуральная кожа 100%\r\nПолнота обуви (EUR)F (6)\r\nМатериал стелькинатуральная кожа\r\nМатериал подошвы обувирезина\r\nМатериал подкладки обувибез подкладки; натуральная кожа\r\nВид застежкимолния\r\nВысота голенища11.5 см\r\nОбхват голенища25.8 см\r\nВысота каблука4 см\r\nКомплектацияботильоны\r\nПолЖенский\r\nСезондемисезон\r\nСтрана брендаРоссия\r\nСтрана производительКитай', 0),
(6, 2, 'Reversal', 15, 3738, '10833299-1.jpg', 'Верх обуви выполнен их натуральной лаковой кожи. Подкладка и стелька выполнены из натуральной кожи коровы.\r\n\r\nПолнота обуви (EUR)F (6)\r\nМатериал стелькинатуральная кожа\r\nМатериал подошвы обувиТЭП (термоэластопласт)\r\nМатериал подкладки обувинатуральная кожа; текстиль\r\nВид застежкишнуровка\r\nВысота подошвы1 см\r\nВысота каблука2 см\r\nКомплектацияполуботинки\r\nПолЖенский\r\nСезондемисезон\r\nСтрана брендаРоссия\r\nСтрана производительРоссия', 0),
(7, 1, 'UNIX. Профессиональное программирование', 56, 2247, '2640372_detail.jpg', 'Эта книга заслуженно пользуется популярностью у серьезных программистов во всем мире, поскольку содержит самую важную и практическую информацию об управлении ядрами UNIX и Linux. Без этих знаний невозможно написать эффективный и надежный код.\r\n.От основ - файлы, каталоги и процессы - вы постепенно перейдете к более сложным вопросам, таким как обработка сигналов и терминальный ввод/вывод, многопоточная модель выполнения и межпроцессное взаимодействие с применением сокетов.\r\n.В общей сложности в этой книге охвачены более 70 интерфейсов, включая функции POSIX асинхронного ввода/вывода, циклические блокировки, барьеры и семафоры POSIX.\r\n.3-е издание.', 0),
(8, 1, 'Меч Предназначения', 115, 357, '2290050_detail.jpg', 'Ведьмак - это мастер меча и мэтр волшебства, ведущий непрерывную войну с кровожадными монстрами, которые угрожают покою сказочной страны. "Ведьмак" - это мир на острие меча, ошеломляющее действие, незабываемые ситуации, великолепные боевые сцены.', 10),
(9, 1, 'Просто об искусстве. О чем молчат в музеях', 50, 636, '2774007_detail.jpg', 'Слыша имя "Леонардо да Винчи" представляете себе дряхлого старика, который уныло глядит на вас с самого знаменитого автопортрета в истории живописи? Стыд и срам! Благодаря Марии Санти вам станет ясно, что он был щеголем, модником и вообще весьма эпатажным человеком. Кроме того, вы узнаете, что Микеланджело презирал людей, а самая знаменитая египтянка в истории (спойлер: Клеопатра), в общем-то, египтянкой и не была. ', 15),
(10, 3, 'МОНИТОР ACER V226HQLB 21.5" ЧЕРНЫЙ TN+FILM LED 5MS 16:9 МАТОВАЯ 250CD 1920X1080 D-SUB FHD', 124, 5430, '12.jpg', 'Тип	ЖК-монитор, широкоформатный\r\nДиагональ	21.5"\r\nРазрешение	1920x1080 (16:9)\r\nТип матрицы экрана	TFT TN\r\nПодсветка	WLED\r\nМакс. частота обновления кадров	75 Гц\r\nШаг точки по горизонтали	0.248 мм\r\nШаг точки по вертикали	0.248 мм\r\nЯркость	200 кд/м2\r\nДинамическая контрастность	100000000:1\r\nВремя отклика	5 мс\r\nОбласть обзора	по горизонтали: 90°, по вертикали: 65°\r\nМаксимальное количество цветов	16.7 млн.\r\nПокрытие экрана	антибликовое\r\nЧастота обновления	строк: 30-80 кГц; кадров: 55-75 Гц\r\nВходы	VGA (D-Sub)\r\nБлок питания	встроенный\r\nСтандарты	экологический: MPR-II, TCO 6.0\r\nНастенное крепление	есть, 100x100 мм\r\nРазмеры, вес	508x391x207 мм, 3.20 кг', 20),
(11, 3, 'КЛАВИАТУРА COOLER MASTER MK750 RUS MK-750-GKCR1-RU', 256, 15810, '5d42bfd1e8ea8400012aa873.jpg', 'Комплектация	игровая клавиатура\r\nНазначение	настольный компьютер\r\nТип соединения	проводное\r\nИнтерфейс подключения	USB\r\nКонструкция	классическая\r\nТип	механическая\r\nТип переключателей	Cherry MX Red\r\nЦифровой блок	да\r\nПодсветка клавиш клавиатуры	да', 15),
(12, 3, 'ГРАФИЧЕСКИЙ ПЛАНШЕТ WACOM INTUOS S BLACK', 14, 6320, '5d42b710e8ea8400012a7703.jpg', 'Тип	графический планшет\r\nТип подключения	проводной\r\nИнтерфейс	USB\r\nРабочая область	А6\r\nРазмер рабочей области	152х95 мм\r\nРазрешение	2540 lpi\r\nСкорость отслеживания	133 pps\r\nНаличие программируемых кнопок	есть\r\nЦвет	черный\r\nРазмеры	227 x 187 x 35 мм\r\nВес	230 г', 11),
(13, 4, 'Процессор Intel Core i9-9900K', 56, 41990, '9hq.webp', 'сокет: LGA1151 v2\r\n8-ядерный процессор, 3600 МГц\r\nтехпроцесс 14 нм\r\nтепловыделение 95 Вт\r\nобъем кэша L2/L3: 2 МБ/16 МБ\r\nинтегрированная графика: UHD 630, 1200 МГц\r\nтип памяти: DDR4\r\nколичество потоков: 16\r\nядро процессора: Coffee Lake-S\r\nигровой\r\nдата выхода: Q4 2018', 15),
(14, 4, 'Оперативная память 16 ГБ 2 шт. HyperX HX426C13PB3K2/32', 25, 10918, '9hq (1).webp', '2 модуля памяти DDR4\r\nобъем модуля 16 ГБ\r\nформ-фактор DIMM, 288-контактный\r\nчастота 2666 МГц\r\nрадиатор\r\nCAS Latency (CL): 13', 5),
(15, 4, 'Видеокарта GIGABYTE GeForce GTX 1660 SUPER 1830MHz PCI-E 3.0 6144MB 14000MHz 192 bit HDMI 3xDisplayPort HDCP OC', 64, 16590, '9hq (2).webp', 'видеокарта NVIDIA GeForce GTX 1660 SUPER\r\n6144 МБ видеопамяти GDDR6\r\nчастота ядра/памяти: 1830/14000 МГц\r\nразъемы HDMI, DisplayPort x3\r\nподдержка DirectX 12, OpenGL 4.6, Vulkan\r\nработа с 4 мониторами', 6);


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Reg_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `Fname`, `Email`, `Password`, `Role`, `Reg_date`) VALUES
(8, 'TestName', 'TestEmail@gmail.com', '$2y$10$t0cLx7cvz/O8CJ2Rr36Ed.oQXNcr8l3syVwfguPFaeYShS6AClLxO', 'member', '2020-02-07 20:13:47'),
(9, 'Ilyas', 'Test@gmail.com', '$2y$10$I2V1/4.t.bAm8DwgH2DSPekLUBMaIl8m9oME.BawW9avCcMFgZlC.', 'member', '2020-02-07 20:43:48'),
(10, 'test', 'te@mail.com', '$2y$10$ytMr9mtIIeNAvMEP0mvFF.BCQ0HS4fdRfBVmlj1zekGKczVbxfvbu', 'member', '2020-02-07 21:14:57'),
(11, 'Ilya', 'Ilya@i', '$2y$12$YsKKOgVgl4j9K.5uxowFoeZj5hkXa1lOORVZiep8Ov1IzsHc6UkSW', 'member', '2020-02-07 21:20:41'),
(12, 'qwe', 'qwe@qwe', '$2y$12$a8yCFGyW5G5uwdgO7oTIOeJZhwNh//FsS8NR6/GEH5JqWVJCNTac6', 'member', '2020-02-07 21:26:12'),
(13, 'UserName', 'UserEmail@mail.ru', '$2y$12$V7X3hVmE3Jdz6dxIono55e6WUwoGSFpGNcY5hh5gdyCqUUwZkOKqO', 'member', '2020-02-08 00:49:24'),
(14, 'Name', 'Name@mail.ru', '$2y$12$dcHF6pBbNbJzyMtoprqmtuhtWhvIJ20KrI2aKX1JdgiL1JNNUEPge', 'member', '2020-02-08 02:32:51');

ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
