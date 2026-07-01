<!DOCTYPE html>
<html lang="er">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recormarker - Login - Admin</title>
    <link rel="stylesheet" href="../css/adminlogin.css">
</head>
<body>  
    <div class="navbar">
        <a href="../index" class="active">Recormarker</a>
        <a href="../about">About platform</a>
    </div>

    <br><br>
    <div class="title">
Enter the supervisor's username and password.
    </div>
    <br>
    
    <center>
        <div class="login-box-admin-name">
            <form method="POST">
<input type="text" name="adminName" id="adminName" minlength="4" maxlength="200" placeholder="Supervisor Username" required>
<br>
<input type="password" name="adminPass" id="adminPass" minlength="4" maxlength="200" placeholder="Password" required>
<br><br>
<input type="button" value="Back" name="back" id="back" onclick="window.location.href = '../index'" class="back-buton">
<input type="submit" value="Log In" name="submit" id="submit" class="submit-buton">
            </form>
         </div>

<?php

define('INCLUDED_PAGE', 'this is include page.');
include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
include '../inc-sdnfgDKS3JIah3HU/sec-jLJgdh48.php';


if($_COOKIE['pass'] && $_COOKIE['name']){
   header("Location: ../account/admin");
   exit;
}

if (isset($_POST['submit'])) {
    if (strlen($_POST['adminName']) >= 4) {
        if (strlen($_POST['adminName']) <= 200) {
            if (strlen($_POST['adminPass']) <= 200) {
                if (strlen($_POST['adminPass']) >= 4) {
            $name = mysqli_real_escape_string($conn, $_POST['adminName']);
            $pass = mysqli_real_escape_string($conn, encrypt($_POST['adminPass']));

            $sql = "SELECT name, pass FROM admins WHERE name = '$name' AND pass = '$pass'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $expDate = strtotime('+5 years');
                setcookie('namea', encrypt($_POST['adminName']), $expDate, '/');
                setcookie('passa', encrypt($_POST['adminPass']), $expDate, '/');

                header("Location: ../account/admin");
                exit;
            } else {
echo "<br><div style='color: red;'>The account does not exist, or the username or password is incorrect.</div>";
exit;
}

$conn->close();
}else{
    echo "<br><div style='color: red;'>Please enter a password with at least 4 characters.</div>";
    exit;
}
}else{
    echo "<br><div style='color: red;'>Please enter a password with no more than 200 characters.</div>";
    exit;
}
}else{
    echo "<br><div style='color: red;'>Please enter a username with no more than 200 characters.</div>";
    exit;
}
}else{
    echo "<br><div style='color: red;'>Please enter a username with at least 4 characters.</div>";
    exit;
}
}

if($_COOKIE['passa'] && $_COOKIE['namea']){
    $name = mysqli_real_escape_string($conn, decrypt($_COOKIE['namea']));
    $pass = mysqli_real_escape_string($conn, $_COOKIE['passa']);
    
    $sql = "SELECT id FROM admins WHERE name = '$name' AND pass = '$pass'";
 
    $result = $conn->query($sql);
 
    if ($result->num_rows == 0) {
        setcookie('namea', '', time() - 3600, '/');
        setcookie('passa', '', time() - 3600, '/');
    }else{
        if ($result->num_rows > 0) {
            header("Location: ../account/admin");
            $conn->close();
            exit;
        }
    }
 
    $conn->close();
 }else{
    if (!$_COOKIE['passa'] || $_COOKIE['namea']){
       setcookie('namea', '', time() - 3600, '/');
       setcookie('passa', '', time() - 3600, '/');
    }
 }
?>
   </center>
</body>
</html>