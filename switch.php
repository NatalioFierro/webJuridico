<?php
$conn = mysqli_connect("localhost", "ruvik", "62825460139", "ruvik");
//$conn   = mysqli_connect("localhost", "root", "62825460139", "test1");
$info = json_decode(file_get_contents("php://input"));

    $switch      = mysqli_real_escape_string($conn, $info->switch);
         
    $btn_name = $info->btnName;

        $query = "DELETE * FROM cambiar";
        $query = "INSERT INTO cambiar(switch) VALUES ('$switch')";
        if (mysqli_query($conn, $query)) {
            echo "Enviado Exitosamente...";
        } else {
            echo 'Ocurrio un error :(';
          
            
        }
    
   

?>