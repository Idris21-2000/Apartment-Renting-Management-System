<?php

declare(strict_types=1);

function display_errors()
{
    if (isset($_SESSION["login_errors"])) {
        $errors = $_SESSION["login_errors"];

        echo "<br/>";

        foreach ($errors as $error) {
            echo '<p class="error_message">' . $error . '</p>';
        }

        unset($_SESSION["login_errors"]);
    } elseif (isset($_GET['login']) && $_GET['login'] === "success") {
        echo '<br>';
        echo '<p class="success_message">Login Successfully!</p>';
    }
}

function user_view()
{
    if (!isset($_SESSION['user_id'])) {
        echo "<br>";
        echo '<h1>' . 'Welcome dear ' . $_SESSION['name'] . '</h1>';
    } else {
        header('Location:../Authentication/Login.php');
        echo '<h1>You are not logged in</h1>';
    }
}
