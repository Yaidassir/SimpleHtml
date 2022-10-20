<?php

session_start();
$con=mysqli_connect("localhost","root","","Etudiant") or die("erreur connexion mysqli");

$_SESSION['email']=$_POST["email"];
$_SESSION['numtel']=$_POST["numtel"];
$_SESSION['adresse']=$_POST["adresse"];
$_SESSION['commune']=$_POST["commune"];
$_SESSION['wilaya']=$_POST["wilaya"];


function chek_vide($value)
{
    if(strlen($value)>0){
        return true;
    }
    else{
        return false;
    }
}


if(chek_vide($_SESSION['email'])==false){
    echo"<p class =rouge>ERREUR : le champ (Adresse email) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section2.php>Retour au formulaire</a>";
}
else if(chek_vide($_SESSION['numtel'])==false){
    echo"<p class =rouge>ERREUR : le champ (Numéro de téléphone) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section2.php>Retour au formulaire</a>";
}
else if(chek_vide($_SESSION['adresse'])==false){
    echo"<p class =rouge>ERREUR : le champ (Adresse) n'a pas été remplis</p>";
    echo"    <a href=http://127.0.0.1/atelier3/section2.php>Retour au formulaire</a>";
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
    <form action=register.php method=POST>
    <p><center><h1>Informations sur le cursus</h1></center></p>
     <ol>
        <li>Cycle Secondaire</li>
        <ul>
            <li><label for=lyce>Lycée</label><br></li>
            <input type=text id=lyce name=lyce placeholder=vote lycée ><br>
            <li><label for=anndeb>Année début</label><br></li>
            <SELECT name=anndeb size=1>
                <OPTION>2005
                <OPTION>2006
                <OPTION>2007
                <OPTION>2008
                <OPTION>2009
                <OPTION>2010    
                <OPTION>2011
                <OPTION>2012
                <OPTION>2013
                <OPTION>2014
                <OPTION>2015
                    
            </SELECT>
            <li><label for=annfin>Année fin</label><br></li>
            <SELECT name=annfin size=1>
                <OPTION>2010    
                <OPTION>2011
                <OPTION>2012
                <OPTION>2013
                <OPTION>2014
                <OPTION>2015
                <OPTION>2016
                <OPTION>2017
                    
            </SELECT>
    
    
        </ul>

        <li>Bac</li>
        <ul>
            <li><label for=ser>Série</label><br></li>
            <SELECT name=ser size=1>
            ";
    
    $var=mysqli_query($con,"SELECT * from Serie");
    if(mysqli_num_rows($var)>0){
        while($row = mysqli_fetch_assoc($var)){
        echo " 
        <OPTION>$row[nom_serie] 
    ";
    }
    }
    
    echo"         
            </SELECT>
            <li><label for=mention>Mention</label><br></li>
            <SELECT name=mention size=1>
            ";
    $var=mysqli_query($con,"SELECT * from Mention");
    if(mysqli_num_rows($var)>0){
        while($row = mysqli_fetch_assoc($var)){
        echo " 
        <OPTION>$row[nom_mention] 
    ";
    }
    }
    
    echo"      
                    
            </SELECT>
            <li><label for=moyenne>Moyenne</label><br></li>
            <input type=text name=moyenne id=moyenne placeholder=votre moyenne>
            
        </ul>

        <li>Cycle Universitaire</li>
        <ul>
            <li><label for=andeb>Année de début</label><br></li>   
            <SELECT name=andeb size=1>
                <OPTION>2010    
                <OPTION>2011
                <OPTION>2012
                <OPTION>2013
                <OPTION>2014
                <OPTION>2015
                <OPTION>2016
                <OPTION>2017
                    
            </SELECT>
            <li><label for=titrepfe>Titre P.F.E.</label><br></li> 
            <textarea name=titrepfe id=titrepfe cols=30 rows=10></textarea>

        </ul>

     </ol>
     <input type=submit value=Register>
    </form>
    <input type=button onclick=window.location.href='http://127.0.0.1/atelier3/section2.php'; value=Retour />
</body>
</html>
    
    ";
}

?>


<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register.php" method="POST">
    <p><center><h1>Informations sur le cursus</h1></center></p>
     <ol>
        <li>Cycle Secondaire</li>
        <ul>
            <li><label for="lyce">Lycée</label><br></li>
            <input type="text" id="lyce" name="lyce" placeholder="vote lycée" ><br>
            <li><label for="anndeb">Année début</label><br></li>
            <SELECT name="anndeb" size="1">
                <OPTION>2005
                <OPTION>2006
                <OPTION>2007
                <OPTION>2008
                <OPTION>2009
                <OPTION>2010    
                <OPTION>2011
                <OPTION>2012
                <OPTION>2013
                <OPTION>2014
                <OPTION>2015
                    
            </SELECT>
            <li><label for="annfin">Année fin</label><br></li>
            <SELECT name="annfin" size="1">
                <OPTION>2010    
                <OPTION>2011
                <OPTION>2012
                <OPTION>2013
                <OPTION>2014
                <OPTION>2015
                <OPTION>2016
                <OPTION>2017
                    
            </SELECT>
    
    
        </ul>

        <li>Bac</li>
        <ul>
            <li><label for="ser">Série</label><br></li>
            <SELECT name="ser" size="1">
                <OPTION>Sciences Exactes
                <OPTION>Maths
                <OPTION>Sciences de la Nature et de la Vie
                <OPTION>Maths Technique
                    
            </SELECT>
            <li><label for="mention">Mention</label><br></li>
            <SELECT name="mention" size="1">
                <OPTION>Assez Bien
                <OPTION>Bien
                <OPTION>Très Bien
                <OPTION>Excellent
                    
            </SELECT>
            <li><label for="moyenne">Moyenne</label><br></li>
            <input type="text" name="moyenne" id="moyenne" placeholder="votre moyenne">
            
        </ul>

        <li>Cycle Universitaire</li>
        <ul>
            <li><label for="andeb">Année de début</label><br></li>   
            <SELECT name="andeb" size="1">
                <OPTION>2010    
                <OPTION>2011
                <OPTION>2012
                <OPTION>2013
                <OPTION>2014
                <OPTION>2015
                <OPTION>2016
                <OPTION>2017
                    
            </SELECT>
            <li><label for="titrepfe">Titre P.F.E.</label><br></li> 
            <textarea name="titrepfe" id="titrepfe" cols="30" rows="10"></textarea>

        </ul>

     </ol>
     <input type="submit" value="Register">
    </form>
    <input type=button onclick=window.location.href='http://127.0.0.1/atelier3/section2.php'; value=Retour />
</body>
</html>
-->