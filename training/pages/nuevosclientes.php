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
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Procedimientos de Nuevos Clientes</title>
</head>

<body onload="currentDay()">
    <!--seccion de encabezado-->
    <header>
        <h1 class="edgroup">
            ED Group & TFS Customs Brokers, Inc</h1>
        <h2>Recuersos Para Ingresar Nuevos Clientes</h2>


        <div class="top-left">
            <img src=" ../../assets/images/logo nuevo.jpg">
        </div>

        <div class="top-right">

            <h3> Welcome,
                <?php echo $_SESSION["fname"]; ?>!
            </h3>
            <p>
                <a href="../../logout.php">LOGOUT</a>
            </p>
        </div>
    </header>


    <!--secccion de recuersos-->

    <div class="flex-row" id="containerholder">

        <nav>
            <ul class=navigation>
                <li>
                    <a href="./clientes.php" class="btn lastlink" id="backbutton">Back / Regresar</a>
                </li>
                <h2 onclick="showHide('section1')" class="btn btn-success btn-block section-title">Proceso General</h2>
                <div class="section " id="section1">
                    <li>
                        <h3 onclick="showHide('content1')" class="links">Video de Proceso General ▼</h3>
                        <div class="content" id="content1">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/Ag9g6Xzo5sI"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <!-- <a class="btn btn-success btn-block" target="_blank" href="#" role="button" download> Download Video
                    </a> -->
                        </div>
                    </li>
                    <li>
                        <h3 onclick="showHide('content2')" class="links">PDF de Proceso General ▼</h3>
                        <div class="content" id="content2">
                            <embed src="../docs/Alta de Nuevo Clientes.pdf" width="500" height="375"
                                type="application/pdf">
                            <a class="btn btn-success btn-block" target="_blank"
                                href="../docs/Alta de Nuevo Clientes.pdf" download>Download PDF
                            </a>
                        </div>
                    </li>
                </div>
                <h2 onclick="showHide('section2')" class="btn btn-success btn-block section-title">Carta Poder (Power of
                    Attorney)</h2>
                <div class="section" id="section2">
                    <li>
                        <h3 onclick="showHide('content3')" class="links"> PDF Power of Attorney ▼</h3>
                        <div class="content" id="content3">
                            <embed src="../docs/Power of Attorney CHB.pdf" width="500" height="375"
                                type="application/pdf">
                            <a class="btn btn-success btn-block" target="_blank"
                                href="../docs/Power of Attorney CHB.pdf" download>Download PDF
                            </a>
                        </div>
                    </li>

                    <li>
                        <h3 onclick="showHide('content4')" class="links">PDF Curso Power Of Attorney ▼</h3>
                        <div class="content" id="content4">
                            <embed src="../docs/CURSO POWER OF ATTORNEY.pdf" width="500" height="375"
                                type="application/pdf">
                            <a class="btn btn-success btn-block" target="_blank"
                                href="../docs/CURSO POWER OF ATTORNEY.pdf" download>Download PDF
                            </a>
                        </div>
                    </li>
                </div>
                <h2 onclick="showHide('section3')" class="btn btn-success btn-block section-title">Consultar Importador
                    (Query importer)</h2>
                <div class="section" id="section3">
                    <li>
                        <h3 onclick="showHide('content5')" class="links">Consultar Numero de Importador▼</h3>
                        <div class="content" id="content5">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/fuaAcRuRQRs"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <!-- <a class="btn btn-success btn-block" target="_blank" href="#" role="button" download> Download Video
                    </a> -->
                        </div>
                    </li>
                </div>
                <h2 onclick="showHide('section4')" class="btn btn-success btn-block section-title">Forma 5106 Alta o
                    cambios de Importador</h2>
                <div class="section" id="section4">

                    <li>
                        <h3 onclick="showHide('content6')" class="links">PDF 5106 ▼</h3>
                        <div class="content" id="content6">
                            <embed src="../docs/CBP Form 5106.pdf" width="500" height="375" type="application/pdf">
                            <a class="btn btn-success btn-block" target="_blank" href="../docs/CBP Form 5106.pdf"
                                download>Download PDF
                            </a>
                        </div>
                    </li>
                    <li>
                        <h3 onclick="showHide('content7')" class="links">Video 5106 en ACE llenado y transimision ▼</h3>
                        <div class="content" id="content7">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/83IJQgyUGpw"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <!-- <a class="btn btn-success btn-block" target="_blank" href="#" role="button" download> Download Video
                    </a> -->
                        </div>
                    </li>
                </div>
                <h2 onclick="showHide('section5')" class="btn btn-success btn-block section-title">Fianza Sencilla
                    (Single Entry Bond)</h2>
                <div class="section" id="section5">
                    <li>
                        <h3 onclick="showHide('content8')" class="links">Tramitar Fianza Sencilla▼</h3>
                        <div class="content" id="content8">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/fzaWLD-8e1w"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <!-- <a class="btn btn-success btn-block" target="_blank" href="#" role="button" download> Download Video
                    </a> -->
                        </div>
                    </li>
                </div>

                <h2 onclick="showHide('section9')" class="btn btn-success btn-block section-title">C-TPAT</h2>
                <div class="section" id="section9">
                    <li>
                        <h3 onclick="showHide('content9')" class="links">Cuestionario de Seguridad▼</h3>
                        <div class="content" id="content9">
                            <embed src="../docs/Business Partner Survey 2022.pdf" width="500" height="375"
                                type="application/pdf">
                            <a class="btn btn-success btn-block" target="_blank"
                                href="../docs/Business Partner Survey 2022.pdf" download>Download PDF
                            </a>
                        </div>
                    </li>
                </div>












            </ul>
        </nav>

    </div>
    </section>



    <!--secccion ligas de api-->

    <script src="../../assets/js/script.js"></script>
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