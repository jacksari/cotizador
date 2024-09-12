<?php

//echo "HOLA CSC";exit;

// Muestra toda la informaci贸n, por defecto INFO_ALL
phpinfo();

// Muestra solamente la informaci贸n de los m贸dulos.
// phpinfo(8) hace exactamente lo mismo.
// phpinfo(INFO_MODULES);

// echo(__DIR__ . '/uploads');
// echo("OS: " . PHP_OS . " </br>");
// if (strtolower(substr(PHP_OS, 0, 3)) !== 'win') {
//     //  $target = __DIR__ . '/../../laravel/storage/app';
//     //  $link = __DIR__ . '/uploads';
//     $target = __DIR__ . '/../../laravel/vendor/crocodicstudio/crudbooster/src/assets';
//     $link = __DIR__ . '/vendor/crudbooster';
//     echo("symlink de: $target a: $link </br>");
//     $resultado = symlink($target, $link);

//     if ($resultado) {
//         echo("symlink de uploads creado.<br/><br/>");
//     } else {
//         echo("symlink de uploads fallido.<br/><br/>");
//     }
// } else {
//     //$target = __DIR__ . '\\storage\\app';
//     //$link = __DIR__ . '\\public\\uploads';
//     //exec("mklink /J \"{$link}\" \"{$target}\"", $resultado, $codigo);
//     //echo("{$codigo}<br/><br/>");
// }

?>