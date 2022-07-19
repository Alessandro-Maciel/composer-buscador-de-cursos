<?php

require 'vendor/autoload.php';

use Alessandromaciel\BuscadorCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


$client = new Client(['base_uri' => 'https://www.alura.com.br']);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);

$resposta = $buscador->buscar('/cursos-online-programacao/php');

var_dump($resposta);
