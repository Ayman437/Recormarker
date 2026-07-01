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
if ($_GET['absenceId']){
    $absenceId = mysqli_real_escape_string($conn, (int)decrypt($_GET['absenceId']));
    $sqlToCheckAbsenc = "SELECT * FROM absences WHERE id = '$absenceId'";
    $resultToCheckAbsenc = $conn->query($sqlToCheckAbsenc);

    if ($resultToCheckAbsenc->num_rows == 0){
        $conn->close();
        header("Location: ../account/admin");
        exit;
    }else{
        while ($row = $resultToCheckAbsenc->fetch_assoc()) {
            $classId = htmlspecialchars($row['class']);
            $classId2 = mysqli_real_escape_string($conn, $row['class']);
            $teacherId = mysqli_real_escape_string($conn, $row['teacher']);
            $numofst = htmlspecialchars($row['numofst']);
            $presences = htmlspecialchars($row['presences']);
            $absences = htmlspecialchars($row['absences']);
            $dropouts = htmlspecialchars($row['dropouts']);
            $Adate = htmlspecialchars($row['date']);
            $lesson = htmlspecialchars($row['lesson']);
            $code = htmlspecialchars($row['code']);
        }
    }

$lesson = ($lesson >= 1 && $lesson <= 8)
    ? ["First Period", "Second Period", "Third Period", "Fourth Period", "Fifth Period", "Sixth Period", "Seventh Period", "Eighth Period"][$lesson - 1] : "Unknown Period";
    $dateToGetDay = str_replace("/", "-", explode(" ", $Adate)[0]);
    $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    $dayOfWeek = date('w', strtotime($dateToGetDay));

    $sqlToGetTeacherNameFromId = "SELECT fullname FROM teachers WHERE id = '$teacherId'";
    $sqlToGetTeacherNameFromIdResult = $conn->query($sqlToGetTeacherNameFromId);
    if ($sqlToGetTeacherNameFromIdResult->num_rows > 0) {
        while ($row2 = $sqlToGetTeacherNameFromIdResult->fetch_assoc()) {
            $teacherName = htmlspecialchars($row2['fullname']);
        }
    }else{
        $teacherName = "Null";
    }

    $sqlToGetClassName = "SELECT name FROM classes WHERE id = '$classId2'";
    $sqlToGetClassNameResult = $conn->query($sqlToGetClassName);
    if ($sqlToGetClassNameResult->num_rows > 0) {
        while ($row3 = $sqlToGetClassNameResult->fetch_assoc()) {
            $className = htmlspecialchars($row3['name']);
        }
    }else{
        $className = "Null";
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
    <title>Recormarker - Account - Admin - Attendance</title>
    <link rel="stylesheet" href="../css/absences.css">
</head>
<body>  
    <div class="navbar" id='navbar'>
        <a href="../index" class="active">Recormarker</a>
        <a href="../about">About platform</a>
    </div>

    <center>
<div id='brre'><br><br></div>

<div class="title" id='title'>
    Supervisor Dashboard
</div>

<div class="smalltitle" id='smalltitle'>
    Manage and control every aspect of the platform from here.
    <br><br>
    <button class='back-buton2' onclick="window.location.href = '../account/admin'">Back</button>
    <br>
    Attendance Record - Class <?php echo $className ?>
</div>

<div class="divtable2">
<div class='schooldata' id='schooldata'>
    School: <?php echo $schoolName; ?>
    <br>
    Governorate: <?php echo $governorate; ?> &nbsp;&nbsp;&nbsp;&nbsp; Directorate: <?php echo $directorate; ?>
    <br>
    Principal: <?php echo $headTeacher; ?> &nbsp;&nbsp;&nbsp;&nbsp; Attendance Supervisor: <?php echo $absencesupervisor; ?>
 </div>
                    <table>
                        <thead>
                            <tr>
                               <th>Number of Withdrawn Students Only</th>
                               <th>Number of Absent Students Only</th>
                               <th>Total Number of Absent and Withdrawn Students</th>
                               <th>Number of Present Students</th>
                               <th>Total Number of Students</th>
                               <th>Teacher Who Recorded Attendance</th>
                               <th>Class</th>
                               <th>Period</th>
                               <th>Date</th>
                               <th>Day</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td id="alldstudents"><?php echo $dropouts; ?></td>
                                <td id="allnstudents"><?php echo $absences; ?></td>
                                <td id="allnnstudents"><?php echo (string)((int)$absences + (int)$dropouts); ?></td>
                                <td id="allystudents"><?php echo $presences; ?></td>
                                <td id="allstudents"><?php echo $numofst; ?></td>
                                <td><?php echo $teacherName; ?></td>
                                <td><?php echo $className; ?></td>
                                <td><?php echo $lesson; ?></td>
                                <td><?php echo $Adate; ?></td>
                                <td>
                                <?php
                                  echo $days[$dayOfWeek];
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
                                    echo "<td>" . "<label class='custom-radio'>✔<input type='radio' name='$num' id='$num" . "d' value='dro-" . htmlspecialchars($row['id']) . "' required></label>" . "</td>";
                                    echo "<td>" . "<label class='custom-radio'>✔<input type='radio' name='$num' id='$num" . "n' value='no-" . htmlspecialchars($row['id']) . "' required></label>" . "</td>";
                                    echo "<td>" . "<label class='custom-radio'>✔<input type='radio' name='$num' id='$num" . "y' value='yes-" . htmlspecialchars($row['id']) . "' required></label>" . "</td>";
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
<div id='printdate' style='display: none;'>
    Print Date: <?php echo date("Y-m-d"); ?>
</div>

<button onclick='markSom(); printTable();' class="option-btn2" id='backbutton'>
    Print
</button>
    <br><br>
</center>
   <script src="../js/admin.js"></script>
   <script>setData("<?php echo $code; ?>");</script>
</body>
</html>