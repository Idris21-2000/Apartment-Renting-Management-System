<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant list</title>
    <link rel="stylesheet" href="../css/crud.css">
</head>

<body>
    <div class="upper-right-content">
        <a href="../Dashboard/admin.dash.php"><button>Dashboard</button></a>

    </div>
    <div class="edit">
        <?php

        try {
            require_once "../includes/dbh.inc.php";
            require_once "../includes/models/users_crud_model.inc.php";
            require_once "../includes/controllers/users_crud_contr.inc.php";

            $tenants = get_tenants($pdo);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            die();
        }
        ?>

        <table class="table">
            <caption>
                <h2>Registered Tenants</h2>
            </caption>

            <tr>
                <th>Id</th>
                <th>First-name</th>
                <th>Last name</th>
                <th>Username</th>
                <th>Apartment rented</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            <?php
            foreach ($tenants as $tenant) { ?>
                <tr>
                    <td><?php echo $tenant['id'] ?></td>
                    <td><?php echo $tenant['fname'] ?></td>
                    <td><?php echo $tenant['lname'] ?></td>
                    <td><?php echo $tenant['username'] ?></td>
                    <td><?php echo $tenant['address'] ?></td>
                    <td><input type="button" value="Edit" class="edit"></td>
                    <td>
                        <form action="../includes/user_delete.inc.php" method="POST" class="button-delete">
                            <input type="hidden" name="id" value="<?php echo $tenant['id']; ?>">
                            <button type="submit" name="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>


</body>

</html>