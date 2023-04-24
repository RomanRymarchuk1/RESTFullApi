<?php

function deleteUser($mysqlConnect, $id){
    mysqli_query($mysqlConnect, "DELETE FROM users WHERE `users`.`_id` = $id");

    $result = [
        "status" => true,
        "message" => "User (id: ". $id. ") is deleted"
    ];

    echo json_encode($result);
}