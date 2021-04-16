<?php

    $CIN=$_GET['cin'];
    $R=$_GET['R'];

    mysql_connect("localhost","root","");
    mysql_select_db("base");

    $req="select * from enseignant where CIN='$CIN' ";
    $result=mysql_query($req);
    $e=mysql_fetch_array($result);

    $req1="select * from surveillance";
    $result1=mysql_query($req1);

    echo "
    <!DOCTYPE html>
    <html lang='en'>

        <head>

            <meta charset='UTF-8'>

            <title>PANNEL</title>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>

            <link rel='stylesheet' type='text/css' href='../css/util.css'>

            <link rel='stylesheet' type='text/css' href='../css/main.css'>

            <link rel='stylesheet' type='text/css' href='../css/admin.css'>

            <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js' integrity='sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG' crossorigin='anonymous'></script>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js' integrity='sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc' crossorigin='anonymous'></script>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js' integrity='sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf' crossorigin='anonymous'></script>
            <link rel='stylesheet' href='https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css'>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
            <script src='https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js'></script>

            ";
            $req2="select * from reservation where cin='$CIN'";
            $result2 = mysql_query($req2); 
            $quotaR = $e['quota'] - mysql_num_rows($result2);
            echo "
                <nav class='navbar fixed-top navbar-expand-lg navbar-light bg-light'>
                    <a class='navbar-brand' href='#'></a>
                    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                    </button>
                
                    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav mr-auto'>

                        <a class='navbar-brand'>
                            <img src='../img/profile1.png' width='50' height='50'>
                            $e[nom] $e[prenom]  
                        </a>

                        <a class='nav-link'>
                                <li class='nav-item'>
                                    <form method='POST' action='profil.php?cin=$e[cin]&A=0&S=0'>
                                        
                                        <button type='submit' class='btn btn-outline-primary'>Profil</button>
                                    </form>
                                </li>
                        </a>

                        <div>
                            <a class='nav-link'>
                                <li class='nav-item'>
                                    <form name='f2' method='POST' action='deconnecter.php'>
                                        <button onclick='verif()' type='submit' class='btn btn-outline-primary'>Déconnecter</button>
                                        <input name='cin' type='hidden' value='$e[cin]'>
                                        <input type='hidden' name='quotaR' value='$quotaR'>
                                    </form>
                                </li>
                            </a>
                        </div>
                    </ul>
                    </div>
                    <a class='navbar-brand right'>
                            <h1 style='color:#173ff0; font-family:Georgia, serif;'> I<span style='color:#2fbd22; font-family:Georgia, serif;'>S<span style='color:#173ff0; font-family:Georgia, serif;'>I Ariana  </h1> </span> </span>
                            
                        </a>
                </nav>
        </head>

        <body>

            <div class='limiter'>
                <div class='container-table100'>
                    <div class='wrap-table100'>
                        <div class='table100 ver5 m-b-110'>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class='center'>
                                <h1 style='font-size:400%;'> Bonjour </h1>
                                ";
                                if ($quotaR>0) {
                                    echo "
                                    <p> 
                                        Il vous reste $quotaR surveillances a reserver ! 
                                    <p>
                                    ";
                                }
                                else {
                                    echo "
                                    <p> 
                                         vous pouver déconnecter.
                                    <p>
                                    ";
                                }
                            
                            echo "
                            </div>
                            ";
                            if ($R==1) {
                            echo "
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    <span class='sr-only'>Close</span>
                                </button>
                                succes de réservation
                            </div>
                            "; 
                            }
                            if ($R==2) {
                            echo "
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    <span class='sr-only'>Close</span>
                                </button>
                                réservation <strong> annulée </strong>
                            </div>
                            ";
                            }
                            if ($R==3) {
                            echo "
                            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    <span class='sr-only'>Close</span>
                                </button>
                                vous dever terminer votre <strong> quota ( $quotaR ) </strong> avant de déconnecter !
                            </div>
                            ";
                            }
                            if ($R==4) {
                                echo "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        <span class='sr-only'>Close</span>
                                    </button>
                                    <strong> surveillance saturée ! </strong>, écheck de l'operation
                                </div>
                            ";
                            }
                            if ($R==5) {
                                echo "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        <span class='sr-only'>Close</span>
                                    </button>
                                    <strong> Vous avez atteint votre quota! </strong> Vous ne pouvez pas faire une autre réservation.
                                </div>
                            ";
                            }
                            echo"
                            <table data-vertable='ver5'>
                                <thead>
                                    <tr class='row100 head'>
                                        <th class='column100 column1' data-column='column1'> L02 IRS G01</th>
                                        <th class='column100 column2' data-column='column2'>Sunday</th>
                                        <th class='column100 column3' data-column='column3'>Monday</th>
                                        <th class='column100 column4' data-column='column4'>Tuesday</th>
                                        <th class='column100 column5' data-column='column5'>Wednesday</th>
                                        <th class='column100 column6' data-column='column6'>Thursday</th>
                                        <th class='column100 column7' data-column='column7'>Friday</th>
                                        <th class='column100 column8' data-column='column8'>Saturday</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class='row100'>
                                        <td class='column100 column1' data-column='column1'>8.30 AM - 10.00 AM</td>
                                        <td class='column100 column2' data-column='column2'>--</td>
                                        <td class='column100 column3' data-column='column3'>
                                                "; 
                                                    $s = mysql_fetch_array($result1);
                                                    $num= $s['num']; 
                                                    $nb_group= $s['nb_groupe'];
                                                    $nb_surveillant= $s['nb_surveillants'];
                                                    $nb_salle= $s['nb_salle'];
                                                    $date_debut = $s['date_debut']; 
                                                
                                                    $req2="SELECT * from reservation where cin='$CIN' and num='$num'";
                                                    $result2 = mysql_query($req2); 

                                                if ( mysql_num_rows($result2)==1) {
                                                echo "
                                                    <form method='POST' action='annuler.php'>
                                                    <input name='cin' type='hidden' value='$e[cin]'>
                                                    <input name='quota' type='hidden' value='$e[quota]'>
                                                    <input name='nb_surveillant' type='hidden' value='$nb_surveillant'>
                                                    <input size='4' type='hidden' name='num' value='$num'>
                                                    ";
                                                    $req3="SELECT * from reservation where num='$num' ";
                                                    $result3=mysql_query($req3);
                                                    $reserved=mysql_num_rows($result3);
                                                    echo"
                                                    STATS :  $reserved/$nb_surveillant
                                                    <br> <button type='submit' class='btn btn-outline-danger'>Annuler la <br>Réservation</button>
                                                    </form> "; 
                                                }
                                                else {
                                                $req3="SELECT * from reservation where num='$num' ";
                                                $result3=mysql_query($req3);
                                                $reserved=mysql_num_rows($result3);
                                                echo "
                                                    <form method='POST' action='reserver.php'>
                                                    <input name='cin' type='hidden' value='$e[cin]'>
                                                    <input name='quotaR' type='hidden' value='$quotaR'>
                                                    <input name='reserved' type='hidden' value='$reserved'>
                                                    <input name='nb_surveillant' type='hidden' value='$nb_surveillant'>
                                                    <input size='4' type='hidden' name='num' value='$num'>
                                                    STATS :  $reserved/$nb_surveillant
                                                    <br> <button type='submit' class='btn btn-outline-success'>Réserver </button>
                                                    </form>
                                                "; 
                                                }
                                                echo "
                                            
                                        </td>
                                        <td class='column100 column4' data-column='column4'>
                                        "; 
                                        $s = mysql_fetch_array($result1);
                                        $num= $s['num']; 
                                        $nb_group= $s['nb_groupe'];
                                        $nb_surveillant= $s['nb_surveillants'];
                                        $nb_salle= $s['nb_salle'];
                                        $date_debut = $s['date_debut']; 
                                    
                                        $req2="SELECT * from reservation where cin='$CIN' and num='$num'";
                                        $result2 = mysql_query($req2); 

                                    if ( mysql_num_rows($result2)==1) {
                                    echo "
                                        <form method='POST' action='annuler.php'>
                                        <input name='cin' type='hidden' value='$e[cin]'>
                                        <input name='quota' type='hidden' value='$e[quota]'>
                                        <input name='nb_surveillant' type='hidden' value='$nb_surveillant'>
                                        <input size='4' type='hidden' name='num' value='$num'>
                                        ";
                                        $req3="SELECT * from reservation where num='$num' ";
                                        $result3=mysql_query($req3);
                                        $reserved=mysql_num_rows($result3);
                                        echo"
                                        STATS :  $reserved/$nb_surveillant
                                        <br> <button type='submit' class='btn btn-outline-danger'>Annuler la <br>Réservation</button>
                                        </form> "; 
                                    }
                                    else {
                                        $req3="SELECT * from reservation where num='$num' ";
                                        $result3=mysql_query($req3);
                                        $reserved=mysql_num_rows($result3);
                                        echo "
                                            <form method='POST' action='reserver.php'>
                                            <input name='cin' type='hidden' value='$e[cin]'>
                                            <input name='quotaR' type='hidden' value='$quotaR'>
                                            <input name='reserved' type='hidden' value='$reserved'>
                                            <input name='nb_surveillant' type='hidden' value='$nb_surveillant'>
                                            <input size='4' type='hidden' name='num' value='$num'>
                                            STATS :  $reserved/$nb_surveillant
                                            <br> <button type='submit' class='btn btn-outline-success'>Réserver </button>
                                            </form>
                                        "; 
                                        }
                                    echo "
                                        </td>
                                        <td class='column100 column5' data-column='column5'>
                                        "; 
                                                    $s = mysql_fetch_array($result1);
                                                    $num= $s['num']; 
                                                    $nb_group= $s['nb_groupe'];
                                                    $nb_surveillant= $s['nb_surveillants'];
                                                    $nb_salle= $s['nb_salle'];
                                                    $date_debut = $s['date_debut']; 
                                                
                                                    $req2="SELECT * from reservation where cin='$CIN' and num='$num'";
                                                    $result2 = mysql_query($req2); 

                                                if ( mysql_num_rows($result2)==1) {
                                                echo "
                                                    <form method='POST' action='annuler.php'>
                                                    <input name='cin' type='hidden' value='$e[cin]'>
                                                    <input name='quota' type='hidden' value='$e[quota]'>
                                                    <input name='nb_surveillant' type='hidden' value='$nb_surveillant'>
                                                    <input size='4' type='hidden' name='num' value='$num'>
                                                    ";
                                                    $req3="SELECT * from reservation where num='$num' ";
                                                    $result3=mysql_query($req3);
                                                    $reserved=mysql_num_rows($result3);
                                                    echo"
                                                    STATS :  $reserved/$nb_surveillant
                                                    <br> <button type='submit' class='btn btn-outline-danger'>Annuler la <br>Réservation</button>
                                                    </form> "; 
                                                }
                                                else {
                                                    $req3="SELECT * from reservation where num='$num' ";
                                                    $result3=mysql_query($req3);
                                                    $reserved=mysql_num_rows($result3);
                                                    echo "
                                                        <form method='POST' action='reserver.php'>
                                                        <input name='cin' type='hidden' value='$e[cin]'>
                                                        <input name='quotaR' type='hidden' value='$quotaR'>
                                                        <input name='reserved' type='hidden' value='$reserved'>
                                                        <input name='nb_surveillant' type='hidden' value='$nb_surveillant'>
                                                        <input size='4' type='hidden' name='num' value='$num'>
                                                        STATS :  $reserved/$nb_surveillant
                                                        <br> <button type='submit' class='btn btn-outline-success'>Réserver </button>
                                                        </form>
                                                    "; 
                                                    }
                                                echo "
                                        </td>
                                        <td class='column100 column6' data-column='column6'>
                                        "; 
                                        $s = mysql_fetch_array($result1);
                                        $num= $s['num']; 
                                        $nb_group= $s['nb_groupe'];
                                        $nb_surveillant= $s['nb_surveillants'];
                                        $nb_salle= $s['nb_salle'];
                                        $date_debut = $s['date_debut']; 
                                    
                                        $req2="SELECT * from reservation where cin='$CIN' and num='$num'";
                                        $result2 = mysql_query($req2); 

                                    if ( mysql_num_rows($result2)==1) {
                                    echo "
                                        <form method='POST' action='annuler.php'>
                                        <input name='cin' type='hidden' value='$e[cin]'>
                                        <input name='quota' type='hidden' value='$e[quota]'>
                                        <input name='nb_surveillant' type='hidden' value='$nb_surveillant'>
                                        <input size='4' type='hidden' name='num' value='$num'>
                                        ";
                                        $req3="SELECT * from reservation where num='$num' ";
                                        $result3=mysql_query($req3);
                                        $reserved=mysql_num_rows($result3);
                                        echo"
                                        STATS :  $reserved/$nb_surveillant
                                        <br> <button type='submit' class='btn btn-outline-danger'>Annuler la <br>Réservation</button>
                                        </form> "; 
                                    }
                                    else {
                                        $req3="SELECT * from reservation where num='$num' ";
                                        $result3=mysql_query($req3);
                                        $reserved=mysql_num_rows($result3);
                                        echo "
                                            <form method='POST' action='reserver.php'>
                                            <input name='cin' type='hidden' value='$e[cin]'>
                                            <input name='quotaR' type='hidden' value='$quotaR'>
                                            <input name='reserved' type='hidden' value='$reserved'>
                                            <input name='nb_surveillant' type='hidden' value='$nb_surveillant'>
                                            <input size='4' type='hidden' name='num' value='$num'>
                                            STATS :  $reserved/$nb_surveillant
                                            <br> <button type='submit' class='btn btn-outline-success'>Réserver </button>
                                            </form>
                                        "; 
                                        }
                                    echo "
                                            </td>
                                        <td class='column100 column7' data-column='column7'>
                                        <form>
                                                -Nom_Matiere-
                                                <br> <button type='submit' class='btn btn-outline-success'>Réserver</button>
                                            </form>

                                    </td>
                                    <td class='column100 column8' data-column='column8'>
                                    <form>
                                    -Nom_Matiere-
                                    <br> <button type='submit' class='btn btn-outline-success'>Réserver</button>
                                </form>
                                    </td>
                                    </tr>
                                    <tr class='row100'>
                                        <td class='column100 column1' data-column='column1'>10.00 AM - 10.30 AM</td>
                                        <td class='column100 column2' data-column='column2'>--</td>
                                        <td class='column100 column3' data-column='column3'>--</td>
                                        <td class='column100 column4' data-column='column4'>--</td>
                                        <td class='column100 column5' data-column='column5'>--</td>
                                        <td class='column100 column6' data-column='column6'>--</td>
                                        <td class='column100 column7' data-column='column7'>--</td>
                                        <td class='column100 column8' data-column='column8'>--</td>
                                    </tr>
                                    <tr class='row100'>
                                        <td class='column100 column1' data-column='column1'>10.30 AM - 12.00 AM</td>
                                        <td class='column100 column2' data-column='column2'>--</td>
                                        <td class='column100 column3' data-column='column3'>
                                            <form>
                                                -Nom_Matiere-
                                                <br> <button type='submit' class='btn btn-outline-success'>Réserver</button>
                                            </form>
                                        </td>
                                        <td class='column100 column4' data-column='column4'>
                                            <form>
                                                -Nom_Matiere-
                                                <br> <button type='submit' class='btn btn-outline-success'>Réserver</button>
                                            </form>
                                        </td>
                                        <td class='column100 column5' data-column='column5'>--</td>
                                        <td class='column100 column6' data-column='column6'>
                                            <form>
                                                -Nom_Matiere-
                                                <br> <button type='submit' class='btn btn-outline-success'>Réserver</button>
                                            </form>
                                        </td>
                                        <td class='column100 column7' data-column='column7'>--</td>
                                        <td class='column100 column8' data-column='column8'>--</td>
                                    </tr>
                                    <tr class='row100'>
                                        <td class='column100 column1' data-column='column1'>12.00 AM - 12.30 AM</td>
                                        <td class='column100 column2' data-column='column2'>--</td>
                                        <td class='column100 column3' data-column='column3'>--</td>
                                        <td class='column100 column4' data-column='column4'>--</td>
                                        <td class='column100 column5' data-column='column5'>--</td>
                                        <td class='column100 column6' data-column='column6'>--</td>
                                        <td class='column100 column7' data-column='column7'>--</td>
                                        <td class='column100 column8' data-column='column8'>--</td>
                                    </tr>
                                    <tr class='row100'>
                                        <td class='column100 column1' data-column='column1'>12.30 AM - 2.00 PM</td>
                                        <td class='column100 column2' data-column='column2'>--</td>
                                        <td class='column100 column3' data-column='column3'>--</td>
                                        <td class='column100 column4' data-column='column4'>--</td>
                                        <td class='column100 column5' data-column='column5'>--</td>
                                        <td class='column100 column6' data-column='column6'>--</td>
                                        <td class='column100 column7' data-column='column7'>--</td>
                                        <td class='column100 column8' data-column='column8'>--</td>
                                    </tr>
                                    <tr class='row100'>
                                        <td class='column100 column1' data-column='column1'>2.00 PM - 2.30 PM</td>
                                        <td class='column100 column2' data-column='column2'>--</td>
                                        <td class='column100 column3' data-column='column3'>--</td>
                                        <td class='column100 column4' data-column='column4'>--</td>
                                        <td class='column100 column5' data-column='column5'>--</td>
                                        <td class='column100 column6' data-column='column6'>--</td>
                                        <td class='column100 column7' data-column='column7'>--</td>
                                        <td class='column100 column8' data-column='column8'>--</td>
                                    </tr>
                                    <tr class='row100'>
                                        <td class='column100 column1' data-column='column1'>2.30 PM - 4.00 PM</td>
                                        <td class='column100 column2' data-column='column2'>--</td>
                                        <td class='column100 column3' data-column='column3'>--</td>
                                        <td class='column100 column4' data-column='column4'>--</td>
                                        <td class='column100 column5' data-column='column5'>--</td>
                                        <td class='column100 column6' data-column='column6'>--</td>
                                        <td class='column100 column7' data-column='column7'>--</td>
                                        <td class='column100 column8' data-column='column8'>--</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </body>

        <style>
            .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: light;
            color: white;
            text-align: center;
            }
        </style>
        <div class='footer'>
            <p>Developped by Riadh Charcheri, Nour Dorgham, Oumayma Ben Fadhel.</p>
        </div>
    </html>";
?>