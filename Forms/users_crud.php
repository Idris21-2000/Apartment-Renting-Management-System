<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Project</title>
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

            $results = get_users($pdo);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            die();
        }
        ?>

        <table class="table">
            <caption>
                <h2>All Registered Users</h2>
            </caption>

            <tr>
                <th>Id</th>
                <th>First-name</th>
                <th>Last name</th>
                <th>Username</th>
                <th>Type/role</th>
                <th>Apartment in/own</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            <?php
            foreach ($results as $result) { ?>
                <tr>
                    <td><?php echo $result['id'] ?></td>
                    <td><?php echo $result['fname'] ?></td>
                    <td><?php echo $result['lname'] ?></td>
                    <td><?php echo $result['username'] ?></td>
                    <td><?php echo $result['user_type'] ?></td>
                    <td><?php echo $result['address'] ?></td>
                    <td><input type="button" value="Edit"></td>
                    <td><input type="button" value="Delete"></td>
                </tr>
            <?php } ?>
        </table>
    </div>


</body>

</html>