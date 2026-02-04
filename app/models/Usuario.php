<?php
require_once __DIR__ . '/../config/database.php';

class Usuario
{
    private $conn;
    private $table_name = "usuario";

    public $id;
    public $nombre;
    public $apellido;
    public $correo;
    public $contrasena;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Función registrar()
    public function registrar()
    {
        $query = "INSERT INTO `usuario` (`nombre`, `apellido`, `correo`, `contrasena`)  
              VALUES (:nombre, :apellido, :correo, :contrasena)";

        $stmt = $this->conn->prepare($query);

        
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido = htmlspecialchars(strip_tags($this->apellido));
        $this->correo = htmlspecialchars(strip_tags($this->correo));
        $this->contrasena = htmlspecialchars(strip_tags($this->contrasena)); // Limpiar contraseña

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":correo", $this->correo);

        $stmt->bindParam(":contrasena", $this->contrasena);

        return $stmt->execute();
    }


    // Verificar login
    public function login()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE correo = :correo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorCorreo()
    {
        $sql = "SELECT * FROM usuario WHERE correo = :correo";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar datos del usuario
    public function actualizar()
    {
        $query = "UPDATE " . $this->table_name . " 
              SET nombre = :nombre, apellido = :apellido 
              WHERE correo = :correo";

        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido = htmlspecialchars(strip_tags($this->apellido));
        $this->correo = htmlspecialchars(strip_tags($this->correo));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":correo", $this->correo);

        return $stmt->execute();
    }

    public function eliminar()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE correo = :correo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":correo", $this->correo);
        return $stmt->execute();
    }

    public function existeCorreo()
    {
        $query = "SELECT id FROM " . $this->table_name . " WHERE correo = :correo LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
