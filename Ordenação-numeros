<?php
        /*Crie uma função em PHP que receba um array de números inteiros e realize as seguintes operações:

        Requisitos:

        - A função deve receber um array de números inteiros (pode conter números positivos e negativos).
        - Filtrar o array para remover todos os números negativos.
        - Ordenar o array filtrado em ordem crescente.
        - Retornar o array resultante.
        - Se o array original não contiver números positivos, a função deve retornar uma mensagem informando
        que não há números positivos disponíveis.*/

    $conjuntoNumeros = [];

    function Filtra($Array){

        $tamanho = count($Array);         #Utilizando o 'count' ao inver do 'strlen' dessa vez já que se trata de um array, e não de uma string.
        $numAtual = 0;
    
        for($i = 0; $i <$tamanho; $i++){
            $numAtual = (int) $Array[$i];

            if ($numAtual < 0){            #filtra o array removendo os valores negativos
                unset($Array[$i]);
                
            }

        }
        $Array = array_values($Array);

        if ($Array != NULL){              /*Observando se ainda há algum número dentro do array, 
                                          para caso possua algum valor será iniciado o processo de ordenação (Metodo Bolha)
                                          pode ser substituido pela função 'sort()'*/

                                
            $tamanho = count($Array); 

            while($tamanho > 1){
                $trocou = FALSE;
                $x = 0;

                while ($x < $tamanho-1){
                    if($Array[$x] > $Array[$x +1]){ #Ordenar o array filtrado em ordem crescente; para decrescente é só alterar o '>' para '<'
                        $AUX = $Array[$x];
                        $Array[$x] = $Array[$x+1];
                        $Array[$x+1] = $AUX;
                        $trocou = TRUE;

                    }
                $x +=1;

                }
                
                if($trocou == FALSE){
                    break;
                }
            $tamanho -= 1;

            }
        print_r($Array);                    #Retorna o Array resultante

        } else {
            echo "Não há números positivos para a ordenação!";      #Exibe uma mensagem caso não existam valores positívos no array

        }
    
    }
    
    while (TRUE){       #Menu para obter os números que o usuário fornece (pelo Terminal do VS code)

        echo"Digite o valor que você deseja adicionar na lista(Digite 'fim' para finalizar): ";
        $num = (string) trim(fgets(STDIN)); #recebe os números do usuário
        #'trim' foi utilizado para que não sejam contadas as quebras de linha do texto pela função 'strlen'
        
        if ($num != 'fim'){
            $conjuntoNumeros[] = (int) $num;

        } else {
            break;

        }
        
    }
        
    Filtra($conjuntoNumeros);
