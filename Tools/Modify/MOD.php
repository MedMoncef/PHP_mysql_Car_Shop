<?php
session_start();

function displayAlert($message, $type = "info") {
    ?>
    <script>
        alert("<?php echo $message; ?>");
    </script>
    <?php
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idvoiture = $_SESSION['profile_id'];
    $Name = $_POST["Name"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    // Hash the password
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    // Image upload
    $file = $_FILES['profile_image'];
    $filename = $file['name'];
    $tmp_name = $file['tmp_name'];
    $imageType = $file['type'];
    
    // Validate the image type
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($imageType, $allowedTypes)) {
        displayAlert("Invalid image type. Allowed types: JPEG, PNG, GIF", "error");
        header('Refresh: 0; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/profile.php');
        exit;
    }

    include '../../Tools/Dashboard/Connect.php';

    $requete = "SELECT * FROM user WHERE UserId='$idvoiture';";
    $resultat = mysqli_query($c, $requete) or die("impossible d'executer la requete<br>");

    $Num = mysqli_num_rows($resultat);
    if ($Num == 0) {
        echo("<br>Voiture inexistante");
    } else {
        $requete = "UPDATE user SET Name='$Name', Email='$Email', Password='$hashedPassword', ImageName='$filename' WHERE UserId='$idvoiture';";
        $resultat = mysqli_query($c, $requete) or die("<br>erreur d'update<br>" . mysqli_error($c));

        $destination = $_SERVER['DOCUMENT_ROOT'] . '/projects/Gestion TP/Gestion_Film/Voitures/src/images/' . $filename;
        move_uploaded_file($tmp_name, $destination);

    }

    mysqli_close($c);

    echo "<script>alert('Profile updated successfully');</script>";
    header('Refresh: 0; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Tools/profile.php');
    exit();
}
?>