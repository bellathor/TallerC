<?php
class Conexion{
    private $rutabd = "mysql:host=localhost;dbname=u483380267__bdc";
    private $usuario = "u483380267_jito";// nombre del usuario base de datos
    private $password = "g?EwJMzQ165";// contraseña de la base de datos
    private $conx; // variable para guardar la conexion

    public function __construct(){

    }

    public function conectar(){
        try{
            $this->conx = new PDO($this->rutabd, $this->usuario, $this->password);
            return $this->conx;
        }
        catch(PDOException $e){
             print "<script>alert('Ocurrió un error.!')</script>¡Error!: encontrado" . "<br/>";
            //error_($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    public function desconectar(){
        $this->conx = null;
    }
}
?>