<?php
require(dirname(__DIR__) . '/config/conexion.php');
require(dirname(__DIR__) . '/scripts/clases/class_reportes.php');

class BaseDatos
{
    private $conexion;
    use Reportes;

    private $insertParams_empleados = ':us, :n, :ap, :d, :ce, :t, :pss, :idp, :idpre, :idas, :ides';

    public function __construct()
    {

    }

    public function Select($columns = null, $tabla, $inner = null, $id = null, $where = null)
    {
        if ($tabla == 'materiales') {
            if (is_numeric($id)) {
                if ($columns == null and $inner == null) {
                    $SQL = 'SELECT * FROM ' . $tabla . ' WHERE ID_Material = :id;';
                } else if ($columns != null and $inner == null) {
                    $SQL = 'SELECT ' . $columns . ' FROM ' . $tabla . ' WHERE ID_Material = :id;';
                } else if ($columns != null and $inner != null) {
                    $SQL = 'SELECT ' . $columns . ' FROM ' . $tabla . ' ' . $inner . ' WHERE ID_Material = :id;';
                }
            } else if (is_string($id)) {
                if ($columns == null and $inner == null) {
                    $SQL = 'SELECT * FROM ' . $tabla . ' WHERE Codigo = :cod;';
                } else if ($columns != null and $inner == null) {
                    $SQL = 'SELECT ' . $columns . ' FROM ' . $tabla . ' WHERE Codigo = :cod;';
                } else if ($columns != null and $inner != null) {
                    $SQL = 'SELECT ' . $columns . ' FROM ' . $tabla . ' ' . $inner . ' WHERE Codigo = :cod;';
                }
            } else if ($where == 'WHERE Categoria = ' . '"' . 'Hilos' . '"') {
                if ($columns == null and $inner == null) {
                    $SQL = 'SELECT * FROM ' . $tabla . " " . $where;
                }
            } else if ($where == 'WHERE Categoria = ' . '"' . 'Tapiceria' . '"') {
                if ($columns == null and $inner == null) {
                    $SQL = 'SELECT * FROM ' . $tabla . " " . $where;
                }
            } else if ($where == 'WHERE Categoria = ' . '"' . 'Ferreteria' . '"') {
                if ($columns == null and $inner == null) {
                    $SQL = 'SELECT * FROM ' . $tabla . " " . $where;
                }
            } else if ($where == 'WHERE Categoria = ' . '"' . 'Pintura' . '"') {
                if ($columns == null and $inner == null) {
                    $SQL = 'SELECT * FROM ' . $tabla . " " . $where;
                }
            } else if ($where == 'WHERE Categoria = ' . '"' . 'Maquinas' . '"') {
                if ($columns == null and $inner == null) {
                    $SQL = 'SELECT * FROM ' . $tabla . " " . $where;
                }
            } else {
                if ($columns == null and $inner == null) {
                    $SQL = 'SELECT * FROM ' . $tabla;
                } else if ($columns != null and $inner == null) {
                    $SQL = 'SELECT ' . $columns . ' FROM ' . $tabla;
                } else if ($columns != null and $inner != null) {
                    $SQL = 'SELECT ' . $columns . ' FROM ' . $inner . $tabla;
                }
            }
        } else if ($tabla == 'materiales hilos') {
            if ($columns == null and $inner == null) {
                $SQL = 'SELECT * FROM ' . $tabla . ' WHERE ID_Material = :id;';
            } else if ($columns != null and $inner == null) {
                $SQL = 'SELECT ' . $columns . ' FROM ' . $tabla . ' WHERE ID_Material = :id;';
            } else if ($columns != null and $inner != null) {
                $SQL = 'SELECT ' . $columns . ' FROM ' . $tabla . ' ' . $inner . ' WHERE ID_Material = :id;';
            } else if ($columns == null and $inner != null and $id != null) {
                $SQL = 'SELECT * ' . $columns . ' FROM ' . $tabla . ' ' . $inner . $id;
                $id = 'cate_hilos';
            }
        } else if ($tabla == 'reportes r') {
            if ($id != null) {

            } else {
                if ($columns == null and $inner == null) {
                    $SQL = 'SELECT * FROM ' . $tabla;
                } else if ($columns != null and $inner == null) {
                    $SQL = 'SELECT ' . $columns . ' FROM ' . $tabla;
                } else if ($columns != null and $inner != null) {
                    $SQL = 'SELECT ' . $columns . ' FROM ' . $tabla . ' ' . $inner;
                }
            }
        }else if ($tabla == 'materiales mat') {
            if ($id != null) {

            } else {
                if ($columns == null and $inner == null) {
                    $SQL = 'SELECT * FROM ' . $tabla;
                } else if ($columns != null and $inner == null) {
                    $SQL = 'SELECT ' . $columns . ' FROM ' . $tabla;
                } else if ($columns != null and $inner != null) {
                    $SQL = 'SELECT ' . $columns . ' FROM ' . $tabla . ' ' . $inner;
                }
            }
        }  
        else {
            if ($columns != null and $inner == null and $id == null) {
                $SQL = 'SELECT ' . $columns . ' FROM ' . $tabla . ';';

            } else if ($columns != null and $inner != null and $id == null) {
                $SQL = 'SELECT ' . $columns . ' FROM ' . $tabla . $inner . ';';

            } else {
                $SQL = 'SELECT * FROM ' . $tabla . ';';
            }
        }
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $query = $cx->prepare($SQL);
            if (is_numeric($id)) {
                $query->bindParam(':id', $id, PDO::PARAM_INT);
            } else if (is_string($id)) {
                $query->bindParam(':cod', $id, PDO::PARAM_STR);
            }

            if ($id == 'cate_hilos') {
                $query = $cx->prepare($SQL);
            }

            if ($id == 'WHERE Categoria = ' . '"' . 'Hilos' . '"') {
                $query = $cx->prepare($SQL);
            } else if ($id == 'WHERE Categoria = ' . '"' . 'Tapiceria' . '"') {
                $query = $cx->prepare($SQL);
            } else if ($id == 'WHERE Categoria = ' . '"' . 'Trupper' . '"') {
                $query = $cx->prepare($SQL);
            } else if ($id == 'WHERE Categoria = ' . '"' . 'Pintura' . '"') {
                $query = $cx->prepare($SQL);
            } else if ($id == 'WHERE Categoria = ' . '"' . 'Maquinas' . '"') {
                $query = $cx->prepare($SQL);
            } else if ($id == null and $where == null) {
                $query = $cx->prepare($SQL);
            }
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($query->rowCount() > 0) {
                foreach ($resultado as $filas) {
                    $json[] = $filas;
                }
            } else {
                $json = null;
            }
            $cx = null;
            $this->conexion->desconectar();
            return $json;
        } catch (PDOException $err) {
            echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
            self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine());
        }

    }

    public function Insert($tabla, $columns, $values, $opcion = null)
    {
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            if ($tabla == 'empleados') {
                $SQL = 'INSERT INTO ' . $tabla . ' (' . $columns . ') ' . ' VALUES ' . ' (' . ':us, :n, :ap, :d, :ce, :t, :pss, :idp, :idas, :ides' . ');';
                $query = $cx->prepare($SQL);
                $query->bindParam(':us', $values['NombreUsuario'], PDO::PARAM_STR, 16);
                $query->bindParam(':n', $values['Nombres'], PDO::PARAM_STR, 30);
                $query->bindParam(':ap', $values['Apellidos'], PDO::PARAM_STR, 30);
                $query->bindParam(':d', $values['Direccion'], PDO::PARAM_STR, 50);
                $query->bindParam(':ce', $values['Correo'], PDO::PARAM_STR, 40);
                $query->bindParam(':t', $values['Telefono'], PDO::PARAM_STR, 16);
                $query->bindParam(':pss', $values['Contraseña'], PDO::PARAM_STR, 20);
                $query->bindParam(':idp', $values['Puesto'], PDO::PARAM_INT);
                $query->bindParam(':idas', $values['Asistencia'], PDO::PARAM_NULL);
                $query->bindParam(':ides', $values['Estatus'], PDO::PARAM_INT);
            } else if ($tabla == 'salarios') {
                $null = null;
                $SQL = 'INSERT INTO ' . $tabla . ' (' . $columns . ') ' . ' VALUES ' . ' (' . ':sal, :pres, :ho, :ht, :hnt, :ph, :d, :id' . ');';
                $query = $cx->prepare($SQL);
                $query->bindParam(':sal', $null, PDO::PARAM_NULL);
                $query->bindParam(':pres', $null, PDO::PARAM_NULL);
                $query->bindParam(':ho', $null, PDO::PARAM_NULL);
                $query->bindParam(':ht', $null, PDO::PARAM_NULL);
                $query->bindParam(':hnt', $null, PDO::PARAM_NULL);
                $query->bindParam(':ph', $null, PDO::PARAM_NULL);
                $query->bindParam(':d', $null, PDO::PARAM_NULL);
                $query->bindParam(':id', $values, PDO::PARAM_INT);
            } else if ($tabla == 'maderas') {
                $SQL = 'INSERT INTO ' . $tabla . ' (' . $columns . ') ' . ' VALUES ' . ' (' . ':codig, :nombremadera, :prec' . ');';
                $query = $cx->prepare($SQL);
                $query->bindParam(':codig', $values['Codigo'], PDO::PARAM_STR, 25);
                $query->bindParam(':nombremadera', $values['Madera'], PDO::PARAM_STR, 128);
                $query->bindParam(':prec', $values['Precio'], PDO::PARAM_STR);
            } else if ($tabla == 'materiales') {
                $SQL = 'INSERT INTO ' . $tabla . ' (' . $columns . ') ' . ' VALUES ' . ' (' . ':codig, :mat, :desc,  :st, :pre, :t, :idpr, :cate' . ');';
                $query = $cx->prepare($SQL);
                $null = null;
                $cero = 0;
                $query->bindParam(':codig', $values['Codigo'], PDO::PARAM_STR, 25);
                $query->bindParam(':mat', $values['Material'], PDO::PARAM_STR, 128);
                $query->bindParam(':desc', $null, PDO::PARAM_NULL);
                $query->bindParam(':st', $values['Stock'], PDO::PARAM_STR);
                $query->bindParam(':pre', $values['Precio'], PDO::PARAM_STR, 128);
                $query->bindParam(':t', $null, PDO::PARAM_NULL);
                $query->bindParam(':idpr', $null, PDO::PARAM_NULL);
                $query->bindParam(':cate', $values['Categoria'], PDO::PARAM_STR);
            } else if ($tabla == 'reportes') {
                if ($opcion == 'maderas') {
                    $null = null;
                    $SQL = 'INSERT INTO ' . $tabla . ' (' . $columns . ') ' . ' VALUES ' . ' (' . ':id_mad, :id_mat, :id_mueb, :id_emp, :fech, :hor, :acc, :cant, :stoc, :gasto' . ');';
                    $query = $cx->prepare($SQL);
                    $query->bindParam(':id_mad', $values['ID'], PDO::PARAM_INT);
                    $query->bindParam(':id_mat', $null, PDO::PARAM_NULL);
                    $query->bindParam(':id_mueb', $null, PDO::PARAM_NULL);
                    $query->bindParam(':id_emp', $values['ID_Empleado'], PDO::PARAM_INT);
                    $query->bindParam(':fech', $values['Fecha_Registro'], PDO::PARAM_STR);
                    $query->bindParam(':hor', $values['Hora_Registro'], PDO::PARAM_STR);
                    $query->bindParam(':hor', $values['Hora_Registro'], PDO::PARAM_STR);
                    $query->bindParam(':acc', $values['Accion'], PDO::PARAM_STR);
                    $query->bindParam(':cant', $values['Cantidad'], PDO::PARAM_INT);
                    $query->bindParam(':stoc', $values['Stock'], PDO::PARAM_INT);
                    $query->bindParam(':gasto', $values['Gasto_Entrada'], PDO::PARAM_STR);
                } else if ($opcion == 'materiales') {
                    $null = null;
                    $SQL = 'INSERT INTO ' . $tabla . ' (' . $columns . ') ' . ' VALUES ' . ' (' . ':id_mad, :id_mat, :id_mueb, :id_emp, :fech, :hor, :acc, :cant, :stoc, :gasto' . ');';
                    $query = $cx->prepare($SQL);
                    $query->bindParam(':id_mad', $null, PDO::PARAM_NULL);
                    $query->bindParam(':id_mat', $values['ID'], PDO::PARAM_INT);
                    $query->bindParam(':id_mueb', $null, PDO::PARAM_NULL);
                    $query->bindParam(':id_emp', $values['ID_Empleado'], PDO::PARAM_INT);
                    $query->bindParam(':fech', $values['Fecha_Registro'], PDO::PARAM_STR);
                    $query->bindParam(':hor', $values['Hora_Registro'], PDO::PARAM_STR);
                    $query->bindParam(':hor', $values['Hora_Registro'], PDO::PARAM_STR);
                    $query->bindParam(':acc', $values['Accion'], PDO::PARAM_STR);
                    $query->bindParam(':cant', $values['Cantidad'], PDO::PARAM_INT);
                    $query->bindParam(':stoc', $values['Stock'], PDO::PARAM_INT);
                    $query->bindParam(':gasto', $values['Gasto_Entrada'], PDO::PARAM_STR);

                }
            }
            $query->execute();
            $lastid = $cx->lastInsertId();
            $cx = null;
            $this->conexion->desconectar();
            return $lastid;
        } catch (PDOException $err) {
            echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
            self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
        }
    }

    public function Actualizar($tabla, $columns, $values, $opcion = null)
    {

        if ($tabla == 'empleados') {
            $SQL = 'UPDATE ' . $tabla . ' SET ' . $columns . ' WHERE ID_Empleado = :id;';
            try {
                $this->conexion = new Conexion();
                $cx = $this->conexion->conectar();
                $query = $cx->prepare($SQL);
                $query->bindParam(':id', $values['ID'], PDO::PARAM_INT);
                $query->bindParam(':us', $values['NombreUsuario'], PDO::PARAM_STR, 16);
                $query->bindParam(':nombres', $values['Nombres'], PDO::PARAM_STR, 30);
                $query->bindParam(':apellidos', $values['Apellidos'], PDO::PARAM_STR, 30);
                $query->bindParam(':direccion', $values['Direccion'], PDO::PARAM_STR, 50);
                $query->bindParam(':correo', $values['Correo'], PDO::PARAM_STR, 40);
                $query->bindParam(':tel', $values['Telefono'], PDO::PARAM_STR, 16);
                $query->bindParam(':pass', $values['Contraseña'], PDO::PARAM_STR, 20);
                $query->bindParam(':idpuesto', $values['Puesto'], PDO::PARAM_INT);
                $query->bindParam(':idprestamo', $values['Prestamo'], PDO::PARAM_NULL);
                $query->bindParam(':idasistencia', $values['Asistencia'], PDO::PARAM_NULL);
                $query->bindParam(':idestatus', $values['Estatus'], PDO::PARAM_INT);
                $query->execute();
                $cx = null;
                $this->conexion->desconectar();
            } catch (PDOException $err) {
                echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
                self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
            }
        }
        if ($tabla == 'maderas') {
            if ($opcion == null) {
                $SQL = 'UPDATE ' . $tabla . ' SET ' . $columns . ' WHERE ID_Madera = :id;';
                try {
                    $this->conexion = new Conexion();
                    $cx = $this->conexion->conectar();
                    $query = $cx->prepare($SQL);
                    $query->bindParam(':id', $values['ID'], PDO::PARAM_INT);
                    $query->bindParam(':cod', $values['Codigo'], PDO::PARAM_STR, 25);
                    $query->bindParam(':mad', $values['Madera'], PDO::PARAM_STR, 128);
                    $query->bindParam(':prec', $values['Precio'], PDO::PARAM_STR);
                    $query->execute();
                    $cx = null;
                    $this->conexion->desconectar();
                } catch (PDOException $err) {
                    echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
                    self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
                }
            } else if ($opcion == 'actualizar_entrada') {
                $SQL = 'UPDATE ' . $tabla . ' SET ' . $columns . ' WHERE ID_Madera = :id;';
                try {
                    $this->conexion = new Conexion();
                    $cx = $this->conexion->conectar();
                    $query = $cx->prepare($SQL);
                    $query->bindParam(':id', $values['ID'], PDO::PARAM_INT);
                    $query->bindParam(':st', $values['Stock'], PDO::PARAM_INT);
                    $query->execute();
                    $cx = null;
                    $this->conexion->desconectar();
                } catch (PDOException $err) {
                    echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
                    self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
                }
            } else if ($opcion == 'actualizar_salida') {
                $SQL = 'UPDATE ' . $tabla . ' SET ' . $columns . ' WHERE ID_Madera = :id;';
                try {
                    $this->conexion = new Conexion();
                    $cx = $this->conexion->conectar();
                    $query = $cx->prepare($SQL);
                    $query->bindParam(':id', $values['ID'], PDO::PARAM_INT);
                    $query->bindParam(':st', $values['Stock'], PDO::PARAM_INT);

                    $query->execute();
                    $cx = null;
                    $this->conexion->desconectar();
                } catch (PDOException $err) {
                    echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
                    self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
                }

            }
        }
        if ($tabla == 'materiales') {
            if ($opcion == null) {
                $SQL = 'UPDATE ' . $tabla . ' SET ' . $columns . ' WHERE ID_Material = :id;';
                try {
                    $this->conexion = new Conexion();
                    $cx = $this->conexion->conectar();
                    $query = $cx->prepare($SQL);
                    $query->bindParam(':id', $values['ID'], PDO::PARAM_INT);
                    $query->bindParam(':cod', $values['Codigo'], PDO::PARAM_STR, 25);
                    $query->bindParam(':mad', $values['Material'], PDO::PARAM_STR, 128);
                    $query->bindParam(':prec', $values['Precio'], PDO::PARAM_STR);
                    $query->bindParam(':cat', $values['Categoria'], PDO::PARAM_STR);
                    $query->execute();
                    $cx = null;
                    $this->conexion->desconectar();
                } catch (PDOException $err) {
                    echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
                    self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
                }
            } else if ($opcion == 'actualizar_entrada_material') {
                $SQL = 'UPDATE ' . $tabla . ' SET ' . $columns . ' WHERE ID_Material = :id;';
                try {
                    $this->conexion = new Conexion();
                    $cx = $this->conexion->conectar();
                    $query = $cx->prepare($SQL);
                    $query->bindParam(':id', $values['ID'], PDO::PARAM_INT);
                    $query->bindParam(':st', $values['Stock'], PDO::PARAM_INT);
                    $query->execute();
                    $cx = null;
                    $this->conexion->desconectar();
                } catch (PDOException $err) {
                    echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
                    self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
                }
            } else if ($opcion == 'actualizar_salida_material') {
                $SQL = 'UPDATE ' . $tabla . ' SET ' . $columns . ' WHERE ID_Material = :id;';
                try {
                    $this->conexion = new Conexion();
                    $cx = $this->conexion->conectar();
                    $query = $cx->prepare($SQL);
                    $query->bindParam(':id', $values['ID'], PDO::PARAM_INT);
                    $query->bindParam(':st', $values['Stock'], PDO::PARAM_INT);
                    $query->execute();
                    $cx = null;
                    $this->conexion->desconectar();
                } catch (PDOException $err) {
                    echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
                    self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
                }
            }


        }
    }

    public function Delete($tabla, $id)
    {
        if ($tabla == 'materiales') {
            $SQL = 'DELETE FROM ' . $tabla . ' WHERE ID_Material = :id';
            self::Eliminar_Reporte_Material('reportes', $id);
        }
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $query = $cx->prepare($SQL);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $cx = null;
            $this->conexion->desconectar();
        } catch (PDOException $err) {
            echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
            self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
        }
    }

    public function error_($codigo, $mensaje, $ubicacion, $linea)
    {
        date_default_timezone_set('America/El_Salvador');
        error_log("|Fecha: " . date('d/m/y') . " || Hora: " . date('H:i:s a') . " || Codigo: " . $codigo . " || Mensaje: " . $mensaje . " || Archivo: " . $ubicacion . " || Linea: " . $linea . "|\n", 3, dirname(__DIR__) . "\logs\\errores.log");
    }


}

?>