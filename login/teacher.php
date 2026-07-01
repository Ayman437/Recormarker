<!DOCTYPE html>
<html lang="er">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recormarker - Login - Teacher</title>
    <link rel="stylesheet" href="../css/teacherlogin.css">
</head>
<body>  
    <div class="navbar">
        <a href="../index" class="active">Recormarker</a>
        <a href="../about">About platform</a>
    </div>

    <br><br>
    <div class="title">
Enter the teacher's username and password
    </div>
    <br>
    
    <center>
        <div class="login-box-admin-name">
            <form method="POST">
<input type="text" name="name" id="name" minlength="4" placeholder="Username" maxlength="200" required>
<br>
<input type="password" name="teacherPass" id="teacherPass" minlength="4" maxlength="200" placeholder="Password" required>
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
            header("Location: ../account/teacher");
            exit;
         }
          
         if (isset($_POST['submit'])) {
            if (strlen($_POST['name']) >= 4) {
                if (strlen($_POST['teacherPass']) >= 4) {
                    if (strlen($_POST['teacherPass']) <= 200) {
                        if (strlen($_POST['name']) <= 200) {
                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                    $pass = mysqli_real_escape_string($conn, encrypt($_POST['teacherPass']));
        
                    $sql = "SELECT name, pass FROM teachers WHERE name = '$name' AND pass = '$pass'";
        
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                        $expDate = strtotime('+5 years');
                        setcookie('name', encrypt($_POST['name']), $expDate, '/');
                        setcookie('pass', encrypt($_POST['teacherPass']), $expDate, '/');
        
                        header("Location: ../account/teacher");
                        exit;
                    } else {
echo "<br><div style='color: red;'>The username or password is incorrect.</div>";
exit;
}

$conn->close();
}else{
    echo "<br><div style='color: red;'>Please enter a username with no more than 200 characters.</div>";
    exit;
}
}else{
    echo "<br><div style='color: red;'>Please enter a password with no more than 200 characters.</div>";
    exit;
}
}else{
    echo "<br><div style='color: red;'>Please enter a password with at least 4 characters.</div>";
    exit;
}
}else{
    echo "<br><div style='color: red;'>Please enter a username with at least 4 characters.</div>";
    exit;
}
        }

         ?>
   </center>

</body>
</html>