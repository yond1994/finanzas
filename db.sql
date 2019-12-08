-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2019 a las 23:39:26
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pesos_finanzas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` text,
  `number` varchar(100) DEFAULT NULL,
  `type` enum('corriente','ahorro') DEFAULT 'ahorro'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `account`
--

INSERT INTO `account` (`id`, `name`, `number`, `type`) VALUES
(23, 'Caja Grande', '2', 'corriente'),
(24, 'Caja Chica', '3', 'corriente'),
(30, 'Stripe España', '1', 'corriente'),
(31, 'Compropago', '1', 'corriente'),
(32, 'Mercadopago', '5', 'corriente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attached`
--

CREATE TABLE `attached` (
  `id` int(11) NOT NULL,
  `path` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'fecha de edicion',
  `summary_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `attached`
--

INSERT INTO `attached` (`id`, `path`, `created_at`, `updated_at`, `summary_id`) VALUES
(20, 'attached/xFsrvJgt7CcSk8q41UUfNndJfvuHgcocKiuCkywy.pdf', '2017-07-07 07:07:00', '2017-07-07 07:07:00', 102),
(21, 'attached/XeXdGzPwAJ2EDtg7RwWqkx7C0vSCPeuckdEKxSAr.jpeg', '2017-07-29 20:04:55', '2017-07-29 20:04:55', 245),
(22, 'attached/m2u2hIyiuZxEVbtDl2G8dWHakhKfFgzFgMBAKorQ.jpeg', '2017-07-29 20:05:21', '2017-07-29 20:05:21', 246),
(23, 'attached/02JpLomkLKXp0uO0sqrhlSSPo2DkMCkroFVAaZeq.jpeg', '2017-07-31 22:54:14', '2017-07-31 22:54:14', 247),
(24, 'attached/zHE7jMc35jRvCYMjjbTwXCdKVuO17l8yTjWAlrAB.jpeg', '2017-07-31 22:54:49', '2017-07-31 22:54:49', 248),
(25, 'attached/0TC8HRYZZoX7FFb2qr0s8jmObUAhapnNkYmPydZn.jpeg', '2017-07-31 22:59:34', '2017-07-31 22:59:34', 249),
(26, 'attached/w99LU3BoVfmY6gptYX2T27HugpJmxvownIY5RT3z.jpeg', '2017-08-07 18:41:50', '2017-08-07 18:41:50', 279),
(27, 'attached/Daf0zS3wEwJKIx0QHbyCzIsFWN0oCr78q1KGEt03.jpeg', '2017-08-08 20:52:23', '2017-08-08 20:52:23', 293),
(28, 'attached/1lfqn9y2s3hCtAlpfPMi7a5zTuFZPFlVWnY1qvz6.jpeg', '2017-08-08 20:52:44', '2017-08-08 20:52:44', 294),
(29, 'attached/eyiSchoIJkpol2J8tsg1L4bMb8la8CdxZBW95a4Z.pdf', '2017-11-15 07:11:00', '2017-11-15 07:11:00', 907),
(30, 'attached/YRyfYQFI8JCT2RSpE0OASusLKvUORL7vZ6NBXFGE.png', '2018-02-14 00:02:00', '2018-02-14 00:02:00', 1257),
(31, 'attached/XQa13UmYsCoOEkqOiS8muPb7dBJSk4fZA8D7lXXz.png', '2018-02-14 00:02:00', '2018-02-14 00:02:00', 1258),
(32, 'attached/oZXp6CxrDym04YytJDuR4Zjlkk9LVy1LJblj4tly.jpeg', '2018-10-25 00:10:00', '2018-10-25 00:10:00', 2713),
(33, 'attached/CG9te5EUGC4C5iBl4cy7V3dL8hXNtj4lLSwoUkAG.pdf', '2018-11-13 00:11:00', '2018-11-13 00:11:00', 2845),
(34, 'attached/Yde0lrAsPFNIZpXRQGEMVaZ9mkzbtIzcfg1z9mbg.pdf', '2018-11-13 00:11:00', '2018-11-13 00:11:00', 2846),
(35, 'attached/GZJMmCOajoyacx7RAk4VoLu40Jnng56jj1v7WTZ8.pdf', '2018-11-13 16:38:06', '2018-11-13 16:38:06', 2825),
(36, 'attached/MwZ1fC69OcwqnDrNsRlEnZzmaJbHefF8CP8G7nZc.pdf', '2018-11-14 00:11:00', '2018-11-14 00:11:00', 2850),
(37, 'attached/uGx4U76oqfYsJqtu6K8nIluXDRiDzEsUbAumIJP0.pdf', '2018-11-16 00:11:00', '2018-11-16 00:11:00', 2867),
(38, 'attached/VNk36nkPszT3b0Og6lnWG45RXVeTge8pikcvjw8o.png', '2018-12-10 13:30:15', '2018-12-10 13:30:15', 2932),
(39, 'attached/g3y7zUCSH4SjV1dnlqZc9IDgxZRLFlPZ5oYIdMA7.png', '2019-12-07 23:12:00', '2019-12-07 23:12:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attr_values`
--

CREATE TABLE `attr_values` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL,
  `id_categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `attr_values`
--

INSERT INTO `attr_values` (`id`, `name`, `value`, `id_categorie`) VALUES
(101, 'Booking.com', 'comisiones recibidas por el sistema de afiliados de booking.com', 45),
(102, 'Momondo', 'comisiones recibidas por el sistema de afiliados de momondo.com', 45),
(103, 'Adsense', 'Comisiones recibidas por sistema Adsense', 45),
(104, 'Etravel solution', '1', 47),
(105, 'Bedsonline', '1', 47),
(106, 'Booking.com', '1', 47),
(107, 'Otro', '1', 47),
(108, 'Contravel', '1', 48),
(109, 'Directo aerolínea', '1', 48),
(110, 'Otro', '1', 48),
(111, 'SIM Rooming', '1', 49),
(112, 'April', '1', 50),
(113, 'Otro', '1', 50),
(114, 'Tour cancelado', '1', 51),
(115, 'Cancelación del cliente', '1', 51),
(116, 'Reembolso por incentivo', '1', 51),
(117, 'Jorge Vega', 'Director general', 52),
(118, 'Karla Guillen', 'Directora comercial', 52),
(119, 'Mayra Peña', 'Directora de finanzas', 52),
(120, 'Diana Meza', 'Atención al viajero', 52),
(121, 'Denisse Molinet', 'Atención al viajero', 52),
(122, 'Jose Lopez', 'Atención al viajero', 52),
(123, 'Leifer Mendez', 'Programador', 52),
(124, 'Leticia Manjón', 'Staff', 52),
(125, 'Alvaro Moneo', 'Staff', 52),
(126, 'Renta', '1', 53),
(127, 'Luz y agua', '1', 53),
(128, 'Limpieza', '1', 53),
(129, 'Telefonía e internet', '1', 53),
(130, 'Suministros de oficina', '1', 53),
(131, 'Otro', '1', 53),
(132, 'Contador Trillo', '1', 54),
(133, 'Eventuales', '1', 54),
(134, 'Comisiones Paypal', '1', 55),
(135, 'Comisiones bancos', '1', 55),
(136, 'Pago intereses', '1', 55),
(137, 'Viáticos en México', '1', 56),
(138, 'Facebook', '1', 57),
(139, 'Adwords', '1', 57),
(140, 'Patrocinios', '1', 57),
(141, 'Hospedaje', '1', 58),
(142, 'Convenios aéreos', '1', 58),
(143, 'Tickets de tren', '1', 58),
(144, 'Otro transporte', '1', 58),
(145, 'Seguros', '1', 58),
(146, 'Pago guías principales', '1', 58),
(147, 'Viáticos de guía y staff', '1', 58),
(148, 'Walking tours', '1', 58),
(149, 'Otras actividades incluidas ( cenas, bebidas, paseos,etc)', '1', 58),
(150, 'Imprevistos durante el viaje', '1', 58),
(151, 'Hoteles', '1', 59),
(152, 'Vuelos', '1', 59),
(153, 'Paquetes nacionales o internacionales', '1', 59),
(154, 'Seguros', '1', 59),
(155, 'Mailchimp', '1', 60),
(156, 'Jotform', '1', 60),
(157, 'Dropbox', '1', 60),
(158, 'CFDI', '1', 60),
(159, 'Envato (códigos, plugins,etc.)', '1', 61),
(160, 'Freelancer', '1', 61),
(161, 'Compra de software y licencias', '1', 61),
(162, 'Equipo de computo', '1', 62),
(163, 'Softwre y reparación', '1', 62),
(164, 'Mobiliario de oficina', '1', 62),
(165, 'Imprevistos', '1', 63),
(166, 'Multas', '1', 63),
(167, 'Declaraciones de IVA', '1', 64),
(168, 'Declaraciones de ISR', '1', 64),
(169, 'Declaración anual', '1', 64),
(170, 'Comisiones por facturación', '1', 64),
(171, 'Otras', '1', 60),
(172, 'Incentivo facebook', 'Ganador quincenal', 52),
(173, 'Comisiones por ventas', 'Comisiones extras por ventas de vuelos, hoteles o polizas', 52),
(175, 'Comisiones por transacciones', '1', 55),
(176, 'Desde Paypal', 'a Cta. moral', 68),
(177, 'Desde Cta. moral', 'a Trillo', 68),
(178, 'Desde Trillo', 'a Cta. Mayra', 68),
(179, 'Desde Paypal', '1', 69),
(180, 'Desde Cta. Moral', '1', 69),
(181, 'Desde Trillo', '1', 69),
(182, 'Cargos comisiones varias', '1', 55),
(183, 'Comisiones por cargo', '1', 67),
(184, 'Reembolso operadores', '1', 67),
(185, 'Comisiones Trillo', '1', 55),
(186, 'Jhonathan Suarez', 'Programador', 52),
(187, 'Préstamos', 'Préstamos a pagar en 4 Quincenas', 52),
(188, 'Préstamos', 'Pago de Préstamos', 67),
(189, 'Lorena Gomez', 'Kolmena', 52),
(190, 'Hugo Ramírez', 'Prácticas', 52),
(191, 'Vídeos Alex Salinas', '1', 57),
(192, 'Gorras', '1', 70),
(193, 'Plumas', '1', 70),
(194, 'Llaveros', '1', 70),
(195, 'Postapasaportes', '1', 70),
(196, 'Botellas', '1', 70),
(197, 'Otros', '1', 70),
(198, 'Ganador Links', 'Ganador de links por mes', 52),
(199, 'Souvenirs', '1', 58),
(200, 'Estefany Martinez', 'Tours Irapuato', 52),
(201, 'Desde cta Jorge', '1', 69),
(202, 'Laurenyi Jaimes', 'Tours Irapuato', 52),
(203, 'Camila Olmos', 'Mochileros apoyo verano', 52),
(204, 'Desde Cuenta España', '1', 69),
(205, 'Penelope Castro', 'Prácticas', 52),
(206, 'Evelyn Coronado', 'Prácticas', 52),
(207, 'ISN', '1', 71),
(208, 'IMSS', '1', 71),
(209, 'Canva', '1', 60),
(211, 'Sobrante Viaticos', '1', 67),
(213, 'Comisiones Hola Sim', '1', 72),
(214, 'Comisiones Bedsonline', '1', 72),
(215, 'Comisiones Contravel', '1', 72),
(216, 'Comisiones Hoteldo', '1', 72),
(217, 'Godaddy', '1', 61),
(218, 'Bono', '1', 58);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `type` enum('add','update','delete','out','transfer') NOT NULL,
  `id_user` int(11) NOT NULL,
  `activity` varchar(150) NOT NULL,
  `id_activity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `created_date`, `type`, `id_user`, `activity`, `id_activity`) VALUES
