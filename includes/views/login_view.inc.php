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

function return_view()
{
    if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === "admin") {
        header('location:../Dashboard/admin.dash.php');
    } else if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === "tenant") {
        header('location:../Dashboard/tenant.dash.php');
    } else if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === "") {
        header('location:../escape_page.html');
    } else if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === "other") {
        header('location:../admin_to_be.html');
    } else if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === "landlord") {
        header('location:../Dashboard/landlord.dash.php');
    }
}

function user_view()
{
    if (isset($_SESSION['user_id'])) {
        echo '<h1>' . 'Welcome dear ' . $_SESSION['name'] . '</h1>';
    }
}
