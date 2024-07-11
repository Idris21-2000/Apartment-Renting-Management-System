</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All apartments</title>
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
            require_once "../includes/models/apartment_crud_model.inc.php";
            require_once "../includes/controllers/apartments_crud_contr.inc.php";

            $results = get_apartments($pdo);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            die();
        }
        ?>

        <table class="table">
            <caption>
                <h2>Published Apartments</h2>
            </caption>

            <tr>
                <th>Id</th>
                <th>Apartent name</th>
                <th>Located at</th>
                <th>price per month</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            <?php
            foreach ($results as $result) { ?>
                <tr>
                    <td><?php echo $result['id'] ?></td>
                    <td><?php echo $result['apartment_name'] ?></td>
                    <td><?php echo $result['located_at'] ?></td>
                    <td><?php echo $result['price_per_month'] ?></td>
                    <td><input type="button" value="Edit"></td>
                    <td><input type="button" value="Delete" class="delete"></td>
                </tr>
            <?php } ?>
        </table>
    </div>


</body>

</html>