(1, '2019-10-27 00:10:00', 'delete', 10, 'tours', 51),
(2, '2019-10-27 00:10:00', 'delete', 10, 'tours', 53),
(3, '2019-10-27 00:10:00', 'delete', 10, 'tours', 37),
(4, '2019-10-27 00:10:00', 'delete', 10, 'tours', 25),
(5, '2019-10-27 00:10:00', 'delete', 10, 'tours', 21),
(6, '2019-10-27 00:10:00', 'delete', 10, 'tours', 60),
(7, '2019-10-27 00:10:00', 'delete', 10, 'tours', 59),
(8, '2019-10-27 00:10:00', 'delete', 10, 'tours', 58),
(9, '2019-10-27 00:10:00', 'delete', 10, 'tours', 57),
(10, '2019-10-27 00:10:00', 'delete', 10, 'tours', 56),
(11, '2019-10-27 00:10:00', 'delete', 10, 'tours', 55),
(12, '2019-10-27 00:10:00', 'delete', 10, 'tours', 54),
(13, '2019-10-27 00:10:00', 'delete', 10, 'tours', 52),
(14, '2019-10-27 00:10:00', 'delete', 10, 'tours', 50),
(15, '2019-12-08 00:12:00', 'delete', 1, 'categorias', 44),
(16, '2019-12-08 00:12:00', 'delete', 1, 'categorias', 42),
(17, '2019-12-08 00:12:00', 'add', 1, 'movimiento', 1),
(18, '2019-12-08 00:12:00', 'delete', 1, 'usuario', 10),
(19, '2019-12-08 00:12:00', 'delete', 1, 'usuario', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text,
  `description` text,
  `type` enum('add','out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `type`) VALUES
(1, 'transferencia', 'transferencia', 'add'),
(45, 'Afiliados y publicidad', 'Comisiones recibidas por sistemas de afiliados y publicidad', 'add'),
(46, 'Pago de reservación de tour', 'Pago ', 'add'),
(47, 'Reservaciones de hoteles', 'Reservas de hoteles para publico en general', 'add'),
(48, 'Reservaciones de vuelos', 'Reservaciones de vuelos para publico en general', 'add'),
(49, 'Venta de articulos de viaje', 'Venta de articulos de viaje para publico en general', 'add'),
(50, 'Seguros de viaje', 'Seguros de viaje para publico en general', 'add'),
(51, 'Reembolsos', 'Reembolso de tours o servicios adquiridos', 'out'),
(52, 'Nóminas', 'Pago de nominas', 'out'),
(53, 'Gastos de oficina', 'Gastos fijos y variables de oficina', 'out'),
(54, 'Honorarios externos', 'Pago de colaboradores', 'out'),
(55, 'Gastos financieros', 'Comisiones e intereses de plataformas y bancos', 'out'),
(56, 'Gastos operativos', 'Gastos operativos', 'out'),
(57, 'Publicidad', 'Pago de publicidad', 'out'),
(58, 'Gastos de tour', 'Pagos para planeación y logística de tour', 'out'),
(59, 'Pago a operadores', 'Pago de reservas a público en general', 'out'),
(60, 'Herramientas online', 'Pago de herramientas online', 'out'),
(61, 'Proyectos en desarrollo', 'Pago de herramientas y servicios para proyectos en desarrollo', 'out'),
(62, 'Mobiliario y equipo de oficina', 'Compra o gasto de reparación en equipo y mobiliario de oficina', 'out'),
(63, 'Otros gastos', 'Pago de gastos imprevistos', 'out'),
(64, 'Impuestos', 'Pago de impuestos', 'out'),
(65, 'Saldo inicial', 'Saldo de cuentas mes de junio', 'add'),
(66, 'Desconocidos', 'Cargos a cuenta desconocidos', 'out'),
(67, 'Reembolsos (ingreso)', 'Reembolsos varios', 'add'),
(68, 'Transferencia de saldos', 'Transferencias de una cuenta a otra', 'out'),
(69, 'Recepción de saldo', 'Recepción de saldo por transferencia', 'add'),
(70, 'Accesorios', 'Compra de regalos.', 'out'),
(71, 'IMSS', 'Cuotas de imss', 'out'),
(72, 'Comisiones', 'Comisiones de operadores', 'add'),
(73, 'ComproPago', 'ComproPago', 'out');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `saldo` int(11) DEFAULT NULL,
  `movimientos` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `cuentas` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `transferencia` int(11) DEFAULT NULL,
  `tours` int(11) DEFAULT NULL,
  `m_futuros` int(11) DEFAULT NULL,
  `bitacora` int(11) DEFAULT NULL,
  `adjuntos` int(11) DEFAULT NULL,
  `pdf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `id_user`, `saldo`, `movimientos`, `categoria`, `cuentas`, `usuario`, `transferencia`, `tours`, `m_futuros`, `bitacora`, `adjuntos`, `pdf`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(9, 11, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 8),
(10, 12, 8, 8, 8, 8, 0, 8, 0, 0, 0, 3, 8),
(11, 13, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 8),
(12, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `value` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'divisa', 'EUR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `summary`
--

CREATE TABLE `summary` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `concept` text,
  `type` enum('add','out','transfer') DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `factura` varchar(100) DEFAULT NULL COMMENT 'numero de factura',
  `id_attr` int(11) DEFAULT NULL,
  `id_transfer` int(11) DEFAULT NULL COMMENT 'id de transferencia',
  `tours_id` int(11) DEFAULT NULL COMMENT 'id de tour',
  `id_attr_tours` int(11) DEFAULT NULL,
  `id_autor` int(11) NOT NULL,
  `future` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `summary`
--

INSERT INTO `summary` (`id`, `created_at`, `concept`, `type`, `amount`, `tax`, `account_id`, `categories_id`, `factura`, `id_attr`, `id_transfer`, `tours_id`, `id_attr_tours`, `id_autor`, `future`) VALUES
(1, '2019-12-07 23:00:00', 'nueva entrada', 'add', 200, 0, 23, 45, '0', 102, NULL, NULL, 127, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tours`
--

INSERT INTO `tours` (`id`, `name`, `description`) VALUES
(12, 'Exploración Perú', 'Tour Exploración Perú'),
(14, 'Mega Tour de Verano', '26 días, 15 ciudades y 10 Países por Europa'),
(17, 'Invierno en Europa', '17 días, 9 ciudades y 6 Países por Europa'),
(18, 'Oktoberfest', '17 días, 6 ciudades y países por Europa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tours_attr`
--

CREATE TABLE `tours_attr` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `price` double NOT NULL,
  `id_tours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tours_attr`
--

INSERT INTO `tours_attr` (`id`, `date`, `price`, `id_tours`) VALUES
(32, '2017-10-19 00:00:00', 1, 12),
(34, '2018-07-02 00:00:00', 1, 14),
(38, '2017-09-20 00:00:00', 1, 18),
(79, '2018-07-09 00:00:00', 1, 14),
(80, '2017-09-25 00:00:00', 1, 18),
(96, '2018-09-20 00:00:00', 1, 18),
(97, '2018-10-19 00:00:00', 1, 12),
(98, '2017-12-14 00:00:00', 1, 17),
(99, '2018-12-17 00:00:00', 1, 17),
(127, '2018-12-18 00:00:00', 1, 17),
(128, '2018-09-25 00:00:00', 1, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `id_add` int(11) NOT NULL COMMENT 'id de entrada',
  `id_out` int(11) NOT NULL COMMENT 'id de salida'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$ylEQm2Mx4dfq/tgQRJUo7eikP3cls0bxvpevRUzUQTapy5pDxcw.i', 1, 1, '4HRUaqNDWxMtXTZjFe8XFYHlJopkgCBXyoc3owt1JGs6vdhnP0o9fQossJJv', '2018-01-23 08:16:47', '2018-01-23 08:16:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `attached`
--
ALTER TABLE `attached`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `attr_values`
--
ALTER TABLE `attr_values`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `summary`
--
ALTER TABLE `summary`
  ADD PRIMARY KEY (`id`,`account_id`,`categories_id`),
  ADD KEY `fk_summary_account_idx` (`account_id`),
  ADD KEY `fk_summary_categories1_idx` (`categories_id`);

--
-- Indices de la tabla `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tours_attr`
--
ALTER TABLE `tours_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `attached`
--
ALTER TABLE `attached`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `attr_values`
--
ALTER TABLE `attr_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `summary`
--
ALTER TABLE `summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tours_attr`
--
ALTER TABLE `tours_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `summary`
--
ALTER TABLE `summary`
  ADD CONSTRAINT `fk_summary_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_summary_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
