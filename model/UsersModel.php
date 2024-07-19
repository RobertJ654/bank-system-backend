<?php
// Modelo para operaciones CRUD en la tabla 'usuarios'.
include_once "../core/ModelBasePDO.php";

class UsersModel extends ModelBasePDO
{
    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    // Retorna todos los registros de la tabla usuarios.
    public function findall()
    {
        $sql = "SELECT correo_electronico, nombre, contrasena FROM users;";
        $param = array();
        return parent::gselect($sql, $param);
    }

    // Busca un registro en la tabla usuarios por correo electrónico.
    public function findid($p_correo_electronico)
    {
        $sql = "SELECT correo_electronico, nombre, contrasena FROM users
                WHERE correo_electronico = :p_correo_electronico;";
        $param = array();
        array_push($param, [':p_correo_electronico', $p_correo_electronico, PDO::PARAM_STR]);
        return parent::gselect($sql, $param);
    }

    // Verifica el inicio de sesión utilizando correo electrónico y contraseña.
    public function verificarlogin($p_correo_electronico, $p_contrasena)
    {
        $sql = "SELECT correo_electronico, nombre
                FROM users
                WHERE correo_electronico = :p_correo_electronico AND 
                      contrasena = :p_contrasena";
        $param = array();
        array_push($param, [':p_correo_electronico', $p_correo_electronico, PDO::PARAM_STR]);
        array_push($param, [':p_contrasena', $p_contrasena, PDO::PARAM_STR]);
        return parent::gselect($sql, $param);
    }

    // Registra un nuevo usuario en la tabla usuarios.
    public function register($p_correo_electronico, $p_nombre, $p_contrasena)
    {
        $sql = "INSERT INTO users (correo_electronico, nombre, contrasena) 
                VALUES (:p_correo_electronico, :p_nombre, :p_contrasena);";
        $param = array();
        array_push($param, [':p_correo_electronico', $p_correo_electronico, PDO::PARAM_STR]);
        array_push($param, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($param, [':p_contrasena', $p_contrasena, PDO::PARAM_STR]);

        return parent::ginsert($sql, $param);
    }

    // Actualiza los datos de un usuario en la tabla usuarios.
    public function update($p_correo_electronico, $p_nombre, $p_contrasena)
    {
        $sql = "UPDATE users SET 
                nombre = :p_nombre, 
                contrasena = :p_contrasena        
                WHERE correo_electronico = :p_correo_electronico";
        $param = array();
        array_push($param, [':p_correo_electronico', $p_correo_electronico, PDO::PARAM_STR]);
        array_push($param, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($param, [':p_contrasena', $p_contrasena, PDO::PARAM_STR]);
        return parent::gupdate($sql, $param);
    }

    // Elimina un usuario de la tabla usuarios por su correo electrónico.
    public function delete($p_correo_electronico)
    {
        $sql = "DELETE FROM users WHERE correo_electronico = :p_correo_electronico";
        $param = array();
        array_push($param, [':p_correo_electronico', $p_correo_electronico, PDO::PARAM_STR]);
        return parent::gdelete($sql, $param);
    }
}
?>
