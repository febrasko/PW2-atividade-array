<?php
$maiorSal = 0;
$maiorQt = 0;
$menorQt = 0;
$maiorArea = '';
$menorArea = '';
$mediaFemTotal = 0;
$mediaMascTotal = 0;
$funcionarios = [
    ['nome' => 'João da Silva', 'genero' => 'M', 'area' => 'engenharia', 'salario' => 6000],
    ['nome' => 'Maria da Silva', 'genero' => 'F', 'area' => 'marketing', 'salario' => 3000],
    ['nome' => 'Beltrano da Silva', 'genero' => 'M', 'area' => 'contabilidade', 'salario' => 4000],
    ['nome' => 'Ciclano Pereira', 'genero' => 'M', 'area' => 'engenharia', 'salario' => 4000],
    ['nome' => 'Fulana Oliveira', 'genero' => 'F', 'area' => 'contabilidade', 'salario' => 2000],
    ['nome' => 'Jão Silveira', 'genero' => 'M', 'area' => 'marketing', 'salario' => 4000],
    ['nome' => 'Cirilo Ferreira', 'genero' => 'M', 'area' => 'contabilidade', 'salario' => 3000],
    ['nome' => 'Zé das Couve', 'genero' => 'M', 'area' => 'engenharia', 'salario' => 5000],
    ['nome' => 'Pedro Pedrada', 'genero' => 'M', 'area' => 'contabilidade', 'salario' => 2000],
    ['nome' => 'Paulo Paulada', 'genero' => 'M', 'area' => 'marketing', 'salario' => 2000],
    ['nome' => 'Creuza Reis', 'genero' => 'F', 'area' => 'financeiro', 'salario' => 1500],
    ['nome' => 'Yarley Ground', 'genero' => 'M', 'area' => 'financeiro', 'salario' => 3000],
    ['nome' => 'Billy Bill', 'genero' => 'M', 'area' => 'marketing', 'salario' => 2000],
    ['nome' => 'Brian Brioche', 'genero' => 'M', 'area' => 'engenharia', 'salario' => 6500],
    ['nome' => 'Mary Mariana', 'genero' => 'F', 'area' => 'financeiro', 'salario' => 2000],
];
$areas = [
    'engenharia' => ['salTotal'=>0, 'qtTotal'=>0, 'mediaSal'=>0, 'qtFem'=>0, 'qtMasc'=>0, 'salFem'=>0, 'salMasc'=>0, 'mediaFem'=>0, 'mediaMasc'=>0],
    'marketing' => ['salTotal'=>0, 'qtTotal'=>0, 'mediaSal'=>0, 'qtFem'=>0, 'qtMasc'=>0, 'salFem'=>0, 'salMasc'=>0, 'mediaFem'=>0, 'mediaMasc'=>0],
    'contabilidade' => ['salTotal'=>0, 'qtTotal'=>0, 'mediaSal'=>0, 'qtFem'=>0, 'qtMasc'=>0, 'salFem'=>0, 'salMasc'=>0, 'mediaFem'=>0, 'mediaMasc'=>0],
    'financeiro' => ['salTotal'=>0, 'qtTotal'=>0, 'mediaSal'=>0, 'qtFem'=>0, 'qtMasc'=>0, 'salFem'=>0, 'salMasc'=>0, 'mediaFem'=>0, 'mediaMasc'=>0],
];
foreach ($funcionarios as $funcionario) {
    // Maior salário
    if ($funcionario['salario'] > $maiorSal) {
        $maiorSal = $funcionario['salario'];
    }
    foreach ($areas as $area => $dados) {
        // Quantidade de funcionários e salário por área
        if ($funcionario['area'] == $area) {
            $areas[$area]['salTotal'] += $funcionario['salario'];
            $areas[$area]['qtTotal']++;
            // Quantidade de homens e mulheres e salário de homens e mulheres por área
            if ($funcionario['genero'] == 'F') {
                $areas[$area]['qtFem']++;
                $areas[$area]['salFem'] += $funcionario['salario'];
            } else {
                $areas[$area]['qtMasc']++;
                $areas[$area]['salMasc'] += $funcionario['salario'];
            }
        }
    }
}
foreach ($areas as $area => $dados) {
    // Média de salário por área
    $areas[$area]['mediaSal'] = $areas[$area]['salTotal'] / $areas[$area]['qtTotal'];
    // Média de salário para homens e mulheres em cada área
    if ($areas[$area]['qtFem'] > 0) {
        $areas[$area]['mediaFem'] = $areas[$area]['salFem'] / $areas[$area]['qtFem'];        
    }
    if ($areas[$area]['qtMasc'] > 0) {
        $areas[$area]['mediaMasc'] = $areas[$area]['salMasc'] / $areas[$area]['qtMasc'];        
    }
    // Área com maior e menor quantidade de mulheres
    if ($areas[$area]['qtFem'] > $maiorQt) {
        $maiorQt = $areas[$area]['qtFem'];
        $maiorArea = $area;
    } elseif ($areas[$area]['qtFem'] <= $menorQt) {
        $menorQt = $areas[$area]['qtFem'];
        $menorArea = $area;
    }
}
echo "Maior salário: $maiorSal <br><br>";
echo "Área com mais mulheres: $maiorArea <br>";
echo "Área com menos mulheres: $menorArea <br><br>";
foreach ($areas as $area => $dados) {
    echo 'Média de salário ' . $area . ': ' . $areas[$area]['mediaSal'] . '<br>';
    echo 'Média para mulheres: ' . $areas[$area]['mediaFem'] . '<br>';
    echo 'Média para homens: ' . $areas[$area]['mediaMasc'] . '<br><br>';
    $mediaFemTotal += $areas[$area]['mediaFem'];
    $mediaMascTotal += $areas[$area]['mediaMasc'];
}
echo "Média de salário para todas as mulheres: $mediaFemTotal <br>";
echo "Média de salário para todos os homens: $mediaMascTotal <br>";