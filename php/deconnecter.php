<?php
 $quotaR=$_POST['quotaR'];
 $CIN=$_POST['cin'];

 if ($quotaR==0){
    header("Location: http://127.0.0.1");
    exit();
 }
 else {
    header("Location: http://127.0.0.1/php/pannel.php?cin=$CIN&R=3");
    exit();
 }
?>