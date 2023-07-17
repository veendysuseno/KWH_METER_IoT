<?php

$password = $_POST['password']
$options = [
    'cost' => 10,
];
echo password_hash($password, PASSWORD_DEFAULT, $options);