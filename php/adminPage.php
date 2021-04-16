
<?php

$R=$_GET['R'];

mysql_connect("localhost","root","");
mysql_select_db("base");

$req="SELECT DISTINCT num FROM reservation ORDER BY num";
$result=mysql_query($req);

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Table V03</title>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    

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

<div class='center'>
    <br>
    <h1 align='center'> WELCOME TO ADMIN PAGE </h1> 
    <br>  services valables : 
    <br> ***attribution des salles*** 
    <br> <br> <h3> Tableau des réservations : </h3>  
    </div>";
    if ($R==1) {
    echo "
    <div style='position: fixed; right: 5px; top: 200px;'>
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                <span class='sr-only'>Close</span>
            </button>
            sale affecter avec succes !
        </div>
    </div> 
    "; 
    }
    echo"
    <div class='center'>
    <table class='table table-bordered border-dark'>
    <thead class='table-dark'>
    <tr>

    <th scope='col'>N° surveillance</th>
    <th scope='col'>CIN de surveillant</th>
    <th scope='col'>*numéro du salle</th>
    </tr>
    </thead>
    <tbody>
    ";


    while( $e=mysql_fetch_array($result) ) {
    
        $num= $e['num'];

        $req1="SELECT * FROM reservation WHERE num='$num'";
        $result1=mysql_query($req1);
        $rows=mysql_num_rows($result1)+1;

        echo "
        <tr>
            <td scope='row' rowspan=$rows>$num</td>
        </tr>
        ";

        while ($s=mysql_fetch_array($result1)) {

        $CIN= $s['cin'];
        $num_salle = $s['num_salle'];
        
        echo "
        <tr>
            <td>
                <form method='POST' action='profil.php?cin=$CIN&A=1&S=0'>
                <input name='cin' type='hidden' value='$CIN'>
                $CIN  <button type='submit' class='btn btn-outline-primary'>Profil</button>
                <br>
                </form> 
            </td>
            
            <td>
                <form method='POST' action='affecter.php'>
                <input name='num_salle' type='text' value='$num_salle'>
                <input name='cin' type='hidden' value='$CIN'>
                <input name='num' type='hidden' value='$num'>
                <button type='submit' class='btn btn-outline-primary'>Affecter</button>
                <br>
                </form> 
            </td>
        </tr>
    ";

        }
        
    }

    echo "
    </tbody>
    </table>
</div>

</body>
</html>
";

?>