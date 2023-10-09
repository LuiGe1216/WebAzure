<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de DNI</title>
    <script src="js/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            margin: 0;
        }

        a {
            display: block;
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
            text-decoration: none;
            color: #007bff;
        }

        #dni {
            width: 80%;
            padding: 10px;
            margin: 0 auto;
            display: block;
        }

        #consultar {
            display: block;
            margin: 20px auto;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        #consultar:hover {
            background-color: #0056b3;
        }

        div {
            text-align: center;
            margin-top: 10px;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Consulta de DNI</h1>

<a href="ruc.php">Consulta RUC</a>

<input type="text" id="dni" autocomplete="off" name="dni">
<button id="consultar">Consultar</button>

<div>Nombres: <span id="nombre"></span></div>
<div>Apellido P.: <span id="apellidop"></span></div>
<div>Apellido M.: <span id="apellidom"></span></div>

<script>
$(document).ready(function() {
    $("#consultar").click(function() {
        var dni = $("#dni").val();
        $.ajax({
            type: "POST",
            url: "consulta-dni-ajax.php",
            data: 'dni=' + dni,
            dataType: 'json',
            success: function(data) {
                if (data == 1) {
                    alert('El DNI debe tener 8 dígitos');
                } else {
                    console.log(data);
                    $("#nombre").html(data.nombres);
                    $("#apellidop").html(data.apellidoPaterno);
                    $("#apellidom").html(data.apellidoMaterno);
                }
            }
        });
    });
});
</script>
</body>
</html>
