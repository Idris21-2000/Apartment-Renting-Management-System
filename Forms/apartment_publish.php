<?php
require_once "../includes/config_session.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reg-form.css">
    <link rel="stylesheet" href="../css/uploads.css">
    <title>Images uploading</title>
</head>

<body>
    <?php
    require_once "../includes/dbh.inc.php";
    require_once "../includes/models/publish.model.inc.php";

    $results = get_landlords($pdo);
    $apartments = get_apartments($pdo);
    ?>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <div class="navbar">
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><button onclick="goBack()">Back</button></li>
        </ul>
    </div><br><br><br><br>
    <div class="flex-display">
        <div class="apartment-upload-form">
            <form action="../includes/apartment_publish.inc.php" method="POST">
                <h1>Apartment registering form</h1>
                <hr>
                <br>
                <input type="text" name="apartment_name" placeholder="Apartment name" required>
                <input type="text" name="located_at" placeholder="Apartment location" required>
                <br>
                <select name="owners_name" class="dropbox">
                    <option>Select Owner</option>
                    <?php foreach ($results as $result) : ?>
                        <option value="<?php echo $result['fname']; ?>"><?php echo $result['fname']; ?> <?php echo $result['lname']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="number" name="no_of_rooms" placeholder="Number of rooms">
                <br>
                <input type="number" name="vacancy" placeholder="Free vacancy">
                <input type="text" name="price_per_month" placeholder="Price per month in USD">
                <br>
                <textarea name="description" rows="2" cols="50" placeholder="Provide description for this apartment"></textarea>
                <button>submit</button>
            </form>
        </div>
        <div class="div-form">
            <form action="../includes/upload.inc.php" method="POST" enctype="multipart/form-data">
                <label for="file">Upload image</label>
                <input type="file" name="file">
                <select name="apartment_name" class="uploadDrop">
                    <option>Select apartment</option>
                    <?php foreach ($apartments as $apartment) : ?>
                        <option value="<?php echo $apartment['apartment_name']; ?>">
                            <?php echo $apartment['apartment_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="submit">upload</button>
            </form>
        </div>
    </div>
    <br>
</body>

</html>