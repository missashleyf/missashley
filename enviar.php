<?php
//Datos de conexion a la base de datos
$servername = "localhost";
$username = "root";  //Usarios de MySql
$password = ""; //Conatseña de MYSQL
$dbmane = "web";

//Crear la conexion a la base de datos 
$conn = new mysql($servername, $username, $password, $dbmane);

//Verificar la conexion
If ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//Verificar si el formulario fue enviado
If ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    //Insertar los datos en la tabla
    $sql = "INSERT INTO contactos ( nombre, email, ausnto. mensaje) VALUES ('$nombre', '$email', '$asunto', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        //Redirigir de nuevo al formulario con parametro de éxito
        header("Location: contactame.html?status=success");

    } else {
        //Redirigir de nuevo al formulario con parametro de error
        header("Location: contactame.html?status=error");
    }

    //Cerrar la conexión
    $conn->close();
    exit();
}
?>