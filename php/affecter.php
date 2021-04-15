
<?php

 $num_salle=$_POST['num_salle'];
 $CIN=$_POST['cin'];
 $num=$_POST['num'];

 mysql_connect("localhost","root","");
 mysql_select_db("base");

    $req="UPDATE reservation SET num_salle='$num_salle' WHERE cin=$CIN AND num=$num";
    $result=mysql_query($req);
    if (mysql_affected_rows()==1) {

        header("Location: http://127.0.0.1/php/adminPage.php?R=1");
        exit();
    } else {
        echo " error try again";
    }



 $num_salle=$_POST['num_salle'];
 $CIN=$_POST['cin'];
 $num=$_POST['num'];

 mysql_connect("localhost","root","");
 mysql_select_db("base");

    $req="UPDATE reservation SET num_salle='$num_salle' WHERE cin=$CIN AND num=$num";
    $result=mysql_query($req);
    if (mysql_affected_rows()==1) {

        header("Location: http://127.0.0.1/php/adminPage.php");
        exit();
    //popup msg here 4 succes
    
    } else {
        echo " error try again";
    }


?>