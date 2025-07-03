<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nossas Unidades - Academia</title>
    <link rel="stylesheet" href="unidades.css">
    <link rel="shortcut icon" href="imgs/favi.png" type="image/x-icon">
</head>
<body>
    <div class="floating-particles">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 3s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 5s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 0.5s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 1.5s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 2.5s;"></div>
    </div>

    <div class="header">
        <a href="quem_somos.php" class="btn-voltar">
            ← Voltar
        </a>
        <h1>Nossas Unidades</h1>
        <p>Encontre a academia mais próxima de você e faça parte da nossa família fitness!</p>
    </div>

    <div class="container">
        <div class="unidades-grid">
            <div class="unidade-card fade-in">
                <div class="unidade-image">
                    <img src="imgs/acad1 (2).jpeg" class="uploaded-image" alt="Unidade Centro">
                    <div class="distance-badge">3 km</div>
                </div>
                <div class="unidade-content">
                    <h2 class="unidade-title">Unidade Centro</h2>
                    <div class="unidade-address">
                        Rua das Flores, 123 - Centro<br>
                        Brasília - DF, 70000-000
                    </div>

                    <div class="unidade-extra-info">
                        <h3>Sobre a Unidade Centro</h3>
                        <p>No coração de Brasília, a Força Bruta Centro é seu refúgio para transformar a pressão do dia a dia em pura potência. Com um design moderno e equipamentos de ponta, somos o epicentro da sua evolução física e mental. Ideal para quem vive no ritmo acelerado da cidade e busca resultados concretos. Supere seus limites onde a força da capital pulsa mais forte.</p>
                        <h3>Horário de Funcionamento</h3>
                        <p>Todos os dias: 24 horas</p>
                    </div>

                    <div class="unidade-actions">
                        <button class="btn btn-secondary" onclick="toggleMaisInfo(this)">
                            📋 Ver mais
                        </button>
                    </div>
                </div>
            </div>

            <div class="unidade-card fade-in">
                <div class="unidade-image">
                    <img src="imgs/acad_2.jpeg" class="uploaded-image" alt="Unidade Asa Sul">
                    <div class="distance-badge">5 km</div>
                </div>
                <div class="unidade-content">
                    <h2 class="unidade-title">Unidade Asa Sul</h2>
                    <div class="unidade-address">
                        SHCS 502/503, Bloco A<br>
                        Asa Sul, Brasília - DF, 70330-000
                    </div>

                    <div class="unidade-extra-info">
                        <h3>Sobre a Unidade Asa Sul</h3>
                        <p>A Força Bruta Asa Sul é o equilíbrio perfeito entre treino intenso e bem-estar. Criamos um ambiente acolhedor para você fortalecer o corpo, a mente e criar laços com uma comunidade que te inspira. Aqui, cada treino é um passo em direção à sua melhor versão, em um espaço que é uma extensão da sua casa. Venha fazer parte da nossa família e redescubra sua força.</p>
                        <h3>Horário de Funcionamento</h3>
                        <p>Seg-Sex: 6h - 23h<br>Sáb-Dom: 8h - 18h</p>
                    </div>

                    <div class="unidade-actions">
                        <button class="btn btn-secondary" onclick="toggleMaisInfo(this)">
                            📋 Ver mais
                        </button>
                    </div>
                </div>
            </div>

            <div class="unidade-card fade-in">
                <div class="unidade-image">
                    <img src="imgs/WhatsApp Image 2025-06-24 at 20.09.58.jpeg" class="uploaded-image" alt="Unidade Asa Norte">
                    <div class="distance-badge">6 km</div>
                </div>
                <div class="unidade-content">
                    <h2 class="unidade-title">Unidade Asa Norte</h2>
                    <div class="unidade-address">
                        SCLN 408, Bloco B<br>
                        Asa Norte, Brasília - DF, 70850-000
                    </div>
                     <div class="unidade-extra-info">
                        <h3>Sobre a Unidade Asa Norte</h3>
                        <p>Vibrante, ousada e cheia de energia, a Força Bruta Asa Norte é o ponto de encontro da vanguarda fitness. Com foco em treinos de alta performance como o cross-training e um ambiente industrial e moderno, somos o lugar ideal para quem busca inovação e desafios. Se você quer ir além do convencional e liberar sua potência máxima, seu lugar é aqui.</p>
                        <h3>Horário de Funcionamento</h3>
                        <p>Seg-Sáb: 5h - 00h<br>Dom: 9h - 14h</p>
                    </div>

                    <div class="unidade-actions">
                        <button class="btn btn-secondary" onclick="toggleMaisInfo(this)">
                            📋 Ver mais
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="unidades.js"></script>
</body>
</html>