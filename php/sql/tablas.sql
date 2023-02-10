/*--------------------------- TABLAS SIN RELACION ----------------------------------------------------*/
CREATE TABLE IF NOT EXISTS estatus(
    ID_Estatus int not null auto_increment,
    Estatus varchar(50) not null, /* conectado */
    PRIMARY KEY(ID_Estatus)
)Engine=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS departamentos(
    ID_Departamento int not null auto_increment,
    Departamento varchar(50),
    PRIMARY KEY(ID_Departamento)
)Engine=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS puestos(
    ID_Puesto int not null auto_increment,
    Nombre_Puesto varchar(84) not null,
    Descripcion varchar(30) not null,
    ID_Departamento int not null,
    PRIMARY KEY(ID_Puesto),
    FOREIGN KEY(ID_Departamento) REFERENCES departamentos(ID_Departamento)
)Engine=InnoDB DEFAULT CHARSET=UTF8;


CREATE TABLE IF NOT EXISTS asistencia(
    ID_Asistencia int not null auto_increment,
    Asistencia varchar(30) not null,
    Fecha DATE not null,
    Hora_Entrada TIME not null,
    Hora_Saluda TIME  not null,
    Horas_Acumuladas int not null,
    PRIMARY KEY(ID_Asistencia)
)Engine=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS estado_prestamo(
    ID_EstadoPrestamo int not null auto_increment,
    Estado_Prestamo varchar(64) not null,
    PRIMARY KEY(ID_EstadoPrestamo)
)Engine=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS estado_pedido(
    ID_EstadoPedido int not null,
    Nombre_Pedido int not null,
    PRIMARY KEY(ID_EstadoPedido)
)Engine=InnoDB DEFAULT CHARSET=UTF8;

/*CREATE TABLE IF NOT EXISTS Pase*/

/*------------------------------- TABLAS CON RELACION -------------------------------------------------*/
/* TABLA DE EMPLEADOS */

CREATE TABLE IF NOT EXISTS empleados (
    ID_Empleado int not null auto_increment,
    Nombre_Usuario varchar(16) not null,
    Nombres varchar(30) not null,
    Apellidos varchar(30) null,
    Direccion varchar(50) not null,
    Correo_Electronico varchar(40) not null,
    Telefono varchar(16) not null,
    Contraseña varchar(20) not null,
    ID_Puesto int not null,
    ID_Asistencia int,
    ID_Estatus int not null,
    PRIMARY KEY(ID_Empleado),
    FOREIGN KEY(ID_Puesto) REFERENCES puestos(ID_Puesto),
    FOREIGN KEY(ID_Asistencia) REFERENCES asistencia(ID_Asistencia),
    FOREIGN KEY(ID_ESTATUS) REFERENCES estatus(ID_Estatus)
)Engine=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS salarios(
    ID_Salario int not null auto_increment,
    Salario_Semanal float null,
    Prestamos float null,
    Horas_Laborales datetime null,
    Horas_Trabajadas datetime null,
    Horas_No_Trabajadas datetime null,
    Precio_Hora float,
    Descuento float,
    ID_Empleado int,
    PRIMARY KEY(ID_Salario),
    FOREIGN KEY(ID_Empleado) REFERENCES empleados(ID_Empleado)
)Engine=InnoDB DEFAULT CHARSET=utf8;

/*------------------------------------ TABLA DE INVENTARIO ---------------------------------------*/

CREATE TABLE IF NOT EXISTS proveedores(
    ID_Proveedor int not null auto_increment,
    Empresa varchar(100) not null,
    Direccion varchar(158) not null,
    Telefono varchar(100) not null,
    Correo_Electronico varchar(128) not null,
    Descripcion varchar(180) not null,
    Ciudad varchar(100) not null,
    PRIMARY KEY(ID_Proveedor)
)Engine=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS muebles(
    ID_Mueble int not null auto_increment,
    Codigo char(15) not null,
    Nombre varchar(28) not null,
    Imagen_Mueble longblob  null,
    Descripcion varchar(128) not null,
    Alto float not null,
    Ancho float not null,
    Largo float not null,
    Stock int  null,
    ID_Proveedor int null,
    ID_Empleado int null,
    PRIMARY KEY(ID_Mueble),
    FOREIGN KEY(ID_Proveedor) REFERENCES proveedores(ID_Proveedor)
)Engine=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS materiales(
    ID_Material int not null auto_increment,
    Codigo char(15) not null,
    Nombre_Material varchar(156) not null,
    Descripcion varchar(128) null,
    Stock int null,
    Precio_Unitario float not null,
    Total float null,
    ID_Proveedor int null,
    Categoria varchar(56) not null,
    PRIMARY KEY(ID_Material),
    FOREIGN KEY(ID_Proveedor) REFERENCES proveedores(ID_Proveedor)
)Engine=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS maderas(
    ID_Madera int not null auto_increment,
    Codigo varchar(25) not null,
    Nombre_Madera varchar(128) not null,
    Stock int not null,
    Precio_Unidad double null,  
    ID_Proveedor int null,
    ID_Empleado int null,
    PRIMARY KEY(ID_Madera),
    FOREIGN KEY(ID_Proveedor) REFERENCES proveedores(ID_Proveedor),
    FOREIGN KEY(ID_Empleado) REFERENCES empleados(ID_Empleado)
)Engine=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS requerimientomaterial(
    ID_Requerimiento int not null,
    ID_Material int not null,
    ID_Mueble int not null,
    ID_Madera int not null,
    Cantidad int not null,
    PRIMARY KEY(ID_Requerimiento),
    FOREIGN KEY(ID_Material) REFERENCES materiales(ID_Material),
    FOREIGN KEY(ID_Mueble) REFERENCES muebles(ID_Mueble),
    FOREIGN KEY(ID_Madera) REFERENCES maderas(ID_Madera)
)Engine=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS reportes(
    ID_Reporte int not null auto_increment,
    ID_Madera int null,
    ID_Material INT null,
    ID_Mueble INT null,
    ID_Empleado INT null,
    Fecha DATE null,
    Hora TIME null,
    Accion varchar(24) null,
    Cantidad int null,
    Stock int null,
    Gasto_Entrada double null,
    PRIMARY KEY(ID_Reporte),
    FOREIGN KEY(ID_Madera) REFERENCES maderas(ID_Madera),
    FOREIGN KEY(ID_Material) REFERENCES materiales(ID_Material),
    FOREIGN KEY(ID_Mueble) REFERENCES muebles(ID_Mueble),
    FOREIGN KEY(ID_Empleado) REFERENCES empleados(ID_Empleado)
)Engine=InnoDB DEFAULT CHARSET=UTF8;