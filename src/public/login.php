<?php

session_start();

if (empty($_POST)) {
    include 'public/views/layout/header.view.php';
    include 'public/views/login.view.php';
    include 'public/views/layout/footer.view.php';
}else {
    try {

        require_once 'public/db/connection.php';

        $username = htmlspecialchars($_POST['username']);

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);

            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            print_r($user);
            print_r($_POST);

            if ($user && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user']['username'] = $user['username'];
                header('location: index.php');
                exit;
            } else {
                echo "Login invalide";
            }
        } else {
            echo 'remplir tous les champs';
        }
    } catch (Exception $e){
        print_r($e->getMessage());
    }
}