<?php // connectare bazadedate
include("ConectareCP.php");
//Modificare datelor
// se preia id din pagina vizualizare
$error='';
if (!empty($_POST['id']))
{ if (isset($_POST['submit']))
{ // verificam daca id-ul din URL este unul valid
    if (is_numeric($_POST['id']))
    { // preluam variabilele din URL/form
        $id = $_POST['id'];
        
        $product_id = htmlentities($_POST['product_id'], ENT_QUOTES);
        $quantity = htmlentities($_POST['quantity'], ENT_QUOTES);
        $member_id = htmlentities($_POST['member_id'], ENT_QUOTES);
        
        
// verificam daca numele, prenumele, an si grupa nu sunt goale
        if ($member_id == '' || $product_id == ''||$quantity=='')
        { // daca sunt goale afisam mesaj de eroare
            echo "<div> ERROR: Completati campurile obligatorii!</div>";
        }else
        { // daca nu sunt erori se face update name, code, image, price, descriere, categorie
            if ($stmt = $mysqli->prepare("UPDATE tbl_cart SET product_id=?,quantity=?,member_id=? WHERE id='".$id."'"))
            {
                $stmt->bind_param("iii", $product_id,$quantity, $member_id);
                $stmt->execute();
                $stmt->close();
            }// mesaj de eroare in caz ca nu se poate face update
            else
            {echo "ERROR: nu se poate executa update.";}
        }
    }
// daca variabila 'id' nu este valida, afisam mesaj de eroare
    else
    {echo "id incorect!";} }}?>
<html> <head>
<style>
        body {
            background-color: moccasin;
            color: black;
        }
    </style><title> <?php if ($_GET['id'] != '') { echo "Modificare inregistrare"; }?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8"/></head>
<body>
<h1><?php if ($_GET['id'] != '') { echo "Modificare Inregistrare"; }?></h1>
<?php if ($error != '') {
    echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error."</div>";} ?>
<form action="" method="post">
    <div>
        <?php if ($_GET['id'] != '') { ?>
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
        <p>ID: <?php echo $_GET['id'];
            if ($result = $mysqli->query("SELECT * FROM tbl_cart where id='".$_GET['id']."'"))
            {
            if ($result->num_rows > 0)
            { $row = $result->fetch_object();?></p>
        
        <strong>Produs: </strong> <input type="text" name="product_id" value="<?php echo$row->product_id;
        ?>"/><br/>
            <strong>Cantitate: </strong> <input type="text" name="quantity" value="<?php echo$row->quantity;
        ?>"/><br/>
        <strong>Membru: </strong> <input type="text" name="member_id" value="<?php echo$row->member_id;}}} ?>"/><br/>
        
        <br/>
        <input type="submit" name="submit" value="Submit" />
        <a href="VizualizareCP.php">Index</a>
    </div></form></body> </html>
