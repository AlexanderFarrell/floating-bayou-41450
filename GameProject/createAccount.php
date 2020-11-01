<?php

require_once '_App/UserManager.php';
require_once '_App/User.php';

if (isset($_POST['username']) && isset( $_POST['password'])){
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $user = new User($username, $password);

    if (strlen($password) < 8){
        echo json_encode("Please enter a password which is longer than 8 characters" . $password);

    }
    else{
        try {
            $result = UserManager::CreateAccount($user);
            if ($result == 'work'){
                echo json_encode('' . $user->name . ' ' . $user->password);
            } else {
                echo json_encode($result);
            }
        } catch (Exception $exception) {
            echo json_encode($exception->getMessage());
        }
    }
}
else {
    echo json_encode('Must fill in all fields');
}
