<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Contact</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    include '../../Connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Name = $_POST["Name"];
        $Email = $_POST["Email"];
        $Subject = $_POST["Subject"];
        $Message = $_POST["Message"];

        $query = "SELECT * FROM contact WHERE Email = ?";
        $stmt = mysqli_prepare($c, $query);
        mysqli_stmt_bind_param($stmt, "s", $Email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $num = mysqli_num_rows($result);

        if ($num == 0) {
            $insert_query = "INSERT INTO contact(Name, Email, Subject, Message) VALUES (?, ?, ?, ?)";
            $insert_stmt = mysqli_prepare($c, $insert_query);
            mysqli_stmt_bind_param($insert_stmt, "ssss", $Name, $Email, $Subject, $Message);
            mysqli_stmt_execute($insert_stmt);

            mysqli_stmt_close($stmt);
            mysqli_stmt_close($insert_stmt);
            mysqli_close($c);

            header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashContact.php');
            exit();
        } else {
            echo("Contact already exists<br>");
            header('Refresh: 2; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashContact.php');
            exit();
        }
    }
    ?>
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">
            <span class="popup-close" onclick="closePopup()">&times;</span>
            <h3>Add Contact</h3>
            <form id="contactForm" method="POST" action="">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="Name" name="Name" required>
                </div>
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="text" id="Email" name="Email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="Subject" name="Subject" required>
                </div>
                <div class="form-group">
                    <label for="Message">Message:</label>
                    <input type="text" id="Message" name="Message" required>
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