<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Voiture</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    include '../../Connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $NomV = $_POST["NomV"];
        $PrixV = $_POST["PrixV"];
        $descV = $_POST["descV"];

        $query = "SELECT * FROM voitures WHERE Voitures = ?";
        $stmt = mysqli_prepare($c, $query);
        mysqli_stmt_bind_param($stmt, "s", $NomV);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $num = mysqli_num_rows($result);

        if ($num == 0) {
            $insert_query = "INSERT INTO voitures(Voitures, Prix, Description) VALUES (?, ?, ?)";
            $insert_stmt = mysqli_prepare($c, $insert_query);
            mysqli_stmt_bind_param($insert_stmt, "sss", $NomV, $PrixV, $descV);
            mysqli_stmt_execute($insert_stmt);

            mysqli_stmt_close($stmt);
            mysqli_stmt_close($insert_stmt);
            
            mysqli_close($c);
            
            header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashVoiture.php');
            exit();
        } else {
            echo "Voiture already exists.<br>";
            header('Refresh: 2; URL=http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashVoiture.php');
            exit();
        }
    }
    ?>
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">
            <h3>Ajouter Voiture</h3>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="NomV">Nom de Voiture:</label>
                    <input type="text" id="NomV" name="NomV" required>
                </div>
                <div class="form-group">
                    <label for="PrixV">Prix de Voiture:</label>
                    <input type="number" id="PrixV" name="PrixV" required>
                </div>
                <div class="form-group">
                    <label for="descV">Description:</label>
                    <input type="text" id="descV" name="descV" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="submit-button">Submit</button>
                    <button type="reset" class="cancel-button">Annuler</button>
                    <button type="button" class="back-button" onclick="goBack()">Go Back</button>
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
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("popupOverlay").style.display = "flex";
        });
    </script>
</body>

</html>