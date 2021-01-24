<?php

namespace App\Model;

//CLASSE RESPONSAVEL PELO CRUD
class ProdutoDao{

    //METODO RESPONSAVEL PELA CRIAÇAO DE UM NOVO PRODUTO | RECEBE UM OBJETO DO TIPO PRODUTO
    public function create(Produto $p){

        $sql ='INSERT INTO produtos(nome, descricao) VALUES (?,?)';
        
        $insert = Conexao::getConn()->prepare($sql);
        $insert->bindValue(1, $p->getNome());
        $insert->bindValue(2, $p->getDescricao());
        $insert->execute();

        //*os metodos prepare, bindValue, execute todos são nativos do PDO
    }

    public function read(){

        $sql = 'SELECT * FROM produtos';

        $read = Conexao::getConn()->prepare($sql);
        $read->execute();

        /*Verifica com o rowCount se existe pelo menos um registro no BD, se existir ele utiliza o 
        metodo fetchAll que retorna um array com todos os registros do BD*/
        if($read->rowCount()>0){
            $resultado = $read->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            //Se caso não encontrar nada no BD retorna um array vazio
            return[];
        }

    

    }

    //METODO RESPONSAVEL PELA ALTERAÇÃO NO BANCO DE DADOS
    public function update(Produto $p){

        $sql = 'UPDATE produtos SET nome = ?, descricao = ? WHERE id = ?';

        $update = Conexao::getConn()->prepare($sql);
        $update->bindValue(1, $p->getNome());
        $update->bindValue(2, $p->getDescricao());
        $update->bindValue(3, $p->getId());

        $update->execute();
    }

    public function delete($id){
            $sql = 'DELETE FROM produtos WHERE id = ?';
            $delete = Conexao::getConn()->prepare($sql);
            $delete->bindValue(1, $id);
            $delete->execute();
    }
}

?>