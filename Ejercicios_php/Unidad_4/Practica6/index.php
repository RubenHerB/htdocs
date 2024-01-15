<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="estilos.css">
    <script type="text/javascript">
        function aumentar(id) {
            document.getElementById(id).value++;
        }

        function reducir(id) {
            var n=document.getElementById(id).value;
            if(n>0){
                n--;
            }
        }
    </script>
</head>
<body>
<button class="btn" onclick="reducir('b1')">-</button>
<input type="number" min="0" value="0" id="b1">
<button class="btn" onclick="aumentar('b1')">+</button>
</body>
</html>