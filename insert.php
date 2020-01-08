<?php
//$conn = mysqli_connect("localhost", "id6413420_draven", "1234567890", "id6413420_casamiento");
$conn   = mysqli_connect("localhost", "root", "62825460139", "test1");
$info = json_decode(file_get_contents("php://input"));

    $nombre      = mysqli_real_escape_string($conn, $info->nombre);
    $email     = mysqli_real_escape_string($conn, $info->email);
    $telefono    = mysqli_real_escape_string($conn, $info->telefono);
    $mensaje = mysqli_real_escape_string($conn, $info->mensaje);      
    $btn_name = $info->btnName;

    if ($btn_name == "Enviar") {
        $query = "INSERT INTO estudio(nombre, email, telefono, mensaje) VALUES ('$nombre', '$email', '$telefono', '$mensaje')";
        if (mysqli_query($conn, $query)) {
            echo "Enviado Exitosamente...";
        } else {
            echo 'Ocurrio un error :(';
          
            
        }
    }
    if ($btn_name == 'Update') {
        $id    = $info->id;
        $query = "UPDATE casamiento SET nombre = '$nombre', familia = '$familia', invitado = '$invitado', menu = '$elegido', mensaje = '$mensaje' WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            echo 'Actualizado Exitosamente...';
        } else {
            echo 'Ocurrio un error :(';
        }
    }

?>