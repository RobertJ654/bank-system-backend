<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");


session_start();

// Hacemos las importaciones
require_once($_SERVER['DOCUMENT_ROOT'] . "/bank/config/global.php");
require_once(ROOT_DIR . "/model/CustomersModel.php");

// Capturamos el método
$method = $_SERVER['REQUEST_METHOD'];
$input  = json_decode(file_get_contents('php://input'), true);
try {
    $Path_Info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');
    $request = explode('/', trim($Path_Info, '/'));
} catch (Exception $e) {
    echo $e->getMessage();
}

// Hacemos el filtrado segúen el método obtenido
switch ($method) {
    case 'GET':
        $p_ope = !empty($input['ope']) ? $input['ope'] : $_GET['ope'];
        if (!empty($p_ope)) {
            if ($p_ope == 'filterall') {
                filterAll($input);
            } else if ($p_ope == 'filterId') {
                filterId($input);
            } else if ($p_ope == 'filterSearch') {
                filterPaginateAll($input);
            }
        }
        break;
    case 'POST':
        insert($input);
        break;
    case 'PUT':
        update($input);
        break;
    case 'DELETE':
        delete($input);
        break;
    default:
        echo 'NO SOPORTADO';
        break;
}

// Función para devolver todos los datos de la tabla customers
function filterAll($input)
{
    $objIns = new CustomersModel();
    $var = $objIns->findall();
    echo json_encode($var);
}

// Función para filtrar los datos de la tabla según el id
function filterId($input)
{
    $p_id = !empty($input['id']) ? $input['id'] : $_GET['id'];
    $objIns = new CustomersModel();
    $var = $objIns->findid($p_id);
    echo json_encode($var);
}

// Función para la paginación de los registros de la tabla
function filterPaginateAll($input)
{
    $page = !empty($input['page']) ? $input['page'] : $_GET['page'];
    $filter = !empty($input['filter']) ? $input['filter'] : $_GET['filter'];
    $nro_record_page = 10;
    $p_limit = 10;
    $p_offset = 0;
    $p_offset = abs(($page - 1) * $nro_record_page);
    $objIns = new CustomersModel();
    $var = $objIns->findpaginateall($filter, $p_limit, $p_offset);
    echo json_encode($var);
}

// Función para agregar un nuevo registro a la tabla customers
function insert($input){
    $p_name = !empty($input['name']) ? $input['name'] : $_POST['name'];
    $p_lastname = !empty($input['lastname']) ? $input['lastname'] : $_POST['lastname'];
    $p_email = !empty($input['email']) ? $input['email'] : $_POST['email'];
    $p_birthday = !empty($input['birthday']) ? $input['birthday'] : $_POST['birthday'];
    $p_address = !empty($input['address']) ? $input['address'] : $_POST['address'];
    $p_city = !empty($input['city']) ? $input['city'] : $_POST['city'];
    $p_phone = !empty($input['phone']) ? $input['phone'] : $_POST['phone'];
    $objIns = new CustomersModel();
    $var = $objIns->insert($p_name, $p_lastname, $p_email, $p_birthday, $p_address, $p_city, $p_phone);
    echo json_encode($var);
}

// Función para actualizar un registro de la tabla customers según el id
function update($input){
    $p_id = !empty($input['id']) ? $input['id'] : $_POST['id'];
    $p_name = !empty($input['name']) ? $input['name'] : $_POST['name'];
    $p_lastname = !empty($input['lastname']) ? $input['lastname'] : $_POST['lastname'];
    $p_email = !empty($input['email']) ? $input['email'] : $_POST['email'];
    $p_address = !empty($input['address']) ? $input['address'] : $_POST['address'];
    $p_city = !empty($input['city']) ? $input['city'] : $_POST['city'];
    $p_phone = !empty($input['phone']) ? $input['phone'] : $_POST['phone'];
    $objIns = new CustomersModel();
    $var = $objIns->update($p_id, $p_name, $p_lastname, $p_email, $p_address, $p_city, $p_phone);
    echo json_encode($var);
}


// Función para borrar un registro de la tabla customers por id
function delete($input){
    $p_id = !empty($input['id']) ? $input['id'] : $_POST['id'];
    $objIns = new CustomersModel();
    $var = $objIns->delete($p_id);
    echo json_encode($var);
}

?>