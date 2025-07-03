<?php
function gerarTreinos($usuario_id, $objetivo, $conn) {
    // Define a lista de exercícios para cada objetivo
    $treinos_base = [];
    switch($objetivo) {
        case 'perder peso':
            $treinos_base = [
                ['nome_exercicio' => 'Cardio HIIT', 'series' => '4x', 'repeticoes' => '30s on/15s off'],
                ['nome_exercicio' => 'Burpees', 'series' => '3x', 'repeticoes' => '10-15'],
                ['nome_exercicio' => 'Mountain Climbers', 'series' => '3x', 'repeticoes' => '20-30'],
                ['nome_exercicio' => 'Jump Squats', 'series' => '3x', 'repeticoes' => '15-20']
            ];
            break;
        case 'ganhar massa':
            $treinos_base = [
                ['nome_exercicio' => 'Supino Reto', 'series' => '4x', 'repeticoes' => '8-12'],
                ['nome_exercicio' => 'Agachamento', 'series' => '4x', 'repeticoes' => '8-12'],
                ['nome_exercicio' => 'Puxada Frontal', 'series' => '4x', 'repeticoes' => '8-12'],
                ['nome_exercicio' => 'Leg Press', 'series' => '4x', 'repeticoes' => '12-15']
            ];
            break;
        case 'cuidar da saúde':
            $treinos_base = [
                ['nome_exercicio' => 'Caminhada', 'series' => '1x', 'repeticoes' => '30-45 min'],
                ['nome_exercicio' => 'Flexões', 'series' => '3x', 'repeticoes' => '10-15'],
                ['nome_exercicio' => 'Prancha', 'series' => '3x', 'repeticoes' => '30-60s'],
                ['nome_exercicio' => 'Alongamentos', 'series' => '1x', 'repeticoes' => '15 min']
            ];
            break;
    }

    // Primeiro, deleta os treinos antigos do usuário
    $stmtDelete = $conn->prepare("DELETE FROM treinos WHERE usuario_id = ?");
    $stmtDelete->bind_param("i", $usuario_id);
    $stmtDelete->execute();

    // Prepara a inserção para a estrutura correta da tabela
    $stmtInsert = $conn->prepare("INSERT INTO treinos (usuario_id, objetivo, nome_exercicio, series, repeticoes) VALUES (?, ?, ?, ?, ?)");

    // Insere os novos treinos
    foreach ($treinos_base as $treino) {
        $stmtInsert->bind_param("issss", 
            $usuario_id, 
            $objetivo, 
            $treino['nome_exercicio'], 
            $treino['series'], 
            $treino['repeticoes']
        );
        $stmtInsert->execute();
    }
}
?>