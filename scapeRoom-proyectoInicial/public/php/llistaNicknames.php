<?php

usleep(250000);

$servername = "127.0.0.1";
$username = "root";
$password = "root123";
$database = "scaperoom";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nickBuscar = isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";

$coincidencias = "";
$igual = false;

if (trim($nickBuscar) != "") {
    $nickBuscar = strtolower($nickBuscar);
    $llargada = strlen($nickBuscar);

    $sql = "SELECT email FROM users"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nick = $row["email"];
            
            if (stristr($nickBuscar, substr($nick, 0, $llargada))) {
                if ($coincidencias === "") {
                    $coincidencias = $nick;
                } else {
                    $coincidencias .= ", $nick";
                }
            }

            if (strcmp($nickBuscar, strtolower($nick)) == 0) {
                $igual = true;
            }
        }
    }
}

if ($igual) {
    echo 1; 
} else if ($coincidencias == "") {
    echo 2; 
} else {
    echo $coincidencias; 
}

$conn->close();



?>
