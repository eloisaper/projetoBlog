<?php
    function insert(string $entidade, array $dados) : string {
        $instrucao = "INSERT INTO {$entidade}";
        $campos = implode(', ', array_keys($dados));
        $valores = implode(', ', array_values($dados));

        $instrucao .= " ({$campos})";
        $instrucao .= " VALUES ({$valores})";
        
        return $instrucao;
    }

    function update(string $entidade, array $dados, array $criterio = []) : string {
        $instrucao = "update {$entidade}";

        foreach($dados as $campo => $dado){
            $set[] = "{$campo} = {$dado}";
        }

        $instrucao .= ' set ' . implode(', ', $set);
        if(!empty($criterio)){
            $instrucao .= ' where ';

            foreach($criterio as $expressao){
                $instrucao .= ' ' . implode(' ', $expressao);
            }

            return $instrucao;
        }
    }

    function delete(string $entidade, array $dados, array $criterio = []) : string {
        $instrucao = "delete {$entidade}";
        $instrucao .= " FROM {$entidade}";

        if(!empty($criterio)) {
            $instrucao .= 'where';
            
            foreach($criterio as $expressao){
                $instrucao .= ' ' . implode(' ', $expressao);
            }
        }

        return $instrucao;
    }

    function select(string $entidade, array $campos, array $criterio = [], string $ordem = null): string {
        $instrucao = " SELECT " . implode(', ' , $campos);
        $instrucao .= " FROM {$entidade}";

        if(!empty($criterio)){
            $instrucao .= 'where '; 
            
            foreach($criterio as $expressao){
                $instrucao .= ' ' . implode(' ', $expressao);
            }
        }

        if(!empty($ordem)) {
            $instrucao .= "order by $ordem";
        }

        return $instrucao;
    }




?>