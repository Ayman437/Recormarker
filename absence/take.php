<!DOCTYPE html>
<html lang="er">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recormarker - Account - Teacher - Record Attendance</title>
    <link rel="stylesheet" href="../css/takeabsence.css">
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

    $sql = "SELECT id, fullname, subject FROM teachers WHERE name = '$name' AND pass = '$pass'";

    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        setcookie('name', '', time() - 3600, '/');
        setcookie('pass', '', time() - 3600, '/');
        header("Location: ../");
        exit;
    }else{
        while ($row = $result->fetch_assoc()) {
            $teacherId =  htmlspecialchars($row["id"]);
            $fullName = htmlspecialchars($row["fullname"]);
            $subject = htmlspecialchars($row["subject"]);
        }
    }

    $conn->close();
}

include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
if ($_GET['classId']){
    $classId = mysqli_real_escape_string($conn, (int)decrypt($_GET['classId']));
    $conn->query("UPDATE classes SET numofst = (SELECT COUNT(*) FROM students WHERE class = '$classId') WHERE id = '$classId'");
    $sqlToCheckClass = "SELECT id, name, numofst FROM classes WHERE id = '$classId'";
    $resultToCheckClass = $conn->query($sqlToCheckClass);

    if ($resultToCheckClass->num_rows == 0){
        $conn->close();
        header("Location: ../account/teacher");
        exit;
    }else{
        while ($row = $resultToCheckClass->fetch_assoc()) {
            $numofst = htmlspecialchars($row['numofst']);
            $className = htmlspecialchars($row['name']);
        }
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
    header("Location: ../account/teacher");
    exit;
}
?>

    <br><br>
    <div class="title">
        Mr./Ms. <?php echo $fullName; ?>
    </div>
    <div class="subject">
        <?php echo $subject; ?>
        <br><br>
        Recording Class Attendance
        <?php echo $className; ?>
    </div>
    
    <center>
        <div class="login-box-admin-name">
            <form method="POST">

                <div class="divtable2">
                <div class='schooldata' id='schooldata'>
School: <?php echo $schoolName; ?>
<br>
Governorate: <?php echo $governorate; ?> &nbsp;&nbsp;&nbsp;&nbsp; Directorate: <?php echo $directorate; ?>
<br>
Principal: Mr./Ms. <?php echo $headTeacher; ?> &nbsp;&nbsp;&nbsp;&nbsp; Attendance Supervisor: Mr./Ms. <?php echo $absencesupervisor; ?>
 </div>
                    <table>
                        <thead>
                            <tr>
<th>Number of students with no attendance recorded</th>
<th>Number of withdrawn students</th>
<th>Number of absent students</th>
<th>Total number of absent and withdrawn students</th>
<th>Number of present students</th>
<th>Total number of students</th>
<th>Class</th>
<th>Session / Period</th>
<th>Date</th>
<th>Day</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td id="allunstudents">0</td>
                                <td id="alldstudents">0</td>
                                <td id="allnstudents">0</td>
                                <td id="allnnstudents">0</td>
                                <td id="allystudents">0</td>
                                <td id="allstudents">0</td>
                                <td><?php echo $className ?></td>
                                <td><select name='lesson' required>
                                    <option value="">Select</option>
                                    <option value="1">First</option>
                                    <option value="2">Second</option>
                                    <option value="3">Third</option>
                                    <option value="4">Fourth</option>
                                    <option value="5">Fifth</option>
                                    <option value="6">Sixth</option>
                                    <option value="7">Seventh</option>
                                    <option value="8">Eighth</option>
                                </select></td>
                                <td><?php echo date("Y/m/d"); ?></td>
                                <td>
                                <?php
                                $days_of_week = array(
                                    "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
                                );
                                $day_index = date("w");
                                echo $days_of_week[$day_index];
                                ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <table>
                        <thead <?php if ($numofst == 0) { echo "style='display: none;'";} ?>>
                            <tr>
                               <th>Withdrawn</th>
                               <th>Absent</th>
                               <th>Present</th>
                               <th>Language</th>
                               <th>Name</th>
                               <th>No.</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';

                            $sqlToGetAllStudents = "SELECT * FROM students WHERE class = $classId";
                            $result = $conn->query($sqlToGetAllStudents);
                            $num = 0;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $num++;
                                    echo "<tr>";
                                    echo "<td>" . "<label class='custom-radio'>✔<input type='radio' name='$num' id='$num" . "d' value='dro-" . htmlspecialchars($row['id']) . "' onclick='chooseOption(`$num" . "d`)' required></label>" . "</td>";
                                    echo "<td>" . "<label class='custom-radio'>✔<input type='radio' name='$num' id='$num" . "n' value='no-" . htmlspecialchars($row['id']) . "' onclick='chooseOption(`$num" . "n`)' required></label>" . "</td>";
                                    echo "<td>" . "<label class='custom-radio'>✔<input type='radio' name='$num' id='$num" . "y' value='yes-" . htmlspecialchars($row['id']) . "' onclick='chooseOption(`$num" . "y`)' required></label>" . "</td>";
                                    echo "<td>" . htmlspecialchars($row['seclanguage']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                    echo "<td>" . "$num" . "</td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<center>There are currently no students in this class</center>";
                            }
                            ?>
                        </tbody>
                        
                    </table>
                </div>

                <br>
                <input type="button" value="Back" name="signout" id="signout" onclick="window.location.href = '../account/teacher'" class="back-buton">
                <input type="submit" value="Submission of Class Attendance" name="submit" id="submit" class="submit-buton">
            </form>
         </div>
   </center>
   <br>
   
   <div id="numOfStudentsInTable" style="display: none;"><?php echo $numofst; ?></div>
   <script src="../js/takeabsence.js"></script>
   <script>
    
   </script>

<?php
   if (isset($_POST['submit'])) {
    if ($numofst != 0) {
        $lesson = $_POST['lesson'];

        if ($lesson >= 1 && $lesson <= 8){
            $absenceText = "$lesson" . "_"; 
            for ($i = 0; $i<= $numofst; $i++){
                if ($_POST[$i] !== "") {
                    $absenceText = $absenceText . $_POST[$i] . ",";
                }
            }
            
            if ($absenceText !== "") {
                include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
    
                $numberOfSt = mysqli_real_escape_string($conn, $numofst);
                date_default_timezone_set('Africa/Cairo');
                $nowDate = mysqli_real_escape_string($conn, date("Y-m-d h:i:s"));
                $lesson = mysqli_real_escape_string($conn, $lesson);
                $teacherId2 = mysqli_real_escape_string($conn, $teacherId);
                $words = explode(",", $absenceText);
                $count_yes = 0;
                $count_dro = 0;
                $count_no = 0;
    
                $absenceText = substr($absenceText, -1) === ',' ? substr($absenceText, 0, -1) : $absenceText;
    
                foreach ($words as $word) {
                    $word_part = explode(",", $word)[0];
                    $word_part2 = explode("-", $word_part)[0]; 
                
                    if ($word_part2 == "yes") {
                        $count_yes++;
                    } elseif ($word_part2 == "dro") {
                        $count_dro++;
                    } elseif ($word_part2 == "no") {
                        $count_no++;
                    }
                }
    
                if (($count_yes + $count_dro + $count_no) == $numofst){
                    $sqlToAddAbsence = "INSERT INTO absences (class, teacher, numofst, presences, absences, dropouts, date, lesson, code) VALUES ('$classId', '$teacherId2', '$numberOfSt', '$count_yes', '$count_no', '$count_dro', '$nowDate', '$lesson', '$absenceText')";
        
                    if (mysqli_query($conn, $sqlToAddAbsence)) {
                        echo '<script>document.body.innerHTML = ""; document.body.innerHTML = "<br><br><center><div style=\'color: green; font-size: 22px; font-weight: bold;\'>Class attendance has been submitted ' . $className . ' successfully</div></center>"; setTimeout(() => window.location.href = "../account/teacher", 2000);</script>';
                    }
                }else{
                    echo "<center><div style='color: red;'>Please record the attendance of all students</div></center><br><script>window.scrollTo(0, document.body.scrollHeight);</script>";
                }
            }
        }else{
            echo "<center><div style='color: red;'>Please select a valid share/div></center><br><script>window.scrollTo(0, document.body.scrollHeight);</script>";
        }
    }else{
        echo "<center><div style='color: red;'>There are currently no students in this class</div></center><br><script>window.scrollTo(0, document.body.scrollHeight);</script>";
    }
   }
   ?>
</body>
</html>
