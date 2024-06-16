<?php
// require_once "../includes/config_session.inc.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reg-form.css">
    <link rel="stylesheet" href="../css/uploads.css">
    <title>Document</title>
</head>

<body>
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
    </div><br><br><br>
    <div class="div-form">
        <form action="../includes/change_profile.inc.php" method="POST" enctype="multipart/form-data">
            <label for="file">Upload image</label>
            <input type="file" name="file"><br>
            <button type="submit" name="submit">upload</button>
        </form>
    </div>
</body>

</html>