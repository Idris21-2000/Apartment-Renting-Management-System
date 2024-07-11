<?php

require_once "dbh.inc.php";
require_once "models/users_crud_model.inc.php";

if (isset($_POST['id'])) {

    $user_id = $_POST['id'];
    change_admin($pdo, $user_id);
    header('location:../Forms/admin_permission.php?newadmin=added');
} else {
    echo "Nothing here!!";
    die();
}
