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

//Funciones de InactivarUsuario

$(document).on("click", ".open-UserDialog", function () {
    var UsuarioCedula = $(this).data('cedula');
    $("#cedula").val(UsuarioCedula);
});

function InactivarUsuario()
{
    $.ajax({
        url:"../Controller/UsuariosController.php",
        type:"POST",
        data: { 
                "InactivarUsuario" : "InactivarUsuario", 
                "Cedula" : document.getElementById("cedula").value 
              },
        success:function(data){
            window.location.href = "Usuarios.php";
        },
        error:function(data){
            window.location.href = "Usuarios.php";
        }
    });

}