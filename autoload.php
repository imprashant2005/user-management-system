<?php

spl_autoload_register(function ($class) {
    $prefix = "App\\";
    $base_dir = __DIR__ . "/app/";

    $len = strlen($prefix);

    // check if class uses App\
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // remove App\
    $relative_class = substr($class, $len);

    // convert namespace to path
    $file = $base_dir . str_replace("\\", "/", $relative_class) . ".php";

    if (file_exists($file)) {
        require $file;
    } else {
        echo "File not found: " . $file;
    }
});