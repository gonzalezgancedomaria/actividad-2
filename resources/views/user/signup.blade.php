<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Registro</h2>
        <div class="row justify-content-center mt-4">
            @csrf
            <form id="signup" name="signup" method="POST" enctype="multipart/form-data" action="{{route('user.store')}}">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required><br><br>
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" required><br><br>
                </div>

                <div class="form-group">
                    <label for="DNI">DNI:</label>
                    <input type="text" id="DNI" name="DNI" required><br><br>
                </div>

                <div class="form-group">
                    <label for="correo">Email:</label>
                    <input type="email" id="email" name="email" required><br><br>
                </div>

                <div class="form-group">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="password" name="password" required><br><br>
                </div>

                <div class="form-group">
                    <label for="telefono">Telefono:</label>
                    <input type="text" id="telefono" name="telefono" required><br><br>
                </div>

                <div class="form-group">
                    <label for="pais">Pais:</label>
                    <input type="text" id="pais" name="pais" required><br><br>
                </div>

                <div class="form-group">
                    <label for="IBAN">IBAN:</label>
                    <input type="text" id="IBAN" name="IBAN" required><br><br>
                </div>

                <div class="form-group">
                    <label for="sobreTi">Sobre:</label>
                    <input type="text" id="sobreTi" name="sobre-ti" required><br><br>
                </div>

                <button type="submit" name="signup" class="btn btn-primary">
                    Registrarse
                </button>

            </form>
        </div>
    </div>

    <?php
    // Procesar el formulario cuando se envía
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $DNI = $_POST["DNI"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $telefono = $_POST["telefono"];
        $pais = $_POST["pais"];+
        $IBAN = $_POST["IBAN"];
        $sobreTi = $_POST["sobreTi"];

        // Aquí deberías realizar validaciones y guardar los datos en la base de datos
        // Por ejemplo, puedes usar Laravel Eloquent para guardar los datos en la base de datos.

        // Ejemplo de validación de correo electrónico
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Correo electrónico no válido.";
        } else {
            // Ejemplo de guardar en la base de datos (esto es solo un ejemplo, usa Eloquent o un ORM real)
            // $usuario = new Usuario;
            // $usuario->nombre = $nombre;
            // $usuario->correo = $correo;
            // $usuario->contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
            // $usuario->save();
            
            echo "¡Registro exitoso!";
        }
    }
    ?>
</body>
</html>
