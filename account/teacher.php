<!DOCTYPE html>
<html lang="er">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recormarker - Account - Teacher</title>
    <link rel="stylesheet" href="../css/teacheraccount.css">
</head>
<body>  
    <div class="navbar">
        <a href="../index" class="active">Recormarker</a>
        <a href="../about">About platform</a>
    </div>

    <?php
define('INCLUDED_PAGE', 'this is include page.');
include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
include '../inc-sdnfgDKS3JIah3HU/sec-jLJgdh48.php';

if(!$_COOKIE['pass'] || !$_COOKIE['name']){
   header("Location: ../");
   exit;
}else{
    $name = mysqli_real_escape_string($conn, decrypt($_COOKIE['name']));
    $pass = mysqli_real_escape_string($conn, $_COOKIE['pass']);

    date_default_timezone_set('Africa/Cairo');
    $nowDate = mysqli_real_escape_string($conn, date("Y-m-d h:i:s"));

    $sqlForUpdataLastDate = "UPDATE teachers SET lastdate = '$nowDate' WHERE name = '$name' AND pass = '$pass'";
    $conn->query($sqlForUpdataLastDate);

    $sql = "SELECT fullname, subject FROM teachers WHERE name = '$name' AND pass = '$pass'";

    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        setcookie('name', '', time() - 3600, '/');
        setcookie('pass', '', time() - 3600, '/');
        header("Location: ../");
        exit;
    }else{
        while ($row = $result->fetch_assoc()) {
            $fullName = htmlspecialchars($row["fullname"]);
            $subject = htmlspecialchars($row["subject"]);
        }
    }

    $conn->close();
}

   ?>

    <br><br>
    <div class="title">
        Mr./Ms. <?php echo $fullName; ?>
    </div>
    <div class="subject">
        <?php echo $subject; ?>
    </div>
    <br>
    
    <center>
        <div class="login-box-admin-name">
            <form method="POST">
                <?php
                include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';

                $sqlToGetStages = "SELECT id, name FROM stages";
                $sqlToGetStagesResult = $conn->query($sqlToGetStages);

                $allNum = $conn->query("SELECT id FROM classes")->num_rows;
                $num = 0;
                if ($sqlToGetStagesResult->num_rows > 0) {
                    while ($row2 = $sqlToGetStagesResult->fetch_assoc()) {
                        $stageName = htmlspecialchars($row2['name']);
                        $stageId = mysqli_real_escape_string($conn, $row2['id']);
                        $stageId2 = htmlspecialchars($row2['id']);
                        echo "<center><div class='bar'>$stageName</div></center>";

                        $sqlToGetClasses = "SELECT id, name FROM classes WHERE forstage = '$stageId'";
                        $resultToGetClasses = $conn->query($sqlToGetClasses);
        
                        if ($resultToGetClasses->num_rows > 0) {
                            while ($row = $resultToGetClasses->fetch_assoc()) {
                                $num++;
                                $classId = htmlspecialchars(encrypt($row['id']));
                                $className = htmlspecialchars($row['name']);
                                echo "
                                   <label class='custom-radio'>
                                   <input type='radio' name='class' id='class$num' value='$classId' onclick='chooseClass(`$num`, $allNum)' required>
                                   <span class='radio-label'>Class $className</span>
                                   </label>
        
                                ";
                            }
                        }else{
echo "No classes available";
                        }
                    }
                }else{
echo "No educational stages available";
                }
                ?>
                <br><br>
<input type="button" value="Log Out" name="logout" id="logout" onclick="logoutUser();" class="back-buton">
<input type="submit" value="Record Attendance" name="submit" id="submit" class="submit-buton">
            </form>
         </div>
         <br><br>

         <form method="POST" style='display: none;'>
            <input type="submit" name="logoutmaster" id='logoutmaster'>
        </form>
   </center>

   <script src="../js/chooseclass.js"></script>

   <?php

   if (isset($_POST['logoutmaster'])) {
       setcookie('name', '', time() - 3600, '/');
       setcookie('pass', '', time() - 3600, '/');
       header("Location: ../");
       exit;
   }

   if (isset($_POST['submit'])) {
    $classId = mysqli_real_escape_string($conn, (int)decrypt($_POST['class']));
    $classId2 = $_POST['class'];

    $sqlToCheckClass = "SELECT id FROM classes WHERE id = '$classId'";
    $resultToCheckClass = $conn->query($sqlToCheckClass);

    if ($resultToCheckClass->num_rows > 0) {
        header("Location: ../absence/take?classId=$classId2");
        exit;
    }else{
        echo "<br><center><div style='color: red;'>The requested class does not exist </div></center><script>window.scrollTo(0, document.body.scrollHeight);</script>";
    }

   }

   ?>
</body>
</html>