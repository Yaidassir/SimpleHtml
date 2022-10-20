<?php
session_start();

$_SESSION['Nom'] =$_POST["Nom"];
$_SESSION['prenom']=$_POST["prenom"];
$_SESSION['date']=$_POST["date"];
$_SESSION['lieu']=$_POST["lieu"];




function chek_vide($value)
{
    if(strlen($value)>0){
        return true;
    }
    else{
        return false;
    }
}

function chek_nomprenom($value){
    if (preg_match("/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i",$value)){
        return false;
    }  
    else {
        return true;
    }
}
function chek_date($value){
    $pattern = "/[-\s:]/";
    $components = preg_split($pattern, $value);
    if(checkdate($components[1],$components[0],$components[2])==true){
        return true;
    }
    else {
        return false;
    }
}
 

if(chek_vide($_SESSION['Nom'])==false){
    echo"<p class =rouge>ERREUR : le champ (NOM) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section1.php>Retour au formulaire</a>";
}
else if(chek_vide($_SESSION['prenom'])==false){
    echo"<p class =rouge>ERREUR : le champ (Prenom) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section1.php>Retour au formulaire</a>";
}
else if(chek_vide($_SESSION['date'])==false){
    echo"<p class =rouge>ERREUR : le champ (NOM) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section1.php>Retour au formulaire</a>";
}
else if(chek_vide($_SESSION['lieu'])==false){
    echo"<p class =rouge>ERREUR : le champ (Prenom) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section1.php>Retour au formulaire</a>";
}
else if(chek_nomprenom($_SESSION['Nom'])==false){
    echo"<p class =rouge>ERREUR : Nom invalide</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section1.php>Retour au formulaire</a>";
}
else if(chek_nomprenom($_SESSION['prenom'])==false){
    echo"<p class =rouge>ERREUR : Prénom invalide</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section1.php>Retour au formulaire</a>";
}
else if(chek_date($_SESSION['date'])==false){
    echo"<p class =rouge>ERREUR : Date invalide</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section1.php>Retour au formulaire</a>";
}
else{
    echo"
    <!DOCTYPE html>
<html lang=en>
<head>
    <meta charset=UTF-8>
    <meta name=viewport content=width=device-width, initial-scale=1.0>
    <title>Document</title>
</head>
<body>
    <div>
    <form action=section3.php method=POST>
    <p><center><h1>Informations de Contact</h1></center></p>
    <br><label for=email>Adresse email</label><br>
    <br><input type=text id=email name=email placeholder=vote adresse email ><br>
    <br> <label for=numtel>Numéro de téléphone</label><br>
    <br> <input type=text id=numtel name=numtel placeholder=vote numéro de téléphone ><br>
    <br> <label for=adresse>Adresse</label><br>
    <br> <input type=text id=adresse name=adresse placeholder=vote adresse ><br>
    <br> <label for=commune>commune</label><br>
    <br>  <SELECT name=commune size=1 ><br>
    ";
    $con=mysqli_connect("localhost","root","","Etudiant") or die("erreur connexion mysqli");
    $var=mysqli_query($con,"SELECT * from Commune");
    if(mysqli_num_rows($var)>0){
        while($row = mysqli_fetch_assoc($var)){
        echo " 
        <OPTION>$row[nom_commune] 
    ";
    }
    }
    
    echo"
    <br>  </SELECT><br>
      <br>  <label for=wilaya>Wilaya</label><br>
      <br> <SELECT name=wilaya size=1><br>
            <OPTION>Alger
            <OPTION>Oran
            <OPTION>Tiziouzou
            <OPTION>Telemcen
            <OPTION>Boumerdess
        </SELECT><br>
        <input type=submit value=Suivant />
</form>
<input type=button onclick=window.location.href='http://127.0.0.1/atelier3/section1.php'; value=Retour />
</div>
</body>
</html>";
}



?>
