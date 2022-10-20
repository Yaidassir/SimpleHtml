<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage</title>
</head>
<body>
    <?php

use function PHPSTORM_META\elementType;

$n=$_POST["Nom"];
$p=$_POST["prenom"];
$d=$_POST["date"];
$l=$_POST["lieu"];
$e=$_POST["email"];
$num=$_POST["numtel"];
$adr=$_POST["adresse"];
$comm=$_POST["commune"];
$wl=$_POST["wilaya"];
$ly=$_POST["lyce"];
$andebl=$_POST["anndeb"];
$annfinl=$_POST["annfin"];
$ser=$_POST["ser"];
$men=$_POST["mention"];
$moy=$_POST["moyenne"];
$andebf=$_POST["andeb"];
$tpfe=$_POST["titrepfe"];



function age($date) {
    $age = date('Y') - date('Y', strtotime($date));
    if (date('md') < date('md', strtotime($date))) {
    return $age - 1;
    }
    return $age;
    }
$ag=age($d);

echo"
<p id=i>Bienvenue $p $n $ag ans</p>
";

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


if(chek_vide($n)==false){
    echo"<p class =rouge>ERREUR : le champ (NOM) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else if(chek_vide($p)==false){
    echo"<p class =rouge>ERREUR : le champ (Prenom) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else if(chek_vide($e)==false){
    echo"<p class =rouge>ERREUR : le champ (Adresse email) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else if(chek_vide($num)==false){
    echo"<p class =rouge>ERREUR : le champ (Numéro de téléphone) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else if(chek_vide($adr)==false){
    echo"<p class =rouge>ERREUR : le champ (Adresse) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else if(chek_vide($ly)==false){
    echo"<p class =rouge>ERREUR : le champ (Lycée) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else if(chek_vide($moy)==false){
    echo"<p class =rouge>ERREUR : le champ (Moyenne) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else if(chek_vide($tpfe)==false){
    echo"<p class =rouge>ERREUR : le champ (Titre PFE) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else if(chek_nomprenom($n)==false){
    echo"<p class =rouge>ERREUR : Nom invalide</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else if(chek_nomprenom($p)==false){
    echo"<p class =rouge>ERREUR : Prénom invalide</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else if(chek_date($d)==false){
    echo"<p class =rouge>ERREUR : Date invalide</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else if(chek_annlyce($andebl,$annfinl)==false){
    echo"<p class =rouge>ERREUR : impossible de finir le lycée en moins de 3ans</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else if(chek_annfac($annfinl,$andebf)==true){
    echo"<p class =rouge>ERREUR : impossible que l'année du début a la fac soit inférieur a l'année de la fin du lycée</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else if(chek_moybac($moy)==false){
    echo"<p class =rouge>ERREUR : votre moyenne est invalide</p>";
    echo"    <a href=http://127.0.0.1/atelier2/index2.htm>Retour au formulaire</a>";
}
else{
    echo "
<div class=box>
    <div class=sec>
    <center><font face=arial color=red size=nb><h1>Informations personelles</h1></font></center>
    <div class=info>
    <strong>Nom :</strong>$n</p><br>
    <p> <strong><left>Prénom : </left></strong> $p</p><br>
    <p> <strong>Date de naisance : </strong> $d</p><br>
    <p> <strong>Lieux de naissance : </strong> $l</p><br>
    </div>
    </div>
    <div class=sec>
    <center><font face=arial color=red size=nb><h1>Informations de contacte</h1></font></center>
    <div class=info>
    <p> <strong>Adresse email : </strong> <a href=mailto:$e>$e</a></p><br>
    <p> <strong>Numéro de téléphone : </strong>$num</p><br>
    <p> <strong>Adresse : </strong> $adr</p><br>
    <p> <strong>Commune : </strong> $comm</p><br>
    <p> <strong>Wilaya : </strong> $wl</p><br>
    </div>
    </div>  
    <div class=sec>
    <center><font face=arial color=red size=nb><h1>Informations sur le cursus</h1></font></center>
    <div class=info>
    <ol>
    <li><h2>Cycle Secondaire : </h2>
    <ul>
        <li>Lycée : $ly</li>
        <li>Année de début : $andebl</li>
        <li>Année de fin : $annfinl</li>
    </ul>
    <li><h2>Bac : </h2>
    <dl>
        <dt>Série
        <dd>$ser
        <dt>Mention
        <dd>$men
        <dt>Moyenne
        <dd>$moy
    </dl>
    <li><h2>Cycle universitaire : </h2>
        <ul>
            <li>Université : <a href=http://www.usthb.dz>U.S.T.H.B</a></li>
            <li>Année de début : $andebf</li>
            <li>Titre P.F.E. : $tpfe</li>
        </ul>
    </ol>
    </div>
    </div>
    </div>


";

}

/*
echo "
<div class=box>
    <div class=sec>
    <center><font face=arial color=red size=nb><h1>Informations personelles</h1></font></center>
    <div class=info>
    <strong>Nom :</strong>$n</p><br>
    <p> <strong><left>Prénom : </left></strong> $p</p><br>
    <p> <strong>Date de naisance : </strong> $d</p><br>
    <p> <strong>Lieux de naissance : </strong> $l</p><br>
    </div>
    </div>
    <div class=sec>
    <center><font face=arial color=red size=nb><h1>Informations de contacte</h1></font></center>
    <div class=info>
    <p> <strong>Adresse email : </strong> <a href=mailto:$e>$e</a></p><br>
    <p> <strong>Numéro de téléphone : </strong>$num</p><br>
    <p> <strong>Adresse : </strong> $adr</p><br>
    <p> <strong>Commune : </strong> $comm</p><br>
    <p> <strong>Wilaya : </strong> $wl</p><br>
    </div>
    </div>  
    <div class=sec>
    <center><font face=arial color=red size=nb><h1>Informations sur le cursus</h1></font></center>
    <div class=info>
    <ol>
    <li><h2>Cycle Secondaire : </h2>
    <ul>
        <li>Lycée : $ly</li>
        <li>Année de début : $andebl</li>
        <li>Année de fin : $annfinl</li>
    </ul>
    <li><h2>Bac : </h2>
    <dl>
        <dt>Série
        <dd>$ser
        <dt>Mention
        <dd>$men
        <dt>Moyenne
        <dd>$moy
    </dl>
    <li><h2>Cycle universitaire : </h2>
        <ul>
            <li>Université : <a href=http://www.usthb.dz>U.S.T.H.B</a></li>
            <li>Année de début : $andebf</li>
            <li>Titre P.F.E. : $tpfe</li>
        </ul>
    </ol>
    </div>
    </div>
    </div>


";
*/


?>
    
</body>
</html>






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