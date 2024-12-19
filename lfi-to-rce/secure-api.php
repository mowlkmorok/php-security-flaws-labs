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
$file = filter_var($file, FILTER_SANITIZE_STRING);


$allowed_files = [
    'about.php',
    'client.php',
    'book.php',
    'slider.php',
    'menu.php',
    '404.php',
    '403.php'
];


// Function Mapping
$routes = [
    'dashboard' => 'show_dashboard',
//    'profile' => 'show_profile',
//    'settings' => 'show_settings'
];

switch (in_array($file, $allowed_files)) {
    case true:
        # code...
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
        break;
    
    default:
        # code...
        call_user_func($routes[$route], "views/404.php");
        break;
}


?>
