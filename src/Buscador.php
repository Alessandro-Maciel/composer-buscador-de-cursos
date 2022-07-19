<?php

namespace Alessandromaciel\BuscadorCursos;

use Psr\Http\Client\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    public function __construct(
        private ClientInterface $httpClient,
        private Crawler $crawler
    ) {
    }

    public function buscar(string $url): array
    {
        $resposta = $this->httpClient->request('GET', $url);
        $html = $resposta->getBody();

        return $this->cursos($html);
    }

    public function cursos($html): array
    {
        $this->crawler->addHtmlContent($html);
        $cursos = $this->crawler->filter('span.card-curso__nome');

        $data = [];
        foreach ($cursos as $curso) {
            $data[] = $curso->textContent;
        }

        return $data;
    }
}
