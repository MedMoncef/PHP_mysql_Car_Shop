<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'gestion film';

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn)
{
    die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
}

if (isset($_GET['iduser']))
{
    $iduser = $_GET['iduser'];
    $sql = "DELETE FROM user WHERE iduser=$iduser";
    if ($conn->query($sql) === true)
    {
        echo "Merci, User id $iduser a bien ete supprime";
?>
			<script>
						alert("Merci, User id <?php $iduser ?> a bien ete supprime");
			</script>
			<?php
        header('refresh: 0; http://127.0.0.1:8888/www/Gestion%20TP/Gestion_Film/poject/src/concept-master/pages/liste/user/user.php');
    }
    else
    {
        echo "Erreur lors de la suppression de l'étudiant: " . $conn->error;
    }
    $conn->close();
}

?>
