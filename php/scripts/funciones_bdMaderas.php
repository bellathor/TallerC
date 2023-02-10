<?php
require(dirname(__DIR__) . '/config/conexion.php');
require_once(dirname(__DIR__) . '/scripts/funciones_extras.php');


class Bd_Madera
{
    private $conexion;
    function __construct()
    {

    }

    function consulta_maderas()
    {
        $this->conexion = new Conexion();
        try {
            $cx = $this->conexion->conectar();
            $sql = 'SELECT * FROM maderas';
            $query = $cx->prepare($sql);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($query->rowCount() > 0) {
                foreach ($res as $filas) {
                    $json[] = [
                        'IDMadera' => $filas['ID_Madera'],
                        'Codigo' => $filas['Codigo'],
                        'Madera' => $filas['Nombre_Madera'],
                        'Entrada' => $filas['Entrada'],
                        'Salida' => $filas['Salida'],
                        'Stock' => $filas['Stock'],
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

    function consulta_madera($id)
    {
        $this->conexion = new Conexion();
        try {
            $cx = $this->conexion->conectar();
            $sql = 'SELECT * FROM maderas WHERE ID_Madera = :idmadera';
            $query = $cx->prepare($sql);
            $query->bindParam(':idmadera', $id, PDO::PARAM_INT);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($query->rowCount() > 0) {
                foreach ($res as $filas) {
                    $json[] = [
                        'IDMadera' => $filas['ID_Madera'],
                        'Codigo' => $filas['Codigo'],
                        'Madera' => $filas['Nombre_Madera'],
                        'Entrada' => $filas['Entrada'],
                        'Salida' => $filas['Salida'],
                        'Stock' => $filas['Stock'],
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

    function insert_madera($codigo, $nombremadera, $entrada, $salida, $stock, $idproveedor)
    {
        $this->conexion = new Conexion();
        try {
            $cx = $this->conexion->conectar();
            $SQL = 'INSERT INTO maderas (Codigo, Nombre_Madera, Entrada, Salida, Stock, ID_Proveedor) values (:cod, :mad, 0, 0, :sto, null)';
            $query = $cx->prepare($SQL);
            $query->bindParam(':cod', $codigo, PDO::PARAM_STR);
            $query->bindParam(':mad', $nombremadera, PDO::PARAM_STR);
            $query->bindParam(':sto', $stock, PDO::PARAM_INT);
            $query->execute();
            $cx = $this->conexion->desconectar();
        } catch (PDOException $ex) {
            print("¡Ocurrió un error Mysql.!");
            error_($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine());
        }

    }

    function actualizar_madera($id, $codigo, $nombremadera, $entrada, $salida, $stock, $idproveedor)
    {
        // echo $id;
        $this->conexion = new Conexion();
        try {
            $cx = $this->conexion->conectar();
            $sql = 'UPDATE maderas SET Codigo = :cod, Nombre_Madera = :madera, Entrada = :ent, Salida = :salid, Stock = :sto, ID_Proveedor = null WHERE ID_Madera = :idmadera';
            $query = $cx->prepare($sql);
            $query->bindParam(':idmadera', $id, PDO::PARAM_INT);
            $query->bindParam(':cod', $codigo, PDO::PARAM_STR);
            $query->bindParam(':madera', $nombremadera, PDO::PARAM_STR);
            $query->bindParam(':ent', $entrada, PDO::PARAM_INT);
            $query->bindParam(':salid', $salida, PDO::PARAM_INT);
            $query->bindParam(':sto', $stock, PDO::PARAM_INT);
            $query->execute();
            $cx = $this->conexion->desconectar();
        } catch (PDOException $ex) {
            print('¡Ocurrió un error.!');
            error_($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine());
        }

    }

    function eliminar_madera($id)
    {
        echo $id;
        $this->conexion = new Conexion();
        try {
            $cx = $this->conexion->conectar();
            $SQL = 'DELETE FROM maderas WHERE ID_Madera = :idmadera';
            $query = $cx->prepare($SQL);
            $query->bindParam(':idmadera', $id, PDO::PARAM_INT);
            $query->execute();
            $cx = $this->conexion->desconectar();
        } catch (PDOException $ex) {
            print("¡Ocurrió un error Mysql.!");
            error_($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine());
        }
    }

}



?>