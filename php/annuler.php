
<?php

$CIN=$_POST['cin'];
$num=$_POST['num'];

mysql_connect("localhost","root","");
mysql_select_db("base");

$req="delete from reservation where cin=$CIN and num=$num";
$result = mysql_query($req);


header("Location: http://127.0.0.1/php/pannel.php?cin=$CIN&R=2");
  exit();



$CIN=$_POST['cin'];
$num=$_POST['num'];

mysql_connect("localhost","root","");
mysql_select_db("base");

$req="delete from reservation where cin=$CIN and num=$num";
$result = mysql_query($req);


header("Location: http://127.0.0.1/php/pannel.php?cin=$CIN&R=2");
  exit();


?>