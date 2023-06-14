<?php
// Start the session
session_start();

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

// Clear the cookie
setcookie("user_session", "", time() - 3600);

header('Location: http://127.0.0.1/projects/Gestion%20TP/Gestion_Film/Voitures/index.php');
exit;
?>