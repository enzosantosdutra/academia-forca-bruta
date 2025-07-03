<?php
session_start();
include('db.php');

// 1. VERIFICA SE O USUÁRIO ESTÁ LOGADO
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}
$usuario_id = $_SESSION['usuario_id'];

// 2. BUSCA O NOME DO USUÁRIO NO BANCO
$stmt_usuario = $conn->prepare("SELECT nome FROM usuarios WHERE id = ?");
$stmt_usuario->bind_param("i", $usuario_id);
$stmt_usuario->execute();
$result_usuario = $stmt_usuario->get_result();
$usuario = $result_usuario->fetch_assoc();
$nome_usuario = $usuario['nome'] ?? 'Aluno'; // Pega o nome ou usa 'Aluno'

// 3. BUSCA OS TREINOS ATUAIS DO USUÁRIO (COM A CONSULTA CORRIGIDA)
// A consulta agora busca 'nome_exercicio' em vez de 'grupo_muscular' e 'exercicios'
$stmt_treinos = $conn->prepare("SELECT nome_exercicio, series, repeticoes FROM treinos WHERE usuario_id = ?");
$stmt_treinos->bind_param("i", $usuario_id);
$stmt_treinos->execute();
$result_treinos = $stmt_treinos->get_result();
$treinos_do_painel = $result_treinos->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Painel de Treinos</title>
    <link rel="stylesheet" href="portal.css"> 
    <link rel="shortcut icon" href="imgs/favi.png" type="image/x-icon">
    <style>
        /* Estilo para o botão de voltar, para não conflitar */
        .btn-voltar {
            position: absolute; top: 1.5rem; right: 1.5rem; padding: 0.8rem 1.5rem;
            background: linear-gradient(135deg, #ff6b35, #ff8e35); color: #ffffff;
            text-decoration: none; border-radius: 12px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3); z-index: 100;
        }
        .btn-voltar:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.4);
        }
    </style>
</head>
<body>
    <a href="quem_somos.php" class="btn-voltar">retroceder</a>

    <div class="container">
        <div class="header">
            <h1>Painel de Treinos de <?= htmlspecialchars($nome_usuario) ?></h1>
        </div>

        <?php if (!empty($treinos_do_painel)): ?>
            <div class="section">
                <h2>Seu Plano de Treino Atual</h2>
                <div class="treinos-grid">
                    <?php foreach($treinos_do_painel as $treino): ?>
                    <div class="treino-card">
                        <h3><?= htmlspecialchars($treino['nome_exercicio']) ?></h3>
                        <div class="treino-info"><strong>Séries:</strong> <span><?= htmlspecialchars($treino['series']) ?></span></div>
                        <div class="treino-info"><strong>Repetições:</strong> <span><?= htmlspecialchars($treino['repeticoes']) ?></span></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="section" style="text-align: center;">
                <h2>Nenhum treino encontrado!</h2>
                <p>Por favor, volte ao portal e gere um novo plano de treinos.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>