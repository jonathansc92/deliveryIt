<?php
namespace App\Services;

use App\Services\ResultadosService;

class ClassificacaoService 
{
    private $resultadosService;

    public function __construct(ResultadosService $resultadosService)
    {
        $this->resultadosService = $resultadosService;
    }

    public function getClassificacaoGeral($idProva, $categoria = null) 
    {
        $classificacao = $this->resultadosService->getResultadosByProvas($idProva, $categoria);

        $classificacaoEstrutura = array();

        foreach ($classificacao as $key => $estrutura) 
        {
            $estrutura['provas_id'] = $estrutura->provas_id;
            $estrutura['tipo_prova'] = $estrutura->tipo_prova;
            $estrutura['corredores_id'] = $estrutura->corredores_id;
            $estrutura['idade'] = $estrutura->idade;
            $estrutura['nome'] = $estrutura->nome;
            $estrutura['ranking'] = $key+1 .' °';

            $classificacaoEstrutura[] = $estrutura;
        }

        return $classificacaoEstrutura;
    }

    public function getClassificacaoApi($idProva, $categoria = null) 
    {
        $classificacao = $this->resultadosService->getResultadosByProvasApi($idProva, $categoria);

        $classificacaoEstrutura = array();

        foreach ($classificacao as $key => $estrutura) 
        {
            $estrutura['provas_id'] = $estrutura->provas_id;
            $estrutura['tipo_prova'] = $estrutura->tipo_prova;
            $estrutura['corredores_id'] = $estrutura->corredores_id;
            $estrutura['idade'] = $estrutura->idade;
            $estrutura['nome'] = $estrutura->nome;
            $estrutura['posicao'] = $key+1;

            $classificacaoEstrutura[] = $estrutura;
        }

        return $classificacaoEstrutura;
    }
}
