<?php

function getUser ($mysqlConnect, $id)
{
    $user = mysqli_query($mysqlConnect, "SELECT * FROM `users` WHERE `_id` = '$id'");

    if(mysqli_num_rows($user) > 0){
        $user = mysqli_fetch_assoc($user);
        echo json_encode($user);
    } else {
        $res = [
            "status" => false,
            "message" => "Not faund"
        ];

        http_response_code(404);
        echo json_encode($res);
    }
}