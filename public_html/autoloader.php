<?php
spl_autoload_register(function ($classname) {
    $dirs = [
        __DIR__ . '/class/',
        __DIR__ . '/model/',
        __DIR__ . '/exceptions/'
    ];
    $classname_short = str_replace(['Site\\Entity\\', 'Site\\Model\\', 'Site\\Catchers\\'], '', $classname);
    foreach ($dirs as $path) {
        $file = $path . $classname_short . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>