<?php
function getUsers ($mysqlConnect) 
{
    $users = mysqli_query($mysqlConnect, "SELECT * FROM `users`");
    $usersList = [];
    while ($user = mysqli_fetch_assoc($users)) 
    {
        $usersList[] = $user; 
    }
    echo json_encode($usersList);
}