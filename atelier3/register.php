<?php
session_start();
$_SESSION['lyce']=$_POST["lyce"];
$_SESSION['anndeb']=$_POST["anndeb"];
$_SESSION['annfin']=$_POST["annfin"];
$_SESSION['ser']=$_POST["ser"];
$_SESSION['mention']=$_POST["mention"];
$_SESSION['moyenne']=$_POST["moyenne"];
$_SESSION['andeb']=$_POST["andeb"];
$_SESSION['titrepfe']=$_POST["titrepfe"];


function chek_vide($value)
{
    if(strlen($value)>0){
        return true;
    }
    else{
        return false;
    }
}
function age($date) {
    $age = date('Y') - date('Y', strtotime($date));
    if (date('md') < date('md', strtotime($date))) {
    return $age - 1;
    }else{
    return $age;
    }
}

$ag=age($_SESSION['date']);

function chek_annlyce($value1,$value2)
{
    if($value1+3<=$value2){
        return true;
    }
    else{
        return false;
    }
}
function chek_annfac($value1,$value2)
{
    if($value1>=$value2){
        return true;
    }
    else{
        return false;
    }
}

function chek_moybac($value1)
{
    if(10.00<=$value1 && $value1<=19.99){
        return true;
    }
    else{
        return false;
    }
}

if(chek_vide($_SESSION['lyce'])==false){
    echo"<p class =rouge>ERREUR : le champ (Lycée) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section3.php>Retour au formulaire</a>";
}
else if(chek_vide($_SESSION['moyenne'])==false){
    echo"<p class =rouge>ERREUR : le champ (Moyenne) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section3.php>Retour au formulaire</a>";
}
else if(chek_vide($_SESSION['titrepfe'])==false){
    echo"<p class =rouge>ERREUR : le champ (Titre PFE) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section3.php>Retour au formulaire</a>";
}

else if(chek_annlyce($_SESSION['anndeb'],$_SESSION['annfin'])==false){
    echo"<p class =rouge>ERREUR : impossible de finir le lycée en moins de 3ans</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section3.php>Retour au formulaire</a>";
}
else if(chek_annfac($_SESSION['annfin'],$_SESSION['andeb'])==true){
    echo"<p class =rouge>ERREUR : impossible que l'année du début a la fac soit inférieur a l'année de la fin du lycée</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section3.php>Retour au formulaire</a>";
}
else if(chek_moybac($_SESSION['moyenne'])==false){
    echo"<p class =rouge>ERREUR : votre moyenne est invalide</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section3.php>Retour au formulaire</a>";
}
else{
    echo " <div class=box>
    <div class=sec>
    <center><font face=arial color=red size=nb><h1>Informations personelles</h1></font></center>
    <div class=info>
    <strong>Nom :</strong>$_SESSION[Nom]</p><br>
    <p> <strong><left>Prénom : </left></strong> $_SESSION[prenom]</p><br>
    <p> <strong>Date de naisance : </strong> $_SESSION[date]</p><br>
    <p> <strong>Lieux de naissance : </strong> $_SESSION[lieu]</p><br>
    </div>
    </div>
    <div class=sec>
    <center><font face=arial color=red size=nb><h1>Informations de contacte</h1></font></center>
    <div class=info>
    <p> <strong>Adresse email : </strong> <a href=mailto:$_SESSION[email]>$_SESSION[email]</a></p><br>
    <p> <strong>Numéro de téléphone : </strong>$_SESSION[numtel]</p><br>
    <p> <strong>Adresse : </strong> $_SESSION[adresse]</p><br>
    <p> <strong>Commune : </strong> $_SESSION[commune]</p><br>
    <p> <strong>Wilaya : </strong> $_SESSION[wilaya]</p><br>
    </div>
    </div>  
    <div class=sec>
    <center><font face=arial color=red size=nb><h1>Informations sur le cursus</h1></font></center>
    <div class=info>
    <ol>
    <li><h2>Cycle Secondaire : </h2>
    <ul>
        <li>Lycée : $_SESSION[lyce]</li>
        <li>Année de début : $_SESSION[anndeb]</li>
        <li>Année de fin : $_SESSION[annfin]</li>
    </ul>
    <li><h2>Bac : </h2>
    <dl>
        <dt>Série
        <dd>$_SESSION[ser]
        <dt>Mention
        <dd>$_SESSION[mention]
        <dt>Moyenne
        <dd>$_SESSION[moyenne]
    </dl>
    <li><h2>Cycle universitaire : </h2>
        <ul>
            <li>Université : <a href=http://www.usthb.dz>U.S.T.H.B</a></li>
            <li>Année de début : $_SESSION[andeb]</li>
            <li>Titre P.F.E. : $_SESSION[titrepfe]</li>
        </ul>
    </ol>
    </div>
    </div>
    </div>
    <style>
    .box{
    position: absolute;
    background-origin: white;
    border: 3px red solid;
    padding: 4px;

    }
    .sec{
        background-color: silver;
        border: 2px orange solid;
        padding: right;
    }
    .info{
    background-color:brown;
        border: 1px black solid;
        padding: 4px;
    }
    #i{
        text-align: right;

    }
    .rouge{
        color: red;
        font-weight: bold;
    }

</style>
    
    
    
    ";
}

$con=mysqli_connect("localhost","root","","Etudiant") or die("erreur connexion mysqli");

$id_com=mysqli_query($con,"SELECT 'id_commune' from 'Commune' WHERE 'nom_commune' = '$_SESSION[commune]'");
$id_wy=mysqli_query($con,"SELECT id_wilaya from wilaya WHERE nom_wilaya='$_SESSION[wilaya]'");
$id_ser=mysqli_query($con,"SELECT id_serie_bac from Serie WHERE nom_serie='$_SESSION[ser]'");
$id_men=mysqli_query($con,"SELECT id_ention_bac from Mention WHERE nom_mention='$_SESSION[mention]'");




'INSERT INTO Utilisateur(nom, prenom, date_naiss, lieu_naiss, email, tel, adr, id_commune,id_wilaya,lycee,deb_s,fin_s,id_serie_bac,,id_mention_bac,moy_bac,deb_u,titre_PFE) VALUES($_SESSION[Nom],$_SESSION[prenom],$_SESSION[date], $_SESSION[lieu], $_SESSION[email],$_SESSION[numtel],$_SESSION[adresse],$id_com,$id_wy,$_SESSION[lyce],$_SESSION[anndeb],$_SESSION[annfin],$id_ser,$id_men,$_SESSION[moyenne],$_SESSION[andeb],$_SESSION[titrepfe])';




// détruire la session
session_unset();

session_destroy();
?>

