<?php

	/*Pete gosta de fazer bolos. Ele tem algumas receitas e ingredientes, mas é péssimo em matemática. Você pode ajudá-lo?
	O primeiro parâmetro é a receita para um (1) bolo
	O segundo parâmetro é a quantidade de ingredientes que ele tem disponível
	Você consegue retornar quantos bolos(inteiros) ele pode fazer?*/


#Array das receitas
$receitas = [
		['nome' => 1, 'farinha' => 500, 'açúcar' => 200, 'ovos' => 1], 
		['nome' => 2, 'maçãs' => 3, 'farinha' => 300, 'açúcar'=> 150, 'leite' => 100, 'óleo' => 100],
		['nome' => 3, 'farinha' => 500, 'açúcar' => 200, 'leite' => 100, 'ovos' => 1], 
		];

# Array que irá receber a quantidade de ingredientes

$ingredientesPossuidos = [
		[
		'maçãs' => 0,
		'farinha'=> 0,
		'açúcar' => 0,
		'ovos'=> 0,
		'leite' => 0,
		'óleo' => 0,
		],
		#Fiz esse segundo array apenas para pedir os valores na tela de forma mais organizada, na função mando apenas o primeiro
		[
		'maçãs', 
		'farinha', 
		'açúcar',                                   
		'ovos', 
		'leite', 
		'óleo',
		]
		];  


function cakes(array $recipe,array $ingredients){

	$ValoresComuns = [];
	$divisao;
	$saida = "";
	
	foreach($ingredients as $index1 => $valor1){        /*Separando apenas os ingredientes que estão presentes na receita selecionada*/
		foreach($recipe as $index2 => $valor2){
			if($index1 === $index2){
				$ValoresComuns[] = $index1;
							/*foreach pois trata-se de um array associativo então não fncionaria por indices númericos
							pelo for*/
			}   
		}
	}

	$tam = count($ValoresComuns);                      

	for($i = 0; $i < $tam; $i++){                   
						/*Esse 'for' está adicionando quantas porções daquele ingrediente o usuario possui*/
		$AUX = $ValoresComuns[$i];                              
		$divisao [] = (int) ($ingredients[$AUX] / $recipe[$AUX]); 
	}

	$tamdivisao = count($divisao);
	$menorNum = NULL;

	for($i = 0; $i <$tamdivisao; $i++){
		/*Esse for é reponsavel por pegar o menor valor daquelas porções, pois é necessario ter o minimo de ingredientes
		para que conte como o bolo completo, poderia ser substituido pela função 'min()'*/
		if($divisao[$i] != 0){
			if ($menorNum === NULL || $divisao[$i] <$menorNum){
				$menorNum = $divisao[$i];
			}
		} else {
			$menorNum = 0;
			break;
		}        
	}

	if($menorNum == 0){                                 /*Vê se existe uma quantidade possível de bolos e exibe a ensagem apropriada*/
		$saida = "Não é possivel fazer nenhum bolo\n";
			
	} else {                    
		$saida = "É possivel fazer $menorNum bolos inteiros com esses ingredientes!\n";
			
	}

	return $saida;
}

#mostrando as receitas disponíveis
echo "Receita 01\n";
print_r($receitas[0]);

echo "Receita 02\n";
print_r($receitas[1]);

echo "Receita 03\n";
print_r($receitas[2]);


while (TRUE) {

    echo "Qual receita você deseja fazer?\n";
    $num = (int) trim(fgets(STDIN));#'trim' foi utilizado para que não sejam contadas as quebras de linha do texto pela função 'strlen'

    if ($num <= 0 || $num >=4){
        echo "Opção invalida, por afvor escolha uma das 3 receitas\n";

    } else {

        $tamIngredientesPossuidos = count($ingredientesPossuidos[0]);
        $tamReceitas = count($receitas);

        for($i = 0; $i < $tamIngredientesPossuidos; $i++){         #pegando a quantidade de cada ingrediente

            echo "Quantos(as) " . $ingredientesPossuidos[1][$i] . " você possúi?\n";
            $quant = (int) trim(fgets(STDIN));

            $ingredientesPossuidos[0][$ingredientesPossuidos[1][$i]] = $quant;

        }

        for ($i = 0; $i <$tamReceitas; $i++){                   #comparando a opção escolhida para passar a receita em questão por parametro
            if ($receitas[$i]['nome'] == $num){

                $saida = cakes($receitas[$i], $ingredientesPossuidos[0]);
                
            }
        }

    echo "$saida";
    
    }
}
