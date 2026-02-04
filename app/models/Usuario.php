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

    // Registrar usuario
    public function registrar()
    {
        // Usamos ` para nombres de tablas y columnas. Esto evita errores de nombres.
        $query = "INSERT INTO `usuario` (`nombre`, `apellido`, `correo`, `contrasena`) 
              VALUES (:nombre, :apellido, :correo, :contrasena)";

        $stmt = $this->conn->prepare($query);

        // Limpiamos los datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido = htmlspecialchars(strip_tags($this->apellido));
        $this->correo = htmlspecialchars(strip_tags($this->correo));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":correo", $this->correo);

        // Encriptamos
        $hash = password_hash($this->contrasena, PASSWORD_DEFAULT);
        $stmt->bindParam(":contrasena", $hash);

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
}
