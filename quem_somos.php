<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Força Bruta - Academia Premium</title>
<link rel="stylesheet" href="quem_somos.css">
<link rel="shortcut icon" href="imgs/favi.png" type="image/x-icon">
</head>
<body>
    <!-- Floating background elements -->
    <div class="floating-element" style="left: 10%; animation-delay: 0s;">💪</div>
    <div class="floating-element" style="left: 80%; animation-delay: 5s;">🔥</div>
    <div class="floating-element" style="left: 50%; animation-delay: 10s;">⚡</div>

    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <div class="logo">FORÇA BRUTA</div>
            <ul class="nav-links">
            </ul>
            <div class="cta-buttons">
                <a href="portal.php" class="btn btn-secondary">Área do Aluno</a>
                <a href="logout.php" class="btn btn-primary">Deslogar</a>
            </div>

        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="inicio">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <div class="hero-text">
                <h1>DIGA SIM<br>PRO SEU<br><span class="highlight">POTENCIAL</span></h1>
                <h2>TREINE EM UMA ESTRUTURA PREMIUM NO CORAÇÃO DE BRASÍLIA.<br></h2>
                <div style="margin-top: 2rem;">
                    <a href="painel.php" class="btn btn-primary" style="margin-right: 1rem;">COMEÇAR AGORA 💪</a>
                    <a href="unidade.php" class="btn btn-secondary">unidades</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="person-silhouette"></div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="programas">
        <div class="features-container">
            <div class="section-title">
                <h2>Por que se <span class="highlight">matricular?</span></h2>
                <p>A Força Bruta reúne tudo que você precisa para não ter mais desculpas para não ir treinar: academias espalhadas por todo Brasil, abertas 24h, todos os dias da semana e com mais de 50 modalidades diferentes por um preço acessível.</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🏋️</div>
                    <h3>Equipamentos Premium</h3>
                    <p>Máquinas e equipamentos de última geração para todos os tipos de treino, sempre em perfeito estado de conservação.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🕒</div>
                    <h3>24 Horas por Dia</h3>
                    <p>Academia aberta 24h para você treinar no horário que for melhor para sua rotina, sem limitações.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">👨‍🏫</div>
                    <h3>Professores Especializados</h3>
                    <p>Equipe de profissionais qualificados prontos para te ajudar a alcançar seus objetivos com segurança.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔥</div>
                    <h3>O Poder da Musculação</h3>
                    <p>Aqui, não nos distraímos. Oferecemos o melhor em equipamentos e suporte para você alcançar a sua melhor versão.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📍</div>
                    <h3> Endereços Premium</h3>
                    <p>Nossas academias estão localizadas nos pontos mais estratégicos de Brasília. Venha treinar conosco na Asa Sul ou na Asa Norte.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💪</div>
                    <h3>Ambiente Motivador</h3>
                    <p>Espaço moderno e energia contagiante para você se sentir motivado a superar seus limites todos os dias.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="matricula">
        <div class="cta-content">
            <h2>LIBERTE SUA FORÇA BRUTA</h2>
            <p>Comece sua transformação hoje mesmo. Escolha como, onde e quando se movimentar!</p>
            <a href="cadastro.php" class="btn-cta" onclick="alert('Redirecionando para matrícula...')">MATRICULAR AGORA</a>
        </div>
    </section>
    <script src="quem_somos.js"></script>
</body>
</html>