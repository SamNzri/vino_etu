<?php

// Remplir et renommer dataconf.php
define("BASEURL", "http://localhost/vino_etu/");

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'vino_db');

function connectDB(){
    //se connecter à la base de données
    $c = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    if(!$c) {
        die("Erreur de connexion. MySQLI : " . mysqli_connect_error());
    }
    //s'assurer que la connexion traite le utf8
    mysqli_query($c, "SET NAMES 'utf8'");
    return $c;
}
$connexion = connectDB();

// include your function here

class Bouteille {
    public function updateBouteilleCellier($id_bouteille_cellier, $id_bouteille, $date_achat, $garde_jusqua, $notes, $prix, $quantite, $millesime)
    {
        global $connexion;
    
        $stmt = $connexion->prepare("UPDATE vino__cellier SET id_bouteille = ?, date_achat = ?, garde_jusqua = ?, notes = ?, prix = ?, quantite = ?, millesime = ? WHERE id = ?");
        $stmt->bind_param("isssdiii", $id_bouteille, $date_achat, $garde_jusqua, $notes, $prix, $quantite, $millesime, $id_bouteille_cellier);
        $result = $stmt->execute();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

// instantiate the Bouteille class
$bouteille = new Bouteille();

// check if the form has been submitted
if (isset($_POST['updateBouteilleCellier'])) {
    // get the form data
    $id_bouteille_cellier = $_POST['id_bouteille_cellier'];
    $id_bouteille = $_POST['id_bouteille'];
    $date_achat = $_POST['date_achat'];
    $garde_jusqua = $_POST['garde'];
    $notes = $_POST['notes'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $millesime = $_POST['millesime'];

    // call the updateBouteilleCellier method with appropriate parameters
    $result = $bouteille->updateBouteilleCellier($id_bouteille_cellier, $id_bouteille, $date_achat, $garde_jusqua, $notes, $prix, $quantite, $millesime);

    // check the result of the function call
    if ($result) {
        echo "The bottle in the cellar was updated successfully.";
    } else {
        echo "There was an error updating the bottle in the cellar.";
    }
}
?>

<div class="modifier">
<div class="nouvelleBouteille" vertical layout>
    <ul class="listeAutoComplete">
    </ul>
    <form method="post" action="test.php">
        <div>
            
            <p>Date achat : <input name="date_achat" ></p>
            <p>Grade : <input name="garde" ></p>
            <p>Notes : <input name="notes" ></p>
            <p>Prix : <input name="prix"></p>
            <p>Quantite : <input name="quantite" ></p>
            <p>Millesime : <input name="millesime" ></p>
            <input type="hidden" name="id_bouteille_cellier" value="24">
            <input type="hidden" name="id_bouteille" value="110">
        </div>
        <button type="submit" name="updateBouteilleCellier">Modifier</button>
    </form>
</div>
</div>
