<?php
//$conn = mysqli_connect("localhost", "ruvik", "62825460139", "ruvik");
$conn   = mysqli_connect("localhost", "root", "62825460139", "test1");
$output = array();

$query  = "SELECT * FROM cambiar";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $output = 0;
    echo $output;
}else{
    $output = 1;
    echo  $output;
}
?> 