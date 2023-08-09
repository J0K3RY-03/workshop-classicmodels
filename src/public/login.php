<?php

session_start();

print_r($_POST);
if (empty($_POST)) {
    include 'public/views/layout/header.view.php';
    include 'public/views/login.view.php';
    include 'public/views/layout/footer.view.php';
    echo 'lol';
}else {
    try {

        require_once 'public/db/connection.php';

        $username = htmlspecialchars($_POST['username']);
        $password = filter_input($_POST['password'], FILTER_SANITIZE_NUMBER_INT);

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);

            $stmt->execute();
            echo 'ça fonctionne';
        } else {
            echo 'ça va pas';
        }
        include 'public/views/layout/header.view.php';
        include 'public/views/login.view.php';
        include 'public/views/layout/footer.view.php';
    } catch (Exception $e){
        print_r($e->getMessage());
    }
}