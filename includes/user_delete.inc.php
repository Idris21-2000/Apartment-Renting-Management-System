<?php

require_once "dbh.inc.php";
require_once "models/users_crud_model.inc.php";

if (isset($_POST['id'])) {

    $user_id = $_POST['id'];
    delete_users($pdo, $user_id);
    header('location:../Forms/users_crud.php?userdeleted');
} else {
    echo "Nothing here!!";
    die();
}
