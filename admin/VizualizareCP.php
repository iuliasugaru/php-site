<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<style>
        body {
            background-color: moccasin;
            color: black;
        }
    </style>
<title>Vizualizare Inregistrari</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1>Inregistrarile din tabela tbl_cart</h1>
<p><b><br></b</p>
<?php
// connectare bazadedate 
 include("ConectareCP.php");
// se preiau inregistrarile din baza de date
if ($result = $mysqli->query("SELECT * FROM tbl_cart ORDER BY id "))
{ // Afisare inregistrari pe ecran
if ($result->num_rows > 0)
{
// afisarea inregistrarilor intr-o table
echo "<table border='1' cellpadding='10'>";
// antetul tabelului
echo "<tr><th>Cos ID</th><th>Client ID</th><th>Produs ID</th><th>Cantitate</th><th></th>><th></th></tr>";
while ($row = $result->fetch_object())
{
// definirea unei linii pt fiecare inregistrare
echo "<tr>";
echo "<td>" . $row->id . "</td>";
echo "<td>" . $row->product_id . "</td>";

echo "<td>" . $row->quantity . "</td>";
echo "<td>" . $row->member_id . "</td>";

echo "<td><a href='ModificareCP.php?id=" . $row->id . "'>Modificare</a></td>";
echo "<td><a href='StergereCP.php?id=" .$row->id . "'>Stergere</a></td>";
echo "</tr>";
}
echo "</table>";
}
// daca nu sunt inregistrari se afiseaza un rezultat de eroare
else
{
echo "Nu sunt inregistrari in tabela!";
}
}
// eroare in caz de insucces in interogare
else
{ echo "Error: " . $mysqli->error(); }
// se inchide
$mysqli->close();
?>
<a href="InserareCP.php">Adaugarea unei noi inregistrari</a>
</body>
</html>