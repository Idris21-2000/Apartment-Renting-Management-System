<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = $_POST['comment_section'];

    require_once "config_session.inc.php";
    require_once "dbh.inc.php";
    require_once "models/reg_model.inc.php";
    require_once "models/message_model.inc.php";
    require_once "controllers/message_contr.inc.php";


    send_message($pdo, $comment, $_SESSION['username'], $_SESSION['user_type']);
    $results = get_messages($pdo, $_SESSION['username']);
    header('location:../forms/message.php?send=success');
    die();
} else {
    header('location:../forms/message.php');
    die();
}
