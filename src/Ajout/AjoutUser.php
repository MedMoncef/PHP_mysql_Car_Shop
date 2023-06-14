<?php
$Name = $_POST["Name"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];
//image upload
session_start();

$file = $_FILES['profile_image'];
$filename = $file['name'];
$tmp_name = $file['tmp_name'];
$imageType = $file['type'];

// Validate the image type
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
if (!in_array($imageType, $allowedTypes)) {
    displayAlert("Invalid image type. Allowed types: JPEG, PNG, GIF", "error");
    header('Refresh: 0; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Register.php');
    exit;
}

//db connection
include '../../Tools/Dashboard/Connect.php';

$requete = "SELECT * FROM user WHERE Email='$Email';";

$resultat = mysqli_query($c, $requete) or die("Impossible d'exécuter la requête<br>");

$Num = mysqli_num_rows($resultat);

if ($Num == 0) {
    // Email validation
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        displayAlert("Invalid email address");
        header('Refresh: 0; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Register.php');
    } else {
        // Hash the password
        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

        $requete = "INSERT INTO user(Name, Email, Password, ImageName) VALUES ('$Name', '$Email', '$hashedPassword', '$filename');";

        $resultat = mysqli_query($c, $requete) or die("Erreur d'insertion<br>" . mysqli_error($c));

        $destination = $_SERVER['DOCUMENT_ROOT'] . '/projects/Gestion TP/Gestion_Film/Voitures/src/images/' . $filename;
        move_uploaded_file($tmp_name, $destination);

        displayAlert("Registration successful", "success");

        header('Refresh: 0; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/');
    }
} else {
    displayAlert("Email already exists", "error");

    header('Refresh: 0; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/');
}

// Function to display alert message
function displayAlert($message, $type = "info") {
    ?>
    <script>
        alert("<?php echo $message; ?>");
    </script>
    <?php
}
?>