<?php 



if(isset($_POST["btnCerrar"]))
{
    if (session_status() != PHP_SESSION_NONE)
        session_destroy();

    header("Location: ..\index.php");
}

?>

