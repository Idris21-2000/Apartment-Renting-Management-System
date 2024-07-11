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
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../css/reg-form.css">
        <title>Admin panel</title>
    </head>

    <body>

        <div class="navbar">
            <h1>Admin panel</h1>
            <?php
            require_once "../includes/dbh.inc.php";
            require_once "../includes/models/admin.model.inc.php";
            require_once "../includes/models/publish.model.inc.php";

            if (isset($_SESSION['user_id'])) {
                $users_counts = get_users_count($pdo);
                $tenant_counts = get_tenant_count($pdo);
                $apartment_counts = get_apartment_count($pdo);
                $results = display_photo($pdo, $_SESSION['user_id']);
                $requests = get_request_count($pdo);
            } ?>
            </ul>
        </div>
        <div class="sidebar">
            <div class="dp-image">
                <?php
                if ($results['display_photo'] == null) { ?>
                    <img src="../assets/images/dpplaceholder.jpg" alt="Profile picture of logged-in admin">
                <?php } else { ?>
                    <img src="../assets/uploads/<?php echo $results['display_photo']; ?>" alt="Profile picture of logged-in admin">
                <?php } ?>
            </div>
            <p class="online-name">Welcome dear <?php echo $results['fname']; ?></p>
            <br>
            <ul>
                <!-- <li><a href="">Admin stats</a></li> -->
                <li><a href="../Forms/admin_permission.php">Add another admin</a></li>
                <li><a href="../forms/apartment_publish.php">Publish Apartments</a></li>
                <!-- <li><a href="">Lease prepared</a></li> -->
                <li><a href="../Forms/change_profile.php">Profile picture</a></li>
                <li><a href="../index.html">Home</a></li>
            </ul>
            <form action="../includes/logout.inc.php" method="POST" class="form-button">
                <button>logout</button>
            </form>
        </div>
        <div class="content">
            <div class="box-0">
                <a href="../Forms/users_crud.php">
                    <h3>Users</h3>
                    <hr><br>
                    <p><?php echo $users_counts ?></p>
                </a>
            </div>
            <a href="../Forms/tenants_curd.php">
                <div class="box-1">
                    <h3>Tenants</h3>
                    <hr><br>
                    <p><?php echo $tenant_counts ?></p>
                </div>
            </a>
            <a href="../Forms/apartment_crud.php">
                <div class="box-2">
                    <h3>Apartments</h3>
                    <hr><br>
                    <p><?php echo $apartment_counts; ?></p>
                </div>
            </a>
            <a href="../Forms/requests.php">
                <div class="box-3">
                    <h3>Requests</h3>
                    <hr><br>
                    <p><?php echo $requests ?></p>
                </div>
            </a>
        </div>
    </body>

    </html>
<?php } else {
    header('location:../escape_page.html');
} ?>