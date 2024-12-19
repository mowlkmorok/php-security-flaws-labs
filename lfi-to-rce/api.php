<?php

function show_dashboard($file) {
    include "{$file}";
}

function show_profile($file) {
    include "{$file}";
}

function show_settings($file) {
    include "{$file}";
}

// Get route
$route = $_GET['route'] ?? '';
$file = $_GET['file'] ?? '';

// Function Mapping
$routes = [
    'dashboard' => 'show_dashboard',
//    'profile' => 'show_profile',
//    'settings' => 'show_settings'
];

if (array_key_exists($route, $routes)) {

    $file = "views/{$file}";
    if (file_exists("{$file}")) {

        call_user_func($routes[$route], $file);

    } else {
        call_user_func($routes[$route], "views/404.php");
        
    }
} else {
    call_user_func($routes[$route], "views/404.php");
    echo "Erro: Rota não encontrada.";
}
?>
