<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "acme";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

   // Datos del conductor
$cedula = $_post['cedula'];
$primer_nombre = $_post['primer_nombre'];
$segundo_nombre= $_post['segundo_nombre'];
$apellidos = $_post['apellidos'];
$direccion= $_post['direccion'];
$telefono = $_post['telefono'];
$ciudad = $_post['ciudad'];

 $sql_conductor = "INSERT INTO conductores (cedula, primer_nombre, segundo_nombre, apellidos, direccion, telefono, ciudad)
 VALUES ('$cedula', '$primer_nombre', '$segundo_nombre', '$apellidos', '$direccion', '$telefono', '$ciudad')";
  $conn->query($sql_conductor);
   $conductor_id = $conn->insert_id;

    // Datos del propietario
 $cedula = $_post['cedula'];
$primer_nombre = $_post['primer_nombre'];
$segundo_nombre = $_post['segundo_nombre'];
$apellidos= $_post['apellidos'];
$direccion = $_post['direccion'];
$telefono = $_post['telefono'];
$ciudad = $_post['ciudad'];

$sql_propietario = "INSERT INTO propietarios (cedula, primer_nombre, segundo_nombre, apellidos, direccion, telefono, ciudad)
VALUES ('$cedula', '$primer_nombre', '$segundo_nombre', '$apellidos', '$direccion', '$telefono', '$ciudad')";
 $conn->query($sql_propietario);
 $propietario_id = $conn->insert_id;



// Datos del vehículo
$placa = $_post['placa'];
$color = $_post['color'];
$marca = $_post['marca'];
$tipo_vehiculo = $_post['tipo_vehiculo'];

$sql_vehiculo = "INSERT INTO vehiculos (placa, color, marca, tipo_vehiculo,conductor_id, propietario_id)
VALUES ('$placa', '$color', '$marca', '$tipo_vehiculo','$conductor_id', '$propietario_id')";

if ($conn->query($sql_vehiculo) === TRUE) {
    echo "Datos registrados correctamente.";
} else {
    echo "Error: " . $sql_vehiculo . "<br>" . $conn->error;
}

$conn->close();
?>