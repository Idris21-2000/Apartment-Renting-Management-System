<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Requests</title>
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

            $requests = get_landlord_request($pdo);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            die();
        }
        ?>

        <table class="table">
            <caption>
                <h2>Landlords Rental Publish Requests</h2>
            </caption>

            <tr>
                <th>Id</th>
                <th>First-name</th>
                <th>Last name</th>
                <th>Username</th>
                <th>Apartment owns</th>
                <th>Accept</th>
                <th>Delete</th>
            </tr>
            <?php
            foreach ($requests as $request) { ?>
                <tr>
                    <td><?php echo $request['id'] ?></td>
                    <td><?php echo $request['fname'] ?></td>
                    <td><?php echo $request['lname'] ?></td>
                    <td><?php echo $request['username'] ?></td>
                    <td><?php echo $request['address'] ?></td>
                    <td><input type="button" value="Accept"></td>
                    <td><input type="button" value="Delete"></td>
                </tr>
            <?php } ?>
        </table>
    </div>


</body>

</html>