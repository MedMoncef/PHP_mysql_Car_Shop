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

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "DELETE FROM contact WHERE id=$id";
    if ($conn->query($sql) === true)
    {
?>
			<script>
						alert("Merci, Message Numéro <?php $id ?> a bien ete supprime");
			</script>
			<?php
        header('refresh: 0; http://127.0.0.1:8888/www/Gestion%20TP/Gestion_Film/poject/src/concept-master/pages/liste/contact/contact.php');
    }
    else
    {
        echo "Erreur lors de la suppression de livre: " . $conn->error;
    }
    $conn->close();
}

?>
