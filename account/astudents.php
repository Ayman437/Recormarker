<?php
define('INCLUDED_PAGE', 'this is include page.');
include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
include '../inc-sdnfgDKS3JIah3HU/sec-jLJgdh48.php';

if($_COOKIE['passa'] && $_COOKIE['namea']){
   $name = mysqli_real_escape_string($conn, decrypt($_COOKIE['namea']));
   $pass = mysqli_real_escape_string($conn, $_COOKIE['passa']);
   
   $sql = "SELECT id FROM admins WHERE name = '$name' AND pass = '$pass'";

   $result = $conn->query($sql);

   if ($result->num_rows == 0) {
       setcookie('namea', '', time() - 3600, '/');
       setcookie('passa', '', time() - 3600, '/');
       header("Location: ../404");
       exit;
   }

   $conn->close();
}else{
   if (!$_COOKIE['passa'] || $_COOKIE['namea']){
      setcookie('namea', '', time() - 3600, '/');
      setcookie('passa', '', time() - 3600, '/');
      header("Location: ../404");
      exit;
   }
}

include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
if ($_GET['classId']){
    $classId = mysqli_real_escape_string($conn, (int)decrypt($_GET['classId']));
    $conn->query("UPDATE classes SET numofst = (SELECT COUNT(*) FROM students WHERE class = '$classId') WHERE id = '$classId'");
    $sqlToCheckClass = "SELECT id, name, numofst, forstage FROM classes WHERE id = '$classId'";
    $resultToCheckClass = $conn->query($sqlToCheckClass);

    if ($resultToCheckClass->num_rows == 0){
        $conn->close();
        header("Location: ../account/admin");
        exit;
    }else{
        while ($row = $resultToCheckClass->fetch_assoc()) {
            $numofst = htmlspecialchars($row['numofst']);
            $forStageId = htmlspecialchars($row['forstage']);
            $className = htmlspecialchars($row['name']);
        }
    }
    $forStageId2 = mysqli_real_escape_string($conn, $forStageId);

    $sqlToGetStageName = "SELECT name FROM stages WHERE id = '$forStageId2'";
    $sqlToGetStageNameResult = $conn->query($sqlToGetStageName);

    if ($sqlToGetStageNameResult->num_rows > 0){
        while ($row = $sqlToGetStageNameResult->fetch_assoc()) {
            $stageName = htmlspecialchars($row['name']);
        }
    }else{
        $stageName = "NULL";
    }

    $conn->close();

    include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
    $sqlToGetSchoolData = "SELECT * FROM schooldata";
    $sqlToGetSchoolDataResult = $conn->query($sqlToGetSchoolData);

    if ($sqlToGetSchoolDataResult->num_rows > 0){
        while ($row = $sqlToGetSchoolDataResult->fetch_assoc()) {
            $schoolName = htmlspecialchars($row['schoolname']);
            $governorate = htmlspecialchars($row['governorate']);
            $directorate = htmlspecialchars($row['directorate']);
            $headTeacher = htmlspecialchars($row['headteacher']);
            $absencesupervisor = htmlspecialchars($row['absencesupervisor']);
        }
    }
}else{
    header("Location: ../account/admin");
    exit;
}

?>

<!DOCTYPE html>
<html lang="er">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recormarker - Account - Admin - Students</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>  
    <div class="navbar" id='navbar'>
        <a href="../index" class="active">Recormarker</a>
        <a href="../about">About platform</a>
    </div>

    <div id='brre'><br><br></div>
    <div class="title" id='title'>
    Supervisor Dashboard
    </div>

    <div class="smalltitle" id='smalltitle'>
   Manage and control every aspect of the platform from here.
        <br><br>
        <button class='back-buton2' onclick="window.location.href = '../account/admin'" id='backbutton'>Back</button>
        <br>
Class Student List
        <?php echo $className ?>
    </div>

<div class="divtable2">
<center>
 <div class='schooldata' id='schooldata'>
    School: <?php echo $schoolName; ?>
    <br>
    Governorate: <?php echo $governorate; ?> &nbsp;&nbsp;&nbsp;&nbsp; Directorate: <?php echo $directorate; ?>
    <br>
    Principal:  <?php echo $headTeacher; ?> &nbsp;&nbsp;&nbsp;&nbsp;  Attendance Supervisor: <?php echo $absencesupervisor; ?>
 </div>
                    <table id="table1">
                        <thead>
                            <tr>
<th>Total Number of Students</th>
<th>Educational Stage</th>
<th>Class</th>
                            </tr>
                        </thead>

                        <body>
                            <tr>
                                <td id="allstudents"><?php echo "$numofst"; ?></td>
                                <td><?php echo $stageName; ?></td>
                                <td>1/5</td>
                            </tr>
                        </body>
                    </table>
</center>
                </div>

                <div>
<center>
                    <table id="table2">
                        <thead <?php if ($numofst == 0) { echo "style='display: none;'";} ?>>
                            <tr>
