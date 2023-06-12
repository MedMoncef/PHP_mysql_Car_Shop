<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add User</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <?php
    include '../../Connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST["Name"];
        $email = $_POST["Email"];
        $password = $_POST["Password"];
        $type = $_POST["Type"];

        $query = "SELECT * FROM user WHERE Email = ?";
        $stmt = mysqli_prepare($c, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $num = mysqli_num_rows($result);

        if ($num == 0) {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $insert_query = "INSERT INTO user(Name, Email, Password, Type) VALUES (?, ?, ?, ?);";
            $insert_stmt = mysqli_prepare($c, $insert_query);
            mysqli_stmt_bind_param($insert_stmt, "ssss", $name, $email, $hashed_password, $type);
            mysqli_stmt_execute($insert_stmt);

            header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashUsers.php');
            exit();
        } else {
            echo("User already exists <br>");
            header('Refresh: 2; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/Dashboard/DashUsers.php');
            exit();
        }
    }
    ?>
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">

    <h3>Add User</h3>
            <form method="POST" action="">
                <input type="hidden" name="UserId">
                
                <div class="form-group">
                    <label for="Name">Name:</label>
                    <input type="text" id="Name" name="Name" required>
                </div>
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="text" id="Email" name="Email" required>
                </div>
                <div class="form-group">
                    <label for="Password">Password:</label>
                    <input type="text" id="Password" name="Password" required>
                </div>
                <div class="form-group">
                    <label for="Type">Type:</label>
                    <input type="text" id="Type" name="Type" required>
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