<?php 
require_once 'conexion.model.php';

class Usuarios {
    private $objetoConexion;

    public function __construct()
    {
        $this->objetoConexion = new Conexion();
    }


    public function create($nombre, $imagen){
        $consulta = "insert into usuarios (nombre, imagen) values ('$nombre', '$imagen');";
        return $this->objetoConexion->consultar($consulta);
    }

    public function read(){
        $consulta = "select * from usuarios";
        return $this->objetoConexion->consultar($consulta);
    }

    public function updateTodo($id, $nombre, $imagen){
        $consulta = "update usuarios set nombre = '$nombre', imagen = '$imagen' where id = $id;";
        return $this->objetoConexion->consultar($consulta);
    }

    public function update($id, $nombre){
        $consulta = "update usuarios set nombre = '$nombre' where id = $id;";
        return $this->objetoConexion->consultar($consulta);
    }

    public function updateIMG($id){
        $consulta = "update usuarios set imagen = '' where id = $id;";
        return $this->objetoConexion->consultar($consulta);
    }

    public function delete($id){
        $consulta = "delete from usuarios where id = '$id';";
        return $this->objetoConexion->consultar($consulta);
    }
}
?>