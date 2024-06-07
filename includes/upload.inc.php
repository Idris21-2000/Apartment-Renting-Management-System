<?php

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTempName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode(".", $fileName);
    $fileActExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActExt, $allowed)) {
        if (!($fileError > 0)) {
            if ($fileSize < 5000000) {
                require_once 'dbh.inc.php';
                require_once "models/upload.model.inc.php";
                //here it should be included the id of the user uploaded this later
                $fileNameNew = uniqid('', true) . "." . $fileActExt;
                $fileDestination = "../assets/uploads/" . $fileNameNew;

                // move_uploaded_file($fileTempName, $fileDestination);
                send_image($pdo, $fileNameNew);
                header("Location:../uploadImages.php?upload=success");

                $stmt = null;
                $pdo = null;

                die();
            } else {
                echo "The image file size was too large!";
            }
        } else {
            echo "There is an error while uploading the file";
        }
    } else {
        echo "You can't upload this type of a file";
    }
} else {
    header("Location:../uploadImages.php");
    die();
}
