<?php

session_start();
session_unset();
session_destroy();

header('Location:../Authentication/Login.php');
die();
