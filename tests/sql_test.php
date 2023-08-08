<?php
    require_once '../core/sql.php';

    $id = 1;
    $nome = 'eloisa';
    $email = 'eloisa@gmail.com';
    $senha = '98245';
    $dados = ['nome' => $nome,
            'email' => $email,
            'senha' => $senha];

    $entidade = 'usuario';
    $criterio = [['id', '=', $id]];
    $campos = ['id', 'nome', 'email'];
    print_r($dados);
    echo '<br>';
    print_r($campos);
    echo '<br>';
    print_r($criterio);
    echo '<br>';

    //teste geracao insert 
    $instrucao = insert($entidade, $dados);
    echo $instrucao. '<br>';

    //teste geracao update 
    $instrucao = update($entidade, $dados, $criterio);
    echo $instrucao. '<br>';

    //teste geracao select
    $instrucao = select($entidade, $dados, $criterio);
    echo $instrucao. '<br>';

    //teste geracao delete
    $instrucao = delete($entidade, $criterio);
    echo $instrucao. '<br>';
?>