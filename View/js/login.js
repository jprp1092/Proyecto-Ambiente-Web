$(document).ready(function() {
    HabilitarBoton(true);
});

function ValidarDatos() {
    let identificacion = $("#txtIdentificacion").val().trim();

    if (identificacion != "") {

        $.ajax({
            type: "GET",
            url: 'https://apis.gometa.org/cedulas/' + identificacion,
            data: { },
            datatype: 'json',
            success: function(response)
            {
                if (response.resultcount == undefined || response.resultcount == 0) {
                    HabilitarBoton(true);
                }
                else {
                    HabilitarBoton(false);
                }
            }
       });

    }
}

function HabilitarBoton(flag)
{
    $("#btnIngresar").prop("disabled", flag);
}



