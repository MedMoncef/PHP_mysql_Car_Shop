<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Newsletter</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">
            <h3>Update Newsletter</h3>

            <?php
            include '../../Connect.php';
            $NL_ID = $_GET['NL_ID'];
            $sql = "SELECT * FROM newsletter WHERE NL_ID = '$NL_ID'";
            $result = mysqli_query($c, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>

            <!-- Specify the PHP script to handle the form submission -->
            <form method="POST" action="updateNews.php">
                <input type="hidden" name="NL_ID" value="<?php echo $NL_ID; ?>">
                
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="text" id="Email" name="Email" value="<?php echo $row['Email']; ?>" required>
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