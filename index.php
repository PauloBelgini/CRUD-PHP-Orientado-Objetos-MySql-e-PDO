<?php 
// require chama obrigatoriamente o autoload para fazer o carregamento automatico das classes
require_once 'vendor/autoload.php';

//Cria um objeto do tipo Produto
$produto = new \App\Model\Produto();
//$produto ->setId(2);
$produto->setNome("MESA");
$produto->setDescricao("MADEIRA");

$produtoDao = new \App\Model\ProdutoDao();

//$produtoDao->create($produto);
//$produtoDao->update($produto);
$produtoDao->delete(21);
$produtoDao->read();



foreach($produtoDao->read() as $produto){
    echo "ID: ".$produto ['id'] ."<br> Nome: ".$produto ['nome']."<br> Descrição: ".$produto['descricao']."<hr>";
}


?>