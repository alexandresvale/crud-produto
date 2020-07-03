<?php


namespace Alexandre\Crud\Repository;


class ImagemDir
{
    private static string $pasta = __DIR__ . "\..\..\uploads";

    public static function salvar(array $imagem): string
    {
        ImagemDir::$pasta;
        $pasta = __DIR__ . "\..\..\uploads";
        if (!is_file(ImagemDir::$pasta) && !is_dir(ImagemDir::$pasta)) {
            mkdir(ImagemDir::$pasta, 0755);
        }
        $novoNome = time() . mb_strstr($imagem['name'], ".");
        if (move_uploaded_file($imagem['tmp_name'], $pasta . "/{$novoNome}")) {
            return $novoNome;
        } else {
            return "";
        }
    }

    public static function remover(string $nomeDaImagem): bool
    {
        if (file_exists(ImagemDir::$pasta . "/{$nomeDaImagem}")
            && is_file(ImagemDir::$pasta . "/{$nomeDaImagem}",)) {
            unlink(ImagemDir::$pasta . "/{$nomeDaImagem}");
            return true;
        }
        return false;
    }


}