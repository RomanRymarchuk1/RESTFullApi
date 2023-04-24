<?php

function addUser ($mysqlConnect, $data){
    $name = $data['name'];
    $password = $data['password'];
    $email = $data['email'];

    mysqli_query($mysqlConnect, "INSERT INTO `users` (`_id`, `name`, `password`, `email`) VALUES (NULL, '$name', MD5('$password'), '$email');");

    $result = [
        "status" => true,
        "message" => "User (id: ". mysqli_insert_id($mysqlConnect). ") is added"
    ];

    http_response_code(201);

    echo json_encode($result);
}