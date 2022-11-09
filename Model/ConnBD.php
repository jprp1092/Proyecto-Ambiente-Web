<?php

    function OpenDB()
    {
        return mysqli_connect("127.0.0.1:3308", "root", "", "sistemaacademico");
    }

    function CloseDB($enlace)
    {
        mysqli_close($enlace);
    }

?>