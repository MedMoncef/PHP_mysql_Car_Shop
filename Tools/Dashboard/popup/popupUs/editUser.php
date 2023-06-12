<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update User</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">
            <h3>Update User</h3>

            <?php
            include '../../Connect.php';
            $userId = $_GET['UserId'];
            $sql = "SELECT * FROM user WHERE UserId = '$userId'";
            $result = mysqli_query($c, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>

            <!-- Specify the PHP script to handle the form submission -->
            <form method="POST" action="updateUser.php">
                <input type="hidden" name="UserId" value="<?php echo $userId; ?>">
                
                <div class="form-group">
                    <label for="Name">Name:</label>
                    <input type="text" id="Name" name="Name" value="<?php echo $row['Name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="text" id="Email" name="Email" value="<?php echo $row['Email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Password">Password:</label>
                    <input type="text" id="Password" name="Password" value="<?php echo $row['Password']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Type">Type:</label>
                    <input type="text" id="Type" name="Type" value="<?php echo $row['Type']; ?>" required>
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