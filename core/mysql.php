<?php 

function insere(string $entidade, array $dados) : bool{
    $retorno = false;

    foreach ($dados as $campo => $dado){
        $coringa[$campo] = '?';
        $tipo[] = gettype($dado) [0];
        $$campo = $dado;
    }

    $intrucao = insert($entidade, $coringa);
    $conexao = conecta();

    $stmt = mysqli_prepare($conexao, $instrucao);
    eval('msqli_stmt_bind_param($stmt, \'' . implode('', $tipo) . '\',$' . implode(', $', array_keys($dados)) . ');');

    mysli_stmt_execute($stmt);
    $retorno = (boolean) mysli_stmt_affected_rows($stmt);
    $_SESSION['errors'] = mysqli_stmt_error_list($stmt);

    mysli_stmt_close($stmt);
    desconecta($conexao);

    return $retorno
}
?>