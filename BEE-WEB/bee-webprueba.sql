-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2024 a las 23:09:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bee-webprueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idCarrito`, `cliente_id`, `producto_id`, `cantidad`) VALUES
(143, 3, 26, 5),
(146, 3, 42, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Productos IMA'),
(2, 'Dulces de amaranto'),
(3, 'Varios'),
(4, 'Cera de abeja'),
(5, 'Material apicola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombreCliente` varchar(100) NOT NULL,
  `passwdCliente` varchar(100) NOT NULL,
  `nivelCliente` int(11) NOT NULL,
  `correo_id` int(11) NOT NULL,
  `saldoCliente` float NOT NULL,
  `imgCliente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombreCliente`, `passwdCliente`, `nivelCliente`, `correo_id`, `saldoCliente`, `imgCliente`) VALUES
(3, 'Angel', '178974', 3, 2, 775.6, 'Angel.jpg'),
(4, 'Saucedo', 'asdadasd', 3, 2, 1, 'Saucedo.jpg'),
(5, 'Prueba1', 'contraPrueba', 3, 3, 1, 'Prueba1.jpg'),
(6, 'pepinillo', 'prueba', 3, 7, 498.1, 'pepinillo.jpg'),
(7, 'Nuevo1', 'ejemplo', 3, 8, 7939.3, 'Nuevo1.jpg'),
(8, 'ejemplo2', 'ejemplo', 3, 9, 582.53, 'ejemplo2.jpg'),
(9, 'carpeta', 'ejemplo', 3, 13, 29.41, 'carpeta.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `cantidadCompra` int(11) NOT NULL,
  `costoCompra` float NOT NULL,
  `fechaCompra` date NOT NULL,
  `productoCompra` varchar(100) NOT NULL,
  `imgCompra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idCompra`, `cliente_id`, `cantidadCompra`, `costoCompra`, `fechaCompra`, `productoCompra`, `imgCompra`) VALUES
