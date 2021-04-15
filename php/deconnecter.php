<<<<<<< HEAD
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


=======
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


>>>>>>> 7d9a44eed8e8349a878c497b051a24f7cdad6a17
?>