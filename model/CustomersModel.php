<?php
include_once "../core/ModeloBasePDO.php";
class CustomersModel extends ModelBasePDO
{
    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    // Selecciona todos los datos de la tabla
    public function findAll()
    {
        $sql = "SELECT `client_id`, `name`, `lastname`, `email`, `birthday`, `address`, `city`, `phone`, `registrationdate` 
        FROM `customers`;";
        $param = array();
        return parent::gselect($sql, $param);
    }

    // Selecciona datos por client_id
    public function findId($p_id)
    {
        $sql = "SELECT `client_id`, `name`, `lastname`, `email`, `birthday`, `address`, `city`, `phone`, `registrationdate` 
        FROM `customers` 
        WHERE client_id = :p_id;  ";
        $param = array();
        array_push($param, [':p_id', $p_id, PDO::PARAM_INT]);
        return parent::gselect($sql, $param);
    }

    // Función para la paginación

    public function findpaginateall($p_search, $p_limit, $p_offset)
    {
        $sql = "SELECT `client_id`, `name`, `lastname`, `email`, `birthday`, `address`, `city`, `phone`, `registrationdate` 
        FROM `customers` 
        WHERE upper(concat(IFNULL(`client_id`,''),IFNULL(`name`,''),IFNULL(`lastname`,''),IFNULL(`email`,''),IFNULL(`birthday`,''),IFNULL(`address`,''),IFNULL(`city`,''),IFNULL(`phone`,''),IFNULL(`registrationdate`,''))) 
        like concat('%',upper(IFNULL(:p_search,'')),'%') 
        LIMIT :p_limit
        OFFSET :p_offset";
        $param = array();
        array_push($param, [':p_search', $p_search, PDO::PARAM_STR]);
        array_push($param, [':p_limit', $p_limit, PDO::PARAM_INT]);
        array_push($param, [':p_offset', $p_offset, PDO::PARAM_INT]);
        $var = parent::gselect($sql, $param);

        $sqlCount = "SELECT count(1)  as cant
        FROM `customers` 
        WHERE upper(concat(IFNULL(`client_id`,''),IFNULL(`name`,''),IFNULL(`lastname`,''),IFNULL(`email`,''),IFNULL(`birthday`,''),IFNULL(`address`,''),IFNULL(`city`,''),IFNULL(`phone`,''),IFNULL(`registrationdate`,''))) 
        like concat('%',upper(IFNULL(:p_search,'')),'%')";
        $param = array();
        array_push($param, [':p_search', $p_search, PDO::PARAM_STR]);
        $var1 = parent::gselect($sqlCount, $param);
        $var['LENGTH'] = $var1['DATA'][0]['cant'];
        return $var;
    }

    // Insertar datos dentro de la tabla
    public function insert($p_name, $p_lastname, $p_email, $p_birthday, $p_address, $p_city, $p_phone, $p_password, $p_registrationdate)
    {
        $sql = "INSERT INTO `customers`(`name`, `lastname`, `email`, `birthday`, `address`, `city`, `phone`, `password`, `registrationdate`) 
        VALUES (:p_name, :p_lastname, :p_email, :p_birthday, :p_address, :p_city, :p_phone, :p_password, now());";
        $param = array();
        array_push($param, [':p_name', $p_name, PDO::PARAM_STR]);
        array_push($param, [':p_lastname', $p_lastname, PDO::PARAM_STR]);
        array_push($param, [':p_email', $p_email, PDO::PARAM_STR]);
        array_push($param, [':p_birthday', $p_birthday, PDO::PARAM_STR]);
        array_push($param, [':p_address', $p_address, PDO::PARAM_STR]);
        array_push($param, [':p_city', $p_city, PDO::PARAM_STR]);
        array_push($param, [':p_phone', $p_phone, PDO::PARAM_STR]);
        array_push($param, [':p_password', $p_password, PDO::PARAM_STR]);
        return parent::ginsert($sql, $param);
    }

    // Actualizar los datos de la tabla
    public function update($p_id, $p_name, $p_lastname, $p_email, $p_birthday, $p_address, $p_city, $p_phone)
    {
        $sql = "UPDATE `customers` 
        SET `name`=:p_name, `lastname`=:p_lastname,`email`=:p_email,`birthday`=:p_birthday,`address`=:p_address,`city`=:p_city,`phone`=:p_phone 
        WHERE `client_id` = :p_id";
        $param = array();
        array_push($param, [':p_name', $p_name, PDO::PARAM_STR]);
        array_push($param, [':p_lastname', $p_lastname, PDO::PARAM_STR]);
        array_push($param, [':p_email', $p_email, PDO::PARAM_STR]);
        array_push($param, [':p_birthday', $p_birthday, PDO::PARAM_STR]);
        array_push($param, [':p_address', $p_address, PDO::PARAM_STR]);
        array_push($param, [':p_city', $p_city, PDO::PARAM_STR]);
        array_push($param, [':p_phone', $p_phone, PDO::PARAM_STR]);
        return parent::gupdate($sql, $param);
    }

    // Borrar un registro de la tabla
    public function delete($p_id)
    {
        $sql = "DELETE FROM `customers` 
        WHERE `client_id` = :p_id";
        $param = array();
        array_push($param, [':p_id', $p_id, PDO::PARAM_INT]);
        return parent::gdelete($sql, $param);
    }
}
