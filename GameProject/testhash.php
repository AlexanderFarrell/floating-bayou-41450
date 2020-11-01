<?php


$pass = "test678";

$hash = password_hash($pass, PASSWORD_BCRYPT);  //password_hash() function hash given password

$matchpass = "test678";

$match = password_verify($matchpass, $hash); // password_verify() function hash given boolean value if password can match so it return 1 otherwise 0

if ($match == true) {
    echo "Password can match successfully......";
} else {
    echo "Password cannot match please try again.";
}

