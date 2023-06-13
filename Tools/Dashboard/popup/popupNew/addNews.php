<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Newsletter</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    include '../../Connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $NomVM = $_POST["NomV"];

        $query = "SELECT * FROM newsletter WHERE Email = ?";
        $stmt = mysqli_prepare($c, $query);
        mysqli_stmt_bind_param($stmt, "s", $NomVM);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $num = mysqli_num_rows($result);

        if ($num == 0) {
            $insert_query = "INSERT INTO newsletter(Email) VALUES (?)";
            $insert_stmt = mysqli_prepare($c, $insert_query);
            mysqli_stmt_bind_param($insert_stmt, "s", $NomVM);
            mysqli_stmt_execute($insert_stmt);

            mysqli_stmt_close($stmt);
            mysqli_stmt_close($insert_stmt);
            mysqli_close($c);

            header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashNewsletter.php');
            exit();
        } else {
            echo("Newsletter already exists<br>");
            header('Refresh: 2; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashNewsletter.php');
            exit();
        }
    }
    ?>
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">
            <span class="popup-close" onclick="closePopup()">&times;</span>
            <h3>Add Newsletter</h3>
            <form id="contactForm" method="POST" action="">
                <div class="form-group">
                    <label for="name">Email:</label>
                    <input type="text" id="NomV" name="NomV" required>
                </div>
                <div class="form-group">
                    <button type="submit">Submit</button>
                    <button type="reset">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Include necessary JS -->
    <script>
        function closePopup() {
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