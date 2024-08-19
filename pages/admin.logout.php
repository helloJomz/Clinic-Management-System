<?php

session_start();

unset($_SESSION['adminfn'], $_SESSION['adminln'], $_SESSION['adminimg'], $_SESSION['verify_admin_login']);

header("location: admin.login.php");