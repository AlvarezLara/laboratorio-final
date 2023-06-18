CREATE TABLE `usuarios_final` (
`ID` INT AUTO_INCREMENT PRIMARY KEY,
`Nombre` varchar(20) NOT NULL,
`PrimerApellido` varchar(20) NOT NULL,
`SegundoApellido` varchar(20) NOT NULL,
`Email` varchar(20) NOT NULL,
`Login` varchar(50) NOT NULL,
`Password` varchar(8) NOT NULL
) ENGINE=INNODB DEFAULT charset=utf8mb4;