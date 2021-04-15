
<?

$CIN=$_POST['cin'];
$mdp=$_POST['mdp'];

mysql_connect("localhost","root","");
mysql_select_db("base");

if ($CIN=='admin' && $mdp=='admin'){
  header("Location: http://127.0.0.1/php/adminPage.php?R=0");
  exit();
}

$req="SELECT * from enseignant where CIN='$CIN' and mdp='$mdp'";
$resultat=mysql_query($req);

$e=mysql_fetch_array($resultat);

if (mysql_num_rows($resultat)==1){
    header("Location: http://127.0.0.1/php/pannel.php?cin=$CIN&R=0");
    exit(); 
} else {
    echo "cin ou password invalides // template soon";
}









$CIN=$_POST['cin'];
$mdp=$_POST['mdp'];

mysql_connect("localhost","root","");
mysql_select_db("base");

if ($CIN=='admin' && $mdp=='admin'){
  header("Location: http://127.0.0.1/php/adminPage.php");
  exit();
}

$req="SELECT * from enseignant where CIN='$CIN' and mdp='$mdp'";
$resultat=mysql_query($req);

$e=mysql_fetch_array($resultat);

if (mysql_num_rows($resultat)==1){
    header("Location: http://127.0.0.1/php/pannel.php?cin=$CIN&R=0");
    exit(); 
} else {
    echo "cin ou password invalides // template soon";
}







?>