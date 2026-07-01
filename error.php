<!DOCTYPE html>
<html lang="er">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recormarker</title>
    <link rel="stylesheet" href="css/error.css">
</head>
<body>  
    <div class="navbar">
        <a href="" class="active">Recormarker</a>
        <a href="about">About platform</a>
    </div>

    <br>

    <center>
    <div class='erorrMess'>
Unfortunately, an error has occurred.
<br>
Error Message:
<br>
<div style="color: red;">
<?php echo $_GET['errorMesssage']; ?>
</div>

<button onclick="window.location.href = './'">Return to Home Page</button>
    </div>

    <br>
    <img src="svg/error.svg" alt="error image" style="height: 5%; width: 5%;">
    </center>
</body>
</html>