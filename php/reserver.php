<?php
$CIN=$_POST['cin'];
$num=$_POST['num'];
$quotaR=$_POST['quotaR'];
$reserved=$_POST['reserved'];
$nb_surveillant=$_POST['nb_surveillant'];

$date_fin=" date fin de la réservation !";

mysql_connect("localhost","root","");
mysql_select_db("base");

/* condittions to do !!!!!!
if (sys_date < $date_fin) :: date limit ta3 réservation 
*/

if ( $reserved < $nb_surveillant ) {

    if ($quotaR>0) {
        $req="insert into reservation(cin,num) values('$CIN','$num')" ;
        $result=mysql_query($req);
        if ( mysql_affected_rows()==-1 ){
            echo " écheck de l'operation  // template or a popup message in pannel needed ";
        }
        else  {
        //succes
            header("Location: http://127.0.0.1/php/pannel.php?cin=$CIN&R=1");
            exit();
        }

    }else {
        header("Location: http://127.0.0.1/php/pannel.php?cin=$CIN&R=5");
        exit();

    }
   
}else {
    header("Location: http://127.0.0.1/php/pannel.php?cin=$CIN&R=4");
    exit();
}





?>