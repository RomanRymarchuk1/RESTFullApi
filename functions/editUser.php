<?php

function editUser($mysqlConnect, $id, $data){
    $name = $data['name'];
    $password = md5($data['password']);
    $email = $data['email'];

    mysqli_query($mysqlConnect, "UPDATE `users` SET `name` = '$name', `password` = '$password', `email` = '$email' WHERE `users`.`_id` = '$id'");

    $result = [
        "status" => true,
        "message" => "User (id: ". $id. ") is updated"
    ];

    echo json_encode($result);
}