<?php
require_once "../includes/config_session.inc.php";
// require_once "../includes/models/login_model.inc.php";
require_once "../includes/views/login_view.inc.php";
// require_once "../includes/controllers/login_contr.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tenant Dashboard</h1>
    <hr>

    <?php
    user_view();
    ?>

    <form action="../includes/logout.inc.php" method="POST">
        <button>logout</button>
    </form>

</body>

</html>