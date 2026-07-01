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

?>

<!DOCTYPE html>
<html lang="er">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recormarker - Account - Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>  
    <div class="navbar">
        <a href="../index" class="active">Recormarker</a>
        <a href="../about">About platform</a>
    </div>

    <br><br>
<div class="title">
    Supervisor Dashboard
</div>

<div class="smalltitle">
    Manage and control every aspect of the platform from here
</div>
    <br>

        <center><div class="bar">School Information</div></center>
    <div class="admin-options">
        <div class="admin-option">
            <center>

                 <button class="option-btn" onclick="showi('editschooldata');">Edit Information</button>
                <?php
                include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
                
                $sqlToGetSchoolInformation = "SELECT * FROM schooldata WHERE id = '1'";
                $sqlToGetSchoolInformationResult = $conn->query($sqlToGetSchoolInformation);

                if ($sqlToGetSchoolInformationResult->num_rows > 0) {
    while ($row = $sqlToGetSchoolInformationResult->fetch_assoc()) {
        $schoolName = htmlspecialchars($row['schoolname']);
        $headTeacher = htmlspecialchars($row['headteacher']);
        $absencesupervisor = htmlspecialchars($row['absencesupervisor']);
        $directorate = htmlspecialchars($row['directorate']);
        $governorate = htmlspecialchars($row['governorate']);

        echo "
        <div class='stageentry' id='editschooldata' style='display: none;'>
        <form method='POST'>

        <div class='explain'>
        School
        </div>
        <input type='text' name='schoolname' id='schoolname' minlength='4' maxlength='200' value='$schoolName' required placeholder='School Name'>

        <div class='explain'>
        Governorate
        </div>
        <input type='text' name='governorate' id='governorate' minlength='4' maxlength='200' value='$governorate' required placeholder='Governorate Name'>

        <div class='explain'>
        Directorate
        </div>
        <input type='text' name='directorate' id='directorate' minlength='4' maxlength='200' value='$directorate' required placeholder='Directorate Name'>

        <div class='explain'>
        Principal
        </div>
        <input type='text' name='headTeacher' id='headTeacher' minlength='4' maxlength='200' value='$headTeacher' required placeholder='Principal Name'>

        <div class='explain'>
        Attendance Supervisor
        </div>
        <input type='text' name='absencesupervisor' id='absencesupervisor' minlength='4' maxlength='200' value='$absencesupervisor' required placeholder='Attendance Supervisor Name'>

        <br>
        <button class='back-buton' type='button' onclick='hide(`editschooldata`);'>Cancel</button>
        <input type='submit' name='editschooldata' id='editschooldata' class='submit-buton' value='Save'>

        </form>
        </div>
        <br>
        ";

        echo "<div class='explain'>";
        echo "School: " . $schoolName .
             ", Governorate: " . $governorate .
             ", Directorate: " . $directorate .
             ", Principal: " . $headTeacher .
             ", Attendance Supervisor: " . $absencesupervisor;
        echo "</div>";
    }
} else {
    echo "<br><div style='color: red;'>An error occurred. Please try again.</div>";
}

                if (isset($_POST["editschooldata"])) {
                    if (strlen($_POST['schoolname']) >= 4) {
                        if (strlen($_POST['schoolname']) <= 200) {
                            if (strlen($_POST['governorate']) <= 200) {
                                if (strlen($_POST['governorate']) >= 4) {
                                    if (strlen($_POST['directorate']) <= 200) {
                                        if (strlen($_POST['directorate']) >= 4) {
                                            if (strlen($_POST['headTeacher']) <= 200) {
                                                if (strlen($_POST['headTeacher']) >= 4) {
                                                    if (strlen($_POST['absencesupervisor']) <= 200) {
                                                        if (strlen($_POST['absencesupervisor']) >= 4) {
                                                            include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
                                                            
                                                            $schoolName = mysqli_real_escape_string($conn, $_POST['schoolname']);
                                                            $governorate = mysqli_real_escape_string($conn, $_POST['governorate']);
                                                            $directorate = mysqli_real_escape_string($conn, $_POST['directorate']);
                                                            $headTeacher = mysqli_real_escape_string($conn, $_POST['headTeacher']);
                                                            $absencesupervisor = mysqli_real_escape_string($conn, $_POST['absencesupervisor']);

                                                            $sqlToUpdateSchoolData = "UPDATE schooldata SET schoolname = '$schoolName', headteacher = '$headTeacher', absencesupervisor = '$absencesupervisor', directorate = '$directorate', governorate = '$governorate'";

                                                            if (mysqli_query($conn, $sqlToUpdateSchoolData)) {
                                                                $conn->close();
                                                                header("Refresh:0");
                                                            }else{
    $conn->close();
    echo "<br><div style='color: red;'>An error occurred. Please try again.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter an Attendance Supervisor name with at least 4 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter an Attendance Supervisor name with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a Principal name with at least 4 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a Principal name with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a Directorate name with at least 4 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a Directorate name with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a Governorate name with at least 4 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a Governorate name with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a School name with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a School name with at least 4 characters.</div>";
}
                            
                }
                ?>
            </center>
    </div>
    </div>

<center><div class="bar">Educational Stages</div></center>
   <div class="admin-options">
        <div class="admin-option">
            <center>
<button class="option-btn" onclick="showi('addnewstagebox');">Add New Educational Stage</button>
            
              <div class='stageentry' id='addnewstagebox' style='display: none;'>
              <form method="POST">
               <div class='explain'>
               Enter Stage Name
               </div>
               <input type='submit' name='newstage' id='newstage' class='submit-buton' value='Save'>
              <button class="back-buton" type="button" onclick="hide('addnewstagebox');">Cancel</button>
               <input type='text' name='stage' id='stage' minlength="4" maxlength="200" required placeholder="Example: Grade 10">
               <?php 
               if (isset($_POST["newstage"])) {
                if (strlen($_POST['stage']) >= 4) {
                    if (strlen($_POST['stage']) <= 200) {
                        include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
                        
                        $stageName = mysqli_real_escape_string($conn, $_POST['stage']);
                        $date = mysqli_real_escape_string($conn, date('Y-m-d'));
                        $sqlToAddStage = "INSERT INTO stages (name, numofc, numofst, date) VALUES ('$stageName', '0', '0', '$date')";

                        if (mysqli_query($conn, $sqlToAddStage)) {
                            $conn->close();
                            header("Refresh:0");
                        }else{
                            $conn->close();
echo "<br><div style='color: red;'>An error occurred. Please try again.</div><script>document.getElementById('addnewstagebox').style.display = 'inline-block'</script>";
}

}else{
    echo "<br><div style='color: red;'>Please enter an Educational Stage name with no more than 200 characters.</div><script>document.getElementById('addnewstagebox').style.display = 'inline-block'</script>";
}
}else{
    echo "<br><div style='color: red;'>Please enter an Educational Stage name with at least 4 characters.</div><script>document.getElementById('addnewstagebox').style.display = 'inline-block'</script>";
}
               }
               ?>
            </form>
              </div>

              <?php 
              include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';

              $sqlToGetStages = "SELECT id, name FROM stages";
              $sqlToGetStagesResult = $conn->query($sqlToGetStages);

              if ($sqlToGetStagesResult->num_rows > 0) {
                echo '<br>';
                while ($row = $sqlToGetStagesResult->fetch_assoc()) {
                    $stageId = htmlspecialchars($row['id']);
                    $stageName = htmlspecialchars($row["name"]);
                    echo "<div class='clickingbox' id='stagenamebox$stageId'>$stageName</div>";
                }
              }else{
                echo "No educational stages available";
              }
              ?>
            </center>
        </div>
    </div>

<center><div class="bar">Classes</div></center>
   <div class="admin-options">
        <div class="admin-option">
            <center>

              <button class="option-btn" onclick="showi('addnewclass')">Add New Class</button>

                <div class='stageentry' id='addnewclass' style='display: none;'>
              <form method="POST">
               <div class='explain'>
              Select an Educational Stage
               <br>
               <select id='stagenameoption' name='stagenameoption' required>
                <option value=''>Select</option>
                <?php
               $sqlToGetStages = "SELECT id, name FROM stages";
               $sqlToGetStagesResult = $conn->query($sqlToGetStages);

              if ($sqlToGetStagesResult->num_rows > 0) {
                while ($row = $sqlToGetStagesResult->fetch_assoc()) {
                    $stageId = htmlspecialchars($row['id']);
                    $stageName = htmlspecialchars($row["name"]);
                    echo "<option value='$stageId'>$stageName</option>";
                }
              }
              ?>
                
              </select>
              <br>
              Add Class Name
               </div>

               <input type='submit' name='newclass' id='newclass' class='submit-buton' value='Save'>
               <buton class='back-buton' onclick="hide('addnewclass');">Cancel</buton>
               <input type='text' name='classname' id='classname' minlength="3" maxlength="200" required placeholder="Example: 1/1">
               <?php
               if (isset($_POST["newclass"])) {
                if (is_numeric($_POST['stagenameoption'])) {
                if (strlen($_POST['classname']) >= 3) {
                    if (strlen($_POST['classname']) <= 200) {
                        include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
                        
                        $className = mysqli_real_escape_string($conn, $_POST['classname']);
                        $forStageId = mysqli_real_escape_string($conn, (int)$_POST['stagenameoption']);
                        $date = mysqli_real_escape_string($conn, date('Y-m-d'));

                        $sqlTocheckStageId = "SELECT id FROM stages WHERE id = $forStageId";

                        if ($conn->query($sqlTocheckStageId)->num_rows > 0) {
                            $sqlToAddClass = "INSERT INTO classes (name, forstage, numofst, date) VALUES ('$className', '$forStageId', '0', '$date')";
                            $sqlToUpdateStage = "UPDATE stages SET numofc = numofc + 1 WHERE id = '$forStageId'";

                            if (mysqli_query($conn, $sqlToAddClass)) {
                                $conn->query($sqlToUpdateStage);
                                $conn->close();
                                header("Refresh:0");
                            }else{
                                $conn->close();
                       echo "<br><div style='color: red;'>An error occurred. Please try again.</div><script>document.getElementById('addnewclass').style.display = 'inline-block'</script>";
}
}else{
    echo "<br><div style='color: red;'>The selected educational stage does not exist.</div><script>document.getElementById('addnewclass').style.display = 'inline-block'</script>";
}

}else{
    echo "<br><div style='color: red;'>Please enter a class name with no more than 200 characters.</div><script>document.getElementById('addnewclass').style.display = 'inline-block'</script>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a class name with at least 3 characters.</div><script>document.getElementById('addnewclass').style.display = 'inline-block'</script>";
}
}else{
    echo "<br><div style='color: red;'>Please select a valid educational stage.</div><script>document.getElementById('addnewclass').style.display = 'inline-block'</script>";
}
               }
               ?>
            </form>
              </div>
              <?php 
              include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';

              $sqlToGetStages = "SELECT id, name FROM stages";
              $sqlToGetStagesResult = $conn->query($sqlToGetStages);

              if ($sqlToGetStagesResult->num_rows > 0) {
                  while ($row2 = $sqlToGetStagesResult->fetch_assoc()) {
                      $stageName = htmlspecialchars($row2['name']);
                      $stageId = mysqli_real_escape_string($conn, $row2['id']);
                      $stageId2 = htmlspecialchars($row2['id']);
                      echo "<center><div class='bar2'>$stageName</div></center>";

                      $sqlToGetClasses = "SELECT id, name FROM classes WHERE forstage = '$stageId'";
                      $resultToGetClasses = $conn->query($sqlToGetClasses);
      
                      if ($resultToGetClasses->num_rows > 0) {
                          while ($row = $resultToGetClasses->fetch_assoc()) {
                              $num++;
                              $classId = htmlspecialchars(encrypt($row['id']));
                              $className = htmlspecialchars($row['name']);

                            echo "<div class='clickingbox' id='classbox$classId' onclick='window.location.href = `../account/astudents?classId=$classId`'>$className</div>";
      
                          }
                      }else{
echo "No classes available";
                      }
                  }
              }
              
              ?>
              <br>
            </center>
        </div>
    </div>

   <center><div class="bar">Attendance Records</div></center>
   <div class="admin-options">
        <div class="admin-option">
            <?php
               $sqlToGetAbsences = "SELECT id, class, teacher, date, lesson FROM absences";
               $sqlToGetAbsencesReslut = $conn->query($sqlToGetAbsences);

               if ($sqlToGetAbsencesReslut->num_rows > 0) {
                while ($row = $sqlToGetAbsencesReslut->fetch_assoc()) {
                    $abId = htmlspecialchars(encrypt($row['id']));
                    $abClass = htmlspecialchars($row['class']);
                    $abClass2 = mysqli_real_escape_string($conn, $row['class']);
                    $aTeacherId = mysqli_real_escape_string($conn, $row['teacher']);
                    $abDate = htmlspecialchars($row['date']);
                    $lessonNum = $row['lesson'];

$lessonNum = ($lessonNum >= 1 && $lessonNum <= 8)
    ? ["First Period", "Second Period", "Third Period", "Fourth Period", "Fifth Period", "Sixth Period", "Seventh Period", "Eighth Period"][$lessonNum - 1]
    : "Unknown Period";
                    $sqlToGetTeacherNameFromId = "SELECT fullname FROM teachers WHERE id = '$aTeacherId'";
                    $sqlToGetTeacherNameFromIdResult = $conn->query($sqlToGetTeacherNameFromId);
                    if ($sqlToGetTeacherNameFromIdResult->num_rows > 0) {
                        while ($row2 = $sqlToGetTeacherNameFromIdResult->fetch_assoc()) {
                            $teacherName = htmlspecialchars($row2['fullname']);
                        }
                    }else{
                        $teacherName = "Null";
                    }

                    $sqlToGetClassName = "SELECT name FROM classes WHERE id = '$abClass2'";
                    $sqlToGetClassNameResult = $conn->query($sqlToGetClassName);
                    if ($sqlToGetClassNameResult->num_rows > 0) {
                        while ($row3 = $sqlToGetClassNameResult->fetch_assoc()) {
                            $abClassName = htmlspecialchars($row3['name']);
                        }
                    }else{
                        $abClassName = "Null";
                    }
                    echo "<div class='clickingbox' id='absenceBoc$abId' onclick='window.location.href = `../account/absences?absenceId=$abId`'>$teacherName <br> $abClassName <br> $lessonNum <br> $abDate</div>";
                }
              }else{
echo "No attendance records available";
              }
            ?>
        </div>
    </div>

    <center><div class="bar">Supervisors</div></center>
   <div class="admin-options">
        <div class="admin-option">
        <center>
              <button class="option-btn" onclick="showi('addneadminbox');">Add New Supervisor</button>

              <div class='stageentry' id='addneadminbox' style='display: none;'>
              <form method="POST">
               <div class='explain'>
                Enter the username and password
               </div>
               <input type='submit' name='addnewadmin' id='addnewadmin' class='submit-buton' value='Save'>
               <buton class='back-buton' onclick="hide('addneadminbox');">Cancel</buton>
               <input type='text' name='adminpass' id='adminpass' minlength="4" maxlength="200" required placeholder="password">
               <input type='text' name='adminname' id='adminname' minlength="4" maxlength="200" required placeholder="username">

              <?php
                            if (isset($_POST["addnewadmin"])) {
                                if (strlen($_POST['adminname']) >= 4) {
                                    if (strlen($_POST['adminname']) <= 200) {
                                        if (strlen($_POST['adminpass']) <= 200) {
                                            if (strlen($_POST['adminpass']) >= 4) {
                                        include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
                                        
                                        $adminName = mysqli_real_escape_string($conn, $_POST['adminname']);
                                        $adminPass = mysqli_real_escape_string($conn, encrypt($_POST['adminpass']));
                                        $date = mysqli_real_escape_string($conn, date('Y-m-d'));
                                        $sqlToAddNewAdmin = "INSERT INTO admins (name, pass, date) VALUES ('$adminName', '$adminPass', '$date')";
                            
                                        if (mysqli_query($conn, $sqlToAddNewAdmin)) {
                                            $conn->close();
                                            header("Refresh:0");
                                        }else{
                                            $conn->close();
echo "<br><div style='color: red;'>An error occurred. Please try again.</div><script>document.getElementById('addneadminbox').style.display = 'inline-block'</script>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a password with at least 4 characters.</div><script>document.getElementById('addneadminbox').style.display = 'inline-block'</script>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a password with no more than 200 characters.</div><script>document.getElementById('addneadminbox').style.display = 'inline-block'</script>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a username with no more than 200 characters.</div><script>document.getElementById('addneadminbox').style.display = 'inline-block'</script>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a username with at least 4 characters.</div><script>document.getElementById('addneadminbox').style.display = 'inline-block'</script>";
}
                    }
              ?>

            </form>
            </div>
            <br>
            
            <?php
                include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';

                $sqlToGetAdmins = "SELECT * FROM admins";
                $sqlToGetAdminsResult = $conn->query($sqlToGetAdmins);

                if ($sqlToGetAdminsResult->num_rows > 0) {
                    while ($row = $sqlToGetAdminsResult->fetch_assoc()) {
                        $adminId = htmlspecialchars(encrypt($row['id']));
                        $admenName = htmlspecialchars($row['name']);
                        $adminPass = htmlspecialchars(decrypt($row['pass']));
                        $adminDate = htmlspecialchars($row['date']);

                        echo "<div class='stageentry' id='addneadminbox'>
                <form method='POST'>
               <input type='submit' name='editadmin' id='addnewadmin' class='submit-buton' value='Save'>
               <input type='text' name='adminpass' id='adminpass' minlength='4' maxlength='200' value='$adminPass' required placeholder='Password'>
               <input type='text' name='adminname' id='adminname' minlength='4' maxlength='200' value='$admenName' required placeholder='Username'>
               <br>
                Created On: $adminDate
                <input type='pass' name='adminid' value='$adminId' hidden>
                </form>
            </div>";
                    }
                }else{
echo "No supervisors available";
                }

                if (isset($_POST["editadmin"])) {
                    if (strlen($_POST['adminname']) >= 4) {
                        if (strlen($_POST['adminname']) <= 200) {
                            if (strlen($_POST['adminpass']) <= 200) {
                                if (strlen($_POST['adminpass']) >= 4) {
                            include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
                            
                            $adminName2 = mysqli_real_escape_string($conn, $_POST['adminname']);
                            $adminPass2 = mysqli_real_escape_string($conn, encrypt($_POST['adminpass']));
                            $adminId2 = mysqli_real_escape_string($conn, decrypt($_POST['adminid']));
                            $sqlToEditAdmin = "UPDATE admins SET name = '$adminName2', pass = '$adminPass2' WHERE id = '$adminId2'";
                
                            if (mysqli_query($conn, $sqlToEditAdmin)) {
                                $conn->close();
                                header("Refresh:0");
                            }else{
                                $conn->close();
echo "<br><div style='color: red;'>An error occurred. Please try again.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a password with at least 4 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a password with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a username with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a username with at least 4 characters.</div>";
}
                }
            ?>

            </center>
        </div>
    </div>


    <center><div class="bar">Teachers</div></center>
   <div class="admin-options">
        <div class="admin-option">
        <center>

              <button class="option-btn" onclick="showi('addnewteacherbox');">Add New Teacher</button>

              <div class='stageentry' id='addnewteacherbox' style='display: none;'>
              <form method="POST">
               <div class='explain'>
Enter the account details and teacher information
               </div>
               <input type='submit' name='addnewteacher' id='addnewteacher' class='submit-buton' value='Save'>
               <buton class='back-buton' onclick="hide('addnewteacherbox');">Cancel</buton>

<input type='text' name='teachersubject' id='teachersubject' minlength="4" maxlength="200" required placeholder="Subject">
<input type='text' name='teacherfullname' id='teacherfullname' minlength="4" maxlength="200" required placeholder="Teacher's Full Name">
<input type='text' name='teacherpass' id='teacherpass' minlength="4" maxlength="200" required placeholder="Password">
<input type='text' name='teachername' id='teachername' minlength="4" maxlength="200" required placeholder="Username">



              <?php
                if (isset($_POST["addnewteacher"])) {
                    if (strlen($_POST['teachername']) >= 4) {
                        if (strlen($_POST['teachername']) <= 200) {
                            if (strlen($_POST['teacherpass']) <= 200) {
                                if (strlen($_POST['teacherpass']) >= 4) {
                                    if (strlen($_POST['teacherfullname']) <= 200) {
                                        if (strlen($_POST['teacherfullname']) >= 4) {
                                            if (strlen($_POST['teachersubject']) <= 200) {
                                                if (strlen($_POST['teachersubject']) >= 4) {
                                                    $teacherName = mysqli_real_escape_string($conn, $_POST['teachername']);
                                                    $teacherPass = mysqli_real_escape_string($conn, encrypt($_POST['teacherpass']));
                                                    $teacherFullName = mysqli_real_escape_string($conn, $_POST['teacherfullname']);
                                                    $teacherSubject = mysqli_real_escape_string($conn, $_POST['teachersubject']); 
                                                    $date = mysqli_real_escape_string($conn, date('Y-m-d'));

                                                    include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';

                                                    $sqlToAddTeacher = "INSERT INTO teachers (name, fullname, pass, subject, date, lastdate) VALUES ('$teacherName', '$teacherFullName', '$teacherPass', '$teacherSubject', '$date', 'NULL')";
                
                                                    if (mysqli_query($conn, $sqlToAddTeacher)) {
                                                        $conn->close();
                                                        header("Refresh:0");
                                                    }else{
                                                        $conn->close();
echo "<br><div style='color: red;'>An error occurred. Please try again.</div><script>document.getElementById('addnewteacherbox').style.display = 'inline-block'</script>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a subject name with at least 4 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a subject name with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a teacher's name with at least 4 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a teacher's name with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a password with at least 4 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a password with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a username with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a username with at least 4 characters.</div>";
}
                }                             
              ?>

            </form>
            </div>
            <br>

            <?php
            $sqlToGetTeachers = "SELECT * FROM teachers";
            $sqlToGetTeachersResult = $conn->query($sqlToGetTeachers);

            if ($sqlToGetTeachersResult->num_rows > 0) {
                while ($row = $sqlToGetTeachersResult->fetch_assoc()) {
                    $teacherId = htmlspecialchars(encrypt($row['id']));
                    $teacherName = htmlspecialchars($row['name']);
                    $teacherFullName = htmlspecialchars($row['fullname']);
                    $teacherSubject = htmlspecialchars($row['subject']);
                    $teacherDate = htmlspecialchars($row['date']);
                    $teacherLastDate = htmlspecialchars($row['lastdate']);
                    $teacherPass = decrypt($row['pass']);
                    echo "
            <div class='stageentry' id='addnewteacherbox' >
              <form method='POST'>
               <input type='submit' name='editteacher' id='addnewteacher' class='submit-buton' value='Save'>

               <input type='text' name='teachersubject' id='teachersubject' minlength='4' maxlength='200' value='$teacherSubject' required placeholder='Subject'>
               <input type='text' name='teacherfullname' id='teacherfullname' minlength='4' maxlength='200' value='$teacherFullName' required placeholder='Teacher's Full Name'>
               <input type='text' name='teacherpass' id='teacherpass' minlength='4' maxlength='200' value='$teacherPass' required placeholder='Password'>
               <input type='text' name='teachername' id='teachername' minlength'4' maxlength='200' value='$teacherName' required placeholder='Username'>

                <br>
                Last Activity Date: $teacherLastDate
                <br>
                Created On: $teacherDate
               <input type='pass' name='teacherid' value='$teacherId' hidden>
              </form>
            </div>
                    ";
                }
            }else{
echo "No teachers available";
            }

            if (isset($_POST["editteacher"])) {
                if (strlen($_POST['teachername']) >= 4) {
                    if (strlen($_POST['teachername']) <= 200) {
                        if (strlen($_POST['teacherpass']) <= 200) {
                            if (strlen($_POST['teacherpass']) >= 4) {
                                if (strlen($_POST['teacherfullname']) <= 200) {
                                    if (strlen($_POST['teacherfullname']) >= 4) {
                                        if (strlen($_POST['teachersubject']) <= 200) {
                                            if (strlen($_POST['teachersubject']) >= 4) {
                                                $teacherName = mysqli_real_escape_string($conn, $_POST['teachername']);
                                                $teacherPass = mysqli_real_escape_string($conn, encrypt($_POST['teacherpass']));
                                                $teacherFullName = mysqli_real_escape_string($conn, $_POST['teacherfullname']);
                                                $teacherSubject = mysqli_real_escape_string($conn, $_POST['teachersubject']); 
                                                $teacherId = mysqli_real_escape_string($conn, decrypt($_POST['teacherid']));

                                                include '../inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';

                                                $sqlToEditTeacher = "UPDATE teachers SET name = '$teacherName', fullname = '$teacherFullName', pass = '$teacherPass', subject = '$teacherSubject' WHERE id = '$teacherId'";
            
                                                if (mysqli_query($conn, $sqlToEditTeacher)) {
                                                    $conn->close();
                                                    header("Refresh:0");
                                                }else{
                                                    $conn->close();
echo "<br><div style='color: red;'>An error occurred. Please try again.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a subject name with at least 4 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a subject name with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a teacher's name with at least 4 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a teacher's name with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a password with at least 4 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a password with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a username with no more than 200 characters.</div>";
}
}else{
    echo "<br><div style='color: red;'>Please enter a username with at least 4 characters.</div>";
}
            }       
            ?>
        </center>
        </div>
    </div>
   <script src="../js/admin.js"></script>
</body>
</html>