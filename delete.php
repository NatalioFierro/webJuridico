<?php
//$conn = mysqli_connect("localhost", "id6413420_draven", "62825460139", "id6413420_casamiento");
$conn   = mysqli_connect("localhost", "root", "62825460139", "test1");
$data    = json_decode(file_get_contents("php://input"));

    $id     = $data->id;
    $query = "DELETE FROM catalogo WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo 'Borrado Exitosamente...';
    } else {
        echo 'Ocurrio un error :(';
    }

?>