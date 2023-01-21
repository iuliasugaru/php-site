<?php
include("ConectareCP.php");
$error='';
if (isset($_POST['submit']))
{
// preluam datele de pe formular

$product_id = htmlentities($_POST['product_id'], ENT_QUOTES);
        $quantity = htmlentities($_POST['quantity'], ENT_QUOTES);
        $member_id = htmlentities($_POST['member_id'], ENT_QUOTES);

// verificam daca sunt completate
if ($member_id == '' || $product_id == ''||$quantity=='')
{
// daca sunt goale se afiseaza un mesaj
$error = 'ERROR: Campuri goale!';
} else {
// insert
if ($stmt = $mysqli->prepare("INSERT into tbl_cart (product_id,quantity,member_id) VALUES (?, ?, ?)"))
{
$stmt->bind_param("iii", $product_id,$quantity, $member_id);
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

<strong>Produs ID: </strong> <input type="text" name="product_id" value=""/><br/>

<strong>Cantitate: </strong> <input type="text" name="quantity" value=""/><br/>
<strong>Client ID: </strong> <input type="text" name="member_id" value=""/><br/>
<br/>
<input type="submit" name="submit" value="Submit" />
<a href="VizualizareCP.php">Index</a>
</div></form></body></html>