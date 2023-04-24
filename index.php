<?php
header('Content-Type: application/json');

require ('./mySqlConnect.php');
require ('./functions/getUsers.php');
require ('./functions/getUser.php');
require ('./functions/addUser.php');
require ('./functions/deleteUser.php');
require ('./functions/editUser.php');

$q = $_GET['q'];
$params = explode('/', $q);

$method = $_SERVER['REQUEST_METHOD'];

$type = $params[0];
$id = $params[1];

    switch ($method) {
        case 'GET':
            if($type === 'users') {
                if(isset($id)){
                    getUser($mysqlConnect, $id);
                } else {
                    getUsers($mysqlConnect);
                }
            }
        
        break;
        
        case 'POST':
            if($type === 'users') 
                addUser($mysqlConnect, $_POST);
        break;
    
        case 'DELETE':
            if($type === 'users') {
                if(isset($id))
                    deleteUser($mysqlConnect, $id);
            }
        break;
    
        case 'PATCH':
            if($type === 'users') {
                if(isset($id)){
                    $data = file_get_contents('php://input');
                    $data = json_decode($data, true);
                    editUser($mysqlConnect, $id, $data);
                }
            }
        break;
    }





