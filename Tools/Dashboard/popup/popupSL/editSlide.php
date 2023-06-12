<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Slider</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">
            <h3>Update Slider</h3>

            <?php
            include '../../Connect.php';
            $idVslide = $_GET['IdVslide'];
            $sql = "SELECT * FROM slidev WHERE IdVslide = '$idVslide'";
            $result = mysqli_query($c, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>

            <!-- Specify the PHP script to handle the form submission -->
            <form method="POST" action="updateSlide.php">
                <input type="hidden" name="IdVslide" value="<?php echo $idVslide; ?>">
                
                <div class="form-group">
                    <label for="NomV">Nom de Voiture:</label>
                    <input type="text" id="NomV" name="NomV" value="<?php echo $row['NomVS']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="descV">Description:</label>
                    <input type="text" id="descV" name="descV" value="<?php echo $row['DescVS']; ?>" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="submit-button">Submit</button>
                    <button type="reset" class="cancel-button">Cancel</button>
                    <button type="button" class="back-button" onclick="goBack()">Go Back</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Include necessary JS -->
    <script>
        function closePopupMOD() {
            document.getElementById("popupOverlay").style.display = "none";
        }

        function goBack() {
            window.history.back();
        }

        // Show the popup when the page loads
        document.getElementById("popupOverlay").style.display = "flex";
    </script>
</body>

</html>