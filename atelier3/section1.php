<?php

session_start();
$con=mysqli_connect("localhost","root","","Etudiant") or die("erreur connexion mysqli");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form action="section2.php" method="POST" > 
    <p><center><h1>Informations personelles</h1></center></p>
        <label for="Nom">Nom</label><br>
        <input type="text" id="Nom" name="Nom" placeholder="vote nom" ><br>
        <label for="prenom">Prénom</label><br>
        <input type="text" id="prenom" name="prenom" placeholder="vote prenom" ><br>
        <label for="date">Date de naissance</label><br>
        <input type="text" id="date" name="date" placeholder="jj-mm-aaaa" ><br>
        <label for="lieu">Lieu de naissance</label><br>
        <SELECT name=lieu size=1><br>
        <?php
        $var=mysqli_query($con,"SELECT * from wilaya");
        if(mysqli_num_rows($var)>0){
            while($row = mysqli_fetch_assoc($var)){
            echo " 
            <OPTION>$row[nom_wilaya] 
        ";
        }
        }
             ?>
        </SELECT>
        <input type="submit" value="Suivant" />



        </form>

   
    </div>
<body>
</html>




<style>
    div{
        text-align: center;
    }
</style>