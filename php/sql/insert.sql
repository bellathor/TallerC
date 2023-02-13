insert into departamentos (Departamento) VALUES ("CEO");
insert into departamentos (Departamento) VALUES ("Taller");
insert into departamentos (Departamento) VALUES ("Tienda");
insert into departamentos (Departamento) VALUES ("Gestion Empresarial");

insert into puestos (Nombre_Puesto, Descripcion, ID_Departamento) values ("Director", "CEO", 1);
insert into puestos (Nombre_Puesto, Descripcion, ID_Departamento) values ("Gerente", "Supervisor(a) Taller", 2);
insert into puestos (Nombre_Puesto, Descripcion, ID_Departamento) values ("Carpintero", "Manufactura", 2);
insert into puestos (Nombre_Puesto, Descripcion, ID_Departamento) values ("Madera", "Madera/acerradores", 2);
insert into puestos (Nombre_Puesto, Descripcion, ID_Departamento) values ("Pulido", "Área de pulido", 2);
insert into puestos (Nombre_Puesto, Descripcion, ID_Departamento) values ("Pintura", "Área de acabado y pintura", 2);
insert into puestos (Nombre_Puesto, Descripcion, ID_Departamento) values ("Delivery", "Instalacion y Entregas", 2);
insert into puestos (Nombre_Puesto, Descripcion, ID_Departamento) values ("Gerente", "Supervisor(a) Tienda", 3);
insert into puestos (Nombre_Puesto, Descripcion, ID_Departamento) values ("Gestor Empresarial", "Supervisor(a)", 4);
insert into puestos (Nombre_Puesto, Descripcion, ID_Departamento) values ("Administracion", "Nominas, Facturas, Gastos", 4);
insert into puestos (Nombre_Puesto, Descripcion, ID_Departamento) values ("Bodega", "Inventarios bodega taller", 4);
insert into puestos (Nombre_Puesto, Descripcion, ID_Departamento) values ("Compras", "Compras", 4);
insert into puestos (Nombre_Puesto, Descripcion, ID_Departamento) values ("Salidas", "Calidad y Entregas", 4);

insert into estatus (Estatus) VALUES ("Desconectado");
insert into estatus (Estatus) VALUES ("Conectado");



/*insert into empleados (Nombre_Usuario, Primer_Nombre, Segundo_Nombre, Primer_Apellido, Segundo_Apellido, Direccion, Correo_Electronico, Contraseña, Salt, ID_Puesto, ID_Prestamo, ID_Asistencia, ID_Estatus);*/
