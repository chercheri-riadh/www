<?php
$CIN=$_GET['cin'];
$Admin=$_GET['A'];
$S=$_GET['S'];

mysql_connect("localhost","root","");
mysql_select_db("base");

$req2="SELECT * from enseignant where cin='$CIN'";
$result2=mysql_query($req2);
$en=mysql_fetch_array($result2);
$nom=$en['nom'];
$prenom=$en['prenom'];
$date_naiss=$en['date_naiss'];
$quota=$en['quota'];
$grade =$en['grade'];

echo "
<!DOCTYPE html>
<html lang='en'>

  <head>
      <title>Profil</title>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>

      <link rel='stylesheet' type='text/css' href='../vendor/bootstrap/css/bootstrap.min.css'>
      <link rel='stylesheet' type='text/css' href='../css/admin.css'>

      <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js' integrity='sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG' crossorigin='anonymous'></script>
      <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js' integrity='sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc' crossorigin='anonymous'></script>
      <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
      <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js' integrity='sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf' crossorigin='anonymous'></script>
      <link rel='stylesheet' href='https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css'>
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
      <script src='https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js'></script>
  </head>
<body>

   
   <br>
    <div class='container rounded border border-dark'>
        <div class='row bg-light'>
              <div class='col-md-8 border-bottom border-dark'>
                  <div class='p-3 py-5'>
                      <div class='d-flex justify-content-between align-items-center mb-3'>
                          <div class='d-flex flex-row align-items-center back'>
                            <img src='../img/profile1.png' width='80' height='80'>
                            <h1 style='padding-left: 40PX;'> Profil </h1>
                          </div>
                      </div>
                      <div class='row mt-2'>
                          <div class='col-md-6'> Prenom : $prenom </div>
                          <div class='col-md-6'>Nom :  $nom </div>
                      </div>
                      <div class='row mt-3'>
                          <div class='col-md-6'>CIN : $CIN  </div>
                          <div class='col-md-6'> Date de naissance :  $date_naiss</div>
                      </div>
                      <div class='row mt-4'>
                          <div class='col-md-6'>Quota : $quota</div>
                          <div class='col-md-6'> Grade : $grade </div>
                      </div>
                  </div>
                </div>
              ";
              if ($Admin==0)
              echo"
              <div class='col-md-4 bg-light border-left border-bottom border-dark'>
                  <div class='d-flex flex-column align-items-center text-center p-3 py-5'>
                  <div class='center '> 
                                <h5> Modifier votre mdp ici <h5>
                        <div>
                   </div>

                  <form method='POST' action='modifier.php'>
                      <input class='form-control' name='cin' type='hidden' value='$CIN'>
                      <input class='form-control' type='text' name='mdp' placeholder='ancient mdp'> <br>
                      <input  class='form-control'type='text' name='Nmdp' placeholder='nouveau mdp'> <br>  
                      <input type='submit'  value='modifier' class='btn btn-outline-primary'>
                  </form>
              </div>
          </div>
        </div>
    
      ";

        $req="SELECT * from reservation where CIN='$CIN' ";
        $result=mysql_query($req);

        if ($S==1) {
            echo "
                <br>
                <div class='alert alert-danger alert-dismissible fade show' role='alert' border>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    <span class='sr-only'>Close</span>
                    </button>
                    <span style='text-align:left;'> ancien mdp invalide </span>
                </div> 
                <br> 
            "; 
        }
        if ($S==2) {
                echo "
                <br>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    <span class='sr-only'>Close</span>
                    </button>
                    <span style='text-align:left;'> mot de passe <strong> modifier </strong> avec succes </span>
                </div>
                <br>
            "; 
        }
        echo "
    
        <div class='center'>  
            <table class='table table-bordered border-dark'>
                <thead class='table-dark'>
                    <tr>
                        <th scope='col'>numero de surveillance</th>
                        <th scope='col'>nb_groupe</th>
                        <th scope='col'>nb_surveillants</th>
                        <th scope='col'>nb_salle</th>
                        <th scope='col'>date_debut</th>
                    </tr>
                </thead>

                <tbody> 
                    ";
                        $line=0;
                        while ($e=mysql_fetch_array($result)) {
                        $line++;
                        $num = $e['num'];

                        $req1="SELECT * from surveillance where num='$num'";
                        $result1=mysql_query($req1);
                        $s = mysql_fetch_array($result1);

                        $nb_group= $s['nb_groupe'];
                        $nb_surveillant= $s['nb_surveillants'];
                        $nb_salle= $s['nb_salle'];
                        $date_debut = $s['date_debut'];

                        echo "
                        <tr>
                            <th scope='row'>$num</th>
                            <td>$nb_group</td>
                            <td>$nb_surveillant</td>
                            <td>$nb_salle</td>
                            <td>$date_debut</td>
                        </tr> 
                    ";
                    }
                    echo "  
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
";
    



?>