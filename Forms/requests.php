<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crud.css">
    <title>Landlord access requests</title>
</head>

<body>
    <div class="upper-right-content">
        <a href="../Dashboard/admin.dash.php"><button>Dashboard</button></a>

    </div>
    <table class="table">
        <caption>
            <h2>Landlords Rental Publish Requests</h2>
        </caption>
        <tr>
            <th>Id</th>
            <th>First-name</th>
            <th>Last name</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
        <?php
        require_once "../includes/models/users_crud_model.inc.php";
        $results = get_landlord_request($pdo);
        ?>
        <?php foreach ($results as $row) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td>
                    <form action="../includes/requests.inc.php" method="POST" class="button-accept">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="submit">Grant request</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>