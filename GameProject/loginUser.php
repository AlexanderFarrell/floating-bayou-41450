<?php

require_once '_App/UserManager.php';
require_once '_App/User.php';

if (isset($_POST['username']) && isset( $_POST['password'])){
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $user = new User($username, $password);

    try {
        UserManager::Login($user);
        echo json_encode('success');

    } catch (Exception $exception) {
        echo json_encode($exception->getMessage());
    }
}
else {
    echo json_encode('Must fill in all fields');
}
