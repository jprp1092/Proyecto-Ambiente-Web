<?php

    function OpenDB()
    {
        return mysqli_connect("127.0.0.1:3307", "root", "", "sistemaacademico");
    }

    function CloseDB($enlace)
    {
        mysqli_close($enlace);
    }

?>