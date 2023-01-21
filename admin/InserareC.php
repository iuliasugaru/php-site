<?php
include("ConectareC.php");
$error='';
if (isset($_POST['submit']))
{
// preluam datele de pe formular
 $username = htmlentities($_POST['username'], ENT_QUOTES);
 $password = htmlentities($_POST['password'], ENT_QUOTES);
 $email = htmlentities($_POST['email'], ENT_QUOTES);

// verificam daca sunt completate
if ($username == '' || $password == ''||$email=='')
{
// daca sunt goale se afiseaza un mesaj
$error = 'ERROR: Campuri goale!';
} else {
// insert
if ($stmt = $mysqli->prepare("INSERT into users (username,password,email) VALUES (?, ?, ?)"))
{
$stmt->bind_param("sss", $username, $password, $email);
$stmt->execute();
$stmt->close();
}
// eroare le inserare
else
{
echo "ERROR: Nu se poate executa insert.";
}
}
}
// se inchide conexiune mysqli
$mysqli->close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head> 
<style>
        body {
            background-color: moccasin;
            color: black;
        }
    </style><title><?php echo "Inserare inregistrare"; ?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head> <body>
<h1><?php echo "Inserare inregistrare"; ?></h1>
<?php if ($error != '') {
echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error."</div>";} ?>
<form action="" method="post">
<div>
<strong>Username: </strong> <input type="text" name="username" value=""/><br/>
<strong>Password: </strong> <input type="text" name="password" value=""/><br/>
<strong>Email: </strong> <input type="text" name="email" value=""/><br/>



<br/>
<input type="submit" name="submit" value="Submit" />
<a href="VizualizareC.php">Index</a>
</div></form></body></html>