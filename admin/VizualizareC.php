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
<h1>Inregistrarile din tabela utilizatori</h1>
<p><b> <br></b</p>
<?php
// connectare bazadedate
 include("ConectareC.php");
// se preiau inregistrarile din baza de date
if ($result = $mysqli->query("SELECT * FROM users ORDER BY id "))
{ // Afisare inregistrari pe ecran
if ($result->num_rows > 0)
{
// afisarea inregistrarilor intr-o table
echo "<table border='1' cellpadding='10'>";
// antetul tabelului
echo "<tr><th>ID</th><th>Username</th><th>Parola</th><th>Email</th><th></th>><th></th></tr>";
while ($row = $result->fetch_object())
{
// definirea unei linii pt fiecare inregistrare
echo "<tr>";
echo "<td>" . $row->id . "</td>";
echo "<td>" . $row->username . "</td>";
echo "<td>" . $row->password . "</td>";
echo "<td>" . $row->email . "</td>";

echo "<td><a href='ModificareC.php?id=" . $row->id . "'>Modificare</a></td>";
echo "<td><a href='StergereC.php?id=" .$row->id . "'>Stergere</a></td>";
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
<a href="InserareC.php">Adaugarea unei noi inregistrari</a>
</body>
</html>