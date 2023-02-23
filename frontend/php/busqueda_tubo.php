<!DOCTYPE html>
<html>
<head>
  <title>SADS TUBACERO</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/pagina_principal.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <script src="../js/busqueda/descarga_reportes_tubo.js"></script>
</head>
<body>

    <div class="bgimg w3-display-container w3-animate-opacity">
        <div class="w3-display-middle">
            <p class="w3-center"><img src="../img/logo-1.png" class="w3-animate-top" style="width:20%"></p>
            <h1 class="w3-xxlarge w3-animate-top w3-text-white w3-center">SADS</h1>
            <p class="w3-large w3-center">Sistema de Adquisición de Datos de Soldadura</p>
   
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                <panel class="w3-container w3-padding">
                    <div class="w3-section w3-padding">
                        <label><b>No. de tubo</b></label>
                        <input class="w3-padding w3-input w3-border w3-margin-bottom" type="text" placeholder="No. de tubo" id="No_tubo" required>
                        <button type="button" class="w3-button w3-block  w3-blue w3-section w3-padding" onclick="descarga_reportes()">Buscar reportes</button>
                    </div>
                </panel>
                <div class="w3_section" id="links_descarga">

                </div>
            </div>

        </div>
    </div>
    <!-- Footer -->
    <footer class="w3-display-bottomleft w3-padding-large">
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>
</body>
</html>