(1, 7, 3, 9.2, '2024-10-31', 'shampoo miel', 'Nuevo1.jpg'),
(24, 7, 1, 34.9, '2024-10-31', 'shampoo miel', 'shampoo miel.jpg'),
(25, 7, 1, 34.9, '2024-10-31', 'shampoo miel', 'shampoo miel.jpg'),
(26, 7, 1, 50, '2024-10-31', 'tenis ', 'tenis .jpg'),
(27, 9, 1, 50, '2024-10-31', 'tenis ', 'tenis .jpg'),
(28, 8, 1, 56.9, '2024-10-31', 'pelicula', 'pelicula.jpg'),
(29, 8, 1, 50, '2024-10-31', 'tenis ', 'tenis .jpg'),
(30, 8, 1, 18.9, '2024-10-31', 'miel', 'miel.jpg'),
(31, 7, 1, 18.9, '2024-10-31', 'miel', 'miel.jpg'),
(32, 7, 1, 56.9, '2024-10-31', 'pelicula', 'pelicula.jpg'),
(33, 7, 1, 50, '2024-10-31', 'tenis ', 'tenis .jpg'),
(34, 6, 1, 34.9, '2024-10-31', 'shampoo miel', 'shampoo miel.jpg'),
(35, 3, 1, 34.9, '2024-10-31', 'shampoo miel', 'shampoo miel.jpg'),
(36, 6, 1, 34.9, '2024-10-31', 'shampoo miel', 'shampoo miel.jpg'),
(37, 3, 3, 173.7, '2024-11-02', 'colmenauno', 'colmenauno.jpg'),
(38, 3, 3, 170.7, '2024-11-02', 'mielC', 'mielC.jpg'),
(39, 3, 21, 44.1, '2024-11-13', 'pelicula', 'pelicula.jpg'),
(40, 3, 1, 57.9, '2024-11-17', 'colmenauno', 'colmenauno.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `nombreEmpleado` varchar(100) NOT NULL,
  `passwdEmpleado` varchar(100) NOT NULL,
  `nivelEmpleado` int(11) NOT NULL,
  `correoEmpleado` varchar(100) NOT NULL,
  `imgEmpleado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `nombreEmpleado`, `passwdEmpleado`, `nivelEmpleado`, `correoEmpleado`, `imgEmpleado`) VALUES
(1, 'Trabajador1', '1234', 2, 'trabajador1@gmail.com', 'Trabajador1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuevocliente`
--

CREATE TABLE `nuevocliente` (
  `idNuevo` int(11) NOT NULL,
  `correoCliente` varchar(100) NOT NULL,
  `claveNuevo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nuevocliente`
--

INSERT INTO `nuevocliente` (`idNuevo`, `correoCliente`, `claveNuevo`) VALUES
(2, '178974@upslp.edu.mx', '79OC'),
(3, 'angel@gmail.com', '36XC'),
(4, 'ejemplo@gmail.com', '83XN'),
(5, '178974@gmail.com', '80AK'),
(6, 'ejemplo2@gmail.com', '47DX'),
(7, 'pepinillo@gmail.com', '38AO'),
(8, 'asasf@gmail.com', '55YG'),
(9, 'miel@gmail.com', '20UF'),
(10, 'afasf@gmail.comasndjinsdjidsasdasd', '09ZK'),
(11, 'valida@gmail.com', '16BO'),
(12, 'valida1@upslp.edu.mx', '41JO'),
(13, 'carpeta@gmail.com', '46MF'),
(14, 'computadora@gmail.com', '54IE'),
(15, 'fuerte@gmail.com', '43VP'),
(16, 'hogar@gmail.com', '53WL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(100) NOT NULL,
  `costoProducto` float NOT NULL,
  `cantidadProducto` int(11) NOT NULL,
  `imagenProducto` varchar(100) NOT NULL,
  `cantidadVenta` int(11) NOT NULL,
  `descripcionProducto` text NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombreProducto`, `costoProducto`, `cantidadProducto`, `imagenProducto`, `cantidadVenta`, `descripcionProducto`, `categoria_id`) VALUES
(1, 'pelicula', 2.1, 0, 'pelicula.jpg', 30, 'Ejemplo de modificacion de los datos sin modificar la imagen', 1),
(11, 'mielC', 56.9, 20, 'mielC.jpg', 19, 'Producto mielC', 2),
(12, 'tenis ', 50, 28, 'tenis .jpg', 24, 'Tenis luivuiton de san luis potosi', 2),
(15, 'shampoo miel', 34.9, 201, 'shampoo miel.jpg', 36, 'kasnkjasnjnascsac aixasbicbashcsa ', 1),
(25, 'colmenauno', 57.9, 30, 'colmenauno.jpg', 4, 'Agregar un nuevo producto para calcular la paginacion', 3),
(26, 'arbol miel', 12.89, 200, 'arbol miel.jpg', 0, 'Esta es una prueba para modificar datos de este input', 4),
(27, 'mermelada miel', 231, 34, 'mermelada miel.jpg', 0, 'sdasdasassd', 2),
(28, 'mermelada prueba', 343.7, 23, 'mermelada prueba.jpg', 0, 'sadadasdasas asdassasasd', 2),
(29, 'caa', 45.78, 34, 'caa.jpg', 0, 'aasdsa dasdadadassad', 2),
(30, 'segundo', 45.7, 23, 'segundo.jpg', 0, 'asdabsdaus dasgduasgduyadas', 2),
(31, 'local', 34.34, 2323, 'local.jpg', 0, 'sdasdasdas', 2),
(32, 'promesa', 45.56, 12, 'promesa.jpg', 0, 'adasda asdasdad asdasdasasd', 2),
(33, 'pueblo', 89.45, 67, 'pueblo.jpg', 0, 'sadsad sa frge gegegr', 2),
(34, 'frasco', 78.34, 67, 'frasco.jpg', 0, 'safkljasfj jafsoijoaisfasfsa', 2),
(35, 'mente', 56.54, 34, 'mente.jpg', 0, 'asdasd ajdioads  spopfjf sdf', 2),
(36, 'alemania', 56.34, 45, 'alemania.jpg', 0, 'asasasd asdjoasi dosah dasd ao apsasodsasa', 2),
(38, 'ropa', 45, 34, 'ropa.jpg', 0, 'sdf sfsdf dsf dsfd', 2),
(39, 'nombre', 34, 23, 'nombre.jpg', 0, 'asasdasdasas', 2),
(40, 'prueba Alta producto', 89.76, 8, 'prueba Alta producto.jpg', 0, 'Esta es una prueba para subir productos usando ajax y jquery', 2),
(41, 'peso', 8.23, 12, 'peso.jpg', 0, 'Segunda prueba con el metodo ajax y jquery para subir productos a la abse de datos y gestion de las imagenes y sin errores en img', 5),
(42, 'jefe', 34.56, 34, 'jefe.jpg', 0, 'Prueba de formulario con ajax parte tres 3 para modificar', 1),
(44, 'carpeta', 45, 34, 'carpeta.jpg', 0, 'Esta es la prueba 2 de la alta con ajax', 4),
(45, 'previsualizacion', 45.9, 23, 'previsualizacion.jpg', 0, 'Este es un ejemplo con previsualizacion en la imagen', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idCarrito`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fk_categoria_nueva` (`correo_id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `fk_Customer` (`cliente_id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `nuevocliente`
--
ALTER TABLE `nuevocliente`
  ADD PRIMARY KEY (`idNuevo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_categoria` (`categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idCarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nuevocliente`
--
ALTER TABLE `nuevocliente`
  MODIFY `idNuevo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_categoria_nueva` FOREIGN KEY (`correo_id`) REFERENCES `nuevocliente` (`idNuevo`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_Customer` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
