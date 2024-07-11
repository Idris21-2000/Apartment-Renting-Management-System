<?php

function already_rented(object $pdo, string $user_id)
{
    if (!empty(get_lease_details($pdo, $user_id))) {
        header('location:../Dashboard/apartmentDetails.php?id=' . $_GET['id'] . '?status=error');
        echo "You are already rented an apartment";
        die();
    }
}
