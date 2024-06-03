<?php

declare(strict_types=1);

function display_errors()
{
    if (isset($_SESSION["landlords_reg_errors"])) {
        $errors = $_SESSION["landlords_reg_errors"];

        foreach ($errors as $error) {
            echo '<p class="error_message">' . $error . '</p>';
        }

        unset($_SESSION["landlords_reg_errors"]);
    } else if (isset($_GET['register']) && ($_GET['register']) === 'success') {
        echo "<br/>";
        echo '<p class="success_message">Registered successfully!</p>';
        echo "<br/>";
    }
}
