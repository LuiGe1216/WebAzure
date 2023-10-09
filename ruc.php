<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de RUC</title>
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

        #ruc {
            width: 80%;
            padding: 10px;
            margin: 0 auto;
            display: block;
        }

        #pruebaruc {
            display: block;
            margin: 20px auto;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        #pruebaruc:hover {
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

<h1>Consulta de RUC</h1>

<a href="index.php">Consulta DNI</a>

<input type="text" autocomplete="off" id="ruc" name="ruc">
<button id="pruebaruc">Consultar</button>

<div>RUC: <span id="rucNumero"></span></div>
<div>Nombre o Razón social: <span id="razonsocial"></span></div>
<div>Estado: <span id="estado"></span></div>
<div>Dirección: <span id="direccion"></span></div>
<div>Departamento: <span id="departamento"></span></div>

<script>
$(document).ready(function() {
    $("#pruebaruc").click(function() {
        var ruc = $("#ruc").val();
        $.ajax({
            type: "POST",
            url: "consultar-ruc-ajax.php",
            data: 'ruc=' + ruc,
            dataType: 'json',
            success: function(data) {
                if (data == 1) {
                    alert('El RUC debe tener 11 dígitos');
                } else {
                    console.log(data);
                    $("#rucNumero").html(data.numeroDocumento);
                    $("#razonsocial").html(data.nombre);
                    $("#estado").html(data.estado);
                    $("#direccion").html(data.direccion);
                    $("#departamento").html(data.departamento);
                }
            }
        });
    });
});
</script>
</body>
</html>
