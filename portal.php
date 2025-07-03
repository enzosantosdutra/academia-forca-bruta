<?php
session_start();
include('db.php');
include('funcoes.php');

// Verifica login
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}
$usuario_id = $_SESSION['usuario_id'];

// Lógica de Post/Redirect/Get para evitar reenvio de formulário
$mostrar_treinos = false;
if (isset($_GET['status']) && $_GET['status'] === 'sucesso') {
    $mostrar_treinos = true;
}

// Processa o formulário quando enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['gerar'])) {
    if (!empty($_POST['objetivo'])) {
        $objetivo = $_POST['objetivo'];

        // Salva dados corporais
        $sql_dados = "INSERT INTO dados_corporais (usuario_id, massa_magra, altura, idade, peso, percentual_gordura, objetivo) 
                      VALUES (?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE 
                      massa_magra=VALUES(massa_magra), altura=VALUES(altura), idade=VALUES(idade), 
                      peso=VALUES(peso), percentual_gordura=VALUES(percentual_gordura), objetivo=VALUES(objetivo)";
        $stmt_dados = $conn->prepare($sql_dados);
        $stmt_dados->bind_param("iddddds", $usuario_id, $_POST['massa_magra'], $_POST['altura'], $_POST['idade'], $_POST['peso'], $_POST['percentual_gordura'], $objetivo);
        $stmt_dados->execute();

        // Chama a função para gerar e salvar os treinos
        gerarTreinos($usuario_id, $objetivo, $conn);
        
        // Redireciona
        header('Location: portal.php?status=sucesso');
        exit();
    }
}

// Busca os treinos para mostrar na página, se a flag for verdadeira
$treinos_para_mostrar = [];
if ($mostrar_treinos) {
    $stmt_treinos = $conn->prepare("SELECT nome_exercicio, series, repeticoes FROM treinos WHERE usuario_id = ?");
    $stmt_treinos->bind_param("i", $usuario_id);
    $stmt_treinos->execute();
    $result_treinos = $stmt_treinos->get_result();
    $treinos_para_mostrar = $result_treinos->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Aluno - Força Bruta</title>
    <link rel="stylesheet" href="portal.css">
    <link rel="shortcut icon" href="imgs/favi.png" type="image/x-icon">
    <style>
        .btn-painel {
            position: absolute; top: 1.5rem; right: 1.5rem; padding: 0.8rem 1.5rem;
            background: linear-gradient(135deg, #ff8e35, #ffaa35); color: #ffffff;
            text-decoration: none; border-radius: 12px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3); z-index: 100;
            border: none; cursor: pointer;
        }
        .btn-painel:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.4);
        }
    </style>
</head>
<body>
    <button type="button" onclick="window.location.href='painel.php'" class="btn-painel">Meu Painel</button>

    <div class="container">
        <div class="header"><h1>Portal do Aluno</h1></div>
        
        <div id="success-message" class="success-message"></div>

        <div class="section">
            <h2>Seus Dados Corporais</h2>
            <form method="POST" id="form-dados" action="portal.php" novalidate>
                <div class="form-grid">
                    <div class="form-group"><label for="massa_magra">Massa Magra (kg)</label><input type="number" step="0.01" name="massa_magra" id="massa_magra" placeholder="Ex: 65.5" required></div>
                    <div class="form-group"><label for="altura">Altura (cm)</label><input type="number" step="0.01" name="altura" id="altura" placeholder="Ex: 175" required></div>
                    <div class="form-group"><label for="idade">Idade (anos)</label><input type="number" name="idade" id="idade" placeholder="Ex: 25" required></div>
                    <div class="form-group"><label for="peso">Peso (kg)</label><input type="number" step="0.01" name="peso" id="peso" placeholder="Ex: 70.5" required></div>
                    <div class="form-group"><label for="percentual_gordura">Percentual de Gordura (%)</label><input type="number" step="0.01" name="percentual_gordura" id="percentual_gordura" placeholder="Ex: 15.5" required></div>
                </div>
                <label>Selecione seu Objetivo:</label>
                <div class="objetivos-container">
                    <div class="objetivo-card" data-objetivo="perder peso"><h3>Perder Peso</h3><p>Foco em queima de gordura</p></div>
                    <div class="objetivo-card" data-objetivo="ganhar massa"><h3>Ganhar Massa</h3><p>Desenvolvimento muscular</p></div>
                    <div class="objetivo-card" data-objetivo="cuidar da saúde"><h3>Cuidar da Saúde</h3><p>Bem-estar e condicionamento</p></div>
                </div>
                <input type="hidden" name="objetivo" id="objetivo" value="" required>
                <div style="text-align: center;"><button type="submit" name="gerar" class="btn-primary">Salvar e Gerar Treinos</button></div>
            </form>
        </div>

        <?php if ($mostrar_treinos && !empty($treinos_para_mostrar)): ?>
        <div class="section" id="treinos-section">
            <h2>Seu Novo Treino Gerado</h2>
            <div class="treinos-grid">
                <?php foreach($treinos_para_mostrar as $treino): ?>
                <div class="treino-card">
                    <h3><?= htmlspecialchars($treino['nome_exercicio']) ?></h3>
                    <div class="treino-info"><strong>Séries:</strong> <span><?= htmlspecialchars($treino['series']) ?></span></div>
                    <div class="treino-info"><strong>Repetições:</strong> <span><?= htmlspecialchars($treino['repeticoes']) ?></span></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="actions-container">
            <a href="quem_somos.php" class="btn-secondary" style="text-decoration: none; padding: 1rem 2rem;">Quem Somos</a>
        </div>
    </div>
    <script src="portal.js"></script>
</body>
</html>