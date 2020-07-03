<?php


namespace Alexandre\Crud\Repository;

use PDO;

class Conexao
{

    public static function ObterConexao(): PDO
    {
        $arquivoDeBanco = __DIR__ . "..\Banco\banco.db";
        $pdo = new PDO("mysql:host=localhost;dbname=db_produto", "root", "");
        $pdo->setAttribute(PDO::ERR_NONE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;

    }




}