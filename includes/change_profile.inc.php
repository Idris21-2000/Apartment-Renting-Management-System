<?php
require_once 'config_session.inc.php';

if (isset($_POST['submit'])) {

    try {
        if (isset($_SESSION['user_id'])) {
            $file = $_FILES['file'];

            $fileName = $_FILES['file']['name'];
            $fileTempName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];
            $userID = $_SESSION['user_id'];

            require_once "dbh.inc.php";
            require_once "models/changeProfile_model.inc.php";
            require_once "controllers/changeProfile_contr.inc.php";

            $fileExt = explode(".", $fileName);
            $fileActExt = strtolower(end($fileExt));
            $actFileName = $fileExt[0];

            $allowed = array('jpg', 'jpeg', 'png');

            if (in_array($fileActExt, $allowed)) {
                if (!($fileError > 0)) {
                    if ($fileSize < 5000000) {
                        //here it should be included the id of the user uploaded this later
                        $fileNameNew = $actFileName . "." . $fileActExt;
                        $fileDestination = "../assets/uploads/" . $fileNameNew;
                        move_uploaded_file($fileTempName, $fileDestination);
                        change_display_photo($pdo, $fileNameNew, $userID);
                        header("Location:../forms/change_profile.php?status=success");
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
            echo "You are not logged in";
            die();
        }
    } catch (PDOException $e) {
        echo "Upload failed!: " . $e->getMessage();
        die();
    }
    if (isset($_SESSION['user_id'])) {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTempName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $userID = $_SESSION['user_id'];

        require_once "dbh.inc.php";
        require_once "models/changeProfile_model.inc.php";
        require_once "controllers/changeProfile_contr.inc.php";

        $fileExt = explode(".", $fileName);
        $fileActExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActExt, $allowed)) {
            if (!($fileError > 0)) {
                if ($fileSize < 5000000) {
                    //here it should be included the id of the user uploaded this later
                    $fileNameNew = uniqid('', true) . "." . $fileActExt;
                    $fileDestination = "../assets/uploads/" . $fileNameNew;

                    move_uploaded_file($fileTempName, $fileDestination);
                    change_display_photo($pdo, $fileNameNew, $userID);
                    header("Location:../forms/change_profile.php?upload=success");

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
        echo "You are not logged in";
        die();
    }
} else {
    header("Location:../forms/apartment_publish.php");
    die();
}
