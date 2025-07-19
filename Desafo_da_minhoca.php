<?php

    /*Crie uma função que receba uma string como parâmetro, e a saída seja 
    a mesma string mas com cada exibição uma letra como maiúscula.*/

    function aumentar(string $string){

        $tamanho = strlen($string);             
        $array = str_split($string);                    #separando as letras da string para um Array     
        $saida = "\nInicio:";

        for ($i = 0; $i< $tamanho; $i++){

            $array[$i] = strtoupper($array[$i]);
            $saida = implode($array);                  #'Implode' passa os valores do Array de forma que podem ser adicionados em uma String
            $array[$i] = strtolower($array[$i]);
            echo "\n$saida";

        } 
        
    }

    echo "Digite a palavra que você deseja separar\n"; #
    $palavra = (string) trim(fgets(STDIN)); #'trim' foi utilizado para que não sejam contadas as quebras de linha do texto pela função 'strlen'

    aumentar($palavra);
