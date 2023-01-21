<?php
// We need to use sessions, so you should always start sessions using thebelow code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
header('Location: Index.html');
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
        body {
            background-color: moccasin;
            color: black;
        }
    </style>
<meta charset="utf-8">
<title>Pagina proiect parola</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet"
href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin">
<nav class="navtop">
<div>
<h1>IULIA COSMETICS</h1>
<a href="magazin.php"><i class="fas fa-usercircle"></i>Magazin</a>
<br>
<a href="logout.php"><i class="fas fa-sign-outalt"></i>Logout</a>
</div>
</nav>
<div class="content">

<p>Bine ati revenit, <?=$_SESSION['name']?>!</p>
</div>
</body>
</html>
