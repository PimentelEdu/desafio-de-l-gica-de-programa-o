<?php

$pedidos = [
    [
        "id" => 1,
        "cliente" => "João",
        "produtos" => [
            ["nome" => "Notebook", "preco" => 3500, "quantidade" => 1],
            ["nome" => "Mouse", "preco" => 150, "quantidade" => 2]
        ]
    ],
    [
        "id" => 2,
        "cliente" => "Maria",
        "produtos" => [
            ["nome" => "Teclado", "preco" => 300, "quantidade" => 1],
            ["nome" => "Monitor", "preco" => 1200, "quantidade" => 1]
        ]
    ],
    [
        "id" => 3,
        "cliente" => "João",
        "produtos" => [
            ["nome" => "Cadeira Gamer", "preco" => 900, "quantidade" => 1]
        ]
    ],
    [
        "id" => 4,
        "cliente" => "Carlos",
        "produtos" => [
            ["nome" => "Impressora", "preco" => 800, "quantidade" => 1],
            ["nome" => "Scanner", "preco" => 600, "quantidade" => 1]
        ]
    ],
    [
        "id" => 5,
        "cliente" => "Maria",
        "produtos" => [
            ["nome" => "Smartphone", "preco" => 2500, "quantidade" => 1],
            ["nome" => "Fone de ouvido", "preco" => 200, "quantidade" => 2]
        ]
    ],
    [
        "id" => 6,
        "cliente" => "João",
        "produtos" => [
            ["nome" => "Tablet", "preco" => 1200, "quantidade" => 1],
            ["nome" => "Capinha", "preco" => 50, "quantidade" => 3]
        ]
    ],
    [
        "id" => 7,
        "cliente" => "Ana",
        "produtos" => [
            ["nome" => "Smartwatch", "preco" => 1800, "quantidade" => 1],
            ["nome" => "Carregador", "preco" => 150, "quantidade" => 1]
        ]
    ],
    [
        "id" => 8,
        "cliente" => "Carlos",
        "produtos" => [
            ["nome" => "Câmera", "preco" => 2200, "quantidade" => 1],
            ["nome" => "Tripé", "preco" => 400, "quantidade" => 2]
        ]
    ]
];

function ProcessaPedidos ($listaPedidos){

    $ValoresRelativos = [];
    $nomes = [

        ["nome" => "João", "total" => 0 ],
        ["nome" => "Maria", "total" => 0 ],
        ["nome" => "Carlos", "total" => 0],
        ["nome" => "Ana", "total" => 0],

    ];
    $QuantPedidos = count($listaPedidos);
   
    for($i = 0; $i <$QuantPedidos; $i++){         /*Esse for separa as informações em um array 'Valores relativos' para ter cada pedido de
                                                    uma forma mais simplificada, só com o nome e valor de cada compra */

        $ValoresRelativos [$i]["nome"] = $listaPedidos[$i]["cliente"];
        $tamRelativo = count($listaPedidos[$i]["produtos"]);
        $SomaRelativa = 0;

        for($j = 0; $j <$tamRelativo; $j++){
            $SomaRelativa += $listaPedidos[$i]["produtos"][$j]["preco"] * $listaPedidos[$i]["produtos"][$j]["quantidade"];

        }
        $ValoresRelativos [$i]["valor"] = $SomaRelativa;
    }

    $TotalGeral = 0;
    #passando o index por referencia para poder manipular o array 'nomes'
    foreach($nomes as &$index1){                 /*Junta os pedidos de mesmo remetente, somando o valor de cada compra que ele fez */

        $ValorNome1 = $index1["nome"];
        $Total = $index1["total"];
        
        if($Total == 0){
            foreach($ValoresRelativos as $index2){
                $ValorNome2 = $index2["nome"];
                $Gastou = $index2["valor"];
                if($ValorNome2 === $ValorNome1){
                    $Total += $Gastou;
                    $index1["total"] = $Total;
                    
                }
            }
            $TotalGeral += $Total;   /*Aproveitando o mesmo 'foreach' para somar o total gasto por cada um, para termos a soma total*/

        }
    }
    $maior = 0;
    
    foreach($nomes as $index){      /*Vendo quem foi o cliente que mais gastou*/
        $valor = $index["total"];
        $nome = $index["nome"];

        if($valor > $maior){
            $maior = $valor;
            $maiorCliente = $nome;
          
        } 
    }
    
    $saida = [
        "total_pedidos" => $QuantPedidos,
        "total_vendido" => $TotalGeral,
        "cliente_mais_gastou" => $maiorCliente,
        "quanto gastou" => $maior,
    ];
  
    return $saida;
        
}

print_r(ProcessaPedidos($pedidos));
