<?php
require_once '../includes/funcoes.php';
require_once '../core/conexao_mysql.php';
require_once '../core/sql.php';
require_once '../core/mysql.php';

Insert_teste('Joao', 'joao@ifsp.edu.br','123456');
buscar_teste();
update_teste(38, 'murilo', 'silva@gmail.com');
buscar_teste();

//teste inserção banco de dados 
function insert_teste($nota, $comentario) : void {
    $dados = ['nota' => $nota, 'comentario' => $comentario];
    insert('avaliacao',$dados);    
}

//teste select banco de dados
function buscar_teste() : void{
    $avaliacao = buscar_teste('avaliacao', ['id','nota','comentario'],[],'');
    print_r($avaliacao);
}

//teste update banco de dados
function update_teste($id, $nota, $comentario) : void {
    $dados = ['nota' => $nota, 'comentario' => $comentario];
    $criterio = [['id', '=', $id]];
    atualiza('avaliacao', $dados, $criterio);
}
?>