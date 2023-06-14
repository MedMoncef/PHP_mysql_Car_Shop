<?php
session_start();
function displayAlert($message, $type = "info") {
    ?>
    <script>
        alert("<?php echo $message; ?>");
    </script>
    <?php
}
//ou extract($_POST);
$Name=$_POST["Name"];
$Email=$_SESSION['Email'];
$Subject=$_POST["Subject"];
$Message=$_POST["Message"];

include '../../Tools/Dashboard/Connect.php';

$requete="select * from contact where Email='$Email';" ;

$resultat=mysqli_query($c,$requete) or die ("impossible d'executer la requete<br>");

$Num=mysqli_num_rows($resultat);

if($Num==0)

 {$requete= "insert into contact(Name,Email,Subject,Message) values ('$Name','$Email','$Subject','$Message');";

    $resultat=mysqli_query ($c, $requete) or die ("erreur d'insertion<br>". mysqli_error($c));
    
    displayAlert("Message envoyé", "error");
    header('Refresh: 0; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/Home.php');


}else {
    displayAlert("L'e-mail a déjà envoyé un message", "error");
    header('Refresh: 0; http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/contect.php');
}
?>