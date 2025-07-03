<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();

        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            header('Location: portal.php');
            exit();
        } else {
            $error_message = "Senha incorreta.";
        }
    } else {
        $error_message = "Email não encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Força Bruta</title>
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="imgs/favi.png" type="image/x-icon">
</head>
<body>
    <!-- Floating background elements -->
    <div class="floating-element">💪</div>
    <div class="floating-element">🏋️</div>
    <div class="floating-element">⚡</div>
    <div class="floating-element">🔥</div>

    <div class="login-container">
        <div class="logo">
            <h1>Força Bruta</h1>
        </div>

        <?php if (isset($error_message)) : ?>
            <div class="error-message">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>

            <button type="submit" class="btn btn-primary">Entrar</button>
            <button type="button" class="btn btn-primary" onclick="window.location.href='quem_somos2.php'">
                Quem Somos
            </button>
        </form>

        <div class="link-cadastro">
            <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
        </div>
    </div>
</body>
</html>