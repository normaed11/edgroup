<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Recursos Internos</title>
</head>

<body onload="currentDay()">
    <!--seccion de encabezado-->
    

    <header>
        <h1 class="edgroup">
            ED Group & TFS Customs Brokers, Inc</h1>
        <h3>
            <div id="currentDay"></div>

            TAX ID: 20-116452600 -
            SCAC:EGAB<br>

        </h3>
        
        <div class="top-left">
        <a href="./"> 
                <img src=" ./assets/images/logo nuevo.jpg">
            </a>
        </div>
        
        <div class="top-right">
          
            <h3> Welcome, <?php echo $_SESSION["fname"]; ?>!</h3>
            <p>
                <a href="reset-password.php">Reset Password</a><br>
                <a href="logout.php">Logout</a>
            </p>   
        </div>  
    </header>


    <!--secccion de recuersos-->

    <div class="flex-row" id="containerholder">
        <h3 class="links">Resources / Recursos</h3>
        <nav>
            <ul class=navigation>


                <li>
                    <a class="btn btn-success btn-block" target="_self" href="https://cloud6.acesuitecloud.com/"
                        role="button">RB
                        Systems</a>
                </li>
                <li>
                    <a class="btn btn-success btn-block" target="_self"
                        href="https://ed-group-university.teachable.com/?preview=logged_out" button"">ED Group
                        University</a>
                </li>


                <li>
                    <a class="btn btn-success btn-block " target="_self" href="https://hts.usitc.gov/current"
                        role="button">HTS</a>

                </li>
                <li>
                    <a class="btn btn-success btn-block " target="_self"
                        href="https://www.census.gov/foreign-trade/schedules/b/index.html" role="button">Schedule B
                        (Tarifa de Exportacion)</a>

                </li>
                <li>
                    <a class="btn btn-success btn-block" target="_self" href="https://www.ecfr.gov/current/title-19ß"
                        role="button">CFR 19
                        (Ley Aduanera)</a>
                </li>
                <li>
                    <a class="btn btn-success btn-block" target="_self"
                        href="https://www.ecfr.gov/current/title-15/subtitle-B/chapter-I/part-30?toc=1"
                        role="button">Title 15 Part 30 (Regulacion de Exportacion)
                    </a>
                </li>
                <li>
                    <a class="btn btn-success btn-block" target="_self"
                        href="https://www.cbp.gov/trade/rulings/bulletin-decisions" role="button"> Customs
                        Bulletin-Decisions (Notificaciones)
                    </a>
                </li>

                <li>
                    <a class="btn btn-success btn-block" target="_self"
                        href="https://global.gotomeeting.com/join/513471509role=" button"">Conexion Abierta</a>
                </li>
                <li>
                    <a class="btn  btn-block" target="_self" href=" https://maps.google.com/" role="button">Google
                        Maps</a>
                </li>
                <li>
                    <a class="btn  btn-block" target="_self" href="training/index.php" role="button">Training
                    </a>
                </li>
                <li>
                    <a class="btn  btn-block" target="_self"
                        href="mailto:?to=&body=attachment&attachment=./assets/images/logo nuevo.jpg">Mail</a>
                </li>
            </ul>
        </nav>

    </div>
    </section>









    <!--secccion ligas de api-->

    <script src="./assets/js/script.js"></script>
    <!--secccion map de google para calcular millas-->

    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyDGtGaYq_BZpaTfF5WoJRNs5mC6wFJwW-k"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

</body>

</html>