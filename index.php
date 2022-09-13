<?php

class Cache
{

    private $cache;

    public function setVar($nome, $valor)
    {
        // ler o cache
        $this->readCache();

        //adicionando ou alterando o valor do nome;

        $this->cache->$nome = $valor;

        //salvar o cache

        $this->saveCache();
    }

    public function getVar($nome)
    {
        //Ler o cache
        $this->readCache();
        return $this->cache->$nome;
    }

    private function readCache()
    {
        // Limpando o cache que possa estar criado
        $this->cache = new stdClass();
        //Verificando se o arquivo existe
        if (file_exists('cache.cache')) {
            //colocando na variavel cache, será uma string, transformamos em JSON
            $this->cache = json_decode(file_get_contents('cache.cache'));
        }


    }

    private function saveCache()
    {
        //criando o arquivo
        file_put_contents('cache.cache',json_encode($this->cache));
    }
}


$cache = new Cache();
//$cache->setVar('nome','Paulo');
//$cache->setVar('idade','33');
echo "Meu nome é: ".$cache->getVar('nome'). " Minha idade é: ". $cache->getVar('idade');
