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
<h2>IULIA COSMETICS</h2>
<a href="Vizualizare.php"><i class="fas fa-usercircle"></i>Vizualizare produse</a>
<br>
<a href="VizualizareC.php"><i class="fas fa-usercircle"></i>Vizualizare clienti</a>
<br>
<a href="VizualizareCP.php"><i class="fas fa-usercircle"></i>Vizualizare comanda produse</a>
<br>
<a href="logout.php"><i class="fas fa-sign-outalt"></i>Logout</a>
</div>
</nav>
<div class="content">

<p>Bine ati revenit, <?=$_SESSION['name']?>!</p>
</div>
</body>
</html>
