<?php
require_once "../includes/config_session.inc.php";
?>

<?php
if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'admin') { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add another admin</title>
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

                $results = get_admin_requests($pdo);
            } catch (PDOException $e) {
                echo "Query failed: " . $e->getMessage();
                die();
            }
            ?>

            <table class="table">
                <caption>
                    <h2>Admin Requests confirmation</h2>
                </caption>

                <tr>
                    <th>Id</th>
                    <th>First-name</th>
                    <th>Last name</th>
                    <th>Username</th>
                    <th>Confirmation</th>
                </tr>
                <?php
                foreach ($results as $result) { ?>
                    <tr>
                        <td><?php echo $result['id'] ?></td>
                        <td><?php echo $result['fname'] ?></td>
                        <td><?php echo $result['lname'] ?></td>
                        <td><?php echo $result['username'] ?></td>
                        <td>
                            <form action="../includes/admin_change.inc.php" method="POST" class="button-confirm">
                                <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                                <button type="submit" name="submit">Make admin</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>

    </html>

<?php } else {
    header('location:../escape_page.html');
} ?>