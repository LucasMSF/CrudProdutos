<?php

require_once('ConexaoClasse.php');

class ProdutoCrud
{
    public $nome;
    public $descricao;
    public $valor;

    public function inserir()
    {
        if ($this->verificaAtributos()) {
            try {
                $con = Conexao::conectar();
                $sql = "INSERT INTO tb_produtos VALUES (null, :nome, :descricao, :valor)";
                $stmt = $con->prepare($sql);
                $stmt->execute(array(
                    'nome' => $this->nome,
                    'descricao' => $this->descricao,
                    'valor' => $this->valor
                ));
                return true;
            } catch (PDOException $e) {
                echo 'Erro na operação do banco: ' . $e->getMessage();
                die();
            }
        } else {
            return false;
        }
    }

    public function editar($id)
    {
        if ($this->verificaAtributos()) {
            try {
                $con = Conexao::conectar();
                $sql = "UPDATE tb_produtos SET nome = :nome, descricao = :descricao, valor = :valor WHERE id = :id";
                $stmt = $con->prepare($sql);
                $stmt->execute(array(
                    'id' => $id,
                    'nome' => $this->nome,
                    'descricao' => $this->descricao,
                    'valor' => $this->valor
                ));
                return true;
            } catch (PDOException $e) {
                echo 'Erro na operação do banco: ' . $e->getMessage();
                die();
            }
        } else {
            return false;
        }
    }

    public function selecionar($id = null)
    {
        if (empty($id)) {
            try {
                $con = Conexao::conectar();
                $sql = "SELECT * FROM tb_produtos";
                $result = $con->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo 'Erro na operação do banco: ' . $e->getMessage();
                die();
            }
        } else {
            try {
                $con = Conexao::conectar();
                $sql = "SELECT * FROM tb_produtos WHERE id = :id";
                $stmt = $con->prepare($sql);
                $stmt->execute(['id' => $id]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return !$result ? false : $result;
            } catch (PDOException $e) {
                echo 'Erro na operação do banco: ' . $e->getMessage();
                die();
            }
        }
    }

    public function excluir($id)
    {
        try {
            $con = Conexao::conectar();
            $sql = "DELETE FROM tb_produtos WHERE id = :id";
            $stmt = $con->prepare($sql);
            $stmt->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            echo 'Erro na operação do banco: ' . $e->getMessage();
            die();
        }
    }

    private function verificaAtributos()
    {
        if (empty($this->nome) or empty($this->descricao) or empty($this->valor)) return false;

        return true;
    }
}
