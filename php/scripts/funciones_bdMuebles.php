<?php
require(dirname(__DIR__) . '/config/conexion.php');
require_once(dirname(__DIR__) . '/scripts/funciones_extras.php');


class Bd_Muebles
{
    private $conexion;
    function __construct()
    {

    }

    function consulta_muebles()
    {
        $this->conexion = new Conexion();
        try {
            $cx = $this->conexion->conectar();
            $sql = 'SELECT * FROM muebles';
            $query = $cx->prepare($sql);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($query->rowCount() > 0) {
                foreach ($res as $filas) {
                    $json[] = [
                        'ID' => $filas['ID_Mueble'],
                        'Codigo' => $filas['Codigo'],
                        'Mueble' => $filas['Nombre'],
                        'Img' => $filas['Imagen_Mueble'],
                        'Descripcion' => $filas['Descripcion'],
                        'Alto' => $filas['Alto'],
                        'Ancho' => $filas['Ancho'],
                        'Largo' => $filas['Largo'],
                        'IDProveedor' => $filas['ID_Proveedor']
                    ];
                }
                return $json;
            }
        } catch (PDOException $ex) {
            print("¡Ocurrió un error Mysql.!");
            error_($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine());
        }
        $cx = $this->conexion->desconectar();
    }

    function consulta_mueble($id)
    {
        $this->conexion = new Conexion();
        try {
            $cx = $this->conexion->conectar();
            $sql = 'SELECT * FROM muebles WHERE ID_Mueble = :idmueble';
            $query = $cx->prepare($sql);
            $query->bindParam(':idmueble', $id, PDO::PARAM_INT);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($query->rowCount() > 0) {
                foreach ($res as $filas) {
                    $json[] = [
                        'ID' => $filas['ID_Mueble'],
                        'Codigo' => $filas['Codigo'],
                        'Mueble' => $filas['Nombre'],
                        'Img' => $filas['Imagen_Mueble'],
                        'Descripcion' => $filas['Descripcion'],
                        'Alto' => $filas['Alto'],
                        'Ancho' => $filas['Ancho'],
                        'Largo' => $filas['Largo'],
                        'IDProveedor' => $filas['ID_Proveedor']
                    ];
                }
                return $json;
            }
        } catch (PDOException $ex) {
            print("¡Ocurrió un error Mysql.!");
            error_($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine());
        }
        $cx = $this->conexion->desconectar();
    }

    function insert_mueble($codigo, $nombre, $img, $descrip, $alto, $ancho, $largo, $e, $sa, $s, $p, $em)
    {
        $this->conexion = new Conexion();
        try {
            $cx = $this->conexion->conectar();
            $SQL = 'INSERT INTO muebles (Codigo, Nombre, Imagen_Mueble, Descripcion, Alto, Ancho, Largo, Entrada, Salida, Stock, ID_Proveedor, ID_Empleado) values (:cod, :nombre, :descr, :img, :al, :an, :la, null, null, null ,null, null)';
            $query = $cx->prepare($SQL);
            $query->bindParam(':cod', $codigo, PDO::PARAM_STR);
            $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $query->bindParam(':descr', $$descrip, PDO::PARAM_STR);
            $query->bindParam(':img', $img, PDO::PARAM_STR);
            $query->bindParam(':al', $alto, PDO::PARAM_INT);
            $query->bindParam(':an', $ancho, PDO::PARAM_INT);
            $query->bindParam(':la', $largo, PDO::PARAM_INT);

            $query->execute();
            $cx = $this->conexion->desconectar();
        } catch (PDOException $ex) {
            print("¡Ocurrió un error Mysql.!");
            error_($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine());
        }

    }

    function actualizar_mueble($id, $codigo, $nombre, $descrip, $img, $alto, $ancho, $largo, $e, $sa, $s, $p, $em)
    {
        // echo $id;
        $this->conexion = new Conexion();
        try {
            $cx = $this->conexion->conectar();
            $sql = 'UPDATE muebles SET Codigo = :cod, Nombre = :nomb, Imagen_Mueble = :img, Descripcion = :descrip, Alto = :al, Ancho = :an, Largo = :la, Entrada = null, Salida = null, Stock = null, ID_Proveedor = null, ID_Empleado = null WHERE ID_Mueble = :idmueble';
            $query = $cx->prepare($sql);
            $query->bindParam(':idmueble', $id, PDO::PARAM_INT);
            $query->bindParam(':cod', $codigo, PDO::PARAM_STR);
            $query->bindParam(':nomb', $nombre, PDO::PARAM_STR);
            $query->bindParam(':descrip', $descrip, PDO::PARAM_STR);
            $query->bindParam(':img', $img, PDO::PARAM_LOB);
            $query->bindParam(':al', $alto, PDO::PARAM_INT);
            $query->bindParam(':an', $ancho, PDO::PARAM_INT);
            $query->bindParam(':la', $largo, PDO::PARAM_INT);
            $query->execute();
            $cx = $this->conexion->desconectar();
        } catch (PDOException $ex) {
            print("¡Ocurrió un error Mysql.!");
            error_($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine());
        }

    }

    function eliminar_mueble($id)
    {
        $this->conexion = new Conexion();
        try {
            $cx = $this->conexion->conectar();
            $SQL = 'DELETE FROM muebles WHERE ID_Mueble = :idmueble';
            $query = $cx->prepare($SQL);
            $query->bindParam(':idmueble', $id, PDO::PARAM_INT);
            $query->execute();
            $cx = $this->conexion->desconectar();
        } catch (PDOException $ex) {
            print("¡Ocurrió un error Mysql.!");
            error_($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine());
        }
    }

}



?>