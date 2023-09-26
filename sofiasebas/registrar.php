<?php
// Verifica si se han enviado datos desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $username = $_POST["username"];
    $username = $_POST["username"];
    $username = $_POST["username"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Realiza la validación de los datos
    $errores = [];

    // Validación del nombre de usuario (ejemplo: al menos 5 caracteres)
    if (strlen($username) < 5) {
        $errores[] = "El nombre de usuario debe tener al menos 5 caracteres.";
    }

    // Validación del correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Correo electrónico no válido.";
    }

    // Puedes agregar más validaciones aquí, como la contraseña

    // Si no hay errores, puedes almacenar los datos en una base de datos
    if (empty($errores)) {
        // Conexión a la base de datos y almacenamiento de datos aquí
        // Por ejemplo:
        // $conexion = new mysqli("localhost", "usuario", "contraseña", "basededatos");
        // $query = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$password')";
        // $conexion->query($query);
        // Cerrar la conexión, manejar errores, etc.
        
        echo "Registro exitoso. ¡Bienvenido, $username!";
    } else {
        // Si hay errores, muestra los mensajes de error
        foreach ($errores as $error) {
            echo $error . "<br>";
        }
    }
} else {
    echo "Acceso no autorizado.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <style>
       @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

body {
  background: #456;
  font-family: 'Open Sans', sans-serif;
}

.login {
  width: 400px;
  margin: 16px auto;
  font-size: 16px;
}

/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

/* The triangle form is achieved by a CSS hack */
.login-triangle {
  width: 0;
  margin-right: auto;
  margin-left: auto;
  border: 12px solid transparent;
  border-bottom-color: #F27F3D;
}

.login-header {
  background: #F27F3D;
  padding: 20px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
}

.login-container {
  background: #ebebeb;
  padding: 12px;
}

/* Every row inside .login-container is defined with p tags */
.login p {
  padding: 12px;
}

.login input {
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 16px;
  outline: 0;
  font-family: inherit;
  font-size: 0.95em;
}

.login input[type="email"],
.login input[type="password"] {
  background: #fff;
  border-color: #bbb;
  color: #555;
}

/* Text fields' focus effect */
.login input[type="email"]:focus,
.login input[type="password"]:focus {
  border-color: #888;
}

.login input[type="submit"] {
  background: #F27F3D;
  border-color: transparent;
  color: #fff;
  cursor: pointer;
}

.login input[type="submit"]:hover {
  background: #333;
}

/* Buttons' focus effect */
.login input[type="submit"]:focus {
  border-color: #05a;
}
    </style>


</head>

<body>

<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Registrate Aqui</h2>
<form class="login-container" action="Post">
  <p><input type="text" placeholder="Nombre Cliente" class="form-control" name="nombreCliente" id="exampleInputName" ></p>
  <p> <input type="text" placeholder="Apellido Cliente" class="form-control" name="apellidoCliente" id="exampleInputLastName" ></p>
  <p><input type="text" placeholder="Numero Contacto" class="form-control" name="numeroContacto" id="exampleInputNumber" ></p>
  <p><input type="text" placeholder="Genero" class="form-control" name="genero" id="genero" ></p>
  <p><input type="email"  placeholder="Correo Electronico" class="form-control" name="correoElectronico" id="exampleInputEmail1" aria-describedby="emailHelp"></p>
    <p><input type="password" placeholder="Contraseña" class="form-control"  name="Contraseña" id="contra" ></p>
    <p><input type="submit" name="regis" value="Registrarse"></p>
  </form>
</div>
</body>
</html>
