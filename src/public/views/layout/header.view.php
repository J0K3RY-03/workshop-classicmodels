<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="/"><strong>Classic Models</strong></a></li>
        </ul>
        <ul>
            <?php if (!empty($_SESSION['user']['username'])) {
                echo '<li>'. 'Bonjour ' . $_SESSION['user']['username'] . '</li>';
                echo '<li>'. 'Logout' . '</li>';
            } else {
               echo '<li><a href="/register.php">' . 'Register' . '</a></li>';
               echo '<li><a href="/login.php">' . 'Login' . '</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>
<main>
