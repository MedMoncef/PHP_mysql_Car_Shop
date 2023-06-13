<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Contact</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">
        <span class="popup-close" onclick="closePopupMOD()">&times;</span>
        <h3>Update Contact</h3>
        <?php
        include '../../Connect.php';
        $IdContact = $_GET['IdContact'];
        $sql = "SELECT * FROM contact WHERE IdContact = '$IdContact'";
        $result = mysqli_query($c, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <form id="contactForm" method="POST" action="updateContact.php">
            <input type="hidden" name="IdContact" value="<?php echo $IdContact; ?>">
            <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" id="Name" name="Name" value="<?php echo $row['Name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="text" id="Email" name="Email" value="<?php echo $row['Email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="Subject">Subject:</label>
                <input type="text" id="Subject" name="Subject" value="<?php echo $row['Subject']; ?>" required>
            </div>
            <div class="form-group">
                <label for="Message">Message:</label>
                <input type="text" id="Message" name="Message" value="<?php echo $row['Message']; ?>" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
                <button type="reset">Annuler</button>
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