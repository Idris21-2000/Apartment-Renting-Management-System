<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = $_POST['comment_section'];

    require_once "dbh.inc.php";
    require_once "models/reg_model.inc.php";
    require_once "models/message_model.inc.php";
    require_once "controllers/message_contr.inc.php";

    require_once "config_session.inc.php";

    send_message($pdo, $comment, $_SESSION['username']);
    $messages = get_messages($pdo, $_SESSION['username']);

    echo "sent succesfully!";
    die();
} else {
    header('location:../forms/message.php');
    die();
}
