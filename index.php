<!DOCTYPE html>
<html lang="er">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recormarker</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>  
    <div class="navbar">
        <a href="" class="active">Recormarker</a>
        <a href="about">About platform</a>
    </div>

    <br><br>
    <div class="title">
Class Attendance Management Platform
    </div>
    <br>
    
    <center>
        <div class="login-box" onclick="window.location.href = 'login/teacher'">
Log In as a Teacher
         </div>
     
         <div class="login-box" onclick="window.location.href = 'login/admin'">
Log In as a Supervisor
         </div>
   

    <div class="content">
        <div style="font-weight: bold; font-style: italic;">Recormarker</div>
It is a comprehensive local platform for recording student attendance in every class within a school. The platform enables supervisors to accurately monitor each student's attendance, manage and update school data, generate detailed reports, analyze attendance statistics with ease, and print records or retrieve information at any time.    </div>
   </center>

<?php

define('INCLUDED_PAGE', 'this is include page.');
include 'inc-sdnfgDKS3JIah3HU/conn-kjfLJG5ysdbi4.php';
include 'inc-sdnfgDKS3JIah3HU/sec-jLJgdh48.php';

if($_COOKIE['pass'] && $_COOKIE['name']){
   header("Location: account/teacher");
   exit;
}

?>

</body>
</html>