<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, telefone, cpf) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $email, $senha, $telefone, $cpf);

    if ($stmt->execute()) {
        $_SESSION['usuario_id'] = $stmt->insert_id;
        header('Location: portal.php');
        exit();
    } else {
        $error_message = "Erro ao cadastrar: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Força Bruta</title>
    <link rel="stylesheet" href="cadastro.css">
    <link rel="shortcut icon" href="imgs/favi.png" type="image/x-icon">
</head>
<body>
    <!-- Floating background elements -->
    <div class="floating-element">💪</div>
    <div class="floating-element">🏃</div>
    <div class="floating-element">⚡</div>
    <div class="floating-element">🔥</div>

    <div class="cadastro-container">
        <div class="logo">
            <h1>Força Bruta</h1>
            <p>Crie sua conta e comece sua jornada</p>
        </div>

        <?php if (isset($error_message)): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Crie uma senha segura" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                </div>

                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

        <div class="link-login">
            <p>Já tem uma conta? <a href="index.php">Faça login aqui</a></p>
        </div>
    </div>
    <script src="cadastro.js"></script>
</body>
</html>