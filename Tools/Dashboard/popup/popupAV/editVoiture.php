<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modifier Voiture</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">
            <h3>Modifier Voiture</h3>

            <?php
            include '../../Connect.php';
            $idVoiture = $_GET['IdV'];
            $sql = "SELECT * FROM voitures WHERE IdV = '$idVoiture'";
            $result = mysqli_query($c, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>

            <form method="POST" action="updateVoiture.php">
                <input type="hidden" name="IdV" value="<?php echo $idVoiture; ?>">
              
                <div class="form-group">
                    <label for="NomVM">Nom de Voiture:</label>
                    <input type="text" id="NomVM" name="NomVM" value="<?php echo $row['Voitures']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="PrixVM">Prix de Voiture:</label>
                    <input type="number" id="PrixVM" name="PrixVM" value="<?php echo $row['Prix']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="descVM">Description:</label>
                    <input type="text" id="descVM" name="descVM" value="<?php echo $row['Description']; ?>" required>
                </div>
                <div class="form-group">
                    <button type="submit">Submit</button>
                    <button type="reset">Annuler</button>
                    <button type="button" onclick="goBack()">Go Back</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Include necessary JS -->
    <script>
        function goBack() {
            window.history.back();
        }

        // Show the popup when the page loads
        document.getElementById("popupOverlay").style.display = "flex";
    </script>
</body>

</html>
