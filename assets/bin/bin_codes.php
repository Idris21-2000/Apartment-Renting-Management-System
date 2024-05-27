<?php
function reg_data()
{

    if (isset($_SESSION['registration_data']['firstname'])) {
        echo '<input type="text" name="fname" placeholder="First name" value="
        ' . $_SESSION['registration_data']['firstname'] . '">';
    } else {
        echo '<input type="text" name="fname" placeholder="First name">';
    }
    echo '  ';

    if (isset($_SESSION['registration_data']['lastname'])) {
        echo '<input type="text" name="lname" placeholder="Last name"
        value="
        ' . $_SESSION['registration_data']['lastname'] . '">';
    } else {
        echo '<input type="text" name="lname" placeholder="Last name">';
    }
    echo '<br>';
    echo '<br>';

    if (isset($_SESSION['registration_data']['username']) && !isset($_SESSION['registration_errors']['username_taken'])) {
        echo '<input type="text" name="username" placeholder="User-name"
        value="' . $_SESSION['registration_data']['username'] . '">';
    } else {
        echo '<input type="text" name="username" placeholder="User-name">';
    }
    echo '  ';

    if (isset($_SESSION['registration_data']['email']) && !isset($_SESSION['registration_errors']['invalid_email'])) {
        echo '<input type="email" name="email" placeholder="E-mail"
        value="' . $_SESSION['registration_data']['email'] . '">';
    } else {
        echo '<input type="email" name="email" placeholder="E-mail">';
    }
    echo '<br>';
    echo '<br>';

    echo '<input type="password" name="pwd" placeholder="Password">';
    echo ' ';
    echo '<input type="password" name="conf_pwd" placeholder="Confirm password">';

    echo '<br>';
    echo '<br>';

    if (isset($_SESSION['registration_data']['phone'])) {
        echo '<input type="tel" name="phone" placeholder="Phone number" value="
        ' . $_SESSION['registration_data']['phone'] . '">';
    } else {
        echo '<input type="tel" name="phone" placeholder="Phone number">';
    }
    echo '  ';
    if (isset($_SESSION['registration_data']['address'])) {
        echo '<input type="address" name="address" placeholder="Physical address" value="
        ' . $_SESSION['registration_data']['address'] . '">';
    } else {
        echo '<input type="address" name="address" placeholder="Physical address">';
    }
}
