-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-07-2024 a las 16:08:17
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bankdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `lastname`, `email`, `birthday`, `address`, `city`, `phone`, `registration_date`) VALUES
(1, 'John', 'Doe', 'john.doe@email.com', '1990-05-15', '123 Maple St, Anytown', 'Anytown', '555-123-4568', '2023-01-02'),
(2, 'Jane', 'Smith', 'jane.smith@email.com', '1985-09-20', '456 Oak Ave, Springfield', 'Springfield', '555-987-6543', '2023-01-02'),
(3, 'Michael', 'Brown', 'michael.brown@email.com', '1988-03-10', '789 Elm St, Lakeside', 'Lakeside', '555-111-2222', '2023-01-03'),
(4, 'Emily', 'Johnson', 'emily.johnson@email.com', '1992-11-25', '321 Pine Rd, Sunnydale', 'Sunnydale', '555-333-4444', '2023-01-04'),
(5, 'William', 'Lee', 'william.lee@email.com', '1980-07-05', '567 Cedar Ave, River City', 'River City', '555-555-1234', '2023-01-05'),
(6, 'Olivia', 'Garcia', 'olivia.garcia@email.com', '1995-04-30', '890 Maple Dr, Hilltop', 'Hilltop', '555-777-9999', '2023-01-06'),
(7, 'Ethan', 'Martinez', 'ethan.martinez@email.com', '1983-12-12', '234 Birch Ln, Mountainview', 'Mountainview', '555-246-1357', '2023-01-07'),
(8, 'Sophia', 'Robinson', 'sophia.robinson@email.com', '1987-08-18', '876 Walnut Blvd, Lakeside', 'Lakeside', '555-987-6543', '2023-01-08'),
(9, 'James', 'Clark', 'james.clark@email.com', '1993-06-08', '543 Pine Ave, Springfield', 'Springfield', '555-369-2580', '2023-01-09'),
(10, 'Mia', 'Hall', 'mia.hall@email.com', '1998-02-28', '789 Oak St, Hilltop', 'Hilltop', '555-741-8520', '2023-01-10'),
(11, 'Alexander', 'Lewis', 'alexander.lewis@email.com', '1982-10-15', '432 Cedar Rd, River City', 'River City', '555-123-4567', '2023-01-11'),
(12, 'Isabella', 'Walker', 'isabella.walker@email.com', '1991-09-03', '876 Elm Ave, Mountainview', 'Mountainview', '555-987-6543', '2023-01-12'),
(13, 'Noah', 'Young', 'noah.young@email.com', '1986-05-20', '345 Maple Ln, Sunnydale', 'Sunnydale', '555-333-4444', '2023-01-13'),
(14, 'Emma', 'Allen', 'emma.allen@email.com', '1994-03-07', '678 Oak Dr, Anytown', 'Anytown', '555-555-1234', '2023-01-14'),
(15, 'Liam', 'Hall', 'liam.hall@email.com', '1989-01-25', '901 Pine St, Springfield', 'Springfield', '555-777-9999', '2023-01-15'),
(16, 'Amelia', 'Turner', 'amelia.turner@email.com', '1984-11-02', '123 Elm Rd, Lakeside', 'Lakeside', '555-246-1357', '2023-01-16'),
(17, 'Benjamin', 'Scott', 'benjamin.scott@email.com', '1996-07-14', '456 Maple Ave, Hilltop', 'Hilltop', '555-369-2580', '2023-01-17'),
(18, 'Charlotte', 'Green', 'charlotte.green@email.com', '1981-04-06', '789 Cedar Blvd, River City', 'River City', '555-741-8520', '2023-01-18'),
(19, 'Elijah', 'Adams', 'elijah.adams@email.com', '1997-02-19', '234 Oak Ln, Mountainview', 'Mountainview', '555-123-4567', '2023-01-19'),
(20, 'Ava', 'Hill', 'ava.hill@email.com', '1988-12-23', '567 Pine Dr, Sunnydale', 'Sunnydale', '555-987-6543', '2023-01-20'),
(21, 'Lucas', 'Baker', 'lucas.baker@email.com', '1990-10-11', '890 Elm Rd, Anytown', 'Anytown', '555-333-4444', '2023-01-21'),
(22, 'Grace', 'Morris', 'grace.morris@email.com', '1992-08-04', '321 Maple Ave, Springfield', 'Springfield', '555-555-1234', '2023-01-22'),
(29, 'example', 'example', 'example@example.com', '2024-07-01', 'example', 'example', '555-123-1234', '2024-07-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `correo_electronico` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`correo_electronico`, `nombre`, `contrasena`) VALUES
('admin@admin.com', 'admin', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0'),
('example@example.com', 'example', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0'),
('robertjosue654@gmail.com', 'Robert J', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`correo_electronico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
