    

<?php 

    /*Criar uma função em PHP que receba uma string como entrada, conte a frequência de cada caractere, 
    e retorne os caracteres em ordem decrescente de frequência. Em caso de empate, os caracteres devem 
    ser ordenados em ordem alfabética. */  

function contaFrequencia ($string){

    $frequencia = [];
    $ordenado = [];
    $letras = str_split($string);   /*Separa e distribui cada letra da string para o array*/  

    foreach($letras as $letra){                /*Adiciona as letras para o array 'frequencia' somando 1 para a letra caso ela já exista na lista*/         
       if(!isset($frequencia[$letra])) {
            $frequencia[$letra] = 0;
        }
        $frequencia[$letra]++;
															 
    }
  
    $chaves = array_keys($frequencia); 
    $tamanho = count($chaves);
   
    for ($i = 0; $i < $tamanho - 1; $i++) {
        for ($j = 0; $j < $tamanho - $i - 1; $j++) {
            $letra1 = $chaves[$j];
            $letra2 = $chaves[$j + 1];
                
            if ($frequencia[$letra1] == $frequencia[$letra2]){ /*Ordena as letras em ordem alfabética caso tenham a mesma frequencia*/
                if($letra1 > $letra2){
                    $AUX= $chaves[$j];
                    $chaves[$j] = $chaves[$j + 1];
                    $chaves[$j + 1] = $AUX;
                }
            }

            if ($frequencia[$letra1] < $frequencia[$letra2]) {
                                                         /*Ordena a quantidade das letras em ordem decrescente caso tenham frequencia diferente*/
                $AUX = $chaves[$j];
                $chaves[$j] = $chaves[$j + 1];
                $chaves[$j + 1] = $AUX;
            }
        }
    }
    
    foreach ($chaves as $letra) {           /* Pegando a ordem do array '$chaves' com os valores relativos de '$frequencia'*/
        $ordenado[$letra] = $frequencia[$letra];  
																 
    }
    return $ordenado;
	
}
    

echo "Digite a palavra que você deseja separar\n";
$palavra = (string) trim(fgets(STDIN)); #'trim' foi utilizado para que não sejam contadas as quebras de linha do texto pela função 'strlen'

$palavra = strtolower($palavra);

$saida = contaFrequencia($palavra);
print_r($saida);
