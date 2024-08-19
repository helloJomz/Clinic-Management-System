<?php 

session_start();
include 'dbcon.inc.php';

$path = '../pages/admin.login.php';

if (isset($_POST["login"])){
    
    $email = $_POST["username"];
    $pwd = $_POST["pwd"];

    if(empty($email) || empty($pwd)){
        header("Location:".$path."?error=emptyfields");
        exit;
    }

    $sql = "SELECT * FROM admin WHERE email='$email' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $checker = password_verify($pwd, $row['password']);

    if($checker == true){
        $_SESSION['adminfn'] = $row['firstname'];
        $_SESSION['adminln'] = $row['lastname'];
        $_SESSION['adminimg'] = $row['image'];
        $_SESSION['verify_admin_login'] = true;
        header('Location: ../pages/dashboard.php');
    }else{
        header("Location:".$path."?error=invalidpwd");
    }
    

    // echo $stmt->get_result();



}
