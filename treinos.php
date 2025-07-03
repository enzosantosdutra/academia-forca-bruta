<?php
session_start();
include('db.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Buscar os treinos no banco
$sql = "SELECT * FROM treinos WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Meus Treinos - Força Bruta</title>
    <link rel="stylesheet" href="seuestilo.css"> <!-- (se tiver css) -->
    <link rel="shortcut icon" href="imgs/favi.png" type="image/x-icon">
    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
            font-family: Arial;
            padding: 20px;
        }
        h1 {
            color: #ff6b35;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #2d1810;
        }
        th, td {
            border: 1px solid #cccccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #ff6b35;
        }
        .botao-voltar {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff6b35;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <h1>Seus Treinos</h1>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Grupo Muscular</th>
                <th>Exercícios</th>
                <th>Séries</th>
                <th>Repetições</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['grupo_muscular']); ?></td>
                    <td><?php echo htmlspecialchars($row['exercicios']); ?></td>
                    <td><?php echo htmlspecialchars($row['series']); ?></td>
                    <td><?php echo htmlspecialchars($row['repeticoes']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Você ainda não possui treinos cadastrados.</p>
    <?php endif; ?>

    <a href="cadastro.php">
    <button type="button" class="botao-voltar">Voltar ao Portal</button>
</a>
    
</body>
</html>
