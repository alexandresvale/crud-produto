<?php

spl_autoload_register( function ($nomeClasse) {
    $dirBase = __DIR__ . "\src";
    $resultado = str_replace("Alexandre\\Crud", $dirBase, $nomeClasse);
    $arquivo = $resultado . ".php";
    if (file_exists($arquivo)) {
        require_once $arquivo;
    }
});
