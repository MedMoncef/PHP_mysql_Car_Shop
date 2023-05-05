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

if (isset($_GET['codef']))
{
    $codef = $_GET['codef'];
    $sql = "DELETE FROM film WHERE idFilm=$codef";
    if ($conn->query($sql) === true)
    {
?>
			<script>
						alert("Merci, Livre <?php $codef ?> a bien ete supprime");
			</script>
			<?php
        header('refresh: 0; http://127.0.0.1:8888/www/Gestion%20TP/Gestion_Film/poject/src/concept-master/pages/liste/livre/livre.php');
    }
    else
    {
        echo "Erreur lors de la suppression de livre: " . $conn->error;
    }
    $conn->close();
}

?>