<th>Date of Birth</th>
<th>Student ID</th>
<th>Religion</th>
<th>Second Language</th>
<th>Name</th>
<th>No.</th>
                            </tr>
                        </thead>

                        
                        <tbody>
                            <?php
                            include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';

                            $sqlToGetAllStudents = "SELECT * FROM students WHERE class = '$classId'";
                            $result = $conn->query($sqlToGetAllStudents);
                            $num = 0;
                            while ($row = $result->fetch_assoc()) {
                                $num++;
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['borndate']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['studentcode']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['religion']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['seclanguage']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . "$num" . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                        
                    </table>

                    <?php
                    if ($numofst == 0) {
echo "<div style='font-weight: bold;'>No students found in this class.</div>";
                    }
                    ?>
</center>
                </div>    
<center>
   <div id='printdate' style='display: none;'>Print Date: <?php echo date("Y-m-d"); ?></div>

<button onclick='printTable();' class="option-btn2" id='backbutton'>Print</button>
<br>

<button onclick='showi("addnewstudent");' class="option-btn2" id='addnewstudent2'>Add New Student</button>
<br>

<div class='addnewstudent' id='addnewstudent' style='display: none;'>
<div class='stageentry'>
    <form method="POST">
        <label for="name" class='explain'>Student Name</label><br>
        <input type="text" id="name" name="name" max-length="200" min-length="4" required>
        <br><br>

        <label for="code" class='explain'>Student ID</label><br>
        <input type="number" id="code" name="code" max-length="200" min-length="4" required>
        <br><br>

        <label for="date" class='explain'>Date of Birth</label><br>
        <input type="text" id="date" name="date" max-length="200" min-length="4" required>
        <br><br>

        <label for="religion" class='explain'>Religion</label><br>
        <input type="text" id="religion" name="religion" max-length="200" min-length="4" required>
        <br><br>

        <label for="language" class='explain'>Second Language</label><br>
        <input type="text" id="language" name="language" max-length="200" min-length="4" required>
        <br><br>

        <input type="submit" value="Add" name="submit" id="submit" class="submit-buton">
        <button class="back-buton" type="button" onclick="hide('addnewstudent');">Cancel</button>
    </form>

    <?php
        if (isset($_POST['submit'])) {
            $stName = $_POST['name'];
            $code = (string)$_POST['code'];
            $stBornDate =  str_ireplace("-", "/", $_POST['date']);
            $religion = $_POST['religion'];
            $language = $_POST['language'];
        
            if (strlen($stName) >= 4) {
                if (strlen($stName) <= 200) {
                    if (is_numeric($code) && strlen($code) <= 200) {
                            if (strlen($language) <= 200) {
                                    if (strlen($religion) <= 200) {
                                        if ($stBornDate && strlen($stBornDate) <= 200) {
                                            include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';

                                            $stName = mysqli_real_escape_string($conn, $stName);
                                            $code = mysqli_real_escape_string($conn, $code);
                                            $stBornDate = mysqli_real_escape_string($conn, $stBornDate);
                                            $religion = mysqli_real_escape_string($conn, $religion);
                                            $language = mysqli_real_escape_string($conn, $language);
                                            $classId = mysqli_real_escape_string($conn, decrypt($_GET['classId']));
                                            $date = mysqli_real_escape_string($conn, date('Y-m-d'));

                                            $sqlToAddNewStudent = "INSERT INTO students (name, class, seclanguage, religion, studentcode, borndate, date, presence, absence, dropout) VALUES ('$stName', '$classId', '$language', '$religion', $code, '$stBornDate', '$date', '0', '0', '0')";
                                            if (mysqli_query($conn, $sqlToAddNewStudent)) {
                                                $conn->query("UPDATE classes SET numofst = numofst + 1 WHERE id = '$classId'");
                                                $conn->query("UPDATE stages SET numofst = numofst + 1 WHERE id = '$forStageId2'");

                                                header("Refresh:0");
                                            } else {
echo "<br><div style='color: red;'>An error occurred. Please try again.</div><script>window.scrollTo(0, document.body.scrollHeight);</script>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a valid date of birth.</div><script>window.scrollTo(0, document.body.scrollHeight);</script>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a religion with no more than 200 characters.</div><script>window.scrollTo(0, document.body.scrollHeight);</script>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a second language with no more than 200 characters.</div><script>window.scrollTo(0, document.body.scrollHeight);</script>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a valid student ID.</div><script>window.scrollTo(0, document.body.scrollHeight);</script>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a student name with no more than 200 characters.</div><script>window.scrollTo(0, document.body.scrollHeight);</script>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a student name with at least 4 characters.</div><script>window.scrollTo(0, document.body.scrollHeight);</script>";
}
        }
    ?>

</div>

</div>
<br><br>
</center>
<script src='../js/admin.js'></script>
</body>
</html>
