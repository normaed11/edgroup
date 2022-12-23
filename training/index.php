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
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>SOP's "Procedimientos"</title>
</head>

<body onload="currentDay()">
    <!--seccion de encabezado-->
    <header>
        <h1 class="edgroup">
            ED Group & TFS Customs Brokers, Inc</h1>
            <h2>SOP's - Manuales Operativos</h2>
       
        
        <div class="top-left">
            <a href="../"> 
                <img src=" ../assets/images/logo nuevo.jpg">
            </a>
        </div>
        
        <div class="top-right">
          
            <h3> Welcome, <?php echo $_SESSION["fname"]; ?>!</h3>
            <p>
                <a href="../logout.php">LOGOUT</a>
            </p>   
        </div>  
    </header>


    <!--secccion de recuersos-->

    <div class="flex-row" id="containerholder">
       
        <nav>
            <ul class=navigation>
                <li>
                    <a href="../" class="btn" id="backbutton">Back / Regresar</a>
                </li>


                <li>
                    <a class="btn btn-success btn-block" target="_self" href="./pages/entries.php" button"">Entries
                        (Importaciones a USA)</a>
                </li>


                <li>
                    <a class="btn btn-success btn-block " target="_self" href="./pages/inbonds.php"
                        role="button">In-Bonds</a>

                </li>


                <li>
                    <a class="btn btn-success btn-block" target="_self" href="./pages/aes.php" button"">AES</a>
                </li>
                <li>
                    <a class="btn  btn-block" target="_self" href="./pages/logistics.php" role="button">Logistics
                    </a>
                </li>
                <li>
                    <a class="btn  btn-block" target="_self" href="./pages/hr.php" role="button">HR
                    </a>
                </li>
                <li>
                    <a class="btn  btn-block" target="_self" href="./pages/administration.php"
                        role="button">Administration
                    </a>
                </li>
            </ul>
        </nav>

    </div>


    <!--secccion ligas de api-->

    <script src="../assets/js/script.js"></script>
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