<?php

$maior = $numeros[0];
$menor = $numeros[0];
$qtnumeros = 0;
foreach ($numeros as $numero) {
    if ($numero > $maior) {
        $maior = $numero;
    } elseif ($numero < $menor) {
        $menor = $numero;
    }
    $qtnumeros++;
}
$media = $soma / $qtnumeros;
echo "Menor: $menor <br>";
echo "Maior: $maior <br>";
echo "Média: $media <br>";