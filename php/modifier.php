<?php
$mdp=$_POST['mdp'];
$Nmdp=$_POST['Nmdp'];
$CIN=$_POST['cin'];

mysql_connect("localhost","root","");
mysql_select_db("base");

$req="SELECT * from enseignant where cin='$CIN' and mdp='$mdp'";
$result=mysql_query($req);

if (mysql_num_rows($result)==1){

    $req1="UPDATE enseignant SET mdp='$Nmdp' WHERE cin='$CIN'";
    $result1=mysql_query($req1);
    if (mysql_affected_rows()==1) {

        header("Location: http://127.0.0.1/php/profil.php?cin=$CIN&A=0&S=2");
        exit();
        //popup msg here 4 succes
    
    } else {
        echo " error try again";
    }
}
else {
    header("Location: http://127.0.0.1/php/profil.php?cin=$CIN&A=0&S=1");
        exit();
}

?>