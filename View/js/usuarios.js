onload = CargarClave();

function CargarClave()
{
    document.getElementById("txtConfirmarContrasenna").value = document.getElementById("txtContrasenna").value;
}

function LimpiarDatos()
{
    document.getElementById("txtConfirmarContrasenna").value = "";
}

function CompararClaves()
{
    let claveOriginal = $("#txtContrasenna").val(); 
    let claveConfirmada = $("#txtConfirmarContrasenna").val();

    if(claveOriginal.trim() == claveConfirmada.trim())
    {
        return true;
    }

    alert("Verifique la clave de acceso");
    return false;
}