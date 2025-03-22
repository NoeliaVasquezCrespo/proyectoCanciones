<?php

function dd($valor)
{
    return die(var_dump($valor));
}


function view($archivo, $parametros = [] )
{
    extract($parametros);
    require "Views/{$archivo}.view.php";
}

function redirect($ruta)
{
    header("Location: {$ruta}");
}
