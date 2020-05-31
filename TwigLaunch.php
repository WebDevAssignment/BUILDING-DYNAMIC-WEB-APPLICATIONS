<?php
    //This is Luke's code for the bootstrap file
    //How to use Twig: https://youtu.be/uYG5LNz_EMU?list=PLsEXZ8tkf6Z_KNVHvxmfY-KeLpY8ibImK&t=3649

    require_once __DIR__.'\vendor\autoload.php';
    $loader = new Twig_Loader_Filesystem(__DIR__.'\templates');
    $twig = new Twig_Environment($loader);
?>