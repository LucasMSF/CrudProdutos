<?php

Class Conexao 
{
    private static $conexao;

    public static function conectar()
    {
        if(empty(self::$conexao))
        {
            try
            {
                self::$conexao = new PDO('sqlite:' . dirname(__DIR__) . '/sql/bd.sqlite');
            }
            catch(PDOException $e)
            {
                echo "Erro no Banco: " . $e->getMessage();
                die();
            }

            return self::$conexao;
        }
    }
    
}

/* var_dump(Conexao::conectar()); */
