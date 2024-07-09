<?php

$query_string = http_build_query($_GET);
$url = "https://www.google.com/search?{$query_string}" ;

// Iniciar una nueva sesión cURL
$ch = curl_init($url);

// Configurar opciones de cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la petición
$response = curl_exec($ch);

if ($response === false) {
    // Hubo un error
    echo "Error: " . curl_error($ch);
} else {
    $outputUtf8 = mb_convert_encoding($response, 'UTF-8', 'ISO-8859-1');
    // Todo salió bien
    echo $outputUtf8;
}

// Cerrar la sesión cURL
curl_close($ch);